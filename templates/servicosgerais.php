<?php
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST' ? trim($_POST['form_type'] ?? 'request') : '';

function h($value) {
  return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function active($current, $target) {
  return $current === $target ? ' active' : '';
}

function route_to($area, $page, $lang, $extra = []) {
  return '?' . http_build_query(array_merge([
    'area' => $area,
    'page' => $page,
    'lang' => $lang
  ], $extra));
}

function money($value) {
  return is_numeric($value)
    ? 'desde ' . number_format((float)$value, 0, ',', '.') . '€'
    : $value;
}

$lang = $_GET['lang'] ?? 'pt';
if (!in_array($lang, ['pt', 'es', 'en'], true)) {
  $lang = 'pt';
}

$area = $_GET['area'] ?? 'public';
if (!in_array($area, ['public', 'client', 'admin'], true)) {
  $area = 'public';
}

$page = $_GET['page'] ?? ($area === 'public' ? 'home' : 'dashboard');

$copy = [
  'pt' => [
    'brand' => 'ProFix Services',
    'tagline' => 'Property Service OS',
    'public' => 'Site',
    'client' => 'Cliente',
    'admin' => 'Operação',
    'home' => 'Início',
    'services' => 'Serviços',
    'quote' => 'Orçamento',
    'booking' => 'Agendar',
    'emergency' => 'SOS',
    'projects' => 'Obras',
    'team' => 'Equipa',
    'contact' => 'Contacto',
    'request_quote' => 'Pedir orçamento',
    'book_service' => 'Agendar serviço',
    'send' => 'Enviar pedido',
    'call' => 'Ligar agora',
    'whatsapp' => 'WhatsApp',
    'hero_title' => 'Resolva manutenção de casa e empresa por divisão, urgência e orçamento.',
    'hero_text' => 'Escolha onde está o problema, descreva com fotos e receba uma resposta organizada da equipa. Sem confusão. Sem telefonemas perdidos. Sem orçamento às cegas.',
    'name' => 'Nome',
    'phone' => 'Telefone',
    'email' => 'Email',
    'address' => 'Morada / zona',
    'message' => 'Descrição',
    'confirmation_title' => 'Ordem de serviço criada',
    'confirmation_text' => 'O pedido entrou no fluxo de demonstração com referência, prioridade e próximo passo.',
  ],
  'es' => [
    'brand' => 'ProFix Services',
    'tagline' => 'Property Service OS',
    'public' => 'Sitio',
    'client' => 'Cliente',
    'admin' => 'Operación',
    'home' => 'Inicio',
    'services' => 'Servicios',
    'quote' => 'Presupuesto',
    'booking' => 'Reservar',
    'emergency' => 'SOS',
    'projects' => 'Trabajos',
    'team' => 'Equipo',
    'contact' => 'Contacto',
    'request_quote' => 'Pedir presupuesto',
    'book_service' => 'Reservar servicio',
    'send' => 'Enviar solicitud',
    'call' => 'Llamar ahora',
    'whatsapp' => 'WhatsApp',
    'hero_title' => 'Resuelve mantenimiento de hogar y empresa por zona, urgencia y presupuesto.',
    'hero_text' => 'Elige dónde está el problema, descríbelo con fotos y recibe una respuesta organizada del equipo.',
    'name' => 'Nombre',
    'phone' => 'Teléfono',
    'email' => 'Email',
    'address' => 'Dirección / zona',
    'message' => 'Descripción',
    'confirmation_title' => 'Orden de servicio creada',
    'confirmation_text' => 'La solicitud entró en el flujo de demostración con referencia, prioridad y siguiente paso.',
  ],
  'en' => [
    'brand' => 'ProFix Services',
    'tagline' => 'Property Service OS',
    'public' => 'Site',
    'client' => 'Client',
    'admin' => 'Ops',
    'home' => 'Home',
    'services' => 'Services',
    'quote' => 'Quote',
    'booking' => 'Booking',
    'emergency' => 'SOS',
    'projects' => 'Work',
    'team' => 'Team',
    'contact' => 'Contact',
    'request_quote' => 'Request quote',
    'book_service' => 'Book service',
    'send' => 'Send request',
    'call' => 'Call now',
    'whatsapp' => 'WhatsApp',
    'hero_title' => 'Solve home and business maintenance by room, urgency and quote.',
    'hero_text' => 'Pick where the issue is, describe it with photos and get an organized response from the team.',
    'name' => 'Name',
    'phone' => 'Phone',
    'email' => 'Email',
    'address' => 'Address / area',
    'message' => 'Description',
    'confirmation_title' => 'Work order created',
    'confirmation_text' => 'The request entered the demo flow with reference, priority and next step.',
  ],
][$lang];

$services = [
  [
    'slug' => 'eletricidade',
    'room' => 'Entrada / Sala',
    'zone' => 'Energia',
    'code' => 'EL-01',
    'name' => 'Eletricidade',
    'desc' => 'Avarias, tomadas, disjuntores, iluminação, quadros e pequenos upgrades elétricos.',
    'price' => 35,
    'duration' => '45-90 min',
    'urgency' => 'Alta',
    'color' => 'blue',
    'image' => 'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&w=1200&q=84',
    'includes' => ['Diagnóstico seguro', 'Correção da avaria', 'Teste do circuito', 'Recomendação preventiva']
  ],
  [
    'slug' => 'canalizacao',
    'room' => 'Cozinha / WC',
    'zone' => 'Água',
    'code' => 'PL-02',
    'name' => 'Canalização',
    'desc' => 'Fugas, torneiras, autoclismos, sifões, lavatórios e desentupimentos leves.',
    'price' => 39,
    'duration' => '60-120 min',
    'urgency' => 'Urgente',
    'color' => 'cyan',
    'image' => 'https://images.unsplash.com/photo-1607472586893-edb57bdc0e39?auto=format&fit=crop&w=1200&q=84',
    'includes' => ['Deteção de fuga', 'Reparação ou substituição', 'Verificação de pressão', 'Limpeza da zona']
  ],
  [
    'slug' => 'pintura',
    'room' => 'Quartos / Sala',
    'zone' => 'Acabamento',
    'code' => 'PT-03',
    'name' => 'Pintura',
    'desc' => 'Pintura interior e exterior, correção de parede, primário, acabamento e limpeza final.',
    'price' => 89,
    'duration' => '1-3 dias',
    'urgency' => 'Planeado',
    'color' => 'orange',
    'image' => 'https://images.unsplash.com/photo-1562259949-e8e7689d7828?auto=format&fit=crop&w=1200&q=84',
    'includes' => ['Proteção do espaço', 'Preparação de paredes', 'Aplicação profissional', 'Limpeza final']
  ],
  [
    'slug' => 'limpeza',
    'room' => 'Casa toda',
    'zone' => 'Higiene',
    'code' => 'CL-04',
    'name' => 'Limpeza Profissional',
    'desc' => 'Limpeza pós-obra, manutenção residencial, escritórios, condomínios e espaços comerciais.',
    'price' => 49,
    'duration' => '2-6 h',
    'urgency' => 'Normal',
    'color' => 'green',
    'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1200&q=84',
    'includes' => ['Checklist por zona', 'Produtos adequados', 'Equipa equipada', 'Relatório final']
  ],
  [
    'slug' => 'jardinagem',
    'room' => 'Exterior',
    'zone' => 'Verde',
    'code' => 'GD-05',
    'name' => 'Jardinagem',
    'desc' => 'Poda, corte de relva, limpeza exterior, recolha verde e recuperação de jardim.',
    'price' => 45,
    'duration' => '2-5 h',
    'urgency' => 'Normal',
    'color' => 'green',
    'image' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=1200&q=84',
    'includes' => ['Poda e corte', 'Limpeza exterior', 'Organização do jardim', 'Recolha combinada']
  ],
  [
    'slug' => 'montagem',
    'room' => 'Quarto / Escritório',
    'zone' => 'Instalação',
    'code' => 'AS-06',
    'name' => 'Montagem de Móveis',
    'desc' => 'Móveis, suportes, prateleiras, painéis, roupeiros e pequenos ajustes de instalação.',
    'price' => 29,
    'duration' => '45-180 min',
    'urgency' => 'Rápida',
    'color' => 'dark',
    'image' => 'https://images.unsplash.com/photo-1581539250439-c96689b516dd?auto=format&fit=crop&w=1200&q=84',
    'includes' => ['Montagem cuidadosa', 'Fixação segura', 'Ajustes finais', 'Área limpa']
  ],
  [
    'slug' => 'remodelacao-leve',
    'room' => 'Obra leve',
    'zone' => 'Upgrade',
    'code' => 'RM-07',
    'name' => 'Remodelações Leves',
    'desc' => 'Pequenos melhoramentos, silicone, rodapés, reparações de parede e acabamentos.',
    'price' => 'sob orçamento',
    'duration' => '1-7 dias',
    'urgency' => 'Planeado',
    'color' => 'blue',
    'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=84',
    'includes' => ['Visita técnica', 'Plano simples', 'Materiais estimados', 'Execução faseada']
  ],
  [
    'slug' => 'condominios-empresas',
    'room' => 'Prédio / Loja',
    'zone' => 'Contrato',
    'code' => 'CO-08',
    'name' => 'Condomínios e Empresas',
    'desc' => 'Manutenção recorrente, rondas preventivas, pequenas reparações e relatórios por contrato.',
    'price' => 'mensal',
    'duration' => 'recorrente',
    'urgency' => 'Contrato',
    'color' => 'dark',
    'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=84',
    'includes' => ['Plano mensal', 'Técnico atribuído', 'Prioridade', 'Relatório simples']
  ],
];

$rooms = [
  ['key' => 'sala', 'label' => 'Sala', 'service' => 'pintura', 'x' => 17, 'y' => 24, 'note' => 'Paredes, tomadas, iluminação, montagem'],
  ['key' => 'cozinha', 'label' => 'Cozinha', 'service' => 'canalizacao', 'x' => 62, 'y' => 23, 'note' => 'Fugas, sifões, torneiras, limpeza'],
  ['key' => 'wc', 'label' => 'WC', 'service' => 'canalizacao', 'x' => 78, 'y' => 56, 'note' => 'Autoclismo, lavatório, silicone'],
  ['key' => 'quarto', 'label' => 'Quarto', 'service' => 'montagem', 'x' => 25, 'y' => 62, 'note' => 'Montagem, pintura, reparações'],
  ['key' => 'exterior', 'label' => 'Exterior', 'service' => 'jardinagem', 'x' => 56, 'y' => 76, 'note' => 'Jardim, limpeza, manutenção'],
];

$projects = [
  [
    'name' => 'Sala pronta em 48h',
    'cat' => 'Pintura',
    'place' => 'Gaia',
    'time' => '2 dias',
    'before' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=900&q=80',
    'after' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=900&q=80',
    'desc' => 'Correção de fissuras, pintura lavável e acabamento limpo.'
  ],
  [
    'name' => 'Jardim recuperado',
    'cat' => 'Jardinagem',
    'place' => 'Porto',
    'time' => '1 dia',
    'before' => 'https://images.unsplash.com/photo-1558904541-efa843a96f01?auto=format&fit=crop&w=900&q=80',
    'after' => 'https://images.unsplash.com/photo-1557429287-b2e26467fc2b?auto=format&fit=crop&w=900&q=80',
    'desc' => 'Poda, corte de relva, limpeza verde e organização exterior.'
  ],
  [
    'name' => 'Escritório operacional',
    'cat' => 'Empresa',
    'place' => 'Matosinhos',
    'time' => '3 dias',
    'before' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=900&q=80',
    'after' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=80',
    'desc' => 'Montagem, iluminação, pequenos reparos e limpeza final.'
  ],
];

$techs = [
  [
    'name' => 'Marco Silva',
    'role' => 'Multisserviços',
    'area' => 'Gaia / Porto',
    'rating' => '4.9',
    'load' => 'Livre 14:30',
    'image' => 'https://images.unsplash.com/photo-1600486913747-55e5470d6f40?auto=format&fit=crop&w=900&q=84'
  ],
  [
    'name' => 'Bruno Almeida',
    'role' => 'Eletricidade',
    'area' => 'Porto',
    'rating' => '4.8',
    'load' => 'Em rota',
    'image' => 'https://images.unsplash.com/photo-1581092795360-fd1ca04f0952?auto=format&fit=crop&w=900&q=84'
  ],
  [
    'name' => 'Tiago Rocha',
    'role' => 'Canalização',
    'area' => 'Gaia',
    'rating' => '4.9',
    'load' => 'Urgente disponível',
    'image' => 'https://images.unsplash.com/photo-1581092335878-2d9ff86ca2bf?auto=format&fit=crop&w=900&q=84'
  ],
  [
    'name' => 'Inês Costa',
    'role' => 'Coordenação',
    'area' => 'Online',
    'rating' => '5.0',
    'load' => 'Atendimento',
    'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=900&q=84'
  ],
];

$clientOrders = [
  ['id' => 'PF-4182', 'service' => 'Pintura de sala e corredor', 'status' => 'Orçamento enviado', 'progress' => 55, 'next' => 'Aprovar orçamento', 'date' => 'Hoje', 'value' => '340€'],
  ['id' => 'PF-4171', 'service' => 'Montagem de roupeiro', 'status' => 'Agendado', 'progress' => 72, 'next' => 'Técnico Marco · amanhã 10:30', 'date' => 'Amanhã', 'value' => '65€'],
  ['id' => 'PF-4106', 'service' => 'Torneira e sifão', 'status' => 'Concluído', 'progress' => 100, 'next' => 'Fatura disponível', 'date' => '02/05/2026', 'value' => '49€'],
];

$ops = [
  ['client' => 'João Ferreira', 'service' => 'Canalização', 'zone' => 'Gaia', 'urgency' => 'Urgente', 'status' => 'Novo', 'time' => '09:12', 'tech' => 'Atribuir'],
  ['client' => 'Ana Martins', 'service' => 'Pintura', 'zone' => 'Porto', 'urgency' => 'Esta semana', 'status' => 'Orçamento enviado', 'time' => '10:20', 'tech' => 'Marco'],
  ['client' => 'Condomínio Norte', 'service' => 'Manutenção', 'zone' => 'Matosinhos', 'urgency' => 'Contrato', 'status' => 'Agendado', 'time' => '11:00', 'tech' => 'Bruno'],
  ['client' => 'Carla Sousa', 'service' => 'Montagem', 'zone' => 'Gaia', 'urgency' => 'Rápida', 'status' => 'Em execução', 'time' => '14:30', 'tech' => 'Marco'],
  ['client' => 'Loja Central', 'service' => 'Limpeza', 'zone' => 'Porto', 'urgency' => 'Normal', 'status' => 'Concluído', 'time' => 'Ontem', 'tech' => 'Equipa B'],
];

$publicNav = [
  'home' => $copy['home'],
  'services' => $copy['services'],
  'quote' => $copy['quote'],
  'booking' => $copy['booking'],
  'emergency' => $copy['emergency'],
  'projects' => $copy['projects'],
  'team' => $copy['team'],
  'contact' => $copy['contact'],
];

$clientNav = [
  'dashboard' => 'Painel',
  'requests' => 'Pedidos',
  'quotes' => 'Orçamentos',
  'bookings' => 'Agenda',
  'invoices' => 'Faturas',
  'messages' => 'Mensagens',
  'profile' => 'Perfil',
];

$adminNav = [
  'dashboard' => 'Comando',
  'requests' => 'Pedidos',
  'quotes' => 'Orçamentos',
  'bookings' => 'Agenda',
  'customers' => 'Clientes',
  'technicians' => 'Técnicos',
  'services' => 'Serviços',
  'projects' => 'Obras',
  'reports' => 'Relatórios',
  'settings' => 'Definições',
];

function service_by_slug($services, $slug) {
  foreach ($services as $s) {
    if ($s['slug'] === $slug) return $s;
  }
  return $services[0];
}

function status_class($status) {
  $map = [
    'Novo' => 'blue',
    'Em análise' => 'warning',
    'Orçamento enviado' => 'primary',
    'Aguardando aprovação' => 'action',
    'Agendado' => 'success-soft',
    'Em rota' => 'dark',
    'Em execução' => 'primary-dark',
    'Concluído' => 'success',
    'Cancelado' => 'danger'
  ];
  return $map[$status] ?? 'blue';
}
?>
<!DOCTYPE html>
<html lang="<?= h($lang) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= h($copy['brand']) ?> — General Services Professional Template</title>
  <meta name="description" content="Template profissional para serviços gerais com pedido por divisão, área do cliente e painel operacional.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500;600;700;800;900&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root {
      --bg: #F6F8FA;
      --soft: #EEF2F5;
      --card: #FFFFFF;
      --text: #17212B;
      --muted: #66717D;

      --blue: #1E6BFF;
      --blue-dark: #123B7A;
      --blue-soft: #E8F1FF;

      --orange: #FF8A1F;
      --orange-dark: #E97712;
      --orange-soft: #FFF2E5;

      --graphite: #202B36;
      --graphite-2: #15202B;

      --gray: #8A96A3;
      --green: #2EAD73;
      --yellow: #F5B942;

      --border: rgba(23, 33, 43, .10);
      --shadow: rgba(23, 33, 43, .08);

      --max: 1280px;
    }

    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      font-family: Inter, system-ui, sans-serif;
      background: var(--bg);
      color: var(--text);
      overflow-x: hidden;
      line-height: 1.5;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      z-index: -3;
      background:
        radial-gradient(circle at 6% 12%, rgba(30, 107, 255, .12), transparent 24%),
        radial-gradient(circle at 93% 20%, rgba(255, 138, 31, .15), transparent 22%),
        linear-gradient(180deg, #fff, var(--bg));
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    img {
      max-width: 100%;
      display: block;
    }

    button,
    input,
    select,
    textarea {
      font: inherit;
    }

    .wrap {
      width: min(var(--max), calc(100% - 36px));
      margin: 0 auto;
    }

    .top {
      position: sticky;
      top: 0;
      z-index: 100;
      background: rgba(246, 248, 250, .88);
      backdrop-filter: blur(18px);
      border-bottom: 1px solid var(--border);
    }

    .nav {
      display: grid;
      grid-template-columns: auto 1fr auto;
      gap: 16px;
      align-items: center;
      min-height: 74px;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .brand-mark {
      width: 52px;
      height: 42px;
      border-radius: 12px;
      background: var(--graphite);
      color: #fff;
      display: grid;
      place-items: center;
      font-family: Archivo;
      font-weight: 900;
      box-shadow: 8px 8px 0 var(--orange);
      transform: skew(-7deg);
    }

    .brand strong {
      font-family: Archivo;
      font-size: 1.18rem;
      display: block;
      letter-spacing: -.04em;
      color: var(--text);
    }

    .brand small {
      display: block;
      color: var(--muted);
      font-size: .65rem;
      text-transform: uppercase;
      letter-spacing: .14em;
      font-weight: 900;
    }

    .navlinks {
      display: flex;
      justify-self: center;
      gap: 6px;
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 5px;
      overflow: auto;
      scrollbar-width: none;
      box-shadow: 0 12px 30px var(--shadow);
    }

    .navlinks::-webkit-scrollbar {
      display: none;
    }

    .navlinks a {
      white-space: nowrap;
      border-radius: 13px;
      padding: 10px 13px;
      font-size: .86rem;
      font-weight: 900;
      color: var(--muted);
    }

    .navlinks a.active,
    .navlinks a:hover {
      background: var(--blue-soft);
      color: var(--blue);
    }

    .right-tools {
      display: flex;
      gap: 8px;
      align-items: center;
    }

    .zones {
      display: flex;
      gap: 4px;
      padding: 4px;
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 16px;
    }

    .zones a {
      padding: 9px 10px;
      border-radius: 12px;
      font-size: .75rem;
      font-weight: 900;
      color: var(--muted);
      line-height: 1;
    }

    .zones a.active {
      background: var(--graphite);
      color: #fff;
    }

    .langs a {
      font-size: .75rem;
      font-weight: 900;
      color: var(--muted);
      padding: 5px;
    }

    .langs a.active {
      color: var(--blue);
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 9px;
      border: 0;
      border-radius: 14px;
      padding: 13px 17px;
      font-weight: 900;
      cursor: pointer;
      transition: .18s ease;
      text-align: center;
    }

    .btn:hover {
      transform: translateY(-2px);
    }

    .btn-blue {
      background: var(--blue);
      color: #fff;
      box-shadow: 0 18px 38px rgba(30, 107, 255, .2);
    }

    .btn-blue:hover {
      background: var(--blue-dark);
      color: #fff;
    }

    .btn-orange {
      background: var(--orange);
      color: #fff;
      box-shadow: 0 18px 38px rgba(255, 138, 31, .22);
    }

    .btn-orange:hover {
      background: var(--orange-dark);
      color: #fff;
    }

    .btn-dark {
      background: var(--graphite);
      color: #fff;
    }

    .btn-white {
      background: #fff;
      border: 1px solid var(--border);
      color: var(--text);
    }

    .btn-full {
      width: 100%;
    }

    .section {
      padding: 72px 0;
    }

    .tight {
      padding: 42px 0;
    }

    .kicker {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 999px;
      padding: 8px 12px;
      font-weight: 900;
      color: var(--blue);
      font-size: .78rem;
      box-shadow: 0 10px 24px var(--shadow);
    }

    .kicker::before {
      content: "";
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--orange);
    }

    .title {
      font-family: Archivo;
      font-size: clamp(2rem, 5vw, 4.8rem);
      line-height: .94;
      letter-spacing: -.075em;
      margin: 16px 0;
      color: var(--text);
    }

    .lead {
      font-size: clamp(1rem, 1.8vw, 1.18rem);
      color: var(--muted);
      max-width: 790px;
    }

    .muted {
      color: var(--muted);
    }

    .section-head {
      display: flex;
      align-items: end;
      justify-content: space-between;
      gap: 24px;
      margin-bottom: 26px;
    }

    .section-head h2 {
      font-family: Archivo;
      font-size: clamp(2rem, 4vw, 3.6rem);
      letter-spacing: -.06em;
      line-height: 1;
      margin: 10px 0;
      color: var(--text);
    }

    .hero {
      padding: 40px 0 58px;
    }

    .hero-system {
      display: grid;
      grid-template-columns: 360px 1fr 320px;
      gap: 18px;
      align-items: stretch;
    }

    .left-console,
    .right-console,
    .center-blueprint {
      border: 1px solid var(--border);
      background: #fff;
      border-radius: 28px;
      box-shadow: 0 24px 70px rgba(23, 33, 43, .1);
      overflow: hidden;
    }

    .left-console {
      background: var(--graphite);
      color: #fff;
      padding: 24px;
      position: relative;
    }

    .left-console::after {
      content: "";
      position: absolute;
      right: -90px;
      bottom: -90px;
      width: 240px;
      height: 240px;
      border-radius: 50%;
      background: rgba(255, 138, 31, .18);
    }

    .left-console > * {
      position: relative;
      z-index: 1;
    }

    .left-console .title {
      font-size: clamp(2.3rem, 4vw, 4rem);
      color: #fff;
    }

    .left-console .lead {
      color: rgba(255, 255, 255, .74);
    }

    .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin: 24px 0;
    }

    .confidence {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      margin-top: 28px;
    }

    .confidence div {
      padding: 13px;
      border-radius: 16px;
      background: rgba(255, 255, 255, .08);
      border: 1px solid rgba(255, 255, 255, .1);
      font-weight: 900;
      color: #fff;
    }

    .confidence span {
      display: block;
      color: rgba(255, 255, 255, .62);
      font-size: .72rem;
      text-transform: uppercase;
      letter-spacing: .08em;
    }

    .center-blueprint {
      position: relative;
      min-height: 690px;
      background: #F9FBFD;
    }

    .blueprint-head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 18px;
      border-bottom: 1px solid var(--border);
    }

    .blueprint-head b {
      font-family: Archivo;
      color: var(--text);
    }

    .blueprint-map {
      position: absolute;
      left: 22px;
      right: 22px;
      top: 78px;
      bottom: 22px;
      border-radius: 26px;
      background:
        linear-gradient(90deg, rgba(30, 107, 255, .08) 1px, transparent 1px),
        linear-gradient(0deg, rgba(30, 107, 255, .08) 1px, transparent 1px),
        #fff;
      background-size: 32px 32px;
      overflow: hidden;
      border: 1px solid var(--border);
    }

    .room {
      position: absolute;
      border: 3px solid var(--graphite);
      border-radius: 18px;
      background: rgba(255, 255, 255, .88);
      display: grid;
      place-items: center;
      text-align: center;
      font-weight: 900;
      font-family: Archivo;
      color: var(--text);
      box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .8);
    }

    .room small {
      display: block;
      font-family: Inter;
      font-size: .72rem;
      color: var(--muted);
      font-weight: 800;
    }

    .r1 {
      left: 7%;
      top: 8%;
      width: 42%;
      height: 38%;
    }

    .r2 {
      right: 7%;
      top: 8%;
      width: 37%;
      height: 34%;
    }

    .r3 {
      right: 7%;
      top: 48%;
      width: 25%;
      height: 22%;
    }

    .r4 {
      left: 7%;
      bottom: 8%;
      width: 35%;
      height: 38%;
    }

    .r5 {
      left: 46%;
      bottom: 8%;
      width: 47%;
      height: 18%;
      border-style: dashed;
    }

    .hotspot {
      position: absolute;
      z-index: 4;
      transform: translate(-50%, -50%);
      width: 44px;
      height: 44px;
      border-radius: 15px;
      background: var(--orange);
      color: #fff;
      display: grid;
      place-items: center;
      box-shadow: 0 0 0 10px rgba(255, 138, 31, .18);
      animation: pulse 2s infinite;
    }

    .hotspot.blue {
      background: var(--blue);
      box-shadow: 0 0 0 10px rgba(30, 107, 255, .16);
    }

    .hotspot.green {
      background: var(--green);
      box-shadow: 0 0 0 10px rgba(46, 173, 115, .16);
    }

    @keyframes pulse {
      70% {
        box-shadow: 0 0 0 22px rgba(255, 138, 31, 0);
      }
      100% {
        box-shadow: 0 0 0 0 rgba(255, 138, 31, 0);
      }
    }

    .room-tip {
      position: absolute;
      z-index: 5;
      left: 24px;
      right: 24px;
      bottom: 24px;
      padding: 16px;
      border-radius: 20px;
      background: rgba(32, 43, 54, .94);
      color: #fff;
      backdrop-filter: blur(12px);
      display: flex;
      justify-content: space-between;
      gap: 15px;
      align-items: center;
    }

    .room-tip b {
      font-family: Archivo;
      color: #fff;
    }

    .room-tip span {
      color: rgba(255, 255, 255, .72);
    }

    .right-console {
      padding: 18px;
    }

    .ticket-stack {
      display: grid;
      gap: 12px;
      margin-top: 16px;
    }

    .mini-ticket {
      border: 1px solid var(--border);
      border-left: 6px solid var(--blue);
      border-radius: 20px;
      padding: 14px;
      background: #fff;
    }

    .mini-ticket.orange {
      border-left-color: var(--orange);
    }

    .mini-ticket.green {
      border-left-color: var(--green);
    }

    .mini-ticket h3 {
      font-family: Archivo;
      margin: 0 0 4px;
      color: var(--text);
    }

    .mini-ticket p {
      margin: 0;
      color: var(--muted);
      font-size: .9rem;
    }

    .mini-meta {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      font-size: .8rem;
      font-weight: 900;
    }

    .mini-meta span {
      background: var(--soft);
      color: var(--text);
      padding: 6px 8px;
      border-radius: 999px;
    }

    .panel {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 28px;
      padding: 24px;
      box-shadow: 0 18px 48px var(--shadow);
    }

    .panel.dark {
      background: var(--graphite);
      color: #fff;
    }

    .panel.dark .muted,
    .panel.dark .lead {
      color: rgba(255, 255, 255, .72);
    }

    .panel.dark h1,
    .panel.dark h2,
    .panel.dark h3,
    .panel.dark strong,
    .panel.dark b {
      color: #fff;
    }

    .service-atlas {
      display: grid;
      grid-template-columns: 270px 1fr;
      gap: 18px;
    }

    .service-tabs {
      display: grid;
      gap: 9px;
    }

    .service-tabs a {
      padding: 15px;
      border-radius: 18px;
      background: #fff;
      border: 1px solid var(--border);
      font-weight: 900;
      color: var(--muted);
      display: flex;
      justify-content: space-between;
      gap: 12px;
    }

    .service-tabs a.active,
    .service-tabs a:hover {
      background: var(--graphite);
      color: #fff;
    }

    .service-detail {
      display: grid;
      grid-template-columns: 1fr 370px;
      gap: 18px;
    }

    .service-rows {
      display: grid;
      gap: 10px;
    }

    .service-row {
      display: grid;
      grid-template-columns: 70px 1fr auto;
      gap: 14px;
      align-items: center;
      padding: 14px;
      border-radius: 20px;
      border: 1px solid var(--border);
      background: #fff;
      transition: .18s;
    }

    .service-row:hover {
      transform: translateX(5px);
      border-color: rgba(30, 107, 255, .32);
    }

    .code {
      height: 52px;
      border-radius: 16px;
      background: var(--blue-soft);
      color: var(--blue);
      font-family: Archivo;
      font-weight: 900;
      display: grid;
      place-items: center;
    }

    .service-row h3 {
      font-family: Archivo;
      margin: 0;
      color: var(--text);
    }

    .service-row p {
      margin: 3px 0 0;
      color: var(--muted);
      font-size: .92rem;
    }

    .price {
      font-family: Archivo;
      color: var(--blue);
      font-weight: 900;
      white-space: nowrap;
    }

    .service-preview {
      border-radius: 24px;
      overflow: hidden;
      min-height: 100%;
      position: relative;
      background: #ddd;
    }

    .service-preview img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .service-preview::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, transparent, rgba(23, 33, 43, .75));
    }

    .preview-caption {
      position: absolute;
      z-index: 2;
      left: 18px;
      right: 18px;
      bottom: 18px;
      color: #fff;
    }

    .preview-caption h3 {
      font-family: Archivo;
      margin: 0;
      color: #fff;
    }

    .preview-caption p {
      color: rgba(255, 255, 255, .78);
    }

    .quote-layout {
      display: grid;
      grid-template-columns: 330px 1fr 300px;
      gap: 18px;
    }

    .steps {
      display: grid;
      gap: 12px;
    }

    .step {
      padding: 15px;
      border-radius: 18px;
      background: rgba(255, 255, 255, .08);
      border: 1px solid rgba(255, 255, 255, .1);
      display: grid;
      grid-template-columns: 42px 1fr;
      gap: 12px;
      align-items: center;
    }

    .step b {
      width: 42px;
      height: 42px;
      border-radius: 14px;
      background: var(--orange);
      display: grid;
      place-items: center;
      color: #fff;
    }

    .step strong {
      font-family: Archivo;
      color: #fff;
    }

    .step span {
      display: block;
      color: rgba(255, 255, 255, .72);
      font-size: .9rem;
    }

    .form-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 14px;
    }

    .field {
      display: grid;
      gap: 7px;
    }

    .field.full {
      grid-column: 1 / -1;
    }

    .field label {
      font-size: .84rem;
      font-weight: 900;
      color: var(--text);
    }

    .input,
    .select,
    .textarea {
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 13px;
      background: #FBFCFD;
      color: var(--text);
      outline: none;
    }

    .input:focus,
    .select:focus,
    .textarea:focus {
      border-color: var(--blue);
      box-shadow: 0 0 0 4px var(--blue-soft);
    }

    .summary {
      display: grid;
      gap: 10px;
    }

    .summary-line {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      padding: 12px;
      border-radius: 16px;
      background: var(--soft);
      color: var(--text);
      font-weight: 800;
    }

    .summary-line span {
      color: var(--muted);
      font-weight: 900;
    }

    .summary-line b {
      font-family: Archivo;
      color: var(--text);
      text-align: right;
    }

    .panel.dark .summary-line {
      background: rgba(255, 255, 255, .10);
      border: 1px solid rgba(255, 255, 255, .12);
      color: #fff;
    }

    .panel.dark .summary-line span {
      color: rgba(255, 255, 255, .72);
    }

    .panel.dark .summary-line b {
      color: #fff;
    }

    .service-image-panel {
      padding: 0;
      overflow: hidden;
      min-height: 560px;
    }

    .service-image-panel img {
      width: 100%;
      height: 100%;
      min-height: 560px;
      object-fit: cover;
    }

    .include-list {
      display: grid;
      gap: 10px;
    }

    .include-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      padding: 14px;
      border-radius: 16px;
      background: var(--soft);
      color: var(--text);
      font-weight: 900;
    }

    .include-item i {
      color: var(--green);
      font-size: 1.1rem;
    }

    .upload-input {
      position: absolute;
      width: 1px;
      height: 1px;
      opacity: 0;
      pointer-events: none;
    }

    .upload-box {
      width: 100%;
      min-height: 74px;
      display: grid;
      grid-template-columns: 54px minmax(0, 1fr) auto;
      align-items: center;
      gap: 14px;
      padding: 13px 16px;
      border: 1px solid var(--border);
      border-radius: 18px;
      background: #FFFFFF;
      cursor: pointer;
      transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease;
    }

    .upload-box:hover {
      border-color: rgba(30, 107, 255, .45);
      box-shadow: 0 12px 30px rgba(30, 107, 255, .10);
      transform: translateY(-1px);
    }

    .upload-icon {
      width: 48px;
      height: 48px;
      border-radius: 15px;
      display: grid;
      place-items: center;
      background: var(--blue-soft);
      color: var(--blue);
      font-size: 1.35rem;
    }

    .upload-main strong {
      display: block;
      color: var(--blue);
      font-weight: 900;
      font-size: .95rem;
    }

    .upload-main small {
      display: block;
      margin-top: 3px;
      color: var(--muted);
      font-weight: 700;
      font-size: .82rem;
    }

    .upload-status {
      max-width: 260px;
      color: var(--text);
      font-weight: 800;
      font-size: .88rem;
      text-align: right;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .sos {
      display: grid;
      grid-template-columns: 1fr .85fr;
      gap: 18px;
    }

    .sos-main {
      background: var(--orange-soft);
      border: 1px solid rgba(255, 138, 31, .25);
      border-radius: 32px;
      padding: 32px;
      position: relative;
      overflow: hidden;
    }

    .sos-main::after {
      content: "SOS";
      position: absolute;
      right: -15px;
      bottom: -26px;
      font-family: Archivo;
      font-size: 9rem;
      color: rgba(255, 138, 31, .12);
      font-weight: 900;
      letter-spacing: -.1em;
    }

    .alert-list {
      display: grid;
      gap: 10px;
    }

    .alert {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      padding: 15px;
      border-radius: 18px;
      background: #fff;
      border: 1px solid var(--border);
      font-weight: 900;
      color: var(--text);
    }

    .alert span {
      color: var(--orange);
    }

    .project-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px;
    }

    .project {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 28px;
      overflow: hidden;
      box-shadow: 0 18px 48px var(--shadow);
    }

    .ba {
      display: grid;
      grid-template-columns: 1fr 1fr;
      height: 260px;
      position: relative;
    }

    .ba::after {
      content: "ANTES / DEPOIS";
      position: absolute;
      left: 50%;
      top: 12px;
      transform: translateX(-50%);
      padding: 7px 10px;
      border-radius: 999px;
      background: #fff;
      color: var(--text);
      font-size: .68rem;
      font-weight: 900;
      box-shadow: 0 10px 24px rgba(0, 0, 0, .14);
    }

    .ba img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .project-info {
      padding: 18px;
    }

    .project-info h3 {
      font-family: Archivo;
      margin: 0;
      color: var(--text);
    }

    .tags {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin-top: 12px;
    }

    .tags span {
      background: var(--soft);
      border-radius: 999px;
      padding: 7px 10px;
      font-weight: 900;
      font-size: .78rem;
      color: var(--muted);
    }

    .tech-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
    }

    .tech {
      position: relative;
      min-height: 360px;
      border-radius: 28px;
      overflow: hidden;
      border: 1px solid var(--border);
      box-shadow: 0 18px 48px var(--shadow);
      background: #ddd;
    }

    .tech img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: .35s;
    }

    .tech:hover img {
      transform: scale(1.05);
    }

    .tech-info {
      position: absolute;
      left: 14px;
      right: 14px;
      bottom: 14px;
      border-radius: 20px;
      background: rgba(255, 255, 255, .92);
      backdrop-filter: blur(12px);
      padding: 14px;
    }

    .tech-info h3 {
      font-family: Archivo;
      margin: 0;
      color: var(--text);
    }

    .tech-info p {
      margin: 3px 0;
      color: var(--muted);
      font-weight: 800;
      font-size: .9rem;
    }

    .rating {
      display: inline-flex;
      background: var(--orange-soft);
      color: #995400;
      border-radius: 999px;
      padding: 7px 9px;
      font-weight: 900;
      margin-top: 8px;
    }

    .contact {
      display: grid;
      grid-template-columns: .9fr 1.1fr;
      gap: 18px;
    }

    .direct-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    .direct {
      display: flex;
      gap: 12px;
      align-items: center;
      padding: 15px;
      border-radius: 18px;
      background: var(--soft);
      font-weight: 900;
      color: var(--text);
    }

    .direct i {
      width: 42px;
      height: 42px;
      border-radius: 14px;
      background: #fff;
      color: var(--blue);
      display: grid;
      place-items: center;
      flex: 0 0 auto;
    }

    .map {
      height: 280px;
      border-radius: 24px;
      overflow: hidden;
      background: #ddd;
      border: 1px solid var(--border);
      margin-top: 14px;
    }

    .map iframe {
      width: 100%;
      height: 100%;
      border: 0;
    }

    .mobile-dock {
      display: none;
      position: fixed;
      left: 12px;
      right: 12px;
      bottom: 12px;
      z-index: 92;
      background: rgba(255, 255, 255, .92);
      backdrop-filter: blur(14px);
      border: 1px solid var(--border);
      box-shadow: 0 18px 46px rgba(23, 33, 43, .18);
      border-radius: 22px;
      padding: 8px;
      gap: 8px;
    }

    .mobile-dock a {
      flex: 1;
    }

    .whatsapp {
      position: fixed;
      right: 18px;
      bottom: 18px;
      z-index: 93;
      width: 62px;
      height: 62px;
      border-radius: 20px;
      background: #25D366;
      color: #fff;
      display: grid;
      place-items: center;
      font-size: 1.55rem;
      box-shadow: 0 18px 42px rgba(37, 211, 102, .34);
    }

    .dashboard {
      padding: 42px 0;
    }

    .dash-head {
      display: flex;
      justify-content: space-between;
      align-items: end;
      gap: 20px;
      margin-bottom: 20px;
    }

    .dash-head h1 {
      font-family: Archivo;
      font-size: clamp(2rem, 5vw, 4rem);
      letter-spacing: -.07em;
      margin: 0;
      color: var(--text);
    }

    .metrics {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px;
    }

    .metric {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 20px;
      box-shadow: 0 14px 34px var(--shadow);
    }

    .metric span {
      color: var(--muted);
      font-size: .78rem;
      text-transform: uppercase;
      font-weight: 900;
      letter-spacing: .05em;
    }

    .metric b {
      display: block;
      font-family: Archivo;
      font-size: 2rem;
      color: var(--text);
    }

    .client-grid,
    .admin-grid {
      display: grid;
      grid-template-columns: 1.15fr .85fr;
      gap: 18px;
      margin-top: 18px;
    }

    .orders {
      display: grid;
      gap: 12px;
    }

    .order {
      display: grid;
      grid-template-columns: 1fr auto;
      gap: 14px;
      padding: 16px;
      border-radius: 22px;
      background: #fff;
      border: 1px solid var(--border);
    }

    .order h3 {
      font-family: Archivo;
      margin: 0;
      color: var(--text);
    }

    .order p {
      margin: 4px 0 0;
      color: var(--muted);
    }

    .progress {
      height: 9px;
      background: var(--soft);
      border-radius: 999px;
      overflow: hidden;
      margin-top: 12px;
    }

    .progress i {
      display: block;
      height: 100%;
      background: var(--blue);
      border-radius: 999px;
    }

    .badge {
      display: inline-flex;
      border-radius: 999px;
      padding: 7px 10px;
      font-size: .76rem;
      font-weight: 900;
    }

    .badge.blue {
      background: var(--blue-soft);
      color: var(--blue);
    }

    .badge.primary {
      background: var(--blue);
      color: #fff;
    }

    .badge.primary-dark {
      background: var(--blue-dark);
      color: #fff;
    }

    .badge.action {
      background: var(--orange-soft);
      color: var(--orange);
    }

    .badge.warning {
      background: #FFF6D9;
      color: #9B6500;
    }

    .badge.success-soft {
      background: #E5F7EF;
      color: #1E8B5A;
    }

    .badge.success {
      background: var(--green);
      color: #fff;
    }

    .badge.danger {
      background: #FFE8E8;
      color: #C23737;
    }

    .badge.dark {
      background: var(--graphite);
      color: #fff;
    }

    .board {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 12px;
    }

    .lane {
      background: var(--soft);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 12px;
      min-height: 360px;
    }

    .lane h3 {
      font-family: Archivo;
      margin: 6px;
      color: var(--text);
    }

    .op-card {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 13px;
      margin: 10px 0;
      box-shadow: 0 10px 24px var(--shadow);
    }

    .op-card b {
      font-family: Archivo;
      color: var(--text);
    }

    .op-card span {
      display: block;
      color: var(--muted);
      font-size: .86rem;
      margin-top: 4px;
    }

    .table-wrap {
      overflow: auto;
    }

    .data {
      width: 100%;
      min-width: 780px;
      border-collapse: collapse;
    }

    .data th {
      text-align: left;
      font-size: .74rem;
      text-transform: uppercase;
      letter-spacing: .06em;
      color: var(--muted);
      padding: 12px;
      border-bottom: 1px solid var(--border);
    }

    .data td {
      padding: 13px 12px;
      border-bottom: 1px solid var(--border);
      font-weight: 700;
      color: var(--text);
    }

    .data tr:hover td {
      background: #FAFBFC;
    }

    .confirm {
      min-height: 62vh;
      display: grid;
      place-items: center;
    }

    .confirm-card {
      width: min(760px, 100%);
      text-align: center;
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 34px;
      padding: 42px;
      box-shadow: 0 28px 80px rgba(23, 33, 43, .12);
    }

    .confirm-icon {
      width: 88px;
      height: 88px;
      border-radius: 24px;
      background: var(--green);
      color: #fff;
      display: grid;
      place-items: center;
      margin: 0 auto 18px;
      font-family: Archivo;
      font-size: 2rem;
      font-weight: 900;
    }

    .confirm-card h1 {
      font-family: Archivo;
      font-size: clamp(2rem, 4vw, 3.5rem);
      line-height: 1;
      letter-spacing: -.06em;
      color: var(--text);
    }

    .ref {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      margin: 22px 0;
    }

    .ref div {
      background: var(--soft);
      border-radius: 18px;
      padding: 14px;
    }

    .ref span {
      display: block;
      color: var(--muted);
      font-size: .78rem;
      font-weight: 900;
    }

    .ref b {
      font-family: Archivo;
      color: var(--text);
    }

    .footer {
      background: var(--graphite);
      color: #fff;
      margin-top: 70px;
      padding: 54px 0 24px;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 1.4fr repeat(3, 1fr);
      gap: 30px;
    }

    .footer h3,
    .footer h4 {
      font-family: Archivo;
      color: #fff;
    }

    .footer p,
    .footer a {
      color: rgba(255, 255, 255, .72);
    }

    .footer-links {
      display: grid;
      gap: 8px;
    }

    .footer-bottom {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin-top: 34px;
      padding-top: 20px;
      border-top: 1px solid rgba(255, 255, 255, .12);
      color: rgba(255, 255, 255, .55);
    }

    @media (max-width: 1180px) {
      .nav {
        grid-template-columns: 1fr;
      }

      .right-tools {
        display: none;
      }

      .hero-system,
      .service-atlas,
      .service-detail,
      .quote-layout,
      .sos,
      .contact,
      .client-grid,
      .admin-grid {
        grid-template-columns: 1fr;
      }

      .center-blueprint {
        min-height: 650px;
      }

      .project-grid,
      .tech-grid,
      .metrics,
      .board {
        grid-template-columns: repeat(2, 1fr);
      }

      .footer-grid {
        grid-template-columns: 1fr 1fr;
      }

      .mobile-dock {
        display: flex;
      }

      .whatsapp {
        bottom: 88px;
      }

      .room-tip {
        align-items: flex-start;
        flex-direction: column;
      }

      .service-preview {
        min-height: 360px;
      }

      .service-image-panel {
        min-height: 360px;
      }

      .service-image-panel img {
        min-height: 360px;
      }
    }

    @media (max-width: 720px) {
      .wrap {
        width: calc(100% - 24px);
      }

      .title {
        font-size: 3rem;
      }

      .section {
        padding: 52px 0;
      }

      .section-head,
      .dash-head {
        align-items: flex-start;
        flex-direction: column;
      }

      .hero-system {
        display: flex;
        flex-direction: column;
      }

      .left-console,
      .center-blueprint,
      .right-console {
        border-radius: 22px;
      }

      .center-blueprint {
        min-height: 610px;
      }

      .blueprint-map {
        left: 12px;
        right: 12px;
      }

      .room {
        font-size: .82rem;
      }

      .hotspot {
        width: 38px;
        height: 38px;
      }

      .confidence,
      .form-grid,
      .project-grid,
      .tech-grid,
      .direct-grid,
      .metrics,
      .board,
      .footer-grid,
      .ref {
        grid-template-columns: 1fr;
      }

      .service-row {
        grid-template-columns: 58px 1fr;
      }

      .price {
        grid-column: 2;
      }

      .quote-layout {
        gap: 12px;
      }

      .footer-bottom {
        flex-direction: column;
      }

      .zones {
        overflow: auto;
      }

      .zones a {
        white-space: nowrap;
      }

      .upload-box {
        grid-template-columns: 48px 1fr;
      }

      .upload-status {
        grid-column: 1 / -1;
        max-width: 100%;
        text-align: left;
        padding-left: 62px;
      }
    }
  </style>
</head>

<body>
<header class="top">
  <div class="wrap nav">
    <a class="brand" href="<?= h(route_to('public', 'home', $lang)) ?>">
      <span class="brand-mark">PF</span>
      <span>
        <strong><?= h($copy['brand']) ?></strong>
        <small><?= h($copy['tagline']) ?></small>
      </span>
    </a>

    <nav class="navlinks">
      <?php
        $nav = $area === 'admin' ? $adminNav : ($area === 'client' ? $clientNav : $publicNav);
        foreach ($nav as $navPage => $label):
      ?>
        <a class="<?= active($page, $navPage) ?>" href="<?= h(route_to($area, $navPage, $lang)) ?>">
          <?= h($label) ?>
        </a>
      <?php endforeach; ?>
    </nav>

    <div class="right-tools">
      <div class="zones">
        <a class="<?= $area === 'public' ? 'active' : '' ?>" href="<?= h(route_to('public', 'home', $lang)) ?>">
          <?= h($copy['public']) ?>
        </a>
        <a class="<?= $area === 'client' ? 'active' : '' ?>" href="<?= h(route_to('client', 'dashboard', $lang)) ?>">
          <?= h($copy['client']) ?>
        </a>
        <a class="<?= $area === 'admin' ? 'active' : '' ?>" href="<?= h(route_to('admin', 'dashboard', $lang)) ?>">
          <?= h($copy['admin']) ?>
        </a>
      </div>

      <div class="langs">
        <a class="<?= $lang === 'pt' ? 'active' : '' ?>" href="<?= h(route_to($area, $page, 'pt')) ?>">PT</a>
        <a class="<?= $lang === 'es' ? 'active' : '' ?>" href="<?= h(route_to($area, $page, 'es')) ?>">ES</a>
        <a class="<?= $lang === 'en' ? 'active' : '' ?>" href="<?= h(route_to($area, $page, 'en')) ?>">EN</a>
      </div>
    </div>
  </div>
</header>

<?php if ($area === 'public'): ?>
  <a class="whatsapp" href="https://wa.me/351912345678" target="_blank" aria-label="WhatsApp">
    <i class="bi bi-whatsapp"></i>
  </a>

  <div class="mobile-dock">
    <a class="btn btn-blue" href="<?= h(route_to('public', 'quote', $lang)) ?>">
      <?= h($copy['quote']) ?>
    </a>
    <a class="btn btn-orange" href="tel:+351912345678">
      <?= h($copy['call']) ?>
    </a>
  </div>
<?php endif; ?>

<main>
<?php if ($submitted): ?>

  <section class="confirm wrap">
    <article class="confirm-card">
      <div class="confirm-icon">✓</div>
      <h1><?= h($copy['confirmation_title']) ?></h1>
      <p class="lead" style="margin:auto"><?= h($copy['confirmation_text']) ?></p>

      <div class="ref">
        <div>
          <span>Ref</span>
          <b>PF-2026-418</b>
        </div>
        <div>
          <span>Prioridade</span>
          <b>Média</b>
        </div>
        <div>
          <span>Próximo passo</span>
          <b>Triagem</b>
        </div>
      </div>

      <a class="btn btn-blue" href="<?= h(route_to('client', 'dashboard', $lang)) ?>">
        Acompanhar pedido
      </a>
    </article>
  </section>

<?php elseif ($area === 'public'): ?>

  <?php if ($page === 'home'): ?>

    <section class="hero">
      <div class="wrap hero-system">
        <aside class="left-console">
          <span class="kicker">Problem-first UX</span>
          <h1 class="title"><?= h($copy['hero_title']) ?></h1>
          <p class="lead"><?= h($copy['hero_text']) ?></p>

          <div class="hero-actions">
            <a class="btn btn-orange" href="<?= h(route_to('public', 'quote', $lang)) ?>">
              <i class="bi bi-clipboard-plus"></i>
              <?= h($copy['request_quote']) ?>
            </a>
            <a class="btn btn-white" href="<?= h(route_to('public', 'services', $lang)) ?>">
              <i class="bi bi-layers"></i>
              <?= h($copy['services']) ?>
            </a>
          </div>

          <div class="confidence">
            <div><span>Resposta</span>até 2h</div>
            <div><span>Garantia</span>90 dias</div>
            <div><span>Clientes</span>+1.200</div>
            <div><span>Área</span>Grande Porto</div>
          </div>
        </aside>

        <section class="center-blueprint">
          <div class="blueprint-head">
            <b>Escolha a divisão do problema</b>
            <span class="badge blue">Property Map</span>
          </div>

          <div class="blueprint-map">
            <div class="room r1">Sala<small>pintura / elétrica</small></div>
            <div class="room r2">Cozinha<small>água / montagem</small></div>
            <div class="room r3">WC<small>canalização</small></div>
            <div class="room r4">Quarto<small>móveis / paredes</small></div>
            <div class="room r5">Exterior<small>jardim / limpeza</small></div>

            <?php foreach ($rooms as $i => $r): ?>
              <a
                class="hotspot <?= $i === 1 ? 'blue' : ($i === 4 ? 'green' : '') ?>"
                style="left:<?= h($r['x']) ?>%;top:<?= h($r['y']) ?>%"
                href="<?= h(route_to('public', 'service', $lang, ['slug' => $r['service']])) ?>"
                title="<?= h($r['note']) ?>"
              >
                <i class="bi bi-plus-lg"></i>
              </a>
            <?php endforeach; ?>

            <div class="room-tip">
              <span>
                <b>Fluxo diferente:</b><br>
                <span>o cliente não procura card; ele marca o local do problema e abre uma ordem.</span>
              </span>
              <a class="btn btn-orange" href="<?= h(route_to('public', 'quote', $lang)) ?>">
                Abrir ordem
              </a>
            </div>
          </div>
        </section>

        <aside class="right-console">
          <span class="kicker">Fila de hoje</span>

          <div class="ticket-stack">
            <article class="mini-ticket orange">
              <h3>Fuga no WC</h3>
              <p>Prioridade alta · técnico Tiago</p>
              <div class="mini-meta">
                <span>45 min</span>
                <span>Gaia</span>
              </div>
            </article>

            <article class="mini-ticket">
              <h3>Pintura sala</h3>
              <p>Orçamento em análise</p>
              <div class="mini-meta">
                <span>48h</span>
                <span>Porto</span>
              </div>
            </article>

            <article class="mini-ticket green">
              <h3>Montagem quarto</h3>
              <p>Agendado amanhã</p>
              <div class="mini-meta">
                <span>10:30</span>
                <span>Matosinhos</span>
              </div>
            </article>
          </div>
        </aside>
      </div>
    </section>

    <section class="section">
      <div class="wrap">
        <div class="section-head">
          <div>
            <span class="kicker">Service Atlas</span>
            <h2>Serviços organizados por zona da casa.</h2>
            <p class="lead">
              Nada de catálogo igual. Aqui o serviço é lido como mapa operacional:
              divisão, código, preço, tempo e ação.
            </p>
          </div>
          <a class="btn btn-blue" href="<?= h(route_to('public', 'services', $lang)) ?>">
            Abrir atlas
          </a>
        </div>

        <div class="service-atlas">
          <nav class="service-tabs">
            <?php foreach (array_slice($services, 0, 6) as $idx => $s): ?>
              <a class="<?= $idx === 0 ? 'active' : '' ?>" href="<?= h(route_to('public', 'service', $lang, ['slug' => $s['slug']])) ?>">
                <span><?= h($s['room']) ?></span>
                <b><?= h($s['code']) ?></b>
              </a>
            <?php endforeach; ?>
          </nav>

          <div class="service-detail">
            <div class="service-rows">
              <?php foreach (array_slice($services, 0, 6) as $s): ?>
                <a class="service-row" href="<?= h(route_to('public', 'service', $lang, ['slug' => $s['slug']])) ?>">
                  <span class="code"><?= h($s['code']) ?></span>
                  <span>
                    <h3><?= h($s['name']) ?></h3>
                    <p><?= h($s['desc']) ?></p>
                  </span>
                  <b class="price"><?= h(money($s['price'])) ?></b>
                </a>
              <?php endforeach; ?>
            </div>

            <div class="service-preview">
              <img src="<?= h($services[0]['image']) ?>" alt="Serviço profissional">
              <div class="preview-caption">
                <h3>Orçamento por evidência</h3>
                <p>Fotos, urgência, morada, tipo de imóvel e estimativa clara.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="wrap sos">
        <article class="sos-main">
          <span class="kicker">SOS</span>
          <h2 class="title">Urgência sem formulário gigante.</h2>
          <p class="lead">
            O cliente envia foto, localização e tipo de problema.
            A equipa decide prioridade e rota.
          </p>

          <div class="hero-actions">
            <a class="btn btn-orange" href="<?= h(route_to('public', 'emergency', $lang)) ?>">
              Pedir ajuda urgente
            </a>
            <a class="btn btn-dark" href="tel:+351912345678">
              <?= h($copy['call']) ?>
            </a>
          </div>
        </article>

        <aside class="panel">
          <h3 style="font-family:Archivo;margin-top:0">Triagem rápida</h3>
          <div class="alert-list">
            <div class="alert"><b>Fuga de água</b><span>alta</span></div>
            <div class="alert"><b>Falha elétrica</b><span>alta</span></div>
            <div class="alert"><b>Entupimento</b><span>média</span></div>
            <div class="alert"><b>Fechadura/porta</b><span>média</span></div>
          </div>
        </aside>
      </div>
    </section>

    <section class="section">
      <div class="wrap">
        <div class="section-head">
          <div>
            <span class="kicker">Before / After</span>
            <h2>Prova visual vende serviço local.</h2>
          </div>
          <a class="btn btn-white" href="<?= h(route_to('public', 'projects', $lang)) ?>">
            Ver obras
          </a>
        </div>

        <div class="project-grid">
          <?php foreach ($projects as $p): ?>
            <article class="project">
              <div class="ba">
                <img src="<?= h($p['before']) ?>" alt="Antes">
                <img src="<?= h($p['after']) ?>" alt="Depois">
              </div>
              <div class="project-info">
                <h3><?= h($p['name']) ?></h3>
                <p class="muted"><?= h($p['desc']) ?></p>
                <div class="tags">
                  <span><?= h($p['cat']) ?></span>
                  <span><?= h($p['place']) ?></span>
                  <span><?= h($p['time']) ?></span>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

  <?php elseif ($page === 'services'): ?>

    <section class="section wrap">
      <div class="section-head">
        <div>
          <span class="kicker">Service Atlas</span>
          <h1 class="title">Serviços por divisão, código e urgência.</h1>
          <p class="lead">
            Uma navegação diferente: o cliente entende onde o problema acontece antes de escolher o serviço.
          </p>
        </div>
      </div>

      <div class="service-atlas">
        <nav class="service-tabs">
          <?php foreach ($services as $idx => $s): ?>
            <a class="<?= $idx === 0 ? 'active' : '' ?>" href="<?= h(route_to('public', 'service', $lang, ['slug' => $s['slug']])) ?>">
              <span><?= h($s['room']) ?></span>
              <b><?= h($s['code']) ?></b>
            </a>
          <?php endforeach; ?>
        </nav>

        <div class="service-detail">
          <div class="service-rows">
            <?php foreach ($services as $s): ?>
              <a class="service-row" href="<?= h(route_to('public', 'service', $lang, ['slug' => $s['slug']])) ?>">
                <span class="code"><?= h($s['code']) ?></span>
                <span>
                  <h3><?= h($s['name']) ?></h3>
                  <p><?= h($s['desc']) ?></p>
                </span>
                <b class="price"><?= h(money($s['price'])) ?></b>
              </a>
            <?php endforeach; ?>
          </div>

          <div class="service-preview">
            <img src="<?= h($services[1]['image']) ?>" alt="Serviços gerais">
            <div class="preview-caption">
              <h3>Pedido com contexto</h3>
              <p>Divisão, fotos, urgência e técnico disponível.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php elseif ($page === 'service'): ?>

    <?php $s = service_by_slug($services, $_GET['slug'] ?? 'eletricidade'); ?>

    <section class="section wrap">
      <div class="quote-layout">
        <div class="panel dark">
          <span class="kicker"><?= h($s['code']) ?></span>
          <h1 class="title" style="font-size:3.4rem"><?= h($s['name']) ?></h1>
          <p class="lead"><?= h($s['desc']) ?></p>

          <div class="summary">
            <div class="summary-line">
              <span>Divisão</span>
              <b><?= h($s['room']) ?></b>
            </div>
            <div class="summary-line">
              <span>Preço</span>
              <b><?= h(money($s['price'])) ?></b>
            </div>
            <div class="summary-line">
              <span>Duração</span>
              <b><?= h($s['duration']) ?></b>
            </div>
            <div class="summary-line">
              <span>Urgência</span>
              <b><?= h($s['urgency']) ?></b>
            </div>
          </div>

          <div class="hero-actions">
            <a class="btn btn-orange" href="<?= h(route_to('public', 'quote', $lang, ['service' => $s['slug']])) ?>">
              <?= h($copy['request_quote']) ?>
            </a>
          </div>
        </div>

        <div class="panel service-image-panel">
          <img src="<?= h($s['image']) ?>" alt="<?= h($s['name']) ?>">
        </div>

        <aside class="panel">
          <h3 style="font-family:Archivo;margin-top:0">Inclui</h3>

          <div class="include-list">
            <?php foreach ($s['includes'] as $inc): ?>
              <div class="include-item">
                <span><?= h($inc) ?></span>
                <i class="bi bi-check-lg"></i>
              </div>
            <?php endforeach; ?>
          </div>

          <a class="btn btn-blue btn-full" style="margin-top:16px" href="<?= h(route_to('public', 'booking', $lang, ['service' => $s['slug']])) ?>">
            <?= h($copy['book_service']) ?>
          </a>
        </aside>
      </div>
    </section>

  <?php elseif ($page === 'quote' || $page === 'booking'): ?>

    <section class="section wrap">
      <div class="section-head">
        <div>
          <span class="kicker"><?= $page === 'quote' ? 'Work Order Intake' : 'Scheduler' ?></span>
          <h1 class="title">
            <?= $page === 'quote' ? 'Criar ordem de serviço com fotos e prioridade.' : 'Agendar visita técnica com contexto.' ?>
          </h1>
          <p class="lead">
            A experiência parece um pedido operacional, não um formulário genérico.
          </p>
        </div>
      </div>

      <div class="quote-layout">
        <aside class="panel dark">
          <h2 style="font-family:Archivo;margin-top:0">Roteiro</h2>

          <div class="steps">
            <div class="step">
              <b>1</b>
              <div>
                <strong>Local</strong>
                <span>Divisão e morada</span>
              </div>
            </div>
            <div class="step">
              <b>2</b>
              <div>
                <strong>Evidência</strong>
                <span>Fotos e descrição</span>
              </div>
            </div>
            <div class="step">
              <b>3</b>
              <div>
                <strong>Prioridade</strong>
                <span>Urgência e data</span>
              </div>
            </div>
            <div class="step">
              <b>4</b>
              <div>
                <strong>Resposta</strong>
                <span>Orçamento ou visita</span>
              </div>
            </div>
          </div>
        </aside>

        <form class="panel" method="post" enctype="multipart/form-data">
          <input type="hidden" name="form_type" value="<?= h($page) ?>">

          <div class="form-grid">
            <div class="field">
              <label><?= h($copy['name']) ?></label>
              <input class="input" name="name" required>
            </div>

            <div class="field">
              <label><?= h($copy['phone']) ?></label>
              <input class="input" name="phone" required>
            </div>

            <div class="field">
              <label>Divisão</label>
              <select class="select" name="room">
                <option>Sala</option>
                <option>Cozinha</option>
                <option>WC</option>
                <option>Quarto</option>
                <option>Exterior</option>
                <option>Empresa / condomínio</option>
              </select>
            </div>

            <div class="field">
              <label>Serviço</label>
              <select class="select" name="service">
                <?php foreach ($services as $s): ?>
                  <option><?= h($s['name']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="field">
              <label>Urgência</label>
              <select class="select" name="urgency">
                <option>Não urgente</option>
                <option>Esta semana</option>
                <option>O mais rápido possível</option>
                <option>Urgente</option>
              </select>
            </div>

            <div class="field">
              <label>Imóvel</label>
              <select class="select" name="property_type">
                <option>Apartamento</option>
                <option>Moradia</option>
                <option>Empresa</option>
                <option>Condomínio</option>
              </select>
            </div>

            <div class="field full">
              <label><?= h($copy['address']) ?></label>
              <input class="input" name="address" placeholder="Ex: Canidelo, Vila Nova de Gaia">
            </div>

            <div class="field full">
              <label><?= h($copy['message']) ?></label>
              <textarea class="textarea" name="message" rows="5" placeholder="Descreva o problema e indique horários disponíveis."></textarea>
            </div>

            <div class="field full">
              <label>Fotos</label>

              <label class="upload-box" for="photos">
                <span class="upload-icon">
                  <i class="bi bi-cloud-arrow-up"></i>
                </span>

                <span class="upload-main">
                  <strong>Selecionar fotos</strong>
                  <small>PNG, JPG até 10MB</small>
                </span>

                <span class="upload-status" id="uploadStatus">
                  Nenhum ficheiro selecionado
                </span>
              </label>

              <input
                class="upload-input"
                id="photos"
                name="photos[]"
                type="file"
                accept="image/png,image/jpeg,image/jpg"
                multiple
              >
            </div>
          </div>

          <button class="btn btn-orange btn-full" style="margin-top:18px">
            <?= h($copy['send']) ?>
          </button>
        </form>

        <aside class="panel">
          <h3 style="font-family:Archivo;margin-top:0">Resumo</h3>

          <div class="summary">
            <div class="summary-line">
              <span>Tipo</span>
              <b><?= $page === 'quote' ? 'Orçamento' : 'Agendamento' ?></b>
            </div>
            <div class="summary-line">
              <span>Resposta</span>
              <b>até 2h</b>
            </div>
            <div class="summary-line">
              <span>Canal</span>
              <b>WhatsApp + email</b>
            </div>
            <div class="summary-line">
              <span>Próximo</span>
              <b>Triagem</b>
            </div>
          </div>
        </aside>
      </div>
    </section>

  <?php elseif ($page === 'emergency'): ?>

    <section class="section wrap">
      <div class="sos">
        <article class="sos-main">
          <span class="kicker">SOS prioritário</span>
          <h1 class="title">Se é urgente, não entra no mesmo fluxo.</h1>
          <p class="lead">
            Página própria para fuga de água, falha elétrica, entupimento,
            fechadura, porta ou dano em condomínio.
          </p>

          <div class="hero-actions">
            <a class="btn btn-orange" href="https://wa.me/351912345678" target="_blank">
              <?= h($copy['whatsapp']) ?>
            </a>
            <a class="btn btn-dark" href="tel:+351912345678">
              <?= h($copy['call']) ?>
            </a>
          </div>
        </article>

        <aside class="panel">
          <h2 style="font-family:Archivo;margin-top:0">Prioridade</h2>

          <div class="alert-list">
            <div class="alert"><b>Fuga ativa</b><span>alta</span></div>
            <div class="alert"><b>Sem eletricidade</b><span>alta</span></div>
            <div class="alert"><b>Entupimento</b><span>média</span></div>
            <div class="alert"><b>Porta/fechadura</b><span>média</span></div>
            <div class="alert"><b>Dano condomínio</b><span>contrato</span></div>
          </div>
        </aside>
      </div>
    </section>

  <?php elseif ($page === 'projects'): ?>

    <section class="section wrap">
      <div class="section-head">
        <div>
          <span class="kicker">Obras realizadas</span>
          <h1 class="title">Antes/depois com contexto.</h1>
          <p class="lead">
            A confiança vem do resultado, localidade, tipo de serviço e duração.
          </p>
        </div>
      </div>

      <div class="project-grid">
        <?php foreach ($projects as $p): ?>
          <article class="project">
            <div class="ba">
              <img src="<?= h($p['before']) ?>" alt="Antes">
              <img src="<?= h($p['after']) ?>" alt="Depois">
            </div>
            <div class="project-info">
              <h3><?= h($p['name']) ?></h3>
              <p class="muted"><?= h($p['desc']) ?></p>
              <div class="tags">
                <span><?= h($p['cat']) ?></span>
                <span><?= h($p['place']) ?></span>
                <span><?= h($p['time']) ?></span>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

  <?php elseif ($page === 'team'): ?>

    <section class="section wrap">
      <div class="section-head">
        <div>
          <span class="kicker">Equipa operacional</span>
          <h1 class="title">Técnicos com rosto, zona e especialidade.</h1>
          <p class="lead">
            Serviços gerais vendem mais quando o cliente percebe que existe equipa real, coordenação e disponibilidade.
          </p>
        </div>
      </div>

      <div class="tech-grid">
        <?php foreach ($techs as $tech): ?>
          <article class="tech">
            <img src="<?= h($tech['image']) ?>" alt="<?= h($tech['name']) ?>">
            <div class="tech-info">
              <h3><?= h($tech['name']) ?></h3>
              <p><?= h($tech['role']) ?></p>
              <p><?= h($tech['area']) ?> · <?= h($tech['load']) ?></p>
              <span class="rating">★ <?= h($tech['rating']) ?></span>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

  <?php elseif ($page === 'contact'): ?>

    <section class="section wrap">
      <div class="section-head">
        <div>
          <span class="kicker">Contacto</span>
          <h1 class="title">Fale com a coordenação antes de abrir ordem.</h1>
          <p class="lead">
            Telefone, WhatsApp, email, mapa e pedido rápido num ecrã objetivo.
          </p>
        </div>

        <a class="btn btn-orange" href="https://wa.me/351912345678" target="_blank">
          <i class="bi bi-whatsapp"></i>
          <?= h($copy['whatsapp']) ?>
        </a>
      </div>

      <div class="contact">
        <div class="panel">
          <h2 style="font-family:Archivo;margin-top:0">Canais rápidos</h2>

          <div class="direct-grid">
            <a class="direct" href="tel:+351912345678">
              <i class="bi bi-telephone"></i>
              <span>
                <b>+351 912 345 678</b><br>
                <small><?= h($copy['call']) ?></small>
              </span>
            </a>

            <a class="direct" href="https://wa.me/351912345678" target="_blank">
              <i class="bi bi-whatsapp"></i>
              <span>
                <b>WhatsApp</b><br>
                <small>Resposta rápida</small>
              </span>
            </a>

            <a class="direct" href="mailto:geral@profixservices.pt">
              <i class="bi bi-envelope"></i>
              <span>
                <b>Email</b><br>
                <small>geral@profixservices.pt</small>
              </span>
            </a>

            <div class="direct">
              <i class="bi bi-geo-alt"></i>
              <span>
                <b>Gaia / Porto</b><br>
                <small>Atendimento local</small>
              </span>
            </div>
          </div>

          <div class="map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.845891425258!2d-8.655521423409764!3d41.12536031582254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246525c5f0c3f9%3A0x80c4963cbf7de769!2sR.%20da%20B%C3%A9lgica%202450%2C%204400-046%20Vila%20Nova%20de%20Gaia!5e0!3m2!1spt-PT!2spt!4v1719078822695!5m2!1spt!2spt"
              loading="lazy">
            </iframe>
          </div>
        </div>

        <form class="panel" method="post">
          <input type="hidden" name="form_type" value="contact">

          <div class="form-grid">
            <div class="field">
              <label><?= h($copy['name']) ?></label>
              <input class="input" name="name" required>
            </div>

            <div class="field">
              <label><?= h($copy['phone']) ?></label>
              <input class="input" name="phone" required>
            </div>

            <div class="field full">
              <label>Assunto</label>
              <select class="select" name="subject">
                <option>Orçamento</option>
                <option>Urgência</option>
                <option>Agendamento</option>
                <option>Condomínio / empresa</option>
              </select>
            </div>

            <div class="field full">
              <label><?= h($copy['message']) ?></label>
              <textarea class="textarea" name="message" rows="5" required></textarea>
            </div>
          </div>

          <button class="btn btn-blue btn-full" style="margin-top:18px">
            <?= h($copy['send']) ?>
          </button>
        </form>
      </div>
    </section>

  <?php endif; ?>

<?php elseif ($area === 'client'): ?>

  <section class="dashboard wrap">
    <div class="dash-head">
      <div>
        <span class="kicker">Job Passport</span>
        <h1>Olá, João. Cada serviço tem protocolo.</h1>
        <p class="lead">
          Acompanhamento por ordem, estado, orçamento, agenda, mensagens e faturas.
        </p>
      </div>

      <a class="btn btn-orange" href="<?= h(route_to('public', 'quote', $lang)) ?>">
        Nova ordem
      </a>
    </div>

    <div class="metrics">
      <div class="metric"><span>Ativos</span><b>2</b></div>
      <div class="metric"><span>Orçamentos</span><b>1</b></div>
      <div class="metric"><span>Agendados</span><b>1</b></div>
      <div class="metric"><span>Concluídos</span><b>8</b></div>
    </div>

    <div class="client-grid">
      <div class="panel">
        <h2 style="font-family:Archivo;margin-top:0">
          <?= $page === 'dashboard' ? 'Ordens recentes' : h($clientNav[$page] ?? 'Área cliente') ?>
        </h2>

        <div class="orders">
          <?php foreach ($clientOrders as $o): ?>
            <article class="order">
              <span>
                <h3><?= h($o['service']) ?></h3>
                <p><?= h($o['id']) ?> · <?= h($o['date']) ?> · <?= h($o['next']) ?></p>
                <div class="progress">
                  <i style="width:<?= h($o['progress']) ?>%"></i>
                </div>
              </span>

              <span>
                <span class="badge <?= h(status_class($o['status'])) ?>">
                  <?= h($o['status']) ?>
                </span>
                <br>
                <b style="display:block;text-align:right;margin-top:10px"><?= h($o['value']) ?></b>
              </span>
            </article>
          <?php endforeach; ?>
        </div>
      </div>

      <aside class="panel dark">
        <h2 style="font-family:Archivo;margin-top:0">Protocolo ativo</h2>

        <div class="steps">
          <div class="step">
            <b>1</b>
            <div>
              <strong>Pedido recebido</strong>
              <span>Fotos e descrição guardadas.</span>
            </div>
          </div>

          <div class="step">
            <b>2</b>
            <div>
              <strong>Orçamento enviado</strong>
              <span>Aprovação pendente.</span>
            </div>
          </div>

          <div class="step">
            <b>3</b>
            <div>
              <strong>Agendamento</strong>
              <span>Após aprovação.</span>
            </div>
          </div>
        </div>
      </aside>
    </div>
  </section>

<?php elseif ($area === 'admin'): ?>

  <section class="dashboard wrap">
    <div class="dash-head">
      <div>
        <span class="kicker">Operations Command</span>
        <h1><?= $page === 'dashboard' ? 'Kanban operacional da equipa.' : h($adminNav[$page] ?? 'Operação') ?></h1>
        <p class="lead">
          Pedidos não aparecem como tabela morta. Entram em colunas de operação:
          novo, orçamento, agenda, execução.
        </p>
      </div>

      <a class="btn btn-blue" href="<?= h(route_to('admin', 'requests', $lang)) ?>">
        Fila completa
      </a>
    </div>

    <div class="metrics">
      <div class="metric"><span>Novos</span><b>12</b></div>
      <div class="metric"><span>Pendentes</span><b>7</b></div>
      <div class="metric"><span>Hoje</span><b>18</b></div>
      <div class="metric"><span>Receita</span><b>24.8k€</b></div>
    </div>

    <?php if ($page === 'dashboard'): ?>
      <div class="board" style="margin-top:18px">
        <div class="lane">
          <h3>Novo</h3>
          <?php foreach (array_slice($ops, 0, 1) as $o): ?>
            <div class="op-card">
              <b><?= h($o['client']) ?></b>
              <span><?= h($o['service']) ?> · <?= h($o['zone']) ?></span>
              <span class="badge blue"><?= h($o['urgency']) ?></span>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="lane">
          <h3>Orçamento</h3>
          <?php foreach (array_slice($ops, 1, 1) as $o): ?>
            <div class="op-card">
              <b><?= h($o['client']) ?></b>
              <span><?= h($o['service']) ?> · <?= h($o['zone']) ?></span>
              <span class="badge primary"><?= h($o['status']) ?></span>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="lane">
          <h3>Agenda</h3>
          <?php foreach (array_slice($ops, 2, 1) as $o): ?>
            <div class="op-card">
              <b><?= h($o['client']) ?></b>
              <span><?= h($o['service']) ?> · <?= h($o['tech']) ?></span>
              <span class="badge success-soft"><?= h($o['status']) ?></span>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="lane">
          <h3>Execução</h3>
          <?php foreach (array_slice($ops, 3, 2) as $o): ?>
            <div class="op-card">
              <b><?= h($o['client']) ?></b>
              <span><?= h($o['service']) ?> · <?= h($o['tech']) ?></span>
              <span class="badge <?= h(status_class($o['status'])) ?>"><?= h($o['status']) ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php else: ?>
      <div class="panel" style="margin-top:18px">
        <div class="table-wrap">
          <table class="data">
            <thead>
              <tr>
                <th>Cliente</th>
                <th>Serviço</th>
                <th>Zona</th>
                <th>Urgência</th>
                <th>Estado</th>
                <th>Hora</th>
                <th>Técnico</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($ops as $o): ?>
                <tr>
                  <td><?= h($o['client']) ?></td>
                  <td><?= h($o['service']) ?></td>
                  <td><?= h($o['zone']) ?></td>
                  <td><?= h($o['urgency']) ?></td>
                  <td>
                    <span class="badge <?= h(status_class($o['status'])) ?>">
                      <?= h($o['status']) ?>
                    </span>
                  </td>
                  <td><?= h($o['time']) ?></td>
                  <td><?= h($o['tech']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif; ?>
  </section>

<?php endif; ?>
</main>

<?php if ($area === 'public'): ?>
  <footer class="footer">
    <div class="wrap">
      <div class="footer-grid">
        <div>
          <h3><?= h($copy['brand']) ?></h3>
          <p>
            Template profissional para serviços gerais com pedido por divisão,
            orçamento, agendamento, área cliente e operação interna.
          </p>
        </div>

        <div>
          <h4>Fluxos</h4>
          <div class="footer-links">
            <a href="<?= h(route_to('public', 'quote', $lang)) ?>">Orçamento</a>
            <a href="<?= h(route_to('public', 'booking', $lang)) ?>">Agendamento</a>
            <a href="<?= h(route_to('public', 'emergency', $lang)) ?>">SOS</a>
          </div>
        </div>

        <div>
          <h4>Contacto</h4>
          <p>
            +351 912 345 678<br>
            geral@profixservices.pt<br>
            Gaia / Porto
          </p>
        </div>

        <div>
          <h4>Áreas</h4>
          <div class="footer-links">
            <a href="<?= h(route_to('client', 'dashboard', $lang)) ?>">Cliente</a>
            <a href="<?= h(route_to('admin', 'dashboard', $lang)) ?>">Operação</a>
            <a href="<?= h(route_to('public', 'services', $lang)) ?>">Serviços</a>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <span>© <?= date('Y') ?> ProFix Services</span>
        <span>Template premium por AlexDevCode</span>
      </div>
    </div>
  </footer>
<?php endif; ?>

<script>
  const photosInput = document.getElementById('photos');
  const uploadStatus = document.getElementById('uploadStatus');

  if (photosInput && uploadStatus) {
    photosInput.addEventListener('change', () => {
      const files = Array.from(photosInput.files || []);

      if (!files.length) {
        uploadStatus.textContent = 'Nenhum ficheiro selecionado';
        return;
      }

      if (files.length === 1) {
        uploadStatus.textContent = files[0].name;
        return;
      }

      uploadStatus.textContent = `${files.length} ficheiros selecionados`;
    });
  }
</script>
</body>
</html>