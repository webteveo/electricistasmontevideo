<?php
/** Costa de Oro (Canelones). Zona histórica: su página es /electricista-costa-de-oro (texto en src/datos/barrios.php). Acá solo servicio × barrio. */
return [
    'mod' => '2026-09-29',
    'servicios' => [
        'reparaciones' => [
            'title' => 'Reparaciones eléctricas en la Costa de Oro – Balnearios',
            'description' => 'Reparaciones eléctricas en la Costa de Oro: casas de veraneo cerradas, humedad, roedores y comercios de temporada. Presupuesto sin costo.',
            'intro' => 'Reparamos fallas eléctricas en casas y comercios de la Costa de Oro, de Neptunia y Salinas a Atlántida, Parque del Plata y La Floresta. Las consultas típicas llegan al abrir la casa de veraneo: el diferencial que no deja subir la llave, un tomacorriente que no anda o cables comidos por roedores. También comercios que no aguantan la temporada.',
            'secciones' => [
                ['h2' => '¿Qué pasa con una casa que estuvo cerrada meses?', 'p' => [
                    'La humedad se acumula en cajas y tomacorrientes, los contactos se oxidan y a veces los roedores dañan cables en entretechos y placares. Al dar la energía, el diferencial corta o un circuito no funciona. Se revisa cada circuito con medición de aislación antes de usar la casa, y se reparan los tramos dañados.',
                ]],
                ['h2' => '¿Por qué fallan los comercios en plena temporada?', 'p' => [
                    'Porque en verano funcionan heladeras, freezers, aire e iluminación a la vez, muchas horas, en instalaciones que el resto del año trabajan poco. Las conexiones flojas calientan y las protecciones cortan. Se reparan las fallas y se recomienda preparar la instalación antes de diciembre.',
                ]],
                ['h2' => '¿Qué hacer si hay rastros de roedores?', 'p' => [
                    'No dar la energía a ese sector hasta revisar. Un cable roído puede quedar con el cobre expuesto. Se revisan los tramos accesibles y se mide la aislación de los demás. Si el tablero es viejo, mirá [tableros en la Costa de Oro](tableros-electricos/costa-de-oro).',
                ]],
            ],
            'faq' => [
                ['q' => '¿Atienden Atlántida, Parque del Plata y La Floresta?', 'a' => 'Sí, y los balnearios hacia Jaureguiberry.'],
                ['q' => 'Al abrir la casa no sube la llave, ¿qué hago?', 'a' => 'No la fuerces. Consultanos para revisar los circuitos.'],
            ],
        ],
        'tableros' => [
            'title' => 'Tableros eléctricos en la Costa de Oro – Casas de veraneo',
            'description' => 'Tableros en la Costa de Oro: casas de veraneo con humedad, circuitos que quedan activos con la casa cerrada y comercios. Presupuesto sin costo.',
            'intro' => 'Instalamos tableros en casas y comercios de la Costa de Oro pensados para el uso de temporada. Proponemos un tablero con los circuitos que tienen que quedar activos con la casa cerrada (heladera, alarma, bomba) separados del resto, disyuntor diferencial, exteriores aparte y gabinetes que aguanten la humedad del mar.',
            'secciones' => [
                ['h2' => '¿Qué circuitos conviene dejar activos cuando la casa se cierra?', 'p' => [
                    'Solo los imprescindibles: la alarma, una heladera si queda algo, la bomba si hay riego automático o tanque. Con esos circuitos separados en el tablero, se puede bajar el resto sin cortar lo que tiene que seguir funcionando. Es más seguro que dejar toda la casa con energía meses sin nadie.',
                ]],
                ['h2' => '¿Qué necesita un comercio de temporada?', 'p' => [
                    'Circuitos propios para cada equipo de frío, aire e iluminación, con diferencial por grupo, y una revisión antes de la temporada. Si el consumo del verano supera la potencia contratada, se evalúa el aumento.',
                ]],
                ['h2' => '¿Qué gabinete conviene?', 'p' => [
                    'Uno que cierre bien, adentro, lejos de la humedad. Más en [tableros eléctricos](tableros-electricos-montevideo).',
                ]],
                ['h2' => '¿Qué pasa con las casas que se alquilan por temporada?', 'p' => [
                    'En Atlántida, Parque del Plata y La Floresta muchas casas se alquilan en verano. Quien llega no conoce la instalación. Un tablero con cada llave rotulada y los circuitos de exteriores separados evita llamadas por una llave que saltó y permite que el inquilino corte solo lo necesario.',
                ]],
            ],
            'faq' => [
                ['q' => '¿Pueden separar la alarma y la heladera?', 'a' => 'Sí, en circuitos que quedan activos con la casa cerrada.'],
                ['q' => '¿Trabajan en comercios de temporada?', 'a' => 'Sí.'],
                ['q' => '¿Atienden todos los balnearios?', 'a' => 'Sí, confirmá tu zona al escribir.'],
            ],
        ],
    ],
];
