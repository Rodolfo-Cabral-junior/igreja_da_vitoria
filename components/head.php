<?php
require_once __DIR__ . '/../config/site.php';
require_once __DIR__ . '/../config/colors.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($site['slogan']); ?>">
    <meta name="theme-color" content="<?php echo COR_AZUL; ?>">

    <!-- SEO -->
    <meta name="robots" content="index, follow">
    <meta name="author" content="Cab@lves Tecnologia">

    <!-- Open Graph (compartilhamento em redes sociais) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($site['seo']['title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($site['seo']['description']); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($site['seo']['og_image']); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($site['seo']['url']); ?>">
    <meta property="og:locale" content="pt_BR">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($site['seo']['title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($site['seo']['description']); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($site['seo']['og_image']); ?>">

    <title><?php echo htmlspecialchars($site['nome']); ?> — <?php echo htmlspecialchars($site['localizacao']['cidade']); ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/logo/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/logo/favicon-192x192.png">

    <!-- Google Fonts: Cinzel + Raleway -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;900&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- ✅ CSS compilado pelo Tailwind CLI (substitui o CDN) -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Leaflet CSS (Mapa Interativo) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css">

    <!-- Variáveis CSS + estilos que dependem de PHP -->
    <style>
        :root {
            --azul: <?php echo COR_AZUL; ?>;
            --azul-escuro: <?php echo COR_AZUL_ESCURO; ?>;
            --azul-claro: <?php echo COR_AZUL_CLARO; ?>;
            --vermelho: <?php echo COR_VERMELHO; ?>;
            --vermelho-dk: <?php echo COR_VERMELHO_ESCURO; ?>;
            --dourado: <?php echo COR_DOURADO; ?>;
            --dourado-dk: <?php echo COR_DOURADO_ESCURO; ?>;
            --branco: #FFFFFF;
            --cinza-bg: #F8F6F1;
            --escuro: #111111;
        }

        /* Animações de entrada por scroll */
        .animar-entrada {
            opacity: 0;
            transition: all 600ms cubic-bezier(0, 0, 0.2, 1);
        }

        .animar-entrada.visivel {
            opacity: 1;
        }

        /* Hero slideshow */
        .hero-slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1200ms ease-in-out;
        }

        .hero-slide.ativo {
            opacity: 1;
        }

        /* Nav link underline animado */
        .nav-link {
            position: relative;
            padding-bottom: 4px;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -4px;
            left: 0;
            background: var(--dourado);
            transition: width 300ms ease;
        }

        .nav-link:hover::after,
        .nav-link.nav-ativo::after {
            width: 100%;
        }

        .nav-link.nav-ativo {
            color: var(--dourado) !important;
        }

        /* Header sombra ao scroll */
        #header.scrolled {
            box-shadow: 0 4px 12px rgba(212, 168, 68, 0.15);
        }

        /* Animações keyframes */
        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeDown {
            animation: fadeDown 0.8s ease-out backwards;
        }

        .animate-fadeUp {
            animation: fadeUp 0.8s ease-out 0.2s backwards;
        }
    </style>

    <!-- Leaflet JS (Mapa Interativo) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>

    <!-- Schema.org — Church (JSON-LD) -->
    <script type="application/ld+json">
        <?php
        $schema = [
            '@context'    => 'https://schema.org',
            '@type'       => 'Church',
            'name'        => $site['nome'],
            'description' => $site['seo']['description'],
            'url'         => $site['seo']['url'],
            'telephone'   => $site['telefone'],
            'address'     => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $site['localizacao']['endereco_completo'],
                'addressLocality' => $site['localizacao']['cidade'],
                'addressRegion'   => $site['localizacao']['estado'],
                'addressCountry'  => $site['localizacao']['pais'],
            ],
            'geo' => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => $site['localizacao']['latitude'],
                'longitude' => $site['localizacao']['longitude'],
            ],
            'sameAs' => [
                $site['redes_sociais']['instagram']['url'],
                $site['redes_sociais']['youtube']['url'],
            ],
        ];
        echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        ?>
    </script>
</head>