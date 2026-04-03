# RX DO PROJETO — Igreja da Vitória
> **Status:** ✅ **95% COMPLETO** — Código auditado, limpo e no GitHub. Aguardando hospedagem PHP.
> Última atualização: 02/04/2026 — Sessão de auditoria técnica completa (15 correções aplicadas).

---

## PROGRESSO

| Fase | Status | Detalhes |
|------|--------|----------|
| **1 — Estrutura & Componentes** | ✅ Completo | 14 componentes funcionais |
| **2 — Funcionalidades & JS** | ✅ Completo | CONFIG global, WhatsApp, Leaflet, carousel |
| **3 — Testes & Validação** | ✅ Completo | PHP validado, JS limpo, IDs únicos |
| **4 — Build & Deploy** | 🟢 Parcial | GitHub ✅ — falta hospedagem PHP |
| **5 — Otimizações SEO** | 🟡 Pendente | Recomendado pós-deploy |

**Build:** ✅ Tailwind 39.76 KB | **JS:** ✅ main.js 166 linhas sem lixo | **PHP:** ✅ Sem erros de sintaxe
**GitHub:** `github.com/Rodolfo-Cabral-junior/igreja_da_vitoria` — branch `main`

---

## MUDANÇAS RECENTES (02/04/2026 — Sessão de Auditoria Técnica)

### Correções Aplicadas (15 fixes)

| # | Arquivo | Problema | Correção |
|---|---|---|---|
| 1 | `main.js:69` | `CONFIG.CAROUSEL_INTERVAL` solto como código morto | Removido |
| 2 | `main.js:35` | `window.irPara` poluindo namespace global | Removido do escopo global |
| 3 | `main.js:41,74` | `5000` hardcoded — constante existia mas era ignorada | Substituído por `CONFIG.CAROUSEL_INTERVAL` |
| 4 | `oracoes-pedidos.php` | `window.ORACAO_WHATS` exposta globalmente (redundante) | Removido — CONFIG.WHATSAPP_NUMBER já cobre |
| 5 | `oracoes-pedidos.php` | `$idx = 0; ... $idx++` manual e desnecessário | `foreach ($grupos as $idx => $grupo)` |
| 6 | `endereco.php` | Leaflet carregado 2× em CDNs diferentes (já carregado no head.php) | Removido do componente |
| 7 | `endereco.php` | Coordenadas hardcoded divergiam do config em ~7 km | Agora usa `$site['localizacao']['latitude/longitude']` |
| 8 | `endereco.php` | `style="background: rgba(212,168,68,0.2)"` repetido 3× | `bg-dourado/20` (Tailwind) |
| 9 | `endereco.php` | URL Google Maps hardcoded 2× | Gerada dinamicamente via coords do config |
| 10 | `config/site.php` | Coordenadas erradas (`-15.8271, -49.0667`) | Corrigido: `-15.7614, -49.3283` |
| 11 | `config/site.php` | Campo `'whatsapp'` duplicava `'telefone'` (campo morto) | Removido |
| 12 | `index.php` | 9 seções com `id="..."` duplicados vs. componentes | Wrappers removidos — componentes mantêm seus IDs |
| 13 | `banner-rotativo.php` | `style="color: #..."` inline em títulos | `text-dourado`, `text-azul` |
| 14 | `galeria-fotos.php` | 3 inline styles (`background`, `color` × 2) | `bg-creme`, `text-dourado`, `text-azul`, shadow Tailwind |
| 15 | `header.php` | Botão menu mobile sem atributos de acessibilidade | `aria-label`, `aria-expanded`, `aria-controls` |

### Validação pós-correções

```bash
✅ php -l index.php              → No syntax errors
✅ php -l components/endereco.php → No syntax errors
✅ php -l components/oracoes-pedidos.php → No syntax errors
✅ php -l config/site.php        → No syntax errors
✅ IDs HTML únicos               → 0 duplicatas
✅ Leaflet carregado 1× (head.php) → sem double-load
✅ CONFIG.CAROUSEL_INTERVAL      → usado nos 2 intervalos
```

---

## SESSÕES ANTERIORES

### 02/04/2026 — Otimizações Visuais
- Redesenho completo `visao.php` (layout + 3 cards Missão/Visão/Valores + 4 pilares)
- Cores dos botões pós-hero: Dourado (Cultos) + Vermelho (WhatsApp) + Azul (Como Chegar)
- Contraste nos botões "Participar" de grupos de oração (opacidade → cores sólidas)
- Remoção de CTAs desnecessários (`ministerios.php`, `oracoes-pedidos.php`)
- Correção `config/site.php`: imagem Ministério Infantil → `infantil.png` local

### 02/04/2026 — Infraestrutura
- Repositório Git criado, código enviado para GitHub
- Duplicação do Form Orações em `main.js` removida (227 → 169 linhas)
- Browserslist atualizado, dependências reinstaladas, zero vulnerabilidades

---

## STACK & AMBIENTE

| Item | Valor |
|---|---|
| **Linguagem** | PHP (includes simples, sem framework) |
| **CSS** | Tailwind CSS 3.4.0 CLI (compilado) |
| **JS** | Vanilla JS ES6+ (sem framework) |
| **Mapa** | Leaflet.js 1.9.4 (CDN — carregado em `head.php`) |
| **Build** | `npm run build` → `assets/css/input.css` → `assets/css/style.css` |
| **Servidor** | PHP built-in (`php -S localhost:8000`) ou Apache/Nginx |

> ⚠️ **REGRA CRÍTICA:** Sempre rodar `npm run build` após adicionar novas classes Tailwind. O CSS é purgado — classes não detectadas nos arquivos de `content` não são compiladas.

```bash
npm run build   # Compilar (produção)
npm run dev     # Watch (desenvolvimento)
php -S localhost:8000  # Servidor local
```

---

## ESTRUTURA DE ARQUIVOS

```
igreja da vitoria/
├── index.php                     ← Entrada única — inclui todos os componentes (sem section wrappers duplicados)
├── package.json                  ← Scripts npm: build e dev
├── tailwind.config.js            ← Tema customizado: cores, fontes, animações
├── RX-PROJETO.md                 ← Este arquivo
│
├── config/
│   ├── site.php                  ← FONTE DA VERDADE: nome, cultos, coords, contatos, redes, notícias, banners
│   └── colors.php                ← Constantes PHP + getCssVars() + obter_cor()
│
├── components/
│   ├── head.php                  ← <head>: meta, OG, fonts, CSS, Leaflet, :root vars, @keyframes
│   ├── header.php                ← Navbar fixa (desktop + mobile hamburger) — aria-label corrigido
│   ├── hero.php                  ← Slideshow — 19 imagens, dots, overlay, CTAs  [id="inicio" via index.php]
│   ├── banner-rotativo.php       ← Carousel — 5 banners, setas, dots, auto 5s  [id="banner-rotativo"]
│   ├── cultos.php                ← 3 cards (Terça, Quinta, Domingo), data dinâmica  [id="cultos"]
│   ├── galeria-fotos.php         ← 12 fotos com overlay hover  [id="galeria-fotos"]
│   ├── oracoes-pedidos.php       ← 4 grupos de oração + formulário WhatsApp  [id="oracoes"]
│   ├── visao.php                 ← Missão/Visão/Valores + 4 pilares  [id="nossa-visao"]
│   ├── ministerios.php           ← 6 cards de ministérios com CTA WhatsApp  [id="ministerios"]
│   ├── pastoral.php              ← Card Pr. Daniel Sardinha Pires  [id="equipe-pastoral"]
│   ├── endereco.php              ← Mapa Leaflet + endereço + horários  [âncora via index.php id="endereco"]
│   ├── dizimos.php               ← PIX — QR Code placeholder + chave copiável  [id="dizimos"]
│   ├── noticias.php              ← Grid 4 cards: AO VIVO (fixo) + 3 dinâmicos  [id="noticias"]
│   └── footer.php                ← 4 colunas + copyright + logo Cab@lvesTecnologia
│
└── assets/
    ├── css/
    │   ├── input.css             ← Fonte Tailwind + @layer (NÃO editar style.css diretamente)
    │   └── style.css             ← CSS COMPILADO (gerado por npm run build)
    ├── js/
    │   └── main.js               ← 4 módulos: hero slideshow, banner carousel, observer, form orações
    └── images/
        ├── logo/                 ← logotopo.png, favicon.ico
        ├── hero/                 ← 19 × Screenshot_*.webp
        ├── banner-rotativo/      ← banner01–05.jpeg
        ├── galeria/              ← foto01–foto12.webp (12 usadas)
        ├── noticias/             ← ao-vivo.jpg, pregacao.jpg, testemunho.jpg, louvor.jpg
        ├── pastoral/             ← pr.daniel.png
        ├── ministerios/          ← louvor.jpg, palavra.jpg, oração.jpg, infantil.png + (2 Unsplash)
        └── footer/               ← logo_cabr@lvesTecnologia.png
```

---

## ORDEM DAS SEÇÕES (index.php)

```
head.php
header.php                        ← z-50, fixed
  #inicio (section)               ← hero.php — único com wrapper em index.php
  [pós-hero: badges + quick actions — inline em index.php]
banner-rotativo.php               ← id próprio no componente
cultos.php
galeria-fotos.php
oracoes-pedidos.php
visao.php
ministerios.php
pastoral.php
  #endereco (section)             ← wrapper em index.php; componente usa id="endereco-section" internamente
dizimos.php
noticias.php
footer.php
<script main.js?v=filemtime>      ← cache-busting
```

---

## DADOS DA IGREJA (config/site.php)

| Campo | Valor |
|---|---|
| Nome | Igreja da Vitória |
| Slogan | Palavra boa · Louvor ungido · Muita Oração |
| Pastor | Pr. Daniel Sardinha Pires (Pastor Presidente) |
| Cidade | Jaraguá — GO, Brasil |
| Endereço | Rua José M. Francisco Q, 07 - LT 13 - Setor Aeroporto, Jaraguá - GO, 76330-000 |
| Coordenadas | `-15.7614, -49.3283` |
| Telefone | 62 98480-5993 |
| WhatsApp Link | `https://wa.me/5562984805993` |
| Chave PIX | (62) 98480-5993 |
| Instagram | `https://instagram.com/igvitoria.jaragua` |
| YouTube | `https://youtube.com/@igrejadavitoriajaragua` |
| Versículo | João 10:10 |

**Cultos:**

| Dia | Hora | Tipo | Destaque |
|---|---|---|---|
| Terça-feira | 19h30 | Culto de Oração | — |
| Quinta-feira | 19h30 | Culto da Palavra | — |
| Domingo | 19h00 | Culto Geral | ✅ Principal |

**Funções auxiliares:**
- `getProximoCulto($diaSemana)` → retorna `dia`, `mes`, `ano`, `data_completa`
- `obter_config($chave, $padrao)` → acesso seguro com notação de ponto

**Arrays editáveis em `site.php`:**

```php
// Máximo 3 notícias (AO VIVO é fixo no HTML)
$noticias = [
  ['cor' => 'azul|vermelho|dourado', 'badge' => '', 'titulo' => '', 'trecho' => '', 'link' => '', 'imagem' => '', 'imgAlt' => ''],
];

// Banners do carousel (sem limite — dots gerados automaticamente)
$banners = [
  ['imagem' => 'assets/images/banner-rotativo/banner01.jpeg', 'alt' => ''],
];
```

---

## PALETA DE CORES

| Token Tailwind | Hex | Uso |
|---|---|---|
| `azul` | `#1A2FA0` | Primária — botões, nav, cards |
| `azul-escuro` | `#111f6e` | Gradientes escuros, header bg |
| `azul-claro` | `#2a44c8` | Gradientes claros |
| `vermelho` | `#CC1020` | Destaque, badge AO VIVO, CTAs urgentes |
| `vermelho-escuro` | `#9e0b18` | Hover vermelho |
| `dourado` | `#D4A844` | Acento premium, underlines nav, CTAs secundários |
| `dourado-claro` | `#e8c870` | Variação dourado |
| `dourado-escuro` | `#a07a28` | Hover dourado |
| `creme` | `#F8F6F1` | Fundo das seções claras |
| `bege` | `#EEEAE3` | Fundo alternativo (visão, pastoral) |
| `titulo` | `#18150F` | Texto de títulos |
| `corpo` | `#3D3830` | Texto de corpo |
| `secundario` | `#6B6259` | Texto secundário |
| `terciario` | `#9B9088` | Texto terciário |

> ⚠️ **Não usar inline `style="color: #..."` ou `style="background: rgba(...)"` — sempre usar classes Tailwind correspondentes.**

Constantes PHP em `config/colors.php` (usadas em `head.php` para gerar `:root { --azul: ... }`).

---

## SISTEMA DE ANIMAÇÃO

- Entrada: `.animar-entrada` (opacity 0) + `.visivel` (opacity 1) — adicionado pelo IntersectionObserver
- Definido em `components/head.php` (inline `<style>`)
- JS em `main.js`: `IntersectionObserver` com `threshold: 0.15`, `unobserve` após primeiro trigger
- Stagger nos cards: `style="transition-delay: Xms"` (0 / 120 / 240 / 360ms)
- **NÃO mixar** com `@keyframes` customizados — causa conflito

**Keyframes** (`tailwind.config.js`):
```
fadeDown  → opacity 0→1, translateY -20px→0 (0.8s)
fadeUp    → opacity 0→1, translateY +20px→0 (0.8s, delay 0.2s)
```

---

## main.js — MÓDULOS (166 linhas)

| # | Módulo | Seletores | Funcionalidade |
|---|---|---|---|
| 0 | **CONFIG** | — | `WHATSAPP_NUMBER`, `CAROUSEL_INTERVAL` — fonte única de verdade |
| 1 | **redirectToWhatsApp()** | `onclick="redirectToWhatsApp(event)"` | `window.location.href` via `wa.me/` (instantâneo) |
| 2 | **Hero Slideshow** | `.hero-slide`, `.hero-dot` | Auto-avanço via `CONFIG.CAROUSEL_INTERVAL`, click nos dots, reset interval |
| 3 | **Banner Carousel** | `.carousel-slide`, `[data-carousel-dot]`, `[data-carousel-prev/next]` | Auto-avanço, setas, dots, classe `.ativo` |
| 4 | **IntersectionObserver** | `.animar-entrada` | Threshold 0.15, adiciona `.visivel`, unobserve |
| 5 | **Form Orações** | `#form-pedido-oracao` | Validação + envio `wa.me` com `CONFIG.WHATSAPP_NUMBER` + sucesso + reset |

```php
// Cache-busting no carregamento
<script src="assets/js/main.js?v=<?php echo filemtime('assets/js/main.js'); ?>"></script>
```

---

## COMPONENTES — DETALHES TÉCNICOS

### head.php
- Meta charset, viewport, SEO, Open Graph
- Google Fonts: `Cinzel` + `Raleway` com preconnect
- `<link href="assets/css/style.css">` + Leaflet CSS + Leaflet JS (CDN cdnjs)
- Inline `<style>`: `:root` CSS vars, `.animar-entrada`, `.hero-slide`, `.nav-link`, header scroll shadow, `@keyframes`

### header.php
- Fixed, z-50, dark gradient (`#111009` → `#1a1814`), `border-dourado/20`
- Desktop: 6 links nav + botões Contato/Oferta
- Mobile: `#menu-btn` com `aria-label="Abrir menu"` + `aria-expanded` + `aria-controls="mobile-menu"`

### hero.php — `id="inicio"`
- `min-h-[600px]`, 19 slides `.hero-slide`, overlay gradient, 2 círculos desfocados decorativos
- Conteúdo: badge localização (fadeDown) + título + slogan (fadeUp) + 2 CTAs
- Curva SVG branca na base
- `$heroImages` = 19 nomes (`Screenshot_2` → `Screenshot_32`)

### banner-rotativo.php — `id="banner-rotativo"`
- Container 380px (mobile 280px), 5 slides `.carousel-slide`
- Setas `[data-carousel-prev/next]` + dots `[data-carousel-dot]`
- Auto-avanço via `CONFIG.CAROUSEL_INTERVAL`, transição opacity 0.8s

### cultos.php — `id="cultos"`
- Grid `md:grid-cols-3`, background `creme`
- Cards: `border-t-4`, número decorativo (opacity 6%), ícone 22×22, horário 52px
- Badge "Culto Principal" no Domingo, data dinâmica via `getProximoCulto()`

### galeria-fotos.php — `id="galeria-fotos"`
- Grid `auto-fit minmax(280px, 1fr)` / `200px` mobile, background `bg-creme`
- 12 fotos, overlay gradiente (azul→vermelho) no hover, `loading="lazy"`
- CTA Instagram

### oracoes-pedidos.php — `id="oracoes"`
- 4 cards de grupos (`lg:grid-cols-4`) — dados em `$grupos` no próprio arquivo
- Formulário: `#oracao-nome` (required), `#oracao-telefone`, `#oracao-assunto` (required), `#oracao-mensagem` (required)
- Validação via JS (`main.js`), envio por `wa.me` com `CONFIG.WHATSAPP_NUMBER`

### visao.php — `id="nossa-visao"`
- Background `creme`, grid `lg:grid-cols-2`
- Esquerda: 3 cards (Missão/Visão/Valores) + versículo
- Direita: 4 pilares em grid 2×2 (Palavra Boa, Louvor Ungido, Muita Oração, Comunidade)

### ministerios.php — `id="ministerios"`
- Background `creme`, grid `sm:grid-cols-2 lg:grid-cols-3`
- 6 cards de `$site['ministerios']`: imagem, badge, nome, descrição, CTA WhatsApp
- `$corConfig` mapeado por cor do ministério

### pastoral.php — `id="equipe-pastoral"`
- Background `bege`, card centralizado — Pr. Daniel Sardinha Pires

### endereco.php — âncora `#endereco` via index.php
- Background animado: 19 fotos da galeria em crossfade CSS (`animation: bgFade`)
- Mapa Leaflet integrado (`id="mapa-endereco"`) — coords via `$site['localizacao']`
- 3 blocos de info (📍 endereço, 🕐 horários, 📞 telefone) — todos via `$site`
- Link "Como Chegar" gerado dinamicamente via coords do config

### dizimos.php — `id="dizimos"`
- Grid `lg:grid-cols-2`, background `creme`
- Card PIX: placeholder QR Code 200×200 (dashed), chave copiável via `navigator.clipboard`

### noticias.php — `id="noticias"`
- Grid `lg:grid-cols-4`, background `creme`
- Card AO VIVO (fixo) + 3 dinâmicos de `$noticias`

### footer.php
- Background `#111009`, 4 colunas: Brand + Institucional + Contribua + Cultos (dinâmico)
- Ícones redes sociais, copyright via `$site['ano']` e `$site['nome']`

---

## CONVENÇÕES DO PROJETO

- **Caminhos de imagens:** sempre relativos à raiz (`assets/images/...`) — nunca `../assets/`
- **Dados da igreja:** nunca hardcodar em componentes — sempre usar `$site` de `config/site.php`
- **Inline styles:** proibido — usar classes Tailwind correspondentes
- **CSS compilado:** nunca editar `assets/css/style.css` diretamente
- **Links WhatsApp:** sempre `https://wa.me/55XXXXXXXXXXX` (com DDI 55)
- **Padrão de card:** `border-t-4`, `rounded-[20px]`, `shadow-sm`, `hover:shadow-lg`, `hover:-translate-y-1`
- **Textos sensíveis:** nunca mencionar "Maria" como testemunho — usar "Jesus" ou genérico
- **Créditos:** `Cab@lvesTecnologia` (sem espaço, sem variações)

---

## CHECKLIST

### Implementado ✅
- [x] 14 componentes funcionais
- [x] CONFIG global (`WHATSAPP_NUMBER`, `CAROUSEL_INTERVAL`) — fonte única
- [x] Redirecionamento WhatsApp instantâneo (`wa.me/`)
- [x] Mapa interativo Leaflet integrado em `endereco.php`
- [x] Coordenadas corretas (`-15.7614, -49.3283`) sincronizadas entre config e componente
- [x] Redesenho completo `visao.php` (Missão/Visão/Valores + 4 pilares)
- [x] Ministérios (`ministerios.php`) com 6 cards e CTA WhatsApp
- [x] Formulário de oração com validação JS e envio WhatsApp
- [x] Background animado em `endereco.php` (crossfade das fotos da galeria)
- [x] Build Tailwind limpo (39.76 KB, zero vulnerabilidades)
- [x] `main.js` sem código morto, sem global leak, `CONFIG.CAROUSEL_INTERVAL` usado
- [x] IDs HTML únicos (9 wrappers duplicados removidos de `index.php`)
- [x] Leaflet carregado uma única vez (`head.php`)
- [x] `window.ORACAO_WHATS` removido — `CONFIG.WHATSAPP_NUMBER` centraliza tudo
- [x] Inline styles eliminados (banner-rotativo, galeria, endereco)
- [x] `aria-label` + `aria-expanded` + `aria-controls` no menu mobile
- [x] GitHub: `github.com/Rodolfo-Cabral-junior/igreja_da_vitoria`

### Próximos — Curto Prazo
- [ ] Deploy em hospedagem PHP (Hostinger, Umbler, ou servidor dedicado)
- [ ] Open Graph meta tags completas (`og:image` com URL absoluta, `og:url` fixo)
- [ ] `sitemap.xml` + `robots.txt`
- [ ] Google Analytics + tracking de eventos (CTAs, formulário de oração)
- [ ] Validação server-side no formulário de oração (PHP)

### Futuros — Longo Prazo
- [ ] QR Code dinâmico para PIX em `dizimos.php` (biblioteca PHP ou API)
- [ ] Popular `$grupos` em `oracoes-pedidos.php` com dados reais
- [ ] Popular pastas de assets vazias (cultos, oracoes, visao, icons)
- [ ] Painel administrativo (editar `$site` sem tocar no código)
- [ ] Sistema de notícias/blog com banco de dados
- [ ] Calendário dinâmico dos cultos

---

## COMANDOS ÚTEIS

```bash
# Compilar Tailwind CSS (SEMPRE após novas classes)
npm run build

# Watch para desenvolvimento
npm run dev

# Servidor PHP local
php -S localhost:8000

# Validar sintaxe PHP
php -l index.php
php -l components/endereco.php

# Ver status do repositório
git status
git log --oneline -5
```
