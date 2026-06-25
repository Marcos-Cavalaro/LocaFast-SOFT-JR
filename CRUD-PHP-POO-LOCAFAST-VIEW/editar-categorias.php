<?php

define('TITLE', 'Editar Categoria');

require __DIR__ . '/vendor/autoload.php';


use \App\Entity\Categorias;



if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obCategoria = Categorias::getCategoria($_GET['id']);

if (!($obCategoria  instanceof Categorias)) {
    header('Location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if (isset($_POST['nome'], $_POST['status'],$_POST['valor'])) {
    
    $obCategoria ->nome = $_POST['nome'];
    $obCategoria ->status = $_POST['status']; 
    $obCategoria->valor = $_POST['valor'];
    $obCategoria ->atualizarCategorias();

    header('location: listagem-categorias.php?status=success.php');
    exit;
}

include __DIR__ . '/formulario-categorias.php';


//print("<script>console.log('')</script>");