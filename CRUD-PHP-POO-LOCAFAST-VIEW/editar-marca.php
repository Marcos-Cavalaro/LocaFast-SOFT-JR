<?php

define('TITLE', 'Editar Marca');

require __DIR__ . '/vendor/autoload.php';


use \App\Entity\Marcas;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obMarca = Marcas::getMarca($_GET['id']);

if (!($obMarca instanceof Marcas)) {
    header('Location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if (isset($_POST['nome'], $_POST['status'],)) {
    
    $obMarca->nome = $_POST['nome'];
    $obMarca->status = $_POST['status']; 
    $obMarca->atualizarMarcas();

    header('location: listagem-marcas.php?status=success');
    exit;
}

include __DIR__ . '/formulario-marca.php';


//print("<script>console.log('')</script>");