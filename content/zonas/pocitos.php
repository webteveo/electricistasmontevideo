<?php
/** Pocitos (Montevideo). Zona histórica: su página es /electricista-pocitos (texto en src/datos/barrios.php). Acá solo servicio × barrio. */
return [
    'mod' => '2026-09-29',
    'servicios' => [
        'reparaciones' => [
            'title' => 'Reparaciones eléctricas en Pocitos – Apartamentos',
            'description' => 'Reparaciones eléctricas en Pocitos: térmicas que saltan con aire y termotanque, tomacorrientes sin tierra y edificios con portería. Por WhatsApp.',
            'intro' => 'Reparamos fallas eléctricas en apartamentos y casas de Pocitos, de la rambla a Bulevar España y la avenida Brasil. En torres de varias décadas, lo que más vemos son térmicas que saltan cuando coinciden el aire, el termotanque y la cocina, tomacorrientes que calientan y luces que parpadean después de una reforma. Coordinamos con portería y te pasamos el presupuesto antes.',
            'secciones' => [
                ['h2' => '¿Por qué salta la térmica en un apartamento reformado?', 'p' => [
                    'Porque la reforma cambió la cocina, sumó un aire o un horno eléctrico, y todo quedó colgado del mismo circuito de la instalación original. La térmica corta cuando coinciden. No se arregla poniendo una térmica más grande: eso deja al cable sin protección. Se arregla dándole su circuito a cada equipo de consumo alto.',
                ]],
                ['h2' => '¿Qué falla en los espacios comunes de las torres?', 'p' => [
                    'Luces de palier con sensores, porteros eléctricos, bombas y la iluminación de cocheras. Cuando el edificio nos contrata, coordinamos con la administración y trabajamos sin cortar los ascensores ni el resto de los servicios. Si el problema está en tu tablero, mirá [tableros en Pocitos](tableros-electricos/pocitos).',
                ]],
            ],
            'faq' => [
                ['q' => '¿Trabajan en edificios con portería de Pocitos?', 'a' => 'Sí. Avisamos en portería y coordinamos el horario con vos.'],
                ['q' => 'Un tomacorriente calienta cuando enchufo la estufa, ¿qué hago?', 'a' => 'Dejá de usarlo y consultanos. Suele ser un contacto flojo o un circuito sobrecargado.'],
                ['q' => '¿Cómo pido la reparación?', 'a' => 'Por WhatsApp, con la dirección, el piso y qué falla.'],
            ],
        ],
        'tableros' => [
            'title' => 'Tableros eléctricos en Pocitos – Torres y casas',
            'description' => 'Tableros en Pocitos: apartamentos con tableros chicos, sin diferencial ni lugar para aires, y casas de calles interiores. Presupuesto sin costo.',
            'intro' => 'Cambiamos y ampliamos tableros en apartamentos y casas de Pocitos. En muchas torres, el tablero de la unidad tiene dos o tres térmicas, sin disyuntor diferencial y sin lugar para los circuitos que hoy piden un aire por ambiente, un horno o un anafe de inducción. Lo reemplazamos por uno con cada circuito separado y rotulado, sin tocar el medidor ni la instalación del edificio.',
            'secciones' => [
                ['h2' => '¿Cómo se cambia el tablero de una torre sin afectar al edificio?', 'p' => [
                    'Se corta solo la llave de tu unidad, que está en el tablero de medidores o en tu palier. El resto del edificio no se entera. Se retira el tablero viejo, se coloca el nuevo en el mismo lugar o en uno más cómodo, y se conectan los circuitos existentes y los nuevos. Al terminar se prueba el disyuntor diferencial.',
                ]],
                ['h2' => '¿Qué pasa si el apartamento no tiene tierra?', 'p' => [
                    'Muchos edificios de Pocitos tienen una tierra común que llega a cada unidad, pero no siempre está conectada al tablero. Se mide y, si existe, se conecta. Si no existe, el diferencial igual protege, como admite el reglamento de UTE para instalaciones existentes, y se evalúa con la administración cómo sumarla. Mirá [puesta a tierra](puesta-a-tierra-montevideo).',
                ]],
            ],
            'faq' => [
                ['q' => '¿Hay que avisar a la administración para cambiar el tablero?', 'a' => 'Si es dentro de tu unidad, alcanza con avisar en portería.'],
                ['q' => '¿El tablero nuevo entra en el hueco del viejo?', 'a' => 'A veces sí. Si no, se usa uno de aplicar o un secundario.'],
                ['q' => '¿Dejan lugar para un cargador de auto?', 'a' => 'Sí, si lo vas a necesitar.'],
            ],
        ],
        'cargadores' => [
            'title' => 'Cargador para auto eléctrico en Pocitos – Cocheras',
            'description' => 'Cargador para auto eléctrico en cocheras de edificios de Pocitos: recorrido desde tu medidor, autorización y protecciones. Presupuesto sin costo.',
            'intro' => 'Instalamos cargadores para autos eléctricos en cocheras de edificios de Pocitos. El punto de carga se alimenta desde el medidor de tu apartamento hasta tu lugar en la cochera, con un circuito exclusivo y las protecciones que pide el Reglamento de Baja Tensión de UTE. Relevamos el recorrido y preparamos la información que la administración necesita para autorizar.',
            'secciones' => [
                ['h2' => '¿Qué pide la administración de un edificio?', 'p' => [
                    'En general, una descripción del trabajo: por dónde va el cable, cómo se canaliza, qué protecciones lleva y quién lo ejecuta. Algunas administraciones piden además que el consumo quede en la cuenta del propietario y que no se toque el tablero de servicios comunes. Con el relevamiento armamos esa descripción para que la presentes.',
                ]],
                ['h2' => '¿Qué pasa si varios vecinos quieren cargador?', 'p' => [
                    'Conviene planificarlo como edificio: una canalización común hacia la cochera y, si hace falta, un sistema que reparta la potencia disponible entre los cargadores para no sobrecargar la acometida. Es más prolijo que hacer una instalación distinta para cada uno. Más detalles en [cargadores para vehículos eléctricos](cargador-vehiculo-electrico-montevideo).',
                ]],
            ],
            'faq' => [
                ['q' => '¿El consumo del cargador se paga con los gastos comunes?', 'a' => 'No, si se alimenta desde tu medidor: va a tu cuenta de UTE.'],
                ['q' => '¿Cuánto cable hay que tender?', 'a' => 'Depende de la distancia de tu medidor a la cochera. Se mide en el relevamiento.'],
                ['q' => '¿Instalan en casas de Pocitos también?', 'a' => 'Sí, en casas con garaje o entrada para el auto.'],
            ],
        ],
    ],
];
