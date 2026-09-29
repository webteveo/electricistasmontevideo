<?php
// Páginas generales. Servicios en servicios.php; zonas activas en barrios.php.
$pages = [
    ''=>['title'=>'Electricista en Montevideo – Reparaciones, tableros y más', 'description'=>'Electricista a domicilio en Montevideo y Canelones: llaves que saltan, tableros, instalaciones y cargadores. Pedí presupuesto por WhatsApp.', 'mod'=>'2026-09-29', 'heading'=>'Electricistas en Montevideo'],
    'servicios'=>['title'=>'Servicios de electricista en Montevideo y Canelones', 'description'=>'Reparaciones, tableros, puesta a tierra, recableado, instalaciones, iluminación y cargadores. Elegí según lo que pasa y pedí presupuesto.', 'heading'=>'Servicios de electricista en Montevideo.', 'mod'=>'2026-09-29'],
    'nosotros'=>['title'=>'Quiénes somos – Electricistas Montevideo a domicilio', 'description'=>'Conocé Electricistas Montevideo y cómo consultar por un trabajo eléctrico. Contacto directo para conversar sobre tu necesidad y coordinar la atención.', 'heading'=>'Hablemos de lo que necesitás resolver.'],
    'trabajos'=>['title'=>'Trabajos eléctricos | Electricistas Montevideo', 'description'=>'Espacio de trabajos de Electricistas Montevideo. Consultá por tu instalación o reparación eléctrica en Montevideo al 097 406 456.', 'heading'=>'Cada trabajo empieza con una consulta.', 'noindex'=>true],
    'contacto'=>['title'=>'Contacto – Electricista en Montevideo por WhatsApp', 'description'=>'Escribinos por WhatsApp o llamanos. Contanos qué trabajo eléctrico necesitás y en qué zona estás, y te pasamos el presupuesto sin costo.', 'heading'=>'Contanos qué necesitás.', 'mod'=>'2026-09-29'],
    'como-funciona'=>['title'=>'Cómo funciona – Electricista a domicilio en Montevideo', 'description'=>'Cómo trabaja Electricistas Montevideo: qué mandar por WhatsApp, cómo es la visita, el presupuesto sin costo y qué no hacemos. Paso a paso.', 'heading'=>'Cómo trabajamos, paso a paso.', 'crumb'=>'Cómo funciona', 'mod'=>'2026-09-29'],
];
$nav = [''=>'Inicio', 'servicios'=>'Servicios', 'nosotros'=>'Nosotros', 'trabajos'=>'Trabajos', 'contacto'=>'Contacto'];
require_once __DIR__ . '/servicios.php';
// 'text' se muestra en la home y en /servicios; 'corto' (menos de 8 palabras) en el resto de las páginas.
$services = [
    ['id'=>'reparaciones', 'icon'=>'bolt', 'title'=>'Reparaciones eléctricas', 'text'=>'¿Tenés una falla, una llave que salta o un punto que dejó de funcionar? Contanos qué sucede para consultar por una revisión.', 'corto'=>'Llaves que saltan, cortes y cortocircuitos.'],
    ['id'=>'urgencias', 'icon'=>'alert', 'title'=>'Urgencias eléctricas', 'text'=>'Olor a quemado, chispas, un tomacorriente caliente o la casa sin luz: qué hacer mientras llega el electricista y cómo consultar.', 'corto'=>'Olor a quemado, chispas o sin luz.'],
    ['id'=>'instalaciones', 'icon'=>'plug', 'title'=>'Instalaciones y reformas', 'text'=>'Consultá por nuevos puntos eléctricos, tomacorrientes y cambios en la instalación de tu casa o comercio.', 'corto'=>'Obra nueva, reformas y circuitos.'],
    ['id'=>'tableros', 'icon'=>'panel', 'title'=>'Tableros y protecciones', 'text'=>'Planteanos tu consulta sobre tableros, llaves térmicas o disyuntores para evaluar el trabajo que necesitás.', 'corto'=>'Térmicas, disyuntor diferencial y cambio de tablero.'],
    ['id'=>'puesta-tierra', 'icon'=>'ground', 'title'=>'Puesta a tierra', 'text'=>'Medimos la tierra de tu casa o local, instalamos jabalina y conductor de protección, y dejamos la medición anotada.', 'corto'=>'Medición, jabalina y conductor de protección.'],
    ['id'=>'recableado', 'icon'=>'cable', 'title'=>'Recableado de casas viejas', 'text'=>'Cables con la aislación reseca, empalmes precarios o instalación sin tierra: renovamos por circuitos o completa, sin rehacer todo de golpe.', 'corto'=>'Renovación de cables por circuitos.'],
    ['id'=>'tomacorrientes', 'icon'=>'socket', 'title'=>'Tomacorrientes y llaves', 'text'=>'Tomacorrientes nuevos, cambio de enchufes de dos patas por tres, puntos que calientan y llaves de luz que fallan.', 'corto'=>'Enchufes nuevos, cambios y puntos que calientan.'],
    ['id'=>'iluminacion', 'icon'=>'bulb', 'title'=>'Iluminación', 'text'=>'¿Querés colocar una luminaria o renovar la iluminación de un ambiente? Contanos tu idea y dónde la necesitás.', 'corto'=>'Luminarias, spots, LED y luz exterior.'],
    ['id'=>'mantenimiento', 'icon'=>'tool', 'title'=>'Revisión y mantenimiento', 'text'=>'Si tu instalación necesita una revisión, explicanos su estado y las situaciones que querés resolver.', 'corto'=>'Revisión completa con informe.'],
    ['id'=>'potencia', 'icon'=>'gauge', 'title'=>'Aumento de potencia y trámites UTE', 'text'=>'Si te salta la llave general o vas a sumar equipos, revisamos el consumo y te orientamos con el trámite de potencia ante UTE.', 'corto'=>'Potencia contratada, trifásica y trámites.'],
    ['id'=>'comercios', 'icon'=>'store', 'title'=>'Electricidad para comercios', 'text'=>'Consultá por las necesidades eléctricas de tu local y coordiná el alcance del trabajo según su uso.', 'corto'=>'Locales, oficinas y consultorios.'],
    ['id'=>'cargadores', 'icon'=>'ev', 'title'=>'Cargadores para vehículos eléctricos', 'text'=>'Instalamos el punto de carga para tu auto eléctrico o híbrido enchufable en tu garaje o cochera, con circuito dedicado y protecciones.', 'corto'=>'Wallbox con circuito dedicado.'],
];
$faq = [
    ['q'=>'¿Cómo contacto a un electricista en Montevideo?', 'a'=>'Podés llamar al 097 406 456 o escribirnos por WhatsApp al +598 97 406 456. Contanos qué necesitás y en qué barrio estás para consultar la disponibilidad.'],
    ['q'=>'¿Cuánto cuesta un trabajo eléctrico?', 'a'=>'La cotización depende del problema, el alcance del trabajo y los materiales necesarios. Consultá el costo de la visita y las condiciones del presupuesto antes de coordinar.'],
    ['q'=>'¿Qué información conviene enviar por WhatsApp?', 'a'=>'Indicá tu barrio, si se trata de una casa o comercio y qué necesitás resolver. Si ya tenés una foto del lugar, podés adjuntarla sin manipular la instalación.'],
    ['q'=>'¿Atienden urgencias eléctricas?', 'a'=>'Llamanos para consultar la disponibilidad en ese momento. La atención y el horario de la visita se confirman al coordinar.'],
    ['q'=>'¿Puedo consultar por una reforma o instalación nueva?', 'a'=>'Sí. Contanos qué cambios tenés previstos, en qué tipo de inmueble y en qué zona. El alcance de la instalación se evalúa según cada caso.'],
];
