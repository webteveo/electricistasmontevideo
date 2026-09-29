# Electricistas Montevideo

Stack PHP propio/XAMPP; sin cambio de framework ni nueva base de datos.
Dominio: https://electricistasmontevideo.com/. Local: http://localhost/electricistasmontevideo/.
Datos de identidad y contacto centralizados en config/variables.php. Teléfono +598 97 406 456.

La home apunta a «electricistas en Montevideo». Estrategia SEO en plan_seo_semantico_local.md. 7 landings de servicio (src/datos/servicios.php + servicios_preguntas.php) y solo las zonas de $zonas_activas (src/datos/barrios.php) tienen URL; las URLs antiguas barrio × servicio redirigen 301. No volver a generar la matriz: sumar zonas en tandas de 5 a 10 y solo con datos reales del operador (brief del plan). No inventar precios, horarios, disponibilidad 24 horas, años de experiencia, cantidad de clientes, reseñas o testimonios, matrícula, habilitación UTE ni garantías.

Para artículos, leer plan_articulos.md y content/articulos/_plantilla.php. Un array PHP por artículo, sin editar vistas ni índices. America/Montevideo; excluir borradores, archivos con _ y fechas futuras. Investigar fuentes actuales. Ejecutar C:/xampp/php/php.exe scripts/verificar_articulos.php y revisar navegador desktop/móvil.

Ejecutar scripts/verificar_sitio.php para HTTP, SEO y enlaces. La carpeta _archivo_base es una copia recuperable y protegida del sitio anterior: nunca publicar ni reutilizar sus datos. No usar credenciales o cuentas de terceros. No editar ese archivo histórico durante el trabajo habitual.

Deploy manual, sin .git. No crear commits, publicar ni crear automatizaciones sin pedido. Entregar paquete o lista exacta de archivos para subir. Ante fallo de conexión online, declarar la limitación y continuar localmente.
