<?php
/** Las Canteras (Montevideo). */
return [
    'mod' => '2026-09-29',
    'title' => 'Electricista en Las Canteras – Casas con terreno',
    'description' => 'Electricista en Las Canteras: casas con terreno y conjuntos de vivienda cerca de Camino Carrasco y el Parque Rivera. Consultá por WhatsApp.',
    'intro' => 'Trabajamos en Las Canteras, entre Camino Carrasco y los alrededores del Parque Rivera. El barrio tiene casas con terreno amplio, muchas con parrillero, galpón o piscina de lona en el fondo, y conjuntos de vivienda de distintas épocas. Los terrenos grandes hacen que los recorridos eléctricos sean largos, y ahí aparecen los problemas. Escribinos con tu consulta.',
    'secciones' => [
        ['h2' => '¿Qué problemas traen los recorridos largos en un terreno grande?', 'p' => [
            'Cuando el galpón, el parrillero o la bomba están a treinta o cuarenta metros del tablero, un cable de sección chica pierde tensión en el camino. El síntoma es una luz que se ve débil al fondo o un motor que arranca con esfuerzo. Además, cuanto más largo el tramo, más puntos donde puede entrar agua. La solución es dimensionar el cable según la distancia y la carga, e ir en caño con cajas accesibles.',
        ]],
        ['h2' => '¿Qué pasa con las bombas y las piscinas del fondo?', 'p' => [
            'Las bombas de pozo o de piscina trabajan cerca del agua, a veces enterradas o en un pozo con humedad. Necesitan su propio circuito, un diferencial y una conexión estanca. Una bomba conectada con un alargue desde la casa es una de las situaciones de más riesgo que encontramos en barrios con terrenos grandes.',
        ]],
        ['h2' => '¿Qué conviene cerca del Parque Rivera y los terrenos bajos?', 'p' => [
            'Hacia el parque y los terrenos más bajos la humedad del suelo es mayor. Eso afecta a cables enterrados, cajas de jardín y a la puesta a tierra, que conviene medir: un terreno húmedo ayuda a la tierra, pero oxida las conexiones. Mirá [puesta a tierra](puesta-a-tierra-montevideo).',
        ]],
    ],
    'faq' => [
        ['q' => 'La luz del galpón del fondo se ve débil, ¿por qué?', 'a' => 'Suele ser caída de tensión por un cable fino para la distancia. Se mide y se dimensiona uno nuevo.'],
        ['q' => '¿Instalan bombas de piscina y de pozo?', 'a' => 'La parte eléctrica: circuito propio, protección y conexión estanca.'],
        ['q' => '¿Trabajan en conjuntos de vivienda?', 'a' => 'Sí, en unidades y espacios comunes.'],
        ['q' => '¿Van a Malvín Norte y Carrasco Norte?', 'a' => 'Sí, y también a Punta de Rieles y Flor de Maroñas.'],
    ],
    'servicios' => [
        'reparaciones' => [
            'title' => 'Reparaciones eléctricas en Las Canteras – Terrenos',
            'description' => 'Reparaciones eléctricas en Las Canteras: bombas que cortan, galpones con caída de tensión y cables enterrados con humedad. Presupuesto sin costo.',
            'intro' => 'Reparamos fallas eléctricas en casas y conjuntos de Las Canteras. En terrenos grandes, lo más frecuente son bombas que hacen saltar el diferencial, galpones con luz débil y cables enterrados que se dañaron con la humedad o con una pala. Ubicamos el tramo con problemas sin cavar a ciegas y te pasamos el presupuesto.',
            'secciones' => [
                ['h2' => '¿Cómo se ubica un cable enterrado dañado?', 'p' => [
                    'Primero se mide la aislación para confirmar que la falla está en ese tramo. Después se sigue el recorrido con un detector de cables y se abre solo donde hace falta. Si el cable estaba sin caño, lo más duradero es reemplazar el tramo completo por uno en caño, con cinta de señalización por encima para que nadie lo corte al cavar.',
                ]],
                ['h2' => '¿Por qué salta el diferencial cuando arranca la bomba?', 'p' => [
                    'Porque la bomba o su cable tienen una fuga, casi siempre por humedad en la conexión o por el desgaste del bobinado. Se mide la bomba desconectada para saber si el problema es la bomba o la instalación. Si la bomba no tiene circuito propio, mirá [tableros en Las Canteras](tableros-electricos/las-canteras).',
                ]],
                ['h2' => '¿Qué falla en los conjuntos de vivienda del barrio?', 'p' => [
                    'En los conjuntos de Las Canteras, las unidades tienen tableros chicos y los espacios comunes dependen de un tablero de servicios con años. La iluminación de los caminos interiores y las bombas son lo más delicado. Se reparan y se deja un informe para quien administra.',
                ]],
            ],
            'faq' => [
                ['q' => '¿Reparan instalaciones de parrilleros y galpones?', 'a' => 'Sí, con su circuito y protección.'],
                ['q' => 'Corté un cable al cavar, ¿qué hago?', 'a' => 'No lo toques, alejate del lugar y consultanos.'],
            ],
        ],
        'tableros' => [
            'title' => 'Tableros eléctricos en Las Canteras – Casa y fondo',
            'description' => 'Tableros en Las Canteras: casas con terreno, bombas, galpones y parrilleros sin protección propia. Diferencial por sector. Presupuesto sin costo.',
            'intro' => 'Instalamos tableros en casas de Las Canteras con terreno amplio. Proponemos un tablero principal en la casa y, si el fondo tiene galpón, parrillero o bomba lejos, un tablero secundario ahí, cada uno con su diferencial. Así una falla en el fondo no deja sin luz la casa y los recorridos largos quedan bien protegidos.',
            'secciones' => [
                ['h2' => '¿Cuándo conviene un tablero en el fondo?', 'p' => [
                    'Cuando hay varios circuitos lejos de la casa: luces del parrillero, tomacorrientes del galpón, la bomba y alguna herramienta. Un tablero secundario en el fondo, alimentado con un cable de sección adecuada, reparte esos circuitos con su propia protección. Es más prolijo y más seguro que tirar varios cables largos desde la casa.',
                ]],
                ['h2' => '¿Qué protección necesita una bomba?', 'p' => [
                    'Una térmica o guardamotor según el tipo de bomba, un diferencial y, si está en un pozo o cerca de una piscina, una conexión estanca y la carcasa conectada a tierra. Más en [tableros eléctricos](tableros-electricos-montevideo).',
                ]],
                ['h2' => '¿Qué pasa con las casas cerca de Camino Carrasco?', 'p' => [
                    'Sobre Camino Carrasco y sus paralelas hay casas con comercio o taller al frente. El tablero único de la casa alimenta también el negocio, y un arranque de compresor se siente en toda la vivienda. Separar los dos sectores con su diferencial ordena el consumo y evita cortes cruzados.',
                ]],
            ],
            'faq' => [
                ['q' => '¿El tablero del fondo necesita otro medidor?', 'a' => 'No. Se alimenta desde el tablero de la casa.'],
                ['q' => '¿Pueden dejar la bomba con arranque automático?', 'a' => 'Sí, con su protección y el automático adecuado.'],
                ['q' => '¿Incluye la tierra?', 'a' => 'Sí, la medimos y la completamos si hace falta.'],
            ],
        ],
    ],
];
