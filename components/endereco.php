<?php
require_once __DIR__ . '/../config/site.php';
require_once __DIR__ . '/../config/colors.php';

// Conta automaticamente as fotos disponíveis na galeria, sem hardcode
$arquivos_bg = glob(__DIR__ . '/../assets/images/galeria/foto*.webp');
sort($arquivos_bg);
$fotos_bg = array_map(fn($f) => 'assets/images/galeria/' . basename($f), $arquivos_bg);

// Limita a 6 slides de fundo — suficiente para o efeito visual sem carregar todas as imagens
$fotos_bg    = array_slice($fotos_bg, 0, 6);
$total       = count($fotos_bg);
$duracao     = 5;
$total_tempo = $total * $duracao;
$pct_foto    = round(($duracao / $total_tempo) * 100);
$pct_in      = max(1, round(($duracao * 0.3 / $total_tempo) * 100));
$pct_out     = $pct_foto + $pct_in; // renomeado de $pct_fade: representa o ponto em que opacity volta a 0

$slides_css = '';
foreach ($fotos_bg as $i => $foto) {
    $slides_css .= ".bg-slide:nth-child(" . ($i + 1) . ") { background-image: url('{$foto}'); animation-delay: " . ($i * $duracao) . "s; }\n    ";
}

echo '<style>
    #endereco-section {
        position: relative;
        overflow: hidden;
        min-height: 500px;
    }

    .bg-slide {
        filter: blur(2px);
        transform: scale(1.05);
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        opacity: 0;
        animation: bgFade ' . $total_tempo . 's infinite;
    }

    ' . $slides_css . '
    @keyframes bgFade {
        0%           { opacity: 0; }
        ' . $pct_in  . '%  { opacity: 1; }
        ' . $pct_foto . '%  { opacity: 1; }
        ' . $pct_out . '%  { opacity: 0; }
        100%         { opacity: 0; }
    }

    #endereco-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.40) 0%, rgba(0,0,0,0.60) 100%);
        z-index: 1;
    }
</style>';
?>

<div id="endereco-section" class="py-24">

    <?php foreach ($fotos_bg as $foto): ?>
        <div class="bg-slide" aria-hidden="true"></div>
    <?php endforeach; ?>

    <div id="endereco-overlay" aria-hidden="true"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="text-white">
                <div class="text-sm font-medium mb-3 tracking-widest uppercase text-dourado">
                    ✦ ONDE ESTAMOS
                </div>

                <h2 class="font-cinzel font-bold text-3xl sm:text-4xl mb-8 text-white drop-shadow-lg">
                    Venha nos Visitar
                </h2>

                <p class="text-base leading-relaxed mb-8 text-white/90">
                    Você é sempre bem-vindo em nossa comunidade! Nos encontramos nos dias e horários abaixo. Prepare seu coração para uma experiência de adoração e comunhão.
                </p>

                <div class="mb-6 flex gap-4">
                    <div class="shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-xl bg-dourado/20">
                        📍
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1 text-white">Endereço</h3>
                        <p class="text-sm text-white/85">
                            <?php echo htmlspecialchars($site['localizacao']['endereco_completo']); ?>
                        </p>
                    </div>
                </div>

                <div class="mb-6 flex gap-4">
                    <div class="shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-xl bg-dourado/20">
                        🕐
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1 text-white">Horários</h3>
                        <p class="text-sm text-white/85">
                            <?php
                            $horarios = array_map(fn($c) => $c['dia_semana'] . ': ' . $c['horario'], $site['cultos']);
                            echo htmlspecialchars(implode(' | ', $horarios));
                            ?>
                        </p>
                    </div>
                </div>

                <div class="mb-10 flex gap-4">
                    <div class="shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-xl bg-dourado/20">
                        📞
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1 text-white">Contato</h3>
                        <p class="text-sm text-white/85">
                            <?php echo htmlspecialchars($site['telefone']); ?>
                        </p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="<?php echo htmlspecialchars($site['whatsapp_link']); ?>"
                        target="_blank" rel="noopener noreferrer"
                        aria-label="Abrir WhatsApp da Igreja da Vitória"
                        class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-full font-semibold text-sm text-white border-2 border-white/70 transition-all duration-300 hover:bg-white hover:text-azul-escuro hover:-translate-y-1">
                        💬 Falar pelo WhatsApp
                    </a>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo (float)$site['localizacao']['latitude']; ?>,<?php echo (float)$site['localizacao']['longitude']; ?>"
                        target="_blank" rel="noopener noreferrer"
                        aria-label="Abrir localização no Google Maps"
                        class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-full font-semibold text-sm text-white border-2 border-white/70 transition-all duration-300 hover:bg-white hover:text-azul-escuro hover:-translate-y-1">
                        🗺️ Como Chegar
                    </a>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-xl h-96 border border-white/20 relative z-10">
                <div id="mapa-endereco" class="w-full h-full"></div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lat = <?php echo (float)$site['localizacao']['latitude']; ?>;
        const lng = <?php echo (float)$site['localizacao']['longitude']; ?>;

        const mapa = L.map('mapa-endereco').setView([lat, lng], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19,
        }).addTo(mapa);

        const marcador = L.marker([lat, lng]).addTo(mapa);

        // json_encode garante escape correto para contexto JS, evitando quebras no template literal
        const popupNome      = <?php echo json_encode($site['nome']); ?>;
        const popupEndereco  = <?php echo json_encode($site['localizacao']['endereco_completo']); ?>;

        marcador.bindPopup(`
            <div style="font-size: 13px; line-height: 1.5; font-family: sans-serif;">
                <strong style="color: #1A2FA0; display: block; margin-bottom: 8px;">${popupNome}</strong>
                ${popupEndereco}<br>
                <a href="https://www.google.com/maps/dir/?api=1&destination=${lat},${lng}"
                   target="_blank" rel="noopener noreferrer"
                   style="color: #1A2FA0; text-decoration: underline; font-size: 12px; display: inline-block; margin-top: 6px;">
                   Abrir no Google Maps ↗
                </a>
            </div>
        `).openPopup();

        // Debounce evita disparar invalidateSize dezenas de vezes por segundo durante resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() { mapa.invalidateSize(); }, 100);
        });
    });
</script>
