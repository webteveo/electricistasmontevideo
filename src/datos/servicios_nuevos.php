<?php
// Servicios pilar agregados el 29/09/2026: puesta a tierra, recableado, tomacorrientes, aumento de potencia y urgencias.
// Mismo formato que $servicios_landing (servicios.php) + preguntas, fuentes y mod (como servicios_preguntas.php).
// A CONFIRMAR POR EL OPERADOR que hace cada uno (ver AUDITORIA-SEO.md). Sin precios, plazos, garantías ni "24 horas".
// Datos de UTE consultados el 29/09/2026: trámite de potencia contratada y canales de Telegestiones.

$fuente_ute_potencia = ['label'=>'UTE – Potencia contratada', 'url'=>'https://www.ute.com.uy/clientes/tramites-y-servicios/potencia-contratada', 'nota'=>'quién puede pedir el cambio y cuándo hace falta firma instaladora; consultado el 29/09/2026'];
$fuente_ute_normalizadas = ['label'=>'UTE – Potencias normalizadas', 'url'=>'https://www.ute.com.uy/clientes/tramites-y-servicios/tecnicos-y-firmas-instaladoras/potencias-normalizadas', 'nota'=>'escalones de potencia monofásica y trifásica'];
$fuente_ute_cortes = ['label'=>'UTE – Reclamos por cortes en el servicio de energía eléctrica', 'url'=>'https://www.ute.com.uy/reclamos/reclamos-por-cortes-en-el-servicio-de-energia-electrica', 'nota'=>'Telegestiones 0800 1930 o *1930 desde celular; consultado el 29/09/2026'];

$servicios_nuevos = [
    'urgencias' => [
        'slug' => 'electricista-urgencias-montevideo',
        'hero' => 'Olor a quemado, chispas, un enchufe que calienta o la casa sin luz: qué hacer ya y cómo consultarnos.',
        'title' => 'Electricista de urgencia en Montevideo – Fallas graves',
        'description' => 'Urgencias eléctricas en Montevideo: olor a quemado, chispas, tomacorrientes calientes o casa sin luz. Qué hacer y cómo consultar por WhatsApp.',
        'crumb' => 'Urgencias eléctricas',
        'h1' => 'Urgencias eléctricas en Montevideo',
        'intro' => 'Una urgencia eléctrica es una falla que puede lastimar a alguien o empezar un incendio: olor a quemado, chispas, humo en un tablero o un tomacorriente que quema al tacto. También lo es quedarte sin luz en una parte de la casa cuando del otro lado de la calle hay. Llamanos, contanos qué ves y te decimos si podemos ir y cuándo.',
        'lista_titulo' => 'Situaciones que son urgencia',
        'lista' => [
            'Olor a plástico quemado en un tomacorriente, una llave o el tablero.',
            'Chispas o chasquidos al enchufar o al prender una luz.',
            'Un tomacorriente, una ficha o una llave caliente al tacto.',
            'Marcas negras o tapas derretidas en cajas y tomacorrientes.',
            'Una llave que salta apenas la subís y deja un sector sin luz.',
            'Media casa sin energía y la otra mitad funcionando.',
            'Un cable caído o pelado al alcance de alguien.',
        ],
        'secciones' => [
            ['h2' => 'Cómo trabajamos una urgencia', 'p' => ['Primero te preguntamos por teléfono qué ves, qué olés y qué estaba prendido. Eso ya nos dice si hay que ir cuanto antes o si la instalación puede esperar unas horas sin riesgo. La disponibilidad del momento te la confirmamos en esa llamada: no prometemos tiempos que no sabemos si podemos cumplir.', 'En la visita aislamos el circuito con la falla, buscamos la causa con instrumentos y dejamos la casa con energía en todo lo que se pueda usar sin riesgo. Lo que necesite un arreglo más grande queda presupuestado para hacerlo bien, no con un parche.']],
            ['h2' => 'Qué no conviene hacer', 'p' => ['No subas una y otra vez una llave que salta: está cortando por algo. No abras el tablero ni desarmes tomacorrientes para mirar adentro, y no uses cinta aisladora sobre un cable que calentó. Tampoco tires agua sobre un equipo o una caja que echa humo. Si hay fuego, salí y llamá al 911.']],
            ['h2' => 'Después de la urgencia', 'p' => ['Casi todas las urgencias tienen una causa que se veía venir: un empalme flojo que calentaba de a poco, un circuito sobrecargado desde hace años o una caja con humedad. Cuando resolvemos la falla te decimos qué más conviene revisar para que no se repita, y qué es urgente y qué puede esperar.']],
        ],
        'faq' => [
            ['q' => '¿Atienden urgencias a cualquier hora?', 'a' => 'Llamanos y te confirmamos la disponibilidad en ese momento. No publicamos un horario de urgencias que no podamos cumplir.'],
            ['q' => '¿Qué hago si hay olor a quemado?', 'a' => 'No uses ese tomacorriente ni esa llave, no abras el tablero y llamanos. Si hay humo o fuego, salí de la casa y llamá al 911.'],
            ['q' => 'Me quedé sin luz, ¿es un problema de mi casa o de UTE?', 'a' => 'Si tus vecinos tampoco tienen luz, es un corte de la red: se reclama a UTE al 0800 1930 o al *1930. Si solo vos no tenés, o solo una parte de tu casa, es de tu instalación.'],
            ['q' => '¿Cuánto cuesta una visita de urgencia?', 'a' => 'Te lo decimos por teléfono antes de ir, según el día, la hora y la zona.'],
        ],
        'wsp' => 'Hola, tengo una urgencia eléctrica en Montevideo.',
    ],
    'puesta-tierra' => [
        'slug' => 'puesta-a-tierra-montevideo',
        'hero' => 'Medimos la puesta a tierra de tu casa o local, instalamos jabalina y conductor de protección. Presupuesto sin costo.',
        'title' => 'Puesta a tierra en Montevideo – Medición y jabalina',
        'description' => 'Puesta a tierra en Montevideo: medición, jabalina, conductor de protección y tomacorrientes con tierra real. Presupuesto sin costo por WhatsApp.',
        'crumb' => 'Puesta a tierra',
        'h1' => 'Puesta a tierra en Montevideo',
        'intro' => 'La puesta a tierra es el camino por donde se va la corriente cuando un equipo tiene una falla, en vez de pasar por tu cuerpo. Sin ella, el disyuntor diferencial protege peor y la carcasa de un lavarropas o un termotanque puede quedar con tensión. Medimos la tierra que tenés, te decimos si alcanza y, si falta, la instalamos.',
        'lista_titulo' => 'Qué hacemos',
        'lista' => [
            'Medición de la resistencia de puesta a tierra con instrumento.',
            'Instalación de jabalina y cable de tierra hasta el tablero.',
            'Conductor de protección hasta los tomacorrientes de cocina, baño y lavadero.',
            'Cambio de tomacorrientes de dos patas por tomacorrientes con tierra.',
            'Conexión a tierra de termotanque, lavarropas, bomba y aire acondicionado.',
            'Revisión de la tierra existente cuando el diferencial salta sin motivo claro.',
            'Puesta a tierra para cargadores de auto eléctrico y circuitos exteriores.',
        ],
        'secciones' => [
            ['h2' => 'Cómo trabajamos', 'p' => ['Empezamos midiendo: con un instrumento de medición de tierra sabemos si hay puesta a tierra, cuánto vale la resistencia y si llega a los tomacorrientes. Muchas casas tienen una jabalina que nadie revisó en años, con el cable cortado o la conexión oxidada.', 'Si falta o no alcanza, proponemos dónde clavar la jabalina, por dónde llevar el cable hasta el tablero y qué circuitos conectar primero. Al terminar volvemos a medir y te dejamos el valor anotado.']],
            ['h2' => 'Casas viejas y apartamentos', 'p' => ['En casas antiguas es común que no haya tierra en ningún punto, o que haya en la cocina nueva y no en el resto. En apartamentos, la tierra suele venir del edificio por un conductor común, y hay que ver si llega bien a tu tablero. En los dos casos se puede completar sin romper toda la instalación, aprovechando las cañerías existentes cuando tienen lugar.']],
            ['h2' => 'Qué información nos sirve', 'p' => ['Una foto del tablero con la tapa puesta, una de un tomacorriente de la cocina y saber si es casa o apartamento. Si tenés patio o jardín, contanos dónde está el tablero respecto del terreno: define el recorrido del cable hasta la jabalina.']],
        ],
        'faq' => [
            ['q' => '¿Cómo sé si mi casa tiene puesta a tierra?', 'a' => 'Una pista son los tomacorrientes de dos agujeros, o de tres pero con el borne de tierra sin cable. La única forma segura de saberlo es medirla con instrumento.'],
            ['q' => '¿El disyuntor diferencial reemplaza a la tierra?', 'a' => 'No. El diferencial corta cuando detecta una fuga, y la tierra le da a esa fuga un camino seguro. Juntos protegen mucho mejor que cada uno por separado.'],
            ['q' => '¿Hay que romper paredes para poner tierra?', 'a' => 'Muchas veces no: el cable de protección se pasa por las cañerías que ya existen. Si están saturadas, se evalúa una canalización exterior prolija.'],
            ['q' => '¿Cada cuánto conviene medir la tierra?', 'a' => 'Después de cualquier reforma, cuando el diferencial salta sin causa clara y, en casas cerca del mar o con terreno húmedo, cada algunos años, porque las conexiones se oxidan.'],
        ],
        'wsp' => 'Hola, quiero medir o instalar la puesta a tierra en Montevideo.',
    ],
    'recableado' => [
        'slug' => 'recableado-electrico-montevideo',
        'hero' => 'Renovamos cables resecos, empalmes precarios e instalaciones sin tierra en casas y apartamentos antiguos. Presupuesto sin costo.',
        'title' => 'Recableado eléctrico en Montevideo – Casas antiguas',
        'description' => 'Recableado de casas y apartamentos viejos en Montevideo: cables resecos, empalmes precarios y sin tierra. Por etapas. Presupuesto por WhatsApp.',
        'crumb' => 'Recableado eléctrico',
        'h1' => 'Recableado eléctrico en Montevideo',
        'intro' => 'Recablear es cambiar los conductores de una instalación que ya no da más: cables con la aislación reseca que se quiebra al doblarla, empalmes hechos con cinta, circuitos sin conductor de tierra. En Montevideo hay miles de casas y apartamentos con cableado de hace décadas. Revisamos el estado de la tuya y te proponemos renovarla completa o por etapas.',
        'lista_titulo' => 'Qué incluye un recableado',
        'lista' => [
            'Relevamiento de circuitos, cañerías y cajas existentes.',
            'Cambio de conductores viejos por cables nuevos de la sección adecuada.',
            'Conductor de protección (tierra) en los circuitos que no lo tienen.',
            'Separación de circuitos: cocina, baño, iluminación y tomacorrientes generales.',
            'Reemplazo de empalmes precarios dentro de cajas y bocas.',
            'Tablero nuevo o adecuado con térmicas y disyuntor diferencial.',
            'Canalización exterior prolija donde no se puede embutir.',
        ],
        'secciones' => [
            ['h2' => 'Cómo planificamos un recableado', 'p' => ['Antes de sacar un solo cable, abrimos algunas cajas para ver el estado real de los conductores y de las cañerías. Si los caños están enteros y tienen lugar, se pasan los cables nuevos por el mismo camino y casi no se rompe. Si están tapados, oxidados o no existen, se decide entre canalizar de nuevo o usar cablecanal por fuera.', 'Con eso armamos un plan por etapas: primero lo que más riesgo tiene y más consumo soporta, en general la cocina, el baño y el circuito del termotanque.']],
            ['h2' => 'Recablear con la casa habitada', 'p' => ['Se puede. Trabajamos circuito por circuito para que siempre quede una parte de la casa con energía, y dejamos cada tramo terminado y probado antes de pasar al siguiente. Te avisamos qué ambiente va a quedar sin luz y por cuánto tiempo en cada etapa.']],
            ['h2' => 'Qué información nos sirve', 'p' => ['La antigüedad aproximada de la casa o el edificio, si hubo reformas y cuándo, una foto del tablero y una de alguna caja o tomacorriente que te preocupe, sin abrir nada. Si tenés planos, mejor.']],
        ],
        'faq' => [
            ['q' => '¿Cómo sé si mi casa necesita recableado?', 'a' => 'Señales típicas: cables de tela o de goma endurecida, tomacorrientes que calientan, llaves que saltan sin motivo, ausencia de tierra y ampliaciones hechas con cable a la vista. Una revisión con medición de aislación lo confirma.'],
            ['q' => '¿Hay que romper todas las paredes?', 'a' => 'No siempre. Si las cañerías existentes están en buen estado, los cables nuevos se pasan por ahí. Donde no se puede, se usa canalización exterior.'],
            ['q' => '¿Se puede hacer por partes?', 'a' => 'Sí. Es lo más común: se empieza por los circuitos de más consumo y riesgo, y se sigue según el presupuesto y los tiempos de cada casa.'],
            ['q' => '¿Hacen recableado en edificios?', 'a' => 'Sí, dentro de tu unidad. Si hay que pasar por ductos o espacios comunes, se coordina con la administración.'],
        ],
        'wsp' => 'Hola, quiero consultar por un recableado en Montevideo.',
    ],
    'tomacorrientes' => [
        'slug' => 'tomacorrientes-montevideo',
        'hero' => 'Tomacorrientes nuevos, cambio de enchufes de dos patas, puntos que calientan y llaves de luz que fallan. Presupuesto sin costo.',
        'title' => 'Tomacorrientes en Montevideo – Instalación y cambio',
        'description' => 'Tomacorrientes en Montevideo: enchufes nuevos, con tierra, que calientan o no andan, y llaves de luz. Presupuesto sin costo por WhatsApp.',
        'crumb' => 'Tomacorrientes y llaves',
        'h1' => 'Tomacorrientes y llaves de luz en Montevideo',
        'intro' => 'La mayoría de las consultas chicas de electricidad empiezan en un tomacorriente: faltan enchufes en la cocina, uno calienta, otro dejó de andar o hay zapatillas encadenadas detrás del televisor. Cambiamos e instalamos tomacorrientes y llaves de luz en casas, apartamentos y oficinas de Montevideo, y revisamos de qué circuito conviene alimentarlos.',
        'lista_titulo' => 'Trabajos con tomacorrientes y llaves',
        'lista' => [
            'Tomacorrientes nuevos en cocina, living, dormitorios y exteriores.',
            'Cambio de tomacorrientes de dos patas por tomacorrientes con tierra.',
            'Tomacorrientes que calientan, chispean o quedaron flojos.',
            'Puntos que dejaron de funcionar y tramos sin corriente.',
            'Tomacorrientes con puerto USB y dobles en escritorios y mesadas.',
            'Llaves de luz, combinaciones de escalera y llaves con indicador.',
            'Tomacorrientes estancos para patio, terraza y lavadero.',
        ],
        'secciones' => [
            ['h2' => 'Cómo trabajamos', 'p' => ['Antes de sumar un tomacorriente miramos de qué circuito sale y qué más tiene colgado. Agregar un punto nuevo en la cocina a un circuito que ya alimenta la heladera y el microondas es la receta para que salte la térmica. A veces conviene tirar un circuito nuevo desde el tablero; a veces alcanza con tomar de otro menos cargado.', 'Usamos tomacorrientes y llaves de marcas del mercado, con bornes firmes, y dejamos cada punto probado.']],
            ['h2' => 'Cuándo un tomacorriente es urgencia', 'p' => ['Si calienta, huele a quemado, tiene marcas negras o chispea al enchufar, dejá de usarlo y consultanos. No es un tema estético: casi siempre hay un contacto flojo que genera calor y puede terminar en un incendio. Mirá también [urgencias eléctricas](electricista-urgencias-montevideo).']],
            ['h2' => 'Qué información nos sirve', 'p' => ['Cuántos puntos querés agregar o cambiar, en qué ambientes y qué vas a enchufar ahí. Una foto del tomacorriente y otra del tablero ayudan a presupuestar sin visita previa en trabajos chicos.']],
        ],
        'faq' => [
            ['q' => '¿Puedo cambiar un enchufe de dos patas por uno de tres?', 'a' => 'Solo sirve si llega el cable de tierra a esa caja. Si no llega, el tercer borne queda sin conexión y da una falsa sensación de seguridad. Primero se revisa la [puesta a tierra](puesta-a-tierra-montevideo).'],
            ['q' => '¿Por qué calienta un tomacorriente?', 'a' => 'Por un contacto flojo, un tomacorriente gastado o un equipo que pide más corriente de la que ese punto soporta. Hay que cambiarlo y revisar la conexión.'],
            ['q' => '¿Hacen trabajos chicos, de uno o dos tomacorrientes?', 'a' => 'Sí. Mandanos fotos por WhatsApp y te pasamos el presupuesto.'],
            ['q' => '¿Instalan tomacorrientes en el exterior?', 'a' => 'Sí, con cajas estancas y en un circuito protegido por disyuntor diferencial.'],
        ],
        'wsp' => 'Hola, necesito cambiar o agregar tomacorrientes en Montevideo.',
    ],
    'potencia' => [
        'slug' => 'aumento-de-potencia-ute-montevideo',
        'hero' => 'Si salta la llave general o vas a sumar equipos, revisamos tu consumo y te orientamos con el trámite ante UTE.',
        'title' => 'Aumento de potencia UTE en Montevideo – Qué hacer',
        'description' => 'Aumento de potencia con UTE en Montevideo: cuándo hace falta, qué revisar antes y cuándo se necesita firma instaladora. Consultá por WhatsApp.',
        'crumb' => 'Aumento de potencia UTE',
        'h1' => 'Aumento de potencia y trámites UTE en Montevideo',
        'intro' => 'Cuando salta la llave general de la casa al prender varios equipos juntos, o vas a sumar un aire acondicionado, una cocina eléctrica o un cargador de auto, puede que la potencia contratada con UTE te quede corta. Antes de pedir más potencia conviene revisar la instalación: a veces el problema es cómo están repartidos los circuitos, no la potencia.',
        'lista_titulo' => 'En qué te ayudamos',
        'lista' => [
            'Medición del consumo real y de los picos de la casa o el local.',
            'Revisión del tablero, la acometida y la sección de los cables.',
            'Reparto de circuitos para que no salte la llave general.',
            'Adecuación de la instalación antes de un aumento de potencia.',
            'Orientación sobre el trámite de potencia contratada ante UTE.',
            'Preparación de la instalación para pasar de monofásico a trifásico.',
            'Previsión de potencia para cargadores de auto eléctrico y aire acondicionado.',
        ],
        'secciones' => [
            ['h2' => 'Cómo trabajamos', 'p' => ['Primero medimos. Con una pinza amperométrica vemos cuánto consume la casa con los equipos que usás a la vez y cómo se reparte ese consumo entre los circuitos. Con eso sabés si te alcanza con ordenar la instalación o si realmente necesitás más potencia.', 'Si hace falta el aumento, te explicamos qué potencia pedir, qué hay que adecuar en la instalación y cómo se hace el trámite en tu caso.']],
            ['h2' => 'Llave general, limitador y potencia', 'p' => ['Cuando lo que corta es la llave de entrada o el interruptor que está junto al medidor, la casa superó la potencia contratada o la capacidad de la instalación. Si lo que corta es una térmica del tablero, el problema es de ese circuito y más potencia no lo resuelve. Distinguirlos es el primer paso.']],
            ['h2' => 'Qué información nos sirve', 'p' => ['Una foto de la factura de UTE donde figura la potencia contratada, una del tablero y la lista de equipos que querés usar a la vez. Si vas a sumar un equipo grande, su potencia en la etiqueta o el manual.']],
        ],
        'faq' => [
            ['q' => '¿Quién pide el aumento de potencia a UTE?', 'a' => 'Según UTE, lo pide el titular del servicio o un representante autorizado, por Telegestiones (0800 1930 o *1930 desde celular) o en una oficina comercial.'],
            ['q' => '¿Siempre hace falta una firma instaladora?', 'a' => 'No siempre. UTE indica que para potencias mayores a 7,4 kW hay que contratar una firma instaladora autorizada. Te decimos qué corresponde en tu caso antes de pasarte el presupuesto.'],
            ['q' => '¿Me conviene pasar a trifásico?', 'a' => 'Depende de los equipos. Si tenés motores, varios aires o un cargador potente, puede convenir. Si no, muchas veces alcanza con subir la potencia monofásica y ordenar los circuitos.'],
            ['q' => '¿Subir la potencia aumenta la factura?', 'a' => 'El cargo por potencia depende de la potencia contratada, según el pliego tarifario de UTE. Por eso conviene pedir la que necesitás, ni más ni menos.'],
        ],
        'wsp' => 'Hola, quiero consultar por un aumento de potencia con UTE en Montevideo.',
    ],
];

$servicios_nuevos_extra = [
    'urgencias' => [
        'preguntas' => [
            ['h2' => '¿Qué cuenta como urgencia eléctrica?', 'p' => ['Todo lo que puede lastimar a alguien o empezar un fuego: olor a quemado, chispas, humo, un tomacorriente o un cable caliente, marcas negras en tapas o cajas, un cable pelado al alcance de chicos o mascotas. También una llave que salta apenas la subís, porque indica un cortocircuito que sigue ahí.', 'No son urgencia, aunque molesten, una lámpara que no prende, un tomacorriente que dejó de andar sin olor ni calor, o un timbre que no suena. Esos se coordinan como una [reparación eléctrica](reparaciones-electricas-montevideo) común.']],
            ['h2' => '¿Cómo sé si el corte es de UTE o de mi casa?', 'p' => ['Mirá si tus vecinos tienen luz y si el alumbrado de la calle está prendido. Si nadie tiene, es un corte de la red y se reclama a UTE por Telegestiones, al 0800 1930 desde un fijo o al *1930 desde un celular, o por la app y el WhatsApp de UTE. Si solo tu casa está sin energía, o solo una parte, el problema es de tu instalación y ahí sí te conviene un electricista.', 'Un caso intermedio: luces que bajan de intensidad y equipos que no arrancan pueden ser una fase caída en la acometida. Si pasa eso, no sigas usando motores ni heladeras y avisá a UTE.']],
            ['h2' => '¿Qué información sirve al llamar?', 'p' => ['Qué ves y qué olés, desde cuándo, qué equipo estaba prendido, si la llave saltó y si vuelve a subir, y si la falla es en un punto, en un ambiente o en toda la casa. Con eso te decimos si hay que ir ya o si se puede coordinar para otro momento sin riesgo.']],
        ],
        'fuentes' => [$fuente_ute_cortes, $fuente_c06, $fuente_rbt],
    ],
    'puesta-tierra' => [
        'preguntas' => [
            ['h2' => '¿Para qué sirve la puesta a tierra?', 'p' => ['Para que la corriente de una falla tenga un camino seguro. Si la aislación de un lavarropas se daña y la fase toca la carcasa, con tierra esa corriente se va por el conductor de protección y el disyuntor diferencial corta en milésimas de segundo. Sin tierra, la carcasa queda con tensión hasta que alguien la toca.', 'El Capítulo XXIII del Reglamento de Baja Tensión de UTE regula los electrodos de puesta a tierra, como la jabalina, y la resistencia que tiene que alcanzar la instalación. El Capítulo VI trata las protecciones contra contactos indirectos, que es justamente lo que la tierra y el diferencial hacen juntos.']],
            ['h2' => '¿Qué es una jabalina y dónde se pone?', 'p' => ['Es una barra metálica que se clava en el terreno y se conecta al tablero con un cable de tierra. Se ubica en un patio, jardín o cantero cercano al tablero, en un lugar donde se pueda inspeccionar la conexión. En terrenos secos o con relleno puede hacer falta más de una jabalina para llegar al valor que pide el reglamento; eso se sabe midiendo.', 'En apartamentos la tierra suele ser común al edificio y llega por un conductor hasta cada unidad. Ahí el trabajo es verificar que llegue y que esté bien conectada en tu tablero.']],
            ['h2' => '¿Qué equipos necesitan tierra sí o sí?', 'p' => ['Todos los que tienen carcasa metálica o trabajan con agua: termotanque, lavarropas, lavavajillas, heladera, horno, bomba de agua, aire acondicionado y el [cargador del auto eléctrico](cargador-vehiculo-electrico-montevideo). También los tomacorrientes de cocina, baño y lavadero, donde el contacto con agua es más probable.']],
        ],
        'fuentes' => [$fuente_c23, $fuente_c06, $fuente_rbt],
    ],
    'recableado' => [
        'preguntas' => [
            ['h2' => '¿Qué señales indican que hay que recablear?', 'p' => ['Cables forrados en tela o en goma que se endureció y se quiebra, cables que se ven descoloridos o quemados en las cajas, tomacorrientes y llaves que calientan, térmicas que saltan sin un equipo que lo explique y ninguna puesta a tierra. Otra señal es la instalación hecha a pedazos: cada reforma sumó un tramo con otro criterio y ya nadie sabe qué llave corta qué.', 'Una medición de aislación dice cuánto se escapa la corriente por cables envejecidos. Si da mal en varios circuitos, arreglar de a un punto no alcanza.']],
            ['h2' => '¿Conviene recablear todo o por circuitos?', 'p' => ['Si la aislación está mal en toda la casa y el tablero también es viejo, lo más prolijo es un recableado completo con tablero nuevo. Si hay circuitos en buen estado, se renueva por partes: primero cocina, baño y termotanque, que son los que más corriente llevan, y después dormitorios e iluminación.', 'Lo que no conviene es mezclar: un circuito nuevo empalmado a un tramo viejo hereda los problemas del tramo viejo.']],
            ['h2' => '¿Qué cambia el reglamento respecto de una instalación vieja?', 'p' => ['El Reglamento de Baja Tensión de UTE pide circuitos separados según el grado de electrificación de la vivienda (Capítulo VII), disyuntor diferencial de alta sensibilidad (Capítulo VI) y puesta a tierra (Capítulo XXIII). Muchas instalaciones de hace 40 o 50 años no tienen nada de eso: un solo circuito para media casa, fusibles y ningún conductor de protección. Un recableado es la oportunidad de ponerse al día.']],
        ],
        'fuentes' => [$fuente_c07, $fuente_c06, $fuente_c23],
    ],
    'tomacorrientes' => [
        'preguntas' => [
            ['h2' => '¿Cuántos tomacorrientes conviene tener en cada ambiente?', 'p' => ['En la cocina, los suficientes para no enchufar nada con alargue: sobre la mesada, uno para la heladera y los de los equipos fijos. En el living y los dormitorios, al menos uno a cada lado de la cama y varios junto al televisor. El Capítulo VII del Reglamento de Baja Tensión de UTE fija puntos y circuitos mínimos según el grado de electrificación de la vivienda.', 'Las zapatillas encadenadas son el síntoma de que faltan puntos. Además de incómodas, concentran corriente en un solo tomacorriente que no fue pensado para eso.']],
            ['h2' => '¿Qué pasa si enchufo equipos grandes en un tomacorriente común?', 'p' => ['Un horno eléctrico, una estufa o un aire acondicionado consumen mucho durante horas. En un tomacorriente de un circuito compartido, eso recalienta el contacto y los cables, y termina haciendo saltar la térmica o quemando el tomacorriente. Esos equipos van en un circuito dedicado desde el tablero, con su propia protección. Lo hacemos como parte de una [instalación eléctrica](instalaciones-electricas-montevideo).']],
            ['h2' => '¿Qué tomacorriente va en el baño y en el exterior?', 'p' => ['En baño, cocina y lavadero, tomacorrientes con tierra y alejados de las canillas, en un circuito protegido por disyuntor diferencial. En patios, terrazas y jardines, tomacorrientes con tapa y grado de protección contra el agua, en cajas estancas. El Capítulo XXII del reglamento trata las instalaciones al aire libre.']],
        ],
        'fuentes' => [$fuente_c07, $fuente_c22, $fuente_c06],
    ],
    'potencia' => [
        'preguntas' => [
            ['h2' => '¿Cuándo hace falta aumentar la potencia contratada?', 'p' => ['Cuando la suma de lo que usás a la vez supera la potencia que tenés contratada. El síntoma típico es que corta la llave de entrada al prender juntos el termotanque, el horno y un aire, o al arrancar la carga del auto eléctrico. También cuando vas a sumar un equipo grande y la cuenta no da.', 'Antes de pedir más potencia, conviene ver si el consumo se puede repartir mejor en el tiempo: el termotanque con reloj, la carga del auto de madrugada. A veces eso alcanza y evitás pagar más potencia todo el año.']],
            ['h2' => '¿Cómo es el trámite ante UTE?', 'p' => ['Según UTE, el cambio de potencia contratada lo pide el titular del servicio o un representante autorizado, por Telegestiones (0800 1930 desde un fijo o *1930 desde un celular) o en cualquier oficina comercial. UTE indica que para potencias mayores a 7,4 kW es necesario contratar una firma instaladora autorizada, que es la que presenta la gestión junto con un técnico instalador.', 'Los trámites que requieren técnico instalador requieren también firma instaladora, según las condiciones de UTE para técnicos y firmas. Antes de presupuestar te decimos si tu caso lo necesita y cómo se gestiona.']],
            ['h2' => '¿Qué hay que revisar en la instalación antes?', 'p' => ['Que la acometida, el tablero y los cables soporten la nueva potencia. Subir la potencia contratada con un tablero chico o cables finos solo cambia dónde va a fallar la instalación. También se revisa la puesta a tierra y que haya disyuntor diferencial, porque cualquier firma instaladora los va a pedir.', 'Si el aumento es para un cargador de auto eléctrico, el Capítulo XXX del Reglamento de Baja Tensión pone además sus propios requisitos: circuito exclusivo y protecciones específicas. Mirá [cargadores para vehículos eléctricos](cargador-vehiculo-electrico-montevideo).']],
        ],
        'fuentes' => [$fuente_ute_potencia, $fuente_ute_normalizadas, $fuente_normativa],
    ],
];

foreach ($servicios_nuevos as $id => $l) {
    $servicios_landing[$id] = $l + $servicios_nuevos_extra[$id] + ['mod' => '2026-09-29'];
}
