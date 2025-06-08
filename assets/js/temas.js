document.addEventListener('DOMContentLoaded', () => {
  const body = document.body;
  const btnClaro = document.getElementById('modoClaro');
  const btnEscuro = document.getElementById('modoEscuro');
  const btnColorADD = document.getElementById('modoColorADD');
  const coloraddLink = document.getElementById('temaColorADD');

  // Aplica o tema salvo
  const temaSalvo = localStorage.getItem('temaPreferido') || 'claro';
  body.setAttribute('data-tema', temaSalvo);
  if (temaSalvo === 'coloradd') {
    coloraddLink.disabled = false;
  } else {
    coloraddLink.disabled = true;
  }

  if (btnClaro && btnEscuro && btnColorADD && coloraddLink) {
    btnClaro.addEventListener('click', () => {
      body.setAttribute('data-tema', 'claro');
      coloraddLink.disabled = true;
      localStorage.setItem('temaPreferido', 'claro');
      console.log('Tema claro ativado');
    });

    btnEscuro.addEventListener('click', () => {
      body.setAttribute('data-tema', 'escuro');
      coloraddLink.disabled = true;
      localStorage.setItem('temaPreferido', 'escuro');
      console.log('Tema escuro ativado');
    });

    btnColorADD.addEventListener('click', () => {
      body.setAttribute('data-tema', 'coloradd');
      coloraddLink.disabled = false;
      localStorage.setItem('temaPreferido', 'coloradd');
      console.log('Tema ColorADD ativado');
    });
  } else {
    console.warn('Um ou mais elementos de controle de tema não foram encontrados.');
  }
});
