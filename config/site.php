<?php

/**
 * Configuração central da Igreja da Vitória
 * Todos os dados são centralizados aqui e utilizados em toda a aplicação
 */

$site = [
    // Dados básicos da igreja
    'nome' => 'Igreja da Vitória',
    'slogan' => 'Palavra boa · Louvor ungido · Muita Oração',
    'descricao' => 'Uma comunidade de fé comprometida com a Palavra de Deus, louvor genuíno e oração fervorosa.',

    // Localização
    'localizacao' => [
        'cidade' => 'Jaraguá',
        'estado' => 'Goiás',
        'pais' => 'Brasil',
        'endereco_completo' => 'Rua José M. Francisco q, 07 - LT 13 - Setor Aeroporto, Jaraguá - GO, 76330-000',
        'latitude' => -15.7614,
        'longitude' => -49.3283,
    ],

    // Liderança
    'pastor_titular' => [
        'nome' => 'Daniel Sardinha Pires',
        'titulo' => 'Pastor Presidente',
        'nome_formatado' => 'Pr. Daniel Sardinha Pires',
    ],

    // Programação de cultos
    'cultos' => [
        [
            'dia' => 'Terça-feira',
            'dia_semana' => 'Terça',
            'horario' => '19h30',
            'tipo' => 'Culto de Oração',
            'icone' => '🙏',
        ],
        [
            'dia' => 'Quinta-feira',
            'dia_semana' => 'Quinta',
            'horario' => '19h30',
            'tipo' => 'Culto da Palavra',
            'icone' => '📖',
        ],
        [
            'dia' => 'Domingo',
            'dia_semana' => 'Domingo',
            'horario' => '19h00',
            'tipo' => 'Culto Geral',
            'icone' => '✝️',
            'destaque' => true,
        ],
    ],

    // Contato direto
    'telefone' => '62 98480-5993',
    'telefone_internacional' => '5562984805993',
    'whatsapp_link' => 'https://wa.me/5562984805993',

    // Chave Pix
    'pix_chave' => '(62) 98480-5993',

    // Redes sociais
    'redes_sociais' => [
        'instagram' => [
            'usuario' => '@igvitoria.jaragua',
            'url' => 'https://instagram.com/igvitoria.jaragua',
        ],
        'youtube' => [
            'usuario' => '@igrejadavitoriajaragua',
            'url' => 'https://youtube.com/@igrejadavitoriajaragua',
        ],
        'whatsapp' => [
            'numero' => '62984805993',
            'url' => 'https://wa.me/5562984805993',
        ],
    ],

    // Meta informações
    'ano' => 2026,
    'desenvolvido_por' => 'Cab@lves Tecnologia',

    // Versículo inspirador
    'versiculo' => 'João 10:10 — Eu vim para que tenham vida e a tenham em abundância.',

    // Ministérios da Igreja
    'ministerios' => [
        [
            'id' => 'louvor',
            'nome' => 'Ministério de Louvor',
            'descricao' => 'Adoração genuína e música ungida em espírito e verdade.',
            'badge' => 'Louvor',
            'imagem' => 'assets/images/ministerios/louvor.jpg',
            'imgAlt' => 'Ministério de Louvor — Igreja da Vitória',
            'cor' => 'vermelho',
        ],
        [
            'id' => 'palavra',
            'nome' => 'Ministério da Palavra',
            'descricao' => 'Ensino e pregação da Palavra de Deus com poder e propósito.',
            'badge' => 'Palavra',
            'imagem' => 'assets/images/ministerios/palavra.jpg',
            'imgAlt' => 'Ministério da Palavra — Igreja da Vitória',
            'cor' => 'azul',
        ],
        [
            'id' => 'intercessao',
            'nome' => 'Ministério de Oração',
            'descricao' => 'Intercessão fervorosa pelo corpo de Cristo e pela cidade.',
            'badge' => 'Oração',
            'imagem' => 'assets/images/ministerios/oração.jpg',
            'imgAlt' => 'Ministério de Oração — Igreja da Vitória',
            'cor' => 'dourado',
        ],
        [
            'id' => 'infantil',
            'nome' => 'Ministério Infantil',
            'descricao' => 'Educação cristã lúdica e alegre para as crianças.',
            'badge' => 'Infantil',
            'imagem' => 'assets/images/ministerios/infantil.png',
            'imgAlt' => 'Ministério Infantil — Igreja da Vitória',
            'cor' => 'azul-claro',
        ],
        [
            'id' => 'acolhida',
            'nome' => 'Ministério de Acolhida',
            'descricao' => 'Receber com amor e cuidado todos os que chegam à comunidade.',
            'badge' => 'Acolhida',
            'imagem' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600&h=350&fit=crop&q=80',
            'imgAlt' => 'Ministério de Acolhida — Igreja da Vitória',
            'cor' => 'vermelho-claro',
        ],
        [
            'id' => 'social',
            'nome' => 'Ministério Social',
            'descricao' => 'Ação prática de amor ao próximo em necessidade.',
            'badge' => 'Social',
            'imagem' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600&h=350&fit=crop&q=80',
            'imgAlt' => 'Ministério Social — Igreja da Vitória',
            'cor' => 'vermelho-escuro',
        ],
    ],
];

/**
 * Funções auxiliares para cálculo dinâmico dos dias dos cultos
 * Calcula o próximo dia de cada culto conforme o calendário vigente
 */
function getProximoCulto($diaSemana)
{
    $diaSemanaNumero = [
        'Terça'   => 2,
        'Quinta'  => 5,
        'Domingo' => 0,
    ];

    $hoje = new DateTime();
    $diaHojeNumero = (int)$hoje->format('w');
    $targetDay = $diaSemanaNumero[$diaSemana];

    if ($diaHojeNumero < $targetDay) {
        $diasParaAdicionar = $targetDay - $diaHojeNumero;
    } elseif ($diaHojeNumero === $targetDay) {
        $diasParaAdicionar = 0;
    } else {
        $diasParaAdicionar = 7 - ($diaHojeNumero - $targetDay);
    }

    $data = clone $hoje;
    if ($diasParaAdicionar > 0) {
        $data->modify("+{$diasParaAdicionar} days");
    }

    return [
        'dia' => $data->format('d'),
        'mes' => $data->format('m'),
        'ano' => $data->format('Y'),
        'data_completa' => $data->format('d/m/Y'),
    ];
}

/**
 * Função helper para acessar dados aninhados com segurança
 */
function obter_config($chave, $padrao = null)
{
    global $site;

    if (strpos($chave, '.') !== false) {
        $partes = explode('.', $chave);
        $valor = $site;

        foreach ($partes as $parte) {
            if (isset($valor[$parte])) {
                $valor = $valor[$parte];
            } else {
                return $padrao;
            }
        }
        return $valor;
    }

    return $site[$chave] ?? $padrao;
}

/**
 * Notícias e Mensagens
 * ─────────────────────────────────────────────────────────────
 * Para atualizar: edite os itens do array abaixo.
 * Para adicionar: copie um bloco [] e cole antes do ];
 * Para remover:   apague o bloco [] correspondente.
 *
 * Campos:
 *   cor    → 'azul' | 'vermelho' | 'dourado'
 *   badge  → texto do badge (ex: 'Pregação', 'Testemunho', 'Louvor')
 *   titulo → título do card
 *   trecho → descrição curta
 *   link   → URL de destino (YouTube, Instagram, etc.)
 *   imagem → caminho relativo à raiz (assets/images/noticias/...)
 *   imgAlt → texto alternativo da imagem
 *
 * Máximo recomendado: 3 cards (o card AO VIVO ocupa o 4º slot fixo).
 */
$noticias = [
    [
        'cor'    => 'azul',
        'badge'  => 'Pregação',
        'titulo' => 'A Fé que Move Montanhas',
        'trecho' => 'Uma reflexão profunda sobre como a verdadeira fé em Deus nos capacita a superar obstáculos impossíveis...',
        'link'   => 'https://youtube.com/@igrejadavitoriajaragua',
        'imagem' => 'assets/images/noticias/pregacao.jpg',
        'imgAlt' => 'Bíblia aberta — Pregação',
    ],
    [
        'cor'    => 'vermelho',
        'badge'  => 'Testemunho',
        'titulo' => 'Vitória: O Milagre de Jesus',
        'trecho' => 'Como a intercessão da comunidade e a fé inabalável trouxeram cura e restauração pelo poder de Jesus...',
        'link'   => 'https://youtube.com/@igrejadavitoriajaragua',
        'imagem' => 'assets/images/noticias/testemunho.jpg',
        'imgAlt' => 'Mãos em oração — Testemunho',
    ],
    [
        'cor'    => 'dourado',
        'badge'  => 'Louvor',
        'titulo' => 'Noite de Adoração: Uma Noite Especial',
        'trecho' => 'Assista à transmissão da noite de adoração que tocou corações e elevou todos em louvor genuíno...',
        'link'   => 'https://youtube.com/@igrejadavitoriajaragua',
        'imagem' => 'assets/images/noticias/louvor.jpg',
        'imgAlt' => 'Louvor e adoração — Noite de Adoração',
    ],
];

/**
 * Banners do Carousel
 * ─────────────────────────────────────────────────────────────
 * Para atualizar: troque o caminho em 'imagem'.
 * Para adicionar: copie um bloco [] e cole antes do ];
 * Para remover:   apague o bloco [] correspondente.
 * Os dots e slides são gerados automaticamente — sem limite fixo.
 *
 * Campos:
 *   imagem → caminho relativo à raiz (assets/images/banner-rotativo/...)
 *   alt    → texto alternativo (acessibilidade)
 */
$banners = [
    [
        'imagem' => 'assets/images/banner-rotativo/banner01.jpeg',
        'alt'    => 'Banner 1 — Igreja da Vitória',
    ],
    [
        'imagem' => 'assets/images/banner-rotativo/banner02.jpeg',
        'alt'    => 'Banner 2 — Igreja da Vitória',
    ],
    [
        'imagem' => 'assets/images/banner-rotativo/banner03.jpeg',
        'alt'    => 'Banner 3 — Igreja da Vitória',
    ],
    [
        'imagem' => 'assets/images/banner-rotativo/banner04.jpeg',
        'alt'    => 'Banner 4 — Igreja da Vitória',
    ],
    [
        'imagem' => 'assets/images/banner-rotativo/banner05.jpeg',
        'alt'    => 'Banner 5 — Igreja da Vitória',
    ],
];
