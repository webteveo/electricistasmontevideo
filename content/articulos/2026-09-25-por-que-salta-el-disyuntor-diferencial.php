<?php
return [
    'borrador'=>false,
    'slug'=>'por-que-salta-el-disyuntor-diferencial',
    'titulo'=>'¿Por qué salta el disyuntor diferencial? Causas y qué hacer',
    'title'=>'Por qué salta el disyuntor diferencial: causas y qué hacer',
    'description'=>'Por qué salta el disyuntor diferencial en tu casa: humedad, termotanque, lavarropas o cables viejos. Cómo encontrar la causa sin riesgos y cuándo llamar.',
    'keywords'=>['salta el disyuntor','disyuntor diferencial','salta la llave de luz'],
    'categoria'=>'Reparaciones eléctricas',
    'tema'=>'Interruptor diferencial',
    'fecha'=>'2026-09-25',
    'actualizado'=>'2026-09-25',
    'autor'=>'Electricistas Montevideo',
    'imagen'=>'public/images/servicios/tableros.webp',
    'imagen_alt'=>'Tablero eléctrico con llaves térmicas y disyuntor diferencial',
    'imagen_pie'=>'Imagen ilustrativa de un tablero eléctrico domiciliario.',
    'bajada'=>'Si el disyuntor corta, está haciendo su trabajo: detectó una fuga de corriente. El problema no es la llave sino lo que la hace saltar, y casi siempre se puede encontrar con un método simple.',
    'respuesta'=>'El disyuntor diferencial salta porque detecta una fuga de corriente a tierra, es decir, electricidad que se escapa por un camino que no es el cable. Las causas más comunes son la humedad en cajas o tomacorrientes, un electrodoméstico con la aislación dañada, como un termotanque o un lavarropas, y cables envejecidos.',
    'puntos_clave'=>[
        'El Reglamento de Baja Tensión de UTE considera de alta sensibilidad a los diferenciales de 30 mA.',
        'Según el mismo reglamento, los diferenciales de alta sensibilidad también protegen contra incendios, porque limitan las fugas por defecto de aislación.',
        'Un diferencial de 30 mA puede usarse en instalaciones existentes sin conductor de tierra, pero lo correcto es tener puesta a tierra.',
        'En instalaciones grandes o complejas, el reglamento recomienda diferenciales en cascada para que corten de forma selectiva.',
    ],
    'secciones'=>[
        [
            'h2'=>'¿Qué hace el disyuntor diferencial y en qué se diferencia de la térmica?',
            'parrafos'=>[
                'El disyuntor diferencial protege a las personas. Compara la corriente que sale por un cable con la que vuelve por el otro y, si falta una parte, entiende que se está escapando a tierra, por ejemplo a través de una persona que toca un equipo con una falla, y corta en milésimas de segundo. La llave térmica, en cambio, protege los cables: corta cuando pasa más corriente de la que el circuito soporta, por sobrecarga o cortocircuito.',
                'Por eso importa saber cuál de las dos saltó. Si fue la térmica, el problema suele ser de exceso de consumo o un cortocircuito en ese circuito. Si fue el diferencial, hay una fuga en algún lugar de la instalación que protege, que puede ser toda la casa. El Capítulo VI del Reglamento de Baja Tensión de UTE considera de alta sensibilidad a los diferenciales de 30 mA y destaca que, además de proteger a las personas, reducen el riesgo de incendio porque limitan las fugas por defecto de aislamiento.',
            ],
        ],
        [
            'h2'=>'¿Cuáles son las causas más comunes?',
            'parrafos'=>[
                'La causa más frecuente es la humedad. En Montevideo y en la costa de Canelones, las cajas exteriores, los tomacorrientes del patio y los artefactos de jardín acumulan agua con la lluvia o la condensación, y eso genera una fuga. Si el diferencial salta cuando llueve o a la mañana temprano, hay que empezar a buscar por ahí.',
                'La segunda causa son los electrodomésticos con resistencia o motor que trabajan con agua: termotanque, lavarropas, lavavajillas, calefón eléctrico o una heladera vieja. Con los años la aislación de la resistencia se deteriora y empieza a fugar, al principio de forma intermitente. Después vienen las instalaciones viejas con cables resecos, los empalmes con cinta dentro de cajas húmedas y los clavos o tornillos que perforaron un caño al colgar un cuadro.',
            ],
            'lista'=>[
                'Humedad o agua en cajas exteriores, tomacorrientes del patio o del baño.',
                'Termotanque, calefón o lavarropas con la resistencia deteriorada.',
                'Heladeras, freezers o bombas de agua viejas.',
                'Cables con la aislación envejecida en instalaciones antiguas.',
                'Un clavo o tornillo que dañó un cable dentro de la pared.',
                'Muchas fugas pequeñas que se suman en una instalación grande con un solo diferencial.',
            ],
        ],
        [
            'h2'=>'¿Cómo encontrar qué lo hace saltar sin correr riesgos?',
            'parrafos'=>[
                'La forma segura de encontrar la causa es ir descartando, sin abrir el tablero ni desarmar nada. Si en algún paso ves chispas, sentís olor a quemado o notás un tomacorriente caliente, cortá la llave general y no sigas probando.',
            ],
            'lista'=>[
                'Desenchufá todos los aparatos de la casa, incluidos los que están detrás de muebles, y apagá el termotanque desde su llave.',
                'Subí el disyuntor. Si ahora se mantiene arriba, la falla está en alguno de los aparatos.',
                'Enchufá o encendé los aparatos de a uno, esperando un par de minutos entre cada uno. El que hace saltar el diferencial es el que tiene la fuga.',
                'Si el disyuntor salta aun con todo desenchufado, bajá todas las térmicas, subí el diferencial y después subí las térmicas de a una. La que lo hace saltar indica el circuito con la falla.',
                'Si la falla está en un circuito de la instalación y no en un aparato, dejá esa térmica abajo y llamá a un electricista.',
            ],
            'lista_ordenada'=>true,
            'nota'=>'No abras el tablero, no desarmes tomacorrientes y no dejes el diferencial puenteado para usar la casa. Ese es justamente el momento en que protege.',
        ],
        [
            'h2'=>'¿Qué significa cada síntoma?',
            'parrafos'=>['La forma en que salta da una pista bastante buena de la causa. Esta tabla resume los casos más habituales:'],
            'tabla'=>['cabecera'=>['Cuándo salta', 'Causa probable', 'Qué hacer'], 'filas'=>[
                ['Cuando llueve o con mucha humedad', 'Agua en cajas o artefactos exteriores', 'Revisar los circuitos exteriores por tramos y cambiar las cajas por estancas'],
                ['Al encender el termotanque o el lavarropas', 'Resistencia del aparato con fuga', 'Dejarlo desconectado y revisar el aparato'],
                ['Al enchufar un aparato puntual', 'Falla de aislación en ese aparato', 'No usarlo hasta repararlo'],
                ['Aun con todo desenchufado', 'Falla en la instalación: cable dañado o humedad en una caja', 'Aislar el circuito y llamar a un electricista'],
                ['Al azar, sin patrón claro', 'Suma de fugas pequeñas o un diferencial defectuoso', 'Medir la aislación de cada circuito y probar el diferencial'],
            ]],
        ],
        [
            'h2'=>'¿Cuándo hay que cambiar el diferencial?',
            'parrafos'=>[
                'Hay que cambiarlo cuando no corta al apretar el botón de prueba o cuando salta sin que exista ninguna fuga medible. Todos los diferenciales tienen un botón marcado con una T: al apretarlo tiene que cortar de inmediato. Si no corta, no está protegiendo, aunque la casa funcione normalmente. Es una prueba que conviene hacer cada tanto.',
                'También conviene revisar el esquema completo en casas grandes, con muchos circuitos colgados de un solo diferencial. Las pequeñas fugas normales de cada aparato se suman y pueden llegar al umbral de corte. El reglamento de UTE recomienda, para instalaciones complejas o extensas, usar diferenciales en cascada y separar zonas, por ejemplo los circuitos exteriores de los interiores, para que una falla en el jardín no deje a oscuras toda la casa. Ese cambio se hace en el [tablero](tableros-electricos-montevideo).',
            ],
        ],
        [
            'h2'=>'¿Qué no hay que hacer cuando salta el disyuntor?',
            'parrafos'=>[
                'Lo peor que se puede hacer es anular la protección. Puentear el diferencial, reemplazarlo por uno menos sensible o subirlo una y otra vez hasta que aguante deja la instalación sin la única protección que evita una descarga a las personas. Tampoco conviene dejar desconectada la puesta a tierra de un aparato para que deje de saltar: la fuga sigue ahí, solo que ahora nadie la detecta.',
                'Si el disyuntor salta seguido y no encontrás la causa con el método de arriba, lo que corresponde es una revisión con instrumentos: medición de aislación por circuito, prueba del diferencial y revisión de la puesta a tierra. Más información en [reparaciones eléctricas](reparaciones-electricas-montevideo) y en [revisión y mantenimiento](mantenimiento-electrico-montevideo).',
            ],
        ],
    ],
    'faq'=>[
        ['q'=>'¿Es peligroso que salte el disyuntor diferencial?', 'a'=>'No: que salte significa que está funcionando. Lo peligroso es la fuga que lo hace saltar y, sobre todo, anular el diferencial para que deje de cortar.'],
        ['q'=>'¿Por qué salta el disyuntor cuando llueve?', 'a'=>'Casi siempre por agua en una caja exterior, un tomacorriente del patio o un artefacto de jardín. Hay que revisar los circuitos exteriores por tramos.'],
        ['q'=>'¿Puede saltar el diferencial por el termotanque?', 'a'=>'Sí, es una de las causas más comunes. Cuando la resistencia se deteriora empieza a fugar, al principio de forma intermitente.'],
        ['q'=>'¿Qué diferencia hay entre que salte la térmica y que salte el diferencial?', 'a'=>'La térmica corta por exceso de consumo o cortocircuito. El diferencial corta por una fuga de corriente a tierra. Las causas y la forma de buscarlas son distintas.'],
        ['q'=>'¿Cada cuánto hay que probar el disyuntor diferencial?', 'a'=>'Conviene apretar el botón de prueba cada tanto. Si no corta de inmediato, hay que cambiarlo.'],
    ],
    'fuentes'=>[
        ['label'=>'UTE – Reglamento de Baja Tensión, Capítulo VI: protecciones contra contactos directos e indirectos', 'url'=>'https://ute.com.uy/sites/default/files/files-cuerpo-paginas/C-06.pdf', 'nota'=>'Interruptores diferenciales de alta sensibilidad (30 mA), protección contra incendios e instalaciones en cascada; consultado el 25/09/2026.'],
        ['label'=>'UTE – Reglamento de Baja Tensión, Capítulo XXIII: puestas a tierra', 'url'=>'https://portal.ute.com.uy/sites/default/files/files-cuerpo-paginas/C-23.pdf', 'nota'=>'Electrodos y resistencia de tierra; consultado el 25/09/2026.'],
        ['label'=>'UTE – Reglamento de Baja Tensión (índice de capítulos)', 'url'=>'https://www.ute.com.uy/clientes/tramites-y-servicios/tecnicos-y-firmas-instaladoras/reglamento-de-baja-tension', 'nota'=>'Consultado el 25/09/2026.'],
    ],
    'links'=>[
        ['href'=>'reparaciones-electricas-montevideo','label'=>'Reparaciones eléctricas en Montevideo'],
        ['href'=>'tableros-electricos-montevideo','label'=>'Tableros eléctricos y protecciones'],
        ['href'=>'mantenimiento-electrico-montevideo','label'=>'Revisión y mantenimiento eléctrico'],
        ['href'=>'electricista-costa-de-oro','label'=>'Electricista en la Costa de Oro'],
        ['href'=>'contacto','label'=>'Contacto'],
    ],
    'cta_titulo'=>'¿Te salta el disyuntor y no encontrás la causa?',
    'cta_texto'=>'Contanos cuándo salta y en qué zona estás, y coordinamos una revisión con presupuesto sin costo.',
    'cta_message'=>'Hola, me salta el disyuntor diferencial y quiero coordinar una revisión.',
];
