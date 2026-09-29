<?php
date_default_timezone_set('America/Montevideo');
if (!defined('APP_ROOT')) define('APP_ROOT', dirname(__DIR__));
if (!defined('SITE_URL')) define('SITE_URL', 'https://electricistasmontevideo.com');
function app_base_path(): string {
    static $base;
    if ($base !== null) return $base;
    $root = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: '');
    $app = str_replace('\\', '/', APP_ROOT);
    if ($root !== '' && str_starts_with(strtolower($app), strtolower(rtrim($root, '/') . '/'))) return $base = '/' . trim(substr($app, strlen($root)), '/');
    return $base = '';
}
function app_url(string $path = ''): string {
    if (preg_match('#^(?:https?://|mailto:|tel:)#', $path)) return $path;
    return app_base_path() . '/' . ltrim($path, '/');
}
function absolute_url(string $path = ''): string { return SITE_URL . '/' . ltrim($path, '/'); }
function asset_url(string $path = ''): string { return app_url('public/' . ltrim($path, '/')); }
function upload_url(string $path = ''): string { return app_url('uploads/' . ltrim($path, '/')); }
function asset_ver(string $path): string {
    $file = APP_ROOT . '/public/' . ltrim($path, '/');
    return asset_url($path) . (is_file($file) ? '?v=' . filemtime($file) : '');
}
function og_image_path(string $path): string { return $path; }
function e($value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function json_ld(array $data): string { return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_THROW_ON_ERROR); }
// Texto escapado con enlaces [etiqueta](ruta-interna o https://...). No admite HTML.
function texto_enlaces(string $text): string {
    return preg_replace_callback('/\[([^\]]+)\]\(([^)\s]+)\)/u', static fn($m)=>'<a href="' . e(preg_match('#^https?://#', $m[2]) ? $m[2] : app_url($m[2])) . '"' . (preg_match('#^https?://#', $m[2]) ? ' rel="noopener" target="_blank"' : '') . '>' . $m[1] . '</a>', e($text));
}
function whatsapp_url(string $message = 'Hola, necesito consultar por un trabajo eléctrico en Montevideo.'): string {
    global $social_whatsapp;
    return $social_whatsapp . '?text=' . rawurlencode($message);
}
$empresa_nombre = $empresa_nombre_corto = 'Electricistas Montevideo';
$empresa_telefono = '59897406456';
$empresa_telefono_sep = '097 406 456';
$empresa_whatsapp_visible = '+598 97 406 456';
$empresa_direccion = $empresa_zona_trabajo = 'Montevideo, Uruguay';
$empresa_url = absolute_url();
$empresa_logo = absolute_url('public/images/logo/logo.png');
$social_whatsapp = 'https://wa.me/' . $empresa_telefono;
// Completar solamente con datos confirmados del nuevo negocio.
$empresa_email = $empresa_gmaps = $social_instagram = $social_facebook = '';
$ga_measurement_id = 'G-NV555GZNKJ';
$clarity_id = 'ygb0omheii';
// Acceso al panel /metricas (hash de la contraseña, nunca en texto plano).
$metricas_password_hash = '$2y$10$qQv37e2NaWnB9E8MUynCguP9Im4DrRYYVaDaojNpdWAO6U2iErHaa';
