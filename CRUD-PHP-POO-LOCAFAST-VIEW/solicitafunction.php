<?php

session_start();

require_once './app/DB/Conexao.php';
require_once 'enviar-email.php';

$conn = mysqli_connect("localhost", "root", "", "locafast");

// IF
if (isset($_POST["action"])) {

    if ($_POST["action"] == "solicita") {
        solicita();
    }
}

function solicita()
{
    global $conn;

    if (isset($_POST['nome_completo'], $_POST['cpf'], $_POST['data_nascimento'], $_POST['endereco'], $_POST['senha'],)) {

        $nome_completo = $_POST['nome_completo'];
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data_nascimento'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $status = 1;
        $senha = $_POST['senha'];
        $tipo_usuario = "Usuário";
        $email = $_POST['email'];

        $user = mysqli_query($conn, "SELECT * FROM usuarios WHERE cpf = '$cpf'");

        if (mysqli_num_rows($user) > 0) {
            echo "Usuário já Cadastrado, Por Favor Faça Login!";
        } else {

            $query = mysqli_query($conn, "INSERT INTO usuarios (nome_completo, cpf, data_nascimento, endereco, telefone, status, senha, tipo_usuario, email) VALUES ('$nome_completo', '$cpf', '$data_nascimento', '$endereco', '$telefone' , '$status', '$senha', '$tipo_usuario', '$email') ");

            if (!$query) {
                echo "ERRO NO CADASTRO DO USUÁRIO: " . mysqli_error($conn);
                exit;
            }

            if (isset($_POST['data_retirada'], $_POST['data_devolucao'], $_POST['categoria'], $_POST['valor_locacao'])) {

                $id = mysqli_insert_id($conn);
                $data_retirada = $_POST['data_retirada'];
                $data_devolucao = $_POST['data_devolucao'];
                $status_aluguel = "Pendente";
                $valor_locacao = $_POST['valor_locacao'];
                //$id_veiculo = NULL;
                $categoria = $_POST['categoria'];

                $queryaluguel = mysqli_query($conn, "INSERT INTO aluguel (id_cliente, data_retirada, data_devolucao, status, valor_locacao, id_veiculo, categoria) VALUES ('$id','$data_retirada', '$data_devolucao', '$status_aluguel', '$valor_locacao', NULL, '$categoria') ");

                if ($queryaluguel) {

                    $sqlEmail = " SELECT email,nome_completo FROM usuarios WHERE id = $id ";
                    $resposta = mysqli_query($conn, $sqlEmail);

                    if ($resposta && $resposta->num_rows > 0) {
                        while ($linha = $resposta->fetch_assoc()) {
                            $email = $linha['email'];
                            $nome = $linha['nome_completo'];
                        }
                    }

                    $info = [$email, $nome, $data_retirada, $data_devolucao, $valor_locacao, $categoria,$status_aluguel];
                    EnviarEmailSolicita($info);

                    if (EnviarEmailSolicita($info)) {
                        echo "Solicitação Successful";
                    } else {
                        echo "ERRO NO CADASTRO DO ALUGUEL: " . mysqli_error($conn);
                        exit;
                    }
                }

                // if ($queryaluguel) {
                //     echo "Solicitação Successful";
                // } else {
                //     echo "ERRO NO CADASTRO DO ALUGUEL: " . mysqli_error($conn);
                //     exit;
                // }

            } else {
                echo "ERRO: Os dados do ALUGUEL (datas, categoria ou valor) não foram enviados via POST.";
            }
        }
    } else {
        echo "ERRO: Os dados do USUÁRIO (nome, cpf, senha, etc.) não foram enviados via POST.";
    }
    exit;
}
