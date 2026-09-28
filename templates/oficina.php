<?php
/**
 * Template 03 — AutoForce Garage
 * Auto Repair & Garage Professional Template
 * Single-file PHP template with internal pages and PT / ES / EN support.
 * Routes:
 * ?lang=pt&page=home
 * ?lang=pt&page=services
 * ?lang=pt&page=service&slug=diagnostico-eletronico
 * ?lang=pt&page=booking
 * ?lang=pt&page=quote
 * ?lang=pt&page=diagnostics
 * ?lang=pt&page=packages
 * ?lang=pt&page=vehicle-status
 * ?lang=pt&page=client-area
 * ?lang=pt&page=team
 * ?lang=pt&page=gallery
 * ?lang=pt&page=about
 * ?lang=pt&page=contact
 * ?lang=pt&page=confirmation
 */

$lang = strtolower($_GET['lang'] ?? 'pt');
if (!in_array($lang, ['pt', 'es', 'en'], true)) $lang = 'pt';

$page = strtolower($_GET['page'] ?? 'home');
$allowedPages = ['home', 'services', 'service', 'booking', 'quote', 'diagnostics', 'packages', 'vehicle-status', 'client-area', 'team', 'gallery', 'about', 'contact', 'confirmation'];
if (!in_array($page, $allowedPages, true)) $page = 'home';

function h($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function eur($value) { return '€ ' . number_format((float)$value, 2, ',', '.'); }
function route_to($page, $lang, $extra = []) { return '?' . http_build_query(array_merge(['lang' => $lang, 'page' => $page], $extra)); }
function lang_route($targetLang) { $q = $_GET; $q['lang'] = $targetLang; return '?' . http_build_query($q); }

$tr = [
  'pt' => [
    'html' => 'pt-PT',
    'meta_title' => 'AutoForce Garage — Auto Repair Professional Template',
    'meta_desc' => 'Template profissional para oficinas, centros auto, diagnóstico, agendamento, orçamento e acompanhamento da viatura.',
    'brand' => 'AutoForce Garage',
    'category' => 'Auto Repair Professional Template',
    'nav_home' => 'Início', 'nav_services' => 'Serviços', 'nav_booking' => 'Agendamento', 'nav_quote' => 'Orçamento', 'nav_diagnostics' => 'Diagnóstico', 'nav_packages' => 'Pacotes', 'nav_status' => 'Estado', 'nav_client' => 'Cliente', 'nav_team' => 'Equipa', 'nav_gallery' => 'Galeria', 'nav_about' => 'Sobre', 'nav_contact' => 'Contacto',
    'book_service' => 'Agendar Serviço', 'request_quote' => 'Pedir Orçamento', 'view_services' => 'Ver Serviços', 'track_vehicle' => 'Acompanhar Viatura',
    'hero_title' => 'Manutenção automóvel profissional, rápida e transparente.',
    'hero_text' => 'Agende revisões, diagnósticos, pneus, travões, óleo, bateria e reparações completas com uma equipa técnica multimarca.',
    'badge_diag' => 'Diagnóstico digital', 'badge_quote' => 'Orçamentos transparentes', 'badge_warranty' => 'Garantia nos serviços', 'badge_multi' => 'Atendimento multimarca',
    'command_title' => 'Entrada rápida da viatura', 'plate' => 'Matrícula', 'vehicle' => 'Viatura', 'priority' => 'Prioridade', 'normal' => 'Normal', 'urgent' => 'Urgente', 'open_ticket' => 'Abrir pedido',
    'services_title' => 'Matriz de serviços técnicos', 'services_text' => 'Catálogo completo com categorias, preço inicial, tempo médio, detalhe e agendamento direto.',
    'all' => 'Todos', 'revision' => 'Revisão', 'oil' => 'Óleo', 'brakes' => 'Travões', 'tires' => 'Pneus', 'alignment' => 'Alinhamento', 'electronic' => 'Diagnóstico', 'battery' => 'Bateria', 'ac' => 'Ar condicionado', 'engine' => 'Motor', 'suspension' => 'Suspensão', 'detailing' => 'Detailing', 'inspection' => 'Pré-compra',
    'from' => 'A partir de', 'avg_time' => 'Tempo médio', 'warranty' => 'Garantia', 'details' => 'Detalhe', 'included' => 'Incluído', 'benefits' => 'Benefícios', 'faq' => 'FAQ técnica', 'related' => 'Serviços relacionados',
    'booking_title' => 'Agendamento de serviço', 'booking_text' => 'Fluxo técnico em etapas: serviço, viatura, data/hora, contacto e confirmação.',
    'step_service' => 'Serviço', 'step_vehicle' => 'Viatura', 'step_datetime' => 'Data e hora', 'step_contact' => 'Contacto', 'step_confirm' => 'Confirmar',
    'choose_service' => 'Escolha o serviço', 'brand_label' => 'Marca', 'model_label' => 'Modelo', 'year_label' => 'Ano', 'plate_label' => 'Matrícula opcional', 'km_label' => 'Quilometragem', 'fuel_label' => 'Combustível', 'problem_label' => 'Descrição do problema', 'date_label' => 'Data', 'time_label' => 'Horário', 'name_label' => 'Nome', 'phone_label' => 'Telefone', 'email_label' => 'Email', 'notes_label' => 'Notas adicionais', 'summary' => 'Resumo técnico', 'back' => 'Voltar', 'next' => 'Continuar', 'confirm_booking' => 'Confirmar agendamento', 'required' => 'Preencha os campos obrigatórios.',
    'quote_title' => 'Pedido de orçamento', 'quote_text' => 'Receba uma estimativa inicial antes de trazer o veículo para a oficina.', 'send_quote' => 'Enviar pedido', 'contact_preference' => 'Preferência de contacto', 'upload_photos' => 'Fotos do problema', 'quote_sent' => 'Pedido de orçamento enviado.',
    'diagnostics_title' => 'Diagnóstico automóvel avançado', 'diagnostics_text' => 'Leitura de centralina, sensores, luzes no painel, falhas elétricas e relatório técnico.',
    'packages_title' => 'Pacotes de manutenção', 'packages_text' => 'Planos comerciais para manutenção preventiva, viagem, travões, pneus e ar condicionado.', 'ideal_for' => 'Ideal para', 'choose_package' => 'Escolher pacote',
    'status_title' => 'Estado da viatura', 'status_text' => 'Acompanhe visualmente cada etapa do serviço.', 'current_status' => 'Estado atual', 'technician' => 'Técnico responsável', 'eta' => 'Previsão', 'message' => 'Mensagem',
    'client_title' => 'Área do cliente', 'client_text' => 'Histórico, próxima revisão, orçamentos, faturas simuladas e mensagens da oficina.', 'history' => 'Histórico', 'next_revision' => 'Próxima revisão', 'quotes' => 'Orçamentos', 'invoices' => 'Faturas',
    'team_title' => 'Equipa técnica', 'team_text' => 'Mecânicos certificados por especialidade, experiência e responsabilidade técnica.', 'experience' => 'experiência',
    'gallery_title' => 'Galeria da oficina', 'gallery_text' => 'Equipamentos, diagnóstico, detailing, pneus, motor e organização da oficina.',
    'about_title' => 'Sobre a oficina', 'about_text' => 'Oficina multimarca focada em manutenção preventiva, diagnóstico técnico e reparações transparentes.',
    'contact_title' => 'Contacto e assistência', 'contact_text' => 'Morada, telefone, WhatsApp, horário, mapa, serviço urgente e formulário.', 'address' => 'Morada', 'hours' => 'Horário', 'whatsapp' => 'WhatsApp', 'send_message' => 'Enviar mensagem', 'message_sent' => 'Mensagem enviada.',
    'confirmation_title' => 'Pedido recebido', 'confirmation_text' => 'A referência foi criada. A oficina entrará em contacto para confirmar os detalhes.', 'reference' => 'Referência', 'next_step' => 'Próximo passo', 'back_home' => 'Voltar ao início',
    'footer_text' => 'Template completo para oficinas mecânicas, centros auto e serviços multimarca.', 'built_by' => 'Desenvolvido por AlexDevCode.'
  ],
  'es' => [
    'html' => 'es',
    'meta_title' => 'AutoForce Garage — Auto Repair Professional Template',
    'meta_desc' => 'Plantilla profesional para talleres, centros auto, diagnóstico, reservas, presupuestos y seguimiento del vehículo.',
    'brand' => 'AutoForce Garage', 'category' => 'Auto Repair Professional Template',
    'nav_home' => 'Inicio', 'nav_services' => 'Servicios', 'nav_booking' => 'Reserva', 'nav_quote' => 'Presupuesto', 'nav_diagnostics' => 'Diagnóstico', 'nav_packages' => 'Paquetes', 'nav_status' => 'Estado', 'nav_client' => 'Cliente', 'nav_team' => 'Equipo', 'nav_gallery' => 'Galería', 'nav_about' => 'Sobre', 'nav_contact' => 'Contacto',
    'book_service' => 'Reservar Servicio', 'request_quote' => 'Pedir Presupuesto', 'view_services' => 'Ver Servicios', 'track_vehicle' => 'Seguir Vehículo',
    'hero_title' => 'Mantenimiento automotriz profesional, rápido y transparente.', 'hero_text' => 'Reserva revisiones, diagnósticos, neumáticos, frenos, aceite, batería y reparaciones completas con equipo multimarca.',
    'badge_diag' => 'Diagnóstico digital', 'badge_quote' => 'Presupuestos transparentes', 'badge_warranty' => 'Garantía en servicios', 'badge_multi' => 'Servicio multimarca',
    'command_title' => 'Entrada rápida del vehículo', 'plate' => 'Matrícula', 'vehicle' => 'Vehículo', 'priority' => 'Prioridad', 'normal' => 'Normal', 'urgent' => 'Urgente', 'open_ticket' => 'Abrir solicitud',
    'services_title' => 'Matriz de servicios técnicos', 'services_text' => 'Catálogo completo con categorías, precio inicial, tiempo medio, detalle y reserva directa.',
    'all' => 'Todos', 'revision' => 'Revisión', 'oil' => 'Aceite', 'brakes' => 'Frenos', 'tires' => 'Neumáticos', 'alignment' => 'Alineación', 'electronic' => 'Diagnóstico', 'battery' => 'Batería', 'ac' => 'Aire acondicionado', 'engine' => 'Motor', 'suspension' => 'Suspensión', 'detailing' => 'Detailing', 'inspection' => 'Precompra',
    'from' => 'Desde', 'avg_time' => 'Tiempo medio', 'warranty' => 'Garantía', 'details' => 'Detalle', 'included' => 'Incluido', 'benefits' => 'Beneficios', 'faq' => 'FAQ técnica', 'related' => 'Servicios relacionados',
    'booking_title' => 'Reserva de servicio', 'booking_text' => 'Flujo técnico por etapas: servicio, vehículo, fecha/hora, contacto y confirmación.',
    'step_service' => 'Servicio', 'step_vehicle' => 'Vehículo', 'step_datetime' => 'Fecha y hora', 'step_contact' => 'Contacto', 'step_confirm' => 'Confirmar',
    'choose_service' => 'Elige el servicio', 'brand_label' => 'Marca', 'model_label' => 'Modelo', 'year_label' => 'Año', 'plate_label' => 'Matrícula opcional', 'km_label' => 'Kilometraje', 'fuel_label' => 'Combustible', 'problem_label' => 'Descripción del problema', 'date_label' => 'Fecha', 'time_label' => 'Horario', 'name_label' => 'Nombre', 'phone_label' => 'Teléfono', 'email_label' => 'Email', 'notes_label' => 'Notas adicionales', 'summary' => 'Resumen técnico', 'back' => 'Atrás', 'next' => 'Continuar', 'confirm_booking' => 'Confirmar reserva', 'required' => 'Completa los campos obligatorios.',
    'quote_title' => 'Solicitud de presupuesto', 'quote_text' => 'Recibe una estimación inicial antes de traer el vehículo al taller.', 'send_quote' => 'Enviar solicitud', 'contact_preference' => 'Preferencia de contacto', 'upload_photos' => 'Fotos del problema', 'quote_sent' => 'Solicitud de presupuesto enviada.',
    'diagnostics_title' => 'Diagnóstico automotriz avanzado', 'diagnostics_text' => 'Lectura de centralita, sensores, luces del panel, fallos eléctricos e informe técnico.',
    'packages_title' => 'Paquetes de mantenimiento', 'packages_text' => 'Planes comerciales para mantenimiento preventivo, viaje, frenos, neumáticos y aire acondicionado.', 'ideal_for' => 'Ideal para', 'choose_package' => 'Elegir paquete',
    'status_title' => 'Estado del vehículo', 'status_text' => 'Sigue visualmente cada etapa del servicio.', 'current_status' => 'Estado actual', 'technician' => 'Técnico responsable', 'eta' => 'Previsión', 'message' => 'Mensaje',
    'client_title' => 'Área del cliente', 'client_text' => 'Historial, próxima revisión, presupuestos, facturas simuladas y mensajes del taller.', 'history' => 'Historial', 'next_revision' => 'Próxima revisión', 'quotes' => 'Presupuestos', 'invoices' => 'Facturas',
    'team_title' => 'Equipo técnico', 'team_text' => 'Mecánicos certificados por especialidad, experiencia y responsabilidad técnica.', 'experience' => 'experiencia',
    'gallery_title' => 'Galería del taller', 'gallery_text' => 'Equipos, diagnóstico, detailing, neumáticos, motor y organización del taller.',
    'about_title' => 'Sobre el taller', 'about_text' => 'Taller multimarca enfocado en mantenimiento preventivo, diagnóstico técnico y reparaciones transparentes.',
    'contact_title' => 'Contacto y asistencia', 'contact_text' => 'Dirección, teléfono, WhatsApp, horario, mapa, servicio urgente y formulario.', 'address' => 'Dirección', 'hours' => 'Horario', 'whatsapp' => 'WhatsApp', 'send_message' => 'Enviar mensaje', 'message_sent' => 'Mensaje enviado.',
    'confirmation_title' => 'Solicitud recibida', 'confirmation_text' => 'La referencia fue creada. El taller contactará para confirmar los detalles.', 'reference' => 'Referencia', 'next_step' => 'Próximo paso', 'back_home' => 'Volver al inicio',
    'footer_text' => 'Plantilla completa para talleres mecánicos, centros auto y servicios multimarca.', 'built_by' => 'Desarrollado por AlexDevCode.'
  ],
  'en' => [
    'html' => 'en',
    'meta_title' => 'AutoForce Garage — Auto Repair Professional Template',
    'meta_desc' => 'Professional template for garages, auto centers, diagnostics, booking, quotes and vehicle tracking.',
    'brand' => 'AutoForce Garage', 'category' => 'Auto Repair Professional Template',
    'nav_home' => 'Home', 'nav_services' => 'Services', 'nav_booking' => 'Booking', 'nav_quote' => 'Quote', 'nav_diagnostics' => 'Diagnostics', 'nav_packages' => 'Packages', 'nav_status' => 'Status', 'nav_client' => 'Client', 'nav_team' => 'Team', 'nav_gallery' => 'Gallery', 'nav_about' => 'About', 'nav_contact' => 'Contact',
    'book_service' => 'Book Service', 'request_quote' => 'Request Quote', 'view_services' => 'View Services', 'track_vehicle' => 'Track Vehicle',
    'hero_title' => 'Professional, fast and transparent vehicle maintenance.', 'hero_text' => 'Book inspections, diagnostics, tires, brakes, oil, battery and complete repairs with a multi-brand technical team.',
    'badge_diag' => 'Digital diagnostics', 'badge_quote' => 'Transparent quotes', 'badge_warranty' => 'Service warranty', 'badge_multi' => 'Multi-brand service',
    'command_title' => 'Quick vehicle intake', 'plate' => 'Plate', 'vehicle' => 'Vehicle', 'priority' => 'Priority', 'normal' => 'Normal', 'urgent' => 'Urgent', 'open_ticket' => 'Open request',
    'services_title' => 'Technical service matrix', 'services_text' => 'Complete catalogue with categories, starting price, average time, detail and direct booking.',
    'all' => 'All', 'revision' => 'Inspection', 'oil' => 'Oil', 'brakes' => 'Brakes', 'tires' => 'Tires', 'alignment' => 'Alignment', 'electronic' => 'Diagnostics', 'battery' => 'Battery', 'ac' => 'A/C', 'engine' => 'Engine', 'suspension' => 'Suspension', 'detailing' => 'Detailing', 'inspection' => 'Pre-purchase',
    'from' => 'From', 'avg_time' => 'Average time', 'warranty' => 'Warranty', 'details' => 'Detail', 'included' => 'Included', 'benefits' => 'Benefits', 'faq' => 'Technical FAQ', 'related' => 'Related services',
    'booking_title' => 'Service booking', 'booking_text' => 'Technical step flow: service, vehicle, date/time, contact and confirmation.',
    'step_service' => 'Service', 'step_vehicle' => 'Vehicle', 'step_datetime' => 'Date and time', 'step_contact' => 'Contact', 'step_confirm' => 'Confirm',
    'choose_service' => 'Choose service', 'brand_label' => 'Brand', 'model_label' => 'Model', 'year_label' => 'Year', 'plate_label' => 'Plate optional', 'km_label' => 'Mileage', 'fuel_label' => 'Fuel', 'problem_label' => 'Problem description', 'date_label' => 'Date', 'time_label' => 'Time', 'name_label' => 'Name', 'phone_label' => 'Phone', 'email_label' => 'Email', 'notes_label' => 'Additional notes', 'summary' => 'Technical summary', 'back' => 'Back', 'next' => 'Continue', 'confirm_booking' => 'Confirm booking', 'required' => 'Please fill the required fields.',
    'quote_title' => 'Quote request', 'quote_text' => 'Receive an initial estimate before bringing the vehicle to the garage.', 'send_quote' => 'Send request', 'contact_preference' => 'Contact preference', 'upload_photos' => 'Problem photos', 'quote_sent' => 'Quote request sent.',
    'diagnostics_title' => 'Advanced vehicle diagnostics', 'diagnostics_text' => 'ECU scan, sensors, dashboard warning lights, electrical faults and technical report.',
    'packages_title' => 'Maintenance packages', 'packages_text' => 'Commercial plans for preventive maintenance, travel checks, brakes, tires and air conditioning.', 'ideal_for' => 'Ideal for', 'choose_package' => 'Choose package',
    'status_title' => 'Vehicle status', 'status_text' => 'Visually track every service stage.', 'current_status' => 'Current status', 'technician' => 'Responsible technician', 'eta' => 'ETA', 'message' => 'Message',
    'client_title' => 'Client area', 'client_text' => 'History, next inspection, quotes, simulated invoices and garage messages.', 'history' => 'History', 'next_revision' => 'Next inspection', 'quotes' => 'Quotes', 'invoices' => 'Invoices',
    'team_title' => 'Technical team', 'team_text' => 'Certified mechanics by specialty, experience and technical responsibility.', 'experience' => 'experience',
    'gallery_title' => 'Garage gallery', 'gallery_text' => 'Equipment, diagnostics, detailing, tires, engine and garage organization.',
    'about_title' => 'About the garage', 'about_text' => 'Multi-brand garage focused on preventive maintenance, technical diagnostics and transparent repairs.',
    'contact_title' => 'Contact and assistance', 'contact_text' => 'Address, phone, WhatsApp, hours, map, urgent service and form.', 'address' => 'Address', 'hours' => 'Hours', 'whatsapp' => 'WhatsApp', 'send_message' => 'Send message', 'message_sent' => 'Message sent.',
    'confirmation_title' => 'Request received', 'confirmation_text' => 'The reference was created. The garage will contact you to confirm the details.', 'reference' => 'Reference', 'next_step' => 'Next step', 'back_home' => 'Back home',
    'footer_text' => 'Complete template for auto repair garages, auto centers and multi-brand services.', 'built_by' => 'Built by AlexDevCode.'
  ]
];
$t = $tr[$lang];

$categories = [
  'all' => ['label' => $t['all'], 'icon' => 'bi-grid-3x3-gap'],
  'revision' => ['label' => $t['revision'], 'icon' => 'bi-clipboard-check'],
  'oil' => ['label' => $t['oil'], 'icon' => 'bi-droplet-half'],
  'brakes' => ['label' => $t['brakes'], 'icon' => 'bi-record-circle'],
  'tires' => ['label' => $t['tires'], 'icon' => 'bi-circle'],
  'alignment' => ['label' => $t['alignment'], 'icon' => 'bi-sliders'],
  'electronic' => ['label' => $t['electronic'], 'icon' => 'bi-cpu'],
  'battery' => ['label' => $t['battery'], 'icon' => 'bi-battery-charging'],
  'ac' => ['label' => $t['ac'], 'icon' => 'bi-wind'],
  'engine' => ['label' => $t['engine'], 'icon' => 'bi-gear-wide-connected'],
  'suspension' => ['label' => $t['suspension'], 'icon' => 'bi-speedometer2'],
  'detailing' => ['label' => $t['detailing'], 'icon' => 'bi-stars'],
  'inspection' => ['label' => $t['inspection'], 'icon' => 'bi-search'],
];

$services = [
  ['slug' => 'diagnostico-eletronico', 'category' => 'electronic', 'price' => 29, 'time' => '30 min', 'warranty' => '30 dias', 'badge' => 'OBD Pro', 'image' => 'https://images.unsplash.com/photo-1632823469860-1caaf5c6ea34?auto=format&fit=crop&w=1400&q=82', 'name' => ['pt' => 'Diagnóstico Eletrónico', 'es' => 'Diagnóstico Electrónico', 'en' => 'Electronic Diagnostics'], 'short' => ['pt' => 'Leitura completa de erros, sensores e sistemas do veículo.', 'es' => 'Lectura completa de errores, sensores y sistemas del vehículo.', 'en' => 'Complete scan of errors, sensors and vehicle systems.'], 'long' => ['pt' => 'Análise técnica com scanner OBD, leitura de centralina, sensores, luzes no painel e relatório do estado eletrónico do veículo.', 'es' => 'Análisis técnico con scanner OBD, lectura de centralita, sensores, luces del panel e informe del estado electrónico.', 'en' => 'Technical analysis with OBD scanner, ECU reading, sensors, dashboard lights and electronic condition report.'], 'included' => ['OBD scan', 'Relatório técnico', 'Luzes no painel', 'Sensores'], 'benefits' => ['Deteção rápida', 'Evita trocas desnecessárias', 'Base técnica para orçamento']],
  ['slug' => 'revisao-completa', 'category' => 'revision', 'price' => 119, 'time' => '90 min', 'warranty' => '6 meses', 'badge' => '30 pontos', 'image' => 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1400&q=82', 'name' => ['pt' => 'Revisão Completa', 'es' => 'Revisión Completa', 'en' => 'Full Inspection'], 'short' => ['pt' => 'Check-up geral com óleo, filtros, travões, pneus e bateria.', 'es' => 'Check-up general con aceite, filtros, frenos, neumáticos y batería.', 'en' => 'General check-up with oil, filters, brakes, tires and battery.'], 'long' => ['pt' => 'Revisão preventiva completa para manter a viatura segura, eficiente e pronta para estrada.', 'es' => 'Revisión preventiva completa para mantener el vehículo seguro, eficiente y listo para la carretera.', 'en' => 'Complete preventive inspection to keep the vehicle safe, efficient and road-ready.'], 'included' => ['Óleo', 'Filtros', 'Travões', 'Pneus', 'Bateria', 'Luzes'], 'benefits' => ['Mais segurança', 'Menos avarias', 'Histórico organizado']],
  ['slug' => 'mudanca-oleo-filtros', 'category' => 'oil', 'price' => 49, 'time' => '35 min', 'warranty' => '90 dias', 'badge' => 'Serviço rápido', 'image' => 'https://images.unsplash.com/photo-1635437536607-b8572f443763?auto=format&fit=crop&w=1400&q=82', 'name' => ['pt' => 'Mudança de Óleo e Filtros', 'es' => 'Cambio de Aceite y Filtros', 'en' => 'Oil and Filters Change'], 'short' => ['pt' => 'Óleo adequado à viatura, filtro novo e verificação de níveis.', 'es' => 'Aceite adecuado, filtro nuevo y verificación de niveles.', 'en' => 'Correct oil, new filter and fluid level verification.'], 'long' => ['pt' => 'Serviço rápido com óleo recomendado, substituição de filtro, verificação de níveis e reset de manutenção quando aplicável.', 'es' => 'Servicio rápido con aceite recomendado, sustitución de filtro, niveles y reset de mantenimiento.', 'en' => 'Quick service with recommended oil, filter replacement, level checks and maintenance reset when applicable.'], 'included' => ['Óleo', 'Filtro', 'Níveis', 'Reset manutenção'], 'benefits' => ['Proteção do motor', 'Melhor consumo', 'Serviço rápido']],
  ['slug' => 'travagem-segura', 'category' => 'brakes', 'price' => 59, 'time' => '60 min', 'warranty' => '6 meses', 'badge' => 'Segurança', 'image' => 'https://images.unsplash.com/photo-1625047509248-ec889cbff17f?auto=format&fit=crop&w=1400&q=82', 'name' => ['pt' => 'Travões e Segurança', 'es' => 'Frenos y Seguridad', 'en' => 'Brakes and Safety'], 'short' => ['pt' => 'Verificação de discos, pastilhas, ruídos, fluido e teste de segurança.', 'es' => 'Verificación de discos, pastillas, ruidos, fluido y prueba de seguridad.', 'en' => 'Inspection of discs, pads, noises, fluid and safety test.'], 'long' => ['pt' => 'Diagnóstico e substituição de componentes de travagem com teste final para garantir segurança.', 'es' => 'Diagnóstico y sustitución de componentes de freno con prueba final de seguridad.', 'en' => 'Brake component diagnosis and replacement with final safety test.'], 'included' => ['Discos', 'Pastilhas', 'Fluido', 'Teste final'], 'benefits' => ['Travagem segura', 'Menos ruído', 'Garantia do serviço']],
  ['slug' => 'pneus-alinhamento', 'category' => 'tires', 'price' => 35, 'time' => '45 min', 'warranty' => '30 dias', 'badge' => 'Geometria', 'image' => 'https://images.unsplash.com/photo-1600706432502-77a0e2e32734?auto=format&fit=crop&w=1400&q=82', 'name' => ['pt' => 'Pneus + Alinhamento', 'es' => 'Neumáticos + Alineación', 'en' => 'Tires + Alignment'], 'short' => ['pt' => 'Montagem, calibragem, alinhamento e geometria para condução estável.', 'es' => 'Montaje, calibración, alineación y geometría para conducción estable.', 'en' => 'Mounting, balancing, alignment and geometry for stable driving.'], 'long' => ['pt' => 'Serviço de pneus com alinhamento de precisão para reduzir desgaste e melhorar segurança.', 'es' => 'Servicio de neumáticos con alineación precisa para reducir desgaste y mejorar seguridad.', 'en' => 'Tire service with precision alignment to reduce wear and improve safety.'], 'included' => ['Montagem', 'Calibragem', 'Alinhamento', 'Geometria'], 'benefits' => ['Menos desgaste', 'Direção estável', 'Mais segurança']],
  ['slug' => 'bateria-arranque', 'category' => 'battery', 'price' => 39, 'time' => '25 min', 'warranty' => 'Conforme peça', 'badge' => 'Teste carga', 'image' => 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?auto=format&fit=crop&w=1400&q=82', 'name' => ['pt' => 'Bateria e Sistema de Arranque', 'es' => 'Batería y Sistema de Arranque', 'en' => 'Battery and Starting System'], 'short' => ['pt' => 'Teste de bateria, alternador, arranque e substituição quando necessário.', 'es' => 'Test de batería, alternador, arranque y sustitución si es necesario.', 'en' => 'Battery, alternator, starter testing and replacement if needed.'], 'long' => ['pt' => 'Verificação elétrica do sistema de carga e arranque com teste de tensão e diagnóstico rápido.', 'es' => 'Verificación eléctrica del sistema de carga y arranque con prueba de tensión.', 'en' => 'Electrical check of the charging and starting system with voltage testing.'], 'included' => ['Teste tensão', 'Alternador', 'Arranque', 'Substituição'], 'benefits' => ['Evita imobilização', 'Diagnóstico rápido', 'Peças recomendadas']],
  ['slug' => 'ar-condicionado', 'category' => 'ac', 'price' => 45, 'time' => '50 min', 'warranty' => '60 dias', 'badge' => 'Conforto', 'image' => 'https://images.unsplash.com/photo-1613214149922-f1809c99b414?auto=format&fit=crop&w=1400&q=82', 'name' => ['pt' => 'Ar Condicionado', 'es' => 'Aire Acondicionado', 'en' => 'Air Conditioning'], 'short' => ['pt' => 'Higienização, recarga de gás, deteção de fugas e filtro de habitáculo.', 'es' => 'Higienización, recarga, fugas y filtro de habitáculo.', 'en' => 'Cleaning, gas recharge, leak detection and cabin filter.'], 'long' => ['pt' => 'Serviço completo para conforto, eficiência e qualidade do ar no interior da viatura.', 'es' => 'Servicio completo para confort, eficiencia y calidad del aire interior.', 'en' => 'Complete service for comfort, efficiency and interior air quality.'], 'included' => ['Higienização', 'Recarga', 'Fugas', 'Filtro'], 'benefits' => ['Ar limpo', 'Mais conforto', 'Sistema eficiente']],
  ['slug' => 'detailing-premium', 'category' => 'detailing', 'price' => 89, 'time' => '180 min', 'warranty' => '30 dias', 'badge' => 'Premium', 'image' => 'https://images.unsplash.com/photo-1607860108855-64acf2078ed9?auto=format&fit=crop&w=1400&q=82', 'name' => ['pt' => 'Auto Detailing Premium', 'es' => 'Auto Detailing Premium', 'en' => 'Premium Auto Detailing'], 'short' => ['pt' => 'Polimento técnico, limpeza interior e proteção de pintura.', 'es' => 'Pulido técnico, limpieza interior y protección de pintura.', 'en' => 'Technical polishing, interior cleaning and paint protection.'], 'long' => ['pt' => 'Serviço estético profissional para recuperar brilho, proteger pintura e melhorar o interior.', 'es' => 'Servicio estético profesional para recuperar brillo, proteger pintura y mejorar interior.', 'en' => 'Professional cosmetic service to restore shine, protect paint and improve the interior.'], 'included' => ['Polimento', 'Interior', 'Proteção', 'Acabamento'], 'benefits' => ['Mais brilho', 'Proteção', 'Valorização']],
  ['slug' => 'inspecao-pre-compra', 'category' => 'inspection', 'price' => 69, 'time' => '75 min', 'warranty' => 'Relatório', 'badge' => 'Compra segura', 'image' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1400&q=82', 'name' => ['pt' => 'Inspeção Pré-compra', 'es' => 'Inspección Precompra', 'en' => 'Pre-purchase Inspection'], 'short' => ['pt' => 'Relatório técnico antes de comprar uma viatura usada.', 'es' => 'Informe técnico antes de comprar un vehículo usado.', 'en' => 'Technical report before buying a used vehicle.'], 'long' => ['pt' => 'Avaliação técnica de motor, eletrónica, travões, pneus, histórico visual e relatório para decisão de compra.', 'es' => 'Evaluación de motor, electrónica, frenos, neumáticos, visual e informe para compra.', 'en' => 'Technical assessment of engine, electronics, brakes, tires, visual condition and purchase report.'], 'included' => ['Motor', 'Eletrónica', 'Pneus', 'Travões', 'Relatório'], 'benefits' => ['Compra informada', 'Evita surpresas', 'Relatório claro']],
];

$serviceMap = [];
foreach ($services as $srv) $serviceMap[$srv['slug']] = $srv;
$selectedSlug = $_GET['slug'] ?? $services[0]['slug'];
$selectedService = $serviceMap[$selectedSlug] ?? $services[0];
$preService = $_GET['service'] ?? '';

$packages = [
  ['name' => ['pt' => 'Revisão Essencial', 'es' => 'Revisión Esencial', 'en' => 'Essential Inspection'], 'price' => 79, 'time' => '60 min', 'ideal' => 'Manutenção preventiva', 'items' => ['Óleo', 'Filtro óleo', 'Níveis', 'Luzes', 'Pneus']],
  ['name' => ['pt' => 'Revisão Completa', 'es' => 'Revisión Completa', 'en' => 'Complete Inspection'], 'price' => 149, 'time' => '120 min', 'ideal' => 'Uso diário e viagens', 'items' => ['Óleo', 'Filtros', 'Travões', 'Bateria', 'Pneus', 'Diagnóstico']],
  ['name' => ['pt' => 'Check-up Antes da Viagem', 'es' => 'Check-up Antes del Viaje', 'en' => 'Pre-trip Check-up'], 'price' => 59, 'time' => '45 min', 'ideal' => 'Viagens longas', 'items' => ['Pneus', 'Travões', 'Luzes', 'Fluidos', 'Bateria']],
  ['name' => ['pt' => 'Pack Pneus + Alinhamento', 'es' => 'Pack Neumáticos + Alineación', 'en' => 'Tires + Alignment Pack'], 'price' => 89, 'time' => '75 min', 'ideal' => 'Segurança e estabilidade', 'items' => ['Montagem', 'Calibragem', 'Alinhamento', 'Geometria']],
];

$mechanics = [
  ['name' => 'Carlos Mendes', 'role' => ['pt' => 'Mecânico Chefe', 'es' => 'Mecánico Jefe', 'en' => 'Chief Mechanic'], 'spec' => 'Motor + diagnóstico eletrónico', 'years' => '14+', 'cert' => 'Bosch Diagnostics', 'image' => 'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&w=900&q=82'],
  ['name' => 'Rui Almeida', 'role' => ['pt' => 'Técnico de Pneus e Alinhamento', 'es' => 'Técnico de Neumáticos y Alineación', 'en' => 'Tire and Alignment Technician'], 'spec' => 'Geometria + suspensão', 'years' => '9+', 'cert' => 'Wheel Geometry Pro', 'image' => 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?auto=format&fit=crop&w=900&q=82'],
  ['name' => 'João Martins', 'role' => ['pt' => 'Eletricista Auto', 'es' => 'Electricista Auto', 'en' => 'Auto Electrician'], 'spec' => 'Elétrica + sensores', 'years' => '11+', 'cert' => 'EV/Hybrid Level 2', 'image' => 'https://images.unsplash.com/photo-1632823469850-2f77dd9c1c7d?auto=format&fit=crop&w=900&q=82'],
  ['name' => 'Miguel Santos', 'role' => ['pt' => 'Detailing Specialist', 'es' => 'Detailing Specialist', 'en' => 'Detailing Specialist'], 'spec' => 'Polimento + cerâmica', 'years' => '7+', 'cert' => 'Paint Correction', 'image' => 'https://images.unsplash.com/photo-1607860108855-64acf2078ed9?auto=format&fit=crop&w=900&q=82'],
];

$gallery = [
  ['cat' => 'oficina', 'label' => 'Oficina', 'image' => 'https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?auto=format&fit=crop&w=1200&q=82'],
  ['cat' => 'diagnostico', 'label' => 'Diagnóstico', 'image' => 'https://images.unsplash.com/photo-1632823471565-1ecdf5c3f7a0?auto=format&fit=crop&w=1200&q=82'],
  ['cat' => 'pneus', 'label' => 'Pneus', 'image' => 'https://images.unsplash.com/photo-1600706432502-77a0e2e32734?auto=format&fit=crop&w=1200&q=82'],
  ['cat' => 'motor', 'label' => 'Motor', 'image' => 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?auto=format&fit=crop&w=1200&q=82'],
  ['cat' => 'detailing', 'label' => 'Detailing', 'image' => 'https://images.unsplash.com/photo-1607860108855-64acf2078ed9?auto=format&fit=crop&w=1200&q=82'],
  ['cat' => 'equipamentos', 'label' => 'Equipamentos', 'image' => 'https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&w=1200&q=82'],
];

$statusSteps = [
  ['key' => 'received', 'label' => ['pt' => 'Recebido', 'es' => 'Recibido', 'en' => 'Received'], 'done' => true],
  ['key' => 'diagnosis', 'label' => ['pt' => 'Em diagnóstico', 'es' => 'En diagnóstico', 'en' => 'In diagnostics'], 'done' => true],
  ['key' => 'quote', 'label' => ['pt' => 'Orçamento enviado', 'es' => 'Presupuesto enviado', 'en' => 'Quote sent'], 'done' => false],
  ['key' => 'approval', 'label' => ['pt' => 'Aprovação do cliente', 'es' => 'Aprobación del cliente', 'en' => 'Client approval'], 'done' => false],
  ['key' => 'repair', 'label' => ['pt' => 'Reparação', 'es' => 'Reparación', 'en' => 'Repair'], 'done' => false],
  ['key' => 'ready', 'label' => ['pt' => 'Pronto para entrega', 'es' => 'Listo para entrega', 'en' => 'Ready for delivery'], 'done' => false],
];

function local_value($arr, $lang) { return $arr[$lang] ?? $arr['pt'] ?? reset($arr); }
function service_name($service, $lang) { return local_value($service['name'], $lang); }
function service_short($service, $lang) { return local_value($service['short'], $lang); }
function service_long($service, $lang) { return local_value($service['long'], $lang); }
?>
<!DOCTYPE html>
<html lang="<?= h($t['html']) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?= h($t['meta_desc']) ?>">
  <meta name="theme-color" content="#0E1116">
  <title><?= h($t['meta_title']) ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Rajdhani:wght@600;700&family=Sora:wght@500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root {
      --af-bg: #0E1116;
      --af-bg2: #151A21;
      --af-card: #1D232C;
      --af-card2: #242A33;
      --af-text: #F4F7FA;
      --af-muted: #AAB4C0;
      --af-blue: #2F80ED;
      --af-orange: #FF7A1A;
      --af-yellow: #F5B942;
      --af-metal: #8A94A3;
      --af-green: #2ECC71;
      --af-red: #E63946;
      --af-line: rgba(244, 247, 250, 0.10);
      --af-line2: rgba(244, 247, 250, 0.18);
      --af-shadow: 0 26px 80px rgba(0,0,0,.38);
      --af-max: 1220px;
    }
    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      margin: 0;
      font-family: Inter, system-ui, -apple-system, Segoe UI, sans-serif;
      background:
        linear-gradient(90deg, rgba(255,255,255,.025) 1px, transparent 1px),
        linear-gradient(rgba(255,255,255,.025) 1px, transparent 1px),
        radial-gradient(circle at 10% 0%, rgba(47,128,237,.22), transparent 30rem),
        radial-gradient(circle at 96% 12%, rgba(255,122,26,.16), transparent 28rem),
        var(--af-bg);
      background-size: 48px 48px, 48px 48px, auto, auto, auto;
      color: var(--af-text);
      overflow-x: hidden;
    }
    body.af-lock { overflow: hidden; }
    a { color: inherit; text-decoration: none; }
    button, input, select, textarea { font: inherit; }
    button { cursor: pointer; }
    img { max-width: 100%; display: block; }

    .af-wrap { width: min(var(--af-max), calc(100% - 32px)); margin-inline: auto; }
    .af-section { padding: 84px 0; }
    .af-kicker { display: inline-flex; align-items: center; gap: 10px; color: var(--af-orange); text-transform: uppercase; letter-spacing: .17em; font-family: Sora, sans-serif; font-size: .74rem; font-weight: 800; }
    .af-kicker::before { content: ''; width: 34px; height: 2px; background: currentColor; }
    .af-title { margin: 12px 0 0; font-family: Sora, Inter, sans-serif; font-size: clamp(2.35rem, 5vw, 5.1rem); line-height: .94; letter-spacing: -.06em; }
    .af-lead { max-width: 760px; margin: 18px 0 0; color: var(--af-muted); font-size: clamp(1rem, 1.35vw, 1.14rem); line-height: 1.78; }
    .af-muted { color: var(--af-muted); }

    .af-btn { display: inline-flex; align-items: center; justify-content: center; gap: 10px; min-height: 48px; padding: 13px 18px; border-radius: 12px; border: 1px solid transparent; color: var(--af-text); font-family: Sora, sans-serif; font-weight: 800; transition: transform .18s ease, background .18s ease, border-color .18s ease, box-shadow .18s ease; }
    .af-btn:hover, .af-btn:focus-visible { transform: translateY(-2px); outline: none; }
    .af-btn-main { background: linear-gradient(135deg, var(--af-orange), #ff9a42); color: #130A03; box-shadow: 0 18px 40px rgba(255,122,26,.26); }
    .af-btn-main:hover { box-shadow: 0 22px 52px rgba(255,122,26,.36); }
    .af-btn-blue { background: linear-gradient(135deg, var(--af-blue), #5fa3ff); color: #fff; box-shadow: 0 18px 40px rgba(47,128,237,.22); }
    .af-btn-soft { background: rgba(244,247,250,.055); border-color: var(--af-line); color: var(--af-text); }
    .af-btn-soft:hover { border-color: rgba(47,128,237,.45); background: rgba(47,128,237,.12); }
    .af-btn-small { min-height: 40px; padding: 10px 13px; font-size: .88rem; }

    .af-header { position: sticky; top: 0; z-index: 80; border-bottom: 1px solid var(--af-line); background: rgba(14,17,22,.84); backdrop-filter: blur(18px); }
    .af-nav { min-height: 76px; display: flex; align-items: center; gap: 16px; justify-content: space-between; }
    .af-brand { display: inline-flex; align-items: center; gap: 12px; min-width: fit-content; }
    .af-logo { width: 46px; height: 46px; display: grid; place-items: center; border: 1px solid rgba(47,128,237,.45); border-radius: 14px; background: linear-gradient(145deg, rgba(47,128,237,.2), rgba(255,122,26,.08)); color: var(--af-orange); box-shadow: inset 0 1px 0 rgba(255,255,255,.08); }
    .af-brand strong { display: block; font-family: Rajdhani, Sora, sans-serif; font-size: 1.48rem; letter-spacing: .02em; line-height: .95; text-transform: uppercase; }
    .af-brand span { display: block; margin-top: 3px; color: var(--af-muted); font-size: .68rem; font-family: Sora, sans-serif; letter-spacing: .13em; text-transform: uppercase; }
    .af-links { display: flex; align-items: center; gap: 2px; margin-left: auto; }
    .af-link { padding: 10px 10px; border-radius: 10px; color: var(--af-muted); font-size: .9rem; font-weight: 800; }
    .af-link:hover, .af-link.active { color: var(--af-text); background: rgba(244,247,250,.07); }
    .af-actions { display: flex; align-items: center; gap: 10px; }
    .af-lang { min-height: 42px; border: 1px solid var(--af-line); border-radius: 10px; padding: 0 30px 0 10px; background: rgba(244,247,250,.055); color: var(--af-text); outline: none; }
    .af-lang option { color: #111; }
    .af-menu { display: none; width: 44px; height: 44px; border: 1px solid var(--af-line); border-radius: 10px; background: rgba(244,247,250,.055); color: var(--af-text); }

    .af-hero { position: relative; padding: 72px 0 42px; overflow: hidden; }
    .af-hero-grid { display: grid; grid-template-columns: minmax(0, 1.02fr) minmax(360px, .98fr); gap: 42px; align-items: center; }
    .af-badges { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 24px; }
    .af-badge { display: inline-flex; align-items: center; gap: 8px; min-height: 36px; padding: 8px 11px; border: 1px solid var(--af-line); border-radius: 10px; background: rgba(244,247,250,.055); color: var(--af-text); font-size: .84rem; font-weight: 850; }
    .af-badge i { color: var(--af-blue); }
    .af-badge.warn i { color: var(--af-yellow); }
    .af-badge.ok i { color: var(--af-green); }
    .af-actions-row { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 28px; }
    .af-command { border: 1px solid var(--af-line); border-radius: 24px; background: rgba(29,35,44,.86); box-shadow: var(--af-shadow); overflow: hidden; }
    .af-command-top { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 16px 18px; border-bottom: 1px solid var(--af-line); background: linear-gradient(90deg, rgba(47,128,237,.12), rgba(255,122,26,.07)); }
    .af-dots { display: flex; gap: 6px; }
    .af-dot { width: 9px; height: 9px; border-radius: 50%; background: var(--af-metal); }
    .af-dot:nth-child(1) { background: var(--af-red); } .af-dot:nth-child(2) { background: var(--af-yellow); } .af-dot:nth-child(3) { background: var(--af-green); }
    .af-command-body { padding: 20px; display: grid; gap: 14px; }
    .af-terminal-line { display: grid; grid-template-columns: 130px 1fr; gap: 10px; align-items: center; padding: 12px; border: 1px solid var(--af-line); border-radius: 14px; background: rgba(14,17,22,.55); }
    .af-terminal-line span { color: var(--af-muted); font-size: .86rem; }
    .af-terminal-line strong { color: var(--af-text); font-family: Sora, sans-serif; }
    .af-quick-form { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 6px; }

    .af-field { display: grid; gap: 7px; }
    .af-field label { font-size: .82rem; color: var(--af-muted); font-weight: 850; }
    .af-input, .af-select, .af-textarea { width: 100%; min-height: 48px; border: 1px solid var(--af-line); border-radius: 12px; padding: 0 13px; background: rgba(244,247,250,.06); color: var(--af-text); outline: none; }
    .af-textarea { min-height: 110px; padding: 12px 13px; resize: vertical; }
    .af-select option { color: #111; }
    .af-input:focus, .af-select:focus, .af-textarea:focus { border-color: var(--af-blue); box-shadow: 0 0 0 4px rgba(47,128,237,.14); }
    .af-full { grid-column: 1 / -1; }

    .af-metrics { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-top: 26px; }
    .af-metric { padding: 16px; border: 1px solid var(--af-line); border-radius: 18px; background: rgba(244,247,250,.05); }
    .af-metric strong { display: block; font-family: Rajdhani, sans-serif; font-size: 2rem; line-height: 1; }
    .af-metric span { color: var(--af-muted); font-size: .85rem; }

    .af-page-hero { padding: 68px 0 34px; }
    .af-breadcrumb { display: flex; flex-wrap: wrap; gap: 8px; align-items: center; color: var(--af-muted); font-weight: 800; margin-bottom: 20px; }
    .af-breadcrumb i { color: var(--af-orange); }
    .af-section-head { display: flex; justify-content: space-between; align-items: end; gap: 22px; margin-bottom: 30px; }
    .af-section-head > div { max-width: 800px; }

    .af-category-rail { display: flex; gap: 10px; overflow-x: auto; padding: 4px 2px 12px; scrollbar-width: thin; }
    .af-tab { flex: 0 0 auto; display: inline-flex; align-items: center; gap: 9px; min-height: 44px; padding: 0 13px; border: 1px solid var(--af-line); border-radius: 12px; background: rgba(244,247,250,.055); color: var(--af-muted); font-weight: 900; }
    .af-tab i { color: var(--af-blue); }
    .af-tab:hover, .af-tab.active { color: var(--af-text); background: rgba(47,128,237,.13); border-color: rgba(47,128,237,.42); }

    .af-service-matrix { display: grid; gap: 12px; }
    .af-service-row { display: grid; grid-template-columns: 64px minmax(0, 1.1fr) 150px 120px 230px; gap: 14px; align-items: center; padding: 14px; border: 1px solid var(--af-line); border-radius: 18px; background: rgba(29,35,44,.78); box-shadow: 0 18px 48px rgba(0,0,0,.18); transition: transform .18s ease, border-color .18s ease, background .18s ease; }
    .af-service-row:hover { transform: translateY(-2px); border-color: rgba(255,122,26,.42); background: rgba(36,42,51,.88); }
    .af-service-icon { width: 58px; height: 58px; display: grid; place-items: center; border: 1px solid rgba(47,128,237,.36); border-radius: 14px; color: var(--af-blue); background: rgba(47,128,237,.12); font-size: 1.4rem; }
    .af-service-row h3 { margin: 0; font-family: Sora, sans-serif; font-size: 1.05rem; letter-spacing: -.02em; }
    .af-service-row p { margin: 7px 0 0; color: var(--af-muted); line-height: 1.55; font-size: .9rem; }
    .af-service-price, .af-service-time { color: var(--af-muted); font-size: .86rem; }
    .af-service-price strong, .af-service-time strong { display: block; color: var(--af-text); margin-top: 4px; font-size: 1rem; }
    .af-service-actions { display: flex; justify-content: end; gap: 8px; flex-wrap: wrap; }

    .af-panel, .af-card { border: 1px solid var(--af-line); border-radius: 24px; background: rgba(29,35,44,.82); box-shadow: 0 18px 48px rgba(0,0,0,.2); overflow: hidden; }
    .af-panel { padding: 24px; }
    .af-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 22px; }
    .af-grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
    .af-grid-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
    .af-image-panel img { width: 100%; height: 100%; min-height: 520px; object-fit: cover; }
    .af-list { display: grid; gap: 10px; margin: 0; padding: 0; list-style: none; }
    .af-list li { display: flex; gap: 10px; align-items: flex-start; color: var(--af-muted); line-height: 1.6; }
    .af-list i { width: 26px; height: 26px; display: grid; place-items: center; flex: 0 0 auto; border-radius: 8px; background: rgba(46,204,113,.11); color: var(--af-green); }

    .af-detail-photo { border: 1px solid var(--af-line); border-radius: 24px; overflow: hidden; box-shadow: var(--af-shadow); }
    .af-detail-photo img { width: 100%; height: 620px; object-fit: cover; }
    .af-meta-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin: 22px 0; }
    .af-meta { padding: 14px; border: 1px solid var(--af-line); border-radius: 14px; background: rgba(14,17,22,.5); }
    .af-meta span { display: block; color: var(--af-muted); font-size: .78rem; font-weight: 900; text-transform: uppercase; letter-spacing: .08em; }
    .af-meta strong { display: block; margin-top: 5px; }

    .af-booking-layout { display: grid; grid-template-columns: minmax(0, 1fr) 360px; gap: 20px; align-items: start; }
    .af-stepper { display: grid; grid-template-columns: repeat(5, 1fr); gap: 8px; margin: 22px 0; }
    .af-step { min-height: 42px; border: 1px solid var(--af-line); border-radius: 12px; background: rgba(244,247,250,.055); color: var(--af-muted); font-family: Sora, sans-serif; font-size: .78rem; font-weight: 800; }
    .af-step.active { background: var(--af-blue); color: #fff; border-color: var(--af-blue); }
    .af-booking-step { display: none; gap: 14px; }
    .af-booking-step.active { display: grid; }
    .af-choice-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; }
    .af-choice { display: grid; gap: 7px; padding: 14px; border: 1px solid var(--af-line); border-radius: 14px; background: rgba(14,17,22,.45); color: var(--af-muted); cursor: pointer; }
    .af-choice input { accent-color: var(--af-orange); }
    .af-choice:has(input:checked) { border-color: var(--af-orange); background: rgba(255,122,26,.12); color: var(--af-text); }
    .af-form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; }
    .af-time-grid { display: flex; flex-wrap: wrap; gap: 10px; }
    .af-time { min-height: 42px; padding: 0 13px; border: 1px solid var(--af-line); border-radius: 12px; background: rgba(244,247,250,.06); color: var(--af-muted); font-weight: 900; }
    .af-time.active { background: var(--af-orange); border-color: var(--af-orange); color: #130A03; }
    .af-summary { position: sticky; top: 96px; }
    .af-summary-lines { display: grid; gap: 11px; margin-top: 18px; }
    .af-summary-line { display: flex; justify-content: space-between; gap: 12px; padding-bottom: 11px; border-bottom: 1px solid var(--af-line); color: var(--af-muted); }
    .af-summary-line strong { color: var(--af-text); text-align: right; }

    .af-package { padding: 22px; border: 1px solid var(--af-line); border-radius: 22px; background: rgba(29,35,44,.82); box-shadow: 0 18px 46px rgba(0,0,0,.18); display: grid; gap: 14px; }
    .af-package h3 { margin: 0; font-family: Sora, sans-serif; font-size: 1.35rem; }
    .af-package-price { font-family: Rajdhani, sans-serif; font-size: 2.35rem; color: var(--af-orange); line-height: 1; }

    .af-diagnostic-card { padding: 20px; border: 1px solid var(--af-line); border-radius: 20px; background: rgba(29,35,44,.78); }
    .af-diagnostic-card i { width: 48px; height: 48px; display: grid; place-items: center; border-radius: 14px; background: rgba(47,128,237,.13); color: var(--af-blue); font-size: 1.4rem; margin-bottom: 14px; }
    .af-process { display: grid; gap: 12px; margin-top: 28px; }
    .af-process-step { display: grid; grid-template-columns: 48px 1fr auto; gap: 14px; align-items: center; padding: 14px; border: 1px solid var(--af-line); border-radius: 18px; background: rgba(29,35,44,.78); }
    .af-process-num { width: 42px; height: 42px; display: grid; place-items: center; border-radius: 12px; background: var(--af-blue); font-weight: 900; }

    .af-status-board { display: grid; grid-template-columns: 340px 1fr; gap: 20px; align-items: start; }
    .af-status-card { padding: 22px; border: 1px solid rgba(245,185,66,.28); border-radius: 22px; background: linear-gradient(180deg, rgba(245,185,66,.12), rgba(29,35,44,.82)); }
    .af-status-current { display: inline-flex; align-items: center; gap: 9px; min-height: 38px; padding: 8px 12px; border-radius: 12px; background: rgba(245,185,66,.14); color: var(--af-yellow); font-weight: 900; }
    .af-timeline { display: grid; gap: 12px; }
    .af-timeline-step { position: relative; display: grid; grid-template-columns: 42px 1fr; gap: 14px; align-items: start; padding: 16px; border: 1px solid var(--af-line); border-radius: 18px; background: rgba(29,35,44,.78); }
    .af-timeline-dot { width: 42px; height: 42px; display: grid; place-items: center; border-radius: 50%; border: 1px solid var(--af-line2); background: rgba(244,247,250,.06); color: var(--af-muted); }
    .af-timeline-step.done .af-timeline-dot { background: rgba(46,204,113,.15); color: var(--af-green); border-color: rgba(46,204,113,.35); }
    .af-timeline-step.active .af-timeline-dot { background: rgba(245,185,66,.16); color: var(--af-yellow); border-color: rgba(245,185,66,.4); }
    .af-progress { height: 10px; border-radius: 999px; background: rgba(244,247,250,.08); overflow: hidden; margin-top: 18px; }
    .af-progress span { display: block; height: 100%; width: 34%; background: linear-gradient(90deg, var(--af-green), var(--af-yellow)); }

    .af-client-dashboard { display: grid; grid-template-columns: 1.1fr .9fr; gap: 18px; }
    .af-dashboard-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
    .af-dashboard-widget { padding: 18px; border: 1px solid var(--af-line); border-radius: 18px; background: rgba(29,35,44,.78); }
    .af-dashboard-widget i { color: var(--af-blue); }
    .af-table { width: 100%; border-collapse: collapse; }
    .af-table th, .af-table td { padding: 12px; border-bottom: 1px solid var(--af-line); text-align: left; color: var(--af-muted); }
    .af-table th { color: var(--af-text); font-size: .78rem; text-transform: uppercase; letter-spacing: .08em; }

    .af-mechanic { min-height: 430px; position: relative; border: 1px solid var(--af-line); border-radius: 24px; overflow: hidden; background: var(--af-card); box-shadow: 0 18px 46px rgba(0,0,0,.18); }
    .af-mechanic img { width: 100%; height: 100%; position: absolute; inset: 0; object-fit: cover; filter: grayscale(.15); }
    .af-mechanic::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 34%, rgba(14,17,22,.92)); }
    .af-mechanic-info { position: absolute; left: 16px; right: 16px; bottom: 16px; z-index: 1; }
    .af-mechanic-info h3 { margin: 0; font-family: Sora, sans-serif; }
    .af-mechanic-info p { color: var(--af-muted); line-height: 1.55; }

    .af-gallery-grid { display: grid; grid-template-columns: 1.2fr .8fr 1fr; grid-auto-rows: 220px; gap: 14px; }
    .af-gallery-item { position: relative; border: 1px solid var(--af-line); border-radius: 22px; overflow: hidden; background: var(--af-card); }
    .af-gallery-item:nth-child(1), .af-gallery-item:nth-child(5) { grid-row: span 2; }
    .af-gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform .35s ease; }
    .af-gallery-item:hover img { transform: scale(1.04); }
    .af-gallery-label { position: absolute; left: 12px; bottom: 12px; padding: 8px 10px; border-radius: 10px; background: rgba(14,17,22,.78); border: 1px solid var(--af-line); color: var(--af-text); font-weight: 900; }

    .af-contact-grid { display: grid; grid-template-columns: .9fr 1.1fr; gap: 20px; align-items: stretch; }
    .af-contact-list { display: grid; gap: 13px; margin: 0 0 18px; padding: 0; list-style: none; }
    .af-contact-list li { display: grid; grid-template-columns: 44px 1fr; gap: 12px; align-items: center; color: var(--af-muted); }
    .af-contact-list i { width: 44px; height: 44px; display: grid; place-items: center; border: 1px solid var(--af-line); border-radius: 12px; background: rgba(47,128,237,.12); color: var(--af-blue); }
    .af-map { min-height: 440px; border: 1px solid var(--af-line); border-radius: 24px; overflow: hidden; background: var(--af-card); }
    .af-map iframe { width: 100%; height: 100%; min-height: 440px; border: 0; filter: grayscale(.75) invert(.92) contrast(1.05); }

    .af-confirm { max-width: 860px; margin: 0 auto; padding: 34px; text-align: center; border: 1px solid rgba(46,204,113,.28); border-radius: 28px; background: rgba(29,35,44,.88); box-shadow: var(--af-shadow); }
    .af-confirm-icon { width: 74px; height: 74px; display: grid; place-items: center; margin: 0 auto 18px; border-radius: 20px; background: rgba(46,204,113,.14); color: var(--af-green); font-size: 2rem; }

    .af-toast { position: fixed; left: 50%; bottom: 24px; z-index: 150; min-width: min(380px, calc(100% - 28px)); padding: 14px 16px; border: 1px solid rgba(255,122,26,.34); border-radius: 14px; background: var(--af-card); color: var(--af-text); text-align: center; font-weight: 900; box-shadow: var(--af-shadow); opacity: 0; pointer-events: none; transform: translate(-50%, 18px); transition: opacity .18s ease, transform .18s ease; }
    .af-toast.show { opacity: 1; transform: translate(-50%, 0); }

    .af-mobile-cta { position: fixed; left: 12px; right: 12px; bottom: 12px; z-index: 68; display: none; align-items: center; justify-content: space-between; gap: 12px; padding: 12px; border: 1px solid rgba(255,122,26,.26); border-radius: 18px; background: rgba(29,35,44,.94); backdrop-filter: blur(14px); box-shadow: var(--af-shadow); }
    .af-mobile-cta span span { display: block; color: var(--af-muted); font-size: .8rem; }

    .af-footer { padding: 56px 0 98px; border-top: 1px solid var(--af-line); background: rgba(14,17,22,.82); }
    .af-footer-grid { display: grid; grid-template-columns: 1.2fr .8fr .8fr 1fr; gap: 24px; }
    .af-footer h3 { margin: 0 0 12px; font-family: Sora, sans-serif; font-size: 1rem; }
    .af-footer p, .af-footer a { color: var(--af-muted); line-height: 1.75; }
    .af-footer-links { display: grid; gap: 8px; }
    .af-socials { display: flex; gap: 10px; margin-top: 14px; }
    .af-socials a { width: 42px; height: 42px; display: grid; place-items: center; border: 1px solid var(--af-line); border-radius: 12px; background: rgba(244,247,250,.055); color: var(--af-blue); }

    .af-reveal { opacity: 0; transform: translateY(18px); transition: opacity .55s ease, transform .55s ease; }
    .af-reveal.visible { opacity: 1; transform: translateY(0); }

    @media (prefers-reduced-motion: reduce) { *, *::before, *::after { transition-duration: 1ms !important; animation-duration: 1ms !important; scroll-behavior: auto !important; } }

    @media (max-width: 1160px) {
      .af-links { position: fixed; top: 76px; left: 12px; right: 12px; display: none; flex-direction: column; align-items: stretch; padding: 12px; border: 1px solid var(--af-line); border-radius: 18px; background: rgba(29,35,44,.98); box-shadow: var(--af-shadow); }
      .af-links.open { display: flex; }
      .af-link { padding: 14px; }
      .af-menu { display: grid; place-items: center; }
      .af-hero-grid, .af-grid-2, .af-booking-layout, .af-status-board, .af-client-dashboard, .af-contact-grid { grid-template-columns: 1fr; }
      .af-summary { position: static; }
      .af-service-row { grid-template-columns: 54px 1fr 120px; }
      .af-service-time, .af-service-actions { grid-column: 2 / -1; justify-content: start; }
      .af-grid-4 { grid-template-columns: repeat(2, 1fr); }
      .af-footer-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 760px) {
      .af-wrap { width: min(var(--af-max), calc(100% - 22px)); }
      .af-section { padding: 58px 0; }
      .af-nav { min-height: 68px; }
      .af-links { top: 68px; }
      .af-brand span span, .af-actions .af-btn-soft { display: none; }
      .af-lang { width: 72px; }
      .af-hero { padding-top: 48px; }
      .af-actions-row { flex-direction: column; }
      .af-btn { width: 100%; }
      .af-quick-form, .af-metrics, .af-section-head, .af-grid-3, .af-grid-4, .af-form-grid, .af-choice-grid, .af-stepper, .af-meta-grid, .af-dashboard-grid, .af-footer-grid { grid-template-columns: 1fr; }
      .af-terminal-line { grid-template-columns: 1fr; }
      .af-service-row { grid-template-columns: 1fr; }
      .af-service-icon { width: 52px; height: 52px; }
      .af-service-time, .af-service-actions { grid-column: auto; }
      .af-image-panel img, .af-detail-photo img { min-height: auto; height: 360px; }
      .af-gallery-grid { grid-template-columns: 1fr; grid-auto-rows: 230px; }
      .af-gallery-item:nth-child(1), .af-gallery-item:nth-child(5) { grid-row: span 1; }
      .af-mobile-cta { display: flex; }
      .af-toast { bottom: 92px; }
    }
  </style>
</head>
<body>
  <header class="af-header">
    <nav class="af-wrap af-nav" aria-label="Principal">
      <a class="af-brand" href="<?= h(route_to('home', $lang)) ?>">
        <span class="af-logo"><i class="bi bi-tools" aria-hidden="true"></i></span>
        <span><strong><?= h($t['brand']) ?></strong><span><?= h($t['category']) ?></span></span>
      </a>

      <div class="af-links" data-menu-links>
        <a class="af-link <?= $page === 'home' ? 'active' : '' ?>" href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a>
        <a class="af-link <?= in_array($page, ['services','service'], true) ? 'active' : '' ?>" href="<?= h(route_to('services', $lang)) ?>"><?= h($t['nav_services']) ?></a>
        <a class="af-link <?= $page === 'quote' ? 'active' : '' ?>" href="<?= h(route_to('quote', $lang)) ?>"><?= h($t['nav_quote']) ?></a>
        <a class="af-link <?= $page === 'diagnostics' ? 'active' : '' ?>" href="<?= h(route_to('diagnostics', $lang)) ?>"><?= h($t['nav_diagnostics']) ?></a>
        <a class="af-link <?= $page === 'packages' ? 'active' : '' ?>" href="<?= h(route_to('packages', $lang)) ?>"><?= h($t['nav_packages']) ?></a>
        <a class="af-link <?= $page === 'vehicle-status' ? 'active' : '' ?>" href="<?= h(route_to('vehicle-status', $lang)) ?>"><?= h($t['nav_status']) ?></a>
        <a class="af-link <?= $page === 'client-area' ? 'active' : '' ?>" href="<?= h(route_to('client-area', $lang)) ?>"><?= h($t['nav_client']) ?></a>
        <a class="af-link <?= $page === 'contact' ? 'active' : '' ?>" href="<?= h(route_to('contact', $lang)) ?>"><?= h($t['nav_contact']) ?></a>
      </div>

      <div class="af-actions">
        <select class="af-lang" data-lang aria-label="Idioma">
          <option value="<?= h(lang_route('pt')) ?>" <?= $lang === 'pt' ? 'selected' : '' ?>>PT</option>
          <option value="<?= h(lang_route('es')) ?>" <?= $lang === 'es' ? 'selected' : '' ?>>ES</option>
          <option value="<?= h(lang_route('en')) ?>" <?= $lang === 'en' ? 'selected' : '' ?>>EN</option>
        </select>
        <a class="af-btn af-btn-soft af-btn-small" href="<?= h(route_to('booking', $lang)) ?>"><?= h($t['book_service']) ?></a>
        <button class="af-menu" type="button" data-menu-toggle aria-label="Menu"><i class="bi bi-list" aria-hidden="true"></i></button>
      </div>
    </nav>
  </header>

  <main>
    <?php if ($page === 'home'): ?>
      <section class="af-hero">
        <div class="af-wrap af-hero-grid">
          <div class="af-reveal">
            <div class="af-badges">
              <span class="af-badge"><i class="bi bi-cpu"></i><?= h($t['badge_diag']) ?></span>
              <span class="af-badge warn"><i class="bi bi-receipt"></i><?= h($t['badge_quote']) ?></span>
              <span class="af-badge ok"><i class="bi bi-shield-check"></i><?= h($t['badge_warranty']) ?></span>
              <span class="af-badge"><i class="bi bi-car-front"></i><?= h($t['badge_multi']) ?></span>
            </div>
            <span class="af-kicker">Garage Operations</span>
            <h1 class="af-title"><?= h($t['hero_title']) ?></h1>
            <p class="af-lead"><?= h($t['hero_text']) ?></p>
            <div class="af-actions-row">
              <a class="af-btn af-btn-main" href="<?= h(route_to('booking', $lang)) ?>"><i class="bi bi-calendar2-check"></i><?= h($t['book_service']) ?></a>
              <a class="af-btn af-btn-soft" href="<?= h(route_to('quote', $lang)) ?>"><i class="bi bi-file-earmark-text"></i><?= h($t['request_quote']) ?></a>
              <a class="af-btn af-btn-blue" href="<?= h(route_to('vehicle-status', $lang)) ?>"><i class="bi bi-activity"></i><?= h($t['track_vehicle']) ?></a>
            </div>
            <div class="af-metrics">
              <div class="af-metric"><strong>4.9</strong><span>rating</span></div>
              <div class="af-metric"><strong>30m</strong><span>diag. rápido</span></div>
              <div class="af-metric"><strong>6m</strong><span>garantia</span></div>
              <div class="af-metric"><strong>12+</strong><span>serviços</span></div>
            </div>
          </div>

          <div class="af-command af-reveal">
            <div class="af-command-top"><strong><?= h($t['command_title']) ?></strong><span class="af-dots"><span class="af-dot"></span><span class="af-dot"></span><span class="af-dot"></span></span></div>
            <div class="af-command-body">
              <div class="af-terminal-line"><span>STATUS</span><strong><?= h($t['badge_diag']) ?> online</strong></div>
              <div class="af-terminal-line"><span>SLOT</span><strong>Hoje · 15:30 disponível</strong></div>
              <div class="af-terminal-line"><span>TECH</span><strong>Carlos Mendes · Motor/OBD</strong></div>
              <form class="af-quick-form" data-quick-form>
                <div class="af-field"><label><?= h($t['plate']) ?></label><input class="af-input" placeholder="AA-00-BB" required></div>
                <div class="af-field"><label><?= h($t['priority']) ?></label><select class="af-select"><option><?= h($t['normal']) ?></option><option><?= h($t['urgent']) ?></option></select></div>
                <button class="af-btn af-btn-main af-full" type="submit"><?= h($t['open_ticket']) ?></button>
              </form>
            </div>
          </div>
        </div>
      </section>

      <section class="af-section af-wrap af-reveal">
        <div class="af-section-head">
          <div><span class="af-kicker">Services</span><h2 class="af-title"><?= h($t['services_title']) ?></h2><p class="af-lead"><?= h($t['services_text']) ?></p></div>
          <a class="af-btn af-btn-soft" href="<?= h(route_to('services', $lang)) ?>"><?= h($t['view_services']) ?></a>
        </div>
        <div class="af-service-matrix">
          <?php foreach (array_slice($services, 0, 6) as $srv): ?>
            <article class="af-service-row">
              <div class="af-service-icon"><i class="bi <?= h($categories[$srv['category']]['icon'] ?? 'bi-tools') ?>"></i></div>
              <div><h3><?= h(service_name($srv, $lang)) ?></h3><p><?= h(service_short($srv, $lang)) ?></p></div>
              <div class="af-service-price"><span><?= h($t['from']) ?></span><strong><?= h(eur($srv['price'])) ?></strong></div>
              <div class="af-service-time"><span><?= h($t['avg_time']) ?></span><strong><?= h($srv['time']) ?></strong></div>
              <div class="af-service-actions"><a class="af-btn af-btn-main af-btn-small" href="<?= h(route_to('booking', $lang, ['service' => $srv['slug']])) ?>"><?= h($t['book_service']) ?></a><a class="af-btn af-btn-soft af-btn-small" href="<?= h(route_to('service', $lang, ['slug' => $srv['slug']])) ?>"><?= h($t['details']) ?></a></div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="af-section af-wrap af-reveal">
        <div class="af-grid-2">
          <div class="af-panel af-image-panel"><img src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?auto=format&fit=crop&w=1400&q=84" alt="Oficina AutoForce"></div>
          <div class="af-panel">
            <span class="af-kicker">Process</span>
            <h2 class="af-title" style="font-size:clamp(2rem,4vw,4rem);">Diagnóstico, orçamento e acompanhamento num fluxo claro.</h2>
            <p class="af-lead">Este template foi pensado como produto de oficina: não apenas apresentação, mas operação visível para o cliente.</p>
            <div class="af-process">
              <div class="af-process-step"><span class="af-process-num">01</span><div><strong>Entrada da viatura</strong><p class="af-muted">Dados do veículo e problema.</p></div><i class="bi bi-car-front"></i></div>
              <div class="af-process-step"><span class="af-process-num">02</span><div><strong>Diagnóstico técnico</strong><p class="af-muted">Scanner, sensores, testes e relatório.</p></div><i class="bi bi-cpu"></i></div>
              <div class="af-process-step"><span class="af-process-num">03</span><div><strong>Aprovação e reparação</strong><p class="af-muted">Orçamento transparente e status visível.</p></div><i class="bi bi-tools"></i></div>
            </div>
          </div>
        </div>
      </section>

      <section class="af-section af-wrap af-reveal">
        <div class="af-section-head"><div><span class="af-kicker">Packages</span><h2 class="af-title"><?= h($t['packages_title']) ?></h2><p class="af-lead"><?= h($t['packages_text']) ?></p></div><a class="af-btn af-btn-soft" href="<?= h(route_to('packages', $lang)) ?>"><?= h($t['nav_packages']) ?></a></div>
        <div class="af-grid-4">
          <?php foreach ($packages as $pkg): ?>
            <article class="af-package"><h3><?= h(local_value($pkg['name'], $lang)) ?></h3><div class="af-package-price"><?= h(eur($pkg['price'])) ?></div><span class="af-badge"><i class="bi bi-clock"></i><?= h($pkg['time']) ?></span><ul class="af-list"><?php foreach (array_slice($pkg['items'], 0, 4) as $it): ?><li><i class="bi bi-check2"></i><?= h($it) ?></li><?php endforeach; ?></ul><a class="af-btn af-btn-main af-btn-small" href="<?= h(route_to('booking', $lang)) ?>"><?= h($t['choose_package']) ?></a></article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="af-section af-wrap af-reveal">
        <div class="af-section-head"><div><span class="af-kicker">Tracking</span><h2 class="af-title"><?= h($t['status_title']) ?></h2><p class="af-lead"><?= h($t['status_text']) ?></p></div><a class="af-btn af-btn-blue" href="<?= h(route_to('vehicle-status', $lang)) ?>"><?= h($t['track_vehicle']) ?></a></div>
        <div class="af-status-board">
          <div class="af-status-card"><span class="af-status-current"><i class="bi bi-activity"></i><?= h(local_value($statusSteps[1]['label'], $lang)) ?></span><h3>BMW Série 3 · 2018</h3><p class="af-muted"><?= h($t['technician']) ?>: João Martins<br><?= h($t['eta']) ?>: Hoje 17:30</p><div class="af-progress"><span></span></div></div>
          <div class="af-timeline">
            <?php foreach ($statusSteps as $i => $st): ?>
              <div class="af-timeline-step <?= $st['done'] ? 'done' : ($i === 2 ? 'active' : '') ?>"><span class="af-timeline-dot"><i class="bi <?= $st['done'] ? 'bi-check2' : 'bi-circle' ?>"></i></span><div><strong><?= h(local_value($st['label'], $lang)) ?></strong><p class="af-muted">AutoForce workflow · #AF-2048</p></div></div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

    <?php elseif ($page === 'services'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= h($t['nav_services']) ?></span></div><span class="af-kicker">Service Matrix</span><h1 class="af-title"><?= h($t['services_title']) ?></h1><p class="af-lead"><?= h($t['services_text']) ?></p></section>
      <section class="af-section af-wrap" style="padding-top:22px;">
        <div class="af-category-rail af-reveal"><?php foreach ($categories as $key => $cat): ?><button class="af-tab <?= $key === 'all' ? 'active' : '' ?>" type="button" data-filter="<?= h($key) ?>"><i class="bi <?= h($cat['icon']) ?>"></i><?= h($cat['label']) ?></button><?php endforeach; ?></div>
        <div class="af-service-matrix" style="margin-top:18px;">
          <?php foreach ($services as $srv): ?>
            <article class="af-service-row af-reveal" data-service-row data-category="<?= h($srv['category']) ?>">
              <div class="af-service-icon"><i class="bi <?= h($categories[$srv['category']]['icon'] ?? 'bi-tools') ?>"></i></div>
              <div><span class="af-badge"><i class="bi bi-tag"></i><?= h($srv['badge']) ?></span><h3><?= h(service_name($srv, $lang)) ?></h3><p><?= h(service_short($srv, $lang)) ?></p></div>
              <div class="af-service-price"><span><?= h($t['from']) ?></span><strong><?= h(eur($srv['price'])) ?></strong></div>
              <div class="af-service-time"><span><?= h($t['avg_time']) ?></span><strong><?= h($srv['time']) ?></strong></div>
              <div class="af-service-actions"><a class="af-btn af-btn-main af-btn-small" href="<?= h(route_to('booking', $lang, ['service' => $srv['slug']])) ?>"><?= h($t['book_service']) ?></a><a class="af-btn af-btn-soft af-btn-small" href="<?= h(route_to('service', $lang, ['slug' => $srv['slug']])) ?>"><?= h($t['details']) ?></a></div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

    <?php elseif ($page === 'service'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><a href="<?= h(route_to('services', $lang)) ?>"><?= h($t['nav_services']) ?></a><i class="bi bi-chevron-right"></i><span><?= h(service_name($selectedService, $lang)) ?></span></div></section>
      <section class="af-section af-wrap" style="padding-top:0;">
        <div class="af-grid-2">
          <div class="af-detail-photo af-reveal"><img src="<?= h($selectedService['image']) ?>" alt="<?= h(service_name($selectedService, $lang)) ?>"></div>
          <div class="af-panel af-reveal">
            <span class="af-kicker"><?= h($t['details']) ?></span><h1 class="af-title" style="font-size:clamp(2rem,4vw,4.1rem);"><?= h(service_name($selectedService, $lang)) ?></h1><p class="af-lead"><?= h(service_long($selectedService, $lang)) ?></p>
            <div class="af-meta-grid"><div class="af-meta"><span><?= h($t['from']) ?></span><strong><?= h(eur($selectedService['price'])) ?></strong></div><div class="af-meta"><span><?= h($t['avg_time']) ?></span><strong><?= h($selectedService['time']) ?></strong></div><div class="af-meta"><span><?= h($t['warranty']) ?></span><strong><?= h($selectedService['warranty']) ?></strong></div></div>
            <h3><?= h($t['included']) ?></h3><ul class="af-list"><?php foreach ($selectedService['included'] as $it): ?><li><i class="bi bi-check2"></i><?= h($it) ?></li><?php endforeach; ?></ul>
            <h3><?= h($t['benefits']) ?></h3><ul class="af-list"><?php foreach ($selectedService['benefits'] as $it): ?><li><i class="bi bi-arrow-right-short"></i><?= h($it) ?></li><?php endforeach; ?></ul>
            <div class="af-actions-row"><a class="af-btn af-btn-main" href="<?= h(route_to('booking', $lang, ['service' => $selectedService['slug']])) ?>"><?= h($t['book_service']) ?></a><a class="af-btn af-btn-soft" href="<?= h(route_to('quote', $lang, ['service' => $selectedService['slug']])) ?>"><?= h($t['request_quote']) ?></a></div>
          </div>
        </div>
      </section>

    <?php elseif ($page === 'booking'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= h($t['nav_booking']) ?></span></div><span class="af-kicker">Booking Flow</span><h1 class="af-title"><?= h($t['booking_title']) ?></h1><p class="af-lead"><?= h($t['booking_text']) ?></p></section>
      <section class="af-section af-wrap" style="padding-top:22px;">
        <div class="af-booking-layout">
          <div class="af-panel af-reveal">
            <div class="af-stepper"><button class="af-step active" type="button" data-step-btn="0">1. <?= h($t['step_service']) ?></button><button class="af-step" type="button" data-step-btn="1">2. <?= h($t['step_vehicle']) ?></button><button class="af-step" type="button" data-step-btn="2">3. <?= h($t['step_datetime']) ?></button><button class="af-step" type="button" data-step-btn="3">4. <?= h($t['step_contact']) ?></button><button class="af-step" type="button" data-step-btn="4">5. <?= h($t['step_confirm']) ?></button></div>
            <form data-booking-form novalidate>
              <div class="af-booking-step active" data-step="0"><span class="af-kicker"><?= h($t['choose_service']) ?></span><div class="af-choice-grid"><?php foreach ($services as $srv): ?><label class="af-choice"><input type="radio" name="service" value="<?= h($srv['slug']) ?>" <?= $preService === $srv['slug'] ? 'checked' : '' ?> required><strong><?= h(service_name($srv, $lang)) ?></strong><span><?= h(eur($srv['price'])) ?> · <?= h($srv['time']) ?></span></label><?php endforeach; ?></div></div>
              <div class="af-booking-step" data-step="1"><span class="af-kicker"><?= h($t['step_vehicle']) ?></span><div class="af-form-grid"><div class="af-field"><label><?= h($t['brand_label']) ?></label><input class="af-input" name="brand" required></div><div class="af-field"><label><?= h($t['model_label']) ?></label><input class="af-input" name="model" required></div><div class="af-field"><label><?= h($t['year_label']) ?></label><input class="af-input" name="year" type="number" min="1980" max="<?= date('Y') + 1 ?>" required></div><div class="af-field"><label><?= h($t['plate_label']) ?></label><input class="af-input" name="plate" placeholder="AA-00-BB"></div><div class="af-field"><label><?= h($t['km_label']) ?></label><input class="af-input" name="km" type="number" required></div><div class="af-field"><label><?= h($t['fuel_label']) ?></label><select class="af-select" name="fuel" required><option>Gasolina</option><option>Diesel</option><option>Híbrido</option><option>Elétrico</option></select></div><div class="af-field af-full"><label><?= h($t['problem_label']) ?></label><textarea class="af-textarea" name="problem"></textarea></div></div></div>
              <div class="af-booking-step" data-step="2"><span class="af-kicker"><?= h($t['step_datetime']) ?></span><div class="af-form-grid"><div class="af-field af-full"><label><?= h($t['date_label']) ?></label><input class="af-input" type="date" name="date" min="<?= h(date('Y-m-d')) ?>" required></div><div class="af-field af-full"><label><?= h($t['time_label']) ?></label><div class="af-time-grid" data-time-grid></div><input type="hidden" name="time" data-time-input required></div></div></div>
              <div class="af-booking-step" data-step="3"><span class="af-kicker"><?= h($t['step_contact']) ?></span><div class="af-form-grid"><div class="af-field"><label><?= h($t['name_label']) ?></label><input class="af-input" name="name" required></div><div class="af-field"><label><?= h($t['phone_label']) ?></label><input class="af-input" name="phone" required></div><div class="af-field af-full"><label><?= h($t['email_label']) ?></label><input class="af-input" name="email" type="email" required></div><div class="af-field af-full"><label><?= h($t['notes_label']) ?></label><textarea class="af-textarea" name="notes"></textarea></div></div></div>
              <div class="af-booking-step" data-step="4"><span class="af-kicker"><?= h($t['step_confirm']) ?></span><div class="af-panel" style="background:rgba(46,204,113,.08);border-color:rgba(46,204,113,.24);"><h3><?= h($t['summary']) ?></h3><p class="af-muted">Revise o resumo lateral e confirme o pedido de agendamento.</p></div></div>
              <div class="af-actions-row"><button class="af-btn af-btn-soft" type="button" data-back><?= h($t['back']) ?></button><button class="af-btn af-btn-main" type="button" data-next><?= h($t['next']) ?></button></div>
            </form>
          </div>
          <aside class="af-panel af-summary af-reveal"><span class="af-kicker"><?= h($t['summary']) ?></span><div class="af-summary-lines"><div class="af-summary-line"><span><?= h($t['step_service']) ?></span><strong data-s-service>—</strong></div><div class="af-summary-line"><span><?= h($t['vehicle']) ?></span><strong data-s-vehicle>—</strong></div><div class="af-summary-line"><span><?= h($t['date_label']) ?></span><strong data-s-date>—</strong></div><div class="af-summary-line"><span><?= h($t['time_label']) ?></span><strong data-s-time>—</strong></div><div class="af-summary-line"><span><?= h($t['from']) ?></span><strong data-s-price>—</strong></div></div></aside>
        </div>
      </section>

    <?php elseif ($page === 'quote'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= h($t['nav_quote']) ?></span></div><span class="af-kicker">Quote Desk</span><h1 class="af-title"><?= h($t['quote_title']) ?></h1><p class="af-lead"><?= h($t['quote_text']) ?></p></section>
      <section class="af-section af-wrap" style="padding-top:22px;"><div class="af-grid-2"><div class="af-panel af-reveal"><form class="af-form-grid" data-quote-form novalidate><div class="af-field"><label><?= h($t['name_label']) ?></label><input class="af-input" required></div><div class="af-field"><label><?= h($t['phone_label']) ?></label><input class="af-input" required></div><div class="af-field"><label><?= h($t['email_label']) ?></label><input class="af-input" type="email" required></div><div class="af-field"><label><?= h($t['contact_preference']) ?></label><select class="af-select"><option>WhatsApp</option><option>Email</option><option>Telefone</option></select></div><div class="af-field"><label><?= h($t['brand_label']) ?></label><input class="af-input" required></div><div class="af-field"><label><?= h($t['model_label']) ?></label><input class="af-input" required></div><div class="af-field"><label><?= h($t['year_label']) ?></label><input class="af-input" type="number" required></div><div class="af-field"><label><?= h($t['km_label']) ?></label><input class="af-input" type="number" required></div><div class="af-field af-full"><label><?= h($t['choose_service']) ?></label><select class="af-select" required><?php foreach ($services as $srv): ?><option><?= h(service_name($srv, $lang)) ?></option><?php endforeach; ?></select></div><div class="af-field af-full"><label><?= h($t['problem_label']) ?></label><textarea class="af-textarea" required></textarea></div><div class="af-field af-full"><label><?= h($t['upload_photos']) ?></label><input class="af-input" type="file" multiple accept="image/*"></div><button class="af-btn af-btn-main af-full" type="submit"><?= h($t['send_quote']) ?></button></form></div><div class="af-panel af-image-panel af-reveal"><img src="https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&w=1400&q=84" alt="Orçamento técnico"></div></div></section>

    <?php elseif ($page === 'diagnostics'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= h($t['nav_diagnostics']) ?></span></div><span class="af-kicker">OBD + Technical Report</span><h1 class="af-title"><?= h($t['diagnostics_title']) ?></h1><p class="af-lead"><?= h($t['diagnostics_text']) ?></p></section>
      <section class="af-section af-wrap" style="padding-top:22px;"><div class="af-grid-3"><?php foreach ([['bi-cpu','Leitura de centralina','Códigos de erro, sensores e sistemas eletrónicos.'],['bi-exclamation-triangle','Luzes no painel','ABS, motor, airbag, bateria e avisos críticos.'],['bi-file-earmark-medical','Relatório técnico','Resumo claro para decisão e orçamento.']] as $d): ?><article class="af-diagnostic-card af-reveal"><i class="bi <?= h($d[0]) ?>"></i><h3><?= h($d[1]) ?></h3><p class="af-muted"><?= h($d[2]) ?></p></article><?php endforeach; ?></div><div class="af-actions-row af-reveal"><a class="af-btn af-btn-main" href="<?= h(route_to('booking', $lang, ['service' => 'diagnostico-eletronico'])) ?>"><?= h($t['book_service']) ?></a></div></section>

    <?php elseif ($page === 'packages'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= h($t['nav_packages']) ?></span></div><span class="af-kicker">Maintenance Plans</span><h1 class="af-title"><?= h($t['packages_title']) ?></h1><p class="af-lead"><?= h($t['packages_text']) ?></p></section>
      <section class="af-section af-wrap" style="padding-top:22px;"><div class="af-grid-4"><?php foreach ($packages as $pkg): ?><article class="af-package af-reveal"><h3><?= h(local_value($pkg['name'], $lang)) ?></h3><div class="af-package-price"><?= h(eur($pkg['price'])) ?></div><span class="af-badge"><i class="bi bi-clock"></i><?= h($pkg['time']) ?></span><p class="af-muted"><strong><?= h($t['ideal_for']) ?>:</strong> <?= h($pkg['ideal']) ?></p><ul class="af-list"><?php foreach ($pkg['items'] as $it): ?><li><i class="bi bi-check2"></i><?= h($it) ?></li><?php endforeach; ?></ul><a class="af-btn af-btn-main" href="<?= h(route_to('booking', $lang)) ?>"><?= h($t['choose_package']) ?></a></article><?php endforeach; ?></div></section>

    <?php elseif ($page === 'vehicle-status'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= h($t['nav_status']) ?></span></div><span class="af-kicker">Vehicle Tracking</span><h1 class="af-title"><?= h($t['status_title']) ?></h1><p class="af-lead"><?= h($t['status_text']) ?></p></section>
      <section class="af-section af-wrap" style="padding-top:22px;"><div class="af-status-board"><div class="af-status-card af-reveal"><span class="af-status-current"><i class="bi bi-search"></i><?= h(local_value($statusSteps[1]['label'], $lang)) ?></span><h2>BMW Série 3 · 2018</h2><p class="af-muted"><strong><?= h($t['reference']) ?>:</strong> AF-2048<br><strong><?= h($t['technician']) ?>:</strong> João Martins<br><strong><?= h($t['eta']) ?>:</strong> Hoje às 17:30</p><p><?= h($t['message']) ?>: Estamos a verificar o sistema de travagem e sensores ABS.</p><div class="af-progress"><span></span></div></div><div class="af-timeline af-reveal"><?php foreach ($statusSteps as $i => $st): ?><div class="af-timeline-step <?= $st['done'] ? 'done' : ($i === 2 ? 'active' : '') ?>"><span class="af-timeline-dot"><i class="bi <?= $st['done'] ? 'bi-check2' : 'bi-circle' ?>"></i></span><div><strong><?= h(local_value($st['label'], $lang)) ?></strong><p class="af-muted">AutoForce Garage · Workflow técnico</p></div></div><?php endforeach; ?></div></div></section>

    <?php elseif ($page === 'client-area'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= h($t['nav_client']) ?></span></div><span class="af-kicker">Client Portal</span><h1 class="af-title"><?= h($t['client_title']) ?></h1><p class="af-lead"><?= h($t['client_text']) ?></p></section>
      <section class="af-section af-wrap" style="padding-top:22px;"><div class="af-client-dashboard"><div class="af-panel af-reveal"><h2>BMW Série 3 · 2018</h2><div class="af-dashboard-grid"><div class="af-dashboard-widget"><i class="bi bi-activity"></i><h3><?= h($t['current_status']) ?></h3><p>Em diagnóstico</p></div><div class="af-dashboard-widget"><i class="bi bi-calendar-check"></i><h3><?= h($t['next_revision']) ?></h3><p>12.000 km / 2026</p></div><div class="af-dashboard-widget"><i class="bi bi-receipt"></i><h3><?= h($t['quotes']) ?></h3><p>2 pendentes</p></div><div class="af-dashboard-widget"><i class="bi bi-file-earmark-text"></i><h3><?= h($t['invoices']) ?></h3><p>4 documentos</p></div></div></div><div class="af-panel af-reveal"><h2><?= h($t['history']) ?></h2><table class="af-table"><tr><th>Data</th><th>Serviço</th><th>Total</th></tr><tr><td>2026-04-12</td><td>Óleo + filtros</td><td>€ 69</td></tr><tr><td>2026-02-03</td><td>Travões</td><td>€ 189</td></tr><tr><td>2025-11-21</td><td>Diagnóstico</td><td>€ 29</td></tr></table></div></div></section>

    <?php elseif ($page === 'team'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= h($t['nav_team']) ?></span></div><span class="af-kicker">Technicians</span><h1 class="af-title"><?= h($t['team_title']) ?></h1><p class="af-lead"><?= h($t['team_text']) ?></p></section>
      <section class="af-section af-wrap" style="padding-top:22px;"><div class="af-grid-4"><?php foreach ($mechanics as $m): ?><article class="af-mechanic af-reveal"><img src="<?= h($m['image']) ?>" alt="<?= h($m['name']) ?>"><div class="af-mechanic-info"><h3><?= h($m['name']) ?></h3><p><?= h(local_value($m['role'], $lang)) ?><br><?= h($m['spec']) ?></p><span class="af-badge"><i class="bi bi-award"></i><?= h($m['years']) ?> <?= h($t['experience']) ?></span><span class="af-badge"><i class="bi bi-patch-check"></i><?= h($m['cert']) ?></span></div></article><?php endforeach; ?></div></section>

    <?php elseif ($page === 'gallery'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= h($t['nav_gallery']) ?></span></div><span class="af-kicker">Workshop Gallery</span><h1 class="af-title"><?= h($t['gallery_title']) ?></h1><p class="af-lead"><?= h($t['gallery_text']) ?></p></section>
      <section class="af-section af-wrap" style="padding-top:22px;"><div class="af-gallery-grid"><?php foreach ($gallery as $g): ?><figure class="af-gallery-item af-reveal"><img src="<?= h($g['image']) ?>" alt="<?= h($g['label']) ?>" loading="lazy"><figcaption class="af-gallery-label"><?= h($g['label']) ?></figcaption></figure><?php endforeach; ?></div></section>

    <?php elseif ($page === 'about'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= h($t['nav_about']) ?></span></div><span class="af-kicker">Workshop Profile</span><h1 class="af-title"><?= h($t['about_title']) ?></h1><p class="af-lead"><?= h($t['about_text']) ?></p></section>
      <section class="af-section af-wrap" style="padding-top:22px;"><div class="af-grid-2"><div class="af-panel af-image-panel af-reveal"><img src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?auto=format&fit=crop&w=1400&q=84" alt="AutoForce Garage"></div><div class="af-panel af-reveal"><span class="af-kicker">AutoForce</span><h2 class="af-title" style="font-size:clamp(2rem,4vw,4rem);">Precisão técnica, transparência e acompanhamento real.</h2><p class="af-lead"><?= h($t['about_text']) ?></p><ul class="af-list"><li><i class="bi bi-check2"></i>Equipamentos de diagnóstico modernos.</li><li><i class="bi bi-check2"></i>Orçamentos explicados antes da reparação.</li><li><i class="bi bi-check2"></i>Estado da viatura acompanhado por etapas.</li><li><i class="bi bi-check2"></i>Equipa técnica especializada por área.</li></ul><a class="af-btn af-btn-main" href="<?= h(route_to('booking', $lang)) ?>"><?= h($t['book_service']) ?></a></div></div></section>

    <?php elseif ($page === 'contact'): ?>
      <section class="af-page-hero af-wrap af-reveal"><div class="af-breadcrumb"><a href="<?= h(route_to('home', $lang)) ?>"><?= h($t['nav_home']) ?></a><i class="bi bi-chevron-right"></i><span><?= h($t['nav_contact']) ?></span></div><span class="af-kicker">Contact Center</span><h1 class="af-title"><?= h($t['contact_title']) ?></h1><p class="af-lead"><?= h($t['contact_text']) ?></p></section>
      <section class="af-section af-wrap" style="padding-top:22px;"><div class="af-contact-grid"><div class="af-panel af-reveal"><ul class="af-contact-list"><li><i class="bi bi-geo-alt"></i><span><strong><?= h($t['address']) ?></strong><br>Rua das Oficinas, 123 — Vila Nova de Gaia</span></li><li><i class="bi bi-telephone"></i><span><strong><?= h($t['phone_label']) ?></strong><br>+351 220 000 000</span></li><li><i class="bi bi-whatsapp"></i><span><strong><?= h($t['whatsapp']) ?></strong><br>+351 912 345 678</span></li><li><i class="bi bi-clock"></i><span><strong><?= h($t['hours']) ?></strong><br>Seg–Sáb · 08:30–19:00</span></li></ul><form class="af-form-grid" data-contact-form novalidate><div class="af-field"><label><?= h($t['name_label']) ?></label><input class="af-input" required></div><div class="af-field"><label><?= h($t['email_label']) ?></label><input class="af-input" type="email" required></div><div class="af-field af-full"><label><?= h($t['message']) ?></label><textarea class="af-textarea" required></textarea></div><button class="af-btn af-btn-main af-full" type="submit"><?= h($t['send_message']) ?></button></form></div><div class="af-map af-reveal"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.845891425258!2d-8.655521423409764!3d41.12536031582254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246525c5f0c3f9%3A0x80c4963cbf7de769!2sR.%20da%20B%C3%A9lgica%202450%2C%204400-046%20Vila%20Nova%20de%20Gaia!5e0!3m2!1spt-PT!2spt!4v1719078822695!5m2!1spt-PT!2spt" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe></div></div></section>

    <?php elseif ($page === 'confirmation'): ?>
      <section class="af-section af-wrap"><div class="af-confirm af-reveal"><div class="af-confirm-icon"><i class="bi bi-check2"></i></div><span class="af-kicker" style="margin-inline:auto;"><?= h($t['confirmation_title']) ?></span><h1 class="af-title" style="font-size:clamp(2.2rem,4vw,4rem);"><?= h($t['confirmation_title']) ?></h1><p class="af-lead" style="margin-inline:auto;"><?= h($t['confirmation_text']) ?></p><div class="af-meta-grid" style="max-width:720px;margin-inline:auto;"><div class="af-meta"><span><?= h($t['reference']) ?></span><strong><?= h($_GET['ref'] ?? ('AF-' . date('Hi'))) ?></strong></div><div class="af-meta"><span><?= h($t['step_service']) ?></span><strong><?= h($_GET['service'] ?? 'AutoForce') ?></strong></div><div class="af-meta"><span><?= h($t['next_step']) ?></span><strong>Contacto técnico</strong></div></div><div class="af-actions-row" style="justify-content:center;"><a class="af-btn af-btn-main" href="<?= h(route_to('home', $lang)) ?>"><?= h($t['back_home']) ?></a><a class="af-btn af-btn-blue" href="<?= h(route_to('vehicle-status', $lang)) ?>"><?= h($t['track_vehicle']) ?></a></div></div></section>
    <?php endif; ?>
  </main>

  <footer class="af-footer">
    <div class="af-wrap af-footer-grid">
      <div><a class="af-brand" href="<?= h(route_to('home', $lang)) ?>"><span class="af-logo"><i class="bi bi-tools"></i></span><span><strong><?= h($t['brand']) ?></strong><span><?= h($t['category']) ?></span></span></a><p><?= h($t['footer_text']) ?></p><div class="af-socials"><a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a><a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a><a href="#" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a></div></div>
      <div><h3><?= h($t['nav_services']) ?></h3><div class="af-footer-links"><a href="<?= h(route_to('services', $lang)) ?>"><?= h($t['revision']) ?></a><a href="<?= h(route_to('diagnostics', $lang)) ?>"><?= h($t['nav_diagnostics']) ?></a><a href="<?= h(route_to('packages', $lang)) ?>"><?= h($t['nav_packages']) ?></a><a href="<?= h(route_to('quote', $lang)) ?>"><?= h($t['nav_quote']) ?></a></div></div>
      <div><h3>Portal</h3><div class="af-footer-links"><a href="<?= h(route_to('vehicle-status', $lang)) ?>"><?= h($t['nav_status']) ?></a><a href="<?= h(route_to('client-area', $lang)) ?>"><?= h($t['nav_client']) ?></a><a href="<?= h(route_to('team', $lang)) ?>"><?= h($t['nav_team']) ?></a><a href="<?= h(route_to('gallery', $lang)) ?>"><?= h($t['nav_gallery']) ?></a></div></div>
      <div><h3><?= h($t['nav_contact']) ?></h3><p>Rua das Oficinas, 123<br>Vila Nova de Gaia<br>+351 220 000 000</p><a class="af-btn af-btn-main af-btn-small" href="<?= h(route_to('booking', $lang)) ?>"><?= h($t['book_service']) ?></a><p><?= h($t['built_by']) ?></p></div>
    </div>
  </footer>

  <div class="af-mobile-cta"><span><strong><?= h($t['brand']) ?></strong><span><?= h($t['category']) ?></span></span><a class="af-btn af-btn-main af-btn-small" href="<?= h(route_to('booking', $lang)) ?>"><?= h($t['book_service']) ?></a></div>
  <div class="af-toast" data-toast role="status" aria-live="polite"></div>

  <script>
    window.AUTOFORCE = {
      lang: <?= json_encode($lang, JSON_UNESCAPED_UNICODE) ?>,
      text: <?= json_encode($t, JSON_UNESCAPED_UNICODE) ?>,
      services: <?= json_encode($services, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>,
      preService: <?= json_encode($preService, JSON_UNESCAPED_UNICODE) ?>,
      confirmationRoute: <?= json_encode(route_to('confirmation', $lang), JSON_UNESCAPED_SLASHES) ?>
    };
  </script>

  <script>
    (() => {
      'use strict';
      const app = window.AUTOFORCE;
      const t = app.text;
      const $ = (s, root = document) => root.querySelector(s);
      const $$ = (s, root = document) => Array.from(root.querySelectorAll(s));
      const toast = $('[data-toast]');
      const serviceBySlug = slug => app.services.find(s => s.slug === slug);
      const localName = obj => obj && (obj[app.lang] || obj.pt || obj.en || '');
      const money = new Intl.NumberFormat(app.lang === 'en' ? 'en-IE' : 'pt-PT', { style: 'currency', currency: 'EUR' });
      const state = { step: 0 };

      function showToast(msg) {
        if (!toast) return;
        toast.textContent = msg;
        toast.classList.add('show');
        clearTimeout(showToast.timer);
        showToast.timer = setTimeout(() => toast.classList.remove('show'), 2300);
      }

      const menu = $('[data-menu-links]');
      const menuToggle = $('[data-menu-toggle]');
      if (menuToggle) menuToggle.addEventListener('click', () => menu.classList.toggle('open'));
      $$('[data-menu-links] a').forEach(a => a.addEventListener('click', () => menu.classList.remove('open')));
      const lang = $('[data-lang]');
      if (lang) lang.addEventListener('change', e => window.location.href = e.target.value);

      $$('[data-filter]').forEach(btn => {
        btn.addEventListener('click', () => {
          const cat = btn.dataset.filter;
          $$('[data-filter]').forEach(b => b.classList.toggle('active', b === btn));
          $$('[data-service-row]').forEach(row => row.hidden = cat !== 'all' && row.dataset.category !== cat);
        });
      });

      function selectedService() {
        const input = $('input[name="service"]:checked');
        return input ? input.value : '';
      }
      function selectedServiceData() { return serviceBySlug(selectedService()); }
      function renderTimes() {
        const grid = $('[data-time-grid]');
        const input = $('[data-time-input]');
        if (!grid || !input) return;
        const service = selectedService();
        const times = {
          'diagnostico-eletronico': ['09:00', '10:30', '14:00', '16:30'],
          'revisao-completa': ['08:30', '11:30', '15:00'],
          'mudanca-oleo-filtros': ['09:30', '12:00', '14:30', '17:30'],
          'travagem-segura': ['09:00', '13:30', '16:00'],
          'pneus-alinhamento': ['10:00', '12:30', '15:30'],
          default: ['09:00', '11:00', '14:00', '16:00']
        };
        grid.innerHTML = (times[service] || times.default).map(time => `<button class="af-time" type="button" data-time="${time}">${time}</button>`).join('');
        input.value = '';
      }
      function updateSummary() {
        const service = selectedServiceData();
        const form = $('[data-booking-form]');
        const get = name => form ? (form.elements[name]?.value || '') : '';
        const set = (sel, value) => { const node = $(sel); if (node) node.textContent = value || '—'; };
        set('[data-s-service]', service ? localName(service.name) : '—');
        set('[data-s-vehicle]', [get('brand'), get('model')].filter(Boolean).join(' ') || '—');
        set('[data-s-date]', get('date') || '—');
        set('[data-s-time]', get('time') || '—');
        set('[data-s-price]', service ? money.format(Number(service.price)) : '—');
      }
      function setStep(n) {
        state.step = Math.max(0, Math.min(4, n));
        $$('[data-step-btn]').forEach(btn => btn.classList.toggle('active', Number(btn.dataset.stepBtn) === state.step));
        $$('[data-step]').forEach(step => step.classList.toggle('active', Number(step.dataset.step) === state.step));
        const back = $('[data-back]');
        const next = $('[data-next]');
        if (back) back.style.visibility = state.step === 0 ? 'hidden' : 'visible';
        if (next) next.textContent = state.step === 4 ? t.confirm_booking : t.next;
        updateSummary();
      }
      function validateStep() {
        const form = $('[data-booking-form]');
        if (!form) return true;
        if (state.step === 0) return Boolean(selectedService());
        if (state.step === 1) return ['brand','model','year','km','fuel'].every(name => form.elements[name] && form.elements[name].checkValidity());
        if (state.step === 2) return Boolean(form.elements.date?.value && form.elements.time?.value);
        if (state.step === 3) return ['name','phone','email'].every(name => form.elements[name] && form.elements[name].checkValidity());
        return true;
      }
      function confirmBooking() {
        const service = selectedServiceData();
        const ref = 'AF-' + Math.floor(1000 + Math.random() * 9000);
        const url = app.confirmationRoute + '&ref=' + encodeURIComponent(ref) + '&service=' + encodeURIComponent(service ? localName(service.name) : 'AutoForce');
        window.location.href = url;
      }
      const bookingForm = $('[data-booking-form]');
      if (bookingForm) {
        $$('input[name="service"]').forEach(input => input.addEventListener('change', () => { renderTimes(); updateSummary(); }));
        bookingForm.addEventListener('input', updateSummary);
        document.addEventListener('click', e => {
          const time = e.target.closest('[data-time]');
          if (!time) return;
          $$('[data-time]').forEach(btn => btn.classList.toggle('active', btn === time));
          $('[data-time-input]').value = time.dataset.time;
          updateSummary();
        });
        $('[data-back]').addEventListener('click', () => setStep(state.step - 1));
        $('[data-next]').addEventListener('click', () => {
          if (state.step < 4) {
            if (!validateStep()) { showToast(t.required); return; }
            setStep(state.step + 1);
          } else confirmBooking();
        });
        $$('[data-step-btn]').forEach(btn => btn.addEventListener('click', () => {
          const target = Number(btn.dataset.stepBtn);
          if (target > state.step && !validateStep()) { showToast(t.required); return; }
          setStep(target);
        }));
        renderTimes();
        setStep(0);
      }

      const quote = $('[data-quote-form]');
      if (quote) quote.addEventListener('submit', e => { e.preventDefault(); if (!quote.checkValidity()) { showToast(t.required); return; } showToast(t.quote_sent); quote.reset(); });
      const contact = $('[data-contact-form]');
      if (contact) contact.addEventListener('submit', e => { e.preventDefault(); if (!contact.checkValidity()) { showToast(t.required); return; } showToast(t.message_sent); contact.reset(); });
      const quick = $('[data-quick-form]');
      if (quick) quick.addEventListener('submit', e => { e.preventDefault(); window.location.href = <?= json_encode(route_to('booking', $lang), JSON_UNESCAPED_SLASHES) ?>; });

      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        });
      }, { threshold: .12 });
      $$('.af-reveal').forEach(el => observer.observe(el));
    })();
  </script>
</body>
</html>
