<?php
// index.php — DemoFirst Template: Barbearia Premium Multilingue + Admin Demo
// One file, pronto para Hostinger. Sem banco de dados, sem build, sem Bootstrap JS.
// Troque os dados em $brand e substitua as imagens externas por imagens locais quando quiser fechar a versão final do cliente.

$brand = [
  'name' => 'Barbearia Artesanal',
  'short' => 'BA',
  'phone' => '+351 912 345 678',
  'whatsapp' => '351912345678',
  'email' => 'contato@barbearia.pt',
  'address' => 'Rua da Bélgica 2450, Canidelo — Vila Nova de Gaia',
  'hours' => 'Segunda a Sábado · 09:00 — 19:00',
  'instagram' => 'https://www.instagram.com/barbeariaartesanal',
  'facebook' => 'https://www.facebook.com/barbeariaartesanal',
  'maps' => 'https://www.google.com/maps/search/?api=1&query=Rua%20da%20B%C3%A9lgica%202450%2C%20Canidelo%2C%20Vila%20Nova%20de%20Gaia',
  'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.050739127303!2d-8.65826518458168!3d41.123617279288004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2464f9619e3001%3A0x8b5a659b8beef41a!2sR.%20da%20B%C3%A9lgica%202450%2C%204405-034%20Vila%20Nova%20de%20Gaia!5e0!3m2!1spt-PT!2spt!4v1719012345678',
  'hero_image' => 'https://images.unsplash.com/photo-1585747860715-2ba37e788b70?auto=format&fit=crop&w=1600&q=88',
  'about_image' => 'https://images.unsplash.com/photo-1512690459411-b9245aed614b?auto=format&fit=crop&w=1200&q=88',
  'og_image' => 'https://images.unsplash.com/photo-1621605815971-fbc98d665033?auto=format&fit=crop&w=1200&q=85',
  'booking_image' => 'https://images.unsplash.com/photo-1621605815971-fbc98d665033?auto=format&fit=crop&w=1600&q=88',
];

$copy = [
  'pt' => [
    'locale' => 'pt-PT',
    'label' => 'PT',
    'meta_title' => 'Barbearia Masculina Premium em Vila Nova de Gaia',
    'meta_description' => 'Cortes modernos, barba alinhada, atendimento com hora marcada e experiência premium numa barbearia masculina em Vila Nova de Gaia.',
    'nav' => ['Início', 'Serviços', 'Galeria', 'Preços', 'Sobre', 'Contacto'],
    'book' => 'Marcar horário',
    'admin_demo' => 'Painel demo',
    'back_site' => 'Voltar ao site',
    'hero_kicker' => 'Barbearia masculina premium',
    'hero_title' => 'Corte preciso. Barba alinhada. Presença de homem.',
    'hero_text' => 'Um espaço escuro, limpo e confortável para homens que valorizam imagem, pontualidade e atendimento com detalhe.',
    'hero_primary' => 'Marcar pelo WhatsApp',
    'hero_secondary' => 'Ver serviços',
    'stats' => [
      ['+500', 'clientes atendidos'],
      ['4.9', 'avaliação média'],
      ['0', 'fila com hora marcada'],
    ],
    'trust_strip' => ['Higiene visível', 'Navalha esterilizada', 'Atendimento pontual', 'Finalização premium'],
    'experience_kicker' => 'A experiência',
    'experience_title' => 'Não é só cortar. É sair pronto.',
    'experience_text' => 'O ritual foi desenhado para ser rápido, confortável e memorável: chegada sem espera, conversa de estilo, execução limpa e acabamento que se nota ao espelho.',
    'experience_steps' => [
      ['01', 'Chegada sem espera', 'Horários organizados para respeitar o teu tempo.'],
      ['02', 'Consulta de estilo', 'Corte adaptado ao rosto, cabelo e rotina.'],
      ['03', 'Execução precisa', 'Tesoura, máquina, navalha e acabamento limpo.'],
      ['04', 'Finalização premium', 'Produto, perfume, barba alinhada e confiança.'],
    ],
    'services_kicker' => 'Serviços',
    'services_title' => 'O essencial, feito com detalhe.',
    'services_text' => 'Escolhe o serviço, confirma o horário e chega sem complicação.',
    'services' => [
      ['01', 'Corte Masculino', 'Degradê, clássico, social ou moderno. Corte limpo, alinhado ao teu rosto e finalizado com produto profissional.', 'Desde 15€', '30 min', 'bi-scissors'],
      ['02', 'Barba Completa', 'Aparar, desenhar e finalizar com toalha quente, balm e contorno de navalha.', 'Desde 10€', '25 min', 'bi-droplet-half'],
      ['03', 'Corte + Barba', 'Pacote completo para cabelo, barba, contorno e presença sem falhas.', 'Desde 22€', '50 min', 'bi-stars'],
      ['04', 'Degradê Navalhado', 'Fade preciso, transição limpa e acabamento rente para quem quer detalhe real.', 'Desde 18€', '35 min', 'bi-lightning-charge'],
      ['05', 'Limpeza Facial Masculina', 'Higienização profunda, pele fresca e acabamento cuidado para o dia a dia.', 'Desde 20€', '30 min', 'bi-flower2'],
    ],
    'choose' => 'Escolher',
    'barbers_kicker' => 'Bancada',
    'barbers_title' => 'Escolhe o teu barbeiro.',
    'barbers_text' => 'Cada profissional tem uma especialidade clara. O cliente escolhe pelo estilo, não por sorte.',
    'barbers' => [
      ['João', 'Fade limpo & clássico', 'Especialista em degradês suaves, corte social e acabamento polido.', 'https://images.unsplash.com/photo-1618077360395-f3068be8e001?auto=format&fit=crop&w=650&q=88'],
      ['Carlos', 'Barba & navalha', 'Barba desenhada, toalha quente, contorno forte e finalização premium.', 'https://images.unsplash.com/photo-1582893561942-d61adcb2e534?auto=format&fit=crop&w=650&q=88'],
      ['Manoel', 'Executivo & eventos', 'Cortes alinhados para trabalho, cerimónias e visual mais sofisticado.', 'https://images.unsplash.com/photo-1622902046580-2b47f47f5471?auto=format&fit=crop&w=650&q=88'],
    ],
    'gallery_kicker' => 'Galeria',
    'gallery_title' => 'O resultado tem que falar antes do cliente perguntar.',
    'gallery_text' => 'Cortes, barba, ambiente e detalhes de loja para criar confiança logo nos primeiros segundos.',
    'gallery' => [
      ['https://images.unsplash.com/photo-1621605815971-fbc98d665033?auto=format&fit=crop&w=1300&q=88', 'Cadeira de barbeiro premium', 'Ambiente', 'wide'],
      ['https://images.unsplash.com/photo-1599351431202-1e0f0137899a?auto=format&fit=crop&w=900&q=88', 'Corte masculino degradê', 'Fade', ''],
      ['https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&w=900&q=88', 'Barba alinhada', 'Barba', ''],
      ['https://images.unsplash.com/photo-1622287162716-f311baa1a2b8?auto=format&fit=crop&w=900&q=88', 'Detalhe de navalha', 'Navalha', ''],
      ['https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?auto=format&fit=crop&w=1300&q=88', 'Ambiente de barbearia', 'Loja', 'wide'],
    ],
    'prices_kicker' => 'Preços',
    'prices_title' => 'Preço claro. Serviço sem surpresa.',
    'prices_text' => 'O cliente vê rápido, decide rápido e marca rápido.',
    'prices' => [
      ['Corte Masculino', '15€'],
      ['Barba', '10€'],
      ['Corte + Barba', '22€'],
      ['Degradê Navalhado', '18€'],
      ['Sobrancelha', '5€'],
      ['Corte Infantil', '12€'],
      ['Limpeza Facial Masculina', '20€'],
      ['Pacote Mensal 4 cortes', '50€'],
    ],
    'plans_kicker' => 'Pacotes',
    'plans_title' => 'Mais valor para quem volta sempre.',
    'plans' => [
      ['Combo Premium', 'Corte + barba + toalha quente + finalização.', '25€', 'Mais pedido'],
      ['Plano Mensal', '4 cortes por mês e prioridade nos horários.', '50€', 'Fidelização'],
      ['Noivo / Evento', 'Preparação completa para cerimónias e fotos.', 'Sob consulta', 'Especial'],
    ],
    'about_kicker' => 'Sobre',
    'about_title' => 'Clássica na precisão. Moderna na experiência.',
    'about_text' => 'Na Barbearia Artesanal, cada corte é feito com atenção ao detalhe. Criamos um ambiente masculino, confortável e higienizado, onde cada cliente recebe atendimento personalizado e sai com visual renovado.',
    'about_points' => ['Ferramentas higienizadas', 'Produtos profissionais', 'Atendimento com hora marcada', 'Ambiente confortável'],
    'reviews_kicker' => 'Avaliações',
    'reviews_title' => 'A confiança vem de quem já sentou na cadeira.',
    'reviews' => [
      ['João Martins', 'Excelente atendimento e corte impecável. O horário foi cumprido e o acabamento ficou perfeito.'],
      ['Ricardo Silva', 'Ambiente top, barbeiro profissional e barba feita com detalhe. Recomendo sem dúvida.'],
      ['Miguel Costa', 'Fiz corte e barba. Resultado premium, sem pressa e com atenção ao pormenor.'],
    ],
    'faq_kicker' => 'Perguntas rápidas',
    'faq_title' => 'Tudo claro antes de marcar.',
    'faqs' => [
      ['Preciso marcar horário?', 'Sim. A marcação garante atendimento sem espera e melhor organização da agenda.'],
      ['Atendem sem marcação?', 'Sim, quando existe disponibilidade. Para garantir lugar, o ideal é marcar pelo WhatsApp.'],
      ['Aceitam MB Way?', 'Sim. O template pode mostrar MB Way, dinheiro, cartão ou outro método definido pela barbearia.'],
      ['Quanto tempo demora corte + barba?', 'Em média 50 minutos, dependendo do estilo e acabamento escolhido.'],
    ],
    'cta_title' => 'Pronto para renovar o teu visual?',
    'cta_text' => 'Marca agora e garante atendimento sem espera, com qualidade, pontualidade e atenção ao detalhe.',
    'contact_kicker' => 'Contacto',
    'contact_title' => 'Chega fácil. Marca mais fácil ainda.',
    'route' => 'Como chegar',
    'call' => 'Ligar agora',
    'whatsapp' => 'WhatsApp',
    'modal_title' => 'Marcar horário',
    'modal_text' => 'Escolhe o serviço, o horário e o barbeiro. A mensagem vai pronta para o WhatsApp.',
    'form_name' => 'Nome',
    'form_phone' => 'Telemóvel',
    'form_service' => 'Serviço',
    'form_barber' => 'Barbeiro',
    'form_date' => 'Data',
    'form_time' => 'Hora',
    'form_notes' => 'Observações',
    'form_send' => 'Enviar pelo WhatsApp',
    'form_close' => 'Fechar',
    'select' => 'Escolha...',
    'whatsapp_message' => 'Olá! Quero marcar horário na Barbearia Artesanal.',
    'admin' => [
      'title' => 'Painel Demo Barbearia',
      'subtitle' => 'Uma área visual para mostrar como o negócio poderia gerir marcações, serviços, equipa e leads.',
      'today' => 'Hoje',
      'appointments' => 'Marcações',
      'revenue' => 'Faturação estimada',
      'clients' => 'Clientes atendidos',
      'next' => 'Próximos horários',
      'agenda' => 'Agenda do dia',
      'services' => 'Serviços ativos',
      'leads' => 'Leads recebidos',
      'settings' => 'Configuração rápida',
      'gallery_queue' => 'Galeria em revisão',
      'status_confirmed' => 'Confirmado',
      'status_pending' => 'Pendente',
    ],
  ],
  'es' => [
    'locale' => 'es-ES',
    'label' => 'ES',
    'meta_title' => 'Barbería Masculina Premium en Vila Nova de Gaia',
    'meta_description' => 'Cortes modernos, barba perfilada, atención con cita previa y experiencia premium en una barbería masculina.',
    'nav' => ['Inicio', 'Servicios', 'Galería', 'Precios', 'Sobre', 'Contacto'],
    'book' => 'Reservar cita',
    'admin_demo' => 'Panel demo',
    'back_site' => 'Volver al sitio',
    'hero_kicker' => 'Barbería masculina premium',
    'hero_title' => 'Corte preciso. Barba perfilada. Presencia masculina.',
    'hero_text' => 'Un espacio oscuro, limpio y cómodo para hombres que valoran su imagen, la puntualidad y la atención al detalle.',
    'hero_primary' => 'Reservar por WhatsApp',
    'hero_secondary' => 'Ver servicios',
    'stats' => [['+500', 'clientes atendidos'], ['4.9', 'valoración media'], ['0', 'cola con cita previa']],
    'trust_strip' => ['Higiene visible', 'Navaja esterilizada', 'Atención puntual', 'Acabado premium'],
    'experience_kicker' => 'La experiencia',
    'experience_title' => 'No es solo cortar. Es salir preparado.',
    'experience_text' => 'El ritual está pensado para ser rápido, cómodo y memorable: llegada sin espera, asesoría de estilo, ejecución limpia y acabado visible.',
    'experience_steps' => [
      ['01', 'Llegada sin espera', 'Horarios organizados para respetar tu tiempo.'],
      ['02', 'Asesoría de estilo', 'Corte adaptado a tu rostro, cabello y rutina.'],
      ['03', 'Ejecución precisa', 'Tijera, máquina, navaja y acabado limpio.'],
      ['04', 'Acabado premium', 'Producto, perfume, barba perfilada y confianza.'],
    ],
    'services_kicker' => 'Servicios',
    'services_title' => 'Lo esencial, hecho con detalle.',
    'services_text' => 'Elige el servicio, confirma el horario y llega sin complicaciones.',
    'services' => [
      ['01', 'Corte Masculino', 'Fade, clásico, social o moderno. Corte limpio y finalizado con producto profesional.', 'Desde 15€', '30 min', 'bi-scissors'],
      ['02', 'Barba Completa', 'Recortar, perfilar y finalizar con toalla caliente, bálsamo y contorno de navaja.', 'Desde 10€', '25 min', 'bi-droplet-half'],
      ['03', 'Corte + Barba', 'Paquete completo para cabello, barba, contorno y presencia impecable.', 'Desde 22€', '50 min', 'bi-stars'],
      ['04', 'Fade con Navaja', 'Fade preciso, transición limpia y acabado apurado para máximo detalle.', 'Desde 18€', '35 min', 'bi-lightning-charge'],
      ['05', 'Limpieza Facial Masculina', 'Higiene profunda, piel fresca y acabado cuidado para el día a día.', 'Desde 20€', '30 min', 'bi-flower2'],
    ],
    'choose' => 'Elegir',
    'barbers_kicker' => 'Equipo',
    'barbers_title' => 'Elige tu barbero.',
    'barbers_text' => 'Cada profesional tiene una especialidad clara. El cliente elige por estilo, no por suerte.',
    'barbers' => [
      ['João', 'Fade limpio & clásico', 'Especialista en degradados suaves, corte social y acabado pulido.', 'https://images.unsplash.com/photo-1618077360395-f3068be8e001?auto=format&fit=crop&w=650&q=88'],
      ['Carlos', 'Barba & navaja', 'Barba perfilada, toalla caliente, contorno fuerte y acabado premium.', 'https://images.unsplash.com/photo-1582893561942-d61adcb2e534?auto=format&fit=crop&w=650&q=88'],
      ['Manoel', 'Ejecutivo & eventos', 'Cortes alineados para trabajo, ceremonias y un look sofisticado.', 'https://images.unsplash.com/photo-1622902046580-2b47f47f5471?auto=format&fit=crop&w=650&q=88'],
    ],
    'gallery_kicker' => 'Galería',
    'gallery_title' => 'El resultado debe hablar antes de que el cliente pregunte.',
    'gallery_text' => 'Cortes, barba, ambiente y detalles de tienda para crear confianza desde los primeros segundos.',
    'gallery' => [
      ['https://images.unsplash.com/photo-1621605815971-fbc98d665033?auto=format&fit=crop&w=1300&q=88', 'Silla de barbería premium', 'Ambiente', 'wide'],
      ['https://images.unsplash.com/photo-1599351431202-1e0f0137899a?auto=format&fit=crop&w=900&q=88', 'Corte masculino fade', 'Fade', ''],
      ['https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&w=900&q=88', 'Barba perfilada', 'Barba', ''],
      ['https://images.unsplash.com/photo-1622287162716-f311baa1a2b8?auto=format&fit=crop&w=900&q=88', 'Detalle de navaja', 'Navaja', ''],
      ['https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?auto=format&fit=crop&w=1300&q=88', 'Ambiente de barbería', 'Local', 'wide'],
    ],
    'prices_kicker' => 'Precios',
    'prices_title' => 'Precio claro. Servicio sin sorpresa.',
    'prices_text' => 'El cliente ve rápido, decide rápido y reserva rápido.',
    'prices' => [
      ['Corte Masculino', '15€'],
      ['Barba', '10€'],
      ['Corte + Barba', '22€'],
      ['Fade con Navaja', '18€'],
      ['Cejas', '5€'],
      ['Corte Infantil', '12€'],
      ['Limpieza Facial Masculina', '20€'],
      ['Pack Mensual 4 cortes', '50€'],
    ],
    'plans_kicker' => 'Packs',
    'plans_title' => 'Más valor para quien vuelve siempre.',
    'plans' => [
      ['Combo Premium', 'Corte + barba + toalla caliente + acabado.', '25€', 'Más pedido'],
      ['Plan Mensual', '4 cortes al mes y prioridad en horarios.', '50€', 'Fidelización'],
      ['Novio / Evento', 'Preparación completa para ceremonias y fotos.', 'A consultar', 'Especial'],
    ],
    'about_kicker' => 'Sobre',
    'about_title' => 'Clásica en precisión. Moderna en experiencia.',
    'about_text' => 'En Barbearia Artesanal, cada corte se realiza con atención al detalle. Creamos un ambiente masculino, cómodo e higienizado, donde cada cliente recibe una atención personalizada y sale con una imagen renovada.',
    'about_points' => ['Herramientas higienizadas', 'Productos profesionales', 'Atención con cita previa', 'Ambiente cómodo'],
    'reviews_kicker' => 'Reseñas',
    'reviews_title' => 'La confianza viene de quien ya se sentó en la silla.',
    'reviews' => [
      ['João Martins', 'Excelente atención y corte impecable. Cumplieron el horario y el acabado quedó perfecto.'],
      ['Ricardo Silva', 'Ambiente top, barbero profesional y barba hecha con detalle. Recomendado.'],
      ['Miguel Costa', 'Hice corte y barba. Resultado premium, sin prisas y con atención al detalle.'],
    ],
    'faq_kicker' => 'Preguntas rápidas',
    'faq_title' => 'Todo claro antes de reservar.',
    'faqs' => [
      ['¿Necesito cita?', 'Sí. La cita garantiza atención sin espera y mejor organización de agenda.'],
      ['¿Atienden sin cita?', 'Sí, cuando hay disponibilidad. Para asegurar lugar, lo ideal es reservar por WhatsApp.'],
      ['¿Aceptan MB Way?', 'Sí. El template puede mostrar MB Way, efectivo, tarjeta u otro método definido por la barbería.'],
      ['¿Cuánto dura corte + barba?', 'Alrededor de 50 minutos, según el estilo y acabado elegido.'],
    ],
    'cta_title' => '¿Listo para renovar tu imagen?',
    'cta_text' => 'Reserva ahora y garantiza atención sin espera, con calidad, puntualidad y detalle.',
    'contact_kicker' => 'Contacto',
    'contact_title' => 'Llega fácil. Reserva aún más fácil.',
    'route' => 'Cómo llegar',
    'call' => 'Llamar ahora',
    'whatsapp' => 'WhatsApp',
    'modal_title' => 'Reservar cita',
    'modal_text' => 'Elige el servicio, el horario y el barbero. El mensaje va listo para WhatsApp.',
    'form_name' => 'Nombre',
    'form_phone' => 'Móvil',
    'form_service' => 'Servicio',
    'form_barber' => 'Barbero',
    'form_date' => 'Fecha',
    'form_time' => 'Hora',
    'form_notes' => 'Notas',
    'form_send' => 'Enviar por WhatsApp',
    'form_close' => 'Cerrar',
    'select' => 'Elige...',
    'whatsapp_message' => '¡Hola! Quiero reservar cita en Barbearia Artesanal.',
    'admin' => [
      'title' => 'Panel Demo Barbería',
      'subtitle' => 'Un área visual para mostrar cómo el negocio podría gestionar citas, servicios, equipo y leads.',
      'today' => 'Hoy',
      'appointments' => 'Citas',
      'revenue' => 'Facturación estimada',
      'clients' => 'Clientes atendidos',
      'next' => 'Próximos horarios',
      'agenda' => 'Agenda del día',
      'services' => 'Servicios activos',
      'leads' => 'Leads recibidos',
      'settings' => 'Configuración rápida',
      'gallery_queue' => 'Galería en revisión',
      'status_confirmed' => 'Confirmado',
      'status_pending' => 'Pendiente',
    ],
  ],
  'en' => [
    'locale' => 'en-GB',
    'label' => 'EN',
    'meta_title' => 'Premium Men’s Barbershop in Vila Nova de Gaia',
    'meta_description' => 'Modern haircuts, sharp beard work, appointment-based service and a premium men’s barbershop experience.',
    'nav' => ['Home', 'Services', 'Gallery', 'Prices', 'About', 'Contact'],
    'book' => 'Book now',
    'admin_demo' => 'Admin demo',
    'back_site' => 'Back to site',
    'hero_kicker' => 'Premium men’s barbershop',
    'hero_title' => 'Sharp cut. Clean beard. Strong presence.',
    'hero_text' => 'A dark, clean and comfortable space for men who value image, punctuality and attention to detail.',
    'hero_primary' => 'Book on WhatsApp',
    'hero_secondary' => 'View services',
    'stats' => [['+500', 'clients served'], ['4.9', 'average rating'], ['0', 'queue with booking']],
    'trust_strip' => ['Visible hygiene', 'Sterilised razor', 'On-time service', 'Premium finish'],
    'experience_kicker' => 'The experience',
    'experience_title' => 'It is not just a cut. It is leaving ready.',
    'experience_text' => 'The ritual is designed to be fast, comfortable and memorable: no waiting, style consultation, clean execution and a finish you can see in the mirror.',
    'experience_steps' => [
      ['01', 'No-wait arrival', 'Appointments organised to respect your time.'],
      ['02', 'Style consultation', 'A cut adapted to your face, hair and routine.'],
      ['03', 'Precise execution', 'Scissors, clippers, razor and clean finishing.'],
      ['04', 'Premium finish', 'Product, fragrance, sharp beard and confidence.'],
    ],
    'services_kicker' => 'Services',
    'services_title' => 'The essentials, done with detail.',
    'services_text' => 'Choose the service, confirm the time and arrive with no hassle.',
    'services' => [
      ['01', 'Men’s Haircut', 'Fade, classic, business or modern. A clean cut matched to your face and finished with professional product.', 'From €15', '30 min', 'bi-scissors'],
      ['02', 'Full Beard', 'Trim, shape and finish with hot towel, balm and razor contour.', 'From €10', '25 min', 'bi-droplet-half'],
      ['03', 'Haircut + Beard', 'The full package for hair, beard, contour and a clean presence.', 'From €22', '50 min', 'bi-stars'],
      ['04', 'Razor Fade', 'Precise fade, clean transition and close finish for real detail.', 'From €18', '35 min', 'bi-lightning-charge'],
      ['05', 'Men’s Facial Cleanse', 'Deep cleansing, fresh skin and a cared-for finish for daily life.', 'From €20', '30 min', 'bi-flower2'],
    ],
    'choose' => 'Choose',
    'barbers_kicker' => 'The bench',
    'barbers_title' => 'Choose your barber.',
    'barbers_text' => 'Each professional has a clear speciality. Clients choose by style, not by luck.',
    'barbers' => [
      ['João', 'Clean fade & classic', 'Specialist in soft fades, business cuts and polished finishing.', 'https://images.unsplash.com/photo-1618077360395-f3068be8e001?auto=format&fit=crop&w=650&q=88'],
      ['Carlos', 'Beard & razor', 'Sharp beard work, hot towel, strong contour and premium finish.', 'https://images.unsplash.com/photo-1582893561942-d61adcb2e534?auto=format&fit=crop&w=650&q=88'],
      ['Manoel', 'Executive & events', 'Sharp cuts for work, ceremonies and a more sophisticated look.', 'https://images.unsplash.com/photo-1622902046580-2b47f47f5471?auto=format&fit=crop&w=650&q=88'],
    ],
    'gallery_kicker' => 'Gallery',
    'gallery_title' => 'The result must speak before the client asks.',
    'gallery_text' => 'Haircuts, beards, atmosphere and shop details to build trust in the first seconds.',
    'gallery' => [
      ['https://images.unsplash.com/photo-1621605815971-fbc98d665033?auto=format&fit=crop&w=1300&q=88', 'Premium barber chair', 'Atmosphere', 'wide'],
      ['https://images.unsplash.com/photo-1599351431202-1e0f0137899a?auto=format&fit=crop&w=900&q=88', 'Men’s fade haircut', 'Fade', ''],
      ['https://images.unsplash.com/photo-1503951914875-452162b0f3f1?auto=format&fit=crop&w=900&q=88', 'Sharp beard', 'Beard', ''],
      ['https://images.unsplash.com/photo-1622287162716-f311baa1a2b8?auto=format&fit=crop&w=900&q=88', 'Razor detail', 'Razor', ''],
      ['https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?auto=format&fit=crop&w=1300&q=88', 'Barbershop interior', 'Shop', 'wide'],
    ],
    'prices_kicker' => 'Prices',
    'prices_title' => 'Clear price. No-surprise service.',
    'prices_text' => 'The client sees fast, decides fast and books fast.',
    'prices' => [
      ['Men’s Haircut', '€15'],
      ['Beard', '€10'],
      ['Haircut + Beard', '€22'],
      ['Razor Fade', '€18'],
      ['Eyebrows', '€5'],
      ['Kids Cut', '€12'],
      ['Men’s Facial Cleanse', '€20'],
      ['Monthly Pack 4 cuts', '€50'],
    ],
    'plans_kicker' => 'Packages',
    'plans_title' => 'More value for men who come back.',
    'plans' => [
      ['Premium Combo', 'Haircut + beard + hot towel + finish.', '€25', 'Most booked'],
      ['Monthly Plan', '4 cuts per month and priority booking.', '€50', 'Retention'],
      ['Groom / Event', 'Complete preparation for ceremonies and photos.', 'On request', 'Special'],
    ],
    'about_kicker' => 'About',
    'about_title' => 'Classic in precision. Modern in experience.',
    'about_text' => 'At Barbearia Artesanal, every cut is done with attention to detail. We create a masculine, comfortable and sanitised space where every client receives personalised service and leaves with a renewed look.',
    'about_points' => ['Sanitised tools', 'Professional products', 'Appointment-based service', 'Comfortable atmosphere'],
    'reviews_kicker' => 'Reviews',
    'reviews_title' => 'Trust comes from the men who already sat in the chair.',
    'reviews' => [
      ['João Martins', 'Excellent service and flawless cut. The appointment was on time and the finish was perfect.'],
      ['Ricardo Silva', 'Great atmosphere, professional barber and detailed beard work. Strongly recommended.'],
      ['Miguel Costa', 'I booked hair and beard. Premium result, no rush and strong attention to detail.'],
    ],
    'faq_kicker' => 'Quick questions',
    'faq_title' => 'Everything clear before booking.',
    'faqs' => [
      ['Do I need an appointment?', 'Yes. Booking guarantees service without waiting and better schedule organisation.'],
      ['Do you accept walk-ins?', 'Yes, when there is availability. To secure a slot, booking on WhatsApp is best.'],
      ['Do you accept MB Way?', 'Yes. The template can show MB Way, cash, card or any method chosen by the barbershop.'],
      ['How long does haircut + beard take?', 'Around 50 minutes, depending on the chosen style and finish.'],
    ],
    'cta_title' => 'Ready to refresh your look?',
    'cta_text' => 'Book now and secure no-wait service with quality, punctuality and attention to detail.',
    'contact_kicker' => 'Contact',
    'contact_title' => 'Easy to reach. Even easier to book.',
    'route' => 'Get directions',
    'call' => 'Call now',
    'whatsapp' => 'WhatsApp',
    'modal_title' => 'Book appointment',
    'modal_text' => 'Choose the service, time and barber. The message goes ready to WhatsApp.',
    'form_name' => 'Name',
    'form_phone' => 'Mobile',
    'form_service' => 'Service',
    'form_barber' => 'Barber',
    'form_date' => 'Date',
    'form_time' => 'Time',
    'form_notes' => 'Notes',
    'form_send' => 'Send on WhatsApp',
    'form_close' => 'Close',
    'select' => 'Choose...',
    'whatsapp_message' => 'Hello! I want to book an appointment at Barbearia Artesanal.',
    'admin' => [
      'title' => 'Barbershop Admin Demo',
      'subtitle' => 'A visual area showing how the business could manage bookings, services, team and leads.',
      'today' => 'Today',
      'appointments' => 'Appointments',
      'revenue' => 'Estimated revenue',
      'clients' => 'Clients served',
      'next' => 'Next slots',
      'agenda' => 'Today’s agenda',
      'services' => 'Active services',
      'leads' => 'Received leads',
      'settings' => 'Quick settings',
      'gallery_queue' => 'Gallery review queue',
      'status_confirmed' => 'Confirmed',
      'status_pending' => 'Pending',
    ],
  ],
];

$supported = array_keys($copy);
$lang = isset($_GET['lang']) && in_array($_GET['lang'], $supported, true) ? $_GET['lang'] : 'pt';
$c = $copy[$lang];
$isAdmin = isset($_GET['demo']) && $_GET['demo'] === 'admin';

function e($value) {
  return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function url_for_lang($code, $anchor = '', $admin = false) {
  $params = ['lang' => $code];
  if ($admin) { $params['demo'] = 'admin'; }
  return '?' . http_build_query($params) . $anchor;
}

function section_head($kicker, $title, $text = '') {
  echo '<div class="section-head">';
  echo '<span class="kicker">' . e($kicker) . '</span>';
  echo '<h2>' . e($title) . '</h2>';
  if ($text !== '') { echo '<p>' . e($text) . '</p>'; }
  echo '</div>';
}

$defaultMessage = rawurlencode($c['whatsapp_message']);
$whatsappLink = 'https://wa.me/' . $brand['whatsapp'] . '?text=' . $defaultMessage;
$canonical = strtok($_SERVER['REQUEST_URI'] ?? '/', '?') ?: '/';

$adminAgenda = [
  ['09:00', 'Nuno Alves', $c['services'][0][1], 'João', $c['admin']['status_confirmed']],
  ['10:30', 'Pedro Lima', $c['services'][2][1], 'Carlos', $c['admin']['status_confirmed']],
  ['12:00', 'Rafael Costa', $c['services'][1][1], 'Carlos', $c['admin']['status_pending']],
  ['15:30', 'Tiago Rocha', $c['services'][3][1], 'Manoel', $c['admin']['status_confirmed']],
  ['18:00', 'Miguel Sousa', $c['services'][4][1], 'João', $c['admin']['status_pending']],
];

$adminLeads = [
  ['WhatsApp', 'Corte + Barba', 'há 8 min'],
  ['Instagram', 'Plano Mensal', 'há 24 min'],
  ['Website', 'Noivo / Evento', 'há 1 h'],
];
?>
<!DOCTYPE html>
<html lang="<?= e($c['locale']) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= e($c['meta_description']) ?>">
  <meta name="theme-color" content="#08090a">
  <meta property="og:title" content="<?= e($brand['name']) ?> · <?= e($c['meta_title']) ?>">
  <meta property="og:description" content="<?= e($c['meta_description']) ?>">
  <meta property="og:image" content="<?= e($brand['og_image']) ?>">
  <meta property="og:type" content="website">
  <title><?= e($brand['name']) ?> · <?= e($c['meta_title']) ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Inter:wght@400;500;600;700;800;900&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <script type="application/ld+json">
  <?= json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'HairSalon',
    'name' => $brand['name'],
    'image' => $brand['og_image'],
    'telephone' => $brand['phone'],
    'email' => $brand['email'],
    'address' => $brand['address'],
    'openingHours' => 'Mo-Sa 09:00-19:00',
    'priceRange' => '€€',
  ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
  </script>

  <style>
    :root {
      --ink: #050607;
      --charcoal: #0b0d10;
      --graphite: #12161a;
      --graphite-2: #171c22;
      --steel: #252b32;
      --line: rgba(255,255,255,.115);
      --line-soft: rgba(255,255,255,.075);
      --gold: #c89445;
      --gold-2: #f0ca85;
      --bronze: #8c4b2d;
      --red: #6f1d1f;
      --cream: #f4eee4;
      --muted: #aeb4bb;
      --dim: #747d87;
      --success: #57c084;
      --danger: #e36b6b;
      --max: 1180px;
      --radius: 28px;
      --shadow: 0 30px 90px rgba(0,0,0,.44);
      --font-head: 'Archivo Black', Impact, sans-serif;
      --font-condensed: 'Oswald', Arial, sans-serif;
      --font-body: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }

    body {
      margin: 0;
      color: var(--cream);
      background:
        radial-gradient(circle at 12% 6%, rgba(200,148,69,.16), transparent 29rem),
        radial-gradient(circle at 92% 28%, rgba(111,29,31,.20), transparent 34rem),
        linear-gradient(180deg, #050607 0%, #0a0c0f 48%, #070809 100%);
      font-family: var(--font-body);
      overflow-x: hidden;
    }

    body::before {
      content: '';
      position: fixed;
      inset: 0;
      z-index: -2;
      pointer-events: none;
      opacity: .22;
      background-image:
        linear-gradient(rgba(255,255,255,.045) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,.035) 1px, transparent 1px);
      background-size: 58px 58px;
      mask-image: linear-gradient(180deg, #000 0%, transparent 82%);
    }

    body::after {
      content: '';
      position: fixed;
      inset: 0;
      z-index: -1;
      pointer-events: none;
      opacity: .12;
      background: url('data:image/svg+xml,%3Csvg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="n"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23n)" opacity="0.45"/%3E%3C/svg%3E');
    }

    a { color: inherit; text-decoration: none; }
    button, input, select, textarea { font: inherit; }
    img { display: block; max-width: 100%; }
    ::selection { background: rgba(200,148,69,.36); }

    .wrap { width: min(var(--max), calc(100% - 40px)); margin-inline: auto; }
    .muted { color: var(--muted); }
    .gold { color: var(--gold-2); }

    .site-header {
      position: fixed;
      inset: 0 0 auto 0;
      height: 82px;
      z-index: 80;
      border-bottom: 1px solid rgba(255,255,255,.085);
      background: rgba(5,6,7,.74);
      backdrop-filter: blur(18px);
    }

    .nav-shell {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 26px;
    }

    .brand {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      min-width: max-content;
    }

    .brand-badge {
      width: 48px;
      height: 48px;
      border-radius: 17px;
      display: grid;
      place-items: center;
      color: var(--gold-2);
      font-family: var(--font-condensed);
      font-weight: 700;
      border: 1px solid rgba(200,148,69,.55);
      background: linear-gradient(145deg, rgba(255,255,255,.07), rgba(200,148,69,.10));
      box-shadow: inset 0 0 0 1px rgba(255,255,255,.04), 0 12px 36px rgba(0,0,0,.35);
    }

    .brand strong {
      display: block;
      line-height: 1;
      font-family: var(--font-condensed);
      text-transform: uppercase;
      letter-spacing: .08em;
      font-size: 1.02rem;
    }

    .brand small {
      display: block;
      color: var(--dim);
      font-size: .72rem;
      margin-top: 4px;
      letter-spacing: .08em;
      text-transform: uppercase;
    }

    .main-nav {
      display: flex;
      align-items: center;
      gap: 2px;
    }

    .main-nav a {
      padding: 10px 13px;
      border-radius: 999px;
      color: rgba(244,238,228,.80);
      font-weight: 700;
      font-size: .82rem;
      letter-spacing: .03em;
      transition: .2s ease;
    }

    .main-nav a:hover {
      color: #fff;
      background: rgba(255,255,255,.07);
    }

    .nav-actions {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .lang-switch {
      display: inline-flex;
      padding: 4px;
      gap: 3px;
      border: 1px solid var(--line);
      border-radius: 999px;
      background: rgba(255,255,255,.035);
    }

    .lang-switch a {
      padding: 7px 9px;
      border-radius: 999px;
      color: var(--muted);
      font-size: .74rem;
      font-weight: 800;
    }

    .lang-switch a.active {
      color: #120c04;
      background: var(--gold-2);
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 9px;
      border: 1px solid transparent;
      border-radius: 999px;
      min-height: 48px;
      padding: 0 19px;
      cursor: pointer;
      font-weight: 900;
      letter-spacing: .02em;
      transition: transform .18s ease, border-color .18s ease, background .18s ease, color .18s ease;
      user-select: none;
      white-space: nowrap;
    }

    .btn:hover { transform: translateY(-2px); }

    .btn-gold {
      background: linear-gradient(135deg, var(--gold-2), var(--gold));
      color: #140d04;
      box-shadow: 0 18px 44px rgba(200,148,69,.22);
    }

    .btn-dark {
      border-color: var(--line);
      color: var(--cream);
      background: rgba(255,255,255,.055);
    }

    .btn-dark:hover {
      border-color: rgba(200,148,69,.55);
      background: rgba(200,148,69,.08);
    }

    .menu-toggle {
      display: none;
      width: 46px;
      height: 46px;
      border-radius: 999px;
      border: 1px solid var(--line);
      background: rgba(255,255,255,.04);
      color: var(--cream);
    }

    .hero {
      min-height: 100svh;
      padding: 132px 0 70px;
      display: grid;
      align-items: center;
      position: relative;
    }

    .hero-grid {
      display: grid;
      grid-template-columns: minmax(0, 1.03fr) minmax(360px, .97fr);
      gap: 56px;
      align-items: center;
    }

    .kicker {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      color: var(--gold-2);
      font-family: var(--font-condensed);
      text-transform: uppercase;
      letter-spacing: .19em;
      font-size: .82rem;
      font-weight: 700;
    }

    .kicker::before {
      content: '';
      width: 34px;
      height: 1px;
      background: var(--gold);
    }

    .hero h1 {
      margin: 18px 0 20px;
      font-family: var(--font-head);
      font-size: clamp(2.55rem, 5.4vw, 5.25rem);
      line-height: .92;
      letter-spacing: -.045em;
      text-transform: uppercase;
      max-width: 760px;
    }

    .hero-copy {
      max-width: 650px;
      font-size: clamp(1.02rem, 1.6vw, 1.25rem);
      line-height: 1.72;
      color: var(--muted);
    }

    .hero-actions {
      display: flex;
      align-items: center;
      gap: 13px;
      flex-wrap: wrap;
      margin-top: 32px;
    }

    .hero-stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      margin-top: 46px;
      max-width: 670px;
    }

    .stat {
      min-height: 96px;
      border-top: 1px solid var(--line);
      border-bottom: 1px solid var(--line-soft);
      padding: 17px 0;
    }

    .stat strong {
      display: block;
      font-family: var(--font-condensed);
      font-size: clamp(1.65rem, 2.8vw, 2.35rem);
      line-height: 1;
      color: var(--gold-2);
    }

    .stat span {
      display: block;
      color: var(--dim);
      font-weight: 800;
      font-size: .8rem;
      text-transform: uppercase;
      letter-spacing: .07em;
      margin-top: 8px;
    }

    .hero-visual {
      position: relative;
      min-height: 670px;
    }

    .photo-slab {
      position: absolute;
      inset: 0 0 0 60px;
      border-radius: 42px;
      overflow: hidden;
      background: var(--graphite);
      border: 1px solid rgba(255,255,255,.12);
      box-shadow: var(--shadow);
    }

    .photo-slab img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: contrast(1.05) saturate(.88);
    }

    .photo-slab::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(0,0,0,.02), rgba(0,0,0,.72)), linear-gradient(90deg, rgba(0,0,0,.58), transparent 55%);
    }

    .vertical-stamp {
      position: absolute;
      left: 0;
      top: 70px;
      bottom: 70px;
      width: 120px;
      border-radius: 999px;
      display: grid;
      place-items: center;
      border: 1px solid rgba(200,148,69,.48);
      background: rgba(5,6,7,.82);
      box-shadow: 0 26px 60px rgba(0,0,0,.38);
    }

    .vertical-stamp span {
      writing-mode: vertical-rl;
      transform: rotate(180deg);
      font-family: var(--font-condensed);
      font-size: 1rem;
      letter-spacing: .24em;
      text-transform: uppercase;
      color: var(--gold-2);
    }

    .hero-note {
      position: absolute;
      right: 24px;
      bottom: 24px;
      width: min(370px, calc(100% - 48px));
      border: 1px solid var(--line);
      background: rgba(5,6,7,.74);
      backdrop-filter: blur(16px);
      border-radius: 28px;
      padding: 20px;
    }

    .hero-note b {
      display: block;
      font-family: var(--font-condensed);
      text-transform: uppercase;
      letter-spacing: .08em;
      margin-bottom: 8px;
    }

    .hero-note p {
      margin: 0;
      color: var(--muted);
      line-height: 1.55;
    }

    .trust-strip {
      border-block: 1px solid var(--line-soft);
      background: rgba(255,255,255,.025);
    }

    .trust-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
    }

    .trust-item {
      min-height: 82px;
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 20px;
      border-right: 1px solid var(--line-soft);
      color: var(--muted);
      font-weight: 800;
    }

    .trust-item:last-child { border-right: 0; }
    .trust-item i { color: var(--gold-2); font-size: 1.2rem; }

    section {
      padding: 110px 0;
      position: relative;
    }

    .section-head {
      display: grid;
      grid-template-columns: .7fr 1.3fr;
      gap: 36px;
      align-items: end;
      margin-bottom: 46px;
    }

    .section-head h2 {
      margin: 0;
      font-family: var(--font-head);
      font-size: clamp(1.9rem, 3.4vw, 3.7rem);
      line-height: .98;
      letter-spacing: -.045em;
      text-transform: uppercase;
      max-width: 820px;
    }

    .section-head p {
      margin: 16px 0 0;
      color: var(--muted);
      line-height: 1.7;
      max-width: 650px;
    }

    .experience-layout {
      display: grid;
      grid-template-columns: .85fr 1.15fr;
      gap: 36px;
      align-items: stretch;
    }

    .experience-copy {
      border-left: 1px solid rgba(200,148,69,.5);
      padding-left: 28px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      gap: 28px;
    }

    .experience-copy p {
      margin: 0;
      color: var(--muted);
      font-size: 1.06rem;
      line-height: 1.8;
    }

    .ritual { border-top: 1px solid var(--line); }

    .ritual-row {
      display: grid;
      grid-template-columns: 90px 1fr;
      gap: 24px;
      padding: 23px 0;
      border-bottom: 1px solid var(--line-soft);
    }

    .ritual-row strong {
      color: var(--gold-2);
      font-family: var(--font-condensed);
      font-size: 1.5rem;
    }

    .ritual-row h3 {
      margin: 0 0 6px;
      font-size: 1.06rem;
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    .ritual-row p {
      margin: 0;
      color: var(--muted);
      line-height: 1.55;
    }

    .service-board { border-top: 1px solid var(--line); }

    .service-row {
      display: grid;
      grid-template-columns: 80px minmax(0,1fr) 190px 148px;
      gap: 24px;
      align-items: center;
      padding: 26px 0;
      border-bottom: 1px solid var(--line-soft);
      transition: .2s ease;
    }

    .service-row:hover {
      padding-left: 14px;
      border-color: rgba(200,148,69,.42);
    }

    .service-no {
      font-family: var(--font-condensed);
      font-size: 2rem;
      color: rgba(240,202,133,.72);
    }

    .service-main {
      display: grid;
      grid-template-columns: 56px 1fr;
      gap: 18px;
      align-items: start;
    }

    .service-icon {
      width: 56px;
      height: 56px;
      border-radius: 19px;
      display: grid;
      place-items: center;
      color: var(--gold-2);
      background: rgba(200,148,69,.09);
      border: 1px solid rgba(200,148,69,.28);
      font-size: 1.35rem;
    }

    .service-main h3 {
      margin: 0 0 8px;
      font-size: clamp(1.12rem, 1.7vw, 1.55rem);
      font-family: var(--font-condensed);
      text-transform: uppercase;
      letter-spacing: .025em;
    }

    .service-main p {
      margin: 0;
      color: var(--muted);
      line-height: 1.62;
      max-width: 630px;
    }

    .service-meta {
      color: var(--muted);
      font-weight: 800;
      text-align: right;
    }

    .service-meta b {
      display: block;
      font-family: var(--font-condensed);
      font-size: 1.3rem;
      color: var(--gold-2);
      margin-bottom: 4px;
    }

    .small-btn {
      min-height: 42px;
      padding: 0 15px;
      font-size: .84rem;
    }

    .service-cta {
      margin-top: 34px;
      display: flex;
      justify-content: center;
    }

    .barber-strip {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
    }

    .barber-panel {
      position: relative;
      min-height: 470px;
      border-radius: 30px;
      overflow: hidden;
      border: 1px solid var(--line);
      background: var(--graphite);
    }

    .barber-panel img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: saturate(.78) contrast(1.05);
    }

    .barber-panel::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, transparent 25%, rgba(0,0,0,.82));
    }

    .barber-info {
      position: absolute;
      left: 22px;
      right: 22px;
      bottom: 22px;
      z-index: 2;
    }

    .barber-info strong {
      font-family: var(--font-head);
      font-size: clamp(1.65rem, 2.3vw, 2.15rem);
      letter-spacing: -.045em;
      line-height: .98;
    }

    .barber-info span {
      display: inline-flex;
      margin: 10px 0;
      color: var(--gold-2);
      font-family: var(--font-condensed);
      text-transform: uppercase;
      letter-spacing: .08em;
    }

    .barber-info p {
      margin: 0;
      color: rgba(244,238,228,.82);
      line-height: 1.5;
    }

    .barber-info .barber-open {
      margin-top: 14px;
      position: relative;
      z-index: 3;
    }

    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      grid-auto-rows: 210px;
      gap: 14px;
    }

    .gallery-item {
      position: relative;
      border-radius: 28px;
      overflow: hidden;
      border: 1px solid var(--line);
      cursor: zoom-in;
      background: var(--graphite);
      padding: 0;
    }

    .gallery-item.wide {
      grid-column: span 3;
      grid-row: span 2;
    }

    .gallery-item:not(.wide) { grid-column: span 3; }

    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: saturate(.82) contrast(1.08);
      transition: .5s ease;
    }

    .gallery-item:hover img { transform: scale(1.055); }

    .gallery-label {
      position: absolute;
      left: 16px;
      bottom: 16px;
      padding: 8px 12px;
      border-radius: 999px;
      background: rgba(5,6,7,.72);
      border: 1px solid var(--line);
      color: var(--gold-2);
      font-weight: 900;
      font-size: .78rem;
      text-transform: uppercase;
      letter-spacing: .08em;
    }

    .price-layout {
      display: grid;
      grid-template-columns: 1fr .72fr;
      gap: 26px;
      align-items: start;
    }

    .price-board {
      border: 1px solid rgba(200,148,69,.34);
      border-radius: 34px;
      padding: 34px;
      background: linear-gradient(145deg, rgba(255,255,255,.055), rgba(255,255,255,.018));
      box-shadow: var(--shadow);
    }

    .price-line {
      display: grid;
      grid-template-columns: auto 1fr auto;
      gap: 14px;
      align-items: end;
      padding: 16px 0;
      border-bottom: 1px dashed rgba(244,238,228,.22);
    }

    .price-line:first-child { padding-top: 0; }
    .price-line:last-child { border-bottom: 0; padding-bottom: 0; }
    .price-line span:first-child { font-weight: 900; font-size: 1.02rem; }
    .price-line span:nth-child(2) { border-bottom: 1px dotted rgba(244,238,228,.24); transform: translateY(-5px); }

    .price-line strong {
      color: var(--gold-2);
      font-family: var(--font-condensed);
      font-size: 1.35rem;
    }

    .plans {
      display: grid;
      gap: 12px;
    }

    .plan-ticket {
      padding: 22px;
      border-radius: 26px;
      border: 1px solid var(--line);
      background: rgba(255,255,255,.04);
      position: relative;
      overflow: hidden;
    }

    .plan-ticket::before {
      content: '';
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      width: 5px;
      background: var(--gold);
    }

    .plan-ticket small {
      color: var(--gold-2);
      text-transform: uppercase;
      font-weight: 900;
      letter-spacing: .09em;
    }

    .plan-ticket h3 {
      margin: 9px 0 8px;
      font-family: var(--font-condensed);
      text-transform: uppercase;
      font-size: 1.35rem;
    }

    .plan-ticket p {
      margin: 0 0 12px;
      color: var(--muted);
      line-height: 1.55;
    }

    .plan-ticket strong {
      font-size: 1.3rem;
      color: #fff;
    }

    .about-block {
      display: grid;
      grid-template-columns: .86fr 1.14fr;
      gap: 36px;
      align-items: center;
    }

    .about-photo {
      min-height: 560px;
      border-radius: 36px;
      overflow: hidden;
      border: 1px solid var(--line);
    }

    .about-photo img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: saturate(.82) contrast(1.08);
    }

    .about-copy {
      padding: 44px;
      border-radius: 36px;
      background: rgba(255,255,255,.035);
      border: 1px solid var(--line);
    }

    .about-copy h2,
    .cta-panel h2,
    .admin-hero h1,
    .modal-head h2 {
      font-size: clamp(1.95rem, 3.6vw, 3.75rem);
      line-height: .96;
      letter-spacing: -.045em;
    }

    .about-copy h2 {
      margin: 15px 0 18px;
      font-family: var(--font-head);
      text-transform: uppercase;
    }

    .about-copy p {
      color: var(--muted);
      line-height: 1.78;
      font-size: 1.04rem;
    }

    .about-points {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
      margin-top: 26px;
    }

    .about-point {
      display: flex;
      align-items: center;
      gap: 10px;
      min-height: 52px;
      padding: 12px;
      border-radius: 18px;
      background: rgba(5,6,7,.44);
      border: 1px solid var(--line-soft);
      color: rgba(244,238,228,.88);
      font-weight: 800;
    }

    .about-point i { color: var(--gold-2); }

    .reviews-band {
      border-block: 1px solid var(--line-soft);
      background: linear-gradient(90deg, rgba(200,148,69,.06), rgba(111,29,31,.08));
    }

    .reviews-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 14px;
    }

    .quote {
      border-left: 1px solid rgba(200,148,69,.45);
      padding: 0 0 0 22px;
    }

    .stars {
      color: var(--gold-2);
      letter-spacing: .08em;
      margin-bottom: 14px;
    }

    .quote p {
      margin: 0 0 18px;
      color: rgba(244,238,228,.88);
      line-height: 1.72;
      font-size: 1.02rem;
    }

    .quote strong {
      font-family: var(--font-condensed);
      text-transform: uppercase;
      letter-spacing: .07em;
      color: var(--gold-2);
    }

    .faq-list { border-top: 1px solid var(--line); }

    details {
      border-bottom: 1px solid var(--line-soft);
      padding: 0;
    }

    summary {
      list-style: none;
      cursor: pointer;
      padding: 22px 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 18px;
      font-weight: 900;
      font-size: 1.05rem;
    }

    summary::-webkit-details-marker { display: none; }
    summary i { color: var(--gold-2); transition: transform .2s ease; }
    details[open] summary i { transform: rotate(45deg); }

    details p {
      margin: 0;
      color: var(--muted);
      line-height: 1.7;
      padding: 0 0 22px;
      max-width: 820px;
    }

    .cta-panel {
      border-radius: 42px;
      padding: 64px;
      text-align: center;
      border: 1px solid rgba(200,148,69,.36);
      background:
        linear-gradient(rgba(5,6,7,.60), rgba(5,6,7,.84)),
        url('https://images.unsplash.com/photo-1622286342621-4bd786c2447c?auto=format&fit=crop&w=1600&q=88') center/cover;
      box-shadow: var(--shadow);
    }

    .cta-panel h2 {
      margin: 0 0 16px;
      font-family: var(--font-head);
      text-transform: uppercase;
    }

    .cta-panel p {
      margin: 0 auto 28px;
      max-width: 700px;
      color: rgba(244,238,228,.82);
      line-height: 1.65;
      font-size: 1.08rem;
    }

    .contact-layout {
      display: grid;
      grid-template-columns: .78fr 1.22fr;
      gap: 26px;
    }

    .contact-card {
      border: 1px solid var(--line);
      border-radius: 34px;
      padding: 30px;
      background: rgba(255,255,255,.035);
    }

    .contact-line {
      display: grid;
      grid-template-columns: 46px 1fr;
      gap: 14px;
      padding: 18px 0;
      border-bottom: 1px solid var(--line-soft);
    }

    .contact-line:last-child { border-bottom: 0; }

    .contact-line i {
      width: 46px;
      height: 46px;
      display: grid;
      place-items: center;
      border-radius: 16px;
      color: var(--gold-2);
      background: rgba(200,148,69,.09);
      border: 1px solid rgba(200,148,69,.22);
    }

    .contact-line b {
      display: block;
      margin-bottom: 4px;
    }

    .contact-line span,
    .contact-line a {
      color: var(--muted);
      line-height: 1.5;
    }

    .map-frame {
      overflow: hidden;
      min-height: 480px;
      border-radius: 34px;
      border: 1px solid var(--line);
      background: var(--graphite);
    }

    .map-frame iframe {
      width: 100%;
      height: 100%;
      min-height: 480px;
      border: 0;
      filter: grayscale(100%) contrast(1.12) brightness(.82);
    }

    .contact-actions {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-top: 24px;
    }

    .footer {
      padding: 44px 0 96px;
      border-top: 1px solid var(--line-soft);
      color: var(--muted);
    }

    .footer-grid {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 22px;
    }

    .socials {
      display: flex;
      gap: 10px;
    }

    .socials a {
      width: 42px;
      height: 42px;
      display: grid;
      place-items: center;
      border-radius: 999px;
      border: 1px solid var(--line);
      color: var(--gold-2);
      background: rgba(255,255,255,.035);
    }

    .mobile-book {
      display: none;
      position: fixed;
      z-index: 75;
      left: 14px;
      right: 14px;
      bottom: 14px;
    }

    .mobile-book .btn {
      width: 100%;
      box-shadow: 0 16px 44px rgba(0,0,0,.46);
    }

    .modal {
      position: fixed;
      inset: 0;
      z-index: 100;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 20px;
      background: rgba(0,0,0,.78);
      backdrop-filter: blur(14px);
    }

    .modal.open { display: flex; }

    .modal-panel {
      width: min(980px, 100%);
      max-height: min(860px, calc(100svh - 40px));
      overflow: auto;
      position: relative;
      isolation: isolate;
      border-radius: 34px;
      border: 1px solid rgba(200,148,69,.52);
      background:
        linear-gradient(135deg, rgba(5,6,7,.97) 0%, rgba(8,10,12,.82) 44%, rgba(5,6,7,.97) 100%),
        radial-gradient(circle at 78% 12%, rgba(240,202,133,.18), transparent 34%),
        url('<?= e($brand['booking_image']) ?>') center / cover no-repeat;
      box-shadow: var(--shadow), inset 0 0 0 1px rgba(255,255,255,.045);
    }

    .modal-panel::before {
      content: '';
      position: absolute;
      inset: 0;
      z-index: -1;
      pointer-events: none;
      background:
        linear-gradient(90deg, rgba(0,0,0,.48), rgba(0,0,0,.20) 44%, rgba(0,0,0,.58)),
        radial-gradient(circle at 50% 105%, rgba(200,148,69,.16), transparent 40%);
    }

    .modal-panel::after {
      content: '';
      position: absolute;
      inset: 0;
      z-index: -1;
      pointer-events: none;
      opacity: .13;
      background-image:
        linear-gradient(rgba(255,255,255,.06) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,.04) 1px, transparent 1px);
      background-size: 46px 46px;
    }

    .modal-head {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 22px;
      padding: 28px 28px 0;
    }

    .modal-head h2 {
      margin: 0 0 8px;
      font-family: var(--font-head);
      text-transform: uppercase;
    }

    .modal-head p {
      margin: 0;
      color: rgba(244,238,228,.76);
      line-height: 1.55;
      max-width: 560px;
    }

    .modal-close {
      width: 44px;
      height: 44px;
      border-radius: 999px;
      border: 1px solid var(--line);
      background: rgba(255,255,255,.06);
      color: var(--cream);
      cursor: pointer;
      flex: 0 0 auto;
    }

    .booking-form {
      padding: 28px;
    }

    .booking-grid {
      display: grid;
      grid-template-columns: 1.05fr .95fr;
      gap: 18px;
      align-items: start;
    }

    .booking-main {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 14px;
      padding: 18px;
      border-radius: 28px;
      border: 1px solid rgba(255,255,255,.095);
      background: rgba(5,6,7,.58);
      backdrop-filter: blur(10px);
    }

    .field {
      display: grid;
      gap: 8px;
    }

    .field.full { grid-column: 1 / -1; }

    .field label,
    .booking-side-title {
      color: var(--gold-2);
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: .08em;
      font-size: .76rem;
    }

    .field input,
    .field select,
    .field textarea {
      width: 100%;
      border: 1px solid rgba(255,255,255,.14);
      border-radius: 18px;
      min-height: 50px;
      padding: 0 14px;
      background: rgba(255,255,255,.065);
      color: var(--cream);
      outline: none;
    }

    .field textarea {
      padding-top: 14px;
      resize: vertical;
      min-height: 96px;
    }

    .field input:focus,
    .field select:focus,
    .field textarea:focus {
      border-color: rgba(200,148,69,.72);
      box-shadow: 0 0 0 4px rgba(200,148,69,.14);
    }

    select option { color: #111; }

    .booking-side {
      border: 1px solid rgba(200,148,69,.35);
      border-radius: 28px;
      padding: 18px;
      background:
        linear-gradient(180deg, rgba(200,148,69,.13), rgba(5,6,7,.60)),
        radial-gradient(circle at 30% 0%, rgba(240,202,133,.14), transparent 42%);
      backdrop-filter: blur(10px);
    }

    .barber-choices {
      display: grid;
      gap: 10px;
      margin-top: 12px;
    }

    .barber-radio,
    .time-radio {
      position: absolute;
      opacity: 0;
      pointer-events: none;
    }

    .barber-choice {
      display: grid;
      grid-template-columns: 68px 1fr 34px;
      gap: 12px;
      align-items: center;
      min-height: 88px;
      padding: 10px;
      border-radius: 22px;
      border: 1px solid rgba(255,255,255,.13);
      background: rgba(5,6,7,.62);
      cursor: pointer;
      transition: .2s ease;
    }

    .barber-choice:hover {
      transform: translateY(-1px);
      border-color: rgba(200,148,69,.52);
      background: rgba(200,148,69,.10);
    }

    .barber-choice img {
      width: 68px;
      height: 68px;
      object-fit: cover;
      border-radius: 18px;
      filter: saturate(.82) contrast(1.05);
    }

    .barber-choice strong {
      display: block;
      font-family: var(--font-condensed);
      font-size: 1.18rem;
      text-transform: uppercase;
      letter-spacing: .04em;
    }

    .barber-choice small {
      display: block;
      color: var(--muted);
      line-height: 1.35;
      margin-top: 3px;
    }

    .barber-choice i {
      width: 32px;
      height: 32px;
      display: grid;
      place-items: center;
      border-radius: 999px;
      border: 1px solid var(--line);
      color: var(--gold-2);
      opacity: .28;
    }

    .barber-radio:checked + .barber-choice {
      border-color: rgba(240,202,133,.92);
      background: linear-gradient(135deg, rgba(200,148,69,.23), rgba(255,255,255,.065));
      box-shadow: inset 0 0 0 1px rgba(240,202,133,.18), 0 18px 42px rgba(0,0,0,.22);
    }

    .barber-radio:checked + .barber-choice i {
      opacity: 1;
      background: var(--gold-2);
      color: #100b04;
      border-color: var(--gold-2);
    }

    .time-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 8px;
    }

    .time-chip {
      min-height: 46px;
      display: grid;
      place-items: center;
      border-radius: 16px;
      border: 1px solid rgba(255,255,255,.13);
      background: rgba(255,255,255,.055);
      color: var(--cream);
      cursor: pointer;
      font-weight: 900;
      transition: .18s ease;
    }

    .time-chip:hover {
      border-color: rgba(200,148,69,.62);
      background: rgba(200,148,69,.12);
    }

    .time-radio:checked + .time-chip {
      background: var(--gold-2);
      border-color: var(--gold-2);
      color: #130d05;
    }

    .booking-mini {
      margin-top: 14px;
      padding: 14px;
      border-radius: 20px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(5,6,7,.48);
      color: var(--muted);
      line-height: 1.55;
      font-size: .9rem;
    }

    .booking-mini b { color: var(--cream); }

    .form-actions {
      display: flex;
      gap: 10px;
      justify-content: flex-end;
      flex-wrap: wrap;
      padding-top: 18px;
    }

    .lightbox-img {
      width: min(1000px, 100%);
      max-height: 84svh;
      object-fit: contain;
      border-radius: 24px;
      border: 1px solid var(--line);
    }

    .admin-body {
      min-height: 100svh;
      padding: 106px 0 50px;
    }

    .admin-shell {
      display: grid;
      grid-template-columns: 250px 1fr;
      gap: 18px;
    }

    .admin-sidebar,
    .admin-panel {
      border: 1px solid var(--line);
      border-radius: 30px;
      background: rgba(255,255,255,.04);
      box-shadow: 0 18px 70px rgba(0,0,0,.23);
    }

    .admin-sidebar {
      padding: 18px;
      height: fit-content;
      position: sticky;
      top: 102px;
    }

    .admin-sidebar a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 13px 12px;
      border-radius: 16px;
      color: var(--muted);
      font-weight: 850;
    }

    .admin-sidebar a.active,
    .admin-sidebar a:hover {
      background: rgba(200,148,69,.12);
      color: var(--gold-2);
    }

    .admin-main {
      display: grid;
      gap: 18px;
    }

    .admin-hero {
      padding: 30px;
      border-radius: 30px;
      border: 1px solid rgba(200,148,69,.35);
      background: linear-gradient(135deg, rgba(200,148,69,.12), rgba(255,255,255,.035));
    }

    .admin-hero h1 {
      margin: 0 0 10px;
      font-family: var(--font-head);
      text-transform: uppercase;
    }

    .admin-hero p {
      margin: 0;
      color: var(--muted);
      line-height: 1.65;
      max-width: 760px;
    }

    .admin-stats {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px;
    }

    .admin-stat {
      padding: 22px;
      border-radius: 26px;
      border: 1px solid var(--line);
      background: rgba(255,255,255,.035);
    }

    .admin-stat span {
      display: block;
      color: var(--muted);
      font-weight: 800;
      font-size: .82rem;
      text-transform: uppercase;
      letter-spacing: .07em;
    }

    .admin-stat strong {
      display: block;
      margin-top: 8px;
      color: var(--gold-2);
      font-family: var(--font-condensed);
      font-size: 2.3rem;
      line-height: 1;
    }

    .admin-grid {
      display: grid;
      grid-template-columns: 1.35fr .65fr;
      gap: 18px;
    }

    .admin-panel { padding: 24px; }

    .admin-panel h2 {
      margin: 0 0 18px;
      font-family: var(--font-condensed);
      text-transform: uppercase;
      letter-spacing: .06em;
    }

    .agenda-row,
    .lead-row,
    .admin-service-row {
      display: grid;
      gap: 12px;
      align-items: center;
      padding: 15px 0;
      border-bottom: 1px solid var(--line-soft);
    }

    .agenda-row {
      grid-template-columns: 76px 1fr 150px 110px;
    }

    .agenda-row:last-child,
    .lead-row:last-child,
    .admin-service-row:last-child {
      border-bottom: 0;
    }

    .agenda-time {
      font-family: var(--font-condensed);
      color: var(--gold-2);
      font-size: 1.25rem;
    }

    .agenda-name strong,
    .lead-row strong {
      display: block;
    }

    .agenda-name span,
    .lead-row span,
    .admin-service-row span {
      color: var(--muted);
      font-size: .9rem;
    }

    .pill {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 30px;
      padding: 0 10px;
      border-radius: 999px;
      border: 1px solid var(--line);
      color: var(--muted);
      font-size: .76rem;
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: .06em;
    }

    .pill.ok {
      color: #10150f;
      background: #9de6b7;
      border-color: #9de6b7;
    }

    .pill.wait {
      color: #1f1608;
      background: var(--gold-2);
      border-color: var(--gold-2);
    }

    .lead-row {
      grid-template-columns: 46px 1fr auto;
    }

    .lead-row i {
      width: 40px;
      height: 40px;
      display: grid;
      place-items: center;
      border-radius: 14px;
      background: rgba(200,148,69,.1);
      color: var(--gold-2);
    }

    .admin-service-row {
      grid-template-columns: 1fr auto auto;
    }

    .fake-toggle {
      width: 48px;
      height: 28px;
      border-radius: 999px;
      background: rgba(87,192,132,.24);
      border: 1px solid rgba(87,192,132,.55);
      position: relative;
    }

    .fake-toggle::after {
      content: '';
      position: absolute;
      width: 20px;
      height: 20px;
      right: 4px;
      top: 3px;
      border-radius: 50%;
      background: #9de6b7;
    }

    @media (max-width: 1040px) {
      .main-nav { display: none; }
      .menu-toggle { display: inline-grid; place-items: center; }
      .nav-actions .desktop-book { display: none; }

      .mobile-menu {
        position: fixed;
        top: 82px;
        left: 14px;
        right: 14px;
        z-index: 79;
        display: none;
        border: 1px solid var(--line);
        border-radius: 26px;
        background: rgba(5,6,7,.94);
        backdrop-filter: blur(18px);
        padding: 14px;
      }

      .mobile-menu.open {
        display: grid;
        gap: 6px;
      }

      .mobile-menu a {
        padding: 14px;
        border-radius: 16px;
        color: var(--cream);
        font-weight: 900;
      }

      .mobile-menu a:hover { background: rgba(255,255,255,.06); }

      .hero-grid,
      .experience-layout,
      .price-layout,
      .about-block,
      .contact-layout,
      .admin-shell,
      .admin-grid {
        grid-template-columns: 1fr;
      }

      .hero-visual {
        min-height: 560px;
        order: -1;
      }

      .photo-slab { left: 36px; }

      .section-head {
        grid-template-columns: 1fr;
        gap: 16px;
      }

      .admin-sidebar {
        position: relative;
        top: auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 4px;
      }

      .admin-stats { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 760px) {
      .wrap { width: min(100% - 28px, var(--max)); }
      .site-header { height: 74px; }
      .brand-badge { width: 44px; height: 44px; border-radius: 15px; }
      .brand strong { font-size: .9rem; }
      .brand small { display: none; }
      .lang-switch a { padding: 6px 8px; }
      .mobile-menu { top: 74px; }

      .hero {
        padding: 100px 0 44px;
        min-height: auto;
      }

      .hero h1 {
        font-size: clamp(2rem, 10.5vw, 3rem);
        line-height: .98;
        letter-spacing: -.035em;
      }

      .hero-copy { font-size: 1rem; }
      .hero-actions .btn { width: 100%; }

      .hero-stats {
        grid-template-columns: 1fr;
        margin-top: 28px;
      }

      .stat {
        min-height: auto;
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 14px;
      }

      .stat span { text-align: right; }
      .hero-visual { min-height: 430px; }
      .photo-slab { inset: 0; border-radius: 30px; }
      .vertical-stamp { display: none; }
      .hero-note { left: 14px; right: 14px; bottom: 14px; width: auto; }

      .trust-grid { grid-template-columns: 1fr 1fr; }

      .trust-item {
        min-height: 68px;
        padding: 14px;
        font-size: .86rem;
      }

      section { padding: 74px 0; }

      .section-head h2,
      .about-copy h2,
      .cta-panel h2,
      .admin-hero h1,
      .modal-head h2 {
        font-size: clamp(1.75rem, 8.2vw, 2.65rem);
        line-height: 1.02;
        letter-spacing: -.035em;
      }

      .section-head { margin-bottom: 34px; }

      .hero-copy,
      .section-head p,
      .about-copy p,
      .cta-panel p {
        font-size: .96rem;
      }

      .kicker {
        font-size: .72rem;
        letter-spacing: .12em;
      }

      .kicker::before { width: 24px; }

      .experience-copy {
        border-left: 0;
        padding-left: 0;
      }

      .ritual-row {
        grid-template-columns: 60px 1fr;
      }

      .service-row {
        grid-template-columns: 1fr;
        gap: 14px;
        padding: 24px 0;
      }

      .service-row:hover { padding-left: 0; }
      .service-meta { text-align: left; }
      .service-row .btn { width: 100%; }

      .service-main {
        grid-template-columns: 48px 1fr;
      }

      .service-icon {
        width: 48px;
        height: 48px;
        border-radius: 16px;
      }

      .barber-strip,
      .reviews-grid,
      .about-points {
        grid-template-columns: 1fr;
      }

      .barber-panel { min-height: 430px; }

      .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        grid-auto-rows: 170px;
        gap: 10px;
      }

      .gallery-item.wide,
      .gallery-item:not(.wide) {
        grid-column: span 2;
      }

      .price-board,
      .about-copy,
      .contact-card,
      .cta-panel {
        padding: 24px;
        border-radius: 28px;
      }

      .cta-panel .btn { width: 100%; }
      .map-frame, .map-frame iframe { min-height: 360px; }
      .footer-grid { align-items: flex-start; flex-direction: column; }
      .mobile-book { display: block; }

      .booking-form { padding: 22px; }
      .booking-grid,
      .booking-main {
        grid-template-columns: 1fr;
      }

      .time-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .barber-choice {
        grid-template-columns: 56px 1fr 30px;
        min-height: 76px;
        border-radius: 20px;
      }

      .barber-choice img {
        width: 56px;
        height: 56px;
        border-radius: 16px;
      }

      .modal-head { padding: 22px 22px 0; }
      .form-actions .btn { width: 100%; }

      .admin-body { padding-top: 94px; }
      .admin-stats, .admin-sidebar { grid-template-columns: 1fr; }
      .agenda-row { grid-template-columns: 1fr; gap: 6px; }
      .admin-service-row { grid-template-columns: 1fr; }
    }

    @media (max-width: 420px) {
      .hero h1 { font-size: clamp(1.9rem, 10vw, 2.55rem); }

      .section-head h2,
      .about-copy h2,
      .cta-panel h2,
      .admin-hero h1,
      .modal-head h2 {
        font-size: clamp(1.65rem, 8.8vw, 2.35rem);
      }
    }
  </style>
</head>
<body>
  <header class="site-header">
    <div class="wrap nav-shell">
      <a class="brand" href="<?= e(url_for_lang($lang)) ?>" aria-label="<?= e($brand['name']) ?>">
        <span class="brand-badge"><i class="bi bi-scissors"></i></span>
        <span><strong><?= e($brand['name']) ?></strong><small><?= e($c['hero_kicker']) ?></small></span>
      </a>

      <?php if (!$isAdmin): ?>
        <nav class="main-nav" aria-label="Menu principal">
          <a href="#inicio"><?= e($c['nav'][0]) ?></a>
          <a href="#servicos"><?= e($c['nav'][1]) ?></a>
          <a href="#galeria"><?= e($c['nav'][2]) ?></a>
          <a href="#precos"><?= e($c['nav'][3]) ?></a>
          <a href="#sobre"><?= e($c['nav'][4]) ?></a>
          <a href="#contacto"><?= e($c['nav'][5]) ?></a>
        </nav>
      <?php endif; ?>

      <div class="nav-actions">
        <div class="lang-switch" aria-label="Language selector">
          <?php foreach ($supported as $code): ?>
            <a href="<?= e(url_for_lang($code, '', $isAdmin)) ?>" class="<?= $code === $lang ? 'active' : '' ?>"><?= e($copy[$code]['label']) ?></a>
          <?php endforeach; ?>
        </div>

        <?php if ($isAdmin): ?>
          <a class="btn btn-dark desktop-book" href="<?= e(url_for_lang($lang)) ?>"><i class="bi bi-arrow-left"></i><?= e($c['back_site']) ?></a>
        <?php else: ?>
          <button class="btn btn-gold desktop-book" type="button" data-open-booking><i class="bi bi-calendar2-check"></i><?= e($c['book']) ?></button>
          <button class="menu-toggle" type="button" aria-label="Abrir menu" data-menu-toggle><i class="bi bi-list"></i></button>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <?php if (!$isAdmin): ?>
    <div class="mobile-menu" data-mobile-menu>
      <a href="#inicio"><?= e($c['nav'][0]) ?></a>
      <a href="#servicos"><?= e($c['nav'][1]) ?></a>
      <a href="#galeria"><?= e($c['nav'][2]) ?></a>
      <a href="#precos"><?= e($c['nav'][3]) ?></a>
      <a href="#sobre"><?= e($c['nav'][4]) ?></a>
      <a href="#contacto"><?= e($c['nav'][5]) ?></a>
      <button class="btn btn-gold" type="button" data-open-booking><?= e($c['book']) ?></button>
    </div>

    <main id="inicio">
      <section class="hero">
        <div class="wrap hero-grid">
          <div>
            <span class="kicker"><?= e($c['hero_kicker']) ?></span>
            <h1><?= e($c['hero_title']) ?></h1>
            <p class="hero-copy"><?= e($c['hero_text']) ?></p>
            <div class="hero-actions">
              <a class="btn btn-gold" href="<?= e($whatsappLink) ?>" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i><?= e($c['hero_primary']) ?></a>
              <a class="btn btn-dark" href="#servicos"><i class="bi bi-arrow-down"></i><?= e($c['hero_secondary']) ?></a>
            </div>
            <div class="hero-stats">
              <?php foreach ($c['stats'] as $stat): ?>
                <div class="stat"><strong><?= e($stat[0]) ?></strong><span><?= e($stat[1]) ?></span></div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="hero-visual" aria-hidden="true">
            <div class="photo-slab"><img src="<?= e($brand['hero_image']) ?>" alt=""></div>
            <div class="vertical-stamp"><span><?= e($brand['name']) ?></span></div>
            <div class="hero-note">
              <b><?= e($brand['hours']) ?></b>
              <p><?= e($brand['address']) ?></p>
            </div>
          </div>
        </div>
      </section>

      <div class="trust-strip">
        <div class="wrap trust-grid">
          <?php $icons = ['bi-shield-check', 'bi-scissors', 'bi-clock-history', 'bi-stars']; ?>
          <?php foreach ($c['trust_strip'] as $i => $item): ?>
            <div class="trust-item"><i class="bi <?= e($icons[$i]) ?>"></i><?= e($item) ?></div>
          <?php endforeach; ?>
        </div>
      </div>

      <section id="experiencia">
        <div class="wrap">
          <?php section_head($c['experience_kicker'], $c['experience_title']); ?>
          <div class="experience-layout">
            <div class="experience-copy">
              <p><?= e($c['experience_text']) ?></p>
              <a class="btn btn-dark" href="#precos"><i class="bi bi-receipt"></i><?= e($c['prices_kicker']) ?></a>
            </div>
            <div class="ritual">
              <?php foreach ($c['experience_steps'] as $step): ?>
                <div class="ritual-row">
                  <strong><?= e($step[0]) ?></strong>
                  <div><h3><?= e($step[1]) ?></h3><p><?= e($step[2]) ?></p></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </section>

      <section id="servicos">
        <div class="wrap">
          <?php section_head($c['services_kicker'], $c['services_title'], $c['services_text']); ?>
          <div class="service-board">
            <?php foreach ($c['services'] as $service): ?>
              <article class="service-row">
                <div class="service-no"><?= e($service[0]) ?></div>
                <div class="service-main">
                  <div class="service-icon"><i class="bi <?= e($service[5]) ?>"></i></div>
                  <div><h3><?= e($service[1]) ?></h3><p><?= e($service[2]) ?></p></div>
                </div>
                <div class="service-meta"><b><?= e($service[3]) ?></b><span><?= e($service[4]) ?></span></div>
                <button class="btn btn-dark small-btn" type="button" data-open-booking data-service="<?= e($service[1]) ?>"><?= e($c['choose']) ?></button>
              </article>
            <?php endforeach; ?>
          </div>
          <div class="service-cta"><button class="btn btn-gold" type="button" data-open-booking><i class="bi bi-calendar2-check"></i><?= e($c['book']) ?></button></div>
        </div>
      </section>

      <section id="barbeiros">
        <div class="wrap">
          <?php section_head($c['barbers_kicker'], $c['barbers_title'], $c['barbers_text']); ?>
          <div class="barber-strip">
            <?php foreach ($c['barbers'] as $barber): ?>
              <article class="barber-panel">
                <img src="<?= e($barber[3]) ?>" alt="<?= e($barber[0]) ?>">
                <div class="barber-info">
                  <strong><?= e($barber[0]) ?></strong>
                  <span><?= e($barber[1]) ?></span>
                  <p><?= e($barber[2]) ?></p>
                  <button class="btn btn-gold small-btn barber-open" type="button" data-open-booking data-barber="<?= e($barber[0]) ?>"><?= e($c['choose']) ?></button>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section id="galeria">
        <div class="wrap">
          <?php section_head($c['gallery_kicker'], $c['gallery_title'], $c['gallery_text']); ?>
          <div class="gallery-grid">
            <?php foreach ($c['gallery'] as $item): ?>
              <button class="gallery-item <?= e($item[3]) ?>" type="button" data-lightbox="<?= e($item[0]) ?>" aria-label="<?= e($item[1]) ?>">
                <img src="<?= e($item[0]) ?>" alt="<?= e($item[1]) ?>">
                <span class="gallery-label"><?= e($item[2]) ?></span>
              </button>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section id="precos">
        <div class="wrap">
          <?php section_head($c['prices_kicker'], $c['prices_title'], $c['prices_text']); ?>
          <div class="price-layout">
            <div class="price-board">
              <?php foreach ($c['prices'] as $price): ?>
                <div class="price-line"><span><?= e($price[0]) ?></span><span></span><strong><?= e($price[1]) ?></strong></div>
              <?php endforeach; ?>
            </div>

            <div>
              <span class="kicker"><?= e($c['plans_kicker']) ?></span>
              <h2 style="font-family: var(--font-head); font-size: clamp(2rem, 3.5vw, 3.5rem); line-height: .92; letter-spacing: -.065em; text-transform: uppercase; margin: 16px 0 22px;"><?= e($c['plans_title']) ?></h2>
              <div class="plans">
                <?php foreach ($c['plans'] as $plan): ?>
                  <article class="plan-ticket">
                    <small><?= e($plan[3]) ?></small>
                    <h3><?= e($plan[0]) ?></h3>
                    <p><?= e($plan[1]) ?></p>
                    <strong><?= e($plan[2]) ?></strong>
                  </article>
                <?php endforeach; ?>
              </div>
              <div style="margin-top: 18px;"><button class="btn btn-gold" type="button" data-open-booking><i class="bi bi-calendar2-check"></i><?= e($c['book']) ?></button></div>
            </div>
          </div>
        </div>
      </section>

      <section id="sobre">
        <div class="wrap about-block">
          <div class="about-photo"><img src="<?= e($brand['about_image']) ?>" alt="<?= e($c['about_title']) ?>"></div>
          <div class="about-copy">
            <span class="kicker"><?= e($c['about_kicker']) ?></span>
            <h2><?= e($c['about_title']) ?></h2>
            <p><?= e($c['about_text']) ?></p>
            <div class="about-points">
              <?php foreach ($c['about_points'] as $point): ?>
                <div class="about-point"><i class="bi bi-check2-circle"></i><?= e($point) ?></div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </section>

      <section class="reviews-band">
        <div class="wrap">
          <?php section_head($c['reviews_kicker'], $c['reviews_title']); ?>
          <div class="reviews-grid">
            <?php foreach ($c['reviews'] as $review): ?>
              <figure class="quote">
                <div class="stars">★★★★★</div>
                <p>“<?= e($review[1]) ?>”</p>
                <figcaption><strong>— <?= e($review[0]) ?></strong></figcaption>
              </figure>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section id="faq">
        <div class="wrap">
          <?php section_head($c['faq_kicker'], $c['faq_title']); ?>
          <div class="faq-list">
            <?php foreach ($c['faqs'] as $index => $faq): ?>
              <details <?= $index === 0 ? 'open' : '' ?>>
                <summary><?= e($faq[0]) ?><i class="bi bi-plus-lg"></i></summary>
                <p><?= e($faq[1]) ?></p>
              </details>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section>
        <div class="wrap">
          <div class="cta-panel">
            <h2><?= e($c['cta_title']) ?></h2>
            <p><?= e($c['cta_text']) ?></p>
            <button class="btn btn-gold" type="button" data-open-booking><i class="bi bi-calendar2-check"></i><?= e($c['book']) ?></button>
          </div>
        </div>
      </section>

      <section id="contacto">
        <div class="wrap">
          <?php section_head($c['contact_kicker'], $c['contact_title']); ?>
          <div class="contact-layout">
            <div class="contact-card">
              <div class="contact-line"><i class="bi bi-geo-alt"></i><div><b><?= e($c['nav'][5]) ?></b><span><?= e($brand['address']) ?></span></div></div>
              <div class="contact-line"><i class="bi bi-clock"></i><div><b><?= e($c['admin']['today']) ?></b><span><?= e($brand['hours']) ?></span></div></div>
              <div class="contact-line"><i class="bi bi-telephone"></i><div><b><?= e($c['call']) ?></b><a href="tel:<?= e(str_replace(' ', '', $brand['phone'])) ?>"><?= e($brand['phone']) ?></a></div></div>
              <div class="contact-line"><i class="bi bi-envelope"></i><div><b>Email</b><a href="mailto:<?= e($brand['email']) ?>"><?= e($brand['email']) ?></a></div></div>
              <div class="contact-actions">
                <a class="btn btn-gold" href="<?= e($whatsappLink) ?>" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i><?= e($c['whatsapp']) ?></a>
                <a class="btn btn-dark" href="<?= e($brand['maps']) ?>" target="_blank" rel="noopener"><i class="bi bi-signpost-2"></i><?= e($c['route']) ?></a>
              </div>
            </div>
            <div class="map-frame"><iframe src="<?= e($brand['map_embed']) ?>" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" title="Mapa"></iframe></div>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      <div class="wrap footer-grid">
        <div>
          <strong style="display:block;color:var(--cream);font-family:var(--font-condensed);text-transform:uppercase;letter-spacing:.08em;"><?= e($brand['name']) ?></strong>
          <span>© <?= date('Y') ?> · DemoFirst Template · Alex Oliveira</span>
          <div style="margin-top: 10px;"><a class="gold" href="<?= e(url_for_lang($lang, '', true)) ?>"><?= e($c['admin_demo']) ?></a></div>
        </div>
        <div class="socials">
          <a href="<?= e($brand['instagram']) ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="<?= e($brand['facebook']) ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="<?= e($whatsappLink) ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>
    </footer>

    <div class="mobile-book">
      <button class="btn btn-gold" type="button" data-open-booking><i class="bi bi-whatsapp"></i><?= e($c['hero_primary']) ?></button>
    </div>

    <div class="modal" id="bookingModal" aria-hidden="true" role="dialog" aria-modal="true">
      <div class="modal-panel">
        <div class="modal-head">
          <div>
            <h2><?= e($c['modal_title']) ?></h2>
            <p><?= e($c['modal_text']) ?></p>
          </div>
          <button class="modal-close" type="button" data-close-modal aria-label="<?= e($c['form_close']) ?>"><i class="bi bi-x-lg"></i></button>
        </div>

        <form class="booking-form" id="bookingForm">
          <div class="booking-grid">
            <div class="booking-main">
              <div class="field">
                <label for="name"><?= e($c['form_name']) ?></label>
                <input id="name" name="name" type="text" required autocomplete="name">
              </div>

              <div class="field">
                <label for="phone"><?= e($c['form_phone']) ?></label>
                <input id="phone" name="phone" type="tel" autocomplete="tel">
              </div>

              <div class="field full">
                <label for="service"><?= e($c['form_service']) ?></label>
                <select id="service" name="service" required>
                  <option value=""><?= e($c['select']) ?></option>
                  <?php foreach ($c['services'] as $s): ?>
                    <option><?= e($s[1]) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="field">
                <label for="date"><?= e($c['form_date']) ?></label>
                <input id="date" name="date" type="date" required>
              </div>

              <div class="field">
                <label><?= e($c['form_time']) ?></label>
                <div class="time-grid">
                  <?php foreach (['09:00','10:30','12:00','14:00','15:30','17:00','18:30','19:00'] as $slotIndex => $slot): ?>
                    <input class="time-radio" id="slot<?= e($slotIndex) ?>" name="time" type="radio" value="<?= e($slot) ?>" required>
                    <label class="time-chip" for="slot<?= e($slotIndex) ?>"><?= e($slot) ?></label>
                  <?php endforeach; ?>
                </div>
              </div>

              <div class="field full">
                <label for="notes"><?= e($c['form_notes']) ?></label>
                <textarea id="notes" name="notes" placeholder=""></textarea>
              </div>
            </div>

            <aside class="booking-side">
              <div class="booking-side-title"><?= e($c['form_barber']) ?></div>

              <div class="barber-choices">
                <?php foreach ($c['barbers'] as $barberIndex => $b): ?>
                  <input class="barber-radio" id="bookingBarber<?= e($barberIndex) ?>" name="barber" type="radio" value="<?= e($b[0]) ?>" required>
                  <label class="barber-choice" for="bookingBarber<?= e($barberIndex) ?>">
                    <img src="<?= e($b[3]) ?>" alt="<?= e($b[0]) ?>">
                    <span>
                      <strong><?= e($b[0]) ?></strong>
                      <small><?= e($b[1]) ?></small>
                    </span>
                    <i class="bi bi-check2"></i>
                  </label>
                <?php endforeach; ?>
              </div>

              <div class="booking-mini">
                <b><?= e($brand['hours']) ?></b><br>
                <?= e($brand['address']) ?>
              </div>
            </aside>
          </div>

          <div class="form-actions">
            <button class="btn btn-dark" type="button" data-close-modal><?= e($c['form_close']) ?></button>
            <button class="btn btn-gold" type="submit"><i class="bi bi-whatsapp"></i><?= e($c['form_send']) ?></button>
          </div>
        </form>
      </div>
    </div>

    <div class="modal" id="lightboxModal" aria-hidden="true" role="dialog" aria-modal="true">
      <button class="modal-close" type="button" data-close-lightbox style="position:absolute;top:20px;right:20px;" aria-label="<?= e($c['form_close']) ?>"><i class="bi bi-x-lg"></i></button>
      <img class="lightbox-img" src="" alt="">
    </div>

  <?php else: ?>
    <main class="admin-body">
      <div class="wrap admin-shell">
        <aside class="admin-sidebar">
          <a class="active" href="#"><i class="bi bi-speedometer2"></i>Dashboard</a>
          <a href="#agenda"><i class="bi bi-calendar-week"></i><?= e($c['admin']['agenda']) ?></a>
          <a href="#services"><i class="bi bi-scissors"></i><?= e($c['admin']['services']) ?></a>
          <a href="#leads"><i class="bi bi-chat-dots"></i><?= e($c['admin']['leads']) ?></a>
          <a href="#settings"><i class="bi bi-sliders"></i><?= e($c['admin']['settings']) ?></a>
          <a href="<?= e(url_for_lang($lang)) ?>"><i class="bi bi-arrow-left"></i><?= e($c['back_site']) ?></a>
        </aside>

        <section class="admin-main" style="padding:0;">
          <div class="admin-hero">
            <span class="kicker"><?= e($brand['name']) ?></span>
            <h1><?= e($c['admin']['title']) ?></h1>
            <p><?= e($c['admin']['subtitle']) ?></p>
          </div>

          <div class="admin-stats">
            <div class="admin-stat"><span><?= e($c['admin']['appointments']) ?></span><strong>18</strong></div>
            <div class="admin-stat"><span><?= e($c['admin']['revenue']) ?></span><strong>386€</strong></div>
            <div class="admin-stat"><span><?= e($c['admin']['clients']) ?></span><strong>11</strong></div>
            <div class="admin-stat"><span><?= e($c['admin']['next']) ?></span><strong>10:30</strong></div>
          </div>

          <div class="admin-grid">
            <div class="admin-panel" id="agenda">
              <h2><?= e($c['admin']['agenda']) ?></h2>
              <?php foreach ($adminAgenda as $row): ?>
                <div class="agenda-row">
                  <div class="agenda-time"><?= e($row[0]) ?></div>
                  <div class="agenda-name"><strong><?= e($row[1]) ?></strong><span><?= e($row[2]) ?></span></div>
                  <div class="muted"><?= e($row[3]) ?></div>
                  <span class="pill <?= $row[4] === $c['admin']['status_confirmed'] ? 'ok' : 'wait' ?>"><?= e($row[4]) ?></span>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="admin-panel" id="leads">
              <h2><?= e($c['admin']['leads']) ?></h2>
              <?php foreach ($adminLeads as $lead): ?>
                <div class="lead-row">
                  <i class="bi <?= $lead[0] === 'WhatsApp' ? 'bi-whatsapp' : ($lead[0] === 'Instagram' ? 'bi-instagram' : 'bi-globe2') ?>"></i>
                  <div><strong><?= e($lead[0]) ?></strong><span><?= e($lead[1]) ?></span></div>
                  <span class="muted"><?= e($lead[2]) ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="admin-grid">
            <div class="admin-panel" id="services">
              <h2><?= e($c['admin']['services']) ?></h2>
              <?php foreach ($c['services'] as $s): ?>
                <div class="admin-service-row">
                  <div><strong><?= e($s[1]) ?></strong><span><?= e($s[3]) ?> · <?= e($s[4]) ?></span></div>
                  <span class="pill ok">Online</span>
                  <span class="fake-toggle" aria-hidden="true"></span>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="admin-panel" id="settings">
              <h2><?= e($c['admin']['settings']) ?></h2>
              <div class="contact-line"><i class="bi bi-geo-alt"></i><div><b><?= e($brand['address']) ?></b><span><?= e($c['route']) ?></span></div></div>
              <div class="contact-line"><i class="bi bi-clock"></i><div><b><?= e($brand['hours']) ?></b><span><?= e($c['admin']['today']) ?></span></div></div>
              <div class="contact-line"><i class="bi bi-images"></i><div><b><?= e($c['admin']['gallery_queue']) ?></b><span>5 uploads</span></div></div>
              <a class="btn btn-gold" href="<?= e(url_for_lang($lang)) ?>" style="width:100%;margin-top:14px;"><i class="bi bi-eye"></i><?= e($c['back_site']) ?></a>
            </div>
          </div>
        </section>
      </div>
    </main>
  <?php endif; ?>

  <script>
    const WHATSAPP_NUMBER = <?= json_encode($brand['whatsapp']) ?>;
    const BASE_MESSAGE = <?= json_encode($c['whatsapp_message'], JSON_UNESCAPED_UNICODE) ?>;
    const LABELS = <?= json_encode([
      'name' => $c['form_name'],
      'phone' => $c['form_phone'],
      'service' => $c['form_service'],
      'barber' => $c['form_barber'],
      'date' => $c['form_date'],
      'time' => $c['form_time'],
      'notes' => $c['form_notes'],
    ], JSON_UNESCAPED_UNICODE) ?>;

    const menuToggle = document.querySelector('[data-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (menuToggle && mobileMenu) {
      menuToggle.addEventListener('click', () => mobileMenu.classList.toggle('open'));
      mobileMenu.querySelectorAll('a, button').forEach(el => el.addEventListener('click', () => mobileMenu.classList.remove('open')));
    }

    const bookingModal = document.getElementById('bookingModal');
    const serviceSelect = document.getElementById('service');
    const barberInputs = Array.from(document.querySelectorAll('input[name="barber"]'));

    document.querySelectorAll('[data-open-booking]').forEach(btn => {
      btn.addEventListener('click', () => {
        if (!bookingModal) return;

        const selected = btn.getAttribute('data-service');
        const selectedBarber = btn.getAttribute('data-barber');

        if (selected && serviceSelect) {
          serviceSelect.value = selected;
        }

        if (selectedBarber) {
          const barber = barberInputs.find(input => input.value === selectedBarber);
          if (barber) barber.checked = true;
        }

        bookingModal.classList.add('open');
        bookingModal.setAttribute('aria-hidden', 'false');

        const firstField = bookingModal.querySelector('input[name="name"]');
        if (firstField) {
          setTimeout(() => firstField.focus(), 120);
        }
      });
    });

    document.querySelectorAll('[data-close-modal]').forEach(btn => {
      btn.addEventListener('click', () => {
        if (!bookingModal) return;
        bookingModal.classList.remove('open');
        bookingModal.setAttribute('aria-hidden', 'true');
      });
    });

    if (bookingModal) {
      bookingModal.addEventListener('click', (event) => {
        if (event.target === bookingModal) {
          bookingModal.classList.remove('open');
          bookingModal.setAttribute('aria-hidden', 'true');
        }
      });
    }

    const bookingForm = document.getElementById('bookingForm');

    if (bookingForm) {
      bookingForm.addEventListener('submit', (event) => {
        event.preventDefault();

        const data = new FormData(bookingForm);
        const lines = [BASE_MESSAGE, ''];

        ['name','phone','service','barber','date','time','notes'].forEach(key => {
          const value = String(data.get(key) || '').trim();
          if (value) lines.push(`${LABELS[key]}: ${value}`);
        });

        const url = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(lines.join('\n'))}`;
        window.open(url, '_blank', 'noopener');
      });
    }

    const lightbox = document.getElementById('lightboxModal');
    const lightboxImg = lightbox ? lightbox.querySelector('img') : null;

    document.querySelectorAll('[data-lightbox]').forEach(item => {
      item.addEventListener('click', () => {
        if (!lightbox || !lightboxImg) return;
        lightboxImg.src = item.getAttribute('data-lightbox');
        lightbox.classList.add('open');
        lightbox.setAttribute('aria-hidden', 'false');
      });
    });

    document.querySelectorAll('[data-close-lightbox]').forEach(btn => {
      btn.addEventListener('click', () => {
        if (!lightbox || !lightboxImg) return;
        lightbox.classList.remove('open');
        lightbox.setAttribute('aria-hidden', 'true');
        lightboxImg.src = '';
      });
    });

    if (lightbox) {
      lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) {
          lightbox.classList.remove('open');
          lightbox.setAttribute('aria-hidden', 'true');
          if (lightboxImg) lightboxImg.src = '';
        }
      });
    }

    document.addEventListener('keydown', (event) => {
      if (event.key !== 'Escape') return;

      document.querySelectorAll('.modal.open').forEach(modal => {
        modal.classList.remove('open');
        modal.setAttribute('aria-hidden', 'true');
      });
    });
  </script>
</body>
</html>