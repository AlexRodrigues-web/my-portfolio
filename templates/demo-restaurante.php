<?php
declare(strict_types=1);

function e(string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$lang = $_GET['lang'] ?? 'pt';
$lang = in_array($lang, ['pt', 'es', 'en'], true) ? $lang : 'pt';

$ui = [
  'pt' => [
    'brand' => 'Bistrô Prime',
    'title' => 'Bistrô Prime — Restaurante, Menu Online, Reservas e Encomendas',
    'meta' => 'Template profissional para restaurante moderno com menu online, reservas, encomendas, checkout e área institucional.',
    'nav_home' => 'Início',
    'nav_menu' => 'Menu',
    'nav_reserve' => 'Reservas',
    'nav_about' => 'Sobre',
    'nav_contact' => 'Contacto',
    'nav_cart' => 'Carrinho',
    'hero_kicker' => 'Restaurant Commerce Template',
    'hero_title' => 'Jantar premium, pedido simples, reserva em segundos.',
    'hero_subtitle' => 'Um template completo para restaurantes modernos venderem pratos, aceitarem reservas e mostrarem a sua experiência com sofisticação.',
    'view_menu' => 'Ver Menu',
    'reserve_table' => 'Reservar Mesa',
    'open_today' => 'Aberto hoje',
    'delivery_time' => 'Entrega 30–45 min',
    'rating' => '4.9 avaliação',
    'hero_note' => 'Cozinha autoral · ingredientes locais · checkout linear',
    'quick_categories' => 'Explorar por momento',
    'featured_title' => 'Pratos que vendem a experiência',
    'featured_subtitle' => 'Destaques desenhados para compra rápida, com preço visível, badges úteis e botão de ação claro.',
    'menu_title' => 'Menu & Loja',
    'menu_subtitle' => 'Busca, categorias sticky e carrinho lateral no desktop. No mobile, o carrinho fica sempre ao alcance do polegar.',
    'search_placeholder' => 'Buscar prato, ingrediente ou categoria',
    'all' => 'Todos',
    'popular' => 'Popular',
    'new' => 'Novo',
    'spicy' => 'Picante',
    'vegan' => 'Vegan',
    'chef' => 'Chef',
    'add' => 'Adicionar',
    'details' => 'Ver prato',
    'ingredients' => 'Ingredientes',
    'allergens' => 'Alergénios',
    'extras' => 'Extras',
    'pairs' => 'Também combina com',
    'qty' => 'Quantidade',
    'cart_title' => 'O seu pedido',
    'cart_empty' => 'O carrinho ainda está vazio. Escolha um prato para começar.',
    'cart_notes' => 'Notas do pedido',
    'cart_notes_placeholder' => 'Ex.: sem cebola, ponto da carne, talheres...',
    'coupon' => 'Cupom',
    'coupon_placeholder' => 'PRIME10',
    'subtotal' => 'Subtotal',
    'delivery_fee' => 'Taxa de entrega',
    'service_fee' => 'Serviço',
    'total' => 'Total',
    'checkout' => 'Finalizar pedido',
    'continue_menu' => 'Continuar no menu',
    'checkout_title' => 'Checkout linear',
    'checkout_subtitle' => 'Quatro passos simples: cliente, entrega/levantamento, pagamento e confirmação.',
    'step_customer' => 'Cliente',
    'step_delivery' => 'Entrega',
    'step_payment' => 'Pagamento',
    'step_confirm' => 'Confirmar',
    'name' => 'Nome',
    'email' => 'Email',
    'phone' => 'Telefone',
    'delivery_or_pickup' => 'Como deseja receber?',
    'delivery' => 'Entrega',
    'pickup' => 'Levantamento',
    'address' => 'Morada',
    'time' => 'Horário',
    'payment_method' => 'Método de pagamento',
    'card' => 'Cartão',
    'cash' => 'Dinheiro',
    'mbway' => 'MB WAY',
    'next' => 'Avançar',
    'back' => 'Voltar',
    'place_order' => 'Confirmar encomenda',
    'reservation_title' => 'Reserva rápida',
    'reservation_subtitle' => 'Uma página própria para o restaurante físico, com estado de mesa e horários populares.',
    'date' => 'Data',
    'people' => 'Pessoas',
    'special_request' => 'Pedido especial',
    'available' => 'Mesa disponível',
    'popular_hours' => 'Horários populares',
    'confirm_reservation' => 'Confirmar reserva',
    'about_title' => 'Uma casa pensada para adaptar',
    'about_text' => 'Este bloco institucional vende a história, equipa, filosofia e ambiente do restaurante. O cliente troca fotos e texto sem desmontar o layout.',
    'chef_title' => 'Chef & equipa',
    'chef_text' => 'Cozinha de fogo baixo, pratos sazonais e uma carta pensada para delivery sem perder textura.',
    'local_title' => 'Ingredientes locais',
    'local_text' => 'Fornecedores selecionados, ervas frescas e produtos de época para reforçar confiança.',
    'experience_title' => 'Ambiente',
    'experience_text' => 'Galeria editorial, luz quente, reservas e contacto no mesmo fluxo.',
    'reviews_title' => 'Confiança antes do clique',
    'gallery_title' => 'Galeria gastronómica',
    'contact_title' => 'Contacto & localização',
    'address_label' => 'Morada',
    'hours_label' => 'Horário',
    'footer_text' => 'Template profissional para restaurante, loja gastronómica, takeout e reservas.',
    'order_confirmed' => 'Pedido confirmado',
    'reservation_confirmed' => 'Reserva confirmada',
    'order_number' => 'Número do pedido',
    'estimated_time' => 'Tempo estimado',
    'track_order' => 'Acompanhar pedido',
    'back_to_menu' => 'Voltar ao menu',
    'toast_added' => 'adicionado ao carrinho',
    'close' => 'Fechar',
    'empty_search' => 'Nenhum prato encontrado. Ajuste a busca ou escolha outra categoria.',
    'required_hint' => 'Preencha os campos principais para avançar.',
  ],
  'es' => [
    'brand' => 'Bistró Prime',
    'title' => 'Bistró Prime — Restaurante, Menú Online, Reservas y Pedidos',
    'meta' => 'Plantilla profesional para restaurante moderno con menú online, reservas, pedidos, checkout y área institucional.',
    'nav_home' => 'Inicio',
    'nav_menu' => 'Menú',
    'nav_reserve' => 'Reservas',
    'nav_about' => 'Sobre',
    'nav_contact' => 'Contacto',
    'nav_cart' => 'Carrito',
    'hero_kicker' => 'Restaurant Commerce Template',
    'hero_title' => 'Cena premium, pedido simple, reserva en segundos.',
    'hero_subtitle' => 'Una plantilla completa para que restaurantes modernos vendan platos, acepten reservas y muestren su experiencia con sofisticación.',
    'view_menu' => 'Ver Menú',
    'reserve_table' => 'Reservar Mesa',
    'open_today' => 'Abierto hoy',
    'delivery_time' => 'Entrega 30–45 min',
    'rating' => '4.9 valoración',
    'hero_note' => 'Cocina de autor · ingredientes locales · checkout lineal',
    'quick_categories' => 'Explorar por momento',
    'featured_title' => 'Platos que venden la experiencia',
    'featured_subtitle' => 'Destacados diseñados para compra rápida, con precio visible, badges útiles y acción clara.',
    'menu_title' => 'Menú & Tienda',
    'menu_subtitle' => 'Búsqueda, categorías sticky y carrito lateral en desktop. En móvil, el carrito queda siempre al alcance del pulgar.',
    'search_placeholder' => 'Buscar plato, ingrediente o categoría',
    'all' => 'Todos',
    'popular' => 'Popular',
    'new' => 'Nuevo',
    'spicy' => 'Picante',
    'vegan' => 'Vegan',
    'chef' => 'Chef',
    'add' => 'Añadir',
    'details' => 'Ver plato',
    'ingredients' => 'Ingredientes',
    'allergens' => 'Alérgenos',
    'extras' => 'Extras',
    'pairs' => 'También combina con',
    'qty' => 'Cantidad',
    'cart_title' => 'Tu pedido',
    'cart_empty' => 'El carrito aún está vacío. Elige un plato para empezar.',
    'cart_notes' => 'Notas del pedido',
    'cart_notes_placeholder' => 'Ej.: sin cebolla, punto de la carne, cubiertos...',
    'coupon' => 'Cupón',
    'coupon_placeholder' => 'PRIME10',
    'subtotal' => 'Subtotal',
    'delivery_fee' => 'Tasa de entrega',
    'service_fee' => 'Servicio',
    'total' => 'Total',
    'checkout' => 'Finalizar pedido',
    'continue_menu' => 'Continuar en el menú',
    'checkout_title' => 'Checkout lineal',
    'checkout_subtitle' => 'Cuatro pasos simples: cliente, entrega/recogida, pago y confirmación.',
    'step_customer' => 'Cliente',
    'step_delivery' => 'Entrega',
    'step_payment' => 'Pago',
    'step_confirm' => 'Confirmar',
    'name' => 'Nombre',
    'email' => 'Email',
    'phone' => 'Teléfono',
    'delivery_or_pickup' => '¿Cómo deseas recibir?',
    'delivery' => 'Entrega',
    'pickup' => 'Recogida',
    'address' => 'Dirección',
    'time' => 'Hora',
    'payment_method' => 'Método de pago',
    'card' => 'Tarjeta',
    'cash' => 'Efectivo',
    'mbway' => 'MB WAY',
    'next' => 'Siguiente',
    'back' => 'Volver',
    'place_order' => 'Confirmar pedido',
    'reservation_title' => 'Reserva rápida',
    'reservation_subtitle' => 'Una página propia para el restaurante físico, con estado de mesa y horas populares.',
    'date' => 'Fecha',
    'people' => 'Personas',
    'special_request' => 'Petición especial',
    'available' => 'Mesa disponible',
    'popular_hours' => 'Horas populares',
    'confirm_reservation' => 'Confirmar reserva',
    'about_title' => 'Una casa pensada para adaptar',
    'about_text' => 'Este bloque institucional vende la historia, equipo, filosofía y ambiente del restaurante. El cliente cambia fotos y texto sin romper el layout.',
    'chef_title' => 'Chef & equipo',
    'chef_text' => 'Cocina de fuego lento, platos de temporada y una carta pensada para delivery sin perder textura.',
    'local_title' => 'Ingredientes locales',
    'local_text' => 'Proveedores seleccionados, hierbas frescas y productos de temporada para reforzar confianza.',
    'experience_title' => 'Ambiente',
    'experience_text' => 'Galería editorial, luz cálida, reservas y contacto en el mismo flujo.',
    'reviews_title' => 'Confianza antes del clic',
    'gallery_title' => 'Galería gastronómica',
    'contact_title' => 'Contacto & ubicación',
    'address_label' => 'Dirección',
    'hours_label' => 'Horario',
    'footer_text' => 'Plantilla profesional para restaurante, tienda gastronómica, takeout y reservas.',
    'order_confirmed' => 'Pedido confirmado',
    'reservation_confirmed' => 'Reserva confirmada',
    'order_number' => 'Número de pedido',
    'estimated_time' => 'Tiempo estimado',
    'track_order' => 'Seguir pedido',
    'back_to_menu' => 'Volver al menú',
    'toast_added' => 'añadido al carrito',
    'close' => 'Cerrar',
    'empty_search' => 'No se encontró ningún plato. Ajusta la búsqueda o elige otra categoría.',
    'required_hint' => 'Completa los campos principales para avanzar.',
  ],
  'en' => [
    'brand' => 'Bistro Prime',
    'title' => 'Bistro Prime — Restaurant, Online Menu, Reservations and Orders',
    'meta' => 'Professional template for a modern restaurant with online menu, reservations, orders, checkout and institutional pages.',
    'nav_home' => 'Home',
    'nav_menu' => 'Menu',
    'nav_reserve' => 'Reservations',
    'nav_about' => 'About',
    'nav_contact' => 'Contact',
    'nav_cart' => 'Cart',
    'hero_kicker' => 'Restaurant Commerce Template',
    'hero_title' => 'Premium dining, simple ordering, table booking in seconds.',
    'hero_subtitle' => 'A complete template for modern restaurants to sell dishes, accept reservations and present their experience with sophistication.',
    'view_menu' => 'View Menu',
    'reserve_table' => 'Book a Table',
    'open_today' => 'Open today',
    'delivery_time' => 'Delivery 30–45 min',
    'rating' => '4.9 rating',
    'hero_note' => 'Signature kitchen · local ingredients · linear checkout',
    'quick_categories' => 'Explore by moment',
    'featured_title' => 'Dishes that sell the experience',
    'featured_subtitle' => 'Featured dishes designed for quick purchase, with visible price, useful badges and clear action.',
    'menu_title' => 'Menu & Shop',
    'menu_subtitle' => 'Search, sticky categories and desktop side cart. On mobile, the cart stays within thumb reach.',
    'search_placeholder' => 'Search dish, ingredient or category',
    'all' => 'All',
    'popular' => 'Popular',
    'new' => 'New',
    'spicy' => 'Spicy',
    'vegan' => 'Vegan',
    'chef' => 'Chef',
    'add' => 'Add',
    'details' => 'View dish',
    'ingredients' => 'Ingredients',
    'allergens' => 'Allergens',
    'extras' => 'Extras',
    'pairs' => 'Pairs well with',
    'qty' => 'Quantity',
    'cart_title' => 'Your order',
    'cart_empty' => 'Your cart is still empty. Choose a dish to start.',
    'cart_notes' => 'Order notes',
    'cart_notes_placeholder' => 'E.g.: no onion, meat temperature, cutlery...',
    'coupon' => 'Coupon',
    'coupon_placeholder' => 'PRIME10',
    'subtotal' => 'Subtotal',
    'delivery_fee' => 'Delivery fee',
    'service_fee' => 'Service',
    'total' => 'Total',
    'checkout' => 'Checkout',
    'continue_menu' => 'Continue menu',
    'checkout_title' => 'Linear checkout',
    'checkout_subtitle' => 'Four simple steps: customer, delivery/pickup, payment and confirmation.',
    'step_customer' => 'Customer',
    'step_delivery' => 'Delivery',
    'step_payment' => 'Payment',
    'step_confirm' => 'Confirm',
    'name' => 'Name',
    'email' => 'Email',
    'phone' => 'Phone',
    'delivery_or_pickup' => 'How would you like to receive it?',
    'delivery' => 'Delivery',
    'pickup' => 'Pickup',
    'address' => 'Address',
    'time' => 'Time',
    'payment_method' => 'Payment method',
    'card' => 'Card',
    'cash' => 'Cash',
    'mbway' => 'MB WAY',
    'next' => 'Next',
    'back' => 'Back',
    'place_order' => 'Place order',
    'reservation_title' => 'Quick reservation',
    'reservation_subtitle' => 'A dedicated page for the physical restaurant, with table status and popular hours.',
    'date' => 'Date',
    'people' => 'People',
    'special_request' => 'Special request',
    'available' => 'Table available',
    'popular_hours' => 'Popular hours',
    'confirm_reservation' => 'Confirm reservation',
    'about_title' => 'A restaurant template built to adapt',
    'about_text' => 'This institutional block sells the restaurant story, team, philosophy and atmosphere. Clients can replace photos and copy without breaking the layout.',
    'chef_title' => 'Chef & team',
    'chef_text' => 'Slow-fire cooking, seasonal dishes and a delivery-ready menu that preserves texture.',
    'local_title' => 'Local ingredients',
    'local_text' => 'Selected suppliers, fresh herbs and seasonal products to reinforce trust.',
    'experience_title' => 'Atmosphere',
    'experience_text' => 'Editorial gallery, warm lighting, reservations and contact in the same flow.',
    'reviews_title' => 'Trust before the click',
    'gallery_title' => 'Gastronomic gallery',
    'contact_title' => 'Contact & location',
    'address_label' => 'Address',
    'hours_label' => 'Opening hours',
    'footer_text' => 'Professional template for restaurant, gastronomic shop, takeout and reservations.',
    'order_confirmed' => 'Order confirmed',
    'reservation_confirmed' => 'Reservation confirmed',
    'order_number' => 'Order number',
    'estimated_time' => 'Estimated time',
    'track_order' => 'Track order',
    'back_to_menu' => 'Back to menu',
    'toast_added' => 'added to cart',
    'close' => 'Close',
    'empty_search' => 'No dish found. Adjust the search or choose another category.',
    'required_hint' => 'Fill the main fields to continue.',
  ],
];

$categories = [
  'starters' => ['pt' => 'Entradas', 'es' => 'Entrantes', 'en' => 'Starters'],
  'mains' => ['pt' => 'Pratos principais', 'es' => 'Platos principales', 'en' => 'Main dishes'],
  'burgers' => ['pt' => 'Burgers', 'es' => 'Burgers', 'en' => 'Burgers'],
  'pasta' => ['pt' => 'Massas', 'es' => 'Pastas', 'en' => 'Pasta'],
  'grill' => ['pt' => 'Grill', 'es' => 'Grill', 'en' => 'Grill'],
  'desserts' => ['pt' => 'Sobremesas', 'es' => 'Postres', 'en' => 'Desserts'],
  'drinks' => ['pt' => 'Bebidas', 'es' => 'Bebidas', 'en' => 'Drinks'],
  'specials' => ['pt' => 'Menus especiais', 'es' => 'Menús especiales', 'en' => 'Special menus'],
];

$moments = [
  ['icon' => '✦', 'title' => ['pt' => 'Jantar a dois', 'es' => 'Cena para dos', 'en' => 'Dinner for two'], 'text' => ['pt' => 'Pratos premium e vinho.', 'es' => 'Platos premium y vino.', 'en' => 'Premium dishes and wine.']],
  ['icon' => '↯', 'title' => ['pt' => 'Pedido rápido', 'es' => 'Pedido rápido', 'en' => 'Quick order'], 'text' => ['pt' => 'Entrega sem fricção.', 'es' => 'Entrega sin fricción.', 'en' => 'Frictionless delivery.']],
  ['icon' => '☉', 'title' => ['pt' => 'Almoço executivo', 'es' => 'Almuerzo ejecutivo', 'en' => 'Executive lunch'], 'text' => ['pt' => 'Menus equilibrados.', 'es' => 'Menús equilibrados.', 'en' => 'Balanced menus.']],
  ['icon' => '♨', 'title' => ['pt' => 'Chef experience', 'es' => 'Chef experience', 'en' => 'Chef experience'], 'text' => ['pt' => 'Sugestões da casa.', 'es' => 'Sugerencias de la casa.', 'en' => 'House selections.']],
];

$dishes = [
  [
    'id' => 'pato-laranja',
    'category' => 'mains',
    'price' => 24.90,
    'image' => 'https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=980&q=82',
    'badges' => ['popular', 'chef'],
    'name' => ['pt' => 'Pato lacado com laranja brava', 'es' => 'Pato lacado con naranja brava', 'en' => 'Glazed duck with bitter orange'],
    'desc' => ['pt' => 'Peito de pato selado, molho cítrico reduzido, legumes de forno e ervas frescas.', 'es' => 'Pechuga de pato sellada, salsa cítrica reducida, verduras al horno y hierbas frescas.', 'en' => 'Seared duck breast, reduced citrus sauce, roasted vegetables and fresh herbs.'],
    'ingredients' => ['pt' => ['Pato', 'Laranja', 'Legumes assados', 'Ervas'], 'es' => ['Pato', 'Naranja', 'Verduras asadas', 'Hierbas'], 'en' => ['Duck', 'Orange', 'Roasted vegetables', 'Herbs']],
    'allergens' => ['pt' => ['Sulfitos'], 'es' => ['Sulfitos'], 'en' => ['Sulphites']],
    'extras' => ['pt' => ['Batata rústica', 'Molho extra', 'Salada verde'], 'es' => ['Patata rústica', 'Salsa extra', 'Ensalada verde'], 'en' => ['Rustic potatoes', 'Extra sauce', 'Green salad']],
  ],
  [
    'id' => 'ravioli-lagosta',
    'category' => 'pasta',
    'price' => 22.50,
    'image' => 'https://images.unsplash.com/photo-1551183053-bf91a1d81141?auto=format&fit=crop&w=980&q=82',
    'badges' => ['new', 'chef'],
    'name' => ['pt' => 'Ravioli de lagosta e manteiga de ervas', 'es' => 'Ravioli de langosta y mantequilla de hierbas', 'en' => 'Lobster ravioli with herb butter'],
    'desc' => ['pt' => 'Massa fresca recheada, manteiga aromática, raspa de limão e finalização cremosa.', 'es' => 'Pasta fresca rellena, mantequilla aromática, ralladura de limón y acabado cremoso.', 'en' => 'Fresh stuffed pasta, aromatic butter, lemon zest and a creamy finish.'],
    'ingredients' => ['pt' => ['Lagosta', 'Massa fresca', 'Manteiga', 'Limão'], 'es' => ['Langosta', 'Pasta fresca', 'Mantequilla', 'Limón'], 'en' => ['Lobster', 'Fresh pasta', 'Butter', 'Lemon']],
    'allergens' => ['pt' => ['Glúten', 'Crustáceos', 'Lactose'], 'es' => ['Gluten', 'Crustáceos', 'Lactosa'], 'en' => ['Gluten', 'Shellfish', 'Dairy']],
    'extras' => ['pt' => ['Parmesão', 'Pimenta preta', 'Pão artesanal'], 'es' => ['Parmesano', 'Pimienta negra', 'Pan artesanal'], 'en' => ['Parmesan', 'Black pepper', 'Artisan bread']],
  ],
  [
    'id' => 'tartare-salmao',
    'category' => 'starters',
    'price' => 15.80,
    'image' => 'https://images.unsplash.com/photo-1546039907-7fa05f864c02?auto=format&fit=crop&w=980&q=82',
    'badges' => ['popular'],
    'name' => ['pt' => 'Tartare de salmão, abacate e lima', 'es' => 'Tartar de salmón, aguacate y lima', 'en' => 'Salmon tartare with avocado and lime'],
    'desc' => ['pt' => 'Salmão fresco, abacate maduro, lima, cebolinho e crocante de sementes.', 'es' => 'Salmón fresco, aguacate maduro, lima, cebollino y crujiente de semillas.', 'en' => 'Fresh salmon, ripe avocado, lime, chives and seed crunch.'],
    'ingredients' => ['pt' => ['Salmão', 'Abacate', 'Lima', 'Sementes'], 'es' => ['Salmón', 'Aguacate', 'Lima', 'Semillas'], 'en' => ['Salmon', 'Avocado', 'Lime', 'Seeds']],
    'allergens' => ['pt' => ['Peixe', 'Sésamo'], 'es' => ['Pescado', 'Sésamo'], 'en' => ['Fish', 'Sesame']],
    'extras' => ['pt' => ['Tostadas', 'Molho cítrico', 'Microverdes'], 'es' => ['Tostadas', 'Salsa cítrica', 'Microbrotes'], 'en' => ['Toasts', 'Citrus dressing', 'Microgreens']],
  ],
  [
    'id' => 'burger-trufa',
    'category' => 'burgers',
    'price' => 16.40,
    'image' => 'https://images.unsplash.com/photo-1550547660-d9450f859349?auto=format&fit=crop&w=980&q=82',
    'badges' => ['popular'],
    'name' => ['pt' => 'Burger de trufa, queijo curado e rúcula', 'es' => 'Burger de trufa, queso curado y rúcula', 'en' => 'Truffle burger with aged cheese and arugula'],
    'desc' => ['pt' => 'Blend da casa, queijo curado, maionese de trufa, rúcula e brioche tostado.', 'es' => 'Blend de la casa, queso curado, mayonesa de trufa, rúcula y brioche tostado.', 'en' => 'House blend, aged cheese, truffle mayo, arugula and toasted brioche.'],
    'ingredients' => ['pt' => ['Carne', 'Queijo curado', 'Trufa', 'Brioche'], 'es' => ['Carne', 'Queso curado', 'Trufa', 'Brioche'], 'en' => ['Beef', 'Aged cheese', 'Truffle', 'Brioche']],
    'allergens' => ['pt' => ['Glúten', 'Lactose', 'Ovo'], 'es' => ['Gluten', 'Lactosa', 'Huevo'], 'en' => ['Gluten', 'Dairy', 'Egg']],
    'extras' => ['pt' => ['Batata fina', 'Bacon artesanal', 'Queijo extra'], 'es' => ['Patata fina', 'Bacon artesanal', 'Queso extra'], 'en' => ['Shoestring fries', 'Artisan bacon', 'Extra cheese']],
  ],
  [
    'id' => 'risotto-cogumelos',
    'category' => 'mains',
    'price' => 18.90,
    'image' => 'https://images.unsplash.com/photo-1476124369491-e7addf5db371?auto=format&fit=crop&w=980&q=82',
    'badges' => ['vegan', 'new'],
    'name' => ['pt' => 'Risotto de cogumelos e ervas verdes', 'es' => 'Risotto de setas y hierbas verdes', 'en' => 'Mushroom risotto with green herbs'],
    'desc' => ['pt' => 'Arroz cremoso, cogumelos salteados, caldo vegetal e óleo de ervas.', 'es' => 'Arroz cremoso, setas salteadas, caldo vegetal y aceite de hierbas.', 'en' => 'Creamy rice, sautéed mushrooms, vegetable stock and herb oil.'],
    'ingredients' => ['pt' => ['Arroz arbóreo', 'Cogumelos', 'Caldo vegetal', 'Ervas'], 'es' => ['Arroz arbóreo', 'Setas', 'Caldo vegetal', 'Hierbas'], 'en' => ['Arborio rice', 'Mushrooms', 'Vegetable stock', 'Herbs']],
    'allergens' => ['pt' => ['Pode conter frutos secos'], 'es' => ['Puede contener frutos secos'], 'en' => ['May contain nuts']],
    'extras' => ['pt' => ['Trufa laminada', 'Salada amarga', 'Pão de massa mãe'], 'es' => ['Trufa laminada', 'Ensalada amarga', 'Pan de masa madre'], 'en' => ['Shaved truffle', 'Bitter salad', 'Sourdough bread']],
  ],
  [
    'id' => 'grill-costa',
    'category' => 'grill',
    'price' => 28.00,
    'image' => 'https://images.unsplash.com/photo-1558030006-450675393462?auto=format&fit=crop&w=980&q=82',
    'badges' => ['chef'],
    'name' => ['pt' => 'Costela premium em fogo lento', 'es' => 'Costilla premium a fuego lento', 'en' => 'Slow-fire premium rib'],
    'desc' => ['pt' => 'Costela marinada por 12 horas, glace vinho tinto, legumes e sal fumado.', 'es' => 'Costilla marinada 12 horas, glaseado de vino tinto, verduras y sal ahumada.', 'en' => 'Rib marinated for 12 hours, red wine glaze, vegetables and smoked salt.'],
    'ingredients' => ['pt' => ['Costela', 'Vinho tinto', 'Legumes', 'Sal fumado'], 'es' => ['Costilla', 'Vino tinto', 'Verduras', 'Sal ahumada'], 'en' => ['Rib', 'Red wine', 'Vegetables', 'Smoked salt']],
    'allergens' => ['pt' => ['Sulfitos'], 'es' => ['Sulfitos'], 'en' => ['Sulphites']],
    'extras' => ['pt' => ['Puré cremoso', 'Molho barbecue da casa', 'Legumes extra'], 'es' => ['Puré cremoso', 'Barbacoa de la casa', 'Verduras extra'], 'en' => ['Creamy mash', 'House barbecue sauce', 'Extra vegetables']],
  ],
  [
    'id' => 'brownie-vinho',
    'category' => 'desserts',
    'price' => 8.70,
    'image' => 'https://images.unsplash.com/photo-1606313564200-e75d5e30476c?auto=format&fit=crop&w=980&q=82',
    'badges' => ['popular'],
    'name' => ['pt' => 'Brownie quente, vinho do Porto e baunilha', 'es' => 'Brownie caliente, Oporto y vainilla', 'en' => 'Warm brownie with port wine and vanilla'],
    'desc' => ['pt' => 'Chocolate intenso, redução de vinho do Porto e creme leve de baunilha.', 'es' => 'Chocolate intenso, reducción de Oporto y crema ligera de vainilla.', 'en' => 'Intense chocolate, port reduction and light vanilla cream.'],
    'ingredients' => ['pt' => ['Chocolate', 'Vinho do Porto', 'Baunilha', 'Cacau'], 'es' => ['Chocolate', 'Oporto', 'Vainilla', 'Cacao'], 'en' => ['Chocolate', 'Port wine', 'Vanilla', 'Cocoa']],
    'allergens' => ['pt' => ['Glúten', 'Lactose', 'Ovo'], 'es' => ['Gluten', 'Lactosa', 'Huevo'], 'en' => ['Gluten', 'Dairy', 'Egg']],
    'extras' => ['pt' => ['Gelado', 'Flor de sal', 'Frutos vermelhos'], 'es' => ['Helado', 'Flor de sal', 'Frutos rojos'], 'en' => ['Ice cream', 'Sea salt flakes', 'Red berries']],
  ],
  [
    'id' => 'spritz-ervas',
    'category' => 'drinks',
    'price' => 7.20,
    'image' => 'https://images.unsplash.com/photo-1560512823-829485b8bf24?auto=format&fit=crop&w=980&q=82',
    'badges' => ['new'],
    'name' => ['pt' => 'Spritz de ervas e citrinos', 'es' => 'Spritz de hierbas y cítricos', 'en' => 'Herb and citrus spritz'],
    'desc' => ['pt' => 'Cocktail fresco com notas herbais, citrinos, gelo grande e final seco.', 'es' => 'Cóctel fresco con notas herbales, cítricos, hielo grande y final seco.', 'en' => 'Fresh cocktail with herbal notes, citrus, large ice and dry finish.'],
    'ingredients' => ['pt' => ['Citrinos', 'Ervas', 'Água com gás', 'Bitter'], 'es' => ['Cítricos', 'Hierbas', 'Agua con gas', 'Bitter'], 'en' => ['Citrus', 'Herbs', 'Sparkling water', 'Bitter']],
    'allergens' => ['pt' => ['Sulfitos'], 'es' => ['Sulfitos'], 'en' => ['Sulphites']],
    'extras' => ['pt' => ['Sem álcool', 'Mais gelo', 'Alecrim extra'], 'es' => ['Sin alcohol', 'Más hielo', 'Romero extra'], 'en' => ['Alcohol-free', 'Extra ice', 'Extra rosemary']],
  ],
  [
    'id' => 'menu-degustacao',
    'category' => 'specials',
    'price' => 38.00,
    'image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=980&q=82',
    'badges' => ['chef', 'popular'],
    'name' => ['pt' => 'Menu Prime degustação', 'es' => 'Menú Prime degustación', 'en' => 'Prime tasting menu'],
    'desc' => ['pt' => 'Entrada, prato, sobremesa e bebida selecionados pela cozinha para uma experiência completa.', 'es' => 'Entrante, plato, postre y bebida seleccionados por la cocina para una experiencia completa.', 'en' => 'Starter, main, dessert and drink selected by the kitchen for a full experience.'],
    'ingredients' => ['pt' => ['Seleção sazonal', 'Produto local', 'Carta de vinhos'], 'es' => ['Selección de temporada', 'Producto local', 'Carta de vinos'], 'en' => ['Seasonal selection', 'Local produce', 'Wine list']],
    'allergens' => ['pt' => ['Consultar equipa'], 'es' => ['Consultar equipo'], 'en' => ['Ask the team']],
    'extras' => ['pt' => ['Harmonização', 'Mesa janela', 'Sem carne'], 'es' => ['Maridaje', 'Mesa ventana', 'Sin carne'], 'en' => ['Pairing', 'Window table', 'No meat']],
  ],
];

$reviews = [
  ['name' => 'Mariana L.', 'text' => ['pt' => 'Pedido rápido, pratos chegaram quentes e o visual do site passa confiança.', 'es' => 'Pedido rápido, platos calientes y el sitio transmite confianza.', 'en' => 'Fast order, hot dishes and the website feels trustworthy.'], 'score' => '4.9'],
  ['name' => 'Rui F.', 'text' => ['pt' => 'A reserva é simples e o menu é fácil de navegar no telemóvel.', 'es' => 'La reserva es simple y el menú es fácil de navegar en móvil.', 'en' => 'The reservation is simple and the menu is easy to browse on mobile.'], 'score' => '5.0'],
  ['name' => 'Sofia M.', 'text' => ['pt' => 'Parece restaurante premium, não uma página solta.', 'es' => 'Parece restaurante premium, no una página suelta.', 'en' => 'It feels like a premium restaurant, not a loose landing page.'], 'score' => '4.8'],
];

$gallery = [
  'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=900&q=80',
  'https://images.unsplash.com/photo-1559329007-40df8a9345d8?auto=format&fit=crop&w=900&q=80',
  'https://images.unsplash.com/photo-1528605248644-14dd04022da1?auto=format&fit=crop&w=900&q=80',
  'https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=900&q=80',
  'https://images.unsplash.com/photo-1551218808-94e220e084d2?auto=format&fit=crop&w=900&q=80',
  'https://images.unsplash.com/photo-1544148103-0773bf10d330?auto=format&fit=crop&w=900&q=80',
];

$text = $ui[$lang];
$today = date('Y-m-d');
$encodedDishes = json_encode($dishes, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$encodedCategories = json_encode($categories, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$encodedText = json_encode($text, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
<!DOCTYPE html>
<html lang="<?= e($lang) ?>">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="<?= e($text['meta']) ?>" />
  <title><?= e($text['title']) ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --bg: #11100E;
      --bg-warm: #1A1713;
      --card: #211D18;
      --cream: #FFF6E8;
      --muted: #B8A995;
      --gold: #D6A85A;
      --orange: #E86F32;
      --herb: #6F8F58;
      --wine: #7A2525;
      --border: rgba(255, 246, 232, 0.12);
      --shadow: 0 24px 70px rgba(0, 0, 0, 0.35);
      --serif: "Playfair Display", Georgia, serif;
      --sans: "Manrope", Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      --container: min(1180px, calc(100vw - 32px));
      --radius-lg: 34px;
      --radius-md: 22px;
      --radius-sm: 14px;
    }

    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      margin: 0;
      font-family: var(--sans);
      color: var(--cream);
      background:
        radial-gradient(circle at 12% 8%, rgba(214, 168, 90, .16), transparent 28rem),
        radial-gradient(circle at 85% 3%, rgba(232, 111, 50, .12), transparent 26rem),
        linear-gradient(160deg, var(--bg) 0%, #17130f 46%, var(--bg-warm) 100%);
      min-height: 100vh;
      overflow-x: hidden;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      z-index: -1;
      opacity: .35;
      background-image:
        linear-gradient(rgba(255,246,232,.035) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,246,232,.035) 1px, transparent 1px);
      background-size: 56px 56px;
      mask-image: linear-gradient(to bottom, #000, transparent 78%);
    }

    a { color: inherit; text-decoration: none; }
    button, input, select, textarea { font: inherit; }
    button { cursor: pointer; }
    img { max-width: 100%; display: block; }
    ::selection { background: rgba(232,111,50,.45); color: var(--cream); }

    .skip-link {
      position: absolute;
      top: -80px;
      left: 16px;
      z-index: 1000;
      padding: 12px 16px;
      border-radius: 999px;
      background: var(--orange);
      color: #160f0b;
      font-weight: 800;
    }
    .skip-link:focus { top: 16px; }

    .site-header {
      position: sticky;
      top: 0;
      z-index: 90;
      border-bottom: 1px solid transparent;
      transition: background .25s ease, border-color .25s ease, box-shadow .25s ease;
    }

    .site-header.is-scrolled {
      background: rgba(17, 16, 14, .78);
      backdrop-filter: blur(18px);
      border-color: var(--border);
      box-shadow: 0 14px 50px rgba(0,0,0,.28);
    }

    .nav-shell {
      width: var(--container);
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      min-height: 76px;
      gap: 18px;
    }

    .brand {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      min-width: max-content;
      font-weight: 900;
      letter-spacing: .02em;
    }

    .brand-mark {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      display: grid;
      place-items: center;
      color: #1A1713;
      background:
        radial-gradient(circle at 35% 22%, #FFF6E8 0 4px, transparent 5px),
        linear-gradient(135deg, var(--gold), var(--orange));
      box-shadow: 0 10px 30px rgba(232,111,50,.22);
    }

    .brand-name {
      font-family: var(--serif);
      font-size: clamp(1.15rem, 2vw, 1.45rem);
    }

    .desktop-nav {
      display: flex;
      align-items: center;
      gap: 4px;
      padding: 6px;
      border: 1px solid var(--border);
      background: rgba(255,246,232,.045);
      border-radius: 999px;
    }

    .desktop-nav a {
      padding: 10px 14px;
      color: var(--muted);
      font-size: .88rem;
      font-weight: 800;
      border-radius: 999px;
      transition: color .2s ease, background .2s ease;
    }

    .desktop-nav a:hover,
    .desktop-nav a:focus {
      color: var(--cream);
      background: rgba(255,246,232,.08);
      outline: none;
    }

    .nav-actions {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .language-switcher {
      display: flex;
      align-items: center;
      gap: 4px;
      padding: 4px;
      border-radius: 999px;
      border: 1px solid var(--border);
      background: rgba(255,246,232,.045);
    }

    .language-switcher a {
      width: 34px;
      height: 34px;
      display: grid;
      place-items: center;
      border-radius: 999px;
      color: var(--muted);
      font-size: .78rem;
      font-weight: 900;
      text-transform: uppercase;
    }

    .language-switcher a.is-active {
      color: #1A1713;
      background: var(--gold);
    }

    .cart-trigger,
    .menu-toggle,
    .icon-button {
      border: 1px solid var(--border);
      background: rgba(255,246,232,.06);
      color: var(--cream);
      border-radius: 999px;
      min-height: 44px;
      padding: 0 14px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-weight: 900;
      transition: transform .2s ease, border-color .2s ease, background .2s ease;
    }

    .cart-trigger:hover,
    .menu-toggle:hover,
    .icon-button:hover {
      transform: translateY(-1px);
      border-color: rgba(214,168,90,.4);
      background: rgba(255,246,232,.1);
    }

    .cart-count {
      min-width: 22px;
      height: 22px;
      padding: 0 6px;
      border-radius: 999px;
      display: grid;
      place-items: center;
      background: var(--orange);
      color: #170d08;
      font-size: .74rem;
      font-weight: 900;
    }

    .menu-toggle { display: none; width: 44px; padding: 0; }

    .mobile-nav {
      display: none;
      width: var(--container);
      margin: 0 auto 14px;
      border: 1px solid var(--border);
      border-radius: 24px;
      background: rgba(17,16,14,.96);
      overflow: hidden;
    }

    .mobile-nav a {
      display: flex;
      justify-content: space-between;
      padding: 16px;
      color: var(--muted);
      border-top: 1px solid var(--border);
      font-weight: 800;
    }

    .mobile-nav a:first-child { border-top: 0; }

    .hero {
      width: var(--container);
      min-height: calc(100vh - 90px);
      margin: 0 auto;
      display: grid;
      grid-template-columns: minmax(0, .92fr) minmax(360px, 1.08fr);
      gap: clamp(28px, 5vw, 68px);
      align-items: center;
      padding: 42px 0 76px;
      position: relative;
    }

    .hero-copy {
      display: grid;
      gap: 24px;
      max-width: 660px;
    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      width: fit-content;
      color: var(--gold);
      font-size: .78rem;
      font-weight: 900;
      letter-spacing: .18em;
      text-transform: uppercase;
    }

    .eyebrow::before {
      content: "";
      width: 36px;
      height: 1px;
      background: currentColor;
    }

    .hero h1,
    .section-title,
    .product-title {
      font-family: var(--serif);
      font-weight: 800;
      line-height: .92;
      letter-spacing: -.04em;
      text-wrap: balance;
    }

    .hero h1 {
      margin: 0;
      font-size: clamp(3.2rem, 8vw, 7.8rem);
      max-width: 780px;
    }

    .hero p {
      margin: 0;
      color: var(--muted);
      font-size: clamp(1rem, 1.8vw, 1.22rem);
      line-height: 1.75;
      max-width: 590px;
    }

    .hero-actions,
    .section-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      align-items: center;
    }

    .btn {
      min-height: 48px;
      padding: 0 20px;
      border-radius: 999px;
      border: 1px solid transparent;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      font-weight: 900;
      transition: transform .2s ease, box-shadow .2s ease, background .2s ease, border-color .2s ease;
      user-select: none;
    }

    .btn:hover { transform: translateY(-2px); }
    .btn:focus-visible { outline: 3px solid rgba(214,168,90,.45); outline-offset: 3px; }

    .btn-primary {
      color: #170d08;
      background: var(--orange);
      box-shadow: 0 18px 40px rgba(232,111,50,.24);
    }

    .btn-primary:hover { background: #ff7c39; }

    .btn-secondary {
      color: var(--cream);
      border-color: rgba(214,168,90,.34);
      background: rgba(214,168,90,.08);
    }

    .btn-quiet {
      color: var(--muted);
      border-color: var(--border);
      background: rgba(255,246,232,.05);
    }

    .hero-proof {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .proof-pill,
    .badge {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      border: 1px solid var(--border);
      background: rgba(255,246,232,.055);
      border-radius: 999px;
      padding: 9px 12px;
      color: var(--muted);
      font-size: .82rem;
      font-weight: 850;
    }

    .proof-pill strong,
    .badge strong {
      color: var(--cream);
    }

    .hero-visual {
      position: relative;
      min-height: 640px;
    }

    .plate-frame {
      position: absolute;
      inset: 0 0 54px 0;
      border-radius: 44px;
      overflow: hidden;
      background: var(--card);
      border: 1px solid var(--border);
      box-shadow: var(--shadow);
      transform: rotate(-1.4deg);
      isolation: isolate;
    }

    .plate-frame::before {
      content: "";
      position: absolute;
      inset: 0;
      z-index: 1;
      background:
        linear-gradient(180deg, rgba(17,16,14,.04), rgba(17,16,14,.78)),
        radial-gradient(circle at 78% 14%, transparent 0 140px, rgba(0,0,0,.42) 280px);
      pointer-events: none;
    }

    .plate-frame img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transform: scale(1.03);
    }

    .hero-ticket {
      position: absolute;
      left: -20px;
      bottom: 0;
      width: min(360px, 88%);
      padding: 20px;
      border-radius: 28px;
      border: 1px solid rgba(255,246,232,.16);
      background: rgba(33,29,24,.9);
      backdrop-filter: blur(18px);
      box-shadow: 0 22px 60px rgba(0,0,0,.4);
      transform: rotate(1deg);
    }

    .hero-ticket small {
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: .14em;
      font-weight: 900;
    }

    .hero-ticket h2 {
      margin: 8px 0 14px;
      font-size: 1.1rem;
    }

    .ticket-line {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      padding-top: 12px;
      border-top: 1px dashed rgba(255,246,232,.18);
      color: var(--muted);
      font-size: .88rem;
    }

    .ticket-line strong { color: var(--gold); }

    .floating-hours {
      position: absolute;
      right: -14px;
      top: 52px;
      padding: 14px 16px;
      border-radius: 999px;
      border: 1px solid rgba(214,168,90,.35);
      background: rgba(17,16,14,.7);
      backdrop-filter: blur(12px);
      box-shadow: 0 18px 44px rgba(0,0,0,.28);
      color: var(--cream);
      font-weight: 900;
    }

    main { overflow: clip; }

    .section {
      width: var(--container);
      margin: 0 auto;
      padding: clamp(62px, 9vw, 118px) 0;
    }

    .section-header {
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(220px, .42fr);
      align-items: end;
      gap: 24px;
      margin-bottom: 30px;
    }

    .section-title {
      font-size: clamp(2.2rem, 5vw, 4.8rem);
      margin: 0;
    }

    .section-subtitle {
      color: var(--muted);
      line-height: 1.7;
      margin: 16px 0 0;
      max-width: 760px;
    }

    .moments-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px;
    }

    .moment-tile {
      position: relative;
      min-height: 190px;
      padding: 22px;
      border: 1px solid var(--border);
      border-radius: 30px;
      background:
        radial-gradient(circle at 90% 10%, rgba(214,168,90,.16), transparent 120px),
        rgba(255,246,232,.045);
      overflow: hidden;
      transition: transform .22s ease, border-color .22s ease, background .22s ease;
    }

    .moment-tile:hover {
      transform: translateY(-5px);
      border-color: rgba(214,168,90,.35);
      background:
        radial-gradient(circle at 90% 10%, rgba(232,111,50,.18), transparent 120px),
        rgba(255,246,232,.07);
    }

    .moment-icon {
      width: 44px;
      height: 44px;
      display: grid;
      place-items: center;
      border-radius: 50%;
      background: rgba(214,168,90,.12);
      color: var(--gold);
      font-size: 1.2rem;
    }

    .moment-tile h3 {
      margin: 32px 0 8px;
      font-family: var(--serif);
      font-size: 1.35rem;
    }

    .moment-tile p {
      color: var(--muted);
      margin: 0;
      line-height: 1.55;
      font-size: .92rem;
    }

    .featured-layout {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 18px;
      align-items: stretch;
    }

    .feature-story {
      display: grid;
      grid-template-columns: .85fr 1fr;
      gap: 0;
      min-height: 490px;
      border-radius: 38px;
      overflow: hidden;
      border: 1px solid var(--border);
      background: var(--card);
      box-shadow: var(--shadow);
    }

    .feature-story img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .feature-copy {
      padding: clamp(26px, 4vw, 44px);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      gap: 20px;
      background:
        radial-gradient(circle at 90% 12%, rgba(214,168,90,.2), transparent 170px),
        linear-gradient(145deg, rgba(255,246,232,.08), transparent);
    }

    .feature-copy h3 {
      margin: 0;
      font-family: var(--serif);
      font-size: clamp(2rem, 4vw, 3.8rem);
      line-height: .95;
    }

    .feature-copy p {
      color: var(--muted);
      line-height: 1.7;
    }

    .feature-price {
      font-size: 2.25rem;
      color: var(--gold);
      font-weight: 900;
      letter-spacing: -.04em;
    }

    .stacked-features {
      display: grid;
      gap: 18px;
    }

    .mini-feature {
      min-height: 236px;
      display: grid;
      grid-template-columns: 148px 1fr;
      border-radius: 30px;
      overflow: hidden;
      border: 1px solid var(--border);
      background: rgba(255,246,232,.05);
    }

    .mini-feature img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .mini-feature div {
      padding: 22px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      gap: 12px;
    }

    .mini-feature h3 {
      margin: 0;
      font-family: var(--serif);
      font-size: 1.6rem;
      line-height: 1.05;
    }

    .mini-feature p {
      margin: 0;
      color: var(--muted);
      line-height: 1.5;
      font-size: .92rem;
    }

    .menu-shell {
      display: grid;
      grid-template-columns: minmax(0, 1fr) 360px;
      gap: 24px;
      align-items: start;
    }

    .menu-controls {
      position: sticky;
      top: 84px;
      z-index: 15;
      display: grid;
      gap: 14px;
      padding: 14px;
      margin-bottom: 18px;
      border: 1px solid var(--border);
      border-radius: 28px;
      background: rgba(17,16,14,.72);
      backdrop-filter: blur(18px);
    }

    .search-box {
      position: relative;
    }

    .search-box input {
      width: 100%;
      min-height: 50px;
      padding: 0 18px 0 46px;
      border: 1px solid var(--border);
      border-radius: 999px;
      color: var(--cream);
      background: rgba(255,246,232,.06);
      outline: none;
      transition: border-color .2s ease, box-shadow .2s ease;
    }

    .search-box input:focus {
      border-color: rgba(214,168,90,.5);
      box-shadow: 0 0 0 4px rgba(214,168,90,.08);
    }

    .search-box span {
      position: absolute;
      left: 17px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gold);
    }

    .category-tabs {
      display: flex;
      gap: 8px;
      overflow-x: auto;
      scrollbar-width: none;
      padding-bottom: 1px;
    }

    .category-tabs::-webkit-scrollbar { display: none; }

    .category-tab {
      flex: 0 0 auto;
      border: 1px solid var(--border);
      border-radius: 999px;
      min-height: 42px;
      padding: 0 14px;
      background: rgba(255,246,232,.045);
      color: var(--muted);
      font-weight: 900;
      font-size: .86rem;
      transition: background .2s ease, color .2s ease, border-color .2s ease;
    }

    .category-tab.is-active {
      color: #17100c;
      background: var(--gold);
      border-color: transparent;
    }

    .menu-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 16px;
    }

    .dish-card {
      position: relative;
      min-height: 420px;
      display: flex;
      flex-direction: column;
      border: 1px solid var(--border);
      border-radius: 32px;
      background: rgba(255,246,232,.045);
      overflow: hidden;
      transition: transform .22s ease, border-color .22s ease, background .22s ease, opacity .25s ease;
    }

    .dish-card.is-hidden { display: none; }

    .dish-card:hover {
      transform: translateY(-5px);
      border-color: rgba(214,168,90,.35);
      background: rgba(255,246,232,.07);
    }

    .dish-image {
      position: relative;
      height: 228px;
      overflow: hidden;
      background: rgba(255,246,232,.06);
    }

    .dish-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform .55s ease;
    }

    .dish-card:hover .dish-image img { transform: scale(1.06); }

    .dish-badges {
      position: absolute;
      left: 12px;
      top: 12px;
      right: 12px;
      display: flex;
      flex-wrap: wrap;
      gap: 7px;
    }

    .dish-badges .badge {
      padding: 7px 9px;
      font-size: .72rem;
      color: var(--cream);
      background: rgba(17,16,14,.68);
      backdrop-filter: blur(10px);
    }

    .dish-body {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 12px;
      padding: 20px;
    }

    .dish-meta {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      color: var(--gold);
      font-size: .78rem;
      text-transform: uppercase;
      letter-spacing: .12em;
      font-weight: 900;
    }

    .dish-title {
      margin: 0;
      font-family: var(--serif);
      font-size: 1.65rem;
      line-height: 1.02;
      letter-spacing: -.02em;
    }

    .dish-desc {
      margin: 0;
      color: var(--muted);
      line-height: 1.55;
      font-size: .93rem;
    }

    .dish-footer {
      margin-top: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
    }

    .price {
      color: var(--gold);
      font-size: 1.25rem;
      font-weight: 950;
      letter-spacing: -.02em;
      white-space: nowrap;
    }

    .dish-actions {
      display: flex;
      gap: 8px;
      align-items: center;
    }

    .round-action {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      border: 1px solid var(--border);
      background: rgba(255,246,232,.06);
      color: var(--cream);
      display: grid;
      place-items: center;
      font-weight: 900;
      transition: background .2s ease, transform .2s ease;
    }

    .round-action:hover {
      transform: translateY(-2px);
      background: var(--orange);
      color: #160f0b;
    }

    .empty-state {
      display: none;
      padding: 32px;
      border: 1px dashed rgba(214,168,90,.4);
      border-radius: 28px;
      color: var(--muted);
      background: rgba(214,168,90,.06);
    }

    .empty-state.is-visible { display: block; }

    .cart-panel {
      position: sticky;
      top: 84px;
      border: 1px solid rgba(214,168,90,.26);
      border-radius: 32px;
      background:
        radial-gradient(circle at 100% 0%, rgba(214,168,90,.12), transparent 160px),
        rgba(33,29,24,.86);
      box-shadow: var(--shadow);
      overflow: hidden;
    }

    .cart-panel-header,
    .cart-panel-footer {
      padding: 20px;
      border-bottom: 1px solid var(--border);
    }

    .cart-panel-footer {
      border-top: 1px solid var(--border);
      border-bottom: 0;
    }

    .cart-panel-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 14px;
    }

    .cart-panel h3 {
      margin: 0;
      font-family: var(--serif);
      font-size: 1.7rem;
    }

    .cart-items {
      display: grid;
      gap: 0;
      max-height: 390px;
      overflow: auto;
    }

    .cart-empty {
      padding: 26px 20px;
      color: var(--muted);
      line-height: 1.6;
    }

    .cart-item {
      display: grid;
      grid-template-columns: 58px 1fr;
      gap: 12px;
      padding: 16px 20px;
      border-bottom: 1px solid var(--border);
    }

    .cart-item img {
      width: 58px;
      height: 58px;
      border-radius: 16px;
      object-fit: cover;
    }

    .cart-item h4 {
      margin: 0 0 4px;
      font-size: .92rem;
      line-height: 1.25;
    }

    .cart-item-row {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      align-items: center;
      color: var(--muted);
      font-size: .82rem;
    }

    .qty-control {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      border: 1px solid var(--border);
      border-radius: 999px;
      padding: 4px;
      background: rgba(255,246,232,.04);
    }

    .qty-control button {
      width: 26px;
      height: 26px;
      border-radius: 50%;
      border: 0;
      color: var(--cream);
      background: rgba(255,246,232,.08);
      font-weight: 900;
    }

    .qty-control span {
      min-width: 18px;
      text-align: center;
      font-weight: 900;
    }

    .cart-form {
      display: grid;
      gap: 12px;
      padding: 18px 20px 0;
    }

    .field {
      display: grid;
      gap: 8px;
    }

    .field label {
      color: var(--muted);
      font-size: .82rem;
      font-weight: 900;
    }

    .field input,
    .field textarea,
    .field select {
      width: 100%;
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 13px 14px;
      color: var(--cream);
      background: rgba(255,246,232,.055);
      outline: none;
      transition: border-color .2s ease, box-shadow .2s ease;
    }

    .field textarea {
      resize: vertical;
      min-height: 72px;
    }

    .field input:focus,
    .field textarea:focus,
    .field select:focus {
      border-color: rgba(214,168,90,.54);
      box-shadow: 0 0 0 4px rgba(214,168,90,.08);
    }

    .totals {
      display: grid;
      gap: 8px;
      margin-bottom: 16px;
    }

    .total-row {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      color: var(--muted);
      font-size: .9rem;
    }

    .total-row strong {
      color: var(--cream);
      font-size: 1.12rem;
    }

    .total-row.final {
      padding-top: 10px;
      border-top: 1px dashed var(--border);
      color: var(--cream);
    }

    .total-row.final strong {
      color: var(--gold);
      font-size: 1.45rem;
    }

    .cart-drawer-backdrop,
    .product-backdrop {
      position: fixed;
      inset: 0;
      z-index: 120;
      display: none;
      background: rgba(0,0,0,.54);
      backdrop-filter: blur(4px);
    }

    .cart-drawer-backdrop.is-open,
    .product-backdrop.is-open { display: block; }

    .cart-drawer,
    .product-drawer {
      position: fixed;
      top: 0;
      right: 0;
      z-index: 121;
      width: min(520px, 100vw);
      height: 100dvh;
      display: flex;
      flex-direction: column;
      transform: translateX(105%);
      transition: transform .28s ease;
      border-left: 1px solid var(--border);
      background:
        radial-gradient(circle at 100% 0%, rgba(214,168,90,.16), transparent 200px),
        var(--bg-warm);
      box-shadow: -28px 0 80px rgba(0,0,0,.45);
    }

    .cart-drawer.is-open,
    .product-drawer.is-open { transform: translateX(0); }

    .drawer-scroll {
      overflow: auto;
      flex: 1;
    }

    .drawer-header {
      padding: 18px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      border-bottom: 1px solid var(--border);
    }

    .drawer-header h3 {
      margin: 0;
      font-family: var(--serif);
      font-size: 1.55rem;
    }

    .product-hero {
      position: relative;
      min-height: 320px;
      overflow: hidden;
      background: rgba(255,246,232,.05);
    }

    .product-hero img {
      width: 100%;
      height: 360px;
      object-fit: cover;
    }

    .product-content {
      padding: 22px;
      display: grid;
      gap: 20px;
    }

    .product-title {
      margin: 0;
      font-size: clamp(2.2rem, 8vw, 4.2rem);
    }

    .product-desc {
      color: var(--muted);
      line-height: 1.7;
      margin: 0;
    }

    .product-facts {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
    }

    .fact-box {
      padding: 16px;
      border: 1px solid var(--border);
      border-radius: 20px;
      background: rgba(255,246,232,.045);
    }

    .fact-box h4 {
      margin: 0 0 10px;
      color: var(--gold);
      font-size: .82rem;
      text-transform: uppercase;
      letter-spacing: .12em;
    }

    .fact-box ul {
      margin: 0;
      padding-left: 18px;
      color: var(--muted);
      line-height: 1.8;
    }

    .product-buy {
      position: sticky;
      bottom: 0;
      padding: 16px 22px 22px;
      border-top: 1px solid var(--border);
      background: rgba(26,23,19,.92);
      backdrop-filter: blur(16px);
    }

    .product-buy-row {
      display: grid;
      grid-template-columns: 130px 1fr;
      gap: 12px;
    }

    .quantity-box {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border: 1px solid var(--border);
      border-radius: 999px;
      padding: 4px;
      background: rgba(255,246,232,.055);
    }

    .quantity-box button {
      width: 38px;
      height: 38px;
      border: 0;
      border-radius: 50%;
      background: rgba(255,246,232,.08);
      color: var(--cream);
      font-weight: 900;
    }

    .quantity-box span { font-weight: 950; }

    .checkout-layout {
      display: grid;
      grid-template-columns: minmax(0, 1fr) 380px;
      gap: 24px;
      align-items: start;
    }

    .checkout-card,
    .reservation-card,
    .about-card,
    .contact-card,
    .review-card {
      border: 1px solid var(--border);
      border-radius: 34px;
      background: rgba(255,246,232,.045);
      overflow: hidden;
      box-shadow: 0 18px 60px rgba(0,0,0,.18);
    }

    .checkout-card {
      padding: clamp(20px, 3vw, 34px);
    }

    .stepper {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 8px;
      margin-bottom: 24px;
    }

    .step-dot {
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 12px;
      color: var(--muted);
      background: rgba(255,246,232,.04);
      font-size: .8rem;
      font-weight: 900;
      text-align: center;
    }

    .step-dot.is-active {
      color: #17100c;
      background: var(--gold);
      border-color: transparent;
    }

    .checkout-step { display: none; }
    .checkout-step.is-active {
      display: grid;
      gap: 16px;
    }

    .form-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 14px;
    }

    .choice-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 12px;
    }

    .choice {
      position: relative;
      display: grid;
      gap: 6px;
      padding: 16px;
      border-radius: 18px;
      border: 1px solid var(--border);
      background: rgba(255,246,232,.045);
      color: var(--muted);
      cursor: pointer;
    }

    .choice input {
      position: absolute;
      opacity: 0;
      pointer-events: none;
    }

    .choice strong {
      color: var(--cream);
    }

    .choice:has(input:checked) {
      border-color: rgba(214,168,90,.6);
      background: rgba(214,168,90,.12);
    }

    .checkout-actions {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      margin-top: 12px;
    }

    .order-summary {
      position: sticky;
      top: 84px;
      padding: 22px;
      border: 1px solid rgba(214,168,90,.26);
      border-radius: 32px;
      background:
        radial-gradient(circle at 100% 0, rgba(214,168,90,.15), transparent 170px),
        rgba(33,29,24,.85);
    }

    .reservation-layout,
    .about-grid,
    .contact-layout {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 22px;
      align-items: stretch;
    }

    .reservation-card {
      padding: clamp(20px, 3vw, 34px);
    }

    .reservation-side {
      min-height: 100%;
      border-radius: 34px;
      border: 1px solid var(--border);
      background:
        linear-gradient(180deg, rgba(17,16,14,.04), rgba(17,16,14,.72)),
        url('https://images.unsplash.com/photo-1551218808-94e220e084d2?auto=format&fit=crop&w=1100&q=82') center/cover;
      padding: 24px;
      display: flex;
      align-items: end;
      box-shadow: var(--shadow);
    }

    .availability-box {
      width: 100%;
      padding: 20px;
      border: 1px solid rgba(255,246,232,.18);
      border-radius: 26px;
      background: rgba(17,16,14,.7);
      backdrop-filter: blur(14px);
    }

    .status-line {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      color: var(--herb);
      font-weight: 950;
      margin-bottom: 16px;
    }

    .status-line::before {
      content: "";
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: currentColor;
      box-shadow: 0 0 0 7px rgba(111,143,88,.16);
    }

    .hour-chips {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .hour-chip {
      border: 1px solid var(--border);
      border-radius: 999px;
      background: rgba(255,246,232,.06);
      color: var(--cream);
      padding: 9px 12px;
      font-weight: 850;
    }

    .about-card {
      min-height: 340px;
      padding: 26px;
      display: flex;
      flex-direction: column;
      justify-content: end;
      position: relative;
      overflow: hidden;
    }

    .about-card:nth-child(1) {
      grid-row: span 2;
      min-height: 704px;
      background:
        linear-gradient(180deg, transparent 0%, rgba(17,16,14,.9) 76%),
        url('https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?auto=format&fit=crop&w=1100&q=80') center/cover;
    }

    .about-card:nth-child(2) {
      background:
        linear-gradient(180deg, transparent 0%, rgba(17,16,14,.9) 70%),
        url('https://images.unsplash.com/photo-1577219491135-ce391730fb2c?auto=format&fit=crop&w=900&q=80') center/cover;
    }

    .about-card:nth-child(3) {
      background:
        linear-gradient(180deg, transparent 0%, rgba(17,16,14,.9) 70%),
        url('https://images.unsplash.com/photo-1498837167922-ddd27525d352?auto=format&fit=crop&w=900&q=80') center/cover;
    }

    .about-card h3,
    .contact-card h3 {
      margin: 0 0 10px;
      font-family: var(--serif);
      font-size: clamp(1.65rem, 3vw, 2.5rem);
      line-height: 1;
    }

    .about-card p,
    .contact-card p {
      color: var(--muted);
      line-height: 1.65;
      margin: 0;
    }

    .reviews-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
    }

    .review-card {
      padding: 22px;
    }

    .review-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
      margin-bottom: 20px;
    }

    .review-score {
      color: var(--gold);
      font-weight: 950;
    }

    .review-card p {
      color: var(--muted);
      line-height: 1.7;
      margin: 0;
    }

    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(12, 1fr);
      gap: 14px;
    }

    .gallery-item {
      min-height: 260px;
      border-radius: 28px;
      overflow: hidden;
      border: 1px solid var(--border);
      background: rgba(255,246,232,.05);
    }

    .gallery-item:nth-child(1) { grid-column: span 5; min-height: 440px; }
    .gallery-item:nth-child(2) { grid-column: span 4; }
    .gallery-item:nth-child(3) { grid-column: span 3; }
    .gallery-item:nth-child(4) { grid-column: span 3; }
    .gallery-item:nth-child(5) { grid-column: span 4; }
    .gallery-item:nth-child(6) { grid-column: span 5; }

    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform .6s ease;
    }

    .gallery-item:hover img { transform: scale(1.05); }

    .contact-card {
      padding: 28px;
    }

    .contact-card:first-child {
      background:
        radial-gradient(circle at 100% 0%, rgba(214,168,90,.16), transparent 170px),
        rgba(255,246,232,.045);
    }

    .contact-list {
      display: grid;
      gap: 14px;
      margin-top: 20px;
    }

    .contact-list div {
      display: flex;
      justify-content: space-between;
      gap: 14px;
      padding: 14px 0;
      border-top: 1px solid var(--border);
      color: var(--muted);
    }

    .contact-list strong { color: var(--cream); }

    .map-frame {
      min-height: 420px;
      overflow: hidden;
      border-radius: 34px;
      border: 1px solid var(--border);
      background: rgba(255,246,232,.05);
    }

    .map-frame iframe {
      width: 100%;
      height: 100%;
      min-height: 420px;
      border: 0;
      filter: saturate(.78) invert(.92) hue-rotate(170deg) brightness(.82);
    }

    .site-footer {
      width: var(--container);
      margin: 0 auto;
      padding: 36px 0 104px;
      border-top: 1px solid var(--border);
      color: var(--muted);
      display: flex;
      justify-content: space-between;
      gap: 20px;
      flex-wrap: wrap;
    }

    .footer-links {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
    }

    .footer-links a {
      color: var(--cream);
      font-weight: 800;
    }

    .mobile-cart-bar {
      position: fixed;
      left: 12px;
      right: 12px;
      bottom: 12px;
      z-index: 80;
      display: none;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      min-height: 62px;
      padding: 10px 12px 10px 18px;
      border: 1px solid rgba(214,168,90,.28);
      border-radius: 24px;
      background: rgba(26,23,19,.92);
      backdrop-filter: blur(18px);
      box-shadow: 0 18px 50px rgba(0,0,0,.38);
    }

    .mobile-cart-bar strong {
      color: var(--gold);
    }

    .toast {
      position: fixed;
      right: 18px;
      bottom: 18px;
      z-index: 150;
      transform: translateY(20px);
      opacity: 0;
      pointer-events: none;
      padding: 14px 16px;
      border: 1px solid rgba(214,168,90,.3);
      border-radius: 18px;
      background: rgba(26,23,19,.94);
      color: var(--cream);
      box-shadow: 0 18px 50px rgba(0,0,0,.35);
      transition: opacity .22s ease, transform .22s ease;
    }

    .toast.is-visible {
      opacity: 1;
      transform: translateY(0);
    }

    .fade-in {
      opacity: 0;
      transform: translateY(18px);
      transition: opacity .55s ease, transform .55s ease;
    }

    .fade-in.is-visible {
      opacity: 1;
      transform: translateY(0);
    }

    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation-duration: .01ms !important;
        animation-iteration-count: 1 !important;
        scroll-behavior: auto !important;
        transition-duration: .01ms !important;
      }
    }

    @media (max-width: 1060px) {
      .desktop-nav { display: none; }
      .menu-toggle { display: inline-flex; }
      .mobile-nav.is-open { display: block; }
      .hero {
        grid-template-columns: 1fr;
        min-height: auto;
        padding-top: 38px;
      }
      .hero-visual {
        min-height: 520px;
      }
      .menu-shell,
      .checkout-layout {
        grid-template-columns: 1fr;
      }
      .cart-panel,
      .order-summary {
        display: none;
      }
      .section-header {
        grid-template-columns: 1fr;
      }
      .moments-grid,
      .reviews-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      .featured-layout,
      .feature-story,
      .reservation-layout,
      .about-grid,
      .contact-layout {
        grid-template-columns: 1fr;
      }
      .about-card:nth-child(1) {
        min-height: 420px;
        grid-row: auto;
      }
      .mobile-cart-bar {
        display: flex;
      }
    }

    @media (max-width: 720px) {
      :root { --container: min(100vw - 24px, 1180px); }
      .nav-shell { min-height: 68px; }
      .brand-mark { width: 34px; height: 34px; }
      .brand-name { font-size: 1.12rem; }
      .language-switcher { display: none; }
      .cart-trigger .cart-label { display: none; }
      .hero h1 { font-size: clamp(3.05rem, 16vw, 5.6rem); }
      .hero-visual { min-height: 420px; }
      .plate-frame {
        inset: 0 0 74px 0;
        border-radius: 30px;
      }
      .floating-hours { right: 10px; top: 18px; }
      .hero-ticket {
        left: 10px;
        bottom: 12px;
      }
      .moments-grid,
      .menu-grid,
      .reviews-grid,
      .form-grid,
      .choice-grid,
      .product-facts {
        grid-template-columns: 1fr;
      }
      .feature-story {
        min-height: auto;
      }
      .feature-story img { height: 280px; }
      .mini-feature {
        grid-template-columns: 120px 1fr;
      }
      .menu-controls {
        top: 70px;
        margin-inline: -4px;
        border-radius: 22px;
      }
      .dish-card { min-height: auto; }
      .dish-image { height: 216px; }
      .stepper {
        grid-template-columns: repeat(2, 1fr);
      }
      .checkout-actions {
        flex-direction: column-reverse;
      }
      .checkout-actions .btn {
        width: 100%;
      }
      .gallery-grid { grid-template-columns: 1fr; }
      .gallery-item,
      .gallery-item:nth-child(n) {
        grid-column: auto;
        min-height: 260px;
      }
      .product-drawer,
      .cart-drawer {
        top: auto;
        bottom: 0;
        height: min(88dvh, 760px);
        width: 100%;
        border-left: 0;
        border-top: 1px solid var(--border);
        border-radius: 28px 28px 0 0;
        transform: translateY(105%);
      }
      .product-drawer.is-open,
      .cart-drawer.is-open {
        transform: translateY(0);
      }
      .product-buy-row {
        grid-template-columns: 112px 1fr;
      }
      .toast {
        left: 12px;
        right: 12px;
        bottom: 86px;
      }
      .site-footer { padding-bottom: 104px; }
    }
  </style>
</head>

<body>
  <a href="#main" class="skip-link">Skip</a>

  <header class="site-header" id="siteHeader">
    <div class="nav-shell">
      <a class="brand" href="#home" aria-label="<?= e($text['brand']) ?>">
        <span class="brand-mark" aria-hidden="true">B</span>
        <span class="brand-name"><?= e($text['brand']) ?></span>
      </a>

      <nav class="desktop-nav" aria-label="Principal">
        <a href="#home"><?= e($text['nav_home']) ?></a>
        <a href="#menu"><?= e($text['nav_menu']) ?></a>
        <a href="#reservas"><?= e($text['nav_reserve']) ?></a>
        <a href="#sobre"><?= e($text['nav_about']) ?></a>
        <a href="#contacto"><?= e($text['nav_contact']) ?></a>
      </nav>

      <div class="nav-actions">
        <div class="language-switcher" aria-label="Idiomas">
          <?php foreach (['pt', 'es', 'en'] as $code): ?>
            <a href="?lang=<?= e($code) ?>" class="<?= $lang === $code ? 'is-active' : '' ?>" aria-label="<?= e(strtoupper($code)) ?>"><?= e($code) ?></a>
          <?php endforeach; ?>
        </div>

        <button class="cart-trigger" type="button" data-open-cart aria-label="<?= e($text['nav_cart']) ?>">
          <span class="cart-label"><?= e($text['nav_cart']) ?></span>
          <span class="cart-count" data-cart-count>0</span>
        </button>

        <button class="menu-toggle" type="button" id="menuToggle" aria-label="Menu" aria-expanded="false">☰</button>
      </div>
    </div>

    <nav class="mobile-nav" id="mobileNav" aria-label="Mobile">
      <a href="#home"><?= e($text['nav_home']) ?> <span>↗</span></a>
      <a href="#menu"><?= e($text['nav_menu']) ?> <span>↗</span></a>
      <a href="#reservas"><?= e($text['nav_reserve']) ?> <span>↗</span></a>
      <a href="#sobre"><?= e($text['nav_about']) ?> <span>↗</span></a>
      <a href="#contacto"><?= e($text['nav_contact']) ?> <span>↗</span></a>
      <a href="?lang=pt">PT <span>•</span></a>
      <a href="?lang=es">ES <span>•</span></a>
      <a href="?lang=en">EN <span>•</span></a>
    </nav>
  </header>

  <main id="main">
    <section class="hero" id="home">
      <div class="hero-copy fade-in">
        <span class="eyebrow"><?= e($text['hero_kicker']) ?></span>
        <h1><?= e($text['hero_title']) ?></h1>
        <p><?= e($text['hero_subtitle']) ?></p>

        <div class="hero-actions">
          <a class="btn btn-primary" href="#menu"><?= e($text['view_menu']) ?> <span aria-hidden="true">→</span></a>
          <a class="btn btn-secondary" href="#reservas"><?= e($text['reserve_table']) ?></a>
        </div>

        <div class="hero-proof" aria-label="Informações rápidas">
          <span class="proof-pill"><strong>●</strong> <?= e($text['open_today']) ?></span>
          <span class="proof-pill"><strong>↯</strong> <?= e($text['delivery_time']) ?></span>
          <span class="proof-pill"><strong>★</strong> <?= e($text['rating']) ?></span>
        </div>
      </div>

      <div class="hero-visual fade-in">
        <div class="plate-frame">
          <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1400&q=84" alt="Prato gastronómico premium" />
        </div>
        <div class="floating-hours"><?= e($text['open_today']) ?> · 12:00–23:00</div>
        <aside class="hero-ticket" aria-label="Resumo do template">
          <small><?= e($text['brand']) ?></small>
          <h2><?= e($text['hero_note']) ?></h2>
          <div class="ticket-line">
            <span><?= e($text['delivery_time']) ?></span>
            <strong>4.9 ★</strong>
          </div>
        </aside>
      </div>
    </section>

    <section class="section" aria-labelledby="momentsTitle">
      <div class="section-header fade-in">
        <div>
          <span class="eyebrow"><?= e($text['quick_categories']) ?></span>
          <h2 class="section-title" id="momentsTitle"><?= e($text['quick_categories']) ?></h2>
        </div>
      </div>

      <div class="moments-grid">
        <?php foreach ($moments as $moment): ?>
          <article class="moment-tile fade-in">
            <span class="moment-icon"><?= e($moment['icon']) ?></span>
            <h3><?= e($moment['title'][$lang]) ?></h3>
            <p><?= e($moment['text'][$lang]) ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="section" aria-labelledby="featuredTitle">
      <div class="section-header fade-in">
        <div>
          <span class="eyebrow"><?= e($text['featured_title']) ?></span>
          <h2 class="section-title" id="featuredTitle"><?= e($text['featured_title']) ?></h2>
          <p class="section-subtitle"><?= e($text['featured_subtitle']) ?></p>
        </div>
      </div>

      <div class="featured-layout">
        <?php $mainFeature = $dishes[8]; ?>
        <article class="feature-story fade-in">
          <img src="<?= e($mainFeature['image']) ?>" alt="<?= e($mainFeature['name'][$lang]) ?>" loading="lazy" />
          <div class="feature-copy">
            <div>
              <span class="badge">★ <?= e($text['chef']) ?></span>
              <h3><?= e($mainFeature['name'][$lang]) ?></h3>
              <p><?= e($mainFeature['desc'][$lang]) ?></p>
            </div>
            <div class="dish-footer">
              <strong class="feature-price">€<?= number_format($mainFeature['price'], 2, ',', '.') ?></strong>
              <button class="btn btn-primary" type="button" data-add="<?= e($mainFeature['id']) ?>"><?= e($text['add']) ?></button>
            </div>
          </div>
        </article>

        <div class="stacked-features">
          <?php foreach ([$dishes[1], $dishes[4]] as $dish): ?>
            <article class="mini-feature fade-in">
              <img src="<?= e($dish['image']) ?>" alt="<?= e($dish['name'][$lang]) ?>" loading="lazy" />
              <div>
                <span class="badge"><?= e($categories[$dish['category']][$lang]) ?></span>
                <h3><?= e($dish['name'][$lang]) ?></h3>
                <p><?= e($dish['desc'][$lang]) ?></p>
                <div class="dish-footer">
                  <strong class="price">€<?= number_format($dish['price'], 2, ',', '.') ?></strong>
                  <button class="round-action" type="button" data-add="<?= e($dish['id']) ?>" aria-label="<?= e($text['add']) ?>">+</button>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="section" id="menu" aria-labelledby="menuTitle">
      <div class="section-header fade-in">
        <div>
          <span class="eyebrow"><?= e($text['menu_title']) ?></span>
          <h2 class="section-title" id="menuTitle"><?= e($text['menu_title']) ?></h2>
          <p class="section-subtitle"><?= e($text['menu_subtitle']) ?></p>
        </div>
        <div class="section-actions">
          <a href="#checkout" class="btn btn-secondary"><?= e($text['checkout']) ?></a>
        </div>
      </div>

      <div class="menu-shell">
        <div>
          <div class="menu-controls fade-in">
            <label class="search-box">
              <span aria-hidden="true">⌕</span>
              <input type="search" id="dishSearch" placeholder="<?= e($text['search_placeholder']) ?>" autocomplete="off">
            </label>

            <div class="category-tabs" id="categoryTabs" role="tablist" aria-label="Categorias">
              <button class="category-tab is-active" type="button" data-category="all"><?= e($text['all']) ?></button>
              <?php foreach ($categories as $key => $label): ?>
                <button class="category-tab" type="button" data-category="<?= e($key) ?>"><?= e($label[$lang]) ?></button>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="menu-grid" id="menuGrid">
            <?php foreach ($dishes as $dish): ?>
              <article class="dish-card fade-in"
                data-dish-card
                data-id="<?= e($dish['id']) ?>"
                data-category="<?= e($dish['category']) ?>"
                data-search="<?= e(strtolower($dish['name'][$lang] . ' ' . $dish['desc'][$lang] . ' ' . $categories[$dish['category']][$lang] . ' ' . implode(' ', $dish['ingredients'][$lang]))) ?>">
                <div class="dish-image">
                  <img src="<?= e($dish['image']) ?>" alt="<?= e($dish['name'][$lang]) ?>" loading="lazy">
                  <div class="dish-badges">
                    <?php foreach ($dish['badges'] as $badge): ?>
                      <span class="badge"><?= e($text[$badge]) ?></span>
                    <?php endforeach; ?>
                  </div>
                </div>

                <div class="dish-body">
                  <div class="dish-meta">
                    <span><?= e($categories[$dish['category']][$lang]) ?></span>
                    <span>★ 4.9</span>
                  </div>
                  <h3 class="dish-title"><?= e($dish['name'][$lang]) ?></h3>
                  <p class="dish-desc"><?= e($dish['desc'][$lang]) ?></p>

                  <div class="dish-footer">
                    <strong class="price">€<?= number_format($dish['price'], 2, ',', '.') ?></strong>
                    <div class="dish-actions">
                      <button class="round-action" type="button" data-open-product="<?= e($dish['id']) ?>" aria-label="<?= e($text['details']) ?>">↗</button>
                      <button class="round-action" type="button" data-add="<?= e($dish['id']) ?>" aria-label="<?= e($text['add']) ?>">+</button>
                    </div>
                  </div>
                </div>
              </article>
            <?php endforeach; ?>
          </div>

          <div class="empty-state" id="emptyState">
            <?= e($text['empty_search']) ?>
          </div>
        </div>

        <aside class="cart-panel fade-in" aria-label="<?= e($text['cart_title']) ?>">
          <div class="cart-panel-header">
            <h3><?= e($text['cart_title']) ?></h3>
            <span class="cart-count" data-cart-count>0</span>
          </div>
          <div class="cart-items" data-cart-items></div>
          <div class="cart-form">
            <label class="field">
              <span><?= e($text['cart_notes']) ?></span>
              <textarea data-cart-notes placeholder="<?= e($text['cart_notes_placeholder']) ?>"></textarea>
            </label>
            <label class="field">
              <span><?= e($text['coupon']) ?></span>
              <input type="text" data-coupon placeholder="<?= e($text['coupon_placeholder']) ?>">
            </label>
          </div>
          <div class="cart-panel-footer">
            <div class="totals" data-cart-totals></div>
            <a class="btn btn-primary" href="#checkout"><?= e($text['checkout']) ?></a>
          </div>
        </aside>
      </div>
    </section>

    <section class="section" id="checkout" aria-labelledby="checkoutTitle">
      <div class="section-header fade-in">
        <div>
          <span class="eyebrow"><?= e($text['checkout_title']) ?></span>
          <h2 class="section-title" id="checkoutTitle"><?= e($text['checkout_title']) ?></h2>
          <p class="section-subtitle"><?= e($text['checkout_subtitle']) ?></p>
        </div>
      </div>

      <div class="checkout-layout">
        <form class="checkout-card fade-in" id="checkoutForm" novalidate>
          <div class="stepper" aria-label="Checkout steps">
            <div class="step-dot is-active" data-step-dot="0">1 · <?= e($text['step_customer']) ?></div>
            <div class="step-dot" data-step-dot="1">2 · <?= e($text['step_delivery']) ?></div>
            <div class="step-dot" data-step-dot="2">3 · <?= e($text['step_payment']) ?></div>
            <div class="step-dot" data-step-dot="3">4 · <?= e($text['step_confirm']) ?></div>
          </div>

          <div class="checkout-step is-active" data-step="0">
            <div class="form-grid">
              <label class="field">
                <span><?= e($text['name']) ?></span>
                <input name="customer_name" required autocomplete="name">
              </label>
              <label class="field">
                <span><?= e($text['phone']) ?></span>
                <input name="customer_phone" required autocomplete="tel">
              </label>
              <label class="field" style="grid-column: 1 / -1;">
                <span><?= e($text['email']) ?></span>
                <input name="customer_email" type="email" required autocomplete="email">
              </label>
            </div>
          </div>

          <div class="checkout-step" data-step="1">
            <label class="field">
              <span><?= e($text['delivery_or_pickup']) ?></span>
              <div class="choice-grid">
                <label class="choice">
                  <input type="radio" name="fulfillment" value="delivery" checked>
                  <strong><?= e($text['delivery']) ?></strong>
                  <span>30–45 min</span>
                </label>
                <label class="choice">
                  <input type="radio" name="fulfillment" value="pickup">
                  <strong><?= e($text['pickup']) ?></strong>
                  <span>20 min</span>
                </label>
                <label class="choice">
                  <input type="radio" name="fulfillment" value="later">
                  <strong><?= e($text['time']) ?></strong>
                  <span>Agendar</span>
                </label>
              </div>
            </label>
            <div class="form-grid">
              <label class="field">
                <span><?= e($text['address']) ?></span>
                <input name="address" autocomplete="street-address">
              </label>
              <label class="field">
                <span><?= e($text['time']) ?></span>
                <select name="order_time">
                  <option>O mais rápido possível</option>
                  <option>19:00</option>
                  <option>19:30</option>
                  <option>20:00</option>
                  <option>20:30</option>
                </select>
              </label>
            </div>
          </div>

          <div class="checkout-step" data-step="2">
            <label class="field">
              <span><?= e($text['payment_method']) ?></span>
              <div class="choice-grid">
                <label class="choice">
                  <input type="radio" name="payment" value="card" checked>
                  <strong><?= e($text['card']) ?></strong>
                  <span>Visa / Mastercard</span>
                </label>
                <label class="choice">
                  <input type="radio" name="payment" value="mbway">
                  <strong><?= e($text['mbway']) ?></strong>
                  <span>Pagamento rápido</span>
                </label>
                <label class="choice">
                  <input type="radio" name="payment" value="cash">
                  <strong><?= e($text['cash']) ?></strong>
                  <span>No balcão</span>
                </label>
              </div>
            </label>
          </div>

          <div class="checkout-step" data-step="3">
            <div class="empty-state is-visible" style="display:block;">
              <strong><?= e($text['step_confirm']) ?></strong><br>
              <?= e($text['checkout_subtitle']) ?>
            </div>
            <div class="totals" data-checkout-totals></div>
          </div>

          <div class="checkout-actions">
            <button class="btn btn-quiet" type="button" id="prevStep"><?= e($text['back']) ?></button>
            <button class="btn btn-primary" type="button" id="nextStep"><?= e($text['next']) ?></button>
          </div>
        </form>

        <aside class="order-summary fade-in">
          <h3 style="font-family:var(--serif);font-size:1.7rem;margin:0 0 16px;"><?= e($text['cart_title']) ?></h3>
          <div class="cart-items" data-summary-items></div>
          <div class="totals" data-summary-totals style="margin-top:16px;"></div>
        </aside>
      </div>
    </section>

    <section class="section" id="reservas" aria-labelledby="reservationTitle">
      <div class="section-header fade-in">
        <div>
          <span class="eyebrow"><?= e($text['reservation_title']) ?></span>
          <h2 class="section-title" id="reservationTitle"><?= e($text['reservation_title']) ?></h2>
          <p class="section-subtitle"><?= e($text['reservation_subtitle']) ?></p>
        </div>
      </div>

      <div class="reservation-layout">
        <form class="reservation-card fade-in" id="reservationForm" novalidate>
          <div class="form-grid">
            <label class="field">
              <span><?= e($text['name']) ?></span>
              <input name="reservation_name" required autocomplete="name">
            </label>
            <label class="field">
              <span><?= e($text['phone']) ?></span>
              <input name="reservation_phone" required autocomplete="tel">
            </label>
            <label class="field">
              <span><?= e($text['date']) ?></span>
              <input name="reservation_date" type="date" min="<?= e($today) ?>" required>
            </label>
            <label class="field">
              <span><?= e($text['time']) ?></span>
              <select name="reservation_time" required>
                <option value="">--</option>
                <option>18:30</option>
                <option>19:00</option>
                <option>19:30</option>
                <option>20:00</option>
                <option>20:30</option>
                <option>21:00</option>
              </select>
            </label>
            <label class="field">
              <span><?= e($text['people']) ?></span>
              <input name="reservation_people" type="number" min="1" max="20" required value="2">
            </label>
            <label class="field">
              <span><?= e($text['email']) ?></span>
              <input name="reservation_email" type="email" autocomplete="email">
            </label>
            <label class="field" style="grid-column:1/-1;">
              <span><?= e($text['special_request']) ?></span>
              <textarea name="reservation_notes" placeholder="Mesa tranquila, aniversário, cadeira de criança..."></textarea>
            </label>
          </div>
          <div class="checkout-actions">
            <span></span>
            <button class="btn btn-primary" type="submit"><?= e($text['confirm_reservation']) ?></button>
          </div>
        </form>

        <aside class="reservation-side fade-in">
          <div class="availability-box">
            <div class="status-line"><?= e($text['available']) ?></div>
            <h3 style="font-family:var(--serif);font-size:2.35rem;line-height:1;margin:0 0 12px;"><?= e($text['popular_hours']) ?></h3>
            <div class="hour-chips">
              <button class="hour-chip" type="button" data-hour="19:00">19:00</button>
              <button class="hour-chip" type="button" data-hour="20:00">20:00</button>
              <button class="hour-chip" type="button" data-hour="20:30">20:30</button>
              <button class="hour-chip" type="button" data-hour="21:00">21:00</button>
            </div>
          </div>
        </aside>
      </div>
    </section>

    <section class="section" id="sobre" aria-labelledby="aboutTitle">
      <div class="section-header fade-in">
        <div>
          <span class="eyebrow"><?= e($text['nav_about']) ?></span>
          <h2 class="section-title" id="aboutTitle"><?= e($text['about_title']) ?></h2>
          <p class="section-subtitle"><?= e($text['about_text']) ?></p>
        </div>
      </div>

      <div class="about-grid">
        <article class="about-card fade-in">
          <h3><?= e($text['experience_title']) ?></h3>
          <p><?= e($text['experience_text']) ?></p>
        </article>
        <article class="about-card fade-in">
          <h3><?= e($text['chef_title']) ?></h3>
          <p><?= e($text['chef_text']) ?></p>
        </article>
        <article class="about-card fade-in">
          <h3><?= e($text['local_title']) ?></h3>
          <p><?= e($text['local_text']) ?></p>
        </article>
      </div>
    </section>

    <section class="section" aria-labelledby="reviewsTitle">
      <div class="section-header fade-in">
        <div>
          <span class="eyebrow"><?= e($text['reviews_title']) ?></span>
          <h2 class="section-title" id="reviewsTitle"><?= e($text['reviews_title']) ?></h2>
        </div>
      </div>

      <div class="reviews-grid">
        <?php foreach ($reviews as $review): ?>
          <article class="review-card fade-in">
            <div class="review-top">
              <strong><?= e($review['name']) ?></strong>
              <span class="review-score">★ <?= e($review['score']) ?></span>
            </div>
            <p>“<?= e($review['text'][$lang]) ?>”</p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="section" aria-labelledby="galleryTitle">
      <div class="section-header fade-in">
        <div>
          <span class="eyebrow"><?= e($text['gallery_title']) ?></span>
          <h2 class="section-title" id="galleryTitle"><?= e($text['gallery_title']) ?></h2>
        </div>
      </div>

      <div class="gallery-grid">
        <?php foreach ($gallery as $idx => $image): ?>
          <figure class="gallery-item fade-in">
            <img src="<?= e($image) ?>" alt="<?= e($text['gallery_title']) ?> <?= $idx + 1 ?>" loading="lazy">
          </figure>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="section" id="contacto" aria-labelledby="contactTitle">
      <div class="section-header fade-in">
        <div>
          <span class="eyebrow"><?= e($text['contact_title']) ?></span>
          <h2 class="section-title" id="contactTitle"><?= e($text['contact_title']) ?></h2>
        </div>
      </div>

      <div class="contact-layout">
        <article class="contact-card fade-in">
          <h3><?= e($text['brand']) ?></h3>
          <p><?= e($text['footer_text']) ?></p>
          <div class="contact-list">
            <div><strong><?= e($text['address_label']) ?></strong><span>Rua da Bélgica, 2450 · Vila Nova de Gaia</span></div>
            <div><strong><?= e($text['hours_label']) ?></strong><span>12:00–23:00 · Ter–Dom</span></div>
            <div><strong><?= e($text['phone']) ?></strong><span>+351 900 000 000</span></div>
            <div><strong><?= e($text['email']) ?></strong><span>reservas@bistroprime.pt</span></div>
          </div>
        </article>

        <div class="map-frame fade-in">
          <iframe
            title="Mapa Bistrô Prime"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.845891425258!2d-8.655521423409764!3d41.12536031582254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246525c5f0c3f9%3A0x80c4963cbf7de769!2sR.%20da%20B%C3%A9lgica%202450%2C%204400-046%20Vila%20Nova%20de%20Gaia!5e0!3m2!1spt-PT!2spt!4v1719078822695!5m2!1spt-PT!2spt">
          </iframe>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div>
      <strong style="color:var(--cream);"><?= e($text['brand']) ?></strong><br>
      <?= e($text['footer_text']) ?>
    </div>
    <nav class="footer-links" aria-label="Footer">
      <a href="#menu"><?= e($text['nav_menu']) ?></a>
      <a href="#reservas"><?= e($text['nav_reserve']) ?></a>
      <a href="#contacto"><?= e($text['nav_contact']) ?></a>
      <a href="https://alexdevcode.com" target="_blank" rel="noopener">AlexDevCode</a>
    </nav>
  </footer>

  <div class="mobile-cart-bar" data-open-cart>
    <span><?= e($text['cart_title']) ?> · <strong data-mobile-total>€0,00</strong></span>
    <span class="cart-count" data-cart-count>0</span>
  </div>

  <div class="cart-drawer-backdrop" data-close-cart></div>
  <aside class="cart-drawer" id="cartDrawer" aria-label="<?= e($text['cart_title']) ?>" aria-hidden="true">
    <div class="drawer-header">
      <h3><?= e($text['cart_title']) ?></h3>
      <button class="icon-button" type="button" data-close-cart><?= e($text['close']) ?></button>
    </div>
    <div class="drawer-scroll">
      <div class="cart-items" data-drawer-cart-items></div>
      <div class="cart-form">
        <label class="field">
          <span><?= e($text['cart_notes']) ?></span>
          <textarea data-cart-notes placeholder="<?= e($text['cart_notes_placeholder']) ?>"></textarea>
        </label>
        <label class="field">
          <span><?= e($text['coupon']) ?></span>
          <input type="text" data-coupon placeholder="<?= e($text['coupon_placeholder']) ?>">
        </label>
      </div>
    </div>
    <div class="cart-panel-footer">
      <div class="totals" data-drawer-cart-totals></div>
      <a class="btn btn-primary" href="#checkout" data-close-cart><?= e($text['checkout']) ?></a>
    </div>
  </aside>

  <div class="product-backdrop" data-close-product></div>
  <aside class="product-drawer" id="productDrawer" aria-label="<?= e($text['details']) ?>" aria-hidden="true">
    <div class="drawer-header">
      <h3><?= e($text['details']) ?></h3>
      <button class="icon-button" type="button" data-close-product><?= e($text['close']) ?></button>
    </div>
    <div class="drawer-scroll" id="productContent"></div>
    <div class="product-buy">
      <div class="product-buy-row">
        <div class="quantity-box">
          <button type="button" id="productQtyMinus">−</button>
          <span id="productQty">1</span>
          <button type="button" id="productQtyPlus">+</button>
        </div>
        <button class="btn btn-primary" type="button" id="productAddButton"><?= e($text['add']) ?></button>
      </div>
    </div>
  </aside>

  <div class="toast" id="toast" role="status" aria-live="polite"></div>

  <script>
    const LANG = <?= json_encode($lang, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
    const TEXT = <?= $encodedText ?>;
    const DISHES = <?= $encodedDishes ?>;
    const CATEGORIES = <?= $encodedCategories ?>;

    const money = new Intl.NumberFormat(LANG === 'en' ? 'en-IE' : 'pt-PT', {
      style: 'currency',
      currency: 'EUR'
    });

    const state = {
      cart: new Map(),
      activeCategory: 'all',
      search: '',
      productId: null,
      productQty: 1,
      checkoutStep: 0
    };

    const qs = (selector, root = document) => root.querySelector(selector);
    const qsa = (selector, root = document) => [...root.querySelectorAll(selector)];
    const dishById = (id) => DISHES.find((dish) => dish.id === id);

    function getDishText(dish, key) {
      return dish[key]?.[LANG] || dish[key]?.pt || '';
    }

    function getCategoryName(category) {
      return CATEGORIES[category]?.[LANG] || CATEGORIES[category]?.pt || category;
    }

    function formatBadges(dish) {
      return dish.badges.map((badge) => `<span class="badge">${TEXT[badge] || badge}</span>`).join('');
    }

    function showToast(message) {
      const toast = qs('#toast');
      toast.textContent = message;
      toast.classList.add('is-visible');
      window.clearTimeout(showToast.timer);
      showToast.timer = window.setTimeout(() => toast.classList.remove('is-visible'), 2100);
    }

    function addToCart(id, qty = 1) {
      const dish = dishById(id);
      if (!dish) return;
      const current = state.cart.get(id) || 0;
      state.cart.set(id, current + qty);
      renderCart();
      showToast(`${getDishText(dish, 'name')} ${TEXT.toast_added}`);
    }

    function updateQty(id, delta) {
      const current = state.cart.get(id) || 0;
      const next = current + delta;
      if (next <= 0) {
        state.cart.delete(id);
      } else {
        state.cart.set(id, next);
      }
      renderCart();
    }

    function getTotals() {
      const subtotal = [...state.cart.entries()].reduce((sum, [id, qty]) => {
        const dish = dishById(id);
        return sum + (dish ? dish.price * qty : 0);
      }, 0);
      const delivery = subtotal > 0 ? 2.90 : 0;
      const service = subtotal > 0 ? Math.max(0.60, subtotal * 0.03) : 0;
      return { subtotal, delivery, service, total: subtotal + delivery + service };
    }

    function renderTotals(targets) {
      const totals = getTotals();
      const html = `
        <div class="total-row"><span>${TEXT.subtotal}</span><span>${money.format(totals.subtotal)}</span></div>
        <div class="total-row"><span>${TEXT.delivery_fee}</span><span>${money.format(totals.delivery)}</span></div>
        <div class="total-row"><span>${TEXT.service_fee}</span><span>${money.format(totals.service)}</span></div>
        <div class="total-row final"><span>${TEXT.total}</span><strong>${money.format(totals.total)}</strong></div>
      `;
      targets.forEach((target) => { target.innerHTML = html; });
      qsa('[data-mobile-total]').forEach((node) => { node.textContent = money.format(totals.total); });
    }

    function renderCartItems(targets) {
      const entries = [...state.cart.entries()];
      const html = entries.length
        ? entries.map(([id, qty]) => {
            const dish = dishById(id);
            if (!dish) return '';
            return `
              <article class="cart-item">
                <img src="${dish.image}" alt="${getDishText(dish, 'name')}">
                <div>
                  <h4>${getDishText(dish, 'name')}</h4>
                  <div class="cart-item-row">
                    <span>${money.format(dish.price)}</span>
                    <div class="qty-control" aria-label="${TEXT.qty}">
                      <button type="button" data-qty-minus="${dish.id}">−</button>
                      <span>${qty}</span>
                      <button type="button" data-qty-plus="${dish.id}">+</button>
                    </div>
                  </div>
                </div>
              </article>
            `;
          }).join('')
        : `<div class="cart-empty">${TEXT.cart_empty}</div>`;

      targets.forEach((target) => { target.innerHTML = html; });
    }

    function renderCart() {
      const count = [...state.cart.values()].reduce((sum, qty) => sum + qty, 0);
      qsa('[data-cart-count]').forEach((node) => { node.textContent = count; });

      renderCartItems(qsa('[data-cart-items], [data-drawer-cart-items], [data-summary-items]'));
      renderTotals(qsa('[data-cart-totals], [data-drawer-cart-totals], [data-summary-totals], [data-checkout-totals]'));
    }

    function filterDishes() {
      let visibleCount = 0;
      const query = state.search.trim().toLowerCase();

      qsa('[data-dish-card]').forEach((card) => {
        const matchCategory = state.activeCategory === 'all' || card.dataset.category === state.activeCategory;
        const matchSearch = !query || card.dataset.search.includes(query);
        const visible = matchCategory && matchSearch;
        card.classList.toggle('is-hidden', !visible);
        if (visible) visibleCount++;
      });

      qs('#emptyState').classList.toggle('is-visible', visibleCount === 0);
    }

    function openCart() {
      qs('.cart-drawer-backdrop').classList.add('is-open');
      qs('#cartDrawer').classList.add('is-open');
      qs('#cartDrawer').setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }

    function closeCart() {
      qs('.cart-drawer-backdrop').classList.remove('is-open');
      qs('#cartDrawer').classList.remove('is-open');
      qs('#cartDrawer').setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }

    function openProduct(id) {
      const dish = dishById(id);
      if (!dish) return;
      state.productId = id;
      state.productQty = 1;
      qs('#productQty').textContent = '1';

      qs('#productContent').innerHTML = `
        <div class="product-hero">
          <img src="${dish.image}" alt="${getDishText(dish, 'name')}">
        </div>
        <div class="product-content">
          <div class="dish-badges" style="position:static;">${formatBadges(dish)}</div>
          <h2 class="product-title">${getDishText(dish, 'name')}</h2>
          <p class="product-desc">${getDishText(dish, 'desc')}</p>
          <strong class="feature-price">${money.format(dish.price)}</strong>
          <div class="product-facts">
            <div class="fact-box">
              <h4>${TEXT.ingredients}</h4>
              <ul>${dish.ingredients[LANG].map((item) => `<li>${item}</li>`).join('')}</ul>
            </div>
            <div class="fact-box">
              <h4>${TEXT.allergens}</h4>
              <ul>${dish.allergens[LANG].map((item) => `<li>${item}</li>`).join('')}</ul>
            </div>
            <div class="fact-box">
              <h4>${TEXT.extras}</h4>
              <ul>${dish.extras[LANG].map((item) => `<li>${item}</li>`).join('')}</ul>
            </div>
            <div class="fact-box">
              <h4>${TEXT.pairs}</h4>
              <ul><li>${TEXT.delivery_time}</li><li>${TEXT.reserve_table}</li><li>${getCategoryName(dish.category)}</li></ul>
            </div>
          </div>
        </div>
      `;

      qs('.product-backdrop').classList.add('is-open');
      qs('#productDrawer').classList.add('is-open');
      qs('#productDrawer').setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }

    function closeProduct() {
      qs('.product-backdrop').classList.remove('is-open');
      qs('#productDrawer').classList.remove('is-open');
      qs('#productDrawer').setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }

    function setCheckoutStep(step) {
      state.checkoutStep = Math.max(0, Math.min(3, step));
      qsa('[data-step]').forEach((panel) => {
        panel.classList.toggle('is-active', Number(panel.dataset.step) === state.checkoutStep);
      });
      qsa('[data-step-dot]').forEach((dot) => {
        dot.classList.toggle('is-active', Number(dot.dataset.stepDot) === state.checkoutStep);
      });
      qs('#prevStep').style.visibility = state.checkoutStep === 0 ? 'hidden' : 'visible';
      qs('#nextStep').textContent = state.checkoutStep === 3 ? TEXT.place_order : TEXT.next;
    }

    function validateCurrentStep() {
      if (state.checkoutStep !== 0) return true;
      const form = qs('#checkoutForm');
      const required = qsa('[data-step="0"] input[required]', form);
      const valid = required.every((input) => input.checkValidity());
      if (!valid) {
        required.forEach((input) => input.reportValidity());
        showToast(TEXT.required_hint);
      }
      return valid;
    }

    function confirmOrder() {
      const orderNumber = `BP-${Math.floor(10000 + Math.random() * 89999)}`;
      qs('#checkoutForm').innerHTML = `
        <div class="checkout-step is-active" style="display:grid;gap:18px;">
          <span class="eyebrow">${TEXT.order_confirmed}</span>
          <h3 class="section-title" style="font-size:clamp(2.1rem,5vw,4rem);">${TEXT.order_confirmed}</h3>
          <div class="empty-state is-visible" style="display:block;">
            <strong>${TEXT.order_number}: ${orderNumber}</strong><br>
            ${TEXT.estimated_time}: 30–45 min
          </div>
          <div class="checkout-actions">
            <a class="btn btn-quiet" href="#menu">${TEXT.back_to_menu}</a>
            <button class="btn btn-primary" type="button">${TEXT.track_order}</button>
          </div>
        </div>
      `;
      state.cart.clear();
      renderCart();
    }

    function confirmReservation(event) {
      event.preventDefault();
      const form = event.currentTarget;
      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }

      showToast(TEXT.reservation_confirmed);
      form.reset();
      const confirmation = document.createElement('div');
      confirmation.className = 'empty-state is-visible';
      confirmation.style.display = 'block';
      confirmation.style.marginTop = '16px';
      confirmation.innerHTML = `<strong>${TEXT.reservation_confirmed}</strong><br>${TEXT.available}`;
      form.appendChild(confirmation);
      window.setTimeout(() => confirmation.remove(), 4200);
    }

    function initEvents() {
      window.addEventListener('scroll', () => {
        qs('#siteHeader').classList.toggle('is-scrolled', window.scrollY > 8);
      }, { passive: true });

      qs('#menuToggle').addEventListener('click', () => {
        const nav = qs('#mobileNav');
        const open = nav.classList.toggle('is-open');
        qs('#menuToggle').setAttribute('aria-expanded', String(open));
      });

      qsa('#mobileNav a').forEach((link) => {
        link.addEventListener('click', () => {
          qs('#mobileNav').classList.remove('is-open');
          qs('#menuToggle').setAttribute('aria-expanded', 'false');
        });
      });

      qsa('[data-add]').forEach((button) => {
        button.addEventListener('click', () => addToCart(button.dataset.add));
      });

      qsa('[data-open-product]').forEach((button) => {
        button.addEventListener('click', () => openProduct(button.dataset.openProduct));
      });

      qs('#categoryTabs').addEventListener('click', (event) => {
        const tab = event.target.closest('[data-category]');
        if (!tab) return;
        state.activeCategory = tab.dataset.category;
        qsa('[data-category]', qs('#categoryTabs')).forEach((item) => item.classList.remove('is-active'));
        tab.classList.add('is-active');
        filterDishes();
      });

      qs('#dishSearch').addEventListener('input', (event) => {
        state.search = event.target.value;
        filterDishes();
      });

      document.addEventListener('click', (event) => {
        const minus = event.target.closest('[data-qty-minus]');
        const plus = event.target.closest('[data-qty-plus]');
        if (minus) updateQty(minus.dataset.qtyMinus, -1);
        if (plus) updateQty(plus.dataset.qtyPlus, 1);
      });

      qsa('[data-open-cart]').forEach((node) => node.addEventListener('click', openCart));
      qsa('[data-close-cart]').forEach((node) => node.addEventListener('click', closeCart));
      qsa('[data-close-product]').forEach((node) => node.addEventListener('click', closeProduct));

      qs('#productQtyMinus').addEventListener('click', () => {
        state.productQty = Math.max(1, state.productQty - 1);
        qs('#productQty').textContent = state.productQty;
      });

      qs('#productQtyPlus').addEventListener('click', () => {
        state.productQty += 1;
        qs('#productQty').textContent = state.productQty;
      });

      qs('#productAddButton').addEventListener('click', () => {
        if (!state.productId) return;
        addToCart(state.productId, state.productQty);
        closeProduct();
      });

      qs('#prevStep').addEventListener('click', () => setCheckoutStep(state.checkoutStep - 1));
      qs('#nextStep').addEventListener('click', () => {
        if (!validateCurrentStep()) return;
        if (state.checkoutStep === 3) {
          confirmOrder();
          return;
        }
        setCheckoutStep(state.checkoutStep + 1);
      });

      qs('#reservationForm').addEventListener('submit', confirmReservation);

      qsa('[data-hour]').forEach((button) => {
        button.addEventListener('click', () => {
          const select = qs('select[name="reservation_time"]');
          select.value = button.dataset.hour;
          select.focus();
        });
      });

      document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
          closeCart();
          closeProduct();
        }
      });
    }

    function initFadeIn() {
      const items = qsa('.fade-in');
      if (!('IntersectionObserver' in window)) {
        items.forEach((item) => item.classList.add('is-visible'));
        return;
      }

      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: .14 });

      items.forEach((item) => observer.observe(item));
    }

    initEvents();
    initFadeIn();
    renderCart();
    setCheckoutStep(0);
  </script>
</body>
</html>
