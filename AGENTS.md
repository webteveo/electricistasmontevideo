# Electricistas Montevideo

Stack PHP propio/XAMPP; sin cambio de framework ni nueva base de datos.
Dominio: https://electricistasmontevideo.com/. Local: http://localhost/electricistasmontevideo/.
Datos de identidad y contacto centralizados en config/variables.php. Teléfono +598 97 406 456.

La home apunta a «electricistas en Montevideo». Estrategia en plan_seo_semantico_local.md y AUDITORIA-SEO.md (29/09/2026). 12 servicios pilar (src/datos/servicios.php, servicios_preguntas.php y servicios_nuevos.php). Zonas: src/datos/zonas.php (72 zonas con región, vivienda, época, costa y vecinos). Una zona tiene URL /zonas/{slug} y servicio × barrio /{servicio}/{slug} SOLO si content/zonas/{slug}.php trae su texto propio; las 5 zonas históricas conservan /electricista-{zona}. Regiones en content/regiones/, hubs en content/paginas/. $publicar_regiones permite subir por tandas. No generar texto por plantilla: cada página nueva con texto escrito para ese barrio, similitud ≤ 30 % (scripts/qa-seo.py). No inventar precios, horarios, disponibilidad 24 horas, años de experiencia, cantidad de clientes, reseñas o testimonios, matrícula, habilitación UTE ni garantías. No dar instrucciones para manipular el tablero.

Para artículos, leer plan_articulos.md y content/articulos/_plantilla.php. Un array PHP por artículo, sin editar vistas ni índices. America/Montevideo; excluir borradores, archivos con _ y fechas futuras. Investigar fuentes actuales. Ejecutar C:/xampp/php/php.exe scripts/verificar_articulos.php y revisar navegador desktop/móvil.

Ejecutar scripts/verificar_sitio.php para HTTP, SEO y enlaces, y python3 scripts/qa-seo.py para títulos, H1, schema y similitud. La carpeta _archivo_base es una copia recuperable y protegida del sitio anterior: nunca publicar ni reutilizar sus datos. No usar credenciales o cuentas de terceros. No editar ese archivo histórico durante el trabajo habitual.

Deploy manual, sin .git. No crear commits, publicar ni crear automatizaciones sin pedido. Entregar paquete o lista exacta de archivos para subir. Ante fallo de conexión online, declarar la limitación y continuar localmente.
