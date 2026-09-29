<?php
// ZONAS CON PÁGINA PROPIA: barrios de Montevideo (los 62 oficiales de la Intendencia, con los nombres de uso común)
// y localidades principales de Canelones.
//  - /zonas/{slug}: página de zona. Solo se publica si existe content/zonas/{slug}.php con 'intro' (texto propio).
//  - /{servicio}/{slug}: servicio × barrio (ej. /tableros-electricos/prado). Solo si ese archivo trae su texto en 'servicios'.
//  - Las 5 zonas históricas ('legacy') conservan su URL /electricista-{slug} y su texto en barrios.php; su archivo en
//    content/zonas/ trae solo los textos por servicio.
//  - $publicar_regiones permite subir el sitio por tandas: una región en false no publica sus páginas nuevas.
// Datos por zona: nombre, art (el/la, para "en el Cerro"), oficial (nombre de la Intendencia si difiere), region, depto,
// vivienda y epoca (texto corto para la ficha), costera (salinidad), vecinos (3-5 linderos reales), refs y areas (schema).

$regiones = [
    'centro'    => ['slug'=>'centro-y-ciudad-vieja', 'nombre'=>'Centro, Ciudad Vieja y alrededores', 'depto'=>'Montevideo'],
    'costa'     => ['slug'=>'costa-este', 'nombre'=>'Costa este, de Punta Carretas a Carrasco', 'depto'=>'Montevideo'],
    'este'      => ['slug'=>'este-y-noreste', 'nombre'=>'Este y noreste de Montevideo', 'depto'=>'Montevideo'],
    'norte'     => ['slug'=>'norte-de-montevideo', 'nombre'=>'Norte de Montevideo', 'depto'=>'Montevideo'],
    'oeste'     => ['slug'=>'oeste-y-cerro', 'nombre'=>'Oeste de Montevideo y el Cerro', 'depto'=>'Montevideo'],
    'canelones' => ['slug'=>'canelones', 'nombre'=>'Canelones: área metropolitana y costa', 'depto'=>'Canelones'],
];

// Interruptor por tanda de publicación. false = las páginas nuevas de esa región no se sirven ni van al sitemap.
$publicar_regiones = ['centro'=>true, 'costa'=>true, 'este'=>true, 'norte'=>true, 'oeste'=>true, 'canelones'=>true];

// Servicios con página por barrio: id de $servicios_landing => [base de la URL, nombre para el H1].
$servicios_zona = [
    'reparaciones' => ['base'=>'reparaciones-electricas', 'h1'=>'Reparaciones eléctricas'],
    'tableros'     => ['base'=>'tableros-electricos', 'h1'=>'Tableros eléctricos'],
    'recableado'   => ['base'=>'recableado-electrico', 'h1'=>'Recableado eléctrico'],
    'cargadores'   => ['base'=>'cargador-vehiculo-electrico', 'h1'=>'Cargador para auto eléctrico'],
];

$zonas = [
    // ════ CENTRO, CIUDAD VIEJA Y ALREDEDORES ════
    'ciudad-vieja' => ['nombre'=>'Ciudad Vieja', 'art'=>'la', 'region'=>'centro', 'depto'=>'Montevideo', 'vivienda'=>'Edificios patrimoniales, oficinas y apartamentos reciclados', 'epoca'=>'Siglo XIX y primera mitad del XX', 'costera'=>true, 'vecinos'=>['centro','barrio-sur','aguada'], 'refs'=>'la peatonal Sarandí, la plaza Matriz y el puerto', 'areas'=>['Ciudad Vieja']],
    'centro' => ['nombre'=>'Centro', 'art'=>'el', 'region'=>'centro', 'depto'=>'Montevideo', 'legacy'=>true, 'vivienda'=>'Edificios de oficinas, apartamentos antiguos y locales', 'epoca'=>'Principios y mediados del siglo XX', 'costera'=>false, 'vecinos'=>['ciudad-vieja','cordon','barrio-sur','aguada','palermo'], 'refs'=>'18 de Julio, la plaza Independencia y la plaza Cagancha', 'areas'=>['Centro']],
    'barrio-sur' => ['nombre'=>'Barrio Sur', 'region'=>'centro', 'depto'=>'Montevideo', 'vivienda'=>'Casas de época, conventillos reciclados y edificios de rambla', 'epoca'=>'Fines del siglo XIX a mediados del XX', 'costera'=>true, 'vecinos'=>['ciudad-vieja','centro','palermo','cordon'], 'refs'=>'la rambla Gran Bretaña, la calle Durazno y el Cementerio Central', 'areas'=>['Barrio Sur']],
    'cordon' => ['nombre'=>'Cordón', 'art'=>'el', 'region'=>'centro', 'depto'=>'Montevideo', 'vivienda'=>'Apartamentos, PH, casas de altos y locales', 'epoca'=>'Primera mitad del siglo XX, con torres nuevas', 'costera'=>false, 'vecinos'=>['centro','tres-cruces','parque-rodo','palermo','la-comercial'], 'refs'=>'18 de Julio, la Universidad y la feria de Tristán Narvaja', 'areas'=>['Cordón','Cordón Norte']],
    'palermo' => ['nombre'=>'Palermo', 'region'=>'centro', 'depto'=>'Montevideo', 'vivienda'=>'Casas de una y dos plantas, PH y edificios sobre la rambla', 'epoca'=>'Principios del siglo XX, con reciclajes recientes', 'costera'=>true, 'vecinos'=>['barrio-sur','cordon','parque-rodo','centro'], 'refs'=>'la rambla, la calle Isla de Flores y Gonzalo Ramírez', 'areas'=>['Palermo']],
    'parque-rodo' => ['nombre'=>'Parque Rodó', 'region'=>'centro', 'depto'=>'Montevideo', 'vivienda'=>'Apartamentos, casas de estilo y edificios frente al parque', 'epoca'=>'Décadas de 1920 a 1960, con edificios nuevos', 'costera'=>true, 'vecinos'=>['punta-carretas','palermo','cordon','pocitos'], 'refs'=>'el parque, la playa Ramírez y la Facultad de Ingeniería', 'areas'=>['Parque Rodó']],
    'aguada' => ['nombre'=>'Aguada', 'art'=>'la', 'region'=>'centro', 'depto'=>'Montevideo', 'vivienda'=>'Casas antiguas, cooperativas nuevas y edificios', 'epoca'=>'Principios del siglo XX y obras de este siglo', 'costera'=>false, 'vecinos'=>['centro','cordon','villa-munoz','reducto','capurro'], 'refs'=>'el Palacio Legislativo, la avenida del Libertador y la Torre de las Telecomunicaciones', 'areas'=>['Aguada','Arroyo Seco']],
    'tres-cruces' => ['nombre'=>'Tres Cruces', 'region'=>'centro', 'depto'=>'Montevideo', 'vivienda'=>'Torres de apartamentos, casas y oficinas', 'epoca'=>'Mediados del siglo XX a hoy', 'costera'=>false, 'vecinos'=>['cordon','la-comercial','larranaga','la-blanqueada','parque-batlle'], 'refs'=>'la terminal, Bulevar Artigas y 8 de Octubre', 'areas'=>['Tres Cruces']],
    'la-comercial' => ['nombre'=>'La Comercial', 'region'=>'centro', 'depto'=>'Montevideo', 'vivienda'=>'Casas de altos, PH y talleres reconvertidos', 'epoca'=>'Principios y mediados del siglo XX', 'costera'=>false, 'vecinos'=>['cordon','tres-cruces','villa-munoz','la-figurita','larranaga'], 'refs'=>'la avenida General Flores, Bulevar Artigas y el Mercado Agrícola', 'areas'=>['La Comercial']],
    'villa-munoz' => ['nombre'=>'Villa Muñoz', 'oficial'=>'Villa Muñoz–Retiro', 'region'=>'centro', 'depto'=>'Montevideo', 'vivienda'=>'Casas antiguas, PH y comercios mayoristas', 'epoca'=>'Principios del siglo XX', 'costera'=>false, 'vecinos'=>['la-comercial','aguada','reducto','la-figurita','cordon'], 'refs'=>'la zona de Goes, la avenida General Flores y la calle Arenal Grande', 'areas'=>['Villa Muñoz','Goes','Retiro']],

    // ════ COSTA ESTE ════
    'punta-carretas' => ['nombre'=>'Punta Carretas', 'region'=>'costa', 'depto'=>'Montevideo', 'vivienda'=>'Torres, edificios de mediana altura y casas', 'epoca'=>'Mediados del siglo XX a hoy', 'costera'=>true, 'vecinos'=>['pocitos','parque-rodo','cordon'], 'refs'=>'la rambla, el shopping y la zona del faro', 'areas'=>['Punta Carretas','Villa Biarritz']],
    'pocitos' => ['nombre'=>'Pocitos', 'region'=>'costa', 'depto'=>'Montevideo', 'legacy'=>true, 'vivienda'=>'Torres con portería, edificios y casas interiores', 'epoca'=>'De los años 50 a hoy', 'costera'=>true, 'vecinos'=>['punta-carretas','buceo','parque-batlle','parque-rodo'], 'refs'=>'la rambla, Bulevar España y la avenida Brasil', 'areas'=>['Pocitos','Pocitos Nuevo']],
    'buceo' => ['nombre'=>'Buceo', 'art'=>'el', 'region'=>'costa', 'depto'=>'Montevideo', 'vivienda'=>'Torres nuevas, edificios y casas', 'epoca'=>'De los años 60 a hoy', 'costera'=>true, 'vecinos'=>['pocitos','malvin','parque-batlle','la-blanqueada','union'], 'refs'=>'el Montevideo Shopping, el puerto del Buceo y la rambla Armenia', 'areas'=>['Buceo']],
    'parque-batlle' => ['nombre'=>'Parque Batlle', 'oficial'=>'Parque Batlle–Villa Dolores', 'region'=>'costa', 'depto'=>'Montevideo', 'vivienda'=>'Casas con jardín, edificios bajos y clínicas', 'epoca'=>'Décadas de 1930 a 1970', 'costera'=>false, 'vecinos'=>['buceo','tres-cruces','la-blanqueada','pocitos'], 'refs'=>'el Estadio Centenario, la avenida Italia y el Hospital de Clínicas', 'areas'=>['Parque Batlle','Villa Dolores']],
    'malvin' => ['nombre'=>'Malvín', 'region'=>'costa', 'depto'=>'Montevideo', 'vivienda'=>'Casas con fondo y edificios bajos', 'epoca'=>'Décadas de 1940 a 1980', 'costera'=>true, 'vecinos'=>['buceo','punta-gorda','malvin-norte'], 'refs'=>'la rambla O\'Higgins, la avenida Italia y la playa Malvín', 'areas'=>['Malvín']],
    'malvin-norte' => ['nombre'=>'Malvín Norte', 'region'=>'costa', 'depto'=>'Montevideo', 'vivienda'=>'Complejos de vivienda, cooperativas y casas', 'epoca'=>'Complejos de los años 70 y 80', 'costera'=>false, 'vecinos'=>['malvin','las-canteras','union','buceo','punta-gorda'], 'refs'=>'la avenida Italia, la Facultad de Ciencias y los complejos de Euskal Erría', 'areas'=>['Malvín Norte']],
    'punta-gorda' => ['nombre'=>'Punta Gorda', 'region'=>'costa', 'depto'=>'Montevideo', 'vivienda'=>'Casas con jardín y edificios bajos', 'epoca'=>'Décadas de 1940 a 1980', 'costera'=>true, 'vecinos'=>['malvin','carrasco','carrasco-norte','malvin-norte'], 'refs'=>'la plaza Virgilio, la rambla y la avenida Bolivia', 'areas'=>['Punta Gorda']],
    'carrasco' => ['nombre'=>'Carrasco', 'region'=>'costa', 'depto'=>'Montevideo', 'legacy'=>true, 'vivienda'=>'Casas grandes con jardín y edificios bajos', 'epoca'=>'Desde los años 20, con casas nuevas', 'costera'=>true, 'vecinos'=>['punta-gorda','carrasco-norte','paso-carrasco','ciudad-de-la-costa'], 'refs'=>'la rambla, la avenida Arocena y el Hotel Carrasco', 'areas'=>['Carrasco','Barra de Carrasco']],
    'carrasco-norte' => ['nombre'=>'Carrasco Norte', 'region'=>'costa', 'depto'=>'Montevideo', 'vivienda'=>'Casas con garaje y barrios residenciales', 'epoca'=>'Décadas de 1960 a hoy', 'costera'=>false, 'vecinos'=>['carrasco','punta-gorda','las-canteras','banados-de-carrasco'], 'refs'=>'la avenida Italia, Camino Carrasco y la avenida Bolivia', 'areas'=>['Carrasco Norte']],

    // ════ ESTE Y NORESTE ════
    'la-blanqueada' => ['nombre'=>'La Blanqueada', 'region'=>'este', 'depto'=>'Montevideo', 'vivienda'=>'Casas, PH y edificios sobre las avenidas', 'epoca'=>'Primera mitad del siglo XX', 'costera'=>false, 'vecinos'=>['parque-batlle','tres-cruces','larranaga','union','buceo'], 'refs'=>'8 de Octubre, la avenida Italia y el Hospital Italiano', 'areas'=>['La Blanqueada']],
    'union' => ['nombre'=>'Unión', 'art'=>'la', 'region'=>'este', 'depto'=>'Montevideo', 'vivienda'=>'Casas antiguas, PH y locales sobre 8 de Octubre', 'epoca'=>'Fines del siglo XIX a mediados del XX', 'costera'=>false, 'vecinos'=>['la-blanqueada','villa-espanola','maronas','malvin-norte','buceo'], 'refs'=>'la avenida 8 de Octubre, la plaza de la Restauración y el Hospital Pasteur', 'areas'=>['Unión']],
    'villa-espanola' => ['nombre'=>'Villa Española', 'region'=>'este', 'depto'=>'Montevideo', 'vivienda'=>'Casas obreras, cooperativas y talleres', 'epoca'=>'Décadas de 1920 a 1960', 'costera'=>false, 'vecinos'=>['union','mercado-modelo','castro','maronas'], 'refs'=>'la avenida José Pedro Varela, el Antel Arena y la ex fábrica Funsa', 'areas'=>['Villa Española']],
    'maronas' => ['nombre'=>'Maroñas', 'oficial'=>'Maroñas–Parque Guaraní', 'region'=>'este', 'depto'=>'Montevideo', 'vivienda'=>'Casas de una planta y conjuntos de vivienda', 'epoca'=>'Décadas de 1930 a 1980', 'costera'=>false, 'vecinos'=>['flor-de-maronas','ituzaingo','union','villa-espanola','jardines-del-hipodromo'], 'refs'=>'el Hipódromo de Maroñas y la avenida 8 de Octubre', 'areas'=>['Maroñas','Parque Guaraní']],
    'flor-de-maronas' => ['nombre'=>'Flor de Maroñas', 'region'=>'este', 'depto'=>'Montevideo', 'vivienda'=>'Casas de una planta con ampliaciones', 'epoca'=>'Décadas de 1950 a 1990', 'costera'=>false, 'vecinos'=>['maronas','jardines-del-hipodromo','las-canteras','punta-de-rieles'], 'refs'=>'la zona al este del Hipódromo y Camino Maldonado', 'areas'=>['Flor de Maroñas']],
    'ituzaingo' => ['nombre'=>'Ituzaingó', 'region'=>'este', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio y conjuntos habitacionales', 'epoca'=>'Décadas de 1950 a 1980', 'costera'=>false, 'vecinos'=>['maronas','jardines-del-hipodromo','castro','villa-espanola'], 'refs'=>'la zona al norte de Maroñas y la avenida José Belloni', 'areas'=>['Ituzaingó']],
    'jardines-del-hipodromo' => ['nombre'=>'Jardines del Hipódromo', 'region'=>'este', 'depto'=>'Montevideo', 'vivienda'=>'Casas de una planta y complejos', 'epoca'=>'Décadas de 1950 a 1990', 'costera'=>false, 'vecinos'=>['maronas','ituzaingo','piedras-blancas','punta-de-rieles','flor-de-maronas'], 'refs'=>'la zona al norte del Hipódromo de Maroñas', 'areas'=>['Jardines del Hipódromo']],
    'las-canteras' => ['nombre'=>'Las Canteras', 'region'=>'este', 'depto'=>'Montevideo', 'vivienda'=>'Casas con terreno y conjuntos de vivienda', 'epoca'=>'Décadas de 1960 a hoy', 'costera'=>false, 'vecinos'=>['malvin-norte','carrasco-norte','punta-gorda','flor-de-maronas','punta-de-rieles'], 'refs'=>'Camino Carrasco y el Parque Rivera', 'areas'=>['Las Canteras']],
    'punta-de-rieles' => ['nombre'=>'Punta de Rieles', 'oficial'=>'Punta de Rieles–Bella Italia', 'region'=>'este', 'depto'=>'Montevideo', 'vivienda'=>'Casas con terreno, chacras y cooperativas', 'epoca'=>'Décadas de 1950 a hoy', 'costera'=>false, 'vecinos'=>['jardines-del-hipodromo','flor-de-maronas','banados-de-carrasco','villa-garcia','las-canteras'], 'refs'=>'Camino Maldonado y Bella Italia', 'areas'=>['Punta de Rieles','Bella Italia']],
    'banados-de-carrasco' => ['nombre'=>'Bañados de Carrasco', 'region'=>'este', 'depto'=>'Montevideo', 'vivienda'=>'Casas con terreno y chacras', 'epoca'=>'Décadas de 1970 a hoy', 'costera'=>false, 'vecinos'=>['carrasco-norte','punta-de-rieles','las-canteras','villa-garcia','paso-carrasco'], 'refs'=>'Camino Carrasco, el arroyo Carrasco y los humedales', 'areas'=>['Bañados de Carrasco']],
    'villa-garcia' => ['nombre'=>'Villa García', 'oficial'=>'Villa García–Manga Rural', 'region'=>'este', 'depto'=>'Montevideo', 'vivienda'=>'Casas con terreno, quintas y galpones', 'epoca'=>'Décadas de 1960 a hoy', 'costera'=>false, 'vecinos'=>['punta-de-rieles','manga','banados-de-carrasco','piedras-blancas','barros-blancos'], 'refs'=>'la ruta 8 y Camino Maldonado', 'areas'=>['Villa García','Manga Rural']],

    // ════ NORTE ════
    'larranaga' => ['nombre'=>'Larrañaga', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio, PH y edificios bajos', 'epoca'=>'Décadas de 1920 a 1960', 'costera'=>false, 'vecinos'=>['tres-cruces','la-blanqueada','jacinto-vera','la-comercial','mercado-modelo'], 'refs'=>'Bulevar Artigas y la avenida Luis Alberto de Herrera', 'areas'=>['Larrañaga']],
    'la-figurita' => ['nombre'=>'La Figurita', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas antiguas y PH', 'epoca'=>'Principios del siglo XX', 'costera'=>false, 'vecinos'=>['villa-munoz','jacinto-vera','la-comercial','reducto'], 'refs'=>'la avenida General Flores y la avenida Garibaldi', 'areas'=>['La Figurita']],
    'jacinto-vera' => ['nombre'=>'Jacinto Vera', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas de altos, PH y viviendas de barrio', 'epoca'=>'Décadas de 1910 a 1950', 'costera'=>false, 'vecinos'=>['la-figurita','larranaga','brazo-oriental','cerrito'], 'refs'=>'la avenida Garibaldi y la avenida General Flores', 'areas'=>['Jacinto Vera']],
    'reducto' => ['nombre'=>'Reducto', 'art'=>'el', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas antiguas, PH y cooperativas', 'epoca'=>'Principios del siglo XX', 'costera'=>false, 'vecinos'=>['aguada','atahualpa','prado','villa-munoz','la-figurita'], 'refs'=>'la avenida San Martín y la avenida Millán', 'areas'=>['Reducto']],
    'brazo-oriental' => ['nombre'=>'Brazo Oriental', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas de una planta y PH', 'epoca'=>'Décadas de 1920 a 1960', 'costera'=>false, 'vecinos'=>['atahualpa','jacinto-vera','aires-puros','cerrito'], 'refs'=>'la avenida San Martín y el brazo oriental del arroyo Miguelete', 'areas'=>['Brazo Oriental']],
    'atahualpa' => ['nombre'=>'Atahualpa', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas de estilo, chalets y edificios bajos', 'epoca'=>'Décadas de 1910 a 1950', 'costera'=>false, 'vecinos'=>['prado','reducto','brazo-oriental','paso-de-las-duranas','aires-puros'], 'refs'=>'la avenida Millán y el arroyo Miguelete', 'areas'=>['Atahualpa']],
    'cerrito' => ['nombre'=>'Cerrito', 'art'=>'el', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio y viviendas con ampliaciones', 'epoca'=>'Décadas de 1930 a 1980', 'costera'=>false, 'vecinos'=>['castro','las-acacias','brazo-oriental','jacinto-vera','mercado-modelo'], 'refs'=>'el Cerrito de la Victoria y la avenida General Flores', 'areas'=>['Cerrito de la Victoria']],
    'mercado-modelo' => ['nombre'=>'Mercado Modelo', 'oficial'=>'Mercado Modelo–Bolívar', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas, depósitos y comercios', 'epoca'=>'Décadas de 1930 a 1970', 'costera'=>false, 'vecinos'=>['la-blanqueada','villa-espanola','castro','larranaga','cerrito'], 'refs'=>'el edificio del ex Mercado Modelo y la avenida José Pedro Varela', 'areas'=>['Mercado Modelo','Bolívar']],
    'castro' => ['nombre'=>'Castro', 'oficial'=>'Castro–Pérez Castellanos', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio y conjuntos de vivienda', 'epoca'=>'Décadas de 1940 a 1980', 'costera'=>false, 'vecinos'=>['mercado-modelo','cerrito','villa-espanola','ituzaingo'], 'refs'=>'el tramo entre el Cerrito y Villa Española', 'areas'=>['Castro','Pérez Castellanos']],
    'aires-puros' => ['nombre'=>'Aires Puros', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas de una planta y cooperativas', 'epoca'=>'Décadas de 1940 a 1990', 'costera'=>false, 'vecinos'=>['las-acacias','casavalle','paso-de-las-duranas','brazo-oriental','atahualpa'], 'refs'=>'la zona entre la avenida San Martín y la avenida Millán', 'areas'=>['Aires Puros']],
    'las-acacias' => ['nombre'=>'Las Acacias', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio y viviendas con ampliaciones', 'epoca'=>'Décadas de 1940 a 1980', 'costera'=>false, 'vecinos'=>['casavalle','aires-puros','cerrito','piedras-blancas'], 'refs'=>'la avenida San Martín y la zona de Burgues', 'areas'=>['Las Acacias']],
    'casavalle' => ['nombre'=>'Casavalle', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Complejos de vivienda, cooperativas y casas', 'epoca'=>'Décadas de 1970 a hoy', 'costera'=>false, 'vecinos'=>['las-acacias','aires-puros','piedras-blancas','toledo-chico','penarol'], 'refs'=>'la avenida San Martín, el Borro y la Plaza Casavalle', 'areas'=>['Casavalle','Borro']],
    'piedras-blancas' => ['nombre'=>'Piedras Blancas', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas de una planta y conjuntos habitacionales', 'epoca'=>'Décadas de 1950 a hoy', 'costera'=>false, 'vecinos'=>['casavalle','manga','jardines-del-hipodromo','las-acacias','villa-garcia'], 'refs'=>'la avenida José Belloni y la avenida Don Pedro de Mendoza', 'areas'=>['Piedras Blancas']],
    'manga' => ['nombre'=>'Manga', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas con terreno, quintas y chacras', 'epoca'=>'Décadas de 1960 a hoy', 'costera'=>false, 'vecinos'=>['piedras-blancas','toledo-chico','villa-garcia'], 'refs'=>'la avenida José Belloni y las chacras del norte', 'areas'=>['Manga']],
    'toledo-chico' => ['nombre'=>'Toledo Chico', 'oficial'=>'Manga–Toledo Chico', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas rurales, quintas y galpones', 'epoca'=>'Viviendas de distintas décadas', 'costera'=>false, 'vecinos'=>['manga','casavalle','piedras-blancas','abayuba'], 'refs'=>'las chacras y quintas del límite con Canelones', 'areas'=>['Toledo Chico']],
    'paso-de-las-duranas' => ['nombre'=>'Paso de las Duranas', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio, PH y edificios bajos', 'epoca'=>'Décadas de 1930 a 1970', 'costera'=>false, 'vecinos'=>['atahualpa','aires-puros','penarol','sayago','prado'], 'refs'=>'la avenida Millán y el arroyo Miguelete', 'areas'=>['Paso de las Duranas']],
    'penarol' => ['nombre'=>'Peñarol', 'oficial'=>'Peñarol–Lavalleja', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas obreras del barrio histórico y viviendas de barrio', 'epoca'=>'Fines del siglo XIX a mediados del XX', 'costera'=>false, 'vecinos'=>['sayago','paso-de-las-duranas','colon','conciliacion','casavalle'], 'refs'=>'los viejos talleres del ferrocarril y la estación Peñarol', 'areas'=>['Peñarol','Lavalleja']],
    'colon' => ['nombre'=>'Colón', 'oficial'=>'Colón Centro y Noroeste', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas quinta, chalets y viviendas de barrio', 'epoca'=>'Desde fines del siglo XIX, con barrios nuevos', 'costera'=>false, 'vecinos'=>['lezica','abayuba','penarol','la-paz','conciliacion'], 'refs'=>'la avenida Garzón y la estación Colón', 'areas'=>['Colón']],
    'abayuba' => ['nombre'=>'Abayubá', 'oficial'=>'Colón Sureste–Abayubá', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas con terreno y viviendas de barrio', 'epoca'=>'Décadas de 1950 a hoy', 'costera'=>false, 'vecinos'=>['colon','penarol','toledo-chico','casavalle'], 'refs'=>'Colón Sureste y la zona de Abayubá', 'areas'=>['Abayubá','Colón Sureste']],
    'lezica' => ['nombre'=>'Lezica', 'oficial'=>'Lezica–Melilla', 'region'=>'norte', 'depto'=>'Montevideo', 'vivienda'=>'Casas quinta, chacras y galpones', 'epoca'=>'Viviendas de distintas décadas', 'costera'=>false, 'vecinos'=>['colon','paso-de-la-arena','la-paz'], 'refs'=>'la avenida Lezica, Camino Melilla y el aeródromo de Melilla', 'areas'=>['Lezica','Melilla']],

    // ════ OESTE Y CERRO ════
    'prado' => ['nombre'=>'Prado', 'art'=>'el', 'oficial'=>'Prado–Nueva Savona', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casonas, chalets con jardín y casas de estilo', 'epoca'=>'Fines del siglo XIX a mediados del XX', 'costera'=>false, 'vecinos'=>['capurro','atahualpa','reducto','belvedere','paso-molino'], 'refs'=>'el parque, la avenida Agraciada y el Jardín Botánico', 'areas'=>['Prado','Nueva Savona']],
    'capurro' => ['nombre'=>'Capurro', 'oficial'=>'Capurro–Bella Vista', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas antiguas, conventillos y cooperativas', 'epoca'=>'Fines del siglo XIX a mediados del XX', 'costera'=>true, 'vecinos'=>['prado','la-teja','aguada','paso-molino','reducto'], 'refs'=>'el parque Capurro, la bahía y Bella Vista', 'areas'=>['Capurro','Bella Vista']],
    'paso-molino' => ['nombre'=>'Paso Molino', 'oficial'=>'Parte de Belvedere y Prado', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas de altos, locales y edificios bajos', 'epoca'=>'Principios y mediados del siglo XX', 'costera'=>false, 'vecinos'=>['prado','belvedere','capurro','la-teja'], 'refs'=>'la avenida Agraciada, la calle Uruguayana y el puente sobre el Miguelete', 'areas'=>['Paso Molino']],
    'belvedere' => ['nombre'=>'Belvedere', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio y viviendas obreras', 'epoca'=>'Décadas de 1910 a 1960', 'costera'=>false, 'vecinos'=>['la-teja','nuevo-paris','paso-molino','sayago','tres-ombues'], 'refs'=>'la avenida Carlos María Ramírez y el Parque Belvedere', 'areas'=>['Belvedere']],
    'la-teja' => ['nombre'=>'La Teja', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas obreras, cooperativas y talleres', 'epoca'=>'Décadas de 1910 a 1960', 'costera'=>true, 'vecinos'=>['capurro','belvedere','tres-ombues','cerro','paso-molino'], 'refs'=>'la refinería de ANCAP, la bahía y el arroyo Pantanoso', 'areas'=>['La Teja']],
    'tres-ombues' => ['nombre'=>'Tres Ombúes', 'oficial'=>'Tres Ombúes–Victoria', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio y viviendas autoconstruidas', 'epoca'=>'Décadas de 1940 a hoy', 'costera'=>false, 'vecinos'=>['la-teja','belvedere','nuevo-paris','cerro','la-paloma-tomkinson'], 'refs'=>'Pueblo Victoria y el arroyo Pantanoso', 'areas'=>['Tres Ombúes','Pueblo Victoria']],
    'nuevo-paris' => ['nombre'=>'Nuevo París', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas de una planta y viviendas de barrio', 'epoca'=>'Décadas de 1930 a 1980', 'costera'=>false, 'vecinos'=>['belvedere','conciliacion','sayago','tres-ombues','paso-de-la-arena'], 'refs'=>'la zona entre Belvedere y el arroyo Pantanoso, y Camino Cibils', 'areas'=>['Nuevo París']],
    'sayago' => ['nombre'=>'Sayago', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio, chalets y talleres', 'epoca'=>'Décadas de 1920 a 1970', 'costera'=>false, 'vecinos'=>['penarol','paso-de-las-duranas','conciliacion','belvedere','nuevo-paris'], 'refs'=>'la estación Sayago y la avenida Millán', 'areas'=>['Sayago']],
    'conciliacion' => ['nombre'=>'Conciliación', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio y viviendas con terreno', 'epoca'=>'Décadas de 1950 a hoy', 'costera'=>false, 'vecinos'=>['sayago','penarol','nuevo-paris','colon'], 'refs'=>'la zona entre Sayago y Nuevo París', 'areas'=>['Conciliación']],
    'paso-de-la-arena' => ['nombre'=>'Paso de la Arena', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas con terreno, quintas y chacras', 'epoca'=>'Viviendas de distintas décadas', 'costera'=>false, 'vecinos'=>['la-paloma-tomkinson','casabo','nuevo-paris','lezica'], 'refs'=>'Santiago Vázquez, el Parque Lecocq y la ruta 1', 'areas'=>['Paso de la Arena','Santiago Vázquez']],
    'cerro' => ['nombre'=>'Cerro', 'art'=>'el', 'oficial'=>'Villa del Cerro', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas de ladrillo, viviendas obreras y cooperativas', 'epoca'=>'Desde fines del siglo XIX', 'costera'=>true, 'vecinos'=>['casabo','la-teja','tres-ombues','la-paloma-tomkinson'], 'refs'=>'la Fortaleza del Cerro, la playa del Cerro y la avenida Carlos María Ramírez', 'areas'=>['Villa del Cerro','Cerro']],
    'casabo' => ['nombre'=>'Casabó', 'oficial'=>'Casabó–Pajas Blancas', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio, viviendas autoconstruidas y chacras', 'epoca'=>'Décadas de 1950 a hoy', 'costera'=>true, 'vecinos'=>['cerro','la-paloma-tomkinson','paso-de-la-arena'], 'refs'=>'las playas de Pajas Blancas y la costa oeste', 'areas'=>['Casabó','Pajas Blancas']],
    'la-paloma-tomkinson' => ['nombre'=>'La Paloma', 'oficial'=>'La Paloma–Tomkinson', 'region'=>'oeste', 'depto'=>'Montevideo', 'vivienda'=>'Casas de barrio y conjuntos de vivienda', 'epoca'=>'Décadas de 1950 a hoy', 'costera'=>false, 'vecinos'=>['cerro','casabo','paso-de-la-arena','tres-ombues'], 'refs'=>'Camino Tomkinson', 'areas'=>['La Paloma','Tomkinson']],

    // ════ CANELONES ════
    'ciudad-de-la-costa' => ['nombre'=>'Ciudad de la Costa', 'region'=>'canelones', 'depto'=>'Canelones', 'legacy'=>true, 'vivienda'=>'Casas con jardín, muchas ampliadas desde casa de veraneo', 'epoca'=>'Décadas de 1950 a hoy', 'costera'=>true, 'vecinos'=>['carrasco','paso-carrasco','colonia-nicolich','costa-de-oro'], 'refs'=>'la avenida Giannattasio, Solymar, Lagomar y El Pinar', 'areas'=>['Ciudad de la Costa','Shangrilá','Lagomar','Solymar','El Pinar']],
    'costa-de-oro' => ['nombre'=>'Costa de Oro', 'art'=>'la', 'region'=>'canelones', 'depto'=>'Canelones', 'legacy'=>true, 'vivienda'=>'Casas de veraneo y viviendas permanentes', 'epoca'=>'Décadas de 1940 a hoy', 'costera'=>true, 'vecinos'=>['ciudad-de-la-costa','pando'], 'refs'=>'la Interbalnearia, Atlántida, Parque del Plata y La Floresta', 'areas'=>['Salinas','Atlántida','Parque del Plata','La Floresta']],
    'paso-carrasco' => ['nombre'=>'Paso Carrasco', 'region'=>'canelones', 'depto'=>'Canelones', 'vivienda'=>'Casas de barrio, comercios y galpones', 'epoca'=>'Décadas de 1950 a hoy', 'costera'=>false, 'vecinos'=>['carrasco','banados-de-carrasco','ciudad-de-la-costa','colonia-nicolich'], 'refs'=>'Camino Carrasco, la ruta 101 y el Aeropuerto de Carrasco', 'areas'=>['Paso Carrasco']],
    'colonia-nicolich' => ['nombre'=>'Colonia Nicolich', 'region'=>'canelones', 'depto'=>'Canelones', 'vivienda'=>'Casas con terreno y barrios nuevos', 'epoca'=>'Décadas de 1970 a hoy', 'costera'=>false, 'vecinos'=>['paso-carrasco','ciudad-de-la-costa','barros-blancos'], 'refs'=>'la ruta 101, el aeropuerto y la zona de Villa Aeroparque', 'areas'=>['Colonia Nicolich','Villa Aeroparque']],
    'barros-blancos' => ['nombre'=>'Barros Blancos', 'region'=>'canelones', 'depto'=>'Canelones', 'vivienda'=>'Casas con terreno y barrios en crecimiento', 'epoca'=>'Décadas de 1970 a hoy', 'costera'=>false, 'vecinos'=>['colonia-nicolich','pando','villa-garcia'], 'refs'=>'la ruta 8 y la zona de Villa Hadita', 'areas'=>['Barros Blancos']],
    'pando' => ['nombre'=>'Pando', 'region'=>'canelones', 'depto'=>'Canelones', 'vivienda'=>'Casas del centro histórico, barrios y zona industrial', 'epoca'=>'Desde el siglo XIX, con barrios nuevos', 'costera'=>false, 'vecinos'=>['barros-blancos','colonia-nicolich','costa-de-oro'], 'refs'=>'la ruta 8, la ruta 75 y la plaza de Pando', 'areas'=>['Pando']],
    'las-piedras' => ['nombre'=>'Las Piedras', 'region'=>'canelones', 'depto'=>'Canelones', 'vivienda'=>'Casas de barrio, comercios y talleres', 'epoca'=>'Desde el siglo XIX, con barrios nuevos', 'costera'=>false, 'vecinos'=>['la-paz','progreso','colon'], 'refs'=>'la avenida Artigas, la ruta 5 y el Hipódromo de Las Piedras', 'areas'=>['Las Piedras','18 de Mayo']],
    'la-paz' => ['nombre'=>'La Paz', 'region'=>'canelones', 'depto'=>'Canelones', 'vivienda'=>'Casas de barrio y viviendas con fondo', 'epoca'=>'Principios del siglo XX, con barrios nuevos', 'costera'=>false, 'vecinos'=>['las-piedras','colon','lezica','progreso'], 'refs'=>'la avenida César Mayo Gutiérrez, la ruta 5 y la plaza de La Paz', 'areas'=>['La Paz']],
    'progreso' => ['nombre'=>'Progreso', 'region'=>'canelones', 'depto'=>'Canelones', 'vivienda'=>'Casas con terreno y quintas', 'epoca'=>'Décadas de 1950 a hoy', 'costera'=>false, 'vecinos'=>['las-piedras','la-paz'], 'refs'=>'la ruta 5, la ruta 32 y la zona de viñedos', 'areas'=>['Progreso']],
];

// ── Funciones de zona ─────────────────────────────────────────────────────────
if (!function_exists('zona_en')) {
    // "el Cerro", "la Aguada", "Pocitos"
    function zona_en(array $z): string { return (!empty($z['art']) ? $z['art'] . ' ' : '') . $z['nombre']; }
    // "del Cerro", "de la Aguada", "de Pocitos"
    function zona_de(array $z): string { return ($z['art'] ?? '') === 'el' ? 'del ' . $z['nombre'] : 'de ' . zona_en($z); }
    function zona_contenido(string $slug): array {
        static $cache = [];
        if (!array_key_exists($slug, $cache)) {
            $f = APP_ROOT . '/content/zonas/' . $slug . '.php';
            $cache[$slug] = is_file($f) ? (array)require $f : [];
        }
        return $cache[$slug];
    }
    function zona_url(string $slug): string {
        global $zonas;
        return !empty($zonas[$slug]['legacy']) ? 'electricista-' . $slug : 'zonas/' . $slug;
    }
    function zona_publicada(string $slug): bool {
        global $zonas, $publicar_regiones;
        $z = $zonas[$slug] ?? null;
        if (!$z) return false;
        if (!empty($z['legacy'])) return true;
        return !empty($publicar_regiones[$z['region']]) && !empty(zona_contenido($slug)['intro']);
    }
    function sz_publicada(string $serv, string $slug): bool {
        global $zonas, $publicar_regiones, $servicios_zona;
        $z = $zonas[$slug] ?? null;
        if (!$z || !isset($servicios_zona[$serv]) || empty($publicar_regiones[$z['region']])) return false;
        return !empty(zona_contenido($slug)['servicios'][$serv]['intro']);
    }
    function sz_url(string $serv, string $slug): string { global $servicios_zona; return $servicios_zona[$serv]['base'] . '/' . $slug; }
    function region_url(string $r): string { global $regiones; return 'zonas/' . $regiones[$r]['slug']; }
    function zonas_de_region(string $r): array {
        global $zonas;
        return array_filter($zonas, static fn($z, $k)=>$z['region'] === $r && zona_publicada($k), ARRAY_FILTER_USE_BOTH);
    }
    // Página de una ruta local (zona, servicio × barrio o región). Devuelve null si no existe o no está publicada.
    function local_pagina(string $route): ?array {
        global $zonas, $regiones, $servicios_zona, $publicar_regiones;
        $partes = explode('/', $route);
        if (count($partes) !== 2) return null;
        [$a, $b] = $partes;
        if ($a === 'zonas') {
            foreach ($regiones as $r => $reg) {
                if ($reg['slug'] !== $b) continue;
                $c = region_contenido($r);
                if (empty($publicar_regiones[$r]) || empty($c['intro']) || !zonas_de_region($r)) return null;
                return ['title'=>$c['title'], 'description'=>$c['description'], 'heading'=>'Electricista en ' . $reg['nombre'], 'crumb'=>$reg['nombre'], 'region'=>$r, 'mod'=>$c['mod']];
            }
            if (!isset($zonas[$b]) || !empty($zonas[$b]['legacy']) || !zona_publicada($b)) return null;
            $c = zona_contenido($b);
            return ['title'=>$c['title'], 'description'=>$c['description'], 'heading'=>'Electricista en ' . zona_en($zonas[$b]), 'crumb'=>'Electricista en ' . zona_en($zonas[$b]), 'zona'=>$b, 'mod'=>$c['mod']];
        }
        foreach ($servicios_zona as $serv => $sd) {
            if ($sd['base'] !== $a || !sz_publicada($serv, $b)) continue;
            $c = zona_contenido($b)['servicios'][$serv];
            return ['title'=>$c['title'], 'description'=>$c['description'], 'heading'=>$sd['h1'] . ' en ' . zona_en($zonas[$b]), 'crumb'=>'En ' . zona_en($zonas[$b]), 'sz'=>[$serv, $b], 'mod'=>$c['mod'] ?? zona_contenido($b)['mod']];
        }
        return null;
    }
    // Todas las rutas locales publicadas: ruta => ['mod'=>..., 'grupo'=>'zonas'|'servicios-barrio'].
    function local_urls(): array {
        global $zonas, $regiones, $servicios_zona;
        $out = [];
        foreach ($regiones as $r => $reg) if (local_pagina(region_url($r))) $out[region_url($r)] = ['mod'=>region_contenido($r)['mod'], 'grupo'=>'zonas'];
        foreach ($zonas as $k => $z) {
            if (empty($z['legacy']) && zona_publicada($k)) $out['zonas/' . $k] = ['mod'=>zona_contenido($k)['mod'], 'grupo'=>'zonas'];
            foreach ($servicios_zona as $serv => $sd) if (sz_publicada($serv, $k)) $out[sz_url($serv, $k)] = ['mod'=>zona_contenido($k)['servicios'][$serv]['mod'] ?? zona_contenido($k)['mod'], 'grupo'=>'servicios-barrio'];
        }
        return $out;
    }
    function region_contenido(string $r): array {
        static $cache = [];
        if (!isset($cache[$r])) { $f = APP_ROOT . '/content/regiones/' . $r . '.php'; $cache[$r] = is_file($f) ? (array)require $f : []; }
        return $cache[$r];
    }
}
// El router requiere este archivo dentro de un método: las funciones leen los datos desde $GLOBALS.
foreach (['regiones', 'publicar_regiones', 'servicios_zona', 'zonas'] as $v) $GLOBALS[$v] = $$v;
