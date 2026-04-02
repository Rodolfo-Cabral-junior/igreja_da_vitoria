<?php
require_once __DIR__ . '/../config/site.php';
?>

<section class="bg-creme py-24 font-raleway" id="nossa-visao">
    <div class="max-w-[1200px] mx-auto px-6">

        <!-- Cabeçalho -->
        <div class="mb-16 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-dourado/10 border border-dourado/30 mb-4">
                <span class="text-dourado font-cinzel text-[11px] font-bold tracking-widest uppercase">✦ QUEM SOMOS</span>
            </div>
            <h2 class="font-cinzel text-titulo text-[clamp(2rem,5vw,3.5rem)] font-black tracking-tight mb-4 leading-tight max-w-2xl mx-auto">
                Conheça Nossa Visão
            </h2>
            <p class="text-corpo text-[15px] leading-relaxed max-w-2xl mx-auto opacity-90">
                A Igreja da Vitória é uma comunidade de fé comprometida em servir a Deus e transformar vidas através da Palavra, louvor genuíno e oração fervorosa.
            </p>
        </div>

        <!-- Grid principal: Texto + Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start mb-20">

            <!-- Coluna esquerda — Missão e Visão -->
            <div>
                <div class="space-y-6">

                    <!-- Card Missão -->
                    <div class="bg-white border-l-4 border-azul rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-azul/10 text-azul flex items-center justify-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true">
                                    <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-cinzel text-sm font-bold text-titulo mb-2">Nossa Missão</h3>
                                <p class="text-[13px] leading-relaxed text-corpo">
                                    Servir ao Senhor com dedicação, ministrando a Palavra com unção, louvor que toca o coração e intercedendo pela redenção das almas.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card Visão -->
                    <div class="bg-white border-l-4 border-dourado rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-dourado/10 text-dourado flex items-center justify-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-cinzel text-sm font-bold text-titulo mb-2">Nossa Visão</h3>
                                <p class="text-[13px] leading-relaxed text-corpo">
                                    Ser uma comunidade de transformação que leva o Evangelho de Jesus Cristo com autoridade, autenticidade e poder do Espírito Santo.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card Valores -->
                    <div class="bg-white border-l-4 border-vermelho rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-vermelho/10 text-vermelho flex items-center justify-center mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-cinzel text-sm font-bold text-titulo mb-2">Nossos Valores</h3>
                                <p class="text-[13px] leading-relaxed text-corpo">
                                    Fé genuína, amor ao próximo, obediência à Palavra e excelência no serviço a Deus.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Versículo -->
                <div class="bg-gradient-to-br from-dourado/10 to-dourado/5 border border-dourado/30 rounded-lg py-6 px-6 mt-8 transition-all duration-300 hover:shadow-md hover:border-dourado/50">
                    <p class="italic text-[14px] leading-[1.8] text-corpo font-medium flex items-start gap-2">
                        <span class="text-dourado font-bold text-lg flex-shrink-0 mt-0.5">"</span>
                        <span><?php echo htmlspecialchars($site['versiculo']); ?></span>
                        <span class="text-dourado font-bold text-lg flex-shrink-0">„</span>
                    </p>
                </div>
            </div>

            <!-- Coluna direita — 4 cards dos pilares -->
            <div class="grid grid-cols-2 gap-5">

                <!-- Card 1: Palavra Boa — dourado -->
                <div class="group bg-white border border-black/[0.06] rounded-xl p-6 shadow-md transition-all duration-500 hover:shadow-xl hover:-translate-y-1.5 overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-dourado/0 via-transparent to-dourado/[0.03] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-dourado/20 to-dourado/10 text-dourado flex items-center justify-center mb-4 relative z-[1] group-hover:shadow-lg group-hover:scale-110 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                        </svg>
                    </div>
                    <h3 class="font-cinzel text-[15px] font-bold text-titulo mb-2 leading-tight relative z-[1]">Palavra Boa</h3>
                    <p class="text-[13px] leading-relaxed text-corpo relative z-[1]">Ministração com unção, revelação e profundidade espiritual.</p>
                </div>

                <!-- Card 2: Louvor Ungido — azul -->
                <div class="group bg-white border border-black/[0.06] rounded-xl p-6 shadow-md transition-all duration-500 hover:shadow-xl hover:-translate-y-1.5 overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#4A6AFF]/0 via-transparent to-[#4A6AFF]/[0.03] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-[#4A6AFF]/20 to-[#4A6AFF]/10 text-[#4A6AFF] flex items-center justify-center mb-4 relative z-[1] group-hover:shadow-lg group-hover:scale-110 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true">
                            <path d="M9 18V5l12-2v13" />
                            <circle cx="6" cy="18" r="3" />
                            <circle cx="18" cy="16" r="3" />
                        </svg>
                    </div>
                    <h3 class="font-cinzel text-[15px] font-bold text-titulo mb-2 leading-tight relative z-[1]">Louvor Ungido</h3>
                    <p class="text-[13px] leading-relaxed text-corpo relative z-[1]">Adoração que toca o coração e eleva o espírito em comunhão.</p>
                </div>

                <!-- Card 3: Muita Oração — vermelho -->
                <div class="group bg-white border border-black/[0.06] rounded-xl p-6 shadow-md transition-all duration-500 hover:shadow-xl hover:-translate-y-1.5 overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-vermelho/0 via-transparent to-vermelho/[0.03] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-vermelho/20 to-vermelho/10 text-vermelho flex items-center justify-center mb-4 relative z-[1] group-hover:shadow-lg group-hover:scale-110 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true">
                            <path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z" />
                        </svg>
                    </div>
                    <h3 class="font-cinzel text-[15px] font-bold text-titulo mb-2 leading-tight relative z-[1]">Muita Oração</h3>
                    <p class="text-[13px] leading-relaxed text-corpo relative z-[1]">Intercessão fervorosa pela cura, libertação e transformação.</p>
                </div>

                <!-- Card 4: Comunidade — dourado -->
                <div class="group bg-white border border-black/[0.06] rounded-xl p-6 shadow-md transition-all duration-500 hover:shadow-xl hover:-translate-y-1.5 overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-dourado/0 via-transparent to-dourado/[0.03] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-dourado/20 to-dourado/10 text-dourado flex items-center justify-center mb-4 relative z-[1] group-hover:shadow-lg group-hover:scale-110 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5" aria-hidden="true">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <h3 class="font-cinzel text-[15px] font-bold text-titulo mb-2 leading-tight relative z-[1]">Comunidade</h3>
                    <p class="text-[13px] leading-relaxed text-corpo relative z-[1]">Uma família espiritual unida, amorosa e disposta a servir.</p>
                </div>

            </div>
        </div>

    </div>
</section>