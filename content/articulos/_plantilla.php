<?php
/*
UN ARTÍCULO = UN ARCHIVO. Copiar como YYYY-MM-DD-slug.php en esta carpeta.
No editar vistas, sitemap ni feed para publicar. Los _archivos nunca se leen.
borrador=true oculta en TODAS las salidas. Fecha futura programa a medianoche
America/Montevideo. actualizado debe ser una fecha válida >= fecha y <= hoy
(para programados, usar actualizado=fecha). No usar slug "feed".

REGLAS EDITORIALES (ver también plan_articulos.md y AGENTS.md):
- Español uruguayo, voseo, tono práctico. Empresa: Electricistas Montevideo.
- No inventar precios, garantías, plazos, materiales o certificaciones.
- No publicar precios ni promesas de servicios sin validación actual.
- Título: pregunta o promesa concreta con keyword; meta title 55–60 caracteres;
  description 140–155. 1200–2000 palabras; mínimo 4 H2.
- respuesta: 2–3 oraciones que contesten directamente el título.
- puntos_clave: 3–5 datos concretos, no adjetivos sin respaldo.
- Cada H2 comienza con una oración que responde su subtítulo.
- Comparaciones con tabla/lista, 4–6 FAQ, 2–4 fuentes reales abiertas y verificadas,
  3–6 enlaces internos existentes. Guardar fecha de consulta en nota de fuente.
- Texto sin HTML. Enlaces: [texto](servicios) o [fuente](https://...).
  La vista convierte rutas internas en una ruta del dominio configurado.
- Imagen local existente, alt descriptivo y pie veraz; no inventar una obra.
- Al retocar contenido, cambiar actualizado. Marcar el tema en plan_articulos.md.
- Verificar con scripts/verificar_articulos.php y navegador antes de entregar.
- Cada día se sube SOLO el nuevo archivo. El plan se actualiza localmente.
*/
return [
    'borrador'=>true,
    'slug'=>'pregunta-con-keyword',
    'titulo'=>'¿Qué necesitás saber sobre tu trabajo eléctrico?',
    'title'=>'Completar meta título de 55 a 60 caracteres con la keyword',
    'description'=>'Completar una descripción única de 140 a 155 caracteres que anticipe la respuesta y ayude a decidir si este artículo resuelve la consulta del lector.',
    'keywords'=>['keyword principal','keyword secundaria'],
    'categoria'=>'Instalaciones eléctricas',
    'tema'=>'Entidad principal del artículo',
    'fecha'=>'2026-09-10',
    'actualizado'=>'2026-09-10',
    'autor'=>'Electricistas Montevideo',
    'imagen'=>'', // Ruta desde raíz: public/images/imagen-del-trabajo.webp
    'imagen_alt'=>'', 'imagen_pie'=>'',
    'bajada'=>'Una o dos oraciones que presenten la decisión del lector.',
    'respuesta'=>'Respuesta directa en dos o tres oraciones con el dato principal.',
    'puntos_clave'=>['Dato verificado 1','Dato verificado 2','Dato verificado 3'],
    'secciones'=>[
        [
            'h2'=>'¿Qué pregunta responde esta sección?',
            'parrafos'=>['Respuesta directa seguida de explicación.'],
            // Opcional: fotos existentes, sin recorte, con alt y pie. Requiere ar_blocks actualizado.
            'fotos'=>[['src'=>'uploads/nombre-existente.webp','alt'=>'Descripción de lo visible','pie'=>'Modelo y alcance de la imagen.']],
            'lista'=>['Elemento de lista'],
            'lista_ordenada'=>false, // true cambia ul por ol; los elementos van en lista
            'tabla'=>['cabecera'=>['Criterio','Alternativa'], 'filas'=>[['Dato','Dato']]],
            'nota'=>'Contexto o advertencia concreta, si corresponde.',
            'h3s'=>[['h3'=>'Detalle de la sección','parrafos'=>['Explicación.'],'lista'=>[]]]
        ]
        // Agregar al menos otras tres secciones H2.
    ],
    'faq'=>[['q'=>'Pregunta real del cliente','a'=>'Respuesta en texto plano.']],
    'fuentes'=>[['label'=>'Nombre de la fuente','url'=>'https://www.impo.com.uy/','nota'=>'Reemplazar por la página específica que respalda la afirmación; consultada DD/MM/AAAA.']],
    'links'=>[['href'=>'servicios','label'=>'Servicios'],['href'=>'proyectos','label'=>'Proyectos'],['href'=>'contacto','label'=>'Contacto']],
    'cta_titulo'=>'Consultá por tu proyecto',
    'cta_texto'=>'Contanos ubicación y necesidades para evaluar el alcance.',
    'cta_message'=>'Hola, quiero consultar por mi proyecto.' // La vista añade el título del artículo.
];
