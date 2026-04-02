<?php
require_once __DIR__ . '/../config/site.php';

$descs = [
    'Terça'   => 'Encontro de oração fervorosa, intercessão e busca pela presença de Deus.',
    'Quinta'  => 'Estudo profundo da Palavra, ensino e crescimento espiritual em comunidade.',
    'Domingo' => 'Celebração principal, louvor, ministração e comunhão de toda a igreja.',
];
$numeros = ['Terça' => '03', 'Quinta' => '05', 'Domingo' => '07'];

$cores = [
    'Terça' => [
        'borderTop'  => 'border-t-dourado',
        'numColor'   => 'text-dourado/[0.06]',
        'iconBg'     => 'bg-dourado/10',
        'iconColor'  => 'text-dourado',
        'tipoColor'  => 'text-dourado',
        'horColor'   => 'text-dourado',
        'dotBg'      => 'bg-dourado',
        'hoverBorder'=> 'hover:border-dourado',
    ],
    'Quinta' => [
        'borderTop'  => 'border-t-azul',
        'numColor'   => 'text-azul/[0.06]',
        'iconBg'     => 'bg-[rgba(74,106,255,0.12)]',
        'iconColor'  => 'text-[#4A6AFF]',
        'tipoColor'  => 'text-[#4A6AFF]',
        'horColor'   => 'text-[#4A6AFF]',
        'dotBg'      => 'bg-[#4A6AFF]',
        'hoverBorder'=> 'hover:border-azul',
    ],
    'Domingo' => [
        'borderTop'  => 'border-t-vermelho',
        'numColor'   => 'text-vermelho/[0.06]',
        'iconBg'     => 'bg-vermelho/10',
        'iconColor'  => 'text-vermelho',
        'tipoColor'  => 'text-vermelho',
        'horColor'   => 'text-vermelho',
        'dotBg'      => 'bg-vermelho',
        'hoverBorder'=> 'hover:border-vermelho',
    ],
];

$icones = [
    'Terça'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-[22px] h-[22px]" aria-hidden="true"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>',
    'Quinta'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-[22px] h-[22px]" aria-hidden="true"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>',
    'Domingo' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" class="w-[22px] h-[22px]" aria-hidden="true"><line x1="12" y1="2" x2="12" y2="22"/><line x1="2" y1="9" x2="22" y2="9"/></svg>',
];
?>

<section class="bg-creme py-28 font-raleway" id="cultos">
    <div class="max-w-[1200px] mx-auto px-6">

        <!-- Cabeçalho refinado -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-dourado/10 border border-dourado/30 mb-6">
                <span class="text-dourado font-cinzel text-[11px] font-bold tracking-widest uppercase">✦ PROGRAMAÇÃO</span>
            </div>
            <h2 class="font-cinzel text-titulo text-[clamp(2rem,5vw,3.2rem)] font-black tracking-tight mb-5 leading-tight">Nossos Cultos</h2>
            <p class="text-secundario text-[15px] leading-relaxed max-w-2xl mx-auto font-medium">
                Você é bem-vindo em qualquer um dos nossos encontros.<br>
                Venha nos acompanhar em adoração, oração e comunhão em família!
            </p>
        </div>

        <!-- Grid de Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <?php foreach ($site['cultos'] as $culto):
                $dia = $culto['dia_semana'];
                $c = $cores[$dia];
                $proximoCulto = getProximoCulto($dia);
                $diaMes = str_pad($proximoCulto['dia'], 2, '0', STR_PAD_LEFT);
            ?>
            <div class="group relative bg-white 
                rounded-2xl shadow-lg p-9 overflow-hidden 
                border border-black/[0.06] transition-all duration-500 
                hover:shadow-2xl hover:-translate-y-2 
                before:absolute before:inset-0 before:bg-gradient-to-br before:from-transparent before:via-transparent before:to-transparent 
                before:pointer-events-none
                <?php echo !empty($culto['destaque']) ? 'ring-2 ring-offset-1 ring-vermelho/50' : ''; ?>">
                
                <!-- Decoração de fundo animada -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br <?php 
                    echo $dia === 'Terça' ? 'from-dourado/5 to-dourado/0' : 
                         ($dia === 'Quinta' ? 'from-[#4A6AFF]/5 to-[#4A6AFF]/0' : 
                         'from-vermelho/5 to-vermelho/0'); ?> 
                rounded-full blur-3xl group-hover:scale-110 transition-transform duration-500"></div>

                <?php if (!empty($culto['destaque'])): ?>
                <div class="absolute top-6 right-6 bg-gradient-to-br from-vermelho to-[#9e0b18] text-white font-raleway text-[10px] font-bold tracking-widest rounded-full px-4 py-1.5 uppercase z-[5] shadow-md">
                    ⭐ Culto Principal
                </div>
                <?php endif; ?>

                <!-- número decorativo (dia do mês) -->
                <span class="absolute top-2.5 right-5 font-cinzel text-[90px] font-black leading-none pointer-events-none select-none <?php echo $c['numColor']; ?>">
                    <?php echo $diaMes; ?>
                </span>

                <!-- Ícone -->
                <div class="w-[52px] h-[52px] rounded-full flex items-center justify-center mb-5 relative z-[1] <?php echo $c['iconBg']; ?> <?php echo $c['iconColor']; ?>">
                    <?php echo $icones[$dia]; ?>
                </div>

                <!-- Tipo -->
                <div class="uppercase tracking-[3px] text-[10px] font-bold mb-1.5 relative z-[1] <?php echo $c['tipoColor']; ?>">
                    <?php echo htmlspecialchars($culto['tipo']); ?>
                </div>

                <!-- Dia -->
                <div class="font-cinzel text-[19px] text-titulo font-bold mb-0.5 relative z-[1]">
                    <?php echo htmlspecialchars($culto['dia']); ?>
                </div>

                <!-- Horário -->
                <div class="font-cinzel text-[52px] font-black leading-[1.05] mb-3.5 relative z-[1] <?php echo $c['horColor']; ?>">
                    <?php echo htmlspecialchars($culto['horario']); ?>
                </div>

                <!-- Descrição -->
                <p class="text-secundario text-[13px] leading-relaxed mb-5 min-h-[42px] relative z-[1]">
                    <?php echo htmlspecialchars($descs[$dia] ?? ''); ?>
                </p>

                <hr class="border-t border-black/[0.08] mb-3.5">

                <!-- Rodapé do card -->
                <div class="flex items-center gap-2 text-terciario text-xs font-medium">
                    <span class="w-1.5 h-1.5 rounded-full shrink-0 <?php echo $c['dotBg']; ?>"></span>
                    toda semana
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- CTA WhatsApp premium -->
        <div class="text-center">
            <a href="<?php echo htmlspecialchars($site['whatsapp_link']); ?>"
               target="_blank" rel="noopener noreferrer"
               class="group inline-flex items-center gap-2.5 bg-gradient-to-r from-dourado to-dourado-escuro text-titulo rounded-full px-10 py-4.5 font-raleway font-bold text-[15px] transition-all duration-300 hover:shadow-xl hover:-translate-y-1 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 shrink-0 group-hover:scale-110 transition-transform" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z"/></svg>
                <span>Falar pelo WhatsApp</span>
            </a>
        </div>

    </div>
</section>
