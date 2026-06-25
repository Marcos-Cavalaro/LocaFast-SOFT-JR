<?php

define('TITLE', 'Editar Modelo');

require __DIR__ . '/vendor/autoload.php';


use \App\Entity\Modelos;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obModelo = Modelos::getModelo($_GET['id']);

if (!($obModelo instanceof Modelos)) {
    header('Location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if (isset($_POST['nome'], $_POST['status'],)) {
    
    $obModelo->nome = $_POST['nome'];
    $obModelo->status = $_POST['status']; 
    $obModelo->id_marca = $_POST['id_marca'];
    $obModelo->atualizarModelos();

    header('location: listagem-modelos.php?status=success');
    exit;
}

include __DIR__ . '/formulario-modelo.php';


//print("<script>console.log('')</script>");