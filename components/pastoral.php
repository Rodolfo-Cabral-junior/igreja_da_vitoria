<?php
require_once __DIR__ . '/../config/site.php';
?>

<section class="bg-bege py-24 font-raleway" id="equipe-pastoral">
    <div class="max-w-[1200px] mx-auto px-6 text-center">

        <span class="text-dourado tracking-[4px] text-[11px] font-bold uppercase inline-block mb-4">✦ LIDERANÇA</span>
        <h2 class="font-cinzel text-titulo text-[clamp(1.8rem,4vw,2.8rem)] font-black tracking-wide mb-3">Equipe Pastoral</h2>
        <p class="text-corpo text-[15px] leading-[1.7] max-w-[480px] mx-auto">
            Homens e mulheres dedicados ao ministério, servindo com amor e sabedoria.
        </p>

        <div class="flex flex-wrap justify-center gap-6 mt-[52px]">

            <!-- Card: Pastor Daniel Sardinha Pires -->
            <div class="bg-white border border-azul/20 border-t-4 border-t-azul rounded-[20px] px-8 py-9 text-center w-full max-w-[300px] shadow-[0_4px_24px_rgba(26,47,160,0.10)] transition-all duration-300 hover:-translate-y-1 hover:border-azul">

                <!-- Avatar -->
                <div class="w-24 h-24 rounded-full border-4 border-dourado/50 flex items-center justify-center mx-auto mb-5 overflow-hidden">
                    <img src="assets/images/pastoral/pr.daniel.png" alt="<?php echo htmlspecialchars($site['pastor_titular']['nome_formatado']); ?>" class="w-full h-full object-cover">
                </div>

                <h3 class="font-cinzel text-[17px] font-bold text-titulo mb-1.5 leading-tight">
                    <?php echo htmlspecialchars($site['pastor_titular']['nome_formatado']); ?>
                </h3>
                <p class="text-[10px] font-bold tracking-[2.5px] uppercase text-dourado-escuro mb-4">
                    <?php echo htmlspecialchars($site['pastor_titular']['titulo']); ?>
                </p>

                <hr class="border-t border-black/[0.08] mb-4">

                <p class="text-[13px] leading-[1.7] text-corpo">
                    Dedicado ao ministério da Palavra e ao cuidado pelo crescimento espiritual e unidade do povo de Deus em Jaraguá.
                </p>
            </div>

        </div>
    </div>
</section>
