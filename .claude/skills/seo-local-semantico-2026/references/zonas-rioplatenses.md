# Zonas rioplatenses — índice para arquitectura y enlazado

Datos geográficos para alimentar la plantilla de páginas por zona: jerarquía (madre → hija), barrios vecinos para el enlazado lateral, y referencias reales que un negocio local mencionaría. Verificar siempre con el operador del servicio los tiempos de llegada y las referencias que usa de verdad. **Se usan sin confirmar**: `slug`, `zona madre`, `vecinos` y el tipo de vivienda genérico. **Requieren confirmación del operador o quedan como `{variable}`**: referencias concretas, rutas, tiempos de llegada. Las referencias de la tabla son disparadores para preguntarle al operador, no datos para publicar.

Formato de cada fila: `slug | nombre | zona madre | vecinos (para enlaces laterales) | referencias reales`

## Montevideo — barrios (zona madre: `montevideo`)

Agrupados por corredor para que el enlazado lateral siga geografía real (3–4 vecinos por página, nunca lista completa).

### Costa este
| slug | nombre | vecinos | referencias |
|---|---|---|---|
| pocitos | Pocitos | punta-carretas, buceo, parque-batlle, cordon | Rambla, Av. Brasil, 26 de Marzo, Plaza Gomensoro, edificios de altura frente a la rambla |
| punta-carretas | Punta Carretas | pocitos, parque-rodo, cordon | Shopping Punta Carretas, Faro, Club de Golf, Ellauri |
| buceo | Buceo | pocitos, malvin, la-blanqueada, parque-batlle | Montevideo Shopping, WTC, Puerto del Buceo, Av. Rivera |
| malvin | Malvín | buceo, punta-gorda, malvin-norte, union | Av. Italia, Orinoco, Playa Malvín, Hipódromo |
| punta-gorda | Punta Gorda | malvin, carrasco, malvin-norte | Plaza Virgilio, Av. Gral. Paz, casas con jardín |
| carrasco | Carrasco | punta-gorda, carrasco-norte, ciudad-de-la-costa | Arocena, Hotel Carrasco, Portones Shopping, Aeropuerto (a 10 min) |
| carrasco-norte | Carrasco Norte | carrasco, punta-gorda, bañados-de-carrasco | Av. Bolivia, Camino Carrasco, Plaza Guiseppe |
| malvin-norte | Malvín Norte | malvin, buceo, union, punta-gorda | Euskal Erría, Camino Carrasco, Bvar. Batlle y Ordóñez |

### Centro y sur
| slug | nombre | vecinos | referencias |
|---|---|---|---|
| centro | Centro | ciudad-vieja, cordon, barrio-sur, aguada | 18 de Julio, Plaza Independencia, Plaza Cagancha, oficinas y apartamentos antiguos |
| ciudad-vieja | Ciudad Vieja | centro, barrio-sur, aguada | Puerto, Mercado del Puerto, Peatonal Sarandí, edificios patrimoniales |
| cordon | Cordón | centro, parque-rodo, tres-cruces, pocitos | Tres Cruces, Facultad de Derecho, Av. 18 de Julio, Constituyente |
| parque-rodo | Parque Rodó | cordon, punta-carretas, barrio-sur, palermo | Parque Rodó, Facultad de Arquitectura, Rambla, Bvar. Artigas |
| barrio-sur | Barrio Sur | ciudad-vieja, palermo, centro | Rambla Sur, Cementerio Central, Durazno |
| palermo | Palermo | barrio-sur, parque-rodo, cordon | Rambla, Gonzalo Ramírez, Isla de Flores |
| tres-cruces | Tres Cruces | cordon, la-blanqueada, parque-batlle, aguada | Terminal Tres Cruces, Bvar. Artigas, Hospital Pereira Rossell |
| parque-batlle | Parque Batlle | tres-cruces, pocitos, buceo, la-blanqueada | Estadio Centenario, Av. Italia, Ricaldoni, Hospital de Clínicas |
| la-blanqueada | La Blanqueada | parque-batlle, buceo, union, tres-cruces | Av. 8 de Octubre, Larrañaga, Hospital Militar |
| union | Unión | la-blanqueada, malvin-norte, maronas, cerrito | 8 de Octubre, Plaza de la Restauración, comercios de 8 de Octubre |

### Norte y oeste
| slug | nombre | vecinos | referencias |
|---|---|---|---|
| aguada | Aguada | centro, reducto, bella-vista, tres-cruces | Palacio Legislativo, Av. Gral. Flores, Torre de Antel, Estación Central |
| reducto | Reducto | aguada, brazo-oriental, jacinto-vera | Av. San Martín, Gral. Flores |
| bella-vista | Bella Vista | aguada, prado, capurro | Parque Capurro, Av. Agraciada |
| prado | Prado | bella-vista, sayago, paso-molino, atahualpa | Parque del Prado, Rosedal, Rural del Prado, casas quinta |
| paso-molino | Paso Molino | prado, belvedere, capurro | Av. Agraciada, Puente del Paso Molino, comercios |
| belvedere | Belvedere | paso-molino, nuevo-paris, cerro | Av. Carlos María Ramírez, Cementerio del Cerro |
| cerro | Cerro | belvedere, casabo, la-paloma | Fortaleza del Cerro, Rambla del Cerro, Playa del Cerro |
| sayago | Sayago | prado, colon, peñarol, paso-de-las-duranas | Estación Sayago, Av. Millán, Camino Ariel |
| colon | Colón | sayago, lezica, peñarol, abayuba | Av. Garzón, Plaza Vidiella, Camino Colman |
| peñarol | Peñarol | colon, sayago, lavalleja | Barrio Peñarol histórico, Estación Peñarol, Av. Sayago |
| brazo-oriental | Brazo Oriental | reducto, jacinto-vera, cerrito | Bvar. Artigas norte, Gral. Flores |
| jacinto-vera | Jacinto Vera | brazo-oriental, reducto, la-figurita | Bvar. Batlle y Ordóñez, Gral. Flores |
| cerrito | Cerrito de la Victoria | brazo-oriental, union, maronas | Santuario del Cerrito, Av. Gral. Flores, Bvar. Aparicio Saravia |
| maronas | Maroñas | cerrito, union, flor-de-maronas, ituzaingo | Hipódromo de Maroñas, Camino Maldonado, 8 de Octubre |
| ituzaingo | Ituzaingó | maronas, villa-espanola, jardines-del-hipodromo | Camino Maldonado, Cno. Corrales |
| villa-espanola | Villa Española | ituzaingo, union, cerrito | Av. José Pedro Varela, Cno. Corrales |
| lezica | Lezica / Melilla | colon, la-paz | Camino Melilla, Ruta 5, zona semirrural (galpones, quintas) |
| paso-de-la-arena | Paso de la Arena | belvedere, nuevo-paris, santiago-vazquez | Ruta 1, Camino Tomkinson, Cno. Cibils |
| nuevo-paris | Nuevo París | belvedere, paso-de-la-arena, cerro | Camino Cibils, Av. Carlos María Ramírez |

## Área metropolitana — Canelones (zona madre: `canelones`; sub-hub: `ciudad-de-la-costa`)

| slug | nombre | vecinos | referencias |
|---|---|---|---|
| ciudad-de-la-costa | Ciudad de la Costa (hub) | carrasco, solymar, lagomar, el-pinar, shangrila | Av. Giannattasio, Ruta Interbalnearia, Costa Urbana Shopping |
| shangrila | Shangrilá | ciudad-de-la-costa, lagomar, carrasco, paso-carrasco | Av. Giannattasio km 18, Rambla Costanera |
| lagomar | Lagomar | shangrila, solymar, ciudad-de-la-costa | Costa Urbana, Av. Giannattasio, Rambla |
| solymar | Solymar | lagomar, el-pinar, ciudad-de-la-costa | Av. Giannattasio, Solymar Norte, calles de arena |
| el-pinar | El Pinar | solymar, pinamar, neptunia, ciudad-de-la-costa | Pinar Norte, Av. Pérez Butler, Ruta Interbalnearia |
| paso-carrasco | Paso Carrasco | shangrila, carrasco-norte, colonia-nicolich | Ruta 101, Zonamerica (a 10 min), Aeropuerto |
| colonia-nicolich | Colonia Nicolich | paso-carrasco, barros-blancos, aeropuerto | Ruta 101, Aeropuerto de Carrasco, Zonamerica |
| barros-blancos | Barros Blancos | colonia-nicolich, pando, toledo | Ruta 8, Villa Aeroparque |
| pando | Pando | barros-blancos, toledo, empalme-olmos | Ruta 8, Ruta 75, zona industrial, Plaza de Pando |
| toledo | Toledo | pando, barros-blancos, suarez | Ruta 6, Ruta 33 |
| las-piedras | Las Piedras | la-paz, progreso, colon | Ruta 5, Av. Artigas, Plaza de Las Piedras, Estadio Parque Artigas |
| la-paz | La Paz | las-piedras, lezica, progreso | Ruta 5, Av. César Mayo Gutiérrez |
| progreso | Progreso | las-piedras, la-paz, canelones-ciudad | Ruta 5, Ruta 32 |
| canelones-ciudad | Canelones (ciudad) | progreso, santa-lucia, los-cerrillos | Ruta 5, Plaza Tomás Berreta, Intendencia |
| santa-lucia | Santa Lucía | canelones-ciudad, 25-de-agosto | Ruta 11, Río Santa Lucía |
| atlantida | Atlántida | parque-del-plata, las-toscas, la-floresta, salinas | Ruta Interbalnearia km 45, Rambla, Águila |
| salinas | Salinas | atlantida, marindia, pinamar, neptunia | Ruta Interbalnearia, Salinas Norte |
| neptunia | Neptunia / Pinamar | salinas, el-pinar, marindia | Ruta Interbalnearia km 33–38 |
| parque-del-plata | Parque del Plata | atlantida, las-toscas, la-floresta | Ruta Interbalnearia km 49, Arroyo Solís Chico |
| la-floresta | La Floresta | parque-del-plata, costa-azul, atlantida | Ruta Interbalnearia km 55 |
| costa-azul | Costa Azul / Bello Horizonte | la-floresta, san-luis, guazuvira | Ruta Interbalnearia km 58–62 |
| san-luis | San Luis / Araminda | costa-azul, santa-ana, jaureguiberry | Ruta Interbalnearia km 64–68 |
| jaureguiberry | Jaureguiberry | san-luis, solis (Maldonado) | Ruta Interbalnearia km 80, límite con Maldonado |
| joaquin-suarez | Joaquín Suárez | toledo, sauce | Ruta 74, Ruta 33 |
| sauce | Sauce | joaquin-suarez, canelones-ciudad, pando | Ruta 33, Ruta 6, Fiesta de la Uva |
| san-ramon | San Ramón | canelones-ciudad, tala | Ruta 6, Ruta 12 |
| tala | Tala | san-ramon, migues | Ruta 7 |

## Maldonado (zona madre: `maldonado`)

| slug | nombre | vecinos | referencias |
|---|---|---|---|
| maldonado-ciudad | Maldonado (ciudad) | punta-del-este, san-carlos, pinares, cerro-pelado | Plaza San Fernando, Av. Aparicio Saravia, Terminal, Cerro Pelado |
| punta-del-este | Punta del Este | maldonado-ciudad, punta-ballena, la-barra, pinares | Península, Gorlero, Playa Brava/Mansa, Torres de Roosevelt, casas de veraneo |
| pinares | Pinares / Las Delicias | punta-del-este, maldonado-ciudad, punta-ballena | Av. Roosevelt, Pinares, Rincón del Indio |
| punta-ballena | Punta Ballena | pinares, portezuelo, punta-del-este | Casapueblo, Ruta 10, Laguna del Sauce, Arboretum Lussich |
| portezuelo | Portezuelo / Chihuahua | punta-ballena, solis, piriapolis | Ruta 10, Playa Chihuahua, Portezuelo |
| solis | Balneario Solís / Bella Vista | portezuelo, piriapolis, jaureguiberry | Ruta Interbalnearia km 84–88, Arroyo Solís Grande |
| piriapolis | Piriápolis | solis, pan-de-azucar, punta-colorada | Rambla de los Argentinos, Cerro San Antonio, Argentino Hotel |
| pan-de-azucar | Pan de Azúcar | piriapolis, san-carlos | Ruta 9, Ruta 60, Cerro Pan de Azúcar |
| san-carlos | San Carlos | maldonado-ciudad, la-barra, pan-de-azucar | Ruta 39, Ruta 9, Plaza de San Carlos, Bario Rodríguez Barrios |
| la-barra | La Barra | punta-del-este, manantiales, san-carlos | Puente ondulante, Ruta 10, Bikini, Manantiales |
| manantiales | Manantiales / El Chorro | la-barra, jose-ignacio | Ruta 10, Playa Bikini, El Chorro |
| jose-ignacio | José Ignacio | manantiales, garzon | Ruta 10, Faro, Laguna Garzón |
| cerro-pelado | Cerro Pelado / Maldonado Nuevo | maldonado-ciudad, san-carlos | Bvar. Artigas, Maldonado Nuevo |
| aigua | Aiguá | pan-de-azucar, san-carlos | Ruta 39, Ruta 13, Grutas de Salamanca |

## CABA — barrios (zona madre: `caba` o `capital-federal`; sub-hubs por comuna si el sitio pasa de 30 páginas)

| slug | nombre | comuna | vecinos | referencias |
|---|---|---|---|---|
| palermo | Palermo | 14 | recoleta, belgrano, colegiales, villa-crespo, almagro | Bosques de Palermo, Av. Santa Fe, Plaza Serrano, Palermo Hollywood/Soho/Chico, Las Cañitas |
| recoleta | Recoleta | 2 | palermo, retiro, balvanera, san-nicolas | Av. Callao, Av. Alvear, Cementerio, Plaza Francia, edificios antiguos con ascensores viejos |
| belgrano | Belgrano | 13 | palermo, colegiales, nuñez, villa-urquiza, coghlan | Av. Cabildo, Barrancas, Belgrano R/C, Chinatown, torres sobre Libertador |
| nuñez | Núñez | 13 | belgrano, saavedra, vicente-lopez | Av. Libertador, Estadio Monumental, Ciudad Universitaria |
| colegiales | Colegiales | 13 | belgrano, palermo, chacarita, villa-ortuzar | Av. Federico Lacroze, Av. Cabildo, Mercado de las Pulgas |
| villa-urquiza | Villa Urquiza | 12 | belgrano, coghlan, villa-pueyrredon, villa-ortuzar, saavedra | Av. Triunvirato, Av. Monroe, Estación Villa Urquiza |
| saavedra | Saavedra | 12 | nuñez, villa-urquiza, villa-pueyrredon, coghlan | Parque Saavedra, Av. Gral. Paz, Av. Balbín |
| coghlan | Coghlan | 12 | belgrano, villa-urquiza, saavedra | Estación Coghlan, casas bajas |
| villa-pueyrredon | Villa Pueyrredón | 12 | villa-urquiza, saavedra, villa-devoto, agronomia | Av. Mosconi, Av. Gral. Paz |
| villa-devoto | Villa Devoto | 11 | villa-pueyrredon, villa-del-parque, monte-castro, villa-real | Plaza Arenales, Av. Beiró, casas con jardín |
| villa-del-parque | Villa del Parque | 11 | villa-devoto, villa-santa-rita, agronomia, paternal | Av. Nazca, Cuenca, Estación Villa del Parque |
| villa-crespo | Villa Crespo | 15 | palermo, almagro, caballito, chacarita, paternal | Av. Corrientes, Av. Scalabrini Ortiz, Av. Warnes (repuestos), outlets |
| chacarita | Chacarita | 15 | colegiales, villa-crespo, paternal, villa-ortuzar | Cementerio, Av. Corrientes, Av. Federico Lacroze |
| paternal | La Paternal | 15 | chacarita, villa-crespo, villa-del-parque, agronomia | Av. San Martín, Av. Warnes, estadio de Argentinos |
| agronomia | Agronomía | 15 | paternal, villa-del-parque, villa-pueyrredon | Facultad de Agronomía, Av. San Martín |
| almagro | Almagro | 5 | palermo, villa-crespo, caballito, balvanera, boedo | Av. Rivadavia, Av. Medrano, Abasto, Av. Corrientes |
| boedo | Boedo | 5 | almagro, san-cristobal, parque-patricios, caballito | Av. Boedo, Av. San Juan, Av. Independencia |
| caballito | Caballito | 6 | almagro, villa-crespo, flores, parque-chacabuco, boedo | Parque Rivadavia, Parque Centenario, Av. Rivadavia, Primera Junta, edificios altos |
| flores | Flores | 7 | caballito, floresta, parque-chacabuco, villa-santa-rita, parque-avellaneda | Av. Rivadavia, Plaza Flores, Av. Nazca, Av. Avellaneda (textiles) |
| parque-chacabuco | Parque Chacabuco | 7 | caballito, flores, boedo, nueva-pompeya | Parque Chacabuco, Av. Asamblea, Av. Directorio |
| floresta | Floresta | 10 | flores, velez-sarsfield, monte-castro, villa-luro | Av. Rivadavia, Av. Juan B. Justo, Av. Gaona |
| villa-luro | Villa Luro | 10 | floresta, liniers, velez-sarsfield, versalles | Av. Rivadavia, Av. Juan B. Justo |
| liniers | Liniers | 9 | villa-luro, mataderos, versalles, ciudadela | Estación Liniers, Av. Rivadavia, San Cayetano, Av. Gral. Paz |
| mataderos | Mataderos | 9 | liniers, parque-avellaneda, villa-lugano | Feria de Mataderos, Av. Alberdi, Av. Eva Perón |
| villa-lugano | Villa Lugano | 8 | mataderos, villa-soldati, villa-riachuelo, parque-avellaneda | Av. Escalada, Av. Cruz, Gral. Paz |
| villa-soldati | Villa Soldati | 8 | villa-lugano, nueva-pompeya, parque-avellaneda | Parque Roca, Av. Roca |
| nueva-pompeya | Nueva Pompeya | 4 | parque-patricios, villa-soldati, parque-chacabuco, barracas | Av. Sáenz, Puente Alsina |
| parque-patricios | Parque Patricios | 4 | boedo, barracas, nueva-pompeya, san-cristobal | Parque Patricios, Distrito Tecnológico, Av. Caseros |
| barracas | Barracas | 4 | parque-patricios, la-boca, constitucion, san-telmo | Av. Montes de Oca, Av. Regimiento de Patricios, galpones y fábricas recicladas |
| la-boca | La Boca | 4 | barracas, san-telmo | Caminito, Bombonera, Av. Almirante Brown |
| san-telmo | San Telmo | 1 | la-boca, monserrat, constitucion, puerto-madero | Plaza Dorrego, Defensa, casas antiguas, conventillos reciclados |
| monserrat | Monserrat | 1 | san-telmo, san-nicolas, constitucion, balvanera | Plaza de Mayo, Av. de Mayo, Av. 9 de Julio |
| san-nicolas | San Nicolás / Microcentro | 1 | monserrat, retiro, balvanera, recoleta | Obelisco, Florida, Av. Corrientes, oficinas |
| retiro | Retiro | 1 | san-nicolas, recoleta, puerto-madero | Estación Retiro, Plaza San Martín, Torres de Catalinas |
| puerto-madero | Puerto Madero | 1 | retiro, san-nicolas, san-telmo | Diques, torres nuevas, Reserva Ecológica |
| constitucion | Constitución | 1 | san-telmo, monserrat, barracas, san-cristobal | Estación Constitución, Av. Brasil |
| balvanera | Balvanera / Once | 3 | recoleta, san-nicolas, almagro, monserrat, san-cristobal | Once, Congreso, Abasto, Av. Pueyrredón, comercios mayoristas |
| san-cristobal | San Cristóbal | 3 | balvanera, boedo, constitucion, parque-patricios | Av. Jujuy, Av. San Juan |
| villa-ortuzar | Villa Ortúzar | 15 | chacarita, colegiales, villa-urquiza, paternal | Av. Álvarez Thomas, Av. Triunvirato |
| parque-avellaneda | Parque Avellaneda | 9 | mataderos, flores, villa-lugano, floresta | Parque Avellaneda, Av. Directorio |
| velez-sarsfield | Vélez Sarsfield | 10 | floresta, villa-luro, monte-castro | Av. Juan B. Justo, Av. Álvarez Jonte |
| monte-castro | Monte Castro | 10 | villa-devoto, floresta, velez-sarsfield, villa-real | Av. Álvarez Jonte, Av. Segurola |
| villa-real | Villa Real | 10 | monte-castro, villa-devoto, versalles | Av. Gral. Paz, Av. Lope de Vega |
| versalles | Versalles | 10 | villa-real, villa-luro, liniers | Av. Gral. Paz, Av. Juan B. Justo |
| villa-santa-rita | Villa Santa Rita | 11 | villa-del-parque, flores, villa-general-mitre, floresta | Av. Nazca, Av. Álvarez Jonte |
| villa-general-mitre | Villa General Mitre | 11 | villa-santa-rita, paternal, villa-crespo, caballito | Av. Gaona, Av. San Martín |

## Cómo usar este índice

- **Hub madre**: `/{servicio}/montevideo` (o `/montevideo` en sitios mono-servicio) enlaza a TODOS sus barrios; cada barrio enlaza al hub y a 3–4 vecinos de la columna "vecinos". Regla en `location-pages.md`.
- **Referencias**: son disparadores para el bloque "Cómo llegamos / referencias" de cada página; el operador confirma cuáles usa de verdad. Nunca inventar calles.
- **Tipo de vivienda** (sirve para "problemas típicos"): costa este de Montevideo y corredor Libertador/Cabildo en CABA = edificios altos y torres (portería, accesos, ascensores, cañerías comunes); Prado, Carrasco, Devoto, Belgrano R, Punta del Este fuera de temporada = casas con jardín (rejas, portones, humedad, techos); Ciudad de la Costa y balnearios = casas de veraneo con calles de arena y viviendas vacías buena parte del año (alarmas, cerraduras forzadas, humedades por cierre prolongado); Pando, Las Piedras, Barracas, Villa Lugano = galpones, talleres y zona industrial.
- Ampliar la tabla con el mismo formato cuando el nicho cubra otro departamento (Colonia, Rocha, San José) o GBA (Zona Norte, Oeste, Sur).
