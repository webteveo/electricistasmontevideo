<?php
// Páginas generales. Servicios en servicios.php; zonas activas en barrios.php.
$pages = [
    ''=>['title'=>'Electricista en Montevideo – Reparaciones, tableros y más', 'description'=>'Electricista a domicilio en Montevideo y Canelones: llaves que saltan, tableros, instalaciones y cargadores. Pedí presupuesto por WhatsApp.', 'mod'=>'2026-09-25', 'heading'=>'Electricistas en Montevideo'],
    'servicios'=>['title'=>'Servicios de electricista en Montevideo y Canelones', 'description'=>'Reparaciones, instalaciones, tableros, iluminación, revisión, comercios y cargadores para autos eléctricos. Elegí el servicio y pedí presupuesto.', 'heading'=>'Servicios eléctricos para tu día a día.'],
    'nosotros'=>['title'=>'Quiénes somos – Electricistas Montevideo', 'description'=>'Conocé Electricistas Montevideo y cómo consultar por un trabajo eléctrico. Contacto directo para conversar sobre tu necesidad y coordinar la atención.', 'heading'=>'Hablemos de lo que necesitás resolver.'],
    'trabajos'=>['title'=>'Trabajos eléctricos | Electricistas Montevideo', 'description'=>'Espacio de trabajos de Electricistas Montevideo. Consultá por tu instalación o reparación eléctrica en Montevideo al 097 406 456.', 'heading'=>'Cada trabajo empieza con una consulta.', 'noindex'=>true],
    'contacto'=>['title'=>'Contacto – Electricista en Montevideo por WhatsApp', 'description'=>'Escribinos por WhatsApp o llamanos. Contanos qué trabajo eléctrico necesitás y en qué zona estás, y te pasamos el presupuesto sin costo.', 'heading'=>'Contanos qué necesitás.'],
];
$nav = [''=>'Inicio', 'servicios'=>'Servicios', 'nosotros'=>'Nosotros', 'trabajos'=>'Trabajos', 'contacto'=>'Contacto'];
require_once __DIR__ . '/servicios.php';
$services = [
    ['id'=>'reparaciones', 'icon'=>'bolt', 'title'=>'Reparaciones eléctricas', 'text'=>'¿Tenés una falla, una llave que salta o un punto que dejó de funcionar? Contanos qué sucede para consultar por una revisión.'],
    ['id'=>'instalaciones', 'icon'=>'plug', 'title'=>'Instalaciones y reformas', 'text'=>'Consultá por nuevos puntos eléctricos, tomacorrientes y cambios en la instalación de tu casa o comercio.'],
    ['id'=>'tableros', 'icon'=>'panel', 'title'=>'Tableros y protecciones', 'text'=>'Planteanos tu consulta sobre tableros, llaves térmicas o disyuntores para evaluar el trabajo que necesitás.'],
    ['id'=>'iluminacion', 'icon'=>'bulb', 'title'=>'Iluminación', 'text'=>'¿Querés colocar una luminaria o renovar la iluminación de un ambiente? Contanos tu idea y dónde la necesitás.'],
    ['id'=>'mantenimiento', 'icon'=>'tool', 'title'=>'Revisión y mantenimiento', 'text'=>'Si tu instalación necesita una revisión, explicanos su estado y las situaciones que querés resolver.'],
    ['id'=>'comercios', 'icon'=>'store', 'title'=>'Electricidad para comercios', 'text'=>'Consultá por las necesidades eléctricas de tu local y coordiná el alcance del trabajo según su uso.'],
    ['id'=>'cargadores', 'icon'=>'ev', 'title'=>'Cargadores para vehículos eléctricos', 'text'=>'Instalamos el punto de carga para tu auto eléctrico o híbrido enchufable en tu garaje o cochera, con circuito dedicado y protecciones.'],
];
$faq = [
    ['q'=>'¿Cómo contacto a un electricista en Montevideo?', 'a'=>'Podés llamar al 097 406 456 o escribirnos por WhatsApp al +598 97 406 456. Contanos qué necesitás y en qué barrio estás para consultar la disponibilidad.'],
    ['q'=>'¿Cuánto cuesta un trabajo eléctrico?', 'a'=>'La cotización depende del problema, el alcance del trabajo y los materiales necesarios. Consultá el costo de la visita y las condiciones del presupuesto antes de coordinar.'],
    ['q'=>'¿Qué información conviene enviar por WhatsApp?', 'a'=>'Indicá tu barrio, si se trata de una casa o comercio y qué necesitás resolver. Si ya tenés una foto del lugar, podés adjuntarla sin manipular la instalación.'],
    ['q'=>'¿Atienden urgencias eléctricas?', 'a'=>'Llamanos para consultar la disponibilidad en ese momento. La atención y el horario de la visita se confirman al coordinar.'],
    ['q'=>'¿Puedo consultar por una reforma o instalación nueva?', 'a'=>'Sí. Contanos qué cambios tenés previstos, en qué tipo de inmueble y en qué zona. El alcance de la instalación se evalúa según cada caso.'],
];
