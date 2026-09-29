<?php
/** Villa García – Manga Rural (Montevideo). */
return [
    'mod' => '2026-09-29',
    'title' => 'Electricista en Villa García – Quintas y galpones',
    'description' => 'Electricista en Villa García y Manga Rural: casas con terreno, quintas y galpones sobre la ruta 8 y Camino Maldonado. Consultá por WhatsApp.',
    'intro' => 'Atendemos Villa García y la zona rural de Manga, sobre la ruta 8 y Camino Maldonado, en el límite con Canelones. Es una zona de casas con terreno, quintas, galpones y pequeños emprendimientos, con distancias largas entre el pilar de UTE, la casa y los galpones. Las instalaciones se ampliaron con el tiempo y no siempre con criterio. Escribinos.',
    'secciones' => [
        ['h2' => '¿Qué es típico en las quintas y galpones de la zona?', 'p' => [
            'Un pilar con el medidor sobre el camino, un tramo largo hasta la casa y otros hasta los galpones, a veces aéreos y a veces enterrados. En los galpones, máquinas, bombas de riego o cámaras de frío. Con esas distancias y cargas, la sección de los cables y las protecciones tienen que estar bien calculadas, y muchas veces no lo están.',
        ]],
        ['h2' => '¿Qué pasa con los tramos aéreos y los árboles?', 'p' => [
            'Los tramos aéreos que pasan cerca de árboles se rozan con las ramas y se dañan con el viento. Conviene que tengan la altura y los soportes adecuados y que el recorrido esté despejado. Si un árbol cayó sobre el tramo, no hay que tocarlo: se corta la protección en el tablero y se consulta. Si el cable es de la red de UTE, el reclamo es al 0800 1930.',
        ]],
        ['h2' => '¿Qué conviene si hay riego o bombas grandes?', 'p' => [
            'Bombas de riego y equipos que trabajan muchas horas necesitan protecciones pensadas para motores y, a veces, suministro trifásico. Si la potencia contratada no alcanza para la casa y el trabajo de la quinta, se evalúa el trámite ante UTE. Mirá [aumento de potencia](aumento-de-potencia-ute-montevideo).',
        ]],
    ],
    'faq' => [
        ['q' => 'Una rama rozó el cable aéreo y ahora no tengo luz, ¿qué hago?', 'a' => 'No lo toques. Si es de UTE, reclamá al 0800 1930; si es tuyo, cortá la protección y consultanos.'],
        ['q' => '¿Trabajan en quintas con riego?', 'a' => 'Sí: bombas, tableros de galpón y tramos largos.'],
        ['q' => '¿Instalan trifásica?', 'a' => 'Preparamos la instalación; el cambio de suministro es un trámite con UTE.'],
        ['q' => '¿Van a Punta de Rieles, Manga y Barros Blancos?', 'a' => 'Sí. Escribinos con la ubicación.'],
    ],
    'servicios' => [
        'reparaciones' => [
            'title' => 'Reparaciones eléctricas en Villa García – Quintas',
            'description' => 'Reparaciones eléctricas en Villa García: tramos aéreos dañados, bombas de riego y galpones que se quedan sin energía. Presupuesto sin costo.',
            'intro' => 'Reparamos fallas eléctricas en casas, quintas y galpones de Villa García y Manga Rural. Las consultas más comunes son un galpón que se quedó sin energía, una bomba de riego que corta la protección y un tramo aéreo dañado por el viento o por un árbol. Revisamos desde el pilar hasta cada galpón y te pasamos el presupuesto.',
            'secciones' => [
                ['h2' => '¿Por qué se corta la protección de la bomba de riego?', 'p' => [
                    'Porque el motor pide más corriente de la que la protección admite, por desgaste de la bomba, por un capacitor en mal estado o porque la protección no es la adecuada para un motor. También puede ser caída de tensión por un cable largo y fino. Se mide la corriente de la bomba y la tensión en el galpón para saber cuál es la causa.',
                ]],
                ['h2' => '¿Qué hacer con un galpón sin energía?', 'p' => [
                    'Revisar primero su protección en el tablero y después el tramo desde la casa, que es lo más expuesto. Si el tramo se dañó, se reemplaza por uno enterrado en caño o aéreo con soportes. Si el galpón no tiene tablero propio, mirá [tableros en Villa García](tableros-electricos/villa-garcia).',
                ]],
                ['h2' => '¿Qué pasa en los barrios nuevos sobre la ruta 8?', 'p' => [
                    'Además de quintas, en Villa García crecieron barrios de casas nuevas con instalaciones recientes. Ahí las fallas vienen de agregados: un parrillero, un galpón o una piscina conectados al circuito más cercano. Se les da su línea propia desde el tablero, con su protección.',
                ]],
            ],
            'faq' => [
                ['q' => '¿Reparan bombas de riego?', 'a' => 'La parte eléctrica: protección, arranque y conexiones.'],
                ['q' => '¿Atienden galpones y talleres?', 'a' => 'Sí, con sus tableros y circuitos.'],
            ],
        ],
        'tableros' => [
            'title' => 'Tableros eléctricos en Villa García – Galpones',
            'description' => 'Tableros en Villa García y Manga Rural: tableros de galpón, protección de bombas y motores, y casas con terreno. Presupuesto sin costo.',
            'intro' => 'Instalamos tableros en casas, quintas y galpones de Villa García y Manga Rural. Para terrenos con galpones, proponemos un tablero en la casa y otro en cada galpón, con protecciones para motores y bombas, diferencial por sector y gabinetes aptos para el lugar. Todo identificado para que cualquiera sepa qué corta.',
            'secciones' => [
                ['h2' => '¿Qué lleva un tablero de galpón?', 'p' => [
                    'Una protección general, un diferencial, térmicas para iluminación y tomacorrientes y protecciones específicas para cada motor o bomba. Si hay trifásica, las cargas se reparten entre fases. El gabinete tiene que soportar polvo y humedad, y quedar en un lugar accesible.',
                ]],
                ['h2' => '¿Qué conviene si en la quinta hay una cámara de frío?', 'p' => [
                    'Una cámara o una heladera comercial en el galpón no puede quedarse sin energía por una falla en otro lado. Por eso va en un circuito propio, con un diferencial que no comparta con las luces ni con las herramientas, y con la protección dimensionada para su compresor. Si la zona tiene cortes de la red frecuentes, se puede prever la conexión de un generador con una llave de transferencia, para no mezclar nunca el generador con la red de UTE.',
                ]],
                ['h2' => '¿Cómo se alimenta un galpón lejos de la casa?', 'p' => [
                    'Con un cable de sección calculada para la distancia y la carga, en caño enterrado o en tendido aéreo con soportes, protegido desde el tablero de la casa. Así la caída de tensión queda dentro de lo que admite el reglamento. Más en [tableros eléctricos](tableros-electricos-montevideo).',
                ]],
            ],
            'faq' => [
                ['q' => '¿Cada galpón necesita su tablero?', 'a' => 'Si tiene varios circuitos o motores, conviene.'],
                ['q' => '¿Instalan tableros trifásicos?', 'a' => 'Sí, para galpones con motores trifásicos.'],
                ['q' => '¿Trabajan en casas de la zona?', 'a' => 'Sí, en casas y quintas.'],
            ],
        ],
    ],
];
