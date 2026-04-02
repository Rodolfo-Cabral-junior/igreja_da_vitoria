<?php
require_once __DIR__ . '/../config/site.php';
require_once __DIR__ . '/../config/colors.php';

$fotos_bg = [];
for ($i = 1; $i <= 19; $i++) {
    $fotos_bg[] = 'assets/images/galeria/foto' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.webp';
}
$total      = count($fotos_bg);
$duracao    = 5;
$total_tempo = $total * $duracao;
$pct_foto   = round(($duracao / $total_tempo) * 100);
$pct_fade   = $pct_foto + 3;
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

<style>
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
    animation: bgFade <?php echo $total_tempo; ?>s infinite;
}

<?php foreach ($fotos_bg as $i => $foto): ?>
.bg-slide:nth-child(<?php echo $i + 1; ?>) {
    background-image: url('<?php echo $foto; ?>');
    animation-delay: <?php echo $i * $duracao; ?>s;
}
<?php endforeach; ?>

@keyframes bgFade {
    0%                      { opacity: 0; }
    3%                      { opacity: 1; }
    <?php echo $pct_foto; ?>% { opacity: 1; }
    <?php echo $pct_fade; ?>%  { opacity: 0; }
    100%                    { opacity: 0; }
}

#endereco-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.40) 0%, rgba(0,0,0,0.60) 100%);
    z-index: 1;
}
</style>

<div id="endereco-section" class="py-24">

    <?php foreach ($fotos_bg as $foto): ?>
        <div class="bg-slide"></div>
    <?php endforeach; ?>

    <div id="endereco-overlay"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="text-white">
                <div class="text-sm font-medium mb-3 tracking-widest uppercase" style="color: #D4A844;">
                    ✦ ONDE ESTAMOS
                </div>

                <h2 class="font-cinzel font-bold text-3xl sm:text-4xl mb-8 text-white drop-shadow-lg">
                    Venha nos Visitar
                </h2>

                <p class="text-base leading-relaxed mb-8 text-white/90">
                    Você é sempre bem-vindo em nossa comunidade! Nos encontramos nos dias e horários abaixo. Prepare seu coração para uma experiência de adoração e comunhão.
                </p>

                <div class="mb-6 flex gap-4">
                    <div class="shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-xl" style="background: rgba(212,168,68,0.2);">
                        📍
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1 text-white">Endereço</h3>
                        <p class="text-sm text-white/85">
                            Rua José M. Francisco Q, 07 - LT 13<br>
                            Setor Aeroporto, Jaraguá - GO<br>
                            CEP 76330-000
                        </p>
                    </div>
                </div>

                <div class="mb-6 flex gap-4">
                    <div class="shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-xl" style="background: rgba(212,168,68,0.2);">
                        🕐
                    </div>
                    <div>
                        <h3 class="font-semibold mb-1 text-white">Horários</h3>
                        <p class="text-sm text-white/85">
                            Ter & Qui: 19h30 | Dom: 19h00
                        </p>
                    </div>
                </div>

                <div class="mb-10 flex gap-4">
                    <div class="shrink-0 w-12 h-12 rounded-lg flex items-center justify-center text-xl" style="background: rgba(212,168,68,0.2);">
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
                        class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-full font-semibold text-sm text-white border-2 border-white/70 transition-all duration-300 hover:bg-white hover:text-azul-escuro hover:-translate-y-1">
                        💬 Falar pelo WhatsApp
                    </a>
                    <a href="https://maps.google.com/maps/dir/?api=1&destination=Rua+José+M.+Francisco+Q,+07+Setor+Aeroporto+Jaraguá+GO"
                        target="_blank" rel="noopener noreferrer"
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
document.addEventListener('DOMContentLoaded', function () {
    const lat = -15.7614;
    const lng = -49.3283;

    const mapa = L.map('mapa-endereco').setView([lat, lng], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        maxZoom: 19,
    }).addTo(mapa);

    const marcador = L.marker([lat, lng]).addTo(mapa);

    marcador.bindPopup(`
        <div style="font-family: sans-serif; font-size: 13px; line-height: 1.5;">
            <strong style="color: #1A2FA0;">Igreja da Vitória</strong><br>
            Rua José M. Francisco Q, 07 - LT 13<br>
            Setor Aeroporto, Jaraguá - GO<br>
            <a href="https://www.google.com/maps/dir/?api=1&destination=Rua+José+M.+Francisco+Q,+07+Setor+Aeroporto+Jaraguá+GO"
               target="_blank" rel="noopener noreferrer"
               style="color: #1A2FA0; text-decoration: underline; font-size: 12px;">
               Abrir no Google Maps ↗
            </a>
        </div>
    `).openPopup();

    window.addEventListener('resize', function () {
        mapa.invalidateSize();
    });
});
</script>