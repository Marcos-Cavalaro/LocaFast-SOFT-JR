<?php

define('TITLE', 'Editar Aluguel');

require __DIR__ . '/vendor/autoload.php';
require_once './app/DB/Conexao.php';
require_once 'enviar-email.php'; 

use \App\Entity\aluguel;

$obAluguel = aluguel::getaluguel($_GET['id']);

// VALIDAÇÃO DO POST
if (isset($_POST['id_cliente'], $_POST['data_retirada'], $_POST['data_devolucao'], $_POST['status'], $_POST['valor_locacao'], $_POST['id_veiculo'], $_POST['categoria'])) {

    $obAluguel->id_cliente = (int)$_POST['id_cliente'];
    $obAluguel->data_retirada = $_POST['data_retirada'];
    $obAluguel->data_devolucao = $_POST['data_devolucao'];
    $obAluguel->status = $_POST['status'];
    $obAluguel->valor_locacao = $_POST['valor_locacao'];
    $obAluguel->id_veiculo = (int)$_POST['id_veiculo'];
    $obAluguel->categoria = $_POST['categoria'];
    $obAluguel->atualizarAlugueis();

    $id_cliente = (int)$_POST['id_cliente'];
    $data_retirada = $_POST['data_retirada'];
    $data_devolucao = $_POST['data_devolucao'];
    $status = $_POST['status'];
    $valor_locacao = $_POST['valor_locacao'];
    $id_veiculo = (int)$_POST['id_veiculo'];
    $categoria = $_POST['categoria'];

    $sqlEmail = " SELECT email,nome_completo FROM usuarios WHERE id = $id_cliente";
    $resposta = $mysqli->query($sqlEmail);

    if ($resposta && $resposta->num_rows > 0) {
        while ($linha = $resposta->fetch_assoc()) {
            $email = $linha['email'];
            $nome = $linha['nome_completo'];
        }
    }

    $info = [$email, $nome, $data_retirada, $data_devolucao, $valor_locacao, $categoria];

    EnviarEmailAtualizado($info);

    header('location: listagem-aluguel.php');
    exit;
}

include __DIR__ . '/formulario-aluguel.php';


//print("<script>console.log('')</script>");