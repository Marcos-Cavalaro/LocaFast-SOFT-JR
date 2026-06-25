<?php

require_once __DIR__ . '/vendor/autoload.php';

include __DIR__ . '/includes/header.php';

use \App\Entity\Marcas;

$marcas = Marcas::getMarcas();




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


foreach ($marcas as $marca) {
    $resultados .= '<tr>
                        <td>' . $marca->id . '</td>
                        <td>' . $marca->nome . '</td>
                        <td>' . ($marca->status == 1 ? "Ativo" : "Inativo") . '</td>

                        <td>

                        <a href="editar-marca.php?id=' . $marca->id . '">
                            <button type="button" class="btn btn-primary" name="meu_botao">Editar</button>
                        </a>

                        <a href="excluir-marca.php?id=' . $marca->id . '">
                            <button type="but ton" class="btn btn-danger">Excluir</button>
                        </a>

                        </td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                        <td colspan="4" class="text-center">Nenhuma Marca Encontrada</td>
                                                   </tr>     ';

?>



<section>
    <div class="container mt-5">
        <h2 style="margin-top: 3%;">Marcas</h2>
        <div class="card">
            <div class="table-responsive">

                <table class="table align-items-center mb-0" id="data-table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Status</th>
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