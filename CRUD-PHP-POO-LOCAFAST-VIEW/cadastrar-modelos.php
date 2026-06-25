<?php

require __DIR__ . '/vendor/autoload.php';
define('TITLE', 'Cadastrar Modelo');

use \App\Entity\Modelos;


$obModelo = new Modelos;


// VALIDAÇÃO DO POST
if(isset($_POST['nome'],$_POST['status'],$_POST['id_marca'])){
    
    $obModelo->nome = $_POST['nome'];
    $obModelo->status = $_POST['status'];
    $obModelo->id_marca = $_POST['id_marca'];
    $obModelo->cadastrarModelos();

    header('location: listagem-modelos.php?status=success');
    exit;
}


include __DIR__ .'/formulario-modelo.php';