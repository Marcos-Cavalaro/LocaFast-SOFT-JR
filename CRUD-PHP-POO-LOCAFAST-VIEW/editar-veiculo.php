<?php

define('TITLE', 'Editar Veículo');

require __DIR__ . '/vendor/autoload.php';


use \App\Entity\Veiculos;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obVeiculo = Veiculos::getVeiculo($_GET['id']);

if (!($obVeiculo instanceof Veiculos)) {
    header('Location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if(isset($_POST['placa'],$_POST['ano_fabricacao'],$_POST['status'],$_POST['id_categoria'],$_POST['id_modelo'],)){
    
    $obVeiculo->placa = $_POST['placa'];
    $obVeiculo->ano_fabricacao = $_POST['ano_fabricacao'];
    $obVeiculo->status = $_POST['status'];
    $obVeiculo->id_categoria = $_POST['id_categoria'];
    $obVeiculo->id_modelo = $_POST['id_modelo'];
    $obVeiculo->atualizarVeiculos();

    header('location: listagem-veiculos.php?status=success');
    exit;
}

include __DIR__ . '/formulario-veiculos.php';


//print("<script>console.log('')</script>");