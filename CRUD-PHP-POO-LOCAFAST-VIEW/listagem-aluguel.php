<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once './app/DB/Conexao.php';

include __DIR__ . '/includes/header.php';

use \App\Entity\Aluguel;

$alugueis = Aluguel::getAlugueis();


$sqlAluguelUpdate = "UPDATE aluguel SET status = 'Concluida'  WHERE status = 'Confirmada' AND data_devolucao < CURDATE()";
$respostaUpdate = $mysqli->query($sqlAluguelUpdate);

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


foreach ($alugueis as $aluguel) {




    $sqlCliente = "SELECT nome_completo FROM usuarios WHERE id = " . (int)$aluguel->id_cliente . " LIMIT 1";
    $respostaCliente = $mysqli->query($sqlCliente);
    $cliente = $respostaCliente->fetch_assoc();

    $resultados .= '<tr>
                        <td>' . $aluguel->id . '</td>
                        <td>' . $aluguel->id_cliente = $cliente['nome_completo'] . '</td>
                        <td>' . $aluguel->data_retirada . '</td>
                        <td>' . $aluguel->data_devolucao . '</td>
                        <td>' . $aluguel->status . '</td>
                        <td>' . $aluguel->valor_locacao . '</td>
                        <td>' . $aluguel->id_veiculo . '</td>
                        <td>' . $aluguel->categoria . '</td>
                        <td>

                        <a href="editar-aluguel.php?id=' . $aluguel->id . '">
                            <button type="button" class="btn btn-primary" name="meu_botao">Editar</button>
                        </a>

                        <a href="excluir-aluguel.php?id=' . $aluguel->id . '">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>

                        </td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                        <td colspan="8" class="text-center">Nenhum Aluguél Encontrado</td>
                                                   </tr>     ';

?>

<section>
    <div class="container mt-5">
        <h2 style="margin-top: 3%;">Aluguéis</h2>
        <div class="card">
            <div class="table-responsive">
                <table class="table align-items-center mb-0" id="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Data Retirada</th>
                            <th>Data Devolução</th>
                            <th>Status</th>
                            <th>valor Locação</th>
                            <th>ID Veículo</th>
                            <th>Categoria</th>
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