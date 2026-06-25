<?php

session_start();
$_SESSION["login"] = true;

$id = $_SESSION["id"];
$nome = $_SESSION["nome"];
$cpf = $_SESSION["cpf"];
$data_nascimento = $_SESSION["data_nascimento"];
$endereco = $_SESSION["endereco"];
$telefone = $_SESSION["telefone"];
$senha = $_SESSION["senha"];

echo " <script> console.log($id) </script> ";

require_once './app/DB/Conexao.php';

$sqlAluguel = " SELECT id, id_cliente, data_retirada, data_devolucao,status,valor_locacao, id_veiculo, categoria FROM aluguel WHERE id_cliente = $id ";
$resposta = $mysqli->query($sqlAluguel);
$resultados = '';
$totalGasto = 0;



if ($resposta && $resposta->num_rows > 0) {
    while ($linha = $resposta->fetch_assoc()) {

        $resultados .=  '<tr>

                        <td>' . $linha['data_retirada'] . '</td>
                        <td>' . $linha['data_devolucao'] . '</td>
                        <td>' . $linha['status'] . '</td>
                        <td>' . $linha['categoria'] . '</td>
                        <td>' . $linha['valor_locacao'] . '</td>

                        </tr>';

            $totalGasto = $totalGasto + $linha['valor_locacao'];
    }
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                        <td colspan="8" class="text-center">Nenhum Aluguél Encontrado</td>
                                                   </tr>     ';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <title>Meus Alugueis</title>
</head>

<body>
    <header style="width: 100%; margin-top:0.5%; display: flex; justify-content:center; align-items:center">

        <div style="width: 80%; background-color: #165F2B; margin-top:1%; display: flex; justify-content:center; align-items:center; border-radius: 10px">
            <img src="images/Logo.png" alt="" style="width: 8%;">
            <nav style="display:flex; width:60%">
                <ul class="navbar-nav" style="display: flex; flex-direction: row; justify-content:space-around; width: 90%;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Tela-Cliente.php" style="color: white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Tela-Cliente-Alugueis.php" style="color: white;">Meus Alugueis</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Tela-Cliente-Perfil.php" style="color: white;">Perfil</a>
                    </li>


                    <li class="nav-item">
                        <div style="display: flex; justify-content: center; align-items:center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                            </svg>
                            <a class="nav-link" href="index.php" style="color: white; margin-left:4%">Sair</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section>

        <div class="container mt-5">
            <h2 style="margin-top: 3%;">Veículos</h2>
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0" id="data-table">
                        <thead>
                            <tr>

                                <th>Data Retirada</th>
                                <th>Data Devolução</th>
                                <th>Status</th>
                                <th>Categoria</th>
                                <th>valor Locação</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?= $resultados ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php echo "<h5> Total Gasto: ". $totalGasto ."</h5> "  ?>
        </div>

    </section>



</body>

</html>