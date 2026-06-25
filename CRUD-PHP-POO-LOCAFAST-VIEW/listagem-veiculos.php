<?php

require_once __DIR__ . '/vendor/autoload.php';

include __DIR__ . '/includes/header.php';

use \App\Entity\Veiculos;

$veiculos = Veiculos::getVeiculos();

$host = 'localhost';
$dbname = 'locafast';
$username = 'root';
$password = '';



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


foreach ($veiculos as $veiculo) {

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }


    //---------------------------- CATEGORIA SQL ----------------------------------------------//

    $sql = "SELECT nome FROM categorias WHERE id = " . (int)$veiculo->id_categoria . " LIMIT 1";
    $stmt = $pdo->query($sql);
    $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

    //---------------------------- MODELO SQL ------------------------------------------------//

    $sql = "SELECT nome FROM modelos WHERE id = " . (int)$veiculo->id_modelo . " LIMIT 1";
    $modelosql = $pdo->query($sql);
    $modelo = $modelosql->fetch(PDO::FETCH_ASSOC);

    //----------------------------------------------------------------------------------------//

    $resultados .= '<tr>
                        <td>' . $veiculo->id . '</td>
                        <td>' . $veiculo->placa . '</td>
                        <td>' . $veiculo->ano_fabricacao . '</td>
                        <td>' . $veiculo->status . '</td>
                        <td>' . $veiculo->id_categoria = $categoria['nome'] . '</td>
                        <td>' . $veiculo->id_modelo = $modelo['nome'] . '</td>
                        <td>

                        <a href="editar-veiculo.php?id=' . $veiculo->id . '">
                            <button type="button" class="btn btn-primary" name="meu_botao">Editar</button>
                        </a>

                        <a href="excluir-veiculo.php?id=' . $veiculo->id . '">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>

                        </td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                        <td colspan="7" class="text-center">Nenhum Veículo Encontrado</td>
                                                   </tr>     ';

?>

<section>
    <div class="container mt-5">
        <h2 style="margin-top: 3%;">Veículos</h2>
        <div class="card">
            <div class="table-responsive">
                <table class="table align-items-center mb-0" id="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Placa</th>
                            <th>Ano de Fabricação</th>
                            <th>Status</th>
                            <th>Categoria</th>
                            <th>Modelo</th>
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