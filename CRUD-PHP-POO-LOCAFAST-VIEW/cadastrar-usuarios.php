<?php

require __DIR__ . '/vendor/autoload.php';
define('TITLE', 'Cadastrar Usuário');

use \App\Entity\usuarios;


$obUsuario = new usuarios;


// VALIDAÇÃO DO POST
if(isset($_POST['nome_completo'],$_POST['cpf'],$_POST['data_nascimento'],$_POST['endereco'],$_POST['telefone'],$_POST['status'],$_POST['senha'], $_POST['tipo_usuario'])){
    
    $obUsuario->nome_completo = $_POST['nome_completo'];
    $obUsuario->cpf = $_POST['cpf'];
    $obUsuario->data_nascimento = $_POST['data_nascimento'];
    $obUsuario->endereco = $_POST['endereco'];
    $obUsuario->telefone= $_POST['telefone'];
    $obUsuario->status = $_POST['status'];
    $obUsuario->senha = $_POST['senha'];
    $obUsuario->tipo_usuario = $_POST['tipo_usuario'];
    $obUsuario->email = $_POST['email'];
    $obUsuario->cadastrarUsuarios();

    header('location: listagem-usuarios.php?status=success');
    exit;
}

include __DIR__ .'/formulario-usuarios.php';