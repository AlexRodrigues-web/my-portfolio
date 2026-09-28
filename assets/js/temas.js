document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  const body = document.body;

  /*
   * ============================================================
   * ALEXDEVCODE — TEMA + COLORADD
   *
   * REGRA:
   * - Tema = claro | escuro
   * - ColorADD = camada independente ON | OFF
   *
   * ColorADD NÃO pode voltar a ser:
   * data-tema="coloradd"
   * ============================================================
   */


  /*
   * ============================================================
   * HEADER NOVO
   *
   * Se a página já usa o header novo, ele é o controlador
   * principal de Tema + ColorADD.
   *
   * Neste caso este ficheiro NÃO interfere.
   * Isso evita dois scripts disputando data-tema/data-coloradd.
   * ============================================================
   */

  const modernThemeController =
    document.getElementById('adcThemeSwitch');

  const modernColorAddController =
    document.getElementById('colorAddToggle');


  if (
    modernThemeController
    || modernColorAddController
  ) {

    return;

  }


  /*
   * ============================================================
   * CONTROLOS ANTIGOS
   *
   * Mantidos apenas para compatibilidade com páginas antigas
   * que ainda possam carregar temas.js.
   * ============================================================
   */

  const btnClaro =
    document.getElementById('modoClaro');

  const btnEscuro =
    document.getElementById('modoEscuro');

  const btnColorADD =
    document.getElementById('modoColorADD');


  /*
   * Alguns ficheiros antigos usam temaColorADD.
   * O header atual usa colorAddSheet.
   */

  const darkSheet =
    document.getElementById('darkSheet');

  const colorAddSheet =
    document.getElementById('colorAddSheet')
    || document.getElementById('temaColorADD');


  /*
   * ============================================================
   * TEMA
   *
   * SOMENTE:
   * claro
   * escuro
   * ============================================================
   */

  function setTheme(theme) {

    if (
      ![
        'claro',
        'escuro'
      ].includes(theme)
    ) {

      theme = 'claro';

    }


    body.setAttribute(
      'data-tema',
      theme
    );


    if (darkSheet) {

      darkSheet.disabled =
        theme !== 'escuro';

    }


    try {

      localStorage.setItem(
        'alexdevcode-theme',
        theme
      );

    }
    catch (error) {

      /*
       * localStorage indisponível.
       * Não impede funcionamento da página.
       */

    }

  }


  /*
   * ============================================================
   * COLORADD
   *
   * INDEPENDENTE DO TEMA.
   *
   * Exemplos válidos:
   *
   * data-tema="claro"
   * data-coloradd="on"
   *
   * ou:
   *
   * data-tema="escuro"
   * data-coloradd="on"
   * ============================================================
   */

  function setColorAdd(enabled) {

    const active =
      enabled === true;


    body.setAttribute(
      'data-coloradd',
      active
        ? 'on'
        : 'off'
    );


    if (colorAddSheet) {

      colorAddSheet.disabled =
        !active;

    }


    try {

      localStorage.setItem(
        'alexdevcode-coloradd',
        active
          ? 'on'
          : 'off'
      );

    }
    catch (error) {

      /*
       * localStorage indisponível.
       */

    }

  }


  /*
   * ============================================================
   * RESTAURAR PREFERÊNCIAS
   * ============================================================
   */

  let savedTheme =
    'claro';

  let savedColorAdd =
    'off';


  try {

    /*
     * Primeiro tenta o sistema NOVO.
     */

    savedTheme =
      localStorage.getItem(
        'alexdevcode-theme'
      )
      ||

      /*
       * Compatibilidade com o sistema antigo.
       */

      localStorage.getItem(
        'temaPreferido'
      )
      ||
      'claro';


    savedColorAdd =
      localStorage.getItem(
        'alexdevcode-coloradd'
      )
      ||
      'off';

  }
  catch (error) {

    savedTheme =
      'claro';

    savedColorAdd =
      'off';

  }


  /*
   * ============================================================
   * MIGRAÇÃO DA IMPLEMENTAÇÃO ANTIGA
   *
   * Se o navegador ainda tiver:
   *
   * temaPreferido = coloradd
   *
   * NÃO aplicamos:
   *
   * data-tema="coloradd"
   *
   * Transformamos em:
   *
   * Claro + ColorADD
   * ============================================================
   */

  if (
    savedTheme === 'coloradd'
  ) {

    savedTheme =
      'claro';

    savedColorAdd =
      'on';

  }


  setTheme(
    savedTheme
  );


  setColorAdd(
    savedColorAdd === 'on'
  );


  /*
   * ============================================================
   * BOTÃO CLARO — COMPATIBILIDADE
   * ============================================================
   */

  if (btnClaro) {

    btnClaro.addEventListener(
      'click',
      () => {

        setTheme(
          'claro'
        );

      }
    );

  }


  /*
   * ============================================================
   * BOTÃO ESCURO — COMPATIBILIDADE
   * ============================================================
   */

  if (btnEscuro) {

    btnEscuro.addEventListener(
      'click',
      () => {

        setTheme(
          'escuro'
        );

      }
    );

  }


  /*
   * ============================================================
   * BOTÃO COLORADD ANTIGO — COMPATIBILIDADE
   *
   * Agora funciona como ON/OFF.
   * NÃO troca mais o tema.
   * ============================================================
   */

  if (btnColorADD) {

    btnColorADD.addEventListener(
      'click',
      () => {

        const enabled =
          body.getAttribute(
            'data-coloradd'
          )
          !== 'on';


        setColorAdd(
          enabled
        );

      }
    );

  }

});