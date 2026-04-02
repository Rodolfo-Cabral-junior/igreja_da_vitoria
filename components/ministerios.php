<?php
require_once __DIR__ . '/../config/site.php';

$ministerios = $site['ministerios'];

$corConfig = [
    'azul' => [
        'borderTop'   => 'border-t-azul',
        'badgeBg'     => 'bg-azul/85',
        'linkColor'   => 'text-azul',
        'hoverBorder' => 'hover:border-azul',
    ],
    'azul-claro' => [
        'borderTop'   => 'border-t-[#2a44c8]',
        'badgeBg'     => 'bg-[#2a44c8]/85',
        'linkColor'   => 'text-[#2a44c8]',
        'hoverBorder' => 'hover:border-[#2a44c8]',
    ],
    'vermelho' => [
        'borderTop'   => 'border-t-vermelho',
        'badgeBg'     => 'bg-vermelho/85',
        'linkColor'   => 'text-vermelho',
        'hoverBorder' => 'hover:border-vermelho',
    ],
    'vermelho-claro' => [
        'borderTop'   => 'border-t-[#ff6b6b]',
        'badgeBg'     => 'bg-[#ff6b6b]/85',
        'linkColor'   => 'text-[#ff6b6b]',
        'hoverBorder' => 'hover:border-[#ff6b6b]',
    ],
    'vermelho-escuro' => [
        'borderTop'   => 'border-t-vermelho-escuro',
        'badgeBg'     => 'bg-vermelho-escuro/85',
        'linkColor'   => 'text-vermelho-escuro',
        'hoverBorder' => 'hover:border-vermelho-escuro',
    ],
    'dourado' => [
        'borderTop'   => 'border-t-dourado',
        'badgeBg'     => 'bg-dourado/85',
        'linkColor'   => 'text-dourado',
        'hoverBorder' => 'hover:border-dourado',
    ],
];
?>

<section class="bg-creme py-24 font-raleway" id="ministerios">
    <div class="max-w-[1200px] mx-auto px-6">

        <!-- Cabeçalho -->
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-[52px]">
            <div>
                <span class="text-dourado tracking-[4px] text-[11px] font-bold uppercase inline-block mb-3">✦ MINISTÉRIOS DA IGREJA</span>
                <h2 class="font-cinzel text-titulo text-[clamp(1.8rem,4vw,2.8rem)] font-black tracking-wide">
                    Conheça Nossos Ministérios
                </h2>
            </div>
            <a href="javascript:void(0);" onclick="redirectToWhatsApp(event)"
                class="text-secundario text-[13px] font-semibold no-underline whitespace-nowrap transition-colors duration-200 pb-1 hover:text-dourado inline-flex items-center gap-1 cursor-pointer">
                Conectar Conosco
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-3.5 h-3.5" aria-hidden="true">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
        </div>

        <!-- Grid de Ministérios -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php foreach ($ministerios as $min):
                $cc = $corConfig[$min['cor']];
            ?>
                <article class="group animar-entrada flex flex-col bg-white border border-black/10 rounded-[20px] overflow-hidden shadow-sm border-t-4
                            <?php echo $cc['borderTop']; ?> <?php echo $cc['hoverBorder']; ?>
                            transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <a href="javascript:void(0);" onclick="redirectToWhatsApp(event)" class="flex flex-col flex-1 cursor-pointer">

                        <!-- Imagem em Destaque -->
                        <div class="relative h-44 overflow-hidden flex-shrink-0">
                            <img
                                src="<?php echo htmlspecialchars($min['imagem']); ?>"
                                alt="<?php echo htmlspecialchars($min['imgAlt']); ?>"
                                class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-105"
                                loading="lazy" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>

                            <!-- Badge -->
                            <span class="absolute top-3 left-3 rounded-full px-3 py-1 text-[10px] font-bold tracking-[1.5px] uppercase text-white backdrop-blur-sm <?php echo $cc['badgeBg']; ?>">
                                <?php echo htmlspecialchars($min['badge']); ?>
                            </span>
                        </div>

                        <!-- Conteúdo -->
                        <div class="p-[22px] pb-5 flex flex-col flex-1">
                            <h3 class="font-cinzel text-sm font-bold text-titulo mb-2.5 leading-[1.45]">
                                <?php echo htmlspecialchars($min['nome']); ?>
                            </h3>
                            <p class="text-[13px] leading-relaxed text-corpo mb-[18px] flex-1">
                                <?php echo htmlspecialchars($min['descricao']); ?>
                            </p>

                            <!-- CTA WhatsApp -->
                            <span class="inline-flex items-center gap-1 text-[13px] font-bold no-underline transition-opacity duration-200 hover:opacity-75 mt-auto <?php echo $cc['linkColor']; ?>">
                                Saiba Mais
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5" aria-hidden="true">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" />
                                </svg>
                            </span>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>

        </div>

    </div>
</section>