<?php
$isList = $route === 'articulos';
$page_title = $a ? $a['title'] : ($isList ? 'Guías de electricidad para hogares y comercios | Electricistas Montevideo' : 'Artículo no encontrado | Electricistas Montevideo');
$page_description = $a ? $a['description'] : 'Consultas y guías sobre instalaciones, reparaciones e iluminación en Montevideo. Información para entender tu instalación y conversar sobre tu próximo trabajo.';
$canonical_url = ar_url($a ? 'articulos/' . $a['slug'] : 'articulos');
$page_image = ar_url($a && !empty($a['imagen']) ? og_image_path($a['imagen']) : 'public/images/social.png');
$page_og_type = $a ? 'article' : 'website';
$page_noindex = !$a && (!$isList || !$articles);
$page_image_alt = $a['imagen_alt'] ?? $empresa_nombre;
$page_keywords = $a ? implode(', ', (array)$a['keywords']) : '';
$page_schemas = [];
$orgId = ar_url('#organization');
if ($a) {
    $words = ar_words($a);
    $page_schemas[] = ['@context'=>'https://schema.org', '@type'=>'Article', '@id'=>$canonical_url . '#article', 'headline'=>$a['titulo'], 'description'=>$a['description'], 'image'=>$page_image, 'datePublished'=>ar_date($a['fecha'])->format(DATE_ATOM), 'dateModified'=>ar_date($a['actualizado'])->format(DATE_ATOM), 'inLanguage'=>'es-UY', 'articleSection'=>$a['categoria'], 'keywords'=>$a['keywords'], 'wordCount'=>$words, 'author'=>['@type'=>'Organization','@id'=>$orgId,'name'=>$a['autor']], 'publisher'=>['@type'=>'Organization','@id'=>$orgId,'name'=>$empresa_nombre,'logo'=>['@type'=>'ImageObject','url'=>ar_url('public/images/social.png')]], 'mainEntityOfPage'=>['@type'=>'WebPage','@id'=>$canonical_url], 'about'=>['@type'=>'Thing','name'=>$a['tema']], 'speakable'=>['@type'=>'SpeakableSpecification','cssSelector'=>['.ar-answer','.ar-key-points']]];
    $page_schemas[] = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>ar_url()],['@type'=>'ListItem','position'=>2,'name'=>'Artículos','item'=>ar_url('articulos')],['@type'=>'ListItem','position'=>3,'name'=>$a['titulo'],'item'=>$canonical_url]]];
    if (!empty($a['faq'])) $page_schemas[] = ['@context'=>'https://schema.org','@type'=>'FAQPage','mainEntity'=>array_map(static fn($f)=>['@type'=>'Question','name'=>ar_plain($f['q']),'acceptedAnswer'=>['@type'=>'Answer','text'=>ar_plain($f['a'])]],$a['faq'])];
} elseif ($isList) {
    $page_schemas[] = ['@context'=>'https://schema.org','@type'=>'CollectionPage','url'=>$canonical_url,'name'=>'Artículos de Electricistas Montevideo','mainEntity'=>['@type'=>'ItemList','itemListElement'=>array_map(static fn($item,$i)=>['@type'=>'ListItem','position'=>$i+1,'url'=>ar_url('articulos/'.$item['slug']),'name'=>$item['titulo']],array_values($articles),array_keys(array_values($articles)))]];
}
$page_editorial = true;
require APP_ROOT . '/src/vista/partials/head.php';
$landing_head_loaded = true;

require APP_ROOT . '/src/vista/partials/header.php';
?>
<main class="ar-page" id="main-content">
<?php if ($isList): ?>
    <header class="ar-intro"><span class="ar-tag">Guías para decidir</span><h1>Artículos de electricidad</h1><p>Guías para entender tu instalación y preparar tu consulta.</p><a href="<?= ar_e(app_url('articulos/feed')) ?>">Suscribite al RSS</a></header>
    <nav class="ar-chips" aria-label="Filtrar por categoría"><a href="<?= ar_e(app_url('articulos')) ?>" aria-current="<?= empty($_GET['categoria']) ? 'page' : 'false' ?>">Todos</a>
    <?php foreach (array_unique(array_column($articles, 'categoria')) as $cat): ?><a href="<?= ar_e(app_url('articulos') . '?categoria=' . rawurlencode($cat)) ?>" aria-current="<?= ($_GET['categoria'] ?? '') === $cat ? 'page' : 'false' ?>"><?= ar_e($cat) ?></a><?php endforeach; ?></nav>
    <div class="ar-cards"><?php $shown=0; foreach ($articles as $item) { if (!empty($_GET['categoria']) && $_GET['categoria'] !== $item['categoria']) continue; ar_card($item); $shown++; } if (!$shown) echo '<p>Todavía no hay artículos en esta categoría.</p>'; ?></div>
<?php elseif (!$a): ?>
    <h1>Artículo no encontrado</h1><p>Este artículo no está disponible.</p><a href="<?= ar_e(app_url('articulos')) ?>">Ver artículos publicados</a>
<?php else: $wa = $social_whatsapp . '?text=' . rawurlencode($a['cta_message'] . ' — Artículo: ' . $a['titulo']); ?>
    <nav class="ar-breadcrumb" aria-label="Miga de pan"><a href="<?= app_url('') ?>">Inicio</a><span>›</span><a href="<?= app_url('articulos') ?>">Artículos</a><span>›</span><span aria-current="page"><?= ar_e($a['titulo']) ?></span></nav>
    <div class="ar-layout"><article class="ar-body">
    <header class="ar-intro"><span class="ar-tag"><?= ar_e($a['categoria']) ?></span><h1><?= ar_e($a['titulo']) ?></h1><p class="ar-deck"><?= ar_e($a['bajada']) ?></p><p class="ar-meta">Por <?= ar_e($a['autor']) ?> · <time datetime="<?= ar_e($a['fecha']) ?>"><?= ar_date($a['fecha'])->format('d/m/Y') ?></time><?php if ($a['actualizado'] !== $a['fecha']): ?> · Actualizado: <time datetime="<?= ar_e($a['actualizado']) ?>"><?= ar_date($a['actualizado'])->format('d/m/Y') ?></time><?php endif; ?> · <?= max(1, (int)ceil($words/200)) ?> min de lectura</p></header>
    <?php if (!empty($a['imagen'])): ?><figure class="ar-figure"><img src="<?= ar_e(app_url($a['imagen'])) ?>" alt="<?= ar_e($a['imagen_alt']) ?>" fetchpriority="high"><?php if (!empty($a['imagen_pie'])): ?><figcaption><?= ar_e($a['imagen_pie']) ?></figcaption><?php endif; ?></figure><?php endif; ?>
    <section class="ar-answer"><h2>Respuesta corta</h2><p><?= ar_rich($a['respuesta']) ?></p></section>
    <section class="ar-key-points"><h2>Puntos clave</h2><ul><?php foreach ($a['puntos_clave'] as $p): ?><li><?= ar_rich($p) ?></li><?php endforeach; ?></ul></section>
    <?php if (count($a['secciones']) >= 3): ?><details class="ar-toc" open><summary>En este artículo</summary><ol><?php foreach ($a['secciones'] as $i=>$s): ?><li><a href="#seccion-<?= $i+1 ?>"><?= ar_e($s['h2']) ?></a></li><?php endforeach; ?><?php if ($a['faq']): ?><li><a href="#preguntas">Preguntas frecuentes</a></li><?php endif; ?></ol></details><?php endif; ?>
    <?php foreach ($a['secciones'] as $i=>$s): ?><section id="seccion-<?= $i+1 ?>"><h2><?= ar_e($s['h2']) ?></h2><?php ar_blocks($s); ?></section><?php endforeach; ?>
    <?php if ($a['faq']): ?><section id="preguntas"><h2>Preguntas frecuentes</h2><?php foreach ($a['faq'] as $i=>$f): ?><details class="ar-faq" <?= $i===0?'open':'' ?>><summary><h3><?= ar_e($f['q']) ?></h3></summary><p><?= ar_rich($f['a']) ?></p></details><?php endforeach; ?></section><?php endif; ?>
    <section class="ar-cta"><h2><?= ar_e($a['cta_titulo']) ?></h2><p><?= ar_e($a['cta_texto']) ?></p><a class="ar-button" href="<?= ar_e($wa) ?>" data-track="cta-whatsapp-articulo">Consultar por WhatsApp</a></section>
    <section><h2>Fuentes y referencias</h2><ol><?php foreach ($a['fuentes'] as $f): ?><li><a href="<?= ar_e($f['url']) ?>" rel="noopener nofollow" target="_blank"><?= ar_e($f['label']) ?></a> — <?= ar_e($f['nota']) ?></li><?php endforeach; ?></ol></section>
    <section class="ar-note"><h2>Sobre <?= ar_e($empresa_nombre) ?></h2><p>Electricistas Montevideo recibe consultas sobre trabajos eléctricos para hogares y comercios en Montevideo. Conocé los <a href="<?= app_url('proyectos') ?>">proyectos del sitio</a> y consultá el alcance para tu ubicación.</p></section>
    </article><aside class="ar-sidebar"><div class="ar-sticky"><h2>Servicios relacionados</h2><ul><?php foreach ($a['links'] as $l): ?><li><a href="<?= ar_e(app_url($l['href'])) ?>"><?= ar_e($l['label']) ?></a></li><?php endforeach; ?></ul><div class="ar-contact"><h2>Contanos tu proyecto</h2><p>Tu consulta, tu barrio y lo que necesitás resolver.</p><a class="ar-button" href="<?= ar_e($wa) ?>"><?= ar_e($empresa_telefono_sep) ?></a></div></div></aside></div>
    <?php $related=array_values(array_filter($articles,static fn($b)=>$b['slug']!==$a['slug'])); usort($related,static fn($b,$c)=>(($c['categoria']===$a['categoria'])<=>($b['categoria']===$a['categoria'])) ?: strcmp($c['fecha'],$b['fecha'])); if ($related): ?><section class="ar-related"><h2>Seguir leyendo</h2><div class="ar-cards"><?php foreach(array_slice($related,0,3) as $item) ar_card($item); ?></div></section><?php endif; ?>
<?php endif; ?>
</main>
<?php require APP_ROOT . '/src/vista/partials/footer.php'; ?>
