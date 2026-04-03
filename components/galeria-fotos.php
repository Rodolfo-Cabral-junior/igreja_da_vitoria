<?php
require_once __DIR__ . '/../config/site.php';
require_once __DIR__ . '/../config/colors.php';

$fotos = [
    ['url' => 'assets/images/galeria/foto01.webp', 'titulo' => 'Louvor e Comunhão', 'descricao' => 'Momentos de louvor ungido'],
    ['url' => 'assets/images/galeria/foto02.webp', 'titulo' => 'Culto em Comunidade', 'descricao' => 'Igreja unida em Cristo'],
    ['url' => 'assets/images/galeria/foto03.webp', 'titulo' => 'Ministério Pastoral', 'descricao' => 'Liderança e orientação'],
    ['url' => 'assets/images/galeria/foto04.webp', 'titulo' => 'Oração em Unidade', 'descricao' => 'Intercedendo juntos'],
    ['url' => 'assets/images/galeria/foto05.webp', 'titulo' => 'Comunidade de Fé', 'descricao' => 'Crescimento espiritual'],
    ['url' => 'assets/images/galeria/foto06.webp', 'titulo' => 'Celebração da Palavra', 'descricao' => 'Semeadura e colheita'],
    ['url' => 'assets/images/galeria/foto07.webp', 'titulo' => 'Evento Especial', 'descricao' => 'Momento memorável'],
    ['url' => 'assets/images/galeria/foto08.webp', 'titulo' => 'Louvor Ungido', 'descricao' => 'Adoração do coração'],
    ['url' => 'assets/images/galeria/foto09.webp', 'titulo' => 'Ministério de Vida', 'descricao' => 'Transformação em Cristo'],
    ['url' => 'assets/images/galeria/foto10.webp', 'titulo' => 'Comunhão e Partilha', 'descricao' => 'Convivência fraterna'],
    ['url' => 'assets/images/galeria/foto11.webp', 'titulo' => 'Crescimento Espiritual', 'descricao' => 'Jornada de fé'],
    ['url' => 'assets/images/galeria/foto12.webp', 'titulo' => 'Bênção e Graça', 'descricao' => 'Missão realizada'],
];

// Filtra apenas as fotos cujo arquivo existe — evita imagens quebradas
$fotos = array_filter($fotos, fn($f) => file_exists(__DIR__ . '/../' . $f['url']));
?>

<style>
  .galeria-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
  }
  .galeria-card {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    height: 280px;
    box-shadow: 0 4px 15px rgba(26, 47, 160, 0.1);
    transition: all 0.3s ease;
  }
  .galeria-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(26, 47, 160, 0.2);
  }
  .galeria-imagen {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }
  .galeria-card:hover .galeria-imagen {
    transform: scale(1.08);
  }
  .galeria-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(26, 47, 160, 0.7) 0%, rgba(204, 16, 32, 0.7) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 24px;
  }
  .galeria-card:hover .galeria-overlay { opacity: 1; }
  .galeria-titulo { color: white; font-size: 18px; font-weight: 700; margin-bottom: 8px; }
  .galeria-descricao { color: rgba(255,255,255,0.9); font-size: 14px; }
  @media (max-width: 768px) {
    .galeria-grid { grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; }
    .galeria-card { height: 220px; }
  }
</style>

<section id="galeria-fotos" class="bg-creme py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="text-center mb-12">
      <span class="text-dourado text-xs font-bold tracking-widest uppercase">
        ✦ Memórias
      </span>
      <h2 class="text-azul text-4xl font-bold mt-3">
        Galeria de Fotos
      </h2>
      <p class="text-gray-600 mt-3 max-w-2xl mx-auto">
        Reviva os momentos especiais vividos em comunhão com a Igreja da Vitória
      </p>
    </div>

    <div class="galeria-grid">
      <?php foreach ($fotos as $foto): ?>
        <div class="galeria-card">
          <img src="<?php echo htmlspecialchars($foto['url']); ?>"
               alt="<?php echo htmlspecialchars($foto['titulo']); ?>"
               class="galeria-imagen"
               loading="lazy">
          <div class="galeria-overlay">
            <div class="galeria-titulo"><?php echo htmlspecialchars($foto['titulo']); ?></div>
            <div class="galeria-descricao"><?php echo htmlspecialchars($foto['descricao']); ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-12">
      <a href="<?php echo htmlspecialchars($site['redes_sociais']['instagram']['url']); ?>"
         target="_blank" rel="noopener noreferrer"
         class="inline-block px-8 py-3 rounded-full bg-azul text-white font-medium shadow-[0_10px_25px_-5px_rgba(26,47,160,0.3)] transition-all duration-300 hover:-translate-y-1">
        📸 Veja mais no Instagram
      </a>
    </div>

  </div>
</section>