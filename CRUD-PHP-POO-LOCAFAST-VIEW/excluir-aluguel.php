<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\aluguel;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obAluguel = aluguel::getAluguel($_GET['id']);

if (!$obAluguel instanceof aluguel) {
    header('location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {
    
    $obAluguel->excluirAlugueis();

    header('location: listagem-aluguel.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/confirmar-exclusao-aluguel.php';