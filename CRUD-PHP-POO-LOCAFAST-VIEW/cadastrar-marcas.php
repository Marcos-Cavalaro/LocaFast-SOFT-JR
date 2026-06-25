<?php

define('TITLE', 'Cadastrar Marca');
require __DIR__ . '/vendor/autoload.php';


use \App\Entity\Marcas;


$obMarca = new marcas;

// VALIDAÇÃO DO POST
if(isset($_POST['nome'],$_POST['status'])){
    
    $obMarca->nome = $_POST['nome'];
    $obMarca->status = $_POST['status'];
    $obMarca->cadastrarMarcas();

    header('location: listagem-marcas.php?status=success');
    exit;
}

 
include __DIR__ . '/formulario-marca.php';