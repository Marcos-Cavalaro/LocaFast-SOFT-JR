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




$hoje = new DateTime();
//-------------------------------------------------------------------------------------------------------\\
$sqlAluguel = " SELECT COUNT(*) AS total_alugueis FROM aluguel WHERE id_cliente = $id ";
$resposta = $mysqli->query($sqlAluguel);

if ($resposta && $resposta->num_rows > 0) {
    while ($linha = $resposta->fetch_assoc()) {
        $total = $linha['total_alugueis'];
    }
}

//-------------------------------------------------------------------------------------------------------\\

$sqlVeiculos = " SELECT categorias.nome AS categoria_nome, categorias.valor AS categoria_valor, modelos.nome AS modelo_nome, 
                        veiculos.placa, veiculos.id AS id_veiculo, data_retirada, data_devolucao, aluguel.status 
                    FROM veiculos JOIN categorias ON veiculos.id_categoria = categorias.id 
                    JOIN modelos ON veiculos.id_modelo = modelos.id
                    JOIN aluguel ON aluguel.id_veiculo = veiculos.id
                    WHERE aluguel.status = 'Confirmada' AND aluguel.id_cliente = $id AND data_devolucao >= CURDATE() 
                    ORDER BY data_devolucao ASC; 
";

$respostaVeiculos = $mysqli->query($sqlVeiculos);

if ($respostaVeiculos && $respostaVeiculos->num_rows > 0) {
    while ($linha = $respostaVeiculos->fetch_assoc()) {

        $nome_categoria = $linha['categoria_nome'];
        $modelo_nome = $linha['modelo_nome'];
        $placa = $linha['placa'];
    }
}

//-------------------------------------------------------------------------------------------------------\\

$sqlData = "SELECT data_devolucao, status FROM aluguel WHERE id_cliente = '$id' AND status = 'Confirmada' AND data_devolucao > NOW() AND status != 'Concluida' AND status != 'Cancelada'  ORDER BY data_devolucao ASC ;";
$respostaData = $mysqli->query($sqlData);

if ($respostaData && $respostaData->num_rows > 0) {

    while ($linha = $respostaData->fetch_assoc()) {
        $Data = $linha['data_devolucao'];
    }
}

//-------------------------------------------------------------------------------------------------------\\

$sqlDataDevolu = "SELECT data_devolucao FROM aluguel WHERE id_cliente = '$id' AND data_devolucao > NOW() ORDER BY data_devolucao ASC LIMIT 1;";
$respostaDataDevolu = $mysqli->query($sqlDataDevolu);

if ($respostaDataDevolu && $respostaDataDevolu->num_rows > 0) {
    while ($linha = $respostaDataDevolu->fetch_assoc()) {
        $DataDevolu = $linha['data_devolucao'];
    }
}

//-------------------------------------------------------------------------------------------------------\\


//-------------------------------------------------------------------------------------------------------\\

$host = 'localhost';
$dbname = 'locafast';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT id,nome,status FROM categorias WHERE status = '1' ");

    $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

//-------------------------------------------------------------------------------------------------------\\

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="includes/styles.css">
    <title>LocaFast</title>
</head>

<body>

    <header style="width: 100%; margin-top:0.5%; display: flex; justify-content:center; align-items:center">

        <div style="width: 80%; background-color: #165F2B; margin-top:1%; display: flex; justify-content:center; align-items:center; border-radius: 10px">
            <img src="images/Logo.png" alt="" style="width: 8%;">
            <nav style="display:flex; width:60%">
                <ul class="navbar-nav" style="display: flex; flex-direction: row; justify-content:space-around; width: 90%;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Tela-Cliente-Perfil.php" style="color: white;">Home</a>
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

    <section style="width: 100%; margin-top:2%; display:flex; flex-direction:column; justify-content:center; align-items:center">

        <div style="width: 80%; display:flex; justify-content: space-between; align-items:center">

            <div>
                <h2><?php echo "Bem Vindo " . $_SESSION['nome']  ?></h2>
                <p>Sexta-feira, 19 de junho • 14:59</p>
            </div>

            <div style="width:20%">
                <a href="" style="text-decoration: none; background-color:#7fd61a; color:black; padding: 5%;border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Novo Aluguel</a>
            </div>

        </div>

    </section>

    <section style="width: 100%; margin-top:2%; display:flex; flex-direction:column; justify-content:center; align-items:center">

        <div style="width:80%; display:flex; justify-content: space-between">

            <div style="background-color: #EAF1FF; padding:2%; border-radius:10px;width:38%">
                <p>Veículo Atual</p>
                <h3> <?php

                        if (mysqli_num_rows($respostaVeiculos) == 0) {
                            echo "<h4>Nenhum registro encontrado!</h4>";
                        }

                        foreach ($respostaVeiculos as $linha) {
                            $nome_categoria = $linha['categoria_nome'];
                            $modelo_nome = $linha['modelo_nome'];
                            $placa = $linha['placa'];

                            echo "<h3>$nome_categoria | $modelo_nome | $placa </h3>";
                        }

                        ?></h3>
                <img src="images/carro-novo.png" alt="">
            </div>

            <div style="background-color: #EAF1FF; padding:2%; border-radius:10px;width:20%">
                <p>Dias Restantes</p>
                <h3>
                    <?php

                    if (mysqli_num_rows($respostaData) == 0) {
                        echo "<h4>Nenhum registro encontrado!</h4>";
                    }

                    foreach ($respostaData as $linha) {

                        $dataDevolucao = new DateTime($linha['data_devolucao']);
                        $intervalo = $hoje->diff($dataDevolucao);
                        $diasRestantes = $intervalo->format('%r%a');

                        if ($diasRestantes == 1) {
                            echo "$diasRestantes Dia";
                        } else {
                            echo "$diasRestantes Dias";
                        }

                        echo "<br>";
                    }

                    ?></h3>

                <img src="images/tempo-rapido.png" alt="">
            </div>

            <div style="background-color: #EAF1FF; padding:2%; border-radius:10px;width:20%">
                <p>Devolução</p>
                <h3>
                    <?php

                    if (mysqli_num_rows($respostaData) == 0) {
                        echo "<h4>Nenhum registro encontrado!</h4>";
                    }

                    foreach ($respostaData as $linha) {

                        $dataDevolucao = $linha['data_devolucao'];

                        echo "$dataDevolucao";
                        echo "<br>";
                    }

                    ?>
                </h3>
                <img src="images/calendario.png" alt="">
            </div>

            <div style="background-color: #EAF1FF; padding:2%; border-radius:10px;width:20%">
                <p>Total Aluguéis</p>
                <h3><?php echo "$total" ?></h3>
                <img src="images/frota.png" alt="">
            </div>

        </div>

    </section>





    <section style="width: 100%; margin-top:2%; display:flex; flex-direction:column; justify-content:center; align-items:center">

        <div style="width:80%; display:flex; justify-content: space-between">
            <h3>Aluguel em Destaque</h3>
        </div>

        <?php

        if (mysqli_num_rows($respostaVeiculos) == 0) {
            echo "
            <div style='background-color: #EAF1FF; padding:2%; border-radius:10px;width:30%; margin-bottom: 2%'>
            <h4>Nenhum registro encontrado!</h4>
            </div>";
        }


        foreach ($respostaVeiculos as $linha) {
            $nome_categoria = $linha['categoria_nome'];
            $modelo_nome = $linha['modelo_nome'];
            $placa = $linha['placa'];
            $data_retirada = $linha['data_retirada'];
            $data_devolucao = $linha['data_devolucao'];
            $statusAluga = $linha['status'];

            echo "
        <div style='background-color: #EAF1FF; padding:2%; border-radius:10px;width:40%; margin-bottom: 2%'>

            <div style='width:100%; display: flex; justify-content: center'>

                <div>
                    <h4>Status</h4>
                    <p>$statusAluga</p>
                </div>

            </div>

            <div style='width:100%; display: flex; justify-content: center'>

            <img src='images/Carros/$modelo_nome.png' style='width:50%; border-radius:15px'>

            </div>

            <div style='width:100%; display: flex; justify-content: space-between'>

                <div>
                    <h4>$modelo_nome</h4>
                    <p>Categoria: $nome_categoria</p>
                </div>

                <div>
                    <p>Placa <br> <span>$placa</span></p>
                </div>

            </div>

            <div style='width:100%; display: flex; justify-content: space-between'>

                <div>
                    <h5>Retirada</h5>
                    <p>$data_retirada</p>
                </div>

                <div>
                    <h5>Devolução</h5>
                    <p>$data_devolucao</p>
                </div>

            </div>




            <div style='width:100%; display: flex; justify-content: space-between; margin-top:2%'>

                <div style='width:40%'>
                    <a href= '' style='text-decoration: none; color:black; border: 1px solid gray; padding: 8%; border-radius:10px'>Ver Contrato</a>
                </div>

                <div style='width:40%'>
                    <a href= '' style='text-decoration: none; color:black; border: 1px solid gray; padding: 8%; border-radius:10px'>Solicitar Prorrogração</a>
                </div>

            </div>
        </div>
        ";
        }

        ?>

    </section>


    <img src="images/Carros/.png" alt="">

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulário Solicitação</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="formularioLocacao" action="" method="post">

                        <div style="display:flex; width:100%; justify-content:space-evenly; align-items:center">
                            <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%; width:50%">
                                <label for="exampleInputNome" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">ID Cliente</label>
                                <input type="text" class="form-control" value="<?= $_SESSION["id"] ?>" name="id_cliente" id="id_cliente" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                            </div>


                        </div>

                        <div style="display:flex; width:100%; justify-content:space-evenly; align-items:center">

                            <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%; width:40%">
                                <label for="meu_select" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Categorias:</label>
                                <select name="id_categoria" id="meu_select" class="form-control" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                                    <option value="">Selecione...</option>
                                    <?php foreach ($linhas as $linha) {
                                        $id_categoria = $linha['id'];
                                        $nome = $linha['nome'];

                                        $selecionado = ($nome == $obAluguel->categoria) ? 'selected' : '';
                                    ?>
                                        <option value="<?= $nome ?>" <?= $selecionado ?>><?= $nome ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div style="display:flex; width:100%; justify-content:space-evenly; align-items:center">

                            <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%">
                                <label for="exampleInputData_retirada" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Data Retirada</label>
                                <input type="date" class="form-control" value="" name="data_retirada" id="data_retirada" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">
                            </div>

                            <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%">
                                <label for="exampleInputData_devolucao" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Data Devolução</label>
                                <input type="date" class="form-control" value="" name="data_devolucao" id="data_devolucao" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px">

                            </div>

                        </div>

                        <div style="display:flex; width:100%; justify-content:space-evenly; align-items:center">

                            <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%; width:40%">
                                <label for="exampleInputValor" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Valor Total</label>
                                <input type="text" readonly class="form-control" value="" name="valor_locacao" id="valorlocinput" style="text-align:center;background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px; width:80%;">
                            </div>

                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="submitData()">Enviar</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        const data_retirada = document.getElementById('data_retirada');
        const data_devolucao = document.getElementById('data_devolucao');

        data_devolucao.addEventListener('change', function() {
            var conversivel = 150.00;

            var dataUm = new Date(document.getElementById("data_retirada").value);
            var dataDois = new Date(document.getElementById("data_devolucao").value);
            valorDias = parseInt((dataDois - dataUm) / (24 * 3600 * 1000));

            valorFinal = valorDias * conversivel

            const data_devolucao = document.querySelector('#data_devolucao');

            data_devolucao.addEventListener('blur', (evento) => {
                const valorca = evento.target.value.valorFinal;

                if (valorca < 0) {
                    window.alert("Data Inválida!");
                }

            });

            console.log("Teste: ", valorFinal);
            document.getElementById('valorlocinput').value = valorFinal;

        });
    </script>

    <script src="JS/solicitaCliente.js"></script>
    <!-- Core -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <!-- Theme JS -->
    <script src="../assets/js/material-dashboard.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>