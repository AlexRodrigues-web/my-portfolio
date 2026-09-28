<?php
/**
 * oportunidades.php · AlexDevCode
 * Public, real opportunity radar powered by verified external sources.
 * No demonstration vacancies and no database access.
 */

include_once 'includes/header.php';

$radarConfig = json_encode(
    array(
        'apiUrl' => 'api/opportunities.php',
        'initialRegion' => 'portugal'
    ),
    JSON_UNESCAPED_UNICODE |
    JSON_UNESCAPED_SLASHES |
    JSON_HEX_TAG |
    JSON_HEX_AMP |
    JSON_HEX_APOS |
    JSON_HEX_QUOT
);
?>

<link rel="stylesheet" href="assets/css/opportunities-radar.css?v=20260803-3">
<script src="assets/js/opportunities-radar.js?v=20260803-3" defer></script>

<div class="job-scroll-progress" id="jobScrollProgress" aria-hidden="true"></div>

<main class="job-radar" id="main-content">
    <section class="job-hero" aria-labelledby="jobRadarTitle">
        <div class="job-hero-copy">
            <span class="job-kicker">
                <i data-lucide="radar" aria-hidden="true"></i>
                Opportunity radar
            </span>

            <h1 id="jobRadarTitle">
                Find tech opportunities <span>closer to your reality.</span>
            </h1>

            <p>
                Search selected jobs, internships and freelance projects focused on Portugal,
                Europe and Brazil — organised in one clear, practical experience.
            </p>

            <form class="job-search" id="jobSearchForm" role="search">
                <label class="job-sr-only" for="jobSearchInput">Search opportunities</label>

                <span class="job-search-icon" aria-hidden="true">
                    <i data-lucide="search"></i>
                </span>

                <input
                    id="jobSearchInput"
                    name="query"
                    type="search"
                    autocomplete="off"
                    placeholder="Job title, technology or company..."
                >

                <button type="submit">
                    <span>Search</span>
                    <i data-lucide="arrow-right" aria-hidden="true"></i>
                </button>
            </form>

            <div class="job-quick-filters" id="jobQuickFilters" aria-label="Quick filters">
                <button type="button" class="is-active" data-quick="all">
                    <i data-lucide="layout-grid"></i>
                    All
                </button>
                <button type="button" data-quick="remote">
                    <i data-lucide="wifi"></i>
                    Remote
                </button>
                <button type="button" data-quick="junior">
                    <i data-lucide="sprout"></i>
                    Junior
                </button>
                <button type="button" data-quick="php">PHP</button>
                <button type="button" data-quick="react">React</button>
                <button type="button" data-quick="frontend">Frontend</button>
                <button type="button" data-quick="full stack">Full Stack</button>
            </div>
        </div>

        <div class="job-radar-visual" aria-hidden="true">
            <div class="job-radar-orbit orbit-one"></div>
            <div class="job-radar-orbit orbit-two"></div>
            <div class="job-radar-orbit orbit-three"></div>
            <div class="job-radar-sweep"></div>
            <span class="job-radar-dot dot-one"></span>
            <span class="job-radar-dot dot-two"></span>
            <span class="job-radar-dot dot-three"></span>
            <span class="job-radar-center"></span>
        </div>
    </section>

    <section class="job-region-shell" aria-label="Opportunity regions">
        <div class="job-region-tabs" id="jobRegionTabs" role="tablist" aria-label="Select a region">
            <button type="button" class="is-active" data-region="portugal" role="tab" aria-selected="true">
                <span class="job-flag">PT</span>
                Portugal
            </button>
            <button type="button" data-region="europe" role="tab" aria-selected="false">
                <span class="job-flag">EU</span>
                Europe
            </button>
            <button type="button" data-region="brazil" role="tab" aria-selected="false">
                <span class="job-flag">BR</span>
                Brazil
            </button>
            <button type="button" data-region="freelance" role="tab" aria-selected="false">
                <i data-lucide="briefcase-business"></i>
                Freelance
            </button>
        </div>

        <p class="job-region-note" id="jobRegionNote">
            Showing opportunities located in Portugal or clearly open to candidates based in Portugal.
        </p>
    </section>

    <section class="job-stats" aria-label="Radar summary">
        <article>
            <span class="job-stat-icon"><i data-lucide="briefcase"></i></span>
            <div>
                <strong id="jobStatTotal">0</strong>
                <span>Opportunities</span>
            </div>
        </article>

        <article>
            <span class="job-stat-icon"><i data-lucide="clock-3"></i></span>
            <div>
                <strong id="jobStatUpdated">Updating…</strong>
                <span>Last live sync</span>
            </div>
        </article>

        <article>
            <span class="job-stat-icon"><i data-lucide="database"></i></span>
            <div>
                <strong id="jobStatSources">0</strong>
                <span>Sources represented</span>
            </div>
        </article>
    </section>

    <section class="job-browser" aria-labelledby="jobResultsTitle">
        <div class="job-browser-head">
            <div>
                <span class="job-section-kicker">Selected opportunities</span>
                <h2 id="jobResultsTitle">Recently added to the radar</h2>
                <p id="jobResultsSummary" aria-live="polite">Connecting to verified opportunity sources…</p>
            </div>

            <button type="button" class="job-filter-toggle" id="jobFilterToggle" aria-expanded="false" aria-controls="jobFilterPanel">
                <i data-lucide="sliders-horizontal"></i>
                Filters
                <span id="jobFilterCount">0</span>
            </button>
        </div>

        <div class="job-filter-panel" id="jobFilterPanel" hidden>
            <div class="job-filter-grid">
                <label>
                    <span>Work model</span>
                    <select id="jobModeFilter">
                        <option value="all">All models</option>
                        <option value="remote">Remote</option>
                        <option value="hybrid">Hybrid</option>
                        <option value="onsite">On-site</option>
                    </select>
                </label>

                <label>
                    <span>Experience</span>
                    <select id="jobLevelFilter">
                        <option value="all">All levels</option>
                        <option value="junior">Junior</option>
                        <option value="mid">Mid-level</option>
                        <option value="senior">Senior</option>
                        <option value="any">Open level</option>
                    </select>
                </label>

                <label>
                    <span>Published</span>
                    <select id="jobDateFilter">
                        <option value="all">Any date</option>
                        <option value="1">Last 24 hours</option>
                        <option value="3">Last 3 days</option>
                        <option value="7">Last 7 days</option>
                    </select>
                </label>

                <label>
                    <span>Sort by</span>
                    <select id="jobSortFilter">
                        <option value="recent">Most recent</option>
                        <option value="title">Job title</option>
                        <option value="company">Company</option>
                    </select>
                </label>
            </div>

            <button type="button" class="job-clear-filters" id="jobClearFilters">
                <i data-lucide="rotate-ccw"></i>
                Reset filters
            </button>
        </div>

        <div class="job-featured-host" id="jobFeaturedHost"></div>

        <div class="job-list-head">
            <div class="job-list-copy">
                <h3>More opportunities</h3>
                <span id="jobVisibleCount" aria-live="polite">0 results</span>
            </div>

            <label class="job-page-size" for="jobPageSize">
                <span>Jobs per page</span>
                <select id="jobPageSize">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="20">20</option>
                    <option value="40">40</option>
                </select>
            </label>
        </div>

        <div class="job-results-grid" id="jobResultsGrid"></div>

        <div class="job-pagination-shell" id="jobPaginationShell" hidden>
            <p class="job-pagination-summary" id="jobPaginationSummary">Page 1 of 1</p>
            <nav class="job-pagination" id="jobPagination" aria-label="Opportunity result pages"></nav>
        </div>

        <div class="job-empty" id="jobEmptyState" hidden>
            <span><i data-lucide="search-x"></i></span>
            <h3>No verified opportunities found</h3>
            <p>Try another keyword, remove a filter or select a different region. Only opportunities with a real source link are displayed.</p>
            <button type="button" id="jobEmptyReset">Reset search</button>
        </div>
    </section>

    <section class="job-transparency" aria-labelledby="jobTransparencyTitle">
        <span class="job-transparency-icon"><i data-lucide="shield-check"></i></span>
        <div>
            <span class="job-section-kicker">Transparent by design</span>
            <h2 id="jobTransparencyTitle">The original source remains in control.</h2>
            <p>
                The radar organises public opportunities and sends the candidate to the original page to apply.
                Salary, location and availability are only displayed when supplied by the source.
            </p>
        </div>
        <div class="job-transparency-points">
            <span><i data-lucide="external-link"></i> External application</span>
            <span><i data-lucide="copy-check"></i> Duplicate control</span>
            <span><i data-lucide="calendar-clock"></i> Recent results first</span>
        </div>
    </section>

    <section class="job-demofirst" aria-labelledby="jobDemoFirstTitle">
        <div class="job-demofirst-icon"><i data-lucide="play"></i></div>
        <div>
            <span class="job-section-kicker">Technical case study</span>
            <h2 id="jobDemoFirstTitle">See how this live opportunity radar was engineered.</h2>
            <p>
                Explore the architecture, source normalisation, regional filtering and product experience behind this real public radar.
            </p>
        </div>
        <a href="https://demofirst.alexdevcode.com/pt/demofirst" target="_blank" rel="noopener">
            View on DemoFirst
            <i data-lucide="arrow-up-right"></i>
        </a>
    </section>
</main>

<div class="job-drawer-backdrop" id="jobDrawerBackdrop" aria-hidden="true" hidden></div>

<aside class="job-drawer" id="jobDrawer" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="jobDrawerTitle" tabindex="-1">
    <div class="job-drawer-head">
        <div>
            <span class="job-section-kicker">Opportunity details</span>
            <h2 id="jobDrawerTitle">Selected opportunity</h2>
        </div>

        <button type="button" id="jobDrawerClose" aria-label="Close opportunity details">
            <i data-lucide="x"></i>
        </button>
    </div>

    <div class="job-drawer-body" id="jobDrawerBody"></div>
</aside>

<script id="jobRadarConfig" type="application/json"><?= $radarConfig ?: '{}' ?></script>

<?php include_once 'includes/footer.php'; ?>
