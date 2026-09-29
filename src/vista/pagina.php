<?php
$page_schemas = [];
$landing = null; $tpl = 'home';
$faq_schema = static fn(array $items)=>['@context'=>'https://schema.org','@type'=>'FAQPage','mainEntity'=>array_map(static fn($f)=>['@type'=>'Question','name'=>$f['q'],'acceptedAnswer'=>['@type'=>'Answer','text'=>preg_replace('/\[([^\]]+)\]\([^)]+\)/', '$1', $f['a'])]],$items)];
$page_mod = $page['mod'] ?? null;
if ($route === '') {
    $page_schemas[] = ['@context'=>'https://schema.org','@type'=>'WebSite','@id'=>absolute_url('#website'),'url'=>absolute_url(),'name'=>'Electricistas Montevideo','inLanguage'=>'es-UY','publisher'=>['@id'=>absolute_url('#organization')]];
    $page_schemas[] = $faq_schema($faq);
    $hero_h1 = 'Electricistas<br>en Montevideo.';
    $hero_text = 'Electricista a domicilio para casas, apartamentos y comercios de Montevideo y Canelones. Mandanos una foto del problema por WhatsApp y te pasamos el presupuesto sin costo.';
    $hero_wsp = whatsapp_url(); $faq_items = $faq;
} elseif (isset($pages[$route])) {
    $page_schemas[] = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Inicio','item'=>absolute_url()],['@type'=>'ListItem','position'=>2,'name'=>$page['crumb'] ?? $nav[$route] ?? $page['heading'],'item'=>absolute_url($route)]]];
    if (!empty($page['servicio'])) {
        $tpl = 'servicio';
        $landing = $servicios_landing[$page['servicio']];
        $page_schemas[] = ['@context'=>'https://schema.org','@type'=>'Service','@id'=>absolute_url($route.'#service'),'name'=>$landing['h1'],'serviceType'=>$landing['crumb'],'description'=>$landing['description'],'url'=>absolute_url($route),'provider'=>['@id'=>absolute_url('#organization')],'areaServed'=>[['@type'=>'City','name'=>'Montevideo'],['@type'=>'AdministrativeArea','name'=>'Canelones']]];
        $page_schemas[] = $faq_schema($landing['faq']);
        $hero_h1 = e($landing['h1']); $hero_text = $landing['hero']; $hero_wsp = whatsapp_url($landing['wsp']); $faq_items = $landing['faq'];
    } elseif (!empty($page['barrio_hub']) || !empty($page['zona']) || !empty($page['sz'])) {
        // Zona (/electricista-{zona} o /zonas/{zona}) y servicio × barrio (/{servicio}/{zona}): vista local.php.
        if (!empty($page['sz'])) { [$sz_serv, $bk] = $page['sz']; $tpl = 'sz'; } else { $bk = $page['barrio_hub'] ?? $page['zona']; $tpl = 'zona'; $sz_serv = null; }
        $bp = $zonas[$bk]; $bn = zona_en($bp);
        $zc = $sz_serv ? zona_contenido($bk)['servicios'][$sz_serv] : (!empty($bp['legacy']) ? $zonas_activas[$bk] : zona_contenido($bk));
        $region = $regiones[$bp['region']];
        $area = ['@type'=>'Place','name'=>$bp['nombre'],'containedInPlace'=>$bp['depto'] === 'Montevideo' ? ['@type'=>'City','name'=>'Montevideo'] : ['@type'=>'AdministrativeArea','name'=>$bp['depto']]];
        if ($sz_serv) {
            $landing = $servicios_landing[$sz_serv]; $sz_h1 = $servicios_zona[$sz_serv]['h1'];
            $hero_h1 = e($sz_h1) . '<br>en ' . e($bn) . '.';
            $hero_wsp = whatsapp_url('Hola, necesito ' . mb_strtolower($landing['crumb']) . ' en ' . $bn . '.');
            $migas = [['Inicio', ''], [$landing['crumb'], $landing['slug']], ['En ' . $bn, $route]];
            $page_schemas[] = ['@context'=>'https://schema.org','@type'=>'Service','@id'=>absolute_url($route.'#service'),'name'=>$sz_h1 . ' en ' . $bp['nombre'],'serviceType'=>$landing['crumb'],'description'=>$page['description'],'url'=>absolute_url($route),'provider'=>['@id'=>absolute_url('#organization')],'areaServed'=>$area,'isRelatedTo'=>['@id'=>absolute_url($landing['slug'].'#service')]];
        } else {
            $hero_h1 = 'Electricista<br>en ' . e($bn) . '.';
            $hero_wsp = whatsapp_url('Hola, necesito un electricista en ' . $bn . '.');
            $migas = [['Inicio', ''], ['Zonas', 'zonas'], [$region['nombre'], region_url($bp['region'])], [$page['crumb'], $route]];
            $page_schemas[] = ['@context'=>'https://schema.org','@type'=>'Service','@id'=>absolute_url($route.'#service'),'name'=>'Electricista en ' . $bp['nombre'],'serviceType'=>'Electricista a domicilio','description'=>$page['description'],'url'=>absolute_url($route),'provider'=>['@id'=>absolute_url('#organization')],'areaServed'=>$area];
        }
        $hero_text = $page['description'];
        $faq_items = $zc['faq'];
        $page_schemas[0]['itemListElement'] = array_map(static fn($m, $i)=>['@type'=>'ListItem','position'=>$i+1,'name'=>$m[0],'item'=>absolute_url($m[1])], $migas, array_keys($migas));
        $page_schemas[] = $faq_schema($faq_items);
    } elseif (!empty($page['region'])) {
        $tpl = 'region'; $rk = $page['region']; $region = $regiones[$rk]; $rc = region_contenido($rk);
        $hero_h1 = 'Electricista en<br>' . e($region['nombre']) . '.';
        $hero_text = $page['description'];
        $hero_wsp = whatsapp_url('Hola, necesito un electricista. Estoy en el barrio: ');
        $faq_items = $rc['faq'];
        $migas = [['Inicio', ''], ['Zonas', 'zonas'], [$region['nombre'], $route]];
        $page_schemas[0]['itemListElement'] = array_map(static fn($m, $i)=>['@type'=>'ListItem','position'=>$i+1,'name'=>$m[0],'item'=>absolute_url($m[1])], $migas, array_keys($migas));
        $page_schemas[] = ['@context'=>'https://schema.org','@type'=>'CollectionPage','@id'=>absolute_url($route.'#coleccion'),'name'=>$page['title'],'url'=>absolute_url($route),'about'=>['@id'=>absolute_url('#organization')],'mainEntity'=>['@type'=>'ItemList','itemListElement'=>array_values(array_map(static fn($k, $i)=>['@type'=>'ListItem','position'=>$i+1,'url'=>absolute_url(zona_url($k)),'name'=>'Electricista en ' . zona_en($GLOBALS['zonas'][$k])], array_keys(zonas_de_region($rk)), array_keys(array_keys(zonas_de_region($rk)))))]];
        $page_schemas[] = $faq_schema($faq_items);
    } elseif (!empty($page['zonas'])) {
        $tpl = 'zonas';
        $zonas_hub = is_file(APP_ROOT . '/content/paginas/zonas.php') ? require APP_ROOT . '/content/paginas/zonas.php' : [];
        $hero_h1 = 'Electricista en Montevideo<br>y Canelones.';
        $hero_text = 'Electricista a domicilio en Montevideo, Ciudad de la Costa, la Costa de Oro y el área metropolitana de Canelones. Presupuesto sin costo.';
        $hero_wsp = whatsapp_url('Hola, necesito un electricista. Estoy en el barrio: '); $faq_items = $faq;
    } else { $tpl = 'interna'; }
    if ($page_mod) $page_schemas[] = ['@context'=>'https://schema.org','@type'=>'WebPage','@id'=>absolute_url($route),'url'=>absolute_url($route),'name'=>$page['title'],'inLanguage'=>'es-UY','isPartOf'=>['@id'=>absolute_url('#website')],'dateModified'=>$page_mod];
} else { $tpl = 'interna'; }
require APP_ROOT . '/src/vista/partials/header.php';
?>
<main id="main-content">
<?php if ($tpl !== 'interna'): ?>
<section class="hero hero--photo<?= $tpl !== 'home' ? ' hero--landing' : '' ?>">
<?php
// Fotos por landing: hero en images/hero/{ruta}.webp (y opcional {ruta}-celular.webp); foto de contenido en images/zonas/{zona}.webp o images/servicios/{servicio}.webp.
$hero_custom = $route !== '' && is_file(APP_ROOT . '/public/images/hero/' . $route . '.webp') ? 'images/hero/' . $route . '.webp' : null;
$hero_custom_m = $hero_custom && is_file(APP_ROOT . '/public/images/hero/' . $route . '-celular.webp') ? 'images/hero/' . $route . '-celular.webp' : $hero_custom;
$foto = null; $foto_alt = '';
if (in_array($tpl, ['servicio', 'zona', 'sz'], true)) {
    $zk = $tpl === 'zona' ? $bk : null;
    // Foto de zona solo si es un trabajo real hecho ahí (images/zonas/{zona}.webp); el alt describe lo que se ve.
    if ($zk && is_file(APP_ROOT . '/public/images/zonas/' . $zk . '.webp')) { $foto = 'images/zonas/' . $zk . '.webp'; $foto_alt = $zc['foto_alt'] ?? ('Trabajo eléctrico en ' . $bp['nombre']); }
    elseif ($tpl === 'servicio' && is_file(APP_ROOT . '/public/images/servicios/' . $page['servicio'] . '.webp')) { $foto = 'images/servicios/' . $page['servicio'] . '.webp'; $foto_alt = $landing['h1']; }
}
?>
<picture class="hero-background">
<source media="(max-width: 760px)" srcset="<?= e(asset_ver($hero_custom_m ?? 'images/index/hero/electricista-montevideo-tablero-electrico-celular.webp')) ?>" width="941" height="1672">
<img src="<?= e(asset_ver($hero_custom ?? 'images/index/hero/electricista-montevideo-tablero-electrico-desktop.webp')) ?>" alt="<?= $hero_custom ? e(strip_tags(str_replace('<br>', ' ', $hero_h1))) : 'Electricista revisando un tablero eléctrico en una vivienda' ?>" width="1672" height="941" fetchpriority="high" loading="eager">
</picture>
<div class="wrap hero-grid">
<div class="hero-copy">
<?php if ($tpl !== 'home'): ?><nav class="breadcrumb" aria-label="Miga de pan"><?php if (!empty($migas)): foreach ($migas as $i => $m): ?><?= $i ? '<span>/</span>' : '' ?><?php if ($i < count($migas) - 1): ?><a href="<?= e(app_url($m[1])) ?>"><?= e($m[0]) ?></a><?php else: ?><span aria-current="page"><?= e($m[0]) ?></span><?php endif; ?><?php endforeach; else: ?><a href="<?= app_url() ?>">Inicio</a><span>/</span><span aria-current="page"><?= e($page['crumb']) ?></span><?php endif; ?></nav><?php endif; ?>
<h1><?= $hero_h1 ?></h1>
<p class="hero-text"><?= e($hero_text) ?></p>
<div class="actions"><a class="button button-wsp" href="<?= e($hero_wsp) ?>"><?= icon('whatsapp') ?> Pedí tu presupuesto</a><a class="text-link" href="tel:+<?= e($empresa_telefono) ?>"><?= icon('phone') ?> <?= e($empresa_telefono_sep) ?></a></div>
<div class="hero-note">Presupuesto sin costo</div>
</div>
</div></section>
<section class="social-proof" aria-label="Clientes y experiencia">
<img class="social-proof-bg" src="<?= e(asset_ver('images/index/hero/electricista-montevideo-tablero-electrico-desktop.webp')) ?>" alt="" width="1672" height="941" loading="lazy" aria-hidden="true">
<div class="wrap social-proof-inner">
<ul class="trust-bar"><li><?= icon('check') ?><span><strong>Presupuesto sin costo</strong><small>Antes de empezar</small></span></li><li><?= icon('whatsapp') ?><span><strong>Consulta por WhatsApp</strong><small>Mandá una foto del problema</small></span></li><li><?= icon('pin') ?><span><strong>Montevideo y Canelones</strong><small>Casas, apartamentos y comercios</small></span></li></ul>
</div>
</section>
<?php if ($tpl === 'home'): ?>
<section class="section wrap landing-section" id="electricista-montevideo">
<div class="services-heading"><span class="pill">Electricista a domicilio</span><h2>Electricistas en Montevideo y Canelones</h2></div>
<div class="landing-lead landing-lead--zone"><p>En Electricistas Montevideo resolvemos fallas eléctricas, cambiamos tableros y hacemos instalaciones en casas, apartamentos y comercios de Montevideo, Ciudad de la Costa y la Costa de Oro. Escribinos por WhatsApp al <?= e($empresa_telefono_sep) ?> con tu barrio y una foto del problema: te orientamos, te pasamos el presupuesto sin costo y coordinamos la visita.</p></div>
<div class="landing-prose">
<h2>¿Qué problemas eléctricos resolvemos más seguido?</h2>
<p>La mayoría de las consultas empiezan con una llave que salta: la <a href="<?= e(app_url('reparaciones-electricas-montevideo')) ?>">térmica que corta al prender el aire o el horno</a>, o el disyuntor diferencial que salta cuando llueve. Le siguen los <a href="<?= e(app_url('tableros-electricos-montevideo')) ?>">tableros viejos con fusibles o sin diferencial</a>, las <a href="<?= e(app_url('instalaciones-electricas-montevideo')) ?>">reformas de cocina y baño</a> que necesitan circuitos nuevos y la <a href="<?= e(app_url('cargador-vehiculo-electrico-montevideo')) ?>">instalación de cargadores para autos eléctricos</a>, que el reglamento de UTE exige en un circuito exclusivo.</p>
<h2>¿Cómo es el trabajo de principio a fin?</h2>
<p>Nos contás qué pasa por WhatsApp o por teléfono y, si podés, nos mandás una foto del tablero sin abrirlo. Con eso te orientamos y coordinamos la visita. En la visita revisamos con instrumentos, te explicamos la causa y te pasamos el presupuesto. Recién cuando lo aprobás hacemos el trabajo y al final dejamos cada circuito identificado en el tablero.</p>
</div>
</section>
<?php endif; ?>
<?php if ($tpl === 'servicio') require APP_ROOT . '/src/vista/servicio.php'; elseif ($tpl === 'zonas') require APP_ROOT . '/src/vista/zonas.php'; elseif ($tpl === 'zona' || $tpl === 'sz') require APP_ROOT . '/src/vista/local.php'; elseif ($tpl === 'region') require APP_ROOT . '/src/vista/region.php'; ?>
<?php // Fuera de la home, los bloques de plantilla usan textos cortos: el diseño es el mismo y el contenido propio de cada página pesa más. ?>
<?php $corto = $tpl !== 'home'; ?>
<section class="section wrap services-section" id="servicios"><div class="services-heading"><span class="pill"><?= $tpl === 'home' ? 'Nuestros servicios' : 'Más servicios' ?></span><h2><?= $tpl === 'home' ? 'Servicios eléctricos' : 'Todos nuestros servicios' ?></h2><a class="text-link dark-link" href="<?= app_url('servicios') ?>">Ver todos los servicios <?= icon('arrow') ?></a></div>
<?php require APP_ROOT . '/src/vista/partials/servicios.php'; ?>
</section>
<section class="section steps-section" id="como-trabajamos"><div class="wrap">
<div class="steps-heading"><span class="pill">Cómo trabajamos</span><h2>Tu instalación en 3 pasos</h2><p><?= $corto ? 'Consulta, presupuesto y visita. Sin vueltas.' : 'Contanos qué pasa por WhatsApp o teléfono, te asesoramos y coordinamos la visita. Sin vueltas y con presupuesto sin costo.' ?></p></div>
<ol class="steps"><li class="step"><span class="step-icon"><?= icon('message') ?></span><div><span class="step-num">Paso 1</span><h3>Contanos qué pasa</h3><p><?= $corto ? 'La falla, el inmueble y tu barrio.' : 'Describí la falla o la mejora que querés hacer. Indicanos si es una vivienda o un comercio y en qué barrio estás.' ?></p></div></li><li class="step"><span class="step-icon"><?= icon('bolt') ?></span><div><span class="step-num">Paso 2</span><h3>Te pasamos el presupuesto</h3><p><?= $corto ? 'Sin costo y antes de empezar.' : 'Conversamos sobre la revisión, los materiales y el costo. Confirmás las condiciones antes de coordinar el trabajo.' ?></p></div></li><li class="step"><span class="step-icon"><?= icon('pin') ?></span><div><span class="step-num">Paso 3</span><h3>Coordinamos la visita</h3><p><?= $corto ? 'Día y hora según tu disponibilidad.' : 'Acordamos el día y la hora según tu disponibilidad y resolvemos tu instalación.' ?></p></div></li></ol><div class="steps-cta"><a class="button button-wsp" href="<?= e(whatsapp_url()) ?>"><?= icon('whatsapp') ?> Pedí tu presupuesto</a></div>
</div></section>
<section class="section vs-section" id="por-que-nosotros"><div class="wrap">
<div class="vs-heading"><span class="pill">Por qué elegirnos</span><h2>No todos los electricistas son iguales</h2></div>
<div class="vs-grid">
<div class="vs-col vs-col--us"><div class="vs-brand"><picture class="brand-pic"><source srcset="<?= e(asset_ver('images/logo/logo-120.webp')) ?>" type="image/webp"><img src="<?= e(asset_ver('images/logo/logo-120.png')) ?>" alt="" width="83" height="120"></picture><span>ELECTRICISTAS<strong>MONTEVIDEO</strong></span></div><ul><li><span class="vs-badge"><?= icon('check') ?></span>Presupuesto sin costo antes de empezar</li><li><span class="vs-badge"><?= icon('check') ?></span>Te explicamos la causa de la falla</li><li><span class="vs-badge"><?= icon('check') ?></span>Coordinamos día y hora por WhatsApp</li><li><span class="vs-badge"><?= icon('check') ?></span>Circuitos identificados en el tablero al terminar</li></ul></div>
<div class="vs-col vs-col--them"><h3>Lo que conviene evitar</h3><ul><li><span class="vs-badge"><?= icon('close') ?></span>Arreglos provisorios que después se olvidan</li><li><span class="vs-badge"><?= icon('close') ?></span>Subir la llave sin buscar la causa</li><li><span class="vs-badge"><?= icon('close') ?></span>Precios que aparecen recién al final</li><li><span class="vs-badge"><?= icon('close') ?></span>Tableros sin disyuntor ni puesta a tierra</li></ul></div>
</div>
</div></section>
<?php // Ilustración de stock con licencia Pexels (foto 257736), no es un trabajo propio: reemplazar por una foto real del técnico cuando esté disponible.
$about_img = 'images/nosotros/tablero-electrico-termicas.webp'; $about_has = is_file(APP_ROOT . '/public/' . $about_img); ?>
<section class="section about-section" id="quienes-somos"><div class="wrap about-grid">
<div class="about-media<?= $about_has ? '' : ' about-media--empty' ?>"><?php if ($about_has): ?><img src="<?= e(asset_ver($about_img)) ?>" alt="Tablero eléctrico con llaves térmicas, disyuntor y cableado ordenado" width="900" height="1000" loading="lazy"><?php endif; ?></div>
<?php
$about_h2 = 'Electricistas de Montevideo, para Montevideo';
$about_p1 = 'Electricistas Montevideo atiende reparaciones, instalaciones, tableros e iluminación en casas, apartamentos y comercios de Montevideo y Canelones. La idea es siempre la misma: entender el problema, explicarte qué hay que hacer y cumplir lo que se presupuestó.';
$about_p2 = 'Revisamos con instrumentos de medición, dejamos la instalación prolija y te contamos qué hicimos y por qué. El presupuesto es sin costo y se aprueba antes de empezar.';
$about_servicio = ['reparaciones'=>'reparaciones eléctricas', 'instalaciones'=>'instalaciones eléctricas', 'tableros'=>'tableros y protecciones', 'iluminacion'=>'iluminación', 'mantenimiento'=>'revisión y mantenimiento', 'comercios'=>'electricidad para comercios', 'cargadores'=>'instalación de cargadores para vehículos eléctricos', 'puesta-tierra'=>'puesta a tierra', 'recableado'=>'recableado', 'tomacorrientes'=>'tomacorrientes', 'potencia'=>'aumento de potencia', 'urgencias'=>'urgencias eléctricas'];
if ($corto) {
    // Versión corta en páginas internas: mismo bloque visual, sin repetir los párrafos de la home.
    $about_p1 = 'Entendemos el problema y te lo explicamos.';
    $about_p2 = 'Cumplimos lo que se presupuestó.';
}
if ($tpl === 'servicio') {
    $about_h2 = 'Quiénes hacen tu trabajo de ' . $about_servicio[$page['servicio']];
} elseif ($tpl === 'sz') {
    $about_h2 = mb_strtoupper(mb_substr($landing['crumb'], 0, 1)) . mb_substr(mb_strtolower($landing['crumb']), 1) . ' en ' . $bn;
} elseif ($tpl === 'zona') {
    $about_h2 = 'Electricistas de ' . $bp['depto'] . ', en ' . $bn;
} elseif ($tpl === 'zonas' || $tpl === 'region') {
    $about_h2 = 'Electricistas de Montevideo y Canelones';
}
?>
<div class="about-copy"><span class="pill">Quiénes somos</span><h2><?= e($about_h2) ?></h2><p><?= e($about_p1) ?></p><p><?= e($about_p2) ?></p><div class="about-actions"><a class="button button-wsp" href="<?= e(whatsapp_url()) ?>"><?= icon('whatsapp') ?> Pedí tu presupuesto</a><a class="text-link dark-link" href="<?= app_url('nosotros') ?>">Conocé más sobre nosotros <?= icon('arrow') ?></a></div></div>
</div></section>
<?php if ($tpl === 'home' || $tpl === 'servicio'): $zs_serv = $tpl === 'servicio' && isset($servicios_zona[$page['servicio']]) ? $page['servicio'] : null; ?>
<section class="section wrap zones-section" id="zonas"><div class="services-heading"><span class="pill">Dónde trabajamos</span><h2><?= $zs_serv ? e($landing['crumb']) . ' por barrio' : 'Montevideo y Canelones' ?></h2><a class="text-link dark-link" href="<?= app_url('zonas') ?>">Ver todas las zonas <?= icon('arrow') ?></a></div>
<p class="landing-lead"><?= $tpl === 'home' ? 'Atendemos a domicilio en Montevideo y en Canelones. Elegí tu barrio para ver cómo son las instalaciones de la zona y qué trabajos se piden más.' : 'Elegí tu barrio o tu localidad.' ?></p>
<div class="zones-cols"><?php foreach ($regiones as $rk => $rg): $lista = zonas_de_region($rk); if (!$lista) continue; ?><div><h3><?php if (local_pagina(region_url($rk))): ?><a href="<?= e(app_url(region_url($rk))) ?>"><?= e($rg['nombre']) ?></a><?php else: ?><?= e($rg['nombre']) ?><?php endif; ?></h3><ul class="zones-list"><?php foreach ($lista as $k => $z): $zu = $zs_serv && sz_publicada($zs_serv, $k) ? sz_url($zs_serv, $k) : zona_url($k); ?><li><a href="<?= e(app_url($zu)) ?>"><?= e($z['nombre']) ?></a></li><?php endforeach; ?></ul></div><?php endforeach; ?></div>
</section>
<?php endif; ?>
<section class="section wrap faq-section"><div><p class="eyebrow">ANTES DE COORDINAR</p><h2>Preguntas<br>frecuentes.</h2><p>Información para dar<br>el próximo paso.</p></div><div class="faq-list"><?php foreach ($faq_items as $f): ?><details><summary><?= e($f['q']) ?><span aria-hidden="true">+</span></summary><p><?= e($f['a']) ?></p></details><?php endforeach; ?></div></section>
<?php else: ?>
<section class="page-intro"><div class="wrap"><nav class="breadcrumb" aria-label="Miga de pan"><a href="<?= app_url() ?>">Inicio</a><span>/</span><span><?= e($page['crumb'] ?? $nav[$route] ?? 'Página no encontrada') ?></span></nav><p class="eyebrow">ELECTRICISTAS MONTEVIDEO</p><h1><?= e($page['heading']) ?></h1></div></section>
<?php if ($route === 'servicios'): ?>
<section class="section wrap services-section"><div class="services-heading"><span class="pill">Hogares y comercios</span><h2>¿Qué trabajo tenés en mente?</h2></div><?php require APP_ROOT . '/src/vista/partials/servicios.php'; ?></section>
<section class="process section"><div class="wrap narrow"><h2>Antes de pedir un presupuesto</h2><p>Indicá tu barrio, el tipo de inmueble y qué querés reparar, instalar o modificar. Cuanto más clara sea tu consulta, más fácil será conversar sobre el próximo paso.</p><p>Consultá si hace falta una visita, cuál es su costo y qué incluye la cotización. Los materiales y tiempos se definen para cada trabajo.</p><a class="text-link dark-link" href="<?= app_url('contacto') ?>">Prepará tu consulta <?= icon('arrow') ?></a></div></section>
<section class="section wrap landing-section"><div class="landing-cols">
<div class="landing-text"><h3>Cómo elegir el servicio</h3><p>Si algo dejó de funcionar, saltó la llave o hay olor a quemado, lo tuyo es una <a href="<?= e(app_url('reparaciones-electricas-montevideo')) ?>">reparación eléctrica</a>. Si estás reformando, construyendo o querés sumar puntos, es una <a href="<?= e(app_url('instalaciones-electricas-montevideo')) ?>">instalación</a>. Si el tablero tiene fusibles, no tiene disyuntor o salta seguido, empezá por <a href="<?= e(app_url('tableros-electricos-montevideo')) ?>">tableros y protecciones</a>.</p><p>Para luminarias, spots, tiras LED y luz exterior, mirá <a href="<?= e(app_url('iluminacion-montevideo')) ?>">iluminación</a>. Si no sabés en qué estado está tu instalación, o vas a comprar o alquilar, conviene una <a href="<?= e(app_url('mantenimiento-electrico-montevideo')) ?>">revisión</a>. Los locales, oficinas y consultorios tienen su propia página de <a href="<?= e(app_url('electricista-comercios-montevideo')) ?>">electricidad para comercios</a>, y si tenés un auto eléctrico o híbrido enchufable, la de <a href="<?= e(app_url('cargador-vehiculo-electrico-montevideo')) ?>">cargadores para vehículos eléctricos</a>.</p></div>
<div class="landing-text"><h3>Dónde trabajamos</h3><p>Atendemos a domicilio en Montevideo y en Canelones, con foco en Ciudad de la Costa, la Costa de Oro y el área metropolitana. Podés ver la cobertura en <a href="<?= e(app_url('zonas')) ?>">zonas de atención</a>.</p><h3>Qué pasa después de consultar</h3><p>Nos escribís por WhatsApp o nos llamás, nos contás qué necesitás y en qué zona estás, y te orientamos. Si hace falta ver la instalación, coordinamos una visita. Con eso armamos el presupuesto, sin costo, y recién cuando lo aprobás coordinamos día y hora para hacer el trabajo.</p></div>
</div></section>
<?php elseif ($route === 'nosotros'): ?>
<section class="section wrap coverage"><div><p class="eyebrow">CONTACTO DIRECTO, DESDE EL PRINCIPIO</p><h2>Electricistas Montevideo</h2><p>Este es tu punto de contacto para consultar por trabajos eléctricos en Montevideo. Podés comunicarte por teléfono o WhatsApp para conversar sobre reparaciones, instalaciones, tableros e iluminación.</p><p>Queremos que puedas explicar tu necesidad y conocer el alcance de la atención antes de coordinar. Indicanos en qué barrio estás y si la consulta es para tu casa, un comercio o una reforma.</p><a class="text-link dark-link" href="<?= app_url('servicios') ?>">Conocé los servicios <?= icon('arrow') ?></a></div><aside class="info-card"><p class="eyebrow">UNA BUENA CONSULTA INCLUYE</p><h3>Tu necesidad.<br>Tu ubicación.<br>El próximo paso.</h3><p>La disponibilidad, el costo de la visita y el presupuesto se confirman al conversar sobre tu caso.</p><a class="button button-wsp" href="<?= e(whatsapp_url()) ?>"><?= icon('whatsapp') ?> Pedí tu presupuesto</a></aside></section>
<section class="section wrap landing-section"><div class="landing-cols">
<div class="landing-text"><h3>Cómo trabajamos</h3><p>Antes de tocar nada, escuchamos: qué pasa, desde cuándo, qué se usa en ese circuito. Después revisamos con instrumentos, no a ojo, y te mostramos lo que encontramos. El presupuesto se arma sobre lo que la instalación realmente necesita, y se explica en palabras que cualquiera entiende: qué se hace, con qué materiales y por qué.</p><p>Dejamos la instalación prolija e identificada, para que cualquier electricista que venga después sepa qué hay. Cuando terminamos, te contamos qué hicimos y qué conviene tener en cuenta.</p></div>
<div class="landing-text"><h3>Qué hacemos</h3><p><a href="<?= e(app_url('reparaciones-electricas-montevideo')) ?>">Reparaciones eléctricas</a>, <a href="<?= e(app_url('instalaciones-electricas-montevideo')) ?>">instalaciones y reformas</a>, <a href="<?= e(app_url('tableros-electricos-montevideo')) ?>">tableros y protecciones</a>, <a href="<?= e(app_url('iluminacion-montevideo')) ?>">iluminación</a>, <a href="<?= e(app_url('mantenimiento-electrico-montevideo')) ?>">revisión y mantenimiento</a>, <a href="<?= e(app_url('electricista-comercios-montevideo')) ?>">electricidad para comercios</a> y <a href="<?= e(app_url('cargador-vehiculo-electrico-montevideo')) ?>">cargadores para vehículos eléctricos</a>, en casas, apartamentos, locales y oficinas.</p><h3>Dónde</h3><p>En Montevideo y Canelones. Mirá las <a href="<?= e(app_url('zonas')) ?>">zonas de atención</a> o contanos la tuya al consultar.</p></div>
</div></section>
<section class="section wrap landing-section"><div class="landing-cols">
<div class="landing-text"><h3>Seguridad primero</h3><p>Una instalación eléctrica se juzga por lo que no se ve: la sección de los cables, la calidad de los empalmes, la puesta a tierra y las protecciones del tablero. Por eso en cada trabajo revisamos que exista disyuntor diferencial y puesta a tierra, y te avisamos si faltan aunque no sea lo que nos llamaste a hacer. Preferimos decirte lo que hay que corregir antes que dejar un problema escondido.</p><p>Trabajamos con la energía cortada cuando corresponde, señalizamos lo que queda pendiente y no hacemos arreglos provisorios que después se olvidan.</p></div>
<div class="landing-text"><h3>Presupuesto claro</h3><p>El presupuesto es sin costo y por escrito. Detalla el trabajo, los materiales y el precio, y no cambia salvo que aparezca algo que no se podía ver antes de abrir, en cuyo caso te lo mostramos y lo decidís vos. No empezamos nada sin tu aprobación.</p><h3>Después del trabajo</h3><p>Te explicamos qué hicimos, qué llave corresponde a cada circuito y qué conviene tener en cuenta. Si más adelante surge una duda sobre lo que instalamos, nos escribís y la resolvemos.</p></div>
</div></section>
<?php elseif ($route === 'trabajos'): ?>
<section class="section wrap narrow"><p class="eyebrow">TRABAJOS ELÉCTRICOS</p><h2>Próximamente, nuestros trabajos.</h2><p>En este espacio compartiremos fotografías y detalles de trabajos eléctricos realizados. Todavía no hay trabajos publicados.</p><p>Mientras tanto, podés <a href="<?= app_url('servicios') ?>">conocer los servicios</a> o contarnos qué necesitás para tu casa o comercio.</p></section>
<?php elseif ($route === 'contacto'): ?>
<section class="section wrap contact-grid"><div><p class="eyebrow">HABLEMOS DE TU INSTALACIÓN</p><h2>Elegí cómo<br>contactarnos.</h2><p>Estamos en Montevideo. Indicanos tu barrio y consultá disponibilidad para coordinar.</p><a class="contact-method" href="tel:+<?= e($empresa_telefono) ?>"><?= icon('phone') ?><span><small>Llamanos</small><strong><?= e($empresa_telefono_sep) ?></strong></span><?= icon('arrow') ?></a><a class="contact-method" href="<?= e(whatsapp_url()) ?>"><?= icon('whatsapp') ?><span><small>Escribinos por WhatsApp</small><strong><?= e($empresa_whatsapp_visible) ?></strong></span><?= icon('arrow') ?></a></div>
<form class="contact-form" id="consulta-form" action="<?= e($social_whatsapp) ?>" method="get"><h2>Prepará tu consulta</h2><p>Completá estos datos para abrir un mensaje en WhatsApp. Vos decidís cuándo enviarlo.</p><label for="nombre">Tu nombre</label><input id="nombre" name="nombre" autocomplete="given-name" maxlength="80" required><label for="barrio">Barrio de Montevideo</label><input id="barrio" name="barrio" autocomplete="address-level3" maxlength="100" required placeholder="¿En qué barrio estás?"><label for="mensaje">¿Qué necesitás resolver?</label><textarea id="mensaje" name="mensaje" rows="4" maxlength="1500" required placeholder="Contanos sobre la falla, instalación o reforma."></textarea><button class="button" type="submit">Preparar mensaje <?= icon('arrow') ?></button><p class="form-note">Los datos no se guardan en este sitio.</p><noscript><p>Para preparar el mensaje necesitás JavaScript. También podés <a href="<?= e(whatsapp_url()) ?>">abrir WhatsApp directamente</a> o llamarnos.</p></noscript><a class="button button-wsp prepared-message" id="mensaje-listo" hidden href="<?= e(whatsapp_url()) ?>"><?= icon('whatsapp') ?> Pedí tu presupuesto</a><p id="form-status" role="status" aria-live="polite"></p></form>
</section>
<section class="section wrap landing-section"><div class="landing-cols">
<div class="landing-text"><h3>Qué contarnos</h3><p>Tres cosas alcanzan para orientarte: en qué zona estás, si es una casa, un apartamento o un comercio, y qué necesitás resolver. Si tenés una foto del tablero o del punto con problemas, sumala: ayuda a entender la situación antes de la visita. No manipules cables ni abras el tablero para sacarla.</p></div>
<div class="landing-text"><h3>Cómo seguimos</h3><p>Te respondemos por el mismo medio, te orientamos y, si hace falta ver la instalación, coordinamos una visita. Con eso te pasamos el presupuesto sin costo. Atendemos <a href="<?= e(app_url('zonas')) ?>">Montevideo y Canelones</a> con todos nuestros <a href="<?= e(app_url('servicios')) ?>">servicios</a>.</p></div>
</div></section>
<section class="section wrap landing-section"><div class="landing-cols">
<div class="landing-text"><h3>Urgencias</h3><p>Si hay olor a quemado, chispas o un tomacorriente caliente, bajá la llave general y llamanos. Si saltó la llave y no vuelve a subir, no la fuerces: desconectá los equipos del circuito afectado y consultanos. En los dos casos, cuanto antes lo veamos, menor suele ser la reparación.</p><h3>Horario de respuesta</h3><p>Respondemos por WhatsApp y teléfono durante el día. Fuera de ese horario podés dejarnos el mensaje igual: lo vemos apenas volvemos y te contestamos para coordinar.</p></div>
<div class="landing-text"><h3>Para comercios y edificios</h3><p>Si la consulta es para un local, una oficina o los espacios comunes de un edificio, contanos el horario en que se puede trabajar y si hace falta coordinar con una administración. Planificamos los trabajos por etapas o fuera del horario de atención para que la actividad no se detenga.</p><h3>Qué no hacemos por WhatsApp</h3><p>No damos precios cerrados sin ver la instalación ni instrucciones para manipular cables o tableros. Lo que sí hacemos es orientarte con lo que nos contás y coordinar la visita para resolverlo bien.</p></div>
</div></section>
<?php else: ?>
<section class="section wrap narrow"><p>Revisá la dirección o volvé a la página de inicio.</p><a class="button" href="<?= app_url() ?>">Volver al inicio <?= icon('arrow') ?></a></section>
<?php endif; ?>
<?php endif; ?>
<?php
$cta_h2 = '¿Necesitás un electricista?'; $cta_p = 'Presupuesto sin costo.'; $cta_wsp = whatsapp_url();
$cta_por_servicio = [
    'reparaciones' => ['¿Saltó la llave o algo dejó de funcionar?', 'Contanos la falla y te pasamos presupuesto sin costo.'],
    'instalaciones' => ['¿Reforma o instalación nueva?', 'Planificamos la instalación con vos. Presupuesto sin costo.'],
    'tableros' => ['¿Tu tablero necesita renovarse?', 'Térmicas, disyuntor y puesta a tierra. Presupuesto sin costo.'],
    'iluminacion' => ['¿Querés renovar la iluminación?', 'Contanos qué ambiente y te asesoramos. Presupuesto sin costo.'],
    'mantenimiento' => ['¿Querés saber cómo está tu instalación?', 'Revisión completa con informe claro. Presupuesto sin costo.'],
    'comercios' => ['¿Tu comercio necesita un electricista?', 'Coordinamos sin frenar tu actividad. Presupuesto sin costo.'],
    'cargadores' => ['¿Querés cargar tu auto eléctrico en casa?', 'Instalamos tu cargador con circuito dedicado. Presupuesto sin costo.'],
    'puesta-tierra' => ['¿No sabés si tu casa tiene tierra?', 'La medimos y te decimos qué falta. Presupuesto sin costo.'],
    'recableado' => ['¿Tu instalación tiene muchos años?', 'Renovamos por etapas. Presupuesto sin costo.'],
    'tomacorrientes' => ['¿Te faltan enchufes o alguno calienta?', 'Contanos dónde y te orientamos. Presupuesto sin costo.'],
    'potencia' => ['¿Te quedó corta la potencia?', 'Revisamos tu consumo antes del trámite. Presupuesto sin costo.'],
    'urgencias' => ['¿Tenés una falla eléctrica ahora?', 'Llamanos y consultá la disponibilidad.'],
];
if ($tpl === 'servicio') { [$cta_h2, $cta_p] = $cta_por_servicio[$page['servicio']]; $cta_wsp = $hero_wsp; }
elseif ($tpl === 'zona') { $cta_h2 = '¿Necesitás un electricista en ' . $bn . '?'; $cta_p = 'Presupuesto sin costo.'; $cta_wsp = $hero_wsp; }
elseif ($tpl === 'sz') { $cta_h2 = $cta_por_servicio[$sz_serv][0]; $cta_p = 'En ' . $bn . ', presupuesto sin costo.'; $cta_wsp = $hero_wsp; }
elseif ($tpl === 'zonas' || $tpl === 'region') { $cta_h2 = '¿Necesitás un electricista en tu zona?'; $cta_p = 'Montevideo y Canelones. Presupuesto sin costo.'; $cta_wsp = $hero_wsp; }
?>
<?php if (($route === '' || isset($pages[$route])) && $route !== 'contacto'): ?><section class="contact-banner"><img class="contact-banner-bg" src="<?= e(asset_ver('images/index/hero/electricista-montevideo-tablero-electrico-desktop.webp')) ?>" alt="" width="1672" height="941" loading="lazy" aria-hidden="true"><div class="wrap"><div><h2><?= e($cta_h2) ?></h2><p><?= e($cta_p) ?></p></div><a class="button button-wsp" href="<?= e($cta_wsp) ?>"><?= icon('whatsapp') ?> Pedí tu presupuesto</a></div></section><?php endif; ?>
<?php require APP_ROOT . '/src/vista/partials/relacionados.php'; ?>
</main>
<?php require APP_ROOT . '/src/vista/partials/footer.php'; ?>
