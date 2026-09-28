<?php
/**
 * Template 02 — Aura Beauty
 * Beauty Salon Premium Template
 * Single-file PHP template with internal pages and PT / ES / EN support.
 * Usage examples:
 * ?lang=pt&page=home
 * ?lang=pt&page=services
 * ?lang=pt&page=service&slug=hair-glow
 * ?lang=pt&page=booking
 */

$lang = strtolower($_GET['lang'] ?? 'pt');
if (!in_array($lang, ['pt', 'es', 'en'], true)) {
  $lang = 'pt';
}

$page = strtolower($_GET['page'] ?? 'home');
$allowedPages = ['home', 'services', 'service', 'booking', 'team', 'gallery', 'promotions', 'about', 'contact', 'confirmation'];
if (!in_array($page, $allowedPages, true)) {
  $page = 'home';
}

function e($value) {
  return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function euro($value) {
  return '€ ' . number_format((float)$value, 2, ',', '.');
}

function route_to($page, $lang, $extra = []) {
  return '?' . http_build_query(array_merge(['lang' => $lang, 'page' => $page], $extra));
}

function lang_route($targetLang) {
  $query = $_GET;
  $query['lang'] = $targetLang;
  return '?' . http_build_query($query);
}

$tr = [
  'pt' => [
    'html' => 'pt-PT',
    'meta_title' => 'Aura Beauty — Beauty Salon Premium Template',
    'meta_desc' => 'Template premium para salões de beleza, estética, unhas, makeup, pestanas e agendamento online.',
    'brand' => 'Aura Beauty',
    'category' => 'Beauty Salon Premium Template',
    'nav_home' => 'Início',
    'nav_services' => 'Serviços',
    'nav_booking' => 'Agendamento',
    'nav_team' => 'Especialistas',
    'nav_gallery' => 'Galeria',
    'nav_promotions' => 'Pacotes',
    'nav_about' => 'Sobre',
    'nav_contact' => 'Contacto',
    'book_now' => 'Agendar agora',
    'view_services' => 'Ver serviços',
    'hero_badge_1' => 'Atendimento premium',
    'hero_badge_2' => 'Especialistas certificados',
    'hero_badge_3' => 'Ambiente exclusivo',
    'hero_title' => 'Realce a sua beleza com cuidado, elegância e atendimento profissional.',
    'hero_text' => 'Cabelo, unhas, estética, pestanas e maquilhagem pensados para valorizar a sua autoestima num espaço moderno, feminino e acolhedor.',
    'home_services_title' => 'Serviços que vendem cuidado, imagem e autoestima.',
    'home_services_text' => 'Um catálogo comercial com categorias claras, preço inicial, duração e CTA direto para agendamento.',
    'about_short_title' => 'Um salão pensado para mulheres que valorizam tempo, conforto e resultado.',
    'about_short_text' => 'A Aura Beauty combina técnica, estética premium e uma experiência digital simples: a cliente escolhe o serviço, profissional, horário e confirma sem fricção.',
    'team_title' => 'Especialistas com identidade própria',
    'team_text' => 'Perfis profissionais ajudam a criar confiança antes do agendamento.',
    'gallery_title' => 'Antes, depois e inspiração visual',
    'gallery_text' => 'Uma galeria filtrável para mostrar resultados reais e aumentar conversão.',
    'promo_title' => 'Pacotes premium',
    'promo_text' => 'Combinações comerciais para noivas, spa day, cabelo + unhas e beleza completa.',
    'reviews_title' => 'Clientes que voltam',
    'cta_title' => 'Transforme uma visita num momento de autocuidado.',
    'cta_text' => 'Agendamento online com resumo, horários disponíveis e confirmação elegante.',
    'services_page_title' => 'Catálogo de serviços',
    'services_page_text' => 'Organizado por categorias, com preço inicial, duração e profissionais disponíveis.',
    'service_detail' => 'Detalhe do serviço',
    'benefits' => 'Benefícios',
    'available_pros' => 'Profissionais disponíveis',
    'related_services' => 'Serviços relacionados',
    'faq' => 'Perguntas frequentes',
    'from_price' => 'Desde',
    'duration' => 'Duração',
    'category' => 'Categoria',
    'details' => 'Ver detalhe',
    'category_all' => 'Todos',
    'cat_hair' => 'Cabelo',
    'cat_color' => 'Coloração',
    'cat_nails' => 'Unhas',
    'cat_makeup' => 'Maquilhagem',
    'cat_lashes' => 'Pestanas',
    'cat_brows' => 'Sobrancelhas',
    'cat_facial' => 'Facial',
    'cat_packages' => 'Pacotes',
    'booking_title' => 'Agendamento online',
    'booking_text' => 'Escolha serviço, profissional, data, horário e confirme em poucos passos.',
    'step_service' => 'Serviço',
    'step_professional' => 'Profissional',
    'step_datetime' => 'Data e hora',
    'step_client' => 'Dados',
    'step_confirm' => 'Confirmação',
    'select_service' => 'Escolha um serviço',
    'select_professional' => 'Escolha uma profissional',
    'select_date' => 'Escolha a data',
    'select_time' => 'Horários disponíveis',
    'client_name' => 'Nome completo',
    'client_phone' => 'Telefone / WhatsApp',
    'client_email' => 'Email',
    'notes' => 'Observações',
    'summary' => 'Resumo do agendamento',
    'empty_summary' => 'O resumo será preenchido à medida que avança.',
    'back' => 'Voltar',
    'next' => 'Continuar',
    'confirm_booking' => 'Confirmar agendamento',
    'required' => 'Preencha os campos necessários.',
    'booking_success' => 'Agendamento criado com sucesso.',
    'confirmation_title' => 'Agendamento confirmado',
    'confirmation_text' => 'A sua referência foi gerada. A equipa pode entrar em contacto para confirmação final.',
    'reference' => 'Referência',
    'see_bookings' => 'Ver meus agendamentos',
    'back_home' => 'Voltar ao início',
    'team_page_title' => 'Equipa e especialistas',
    'team_page_text' => 'Cada profissional tem especialidade, experiência e CTA próprio para agendamento.',
    'experience' => 'experiência',
    'book_with' => 'Agendar com',
    'gallery_page_title' => 'Galeria beauty',
    'gallery_page_text' => 'Filtros por cabelo, unhas, makeup, pestanas e estética.',
    'promotions_page_title' => 'Pacotes e promoções premium',
    'promotions_page_text' => 'Ofertas com posicionamento premium, sem parecer desconto barato.',
    'package_includes' => 'Inclui',
    'about_page_title' => 'Sobre a Aura Beauty',
    'about_page_text' => 'Um conceito feminino premium para salões, estúdios de estética, unhas, pestanas, maquilhagem e spa beauty.',
    'mission' => 'Missão',
    'values' => 'Valores',
    'differentials' => 'Diferenciais',
    'contact_page_title' => 'Contacto',
    'contact_page_text' => 'Morada, telefone, WhatsApp, Instagram, horário, mapa e formulário.',
    'address' => 'Morada',
    'hours' => 'Horário',
    'phone' => 'Telefone',
    'whatsapp' => 'WhatsApp',
    'instagram' => 'Instagram',
    'message' => 'Mensagem',
    'send_message' => 'Enviar mensagem',
    'message_sent' => 'Mensagem enviada com sucesso.',
    'newsletter' => 'Receber novidades beauty',
    'email_placeholder' => 'seu@email.com',
    'footer_text' => 'Template premium para salões de beleza femininos, estética, unhas, makeup e agendamento online.',
    'built_by' => 'Desenvolvido por AlexDevCode.',
  ],
  'es' => [
    'html' => 'es',
    'meta_title' => 'Aura Beauty — Beauty Salon Premium Template',
    'meta_desc' => 'Plantilla premium para salones de belleza, estética, uñas, makeup, pestañas y reservas online.',
    'brand' => 'Aura Beauty',
    'category' => 'Beauty Salon Premium Template',
    'nav_home' => 'Inicio',
    'nav_services' => 'Servicios',
    'nav_booking' => 'Reserva',
    'nav_team' => 'Especialistas',
    'nav_gallery' => 'Galería',
    'nav_promotions' => 'Paquetes',
    'nav_about' => 'Sobre',
    'nav_contact' => 'Contacto',
    'book_now' => 'Reservar ahora',
    'view_services' => 'Ver servicios',
    'hero_badge_1' => 'Atención premium',
    'hero_badge_2' => 'Especialistas certificadas',
    'hero_badge_3' => 'Ambiente exclusivo',
    'hero_title' => 'Realza tu belleza con cuidado, elegancia y atención profesional.',
    'hero_text' => 'Cabello, uñas, estética, pestañas y maquillaje pensados para valorar tu autoestima en un espacio moderno, femenino y acogedor.',
    'home_services_title' => 'Servicios que venden cuidado, imagen y autoestima.',
    'home_services_text' => 'Un catálogo comercial con categorías claras, precio inicial, duración y CTA directo para reservar.',
    'about_short_title' => 'Un salón pensado para mujeres que valoran tiempo, confort y resultado.',
    'about_short_text' => 'Aura Beauty combina técnica, estética premium y una experiencia digital simple: la clienta elige servicio, profesional, horario y confirma sin fricción.',
    'team_title' => 'Especialistas con identidad propia',
    'team_text' => 'Los perfiles profesionales crean confianza antes de reservar.',
    'gallery_title' => 'Antes, después e inspiración visual',
    'gallery_text' => 'Una galería filtrable para mostrar resultados reales y aumentar conversión.',
    'promo_title' => 'Paquetes premium',
    'promo_text' => 'Combinaciones comerciales para novias, spa day, cabello + uñas y belleza completa.',
    'reviews_title' => 'Clientes que vuelven',
    'cta_title' => 'Convierte una visita en un momento de autocuidado.',
    'cta_text' => 'Reserva online con resumen, horarios disponibles y confirmación elegante.',
    'services_page_title' => 'Catálogo de servicios',
    'services_page_text' => 'Organizado por categorías, con precio inicial, duración y profesionales disponibles.',
    'service_detail' => 'Detalle del servicio',
    'benefits' => 'Beneficios',
    'available_pros' => 'Profesionales disponibles',
    'related_services' => 'Servicios relacionados',
    'faq' => 'Preguntas frecuentes',
    'from_price' => 'Desde',
    'duration' => 'Duración',
    'category' => 'Categoría',
    'details' => 'Ver detalle',
    'category_all' => 'Todos',
    'cat_hair' => 'Cabello',
    'cat_color' => 'Coloración',
    'cat_nails' => 'Uñas',
    'cat_makeup' => 'Maquillaje',
    'cat_lashes' => 'Pestañas',
    'cat_brows' => 'Cejas',
    'cat_facial' => 'Facial',
    'cat_packages' => 'Paquetes',
    'booking_title' => 'Reserva online',
    'booking_text' => 'Elige servicio, profesional, fecha, horario y confirma en pocos pasos.',
    'step_service' => 'Servicio',
    'step_professional' => 'Profesional',
    'step_datetime' => 'Fecha y hora',
    'step_client' => 'Datos',
    'step_confirm' => 'Confirmación',
    'select_service' => 'Elige un servicio',
    'select_professional' => 'Elige una profesional',
    'select_date' => 'Elige la fecha',
    'select_time' => 'Horarios disponibles',
    'client_name' => 'Nombre completo',
    'client_phone' => 'Teléfono / WhatsApp',
    'client_email' => 'Email',
    'notes' => 'Observaciones',
    'summary' => 'Resumen de la reserva',
    'empty_summary' => 'El resumen se completará mientras avanzas.',
    'back' => 'Atrás',
    'next' => 'Continuar',
    'confirm_booking' => 'Confirmar reserva',
    'required' => 'Completa los campos necesarios.',
    'booking_success' => 'Reserva creada con éxito.',
    'confirmation_title' => 'Reserva confirmada',
    'confirmation_text' => 'Tu referencia fue generada. El equipo puede contactarte para confirmación final.',
    'reference' => 'Referencia',
    'see_bookings' => 'Ver mis reservas',
    'back_home' => 'Volver al inicio',
    'team_page_title' => 'Equipo y especialistas',
    'team_page_text' => 'Cada profesional tiene especialidad, experiencia y CTA propio para reservar.',
    'experience' => 'experiencia',
    'book_with' => 'Reservar con',
    'gallery_page_title' => 'Galería beauty',
    'gallery_page_text' => 'Filtros por cabello, uñas, makeup, pestañas y estética.',
    'promotions_page_title' => 'Paquetes y promociones premium',
    'promotions_page_text' => 'Ofertas con posicionamiento premium, sin parecer descuento barato.',
    'package_includes' => 'Incluye',
    'about_page_title' => 'Sobre Aura Beauty',
    'about_page_text' => 'Un concepto femenino premium para salones, estudios de estética, uñas, pestañas, maquillaje y spa beauty.',
    'mission' => 'Misión',
    'values' => 'Valores',
    'differentials' => 'Diferenciales',
    'contact_page_title' => 'Contacto',
    'contact_page_text' => 'Dirección, teléfono, WhatsApp, Instagram, horario, mapa y formulario.',
    'address' => 'Dirección',
    'hours' => 'Horario',
    'phone' => 'Teléfono',
    'whatsapp' => 'WhatsApp',
    'instagram' => 'Instagram',
    'message' => 'Mensaje',
    'send_message' => 'Enviar mensaje',
    'message_sent' => 'Mensaje enviado con éxito.',
    'newsletter' => 'Recibir novedades beauty',
    'email_placeholder' => 'tu@email.com',
    'footer_text' => 'Plantilla premium para salones de belleza femeninos, estética, uñas, makeup y reservas online.',
    'built_by' => 'Desarrollado por AlexDevCode.',
  ],
  'en' => [
    'html' => 'en',
    'meta_title' => 'Aura Beauty — Beauty Salon Premium Template',
    'meta_desc' => 'Premium template for beauty salons, aesthetics, nails, makeup, lashes and online booking.',
    'brand' => 'Aura Beauty',
    'category' => 'Beauty Salon Premium Template',
    'nav_home' => 'Home',
    'nav_services' => 'Services',
    'nav_booking' => 'Booking',
    'nav_team' => 'Specialists',
    'nav_gallery' => 'Gallery',
    'nav_promotions' => 'Packages',
    'nav_about' => 'About',
    'nav_contact' => 'Contact',
    'book_now' => 'Book now',
    'view_services' => 'View services',
    'hero_badge_1' => 'Premium service',
    'hero_badge_2' => 'Certified specialists',
    'hero_badge_3' => 'Exclusive space',
    'hero_title' => 'Enhance your beauty with care, elegance and professional service.',
    'hero_text' => 'Hair, nails, aesthetics, lashes and makeup designed to elevate your confidence in a modern, feminine and welcoming space.',
    'home_services_title' => 'Services that sell care, image and confidence.',
    'home_services_text' => 'A commercial catalogue with clear categories, starting price, duration and direct booking CTA.',
    'about_short_title' => 'A salon made for women who value time, comfort and results.',
    'about_short_text' => 'Aura Beauty combines technique, premium aesthetics and a simple digital experience: clients choose service, specialist, time and confirm without friction.',
    'team_title' => 'Specialists with their own identity',
    'team_text' => 'Professional profiles build trust before booking.',
    'gallery_title' => 'Before, after and visual inspiration',
    'gallery_text' => 'A filterable gallery to show real results and increase conversion.',
    'promo_title' => 'Premium packages',
    'promo_text' => 'Commercial combinations for brides, spa day, hair + nails and complete beauty.',
    'reviews_title' => 'Clients who return',
    'cta_title' => 'Turn a visit into a self-care moment.',
    'cta_text' => 'Online booking with summary, available times and elegant confirmation.',
    'services_page_title' => 'Service catalogue',
    'services_page_text' => 'Organized by categories, with starting price, duration and available specialists.',
    'service_detail' => 'Service detail',
    'benefits' => 'Benefits',
    'available_pros' => 'Available specialists',
    'related_services' => 'Related services',
    'faq' => 'Short FAQ',
    'from_price' => 'From',
    'duration' => 'Duration',
    'category' => 'Category',
    'details' => 'View detail',
    'category_all' => 'All',
    'cat_hair' => 'Hair',
    'cat_color' => 'Coloring',
    'cat_nails' => 'Nails',
    'cat_makeup' => 'Makeup',
    'cat_lashes' => 'Lashes',
    'cat_brows' => 'Brows',
    'cat_facial' => 'Facial',
    'cat_packages' => 'Packages',
    'booking_title' => 'Online booking',
    'booking_text' => 'Choose service, specialist, date, time and confirm in a few steps.',
    'step_service' => 'Service',
    'step_professional' => 'Specialist',
    'step_datetime' => 'Date and time',
    'step_client' => 'Details',
    'step_confirm' => 'Confirmation',
    'select_service' => 'Choose a service',
    'select_professional' => 'Choose a specialist',
    'select_date' => 'Choose date',
    'select_time' => 'Available times',
    'client_name' => 'Full name',
    'client_phone' => 'Phone / WhatsApp',
    'client_email' => 'Email',
    'notes' => 'Notes',
    'summary' => 'Booking summary',
    'empty_summary' => 'The summary will be filled as you move forward.',
    'back' => 'Back',
    'next' => 'Continue',
    'confirm_booking' => 'Confirm booking',
    'required' => 'Please fill the required fields.',
    'booking_success' => 'Booking created successfully.',
    'confirmation_title' => 'Booking confirmed',
    'confirmation_text' => 'Your reference was generated. The team may contact you for final confirmation.',
    'reference' => 'Reference',
    'see_bookings' => 'View my bookings',
    'back_home' => 'Back home',
    'team_page_title' => 'Team and specialists',
    'team_page_text' => 'Each specialist has a specialty, experience and dedicated booking CTA.',
    'experience' => 'experience',
    'book_with' => 'Book with',
    'gallery_page_title' => 'Beauty gallery',
    'gallery_page_text' => 'Filters by hair, nails, makeup, lashes and aesthetics.',
    'promotions_page_title' => 'Premium packages and promotions',
    'promotions_page_text' => 'Offers with premium positioning, without looking like cheap discounts.',
    'package_includes' => 'Includes',
    'about_page_title' => 'About Aura Beauty',
    'about_page_text' => 'A premium feminine concept for salons, aesthetics studios, nails, lashes, makeup and beauty spa.',
    'mission' => 'Mission',
    'values' => 'Values',
    'differentials' => 'Differentials',
    'contact_page_title' => 'Contact',
    'contact_page_text' => 'Address, phone, WhatsApp, Instagram, hours, map and form.',
    'address' => 'Address',
    'hours' => 'Opening hours',
    'phone' => 'Phone',
    'whatsapp' => 'WhatsApp',
    'instagram' => 'Instagram',
    'message' => 'Message',
    'send_message' => 'Send message',
    'message_sent' => 'Message sent successfully.',
    'newsletter' => 'Receive beauty updates',
    'email_placeholder' => 'you@email.com',
    'footer_text' => 'Premium template for women’s beauty salons, aesthetics, nails, makeup and online booking.',
    'built_by' => 'Built by AlexDevCode.',
  ],
];

$t = $tr[$lang];

$categoryLabels = [
  'all' => $t['category_all'],
  'hair' => $t['cat_hair'],
  'color' => $t['cat_color'],
  'nails' => $t['cat_nails'],
  'makeup' => $t['cat_makeup'],
  'lashes' => $t['cat_lashes'],
  'brows' => $t['cat_brows'],
  'facial' => $t['cat_facial'],
  'packages' => $t['cat_packages'],
];

$categoryIcons = [
  'all' => 'bi-grid-1x2',
  'hair' => 'bi-scissors',
  'color' => 'bi-palette2',
  'nails' => 'bi-gem',
  'makeup' => 'bi-brush',
  'lashes' => 'bi-eye',
  'brows' => 'bi-feather',
  'facial' => 'bi-droplet',
  'packages' => 'bi-stars',
];

$team = [
  [
    'id' => 'ines',
    'name' => 'Inês Carvalho',
    'role' => ['pt' => 'Hair Stylist & Colorista', 'es' => 'Hair Stylist & Colorista', 'en' => 'Hair Stylist & Colorist'],
    'bio' => ['pt' => 'Especialista em corte, styling, coloração natural e brilho saudável.', 'es' => 'Especialista en corte, styling, coloración natural y brillo saludable.', 'en' => 'Specialist in cuts, styling, natural color and healthy shine.'],
    'years' => '9+',
    'image' => 'https://images.unsplash.com/photo-1580618672591-eb180b1a973f?auto=format&fit=crop&w=900&q=82',
    'instagram' => '@ines.aura',
  ],
  [
    'id' => 'camila',
    'name' => 'Camila Rodrigues',
    'role' => ['pt' => 'Estética Facial & Dermocuidado', 'es' => 'Estética Facial & Dermocuidado', 'en' => 'Facial Aesthetics & Skin Care'],
    'bio' => ['pt' => 'Focada em limpeza de pele, hidratação, luminosidade e protocolos suaves.', 'es' => 'Enfocada en limpieza facial, hidratación, luminosidad y protocolos suaves.', 'en' => 'Focused on cleansing, hydration, glow and gentle skin protocols.'],
    'years' => '7+',
    'image' => 'https://images.unsplash.com/photo-1595152772835-219674b2a8a6?auto=format&fit=crop&w=900&q=82',
    'instagram' => '@camila.aura',
  ],
  [
    'id' => 'joana',
    'name' => 'Joana Lima',
    'role' => ['pt' => 'Makeup Artist & Noivas', 'es' => 'Makeup Artist & Novias', 'en' => 'Makeup Artist & Bridal'],
    'bio' => ['pt' => 'Maquilhagem social, noivas, fotografia e looks naturais sofisticados.', 'es' => 'Maquillaje social, novias, fotografía y looks naturales sofisticados.', 'en' => 'Social makeup, brides, photography and refined natural looks.'],
    'years' => '8+',
    'image' => 'https://images.unsplash.com/photo-1596075780750-81249df16d19?auto=format&fit=crop&w=900&q=82',
    'instagram' => '@joana.aura',
  ],
  [
    'id' => 'marta',
    'name' => 'Marta Silva',
    'role' => ['pt' => 'Nail Designer & Brows', 'es' => 'Nail Designer & Cejas', 'en' => 'Nail Designer & Brows'],
    'bio' => ['pt' => 'Unhas elegantes, gel, nail art minimalista e design de sobrancelhas.', 'es' => 'Uñas elegantes, gel, nail art minimalista y diseño de cejas.', 'en' => 'Elegant nails, gel, minimalist nail art and brow design.'],
    'years' => '6+',
    'image' => 'https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=900&q=82',
    'instagram' => '@marta.aura',
  ],
];

$services = [
  [
    'slug' => 'hair-glow',
    'category' => 'hair',
    'price' => 32,
    'duration' => '60 min',
    'professionals' => ['ines'],
    'image' => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=1200&q=82',
    'name' => ['pt' => 'Corte Glow & Finalização', 'es' => 'Corte Glow y Finalización', 'en' => 'Glow Cut & Styling'],
    'short' => ['pt' => 'Corte feminino, lavagem premium e finalização com brilho.', 'es' => 'Corte femenino, lavado premium y acabado con brillo.', 'en' => 'Women’s cut, premium wash and glossy styling.'],
    'long' => ['pt' => 'Um serviço essencial para renovar o visual com corte personalizado, diagnóstico capilar, lavagem premium e finalização alinhada ao estilo da cliente.', 'es' => 'Un servicio esencial para renovar el look con corte personalizado, diagnóstico capilar, lavado premium y acabado alineado al estilo de la clienta.', 'en' => 'An essential service to refresh the look with a personalized cut, hair diagnosis, premium wash and styling aligned with the client’s style.'],
    'benefits' => ['pt' => ['Corte adaptado ao rosto', 'Brilho e movimento', 'Finalização profissional'], 'es' => ['Corte adaptado al rostro', 'Brillo y movimiento', 'Acabado profesional'], 'en' => ['Face-framing cut', 'Shine and movement', 'Professional styling']],
  ],
  [
    'slug' => 'color-ritual',
    'category' => 'color',
    'price' => 68,
    'duration' => '120 min',
    'professionals' => ['ines'],
    'image' => 'https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&w=1200&q=82',
    'name' => ['pt' => 'Ritual de Coloração Premium', 'es' => 'Ritual de Coloración Premium', 'en' => 'Premium Color Ritual'],
    'short' => ['pt' => 'Coloração, tonalização ou brilho com diagnóstico profissional.', 'es' => 'Coloración, matiz o brillo con diagnóstico profesional.', 'en' => 'Color, toner or gloss with professional diagnosis.'],
    'long' => ['pt' => 'Coloração com análise de tom, saúde do fio, tratamento de proteção e acabamento luminoso para um resultado sofisticado.', 'es' => 'Coloración con análisis de tono, salud del cabello, tratamiento protector y acabado luminoso para un resultado sofisticado.', 'en' => 'Color service with tone analysis, hair health check, protective treatment and luminous finish for a refined result.'],
    'benefits' => ['pt' => ['Tom personalizado', 'Proteção do fio', 'Acabamento premium'], 'es' => ['Tono personalizado', 'Protección del cabello', 'Acabado premium'], 'en' => ['Personalized tone', 'Hair protection', 'Premium finish']],
  ],
  [
    'slug' => 'signature-nails',
    'category' => 'nails',
    'price' => 24,
    'duration' => '50 min',
    'professionals' => ['marta'],
    'image' => 'https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&w=1200&q=82',
    'name' => ['pt' => 'Unhas Signature', 'es' => 'Uñas Signature', 'en' => 'Signature Nails'],
    'short' => ['pt' => 'Manicure premium, gel ou acabamento natural elegante.', 'es' => 'Manicura premium, gel o acabado natural elegante.', 'en' => 'Premium manicure, gel or elegant natural finish.'],
    'long' => ['pt' => 'Cuidados de mãos, cutícula, formato, hidratação e acabamento de longa duração com estética minimalista.', 'es' => 'Cuidado de manos, cutícula, forma, hidratación y acabado duradero con estética minimalista.', 'en' => 'Hand care, cuticle, shape, hydration and long-lasting finish with a minimalist aesthetic.'],
    'benefits' => ['pt' => ['Acabamento delicado', 'Durabilidade', 'Design limpo'], 'es' => ['Acabado delicado', 'Durabilidad', 'Diseño limpio'], 'en' => ['Delicate finish', 'Durability', 'Clean design']],
  ],
  [
    'slug' => 'bridal-makeup',
    'category' => 'makeup',
    'price' => 85,
    'duration' => '90 min',
    'professionals' => ['joana'],
    'image' => 'https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?auto=format&fit=crop&w=1200&q=82',
    'name' => ['pt' => 'Maquilhagem Social & Noiva', 'es' => 'Maquillaje Social & Novia', 'en' => 'Social & Bridal Makeup'],
    'short' => ['pt' => 'Makeup premium para eventos, fotografia e noivas.', 'es' => 'Makeup premium para eventos, fotografía y novias.', 'en' => 'Premium makeup for events, photography and brides.'],
    'long' => ['pt' => 'Construção de pele, olhos, acabamento fotográfico e orientação de look para eventos especiais.', 'es' => 'Construcción de piel, ojos, acabado fotográfico y orientación de look para eventos especiales.', 'en' => 'Skin prep, eye design, photo-ready finish and look guidance for special events.'],
    'benefits' => ['pt' => ['Pele sofisticada', 'Longa duração', 'Resultado fotográfico'], 'es' => ['Piel sofisticada', 'Larga duración', 'Resultado fotográfico'], 'en' => ['Refined skin', 'Long wear', 'Photo-ready result']],
  ],
  [
    'slug' => 'lash-design',
    'category' => 'lashes',
    'price' => 48,
    'duration' => '75 min',
    'professionals' => ['marta'],
    'image' => 'https://images.unsplash.com/photo-1512496015851-a90fb38ba796?auto=format&fit=crop&w=1200&q=82',
    'name' => ['pt' => 'Lash Design Natural', 'es' => 'Lash Design Natural', 'en' => 'Natural Lash Design'],
    'short' => ['pt' => 'Extensão de pestanas com resultado leve, elegante e confortável.', 'es' => 'Extensión de pestañas con resultado ligero, elegante y cómodo.', 'en' => 'Lash extensions with a light, elegant and comfortable result.'],
    'long' => ['pt' => 'Mapeamento do olhar, aplicação cuidadosa e acabamento natural para realçar sem pesar.', 'es' => 'Mapeo de la mirada, aplicación cuidadosa y acabado natural para realzar sin pesar.', 'en' => 'Eye mapping, careful application and natural finish to enhance without heaviness.'],
    'benefits' => ['pt' => ['Olhar definido', 'Conforto', 'Efeito natural'], 'es' => ['Mirada definida', 'Confort', 'Efecto natural'], 'en' => ['Defined eyes', 'Comfort', 'Natural effect']],
  ],
  [
    'slug' => 'brow-architecture',
    'category' => 'brows',
    'price' => 18,
    'duration' => '35 min',
    'professionals' => ['marta'],
    'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=1200&q=82',
    'name' => ['pt' => 'Arquitetura de Sobrancelhas', 'es' => 'Arquitectura de Cejas', 'en' => 'Brow Architecture'],
    'short' => ['pt' => 'Design, simetria e acabamento para valorizar o olhar.', 'es' => 'Diseño, simetría y acabado para realzar la mirada.', 'en' => 'Design, symmetry and finish to elevate the eyes.'],
    'long' => ['pt' => 'Análise de formato, simetria facial e design com acabamento delicado para sobrancelhas naturais.', 'es' => 'Análisis de forma, simetría facial y diseño con acabado delicado para cejas naturales.', 'en' => 'Shape analysis, facial symmetry and delicate finish for natural brows.'],
    'benefits' => ['pt' => ['Simetria', 'Expressão leve', 'Acabamento natural'], 'es' => ['Simetría', 'Expresión ligera', 'Acabado natural'], 'en' => ['Symmetry', 'Soft expression', 'Natural finish']],
  ],
  [
    'slug' => 'facial-glow',
    'category' => 'facial',
    'price' => 45,
    'duration' => '70 min',
    'professionals' => ['camila'],
    'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=1200&q=82',
    'name' => ['pt' => 'Facial Glow & Limpeza de Pele', 'es' => 'Facial Glow y Limpieza Facial', 'en' => 'Facial Glow & Skin Cleansing'],
    'short' => ['pt' => 'Limpeza, hidratação e luminosidade para pele renovada.', 'es' => 'Limpieza, hidratación y luminosidad para piel renovada.', 'en' => 'Cleansing, hydration and glow for renewed skin.'],
    'long' => ['pt' => 'Protocolo facial com limpeza suave, hidratação, máscara e finalização luminosa adaptada ao tipo de pele.', 'es' => 'Protocolo facial con limpieza suave, hidratación, mascarilla y acabado luminoso adaptado al tipo de piel.', 'en' => 'Facial protocol with gentle cleansing, hydration, mask and luminous finish adapted to skin type.'],
    'benefits' => ['pt' => ['Pele limpa', 'Hidratação', 'Luminosidade'], 'es' => ['Piel limpia', 'Hidratación', 'Luminosidad'], 'en' => ['Clean skin', 'Hydration', 'Glow']],
  ],
  [
    'slug' => 'beauty-pack',
    'category' => 'packages',
    'price' => 119,
    'duration' => '180 min',
    'professionals' => ['ines', 'marta', 'joana'],
    'image' => 'https://images.unsplash.com/photo-1600948836101-f9ffda59d250?auto=format&fit=crop&w=1200&q=82',
    'name' => ['pt' => 'Pack Beauty Premium', 'es' => 'Pack Beauty Premium', 'en' => 'Premium Beauty Pack'],
    'short' => ['pt' => 'Cabelo, unhas e maquilhagem num ritual completo.', 'es' => 'Cabello, uñas y maquillaje en un ritual completo.', 'en' => 'Hair, nails and makeup in one complete ritual.'],
    'long' => ['pt' => 'Uma experiência completa para eventos, fotografias, presentes ou dias de autocuidado.', 'es' => 'Una experiencia completa para eventos, fotografías, regalos o días de autocuidado.', 'en' => 'A complete experience for events, photoshoots, gifts or self-care days.'],
    'benefits' => ['pt' => ['Experiência completa', 'Economia de tempo', 'Resultado coordenado'], 'es' => ['Experiencia completa', 'Ahorro de tiempo', 'Resultado coordinado'], 'en' => ['Complete experience', 'Time-saving', 'Coordinated result']],
  ],
];

$servicesBySlug = [];
foreach ($services as $service) {
  $servicesBySlug[$service['slug']] = $service;
}

$selectedSlug = $_GET['slug'] ?? ($services[0]['slug'] ?? '');
$selectedService = $servicesBySlug[$selectedSlug] ?? $services[0];
$preselectedService = $_GET['service'] ?? '';
$preselectedPro = $_GET['pro'] ?? '';

$promotions = [
  [
    'title' => ['pt' => 'Dia da Noiva Aura', 'es' => 'Día de Novia Aura', 'en' => 'Aura Bridal Day'],
    'price' => 189,
    'image' => 'https://images.unsplash.com/photo-1522338242992-e1a54906a8da?auto=format&fit=crop&w=1200&q=82',
    'items' => ['Hair styling', 'Makeup premium', 'Unhas', 'Retoque final'],
  ],
  [
    'title' => ['pt' => 'Spa Day Feminino', 'es' => 'Spa Day Femenino', 'en' => 'Women’s Spa Day'],
    'price' => 145,
    'image' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?auto=format&fit=crop&w=1200&q=82',
    'items' => ['Facial glow', 'Massagem relax', 'Spa mãos', 'Chá beauty'],
  ],
  [
    'title' => ['pt' => 'Pack Cabelo + Unhas', 'es' => 'Pack Cabello + Uñas', 'en' => 'Hair + Nails Pack'],
    'price' => 72,
    'image' => 'https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&w=1200&q=82',
    'items' => ['Corte glow', 'Finalização', 'Manicure premium', 'Hidratação'],
  ],
];

$gallery = [
  ['cat' => 'hair', 'image' => 'https://images.unsplash.com/photo-1522337660859-02fbefca4702?auto=format&fit=crop&w=1100&q=82'],
  ['cat' => 'nails', 'image' => 'https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&w=1100&q=82'],
  ['cat' => 'makeup', 'image' => 'https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?auto=format&fit=crop&w=1100&q=82'],
  ['cat' => 'facial', 'image' => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=1100&q=82'],
  ['cat' => 'lashes', 'image' => 'https://images.unsplash.com/photo-1512496015851-a90fb38ba796?auto=format&fit=crop&w=1100&q=82'],
  ['cat' => 'color', 'image' => 'https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&w=1100&q=82'],
  ['cat' => 'hair', 'image' => 'https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?auto=format&fit=crop&w=1100&q=82'],
  ['cat' => 'facial', 'image' => 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&w=1100&q=82'],
];

function service_name($service, $lang) { return $service['name'][$lang] ?? $service['name']['pt']; }
function service_short($service, $lang) { return $service['short'][$lang] ?? $service['short']['pt']; }
function service_long($service, $lang) { return $service['long'][$lang] ?? $service['long']['pt']; }
function team_role($pro, $lang) { return $pro['role'][$lang] ?? $pro['role']['pt']; }
function team_bio($pro, $lang) { return $pro['bio'][$lang] ?? $pro['bio']['pt']; }
function find_team($team, $id) {
  foreach ($team as $pro) {
    if ($pro['id'] === $id) return $pro;
  }
  return null;
}
?>
<!DOCTYPE html>
<html lang="<?= e($t['html']) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= e($t['meta_desc']) ?>">
  <meta name="theme-color" content="#FFF8F8">
  <title><?= e($t['meta_title']) ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root {
      --ab-bg: #FFF8F8;
      --ab-soft: #F9F1F2;
      --ab-card: #FFFFFF;
      --ab-text: #2B2225;
      --ab-muted: #7B6B70;
      --ab-blush: #E8C7CF;
      --ab-pink: #D89AA8;
      --ab-rose: #C88C7A;
      --ab-champagne: #E8D8C3;
      --ab-line: rgba(43, 34, 37, 0.08);
      --ab-line-strong: rgba(43, 34, 37, 0.14);
      --ab-shadow: 0 24px 70px rgba(43, 34, 37, 0.10);
      --ab-shadow-soft: 0 14px 38px rgba(43, 34, 37, 0.08);
      --ab-radius-xl: 38px;
      --ab-radius-lg: 26px;
      --ab-radius-md: 18px;
      --ab-max: 1180px;
    }

    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      margin: 0;
      font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background:
        radial-gradient(circle at 12% 0%, rgba(216,154,168,.28), transparent 30rem),
        radial-gradient(circle at 95% 8%, rgba(232,216,195,.45), transparent 32rem),
        linear-gradient(180deg, var(--ab-bg), #fff 48%, var(--ab-soft));
      color: var(--ab-text);
      overflow-x: hidden;
    }
    body.ab-lock { overflow: hidden; }
    a { color: inherit; text-decoration: none; }
    button, input, select, textarea { font: inherit; }
    button { cursor: pointer; }
    img { max-width: 100%; display: block; }

    .ab-wrap { width: min(var(--ab-max), calc(100% - 32px)); margin-inline: auto; }
    .ab-section { padding: 82px 0; }
    .ab-muted { color: var(--ab-muted); }
    .ab-kicker {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      color: var(--ab-rose);
      text-transform: uppercase;
      letter-spacing: .16em;
      font-size: .76rem;
      font-weight: 900;
    }
    .ab-kicker::before {
      content: '';
      width: 34px;
      height: 1px;
      background: currentColor;
    }
    .ab-title {
      margin: 12px 0 0;
      font-family: 'Playfair Display', Georgia, serif;
      font-size: clamp(2.3rem, 5vw, 5.25rem);
      line-height: .95;
      letter-spacing: -.052em;
      color: var(--ab-text);
    }
    .ab-lead {
      max-width: 720px;
      margin: 18px 0 0;
      color: var(--ab-muted);
      font-size: clamp(1rem, 1.4vw, 1.15rem);
      line-height: 1.82;
    }
    .ab-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      min-height: 48px;
      padding: 13px 18px;
      border: 1px solid transparent;
      border-radius: 999px;
      color: var(--ab-text);
      font-weight: 900;
      transition: transform .18s ease, box-shadow .18s ease, background .18s ease, border-color .18s ease;
    }
    .ab-btn:hover, .ab-btn:focus-visible { transform: translateY(-2px); outline: none; }
    .ab-btn-main { background: var(--ab-text); color: #fff; box-shadow: 0 18px 40px rgba(43,34,37,.18); }
    .ab-btn-main:hover { background: #3a2d31; box-shadow: 0 22px 50px rgba(43,34,37,.22); }
    .ab-btn-soft { background: rgba(255,255,255,.74); border-color: var(--ab-line); color: var(--ab-text); }
    .ab-btn-soft:hover { border-color: rgba(200,140,122,.36); background: #fff; }
    .ab-btn-rose { background: var(--ab-rose); color: #fff; box-shadow: 0 16px 36px rgba(200,140,122,.24); }
    .ab-btn-small { min-height: 40px; padding: 10px 14px; font-size: .9rem; }

    .ab-header {
      position: sticky;
      top: 0;
      z-index: 70;
      border-bottom: 1px solid var(--ab-line);
      background: rgba(255,248,248,.82);
      backdrop-filter: blur(18px);
    }
    .ab-nav {
      min-height: 76px;
      display: flex;
      align-items: center;
      gap: 18px;
      justify-content: space-between;
    }
    .ab-brand {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      min-width: fit-content;
    }
    .ab-mark {
      width: 44px;
      height: 44px;
      display: grid;
      place-items: center;
      border: 1px solid rgba(200,140,122,.28);
      border-radius: 16px;
      background: linear-gradient(145deg, #fff, var(--ab-soft));
      color: var(--ab-rose);
      box-shadow: inset 0 1px 0 rgba(255,255,255,.9);
    }
    .ab-brand strong {
      display: block;
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 1.42rem;
      line-height: 1;
      letter-spacing: -.035em;
    }
    .ab-brand span {
      display: block;
      margin-top: 3px;
      color: var(--ab-muted);
      font-size: .68rem;
      font-weight: 900;
      letter-spacing: .12em;
      text-transform: uppercase;
    }
    .ab-links {
      display: flex;
      align-items: center;
      gap: 3px;
      margin-left: auto;
    }
    .ab-link {
      padding: 10px 11px;
      border-radius: 999px;
      color: var(--ab-muted);
      font-size: .92rem;
      font-weight: 850;
    }
    .ab-link:hover, .ab-link.active { color: var(--ab-text); background: rgba(232,199,207,.28); }
    .ab-actions { display: flex; align-items: center; gap: 10px; }
    .ab-lang {
      min-height: 42px;
      border: 1px solid var(--ab-line);
      border-radius: 999px;
      padding: 0 32px 0 12px;
      background: rgba(255,255,255,.72);
      color: var(--ab-text);
      outline: none;
    }
    .ab-menu-btn {
      display: none;
      width: 44px;
      height: 44px;
      border: 1px solid var(--ab-line);
      border-radius: 999px;
      background: #fff;
      color: var(--ab-text);
    }

    .ab-page-hero {
      padding: 72px 0 42px;
    }
    .ab-breadcrumb {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      align-items: center;
      color: var(--ab-muted);
      font-size: .9rem;
      font-weight: 750;
      margin-bottom: 22px;
    }
    .ab-breadcrumb i { color: var(--ab-rose); }

    .ab-hero {
      position: relative;
      padding: 74px 0 46px;
      overflow: hidden;
    }
    .ab-hero-grid {
      display: grid;
      grid-template-columns: 1.02fr .98fr;
      gap: 52px;
      align-items: center;
    }
    .ab-badges {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 24px;
    }
    .ab-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      width: fit-content;
      min-height: 36px;
      padding: 8px 12px;
      border: 1px solid var(--ab-line);
      border-radius: 999px;
      background: rgba(255,255,255,.72);
      color: var(--ab-text);
      font-size: .86rem;
      font-weight: 850;
      box-shadow: 0 8px 22px rgba(43,34,37,.04);
    }
    .ab-pill i { color: var(--ab-rose); }
    .ab-hero-actions { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 28px; }
    .ab-hero-visual {
      position: relative;
      min-height: 590px;
    }
    .ab-hero-portrait {
      position: absolute;
      inset: 0 0 auto auto;
      width: min(510px, 92%);
      border-radius: 48px 48px 12px 48px;
      overflow: hidden;
      box-shadow: var(--ab-shadow);
      border: 10px solid rgba(255,255,255,.82);
      background: #fff;
    }
    .ab-hero-portrait img {
      width: 100%;
      height: 540px;
      object-fit: cover;
    }
    .ab-hero-note {
      position: absolute;
      left: 0;
      bottom: 72px;
      width: min(330px, 86%);
      padding: 18px;
      border: 1px solid var(--ab-line);
      border-radius: 28px;
      background: rgba(255,255,255,.88);
      backdrop-filter: blur(14px);
      box-shadow: var(--ab-shadow-soft);
    }
    .ab-hero-note strong { display: block; margin-bottom: 6px; }
    .ab-hero-note span { color: var(--ab-muted); line-height: 1.6; font-size: .92rem; }
    .ab-vertical-tag {
      position: absolute;
      right: -8px;
      bottom: 40px;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 12px 16px;
      border-radius: 999px;
      background: var(--ab-text);
      color: #fff;
      transform: rotate(-4deg);
      box-shadow: 0 18px 34px rgba(43,34,37,.16);
      font-weight: 900;
    }

    .ab-strip {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 12px;
      margin-top: 22px;
    }
    .ab-strip-item {
      padding: 16px;
      border: 1px solid var(--ab-line);
      border-radius: 22px;
      background: rgba(255,255,255,.78);
      box-shadow: 0 12px 28px rgba(43,34,37,.05);
    }
    .ab-strip-item i { color: var(--ab-rose); }
    .ab-strip-item strong { display: block; margin-top: 8px; font-size: .96rem; }
    .ab-strip-item span { display: block; margin-top: 4px; color: var(--ab-muted); font-size: .84rem; }

    .ab-section-head {
      display: flex;
      justify-content: space-between;
      align-items: end;
      gap: 22px;
      margin-bottom: 30px;
    }
    .ab-section-head > div { max-width: 780px; }

    .ab-service-feature {
      display: grid;
      grid-template-columns: .9fr 1.1fr;
      gap: 22px;
      align-items: stretch;
    }
    .ab-editorial-image, .ab-panel, .ab-soft-panel {
      border: 1px solid var(--ab-line);
      border-radius: var(--ab-radius-xl);
      background: rgba(255,255,255,.78);
      box-shadow: var(--ab-shadow-soft);
      overflow: hidden;
    }
    .ab-editorial-image img {
      width: 100%;
      height: 100%;
      min-height: 530px;
      object-fit: cover;
    }
    .ab-panel {
      padding: 32px;
      display: grid;
      gap: 18px;
      align-content: center;
    }
    .ab-panel p, .ab-soft-panel p { color: var(--ab-muted); line-height: 1.75; }
    .ab-point-list {
      display: grid;
      gap: 12px;
      margin: 0;
      padding: 0;
      list-style: none;
    }
    .ab-point-list li {
      display: flex;
      gap: 12px;
      align-items: flex-start;
      color: var(--ab-muted);
      line-height: 1.65;
    }
    .ab-point-list i {
      width: 28px;
      height: 28px;
      flex: 0 0 auto;
      display: grid;
      place-items: center;
      border-radius: 50%;
      background: var(--ab-soft);
      color: var(--ab-rose);
    }

    .ab-category-rail {
      display: flex;
      gap: 10px;
      overflow-x: auto;
      padding: 4px 2px 12px;
      scrollbar-width: thin;
    }
    .ab-category-btn, .ab-category-link {
      flex: 0 0 auto;
      display: inline-flex;
      align-items: center;
      gap: 9px;
      min-height: 44px;
      padding: 0 14px;
      border: 1px solid var(--ab-line);
      border-radius: 999px;
      background: rgba(255,255,255,.8);
      color: var(--ab-muted);
      font-weight: 900;
      transition: background .18s ease, color .18s ease, border-color .18s ease;
    }
    .ab-category-btn i, .ab-category-link i { color: var(--ab-rose); }
    .ab-category-btn:hover, .ab-category-btn.active, .ab-category-link:hover { color: var(--ab-text); border-color: rgba(200,140,122,.36); background: var(--ab-soft); }

    .ab-services-list {
      display: grid;
      gap: 16px;
    }
    .ab-service-row {
      display: grid;
      grid-template-columns: 210px minmax(0, 1fr) auto;
      gap: 20px;
      align-items: center;
      min-height: 188px;
      padding: 14px;
      border: 1px solid var(--ab-line);
      border-radius: 30px;
      background: rgba(255,255,255,.82);
      box-shadow: 0 14px 34px rgba(43,34,37,.055);
      transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
    }
    .ab-service-row:hover {
      transform: translateY(-3px);
      box-shadow: var(--ab-shadow-soft);
      border-color: rgba(200,140,122,.28);
    }
    .ab-service-row img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      border-radius: 22px;
    }
    .ab-service-row h3 {
      margin: 0;
      font-family: 'Playfair Display', Georgia, serif;
      font-size: 1.65rem;
      line-height: 1;
      letter-spacing: -.03em;
    }
    .ab-service-row p {
      margin: 10px 0 0;
      color: var(--ab-muted);
      line-height: 1.6;
    }
    .ab-service-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 14px;
    }
    .ab-price-box {
      min-width: 154px;
      display: grid;
      gap: 10px;
      justify-items: end;
      text-align: right;
    }
    .ab-price-box strong {
      font-size: 1.25rem;
      color: var(--ab-rose);
    }

    .ab-team-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
    }
    .ab-team-person {
      position: relative;
      min-height: 420px;
      border: 1px solid var(--ab-line);
      border-radius: 34px;
      overflow: hidden;
      background: #fff;
      box-shadow: var(--ab-shadow-soft);
      isolation: isolate;
    }
    .ab-team-person img {
      width: 100%;
      height: 100%;
      position: absolute;
      inset: 0;
      object-fit: cover;
      transition: transform .35s ease;
      z-index: 0;
    }
    .ab-team-person::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, transparent 35%, rgba(43,34,37,.78));
      z-index: 1;
    }
    .ab-team-person:hover img { transform: scale(1.04); }
    .ab-team-info {
      position: absolute;
      left: 16px;
      right: 16px;
      bottom: 16px;
      z-index: 2;
      color: #fff;
    }
    .ab-team-info h3 { margin: 0; font-family: 'Playfair Display', Georgia, serif; font-size: 1.7rem; line-height: 1; }
    .ab-team-info p { margin: 8px 0 12px; color: rgba(255,255,255,.82); font-size: .92rem; line-height: 1.5; }

    .ab-gallery-grid {
      display: grid;
      grid-template-columns: 1.1fr .9fr 1fr;
      grid-auto-rows: 220px;
      gap: 14px;
    }
    .ab-gallery-item {
      position: relative;
      border-radius: 30px;
      overflow: hidden;
      border: 1px solid var(--ab-line);
      background: #fff;
      box-shadow: 0 14px 34px rgba(43,34,37,.06);
    }
    .ab-gallery-item:nth-child(1), .ab-gallery-item:nth-child(5) { grid-row: span 2; }
    .ab-gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform .35s ease; }
    .ab-gallery-item:hover img { transform: scale(1.04); }
    .ab-gallery-label {
      position: absolute;
      left: 14px;
      bottom: 14px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      min-height: 34px;
      padding: 7px 10px;
      border-radius: 999px;
      background: rgba(255,255,255,.86);
      color: var(--ab-text);
      font-size: .82rem;
      font-weight: 900;
    }

    .ab-promo-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px;
    }
    .ab-promo {
      border: 1px solid var(--ab-line);
      border-radius: 34px;
      overflow: hidden;
      background: #fff;
      box-shadow: var(--ab-shadow-soft);
    }
    .ab-promo img { width: 100%; height: 250px; object-fit: cover; }
    .ab-promo-body { padding: 22px; display: grid; gap: 14px; }
    .ab-promo h3 { margin: 0; font-family: 'Playfair Display', Georgia, serif; font-size: 1.9rem; line-height: 1; }
    .ab-promo ul { margin: 0; padding: 0; list-style: none; display: grid; gap: 9px; color: var(--ab-muted); }
    .ab-promo li { display: flex; gap: 9px; align-items: center; }
    .ab-promo li i { color: var(--ab-rose); }

    .ab-review-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
    }
    .ab-review {
      padding: 24px;
      border: 1px solid var(--ab-line);
      border-radius: 30px;
      background: rgba(255,255,255,.8);
      box-shadow: 0 14px 34px rgba(43,34,37,.055);
    }
    .ab-review p { color: var(--ab-muted); line-height: 1.72; }
    .ab-stars { color: var(--ab-rose); letter-spacing: .08em; }

    .ab-booking-layout {
      display: grid;
      grid-template-columns: minmax(0, 1fr) 370px;
      gap: 22px;
      align-items: start;
    }
    .ab-booking-card, .ab-summary-card, .ab-contact-card {
      border: 1px solid var(--ab-line);
      border-radius: var(--ab-radius-xl);
      background: rgba(255,255,255,.84);
      box-shadow: var(--ab-shadow-soft);
      overflow: hidden;
    }
    .ab-booking-card { padding: 28px; }
    .ab-summary-card { position: sticky; top: 100px; padding: 24px; }
    .ab-stepper {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 8px;
      margin: 24px 0;
    }
    .ab-step {
      min-height: 42px;
      border: 1px solid var(--ab-line);
      border-radius: 999px;
      background: #fff;
      color: var(--ab-muted);
      font-size: .8rem;
      font-weight: 950;
    }
    .ab-step.active { background: var(--ab-text); color: #fff; border-color: var(--ab-text); }
    .ab-booking-step { display: none; gap: 16px; }
    .ab-booking-step.active { display: grid; }
    .ab-choice-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
    }
    .ab-choice {
      display: grid;
      gap: 10px;
      padding: 16px;
      border: 1px solid var(--ab-line);
      border-radius: 22px;
      background: #fff;
      color: var(--ab-muted);
      cursor: pointer;
      transition: border-color .18s ease, transform .18s ease, background .18s ease;
    }
    .ab-choice:hover { transform: translateY(-2px); border-color: rgba(200,140,122,.34); }
    .ab-choice input { accent-color: var(--ab-rose); }
    .ab-choice:has(input:checked) { border-color: var(--ab-rose); background: var(--ab-soft); color: var(--ab-text); }
    .ab-choice strong { color: var(--ab-text); }
    .ab-time-grid { display: flex; flex-wrap: wrap; gap: 10px; }
    .ab-time-btn {
      min-height: 42px;
      padding: 0 14px;
      border: 1px solid var(--ab-line);
      border-radius: 999px;
      background: #fff;
      color: var(--ab-muted);
      font-weight: 900;
    }
    .ab-time-btn.active { background: var(--ab-rose); color: #fff; border-color: var(--ab-rose); }
    .ab-field { display: grid; gap: 8px; }
    .ab-field label { font-size: .86rem; font-weight: 900; color: var(--ab-text); }
    .ab-input, .ab-select, .ab-textarea {
      width: 100%;
      min-height: 50px;
      border: 1px solid var(--ab-line);
      border-radius: 18px;
      padding: 0 14px;
      background: #fff;
      color: var(--ab-text);
      outline: none;
    }
    .ab-textarea { min-height: 110px; padding: 12px 14px; resize: vertical; }
    .ab-input:focus, .ab-select:focus, .ab-textarea:focus { border-color: var(--ab-rose); box-shadow: 0 0 0 4px rgba(200,140,122,.12); }
    .ab-form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
    .ab-full { grid-column: 1 / -1; }
    .ab-booking-actions { display: flex; justify-content: space-between; gap: 12px; margin-top: 22px; }
    .ab-summary-lines { display: grid; gap: 12px; }
    .ab-summary-line { display: flex; justify-content: space-between; gap: 16px; padding-bottom: 12px; border-bottom: 1px solid var(--ab-line); color: var(--ab-muted); }
    .ab-summary-line strong { color: var(--ab-text); text-align: right; }

    .ab-detail-layout {
      display: grid;
      grid-template-columns: 1.02fr .98fr;
      gap: 24px;
      align-items: start;
    }
    .ab-detail-photo {
      border: 1px solid var(--ab-line);
      border-radius: var(--ab-radius-xl);
      overflow: hidden;
      box-shadow: var(--ab-shadow-soft);
      background: #fff;
    }
    .ab-detail-photo img { width: 100%; height: 610px; object-fit: cover; }
    .ab-detail-panel { padding: 32px; border: 1px solid var(--ab-line); border-radius: var(--ab-radius-xl); background: rgba(255,255,255,.84); box-shadow: var(--ab-shadow-soft); }
    .ab-detail-meta { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin: 22px 0; }
    .ab-meta-box { padding: 14px; border: 1px solid var(--ab-line); border-radius: 20px; background: var(--ab-soft); }
    .ab-meta-box span { display: block; color: var(--ab-muted); font-size: .8rem; font-weight: 800; }
    .ab-meta-box strong { display: block; margin-top: 4px; }

    .ab-contact-grid {
      display: grid;
      grid-template-columns: .9fr 1.1fr;
      gap: 22px;
      align-items: stretch;
    }
    .ab-contact-card { padding: 28px; }
    .ab-contact-list { display: grid; gap: 14px; margin: 20px 0; padding: 0; list-style: none; }
    .ab-contact-list li { display: grid; grid-template-columns: 44px 1fr; gap: 12px; align-items: center; color: var(--ab-muted); }
    .ab-contact-list i { width: 44px; height: 44px; display: grid; place-items: center; border-radius: 16px; background: var(--ab-soft); color: var(--ab-rose); }
    .ab-map { min-height: 440px; border-radius: var(--ab-radius-xl); overflow: hidden; border: 1px solid var(--ab-line); box-shadow: var(--ab-shadow-soft); background: #fff; }
    .ab-map iframe { width: 100%; height: 100%; min-height: 440px; border: 0; filter: saturate(.8) contrast(1.04); }

    .ab-confirm-box {
      max-width: 840px;
      margin: 0 auto;
      padding: 34px;
      border: 1px solid rgba(111,143,88,.26);
      border-radius: var(--ab-radius-xl);
      background: #fff;
      box-shadow: var(--ab-shadow-soft);
      text-align: center;
    }
    .ab-confirm-icon {
      width: 72px;
      height: 72px;
      display: grid;
      place-items: center;
      margin: 0 auto 20px;
      border-radius: 24px;
      background: rgba(111,143,88,.12);
      color: #6F8F58;
      font-size: 2rem;
    }

    .ab-footer {
      border-top: 1px solid var(--ab-line);
      background: #fff;
      padding: 54px 0 96px;
    }
    .ab-footer-grid {
      display: grid;
      grid-template-columns: 1.2fr .8fr .8fr 1fr;
      gap: 26px;
      align-items: start;
    }
    .ab-footer h3 { margin: 0 0 14px; font-size: 1rem; }
    .ab-footer p, .ab-footer a { color: var(--ab-muted); line-height: 1.75; }
    .ab-footer-links { display: grid; gap: 8px; }
    .ab-socials { display: flex; gap: 10px; margin-top: 14px; }
    .ab-socials a { width: 42px; height: 42px; display: grid; place-items: center; border: 1px solid var(--ab-line); border-radius: 999px; background: var(--ab-soft); color: var(--ab-rose); }

    .ab-mobile-cta {
      position: fixed;
      left: 12px;
      right: 12px;
      bottom: 12px;
      z-index: 62;
      display: none;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      padding: 12px;
      border: 1px solid rgba(200,140,122,.24);
      border-radius: 24px;
      background: rgba(255,255,255,.92);
      backdrop-filter: blur(16px);
      box-shadow: var(--ab-shadow);
    }
    .ab-mobile-cta strong { display: block; }
    .ab-mobile-cta span { color: var(--ab-muted); font-size: .84rem; }

    .ab-toast {
      position: fixed;
      left: 50%;
      bottom: 24px;
      z-index: 130;
      min-width: min(360px, calc(100% - 28px));
      padding: 14px 16px;
      border: 1px solid rgba(200,140,122,.28);
      border-radius: 999px;
      background: var(--ab-text);
      color: #fff;
      text-align: center;
      font-weight: 900;
      box-shadow: 0 18px 42px rgba(43,34,37,.18);
      opacity: 0;
      pointer-events: none;
      transform: translate(-50%, 18px);
      transition: opacity .2s ease, transform .2s ease;
    }
    .ab-toast.show { opacity: 1; transform: translate(-50%, 0); }

    .ab-reveal { opacity: 0; transform: translateY(18px); transition: opacity .55s ease, transform .55s ease; }
    .ab-reveal.visible { opacity: 1; transform: translateY(0); }

    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { animation-duration: 1ms !important; transition-duration: 1ms !important; scroll-behavior: auto !important; }
    }

    @media (max-width: 1120px) {
      .ab-links {
        position: fixed;
        top: 76px;
        left: 12px;
        right: 12px;
        display: none;
        flex-direction: column;
        align-items: stretch;
        padding: 12px;
        border: 1px solid var(--ab-line);
        border-radius: 24px;
        background: rgba(255,255,255,.98);
        box-shadow: var(--ab-shadow);
      }
      .ab-links.open { display: flex; }
      .ab-link { padding: 14px; }
      .ab-menu-btn { display: grid; place-items: center; }
      .ab-hero-grid, .ab-service-feature, .ab-booking-layout, .ab-detail-layout, .ab-contact-grid { grid-template-columns: 1fr; }
      .ab-summary-card { position: static; }
      .ab-team-grid, .ab-promo-grid { grid-template-columns: repeat(2, 1fr); }
      .ab-footer-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 760px) {
      .ab-wrap { width: min(var(--ab-max), calc(100% - 22px)); }
      .ab-section { padding: 58px 0; }
      .ab-nav { min-height: 68px; }
      .ab-brand span span, .ab-actions .ab-btn-soft { display: none; }
      .ab-links { top: 68px; }
      .ab-lang { width: 74px; }
      .ab-hero { padding-top: 48px; }
      .ab-hero-visual { min-height: auto; }
      .ab-hero-portrait { position: relative; width: 100%; border-radius: 34px 34px 10px 34px; }
      .ab-hero-portrait img { height: 390px; }
      .ab-hero-note { position: relative; left: auto; bottom: auto; width: 100%; margin-top: 14px; }
      .ab-vertical-tag { position: relative; right: auto; bottom: auto; margin-top: 12px; transform: none; }
      .ab-hero-actions, .ab-booking-actions { flex-direction: column; }
      .ab-btn { width: 100%; }
      .ab-strip, .ab-team-grid, .ab-promo-grid, .ab-review-grid, .ab-stepper, .ab-choice-grid, .ab-form-grid, .ab-detail-meta, .ab-footer-grid { grid-template-columns: 1fr; }
      .ab-section-head { display: grid; }
      .ab-service-row { grid-template-columns: 1fr; }
      .ab-service-row img { height: 240px; }
      .ab-price-box { justify-items: stretch; text-align: left; }
      .ab-editorial-image img, .ab-detail-photo img { min-height: auto; height: 380px; }
      .ab-panel, .ab-booking-card, .ab-detail-panel, .ab-contact-card { padding: 22px; }
      .ab-gallery-grid { grid-template-columns: 1fr; grid-auto-rows: 240px; }
      .ab-gallery-item:nth-child(1), .ab-gallery-item:nth-child(5) { grid-row: span 1; }
      .ab-mobile-cta { display: flex; }
      .ab-toast { bottom: 92px; }
    }
  </style>
</head>
<body>
  <header class="ab-header">
    <nav class="ab-wrap ab-nav" aria-label="Principal">
      <a class="ab-brand" href="<?= e(route_to('home', $lang)) ?>">
        <span class="ab-mark"><i class="bi bi-flower1" aria-hidden="true"></i></span>
        <span><strong><?= e($t['brand']) ?></strong><span><?= e($t['category']) ?></span></span>
      </a>

      <div class="ab-links" data-menu-links>
        <a class="ab-link <?= $page === 'home' ? 'active' : '' ?>" href="<?= e(route_to('home', $lang)) ?>"><?= e($t['nav_home']) ?></a>
        <a class="ab-link <?= in_array($page, ['services', 'service'], true) ? 'active' : '' ?>" href="<?= e(route_to('services', $lang)) ?>"><?= e($t['nav_services']) ?></a>
        <a class="ab-link <?= $page === 'team' ? 'active' : '' ?>" href="<?= e(route_to('team', $lang)) ?>"><?= e($t['nav_team']) ?></a>
        <a class="ab-link <?= $page === 'gallery' ? 'active' : '' ?>" href="<?= e(route_to('gallery', $lang)) ?>"><?= e($t['nav_gallery']) ?></a>
        <a class="ab-link <?= $page === 'promotions' ? 'active' : '' ?>" href="<?= e(route_to('promotions', $lang)) ?>"><?= e($t['nav_promotions']) ?></a>
        <a class="ab-link <?= $page === 'about' ? 'active' : '' ?>" href="<?= e(route_to('about', $lang)) ?>"><?= e($t['nav_about']) ?></a>
        <a class="ab-link <?= $page === 'contact' ? 'active' : '' ?>" href="<?= e(route_to('contact', $lang)) ?>"><?= e($t['nav_contact']) ?></a>
      </div>

      <div class="ab-actions">
        <select class="ab-lang" data-lang aria-label="Idioma">
          <option value="<?= e(lang_route('pt')) ?>" <?= $lang === 'pt' ? 'selected' : '' ?>>PT</option>
          <option value="<?= e(lang_route('es')) ?>" <?= $lang === 'es' ? 'selected' : '' ?>>ES</option>
          <option value="<?= e(lang_route('en')) ?>" <?= $lang === 'en' ? 'selected' : '' ?>>EN</option>
        </select>
        <a class="ab-btn ab-btn-soft ab-btn-small" href="<?= e(route_to('booking', $lang)) ?>"><?= e($t['book_now']) ?></a>
        <button class="ab-menu-btn" type="button" data-menu-toggle aria-label="Menu"><i class="bi bi-list" aria-hidden="true"></i></button>
      </div>
    </nav>
  </header>

  <main>
    <?php if ($page === 'home'): ?>
      <section class="ab-hero">
        <div class="ab-wrap ab-hero-grid">
          <div class="ab-reveal">
            <div class="ab-badges">
              <span class="ab-pill"><i class="bi bi-gem" aria-hidden="true"></i><?= e($t['hero_badge_1']) ?></span>
              <span class="ab-pill"><i class="bi bi-award" aria-hidden="true"></i><?= e($t['hero_badge_2']) ?></span>
              <span class="ab-pill"><i class="bi bi-stars" aria-hidden="true"></i><?= e($t['hero_badge_3']) ?></span>
            </div>
            <span class="ab-kicker">Aura Beauty</span>
            <h1 class="ab-title"><?= e($t['hero_title']) ?></h1>
            <p class="ab-lead"><?= e($t['hero_text']) ?></p>
            <div class="ab-hero-actions">
              <a class="ab-btn ab-btn-main" href="<?= e(route_to('booking', $lang)) ?>"><i class="bi bi-calendar2-heart" aria-hidden="true"></i><?= e($t['book_now']) ?></a>
              <a class="ab-btn ab-btn-soft" href="<?= e(route_to('services', $lang)) ?>"><i class="bi bi-grid-1x2" aria-hidden="true"></i><?= e($t['view_services']) ?></a>
            </div>
            <div class="ab-strip">
              <div class="ab-strip-item"><i class="bi bi-clock"></i><strong>09:00–19:00</strong><span><?= e($t['hours']) ?></span></div>
              <div class="ab-strip-item"><i class="bi bi-heart"></i><strong>1.200+</strong><span>clientes</span></div>
              <div class="ab-strip-item"><i class="bi bi-star"></i><strong>4.9/5</strong><span>rating</span></div>
              <div class="ab-strip-item"><i class="bi bi-shield-check"></i><strong>Premium</strong><span>booking</span></div>
            </div>
          </div>
          <div class="ab-hero-visual ab-reveal">
            <div class="ab-hero-portrait">
              <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=1300&q=84" alt="Aura Beauty">
            </div>
            <div class="ab-hero-note">
              <strong><?= e(service_name($services[0], $lang)) ?></strong>
              <span><?= e(service_short($services[0], $lang)) ?> · <?= e(euro($services[0]['price'])) ?></span>
            </div>
            <div class="ab-vertical-tag"><i class="bi bi-calendar-check"></i><?= e($t['book_now']) ?></div>
          </div>
        </div>
      </section>

      <section class="ab-section ab-wrap ab-reveal">
        <div class="ab-section-head">
          <div>
            <span class="ab-kicker">Services</span>
            <h2 class="ab-title"><?= e($t['home_services_title']) ?></h2>
            <p class="ab-lead"><?= e($t['home_services_text']) ?></p>
          </div>
          <a class="ab-btn ab-btn-soft" href="<?= e(route_to('services', $lang)) ?>"><?= e($t['view_services']) ?></a>
        </div>
        <div class="ab-services-list">
          <?php foreach (array_slice($services, 0, 4) as $service): ?>
            <article class="ab-service-row" data-service-row data-category="<?= e($service['category']) ?>">
              <img src="<?= e($service['image']) ?>" alt="<?= e(service_name($service, $lang)) ?>">
              <div>
                <span class="ab-pill"><i class="bi <?= e($categoryIcons[$service['category']] ?? 'bi-stars') ?>"></i><?= e($categoryLabels[$service['category']] ?? $service['category']) ?></span>
                <h3><?= e(service_name($service, $lang)) ?></h3>
                <p><?= e(service_short($service, $lang)) ?></p>
                <div class="ab-service-meta">
                  <span class="ab-pill"><i class="bi bi-clock"></i><?= e($service['duration']) ?></span>
                  <span class="ab-pill"><i class="bi bi-person-heart"></i><?= count($service['professionals']) ?> pro</span>
                </div>
              </div>
              <div class="ab-price-box">
                <span class="ab-muted"><?= e($t['from_price']) ?></span>
                <strong><?= e(euro($service['price'])) ?></strong>
                <a class="ab-btn ab-btn-main ab-btn-small" href="<?= e(route_to('booking', $lang, ['service' => $service['slug']])) ?>"><?= e($t['book_now']) ?></a>
                <a class="ab-btn ab-btn-soft ab-btn-small" href="<?= e(route_to('service', $lang, ['slug' => $service['slug']])) ?>"><?= e($t['details']) ?></a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="ab-section ab-wrap ab-reveal">
        <div class="ab-service-feature">
          <div class="ab-editorial-image"><img src="https://images.unsplash.com/photo-1600948836101-f9ffda59d250?auto=format&fit=crop&w=1300&q=84" alt="Aura Beauty espaço"></div>
          <div class="ab-panel">
            <span class="ab-kicker">Concept</span>
            <h2 class="ab-title" style="font-size: clamp(2rem, 4vw, 4rem);"><?= e($t['about_short_title']) ?></h2>
            <p><?= e($t['about_short_text']) ?></p>
            <ul class="ab-point-list">
              <li><i class="bi bi-check2"></i><span>UX de agendamento em passos, não formulário gigante.</span></li>
              <li><i class="bi bi-check2"></i><span>Serviços organizados por categoria, profissional, duração e preço.</span></li>
              <li><i class="bi bi-check2"></i><span>Visual feminino premium, claro e comercial.</span></li>
            </ul>
            <a class="ab-btn ab-btn-rose" href="<?= e(route_to('about', $lang)) ?>"><?= e($t['nav_about']) ?></a>
          </div>
        </div>
      </section>

      <section class="ab-section ab-wrap ab-reveal">
        <div class="ab-section-head">
          <div>
            <span class="ab-kicker">Team</span>
            <h2 class="ab-title"><?= e($t['team_title']) ?></h2>
            <p class="ab-lead"><?= e($t['team_text']) ?></p>
          </div>
          <a class="ab-btn ab-btn-soft" href="<?= e(route_to('team', $lang)) ?>"><?= e($t['nav_team']) ?></a>
        </div>
        <div class="ab-team-grid">
          <?php foreach ($team as $pro): ?>
            <article class="ab-team-person">
              <img src="<?= e($pro['image']) ?>" alt="<?= e($pro['name']) ?>">
              <div class="ab-team-info">
                <h3><?= e($pro['name']) ?></h3>
                <p><?= e(team_role($pro, $lang)) ?></p>
                <a class="ab-btn ab-btn-soft ab-btn-small" href="<?= e(route_to('booking', $lang, ['pro' => $pro['id']])) ?>"><?= e($t['book_with']) ?></a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="ab-section ab-wrap ab-reveal">
        <div class="ab-section-head">
          <div>
            <span class="ab-kicker">Gallery</span>
            <h2 class="ab-title"><?= e($t['gallery_title']) ?></h2>
            <p class="ab-lead"><?= e($t['gallery_text']) ?></p>
          </div>
          <a class="ab-btn ab-btn-soft" href="<?= e(route_to('gallery', $lang)) ?>"><?= e($t['nav_gallery']) ?></a>
        </div>
        <div class="ab-gallery-grid">
          <?php foreach (array_slice($gallery, 0, 6) as $item): ?>
            <figure class="ab-gallery-item"><img src="<?= e($item['image']) ?>" alt="<?= e($categoryLabels[$item['cat']] ?? $item['cat']) ?>" loading="lazy"><figcaption class="ab-gallery-label"><i class="bi <?= e($categoryIcons[$item['cat']] ?? 'bi-stars') ?>"></i><?= e($categoryLabels[$item['cat']] ?? $item['cat']) ?></figcaption></figure>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="ab-section ab-wrap ab-reveal">
        <div class="ab-section-head">
          <div>
            <span class="ab-kicker">Packages</span>
            <h2 class="ab-title"><?= e($t['promo_title']) ?></h2>
            <p class="ab-lead"><?= e($t['promo_text']) ?></p>
          </div>
          <a class="ab-btn ab-btn-soft" href="<?= e(route_to('promotions', $lang)) ?>"><?= e($t['nav_promotions']) ?></a>
        </div>
        <div class="ab-promo-grid">
          <?php foreach ($promotions as $promo): ?>
            <article class="ab-promo">
              <img src="<?= e($promo['image']) ?>" alt="<?= e($promo['title'][$lang] ?? $promo['title']['pt']) ?>">
              <div class="ab-promo-body">
                <span class="ab-kicker" style="font-size:.68rem;"><?= e($t['package_includes']) ?></span>
                <h3><?= e($promo['title'][$lang] ?? $promo['title']['pt']) ?></h3>
                <strong style="color:var(--ab-rose);font-size:1.25rem;"><?= e($t['from_price']) ?> <?= e(euro($promo['price'])) ?></strong>
                <a class="ab-btn ab-btn-main ab-btn-small" href="<?= e(route_to('booking', $lang, ['service' => 'beauty-pack'])) ?>"><?= e($t['book_now']) ?></a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="ab-section ab-wrap ab-reveal">
        <span class="ab-kicker">Reviews</span>
        <h2 class="ab-title"><?= e($t['reviews_title']) ?></h2>
        <div class="ab-review-grid" style="margin-top: 28px;">
          <article class="ab-review"><div class="ab-stars">★★★★★</div><p>“Experiência elegante, agendamento simples e resultado impecável.”</p><strong>Mariana Costa</strong></article>
          <article class="ab-review"><div class="ab-stars">★★★★★</div><p>“O perfil das profissionais ajudou-me a escolher com confiança.”</p><strong>Carla Mendes</strong></article>
          <article class="ab-review"><div class="ab-stars">★★★★★</div><p>“Parece um salão premium desde o primeiro clique.”</p><strong>Sofia Almeida</strong></article>
        </div>
      </section>

      <section class="ab-section ab-wrap ab-reveal">
        <div class="ab-panel" style="text-align:center;">
          <span class="ab-kicker" style="margin-inline:auto;">Booking</span>
          <h2 class="ab-title" style="font-size: clamp(2.2rem, 4vw, 4.3rem);"><?= e($t['cta_title']) ?></h2>
          <p class="ab-lead" style="margin-inline:auto;"><?= e($t['cta_text']) ?></p>
          <div class="ab-hero-actions" style="justify-content:center;">
            <a class="ab-btn ab-btn-main" href="<?= e(route_to('booking', $lang)) ?>"><?= e($t['book_now']) ?></a>
            <a class="ab-btn ab-btn-soft" href="<?= e(route_to('contact', $lang)) ?>"><?= e($t['nav_contact']) ?></a>
          </div>
        </div>
      </section>

    <?php elseif ($page === 'services'): ?>
      <section class="ab-page-hero ab-wrap ab-reveal">
        <div class="ab-breadcrumb"><a href="<?= e(route_to('home', $lang)) ?>"><?= e($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= e($t['nav_services']) ?></span></div>
        <span class="ab-kicker">Services</span>
        <h1 class="ab-title"><?= e($t['services_page_title']) ?></h1>
        <p class="ab-lead"><?= e($t['services_page_text']) ?></p>
      </section>

      <section class="ab-section ab-wrap" style="padding-top: 24px;">
        <div class="ab-category-rail ab-reveal">
          <?php foreach ($categoryLabels as $key => $label): ?>
            <button class="ab-category-btn <?= $key === 'all' ? 'active' : '' ?>" type="button" data-filter="<?= e($key) ?>"><i class="bi <?= e($categoryIcons[$key] ?? 'bi-stars') ?>"></i><?= e($label) ?></button>
          <?php endforeach; ?>
        </div>
        <div class="ab-services-list" style="margin-top: 18px;">
          <?php foreach ($services as $service): ?>
            <article class="ab-service-row ab-reveal" data-service-row data-category="<?= e($service['category']) ?>">
              <img src="<?= e($service['image']) ?>" alt="<?= e(service_name($service, $lang)) ?>">
              <div>
                <span class="ab-pill"><i class="bi <?= e($categoryIcons[$service['category']] ?? 'bi-stars') ?>"></i><?= e($categoryLabels[$service['category']] ?? $service['category']) ?></span>
                <h3><?= e(service_name($service, $lang)) ?></h3>
                <p><?= e(service_short($service, $lang)) ?></p>
                <div class="ab-service-meta">
                  <span class="ab-pill"><i class="bi bi-clock"></i><?= e($service['duration']) ?></span>
                  <span class="ab-pill"><i class="bi bi-currency-euro"></i><?= e($t['from_price']) ?> <?= e(euro($service['price'])) ?></span>
                </div>
              </div>
              <div class="ab-price-box">
                <strong><?= e(euro($service['price'])) ?></strong>
                <a class="ab-btn ab-btn-main ab-btn-small" href="<?= e(route_to('booking', $lang, ['service' => $service['slug']])) ?>"><?= e($t['book_now']) ?></a>
                <a class="ab-btn ab-btn-soft ab-btn-small" href="<?= e(route_to('service', $lang, ['slug' => $service['slug']])) ?>"><?= e($t['details']) ?></a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

    <?php elseif ($page === 'service'): ?>
      <section class="ab-page-hero ab-wrap ab-reveal">
        <div class="ab-breadcrumb"><a href="<?= e(route_to('home', $lang)) ?>"><?= e($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><a href="<?= e(route_to('services', $lang)) ?>"><?= e($t['nav_services']) ?></a><i class="bi bi-chevron-right"></i><span><?= e(service_name($selectedService, $lang)) ?></span></div>
      </section>
      <section class="ab-section ab-wrap" style="padding-top: 0;">
        <div class="ab-detail-layout">
          <div class="ab-detail-photo ab-reveal"><img src="<?= e($selectedService['image']) ?>" alt="<?= e(service_name($selectedService, $lang)) ?>"></div>
          <div class="ab-detail-panel ab-reveal">
            <span class="ab-kicker"><?= e($t['service_detail']) ?></span>
            <h1 class="ab-title" style="font-size: clamp(2.2rem, 4vw, 4.2rem);"><?= e(service_name($selectedService, $lang)) ?></h1>
            <p class="ab-lead"><?= e(service_long($selectedService, $lang)) ?></p>
            <div class="ab-detail-meta">
              <div class="ab-meta-box"><span><?= e($t['from_price']) ?></span><strong><?= e(euro($selectedService['price'])) ?></strong></div>
              <div class="ab-meta-box"><span><?= e($t['duration']) ?></span><strong><?= e($selectedService['duration']) ?></strong></div>
              <div class="ab-meta-box"><span><?= e($t['category']) ?></span><strong><?= e($categoryLabels[$selectedService['category']] ?? $selectedService['category']) ?></strong></div>
            </div>
            <h3><?= e($t['benefits']) ?></h3>
            <ul class="ab-point-list">
              <?php foreach (($selectedService['benefits'][$lang] ?? $selectedService['benefits']['pt']) as $benefit): ?>
                <li><i class="bi bi-check2"></i><span><?= e($benefit) ?></span></li>
              <?php endforeach; ?>
            </ul>
            <h3><?= e($t['available_pros']) ?></h3>
            <div class="ab-category-rail">
              <?php foreach ($selectedService['professionals'] as $proId): $pro = find_team($team, $proId); if (!$pro) continue; ?>
                <a class="ab-category-link" href="<?= e(route_to('booking', $lang, ['service' => $selectedService['slug'], 'pro' => $pro['id']])) ?>"><i class="bi bi-person-heart"></i><?= e($pro['name']) ?></a>
              <?php endforeach; ?>
            </div>
            <div class="ab-hero-actions">
              <a class="ab-btn ab-btn-main" href="<?= e(route_to('booking', $lang, ['service' => $selectedService['slug']])) ?>"><?= e($t['book_now']) ?></a>
              <a class="ab-btn ab-btn-soft" href="<?= e(route_to('services', $lang)) ?>"><?= e($t['nav_services']) ?></a>
            </div>
          </div>
        </div>
      </section>
      <section class="ab-section ab-wrap ab-reveal" style="padding-top: 0;">
        <div class="ab-section-head"><div><span class="ab-kicker">Related</span><h2 class="ab-title" style="font-size: clamp(2rem, 3vw, 3.4rem);"><?= e($t['related_services']) ?></h2></div></div>
        <div class="ab-services-list">
          <?php $relatedCount = 0; foreach ($services as $service): if ($service['slug'] === $selectedService['slug'] || $service['category'] !== $selectedService['category']) continue; $relatedCount++; ?>
            <article class="ab-service-row"><img src="<?= e($service['image']) ?>" alt="<?= e(service_name($service, $lang)) ?>"><div><h3><?= e(service_name($service, $lang)) ?></h3><p><?= e(service_short($service, $lang)) ?></p></div><div class="ab-price-box"><strong><?= e(euro($service['price'])) ?></strong><a class="ab-btn ab-btn-main ab-btn-small" href="<?= e(route_to('booking', $lang, ['service' => $service['slug']])) ?>"><?= e($t['book_now']) ?></a></div></article>
          <?php endforeach; if ($relatedCount === 0): foreach (array_slice($services, 0, 2) as $service): if ($service['slug'] === $selectedService['slug']) continue; ?>
            <article class="ab-service-row"><img src="<?= e($service['image']) ?>" alt="<?= e(service_name($service, $lang)) ?>"><div><h3><?= e(service_name($service, $lang)) ?></h3><p><?= e(service_short($service, $lang)) ?></p></div><div class="ab-price-box"><strong><?= e(euro($service['price'])) ?></strong><a class="ab-btn ab-btn-main ab-btn-small" href="<?= e(route_to('booking', $lang, ['service' => $service['slug']])) ?>"><?= e($t['book_now']) ?></a></div></article>
          <?php endforeach; endif; ?>
        </div>
      </section>

    <?php elseif ($page === 'booking'): ?>
      <section class="ab-page-hero ab-wrap ab-reveal">
        <div class="ab-breadcrumb"><a href="<?= e(route_to('home', $lang)) ?>"><?= e($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= e($t['nav_booking']) ?></span></div>
        <span class="ab-kicker">Booking</span>
        <h1 class="ab-title"><?= e($t['booking_title']) ?></h1>
        <p class="ab-lead"><?= e($t['booking_text']) ?></p>
      </section>
      <section class="ab-section ab-wrap" style="padding-top: 24px;">
        <div class="ab-booking-layout">
          <div class="ab-booking-card ab-reveal">
            <div class="ab-stepper" data-stepper>
              <button class="ab-step active" type="button" data-step-btn="0">1. <?= e($t['step_service']) ?></button>
              <button class="ab-step" type="button" data-step-btn="1">2. <?= e($t['step_professional']) ?></button>
              <button class="ab-step" type="button" data-step-btn="2">3. <?= e($t['step_datetime']) ?></button>
              <button class="ab-step" type="button" data-step-btn="3">4. <?= e($t['step_client']) ?></button>
              <button class="ab-step" type="button" data-step-btn="4">5. <?= e($t['step_confirm']) ?></button>
            </div>

            <form data-booking-form novalidate>
              <div class="ab-booking-step active" data-booking-step="0">
                <span class="ab-kicker"><?= e($t['select_service']) ?></span>
                <div class="ab-choice-grid">
                  <?php foreach ($services as $service): ?>
                    <label class="ab-choice">
                      <input type="radio" name="service" value="<?= e($service['slug']) ?>" <?= $preselectedService === $service['slug'] ? 'checked' : '' ?> required>
                      <strong><?= e(service_name($service, $lang)) ?></strong>
                      <span><?= e(euro($service['price'])) ?> · <?= e($service['duration']) ?></span>
                    </label>
                  <?php endforeach; ?>
                </div>
              </div>

              <div class="ab-booking-step" data-booking-step="1">
                <span class="ab-kicker"><?= e($t['select_professional']) ?></span>
                <div class="ab-choice-grid" data-professional-choices>
                  <?php foreach ($team as $pro): ?>
                    <label class="ab-choice" data-pro-choice="<?= e($pro['id']) ?>">
                      <input type="radio" name="professional" value="<?= e($pro['id']) ?>" <?= $preselectedPro === $pro['id'] ? 'checked' : '' ?> required>
                      <strong><?= e($pro['name']) ?></strong>
                      <span><?= e(team_role($pro, $lang)) ?> · <?= e($pro['years']) ?> <?= e($t['experience']) ?></span>
                    </label>
                  <?php endforeach; ?>
                </div>
              </div>

              <div class="ab-booking-step" data-booking-step="2">
                <span class="ab-kicker"><?= e($t['select_date']) ?></span>
                <div class="ab-form-grid">
                  <div class="ab-field ab-full">
                    <label for="bookingDate"><?= e($t['select_date']) ?></label>
                    <input class="ab-input" id="bookingDate" type="date" name="date" min="<?= e(date('Y-m-d')) ?>" required>
                  </div>
                  <div class="ab-field ab-full">
                    <label><?= e($t['select_time']) ?></label>
                    <div class="ab-time-grid" data-time-grid></div>
                    <input type="hidden" name="time" data-time-input required>
                  </div>
                </div>
              </div>

              <div class="ab-booking-step" data-booking-step="3">
                <span class="ab-kicker"><?= e($t['step_client']) ?></span>
                <div class="ab-form-grid">
                  <div class="ab-field ab-full"><label for="clientName"><?= e($t['client_name']) ?></label><input class="ab-input" id="clientName" name="name" required minlength="3"></div>
                  <div class="ab-field"><label for="clientPhone"><?= e($t['client_phone']) ?></label><input class="ab-input" id="clientPhone" name="phone" required></div>
                  <div class="ab-field"><label for="clientEmail"><?= e($t['client_email']) ?></label><input class="ab-input" id="clientEmail" type="email" name="email" required></div>
                  <div class="ab-field ab-full"><label for="bookingNotes"><?= e($t['notes']) ?></label><textarea class="ab-textarea" id="bookingNotes" name="notes"></textarea></div>
                </div>
              </div>

              <div class="ab-booking-step" data-booking-step="4">
                <span class="ab-kicker"><?= e($t['step_confirm']) ?></span>
                <div class="ab-confirm-box" style="text-align:left; padding:24px;">
                  <div class="ab-confirm-icon" style="margin:0 0 14px;"><i class="bi bi-calendar2-check"></i></div>
                  <h3 style="margin:0;"><?= e($t['summary']) ?></h3>
                  <p class="ab-lead" style="font-size:.96rem;">Confirme os dados no resumo lateral antes de finalizar.</p>
                </div>
              </div>

              <div class="ab-booking-actions">
                <button class="ab-btn ab-btn-soft" type="button" data-booking-back><?= e($t['back']) ?></button>
                <button class="ab-btn ab-btn-main" type="button" data-booking-next><?= e($t['next']) ?></button>
              </div>
            </form>
          </div>

          <aside class="ab-summary-card ab-reveal">
            <span class="ab-kicker" style="font-size:.7rem;"><?= e($t['summary']) ?></span>
            <div class="ab-summary-lines" style="margin-top:18px;" data-summary>
              <div class="ab-summary-line"><span><?= e($t['step_service']) ?></span><strong data-summary-service>—</strong></div>
              <div class="ab-summary-line"><span><?= e($t['step_professional']) ?></span><strong data-summary-pro>—</strong></div>
              <div class="ab-summary-line"><span><?= e($t['select_date']) ?></span><strong data-summary-date>—</strong></div>
              <div class="ab-summary-line"><span><?= e($t['select_time']) ?></span><strong data-summary-time>—</strong></div>
              <div class="ab-summary-line"><span><?= e($t['from_price']) ?></span><strong data-summary-price>—</strong></div>
            </div>
          </aside>
        </div>
      </section>

    <?php elseif ($page === 'team'): ?>
      <section class="ab-page-hero ab-wrap ab-reveal">
        <div class="ab-breadcrumb"><a href="<?= e(route_to('home', $lang)) ?>"><?= e($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= e($t['nav_team']) ?></span></div>
        <span class="ab-kicker">Team</span>
        <h1 class="ab-title"><?= e($t['team_page_title']) ?></h1>
        <p class="ab-lead"><?= e($t['team_page_text']) ?></p>
      </section>
      <section class="ab-section ab-wrap" style="padding-top:24px;">
        <div class="ab-team-grid">
          <?php foreach ($team as $pro): ?>
            <article class="ab-team-person ab-reveal">
              <img src="<?= e($pro['image']) ?>" alt="<?= e($pro['name']) ?>">
              <div class="ab-team-info">
                <h3><?= e($pro['name']) ?></h3>
                <p><?= e(team_role($pro, $lang)) ?><br><?= e(team_bio($pro, $lang)) ?></p>
                <span class="ab-pill" style="background:rgba(255,255,255,.18); color:#fff;"><i class="bi bi-award"></i><?= e($pro['years']) ?> <?= e($t['experience']) ?></span>
                <a class="ab-btn ab-btn-soft ab-btn-small" style="margin-top:10px;" href="<?= e(route_to('booking', $lang, ['pro' => $pro['id']])) ?>"><?= e($t['book_with']) ?> <?= e(explode(' ', $pro['name'])[0]) ?></a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

    <?php elseif ($page === 'gallery'): ?>
      <section class="ab-page-hero ab-wrap ab-reveal">
        <div class="ab-breadcrumb"><a href="<?= e(route_to('home', $lang)) ?>"><?= e($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= e($t['nav_gallery']) ?></span></div>
        <span class="ab-kicker">Gallery</span>
        <h1 class="ab-title"><?= e($t['gallery_page_title']) ?></h1>
        <p class="ab-lead"><?= e($t['gallery_page_text']) ?></p>
      </section>
      <section class="ab-section ab-wrap" style="padding-top:24px;">
        <div class="ab-category-rail ab-reveal">
          <?php foreach (['all', 'hair', 'color', 'nails', 'makeup', 'lashes', 'facial'] as $cat): ?>
            <button class="ab-category-btn <?= $cat === 'all' ? 'active' : '' ?>" type="button" data-gallery-filter="<?= e($cat) ?>"><i class="bi <?= e($categoryIcons[$cat] ?? 'bi-stars') ?>"></i><?= e($categoryLabels[$cat] ?? $cat) ?></button>
          <?php endforeach; ?>
        </div>
        <div class="ab-gallery-grid" style="margin-top:18px;">
          <?php foreach ($gallery as $item): ?>
            <figure class="ab-gallery-item ab-reveal" data-gallery-item data-gallery-cat="<?= e($item['cat']) ?>"><img src="<?= e($item['image']) ?>" alt="<?= e($categoryLabels[$item['cat']] ?? $item['cat']) ?>" loading="lazy"><figcaption class="ab-gallery-label"><i class="bi <?= e($categoryIcons[$item['cat']] ?? 'bi-stars') ?>"></i><?= e($categoryLabels[$item['cat']] ?? $item['cat']) ?></figcaption></figure>
          <?php endforeach; ?>
        </div>
      </section>

    <?php elseif ($page === 'promotions'): ?>
      <section class="ab-page-hero ab-wrap ab-reveal">
        <div class="ab-breadcrumb"><a href="<?= e(route_to('home', $lang)) ?>"><?= e($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= e($t['nav_promotions']) ?></span></div>
        <span class="ab-kicker">Packages</span>
        <h1 class="ab-title"><?= e($t['promotions_page_title']) ?></h1>
        <p class="ab-lead"><?= e($t['promotions_page_text']) ?></p>
      </section>
      <section class="ab-section ab-wrap" style="padding-top:24px;">
        <div class="ab-promo-grid">
          <?php foreach ($promotions as $promo): ?>
            <article class="ab-promo ab-reveal">
              <img src="<?= e($promo['image']) ?>" alt="<?= e($promo['title'][$lang] ?? $promo['title']['pt']) ?>">
              <div class="ab-promo-body">
                <span class="ab-kicker" style="font-size:.68rem;"><?= e($t['package_includes']) ?></span>
                <h3><?= e($promo['title'][$lang] ?? $promo['title']['pt']) ?></h3>
                <strong style="color:var(--ab-rose);font-size:1.35rem;"><?= e($t['from_price']) ?> <?= e(euro($promo['price'])) ?></strong>
                <ul>
                  <?php foreach ($promo['items'] as $item): ?><li><i class="bi bi-check2"></i><?= e($item) ?></li><?php endforeach; ?>
                </ul>
                <a class="ab-btn ab-btn-main" href="<?= e(route_to('booking', $lang, ['service' => 'beauty-pack'])) ?>"><?= e($t['book_now']) ?></a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

    <?php elseif ($page === 'about'): ?>
      <section class="ab-page-hero ab-wrap ab-reveal">
        <div class="ab-breadcrumb"><a href="<?= e(route_to('home', $lang)) ?>"><?= e($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= e($t['nav_about']) ?></span></div>
        <span class="ab-kicker">About</span>
        <h1 class="ab-title"><?= e($t['about_page_title']) ?></h1>
        <p class="ab-lead"><?= e($t['about_page_text']) ?></p>
      </section>
      <section class="ab-section ab-wrap" style="padding-top:24px;">
        <div class="ab-service-feature">
          <div class="ab-editorial-image ab-reveal"><img src="https://images.unsplash.com/photo-1600948836101-f9ffda59d250?auto=format&fit=crop&w=1300&q=84" alt="Aura Beauty"></div>
          <div class="ab-panel ab-reveal">
            <span class="ab-kicker">Brand</span>
            <h2 class="ab-title" style="font-size: clamp(2rem,4vw,4rem);">Aura Beauty</h2>
            <p><?= e($t['about_page_text']) ?></p>
            <div class="ab-soft-panel" style="padding:18px;"><h3><?= e($t['mission']) ?></h3><p>Valorizar autoestima com atendimento profissional, humano e visual premium.</p></div>
            <div class="ab-soft-panel" style="padding:18px;"><h3><?= e($t['values']) ?></h3><p>Cuidado, sofisticação, pontualidade, higiene, confiança e personalização.</p></div>
            <div class="ab-soft-panel" style="padding:18px;"><h3><?= e($t['differentials']) ?></h3><p>Agendamento por etapas, equipa visível, catálogo vendável e galeria de resultados.</p></div>
            <a class="ab-btn ab-btn-main" href="<?= e(route_to('booking', $lang)) ?>"><?= e($t['book_now']) ?></a>
          </div>
        </div>
      </section>

    <?php elseif ($page === 'contact'): ?>
      <section class="ab-page-hero ab-wrap ab-reveal">
        <div class="ab-breadcrumb"><a href="<?= e(route_to('home', $lang)) ?>"><?= e($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= e($t['nav_contact']) ?></span></div>
        <span class="ab-kicker">Contact</span>
        <h1 class="ab-title"><?= e($t['contact_page_title']) ?></h1>
        <p class="ab-lead"><?= e($t['contact_page_text']) ?></p>
      </section>
      <section class="ab-section ab-wrap" style="padding-top:24px;">
        <div class="ab-contact-grid">
          <div class="ab-contact-card ab-reveal">
            <ul class="ab-contact-list">
              <li><i class="bi bi-geo-alt"></i><span><strong><?= e($t['address']) ?></strong><br>Rua da Bélgica, 2450 — Vila Nova de Gaia</span></li>
              <li><i class="bi bi-telephone"></i><span><strong><?= e($t['phone']) ?></strong><br>+351 220 000 000</span></li>
              <li><i class="bi bi-whatsapp"></i><span><strong><?= e($t['whatsapp']) ?></strong><br>+351 912 345 678</span></li>
              <li><i class="bi bi-instagram"></i><span><strong><?= e($t['instagram']) ?></strong><br>@aurabeauty.studio</span></li>
              <li><i class="bi bi-clock"></i><span><strong><?= e($t['hours']) ?></strong><br>Seg–Sáb · 09:00–19:00</span></li>
            </ul>
            <form class="ab-form-grid" data-contact-form novalidate>
              <div class="ab-field"><label for="contactName"><?= e($t['client_name']) ?></label><input class="ab-input" id="contactName" required></div>
              <div class="ab-field"><label for="contactEmail"><?= e($t['client_email']) ?></label><input class="ab-input" id="contactEmail" type="email" required></div>
              <div class="ab-field ab-full"><label for="contactMessage"><?= e($t['message']) ?></label><textarea class="ab-textarea" id="contactMessage" required></textarea></div>
              <button class="ab-btn ab-btn-main ab-full" type="submit"><?= e($t['send_message']) ?></button>
            </form>
          </div>
          <div class="ab-map ab-reveal">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.845891425258!2d-8.655521423409764!3d41.12536031582254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246525c5f0c3f9%3A0x80c4963cbf7de769!2sR.%20da%20B%C3%A9lgica%202450%2C%204400-046%20Vila%20Nova%20de%20Gaia!5e0!3m2!1spt-PT!2spt!4v1719078822695!5m2!1spt-PT!2spt" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
          </div>
        </div>
      </section>

    <?php elseif ($page === 'confirmation'): ?>
      <section class="ab-section ab-wrap">
        <div class="ab-confirm-box ab-reveal">
          <div class="ab-confirm-icon"><i class="bi bi-check2"></i></div>
          <span class="ab-kicker" style="margin-inline:auto;"><?= e($t['confirmation_title']) ?></span>
          <h1 class="ab-title" style="font-size: clamp(2.3rem,4vw,4.2rem);"><?= e($t['confirmation_title']) ?></h1>
          <p class="ab-lead" style="margin-inline:auto;"><?= e($t['confirmation_text']) ?></p>
          <div class="ab-detail-meta" style="max-width:560px;margin:26px auto;">
            <div class="ab-meta-box"><span><?= e($t['reference']) ?></span><strong><?= e($_GET['ref'] ?? ('AB-' . date('Hi'))) ?></strong></div>
            <div class="ab-meta-box"><span><?= e($t['step_service']) ?></span><strong><?= e($_GET['service'] ?? 'Aura Beauty') ?></strong></div>
            <div class="ab-meta-box"><span><?= e($t['select_time']) ?></span><strong><?= e($_GET['time'] ?? '—') ?></strong></div>
          </div>
          <div class="ab-hero-actions" style="justify-content:center;">
            <a class="ab-btn ab-btn-main" href="<?= e(route_to('home', $lang)) ?>"><?= e($t['back_home']) ?></a>
            <a class="ab-btn ab-btn-soft" href="<?= e(route_to('booking', $lang)) ?>"><?= e($t['see_bookings']) ?></a>
          </div>
        </div>
      </section>
    <?php endif; ?>
  </main>

  <footer class="ab-footer">
    <div class="ab-wrap ab-footer-grid">
      <div>
        <a class="ab-brand" href="<?= e(route_to('home', $lang)) ?>">
          <span class="ab-mark"><i class="bi bi-flower1"></i></span>
          <span><strong><?= e($t['brand']) ?></strong><span><?= e($t['category']) ?></span></span>
        </a>
        <p><?= e($t['footer_text']) ?></p>
        <div class="ab-socials"><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a><a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a><a href="#" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a></div>
      </div>
      <div><h3><?= e($t['nav_services']) ?></h3><div class="ab-footer-links"><a href="<?= e(route_to('services', $lang)) ?>"><?= e($t['cat_hair']) ?></a><a href="<?= e(route_to('services', $lang)) ?>"><?= e($t['cat_nails']) ?></a><a href="<?= e(route_to('services', $lang)) ?>"><?= e($t['cat_facial']) ?></a><a href="<?= e(route_to('promotions', $lang)) ?>"><?= e($t['nav_promotions']) ?></a></div></div>
      <div><h3>Pages</h3><div class="ab-footer-links"><a href="<?= e(route_to('team', $lang)) ?>"><?= e($t['nav_team']) ?></a><a href="<?= e(route_to('gallery', $lang)) ?>"><?= e($t['nav_gallery']) ?></a><a href="<?= e(route_to('about', $lang)) ?>"><?= e($t['nav_about']) ?></a><a href="<?= e(route_to('contact', $lang)) ?>"><?= e($t['nav_contact']) ?></a></div></div>
      <div><h3><?= e($t['newsletter']) ?></h3><form data-newsletter-form><input class="ab-input" type="email" placeholder="<?= e($t['email_placeholder']) ?>" required style="margin-bottom:10px;"><button class="ab-btn ab-btn-rose" type="submit"><?= e($t['newsletter']) ?></button></form><p style="margin-top:16px;"><?= e($t['built_by']) ?></p></div>
    </div>
  </footer>

  <div class="ab-mobile-cta">
    <span><strong><?= e($t['brand']) ?></strong><span><?= e($t['category']) ?></span></span>
    <a class="ab-btn ab-btn-main ab-btn-small" href="<?= e(route_to('booking', $lang)) ?>"><?= e($t['book_now']) ?></a>
  </div>

  <div class="ab-toast" data-toast role="status" aria-live="polite"></div>

  <script>
    window.AURA_BEAUTY = {
      lang: <?= json_encode($lang, JSON_UNESCAPED_UNICODE) ?>,
      page: <?= json_encode($page, JSON_UNESCAPED_UNICODE) ?>,
      text: <?= json_encode($t, JSON_UNESCAPED_UNICODE) ?>,
      services: <?= json_encode($services, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>,
      team: <?= json_encode($team, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>,
      preselectedService: <?= json_encode($preselectedService, JSON_UNESCAPED_UNICODE) ?>,
      preselectedPro: <?= json_encode($preselectedPro, JSON_UNESCAPED_UNICODE) ?>,
      routes: {
        confirmation: <?= json_encode(route_to('confirmation', $lang), JSON_UNESCAPED_SLASHES) ?>
      }
    };
  </script>

  <script>
    (() => {
      'use strict';

      const app = window.AURA_BEAUTY;
      const t = app.text;
      const $ = (selector, root = document) => root.querySelector(selector);
      const $$ = (selector, root = document) => Array.from(root.querySelectorAll(selector));
      const toast = $('[data-toast]');
      const serviceBySlug = slug => app.services.find(service => service.slug === slug);
      const proById = id => app.team.find(pro => pro.id === id);
      const localName = value => value && (value[app.lang] || value.pt || value.en || '');
      const money = new Intl.NumberFormat(app.lang === 'en' ? 'en-IE' : 'pt-PT', { style: 'currency', currency: 'EUR' });
      const bookingState = { step: 0, service: app.preselectedService || '', professional: app.preselectedPro || '', date: '', time: '' };

      function showToast(message) {
        if (!toast) return;
        toast.textContent = message;
        toast.classList.add('show');
        clearTimeout(showToast.timer);
        showToast.timer = setTimeout(() => toast.classList.remove('show'), 2300);
      }

      function setVisibleMenu() {
        const links = $('[data-menu-links]');
        if (links) links.classList.toggle('open');
      }

      function updateReveal() {
        const observer = new IntersectionObserver(entries => {
          entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
          });
        }, { threshold: 0.12 });
        $$('.ab-reveal').forEach(item => observer.observe(item));
      }

      function setupFilters() {
        $$('[data-filter]').forEach(button => {
          button.addEventListener('click', () => {
            const category = button.dataset.filter;
            $$('[data-filter]').forEach(btn => btn.classList.toggle('active', btn === button));
            $$('[data-service-row]').forEach(row => {
              row.hidden = category !== 'all' && row.dataset.category !== category;
            });
          });
        });

        $$('[data-gallery-filter]').forEach(button => {
          button.addEventListener('click', () => {
            const category = button.dataset.galleryFilter;
            $$('[data-gallery-filter]').forEach(btn => btn.classList.toggle('active', btn === button));
            $$('[data-gallery-item]').forEach(item => {
              item.hidden = category !== 'all' && item.dataset.galleryCat !== category;
            });
          });
        });
      }

      function setStep(nextStep) {
        bookingState.step = Math.max(0, Math.min(4, nextStep));
        $$('[data-step-btn]').forEach(button => button.classList.toggle('active', Number(button.dataset.stepBtn) === bookingState.step));
        $$('[data-booking-step]').forEach(step => step.classList.toggle('active', Number(step.dataset.bookingStep) === bookingState.step));
        const back = $('[data-booking-back]');
        const next = $('[data-booking-next]');
        if (back) back.style.visibility = bookingState.step === 0 ? 'hidden' : 'visible';
        if (next) next.textContent = bookingState.step === 4 ? t.confirm_booking : t.next;
        updateSummary();
      }

      function selectedService() {
        const checked = $('input[name="service"]:checked');
        return checked ? checked.value : '';
      }

      function selectedProfessional() {
        const checked = $('input[name="professional"]:checked');
        return checked ? checked.value : '';
      }

      function updateProfessionals() {
        const serviceSlug = selectedService();
        const service = serviceBySlug(serviceSlug);
        $$('[data-pro-choice]').forEach(label => {
          const proId = label.dataset.proChoice;
          const allowed = !service || service.professionals.includes(proId);
          label.hidden = !allowed;
          const input = $('input', label);
          if (!allowed && input.checked) input.checked = false;
        });
      }

      function renderTimes() {
        const grid = $('[data-time-grid]');
        const input = $('[data-time-input]');
        if (!grid || !input) return;
        const serviceSlug = selectedService() || 'default';
        const base = {
          'hair-glow': ['09:30', '11:00', '14:30', '17:00'],
          'color-ritual': ['09:00', '13:00', '15:30'],
          'signature-nails': ['10:00', '12:00', '15:00', '18:00'],
          'bridal-makeup': ['08:30', '11:30', '16:00'],
          'lash-design': ['10:30', '13:30', '16:30'],
          'brow-architecture': ['09:30', '12:30', '15:30', '18:30'],
          'facial-glow': ['10:00', '14:00', '17:00'],
          'beauty-pack': ['09:00', '13:00'],
          default: ['09:30', '11:00', '14:30', '17:00']
        };
        grid.innerHTML = (base[serviceSlug] || base.default).map(time => `<button class="ab-time-btn" type="button" data-time="${time}">${time}</button>`).join('');
        input.value = '';
        bookingState.time = '';
      }

      function updateSummary() {
        const serviceSlug = selectedService();
        const proId = selectedProfessional();
        const service = serviceBySlug(serviceSlug);
        const pro = proById(proId);
        const date = $('#bookingDate') ? $('#bookingDate').value : '';
        const time = $('[data-time-input]') ? $('[data-time-input]').value : '';
        const setText = (selector, value) => { const node = $(selector); if (node) node.textContent = value || '—'; };
        setText('[data-summary-service]', service ? localName(service.name) : '—');
        setText('[data-summary-pro]', pro ? pro.name : '—');
        setText('[data-summary-date]', date || '—');
        setText('[data-summary-time]', time || '—');
        setText('[data-summary-price]', service ? money.format(Number(service.price)) : '—');
      }

      function validateStep() {
        if (bookingState.step === 0 && !selectedService()) return false;
        if (bookingState.step === 1 && !selectedProfessional()) return false;
        if (bookingState.step === 2) {
          const date = $('#bookingDate') ? $('#bookingDate').value : '';
          const time = $('[data-time-input]') ? $('[data-time-input]').value : '';
          return Boolean(date && time);
        }
        if (bookingState.step === 3) {
          const current = $('[data-booking-step="3"]');
          return $$('input[required]', current).every(input => input.checkValidity());
        }
        return true;
      }

      function confirmBooking() {
        const service = serviceBySlug(selectedService());
        const pro = proById(selectedProfessional());
        const time = $('[data-time-input]') ? $('[data-time-input]').value : '';
        const ref = 'AB-' + Math.floor(1000 + Math.random() * 9000);
        const url = app.routes.confirmation + '&ref=' + encodeURIComponent(ref) + '&service=' + encodeURIComponent(service ? localName(service.name) : 'Aura Beauty') + '&time=' + encodeURIComponent(time || '');
        showToast(t.booking_success);
        window.location.href = url;
      }

      function setupBooking() {
        if (!$('[data-booking-form]')) return;

        $$('input[name="service"]').forEach(input => {
          input.addEventListener('change', () => {
            updateProfessionals();
            renderTimes();
            updateSummary();
          });
        });
        $$('input[name="professional"]').forEach(input => input.addEventListener('change', updateSummary));
        const date = $('#bookingDate');
        if (date) date.addEventListener('change', () => { renderTimes(); updateSummary(); });

        document.addEventListener('click', event => {
          const timeButton = event.target.closest('[data-time]');
          if (!timeButton) return;
          $$('[data-time]').forEach(button => button.classList.toggle('active', button === timeButton));
          const input = $('[data-time-input]');
          if (input) input.value = timeButton.dataset.time;
          bookingState.time = timeButton.dataset.time;
          updateSummary();
        });

        $('[data-booking-back]').addEventListener('click', () => setStep(bookingState.step - 1));
        $('[data-booking-next]').addEventListener('click', () => {
          if (bookingState.step < 4) {
            if (!validateStep()) { showToast(t.required); return; }
            setStep(bookingState.step + 1);
            return;
          }
          confirmBooking();
        });
        $$('[data-step-btn]').forEach(button => {
          button.addEventListener('click', () => {
            const target = Number(button.dataset.stepBtn);
            if (target > bookingState.step && !validateStep()) { showToast(t.required); return; }
            setStep(target);
          });
        });

        updateProfessionals();
        renderTimes();
        setStep(0);
        updateSummary();
      }

      function setupForms() {
        const contact = $('[data-contact-form]');
        if (contact) contact.addEventListener('submit', event => {
          event.preventDefault();
          if (!contact.checkValidity()) { showToast(t.required); return; }
          showToast(t.message_sent);
          contact.reset();
        });
        const newsletter = $('[data-newsletter-form]');
        if (newsletter) newsletter.addEventListener('submit', event => {
          event.preventDefault();
          showToast(t.message_sent);
          newsletter.reset();
        });
      }

      const menuButton = $('[data-menu-toggle]');
      if (menuButton) menuButton.addEventListener('click', setVisibleMenu);
      $$('[data-menu-links] a').forEach(link => link.addEventListener('click', () => $('[data-menu-links]').classList.remove('open')));
      const langSelect = $('[data-lang]');
      if (langSelect) langSelect.addEventListener('change', event => { window.location.href = event.target.value; });

      setupFilters();
      setupBooking();
      setupForms();
      updateReveal();
    })();
  </script>
</body>
</html>
