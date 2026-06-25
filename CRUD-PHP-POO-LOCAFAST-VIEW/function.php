<?php

session_start();


require_once './app/DB/Conexao.php';


if (isset($_POST["action"]) && $_POST["action"] == "login") {
    login();
}


function login()
{

    global $mysqli; 

    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    $query = "SELECT * FROM usuarios WHERE cpf = '$cpf'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {

        $row = $result->fetch_assoc();


        if ($senha == $row['senha']) {

            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["nome"] = $row["nome_completo"];
            $_SESSION["cpf"] = $row["cpf"];
            $_SESSION["data_nascimento"] = $row["data_nascimento"];
            $_SESSION["endereco"] = $row["endereco"];
            $_SESSION["telefone"] = $row["telefone"];
            $_SESSION["senha"] = $row["senha"];
            $_SESSION["tipo_usuario"] = $row["tipo_usuario"]; 

            if ($_SESSION["tipo_usuario"] == 'Administrador'){
                echo "Login Sucesso Admin";
            } else if ($_SESSION["tipo_usuario"] == 'Usuário'){
                echo "Login Sucesso User";
            }

        } else {
            echo "Erro ao Fazer Login"; 
            exit;
        }
    } else {
        echo "Usuario Não Registrado";
        exit;
    }
}