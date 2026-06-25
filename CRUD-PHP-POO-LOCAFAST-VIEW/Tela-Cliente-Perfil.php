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
    <title>Perfil</title>
</head>

<body style="display:flex; flex-direction:column; justify-content:center">

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

    <section style="padding:2%; border-radius:10px;width:100%; display:flex; justify-content: center">

        <div style="background-color: #EAF1FF; width:40%;padding:2%;border-radius: 15px">

            <div style="width: 100%; display:flex; align-items:center; justify-content:space-between">

                <div style="width: 50%; display:flex; align-items:center; gap:2%">
                    <img src="images/usuario.png" alt="" srcset="">
                    <?php echo "<h5> $nome </h5>" ?>
                </div>

                <div style="background-color: #165F2B; text-decoration:none; color:white; padding:2%; width:20%; justify-content: center; align-items:center; border-radius:10px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                    </svg>
                    <a href="" style="text-decoration:none; color:white; font-size:18px">Editar</a>
                </div>


            </div>

            <div style="background-color: white; margin-top:3%; border-radius: 15px">

                <div style="display:flex; width:95%; justify-content:space-between;align-items:center; padding:2%">

                    <div style="display:flex; width:35%; align-items:center; gap: 2%">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <h5>Dados Pessoais</h5>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                    </svg>

                </div>

                <div style="padding:2%">

                    <div>
                        <?php echo "<p>NOME COMPLETO: $nome </p>" ?>

                    </div>

                    <div>
                        <?php echo "<p>CPF: $cpf </p>" ?>

                    </div>

                    <div>
                        <?php echo "<p>TELEFONE: $telefone </p>" ?>

                    </div>

                    <div>
                        <?php echo "<p>DATA NASCIMENTO: $data_nascimento </p>" ?>

                    </div>

                </div>

            </div>

            <div style="background-color: white; margin-top:3%; border-radius: 15px">

                <div style="display:flex; width:95%; justify-content:space-between;align-items:center; padding:2%">

                    <div style="display:flex; width:35%; align-items:center; gap: 2%">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <h5>Endereço</h5>
                    </div>

                    <p>Alterar</p>

                </div>

                <div style="padding:2%; display:flex; gap:2%">


                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1784691732305!2d-46.6552787!3d-23.5620329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c925263541%3A0x4b30df73fca5a36b!2sAv.%20Paulista%2C%201500%20-%20Bela%20Vista%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2001310-100!5e0!3m2!1spt-BR!2sbr!4v1781804741818!5m2!1spt-BR!2sbr" width="200" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    
                    <div style="display:flex; flex-direction:column">
                        <h4>Residencial</h4>
                        <?php echo "<p> $endereco </p>" ?>
                    </div>



                </div>

            </div>
        </div>









    </section>

</body>

</html>