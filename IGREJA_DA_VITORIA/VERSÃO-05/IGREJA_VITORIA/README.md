# Igreja da Vitória - Refatoração MVC

Este projeto foi reorganizado para **MVC (Model-View-Controller)** com foco em manutenção, clareza de responsabilidades e evolução gradual do HTML atual.

## Visão de arquitetura

- **Model (`src/models`)**: define estruturas de domínio (`Evento`, `Culto`, `PedidoOracao`).
- **View (`src/views` + `src/public`)**: renderização HTML (EJS), componentes visuais, CSS e JS de interface.
- **Controller (`src/controllers`)**: entrada HTTP, chama Services, retorna View/JSON.
- **Service (`src/services`)**: regras de negócio e validações (SRP).
- **Repository (`src/repositories`)**: acesso a dados (JSON hoje, banco amanhã).

### SOLID aplicado

- **S (Single Responsibility)**: cada camada tem uma responsabilidade única.
- **O (Open/Closed)**: novos repositórios/serviços podem ser adicionados sem alterar toda a base.
- **D (Dependency Inversion)**: Services/Controllers recebem dependências por injeção opcional no construtor.

### Padrões usados

- **Repository Pattern**: `EventRepository`, `CultoRepository`, etc.
- **Service Layer**: `EventService`, `PrayerService`, `HomePageService`.
- **DTO de entrada**: `req.body` é tratado/normalizado no Service antes de persistir.

## Estrutura de pastas (árvore)

```txt
.
├── package.json
├── package-lock.json
├── server.js
├── README.md
└── src
    ├── app.js
    ├── config
    │   └── viewEngine.js
    ├── controllers
    │   ├── ContactController.js
    │   ├── CultosController.js
    │   ├── EventController.js
    │   ├── HomeController.js
    │   └── PrayerController.js
    ├── data
    │   ├── contato-mensagens.json
    │   ├── contatos.json
    │   ├── cultos.json
    │   ├── eventos.json
    │   ├── ministerios.json
    │   └── pedidos-oracao.json
    ├── models
    │   ├── Culto.js
    │   ├── Evento.js
    │   ├── MensagemContato.js
    │   └── PedidoOracao.js
    ├── public
    │   ├── css
    │   │   └── styles.css
    │   ├── img
    │   │   └── README.md
    │   └── js
    │       └── main.js
    ├── repositories
    │   ├── ContactMessageRepository.js
    │   ├── ContactRepository.js
    │   ├── CultoRepository.js
    │   ├── EventRepository.js
    │   ├── JsonRepository.js
    │   ├── MinistryRepository.js
    │   └── PrayerRequestRepository.js
    ├── routes
    │   ├── apiRoutes.js
    │   ├── index.js
    │   └── webRoutes.js
    ├── services
    │   ├── ContactService.js
    │   ├── CultoService.js
    │   ├── EventService.js
    │   ├── HomePageService.js
    │   └── PrayerService.js
    └── views
        ├── partials
        │   ├── footer.ejs
        │   ├── head.ejs
        │   └── header.ejs
        └── templates
            └── home.ejs
```

## Onde colocar cada parte

- **HTML principal (Views)**: `src/views/templates/home.ejs`.
- **Partes reutilizáveis de HTML**: `src/views/partials`.
- **Estilos CSS**: `src/public/css/styles.css`.
- **Scripts de interface**: `src/public/js/main.js`.
- **Imagens**: **sempre em** `src/public/img`.
  - Referência nas Views: `src="/img/nome-da-imagem.jpg"`.

## Como rodar

```bash
npm install
npm run dev
# ou
npm start
```

Abra: `http://localhost:3000`

## Exemplo 1: adicionar imagem (banner-culto.jpg)

1. Coloque o arquivo em: `src/public/img/banner-culto.jpg`
2. Use na View `src/views/templates/home.ejs`:

```html
<img src="/img/banner-culto.jpg" alt="Momento de culto da Igreja da Vitória" class="hero-banner" />
```

## Exemplo 2: adicionar novo evento e exibir na View

### Opção A (direto no JSON)

Adicionar item em `src/data/eventos.json`:

```json
{
  "id": 3,
  "titulo": "Conferência de Avivamento",
  "data": "2026-04-10",
  "horario": "19:30",
  "descricao": "Três noites de palavra e adoração.",
  "categoria": "conferencia"
}
```

A View `home.ejs` já renderiza automaticamente o loop de `eventos`.

### Opção B (via Controller/API)

Fazer POST para `POST /api/eventos` com body:

```json
{
  "titulo": "Conferência de Avivamento",
  "data": "2026-04-10",
  "horario": "19:30",
  "descricao": "Três noites de palavra e adoração.",
  "categoria": "conferencia"
}
```

Fluxo interno: **Route -> EventController -> EventService (valida) -> EventRepository (salva)**.

## Compatibilidade de acesso

- O projeto passa a usar exclusivamente o MVC em `src/`.
- A URL antiga `/index.html` agora redireciona para `/` automaticamente.

## Observação UX

A paleta foi mantida conforme identidade visual da igreja:
- Azul escuro (`#102040`),
- Dourado/amarelo (`#f5cf6b`),
- Vermelho para destaques (`#b91c1c`).

Botões seguem padrão único (`.btn`) e componentes já possuem base de acessibilidade (`aria-label`, `alt`, foco visível em links e botões).
