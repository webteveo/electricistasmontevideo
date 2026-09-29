<?php
require_once APP_ROOT . '/src/vista/partials/icon.php';
global $empresa_nombre, $empresa_telefono, $empresa_telefono_sep, $social_whatsapp, $ga_measurement_id, $clarity_id, $empresa_gmaps, $social_instagram, $social_facebook;
$canonical_url = $canonical_url ?? absolute_url();
$page_image = $page_image ?? absolute_url('public/images/social.png');
$business = ['@context'=>'https://schema.org', '@type'=>['Electrician','LocalBusiness'], '@id'=>absolute_url('#organization'), 'name'=>$empresa_nombre, 'url'=>absolute_url(), 'telephone'=>'+'.$empresa_telefono, 'logo'=>absolute_url('public/images/logo/logo.png'), 'image'=>absolute_url('public/images/social.png'), 'description'=>'Electricista a domicilio en Montevideo y Canelones: reparaciones, tableros, instalaciones, iluminación y cargadores para vehículos eléctricos.', 'knowsAbout'=>['Tableros eléctricos', 'Disyuntor diferencial', 'Puesta a tierra', 'Instalaciones eléctricas', 'Cargadores para vehículos eléctricos'], 'address'=>['@type'=>'PostalAddress', 'addressLocality'=>'Montevideo', 'addressRegion'=>'Montevideo', 'addressCountry'=>'UY'], 'areaServed'=>[['@type'=>'City', 'name'=>'Montevideo', 'containedInPlace'=>['@type'=>'Country', 'name'=>'Uruguay']], ['@type'=>'AdministrativeArea', 'name'=>'Canelones', 'containedInPlace'=>['@type'=>'Country', 'name'=>'Uruguay']]], 'contactPoint'=>['@type'=>'ContactPoint', 'telephone'=>'+'.$empresa_telefono, 'contactType'=>'customer service', 'availableLanguage'=>'es', 'url'=>$social_whatsapp], 'hasOfferCatalog'=>['@type'=>'OfferCatalog', 'name'=>'Servicios eléctricos', 'itemListElement'=>array_values(array_map(static fn($l)=>['@type'=>'Offer', 'itemOffered'=>['@type'=>'Service', 'name'=>$l['crumb'], 'url'=>absolute_url($l['slug'])]], $servicios_landing ?? []))]];
// sameAs solo con perfiles reales cargados en config/variables.php.
$same_as = array_values(array_filter([$empresa_gmaps ?? '', $social_instagram ?? '', $social_facebook ?? '']));
if ($same_as) $business['sameAs'] = $same_as;
?>
<!doctype html>
<html lang="es-UY" data-track="<?= e(app_url('metricas/track')) ?>" data-base="<?= e(app_base_path()) ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($page_title ?? $empresa_nombre) ?></title>
<meta name="description" content="<?= e($page_description ?? '') ?>">
<meta name="robots" content="<?= !empty($page_noindex) ? 'noindex, follow' : 'index, follow, max-image-preview:large' ?>">
<link rel="canonical" href="<?= e($canonical_url) ?>">
<meta name="theme-color" content="#151c21">
<link rel="icon" href="<?= e(asset_ver('images/logo/favicon.ico')) ?>" sizes="32x32 48x48">
<link rel="icon" href="<?= e(asset_ver('images/logo/favicon-192.png')) ?>" type="image/png" sizes="192x192">
<link rel="apple-touch-icon" href="<?= e(asset_ver('images/logo/favicon-180.png')) ?>">
<meta property="og:type" content="<?= e($page_og_type ?? 'website') ?>">
<meta property="og:locale" content="es_UY">
<meta property="og:site_name" content="<?= e($empresa_nombre) ?>">
<meta property="og:title" content="<?= e($page_title ?? $empresa_nombre) ?>">
<meta property="og:description" content="<?= e($page_description ?? '') ?>">
<meta property="og:url" content="<?= e($canonical_url) ?>">
<meta property="og:image" content="<?= e($page_image) ?>">
<meta property="og:image:alt" content="<?= e($page_image_alt ?? $empresa_nombre) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= e($page_title ?? $empresa_nombre) ?>">
<meta name="twitter:description" content="<?= e($page_description ?? '') ?>">
<meta name="twitter:image" content="<?= e($page_image) ?>">
<link rel="preload" href="<?= e(asset_url('fonts/host-grotesk-latin.woff2')) ?>" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?= e(asset_url('fonts/barlow-condensed-800-latin.woff2')) ?>" as="font" type="font/woff2" crossorigin>
<link rel="stylesheet" href="<?= e(asset_ver('css/fuentes.css')) ?>">
<link rel="stylesheet" href="<?= e(asset_ver('css/sitio.css')) ?>">
<?php if (!empty($page_editorial)): ?><link rel="stylesheet" href="<?= e(asset_ver('css/articulos.css')) ?>"><?php endif; ?>
<script type="application/ld+json"><?= json_ld($business) ?></script>
<?php foreach ($page_schemas ?? [] as $schema): ?><script type="application/ld+json"><?= json_ld($schema) ?></script><?php endforeach; ?>
<?php if ($ga_measurement_id !== ''): ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= e($ga_measurement_id) ?>"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag('js',new Date());gtag('config',<?= json_encode($ga_measurement_id) ?>);</script>
<?php endif; ?>
<?php if (!empty($clarity_id)): ?><script>(function(c,l,a,r,i,t,y){c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);})(window,document,"clarity","script",<?= json_encode($clarity_id) ?>);</script>
<?php endif; ?>
<script defer src="<?= e(asset_ver('js/sitio.js')) ?>"></script>
</head>
