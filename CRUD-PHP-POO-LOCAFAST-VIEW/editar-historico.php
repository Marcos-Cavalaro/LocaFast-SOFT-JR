<?php

define('TITLE', 'Editar Histórico');

require __DIR__ . '/vendor/autoload.php';


use \App\Entity\historico_manutencao;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obhistorico_manutencao = historico_manutencao::getHistorico($_GET['id']);

if (!($obhistorico_manutencao instanceof historico_manutencao)) {
    header('Location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if(isset($_POST['id_veiculo'],$_POST['data_manutencao'],$_POST['descricao'],$_POST['status'])){
    
    $obhistorico_manutencao->id_veiculo = $_POST['id_veiculo'];
    $obhistorico_manutencao->data_manutencao = $_POST['data_manutencao'];
    $obhistorico_manutencao->descricao = $_POST['descricao'];
    $obhistorico_manutencao->status = $_POST['status'];
    $obhistorico_manutencao->atualizarHistoricos();

    header('location: listagem-historico.php?status=success');
    exit;
}

include __DIR__ . '/formulario-historico.php';


//print("<script>console.log('')</script>");