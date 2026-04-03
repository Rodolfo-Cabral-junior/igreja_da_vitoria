// ── CONSTANTES GLOBAIS ───────────────────────────────────────────────────────
const CONFIG = {
    CAROUSEL_INTERVAL: 5000,
};

// ── Menu Mobile Toggle ────────────────────────────────────────────────────────
window.toggleMenu = function () {
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');
    if (!btn || !menu) return;

    const isExpanded = btn.getAttribute('aria-expanded') === 'true';
    btn.setAttribute('aria-expanded', !isExpanded);
    menu.classList.toggle('hidden');
};

// ── Clipboard com Fallback ───────────────────────────────────────────────────
window.copyToClipboard = function (btn, text) {
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(() => {
            btn.style.color = '#4A6AFF';
            setTimeout(() => { btn.style.color = ''; }, 1500);
        }).catch(() => fallbackCopy(btn, text));
    } else {
        fallbackCopy(btn, text);
    }
};

function fallbackCopy(btn, text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.opacity = '0';
    document.body.appendChild(textarea);
    textarea.select();
    try {
        document.execCommand('copy');
        btn.style.color = '#4A6AFF';
        setTimeout(() => { btn.style.color = ''; }, 1500);
    } catch (err) {
        console.error('Falha ao copiar:', err);
    }
    document.body.removeChild(textarea);
}

// ── Redirecionamento para WhatsApp (otimizado) ────────────────────────────────
window.redirectToWhatsApp = function (event) {
    event?.preventDefault();
    // Extrai o WhatsApp link do primeiro elemento com href que contem wa.me
    const whatsappLink = document.querySelector('a[href*="wa.me"]')?.getAttribute('href');
    if (whatsappLink) {
        window.location.href = whatsappLink;
    }
};

// ── Hero Slideshow ────────────────────────────────────────────────────────────
(function () {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    if (!slides.length) return;

    let atual = 0;
    let intervalo;

    function irPara(idx) {
        slides[atual].style.opacity = '0';
        dots[atual].style.background = 'rgba(255,255,255,0.25)';
        dots[atual].style.transform = 'scaleX(1)';

        atual = (idx + slides.length) % slides.length;

        slides[atual].style.opacity = '1';
        dots[atual].style.background = '#D4A844';
        dots[atual].style.transform = 'scaleX(1.8)';
    }

    function avancar() { irPara(atual + 1); }

    function reiniciarIntervalo() {
        clearInterval(intervalo);
        intervalo = setInterval(avancar, CONFIG.CAROUSEL_INTERVAL);
    }

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => { irPara(i); reiniciarIntervalo(); });
    });

    reiniciarIntervalo();
})();

// ── Banner Carousel ───────────────────────────────────────────────────────────
(function () {
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('[data-carousel-dot]');
    const btnPrev = document.querySelector('[data-carousel-prev]');
    const btnNext = document.querySelector('[data-carousel-next]');
    if (!slides.length) return;

    let atual = 0;
    let intervalo;

    function irPara(idx) {
        slides[atual].classList.remove('ativo');
        dots[atual]?.classList.remove('ativo');

        atual = (idx + slides.length) % slides.length;

        slides[atual].classList.add('ativo');
        dots[atual]?.classList.add('ativo');
    }

    function reiniciarIntervalo() {
        clearInterval(intervalo);
        intervalo = setInterval(() => irPara(atual + 1), CONFIG.CAROUSEL_INTERVAL);
    }

    dots.forEach((dot) => {
        dot.addEventListener('click', () => {
            irPara(parseInt(dot.dataset.carouselDot, 10));
            reiniciarIntervalo();
        });
    });

    btnPrev?.addEventListener('click', () => { irPara(atual - 1); reiniciarIntervalo(); });
    btnNext?.addEventListener('click', () => { irPara(atual + 1); reiniciarIntervalo(); });

    reiniciarIntervalo();
})();

// ── Animações de entrada (Intersection Observer) ──────────────────────────────
(function () {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('visivel');
                observer.unobserve(entry.target);
            });
        },
        { threshold: 0.15 }
    );

    document.querySelectorAll('.animar-entrada').forEach((el) => {
        observer.observe(el);
    });
})();

// ── Formulário de Pedido de Oração ───────────────────────────────────────────
(function () {
    const form = document.getElementById('form-pedido-oracao');
    if (!form) return;

    const campos = {
        nome: { el: document.getElementById('oracao-nome'), erro: document.getElementById('erro-nome') },
        assunto: { el: document.getElementById('oracao-assunto'), erro: document.getElementById('erro-assunto') },
        mensagem: { el: document.getElementById('oracao-mensagem'), erro: document.getElementById('erro-mensagem') },
    };
    const sucesso = document.getElementById('oracao-sucesso');
    const btnLimpar = document.getElementById('btn-limpar-oracao');

    function validar() {
        let ok = true;
        Object.values(campos).forEach(({ el, erro }) => {
            const vazio = !el.value.trim();
            el.classList.toggle('campo-erro', vazio);
            erro.classList.toggle('visivel', vazio);
            if (vazio) ok = false;
        });
        return ok;
    }

    function limparErros() {
        Object.values(campos).forEach(({ el, erro }) => {
            el.classList.remove('campo-erro');
            erro.classList.remove('visivel');
        });
        sucesso.classList.add('hidden');
        sucesso.classList.remove('flex');
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        limparErros();
        if (!validar()) return;

        const tel = document.getElementById('oracao-telefone')?.value.trim() ?? '';
        const numero = CONFIG.WHATSAPP_NUMBER;
        const nome = campos.nome.el.value.trim();
        const assunto = campos.assunto.el.value.trim();
        const mensagem = campos.mensagem.el.value.trim();

        const texto = encodeURIComponent(
            `*Pedido de Oração*\n` +
            `Nome: ${nome}\n` +
            (tel ? `WhatsApp: ${tel}\n` : '') +
            `Assunto: ${assunto}\n\n` +
            mensagem
        );

        window.open(`https://wa.me/${numero}?text=${texto}`, '_blank', 'noopener,noreferrer');

        sucesso.classList.remove('hidden');
        sucesso.classList.add('flex');
        form.reset();
    });

    if (btnLimpar) {
        btnLimpar.addEventListener('click', () => { limparErros(); });
    }
})();