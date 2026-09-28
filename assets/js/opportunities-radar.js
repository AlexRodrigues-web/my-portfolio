(function () {
  'use strict';

  function ready(callback) {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', callback, { once: true });
    } else {
      callback();
    }
  }

  ready(function () {
    var configNode = document.getElementById('jobRadarConfig');
    if (!configNode) return;

    var config = {};
    try {
      config = JSON.parse(configNode.textContent || '{}');
    } catch (error) {
      console.error('Opportunity radar configuration could not be parsed.', error);
      return;
    }

    var apiUrl = config.apiUrl || 'api/opportunities.php';
    var jobs = [];
    var regionCache = {};
    var activeRequest = 0;
    var drawerCloseTimer = null;
    var drawerIsOpen = false;
    var drawerRestoreFocus = true;
    var lastFocusedElement = null;

    var state = {
      region: config.initialRegion || 'portugal',
      query: '',
      quick: 'all',
      mode: 'all',
      level: 'all',
      date: 'all',
      sort: 'recent',
      page: 1,
      pageSize: 10
    };

    var regionNotes = {
      portugal: 'Showing verified opportunities in Portugal and remote positions that explicitly accept candidates based in Portugal.',
      europe: 'Showing verified European roles and remote positions that accept candidates based in Europe.',
      brazil: 'Showing verified opportunities in Brazil and remote roles that accept candidates based in Brazil.',
      freelance: 'Showing verified freelance or contract opportunities connected to Portugal, Europe or Brazil.'
    };

    var searchForm = document.getElementById('jobSearchForm');
    var searchInput = document.getElementById('jobSearchInput');
    var quickFilters = document.getElementById('jobQuickFilters');
    var regionTabs = document.getElementById('jobRegionTabs');
    var regionNote = document.getElementById('jobRegionNote');
    var filterToggle = document.getElementById('jobFilterToggle');
    var filterPanel = document.getElementById('jobFilterPanel');
    var modeFilter = document.getElementById('jobModeFilter');
    var levelFilter = document.getElementById('jobLevelFilter');
    var dateFilter = document.getElementById('jobDateFilter');
    var sortFilter = document.getElementById('jobSortFilter');
    var clearFilters = document.getElementById('jobClearFilters');
    var filterCount = document.getElementById('jobFilterCount');
    var featuredHost = document.getElementById('jobFeaturedHost');
    var resultsGrid = document.getElementById('jobResultsGrid');
    var emptyState = document.getElementById('jobEmptyState');
    var emptyReset = document.getElementById('jobEmptyReset');
    var resultSummary = document.getElementById('jobResultsSummary');
    var visibleCount = document.getElementById('jobVisibleCount');
    var statTotal = document.getElementById('jobStatTotal');
    var statSources = document.getElementById('jobStatSources');
    var statUpdated = document.getElementById('jobStatUpdated');
    var pageSizeSelect = document.getElementById('jobPageSize');
    var paginationShell = document.getElementById('jobPaginationShell');
    var paginationSummary = document.getElementById('jobPaginationSummary');
    var pagination = document.getElementById('jobPagination');
    var drawer = document.getElementById('jobDrawer');
    var drawerTitle = document.getElementById('jobDrawerTitle');
    var drawerBody = document.getElementById('jobDrawerBody');
    var drawerClose = document.getElementById('jobDrawerClose');
    var drawerBackdrop = document.getElementById('jobDrawerBackdrop');
    var scrollProgress = document.getElementById('jobScrollProgress');

    if (!searchForm || !searchInput || !quickFilters || !regionTabs || !filterToggle ||
        !filterPanel || !modeFilter || !levelFilter || !dateFilter || !sortFilter ||
        !clearFilters || !featuredHost || !resultsGrid || !emptyState || !emptyReset ||
        !resultSummary || !visibleCount || !statTotal || !statSources || !pageSizeSelect ||
        !paginationShell || !paginationSummary || !pagination || !drawer || !drawerBody ||
        !drawerClose || !drawerBackdrop) {
      console.error('Opportunity radar could not start because one or more required elements are missing.');
      return;
    }

    state.pageSize = Number(pageSizeSelect.value) || 10;

    function escapeHtml(value) {
      return String(value == null ? '' : value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
    }

    function normalise(value) {
      var text = String(value == null ? '' : value);
      if (typeof text.normalize === 'function') {
        text = text.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
      }
      return text.toLowerCase().trim();
    }

    function getInitial(company) {
      var clean = String(company || 'A').trim();
      return escapeHtml(clean.charAt(0).toUpperCase() || 'A');
    }

    function getPostedText(days) {
      var amount = Number(days) || 0;
      if (amount <= 0) return 'Today';
      if (amount === 1) return '1 day ago';
      return amount + ' days ago';
    }

    function getModeLabel(mode) {
      return { remote: 'Remote', hybrid: 'Hybrid', onsite: 'On-site' }[mode] || 'Not specified';
    }

    function getLevelLabel(level) {
      return { junior: 'Junior', mid: 'Mid-level', senior: 'Senior', any: 'Open level' }[level] || 'Open level';
    }

    function getSavedIds() {
      try {
        var parsed = JSON.parse(localStorage.getItem('alexdevcode-saved-opportunities') || '[]');
        return Array.isArray(parsed) ? parsed : [];
      } catch (error) {
        return [];
      }
    }

    function isSaved(id) {
      return getSavedIds().indexOf(id) !== -1;
    }

    function toggleSaved(id) {
      var ids = getSavedIds();
      var index = ids.indexOf(id);
      if (index === -1) ids.push(id); else ids.splice(index, 1);

      try {
        localStorage.setItem('alexdevcode-saved-opportunities', JSON.stringify(ids));
      } catch (error) {
        console.warn('The opportunity could not be saved in this browser.', error);
      }

      render();
      updateDrawerSavedButton(id);
    }

    function updateDrawerSavedButton(id) {
      if (!drawerIsOpen) return;
      var button = drawerBody.querySelector('[data-save-job="' + cssEscape(id) + '"]');
      if (!button) return;
      var saved = isSaved(id);
      button.classList.toggle('is-saved', saved);
      button.setAttribute('aria-pressed', String(saved));
      button.innerHTML = '<i data-lucide="bookmark"></i>' + (saved ? 'Saved' : 'Save');
      if (window.lucide) window.lucide.createIcons();
    }

    function cssEscape(value) {
      if (window.CSS && typeof window.CSS.escape === 'function') return window.CSS.escape(String(value));
      return String(value).replace(/(["\\])/g, '\\$1');
    }

    function jobSearchText(job) {
      return normalise([
        job.title, job.company, job.city, job.country, job.mode, job.level,
        job.contract, job.category, job.summary, (job.skills || []).join(' ')
      ].join(' '));
    }

    function matchesQuick(job) {
      if (state.quick === 'all') return true;
      if (state.quick === 'remote') return job.mode === 'remote';
      if (state.quick === 'junior') return job.level === 'junior';
      return jobSearchText(job).indexOf(normalise(state.quick)) !== -1;
    }

    function matchesJob(job) {
      if (job.region !== state.region) return false;
      if (state.query && jobSearchText(job).indexOf(normalise(state.query)) === -1) return false;
      if (!matchesQuick(job)) return false;
      if (state.mode !== 'all' && job.mode !== state.mode) return false;
      if (state.level !== 'all' && job.level !== state.level) return false;
      if (state.date !== 'all' && Number(job.posted_days) > Number(state.date)) return false;
      return true;
    }

    function sortJobs(list) {
      return list.slice().sort(function (a, b) {
        if (state.sort === 'title') return String(a.title).localeCompare(String(b.title));
        if (state.sort === 'company') return String(a.company).localeCompare(String(b.company));
        if (Boolean(a.featured) !== Boolean(b.featured)) return a.featured ? -1 : 1;
        return Number(a.posted_days) - Number(b.posted_days);
      });
    }

    function renderTags(job, limit) {
      return (job.skills || []).slice(0, limit || 4).map(function (skill) {
        return '<span>' + escapeHtml(skill) + '</span>';
      }).join('');
    }

    function renderMeta(job) {
      return [
        '<span><i data-lucide="map-pin"></i>' + escapeHtml(job.city || 'Location not disclosed') + '</span>',
        '<span><i data-lucide="wifi"></i>' + escapeHtml(getModeLabel(job.mode)) + '</span>',
        '<span><i data-lucide="clock-3"></i>' + escapeHtml(getPostedText(job.posted_days)) + '</span>'
      ].join('');
    }

    function renderActions(job) {
      var saved = isSaved(job.id);
      var savedClass = saved ? ' is-saved' : '';
      var savedLabel = saved ? 'Remove saved opportunity' : 'Save opportunity';
      return '<div class="job-card-actions">' +
        '<button type="button" data-view-job="' + escapeHtml(job.id) + '">View details <i data-lucide="arrow-right"></i></button>' +
        '<button type="button" class="job-save-btn' + savedClass + '" data-save-job="' + escapeHtml(job.id) + '" aria-pressed="' + String(saved) + '" aria-label="' + escapeHtml(savedLabel) + '" title="' + escapeHtml(savedLabel) + '"><i data-lucide="bookmark"></i></button>' +
      '</div>';
    }

    function renderFeatured(job) {
      return '<article class="job-featured-card">' +
        '<div class="job-card-main">' +
          '<span class="job-featured-label"><i data-lucide="sparkles"></i>Most recent match</span>' +
          '<div class="job-card-topline"><span class="job-company-mark" aria-hidden="true">' + getInitial(job.company) + '</span>' +
            '<div class="job-card-title-wrap"><h3>' + escapeHtml(job.title) + '</h3><p>' + escapeHtml(job.company) + ' · ' + escapeHtml(job.category) + '</p></div>' +
          '</div>' +
          '<div class="job-card-meta">' + renderMeta(job) + '</div>' +
          '<div class="job-card-tags">' + renderTags(job, 5) + '</div>' +
          '<p class="job-card-summary">' + escapeHtml(job.summary) + '</p>' +
          '<div class="job-card-footer"><div class="job-card-source"><strong>' + escapeHtml(job.salary) + '</strong><span>' + escapeHtml(job.contract) + ' · via ' + escapeHtml(job.source) + '</span></div></div>' +
        '</div>' + renderActions(job) +
      '</article>';
    }

    function renderResultCard(job) {
      return '<article class="job-result-card">' +
        '<div class="job-card-main">' +
          '<div class="job-card-topline"><span class="job-company-mark" aria-hidden="true">' + getInitial(job.company) + '</span>' +
            '<div class="job-card-title-wrap"><h3>' + escapeHtml(job.title) + '</h3><p>' + escapeHtml(job.company) + ' · ' + escapeHtml(job.category) + '</p></div>' +
          '</div>' +
          '<div class="job-card-meta">' + renderMeta(job) + '</div>' +
          '<div class="job-card-tags">' + renderTags(job, 4) + '</div>' +
          '<p class="job-card-summary">' + escapeHtml(job.summary) + '</p>' +
        '</div>' +
        '<div class="job-card-footer"><div class="job-card-source"><strong>' + escapeHtml(job.salary) + '</strong><span>' + escapeHtml(job.contract) + ' · via ' + escapeHtml(job.source) + '</span></div>' + renderActions(job) + '</div>' +
      '</article>';
    }

    function getActiveFilterCount() {
      var count = 0;
      if (state.query) count += 1;
      if (state.quick !== 'all') count += 1;
      if (state.mode !== 'all') count += 1;
      if (state.level !== 'all') count += 1;
      if (state.date !== 'all') count += 1;
      return count;
    }

    function regionLabel() {
      return { portugal: 'Portugal', europe: 'Europe', brazil: 'Brazil', freelance: 'Freelance' }[state.region] || 'Portugal';
    }

    function getPageItems(matching) {
      var totalPages = Math.max(1, Math.ceil(matching.length / state.pageSize));
      if (state.page > totalPages) state.page = totalPages;
      if (state.page < 1) state.page = 1;
      var start = (state.page - 1) * state.pageSize;
      return {
        totalPages: totalPages,
        start: start,
        end: Math.min(start + state.pageSize, matching.length),
        items: matching.slice(start, start + state.pageSize)
      };
    }

    function getPaginationPages(current, total) {
      if (total <= 7) {
        return Array.from({ length: total }, function (_, index) { return index + 1; });
      }

      var pages = [1];
      var from = Math.max(2, current - 1);
      var to = Math.min(total - 1, current + 1);

      if (from > 2) pages.push('ellipsis-left');
      for (var page = from; page <= to; page += 1) pages.push(page);
      if (to < total - 1) pages.push('ellipsis-right');
      pages.push(total);
      return pages;
    }

    function renderPagination(total, pageData) {
      if (!total || pageData.totalPages <= 1) {
        paginationShell.hidden = true;
        pagination.innerHTML = '';
        paginationSummary.textContent = total ? 'Page 1 of 1' : 'No result pages';
        return;
      }

      paginationShell.hidden = false;
      paginationSummary.textContent = 'Page ' + state.page + ' of ' + pageData.totalPages;

      var html = '<button type="button" class="job-page-arrow" data-page="prev" aria-label="Previous page"' + (state.page === 1 ? ' disabled' : '') + '><i data-lucide="chevron-left"></i><span>Previous</span></button>';

      getPaginationPages(state.page, pageData.totalPages).forEach(function (page) {
        if (typeof page === 'string') {
          html += '<span class="job-page-ellipsis" aria-hidden="true">…</span>';
          return;
        }

        html += '<button type="button" class="job-page-number' + (page === state.page ? ' is-active' : '') + '" data-page="' + page + '"' + (page === state.page ? ' aria-current="page"' : '') + ' aria-label="Go to page ' + page + '">' + page + '</button>';
      });

      html += '<button type="button" class="job-page-arrow" data-page="next" aria-label="Next page"' + (state.page === pageData.totalPages ? ' disabled' : '') + '><span>Next</span><i data-lucide="chevron-right"></i></button>';
      pagination.innerHTML = html;
    }

    function render() {
      var matching = sortJobs(jobs.filter(matchesJob));
      var pageData = getPageItems(matching);
      var pageItems = pageData.items;
      var featured = state.page === 1 && pageItems.length ? pageItems[0] : null;
      var remaining = featured ? pageItems.slice(1) : pageItems;
      var sourceCount = new Set(matching.map(function (job) { return job.source; })).size;

      featuredHost.innerHTML = featured ? renderFeatured(featured) : '';
      resultsGrid.innerHTML = remaining.map(renderResultCard).join('');
      emptyState.hidden = matching.length !== 0;
      statTotal.textContent = String(matching.length);
      statSources.textContent = String(sourceCount);
      filterCount.textContent = String(getActiveFilterCount());

      if (matching.length) {
        visibleCount.textContent = 'Showing ' + (pageData.start + 1) + '–' + pageData.end + ' of ' + matching.length + (matching.length === 1 ? ' result' : ' results');
        resultSummary.textContent = matching.length + ' verified opportunities in ' + regionLabel() + '. Page ' + state.page + ' of ' + pageData.totalPages + '.';
      } else {
        visibleCount.textContent = '0 results';
        resultSummary.textContent = 'No verified opportunities match the current search in ' + regionLabel() + '.';
      }

      renderPagination(matching.length, pageData);
      if (window.lucide) window.lucide.createIcons();
    }

    function setLoading(isLoading, message) {
      document.body.classList.toggle('job-radar-loading', isLoading);
      if (isLoading) {
        closeDrawer({ immediate: true, restoreFocus: false });
        featuredHost.innerHTML = '<div class="job-loading-card"><span></span><span></span><span></span></div>';
        resultsGrid.innerHTML = '';
        emptyState.hidden = true;
        paginationShell.hidden = true;
        statTotal.textContent = '—';
        statSources.textContent = '—';
        if (statUpdated) statUpdated.textContent = 'Updating…';
        resultSummary.textContent = message || 'Connecting to verified opportunity sources…';
      }
    }

    function formatUpdated(value, stale) {
      if (!value) return stale ? 'Cached' : 'Live';
      var date = new Date(value);
      if (Number.isNaN(date.getTime())) return stale ? 'Cached' : 'Live';
      return (stale ? 'Cached ' : '') + date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }

    function showSourceWarning(warnings) {
      var existing = document.getElementById('jobSourceWarning');
      if (existing) existing.remove();
      if (!warnings || !warnings.length) return;
      var warning = document.createElement('div');
      warning.id = 'jobSourceWarning';
      warning.className = 'job-source-warning';
      warning.innerHTML = '<i data-lucide="triangle-alert"></i><span>' + escapeHtml(warnings.join(' ')) + '</span>';
      var browser = document.querySelector('.job-browser');
      if (browser) browser.insertBefore(warning, browser.firstChild);
      if (window.lucide) window.lucide.createIcons();
    }

    function loadRegion(region, force) {
      state.region = region;
      state.page = 1;
      regionNote.textContent = regionNotes[region] || '';
      var requestId = ++activeRequest;

      closeDrawer({ immediate: true, restoreFocus: false });

      if (!force && regionCache[region]) {
        jobs = regionCache[region].jobs || [];
        if (statUpdated) statUpdated.textContent = formatUpdated(regionCache[region].updated_at, regionCache[region].stale);
        showSourceWarning(regionCache[region].warnings || []);
        render();
        return Promise.resolve();
      }

      setLoading(true);
      return fetch(apiUrl + '?region=' + encodeURIComponent(region), {
        credentials: 'same-origin',
        headers: { Accept: 'application/json' }
      })
        .then(function (response) {
          if (!response.ok) throw new Error('HTTP ' + response.status);
          return response.json();
        })
        .then(function (payload) {
          if (requestId !== activeRequest) return;
          if (!payload || payload.ok !== true || !Array.isArray(payload.jobs)) {
            throw new Error(payload && payload.message ? payload.message : 'Invalid source response.');
          }
          regionCache[region] = payload;
          jobs = payload.jobs;
          if (statUpdated) statUpdated.textContent = formatUpdated(payload.updated_at, payload.stale);
          showSourceWarning(payload.warnings || []);
          setLoading(false);
          render();
        })
        .catch(function (error) {
          if (requestId !== activeRequest) return;
          jobs = [];
          setLoading(false);
          showSourceWarning(['The live sources could not be reached right now. Please try again shortly.']);
          render();
          console.error('Opportunity radar pipeline failed.', error);
        });
    }

    function updateQuickButtons() {
      quickFilters.querySelectorAll('[data-quick]').forEach(function (button) {
        button.classList.toggle('is-active', button.dataset.quick === state.quick);
      });
    }

    function resetPageAndRender() {
      state.page = 1;
      closeDrawer({ immediate: true, restoreFocus: false });
      render();
    }

    function resetFilters(keepRegion) {
      state.query = '';
      state.quick = 'all';
      state.mode = 'all';
      state.level = 'all';
      state.date = 'all';
      state.sort = 'recent';
      state.page = 1;
      if (!keepRegion) state.region = 'portugal';
      searchInput.value = '';
      modeFilter.value = 'all';
      levelFilter.value = 'all';
      dateFilter.value = 'all';
      sortFilter.value = 'recent';
      updateQuickButtons();
      closeDrawer({ immediate: true, restoreFocus: false });
      render();
    }

    function getFocusableElements() {
      return Array.prototype.slice.call(drawer.querySelectorAll(
        'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
      )).filter(function (element) {
        return element.offsetWidth > 0 || element.offsetHeight > 0;
      });
    }

    function setDrawerInert(value) {
      if ('inert' in drawer) drawer.inert = value;
    }

    function finishDrawerClose(restoreFocus) {
      drawerBackdrop.hidden = true;
      drawerBackdrop.setAttribute('aria-hidden', 'true');
      drawerBackdrop.classList.remove('is-open');
      setDrawerInert(true);
      drawerIsOpen = false;
      if (restoreFocus && lastFocusedElement && document.contains(lastFocusedElement) && typeof lastFocusedElement.focus === 'function') {
        lastFocusedElement.focus({ preventScroll: true });
      }
      lastFocusedElement = null;
    }

    function openDrawer(id, trigger) {
      var job = jobs.find(function (item) { return item.id === id; });
      if (!job) return;

      if (drawerCloseTimer) {
        window.clearTimeout(drawerCloseTimer);
        drawerCloseTimer = null;
      }

      lastFocusedElement = trigger || document.activeElement;
      drawerTitle.textContent = job.title;
      var requirements = (job.requirements || []).map(function (item) {
        return '<li>' + escapeHtml(item) + '</li>';
      }).join('');
      if (!requirements) requirements = '<li>Open the original source to review the complete requirements.</li>';

      drawerBody.innerHTML =
        '<div class="job-drawer-company"><span class="job-company-mark" aria-hidden="true">' + getInitial(job.company) + '</span><div><h3>' + escapeHtml(job.company) + '</h3><p>' + escapeHtml(job.city) + ' · ' + escapeHtml(job.country) + '</p></div></div>' +
        '<div class="job-card-meta" style="margin-top:1rem">' + renderMeta(job) + '</div>' +
        '<div class="job-card-tags" style="margin-top:.75rem">' + renderTags(job, 8) + '</div>' +
        '<section class="job-drawer-section"><h4>Opportunity summary</h4><p>' + escapeHtml(job.description || job.summary) + '</p></section>' +
        '<section class="job-drawer-section"><h4>What the source highlights</h4><ul>' + requirements + '</ul></section>' +
        '<section class="job-drawer-section"><h4>Contract and source</h4><p><strong>' + escapeHtml(job.salary) + '</strong><br>' + escapeHtml(job.contract) + ' · ' + escapeHtml(getLevelLabel(job.level)) + '<br>Listed via ' + escapeHtml(job.source) + '</p></section>' +
        '<div class="job-source-notice"><i data-lucide="shield-check"></i><span>Information is normalised from the named source. Confirm all details on the original listing before applying.</span></div>' +
        '<div class="job-drawer-apply"><a href="' + escapeHtml(job.url) + '" target="_blank" rel="noopener noreferrer">Open original source <i data-lucide="external-link"></i></a>' +
        '<button type="button" data-save-job="' + escapeHtml(job.id) + '" aria-pressed="' + String(isSaved(job.id)) + '" class="' + (isSaved(job.id) ? 'is-saved' : '') + '"><i data-lucide="bookmark"></i>' + (isSaved(job.id) ? 'Saved' : 'Save') + '</button></div>';

      setDrawerInert(false);
      drawerBackdrop.hidden = false;
      drawerBackdrop.setAttribute('aria-hidden', 'false');
      drawer.setAttribute('aria-hidden', 'false');
      document.body.classList.add('job-drawer-open');
      drawerIsOpen = true;

      window.requestAnimationFrame(function () {
        drawer.classList.add('is-open');
        drawerBackdrop.classList.add('is-open');
      });

      if (window.lucide) window.lucide.createIcons();
      window.setTimeout(function () { drawerClose.focus({ preventScroll: true }); }, 20);
    }

    function closeDrawer(options) {
      var settings = options || {};
      var immediate = Boolean(settings.immediate);
      var restoreFocus = settings.restoreFocus !== false;
      drawerRestoreFocus = restoreFocus;

      if (drawerCloseTimer) {
        window.clearTimeout(drawerCloseTimer);
        drawerCloseTimer = null;
      }

      drawer.classList.remove('is-open');
      drawerBackdrop.classList.remove('is-open');
      drawer.setAttribute('aria-hidden', 'true');
      drawerBackdrop.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('job-drawer-open');
      drawerIsOpen = false;

      if (immediate) {
        finishDrawerClose(restoreFocus);
        return;
      }

      drawerCloseTimer = window.setTimeout(function () {
        drawerCloseTimer = null;
        finishDrawerClose(restoreFocus);
      }, 360);
    }

    function goToPage(page) {
      var matching = sortJobs(jobs.filter(matchesJob));
      var totalPages = Math.max(1, Math.ceil(matching.length / state.pageSize));
      state.page = Math.min(totalPages, Math.max(1, Number(page) || 1));
      closeDrawer({ immediate: true, restoreFocus: false });
      render();

      var anchor = document.getElementById('jobResultsTitle');
      if (anchor) {
        var reduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        anchor.scrollIntoView({ behavior: reduced ? 'auto' : 'smooth', block: 'start' });
      }
    }

    searchForm.addEventListener('submit', function (event) {
      event.preventDefault();
      state.query = searchInput.value.trim();
      resetPageAndRender();
    });

    searchInput.addEventListener('input', function () {
      state.query = searchInput.value.trim();
      resetPageAndRender();
    });

    quickFilters.addEventListener('click', function (event) {
      var button = event.target.closest('[data-quick]');
      if (!button) return;
      state.quick = button.dataset.quick || 'all';
      updateQuickButtons();
      resetPageAndRender();
    });

    regionTabs.addEventListener('click', function (event) {
      var button = event.target.closest('[data-region]');
      if (!button) return;
      regionTabs.querySelectorAll('[data-region]').forEach(function (item) {
        var active = item === button;
        item.classList.toggle('is-active', active);
        item.setAttribute('aria-selected', String(active));
      });
      resetFilters(true);
      loadRegion(button.dataset.region);
    });

    filterToggle.addEventListener('click', function () {
      var open = filterPanel.hidden;
      filterPanel.hidden = !open;
      filterToggle.setAttribute('aria-expanded', String(open));
    });

    modeFilter.addEventListener('change', function () { state.mode = modeFilter.value; resetPageAndRender(); });
    levelFilter.addEventListener('change', function () { state.level = levelFilter.value; resetPageAndRender(); });
    dateFilter.addEventListener('change', function () { state.date = dateFilter.value; resetPageAndRender(); });
    sortFilter.addEventListener('change', function () { state.sort = sortFilter.value; resetPageAndRender(); });
    pageSizeSelect.addEventListener('change', function () {
      state.pageSize = Number(pageSizeSelect.value) || 10;
      resetPageAndRender();
    });
    clearFilters.addEventListener('click', function () { resetFilters(true); });
    emptyReset.addEventListener('click', function () { resetFilters(true); });

    pagination.addEventListener('click', function (event) {
      var button = event.target.closest('[data-page]');
      if (!button || button.disabled) return;
      var value = button.dataset.page;
      if (value === 'prev') goToPage(state.page - 1);
      else if (value === 'next') goToPage(state.page + 1);
      else goToPage(Number(value));
    });

    document.addEventListener('click', function (event) {
      var viewButton = event.target.closest('[data-view-job]');
      if (viewButton) {
        event.preventDefault();
        openDrawer(viewButton.dataset.viewJob, viewButton);
        return;
      }

      var saveButton = event.target.closest('[data-save-job]');
      if (saveButton) {
        event.preventDefault();
        event.stopPropagation();
        toggleSaved(saveButton.dataset.saveJob);
      }
    });

    drawerClose.addEventListener('click', function () { closeDrawer(); });
    drawerBackdrop.addEventListener('click', function (event) {
      if (event.target === drawerBackdrop) closeDrawer();
    });

    drawer.addEventListener('transitionend', function (event) {
      if (event.target === drawer && !drawer.classList.contains('is-open') && !drawerIsOpen) {
        if (drawerCloseTimer) {
          window.clearTimeout(drawerCloseTimer);
          drawerCloseTimer = null;
        }
        finishDrawerClose(drawerRestoreFocus);
      }
    });

    document.addEventListener('keydown', function (event) {
      if (!drawerIsOpen) return;

      if (event.key === 'Escape') {
        event.preventDefault();
        closeDrawer();
        return;
      }

      if (event.key !== 'Tab') return;
      var focusable = getFocusableElements();
      if (!focusable.length) {
        event.preventDefault();
        drawer.focus();
        return;
      }

      var first = focusable[0];
      var last = focusable[focusable.length - 1];
      if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last.focus();
      } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first.focus();
      }
    });

    window.addEventListener('pagehide', function () {
      closeDrawer({ immediate: true, restoreFocus: false });
    });

    window.addEventListener('pageshow', function () {
      if (!drawer.classList.contains('is-open')) finishDrawerClose(false);
    });

    function updateProgress() {
      if (!scrollProgress) return;
      var available = document.documentElement.scrollHeight - window.innerHeight;
      var percentage = available > 0 ? (window.scrollY / available) * 100 : 0;
      scrollProgress.style.width = Math.min(100, Math.max(0, percentage)) + '%';
    }

    setDrawerInert(true);
    finishDrawerClose(false);
    window.addEventListener('scroll', updateProgress, { passive: true });
    updateProgress();
    regionNote.textContent = regionNotes[state.region] || '';
    loadRegion(state.region);
  });
})();
