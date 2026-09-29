<?php
/** Carrasco (Montevideo). Zona histórica: su página es /electricista-carrasco (texto en src/datos/barrios.php). Acá solo servicio × barrio. */
return [
    'mod' => '2026-09-29',
    'servicios' => [
        'reparaciones' => [
            'title' => 'Reparaciones eléctricas en Carrasco – Casas grandes',
            'description' => 'Reparaciones eléctricas en Carrasco: diferencial que salta con lluvia, circuitos de jardín, piscinas, portones y ampliaciones. Presupuesto sin costo.',
            'intro' => 'Reparamos fallas eléctricas en casas y apartamentos de Carrasco, de la rambla a la avenida Arocena y los alrededores del Hotel Carrasco. Las casas del barrio son grandes, con varias ampliaciones y muchos circuitos exteriores, así que una falla puede estar lejos de donde se nota. Revisamos por sectores, encontramos la causa y te pasamos el presupuesto.',
            'secciones' => [
                ['h2' => '¿Cómo se encuentra una falla en una casa con muchos circuitos?', 'p' => [
                    'Primero se ordena: se identifica qué llave alimenta qué sector, si no está rotulado. Después se mide la aislación de cada circuito para ubicar el que tiene la fuga o el cortocircuito, y recién ahí se recorre ese circuito caja por caja. Es más rápido que abrir tomacorrientes al azar y evita romper terminaciones.',
                ]],
                ['h2' => '¿Qué falla en piscinas, riego y portones?', 'p' => [
                    'Bombas que hacen saltar el diferencial, relojes de riego que dejan de funcionar, portones que se detienen y luces de parque con agua adentro. Casi siempre es humedad en una caja o un equipo con la aislación dañada. Si los exteriores comparten protección con la casa, mirá [tableros en Carrasco](tableros-electricos/carrasco).',
                ]],
            ],
            'faq' => [
                ['q' => 'El diferencial salta cuando arranca la bomba de la piscina, ¿qué es?', 'a' => 'La bomba o su cable pueden tener una fuga. Se mide la bomba por separado antes de cambiar nada.'],
                ['q' => '¿Reparan instalaciones de casas con varias plantas?', 'a' => 'Sí, por sectores y con los circuitos identificados.'],
            ],
        ],
        'tableros' => [
            'title' => 'Tableros eléctricos en Carrasco – Principal y secundarios',
            'description' => 'Tableros en Carrasco: casas grandes con varios sectores, tableros secundarios para garaje y fondo, exteriores separados. Presupuesto sin costo.',
            'intro' => 'Ordenamos y renovamos tableros en casas de Carrasco. En casas grandes con ampliaciones, conviene un tablero principal y tableros secundarios para el garaje, el fondo o la planta alta, cada uno con sus protecciones. Separamos los exteriores con su diferencial y dejamos cada llave rotulada, para que cualquiera sepa qué corta.',
            'secciones' => [
                ['h2' => '¿Cuándo conviene sumar tableros secundarios?', 'p' => [
                    'Cuando hay sectores lejos del tablero principal con varios circuitos: una barbacoa con cocina, un garaje con herramientas y cargador, una casa de huéspedes o la planta alta. Un tablero secundario acorta recorridos, reduce la caída de tensión y permite cortar un sector sin afectar al resto.',
                ]],
                ['h2' => '¿Por qué conviene rotular cada llave en una casa grande?', 'p' => [
                    'En una casa de Carrasco con veinte o treinta circuitos, un tablero sin rótulos obliga a bajar llaves al azar cada vez que hay que cortar un sector. Con cada llave identificada ("dormitorio principal", "bomba piscina", "portón") cualquiera de la familia o del personal de la casa puede actuar rápido y sin dejar a oscuras lo que no hace falta. Es un detalle chico que ahorra mucho tiempo en una emergencia.',
                ]],
                ['h2' => '¿Qué se revisa al renovar el tablero principal?', 'p' => [
                    'La acometida y la línea desde el medidor, la potencia contratada, la puesta a tierra y el estado de cada circuito. Si la casa suma aire en cada ambiente, piscina y auto eléctrico, se verifica que todo entre en la potencia disponible. Más en [tableros eléctricos](tableros-electricos-montevideo).',
                ]],
            ],
            'faq' => [
                ['q' => '¿Cada tablero secundario lleva diferencial?', 'a' => 'Sí, o queda protegido por un diferencial en el principal, según el diseño.'],
                ['q' => '¿Pueden rotular un tablero existente?', 'a' => 'Sí, relevando cada circuito.'],
                ['q' => '¿Trabajan en apartamentos de Carrasco?', 'a' => 'Sí, en casas y apartamentos.'],
            ],
        ],
        'cargadores' => [
            'title' => 'Cargador para auto eléctrico en Carrasco – Casas',
            'description' => 'Cargador para auto eléctrico en Carrasco: casas con garaje, cocheras de edificios, circuito exclusivo y potencia revisada. Presupuesto sin costo.',
            'intro' => 'Instalamos cargadores para autos eléctricos en casas y edificios de Carrasco. En una casa con garaje, el trabajo es un circuito exclusivo desde el tablero, las protecciones del reglamento y el cargador en la pared o en un poste si el auto queda afuera. En edificios, alimentamos el punto desde tu medidor hasta la cochera, con autorización de la administración.',
            'secciones' => [
                ['h2' => '¿Qué conviene si en la casa hay dos autos eléctricos?', 'p' => [
                    'Dos puntos de carga con circuitos exclusivos, o un cargador con dos salidas, y un control que reparta la potencia para que la suma no supere lo que la casa puede dar. Se programa la carga para la madrugada, cuando el resto de la casa consume poco y la tarifa triple horario de UTE es más barata.',
                ]],
                ['h2' => '¿Y si el garaje está lejos del tablero?', 'p' => [
                    'Es común en casas grandes. Se tiende un cable de sección adecuada para que la caída de tensión no supere lo que admite el reglamento, o se suma un tablero secundario en el garaje. Los requisitos del Capítulo XXX y el costo de cargar en casa están en [cargadores para vehículos eléctricos](cargador-vehiculo-electrico-montevideo).',
                ]],
            ],
            'faq' => [
                ['q' => '¿Instalan dos cargadores en la misma casa?', 'a' => 'Sí, con circuitos exclusivos y reparto de potencia.'],
                ['q' => '¿Puede quedar el cargador afuera?', 'a' => 'Sí, con cargador y caja aptos para exterior.'],
                ['q' => '¿Hay que avisar a UTE?', 'a' => 'Si no cambia la potencia contratada, no. Si hace falta más potencia, te orientamos con el trámite.'],
            ],
        ],
    ],
];
