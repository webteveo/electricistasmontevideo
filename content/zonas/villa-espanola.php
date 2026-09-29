<?php
/** Villa Española (Montevideo). */
return [
    'mod' => '2026-09-29',
    'title' => 'Electricista en Villa Española – Casas obreras y talleres',
    'description' => 'Electricista en Villa Española: casas obreras, cooperativas y talleres cerca de José Pedro Varela y el Antel Arena. Consultá por WhatsApp.',
    'intro' => 'Atendemos Villa Española, sobre la avenida José Pedro Varela, cerca del Antel Arena y de la vieja fábrica de Funsa. El barrio nació alrededor de las fábricas: casas obreras de una planta de los años 20 a 60, talleres familiares en el fondo y, más recientemente, cooperativas de vivienda. Cada una tiene su instalación típica. Escribinos.',
    'secciones' => [
        ['h2' => '¿Cómo son las instalaciones de las casas obreras?', 'p' => [
            'Casas de fachada continua, con dos o tres ambientes en fila y un patio al fondo. La instalación original era mínima: una lámpara por ambiente y uno o dos tomacorrientes. Todo lo demás se agregó después, muchas veces con cables a la vista y empalmes en las mismas cajas de las luces. Es habitual que la cocina y el baño compartan circuito con los dormitorios.',
        ]],
        ['h2' => '¿Qué pasa con los talleres del fondo?', 'p' => [
            'En Villa Española hay muchos talleres de herrería, carpintería o mecánica en el fondo de la casa, con máquinas que arrancan con mucha corriente. Si el taller cuelga de la instalación de la vivienda, cada arranque hace bajar las luces o saltar la llave. Un circuito propio para el taller, con su protección y la sección de cable adecuada, resuelve el problema. Si las máquinas son trifásicas, se revisa el suministro.',
        ]],
        ['h2' => '¿Qué conviene revisar en las cooperativas del barrio?', 'p' => [
            'Las cooperativas tienen instalaciones más nuevas, pero conviene revisar los espacios comunes, la iluminación exterior y los circuitos que cada socio fue agregando. También conviene medir la tierra cada algunos años. Lo explicamos en [revisión y mantenimiento](mantenimiento-electrico-montevideo).',
        ]],
    ],
    'faq' => [
        ['q' => 'Tengo un taller en el fondo y se bajan las luces, ¿qué hago?', 'a' => 'Darle al taller un circuito propio con su protección. Si las máquinas son grandes, se revisa también la potencia.'],
        ['q' => '¿Trabajan con cooperativas?', 'a' => 'Sí, en las unidades y en los espacios comunes.'],
        ['q' => '¿Pueden renovar la instalación de una casa obrera?', 'a' => 'Sí, por circuitos o completa, con tablero nuevo y tierra.'],
        ['q' => '¿Van a la Unión, Maroñas y el Cerrito?', 'a' => 'Sí. Escribinos con la dirección aproximada.'],
    ],
    'servicios' => [
        'reparaciones' => [
            'title' => 'Reparaciones eléctricas en Villa Española – Talleres',
            'description' => 'Reparaciones eléctricas en Villa Española: talleres que hacen saltar la llave, casas obreras con circuitos compartidos. Presupuesto sin costo.',
            'intro' => 'Reparamos fallas eléctricas en casas, talleres y cooperativas de Villa Española. Las consultas típicas son la llave que salta cuando arranca una máquina del taller, las luces que bajan en toda la casa y los tomacorrientes que calientan en casas obreras con todo en un circuito. Medimos, encontramos la causa y te pasamos presupuesto.',
            'secciones' => [
                ['h2' => '¿Por qué salta la llave cuando arranca una máquina?', 'p' => [
                    'Porque los motores piden mucha corriente al arrancar, y si la máquina comparte circuito con la casa, la térmica corta o la tensión cae. También puede ser un cable fino hasta el taller. Se mide la corriente de arranque y se decide si alcanza con un circuito propio o si hace falta revisar la potencia contratada.',
                ]],
                ['h2' => '¿Qué falla en las casas obreras?', 'p' => [
                    'Empalmes en las cajas de las luces que se recalentaron, tomacorrientes gastados y cables agregados sin protección. Se rehacen las conexiones y se separan los circuitos más cargados. Si el tablero no tiene lugar, mirá [tableros en Villa Española](tableros-electricos/villa-espanola).',
                ]],
            ],
            'faq' => [
                ['q' => '¿Reparan instalaciones de talleres?', 'a' => 'Sí, en talleres familiares y comercios.'],
                ['q' => '¿Trabajan con trifásica?', 'a' => 'Sí, en talleres con máquinas trifásicas.'],
                ['q' => '¿Cómo pido la visita?', 'a' => 'Por WhatsApp, con la dirección y qué falla.'],
            ],
        ],
        'tableros' => [
            'title' => 'Tableros eléctricos en Villa Española – Casa y taller',
            'description' => 'Tableros en Villa Española: casas obreras sin diferencial, talleres en el fondo y cooperativas. Circuitos separados. Presupuesto sin costo.',
            'intro' => 'Instalamos tableros en casas, talleres y cooperativas de Villa Española. Cuando hay un taller en el fondo, proponemos un tablero con dos sectores o un tablero secundario para el taller, cada uno con su diferencial; en casas obreras, un tablero con circuitos separados para cocina, baño y dormitorios.',
            'secciones' => [
                ['h2' => '¿Qué protección necesita un taller?', 'p' => [
                    'Una térmica del calibre que corresponda a las máquinas, un diferencial propio y la sección de cable adecuada desde el tablero. Si hay máquinas trifásicas, un tablero con las tres fases repartidas. Así el taller no afecta a la vivienda y una falla en una máquina no deja la casa a oscuras.',
                ]],
                ['h2' => '¿Qué pasa si el taller trabaja con máquinas trifásicas?', 'p' => [
                    'Algunos talleres del barrio heredaron un suministro trifásico de cuando eran pequeñas fábricas. En ese caso el tablero se arma repartiendo las cargas entre las tres fases: las máquinas trifásicas con su protección propia y los circuitos monofásicos de la casa distribuidos para que ninguna fase quede más cargada que las otras. Una fase sobrecargada es la causa típica de que se apague media casa cuando arranca el torno o la soldadora.',
                ]],
                ['h2' => '¿Qué lleva el tablero de una casa obrera?', 'p' => [
                    'Una llave general, un diferencial de 30 mA y térmicas para iluminación, tomacorrientes, cocina, baño y termotanque. Si la casa no tiene tierra, se suma en el mismo trabajo. Más en [tableros eléctricos](tableros-electricos-montevideo).',
                ]],
            ],
            'faq' => [
                ['q' => '¿El taller necesita otro medidor?', 'a' => 'No siempre. Se puede alimentar desde el mismo suministro con un sector propio.'],
                ['q' => '¿Instalan tableros trifásicos?', 'a' => 'Sí, para talleres con máquinas trifásicas.'],
                ['q' => '¿Incluye la tierra?', 'a' => 'Si falta, la presupuestamos en el mismo trabajo.'],
            ],
        ],
        'recableado' => [
            'title' => 'Recableado en Villa Española – Casas obreras de una planta',
            'description' => 'Recableado de casas obreras en Villa Española: cables a la vista, cajas compartidas y sin tierra. Por etapas y sin romper de más. Por WhatsApp.',
            'intro' => 'Recableamos casas obreras de Villa Española. Son casas de fachada continua, con los ambientes en fila, donde la instalación original era mínima y todo lo demás se agregó con cables a la vista. Renovamos por circuitos, con canalización prolija y tierra, empezando por cocina y baño, y respetando el presupuesto de cada familia.',
            'secciones' => [
                ['h2' => '¿Cómo se recablea una casa de ambientes en fila?', 'p' => [
                    'El tablero se ubica cerca de la entrada y desde ahí salen los circuitos hacia el fondo, uno por uso. En casas con techo de bovedilla o de losa, los recorridos van por las paredes y los zócalos, en caño embutido o con canalización de aplicar. Se eliminan los empalmes en cajas de luces y cada circuito queda con sus propias cajas.',
                ]],
                ['h2' => '¿Se puede hacer por partes?', 'p' => [
                    'Sí, y es lo más común en el barrio. Primero cocina, baño y termotanque; después los dormitorios; al final el patio y el fondo. Si hay taller, su circuito va aparte desde el principio. Mirá [recableado eléctrico](recableado-electrico-montevideo).',
                ]],
            ],
            'faq' => [
                ['q' => '¿Hay que romper las paredes?', 'a' => 'No siempre. Donde no conviene embutir, se usa canalización exterior prolija.'],
                ['q' => '¿Cuánto cuesta?', 'a' => 'Depende del tamaño y del estado. Te pasamos el presupuesto sin costo después de ver la casa.'],
                ['q' => '¿Dejan todo identificado?', 'a' => 'Sí, cada circuito con su llave rotulada.'],
            ],
        ],
    ],
];
