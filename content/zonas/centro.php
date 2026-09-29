<?php
/** Centro (Montevideo). Zona histórica: su página es /electricista-centro (texto en src/datos/barrios.php). Acá solo servicio × barrio. */
return [
    'mod' => '2026-09-29',
    'servicios' => [
        'reparaciones' => [
            'title' => 'Reparaciones eléctricas en el Centro – Edificios antiguos',
            'description' => 'Reparaciones eléctricas en el Centro de Montevideo: apartamentos de techos altos, pensiones, oficinas y locales de 18 de Julio. Presupuesto sin costo.',
            'intro' => 'Reparamos fallas eléctricas en apartamentos, oficinas, pensiones y locales del Centro, alrededor de 18 de Julio, la plaza Cagancha y la plaza Independencia. Lo más común son cables de décadas que no aguantan el consumo actual, térmicas que saltan al prender una estufa y cortes en edificios con montantes compartidas. Te pasamos el presupuesto antes de empezar.',
            'secciones' => [
                ['h2' => '¿Qué falla en los apartamentos de techos altos del Centro?', 'p' => [
                    'En edificios de principios del siglo XX, los cables bajan del techo a las llaves por caños largos y viejos, y los empalmes están en cajas a tres o cuatro metros de altura que nadie abre. Con el tiempo esos empalmes se aflojan y calientan. El síntoma es una luz que titila o un ambiente que se apaga solo. Se revisa con escalera y se rehacen las conexiones con bornes nuevos.',
                    'Otro caso frecuente es la estufa o el aire en un circuito de iluminación, porque cuando se hizo la instalación no existían esos equipos.',
                ]],
                ['h2' => '¿Y en pensiones y apartamentos compartidos?', 'p' => [
                    'Muchas personas, muchas estufas y pocos tomacorrientes: zapatillas encadenadas, cables bajo alfombras y protecciones que saltan todas las noches de invierno. Además de reparar lo que se quemó, conviene agregar puntos y separar circuitos por habitación. Si el tablero es el problema, mirá [tableros en el Centro](tableros-electricos/centro).',
                ]],
            ],
            'faq' => [
                ['q' => 'Una luz del techo titila y a veces se apaga, ¿qué es?', 'a' => 'En techos altos suele ser un empalme flojo en la caja del techo. Conviene revisarlo antes de que caliente más.'],
                ['q' => '¿Trabajan en pensiones y edificios de alquiler?', 'a' => 'Sí, coordinando con el propietario o la administración.'],
                ['q' => '¿Reparan oficinas del Centro fuera de hora?', 'a' => 'Se puede coordinar para no cortar la actividad.'],
            ],
        ],
        'tableros' => [
            'title' => 'Tableros eléctricos en el Centro – Fusibles y montantes',
            'description' => 'Tableros en el Centro de Montevideo: fusibles, montantes compartidas, oficinas con tableros por piso y locales de 18 de Julio. Presupuesto sin costo.',
            'intro' => 'Cambiamos tableros en apartamentos, oficinas y locales del Centro. En los edificios antiguos del barrio todavía hay tableros con fusibles, cajas de madera y montantes que alimentan varias unidades desde un tablero general viejo. Proponemos un tablero con térmicas por circuito y disyuntor diferencial para tu unidad, y te orientamos si el problema es del edificio.',
            'secciones' => [
                ['h2' => '¿El problema es de mi tablero o del edificio?', 'p' => [
                    'Si el corte afecta solo a tu unidad, casi siempre está en tu tablero o en tus circuitos. Si se cortan varias unidades a la vez, el problema está en la montante o en el tablero general del edificio, y ahí interviene la administración. Medimos en tu tablero para saber de qué lado está la falla antes de proponer un cambio.',
                ]],
                ['h2' => '¿Qué conviene en oficinas y locales de 18 de Julio?', 'p' => [
                    'Un tablero por sector con circuitos separados para iluminación, tomacorrientes y aire, y un disyuntor diferencial por grupo. En locales con vidriera, la iluminación de vidriera en su propio circuito, para que una falla no apague el negocio. Más en [tableros eléctricos](tableros-electricos-montevideo) y [electricidad para comercios](electricista-comercios-montevideo).',
                ]],
            ],
            'faq' => [
                ['q' => 'Mi apartamento del Centro tiene fusibles, ¿qué hago?', 'a' => 'Conviene cambiarlo por un tablero con térmicas y diferencial. Se hace sin tocar el medidor de UTE.'],
                ['q' => '¿Trabajan en tableros generales de edificios?', 'a' => 'Sí, contratados por la administración o el consorcio.'],
                ['q' => '¿Cuánto espacio necesito?', 'a' => 'En general alcanza con el lugar del tablero viejo, con una caja algo más grande.'],
            ],
        ],
        'recableado' => [
            'title' => 'Recableado en el Centro – Apartamentos antiguos',
            'description' => 'Recableado de apartamentos y oficinas antiguas en el Centro: cables de décadas, empalmes en techos altos y sin tierra. Presupuesto sin costo.',
            'intro' => 'Recableamos apartamentos, oficinas y locales antiguos del Centro de Montevideo. En edificios de principios y mediados del siglo XX, el cableado original tiene la aislación reseca, los empalmes están en cajas altas y casi nunca hay tierra. Renovamos por circuitos, desde el tablero, y aprovechamos los caños que estén en buen estado.',
            'secciones' => [
                ['h2' => '¿Cómo se trabaja con techos de cuatro metros?', 'p' => [
                    'Con andamio o escalera según el caso, y aprovechando los caños que bajan del techo. En muchos apartamentos del Centro se decide bajar la distribución: en vez de repartir desde cajas en el techo, se lleva por zócalos o por cielorrasos bajos en baños y cocinas, lo que facilita el mantenimiento futuro.',
                ]],
                ['h2' => '¿Qué se renueva primero?', 'p' => [
                    'El tablero y la línea que llega desde el medidor, después cocina, baño y termotanque, y por último iluminación y dormitorios. En oficinas se empieza por los sectores de más uso. En cada circuito nuevo se suma el conductor de tierra. Mirá [recableado eléctrico](recableado-electrico-montevideo).',
                ]],
                ['h2' => '¿Qué pasa con las pensiones y los apartamentos compartidos?', 'p' => [
                    'En el Centro hay pensiones y apartamentos compartidos donde muchas personas usan la misma instalación. Al recablear, conviene dar un circuito a cada habitación, con su protección, y dejar la cocina y el baño comunes en circuitos propios. Así se terminan los cortes de cada noche de invierno.',
                ]],
            ],
            'faq' => [
                ['q' => '¿Se puede recablear sin tocar las molduras?', 'a' => 'Sí. Se buscan recorridos que eviten molduras y cielorrasos decorados.'],
                ['q' => '¿Cuánto dura?', 'a' => 'Depende del tamaño y del estado. Te lo indicamos en el presupuesto, después de la visita.'],
                ['q' => '¿Trabajan con la oficina funcionando?', 'a' => 'Sí, por sectores y fuera del horario de atención si hace falta.'],
            ],
        ],
    ],
];
