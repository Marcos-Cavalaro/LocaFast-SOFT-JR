<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POO Escola</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="../assets/css/material-dashboard.css" rel="stylesheet" />

</head>



<body class="bg-#F7FAEF text-black">

    <div class="container">

        <div style="width: 100%; background-color: #165F2B; margin-top:1%; display: flex; justify-content:center; align-items:center">
            <img src="images/Logo.png" alt="" style="width: 8%;">


            <nav style="display:flex; width:60%">
                <ul class="navbar-nav" style="display: flex; flex-direction: row; justify-content:space-around; width: 90%;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="painel.php" style="color: white;">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar-aluguel.php" style="color: white;">Alugar</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cadastrar-historico.php" style="color: white;">Histórico</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            Cadastro
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="cadastrar-usuarios.php">Cliente</a></li>
                            <li><a class="dropdown-item" href="cadastrar-marcas.php">Marca</a></li>
                            <li><a class="dropdown-item" href="cadastrar-categorias.php">Categoria</a></li>
                            <li><a class="dropdown-item" href="cadastrar-modelos.php">Modelo</a></li>
                            <li><a class="dropdown-item" href="cadastrar-veiculos.php">Veiculo</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                            Listagem
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="listagem-usuarios.php">Usuários</a></li>
                            <li><a class="dropdown-item" href="listagem-marcas.php">Marca</a></li>
                            <li><a class="dropdown-item" href="listagem-categorias.php">Categoria</a></li>
                            <li><a class="dropdown-item" href="listagem-modelos.php">Modelo</a></li>
                            <li><a class="dropdown-item" href="listagem-veiculos.php">Veiculos</a></li>
                            <li><a class="dropdown-item" href="listagem-aluguel.php">Gerenciar Aluguel</a></li>
                            <li><a class="dropdown-item" href="listagem-historico.php">Gerenciar Histórico</a></li>
                        </ul>
                    </li>



                </ul>


            </nav>

            <li class="nav-item" style="list-style-type: none;">
                <div style="display: flex; justify-content: center; align-items:center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg>
                    <a class="nav-link" href="index.php" style="color: white; margin-left:4%">Sair</a>
                </div>
            </li>
        </div>




        <!-- Core -->
        <script src="../assets/js/core/popper.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>

        <!-- Theme JS -->
        <script src="../assets/js/material-dashboard.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>