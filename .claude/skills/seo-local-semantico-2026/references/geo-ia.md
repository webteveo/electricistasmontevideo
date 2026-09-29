# GEO — checklist para ser citado por AI Overviews, AI Mode, ChatGPT, Perplexity, Gemini y Copilot

Etiquetas: [GEO] · [RANKING] · [TRÁMITE]. Evidencia: `investigacion-2026.md` bloque F.

## 1. Lo que hay que saber antes de "optimizar para IA"

- **Primero rankear/indexar en la fuente**: AIO/AI Mode/Gemini leen el índice de Google (Googlebot); ChatGPT/Copilot leen Bing + OAI-SearchBot. C-SEO Bench (NeurIPS 2025) mostró que las técnicas GEO son "largely ineffective" comparadas con estar bien rankeado en el contexto del LLM. Google (guía may/jul-2026): "optimizar para IA sigue siendo SEO".
- **Dónde muerde la IA en local** (Whitespark 2026): transaccionales simples ("cerrajero 24 hs Pocitos") AIO 15 %, pack > 90 %; informacionales ("cuánto cuesta…", "conviene…") AIO 92 %; híbridas 97 %. AI Mode no muestra el pack clásico; nombra 1–3 negocios con tarjetas de GBP/Maps y justifica con reseñas y web.
- **Qué predice ser citado**: menciones de marca en la web (Ahrefs r = 0,664) > backlinks; longitud no importa (r = 0,04); overlap con top 10: AIO ~38 %, Perplexity ~29 %, ChatGPT 6–8 %.
- **CTR**: con AIO el orgánico pierde ~50–60 % en informacionales, pero estar citado recupera (+35 %, Seer).
- **Español rioplatense tiene hueco**: AIO cita Reddit traducido automáticamente en 52–73 % de sus citas de Reddit en mercados no ingleses; contenido local con precios en UYU/ARS y fecha compite contra casi nada.
- **Humo**: llms.txt (Google no lo usa; 97 % de archivos sin una sola petición), "AI schema", ai.txt, herramientas GEO con puntajes, estadísticas o citas inventadas (el paper GEO las permite; los motores 2026 las tratan como manipulación; las spam policies aplican a respuestas de IA desde may-2026).

## 2. Checklist de sitio (una vez por proyecto)

- [ ] [RANKING] Indexado y rankeando para servicio + ciudad (GSC). Sin esto no hay AIO ni AI Mode.
- [ ] [TRÁMITE] Bing Webmaster Tools (importar verificación desde GSC) + sitemap + **IndexNow** en el generador PHP. Cubre Copilot y (probablemente) ChatGPT.
- [ ] [TRÁMITE] Bing Places (importar desde GBP) y Apple Business Connect. 20 minutos, sin expectativa de medir.
- [ ] [GEO] robots.txt: permitir Googlebot, Bingbot, OAI-SearchBot, ChatGPT-User, PerplexityBot, Claude-SearchBot, Claude-User, Applebot, Meta-ExternalAgent, Amazonbot. Google-Extended no afecta AIO (solo entrenamiento de Gemini). Decidir GPTBot/ClaudeBot (recomendado permitir). Bloquear CCBot/Bytespider si molestan. Plantilla en `assets/robots.txt`.
- [ ] [GEO] Si hay Cloudflare: revisar Security → Bot traffic; desde 15 sep 2026 bloquea bots "Training/Agent" por defecto y antepone un robots.txt gestionado. Verificar con `curl https://dominio/robots.txt`.
- [ ] [GEO] **HTML inicial** con NAP, número de WhatsApp como texto + link `wa.me`, precios, zonas, horarios, FAQ. Ningún crawler de IA ejecuta JS (salvo Gemini vía Googlebot).
- [ ] [RANKING] Schema mínimo correcto (`entidades-y-schema.md`): LocalBusiness subtipo con `@id` y `sameAs` en home; `Service` + `BreadcrumbList` por zona. Sin esperar citas por schema (Ahrefs 2026: sin uplift).
- [ ] [GEO] Página "Quién te atiende / Sobre nosotros" con entidad real (nombre, RUT/CUIT, matrícula, años, fotos reales, zonas, fecha de actualización). La IA pregunta "¿quién es esta empresa?".
- [ ] [GEO] GBP completo: categoría primaria, servicios con descripción y precio (mismos nombres que las troncales), atributos, horario real, fotos, Q&A propias, 1 post/mes; pedir reseñas que mencionen servicio + barrio (la IA extrae frases de reseñas).
- [ ] [GEO] Presencia en los listados de terceros que la IA ya cita: correr 10 prompts × 3 motores × 3 corridas ("mejores cerrajeros en Montevideo", "empresa de mudanzas recomendada en Palermo") y anotar dominios; gestionar inclusión (directorios, notas locales, listas). Aparecen además como "Local Lists" en la ficha.
- [ ] [GEO] Página de precios orientativos del sitio (tabla por servicio, fecha de vigencia, qué incluye) y, en nichos de decisión larga (contenedores, steel framing, pérgolas, galpones), guías con precio por m², plazos y normativa municipal.
- [ ] [GEO] GA4: canal personalizado "AI Assistants" (regex abajo) por encima de Referral; exploración cruzada con `click_wsp`. GSC: informe "Generative AI performance" mensual por URL (impresiones desde 18 may 2026; sin clics ni consultas).
- [ ] [GEO][TRÁMITE opcional] llms.txt: prioridad cero.

## 3. Checklist de página (cada servicio × zona y cada troncal)

- [ ] [GEO] **Answer-first**: primer párrafo de 40–70 palabras que responde qué, dónde, cuánto tarda, desde cuánto, cómo contactar, con la marca nombrada ("En Cerrajero.uy llegamos a Pocitos en 20 minutos…").
- [ ] [GEO] H2/H3 como preguntas reales (PAA, autocompletar, WhatsApp de clientes); cada sección autocontenida de 100–300 palabras, sin "como dijimos arriba".
- [ ] [GEO] Tabla de precios/rangos en UYU/ARS con fecha de vigencia; tabla de tiempos de llegada por subzona; lista de qué incluye / no incluye. Datos reales del operador.
- [ ] [GEO] Citas textuales reales con nombre (técnico, cliente); datos con fuente cuando se citan (UTE, IMM, BPS, ARCA, normativa).
- [ ] [GEO] Fecha de publicación y de actualización visibles + `dateModified`; precios revisados cada 3 meses en AR, 6 en UY.
- [ ] [GEO] Entidad nombrada en los pasajes clave para que el chunk citado lleve la marca.
- [ ] [GEO] FAQ visible de 3–8 preguntas con respuestas de 2–4 líneas.
- [ ] [GEO] Un video corto de YouTube por servicio (opcional; YouTube es top-3 fuente citada).
- [ ] [RANKING] Title/H1 con servicio + zona; enlaces servicio ↔ zona ↔ soporte; sin canibalización.
- [ ] No: keyword stuffing, "top 10" con competidores inventados, estadísticas sin fuente, contenido traducido automático, imágenes IA como prueba.

## 4. Medición

**GA4 — canal "AI Assistants"** (Admin → Datos → Canales → Grupos de canales → nuevo canal; condición: *Fuente de la sesión* coincide con regex; subirlo por encima de Referral y Organic Social):

```
(^|\.)(chatgpt\.com|chat\.openai\.com|openai\.com|perplexity\.ai|copilot\.microsoft\.com|copilot\.cloud\.microsoft|edgeservices\.bing\.com|gemini\.google\.com|bard\.google\.com|claude\.ai|chat\.mistral\.ai|meta\.ai|grok\.com|chat\.deepseek\.com|you\.com|duck\.ai|poe\.com|kimi\.com|felo\.ai|genspark\.ai|iask\.ai|phind\.com)$
```

Notas: ChatGPT agrega `?utm_source=chatgpt.com` (llega como source `chatgpt.com`, medium `(not set)`), por eso la regla mira **Fuente**. GA4 tiene canal nativo "AI Assistant" desde 13 may 2026 pero sin Perplexity: mantener el personalizado. Clics desde AIO/AI Mode llegan como `google / organic` y no se distinguen.

**Search Console**: Rendimiento → "Generative AI performance": impresiones en AIO/AI Mode por página, país y dispositivo. Revisar mensual: qué URLs aparecen, cuáles no.

**Protocolo propio (2 h/mes)**: 10 prompts por vertical y ciudad (mitad transaccionales, mitad informacionales), 3 corridas en Google (¿AIO? ¿pack?), Modo IA, ChatGPT con búsqueda, Perplexity, Copilot; anotar negocios nombrados y dominios citados; consolidar en planilla; mirar tendencias, no una foto (las respuestas varían entre corridas).

## 5. Crawlers (resumen)

| User-agent | Alimenta | robots.txt | Decisión |
|---|---|---|---|
| Googlebot | Search, AIO, AI Mode, Gemini grounding | sí | permitir |
| Google-Extended | solo entrenamiento Gemini/Vertex; **no** afecta AIO | sí | indiferente |
| Bingbot | Bing, Copilot, (ChatGPT) | sí | permitir |
| OAI-SearchBot | citas en ChatGPT search | sí | permitir |
| ChatGPT-User | fetch a pedido del usuario | puede ignorar | permitir |
| GPTBot | entrenamiento OpenAI | sí | decisión de negocio (recomendado permitir) |
| PerplexityBot / Perplexity-User | Perplexity | sí / ignora | permitir |
| ClaudeBot / Claude-SearchBot / Claude-User | entrenamiento / búsqueda / fetch | sí | permitir búsqueda y fetch; entrenamiento a elección |
| Applebot / Applebot-Extended | Siri, Spotlight / entrenamiento | sí | permitir |
| Meta-ExternalAgent | Meta AI (WhatsApp) | sí | permitir |
| CCBot, Bytespider | datasets / ByteDance | sí / no | bloquear si consumen recursos |
