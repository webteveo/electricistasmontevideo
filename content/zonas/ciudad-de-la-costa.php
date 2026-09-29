<?php
/** Ciudad de la Costa (Canelones). Zona histórica: su página es /electricista-ciudad-de-la-costa (texto en src/datos/barrios.php). Acá solo servicio × barrio. */
return [
    'mod' => '2026-09-29',
    'servicios' => [
        'reparaciones' => [
            'title' => 'Reparaciones eléctricas en Ciudad de la Costa',
            'description' => 'Reparaciones eléctricas en Ciudad de la Costa: Solymar, Lagomar, Shangrilá y El Pinar. Diferencial que salta con humedad y casas ampliadas.',
            'intro' => 'Reparamos fallas eléctricas en casas y comercios de Ciudad de la Costa, de Shangrilá y San José de Carrasco a Lagomar, Solymar y El Pinar. Las consultas más comunes son el diferencial que salta los días húmedos, la llave que corta en invierno en casas que eran de veraneo y exteriores oxidados por el aire del mar. Te pasamos el presupuesto antes de reparar.',
            'secciones' => [
                ['h2' => '¿Por qué salta el diferencial en días húmedos sin llover?', 'p' => [
                    'Porque en la Costa la humedad ambiente es alta y se condensa en cajas exteriores, tomacorrientes de patio, luminarias de jardín y hasta en el pilar del medidor. Con la arena que trae el viento, forma una película que conduce. Se revisan los exteriores uno por uno con medición de aislación y se reemplazan por componentes estancos.',
                ]],
                ['h2' => '¿Qué falla en las casas que eran de veraneo?', 'p' => [
                    'Muchas casas de la Costa se construyeron para el verano y hoy se viven todo el año, con calefacción, termotanque grande y aire. La instalación original no da abasto: térmicas que saltan, cables que calientan, empalmes flojos. Se reparan las fallas y se separan los circuitos de más consumo.',
                ]],
                ['h2' => '¿Qué pasa en las calles de arena?', 'p' => [
                    'En los barrios con calles de arena, el tramo del pilar a la casa suele ir enterrado en suelo arenoso y húmedo. Si no va en caño, se deteriora. Se reemplaza por uno en caño con la sección adecuada. Si el tablero no da más, mirá [tableros en Ciudad de la Costa](tableros-electricos/ciudad-de-la-costa).',
                ]],
            ],
            'faq' => [
                ['q' => '¿Atienden Solymar, Lagomar y El Pinar?', 'a' => 'Sí, y también Shangrilá y San José de Carrasco.'],
                ['q' => 'El diferencial salta con niebla, ¿qué hago?', 'a' => 'No lo subas una y otra vez. Se revisan los exteriores por tramos.'],
            ],
        ],
        'tableros' => [
            'title' => 'Tableros eléctricos en Ciudad de la Costa – Ampliación',
            'description' => 'Tableros en Ciudad de la Costa: casas de veraneo convertidas en permanentes, tableros al límite y exteriores con humedad. Presupuesto sin costo.',
            'intro' => 'Cambiamos y ampliamos tableros en casas de Ciudad de la Costa. En casas que empezaron como vivienda de fin de semana, el tablero quedó chico para el consumo de una casa habitada todo el año. Instalamos uno con circuitos para calefacción, aire, termotanque y cocina, los exteriores en su propio diferencial y lugar para crecer.',
            'secciones' => [
                ['h2' => '¿Qué circuitos necesita una casa que pasó a ser permanente?', 'p' => [
                    'Además de iluminación y tomacorrientes, circuitos propios para cada estufa o aire, termotanque, cocina eléctrica y lavarropas, y uno para exteriores, portón y bomba. Con eso se terminan los cortes de invierno y verano.',
                ]],
                ['h2' => '¿Dónde va el tablero en una casa cerca del mar?', 'p' => [
                    'Adentro, lejos de puertas al exterior y en un gabinete que cierre bien. Un tablero en un garaje abierto o un alero recibe humedad salina y sus protecciones se deterioran. Junto al medidor, solo la protección general en gabinete estanco.',
                ]],
                ['h2' => '¿Hace falta más potencia?', 'p' => [
                    'Muchas veces sí, en casas que sumaron calefacción y aire. Se mide el consumo antes. Mirá [aumento de potencia](aumento-de-potencia-ute-montevideo) y [tableros eléctricos](tableros-electricos-montevideo).',
                ]],
                ['h2' => '¿Qué conviene en las casas de Lagomar y Solymar con garaje?', 'p' => [
                    'Muchas casas de Lagomar y Solymar tienen garaje con herramientas, portón automático y, cada vez más, un auto eléctrico. Un tablero secundario en el garaje, alimentado desde el principal, ordena esas cargas y permite sumar el cargador sin tocar el resto de la casa.',
                ]],
            ],
            'faq' => [
                ['q' => '¿Separan los exteriores?', 'a' => 'Sí, con su diferencial.'],
                ['q' => '¿Revisan la potencia contratada?', 'a' => 'Sí, midiendo el consumo real.'],
                ['q' => '¿Trabajan en toda la Costa?', 'a' => 'Sí, de Shangrilá a El Pinar.'],
            ],
        ],
        'cargadores' => [
            'title' => 'Cargador para auto eléctrico en Ciudad de la Costa',
            'description' => 'Cargador para auto eléctrico en Ciudad de la Costa: casas con garaje o entrada, circuito exclusivo y protección contra la humedad. Sin costo.',
            'intro' => 'Instalamos cargadores para autos eléctricos e híbridos enchufables en casas de Ciudad de la Costa. La mayoría tiene garaje o entrada para el auto, lo que simplifica el trabajo, pero la humedad y el aire del mar obligan a elegir bien la ubicación y la caja. Revisamos el tablero y la potencia, y llevamos un circuito exclusivo con las protecciones del reglamento.',
            'secciones' => [
                ['h2' => '¿Dónde conviene ubicar el cargador cerca del mar?', 'p' => [
                    'En un garaje cerrado, si lo hay. Si el auto queda afuera, en la pared más protegida del viento, con un cargador y una caja aptos para intemperie y la entrada de cables por abajo. Conviene revisar las conexiones una vez por año, como el resto de los exteriores de la casa.',
                ]],
                ['h2' => '¿Qué pasa si la casa ya está al límite de potencia?', 'p' => [
                    'Muchas casas de la Costa sumaron calefacción y aire sin aumentar la potencia. Antes de agregar el cargador se mide el consumo. Programar la carga para la madrugada, cuando la casa consume poco y la tarifa triple de UTE es más barata, suele alcanzar. Si no, se evalúa el aumento.',
                ]],
                ['h2' => '¿Qué exige el reglamento?', 'p' => [
                    'Circuito exclusivo, interruptor automático propio y diferencial de 30 mA del tipo que corresponda al modo de carga, según el Capítulo XXX del Reglamento de Baja Tensión de UTE. Mirá [cargadores para vehículos eléctricos](cargador-vehiculo-electrico-montevideo).',
                ]],
            ],
            'faq' => [
                ['q' => '¿Instalan el cargador afuera?', 'a' => 'Sí, con equipo y caja para exterior.'],
                ['q' => '¿Atienden toda Ciudad de la Costa?', 'a' => 'Sí.'],
                ['q' => '¿Hay que pedir más potencia?', 'a' => 'No siempre. Se mide el consumo antes.'],
            ],
        ],
    ],
];
