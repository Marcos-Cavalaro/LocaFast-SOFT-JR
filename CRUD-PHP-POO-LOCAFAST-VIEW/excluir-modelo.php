<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Modelos;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obModelo= Modelos::getModelo($_GET['id']);

if (!$obModelo instanceof Modelos) {
    header('location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {
    
    $obModelo->excluirModelos();

    header('location: listagem-modelos.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/confirmar-exclusao-modelo.php';