<?php
require_once __DIR__ . '/../config/site.php';

$grupos = [
    [
        'num'        => '01',
        'nome'       => 'Oração Intercessória',
        'tipo'       => 'Intercessão',
        'dia'        => 'Segunda-feira',
        'hora'       => '20h00',
        'duracao'    => '1h 30min',
        'local'      => 'Sala de Oração',
        'descricao'  => 'Intercedemos pela Igreja e pelas necessidades espirituais de toda a comunidade.',
        'corBorder'  => 'border-t-dourado',
        'corNum'     => 'text-dourado/[0.06]',
        'corIconBg'  => 'bg-dourado/10',
        'corIcon'    => 'text-dourado',
        'corTipo'    => 'text-dourado',
        'corBtn'     => 'bg-dourado/10 text-dourado border border-dourado/30 hover:bg-dourado/20',
        'whatsMsg'   => 'Gostaria+de+participar+da+Oração+Intercessória',
        'icone'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-[22px] h-[22px]" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>',
    ],
    [
        'num'        => '02',
        'nome'       => 'Vigília de Oração',
        'tipo'       => 'Adoração & Intercessão',
        'dia'        => 'Sexta-feira',
        'hora'       => '21h00',
        'duracao'    => 'Noite inteira',
        'local'      => 'Templo Principal',
        'descricao'  => 'Noite de adoração profunda, comunhão e intercessão poderosa diante do Senhor.',
        'corBorder'  => 'border-t-azul',
        'corNum'     => 'text-azul/[0.06]',
        'corIconBg'  => 'bg-azul/10',
        'corIcon'    => 'text-azul',
        'corTipo'    => 'text-azul',
        'corBtn'     => 'bg-azul/10 text-azul border border-azul/30 hover:bg-azul/20',
        'whatsMsg'   => 'Gostaria+de+participar+da+Vigília+de+Oração',
        'icone'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-[22px] h-[22px]" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>',
    ],
    [
        'num'        => '03',
        'nome'       => 'Oração Matinal',
        'tipo'       => 'Busca ao Amanhecer',
        'dia'        => 'Quarta-feira',
        'hora'       => '06h00',
        'duracao'    => '1h',
        'local'      => 'Sala de Oração',
        'descricao'  => 'Comunhão profunda com Deus ao amanhecer, buscando direção e bênção para o dia.',
        'corBorder'  => 'border-t-vermelho',
        'corNum'     => 'text-vermelho/[0.06]',
        'corIconBg'  => 'bg-vermelho/10',
        'corIcon'    => 'text-vermelho',
        'corTipo'    => 'text-vermelho',
        'corBtn'     => 'bg-vermelho/10 text-vermelho border border-vermelho/30 hover:bg-vermelho/20',
        'whatsMsg'   => 'Gostaria+de+participar+da+Oração+Matinal',
        'icone'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-[22px] h-[22px]" aria-hidden="true"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>',
    ],
    [
        'num'        => '04',
        'nome'       => 'Círculo de Oração',
        'tipo'       => 'Comunidade',
        'dia'        => 'Quinta-feira',
        'hora'       => '19h30',
        'duracao'    => '1h 30min',
        'local'      => 'Ministério Infantil',
        'descricao'  => 'Intercessão compartilhada pelos pedidos especiais de toda a congregação.',
        'corBorder'  => 'border-t-dourado',
        'corNum'     => 'text-dourado/[0.06]',
        'corIconBg'  => 'bg-dourado/10',
        'corIcon'    => 'text-dourado',
        'corTipo'    => 'text-dourado',
        'corBtn'     => 'bg-dourado/10 text-dourado border border-dourado/30 hover:bg-dourado/20',
        'whatsMsg'   => 'Gostaria+de+participar+do+Círculo+de+Oração',
        'icone'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-[22px] h-[22px]" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
    ],
];
?>

<style>
    .campo-erro {
        border-color: var(--vermelho) !important;
        box-shadow: 0 0 0 2px color-mix(in srgb, var(--vermelho) 15%, transparent) !important;
    }

    .msg-erro {
        display: none;
        color: var(--cor-vermelho);
        font-size: 12px;
        margin-top: 4px;
        font-weight: 600;
    }

    .msg-erro.visivel {
        display: block;
    }
</style>

<section class="bg-white py-28 font-raleway" id="oracoes">
    <div class="max-w-[1200px] mx-auto px-6">

        <!-- Cabeçalho -->
        <div class="animar-entrada text-center mb-20">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-dourado/10 border border-dourado/30 mb-6">
                <span class="text-dourado font-cinzel text-[11px] font-bold tracking-widest uppercase">✦ ORAÇÃO</span>
            </div>
            <h2 class="font-cinzel text-titulo text-[clamp(2rem,5vw,3.2rem)] font-black tracking-tight mb-5 leading-tight">
                Grupos de <span class="text-dourado">Oração</span>
            </h2>
            <p class="text-secundario text-[15px] leading-relaxed max-w-2xl mx-auto font-medium">
                Junte-se a uma comunidade que intercede com fervor.<br>
                Você pode compartilhar seus pedidos — oramos uns pelos outros.
            </p>
        </div>

        <!-- Grid de Grupos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
            <?php foreach ($grupos as $idx => $grupo): ?>
                <div class="animar-entrada group relative bg-white rounded-2xl shadow-lg p-9 overflow-hidden
                        border border-black/[0.06] border-t-4 <?php echo $grupo['corBorder']; ?>
                        transition-all duration-500 hover:shadow-2xl hover:-translate-y-2"
                    style="transition-delay: <?php echo $idx * 120; ?>ms">

                    <div class="absolute top-0 right-0 w-28 h-28 rounded-full blur-3xl opacity-30 group-hover:opacity-60 transition-opacity duration-500 <?php echo $grupo['corIconBg']; ?>"></div>

                    <span class="absolute top-2.5 right-5 font-cinzel text-[90px] font-black leading-none pointer-events-none select-none <?php echo $grupo['corNum']; ?>">
                        <?php echo $grupo['num']; ?>
                    </span>

                    <div class="icone-grupo w-[52px] h-[52px] rounded-full flex items-center justify-center mb-5 relative z-[1]
                            group-hover:scale-110 transition-transform duration-300
                            <?php echo $grupo['corIconBg']; ?> <?php echo $grupo['corIcon']; ?>">
                        <?php echo $grupo['icone']; ?>
                    </div>

                    <div class="uppercase tracking-[3px] text-[10px] font-bold mb-1.5 relative z-[1] <?php echo $grupo['corTipo']; ?>">
                        <?php echo htmlspecialchars($grupo['tipo']); ?>
                    </div>

                    <div class="font-cinzel text-[18px] text-titulo font-bold mb-4 leading-snug relative z-[1]">
                        <?php echo htmlspecialchars($grupo['nome']); ?>
                    </div>

                    <p class="text-secundario text-[13px] leading-relaxed mb-5 min-h-[52px] relative z-[1]">
                        <?php echo htmlspecialchars($grupo['descricao']); ?>
                    </p>

                    <div class="space-y-2.5 mb-5 relative z-[1]">
                        <div class="flex items-center gap-2.5 text-[13px] text-corpo">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4 shrink-0 <?php echo $grupo['corIcon']; ?>" aria-hidden="true">
                                <rect x="3" y="4" width="18" height="18" rx="2" />
                                <line x1="16" y1="2" x2="16" y2="6" />
                                <line x1="8" y1="2" x2="8" y2="6" />
                                <line x1="3" y1="10" x2="21" y2="10" />
                            </svg>
                            <span><?php echo htmlspecialchars($grupo['dia']); ?></span>
                        </div>
                        <div class="flex items-center gap-2.5 text-[13px] text-corpo">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4 shrink-0 <?php echo $grupo['corIcon']; ?>" aria-hidden="true">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                            <span><?php echo htmlspecialchars($grupo['hora']); ?> <span class="text-terciario">(<?php echo htmlspecialchars($grupo['duracao']); ?>)</span></span>
                        </div>
                        <div class="flex items-center gap-2.5 text-[13px] text-corpo">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4 shrink-0 <?php echo $grupo['corIcon']; ?>" aria-hidden="true">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <span><?php echo htmlspecialchars($grupo['local']); ?></span>
                        </div>
                    </div>

                    <hr class="border-t border-black/[0.08] mb-4">

                    <a href="<?php echo htmlspecialchars($site['whatsapp_link']); ?>?text=<?php echo htmlspecialchars($grupo['whatsMsg']); ?>"
                        target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center w-full gap-2 px-4 py-2.5 rounded-full text-white
                          font-raleway font-bold text-[13px] transition-all duration-300 hover:shadow-lg hover:scale-105 relative z-[1]
                          <?php
                            $corFundo = '';
                            if (strpos($grupo['corBtn'], 'dourado') !== false) $corFundo = 'bg-dourado hover:bg-dourado-escuro shadow-dourado';
                            elseif (strpos($grupo['corBtn'], 'azul') !== false) $corFundo = 'bg-azul hover:bg-azul-escuro shadow-azul';
                            elseif (strpos($grupo['corBtn'], 'vermelho') !== false) $corFundo = 'bg-vermelho hover:bg-vermelho-escuro shadow-vermelho';
                            echo $corFundo;
                            ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 shrink-0" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" />
                        </svg>
                        Participar
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Formulário de Pedido de Oração -->
        <div class="animar-entrada bg-white rounded-2xl shadow-lg border border-black/[0.06] border-t-4 border-t-dourado p-9 md:p-12 mb-16"
            style="transition-delay: 100ms;">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

                <!-- Coluna de texto -->
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-dourado/10 border border-dourado/30 mb-6">
                        <span class="text-dourado font-cinzel text-[11px] font-bold tracking-widest uppercase">✦ PEDIDO DE ORAÇÃO</span>
                    </div>
                    <h3 class="font-cinzel text-titulo text-[clamp(1.5rem,3vw,2.2rem)] font-black tracking-tight mb-5 leading-tight">
                        Deixe seu<br>Pedido
                    </h3>
                    <p class="text-corpo text-[15px] leading-[1.8] mb-6">
                        Compartilhe suas necessidades com nossa comunidade. Oraremos por você e sua família com fervor e dedicação.
                    </p>
                    <div class="bg-gradient-to-br from-dourado/8 to-dourado/3 border-l-4 border-dourado rounded-lg py-5 px-5">
                        <p class="italic text-[14px] leading-[1.8] text-corpo font-medium">
                            "A oração eficaz do justo pode muito." — Tiago 5:16
                        </p>
                    </div>
                </div>

                <!-- Formulário -->
                <div>
                    <form id="form-pedido-oracao" novalidate>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label class="block text-[13px] font-semibold text-titulo mb-2" for="oracao-nome">Seu Nome <span class="text-vermelho">*</span></label>
                                <input id="oracao-nome" type="text" placeholder="Nome completo"
                                    class="w-full px-4 py-3 border border-black/[0.12] rounded-xl text-corpo text-[14px]
                                              focus:outline-none focus:border-dourado focus:ring-2 focus:ring-dourado/10
                                              transition-all bg-white" required>
                                <span class="msg-erro" id="erro-nome">Preencha seu nome.</span>
                            </div>
                            <div>
                                <label class="block text-[13px] font-semibold text-titulo mb-2" for="oracao-telefone">WhatsApp</label>
                                <input id="oracao-telefone" type="tel" placeholder="(62) 9 0000-0000"
                                    class="w-full px-4 py-3 border border-black/[0.12] rounded-xl text-corpo text-[14px]
                                              focus:outline-none focus:border-dourado focus:ring-2 focus:ring-dourado/10
                                              transition-all bg-white">
                            </div>
                        </div>
                        <div class="mb-5">
                            <label class="block text-[13px] font-semibold text-titulo mb-2" for="oracao-assunto">Assunto <span class="text-vermelho">*</span></label>
                            <input id="oracao-assunto" type="text" placeholder="Ex: Pedido de cura, orientação, provisão..."
                                class="w-full px-4 py-3 border border-black/[0.12] rounded-xl text-corpo text-[14px]
                                          focus:outline-none focus:border-dourado focus:ring-2 focus:ring-dourado/10
                                          transition-all bg-white" required>
                            <span class="msg-erro" id="erro-assunto">Informe o assunto do pedido.</span>
                        </div>
                        <div class="mb-5">
                            <label class="block text-[13px] font-semibold text-titulo mb-2" for="oracao-mensagem">Descreva seu Pedido <span class="text-vermelho">*</span></label>
                            <textarea id="oracao-mensagem" rows="4" placeholder="Compartilhe seus anseios e necessidades..."
                                class="w-full px-4 py-3 border border-black/[0.12] rounded-xl text-corpo text-[14px]
                                             focus:outline-none focus:border-dourado focus:ring-2 focus:ring-dourado/10
                                             transition-all bg-white resize-none" required></textarea>
                            <span class="msg-erro" id="erro-mensagem">Descreva seu pedido de oração.</span>
                        </div>

                        <div id="oracao-sucesso"
                            class="hidden items-center gap-3 p-4 mb-5 rounded-xl bg-dourado/10 border border-dourado/30 text-dourado-escuro text-[14px] font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-5 h-5 shrink-0">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            Pedido enviado! Oraremos por você. ✝
                        </div>

                        <div class="flex gap-3 pt-2">
                            <button type="submit"
                                class="flex-1 inline-flex items-center justify-center gap-2
                                           bg-gradient-to-r from-dourado to-dourado-escuro text-titulo
                                           rounded-full px-8 py-3 font-raleway font-bold text-[14px]
                                           transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 shrink-0" aria-hidden="true">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" />
                                </svg>
                                Enviar via WhatsApp
                            </button>
                            <button type="reset" id="btn-limpar-oracao"
                                class="px-6 py-3 border border-black/[0.12] text-secundario
                                           font-raleway font-semibold text-[14px] rounded-full
                                           hover:bg-bege transition-colors duration-200">
                                Limpar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

