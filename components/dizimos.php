<?php
require_once __DIR__ . '/../config/site.php';
?>

<section class="bg-creme py-24 font-raleway" id="dizimos">
    <div class="max-w-[1200px] mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

            <!-- Coluna esquerda — texto -->
            <div>
                <span class="text-dourado tracking-[4px] text-[11px] font-bold uppercase inline-block mb-4">✦ CONTRIBUA</span>
                <h2 class="font-cinzel text-titulo text-[clamp(2rem,5vw,3rem)] font-black tracking-wide mb-5">Dízimos e Ofertas</h2>
                <p class="text-corpo text-[15px] leading-[1.8] mb-5">
                    Sua oferta abençoa nossa comunidade e nos permite continuar o ministério da Palavra, louvor e oração. Deus ama ao que dá com alegria e retorna a bênção em abundância.
                </p>
                <p class="text-corpo text-[15px] leading-[1.8] mb-5">
                    Ofertar é um ato de fé e obediência. Cada contribuição fortalece o ministério e alcança mais vidas para o Reino de Deus em Jaraguá.
                </p>
                <div class="bg-black/[0.04] border-l-[3px] border-black/15 rounded-r-xl py-4 px-5 mt-2">
                    <p class="italic text-[13px] text-secundario leading-[1.7]">
                        "Toda pessoa dê o que decidiu em seu coração, não com pesar ou sob compulsão, pois Deus ama quem dá com alegria." — 2 Coríntios 9:7
                    </p>
                </div>
            </div>

            <!-- Coluna direita — Pix Card -->
            <div class="flex justify-center">
                <div class="bg-white border border-black/10 border-t-4 border-t-dourado rounded-[20px] px-8 py-9 max-w-[380px] shadow-md transition-all duration-300 hover:-translate-y-1 hover:border-dourado">

                    <!-- Ícone -->
                    <div class="w-[52px] h-[52px] rounded-full bg-dourado/10 text-dourado flex items-center justify-center mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6" aria-hidden="true"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                    </div>

                    <h3 class="font-cinzel text-[20px] font-bold text-titulo mb-1.5">Escaneie para Ofertar</h3>
                    <p class="text-[13px] text-secundario mb-7 leading-normal">Faça sua oferta via Pix de forma rápida e segura</p>

                    <!-- QR Code placeholder -->
                    <div class="w-full aspect-square max-w-[200px] mx-auto mb-6 bg-bege border-2 border-dashed border-black/15 rounded-xl flex flex-col items-center justify-center gap-2 text-terciario text-[11px]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-9 h-9 text-dourado-escuro" aria-hidden="true"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                        Espaço para QR Code Pix
                    </div>

                    <!-- Chave Pix -->
                    <div class="text-[10px] font-bold tracking-[2.5px] uppercase text-secundario mb-2">Chave Pix</div>
                    <div class="flex items-center gap-2.5 bg-bege border border-black/10 rounded-xl px-4 py-3 mb-2">
                        <span class="flex-1 font-cinzel text-[15px] font-bold text-titulo tracking-wide">
                            <?php echo htmlspecialchars($site['pix_chave']); ?>
                        </span>
                        <button
                            class="bg-azul border-none text-white cursor-pointer p-1.5 rounded-md flex items-center justify-center shrink-0 transition-colors duration-150 hover:bg-azul-claro"
                            onclick="navigator.clipboard.writeText('<?php echo htmlspecialchars($site['pix_chave']); ?>').then(()=>{ this.style.color='#4A6AFF'; setTimeout(()=>this.style.color='', 1500); })"
                            title="Copiar chave Pix"
                            aria-label="Copiar chave Pix">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4" aria-hidden="true"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        </button>
                    </div>
                    <p class="text-[11px] text-terciario">Clique no ícone para copiar a chave</p>

                </div>
            </div>

        </div>
    </div>
</section>
