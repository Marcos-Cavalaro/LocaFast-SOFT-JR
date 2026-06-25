<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Veiculos;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obVeiculo= Veiculos::getVeiculo($_GET['id']);

if (!$obVeiculo instanceof Veiculos) {
    header('location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {
    
   $obVeiculo->excluirVeiculos();

    header('location: listagem-veiculos.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/confirmar-exclusao-veiculo.php';