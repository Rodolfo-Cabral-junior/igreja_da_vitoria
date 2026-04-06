<?php

declare(strict_types=1);

// Inicia sessão antes de qualquer output para rate limiting
session_start();

// ── Bloqueia métodos diferentes de POST ──────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['success' => false, 'errors' => ['geral' => 'Método não permitido.']]);
    exit;
}

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

// ── Referer check — bloqueia se não vier da mesma origem ─────────────────────
$referer = $_SERVER['HTTP_REFERER'] ?? '';
$host    = $_SERVER['HTTP_HOST']    ?? '';

if (empty($referer) || empty($host) || strpos($referer, $host) === false) {
    http_response_code(403);
    echo json_encode(['success' => false, 'errors' => ['geral' => 'Acesso não autorizado.']]);
    exit;
}

// ── Rate limiting via sessão: máximo 3 envios bem-sucedidos por hora por IP ──
$ip    = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$chave = 'oracao_rate_' . md5($ip);
$agora  = time();
$janela = 3600;
$limite = 3;

if (!isset($_SESSION[$chave])) {
    $_SESSION[$chave] = ['count' => 0, 'inicio' => $agora];
}

if ($agora - $_SESSION[$chave]['inicio'] > $janela) {
    $_SESSION[$chave] = ['count' => 0, 'inicio' => $agora];
}

if ($_SESSION[$chave]['count'] >= $limite) {
    http_response_code(429);
    echo json_encode(['success' => false, 'errors' => ['geral' => 'Muitos envios. Aguarde 1 hora para tentar novamente.']]);
    exit;
}

// ── Grupos válidos (whitelist) ────────────────────────────────────────────────
$gruposValidos = ['Intercessao', 'Cura', 'Familia', 'Outros'];

// ── Recebe e sanitiza campos ──────────────────────────────────────────────────
$nome     = trim(htmlspecialchars((string)(filter_input(INPUT_POST, 'nome',     FILTER_DEFAULT) ?? ''), ENT_QUOTES, 'UTF-8'));
$telefone = trim(htmlspecialchars((string)(filter_input(INPUT_POST, 'telefone', FILTER_DEFAULT) ?? ''), ENT_QUOTES, 'UTF-8'));
$mensagem = trim(htmlspecialchars((string)(filter_input(INPUT_POST, 'mensagem', FILTER_DEFAULT) ?? ''), ENT_QUOTES, 'UTF-8'));
$grupo    = trim(htmlspecialchars((string)(filter_input(INPUT_POST, 'grupo',    FILTER_DEFAULT) ?? ''), ENT_QUOTES, 'UTF-8'));

// ── Validação ─────────────────────────────────────────────────────────────────
$errors = [];

// nome: obrigatório, 2–80 chars
if ($nome === '' || mb_strlen($nome) < 2) {
    $errors['nome'] = 'Preencha seu nome (mínimo 2 caracteres).';
} elseif (mb_strlen($nome) > 80) {
    $errors['nome'] = 'Nome muito longo (máximo 80 caracteres).';
}

// telefone: opcional, formato BR (XX) XXXXX-XXXX ou (XX) XXXX-XXXX
if ($telefone !== '') {
    if (!preg_match('/^\(\d{2}\)\s\d{4,5}-\d{4}$/', $telefone)) {
        $errors['telefone'] = 'Formato inválido. Ex: (62) 99999-9999';
    }
}

// mensagem: obrigatório, 1–500 chars
if ($mensagem === '') {
    $errors['mensagem'] = 'Descreva seu pedido de oração.';
} elseif (mb_strlen($mensagem) > 500) {
    $errors['mensagem'] = 'Mensagem muito longa (máximo 500 caracteres).';
}

// grupo: obrigatório, deve estar na whitelist
if (!in_array($grupo, $gruposValidos, true)) {
    $errors['grupo'] = 'Selecione um grupo de oração válido.';
}

if (!empty($errors)) {
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// ── Incrementa contador somente após envio válido ─────────────────────────────
$_SESSION[$chave]['count']++;

echo json_encode(['success' => true, 'errors' => []]);
