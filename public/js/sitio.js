'use strict';
const menu = document.querySelector('.menu-toggle');
const nav = document.querySelector('#main-nav');
if (menu && nav) {
  const close = () => { menu.setAttribute('aria-expanded', 'false'); nav.classList.remove('is-open'); menu.setAttribute('aria-label', 'Abrir menú'); menu.closest('.site-header').classList.remove('menu-open'); document.body.style.overflow = ''; };
  menu.addEventListener('click', () => {
    const open = menu.getAttribute('aria-expanded') !== 'true';
    menu.setAttribute('aria-expanded', String(open)); nav.classList.toggle('is-open', open);
    menu.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
    menu.closest('.site-header').classList.toggle('menu-open', open);
    document.body.style.overflow = open ? 'hidden' : '';
  });
  nav.addEventListener('click', event => { if (event.target.closest('a')) close(); });
  document.addEventListener('keydown', event => { if (event.key === 'Escape' && menu.getAttribute('aria-expanded') === 'true') { close(); menu.focus(); } });
  document.addEventListener('click', event => { if (!event.target.closest('.site-header')) close(); });
}
const form = document.querySelector('#consulta-form');
if (form) {
  const link = document.querySelector('#mensaje-listo');
  const status = document.querySelector('#form-status');
  form.addEventListener('submit', event => {
    event.preventDefault();
    const data = new FormData(form);
    const nombre = String(data.get('nombre')).trim();
    const barrio = String(data.get('barrio')).trim();
    const mensaje = String(data.get('mensaje')).trim();
    if (!nombre || !barrio || !mensaje) { status.textContent = 'Completá nombre, barrio y consulta para preparar tu mensaje.'; return; }
    const url = new URL(form.action);
    url.searchParams.set('text', 'Hola, soy ' + nombre + '. Estoy en ' + barrio + ', Montevideo. ' + mensaje);
    link.href = url.href; link.hidden = false;
    status.textContent = 'Tu mensaje está listo. Abrí WhatsApp para revisarlo y enviarlo.';
  });
  form.addEventListener('input', () => { link.hidden = true; status.textContent = ''; });
}
const header = document.querySelector('.site-header');
if (header) {
  const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 10);
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
}
const wspMsg = document.querySelector('#wsp-float-msg');
if (wspMsg) {
  let hour;
  try { hour = Number(new Intl.DateTimeFormat('en-US', { timeZone: 'America/Montevideo', hour: 'numeric', hour12: false }).format(new Date())); } catch (e) { hour = new Date().getHours(); }
  const online = hour >= 8 && hour < 20;
  wspMsg.querySelector('.wsp-float-text').textContent = online ? 'Estamos online' : 'Escribinos, te respondemos a la brevedad';
  wspMsg.classList.toggle('is-offline', !online);
  wspMsg.hidden = false;
  requestAnimationFrame(() => wspMsg.classList.add('is-visible'));
  setTimeout(() => { wspMsg.classList.remove('is-visible'); setTimeout(() => { wspMsg.hidden = true; }, 350); }, 3000);
}
// Métricas propias: vistas, clics en WhatsApp/teléfono y tiempo en página. Sin cookies de terceros.
(function () {
  const url = document.documentElement.getAttribute('data-track');
  if (!url || /bot|crawl|spider/i.test(navigator.userAgent)) return;
  const id = () => Math.random().toString(36).slice(2, 12) + Date.now().toString(36);
  let vid, sid;
  try { vid = localStorage.getItem('em_vid'); if (!vid) { vid = id(); localStorage.setItem('em_vid', vid); } } catch (e) { vid = id(); }
  try { sid = sessionStorage.getItem('em_sid'); if (!sid) { sid = id(); sessionStorage.setItem('em_sid', sid); } } catch (e) { sid = vid; }
  const q = new URLSearchParams(location.search);
  const base = { vid, sid, p: location.pathname.replace(document.documentElement.getAttribute('data-base') || '', ''), lang: navigator.language || '', sw: screen.width || 0 };
  const send = (data) => {
    const body = JSON.stringify(Object.assign({}, base, data));
    try { if (navigator.sendBeacon && navigator.sendBeacon(url, new Blob([body], { type: 'application/json' }))) return; } catch (e) {}
    try { fetch(url, { method: 'POST', body, keepalive: true, headers: { 'Content-Type': 'application/json' } }); } catch (e) {}
  };
  send({ ev: 'pv', ref: document.referrer || '', us: q.get('utm_source') || '', um: q.get('utm_medium') || '', uc: q.get('utm_campaign') || '' });
  const placement = (el) => {
    const t = [['.wsp-float', 'flotante'], ['.hero', 'hero'], ['.main-nav', 'menu'], ['.site-header', 'header'], ['.service-card', 'card'], ['.services-banner', 'banner-servicios'], ['.steps-cta', 'pasos'], ['.about-actions', 'nosotros'], ['.vs-section', 'comparativa'], ['.contact-banner', 'cta-final'], ['.related-links', 'relacionados'], ['.site-footer', 'footer'], ['.contact-form', 'formulario'], ['.contact-method', 'contacto']];
    for (const [s, n] of t) if (el.closest(s)) return n;
    return 'otro';
  };
  document.addEventListener('click', (e) => {
    const a = e.target.closest('a[href]'); if (!a) return;
    const h = a.getAttribute('href') || '';
    if (/wa\.me|api\.whatsapp\.com|whatsapp:/i.test(h)) { send({ ev: 'wsp', pl: placement(a) }); if (window.gtag) gtag('event', 'click_whatsapp', { placement: placement(a), page_path: base.p }); }
    else if (/^tel:/i.test(h)) { send({ ev: 'tel', pl: placement(a) }); if (window.gtag) gtag('event', 'click_telefono', { placement: placement(a), page_path: base.p }); }
  }, true);
  const f = document.querySelector('#consulta-form'); if (f) f.addEventListener('submit', () => send({ ev: 'form' }));
  const t0 = Date.now(); let sent = false;
  const dur = () => { if (sent) return; sent = true; send({ ev: 'dur', dur: Math.round((Date.now() - t0) / 1000) }); };
  addEventListener('pagehide', dur); document.addEventListener('visibilitychange', () => { if (document.visibilityState === 'hidden') dur(); });
})();
