<?php
require_once __DIR__ . '/../config/site.php';
require_once __DIR__ . '/../config/colors.php';

$heroImages = [
    'Screenshot_2', 'Screenshot_3', 'Screenshot_5', 'Screenshot_6',
    'Screenshot_7', 'Screenshot_8', 'Screenshot_9', 'Screenshot_11',
    'Screenshot_13', 'Screenshot_15', 'Screenshot_17', 'Screenshot_18',
    'Screenshot_23', 'Screenshot_26', 'Screenshot_28', 'Screenshot_29',
    'Screenshot_30', 'Screenshot_31', 'Screenshot_32',
];
$totalSlides = count($heroImages);
?>

<section class="mt-[76px] min-h-[600px] relative flex items-center justify-center overflow-hidden bg-gradient-to-br from-azul-escuro via-azul to-azul-claro">

  <div id="hero-slides" class="absolute inset-0 z-0 overflow-hidden">
    <?php foreach ($heroImages as $i => $img): ?>
    <div class="hero-slide <?php echo $i === 0 ? 'ativo' : ''; ?>"
         style="background-image:url('assets/images/hero/<?php echo $img; ?>.webp'); opacity:<?php echo $i === 0 ? '1' : '0'; ?>;">
    </div>
    <?php endforeach; ?>
  </div>

  <div class="absolute inset-0 bg-gradient-to-br from-[rgba(26,47,160,0.68)] to-[rgba(10,20,80,0.75)] z-[1]"></div>

  <div class="absolute inset-0 z-[1] overflow-hidden">
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-dourado/5 rounded-full blur-3xl opacity-60"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-vermelho/5 rounded-full blur-3xl opacity-40"></div>
  </div>

  <div class="absolute bottom-0 left-0 right-0 h-20 bg-white z-[2]"
       style="clip-path:polygon(0% 40%, 100% 20%, 100% 100%, 0% 100%);"></div>

  <div class="relative z-[3] text-center px-5 pt-20 pb-[120px] max-w-[1000px] mx-auto">

    <div class="animate-fadeDown inline-flex items-center gap-2 mb-8 px-4 py-2 rounded-full border border-dourado/40 bg-white/[0.08] backdrop-blur-sm text-dourado-claro text-[12px] tracking-[3px] uppercase font-medium hover:border-dourado/70 transition-all">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4">
        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
        <circle cx="12" cy="10" r="3"/>
      </svg>
      <?php echo htmlspecialchars($site['localizacao']['cidade']); ?> · <?php echo htmlspecialchars($site['localizacao']['estado']); ?>
    </div>

    <h1 class="animate-fadeDown font-cinzel text-[clamp(3rem,9vw,5rem)] font-black text-white leading-[1.1] mb-3 drop-shadow-lg">
      Igreja da<br>
      <span class="text-transparent bg-clip-text bg-gradient-to-r from-dourado via-dourado-claro to-dourado">Vitória</span>
    </h1>

    <p class="animate-fadeUp text-white/80 text-[14px] tracking-[3.5px] uppercase font-medium mb-12 drop-shadow">
      <?php echo htmlspecialchars($site['slogan']); ?>
    </p>

    <div class="animate-fadeUp flex gap-4 justify-center flex-wrap">
      <a href="#endereco" class="group relative px-10 py-4 rounded-full font-bold text-sm text-titulo bg-gradient-to-br from-dourado to-dourado-escuro shadow-lg transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl overflow-hidden">
        <span class="relative z-10 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
            <circle cx="12" cy="10" r="3"/>
          </svg>
          Venha nos Visitar
        </span>
        <div class="absolute inset-0 bg-gradient-to-br from-dourado-claro to-dourado opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      </a>
      <a href="#cultos" class="group px-10 py-4 rounded-full font-semibold text-sm text-white bg-white/10 backdrop-blur-sm border-2 border-white/30 transition-all duration-300 hover:border-dourado hover:bg-dourado/20 hover:-translate-y-1.5 hover:shadow-lg">
        <span class="flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
            <line x1="16" y1="2" x2="16" y2="6"/>
            <line x1="8" y1="2" x2="8" y2="6"/>
            <line x1="3" y1="10" x2="21" y2="10"/>
          </svg>
          Nossos Cultos
        </span>
      </a>
    </div>
  </div>

  <div class="absolute bottom-[100px] left-0 right-0 flex justify-center gap-2 z-[4]">
    <?php for ($i = 0; $i < $totalSlides; $i++): ?>
    <button class="hero-dot w-2.5 h-2.5 rounded-full border-none cursor-pointer p-0 transition-all duration-300 backdrop-blur-sm"
            style="background:<?php echo $i === 0 ? '#D4A844' : 'rgba(255,255,255,0.25)'; ?>; transform:<?php echo $i === 0 ? 'scaleX(1.8)' : 'scaleX(1)'; ?>;"
            aria-label="Ir para slide <?php echo $i + 1; ?>">
    </button>
    <?php endfor; ?>
  </div>

</section>