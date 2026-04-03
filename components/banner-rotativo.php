<?php
require_once __DIR__ . '/../config/site.php';
require_once __DIR__ . '/../config/colors.php';

$banners_webp = array_map(function ($banner) {
  $banner['imagem'] = preg_replace('/\.(jpeg|jpg|png)$/i', '.webp', $banner['imagem']);
  return $banner;
}, $banners);
?>

<style>
  .carousel-container {
    position: relative;
    width: 100%;
    height: 380px;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(26, 47, 160, 0.2);
  }

  .carousel-slide {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.8s ease-in-out;
    background-size: cover;
    background-position: center;
    background-color: #f5f5f5;
  }

  .carousel-slide.ativo {
    opacity: 1;
  }

  .carousel-controls {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
    z-index: 10;
  }

  .carousel-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid transparent;
  }

  .carousel-dot.ativo {
    background: white;
    transform: scale(1.2);
  }

  .carousel-dot:hover {
    background: rgba(255, 255, 255, 0.8);
  }

  .carousel-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 48px;
    height: 48px;
    background: rgba(26, 47, 160, 0.7);
    border: none;
    color: white;
    font-size: 24px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    transition: all 0.3s ease;
    border-radius: 50%;
  }

  .carousel-arrow:hover {
    background: rgba(26, 47, 160, 0.95);
    transform: translateY(-50%) scale(1.1);
  }

  .carousel-arrow.prev {
    left: 15px;
  }

  .carousel-arrow.next {
    right: 15px;
  }

  @media (max-width: 768px) {
    .carousel-container {
      height: 280px;
    }

    .carousel-arrow {
      width: 40px;
      height: 40px;
      font-size: 18px;
    }
  }
</style>

<section id="banner-rotativo" class="py-12">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="text-center mb-8">
      <span class="text-dourado text-xs font-bold tracking-widest uppercase">
        ✦ Galeria de Momentos
      </span>
      <h2 class="text-azul text-4xl font-bold mt-3">
        Nossos Eventos & Celebrações
      </h2>
      <p class="text-gray-600 mt-3 max-w-2xl mx-auto">
        Veja os momentos especiais de louvor, celebrações e comunhão da Igreja da Vitória
      </p>
    </div>

    <div class="carousel-container">

      <?php foreach ($banners_webp as $i => $banner): ?>
        <div
          class="carousel-slide<?php echo $i === 0 ? ' ativo' : ''; ?>"
          style="background-image: url('<?php echo htmlspecialchars($banner['imagem']); ?>');"
          role="img"
          aria-label="<?php echo htmlspecialchars($banner['alt']); ?>">
        </div>
      <?php endforeach; ?>

      <button class="carousel-arrow prev" data-carousel-prev aria-label="Slide anterior" title="Slide anterior">❮</button>
      <button class="carousel-arrow next" data-carousel-next aria-label="Próximo slide" title="Próximo slide">❯</button>

      <div class="carousel-controls">
        <?php foreach ($banners_webp as $i => $banner): ?>
          <button
            class="carousel-dot<?php echo $i === 0 ? ' ativo' : ''; ?>"
            data-carousel-dot="<?php echo $i; ?>"
            aria-label="Slide <?php echo $i + 1; ?>">
          </button>
        <?php endforeach; ?>
      </div>

    </div>

  </div>
</section>