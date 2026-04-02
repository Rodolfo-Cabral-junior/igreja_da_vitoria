<?php
require_once __DIR__ . '/../config/site.php';
require_once __DIR__ . '/../config/colors.php';
?>

<footer class="bg-[#111009] text-white">

    <!-- Seção Superior -->
    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">

                <!-- Coluna 1: Brand -->
                <div>
                    <div class="font-cinzel font-bold text-xl text-white mb-2">
                        <?php echo htmlspecialchars($site['nome']); ?>
                    </div>
                    <p class="text-xs text-dourado mb-4">
                        <?php echo htmlspecialchars($site['localizacao']['cidade']); ?> · <?php echo htmlspecialchars($site['localizacao']['estado']); ?>
                    </p>
                    <p class="text-sm leading-relaxed mb-6 opacity-80">
                        <?php echo htmlspecialchars($site['slogan']); ?>
                    </p>

                    <!-- Ícones Sociais — SVG inline -->
                    <div class="flex gap-4">

                        <!-- Instagram -->
                        <a href="<?php echo htmlspecialchars($site['redes_sociais']['instagram']['url']); ?>"
                            target="_blank" rel="noopener noreferrer"
                            aria-label="Instagram da Igreja da Vitória"
                            class="w-10 h-10 rounded-full bg-dourado/20 text-dourado-claro flex items-center justify-center transition-all duration-300 hover:scale-125 hover:bg-dourado/40">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-5 h-5">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                <circle cx="12" cy="12" r="4" />
                                <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none" />
                            </svg>
                        </a>

                        <!-- YouTube -->
                        <a href="<?php echo htmlspecialchars($site['redes_sociais']['youtube']['url']); ?>"
                            target="_blank" rel="noopener noreferrer"
                            aria-label="YouTube da Igreja da Vitória"
                            class="w-10 h-10 rounded-full bg-dourado/20 text-dourado-claro flex items-center justify-center transition-all duration-300 hover:scale-125 hover:bg-dourado/40">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="w-5 h-5">
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z" />
                                <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="currentColor" stroke="none" />
                            </svg>
                        </a>

                        <!-- WhatsApp -->
                        <a href="<?php echo htmlspecialchars($site['whatsapp_link']); ?>"
                            target="_blank" rel="noopener noreferrer"
                            aria-label="WhatsApp da Igreja da Vitória"
                            class="w-10 h-10 rounded-full bg-dourado/20 text-dourado-claro flex items-center justify-center transition-all duration-300 hover:scale-125 hover:bg-dourado/40">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413z" />
                            </svg>
                        </a>

                    </div>
                </div>

                <!-- Coluna 2: Institucional -->
                <div>
                    <h4 class="font-semibold text-lg text-white mb-6">Institucional</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#nossa-visao" class="text-white opacity-75 transition-all duration-300 hover:opacity-100 hover:text-dourado">Sobre a Igreja</a></li>
                        <li><a href="#nossa-visao" class="text-white opacity-75 transition-all duration-300 hover:opacity-100 hover:text-dourado">Nossa Visão</a></li>
                        <li><a href="#equipe-pastoral" class="text-white opacity-75 transition-all duration-300 hover:opacity-100 hover:text-dourado">Equipe Pastoral</a></li>
                        <li><a href="#endereco" class="text-white opacity-75 transition-all duration-300 hover:opacity-100 hover:text-dourado">Fale Conosco</a></li>
                    </ul>
                </div>

                <!-- Coluna 3: Contribua -->
                <div>
                    <h4 class="font-semibold text-lg text-white mb-6">Contribua</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#dizimos" class="text-white opacity-75 transition-all duration-300 hover:opacity-100 hover:text-dourado">Oferta Online</a></li>
                        <li><a href="#dizimos" class="text-white opacity-75 transition-all duration-300 hover:opacity-100 hover:text-dourado">Dízimos via Pix</a></li>
                        <li><a href="<?php echo htmlspecialchars($site['whatsapp_link']); ?>" target="_blank" rel="noopener noreferrer"
                                class="text-white opacity-75 transition-all duration-300 hover:opacity-100 hover:text-dourado">Seja um Parceiro</a></li>
                    </ul>
                </div>

                <!-- Coluna 4: Cultos -->
                <div>
                    <h4 class="font-semibold text-lg text-white mb-6">Cultos</h4>
                    <ul class="space-y-3 text-sm">
                        <?php foreach ($site['cultos'] as $culto): ?>
                            <li class="opacity-75 flex items-start gap-2">
                                <span class="mt-1 text-dourado">•</span>
                                <span>
                                    <?php echo htmlspecialchars($culto['dia']); ?> · <?php echo htmlspecialchars($culto['horario']); ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>

            <!-- Divider -->
            <div class="border-t border-dourado/20"></div>

        </div>
    </div>

    <!-- Seção Inferior: Copyright -->
    <div class="py-6 border-t border-dourado/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-xs opacity-70">
                <p>
                    © <?php echo htmlspecialchars($site['ano']); ?>
                    <?php echo htmlspecialchars($site['nome']); ?> —
                    <?php echo htmlspecialchars($site['localizacao']['endereco_completo']); ?>.
                    Todos os direitos reservados.
                </p>
                <p class="flex items-center gap-2">
                    Desenvolvimento por
                    <a href="#" class="flex items-center gap-1">
                        <img src="assets/images/footer/logo_cabr@lvesTecnologia.png" alt="Cab@lvesTecnologia" class="h-5 w-auto object-contain opacity-80 hover:opacity-100 transition-opacity">
                        <span class="text-dourado font-medium">Cab@lvesTecnologia</span>
                    </a>
                </p>
            </div>
        </div>
    </div>

</footer>