<?php
require_once __DIR__ . '/../config/site.php';
require_once __DIR__ . '/../config/colors.php';
?>

<header id="header" class="fixed top-0 w-full bg-gradient-to-r from-[#111009] to-[#1a1814] shadow-sm border-b border-dourado/20 z-50 transition-all duration-300 scrolled:shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <!-- Logo e Branding -->
            <div class="flex items-center gap-3 group cursor-pointer transition-all">
                <div class="relative">
                    <img src="assets/images/logo/logotopo.png"
                        alt="Igreja da Vitória"
                        class="h-14 w-auto object-contain group-hover:drop-shadow-lg transition-all">
                </div>
                <div class="border-l border-dourado/30 pl-3">
                    <div class="font-cinzel font-bold text-lg text-white group-hover:text-dourado transition-colors">
                        <?php echo htmlspecialchars($site['nome']); ?>
                    </div>
                    <div class="text-xs text-dourado/80 font-medium">
                        <?php echo htmlspecialchars($site['localizacao']['cidade']); ?> · <?php echo htmlspecialchars($site['localizacao']['estado']); ?>
                    </div>
                </div>
            </div>

            <!-- Nav Desktop -->
            <nav class="hidden md:flex items-center gap-1">
                <a href="#inicio" class="nav-link px-3 py-2 text-sm font-medium text-gray-200 transition-all duration-300 rounded-lg hover:text-dourado hover:bg-dourado/10 relative group">
                    Início
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-dourado to-dourado-claro scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left rounded-full"></span>
                </a>
                <a href="#cultos" class="nav-link px-3 py-2 text-sm font-medium text-gray-200 transition-all duration-300 rounded-lg hover:text-dourado hover:bg-dourado/10 relative group">
                    Cultos
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-dourado to-dourado-claro scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left rounded-full"></span>
                </a>
                <a href="#nossa-visao" class="nav-link px-3 py-2 text-sm font-medium text-gray-200 transition-all duration-300 rounded-lg hover:text-dourado hover:bg-dourado/10 relative group">
                    Visão
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-dourado to-dourado-claro scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left rounded-full"></span>
                </a>
                <a href="#oracoes" class="nav-link px-3 py-2 text-sm font-medium text-gray-200 transition-all duration-300 rounded-lg hover:text-dourado hover:bg-dourado/10 relative group">
                    Orações
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-dourado to-dourado-claro scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left rounded-full"></span>
                </a>
                <a href="#ministerios" class="nav-link px-3 py-2 text-sm font-medium text-gray-200 transition-all duration-300 rounded-lg hover:text-dourado hover:bg-dourado/10 relative group">
                    Ministérios
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-dourado to-dourado-claro scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left rounded-full"></span>
                </a>
                <a href="javascript:void(0);" onclick="redirectToWhatsApp(event)" class="nav-link px-3 py-2 text-sm font-medium text-gray-200 transition-all duration-300 rounded-lg hover:text-dourado hover:bg-dourado/10 relative group cursor-pointer">
                    Contato
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-dourado to-dourado-claro scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left rounded-full"></span>
                </a>
            </nav>

            <!-- Botão Contato + Oferta + Menu Mobile Toggle -->
            <div class="flex items-center gap-3">
                <a href="javascript:void(0);" onclick="redirectToWhatsApp(event)" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-vermelho to-vermelho-escuro text-white font-medium text-sm transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 group cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 group-hover:scale-110 transition-transform">
                        <path d="M17.507 14.828l-.469 2.04a.997.997 0 01-.979.826c-.556 0-1.097-.086-1.617-.254-5.107-1.635-9.455-5.983-11.09-11.09-.168-.52-.254-1.061-.254-1.617a.997.997 0 01.826-.979l2.04-.469a.998.998 0 01.978.263l1.295 1.88a.998.998 0 01.063 1.083l-.711 1.42c.69 1.653 2.118 3.082 3.77 3.77l1.42-.711a.998.998 0 011.083.063l1.88 1.295a.997.997 0 01.263.978z" />
                    </svg>
                    Contato
                </a>

                <a href="#dizimos" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-vermelho to-vermelho-escuro text-white font-medium text-sm transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5 group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4 group-hover:scale-110 transition-transform">
                        <circle cx="12" cy="12" r="1" />
                        <circle cx="19" cy="12" r="1" />
                        <circle cx="5" cy="12" r="1" />
                    </svg>
                    Oferta
                </a>

                <button id="menu-btn" aria-label="Abrir menu" aria-expanded="false" aria-controls="mobile-menu" class="md:hidden p-2 rounded-lg text-white hover:bg-dourado/20 transition-all" onclick="toggleMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu Mobile (oculto por padrão) -->
        <div id="mobile-menu" class="hidden md:hidden py-4 border-t border-dourado/20 bg-gradient-to-b from-[#1a1814] to-[#111009]">
            <div class="flex flex-col gap-1">
                <a href="#inicio" class="px-4 py-2.5 rounded-lg text-sm font-medium text-gray-200 transition-all hover:text-dourado hover:bg-dourado/10">Início</a>
                <a href="#cultos" class="px-4 py-2.5 rounded-lg text-sm font-medium text-gray-200 transition-all hover:text-dourado hover:bg-dourado/10">Cultos</a>
                <a href="#nossa-visao" class="px-4 py-2.5 rounded-lg text-sm font-medium text-gray-200 transition-all hover:text-dourado hover:bg-dourado/10">Visão</a>
                <a href="#oracoes" class="px-4 py-2.5 rounded-lg text-sm font-medium text-gray-200 transition-all hover:text-dourado hover:bg-dourado/10">Orações</a>
                <a href="#ministerios" class="px-4 py-2.5 rounded-lg text-sm font-medium text-gray-200 transition-all hover:text-dourado hover:bg-dourado/10">Ministérios</a>
                <a href="#endereco" class="px-4 py-2.5 rounded-lg text-sm font-medium text-gray-200 transition-all hover:text-dourado hover:bg-dourado/10">Localização</a>
                <div class="flex gap-2 mt-3 px-2">
                    <a href="javascript:void(0);" onclick="redirectToWhatsApp(event)" class="flex-1 px-3 py-2.5 rounded-full bg-gradient-to-r from-vermelho to-vermelho-escuro text-white font-medium text-xs text-center transition-all hover:shadow-lg cursor-pointer">Contato</a>
                    <a href="#dizimos" class="flex-1 px-3 py-2.5 rounded-full bg-gradient-to-r from-vermelho to-vermelho-escuro text-white font-medium text-xs text-center transition-all hover:shadow-lg">Oferta</a>
                </div>
            </div>
        </div>
    </div>
</header>