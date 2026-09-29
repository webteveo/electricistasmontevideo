<?php
return [
    'borrador'=>false,
    'slug'=>'cuanto-cuesta-cargar-auto-electrico-en-casa-uruguay',
    'titulo'=>'¿Cuánto cuesta cargar un auto eléctrico en casa en Uruguay?',
    'title'=>'Cuánto cuesta cargar un auto eléctrico en casa en Uruguay',
    'description'=>'Costo de cargar un auto eléctrico en casa con las tarifas de UTE 2026: valle, llano y punta, tiempos de carga y qué pide el reglamento al cargador.',
    'keywords'=>['cargar auto eléctrico en casa','tarifa triple horario UTE','cargador auto eléctrico Montevideo'],
    'categoria'=>'Cargadores para vehículos eléctricos',
    'tema'=>'Carga domiciliaria de vehículos eléctricos',
    'fecha'=>'2026-09-25',
    'actualizado'=>'2026-09-25',
    'autor'=>'Electricistas Montevideo',
    'imagen'=>'public/images/hero/cargador-vehiculo-electrico-montevideo.webp',
    'imagen_alt'=>'Auto eléctrico conectado a un cargador de pared en un garaje',
    'imagen_pie'=>'Imagen ilustrativa de un punto de carga domiciliario.',
    'bajada'=>'Con la tarifa adecuada, cargar en casa cuesta una fracción de lo que se paga en la red pública. Estas son las cuentas con los precios de UTE vigentes y lo que tiene que tener la instalación.',
    'respuesta'=>'Con la tarifa residencial triple horario de UTE, cargar en horario valle (de 00:00 a 07:00) cuesta $2,443 por kWh sin IVA. Un auto que consume 15 kWh cada 100 km gasta unos $37 sin IVA en energía para recorrerlos. Si carga en punta, el mismo trayecto cuesta unos $180.',
    'puntos_clave'=>[
        'Pliego tarifario de UTE vigente desde el 01/01/2026, triple horario: valle $2,443, llano $5,172 y punta $12,034 por kWh, sin IVA.',
        'El horario valle va de 00:00 a 07:00 todos los días; la punta son cuatro horas consecutivas a elección entre las 17:00 y las 23:00, en días hábiles.',
        'La tarifa triple horario exige una potencia contratada de 3,5 kW como mínimo, y la elección de las horas punta se mantiene por al menos doce meses.',
        'El Capítulo XXX del Reglamento de Baja Tensión pide un circuito exclusivo para la carga, con su protección automática y un diferencial de 30 mA como máximo.',
        'No se permiten puntos de carga monofásicos de más de 7,4 kW.',
    ],
    'secciones'=>[
        [
            'h2'=>'¿Cómo se calcula el costo de cargar el auto en casa?',
            'parrafos'=>[
                'El costo se calcula multiplicando los kWh que carga el auto por el precio del kWh de tu tarifa. Los fabricantes indican el consumo en kWh cada 100 km: un auto compacto suele estar entre 13 y 16 kWh, y un SUV grande puede pasar de 20. Para los ejemplos de este artículo usamos 15 kWh cada 100 km, que es un valor de referencia. Conviene mirar el dato de tu modelo.',
                'A la energía que entra en la batería hay que sumarle una pequeña pérdida en la carga, porque parte se disipa como calor en el cargador y en el cableado. Por eso, en la práctica, del medidor sale algo más de lo que muestra la pantalla del auto. Los precios del pliego de UTE no incluyen IVA, y la factura suma además el cargo fijo y el cargo por potencia contratada, que se pagan igual cargues o no el auto.',
            ],
            'tabla'=>['cabecera'=>['Tarifa y horario', 'Precio del kWh (sin IVA)', 'Costo de energía cada 100 km (15 kWh)'], 'filas'=>[
                ['Triple horario, valle (00:00 a 07:00)', '$2,443', '≈ $37'],
                ['Triple horario, llano', '$5,172', '≈ $78'],
                ['Triple horario, punta', '$12,034', '≈ $181'],
                ['Doble horario, fuera de punta', '$4,771', '≈ $72'],
                ['Doble horario, punta', '$12,034', '≈ $181'],
                ['Residencial simple, de 101 a 600 kWh por mes', '$8,452', '≈ $127'],
            ]],
            'nota'=>'Precios del pliego tarifario de UTE vigente desde el 01/01/2026, sin IVA. Cálculo propio con un consumo de referencia de 15 kWh cada 100 km, sin contar pérdidas de carga ni cargos fijos.',
        ],
        [
            'h2'=>'¿Qué tarifa de UTE conviene para cargar el auto?',
            'parrafos'=>[
                'Si vas a cargar el auto en casa, la tarifa residencial triple horario es la que da el precio más bajo, siempre que cargues de noche. En esa tarifa el horario valle va de 00:00 a 07:00 todos los días, la punta son cuatro horas consecutivas que elegís dentro de la franja de 17:00 a 23:00 en días hábiles, y el resto de las horas es llano. Los sábados, domingos y feriados no hay punta: esas horas se cobran a precio de llano.',
                'La triple horario pide una potencia contratada de 3,5 kW como mínimo, y la elección de las horas punta tiene que mantenerse al menos doce meses. La doble horario es más simple, con punta y fuera de punta, pero el kWh más barato cuesta casi el doble que el valle de la triple. La residencial simple no distingue horarios y cobra por escalones de consumo, así que sumar la carga del auto puede empujarte al escalón más caro.',
                'Cambiar de tarifa también cambia lo que pagás por el resto de la casa. Si cocinás, calefaccionás o usás el termotanque en horario punta, esos consumos se encarecen. Antes de cambiar conviene mirar en qué horarios consume tu casa hoy. UTE recomienda las tarifas inteligentes para maximizar el ahorro en la carga domiciliaria.',
            ],
        ],
        [
            'h2'=>'¿Cuánto tarda en cargar un auto eléctrico en casa?',
            'parrafos'=>[
                'El tiempo depende de la potencia del punto de carga y de cuántos kWh le faltan a la batería. Se estima dividiendo la energía a cargar por la potencia. El Capítulo XXX del Reglamento de Baja Tensión de UTE clasifica la carga como lenta hasta 3,7 kW y como estándar entre 3,7 y 7,4 kW en monofásico, que es el máximo permitido para un punto de carga monofásico.',
                'Un ejemplo con una batería de 50 kWh que pasa del 20 % al 80 %, o sea 30 kWh: con un tomacorriente Schuko a unos 2,3 kW tarda cerca de 13 horas, y con un cargador de pared de 7,4 kW, alrededor de 4 horas, más un margen por pérdidas. La ventana de valle dura 7 horas: a 7,4 kW entran unos 50 kWh en esa franja, y a 2,3 kW unos 16 kWh, suficientes para un poco más de 100 km con el consumo de referencia.',
                'Para quien recorre 30 o 40 km por día, cargar con Schuko en valle puede alcanzar. Si hacés más kilómetros o querés recuperar la batería en una sola noche, un cargador de pared con programación horaria es la opción más cómoda.',
            ],
            'lista'=>[
                'Hasta 3,7 kW (lenta): tomacorriente Schuko con circuito propio.',
                'De 3,7 a 7,4 kW (estándar): cargador de pared en monofásico.',
                'De 7,4 a 22 kW (semirrápida): cargador de pared en trifásico.',
                'Más de 22 kW (rápida): uso comercial, en corriente alterna o continua.',
            ],
        ],
        [
            'h2'=>'¿Qué pide el reglamento para instalar el punto de carga?',
            'parrafos'=>[
                'El reglamento pide un circuito exclusivo para el auto, con sus propias protecciones. Según el Capítulo XXX del Reglamento de Baja Tensión de UTE, el circuito de carga no puede alimentar ningún otro equipo, salvo los consumos auxiliares del propio sistema de carga, como su iluminación. Cada punto de conexión se protege con un interruptor automático y un diferencial de 30 mA como máximo, y la caída de tensión hasta el punto de carga no puede superar el 5 %.',
                'El tipo de diferencial depende del modo de carga. Si cargás con un tomacorriente Schuko (modos 1 y 2), tiene que ser al menos tipo A. Si instalás un cargador de pared (modo 3), el reglamento pide un diferencial tipo B, o un tipo A o F combinado con un dispositivo que detecte las fugas de corriente continua. Muchos cargadores ya traen esa detección incorporada, y ese dato define qué protección va en el tablero. URSEA confirma que las instalaciones de carga se rigen por este capítulo.',
                'En edificios, el circuito suele salir del medidor de tu unidad hasta la cochera y atraviesa espacios comunes, así que hace falta coordinar con la administración. Más detalles sobre el trabajo en la página de [cargadores para vehículos eléctricos](cargador-vehiculo-electrico-montevideo).',
            ],
        ],
        [
            'h2'=>'¿Hay que aumentar la potencia contratada?',
            'parrafos'=>[
                'No siempre. Depende de la potencia del cargador y de lo que consume la casa al mismo tiempo. Si cargás de noche, cuando casi todo está apagado, un cargador de 3,7 kW puede convivir con una potencia contratada modesta. Un cargador de 7,4 kW con el termotanque y la estufa prendidos a la vez puede superar lo contratado y hacer saltar el limitador.',
                'Subir la potencia tiene un costo fijo: en el pliego vigente, el cargo por potencia contratada es de $83,2 por kW por mes, sin IVA. Antes de pedir un aumento hay dos alternativas. Una es programar la carga para que empiece cuando baja el consumo de la casa. La otra es un cargador con gestión de carga, que reduce su potencia si detecta que la casa está consumiendo mucho. UTE también sugiere evaluar si la potencia contratada alcanza para evitar sobrecargas simultáneas con otros equipos.',
            ],
        ],
        [
            'h2'=>'¿Qué revisar antes de comprar el cargador?',
            'parrafos'=>[
                'Antes de comprar conviene revisar la instalación, porque condiciona qué cargador tiene sentido. Estos son los puntos que miramos en una visita, en ese orden:',
            ],
            'lista'=>[
                'Potencia contratada y tipo de suministro: monofásico o trifásico.',
                'Estado del tablero: si hay lugar para el circuito nuevo y si ya tiene disyuntor diferencial.',
                'Puesta a tierra: si existe y si está en condiciones.',
                'Distancia del tablero al lugar donde estaciona el auto, que define la sección del cable por la caída de tensión.',
                'Si el cargador trae detección de corriente continua, que define el tipo de diferencial.',
                'Si tiene programación horaria o app, para cargar solo en valle.',
            ],
            'nota'=>'Si el tablero es antiguo o no tiene diferencial, lo habitual es actualizarlo en el mismo trabajo. Ver [tableros eléctricos](tableros-electricos-montevideo).',
        ],
    ],
    'faq'=>[
        ['q'=>'¿Puedo cargar el auto eléctrico en un enchufe común?', 'a'=>'UTE admite la carga domiciliaria con tomacorriente Schuko. El reglamento pide que ese tomacorriente esté en un circuito exclusivo con diferencial al menos tipo A de 30 mA. No conviene usar un enchufe de un circuito compartido.'],
        ['q'=>'¿Cuánto sale cargar el auto en casa por mes?', 'a'=>'Depende de los kilómetros. Con 1.000 km por mes, a 15 kWh cada 100 km, son 150 kWh: unos $366 sin IVA si cargás todo en valle con la tarifa triple horario.'],
        ['q'=>'¿Qué pasa si cargo el auto en horario punta?', 'a'=>'El kWh cuesta casi cinco veces más que en valle. Por eso conviene programar la carga para que empiece a medianoche.'],
        ['q'=>'¿Se puede poner un cargador en la cochera de un edificio?', 'a'=>'En general sí. El circuito sale del medidor de tu unidad hasta la cochera y hay que coordinar el recorrido por espacios comunes con la administración.'],
        ['q'=>'¿Un cargador de 7,4 kW necesita instalación trifásica?', 'a'=>'No. En monofásico se permiten puntos de carga de hasta 7,4 kW. Para potencias mayores hace falta un suministro trifásico.'],
    ],
    'fuentes'=>[
        ['label'=>'UTE – Pliego tarifario vigente desde el 01/01/2026', 'url'=>'https://www.ute.com.uy/sites/default/files/docs/Pliego%20Tarifario%20Enero%202026.pdf', 'nota'=>'Tarifas residenciales simple, doble y triple horario; consultado el 25/09/2026.'],
        ['label'=>'UTE – Reglamento de Baja Tensión, Capítulo XXX: instalaciones para la carga de vehículos eléctricos', 'url'=>'https://portal.ute.com.uy/sites/default/files/docs/C-30.pdf', 'nota'=>'Circuito exclusivo, protección diferencial y potencias por modo de carga; consultado el 25/09/2026.'],
        ['label'=>'UTE – Movilidad eléctrica: carga de vehículos', 'url'=>'https://portal.ute.com.uy/movilidad-sostenible-carga', 'nota'=>'Carga domiciliaria con Schuko o SAVE y recomendación de tarifas inteligentes; consultado el 25/09/2026.'],
        ['label'=>'URSEA – Requisitos para instalaciones eléctricas para carga de vehículos eléctricos', 'url'=>'https://www.gub.uy/unidad-reguladora-servicios-energia-agua/politicas-y-gestion/requisitos-para-instalaciones-electricas-para-carga-vehiculos-electricos', 'nota'=>'Aplicación del Capítulo XXX del RBT; consultado el 25/09/2026.'],
    ],
    'links'=>[
        ['href'=>'cargador-vehiculo-electrico-montevideo','label'=>'Instalación de cargadores para autos eléctricos'],
        ['href'=>'tableros-electricos-montevideo','label'=>'Tableros eléctricos y protecciones'],
        ['href'=>'electricista-ciudad-de-la-costa','label'=>'Electricista en Ciudad de la Costa'],
        ['href'=>'contacto','label'=>'Contacto'],
    ],
    'cta_titulo'=>'¿Querés cargar tu auto en casa?',
    'cta_texto'=>'Contanos si es casa o edificio, la distancia al tablero y el modelo del auto, y te pasamos el presupuesto sin costo.',
    'cta_message'=>'Hola, quiero consultar por la instalación de un cargador para auto eléctrico.',
];
