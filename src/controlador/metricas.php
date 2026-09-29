<?php
// Métricas propias: registro de visitas y clics (fetch), panel con contraseña (/metricas).
global $metricas_password_hash, $empresa_nombre;
$dir = APP_ROOT . '/data/metricas';
if (!is_dir($dir)) @mkdir($dir, 0775, true);
$accion = substr($route, strlen('metricas'));
$accion = trim($accion, '/');

// ---------- Registro de eventos (beacon desde el navegador) ----------
if ($accion === 'track') {
    header('Cache-Control: no-store');
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit; }
    if (!empty($_COOKIE['m_excluir'])) { http_response_code(204); exit; }
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if ($ua === '' || preg_match('/bot|crawl|spider|slurp|headless|lighthouse|pingdom|facebookexternalhit/i', $ua)) { http_response_code(204); exit; }
    $raw = file_get_contents('php://input');
    $d = json_decode($raw ?: '[]', true);
    if (!is_array($d)) { http_response_code(400); exit; }
    $s = static fn($k, $max = 300) => mb_substr(trim((string)($d[$k] ?? '')), 0, $max);
    $ev = $s('ev', 20);
    if (!in_array($ev, ['pv', 'wsp', 'tel', 'dur', 'form'], true)) { http_response_code(400); exit; }
    $ref = $s('ref', 500); $refhost = '';
    if ($ref !== '' && ($h = parse_url($ref, PHP_URL_HOST))) $refhost = strtolower(preg_replace('/^www\./', '', $h));
    $mobile = (bool)preg_match('/Mobi|Android|iPhone|iPad/i', $ua);
    $nav = preg_match('/Edg\//', $ua) ? 'Edge' : (preg_match('/OPR\//', $ua) ? 'Opera' : (preg_match('/Chrome\//', $ua) ? 'Chrome' : (preg_match('/Safari\//', $ua) ? 'Safari' : (preg_match('/Firefox\//', $ua) ? 'Firefox' : 'Otro'))));
    $so = preg_match('/Android/i', $ua) ? 'Android' : (preg_match('/iPhone|iPad/i', $ua) ? 'iOS' : (preg_match('/Windows/i', $ua) ? 'Windows' : (preg_match('/Mac OS/i', $ua) ? 'macOS' : (preg_match('/Linux/i', $ua) ? 'Linux' : 'Otro'))));
    $rec = [
        't' => date('Y-m-d H:i:s'), 'ev' => $ev,
        'vid' => preg_replace('/[^a-z0-9]/', '', $s('vid', 40)), 'sid' => preg_replace('/[^a-z0-9]/', '', $s('sid', 40)),
        'p' => trim(preg_replace('#^' . preg_quote(app_base_path(), '#') . '#', '', preg_replace('#\?.*$#', '', $s('p', 200))), '/'),
        'ref' => $refhost, 'refu' => $ref,
        'us' => $s('us', 80), 'um' => $s('um', 80), 'uc' => $s('uc', 120),
        'dev' => $mobile ? 'movil' : 'desktop', 'nav' => $nav, 'so' => $so,
        'lang' => $s('lang', 10), 'sw' => (int)($d['sw'] ?? 0),
        'pl' => $s('pl', 40), 'dur' => min(3600, max(0, (int)($d['dur'] ?? 0))),
    ];
    @file_put_contents($dir . '/' . date('Y-m-d') . '.log', json_encode($rec, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "\n", FILE_APPEND | LOCK_EX);
    http_response_code(204); exit;
}

// ---------- Sesión y acceso ----------
session_name('em_metricas');
session_set_cookie_params(['lifetime' => 0, 'path' => app_base_path() ?: '/', 'httponly' => true, 'samesite' => 'Lax', 'secure' => !empty($_SERVER['HTTPS'])]);
session_start();
header('X-Robots-Tag: noindex, nofollow', true);
header('Cache-Control: no-store');
$base = app_url('metricas');

if ($accion === 'salir') { session_destroy(); header('Location: ' . $base); exit; }
if ($accion === 'excluirme') {
    $on = ($_GET['v'] ?? '1') === '1';
    setcookie('m_excluir', $on ? '1' : '', ['expires' => $on ? time() + 86400 * 365 : time() - 3600, 'path' => app_base_path() ?: '/', 'samesite' => 'Lax']);
    header('Location: ' . $base); exit;
}
if (!empty($_POST['clave'])) {
    if (empty($metricas_password_hash) || !password_verify((string)$_POST['clave'], $metricas_password_hash)) { sleep(1); $login_error = 'Contraseña incorrecta.'; }
    else { $_SESSION['ok'] = true; header('Location: ' . $base . (isset($_GET['d']) ? '?d=' . (int)$_GET['d'] : '')); exit; }
}
if (empty($_SESSION['ok'])) { require APP_ROOT . '/src/vista/metricas/login.php'; exit; }

// ---------- Lectura y agregación ----------
$dias = max(1, min(365, (int)($_GET['d'] ?? 30)));
$hasta = new DateTimeImmutable('today'); $desde = $hasta->modify('-' . ($dias - 1) . ' days');
$eventos = [];
for ($f = $desde; $f <= $hasta; $f = $f->modify('+1 day')) {
    $file = $dir . '/' . $f->format('Y-m-d') . '.log';
    if (!is_file($file)) continue;
    foreach (file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) { $r = json_decode($line, true); if (is_array($r) && !empty($r['ev'])) $eventos[] = $r; }
}
function m_fuente(array $e): string {
    if ($e['us'] !== '') return 'Campaña: ' . $e['us'] . ($e['um'] !== '' ? ' / ' . $e['um'] : '');
    $h = $e['ref'];
    if ($h === '') return 'Directo / WhatsApp / sin referencia';
    if (str_contains($h, 'google.')) return 'Google (orgánico)';
    if (str_contains($h, 'bing.')) return 'Bing';
    if (str_contains($h, 'duckduckgo')) return 'DuckDuckGo';
    if (str_contains($h, 'instagram')) return 'Instagram';
    if (str_contains($h, 'facebook') || $h === 'l.facebook.com' || $h === 'lm.facebook.com' || $h === 'm.facebook.com') return 'Facebook';
    if (str_contains($h, 'whatsapp')) return 'WhatsApp';
    if (str_contains($h, 'youtube')) return 'YouTube';
    if (str_contains($h, 'tiktok')) return 'TikTok';
    if (str_contains($h, 'linkedin')) return 'LinkedIn';
    if (str_contains($h, 'mercadolibre')) return 'Mercado Libre';
    if (str_contains($h, 'electricistasmontevideo.com') || $h === 'localhost') return 'Interno';
    return 'Referido: ' . $h;
}
function m_tipo(string $p, array $pages): string {
    if ($p === '') return 'Inicio';
    $pg = $pages[$p] ?? null;
    if (!$pg) return str_starts_with($p, 'articulos') ? 'Artículos' : 'Otra';
    if (!empty($pg['barrio'])) return 'Servicio × zona';
    if (!empty($pg['barrio_hub'])) return 'Zona';
    if (!empty($pg['servicio'])) return 'Servicio';
    return 'General';
}
$pl_nombres = ['hero'=>'Hero (botón principal)', 'header'=>'Header', 'menu'=>'Menú móvil', 'card'=>'Card de servicio', 'banner-servicios'=>'Banner azul de servicios', 'pasos'=>'Cómo trabajamos', 'nosotros'=>'Quiénes somos', 'comparativa'=>'Comparativa', 'cta-final'=>'CTA final', 'flotante'=>'Botón flotante', 'footer'=>'Footer', 'formulario'=>'Formulario de contacto', 'contacto'=>'Página de contacto', 'relacionados'=>'Enlaces relacionados', 'otro'=>'Otro'];

// Sesiones: primera vista define fuente, dispositivo y página de entrada.
$ses = [];
foreach ($eventos as $e) {
    $sid = $e['sid'] ?: $e['vid'];
    if (!isset($ses[$sid])) $ses[$sid] = ['vid'=>$e['vid'], 'fuente'=>null, 'entrada'=>null, 'dev'=>$e['dev'], 'nav'=>$e['nav'], 'so'=>$e['so'], 'pv'=>0, 'wsp'=>0, 'tel'=>0, 'dur'=>0, 'inicio'=>$e['t'], 'uc'=>$e['uc']];
    $s =& $ses[$sid];
    if ($e['ev'] === 'pv') { $s['pv']++; if ($s['fuente'] === null) { $s['fuente'] = m_fuente($e); $s['entrada'] = $e['p']; } }
    elseif ($e['ev'] === 'wsp') $s['wsp']++;
    elseif ($e['ev'] === 'tel') $s['tel']++;
    elseif ($e['ev'] === 'dur') $s['dur'] += $e['dur'];
    unset($s);
}
foreach ($ses as &$s) { if ($s['fuente'] === null) { $s['fuente'] = 'Directo / WhatsApp / sin referencia'; $s['entrada'] = ''; } } unset($s);

$tot = ['pv'=>0, 'wsp'=>0, 'tel'=>0, 'form'=>0, 'ses'=>count($ses), 'vis'=>count(array_unique(array_column($ses, 'vid'))), 'dur'=>0, 'durn'=>0];
$por_dia = []; $por_pagina = []; $por_pl = []; $por_hora = array_fill(0, 24, ['pv'=>0, 'wsp'=>0]); $por_dow = array_fill(0, 7, ['pv'=>0, 'wsp'=>0]); $ultimos = []; $por_servicio = []; $por_zona = []; $por_tipo = [];
for ($f = $desde; $f <= $hasta; $f = $f->modify('+1 day')) $por_dia[$f->format('Y-m-d')] = ['pv'=>0, 'wsp'=>0, 'tel'=>0, 'ses'=>[]];
foreach ($eventos as $e) {
    $d = substr($e['t'], 0, 10); $h = (int)substr($e['t'], 11, 2); $dow = (int)date('N', strtotime($e['t'])) - 1;
    $p = $e['p']; $pg = $pages[$p] ?? null; $tipo = m_tipo($p, $pages);
    $sid = $e['sid'] ?: $e['vid']; $fuente = $ses[$sid]['fuente'];
    if (!isset($por_pagina[$p])) $por_pagina[$p] = ['pv'=>0, 'wsp'=>0, 'tel'=>0, 'tipo'=>$tipo, 'entradas'=>0];
    if (!isset($por_tipo[$tipo])) $por_tipo[$tipo] = ['pv'=>0, 'wsp'=>0];
    $sv = $pg['servicio'] ?? null; $zn = $pg['barrio'] ?? $pg['barrio_hub'] ?? null;
    if ($sv && !isset($por_servicio[$sv])) $por_servicio[$sv] = ['pv'=>0, 'wsp'=>0];
    if ($zn && !isset($por_zona[$zn])) $por_zona[$zn] = ['pv'=>0, 'wsp'=>0];
    if ($e['ev'] === 'pv') { $tot['pv']++; $por_dia[$d]['pv']++; $por_dia[$d]['ses'][$sid] = 1; $por_pagina[$p]['pv']++; $por_hora[$h]['pv']++; $por_dow[$dow]['pv']++; $por_tipo[$tipo]['pv']++; if ($sv) $por_servicio[$sv]['pv']++; if ($zn) $por_zona[$zn]['pv']++; }
    elseif ($e['ev'] === 'wsp') { $tot['wsp']++; $por_dia[$d]['wsp']++; $por_pagina[$p]['wsp']++; $por_hora[$h]['wsp']++; $por_dow[$dow]['wsp']++; $por_tipo[$tipo]['wsp']++; if ($sv) $por_servicio[$sv]['wsp']++; if ($zn) $por_zona[$zn]['wsp']++; $pl = $e['pl'] ?: 'otro'; $pl = str_starts_with($pl, 'card') ? 'card' : $pl; $por_pl[$pl] = ($por_pl[$pl] ?? 0) + 1; $ultimos[] = ['t'=>$e['t'], 'p'=>$p, 'fuente'=>$fuente, 'dev'=>$e['dev'], 'pl'=>$pl_nombres[$pl] ?? $pl, 'entrada'=>$ses[$sid]['entrada']]; }
    elseif ($e['ev'] === 'tel') { $tot['tel']++; $por_dia[$d]['tel']++; $por_pagina[$p]['tel']++; }
    elseif ($e['ev'] === 'form') { $tot['form']++; }
    elseif ($e['ev'] === 'dur') { $tot['dur'] += $e['dur']; $tot['durn']++; }
}
foreach ($ses as $s) if ($s['entrada'] !== null && isset($por_pagina[$s['entrada']])) $por_pagina[$s['entrada']]['entradas']++;
$por_fuente = []; $por_dev = []; $por_nav = []; $por_so = []; $por_entrada = []; $por_camp = [];
foreach ($ses as $s) {
    foreach ([['por_fuente', $s['fuente']], ['por_dev', $s['dev'] === 'movil' ? 'Móvil' : 'Desktop'], ['por_nav', $s['nav']], ['por_so', $s['so']], ['por_entrada', $s['entrada'] ?? ''], ['por_camp', $s['uc']]] as [$var, $k]) {
        if ($var === 'por_camp' && $k === '') continue;
        if (!isset($$var[$k])) $$var[$k] = ['ses'=>0, 'wsp'=>0, 'tel'=>0, 'pv'=>0, 'dur'=>0];
        $$var[$k]['ses']++; $$var[$k]['wsp'] += $s['wsp']; $$var[$k]['tel'] += $s['tel']; $$var[$k]['pv'] += $s['pv']; $$var[$k]['dur'] += $s['dur'];
    }
}
$ordenar = static function (array &$a, string $k = 'wsp', string $k2 = 'ses') { uasort($a, static fn($x, $y) => ($y[$k] <=> $x[$k]) ?: (($y[$k2] ?? 0) <=> ($x[$k2] ?? 0))); };
$ordenar($por_fuente); $ordenar($por_dev); $ordenar($por_nav); $ordenar($por_so); $ordenar($por_entrada); $ordenar($por_camp);
$ordenar($por_pagina, 'wsp', 'pv'); $ordenar($por_servicio, 'wsp', 'pv'); $ordenar($por_zona, 'wsp', 'pv'); $ordenar($por_tipo, 'wsp', 'pv');
arsort($por_pl);
$ultimos = array_slice(array_reverse($ultimos), 0, 40);
$ev_nombres = ['pv'=>'Vista', 'wsp'=>'Clic WhatsApp', 'tel'=>'Clic teléfono', 'form'=>'Formulario', 'dur'=>'Tiempo en página'];
$ultimos_ev = [];
foreach (array_slice(array_reverse($eventos), 0, 40) as $e) { $sid = $e['sid'] ?: $e['vid']; $ss = $ses[$sid]; $ultimos_ev[] = ['t'=>$e['t'], 'ev'=>$ev_nombres[$e['ev']] ?? $e['ev'], 'p'=>$e['p'], 'entrada'=>$ss['entrada'] ?? '', 'fuente'=>$ss['fuente'], 'ref'=>$e['refu'] ?: '', 'utm'=>trim($e['us'] . ' ' . $e['um'] . ' ' . $e['uc']), 'dev'=>$e['dev'], 'so'=>$e['so'], 'nav'=>$e['nav'], 'sw'=>$e['sw'], 'lang'=>$e['lang'], 'pl'=>$e['pl'] ? ($pl_nombres[str_starts_with($e['pl'], 'card') ? 'card' : $e['pl']] ?? $e['pl']) : '', 'dur'=>$e['dur'], 'vid'=>substr($e['vid'], 0, 6), 'nuevo'=>$ss['inicio'] === $e['t'] && $e['ev'] === 'pv']; }
$ses_con_wsp = count(array_filter($ses, static fn($s) => $s['wsp'] > 0));
$tasa = $tot['ses'] ? round(100 * $ses_con_wsp / $tot['ses'], 1) : 0;
$dur_media = $tot['durn'] ? round($tot['dur'] / $tot['durn']) : 0;
$excluido = !empty($_COOKIE['m_excluir']);
$nombre_pagina = static function (string $p) use ($pages): string { if ($p === '') return 'Inicio'; return $pages[$p]['crumb'] ?? $pages[$p]['heading'] ?? $p; };
$nombre_servicio = static fn(string $id) => $servicios_landing[$id]['crumb'] ?? $id;
$nombre_zona = static fn(string $k) => $barrios_perfil[$k]['nombre'] ?? $k;
require APP_ROOT . '/src/vista/metricas/panel.php';
