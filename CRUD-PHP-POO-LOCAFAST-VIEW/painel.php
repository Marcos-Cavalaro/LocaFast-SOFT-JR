<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <title>Painel</title>
</head>

<?php

//--------------------------------------------------------------- INICIAR -----------------------------------------------------------------------------------------------------//

require_once __DIR__ . '/vendor/autoload.php';

include __DIR__ . '/includes/header.php';

use \App\Entity\usuarios;
use \App\Entity\aluguel;

$usuarios = usuarios::getUsuarios();
$alugueis = aluguel::getAlugueis();

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

//------------------------------------------------------------- CONEXÃO BANCO -------------------------------------------------------------------------------------------------//

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

//---------------------------------------------------------- DEFINIÇÃO --------------------------------------------------------------------------------------------------------//

$resultados = '';
$resultados_valor = '';
$resultados_veiculo = '';
$resultados_veiculosTotal = '';
$total = 0;

//------------------------------------------- SQL CÓDIGOS ---------------------------------------------------------------------------------------------------------------------//

$sqluser = "SELECT id, nome_completo, cpf FROM usuarios WHERE tipo_usuario = 'Usuário' ";

$sqlloc = "SELECT id, valor_locacao FROM aluguel WHERE data_devolucao >= NOW() - INTERVAL 1 MONTH ";

$veiculos = $pdo->query("SELECT categoria, COUNT(*) AS total
                        FROM aluguel
                        GROUP BY categoria
                        ORDER BY total DESC
                        LIMIT 5;
                        ");

//---------------------------- Usuario FOREACH --------------------------------------------------------------------------------------------------------------------------------//

foreach ($usuarios as $usuario) {

    $resultados .= '<tr>
                        <td>' . $usuario->id . '</td>
                        <td>' . $usuario->nome_completo . '</td>
                        <td>' . $usuario->cpf . '</td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                        <td colspan="3" class="text-center">Nenhum Veículo Encontrado</td>
                                                   </tr>     ';

//---------------------------- Renda ------------------------------------------------------------------------------------------------------------------------------------------// 

$valorsql = $pdo->query($sqlloc);
$aluguelfetch = $valorsql->fetchAll(PDO::FETCH_ASSOC);

foreach ($aluguelfetch as $aluguel) {

    //var_dump($aluguelfetch);exit;
    $resultados_valor .= '<tr>
                            <td>' . $aluguel['id'] . '</td>
                            <td>' . $aluguel['valor_locacao'] . '</td>
                          </tr> ';


    $total = $total + $aluguel['valor_locacao'];

    //var_dump($resultados_valor);exit;   
}

$resultados_valor = strlen($resultados_valor) ? $resultados_valor : '<tr>
                                                                        <td colspan="3" class="text-center">Nenhum Aluguel Encontrado</td>
                                                                     </tr>';

//---------------------------- Veiculos Mais Alugados FOREACH -----------------------------------------------------------------------------------------------------------------//   

$linhasveiculos = $veiculos->fetchAll(PDO::FETCH_ASSOC);

foreach ($linhasveiculos as $linha) {
    $resultados_veiculosTotal .= '<tr>
                                    <td>' . $linha['categoria'] . '</td>
                                    <td>' . $linha['total']. '</td>
                                </tr>';
}

$resultados_veiculosTotal = strlen($resultados_veiculosTotal) ? $resultados_veiculosTotal : '<tr>
                                                                                                <td colspan="4" class="text-center">Nenhum Aluguél Encontrado</td>
                                                                                            </tr>';


foreach ($alugueis as $aluguel) {
    $resultados_veiculo .= '<tr>
                                <td>' . $aluguel->id . '</td>
                                <td>' . $aluguel->id_veiculo . '</td>
                                <td>' . $aluguel->categoria . '</td>
                            </tr>';
}

$resultados_veiculo = strlen($resultados_veiculo) ? $resultados_veiculo : '<tr>
                                                                                <td colspan="4" class="text-center">Nenhum Aluguél Encontrado</td>
                                                                           </tr>';



//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------// 

?>

<!-------------------------------------- FIM PHP ------------------------------------------------------------------------------------------------------------------------------->

<body>

    <section style="display: flex;">
        <div class="container mt-5" style="width: 30%;">
            <h2 style="margin-top: 3%;">Histórico Clientes</h2>
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>CPF</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?= $resultados ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="container mt-5" style="width: 30%;">
            <h2 style="margin-top: 3%;">Faturamento Mensal</h2>
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Valor Locação</th>
                            </tr>

                        </thead>

                        <tbody>
                            <?= $resultados_valor  ?>

                        </tbody>

                    </table>
                    <?php echo " <strong style='width:100%; display:flex; justify-content:center;align-items:center'> A Renda Mensal é De: $total </strong>"  ?>
                </div>
                <div>
                    <canvas id="myChartRenda"></canvas>
                </div>
            </div>
        </div>

        <div class="container mt-5" style="width: 30%;">
            <h2 style="margin-top: 3%;">Veiculos mais Alugados</h2>
            <div class="card" style="padding: 20px;">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="data-table">
                        <thead>
                            <tr>
                                <th>Categoria</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $resultados_veiculosTotal ?> 
                        </tbody>
                    </table>
                </div>

                <div style="width: 100%; max-width: 700px; margin-top: 20px;">
                    <canvas id="myChartCategoria"></canvas>
                </div>

            </div>
        </div>


    </section>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="JS/painel.js"></script>
</body>

</html>