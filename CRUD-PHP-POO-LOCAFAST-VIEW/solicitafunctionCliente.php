<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "locafast");

if (isset($_POST["action"])) {
    if ($_POST["action"] == "solicita") {
        solicita();
    }
}

function solicita()
{
    global $conn;

    if (!empty($_POST['data_retirada']) && !empty($_POST['data_devolucao']) && !empty($_POST['categoria']) && !empty($_POST['valor_locacao'])) {

    
        $id_cliente     = $_POST['id_cliente'];
        $data_retirada  =  $_POST['data_retirada'];
        $data_devolucao =  $_POST['data_devolucao'];
        $valor_locacao  =  $_POST['valor_locacao'];
        $categoria      =  $_POST['categoria'];
        $status_aluguel = "Pendente";

  
        $sql = "INSERT INTO aluguel (id_cliente, data_retirada, data_devolucao, status, valor_locacao, id_veiculo, categoria) 
                VALUES ('$id_cliente', '$data_retirada', '$data_devolucao', '$status_aluguel', '$valor_locacao', NULL, '$categoria')";
        
        $queryaluguel = mysqli_query($conn, $sql);

        if ($queryaluguel) {
            echo "Solicitação Successful";
        } else {
            echo "ERRO NO CADASTRO DO ALUGUEL: " . mysqli_error($conn);
        }
    } else {
        echo "ERRO: Campos obrigatórios (datas, categoria ou valor) não foram preenchidos.";
    }
    exit;
}