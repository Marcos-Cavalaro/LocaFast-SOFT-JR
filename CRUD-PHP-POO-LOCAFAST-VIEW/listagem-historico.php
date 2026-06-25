<?php

require_once __DIR__ . '/vendor/autoload.php';

include __DIR__ . '/includes/header.php';

use \App\Entity\historico_manutencao;

$historicos = historico_manutencao::getHistoricos();




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


foreach ($historicos as $historico) {
    $resultados .= '<tr>
                        <td>' . $historico->id . '</td>
                        <td>' . $historico->id_veiculo . '</td>
                        <td>' . $historico->data_manutencao . '</td>
                        <td>' . $historico->descricao . '</td>
                        <td>' . $historico->status . '</td>
                        <td>

                        <a href="editar-historico.php?id=' . $historico->id . '">
                            <button type="button" class="btn btn-primary" name="meu_botao">Editar</button>
                        </a>

                        <a href="excluir-historico.php?id=' . $historico->id . '">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>

                        </td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                        <td colspan="9" class="text-center">Nenhum Histórico Encontrado</td>
                                                   </tr>     ';

?>


<section>
    <div class="container mt-5">
        <h2 style="margin-top: 3%;">Históricos</h2>
        <div class="card">
            <div class="table-responsive">
                <table class="table align-items-center mb-0" id="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Veiculo</th>
                            <th>Data Manutenção</th>
                            <th>Descrição</th>
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