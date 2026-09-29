<?php if (empty($landing_head_loaded)) require APP_ROOT . '/src/vista/partials/head.php'; ?>
<body>
<a class="skip-link" href="#main-content">Saltar al contenido</a>
<?php $header_overlay = isset($tpl) && $tpl !== 'interna'; ?>
<?php if (!$header_overlay): ?><div class="topbar"><div class="wrap"><span><?= icon('pin') ?> Montevideo, Uruguay</span><a href="tel:+<?= e($empresa_telefono) ?>">Contacto directo · <?= e($empresa_telefono_sep) ?></a></div></div><?php endif; ?>
<header class="site-header<?= $header_overlay ? ' header--overlay' : '' ?>"><div class="wrap header-inner">
<a class="brand" href="<?= app_url() ?>" aria-label="Electricistas Montevideo — Inicio"><picture class="brand-pic"><source srcset="<?= e(asset_ver('images/logo/logo-120.webp')) ?>" type="image/webp"><img class="brand-logo" src="<?= e(asset_ver('images/logo/logo-120.png')) ?>" alt="" width="83" height="120"></picture><span>ELECTRICISTAS<strong>MONTEVIDEO</strong></span></a>
<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-nav" aria-label="Abrir menú"><span class="menu-icon-open"><?= icon('menu') ?></span><span class="menu-icon-close"><?= icon('close') ?></span></button>
<nav class="main-nav" id="main-nav" aria-label="Navegación principal">
<div class="nav-links"><?php foreach ($nav as $path=>$label): ?><a href="<?= e(app_url($path)) ?>" <?= ($route ?? '')===$path ? 'aria-current="page"' : '' ?>><?= e($label) ?></a><?php endforeach; ?></div>
<div class="nav-extra"><a class="button button-wsp" href="<?= e(whatsapp_url()) ?>"><?= icon('whatsapp') ?> Pedí tu presupuesto</a><a class="nav-phone" href="tel:+<?= e($empresa_telefono) ?>"><?= icon('phone') ?> <?= e($empresa_telefono_sep) ?></a><span class="nav-meta">Montevideo, Uruguay · Presupuesto sin costo</span></div>
</nav>
<a class="button button-small button-wsp header-cta" href="<?= e(whatsapp_url()) ?>"><?= icon('whatsapp') ?> Pedí tu presupuesto</a>
</div></header>
