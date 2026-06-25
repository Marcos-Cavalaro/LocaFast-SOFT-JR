<?php

require __DIR__ . '/vendor/autoload.php';
define('TITLE', 'Cadastrar Histórico');

use \App\Entity\historico_manutencao;


$obhistorico_manutencao= new historico_manutencao;

// VALIDAÇÃO DO POST
if(isset($_POST['id_veiculo'],$_POST['data_manutencao'],$_POST['descricao'],$_POST['status'])){
    
    $obhistorico_manutencao->id_veiculo = $_POST['id_veiculo'];
    $obhistorico_manutencao->data_manutencao = $_POST['data_manutencao'];
    $obhistorico_manutencao->descricao = $_POST['descricao'];
    $obhistorico_manutencao->status = $_POST['status'];
    $obhistorico_manutencao->cadastrarHistoricos();

    header('location: listagem-historico.php?status=success');
    exit;
}

include __DIR__ .'/formulario-historico.php';