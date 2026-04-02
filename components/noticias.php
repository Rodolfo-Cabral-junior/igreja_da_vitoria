<?php
require_once __DIR__ . '/../config/site.php';

// $noticias vem de config/site.php — edite lá, não aqui

$corConfig = [
    'azul' => [
        'borderTop'   => 'border-t-azul',
        'imgBg'       => 'bg-azul/10',
        'iconColor'   => 'text-[#4A6AFF]',
        'badgeBg'     => 'bg-azul/85',
        'linkColor'   => 'text-[#4A6AFF]',
        'hoverBorder' => 'hover:border-azul',
    ],
    'vermelho' => [
        'borderTop'   => 'border-t-vermelho',
        'imgBg'       => 'bg-vermelho/10',
        'iconColor'   => 'text-vermelho',
        'badgeBg'     => 'bg-vermelho/85',
        'linkColor'   => 'text-vermelho',
        'hoverBorder' => 'hover:border-vermelho',
    ],
    'dourado' => [
        'borderTop'   => 'border-t-dourado',
        'imgBg'       => 'bg-dourado-escuro/10',
        'iconColor'   => 'text-dourado',
        'badgeBg'     => 'bg-dourado/85',
        'linkColor'   => 'text-dourado',
        'hoverBorder' => 'hover:border-dourado',
    ],
];
?>

<section class="bg-creme py-24 font-raleway" id="noticias">
    <div class="max-w-[1200px] mx-auto px-6">

        <!-- Cabeçalho -->
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-[52px]">
            <div>
                <span class="text-dourado tracking-[4px] text-[11px] font-bold uppercase inline-block mb-3">✦ ACONTECENDO NA IGREJA</span>
                <h2 class="font-cinzel text-titulo text-[clamp(1.8rem,4vw,2.8rem)] font-black tracking-wide">
                    Notícias e Mensagens
                </h2>
            </div>
            <a href="<?php echo htmlspecialchars($site['redes_sociais']['youtube']['url']); ?>"
                target="_blank" rel="noopener noreferrer"
                class="text-secundario text-[13px] font-semibold no-underline whitespace-nowrap transition-colors duration-200 pb-1 hover:text-dourado inline-flex items-center gap-1">
                Ver no YouTube
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-3.5 h-3.5" aria-hidden="true">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
        </div>

        <!-- Grid — card AO VIVO fixo + cards dinâmicos do config -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Card AO VIVO (fixo) -->
            <article class="group animar-entrada flex flex-col bg-white border border-black/10 border-t-4 border-t-vermelho hover:border-vermelho rounded-[20px] overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <a href="https://www.youtube.com/@igrejadavitoriajaragua/streams"
                    target="_blank" rel="noopener noreferrer" class="flex flex-col flex-1">
                    <div class="relative h-44 overflow-hidden flex-shrink-0">
                        <img src="assets/images/noticias/ao-vivo.jpg"
                            alt="Culto ao vivo — Igreja da Vitória"
                            class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
                        <span class="absolute top-3 left-3 inline-flex items-center gap-2 bg-vermelho/90 text-white text-[10px] font-bold tracking-[2px] uppercase rounded-full px-3 py-1.5 backdrop-blur-sm">
                            <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                            AO VIVO
                        </span>
                    </div>
                    <div class="p-[22px] pb-5 flex flex-col flex-1">
                        <h3 class="font-cinzel text-sm font-bold text-titulo mb-2.5 leading-[1.45]">
                            Assista aos Nossos Cultos ao Vivo
                        </h3>
                        <p class="text-[13px] leading-relaxed text-corpo mb-[18px] flex-1">
                            Participe das nossas transmissões pelo YouTube. Louvor, Palavra e presença de Deus — de onde você estiver.
                        </p>
                        <span class="inline-flex items-center gap-1 text-[13px] font-bold text-vermelho transition-opacity duration-200 group-hover:opacity-75 mt-auto">
                            Assistir no YouTube
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-3.5 h-3.5" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                        </span>
                    </div>
                </a>
            </article>

            <!-- Cards dinâmicos — editados em config/site.php → $noticias -->
            <?php foreach ($noticias as $noticia):
                $cc = $corConfig[$noticia['cor']];
            ?>
                <article class="group animar-entrada flex flex-col bg-white border border-black/10 rounded-[20px] overflow-hidden shadow-sm border-t-4
                            <?php echo $cc['borderTop']; ?> <?php echo $cc['hoverBorder']; ?>
                            transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative h-44 overflow-hidden flex-shrink-0">
                        <img
                            src="<?php echo htmlspecialchars($noticia['imagem']); ?>"
                            alt="<?php echo htmlspecialchars($noticia['imgAlt']); ?>"
                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
                        <span class="absolute top-3 left-3 rounded-full px-3 py-1 text-[10px] font-bold tracking-[1.5px] uppercase text-white backdrop-blur-sm <?php echo $cc['badgeBg']; ?>">
                            <?php echo htmlspecialchars($noticia['badge']); ?>
                        </span>
                    </div>
                    <div class="p-[22px] pb-5 flex flex-col flex-1">
                        <h3 class="font-cinzel text-sm font-bold text-titulo mb-2.5 leading-[1.45]">
                            <?php echo htmlspecialchars($noticia['titulo']); ?>
                        </h3>
                        <p class="text-[13px] leading-relaxed text-corpo mb-[18px] flex-1">
                            <?php echo htmlspecialchars($noticia['trecho']); ?>
                        </p>
                        <a href="<?php echo htmlspecialchars($noticia['link']); ?>"
                            target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center gap-1 text-[13px] font-bold no-underline transition-opacity duration-200 hover:opacity-75 mt-auto <?php echo $cc['linkColor']; ?>">
                            Assistir no YouTube
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-3.5 h-3.5" aria-hidden="true">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>

        </div>

        <!-- CTA inferior -->
        <div class="text-center mt-12">
            <a href="<?php echo htmlspecialchars($site['redes_sociais']['youtube']['url']); ?>"
                target="_blank" rel="noopener noreferrer"
                class="inline-flex items-center gap-2 px-8 py-3 rounded-full border-2 border-dourado/40
                      text-dourado-escuro font-semibold text-sm transition-all duration-300
                      hover:bg-dourado/10 hover:border-dourado hover:-translate-y-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4" aria-hidden="true">
                    <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z" />
                    <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="currentColor" stroke="none" />
                </svg>
                Ver todos os vídeos no YouTube
            </a>
        </div>

    </div>
</section>