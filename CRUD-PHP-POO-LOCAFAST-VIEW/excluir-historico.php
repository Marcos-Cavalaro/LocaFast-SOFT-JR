<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\historico_manutencao;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obHistorico = historico_manutencao::getHistorico($_GET['id']);

if (!$obHistorico instanceof historico_manutencao) {
    header('location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {
    
    $obHistorico->excluirHistoricos();

    header('location: listagem-historico.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/confirmar-exclusao-historico.php';