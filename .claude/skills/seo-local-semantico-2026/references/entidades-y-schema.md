# Entidades y schema — cómo hacer que Google (y la IA) entiendan "quién, qué, dónde"

Etiquetas: [RANKING] · [CONVERSIÓN] · [TRÁMITE] · [GEO]. Evidencia: `investigacion-2026.md` bloques C y H.

## 1. Qué es verdad sobre el schema en 2026

- Google reconoce para rich results en LocalBusiness: `name` + `address` (requeridas), `geo`, `openingHoursSpecification`, `priceRange`, `telephone`, `url`, `aggregateRating`/`review` **solo de terceros**. Todo lo demás (`Service`, `areaServed`, `knowsAbout`, `hasOfferCatalog`, `potentialAction`, `@id`) es semántico: no genera nada visual y Google dijo que no hace falta schema especial para AI Overviews/AI Mode. Ahrefs (may-2026, 1.885 páginas) no midió uplift de citas por agregar JSON-LD.
- Entonces: schema **mínimo, correcto y validado** [TRÁMITE]. Sirve para coherencia NAP, para el knowledge panel, para breadcrumbs, y para que los LLM lean sin ambigüedad. No prometerlo como factor de ranking.
- Regla de oro: **lo marcado debe estar visible en la página**. Si `areaServed` dice 40 barrios y la página no los menciona, es inconsistencia.
- **Prohibido**: `aggregateRating`/`review` sobre tu propio negocio (self-serving → inelegible y candidato a acción manual); marcar reseñas copiadas de Google; `ProfessionalService` (deprecado); direcciones inventadas; un LocalBusiness completo con dirección distinta en cada página de zona.

## 2. Entidad clara: nombre + servicio + zona

Checklist de entidad [RANKING][GEO]:
1. **Nombre exacto** (mismo string) en web, GBP, schema, redes y directorios. Nada de "Cerrajería X – 24 hs Montevideo" en un lado y "X Cerrajeros" en otro.
2. **Teléfono y WhatsApp idénticos** en todos lados, formato E.164 en schema (`+59899123456`), formato local en pantalla (`099 123 456`).
3. **Dirección real** (la del GBP; oculta en la ficha si es SAB, presente en schema). Si no hay dirección pública, al menos `addressLocality`, `addressRegion`, `addressCountry`.
4. **`@id` estable**: `{url}/#negocio` para el LocalBusiness, `{url}/#website`; cada página zona referencia `provider: {"@id": "{url}/#negocio"}`.
5. **`sameAs`** una sola vez (home/Sobre nosotros): Instagram, Facebook, LinkedIn, fichas en directorios (Cybo, Yelu, Páginas Amarillas, Habitissimo). No inventar Wikidata.
6. **Página "Sobre nosotros / Quién te atiende"** con entidad real: nombre, RUT/CUIT si aplica, matrícula, años, zonas, fotos reales, fecha de última actualización. Es el "Entity Home".
7. **Menciones en terceros** (predictor #1 de citas en IA): 8–10 citaciones base + proveedores + notas locales + listas "mejores X". No más de eso en citaciones; el resto a enlaces y reseñas.
8. **GBP espejo del sitio**: categoría primaria correcta, misma lista de servicios con los mismos nombres que las troncales, atributos (24 hs, a domicilio, presupuesto sin cargo), horario real.
9. **Wikidata**: no, salvo ≥ 2 notas en medios con control editorial (El País, El Observador, La Nación, Clarín). Los ítems de pymes sin referencias se borran en días.

## 3. Tabla nicho → `@type` (schema.org 30.1, sep-2026)

| Nicho | `@type` | Notas |
|---|---|---|
| Cerrajería | `Locksmith` | — |
| Mudanzas / fletes | `MovingCompany` | — |
| Electricista | `Electrician` | — |
| Yeso / durlock | `GeneralContractor` | `serviceType: "construcción en seco"` |
| Aire acondicionado | `HVACBusiness` | — |
| Impermeabilización | `RoofingContractor` (techos) o `GeneralContractor` | `serviceType: "impermeabilización"` |
| Pérgolas / decks | `GeneralContractor` | no existe Carpenter |
| Casas modulares / contenedores | `GeneralContractor` | si vende unidades, `makesOffer` → `Offer` → `Product` |
| Auxilio mecánico / grúa | `AutoRepair` | no existen TowingService ni RoadsideAssistance; `serviceType: "auxilio mecánico y remolque"` |
| Limpieza | `LocalBusiness` | no existe CleaningService; usar `serviceType` |
| Baños químicos | `LocalBusiness` | `makesOffer` → `Offer` → `Service "alquiler de baños químicos"` |
| Steel framing / galpones | `GeneralContractor` | `serviceType` |
| Plomería | `Plumber` | — |
| Pintura | `HousePainter` | — |

Cuando dudes: `"@type": ["GeneralContractor", "LocalBusiness"]` (array, no `additionalType`).

## 4. Plantillas JSON-LD listas para PHP

Variables: `{nombre}`, `{url}` (sin barra final), `{telefono}` (E.164), `{telefono_sin_mas}`, `{tipo}` (tabla), `{servicio}`, `{servicio_slug}`, `{zona}`, `{zona_slug}`, `{departamento}`, `{departamento_slug}`, `{calle_y_numero}`, `{ciudad}`, `{cp}`, `{pais}` (UY/AR), `{moneda}` (UYU/ARS), `{lat}`, `{lng}`, `{precio_desde}`, `{tiempo_min}`, `{tiempo_max}`, `{idioma}` (es-UY / es-AR).

Helper PHP sugerido:

```php
<?php
function jsonld(string $tpl, array $vars): string {
  $out = strtr($tpl, array_combine(
    array_map(fn($k) => '{'.$k.'}', array_keys($vars)),
    array_map(fn($v) => is_string($v) ? htmlspecialchars($v, ENT_NOQUOTES) : $v, array_values($vars))
  ));
  return '<script type="application/ld+json">'.$out.'</script>';
}
// uso: echo jsonld(file_get_contents('schema/zona.json'), $vars);
```

### A. Home — LocalBusiness + WebSite

```json
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": ["{tipo}", "LocalBusiness"],
      "@id": "{url}/#negocio",
      "name": "{nombre}",
      "url": "{url}/",
      "telephone": "{telefono}",
      "image": ["{url}/img/equipo-real.webp", "{url}/img/movil-rotulado.webp"],
      "logo": "{url}/img/logo.png",
      "description": "{nombre}: {servicio} en {departamento}. Presupuesto por WhatsApp, atención en el día.",
      "priceRange": "$$",
      "currenciesAccepted": "{moneda}",
      "paymentAccepted": "Efectivo, transferencia, tarjeta",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "{calle_y_numero}",
        "addressLocality": "{ciudad}",
        "addressRegion": "{departamento}",
        "postalCode": "{cp}",
        "addressCountry": "{pais}"
      },
      "geo": { "@type": "GeoCoordinates", "latitude": {lat}, "longitude": {lng} },
      "areaServed": [
        { "@type": "AdministrativeArea", "name": "{departamento}" },
        { "@type": "City", "name": "{zona_1}" },
        { "@type": "City", "name": "{zona_2}" },
        { "@type": "GeoCircle",
          "geoMidpoint": { "@type": "GeoCoordinates", "latitude": {lat}, "longitude": {lng} },
          "geoRadius": "30000" }
      ],
      "openingHoursSpecification": [{
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],
        "opens": "00:00", "closes": "23:59"
      }],
      "contactPoint": [{
        "@type": "ContactPoint",
        "contactType": "customer service",
        "telephone": "{telefono}",
        "url": "https://wa.me/{telefono_sin_mas}",
        "availableLanguage": "es",
        "areaServed": "{pais}"
      }],
      "sameAs": ["https://www.instagram.com/{cuenta}", "https://www.facebook.com/{cuenta}"],
      "knowsAbout": ["{servicio}", "{servicio_2}", "{servicio_3}"],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Servicios",
        "itemListElement": [
          { "@type": "Offer", "itemOffered": { "@type": "Service", "@id": "{url}/{servicio_slug}/#servicio", "name": "{servicio}" } },
          { "@type": "Offer", "itemOffered": { "@type": "Service", "@id": "{url}/{servicio_2_slug}/#servicio", "name": "{servicio_2}" } }
        ]
      }
    },
    {
      "@type": "WebSite",
      "@id": "{url}/#website",
      "url": "{url}/",
      "name": "{nombre}",
      "publisher": { "@id": "{url}/#negocio" },
      "inLanguage": "{idioma}"
    }
  ]
}
```

Horario 24 h solo si es real. Sin `aggregateRating`. Para EMD mono-servicio, `hasOfferCatalog` lista los subservicios (apertura, cambio de cerradura, duplicado…).

### B. Página servicio × zona — Service + provider + BreadcrumbList + WebPage

```json
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Service",
      "@id": "{url}/{servicio_slug}/{zona_slug}/#servicio",
      "name": "{servicio} en {zona}",
      "serviceType": "{servicio}",
      "description": "{servicio} en {zona}, {departamento}. Llegamos en {tiempo_min}–{tiempo_max} minutos. Presupuesto sin cargo por WhatsApp.",
      "provider": { "@id": "{url}/#negocio" },
      "areaServed": {
        "@type": "City",
        "name": "{zona}",
        "containedInPlace": { "@type": "AdministrativeArea", "name": "{departamento}" }
      },
      "availableChannel": {
        "@type": "ServiceChannel",
        "serviceUrl": "https://wa.me/{telefono_sin_mas}?text=Hola,%20necesito%20{servicio_urlencoded}%20en%20{zona_urlencoded}",
        "servicePhone": { "@type": "ContactPoint", "telephone": "{telefono}", "contactType": "customer service" },
        "availableLanguage": "es"
      },
      "offers": {
        "@type": "Offer",
        "priceCurrency": "{moneda}",
        "price": "{precio_desde}",
        "priceSpecification": { "@type": "PriceSpecification", "minPrice": "{precio_desde}", "priceCurrency": "{moneda}" },
        "availability": "https://schema.org/InStock",
        "areaServed": { "@type": "City", "name": "{zona}" }
      },
      "image": "{url}/img/{servicio_slug}-{zona_slug}-real.webp",
      "potentialAction": {
        "@type": "CommunicateAction",
        "name": "Escribir por WhatsApp",
        "target": {
          "@type": "EntryPoint",
          "urlTemplate": "https://wa.me/{telefono_sin_mas}?text=Hola,%20necesito%20{servicio_urlencoded}%20en%20{zona_urlencoded}",
          "actionPlatform": ["https://schema.org/MobileWebPlatform", "https://schema.org/DesktopWebPlatform"]
        }
      }
    },
    {
      "@type": "BreadcrumbList",
      "@id": "{url}/{servicio_slug}/{zona_slug}/#breadcrumb",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "Inicio", "item": "{url}/" },
        { "@type": "ListItem", "position": 2, "name": "{servicio}", "item": "{url}/{servicio_slug}/" },
        { "@type": "ListItem", "position": 3, "name": "{departamento}", "item": "{url}/{servicio_slug}/{departamento_slug}/" },
        { "@type": "ListItem", "position": 4, "name": "{zona}" }
      ]
    },
    {
      "@type": "WebPage",
      "@id": "{url}/{servicio_slug}/{zona_slug}/",
      "url": "{url}/{servicio_slug}/{zona_slug}/",
      "name": "{servicio} en {zona} – {nombre}",
      "isPartOf": { "@id": "{url}/#website" },
      "about": { "@id": "{url}/{servicio_slug}/{zona_slug}/#servicio" },
      "breadcrumb": { "@id": "{url}/{servicio_slug}/{zona_slug}/#breadcrumb" },
      "dateModified": "{fecha_iso}",
      "inLanguage": "{idioma}"
    }
  ]
}
```

**Variante EMD mono-servicio** (`cerrajero.uy/pocitos/`): las URLs quedan `{url}/{zona_slug}/`, el `@id` del servicio `{url}/{zona_slug}/#servicio`, y el breadcrumb tiene 3 ítems: Inicio (`{url}/`) › {Departamento} (`{url}/{departamento_slug}/`) › {Zona}. `provider` sigue apuntando a `{url}/#negocio` (el `Locksmith` de la home). Si el precio no es fijo, eliminar `offers` (no poner 0). `dateModified` real.

### C. FAQPage (opcional; solo si las preguntas difieren por página)

```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "@id": "{url}/{servicio_slug}/{zona_slug}/#faq",
  "mainEntity": [
    { "@type": "Question", "name": "¿Cuánto tarda en llegar un {profesional} a {zona}?",
      "acceptedAnswer": { "@type": "Answer", "text": "Entre {tiempo_min} y {tiempo_max} minutos según la hora. Escribinos por WhatsApp y te confirmamos el tiempo real." } },
    { "@type": "Question", "name": "¿Cuánto cuesta {servicio} en {zona}?",
      "acceptedAnswer": { "@type": "Answer", "text": "Desde ${precio_desde} {moneda}, vigente a {mes_año}. El presupuesto es sin cargo y lo pasamos por WhatsApp." } },
    { "@type": "Question", "name": "¿Atienden de noche o fines de semana en {zona}?",
      "acceptedAnswer": { "@type": "Answer", "text": "{respuesta_real_del_negocio}" } }
  ]
}
```

Sin rich result desde 7 may 2026. Google: "mark up only one instance of repetitive FAQ content across your site". Si tus FAQ son iguales en 300 zonas, no las marques en todas.

## 5. Vocabulario de entidades del oficio (proceso gratis)

1. 10 queries semilla por plantilla: "[oficio] [ciudad]", "[oficio] 24 horas", "[subservicio] precio", "[problema] qué hacer", "[oficio] cerca". Buscar con `gl=uy`/`gl=ar`, `hl=es-419`.
2. Top 10 por query → extraer texto (trafilatura) → n-grams 1–3 por **document frequency** (aparece en ≥ 5 de 10 documentos = vocabulario obligatorio).
3. Entidades con TextRazor (gratis 500/día) o spaCy `es_core_news_md`: marcas (Yale, Cisa, Mul-T-Lock, Kwikset; Surrey, BGH, Carrier; Sika, Weber; Durlock, Knauf), productos, métodos, normas (UTE, edesur, IMM, BPS, ARCA).
4. People Also Ask (3 niveles), búsquedas relacionadas, autocompletar a–z y con "cuánto / cómo / dónde / vs / precio", "Cosas que debés saber" → H2 de soporte y FAQ de las páginas core.
5. Servicios y categorías de las 10 fichas GBP top del pack → atributos que Google ya asocia al oficio.
6. 200–500 reseñas de fichas top → lenguaje real del cliente ("vino en 20 minutos", "sin romper la puerta").
7. Matriz EAV (entidad / atributo / valor en nuestro negocio / aparece en top 10 / pregunta / página que lo procesa).
8. Brief por página: macro-contexto, ≥ 5 entidades obligatorias, 3–6 H2 en pregunta, respuesta directa de 40–70 palabras por H2, puentes contextuales.
9. Control post-publicación: pasar el texto propio por TextRazor y comprobar que las entidades principales coinciden con el corpus competidor y que la zona aparece como LOCATION.

Nota: Google NLP API v2 ya no devuelve `salience`; usar entidades como diagnóstico, no como objetivo numérico.
