<?php

require_once __DIR__ . '/vendor/autoload.php';

include __DIR__ . '/includes/header.php';

use \App\Entity\usuarios;

$usuarios = usuarios::getUsuarios();




$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {

        case 'success':
            $mensagem = '<div class="alert alert-success">Ação Executada com Sucesso!</div>';
            break;

        case 'error':
            $mensagem = '<div class"alert alert-success">Ação Não Executada!</div>';
            break;
    }
}

$resultados = '';



foreach ($usuarios as $usuario) {
    $resultados .= '<tr>
                        <td>' . $usuario->id . '</td>
                        <td>' . $usuario->nome_completo . '</td>
                        <td>' . $usuario->cpf . '</td>
                        <td>' . $usuario->data_nascimento . '</td>
                        <td>' . $usuario->endereco . '</td>
                        <td>' . $usuario->telefone . '</td>
                        <td>' . ($usuario->status == 1 ? "Ativo" : "Inativo") . '</td>
                        <td>' . $usuario->senha . '</td>
                        <td>' . $usuario->tipo_usuario . '</td>
                        <td>' . $usuario->email . '</td>
                        <td>

                        <a href="editar-usuarios.php?id=' .  $usuario->id . '">
                            <button type="button" class="btn btn-primary" name="meu_botao">Editar</button>
                        </a>

                        <a href="excluir-usuarios.php?id=' .  $usuario->id . '">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>

                        </td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                        <td colspan="9" class="text-center">Nenhum Usuário Encontrado</td>
                                                   </tr>     ';

?>

<section>
      <div class="container mt-5">
        <h2 style="margin-top: 3%;">Usuários</h2>
    <div class="card">
      <div class="table-responsive">
        <table class="table align-items-center mb-0" id="data-table">
          <thead>
            <tr>
                    <th >ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data Nascimento</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Status</th>
                    <th>Senha</th>
                    <th>Tipo Usuário</th>
                    <th>Email</th>
                    <th>Ações</th>
            
            </tr>
          </thead>
          <tbody>
            <?= $resultados ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

