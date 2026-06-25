<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Categorias;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obCategoria = Categorias::getCategoria($_GET['id']);

if (!$obCategoria instanceof Categorias) {
    header('location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {
    
    $obCategoria->excluirCategorias();

    header('location: listagem-categorias.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/confirmar-exclusao-categoria.php';