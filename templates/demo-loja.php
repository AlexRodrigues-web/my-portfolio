<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Loja Exclusiva - Produtos</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Google Fonts - Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f5f9fc;
      color: #222;
      padding-bottom: 100px;
    }
    header {
      background: #007bff;
      color: #fff;
      padding: 1rem 0;
      box-shadow: 0 2px 5px rgb(0 0 0 / 0.1);
      position: sticky;
      top: 0;
      z-index: 1050;
    }
    header h1 {
      font-weight: 700;
      font-size: 1.8rem;
      margin: 0;
      user-select: none;
    }
    main {
      max-width: 1200px;
      margin: 2rem auto 6rem;
      padding: 0 1rem;
    }
    #filter-input {
      max-width: 400px;
      margin-bottom: 2rem;
      border-radius: 50px;
      box-shadow: 0 0 8px rgb(0 123 255 / 0.3);
      padding-left: 2.5rem;
      font-size: 1.1rem;
      border: 1.5px solid #007bff;
      transition: border-color 0.3s ease;
    }
    #filter-input:focus {
      outline: none;
      border-color: #0056b3;
      box-shadow: 0 0 12px #0056b3;
    }
    #filter-input::placeholder {
      font-style: italic;
      color: #a6c8ff;
    }
    #filter-icon {
      position: absolute;
      left: 15px;
      top: 10px;
      color: #007bff;
      pointer-events: none;
      font-size: 1.2rem;
    }
    #product-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 1.8rem;
    }
    .product-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 6px 12px rgb(0 0 0 / 0.1);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .product-card:hover, .product-card:focus-within {
      transform: translateY(-6px);
      box-shadow: 0 10px 20px rgb(0 0 0 / 0.15);
      outline: none;
    }
    .product-card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      border-bottom: 1px solid #eee;
      user-select: none;
    }
    .product-info {
      padding: 1rem;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .product-info h3 {
      font-size: 1.2rem;
      font-weight: 600;
      margin: 0 0 0.5rem 0;
      color: #222;
      user-select: text;
    }
    .product-price {
      font-size: 1.3rem;
      font-weight: 700;
      color: #28a745;
      margin-bottom: 0.75rem;
      user-select: text;
    }
    .add-to-cart {
      align-self: flex-start;
      padding: 0.5rem 1.2rem;
      font-size: 0.95rem;
      border-radius: 25px;
      font-weight: 600;
      background: #007bff;
      color: white;
      border: none;
      transition: background-color 0.3s ease;
      user-select: none;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      cursor: pointer;
    }
    .add-to-cart:hover, .add-to-cart:focus {
      background: #0056b3;
      outline: none;
    }
    .add-to-cart:focus-visible {
      outline: 3px solid #80bdff;
      outline-offset: 2px;
    }

    /* Carrinho fixo lateral desktop */
    #cart-sidebar {
      position: fixed;
      top: 80px;
      right: 0;
      width: 320px;
      max-height: calc(100vh - 100px);
      background: #fff;
      box-shadow: -2px 0 15px rgb(0 0 0 / 0.1);
      padding: 1rem 1.5rem;
      overflow-y: auto;
      z-index: 1100;
      border-radius: 12px 0 0 12px;
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    #cart-sidebar h2 {
      font-weight: 700;
      color: #007bff;
      margin-bottom: 0.5rem;
    }
    #cart-list {
      flex-grow: 1;
      list-style: none;
      padding: 0;
      margin: 0;
      overflow-y: auto;
    }
    #cart-list li {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.5rem 0;
      font-weight: 500;
      border-bottom: 1px solid #eee;
      gap: 0.5rem;
    }
    #cart-list li button {
      border: none;
      background: none;
      color: #dc3545;
      font-size: 1.3rem;
      cursor: pointer;
      padding: 0.1rem 0.3rem;
      transition: color 0.2s ease;
    }
    #cart-list li button:hover, #cart-list li button:focus {
      color: #a71d2a;
      outline: none;
    }
    #cart-list li button.btn-add {
      color: #28a745;
    }
    #cart-list li button.btn-add:hover, #cart-list li button.btn-add:focus {
      color: #1e7e34;
      outline: none;
    }
    #cart-total {
      font-weight: 700;
      font-size: 1.3rem;
      color: #28a745;
      text-align: right;
    }
    #checkout-btn {
      background: #28a745;
      color: white;
      font-weight: 600;
      border-radius: 30px;
      border: none;
      padding: 0.7rem;
      transition: background-color 0.3s ease;
      cursor: pointer;
      width: 100%;
      user-select: none;
    }
    #checkout-btn:hover, #checkout-btn:focus {
      background: #1e7e34;
      outline: none;
    }
    #checkout-btn:focus-visible {
      outline: 3px solid #c3e6cb;
      outline-offset: 2px;
    }
    #cart-summary.d-none {
      display: none !important;
    }

    /* Mobile adjustments */
    @media (max-width: 991px) {
      #cart-sidebar {
        position: fixed;
        bottom: 0;
        right: 0;
        width: 100%;
        max-height: 300px;
        border-radius: 15px 15px 0 0;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        transition: transform 0.4s ease;
        transform: translateY(100%);
        box-shadow: 0 -5px 15px rgb(0 0 0 / 0.15);
      }
      #cart-sidebar.open {
        transform: translateY(0);
      }
      #cart-toggle-btn {
        position: fixed;
        bottom: 320px;
        right: 1rem;
        z-index: 1200;
        background: #007bff;
        border: none;
        color: white;
        border-radius: 50%;
        width: 56px;
        height: 56px;
        font-size: 1.8rem;
        cursor: pointer;
        box-shadow: 0 3px 10px rgb(0 0 0 / 0.3);
        user-select: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
      }
      #cart-toggle-btn:hover, #cart-toggle-btn:focus {
        background: #0056b3;
        outline: none;
      }
      #cart-toggle-btn:focus-visible {
        outline: 3px solid #80bdff;
        outline-offset: 2px;
      }
    }
  </style>
</head>
<body>
  <header class="text-center">
    <h1>Loja Exclusiva</h1>
  </header>

  <main>
    <div class="position-relative mb-4">
      <input
        id="filter-input"
        type="search"
        placeholder="Procure por café, café moído, café em grãos, chá..."
        aria-label="Filtro de produtos"
        autocomplete="off"
      />
      <i id="filter-icon" class="bi bi-search"></i>
    </div>

    <section id="product-list" role="list" aria-label="Lista de produtos">
      <article
        class="product-card"
        role="listitem"
        tabindex="0"
        data-name="Café Moído"
        data-price="8.50"
        data-img="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=400&q=80"
        data-bs-toggle="modal"
        data-bs-target="#productModal"
        aria-describedby="modal-name modal-price"
      >
        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=400&q=80" alt="Pacote de café moído" loading="lazy" />
        <div class="product-info">
          <h3>Café Moído</h3>
          <p class="product-price">€ 8,50</p>
          <button
            class="add-to-cart"
            type="button"
            data-name="Café Moído"
            data-price="8.50"
            aria-label="Adicionar Café Moído ao carrinho"
          >
            <i class="bi bi-cart-plus"></i> Adicionar
          </button>
        </div>
      </article>

      <article
        class="product-card"
        role="listitem"
        tabindex="0"
        data-name="Café em Grãos"
        data-price="9.20"
        data-img="https://images.unsplash.com/photo-1470337458703-46ad1756a187?auto=format&fit=crop&w=400&q=80"
        data-bs-toggle="modal"
        data-bs-target="#productModal"
        aria-describedby="modal-name modal-price"
      >
        <img src="https://images.unsplash.com/photo-1470337458703-46ad1756a187?auto=format&fit=crop&w=400&q=80" alt="Grãos de café" loading="lazy" />
        <div class="product-info">
          <h3>Café em Grãos</h3>
          <p class="product-price">€ 9,20</p>
          <button
            class="add-to-cart"
            type="button"
            data-name="Café em Grãos"
            data-price="9.20"
            aria-label="Adicionar Café em Grãos ao carrinho"
          >
            <i class="bi bi-cart-plus"></i> Adicionar
          </button>
        </div>
      </article>

      <article
        class="product-card"
        role="listitem"
        tabindex="0"
        data-name="Chá Verde"
        data-price="5.00"
        data-img="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=400&q=80"
        data-bs-toggle="modal"
        data-bs-target="#productModal"
        aria-describedby="modal-name modal-price"
      >
        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=400&q=80" alt="Xícara de chá verde" loading="lazy" />
        <div class="product-info">
          <h3>Chá Verde</h3>
          <p class="product-price">€ 5,00</p>
          <button
            class="add-to-cart"
            type="button"
            data-name="Chá Verde"
            data-price="5.00"
            aria-label="Adicionar Chá Verde ao carrinho"
          >
            <i class="bi bi-cart-plus"></i> Adicionar
          </button>
        </div>
      </article>

      <article
        class="product-card"
        role="listitem"
        tabindex="0"
        data-name="Granola Artesanal"
        data-price="7.80"
        data-img="https://images.unsplash.com/photo-1571689936159-76e6a8a3c045?auto=format&fit=crop&w=400&q=80"
        data-bs-toggle="modal"
        data-bs-target="#productModal"
        aria-describedby="modal-name modal-price"
      >
        <img src="https://images.unsplash.com/photo-1571689936159-76e6a8a3c045?auto=format&fit=crop&w=400&q=80" alt="Pote de Granola Artesanal" loading="lazy" />
        <div class="product-info">
          <h3>Granola Artesanal</h3>
          <p class="product-price">€ 7,80</p>
          <button
            class="add-to-cart"
            type="button"
            data-name="Granola Artesanal"
            data-price="7.80"
            aria-label="Adicionar Granola Artesanal ao carrinho"
          >
            <i class="bi bi-cart-plus"></i> Adicionar
          </button>
        </div>
      </article>
    </section>
  </main>

  <!-- Carrinho fixo lateral -->
  <aside id="cart-sidebar" aria-label="Carrinho de compras" aria-live="polite" aria-atomic="true">
    <h2>Carrinho</h2>
    <ul id="cart-list" tabindex="0"></ul>
    <p id="cart-total" aria-live="polite">Total: € 0.00</p>
    <button id="checkout-btn" type="button" disabled>Finalizar Compra</button>
  </aside>

  <!-- Botão para abrir/fechar carrinho no mobile -->
  <button id="cart-toggle-btn" aria-label="Abrir carrinho de compras" aria-expanded="false">
    <i class="bi bi-cart3"></i>
  </button>

  <!-- Modal de produto -->
  <div
    class="modal fade"
    id="productModal"
    tabindex="-1"
    aria-labelledby="modal-name"
    aria-describedby="modal-price"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-name">Nome do Produto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <img id="modal-img" src="" alt="" style="width:100%; border-radius: 8px; margin-bottom: 1rem;" />
          <p id="modal-price" style="font-weight: 600; font-size: 1.3rem; color: #28a745;"></p>
          <p id="modal-desc">Descrição detalhada do produto.</p>
        </div>
        <div class="modal-footer">
          <button id="modal-add-cart" type="button" class="btn btn-primary">
            <i class="bi bi-cart-plus"></i> Adicionar ao carrinho
          </button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS Bundle + Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    (() => {
      const filterInput = document.getElementById('filter-input');
      const productList = document.getElementById('product-list');
      const products = [...productList.querySelectorAll('.product-card')];
      const cartList = document.getElementById('cart-list');
      const cartTotal = document.getElementById('cart-total');
      const checkoutBtn = document.getElementById('checkout-btn');
      const cartSidebar = document.getElementById('cart-sidebar');
      const cartToggleBtn = document.getElementById('cart-toggle-btn');

      // Carrinho: { 'nome do produto': {price: number, quantity: number} }
      const cart = {};

      // Filtro produtos
      filterInput.addEventListener('input', e => {
        const term = e.target.value.toLowerCase().trim();
        products.forEach(prod => {
          const name = prod.dataset.name.toLowerCase();
          if (name.includes(term)) {
            prod.style.display = '';
          } else {
            prod.style.display = 'none';
          }
        });
      });

      // Atualiza exibição do carrinho
      function updateCartDisplay() {
        cartList.innerHTML = '';
        let total = 0;
        const productNames = Object.keys(cart);

        if (productNames.length === 0) {
          cartList.innerHTML = '<li>Seu carrinho está vazio.</li>';
          checkoutBtn.disabled = true;
          cartTotal.textContent = 'Total: € 0.00';
          return;
        }

        productNames.forEach(name => {
          const item = cart[name];
          const itemTotal = item.price * item.quantity;
          total += itemTotal;

          const li = document.createElement('li');
          li.textContent = `${name} — ${item.quantity} × €${item.price.toFixed(2)} = €${itemTotal.toFixed(2)}`;

          // Botões para alterar quantidade
          const btnDec = document.createElement('button');
          btnDec.textContent = '-';
          btnDec.setAttribute('aria-label', `Diminuir quantidade de ${name}`);
          btnDec.addEventListener('click', () => {
            if (item.quantity > 1) {
              item.quantity--;
            } else {
              delete cart[name];
            }
            updateCartDisplay();
          });

          const btnInc = document.createElement('button');
          btnInc.textContent = '+';
          btnInc.setAttribute('aria-label', `Aumentar quantidade de ${name}`);
          btnInc.addEventListener('click', () => {
            item.quantity++;
            updateCartDisplay();
          });

          li.appendChild(btnDec);
          li.appendChild(btnInc);
          cartList.appendChild(li);
        });

        cartTotal.textContent = `Total: € ${total.toFixed(2)}`;
        checkoutBtn.disabled = false;
      }

      // Adicionar ao carrinho via botões nas cards
      productList.addEventListener('click', e => {
        if (e.target.closest('.add-to-cart')) {
          const btn = e.target.closest('.add-to-cart');
          const name = btn.dataset.name;
          const price = parseFloat(btn.dataset.price);

          if (cart[name]) {
            cart[name].quantity++;
          } else {
            cart[name] = { price, quantity: 1 };
          }

          updateCartDisplay();
        }
      });

      // Modal para detalhes do produto
      const productModal = new bootstrap.Modal(document.getElementById('productModal'));
      let currentModalProduct = null;

      productList.addEventListener('click', e => {
        const card = e.target.closest('.product-card');
        if (!card) return;

        currentModalProduct = {
          name: card.dataset.name,
          price: card.dataset.price,
          img: card.dataset.img,
        };

        document.getElementById('modal-name').textContent = currentModalProduct.name;
        document.getElementById('modal-price').textContent = `€ ${parseFloat(currentModalProduct.price).toFixed(2)}`;
        document.getElementById('modal-img').src = currentModalProduct.img;
        document.getElementById('modal-img').alt = `Imagem do produto ${currentModalProduct.name}`;
        document.getElementById('modal-desc').textContent = `Descrição detalhada do ${currentModalProduct.name}.`;

        productModal.show();
      });

      // Botão "Adicionar ao carrinho" do modal
      document.getElementById('modal-add-cart').addEventListener('click', () => {
        if (!currentModalProduct) return;

        const { name, price } = currentModalProduct;
        if (cart[name]) {
          cart[name].quantity++;
        } else {
          cart[name] = { price: parseFloat(price), quantity: 1 };
        }
        updateCartDisplay();
        productModal.hide();
      });

      // Botão abrir/fechar carrinho mobile
      cartToggleBtn.addEventListener('click', () => {
        const expanded = cartToggleBtn.getAttribute('aria-expanded') === 'true';
        if (expanded) {
          cartSidebar.style.transform = 'translateX(100%)';
          cartToggleBtn.setAttribute('aria-expanded', 'false');
        } else {
          cartSidebar.style.transform = 'translateX(0)';
          cartToggleBtn.setAttribute('aria-expanded', 'true');
        }
      });

      // Inicialização
      updateCartDisplay();
    })();
  </script>
</body>
</html>
