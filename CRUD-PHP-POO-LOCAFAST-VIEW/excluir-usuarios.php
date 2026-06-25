<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\usuarios;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obUsuario = usuarios::getUsuario($_GET['id']);

if (!$obUsuario instanceof usuarios) {
    header('location: index.php?status=error');
    exit;
}

// VALIDAÇÃO DO POST
if (isset($_POST['excluir'])) {
    
    $obUsuario->excluirUsuarios();

    header('location: listagem-usuarios.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/confirmar-exclusao-usuario.php';