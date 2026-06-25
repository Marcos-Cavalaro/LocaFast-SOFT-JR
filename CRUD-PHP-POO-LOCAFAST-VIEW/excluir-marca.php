<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Marcas;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obMarca = Marcas::getMarca($_GET['id']);

if (!$obMarca instanceof Marcas) {
    header('location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {
    
    $obMarca->excluirMarcas();

    header('location: listagem-marcas.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/confirmar-exclusao-marca.php';