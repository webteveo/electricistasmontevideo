#!/usr/bin/env python3
"""
Control SEO de todas las URLs del sitemap de Electricistas Montevideo.
Correr con el sitio levantado localmente (XAMPP u otro servidor PHP que respete el .htaccess):
  python3 scripts/qa-seo.py [http://localhost/electricistasmontevideo] [--solo /prefijo] [--todas]

Por página mide: estado HTTP, errores PHP, title (45-58), description (120-150), cantidad de H1,
JSON-LD válido y sin aggregateRating/review, textos de relleno visibles, palabras de contenido propio
y similitud con la página más parecida del sitio (frases de 5 palabras compartidas / total de la página).
Límites: zonas y servicio × barrio <= 30 %; el resto <= 20 %. Requiere beautifulsoup4 y lxml.
Sale con código 1 si hay errores, titles o descriptions repetidos, o páginas fuera de límite.
"""
import re, sys, json, urllib.request, urllib.error, collections
from bs4 import BeautifulSoup

args = sys.argv[1:]
B = next((a for a in args if a.startswith('http')), 'http://127.0.0.1:8000').rstrip('/')
solo = args[args.index('--solo') + 1] if '--solo' in args else ''
todas = '--todas' in args
DOMINIO = 'https://electricistasmontevideo.com'
# Páginas con límite de 30 %: zonas y servicio × barrio. El resto, 20 %.
LOCAL = re.compile(r'^/(zonas/[^/]+|electricista-(?![a-z-]*-montevideo$)[a-z0-9-]+|[a-z-]+/[a-z0-9-]+)$')
NO_LOCAL = re.compile(r'^/(articulos|zonas/region)')
RELLENO = re.compile(r'DATO FALTANTE|\bCOMPLETAR\b|Completar (?:con|meta|una|el|la)\b|[Ll]orem ipsum|\bTODO\b|\{[a-z_]+\}|\[[A-ZÁÉÍÓÚ ]{6,}\]')


def get(path):
    with urllib.request.urlopen(B + path, timeout=20) as r:
        return r.status, r.read().decode('utf-8')


def locs(xml):
    return [l.replace(DOMINIO, '', 1) or '/' for l in re.findall(r'<loc>([^<]+)</loc>', xml)]


_, idx_xml = get('/sitemap.xml')
urls = []
for sm in locs(idx_xml):
    _, x = get(sm)
    urls += locs(x)

def shingles(t):
    w = re.findall(r'\w+', t.lower())
    return set(tuple(w[i:i + 5]) for i in range(len(w) - 4))

pages, errores = {}, []
for u in urls:
    try:
        code, html = get(u)
    except urllib.error.HTTPError as e:
        errores.append((u, f'HTTP {e.code}')); continue
    except Exception as e:
        errores.append((u, str(e))); continue
    if re.search(r'(Warning|Fatal error|Notice|Deprecated|Parse error)(</b>)?:', html):
        errores.append((u, 'error PHP en el HTML'))
    s = BeautifulSoup(html, 'lxml')
    d = s.find('meta', attrs={'name': 'description'})
    canon = s.find('link', attrs={'rel': 'canonical'})
    if not canon or canon.get('href', '').replace(DOMINIO, '', 1) not in (u, u.rstrip('/'), '' if u == '/' else u):
        errores.append((u, f"canonical {canon.get('href') if canon else 'falta'}"))
    for sc in s.find_all('script', attrs={'type': 'application/ld+json'}):
        try:
            data = json.loads(sc.string or '')
        except Exception as e:
            errores.append((u, f'JSON-LD inválido: {e}')); continue
        if re.search(r'"(aggregateRating|review)"', json.dumps(data)):
            errores.append((u, 'schema con aggregateRating/review'))
    visible = s.body.get_text(' ', strip=True) if s.body else ''
    m = RELLENO.search(visible + ' ' + (s.title.get_text() if s.title else '') + ' ' + (d['content'] if d else ''))
    if m:
        errores.append((u, f'texto de relleno visible: "{m.group(0)}"'))
    main = s.find('main') or s.body
    for t in main(['script', 'style', 'noscript', 'nav', 'footer']):
        t.decompose()
    blocks = [re.sub(r'\s+', ' ', b.get_text(' ', strip=True)) for b in main.find_all(['p', 'li', 'td', 'h2', 'h3', 'summary', 'dd'])]
    blocks = [b for b in blocks if len(b.split()) >= 8]
    pages[u] = dict(code=code, title=s.title.get_text(strip=True) if s.title else '', desc=d['content'] if d else '',
                    h1=len(s.find_all('h1')), text=' '.join(dict.fromkeys(blocks)))

S = {u: shingles(p['text']) for u, p in pages.items()}
inv = collections.defaultdict(set)
for u, sh in S.items():
    for x in sh:
        inv[x].add(u)
rows, fuera = [], 0
for u, p in pages.items():
    if solo and not u.startswith(solo):
        continue
    cnt = collections.Counter()
    for x in S[u]:
        for v in inv[x]:
            if v != u:
                cnt[v] += 1
    v, n = cnt.most_common(1)[0] if cnt else ('', 0)
    sim = round(100 * n / max(1, len(S[u])))
    lim = 30 if LOCAL.match(u) and not NO_LOCAL.match(u) else 20
    flags = []
    if sim > lim:
        flags.append(f'sim>{lim}'); fuera += 1
    if not 45 <= len(p['title']) <= 58: flags.append(f"title {len(p['title'])}")
    if not 120 <= len(p['desc']) <= 150: flags.append(f"desc {len(p['desc'])}")
    if p['h1'] != 1: flags.append(f"h1={p['h1']}"); errores.append((u, f"{p['h1']} H1"))
    palabras = len(p['text'].split())
    if lim == 30 and palabras < 230: flags.append('corta')
    rows.append((u, palabras, sim, v, flags))

for u, w, sim, v, f in sorted(rows, key=lambda r: -r[2]):
    if todas or f:
        print(f"{u:58} {w:5}p {sim:3}% ~ {v[:44]:44} {' '.join(f)}")
dup_t = [t for t, c in collections.Counter(p['title'] for p in pages.values()).items() if c > 1]
dup_d = [t for t, c in collections.Counter(p['desc'] for p in pages.values()).items() if c > 1]
sims = sorted(r[2] for r in rows)
print(f"\n{len(pages)} URLs | errores: {len(errores)} | titles repetidos: {len(dup_t)} | descriptions repetidas: {len(dup_d)}"
      f" | fuera de límite de similitud: {fuera} | con alertas: {sum(1 for r in rows if r[4])}"
      + (f" | similitud máx {sims[-1]} % / mediana {sims[len(sims) // 2]} %" if sims else ''))
for e in errores: print('ERROR', *e)
for t in dup_t: print('TITLE REPETIDO', t)
for t in dup_d: print('DESCRIPTION REPETIDA', t)
sys.exit(1 if errores or dup_t or dup_d or fuera else 0)
