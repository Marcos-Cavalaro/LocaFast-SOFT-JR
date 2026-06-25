<?php

require __DIR__ . '/vendor/autoload.php';
define('TITLE', 'Cadastrar Categoria');

use \App\Entity\Categorias;


$obCategoria= new categorias;


// VALIDAÇÃO DO POST
if(isset($_POST['nome'],$_POST['status'],$_POST['valor'])){
    
    $obCategoria->nome = $_POST['nome'];
    $obCategoria->status = $_POST['status'];
    $obCategoria->valor = $_POST['valor'];
    $obCategoria->cadastrarCategorias();

    header('location: listagem-categorias.php?status=success');
    exit;
}


include __DIR__ .'/formulario-categorias.php';