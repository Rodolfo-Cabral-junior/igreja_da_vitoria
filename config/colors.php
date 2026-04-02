<?php
/**
 * Paleta de cores e variáveis CSS da Igreja da Vitória
 * Centraliza toda a identidade visual em constantes PHP
 */

// ============================================================
// CONSTANTES DE COR
// ============================================================

// Tons de Azul (cor primária)
define('COR_AZUL', '#1A2FA0');           // Azul principal
define('COR_AZUL_ESCURO', '#111f6e');    // Azul escuro (gradiente mais escuro)
define('COR_AZUL_CLARO', '#2a44c8');     // Azul claro (gradiente mais claro)

// Tons de Vermelho (cor de destaque)
define('COR_VERMELHO', '#CC1020');       // Vermelho principal
define('COR_VERMELHO_ESCURO', '#9e0b18'); // Vermelho escuro (hover/ativo)

// Tons de Dourado (cor de acento)
define('COR_DOURADO', '#D4A844');        // Dourado principal
define('COR_DOURADO_CLARO', '#e8c870');  // Dourado claro
define('COR_DOURADO_ESCURO', '#a07a28'); // Dourado escuro

// Tons Neutros
define('COR_PRETO', '#0d0d0d');          // Preto (footer, backgrounds sombrios)
define('COR_BRANCO', '#ffffff');         // Branco (fundo principal)

// Tons de Cinza (textos secundários)
define('COR_CINZA_CLARO', '#f5f5f5');    // Cinza muito claro (backgrounds)
define('COR_CINZA_MEDIO', '#9ca3af');    // Cinza médio (textos secundários)
define('COR_CINZA_ESCURO', '#4b5563');   // Cinza escuro (textos terciários)

// ============================================================
// FUNÇÃO: Gera variáveis CSS :root
// ============================================================

/**
 * Retorna string com as variáveis CSS customizadas para o Tailwind
 * Uso: <style><?php echo getCssVars(); ?></style> no <head>
 */
function getCssVars() {
    $vars = [
        '--azul' => COR_AZUL,
        '--azul-escuro' => COR_AZUL_ESCURO,
        '--azul-claro' => COR_AZUL_CLARO,
        '--vermelho' => COR_VERMELHO,
        '--vermelho-escuro' => COR_VERMELHO_ESCURO,
        '--dourado' => COR_DOURADO,
        '--dourado-claro' => COR_DOURADO_CLARO,
        '--dourado-escuro' => COR_DOURADO_ESCURO,
        '--preto' => COR_PRETO,
        '--branco' => COR_BRANCO,
        '--cinza-claro' => COR_CINZA_CLARO,
        '--cinza-medio' => COR_CINZA_MEDIO,
        '--cinza-escuro' => COR_CINZA_ESCURO,
    ];
    
    $css = ':root {' . PHP_EOL;
    foreach ($vars as $nome => $valor) {
        $css .= '  ' . $nome . ': ' . $valor . ';' . PHP_EOL;
    }
    $css .= '}';
    
    return $css;
}

/**
 * Função auxiliar para obter uma cor por nome
 * Uso: obter_cor('azul') retorna #1A2FA0
 */
function obter_cor($nome) {
    $cores = [
        'azul' => COR_AZUL,
        'azul-escuro' => COR_AZUL_ESCURO,
        'azul-claro' => COR_AZUL_CLARO,
        'vermelho' => COR_VERMELHO,
        'vermelho-escuro' => COR_VERMELHO_ESCURO,
        'dourado' => COR_DOURADO,
        'dourado-claro' => COR_DOURADO_CLARO,
        'dourado-escuro' => COR_DOURADO_ESCURO,
        'preto' => COR_PRETO,
        'branco' => COR_BRANCO,
        'cinza-claro' => COR_CINZA_CLARO,
        'cinza-medio' => COR_CINZA_MEDIO,
        'cinza-escuro' => COR_CINZA_ESCURO,
    ];
    
    return $cores[$nome] ?? COR_BRANCO;
}
?>
