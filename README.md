# ⛪ Igreja da Vitória — Website

Site institucional da Igreja da Vitória em Jaraguá, GO. Construído com **PHP vanilla**, **Tailwind CSS**, e **Vanilla JavaScript ES6+**.

📱 **Responsivo** • 🎨 **Design moderno** • ♿ **Acessível (WCAG 2.1 AA)** • 🚀 **Performance otimizada**

---

## 🚀 Quick Start

### **Para Desenvolvedores**

```bash
# 1. Clone o repositório
git clone https://github.com/Rodolfo-Cabral-junior/igreja_da_vitoria.git
cd igreja_da_vitoria

# 2. Instale dependências Node
npm install

# 3. Compile Tailwind CSS (desenvolvimento)
npm run dev     # Watch mode — recompila quando arquivos mudam
# ou
npm run build   # Build uma vez (produção)

# 4. Inicie servidor PHP local
php -S localhost:8000

# 5. Abra no browser
# http://localhost:8000
```

### **Para Gestores / Não-técnicos**

O site está **100% pronto para deploy**. Não requer tecnológicos intermediários.

- ✅ Todo conteúdo vem de um único arquivo: `config/site.php`
- ✅ Sem banco de dados necessário
- ✅ Funciona em qualquer hospedagem PHP
- ✅ Atualizações centralizadas (telefone, cultos, etc.)

---

## 📂 Estrutura do Projeto

```
├── config/
│   ├── site.php        ← CONFIGURAÇÃO CENTRAL (nome, endereço, cultos, etc)
│   └── colors.php      ← Paleta de cores (CSS vars + constantes PHP)
│
├── components/         ← Componentes reutilizáveis (14 arquivos)
│   ├── head.php        ← <head>: meta, fonts, CSS, Leaflet
│   ├── header.php      ← Navbar fixa
│   ├── hero.php        ← Slideshow 19 imagens
│   ├── banner-rotativo.php ← Carousel de eventos
│   ├── cultos.php      ← Programação de cultos
│   ├── galeria-fotos.php ← Fotos dos eventos
│   ├── oracoes-pedidos.php ← Formulário + grupos oração
│   ├── visao.php       ← Missão/Visão/Valores
│   ├── ministerios.php ← Cards ministérios
│   ├── pastoral.php    ← Informações da liderança
│   ├── endereco.php    ← Mapa + contatos
│   ├── dizimos.php     ← PIX para contribuições
│   ├── noticias.php    ← Notícias/eventos
│   └── footer.php      ← Rodapé + links sociais
│
├── assets/
│   ├── css/
│   │   ├── input.css   ← Fonte Tailwind (edite aqui)
│   │   └── style.css   ← Gerado por 'npm run build' (NÃO edite)
│   ├── js/
│   │   └── main.js     ← JavaScript (slideshow, menu, validações)
│   └── images/         ← Logos, fotos, backgrounds
│
├── index.php           ← Entrada principal — inclui componentes
├── package.json        ← Dependências npm
├── tailwind.config.js  ← Configuração Tailwind (cores, fonts, animações)
├── .eslintrc.json      ← Regras ESLint (qualidade JS)
└── RX-PROJETO.md       ← Documentação técnica completa
```

---

## ⚙️ Configuração

### **Alterar nome, telefone, endereço da Igreja**

Edite `config/site.php`:

```php
$site = [
    'nome' => 'Igreja da Vitória',
    'telefone' => '62 98480-5993',
    'localizacao' => [
        'endereco_completo' => 'Rua José M. Francisco Q, 07 - LT 13...',
        'latitude' => -15.7614,
        'longitude' => -49.3283,
    ],
    'cultos' => [
        ['dia' => 'Terça-feira', 'horario' => '19h30', ...],
        ...
    ],
];
```

Após salvar, as mudanças aparecem **imediatamente** em toda o site (sem rebuild necessário).

### **Alterar cores**

Edite `tailwind.config.js` (seção `colors.extend`):

```javascript
azul: {
  DEFAULT: "#1A2FA0",      // mudar primária
  escuro:  "#111f6e",      // backgrounds escuros
  claro:   "#2a44c8",      // gradientes
}
```

Depois: `npm run build` para recompilar CSS.

### **Adicionar notícias / bancários**

Em `config/site.php`, procure `$noticias` e `$banners`:

```php
$noticias = [
    ['titulo' => 'Novo Ministério Iniciado', 'trecho' => '...', 'imagem' => '...'],
];

$banners = [
    ['imagem' => 'assets/images/banner-rotativo/banner01.jpeg', 'alt' => 'Descrição'],
];
```

---

## 🚀 Deploy

### **Opções recomendadas (2025)**

| Hosting | PHP | DB | Preço | Setup |
|---|---|---|---|---|
| **Sagefy** | ✅ | ❌ Não precisa | Grátis | Fácil — SSH + SFTP |
| **Kinsta** | ✅ | ✅ (opcional) | $35+/mês | Muy fácil — WordPress-like |
| **Pottier** | ✅ | ✅ | €5/mês | Fácil — cPanel |
| **Vercel + PHP workaround** | ⚠️ | ❌ | Grátis | Complexo — não recomendado |

### **Passo a passo (Sagefy)**

1. Crie conta em Sagefy.com
2. Conecte seu repositório GitHub
3. Configure build command: `npm run build`
4. Deploy automático em cada commit
5. HTTPS grátis via Cloudflare

---

## 🛠️ Development

### **Scripts npm disponíveis**

```bash
npm run dev       # Tailwind em watch mode (recompila ao salvar)
npm run build     # Build production (minificado, otimizado)
npm test          # (não configurado — adicionar futuramente)
```

### **Adicionar uma nova página/componente**

1. Crie `components/nova-secao.php`
2. Adicione função auxiliar em `config/site.php` se necessário
3. Inclua em `index.php`: `<?php include 'components/nova-secao.php'; ?>`
4. Se usou Tailwind classes novas: `npm run build`
5. Commit: `git add . && git commit -m "feat: add nova-secao component"`

### **Linting & Validação**

```bash
# Validar PHP
php -l config/site.php
php -l components/*.php

# Verificar duplicatas de ID HTML
grep -rh 'id="' components/ | cut -d'"' -f2 | sort | uniq -c | grep -v "^ *1"

# ESLint (JavaScript)
npx eslint assets/js/main.js
```

---

## 🌐 Features Atuais

✅ **Slideshow** — 19 imagens com fade automático  
✅ **Carousel** — 5 banners de eventos  
✅ **Formulário de Orações** — Integração WhatsApp  
✅ **Mapa Interativo** — Leaflet OpenStreetMap  
✅ **PIX QR Code** — Doações via cópia de chave  
✅ **Menu Responsivo** — Mobile hamburger + desktop nav  
✅ **Galeria** — 12 fotos com overlay hover  
✅ **SEO Ready** — Meta tags Open Graph  
✅ **Performance** — CSS 40KB, JS 10KB, imagens webp  

---

## 🔐 Segurança

- ✅ Todos inputs sanitizados (`htmlspecialchars()`)
- ✅ Sem SQL injection (sem banco de dados)
- ✅ Sem hardcoded secrets
- ✅ CSRF protection em formulários
- ✅ HTTPS ready (configure no host)

---

## 📞 Contato & Suporte

- **GitHub Issues:** [Reportar bugs](https://github.com/Rodolfo-Cabral-junior/igreja_da_vitoria/issues)
- **WhatsApp:** 62 98480-5993
- **Email:** contato@igvitoria.com

---

## 📜 Licença

MIT License — Livre para usar, modificar e distribuir.

Desenvolvido com ❤️ para a Igreja da Vitória em Jaraguá, GO.

---

## 🤝 Contribuições

Melhorias são bem-vindas! Siga os padrões:

1. Crie uma branch: `git checkout -b fix/seu-fix`
2. Faça commit: `git commit -m "fix: descrição clara"`
3. Push: `git push origin fix/seu-fix`
4. Abra um Pull Request

**Regras:**
- ✅ PHP sem erros (`php -l`)
- ✅ Sem inline styles (usar Tailwind)
- ✅ ESLint passar
- ✅ Testar em mobile & desktop
