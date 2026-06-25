<?php

require __DIR__ . '/vendor/autoload.php';
define('TITLE', 'Cadastrar Veiculo');

use \App\Entity\Veiculos;


$obVeiculo = new Veiculos;


// VALIDAÇÃO DO POST
if(isset($_POST['placa'],$_POST['ano_fabricacao'],$_POST['status'],$_POST['id_categoria'],$_POST['id_modelo'],)){
    
    $obVeiculo->placa = $_POST['placa'];
    $obVeiculo->ano_fabricacao = $_POST['ano_fabricacao'];
    $obVeiculo->status = $_POST['status'];
    $obVeiculo->id_categoria = $_POST['id_categoria'];
    $obVeiculo->id_modelo = $_POST['id_modelo'];
    $obVeiculo->cadastrarVeiculos();

    header('location: listagem-veiculos.php?status=success');
    exit;
}


include __DIR__ .'/formulario-veiculos.php';