<?php
// index.php — DemoFirst Template: Clínica Dentária Moderna + Admin Demo
// Multilíngue PT / ES / EN. One file para Hostinger: sem banco de dados, sem build e sem dependências JavaScript.
// Personalize os dados no bloco $brand e troque imagens externas por assets locais quando fechar para cliente.

$brand = [
  'name' => 'Clínica Sorriso Gaia',
  'short' => 'SG',
  'phone' => '+351 912 345 678',
  'whatsapp' => '351912345678',
  'email' => 'contato@clinicasorrisogaia.pt',
  'address' => 'Rua da Saúde 123, Vila Nova de Gaia',
  'city' => 'Vila Nova de Gaia',
  'hours_week' => '09:00 — 19:00',
  'hours_sat' => '09:00 — 13:00',
  'instagram' => 'https://www.instagram.com/',
  'facebook' => 'https://www.facebook.com/',
  'maps' => 'https://www.google.com/maps/search/?api=1&query=Rua%20da%20Sa%C3%BAde%20123%2C%20Vila%20Nova%20de%20Gaia',
  'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.050739127303!2d-8.65826518458168!3d41.123617279288004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2464f9619e3001%3A0x8b5a659b8beef41a!2sR.%20da%20B%C3%A9lgica%202450%2C%204405-034%20Vila%20Nova%20de%20Gaia!5e0!3m2!1spt-PT!2spt!4v1719012345678',
  'hero_image' => 'https://images.unsplash.com/photo-1606811971618-4486d14f3f99?auto=format&fit=crop&w=1600&q=88',
  'about_image' => 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=1400&q=88',
  'booking_image' => 'https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&w=1600&q=88',
  'og_image' => 'https://images.unsplash.com/photo-1606811971618-4486d14f3f99?auto=format&fit=crop&w=1200&q=85',
];

$copy = [
  'pt' => [
    'html_lang' => 'pt-PT',
    'lang_label' => 'Português',
    'seo_desc' => 'Dentista em Vila Nova de Gaia. Clínica dentária moderna com marcação por WhatsApp, tratamentos personalizados, urgências, ortodontia, implantes, limpeza e branqueamento.',
    'og_title_suffix' => 'Dentista em Vila Nova de Gaia',
    'og_desc' => 'Consulta rápida, plano claro e atendimento sem stress para adultos e crianças.',
    'brand_subtitle' => 'Clínica dentária moderna',
    'nav' => ['Início', 'Tratamentos', 'Equipa', 'Preços', 'Contacto'],
    'call' => 'Ligar',
    'whatsapp' => 'WhatsApp',
    'book' => 'Marcar consulta',
    'book_whatsapp' => 'Marcar pelo WhatsApp',
    'view_treatments' => 'Ver tratamentos',
    'hero_kicker' => 'Dentista em Vila Nova de Gaia',
    'hero_title' => 'Cuida do teu sorriso sem stress, com plano claro e marcação rápida.',
    'hero_text' => 'Consultas para adultos e crianças, tratamentos explicados com transparência e uma equipa preparada para te acompanhar em cada etapa.',
    'hero_card_title' => 'A tua primeira consulta começa com escuta.',
    'hero_card_text' => 'Avaliamos o sorriso, explicamos as opções e criamos um plano ajustado ao teu tempo, conforto e orçamento.',
    'rating' => 'avaliação média',
    'pills' => [
      ['+10', 'anos de experiência'],
      ['Família', 'adultos e crianças'],
      ['Sem surpresa', 'plano explicado antes'],
      ['Hoje', 'orientação por WhatsApp'],
    ],
    'trust' => ['Higiene rigorosa', 'Tecnologia digital', 'Atendimento humano', 'Localização acessível', 'Adultos e crianças', 'Marcação rápida'],
    'treatments_kicker' => 'Tratamentos',
    'treatments_title' => 'Encontra rapidamente o cuidado que o teu sorriso precisa.',
    'treatments_text' => 'Cards pensados para vender: dor clara, solução objetiva e chamada para ação em cada tratamento.',
    'treatments' => [
      ['Implantes Dentários', 'Para substituir dentes em falta com segurança, voltar a mastigar com confiança e receber um plano claro antes de avançar.', 'Sob avaliação', 'Plano personalizado', 'bi-shield-plus', 'Marcar avaliação'],
      ['Ortodontia', 'Aparelhos fixos e alinhadores transparentes para alinhar o sorriso com acompanhamento próximo e previsível.', 'Desde 45€/mês', 'Plano personalizado', 'bi-braces', 'Quero alinhar o sorriso'],
      ['Branqueamento Dentário', 'Melhora a cor do sorriso com acompanhamento profissional, indicação correta e protocolo seguro.', 'Desde 180€', '60 min', 'bi-stars', 'Quero saber mais'],
      ['Limpeza Dentária', 'Prevenção, higiene oral e remoção de tártaro para manter gengivas saudáveis e evitar problemas futuros.', 'Desde 45€', '30 min', 'bi-droplet', 'Marcar limpeza'],
      ['Odontopediatria', 'Consulta tranquila para crianças, com linguagem simples, paciência e prevenção desde cedo.', 'Desde 35€', '30 min', 'bi-balloon-heart', 'Marcar para criança'],
      ['Urgências Dentárias', 'Dor, infeção, dente partido ou desconforto? Fala connosco para receber orientação rápida.', 'Sob avaliação', 'Prioritário', 'bi-lightning-charge', 'Tenho urgência'],
    ],
    'urgent_kicker' => 'Urgência dentária',
    'urgent_title' => 'Com dor de dentes ou desconforto inesperado?',
    'urgent_text' => 'O paciente não quer procurar muito quando está com dor. Este bloco transforma a página em contacto imediato por WhatsApp ou chamada.',
    'urgent_cta' => 'Falar agora no WhatsApp',
    'urgent_call' => 'Ligar agora',
    'urgent_points' => ['Dor ou infeção', 'Dente partido', 'Inchaço ou sangramento', 'Orientação rápida'],
    'confidence_kicker' => 'Porquê escolher-nos',
    'confidence_title' => 'Confiança antes, durante e depois da consulta.',
    'confidence_text' => 'Uma boa clínica dentária não mostra apenas tratamentos. Mostra cuidado, comunicação, higiene e previsibilidade. O paciente precisa saber que será bem recebido e bem informado.',
    'confidence_cta' => 'Falar com a clínica',
    'confidence_items' => [
      ['Equipa experiente', 'Profissionais organizados por especialidade e preparados para explicar cada passo.', 'bi-person-check'],
      ['Ambiente confortável', 'Receção calma, consultórios limpos e uma experiência sem sensação de pressa.', 'bi-hospital'],
      ['Plano personalizado', 'Tratamento ajustado ao caso, objetivo, orçamento e disponibilidade do paciente.', 'bi-clipboard2-pulse'],
      ['Higiene visível', 'Protocolos claros de esterilização, materiais organizados e cuidado em cada detalhe.', 'bi-shield-lock'],
    ],
    'about_kicker' => 'Sobre a clínica',
    'about_title' => 'Moderna na tecnologia. Humana no cuidado.',
    'about_p1' => 'Na {brand}, combinamos experiência, tecnologia e acompanhamento próximo para oferecer tratamentos dentários seguros, confortáveis e personalizados.',
    'about_p2' => 'A nossa missão é ajudar cada paciente a sorrir com confiança, desde uma simples limpeza até tratamentos mais avançados como ortodontia, implantes e reabilitação oral.',
    'about_stats' => [['+10', 'anos experiência'], ['3', 'áreas clínicas'], ['100%', 'plano explicado']],
    'team_kicker' => 'Equipa médica',
    'team_title' => 'Profissionais com especialidades claras e atendimento próximo.',
    'team_text' => 'O paciente sabe quem o acompanha, qual a área de atuação e como marcar a consulta certa.',
    'doctors' => [
      ['Dra. Ana Martins', 'Médica Dentista · Ortodontia e estética dentária', 'Alinhadores, aparelhos fixos e acompanhamento de adultos e jovens com planeamento claro.', 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=900&q=88'],
      ['Dr. João Ferreira', 'Médico Dentista · Implantologia e cirurgia oral', 'Reabilitação oral, implantes e tratamentos avançados com foco em segurança clínica.', 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=900&q=88'],
      ['Dra. Sofia Almeida', 'Médica Dentista · Odontopediatria e prevenção', 'Consultas para crianças e famílias, com comunicação tranquila e ambiente acolhedor.', 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=900&q=88'],
    ],
    'mark' => 'Marcar',
    'cases_kicker' => 'Resultados e ambiente',
    'cases_title' => 'Resultados apresentados com cuidado, sem exagero.',
    'cases_text' => 'Uma área pensada para mostrar possibilidades de tratamento, ambiente clínico e tecnologia de forma elegante e segura.',
    'cases_note' => 'Nota para clientes reais: resultados clínicos devem ser usados apenas com autorização do paciente e conforme as regras profissionais aplicáveis.',
    'cases' => [
      ['Branqueamento', 'Sorriso mais luminoso com acompanhamento profissional e avaliação prévia.', 'https://images.unsplash.com/photo-1609840114035-3c981b782dfe?auto=format&fit=crop&w=900&q=88'],
      ['Acompanhamento clínico', 'Consulta explicada com calma, opções claras e plano ajustado ao paciente.', 'https://images.unsplash.com/photo-1606811841689-23dfddce3e95?auto=format&fit=crop&w=900&q=88'],
      ['Ambiente moderno', 'Consultórios limpos, tecnologia visível e experiência confortável.', 'https://images.unsplash.com/photo-1629909615184-74f495363b67?auto=format&fit=crop&w=900&q=88'],
    ],
    'prices_kicker' => 'Preços',
    'prices_title' => 'Valores claros para orientar a decisão inicial.',
    'prices_text' => 'Preços de referência ajudam o paciente a perceber rapidamente o investimento provável antes da avaliação clínica.',
    'prices' => [
      ['Consulta de avaliação', '35€'], ['Limpeza dentária', '45€'], ['Branqueamento dentário', '180€'], ['Consulta infantil', '35€'], ['Restauração dentária', 'Desde 55€'], ['Ortodontia', 'Sob plano'], ['Implante dentário', 'Sob avaliação'], ['Urgência dentária', 'Sob avaliação'],
    ],
    'payment_title' => 'Plano explicado antes de avançar.',
    'payment_text' => 'Tratamentos como ortodontia, implantes e reabilitação exigem avaliação. O paciente recebe um plano com etapas, opções e orçamento.',
    'payment_items' => ['Orçamento antes do tratamento', 'Opções de pagamento configuráveis', 'Comunicação simples e sem linguagem técnica'],
    'reviews_kicker' => 'Avaliações',
    'reviews_title' => 'A confiança vem de quem já foi atendido.',
    'reviews' => [
      ['Mariana Silva', 'Expliquei que tinha medo de dentista e foram super cuidadosos desde a primeira consulta. Senti-me ouvida e segura.'],
      ['Ricardo Costa', 'Gostei porque explicaram o tratamento e o orçamento antes de começar. Tudo foi claro e sem pressão.'],
      ['Ana Pereira', 'Levei o meu filho e a consulta foi tranquila. A equipa teve muita paciência e explicou tudo de forma simples.'],
    ],
    'booking_kicker' => 'Marcação',
    'booking_title' => 'Dá o primeiro passo para um sorriso mais saudável.',
    'booking_text' => 'Preenche o pedido e envia diretamente para WhatsApp com a mensagem pronta. A clínica confirma o melhor horário.',
    'form' => ['name'=>'Nome','phone'=>'Telefone','email'=>'Email','treatment'=>'Tratamento','doctor'=>'Profissional','date'=>'Data preferida','message'=>'Mensagem','choose'=>'Escolha...','no_preference'=>'Sem preferência','placeholder'=>'Ex: tenho dor, prefiro horário de manhã, quero orçamento de ortodontia...','submit'=>'Enviar pedido pelo WhatsApp','close'=>'Fechar'],
    'contact_kicker' => 'Contacto',
    'contact_title' => 'Chega fácil. Marca mais fácil ainda.',
    'contact_labels' => ['Morada','Horário','Telefone','Email'],
    'week_label' => 'Segunda a Sexta',
    'sat_label' => 'Sábado',
    'directions' => 'Como chegar',
    'footer_template' => 'DemoFirst Template',
    'admin_link' => 'Painel demo',
    'modal_title' => 'Marcar consulta',
    'modal_text' => 'Preenche os dados e envia a mensagem pronta para WhatsApp.',
    'wa_message' => 'Olá! Quero marcar uma consulta na Clínica Sorriso Gaia.',
    'urgent_message' => 'Olá! Tenho uma urgência dentária e preciso de orientação.',
    'marquee' => ['Marcação por WhatsApp', 'Plano explicado antes de avançar', 'Urgências dentárias', 'Adultos e crianças', 'Clínica moderna'],
    'admin_agenda' => [
      ['09:00', 'Carla Mendes', 'Limpeza Dentária', 'Dra. Sofia', 'Confirmada'],
      ['10:30', 'Pedro Alves', 'Avaliação Implante', 'Dr. João', 'Confirmada'],
      ['12:00', 'Rita Moreira', 'Ortodontia', 'Dra. Ana', 'Pendente'],
      ['15:30', 'Miguel Rocha', 'Urgência Dentária', 'Dr. João', 'Prioritário'],
      ['17:00', 'Inês Carvalho', 'Branqueamento', 'Dra. Ana', 'Confirmada'],
    ],
    'admin_leads' => [['WhatsApp', 'Urgência dentária', '6 min', 'bi-whatsapp'], ['Website', 'Ortodontia', '18 min', 'bi-globe2'], ['Instagram', 'Branqueamento', '1 h', 'bi-instagram']],
    'admin' => ['title'=>'Painel Demo Clínica Dentária','text'=>'Área visual para apresentar como uma clínica poderia gerir consultas, tratamentos, equipa médica e pedidos de marcação.','back'=>'Voltar ao site','dashboard'=>'Dashboard','agenda'=>'Agenda','treatments'=>'Tratamentos','leads'=>'Leads','stats'=>['Consultas hoje','Novos pedidos','Taxa ocupação','Próxima consulta'],'today'=>'Agenda do dia','received'=>'Leads recebidos','active'=>'Tratamentos ativos','config'=>'Configuração rápida','online'=>'Online','view'=>'Ver página pública'],
  ],
  'es' => [
    'html_lang' => 'es',
    'lang_label' => 'Español',
    'seo_desc' => 'Dentista en Vila Nova de Gaia. Clínica dental moderna con reserva por WhatsApp, tratamientos personalizados, urgencias, ortodoncia, implantes, limpieza y blanqueamiento.',
    'og_title_suffix' => 'Dentista en Vila Nova de Gaia',
    'og_desc' => 'Reserva rápida, plan claro y atención sin estrés para adultos y niños.',
    'brand_subtitle' => 'Clínica dental moderna',
    'nav' => ['Inicio', 'Tratamientos', 'Equipo', 'Precios', 'Contacto'],
    'call' => 'Llamar',
    'whatsapp' => 'WhatsApp',
    'book' => 'Reservar cita',
    'book_whatsapp' => 'Reservar por WhatsApp',
    'view_treatments' => 'Ver tratamientos',
    'hero_kicker' => 'Dentista en Vila Nova de Gaia',
    'hero_title' => 'Cuida tu sonrisa sin estrés, con plan claro y reserva rápida.',
    'hero_text' => 'Consultas para adultos y niños, tratamientos explicados con transparencia y un equipo preparado para acompañarte en cada etapa.',
    'hero_card_title' => 'Tu primera consulta empieza escuchando.',
    'hero_card_text' => 'Evaluamos tu sonrisa, explicamos las opciones y creamos un plan ajustado a tu tiempo, comodidad y presupuesto.',
    'rating' => 'valoración media',
    'pills' => [['+10','años de experiencia'], ['Familia','adultos y niños'], ['Sin sorpresas','plan explicado antes'], ['Hoy','orientación por WhatsApp']],
    'trust' => ['Higiene rigurosa', 'Tecnología digital', 'Atención humana', 'Ubicación accesible', 'Adultos y niños', 'Reserva rápida'],
    'treatments_kicker' => 'Tratamientos',
    'treatments_title' => 'Encuentra rápidamente el cuidado que tu sonrisa necesita.',
    'treatments_text' => 'Tarjetas pensadas para vender: problema claro, solución objetiva y llamada a la acción en cada tratamiento.',
    'treatments' => [
      ['Implantes Dentales', 'Para sustituir dientes ausentes con seguridad, volver a masticar con confianza y recibir un plan claro antes de avanzar.', 'Bajo evaluación', 'Plan personalizado', 'bi-shield-plus', 'Reservar evaluación'],
      ['Ortodoncia', 'Brackets y alineadores transparentes para alinear la sonrisa con seguimiento cercano y previsible.', 'Desde 45€/mes', 'Plan personalizado', 'bi-braces', 'Quiero alinear mi sonrisa'],
      ['Blanqueamiento Dental', 'Mejora el color de la sonrisa con acompañamiento profesional, indicación correcta y protocolo seguro.', 'Desde 180€', '60 min', 'bi-stars', 'Saber más'],
      ['Limpieza Dental', 'Prevención, higiene oral y eliminación de sarro para mantener encías sanas y evitar problemas futuros.', 'Desde 45€', '30 min', 'bi-droplet', 'Reservar limpieza'],
      ['Odontopediatría', 'Consulta tranquila para niños, con lenguaje simple, paciencia y prevención desde temprano.', 'Desde 35€', '30 min', 'bi-balloon-heart', 'Reservar para niño'],
      ['Urgencias Dentales', '¿Dolor, infección, diente roto o molestia? Habla con nosotros para recibir orientación rápida.', 'Bajo evaluación', 'Prioritario', 'bi-lightning-charge', 'Tengo urgencia'],
    ],
    'urgent_kicker' => 'Urgencia dental',
    'urgent_title' => '¿Dolor de muelas o molestia inesperada?',
    'urgent_text' => 'Cuando el paciente tiene dolor, no quiere buscar demasiado. Este bloque convierte la página en contacto inmediato por WhatsApp o llamada.',
    'urgent_cta' => 'Hablar ahora por WhatsApp',
    'urgent_call' => 'Llamar ahora',
    'urgent_points' => ['Dolor o infección', 'Diente roto', 'Inflamación o sangrado', 'Orientación rápida'],
    'confidence_kicker' => 'Por qué elegirnos',
    'confidence_title' => 'Confianza antes, durante y después de la consulta.',
    'confidence_text' => 'Una buena clínica dental no muestra solo tratamientos. Muestra cuidado, comunicación, higiene y previsibilidad. El paciente necesita saber que será bien recibido e informado.',
    'confidence_cta' => 'Hablar con la clínica',
    'confidence_items' => [
      ['Equipo con experiencia', 'Profesionales organizados por especialidad y preparados para explicar cada paso.', 'bi-person-check'],
      ['Ambiente cómodo', 'Recepción tranquila, gabinetes limpios y una experiencia sin sensación de prisa.', 'bi-hospital'],
      ['Plan personalizado', 'Tratamiento ajustado al caso, objetivo, presupuesto y disponibilidad del paciente.', 'bi-clipboard2-pulse'],
      ['Higiene visible', 'Protocolos claros de esterilización, materiales organizados y cuidado en cada detalle.', 'bi-shield-lock'],
    ],
    'about_kicker' => 'Sobre la clínica',
    'about_title' => 'Moderna en tecnología. Humana en el cuidado.',
    'about_p1' => 'En {brand}, combinamos experiencia, tecnología y seguimiento cercano para ofrecer tratamientos dentales seguros, cómodos y personalizados.',
    'about_p2' => 'Nuestra misión es ayudar a cada paciente a sonreír con confianza, desde una limpieza simple hasta tratamientos avanzados como ortodoncia, implantes y rehabilitación oral.',
    'about_stats' => [['+10', 'años experiencia'], ['3', 'áreas clínicas'], ['100%', 'plan explicado']],
    'team_kicker' => 'Equipo médico',
    'team_title' => 'Profesionales con especialidades claras y atención cercana.',
    'team_text' => 'El paciente sabe quién lo acompaña, cuál es su área de actuación y cómo reservar la consulta adecuada.',
    'doctors' => [
      ['Dra. Ana Martins', 'Dentista · Ortodoncia y estética dental', 'Alineadores, brackets y seguimiento de adultos y jóvenes con planificación clara.', 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=900&q=88'],
      ['Dr. João Ferreira', 'Dentista · Implantología y cirugía oral', 'Rehabilitación oral, implantes y tratamientos avanzados con enfoque en seguridad clínica.', 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=900&q=88'],
      ['Dra. Sofia Almeida', 'Dentista · Odontopediatría y prevención', 'Consultas para niños y familias, con comunicación tranquila y ambiente acogedor.', 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=900&q=88'],
    ],
    'mark' => 'Reservar',
    'cases_kicker' => 'Resultados y ambiente',
    'cases_title' => 'Resultados presentados con cuidado, sin exagerar.',
    'cases_text' => 'Una sección pensada para mostrar posibilidades de tratamiento, ambiente clínico y tecnología de forma elegante y segura.',
    'cases_note' => 'Nota para clientes reales: los resultados clínicos deben usarse solo con autorización del paciente y según las normas profesionales aplicables.',
    'cases' => [
      ['Blanqueamiento', 'Sonrisa más luminosa con acompañamiento profesional y evaluación previa.', 'https://images.unsplash.com/photo-1609840114035-3c981b782dfe?auto=format&fit=crop&w=900&q=88'],
      ['Seguimiento clínico', 'Consulta explicada con calma, opciones claras y plan ajustado al paciente.', 'https://images.unsplash.com/photo-1606811841689-23dfddce3e95?auto=format&fit=crop&w=900&q=88'],
      ['Ambiente moderno', 'Gabinetes limpios, tecnología visible y experiencia cómoda.', 'https://images.unsplash.com/photo-1629909615184-74f495363b67?auto=format&fit=crop&w=900&q=88'],
    ],
    'prices_kicker' => 'Precios',
    'prices_title' => 'Valores claros para orientar la decisión inicial.',
    'prices_text' => 'Los precios de referencia ayudan al paciente a entender rápidamente la inversión probable antes de la evaluación clínica.',
    'prices' => [['Consulta de evaluación','35€'], ['Limpieza dental','45€'], ['Blanqueamiento dental','180€'], ['Consulta infantil','35€'], ['Restauración dental','Desde 55€'], ['Ortodoncia','Bajo plan'], ['Implante dental','Bajo evaluación'], ['Urgencia dental','Bajo evaluación']],
    'payment_title' => 'Plan explicado antes de avanzar.',
    'payment_text' => 'Tratamientos como ortodoncia, implantes y rehabilitación requieren evaluación. El paciente recibe un plan con etapas, opciones y presupuesto.',
    'payment_items' => ['Presupuesto antes del tratamiento', 'Opciones de pago configurables', 'Comunicación simple y sin lenguaje técnico'],
    'reviews_kicker' => 'Opiniones',
    'reviews_title' => 'La confianza viene de quienes ya fueron atendidos.',
    'reviews' => [
      ['Mariana Silva', 'Expliqué que tenía miedo al dentista y fueron muy cuidadosos desde la primera consulta. Me sentí escuchada y segura.'],
      ['Ricardo Costa', 'Me gustó que explicaran el tratamiento y el presupuesto antes de empezar. Todo fue claro y sin presión.'],
      ['Ana Pereira', 'Llevé a mi hijo y la consulta fue tranquila. El equipo tuvo mucha paciencia y explicó todo de forma simple.'],
    ],
    'booking_kicker' => 'Reserva',
    'booking_title' => 'Da el primer paso hacia una sonrisa más saludable.',
    'booking_text' => 'Completa la solicitud y envíala directamente a WhatsApp con el mensaje listo. La clínica confirma el mejor horario.',
    'form' => ['name'=>'Nombre','phone'=>'Teléfono','email'=>'Email','treatment'=>'Tratamiento','doctor'=>'Profesional','date'=>'Fecha preferida','message'=>'Mensaje','choose'=>'Elige...','no_preference'=>'Sin preferencia','placeholder'=>'Ej: tengo dolor, prefiero horario de mañana, quiero presupuesto de ortodoncia...','submit'=>'Enviar solicitud por WhatsApp','close'=>'Cerrar'],
    'contact_kicker' => 'Contacto',
    'contact_title' => 'Llega fácil. Reserva aún más fácil.',
    'contact_labels' => ['Dirección','Horario','Teléfono','Email'],
    'week_label' => 'Lunes a Viernes',
    'sat_label' => 'Sábado',
    'directions' => 'Cómo llegar',
    'footer_template' => 'DemoFirst Template',
    'admin_link' => 'Panel demo',
    'modal_title' => 'Reservar cita',
    'modal_text' => 'Completa los datos y envía el mensaje listo a WhatsApp.',
    'wa_message' => '¡Hola! Quiero reservar una cita en Clínica Sorriso Gaia.',
    'urgent_message' => '¡Hola! Tengo una urgencia dental y necesito orientación.',
    'marquee' => ['Reserva por WhatsApp', 'Plan explicado antes de avanzar', 'Urgencias dentales', 'Adultos y niños', 'Clínica moderna'],
    'admin_agenda' => [
      ['09:00', 'Carla Mendes', 'Limpieza dental', 'Dra. Sofia', 'Confirmada'],
      ['10:30', 'Pedro Alves', 'Evaluación implante', 'Dr. João', 'Confirmada'],
      ['12:00', 'Rita Moreira', 'Ortodoncia', 'Dra. Ana', 'Pendiente'],
      ['15:30', 'Miguel Rocha', 'Urgencia dental', 'Dr. João', 'Prioritario'],
      ['17:00', 'Inês Carvalho', 'Blanqueamiento', 'Dra. Ana', 'Confirmada'],
    ],
    'admin_leads' => [['WhatsApp', 'Urgencia dental', '6 min', 'bi-whatsapp'], ['Website', 'Ortodoncia', '18 min', 'bi-globe2'], ['Instagram', 'Blanqueamiento', '1 h', 'bi-instagram']],
    'admin' => ['title'=>'Panel Demo Clínica Dental','text'=>'Área visual para presentar cómo una clínica podría gestionar citas, tratamientos, equipo médico y solicitudes de reserva.','back'=>'Volver al sitio','dashboard'=>'Dashboard','agenda'=>'Agenda','treatments'=>'Tratamientos','leads'=>'Leads','stats'=>['Citas hoy','Nuevas solicitudes','Tasa ocupación','Próxima cita'],'today'=>'Agenda del día','received'=>'Leads recibidos','active'=>'Tratamientos activos','config'=>'Configuración rápida','online'=>'Online','view'=>'Ver página pública'],
  ],
  'en' => [
    'html_lang' => 'en',
    'lang_label' => 'English',
    'seo_desc' => 'Dentist in Vila Nova de Gaia. Modern dental clinic with WhatsApp booking, personalized treatments, emergencies, orthodontics, implants, cleaning and whitening.',
    'og_title_suffix' => 'Dentist in Vila Nova de Gaia',
    'og_desc' => 'Fast booking, clear plan and stress-free care for adults and children.',
    'brand_subtitle' => 'Modern dental clinic',
    'nav' => ['Home', 'Treatments', 'Team', 'Prices', 'Contact'],
    'call' => 'Call',
    'whatsapp' => 'WhatsApp',
    'book' => 'Book appointment',
    'book_whatsapp' => 'Book via WhatsApp',
    'view_treatments' => 'View treatments',
    'hero_kicker' => 'Dentist in Vila Nova de Gaia',
    'hero_title' => 'Take care of your smile without stress, with a clear plan and fast booking.',
    'hero_text' => 'Dental care for adults and children, treatments explained with transparency and a team ready to guide you at every step.',
    'hero_card_title' => 'Your first visit starts with listening.',
    'hero_card_text' => 'We assess your smile, explain your options and create a plan adjusted to your time, comfort and budget.',
    'rating' => 'average rating',
    'pills' => [['+10','years of experience'], ['Family','adults and children'], ['No surprises','plan explained first'], ['Today','WhatsApp guidance']],
    'trust' => ['Strict hygiene', 'Digital technology', 'Human care', 'Accessible location', 'Adults and children', 'Fast booking'],
    'treatments_kicker' => 'Treatments',
    'treatments_title' => 'Quickly find the care your smile needs.',
    'treatments_text' => 'Sales-focused cards: clear problem, objective solution and call to action for every treatment.',
    'treatments' => [
      ['Dental Implants', 'Replace missing teeth safely, chew with confidence again and receive a clear plan before moving forward.', 'Assessment required', 'Personalized plan', 'bi-shield-plus', 'Book assessment'],
      ['Orthodontics', 'Fixed braces and clear aligners to straighten your smile with close and predictable follow-up.', 'From €45/month', 'Personalized plan', 'bi-braces', 'I want straighter teeth'],
      ['Teeth Whitening', 'Improve smile brightness with professional guidance, correct indication and a safe protocol.', 'From €180', '60 min', 'bi-stars', 'Learn more'],
      ['Dental Cleaning', 'Prevention, oral hygiene and tartar removal to keep gums healthy and avoid future problems.', 'From €45', '30 min', 'bi-droplet', 'Book cleaning'],
      ['Pediatric Dentistry', 'Calm dental visits for children, with simple language, patience and prevention from early age.', 'From €35', '30 min', 'bi-balloon-heart', 'Book for child'],
      ['Dental Emergencies', 'Pain, infection, broken tooth or discomfort? Talk to us for fast guidance.', 'Assessment required', 'Priority', 'bi-lightning-charge', 'I have an emergency'],
    ],
    'urgent_kicker' => 'Dental emergency',
    'urgent_title' => 'Tooth pain or unexpected discomfort?',
    'urgent_text' => 'When patients are in pain, they do not want to search around. This block turns the page into immediate WhatsApp or phone contact.',
    'urgent_cta' => 'Talk now on WhatsApp',
    'urgent_call' => 'Call now',
    'urgent_points' => ['Pain or infection', 'Broken tooth', 'Swelling or bleeding', 'Fast guidance'],
    'confidence_kicker' => 'Why choose us',
    'confidence_title' => 'Confidence before, during and after the appointment.',
    'confidence_text' => 'A strong dental clinic does not only show treatments. It shows care, communication, hygiene and predictability. Patients need to know they will be welcomed and well informed.',
    'confidence_cta' => 'Talk to the clinic',
    'confidence_items' => [
      ['Experienced team', 'Professionals organized by specialty and prepared to explain every step.', 'bi-person-check'],
      ['Comfortable environment', 'Calm reception, clean rooms and an experience without feeling rushed.', 'bi-hospital'],
      ['Personalized plan', 'Treatment adjusted to the case, goal, budget and availability of each patient.', 'bi-clipboard2-pulse'],
      ['Visible hygiene', 'Clear sterilization protocols, organized materials and care in every detail.', 'bi-shield-lock'],
    ],
    'about_kicker' => 'About the clinic',
    'about_title' => 'Modern in technology. Human in care.',
    'about_p1' => 'At {brand}, we combine experience, technology and close follow-up to offer safe, comfortable and personalized dental treatments.',
    'about_p2' => 'Our mission is to help every patient smile with confidence, from a simple cleaning to more advanced treatments such as orthodontics, implants and oral rehabilitation.',
    'about_stats' => [['+10', 'years experience'], ['3', 'clinical areas'], ['100%', 'plan explained']],
    'team_kicker' => 'Medical team',
    'team_title' => 'Professionals with clear specialties and close care.',
    'team_text' => 'Patients know who will treat them, the area of expertise and how to book the right appointment.',
    'doctors' => [
      ['Dr. Ana Martins', 'Dentist · Orthodontics and dental aesthetics', 'Aligners, fixed braces and follow-up for adults and young patients with clear planning.', 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=900&q=88'],
      ['Dr. João Ferreira', 'Dentist · Implantology and oral surgery', 'Oral rehabilitation, implants and advanced treatments focused on clinical safety.', 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=900&q=88'],
      ['Dr. Sofia Almeida', 'Dentist · Pediatric dentistry and prevention', 'Appointments for children and families with calm communication and a welcoming environment.', 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=900&q=88'],
    ],
    'mark' => 'Book',
    'cases_kicker' => 'Results and environment',
    'cases_title' => 'Results shown with care, without exaggeration.',
    'cases_text' => 'A section designed to show treatment possibilities, clinical environment and technology in an elegant and safe way.',
    'cases_note' => 'Note for real clients: clinical results should only be used with patient permission and according to applicable professional rules.',
    'cases' => [
      ['Whitening', 'A brighter smile with professional follow-up and previous assessment.', 'https://images.unsplash.com/photo-1609840114035-3c981b782dfe?auto=format&fit=crop&w=900&q=88'],
      ['Clinical follow-up', 'Appointment explained calmly, with clear options and a patient-adjusted plan.', 'https://images.unsplash.com/photo-1606811841689-23dfddce3e95?auto=format&fit=crop&w=900&q=88'],
      ['Modern environment', 'Clean rooms, visible technology and a comfortable experience.', 'https://images.unsplash.com/photo-1629909615184-74f495363b67?auto=format&fit=crop&w=900&q=88'],
    ],
    'prices_kicker' => 'Prices',
    'prices_title' => 'Clear values to guide the first decision.',
    'prices_text' => 'Reference prices help patients quickly understand the likely investment before clinical assessment.',
    'prices' => [['Assessment consultation','€35'], ['Dental cleaning','€45'], ['Teeth whitening','€180'], ['Child consultation','€35'], ['Dental restoration','From €55'], ['Orthodontics','Plan required'], ['Dental implant','Assessment required'], ['Dental emergency','Assessment required']],
    'payment_title' => 'Plan explained before moving forward.',
    'payment_text' => 'Treatments such as orthodontics, implants and rehabilitation require assessment. The patient receives a plan with stages, options and budget.',
    'payment_items' => ['Budget before treatment', 'Configurable payment options', 'Simple communication without technical language'],
    'reviews_kicker' => 'Reviews',
    'reviews_title' => 'Trust comes from people already treated.',
    'reviews' => [
      ['Mariana Silva', 'I explained that I was afraid of the dentist and they were very careful from the first appointment. I felt heard and safe.'],
      ['Ricardo Costa', 'I liked that they explained the treatment and budget before starting. Everything was clear and without pressure.'],
      ['Ana Pereira', 'I took my son and the appointment was calm. The team was very patient and explained everything simply.'],
    ],
    'booking_kicker' => 'Booking',
    'booking_title' => 'Take the first step toward a healthier smile.',
    'booking_text' => 'Fill in the request and send it directly to WhatsApp with a ready message. The clinic confirms the best time.',
    'form' => ['name'=>'Name','phone'=>'Phone','email'=>'Email','treatment'=>'Treatment','doctor'=>'Professional','date'=>'Preferred date','message'=>'Message','choose'=>'Choose...','no_preference'=>'No preference','placeholder'=>'Ex: I have pain, prefer morning, want an orthodontics quote...','submit'=>'Send request via WhatsApp','close'=>'Close'],
    'contact_kicker' => 'Contact',
    'contact_title' => 'Easy to reach. Even easier to book.',
    'contact_labels' => ['Address','Opening hours','Phone','Email'],
    'week_label' => 'Monday to Friday',
    'sat_label' => 'Saturday',
    'directions' => 'Get directions',
    'footer_template' => 'DemoFirst Template',
    'admin_link' => 'Demo panel',
    'modal_title' => 'Book appointment',
    'modal_text' => 'Fill in your details and send the prepared message to WhatsApp.',
    'wa_message' => 'Hello! I want to book an appointment at Clínica Sorriso Gaia.',
    'urgent_message' => 'Hello! I have a dental emergency and need guidance.',
    'marquee' => ['WhatsApp booking', 'Plan explained first', 'Dental emergencies', 'Adults and children', 'Modern clinic'],
    'admin_agenda' => [
      ['09:00', 'Carla Mendes', 'Dental Cleaning', 'Dr. Sofia', 'Confirmed'],
      ['10:30', 'Pedro Alves', 'Implant Assessment', 'Dr. João', 'Confirmed'],
      ['12:00', 'Rita Moreira', 'Orthodontics', 'Dr. Ana', 'Pending'],
      ['15:30', 'Miguel Rocha', 'Dental Emergency', 'Dr. João', 'Priority'],
      ['17:00', 'Inês Carvalho', 'Whitening', 'Dr. Ana', 'Confirmed'],
    ],
    'admin_leads' => [['WhatsApp', 'Dental emergency', '6 min', 'bi-whatsapp'], ['Website', 'Orthodontics', '18 min', 'bi-globe2'], ['Instagram', 'Whitening', '1 h', 'bi-instagram']],
    'admin' => ['title'=>'Dental Clinic Demo Panel','text'=>'Visual area to show how a clinic could manage appointments, treatments, medical team and booking requests.','back'=>'Back to website','dashboard'=>'Dashboard','agenda'=>'Schedule','treatments'=>'Treatments','leads'=>'Leads','stats'=>['Appointments today','New requests','Occupancy rate','Next appointment'],'today'=>'Today schedule','received'=>'Received leads','active'=>'Active treatments','config'=>'Quick setup','online'=>'Online','view'=>'View public page'],
  ],
];

$supportedLangs = ['pt', 'es', 'en'];
$lang = strtolower($_GET['lang'] ?? 'pt');
if (!in_array($lang, $supportedLangs, true)) { $lang = 'pt'; }
$t = $copy[$lang];
$isAdmin = isset($_GET['demo']) && $_GET['demo'] === 'admin';
$phoneHref = 'tel:' . str_replace([' ', '—', '-'], '', $brand['phone']);
$whatsappLink = 'https://wa.me/' . $brand['whatsapp'] . '?text=' . rawurlencode($t['wa_message']);
$urgentWhatsappLink = 'https://wa.me/' . $brand['whatsapp'] . '?text=' . rawurlencode($t['urgent_message']);

function e($value) { return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8'); }
function site_url($admin = false, $anchor = '', $forcedLang = null) {
  global $lang;
  $params = ['lang' => $forcedLang ?: $lang];
  if ($admin) { $params['demo'] = 'admin'; }
  return '?' . http_build_query($params) . $anchor;
}
function txt($value, $brandName = '') { return str_replace('{brand}', $brandName, $value); }
function status_class($status) {
  $s = strtolower((string) $status);
  if (strpos($s, 'confirm') !== false) { return 'ok'; }
  if (strpos($s, 'prior') !== false || strpos($s, 'urgent') !== false) { return 'urgent'; }
  return 'wait';
}
?>
<!DOCTYPE html>
<html lang="<?= e($t['html_lang']) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= e($t['seo_desc']) ?>">
  <meta name="theme-color" content="#eaf8fb">
  <meta property="og:title" content="<?= e($brand['name']) ?> · <?= e($t['og_title_suffix']) ?>">
  <meta property="og:description" content="<?= e($t['og_desc']) ?>">
  <meta property="og:image" content="<?= e($brand['og_image']) ?>">
  <meta property="og:type" content="website">
  <title><?= e($brand['name']) ?> · <?= e($t['og_title_suffix']) ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <script type="application/ld+json">
  <?= json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Dentist',
    'name' => $brand['name'],
    'image' => $brand['og_image'],
    'telephone' => $brand['phone'],
    'email' => $brand['email'],
    'address' => $brand['address'],
    'openingHours' => ['Mo-Fr 09:00-19:00', 'Sa 09:00-13:00'],
    'priceRange' => '€€',
  ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
  </script>

  <style>
    :root {
      --navy: #0d3b66;
      --navy-2: #092c4d;
      --aqua: #1fb6c9;
      --aqua-2: #b9f2f8;
      --mint: #69d8bf;
      --cream: #fff9f0;
      --paper: #ffffff;
      --soft: #f3fbfd;
      --soft-2: #edf8fb;
      --text: #17324a;
      --muted: #627789;
      --danger: #f47b65;
      --line: rgba(13, 59, 102, .12);
      --line-strong: rgba(13, 59, 102, .22);
      --shadow: 0 24px 70px rgba(13, 59, 102, .12);
      --radius: 28px;
      --max: 1180px;
      --font-body: 'Inter', system-ui, sans-serif;
      --font-head: 'Plus Jakarta Sans', system-ui, sans-serif;
    }

    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      margin: 0;
      color: var(--text);
      background:
        radial-gradient(circle at 12% 4%, rgba(31,182,201,.16), transparent 32rem),
        radial-gradient(circle at 92% 20%, rgba(105,216,191,.16), transparent 28rem),
        linear-gradient(180deg, #f7fdff 0%, #ffffff 45%, #f6fbfd 100%);
      font-family: var(--font-body);
      overflow-x: hidden;
    }
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      z-index: -2;
      opacity: .32;
      pointer-events: none;
      background-image:
        linear-gradient(rgba(13,59,102,.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(13,59,102,.035) 1px, transparent 1px);
      background-size: 64px 64px;
      mask-image: linear-gradient(180deg, #000 0%, transparent 78%);
    }
    body::after {
      content: '';
      position: fixed;
      inset: -25%;
      z-index: -3;
      pointer-events: none;
      opacity: .55;
      background:
        radial-gradient(circle at 18% 16%, rgba(31,182,201,.28), transparent 16rem),
        radial-gradient(circle at 72% 28%, rgba(105,216,191,.22), transparent 18rem),
        radial-gradient(circle at 78% 76%, rgba(13,59,102,.12), transparent 20rem);
      animation: ambientMove 18s ease-in-out infinite alternate;
    }

    a { color: inherit; text-decoration: none; }
    img { display: block; max-width: 100%; }
    button, input, select, textarea { font: inherit; }
    ::selection { background: rgba(31,182,201,.24); }

    .wrap { width: min(var(--max), calc(100% - 40px)); margin-inline: auto; }
    .muted { color: var(--muted); }
    .progress-bar { position: fixed; inset: 0 auto auto 0; height: 3px; width: 0; z-index: 200; background: linear-gradient(90deg, var(--aqua), var(--mint)); box-shadow: 0 0 24px rgba(31,182,201,.65); }
    .bg-orb { position: fixed; z-index: -1; width: 220px; height: 220px; border-radius: 999px; background: rgba(31,182,201,.12); filter: blur(8px); pointer-events: none; animation: floatOrb 9s ease-in-out infinite; }
    .bg-orb.one { left: -90px; top: 18%; }
    .bg-orb.two { right: -80px; top: 58%; animation-delay: -3s; background: rgba(105,216,191,.14); }

    .kicker { display: inline-flex; align-items: center; gap: 10px; color: var(--aqua); font-weight: 900; text-transform: uppercase; letter-spacing: .16em; font-size: .76rem; }
    .kicker::before { content: ''; width: 34px; height: 2px; border-radius: 999px; background: var(--aqua); }

    .btn { position: relative; isolation: isolate; overflow: hidden; display: inline-flex; align-items: center; justify-content: center; gap: 9px; min-height: 48px; padding: 0 20px; border-radius: 999px; border: 1px solid transparent; cursor: pointer; font-weight: 900; white-space: nowrap; transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease, background .18s ease; }
    .btn::after { content: ''; position: absolute; inset: -80% auto -80% -40%; width: 42%; background: linear-gradient(90deg, transparent, rgba(255,255,255,.65), transparent); transform: rotate(18deg) translateX(-120%); transition: transform .55s ease; z-index: -1; }
    .btn:hover { transform: translateY(-2px); }
    .btn:hover::after { transform: rotate(18deg) translateX(420%); }
    .btn-primary { background: linear-gradient(135deg, var(--aqua), var(--mint)); color: #05263c; box-shadow: 0 18px 42px rgba(31,182,201,.24); }
    .btn-primary.pulse { animation: ctaPulse 2.4s ease-in-out infinite; }
    .btn-navy { background: var(--navy); color: #fff; box-shadow: 0 18px 42px rgba(13,59,102,.18); }
    .btn-light { background: #fff; color: var(--navy); border-color: var(--line); box-shadow: 0 16px 36px rgba(13,59,102,.08); }
    .btn-soft { background: rgba(255,255,255,.74); color: var(--navy); border-color: var(--line); }
    .btn-urgent { background: linear-gradient(135deg, #ff927c, #ffd36f); color: #2e140d; box-shadow: 0 18px 42px rgba(244,123,101,.22); }

    .site-header { position: fixed; inset: 0 0 auto 0; height: 78px; z-index: 80; background: rgba(255,255,255,.76); border-bottom: 1px solid rgba(13,59,102,.10); backdrop-filter: blur(18px); transition: height .25s ease, box-shadow .25s ease, background .25s ease; }
    .site-header.scrolled { height: 68px; background: rgba(255,255,255,.9); box-shadow: 0 18px 46px rgba(13,59,102,.08); }
    .nav-shell { height: 100%; display: flex; align-items: center; justify-content: space-between; gap: 18px; }
    .brand { display: inline-flex; align-items: center; gap: 12px; min-width: max-content; }
    .brand-mark { width: 46px; height: 46px; display: grid; place-items: center; border-radius: 16px; color: var(--navy); background: linear-gradient(145deg, #fff, #dff8fb); border: 1px solid rgba(31,182,201,.30); box-shadow: 0 12px 30px rgba(31,182,201,.18); font-weight: 900; animation: logoBreath 4.8s ease-in-out infinite; }
    .brand strong { display: block; font-family: var(--font-head); line-height: 1; color: var(--navy); }
    .brand small { display: block; color: var(--muted); font-size: .74rem; margin-top: 4px; }
    .main-nav { display: flex; align-items: center; gap: 2px; }
    .main-nav a { padding: 10px 12px; border-radius: 999px; color: var(--muted); font-size: .88rem; font-weight: 800; transition: .18s ease; }
    .main-nav a:hover, .main-nav a.active { color: var(--navy); background: rgba(31,182,201,.10); }
    .nav-actions { display: flex; align-items: center; gap: 10px; }
    .lang-switch { display: inline-flex; align-items: center; gap: 4px; padding: 4px; border-radius: 999px; background: rgba(255,255,255,.76); border: 1px solid var(--line); box-shadow: 0 12px 28px rgba(13,59,102,.07); }
    .lang-switch a { display: grid; place-items: center; min-width: 38px; height: 34px; padding: 0 8px; border-radius: 999px; font-size: .76rem; font-weight: 950; color: var(--muted); }
    .lang-switch a.active { color: #05263c; background: linear-gradient(135deg, var(--aqua), var(--mint)); }
    .menu-toggle { display: none; width: 46px; height: 46px; border-radius: 999px; border: 1px solid var(--line); color: var(--navy); background: #fff; }

    .mobile-menu { display: none; position: fixed; top: 78px; left: 14px; right: 14px; z-index: 79; background: rgba(255,255,255,.96); border: 1px solid var(--line); border-radius: 24px; box-shadow: var(--shadow); padding: 12px; transform-origin: top; animation: menuDrop .22s ease both; }
    .mobile-menu.open { display: grid; gap: 6px; }
    .mobile-menu a, .mobile-menu button { justify-content: flex-start; padding: 14px; border-radius: 16px; font-weight: 900; color: var(--navy); background: transparent; border: 0; }
    .mobile-menu .mobile-lang { display: flex; gap: 6px; padding: 8px; }
    .mobile-menu .mobile-lang a { flex: 1; justify-content: center; background: var(--soft); }
    .mobile-menu .mobile-lang a.active { background: linear-gradient(135deg, var(--aqua), var(--mint)); color: #05263c; }

    .hero { min-height: 100svh; padding: 126px 0 64px; display: grid; align-items: center; position: relative; }
    .hero-grid { display: grid; grid-template-columns: 1.02fr .98fr; gap: 50px; align-items: center; }
    .hero-copy h1 { margin: 18px 0 18px; color: var(--navy); font-family: var(--font-head); font-size: clamp(2.7rem, 5.4vw, 5.7rem); line-height: .95; letter-spacing: -.055em; max-width: 820px; }
    .hero-copy p { margin: 0; max-width: 660px; color: var(--muted); font-size: clamp(1rem, 1.3vw, 1.18rem); line-height: 1.78; }
    .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 30px; }
    .hero-trust { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-top: 36px; max-width: 820px; }
    .hero-pill { padding: 16px; border-radius: 22px; background: rgba(255,255,255,.75); border: 1px solid var(--line); box-shadow: 0 12px 32px rgba(13,59,102,.06); transition: transform .2s ease, box-shadow .2s ease; }
    .hero-pill:hover { transform: translateY(-4px); box-shadow: 0 22px 50px rgba(13,59,102,.10); }
    .hero-pill strong { display: block; color: var(--navy); font-family: var(--font-head); font-size: 1.25rem; margin-bottom: 5px; }
    .hero-pill span { color: var(--muted); font-weight: 700; font-size: .88rem; line-height: 1.35; }
    .hero-visual { position: relative; min-height: 630px; perspective: 1200px; }
    .hero-photo { position: absolute; inset: 0; overflow: hidden; border-radius: 42px; border: 1px solid rgba(13,59,102,.12); background: var(--soft); box-shadow: var(--shadow); transform: rotateX(var(--rx, 0deg)) rotateY(var(--ry, 0deg)); transition: transform .18s ease; }
    .hero-photo img { width: 100%; height: 100%; object-fit: cover; transform: scale(1.08); animation: heroZoom 14s ease-in-out infinite alternate; }
    .hero-photo::after { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, transparent 40%, rgba(13,59,102,.72)); }
    .hero-card { position: absolute; left: -22px; bottom: 28px; width: min(410px, calc(100% - 20px)); padding: 22px; border-radius: 28px; background: rgba(255,255,255,.88); border: 1px solid rgba(255,255,255,.72); box-shadow: 0 24px 60px rgba(13,59,102,.16); backdrop-filter: blur(14px); animation: floatCard 5s ease-in-out infinite; }
    .hero-card b { display: block; color: var(--navy); font-family: var(--font-head); font-size: 1.15rem; margin-bottom: 8px; }
    .hero-card span { display: block; color: var(--muted); line-height: 1.55; }
    .hero-floating { position: absolute; top: 32px; right: -18px; display: grid; gap: 8px; padding: 18px; border-radius: 26px; background: var(--navy); color: #fff; box-shadow: 0 24px 58px rgba(13,59,102,.22); animation: floatBadge 4.2s ease-in-out infinite; }
    .hero-floating strong { font-family: var(--font-head); font-size: 2.2rem; line-height: 1; }
    .hero-floating small { opacity: .78; font-weight: 700; }
    .sparkle { position: absolute; width: 44px; height: 44px; display: grid; place-items: center; border-radius: 16px; background: rgba(255,255,255,.82); border: 1px solid rgba(31,182,201,.22); color: var(--aqua); box-shadow: 0 18px 42px rgba(13,59,102,.08); }
    .sparkle.one { left: 26px; top: 48px; animation: toothFloat 5.5s ease-in-out infinite; }
    .sparkle.two { right: 42px; bottom: 148px; animation: toothFloat 6.2s ease-in-out infinite reverse; }

    .marquee { border-block: 1px solid var(--line); background: rgba(255,255,255,.62); overflow: hidden; }
    .marquee-track { display: flex; width: max-content; animation: marquee 22s linear infinite; }
    .marquee-group { display: flex; align-items: center; gap: 14px; padding: 15px 14px; }
    .marquee-item { display: inline-flex; align-items: center; gap: 10px; color: var(--navy); font-weight: 950; white-space: nowrap; }
    .marquee-item i { color: var(--aqua); }

    .trust-strip { border-bottom: 1px solid var(--line); background: rgba(255,255,255,.55); }
    .trust-grid { display: grid; grid-template-columns: repeat(6, 1fr); }
    .trust-item { min-height: 92px; display: flex; align-items: center; gap: 12px; padding: 18px; border-right: 1px solid var(--line); color: var(--muted); font-weight: 800; transition: color .2s ease, background .2s ease; }
    .trust-item:last-child { border-right: 0; }
    .trust-item:hover { color: var(--navy); background: rgba(31,182,201,.08); }
    .trust-item i { color: var(--aqua); font-size: 1.25rem; }

    section { padding: 98px 0; }
    .section-head { display: grid; grid-template-columns: .7fr 1.3fr; align-items: end; gap: 36px; margin-bottom: 42px; }
    .section-head h2 { margin: 0; color: var(--navy); font-family: var(--font-head); font-size: clamp(2.1rem, 4vw, 4.2rem); line-height: .98; letter-spacing: -.045em; max-width: 820px; }
    .section-head p { margin: 16px 0 0; color: var(--muted); line-height: 1.7; max-width: 650px; }

    .treatment-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
    .treatment-card { position: relative; display: grid; min-height: 335px; padding: 24px; border-radius: 30px; background: rgba(255,255,255,.82); border: 1px solid var(--line); box-shadow: 0 18px 46px rgba(13,59,102,.07); overflow: hidden; transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease; }
    .treatment-card::before { content: ''; position: absolute; inset: auto 18px 0 18px; height: 4px; border-radius: 999px 999px 0 0; background: linear-gradient(90deg, var(--aqua), var(--mint)); opacity: .75; }
    .treatment-card::after { content: ''; position: absolute; width: 150px; height: 150px; right: -72px; top: -72px; border-radius: 999px; background: rgba(31,182,201,.12); transition: .25s ease; }
    .treatment-card:hover { transform: translateY(-8px) rotateX(1.5deg); box-shadow: 0 30px 76px rgba(13,59,102,.14); border-color: rgba(31,182,201,.34); }
    .treatment-card:hover::after { transform: scale(1.5); background: rgba(105,216,191,.16); }
    .treatment-icon { position: relative; z-index: 1; width: 58px; height: 58px; display: grid; place-items: center; border-radius: 20px; color: var(--navy); background: #e9fbfd; border: 1px solid rgba(31,182,201,.24); font-size: 1.35rem; transition: transform .2s ease; }
    .treatment-card:hover .treatment-icon { transform: rotate(-6deg) scale(1.05); }
    .treatment-card h3 { margin: 20px 0 10px; color: var(--navy); font-family: var(--font-head); font-size: 1.28rem; }
    .treatment-card p { margin: 0; color: var(--muted); line-height: 1.65; }
    .treatment-meta { display: flex; gap: 8px; flex-wrap: wrap; align-self: end; margin-top: 18px; }
    .chip { display: inline-flex; align-items: center; min-height: 32px; padding: 0 11px; border-radius: 999px; background: var(--soft); color: var(--navy); border: 1px solid var(--line); font-weight: 900; font-size: .78rem; }
    .mini-cta { align-self: end; margin-top: 14px; color: var(--aqua); font-weight: 950; display: inline-flex; align-items: center; gap: 8px; border: 0; background: transparent; padding: 0; cursor: pointer; }

    .urgent-section { padding-top: 40px; }
    .urgent-panel { position: relative; overflow: hidden; display: grid; grid-template-columns: 1fr auto; gap: 22px; align-items: center; padding: 34px; border-radius: 36px; background: linear-gradient(135deg, #fff9f0, #e9fbfd); border: 1px solid rgba(244,123,101,.20); box-shadow: var(--shadow); }
    .urgent-panel::before { content: ''; position: absolute; right: -90px; top: -120px; width: 320px; height: 320px; border-radius: 50%; background: rgba(244,123,101,.13); animation: floatOrb 7s ease-in-out infinite; }
    .urgent-panel h2 { margin: 12px 0 12px; color: var(--navy); font-family: var(--font-head); font-size: clamp(2rem, 3.6vw, 4rem); line-height: .98; letter-spacing: -.045em; }
    .urgent-panel p { margin: 0; color: var(--muted); line-height: 1.72; max-width: 720px; }
    .urgent-actions { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 22px; }
    .urgent-list { display: grid; gap: 10px; min-width: 280px; }
    .urgent-list span { display: flex; align-items: center; gap: 10px; padding: 12px 14px; border-radius: 18px; background: rgba(255,255,255,.72); border: 1px solid var(--line); color: var(--navy); font-weight: 900; }
    .urgent-list i { color: var(--danger); }

    .confidence-layout { display: grid; grid-template-columns: .9fr 1.1fr; gap: 30px; align-items: stretch; }
    .confidence-panel { padding: 34px; border-radius: 34px; background: var(--navy); color: #fff; box-shadow: var(--shadow); position: relative; overflow: hidden; }
    .confidence-panel::after { content: ''; position: absolute; inset: auto -60px -120px auto; width: 300px; height: 300px; border-radius: 999px; background: rgba(31,182,201,.24); animation: floatOrb 8s ease-in-out infinite alternate; }
    .confidence-panel > * { position: relative; z-index: 1; }
    .confidence-panel h2 { margin: 16px 0 16px; font-family: var(--font-head); font-size: clamp(2rem, 3.6vw, 4rem); line-height: .98; letter-spacing: -.045em; }
    .confidence-panel p { color: rgba(255,255,255,.78); line-height: 1.75; }
    .confidence-list { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; }
    .confidence-item { min-height: 156px; padding: 20px; border-radius: 26px; background: rgba(255,255,255,.82); border: 1px solid var(--line); box-shadow: 0 16px 40px rgba(13,59,102,.06); transition: transform .2s ease, box-shadow .2s ease; }
    .confidence-item:hover { transform: translateY(-6px); box-shadow: 0 28px 70px rgba(13,59,102,.12); }
    .confidence-item i { color: var(--aqua); font-size: 1.4rem; }
    .confidence-item h3 { margin: 14px 0 8px; color: var(--navy); font-family: var(--font-head); font-size: 1.05rem; }
    .confidence-item p { margin: 0; color: var(--muted); line-height: 1.55; font-size: .94rem; }

    .about-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 34px; align-items: center; }
    .about-photo { min-height: 590px; overflow: hidden; border-radius: 38px; border: 1px solid var(--line); box-shadow: var(--shadow); background: var(--soft); }
    .about-photo img { width: 100%; height: 100%; object-fit: cover; transform: scale(1.04); transition: transform .8s ease; }
    .about-photo:hover img { transform: scale(1.11); }
    .about-copy { padding: 38px; border-radius: 38px; background: rgba(255,255,255,.78); border: 1px solid var(--line); }
    .about-copy h2 { margin: 16px 0 18px; color: var(--navy); font-family: var(--font-head); font-size: clamp(2rem, 3.6vw, 3.9rem); line-height: .98; letter-spacing: -.045em; }
    .about-copy p { color: var(--muted); line-height: 1.8; }
    .about-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-top: 24px; }
    .about-stat { padding: 16px; border-radius: 22px; background: var(--soft); border: 1px solid var(--line); }
    .about-stat strong { display: block; color: var(--navy); font-family: var(--font-head); font-size: 1.5rem; }
    .about-stat span { color: var(--muted); font-size: .78rem; font-weight: 800; }

    .team-grid, .cases-grid, .reviews-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
    .doctor-card, .case-card { overflow: hidden; border-radius: 32px; background: #fff; border: 1px solid var(--line); box-shadow: 0 18px 46px rgba(13,59,102,.08); transition: transform .22s ease, box-shadow .22s ease; }
    .doctor-card:hover, .case-card:hover { transform: translateY(-8px); box-shadow: 0 30px 74px rgba(13,59,102,.13); }
    .doctor-photo { height: 320px; background: var(--soft); overflow: hidden; }
    .doctor-photo img { width: 100%; height: 100%; object-fit: cover; object-position: center top; transition: transform .65s ease; }
    .doctor-card:hover .doctor-photo img { transform: scale(1.08); }
    .doctor-info { padding: 24px; }
    .doctor-info h3 { margin: 0 0 6px; color: var(--navy); font-family: var(--font-head); font-size: 1.28rem; }
    .doctor-info strong { display: block; color: var(--aqua); margin-bottom: 12px; }
    .doctor-info p { margin: 0 0 18px; color: var(--muted); line-height: 1.6; }

    .case-card img { width: 100%; height: 260px; object-fit: cover; transition: transform .65s ease; }
    .case-card:hover img { transform: scale(1.08); }
    .case-card div { padding: 22px; }
    .case-card h3 { margin: 0 0 8px; color: var(--navy); font-family: var(--font-head); }
    .case-card p { margin: 0; color: var(--muted); line-height: 1.6; }
    .case-note { margin-top: 18px; color: var(--muted); font-size: .92rem; line-height: 1.6; }

    .price-layout { display: grid; grid-template-columns: 1fr .78fr; gap: 24px; align-items: start; }
    .price-board { padding: 34px; border-radius: 34px; background: #fff; border: 1px solid var(--line); box-shadow: var(--shadow); }
    .price-line { display: grid; grid-template-columns: auto 1fr auto; gap: 12px; align-items: end; padding: 15px 0; border-bottom: 1px dashed rgba(13,59,102,.20); }
    .price-line:first-child { padding-top: 0; }
    .price-line:last-child { padding-bottom: 0; border-bottom: 0; }
    .price-line span:first-child { font-weight: 900; color: var(--navy); }
    .price-line span:nth-child(2) { border-bottom: 1px dotted rgba(13,59,102,.22); transform: translateY(-5px); }
    .price-line strong { color: var(--aqua); font-family: var(--font-head); }
    .payment-box { padding: 30px; border-radius: 34px; background: linear-gradient(145deg, #e9fbfd, #fff); border: 1px solid rgba(31,182,201,.22); position: sticky; top: 92px; }
    .payment-box h3 { margin: 0 0 12px; color: var(--navy); font-family: var(--font-head); font-size: 1.8rem; }
    .payment-box p { color: var(--muted); line-height: 1.7; }
    .payment-box ul { margin: 20px 0 0; padding: 0; list-style: none; display: grid; gap: 12px; }
    .payment-box li { display: flex; gap: 10px; color: var(--text); font-weight: 800; }
    .payment-box i { color: var(--aqua); }

    .reviews-band { background: linear-gradient(135deg, rgba(13,59,102,.96), rgba(31,182,201,.82)); color: #fff; position: relative; overflow: hidden; }
    .reviews-band::before { content: ''; position: absolute; inset: -40% -20% auto auto; width: 520px; height: 520px; border-radius: 50%; background: rgba(255,255,255,.10); animation: floatOrb 9s ease-in-out infinite; }
    .reviews-band .section-head h2, .reviews-band .kicker { color: #fff; }
    .reviews-band .kicker::before { background: #fff; }
    .review-card { padding: 26px; border-radius: 30px; background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.20); backdrop-filter: blur(10px); transition: transform .22s ease, background .22s ease; }
    .review-card:hover { transform: translateY(-8px); background: rgba(255,255,255,.18); }
    .stars { color: #ffe39b; letter-spacing: .08em; margin-bottom: 14px; }
    .review-card p { margin: 0 0 18px; line-height: 1.7; color: rgba(255,255,255,.86); }
    .review-card strong { font-family: var(--font-head); }

    .booking-section { padding-top: 120px; }
    .booking-panel { display: grid; grid-template-columns: .82fr 1.18fr; gap: 26px; padding: 26px; border-radius: 42px; border: 1px solid rgba(31,182,201,.22); background: #fff; box-shadow: var(--shadow); }
    .booking-aside { position: relative; overflow: hidden; border-radius: 32px; min-height: 520px; color: #fff; padding: 30px; display: flex; flex-direction: column; justify-content: flex-end; background: var(--navy); }
    .booking-aside::before { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, rgba(13,59,102,.08), rgba(13,59,102,.88)), url('<?= e($brand['booking_image']) ?>') center/cover; transition: transform .75s ease; }
    .booking-panel:hover .booking-aside::before { transform: scale(1.08); }
    .booking-aside > * { position: relative; z-index: 2; }
    .booking-aside h2 { margin: 0 0 12px; font-family: var(--font-head); font-size: clamp(2rem, 3.2vw, 3.4rem); line-height: 1; letter-spacing: -.04em; }
    .booking-aside p { margin: 0; color: rgba(255,255,255,.82); line-height: 1.7; }
    .booking-form { padding: 12px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; align-content: start; }
    .field { display: grid; gap: 8px; }
    .field.full { grid-column: 1 / -1; }
    .field label { color: var(--navy); font-size: .78rem; font-weight: 900; text-transform: uppercase; letter-spacing: .08em; }
    .field input, .field select, .field textarea { width: 100%; min-height: 52px; padding: 0 14px; border-radius: 17px; border: 1px solid var(--line-strong); background: #fff; color: var(--text); outline: none; transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease; }
    .field textarea { padding-top: 14px; min-height: 108px; resize: vertical; }
    .field input:focus, .field select:focus, .field textarea:focus { border-color: var(--aqua); box-shadow: 0 0 0 4px rgba(31,182,201,.13); transform: translateY(-1px); }
    .form-actions { grid-column: 1 / -1; display: flex; justify-content: flex-end; gap: 10px; flex-wrap: wrap; padding-top: 8px; }

    .contact-layout { display: grid; grid-template-columns: .78fr 1.22fr; gap: 24px; }
    .contact-card { padding: 30px; border-radius: 34px; background: #fff; border: 1px solid var(--line); box-shadow: 0 18px 46px rgba(13,59,102,.07); }
    .contact-line { display: grid; grid-template-columns: 48px 1fr; gap: 14px; padding: 17px 0; border-bottom: 1px solid var(--line); }
    .contact-line:last-child { border-bottom: 0; }
    .contact-line i { width: 48px; height: 48px; display: grid; place-items: center; border-radius: 17px; color: var(--navy); background: var(--soft); border: 1px solid rgba(31,182,201,.18); }
    .contact-line b { display: block; color: var(--navy); margin-bottom: 4px; }
    .contact-line span, .contact-line a { color: var(--muted); line-height: 1.5; }
    .contact-actions { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 20px; }
    .map-frame { min-height: 480px; border-radius: 34px; overflow: hidden; border: 1px solid var(--line); box-shadow: 0 18px 46px rgba(13,59,102,.07); }
    .map-frame iframe { width: 100%; height: 100%; min-height: 480px; border: 0; filter: saturate(.75) contrast(1.02); }

    .footer { padding: 44px 0 110px; border-top: 1px solid var(--line); color: var(--muted); background: #fff; }
    .footer-grid { display: grid; grid-template-columns: 1.1fr .9fr auto; align-items: start; gap: 24px; }
    .footer strong { color: var(--navy); font-family: var(--font-head); }
    .footer-links { display: grid; gap: 8px; }
    .footer-links a { font-weight: 800; }
    .socials { display: flex; gap: 10px; }
    .socials a { width: 42px; height: 42px; display: grid; place-items: center; border-radius: 999px; background: var(--soft); color: var(--navy); border: 1px solid var(--line); transition: transform .18s ease; }
    .socials a:hover { transform: translateY(-3px); }

    .mobile-book { display: none; position: fixed; z-index: 75; left: 14px; right: 14px; bottom: 14px; gap: 8px; }
    .mobile-book .btn { flex: 1; padding-inline: 12px; }
    .modal { position: fixed; inset: 0; z-index: 100; display: none; align-items: center; justify-content: center; padding: 20px; background: rgba(6,30,50,.52); backdrop-filter: blur(12px); }
    .modal.open { display: flex; animation: fadeIn .18s ease both; }
    .modal-panel { width: min(760px, 100%); max-height: min(860px, calc(100svh - 40px)); overflow: auto; border-radius: 34px; background: #fff; border: 1px solid var(--line); box-shadow: var(--shadow); animation: modalUp .24s ease both; }
    .modal-head { display: flex; justify-content: space-between; align-items: flex-start; gap: 18px; padding: 28px 28px 0; }
    .modal-head h2 { margin: 0 0 8px; color: var(--navy); font-family: var(--font-head); font-size: clamp(1.8rem, 4vw, 3rem); line-height: 1; letter-spacing: -.04em; }
    .modal-head p { margin: 0; color: var(--muted); line-height: 1.6; }
    .modal-close { width: 44px; height: 44px; border-radius: 999px; border: 1px solid var(--line); background: var(--soft); color: var(--navy); cursor: pointer; }
    .modal .booking-form { padding: 28px; }

    .reveal { opacity: 0; transform: translateY(24px); transition: opacity .7s ease, transform .7s ease; transition-delay: var(--delay, 0ms); }
    .reveal.is-visible { opacity: 1; transform: translateY(0); }
    .reveal-left { opacity: 0; transform: translateX(-28px); transition: opacity .75s ease, transform .75s ease; }
    .reveal-right { opacity: 0; transform: translateX(28px); transition: opacity .75s ease, transform .75s ease; }
    .reveal-left.is-visible, .reveal-right.is-visible { opacity: 1; transform: translateX(0); }

    .admin-body { min-height: 100svh; padding: 106px 0 54px; }
    .admin-shell { display: grid; grid-template-columns: 255px 1fr; gap: 18px; }
    .admin-sidebar, .admin-panel { border: 1px solid var(--line); border-radius: 30px; background: rgba(255,255,255,.86); box-shadow: 0 18px 46px rgba(13,59,102,.08); }
    .admin-sidebar { padding: 18px; height: fit-content; position: sticky; top: 98px; }
    .admin-sidebar a { display: flex; align-items: center; gap: 10px; padding: 13px 12px; border-radius: 16px; color: var(--muted); font-weight: 850; }
    .admin-sidebar a.active, .admin-sidebar a:hover { background: rgba(31,182,201,.10); color: var(--navy); }
    .admin-main { display: grid; gap: 18px; }
    .admin-hero { padding: 30px; border-radius: 32px; border: 1px solid rgba(31,182,201,.22); background: linear-gradient(135deg, #e9fbfd, #fff); box-shadow: var(--shadow); }
    .admin-hero h1 { margin: 12px 0 10px; color: var(--navy); font-family: var(--font-head); font-size: clamp(2rem, 4vw, 4.1rem); line-height: .98; letter-spacing: -.045em; }
    .admin-hero p { margin: 0; color: var(--muted); line-height: 1.65; max-width: 760px; }
    .admin-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
    .admin-stat { padding: 22px; border-radius: 26px; border: 1px solid var(--line); background: #fff; }
    .admin-stat span { color: var(--muted); text-transform: uppercase; font-size: .78rem; font-weight: 900; letter-spacing: .08em; }
    .admin-stat strong { display: block; margin-top: 8px; color: var(--navy); font-family: var(--font-head); font-size: 2rem; }
    .admin-grid { display: grid; grid-template-columns: 1.35fr .65fr; gap: 18px; }
    .admin-panel { padding: 24px; }
    .admin-panel h2 { margin: 0 0 18px; color: var(--navy); font-family: var(--font-head); }
    .agenda-row, .lead-row, .admin-treatment-row { display: grid; gap: 12px; align-items: center; padding: 14px 0; border-bottom: 1px solid var(--line); }
    .agenda-row { grid-template-columns: 72px 1fr 145px 110px; }
    .agenda-row:last-child, .lead-row:last-child, .admin-treatment-row:last-child { border-bottom: 0; }
    .agenda-time { color: var(--aqua); font-family: var(--font-head); }
    .agenda-name strong, .lead-row strong { display: block; color: var(--navy); }
    .agenda-name span, .lead-row span, .admin-treatment-row span { color: var(--muted); font-size: .9rem; }
    .pill { display: inline-flex; align-items: center; justify-content: center; min-height: 30px; padding: 0 10px; border-radius: 999px; border: 1px solid var(--line); font-size: .74rem; font-weight: 900; color: var(--navy); background: var(--soft); }
    .pill.ok { background: #dff9ec; color: #12643c; border-color: rgba(18,100,60,.18); }
    .pill.wait { background: #fff4cc; color: #7a5b00; border-color: rgba(122,91,0,.18); }
    .pill.urgent { background: #ffe2e2; color: #8d1f1f; border-color: rgba(141,31,31,.18); }
    .lead-row { grid-template-columns: 46px 1fr auto; }
    .lead-row i { width: 40px; height: 40px; display: grid; place-items: center; border-radius: 14px; color: var(--navy); background: var(--soft); }
    .admin-treatment-row { grid-template-columns: 1fr auto auto; }
    .fake-toggle { width: 48px; height: 28px; border-radius: 999px; background: rgba(105,216,191,.32); border: 1px solid rgba(105,216,191,.6); position: relative; }
    .fake-toggle::after { content: ''; position: absolute; width: 20px; height: 20px; right: 4px; top: 3px; border-radius: 50%; background: #30b98f; }

    @keyframes ambientMove { 0% { transform: translate3d(-2%, -1%, 0) scale(1); } 100% { transform: translate3d(2%, 1%, 0) scale(1.06); } }
    @keyframes floatOrb { 0%,100% { transform: translateY(0) scale(1); } 50% { transform: translateY(-22px) scale(1.04); } }
    @keyframes logoBreath { 0%,100% { transform: translateY(0); box-shadow: 0 12px 30px rgba(31,182,201,.18); } 50% { transform: translateY(-2px); box-shadow: 0 18px 38px rgba(31,182,201,.28); } }
    @keyframes ctaPulse { 0%,100% { box-shadow: 0 18px 42px rgba(31,182,201,.24); } 50% { box-shadow: 0 18px 54px rgba(31,182,201,.46); } }
    @keyframes menuDrop { from { opacity: 0; transform: translateY(-8px) scale(.98); } to { opacity: 1; transform: translateY(0) scale(1); } }
    @keyframes heroZoom { from { transform: scale(1.04); } to { transform: scale(1.12); } }
    @keyframes floatCard { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-12px); } }
    @keyframes floatBadge { 0%,100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-10px) rotate(1deg); } }
    @keyframes toothFloat { 0%,100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-18px) rotate(8deg); } }
    @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    @keyframes modalUp { from { opacity: 0; transform: translateY(22px) scale(.98); } to { opacity: 1; transform: translateY(0) scale(1); } }

    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { animation-duration: .001ms !important; animation-iteration-count: 1 !important; scroll-behavior: auto !important; transition-duration: .001ms !important; }
      .reveal, .reveal-left, .reveal-right { opacity: 1; transform: none; }
    }

    @media (max-width: 1140px) {
      .main-nav { display: none; }
      .menu-toggle { display: inline-grid; place-items: center; }
      .desktop-book { display: none; }
      .hero-grid, .confidence-layout, .about-layout, .price-layout, .booking-panel, .contact-layout, .admin-shell, .admin-grid, .urgent-panel { grid-template-columns: 1fr; }
      .hero-visual { min-height: 560px; order: -1; }
      .trust-grid { grid-template-columns: repeat(3, 1fr); }
      .section-head { grid-template-columns: 1fr; gap: 16px; }
      .admin-sidebar { position: relative; top: auto; display: grid; grid-template-columns: repeat(2,1fr); }
      .admin-stats { grid-template-columns: repeat(2,1fr); }
      .payment-box { position: static; }
    }

    @media (max-width: 780px) {
      .wrap { width: min(100% - 28px, var(--max)); }
      .site-header { height: 72px; }
      .mobile-menu { top: 72px; }
      .brand small, .desktop-lang { display: none; }
      .brand strong { font-size: .9rem; }
      .hero { padding: 98px 0 48px; min-height: auto; }
      .hero-copy h1 { font-size: clamp(2.25rem, 11vw, 3.45rem); }
      .hero-actions .btn { width: 100%; }
      .hero-trust, .treatment-grid, .team-grid, .cases-grid, .reviews-grid, .confidence-list, .about-stats { grid-template-columns: 1fr; }
      .hero-visual { min-height: 420px; }
      .hero-photo { border-radius: 30px; }
      .hero-card { left: 14px; right: 14px; bottom: 14px; width: auto; }
      .hero-floating, .sparkle.two { display: none; }
      .trust-grid { grid-template-columns: 1fr 1fr; }
      .trust-item { min-height: 72px; padding: 14px; font-size: .86rem; }
      section { padding: 74px 0; }
      .section-head h2 { font-size: clamp(1.9rem, 9vw, 2.8rem); }
      .treatment-card { min-height: auto; }
      .urgent-panel { padding: 24px; }
      .urgent-list { min-width: 0; }
      .doctor-photo { height: 270px; }
      .about-photo { min-height: 380px; }
      .booking-aside { min-height: 360px; }
      .booking-form, .modal .booking-form { grid-template-columns: 1fr; padding: 20px; }
      .form-actions .btn, .contact-actions .btn { width: 100%; }
      .map-frame, .map-frame iframe { min-height: 360px; }
      .footer-grid { grid-template-columns: 1fr; }
      .mobile-book { display: flex; }
      .admin-stats, .admin-sidebar { grid-template-columns: 1fr; }
      .agenda-row, .admin-treatment-row { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>
  <div class="progress-bar" data-progress></div>
  <div class="bg-orb one" aria-hidden="true"></div>
  <div class="bg-orb two" aria-hidden="true"></div>

  <header class="site-header" data-header>
    <div class="wrap nav-shell">
      <a class="brand" href="#inicio" aria-label="<?= e($brand['name']) ?>">
        <span class="brand-mark"><i class="bi bi-heart-pulse"></i></span>
        <span><strong><?= e($brand['name']) ?></strong><small><?= e($t['brand_subtitle']) ?></small></span>
      </a>

      <?php if (!$isAdmin): ?>
        <nav class="main-nav" aria-label="Menu principal">
          <a href="#inicio"><?= e($t['nav'][0]) ?></a>
          <a href="#tratamentos"><?= e($t['nav'][1]) ?></a>
          <a href="#equipa"><?= e($t['nav'][2]) ?></a>
          <a href="#precos"><?= e($t['nav'][3]) ?></a>
          <a href="#contacto"><?= e($t['nav'][4]) ?></a>
        </nav>
      <?php endif; ?>

      <div class="nav-actions">
        <div class="lang-switch desktop-lang" aria-label="Language selector">
          <?php foreach ($supportedLangs as $code): ?>
            <a class="<?= $code === $lang ? 'active' : '' ?>" href="<?= e(site_url($isAdmin, '', $code)) ?>"><?= strtoupper(e($code)) ?></a>
          <?php endforeach; ?>
        </div>

        <?php if ($isAdmin): ?>
          <a class="btn btn-light" href="<?= e(site_url(false)) ?>"><i class="bi bi-arrow-left"></i><?= e($t['admin']['back']) ?></a>
        <?php else: ?>
          <a class="btn btn-light desktop-book" href="<?= e($phoneHref) ?>"><i class="bi bi-telephone"></i><?= e($t['call']) ?></a>
          <a class="btn btn-navy desktop-book" href="<?= e($whatsappLink) ?>" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i><?= e($t['whatsapp']) ?></a>
          <button class="btn btn-primary desktop-book pulse" type="button" data-open-booking><i class="bi bi-calendar2-check"></i><?= e($t['book']) ?></button>
          <button class="menu-toggle" type="button" data-menu-toggle aria-label="Abrir menu"><i class="bi bi-list"></i></button>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <?php if (!$isAdmin): ?>
    <div class="mobile-menu" data-mobile-menu>
      <a href="#inicio"><?= e($t['nav'][0]) ?></a>
      <a href="#tratamentos"><?= e($t['nav'][1]) ?></a>
      <a href="#equipa"><?= e($t['nav'][2]) ?></a>
      <a href="#precos"><?= e($t['nav'][3]) ?></a>
      <a href="#contacto"><?= e($t['nav'][4]) ?></a>
      <div class="mobile-lang">
        <?php foreach ($supportedLangs as $code): ?>
          <a class="<?= $code === $lang ? 'active' : '' ?>" href="<?= e(site_url(false, '', $code)) ?>"><?= strtoupper(e($code)) ?></a>
        <?php endforeach; ?>
      </div>
      <button class="btn btn-primary" type="button" data-open-booking><i class="bi bi-calendar2-check"></i><?= e($t['book']) ?></button>
    </div>

    <main id="inicio">
      <section class="hero" data-section="inicio">
        <div class="wrap hero-grid">
          <div class="hero-copy reveal-left">
            <span class="kicker"><?= e($t['hero_kicker']) ?></span>
            <h1><?= e($t['hero_title']) ?></h1>
            <p><?= e($t['hero_text']) ?></p>
            <div class="hero-actions">
              <a class="btn btn-primary pulse" href="<?= e($whatsappLink) ?>" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i><?= e($t['book_whatsapp']) ?></a>
              <a class="btn btn-light" href="#tratamentos"><i class="bi bi-arrow-down"></i><?= e($t['view_treatments']) ?></a>
            </div>
            <div class="hero-trust">
              <?php foreach ($t['pills'] as $pill): ?>
                <div class="hero-pill reveal"><strong><?= e($pill[0]) ?></strong><span><?= e($pill[1]) ?></span></div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="hero-visual reveal-right" data-tilt aria-hidden="true">
            <div class="hero-photo"><img src="<?= e($brand['hero_image']) ?>" alt=""></div>
            <div class="sparkle one"><i class="bi bi-stars"></i></div>
            <div class="sparkle two"><i class="bi bi-heart-pulse"></i></div>
            <div class="hero-floating"><strong data-count="4.9">4.9</strong><small><?= e($t['rating']) ?></small></div>
            <div class="hero-card">
              <b><?= e($t['hero_card_title']) ?></b>
              <span><?= e($t['hero_card_text']) ?></span>
            </div>
          </div>
        </div>
      </section>

      <div class="marquee" aria-hidden="true">
        <div class="marquee-track">
          <?php for ($loop = 0; $loop < 2; $loop++): ?>
            <div class="marquee-group">
              <?php foreach ($t['marquee'] as $item): ?>
                <span class="marquee-item"><i class="bi bi-check2-circle"></i><?= e($item) ?></span>
              <?php endforeach; ?>
            </div>
          <?php endfor; ?>
        </div>
      </div>

      <div class="trust-strip">
        <div class="wrap trust-grid">
          <?php $trustIcons = ['bi-shield-check', 'bi-cpu', 'bi-heart', 'bi-geo-alt', 'bi-emoji-smile', 'bi-clock-history']; ?>
          <?php foreach ($t['trust'] as $i => $item): ?>
            <div class="trust-item reveal"><i class="bi <?= e($trustIcons[$i]) ?>"></i><?= e($item) ?></div>
          <?php endforeach; ?>
        </div>
      </div>

      <section id="tratamentos" data-section="tratamentos">
        <div class="wrap">
          <div class="section-head reveal">
            <span class="kicker"><?= e($t['treatments_kicker']) ?></span>
            <div><h2><?= e($t['treatments_title']) ?></h2><p><?= e($t['treatments_text']) ?></p></div>
          </div>

          <div class="treatment-grid">
            <?php foreach ($t['treatments'] as $treatment): ?>
              <article class="treatment-card reveal" data-tilt-card>
                <div class="treatment-icon"><i class="bi <?= e($treatment[4]) ?>"></i></div>
                <div>
                  <h3><?= e($treatment[0]) ?></h3>
                  <p><?= e($treatment[1]) ?></p>
                </div>
                <div class="treatment-meta">
                  <span class="chip"><?= e($treatment[2]) ?></span>
                  <span class="chip"><?= e($treatment[3]) ?></span>
                </div>
                <button class="mini-cta" type="button" data-open-booking data-treatment="<?= e($treatment[0]) ?>"><?= e($treatment[5]) ?><i class="bi bi-arrow-right"></i></button>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section class="urgent-section">
        <div class="wrap urgent-panel reveal">
          <div>
            <span class="kicker"><?= e($t['urgent_kicker']) ?></span>
            <h2><?= e($t['urgent_title']) ?></h2>
            <p><?= e($t['urgent_text']) ?></p>
            <div class="urgent-actions">
              <a class="btn btn-urgent pulse" href="<?= e($urgentWhatsappLink) ?>" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i><?= e($t['urgent_cta']) ?></a>
              <a class="btn btn-light" href="<?= e($phoneHref) ?>"><i class="bi bi-telephone"></i><?= e($t['urgent_call']) ?></a>
            </div>
          </div>
          <div class="urgent-list">
            <?php foreach ($t['urgent_points'] as $point): ?>
              <span><i class="bi bi-exclamation-circle"></i><?= e($point) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section id="confianca" data-section="confianca">
        <div class="wrap confidence-layout">
          <div class="confidence-panel reveal-left">
            <span class="kicker"><?= e($t['confidence_kicker']) ?></span>
            <h2><?= e($t['confidence_title']) ?></h2>
            <p><?= e($t['confidence_text']) ?></p>
            <button class="btn btn-soft" type="button" data-open-booking><i class="bi bi-chat-dots"></i><?= e($t['confidence_cta']) ?></button>
          </div>

          <div class="confidence-list">
            <?php foreach ($t['confidence_items'] as $item): ?>
              <div class="confidence-item reveal"><i class="bi <?= e($item[2]) ?>"></i><h3><?= e($item[0]) ?></h3><p><?= e($item[1]) ?></p></div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section id="sobre" data-section="sobre">
        <div class="wrap about-layout">
          <div class="about-photo reveal-left"><img src="<?= e($brand['about_image']) ?>" alt="Consultório dentário moderno"></div>
          <div class="about-copy reveal-right">
            <span class="kicker"><?= e($t['about_kicker']) ?></span>
            <h2><?= e($t['about_title']) ?></h2>
            <p><?= e(txt($t['about_p1'], $brand['name'])) ?></p>
            <p><?= e($t['about_p2']) ?></p>
            <div class="about-stats">
              <?php foreach ($t['about_stats'] as $stat): ?>
                <div class="about-stat"><strong><?= e($stat[0]) ?></strong><span><?= e($stat[1]) ?></span></div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </section>

      <section id="equipa" data-section="equipa">
        <div class="wrap">
          <div class="section-head reveal">
            <span class="kicker"><?= e($t['team_kicker']) ?></span>
            <div><h2><?= e($t['team_title']) ?></h2><p><?= e($t['team_text']) ?></p></div>
          </div>

          <div class="team-grid">
            <?php foreach ($t['doctors'] as $doctor): ?>
              <article class="doctor-card reveal" data-tilt-card>
                <div class="doctor-photo"><img src="<?= e($doctor[3]) ?>" alt="<?= e($doctor[0]) ?>"></div>
                <div class="doctor-info">
                  <h3><?= e($doctor[0]) ?></h3>
                  <strong><?= e($doctor[1]) ?></strong>
                  <p><?= e($doctor[2]) ?></p>
                  <button class="btn btn-light" type="button" data-open-booking data-doctor="<?= e($doctor[0]) ?>"><i class="bi bi-calendar2-check"></i><?= e($t['mark']) ?></button>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section id="resultados" data-section="resultados">
        <div class="wrap">
          <div class="section-head reveal">
            <span class="kicker"><?= e($t['cases_kicker']) ?></span>
            <div><h2><?= e($t['cases_title']) ?></h2><p><?= e($t['cases_text']) ?></p></div>
          </div>

          <div class="cases-grid">
            <?php foreach ($t['cases'] as $case): ?>
              <article class="case-card reveal" data-tilt-card>
                <img src="<?= e($case[2]) ?>" alt="<?= e($case[0]) ?>">
                <div><h3><?= e($case[0]) ?></h3><p><?= e($case[1]) ?></p></div>
              </article>
            <?php endforeach; ?>
          </div>
          <p class="case-note reveal"><?= e($t['cases_note']) ?></p>
        </div>
      </section>

      <section id="precos" data-section="precos">
        <div class="wrap">
          <div class="section-head reveal">
            <span class="kicker"><?= e($t['prices_kicker']) ?></span>
            <div><h2><?= e($t['prices_title']) ?></h2><p><?= e($t['prices_text']) ?></p></div>
          </div>

          <div class="price-layout">
            <div class="price-board reveal-left">
              <?php foreach ($t['prices'] as $price): ?>
                <div class="price-line"><span><?= e($price[0]) ?></span><span></span><strong><?= e($price[1]) ?></strong></div>
              <?php endforeach; ?>
            </div>
            <div class="payment-box reveal-right">
              <h3><?= e($t['payment_title']) ?></h3>
              <p><?= e($t['payment_text']) ?></p>
              <ul>
                <?php foreach ($t['payment_items'] as $item): ?>
                  <li><i class="bi bi-check2-circle"></i> <?= e($item) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section class="reviews-band">
        <div class="wrap">
          <div class="section-head reveal">
            <span class="kicker"><?= e($t['reviews_kicker']) ?></span>
            <div><h2><?= e($t['reviews_title']) ?></h2></div>
          </div>

          <div class="reviews-grid">
            <?php foreach ($t['reviews'] as $review): ?>
              <figure class="review-card reveal">
                <div class="stars">★★★★★</div>
                <p>“<?= e($review[1]) ?>”</p>
                <figcaption><strong>— <?= e($review[0]) ?></strong></figcaption>
              </figure>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section id="marcar" class="booking-section" data-section="marcar">
        <div class="wrap booking-panel reveal">
          <aside class="booking-aside">
            <span class="kicker"><?= e($t['booking_kicker']) ?></span>
            <h2><?= e($t['booking_title']) ?></h2>
            <p><?= e($t['booking_text']) ?></p>
          </aside>

          <form class="booking-form" id="bookingFormInline">
            <div class="field"><label for="inlineName"><?= e($t['form']['name']) ?></label><input id="inlineName" name="name" type="text" required autocomplete="name"></div>
            <div class="field"><label for="inlinePhone"><?= e($t['form']['phone']) ?></label><input id="inlinePhone" name="phone" type="tel" required autocomplete="tel"></div>
            <div class="field"><label for="inlineEmail"><?= e($t['form']['email']) ?></label><input id="inlineEmail" name="email" type="email" autocomplete="email"></div>
            <div class="field"><label for="inlineTreatment"><?= e($t['form']['treatment']) ?></label><select id="inlineTreatment" name="treatment" required><option value=""><?= e($t['form']['choose']) ?></option><?php foreach ($t['treatments'] as $tr): ?><option><?= e($tr[0]) ?></option><?php endforeach; ?></select></div>
            <div class="field"><label for="inlineDoctor"><?= e($t['form']['doctor']) ?></label><select id="inlineDoctor" name="doctor"><option value=""><?= e($t['form']['no_preference']) ?></option><?php foreach ($t['doctors'] as $d): ?><option><?= e($d[0]) ?></option><?php endforeach; ?></select></div>
            <div class="field"><label for="inlineDate"><?= e($t['form']['date']) ?></label><input id="inlineDate" name="date" type="date"></div>
            <div class="field full"><label for="inlineMessage"><?= e($t['form']['message']) ?></label><textarea id="inlineMessage" name="message" placeholder="<?= e($t['form']['placeholder']) ?>"></textarea></div>
            <div class="form-actions"><button class="btn btn-primary pulse" type="submit"><i class="bi bi-whatsapp"></i><?= e($t['form']['submit']) ?></button></div>
          </form>
        </div>
      </section>

      <section id="contacto" data-section="contacto">
        <div class="wrap">
          <div class="section-head reveal">
            <span class="kicker"><?= e($t['contact_kicker']) ?></span>
            <div><h2><?= e($t['contact_title']) ?></h2></div>
          </div>

          <div class="contact-layout">
            <div class="contact-card reveal-left">
              <div class="contact-line"><i class="bi bi-geo-alt"></i><div><b><?= e($t['contact_labels'][0]) ?></b><span><?= e($brand['address']) ?></span></div></div>
              <div class="contact-line"><i class="bi bi-clock"></i><div><b><?= e($t['contact_labels'][1]) ?></b><span><?= e($t['week_label']) ?> · <?= e($brand['hours_week']) ?><br><?= e($t['sat_label']) ?> · <?= e($brand['hours_sat']) ?></span></div></div>
              <div class="contact-line"><i class="bi bi-telephone"></i><div><b><?= e($t['contact_labels'][2]) ?></b><a href="<?= e($phoneHref) ?>"><?= e($brand['phone']) ?></a></div></div>
              <div class="contact-line"><i class="bi bi-envelope"></i><div><b><?= e($t['contact_labels'][3]) ?></b><a href="mailto:<?= e($brand['email']) ?>"><?= e($brand['email']) ?></a></div></div>
              <div class="contact-actions">
                <a class="btn btn-primary" href="<?= e($whatsappLink) ?>" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i><?= e($t['whatsapp']) ?></a>
                <a class="btn btn-light" href="<?= e($brand['maps']) ?>" target="_blank" rel="noopener"><i class="bi bi-signpost-2"></i><?= e($t['directions']) ?></a>
              </div>
            </div>
            <div class="map-frame reveal-right"><iframe src="<?= e($brand['map_embed']) ?>" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" title="Mapa da clínica"></iframe></div>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      <div class="wrap footer-grid">
        <div>
          <strong><?= e($brand['name']) ?></strong><br>
          <span><?= e($brand['address']) ?></span><br>
          <span>© <?= date('Y') ?> · <?= e($t['footer_template']) ?> · Alex Oliveira</span><br>
          <a href="<?= e(site_url(true)) ?>"><?= e($t['admin_link']) ?></a>
        </div>
        <div class="footer-links">
          <a href="#tratamentos"><?= e($t['nav'][1]) ?></a>
          <a href="#equipa"><?= e($t['nav'][2]) ?></a>
          <a href="#precos"><?= e($t['nav'][3]) ?></a>
          <a href="#contacto"><?= e($t['nav'][4]) ?></a>
        </div>
        <div class="socials">
          <a href="<?= e($brand['instagram']) ?>" aria-label="Instagram" target="_blank" rel="noopener"><i class="bi bi-instagram"></i></a>
          <a href="<?= e($brand['facebook']) ?>" aria-label="Facebook" target="_blank" rel="noopener"><i class="bi bi-facebook"></i></a>
          <a href="<?= e($whatsappLink) ?>" aria-label="WhatsApp" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>
    </footer>

    <div class="mobile-book">
      <a class="btn btn-light" href="<?= e($phoneHref) ?>"><i class="bi bi-telephone"></i><?= e($t['call']) ?></a>
      <a class="btn btn-primary pulse" href="<?= e($whatsappLink) ?>" target="_blank" rel="noopener"><i class="bi bi-whatsapp"></i><?= e($t['whatsapp']) ?></a>
    </div>

    <div class="modal" id="bookingModal" aria-hidden="true" role="dialog" aria-modal="true">
      <div class="modal-panel">
        <div class="modal-head">
          <div><h2><?= e($t['modal_title']) ?></h2><p><?= e($t['modal_text']) ?></p></div>
          <button class="modal-close" type="button" data-close-modal aria-label="Fechar"><i class="bi bi-x-lg"></i></button>
        </div>
        <form class="booking-form" id="bookingFormModal">
          <div class="field"><label for="modalName"><?= e($t['form']['name']) ?></label><input id="modalName" name="name" type="text" required autocomplete="name"></div>
          <div class="field"><label for="modalPhone"><?= e($t['form']['phone']) ?></label><input id="modalPhone" name="phone" type="tel" required autocomplete="tel"></div>
          <div class="field"><label for="modalEmail"><?= e($t['form']['email']) ?></label><input id="modalEmail" name="email" type="email" autocomplete="email"></div>
          <div class="field"><label for="modalTreatment"><?= e($t['form']['treatment']) ?></label><select id="modalTreatment" name="treatment" required><option value=""><?= e($t['form']['choose']) ?></option><?php foreach ($t['treatments'] as $tr): ?><option><?= e($tr[0]) ?></option><?php endforeach; ?></select></div>
          <div class="field"><label for="modalDoctor"><?= e($t['form']['doctor']) ?></label><select id="modalDoctor" name="doctor"><option value=""><?= e($t['form']['no_preference']) ?></option><?php foreach ($t['doctors'] as $d): ?><option><?= e($d[0]) ?></option><?php endforeach; ?></select></div>
          <div class="field"><label for="modalDate"><?= e($t['form']['date']) ?></label><input id="modalDate" name="date" type="date"></div>
          <div class="field full"><label for="modalMessage"><?= e($t['form']['message']) ?></label><textarea id="modalMessage" name="message" placeholder="<?= e($t['form']['placeholder']) ?>"></textarea></div>
          <div class="form-actions"><button class="btn btn-light" type="button" data-close-modal><?= e($t['form']['close']) ?></button><button class="btn btn-primary" type="submit"><i class="bi bi-whatsapp"></i><?= e($t['form']['submit']) ?></button></div>
        </form>
      </div>
    </div>

  <?php else: ?>
    <main class="admin-body">
      <div class="wrap admin-shell">
        <aside class="admin-sidebar reveal-left">
          <a class="active" href="#"><i class="bi bi-speedometer2"></i><?= e($t['admin']['dashboard']) ?></a>
          <a href="#agenda"><i class="bi bi-calendar-week"></i><?= e($t['admin']['agenda']) ?></a>
          <a href="#tratamentos-admin"><i class="bi bi-heart-pulse"></i><?= e($t['admin']['treatments']) ?></a>
          <a href="#leads"><i class="bi bi-chat-dots"></i><?= e($t['admin']['leads']) ?></a>
          <a href="<?= e(site_url(false)) ?>"><i class="bi bi-arrow-left"></i><?= e($t['admin']['back']) ?></a>
        </aside>

        <section class="admin-main" style="padding:0;">
          <div class="admin-hero reveal">
            <span class="kicker"><?= e($brand['name']) ?></span>
            <h1><?= e($t['admin']['title']) ?></h1>
            <p><?= e($t['admin']['text']) ?></p>
          </div>

          <div class="admin-stats">
            <div class="admin-stat reveal"><span><?= e($t['admin']['stats'][0]) ?></span><strong data-count="21">21</strong></div>
            <div class="admin-stat reveal"><span><?= e($t['admin']['stats'][1]) ?></span><strong data-count="8">8</strong></div>
            <div class="admin-stat reveal"><span><?= e($t['admin']['stats'][2]) ?></span><strong data-count="86">86%</strong></div>
            <div class="admin-stat reveal"><span><?= e($t['admin']['stats'][3]) ?></span><strong>10:30</strong></div>
          </div>

          <div class="admin-grid">
            <div class="admin-panel reveal" id="agenda">
              <h2><?= e($t['admin']['today']) ?></h2>
              <?php foreach ($t['admin_agenda'] as $row): ?>
                <div class="agenda-row">
                  <div class="agenda-time"><?= e($row[0]) ?></div>
                  <div class="agenda-name"><strong><?= e($row[1]) ?></strong><span><?= e($row[2]) ?></span></div>
                  <span class="muted"><?= e($row[3]) ?></span>
                  <span class="pill <?= e(status_class($row[4])) ?>"><?= e($row[4]) ?></span>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="admin-panel reveal" id="leads">
              <h2><?= e($t['admin']['received']) ?></h2>
              <?php foreach ($t['admin_leads'] as $lead): ?>
                <div class="lead-row"><i class="bi <?= e($lead[3]) ?>"></i><div><strong><?= e($lead[0]) ?></strong><span><?= e($lead[1]) ?></span></div><span class="muted"><?= e($lead[2]) ?></span></div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="admin-grid">
            <div class="admin-panel reveal" id="tratamentos-admin">
              <h2><?= e($t['admin']['active']) ?></h2>
              <?php foreach ($t['treatments'] as $treatment): ?>
                <div class="admin-treatment-row">
                  <div><strong><?= e($treatment[0]) ?></strong><span><?= e($treatment[2]) ?> · <?= e($treatment[3]) ?></span></div>
                  <span class="pill ok"><?= e($t['admin']['online']) ?></span>
                  <span class="fake-toggle" aria-hidden="true"></span>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="admin-panel reveal">
              <h2><?= e($t['admin']['config']) ?></h2>
              <div class="contact-line"><i class="bi bi-geo-alt"></i><div><b><?= e($brand['address']) ?></b><span><?= e($t['contact_labels'][0]) ?></span></div></div>
              <div class="contact-line"><i class="bi bi-clock"></i><div><b><?= e($t['week_label']) ?> · <?= e($brand['hours_week']) ?></b><span><?= e($t['contact_labels'][1]) ?></span></div></div>
              <div class="contact-line"><i class="bi bi-telephone"></i><div><b><?= e($brand['phone']) ?></b><span><?= e($t['contact_labels'][2]) ?></span></div></div>
              <a class="btn btn-primary" href="<?= e(site_url(false)) ?>" style="width:100%;margin-top:14px;"><i class="bi bi-eye"></i><?= e($t['admin']['view']) ?></a>
            </div>
          </div>
        </section>
      </div>
    </main>
  <?php endif; ?>

  <script>
    const WHATSAPP_NUMBER = <?= json_encode($brand['whatsapp']) ?>;
    const BASE_MESSAGE = <?= json_encode($t['wa_message'], JSON_UNESCAPED_UNICODE) ?>;
    const labels = <?= json_encode($t['form'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;

    const header = document.querySelector('[data-header]');
    const progress = document.querySelector('[data-progress]');
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    function onScroll() {
      const y = window.scrollY || document.documentElement.scrollTop;
      if (header) header.classList.toggle('scrolled', y > 18);
      if (progress) {
        const max = document.documentElement.scrollHeight - window.innerHeight;
        progress.style.width = `${max > 0 ? (y / max) * 100 : 0}%`;
      }
    }
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    if (menuToggle && mobileMenu) {
      menuToggle.addEventListener('click', () => mobileMenu.classList.toggle('open'));
      mobileMenu.querySelectorAll('a, button').forEach(item => item.addEventListener('click', () => mobileMenu.classList.remove('open')));
    }

    const revealItems = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
    revealItems.forEach((el, index) => {
      if (el.classList.contains('reveal')) el.style.setProperty('--delay', `${Math.min(index % 6, 5) * 70}ms`);
    });

    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
    revealItems.forEach(el => observer.observe(el));

    const bookingModal = document.getElementById('bookingModal');
    const modalTreatment = document.getElementById('modalTreatment');
    const modalDoctor = document.getElementById('modalDoctor');

    document.querySelectorAll('[data-open-booking]').forEach(button => {
      button.addEventListener('click', () => {
        if (!bookingModal) return;
        const treatment = button.getAttribute('data-treatment');
        const doctor = button.getAttribute('data-doctor');
        if (treatment && modalTreatment) modalTreatment.value = treatment;
        if (doctor && modalDoctor) modalDoctor.value = doctor;
        bookingModal.classList.add('open');
        bookingModal.setAttribute('aria-hidden', 'false');
        const first = bookingModal.querySelector('input[name="name"]');
        if (first) setTimeout(() => first.focus(), 100);
      });
    });

    document.querySelectorAll('[data-close-modal]').forEach(button => {
      button.addEventListener('click', () => closeModal());
    });

    function closeModal() {
      if (!bookingModal) return;
      bookingModal.classList.remove('open');
      bookingModal.setAttribute('aria-hidden', 'true');
    }

    if (bookingModal) {
      bookingModal.addEventListener('click', event => {
        if (event.target === bookingModal) closeModal();
      });
    }

    function sendBooking(form) {
      const data = new FormData(form);
      const lines = [BASE_MESSAGE, ''];
      ['name', 'phone', 'email', 'treatment', 'doctor', 'date', 'message'].forEach(key => {
        const value = String(data.get(key) || '').trim();
        if (value) lines.push(`${labels[key] || key}: ${value}`);
      });
      const url = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(lines.join('\n'))}`;
      window.open(url, '_blank', 'noopener');
    }

    document.querySelectorAll('#bookingFormInline, #bookingFormModal').forEach(form => {
      form.addEventListener('submit', event => {
        event.preventDefault();
        sendBooking(form);
      });
    });

    document.addEventListener('keydown', event => {
      if (event.key !== 'Escape') return;
      closeModal();
    });

    const finePointer = window.matchMedia('(pointer: fine)').matches;
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (finePointer && !reducedMotion) {
      document.querySelectorAll('[data-tilt]').forEach(area => {
        const photo = area.querySelector('.hero-photo');
        area.addEventListener('mousemove', event => {
          const rect = area.getBoundingClientRect();
          const x = (event.clientX - rect.left) / rect.width - .5;
          const y = (event.clientY - rect.top) / rect.height - .5;
          area.style.setProperty('--rx', `${y * -5}deg`);
          area.style.setProperty('--ry', `${x * 6}deg`);
          if (photo) photo.style.transform = `rotateX(${y * -5}deg) rotateY(${x * 6}deg)`;
        });
        area.addEventListener('mouseleave', () => {
          area.style.setProperty('--rx', '0deg');
          area.style.setProperty('--ry', '0deg');
          if (photo) photo.style.transform = '';
        });
      });

      document.querySelectorAll('[data-tilt-card]').forEach(card => {
        card.addEventListener('mousemove', event => {
          const rect = card.getBoundingClientRect();
          const x = (event.clientX - rect.left) / rect.width - .5;
          const y = (event.clientY - rect.top) / rect.height - .5;
          card.style.transform = `translateY(-8px) rotateX(${y * -3}deg) rotateY(${x * 4}deg)`;
        });
        card.addEventListener('mouseleave', () => { card.style.transform = ''; });
      });
    }

    const counters = document.querySelectorAll('[data-count]');
    const countObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const raw = String(el.getAttribute('data-count'));
        const target = parseFloat(raw);
        const isDecimal = raw.includes('.');
        const suffix = el.textContent.includes('%') ? '%' : '';
        let start = null;
        function animate(ts) {
          if (!start) start = ts;
          const p = Math.min((ts - start) / 900, 1);
          const value = target * (1 - Math.pow(1 - p, 3));
          el.textContent = `${isDecimal ? value.toFixed(1) : Math.round(value)}${suffix}`;
          if (p < 1) requestAnimationFrame(animate);
        }
        requestAnimationFrame(animate);
        countObserver.unobserve(el);
      });
    }, { threshold: .6 });
    counters.forEach(el => countObserver.observe(el));
  </script>
</body>
</html>
