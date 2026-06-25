<?php

require_once __DIR__ . '/vendor/autoload.php';

include __DIR__ . '/includes/header.php';

use \App\Entity\Modelos;

$modelos = Modelos::getModelos();

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


foreach ($modelos as $modelo) {

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

    //---------------------------- MODELO SQL ------------------------------------------------//

    $sql = "SELECT nome FROM marcas WHERE id = " . (int)$modelo->id_marca . " LIMIT 1";
    $marcasql = $pdo->query($sql);
    $marca = $marcasql->fetch(PDO::FETCH_ASSOC);

    //----------------------------------------------------------------------------------------//

    $resultados .= '<tr>
                        <td>' . $modelo->id . '</td>
                        <td>' . $modelo->nome . '</td>
                        <td>' . ($modelo->status == 1 ? "Ativo" : "Inativo") . '</td>
                        <td>' . $modelo->id_marca = $marca['nome'] . '</td>
                        <td>

                        <a href="editar-modelo.php?id=' . $modelo->id . '">
                            <button type="button" class="btn btn-primary" name="meu_botao">Editar</button>
                        </a>

                        <a href="excluir-modelo.php?id=' . $modelo->id . '">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>

                        </td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                        <td colspan="5" class="text-center">Nenhum Modelo Encontrado</td>
                                                   </tr>     ';

?>

<section>
    <div class="container mt-5">
        <h2 style="margin-top: 3%;">Modelos</h2>
        <div class="card">
            <div class="table-responsive">
                <table class="table align-items-center mb-0" id="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Status</th>
                            <th>Marca</th>
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