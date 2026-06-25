<?php

include('app/DB/Conexao.php');


//---------------------------------------------------------------------------------------------------------------------------------------//


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Login</title>
</head>

<body style="background-color: #F7FAEF">

    <div style="width:100%; display:flex; justify-content:center; flex-direction:column">

        <div style="width:100%; display:flex; justify-content:center; align-items:center">
            <div style="display: flex; justify-content:center; flex-direction: column; align-items:center">
                <img src="images/Logo.png" alt="" style="width: 20%;">
                <h1 style="color: #004a16; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Bem-Vindo de Volta</h1>
                <p style="color: #004a16; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Acesse sua conta para gerenciar sua frota</p>
            </div>
        </div>

        <div style=" width: 100%; display:flex; justify-content:center; margin-top:2%">

            <div style="width: 20%; background-color: #FFFFFF; border-radius: 10px">
               
                <form action="" method="POST" onsubmit="event.preventDefault(); submitData();" style="display:flex; justify-content:center; flex-direction:column; padding:5%">

                    <div class="form-group" style="display: flex; flex-direction:column; margin-top:2%">
                        <input type="hidden" id="action" value="login">
                        <label for="exampleInputCpf" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">CPF</label>
                        <input type="text" class="form-control" value="" name="cpf" id="cpf" style="background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px; text-align:center">
                    </div>

                    <div class="form-group" style="display: flex; flex-direction:column; margin-top:10%">
                        <label for="exampleInputSenha" style="color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Senha</label>
                        
                        <input type="password" class="form-control" value="" name="senha" id="senha" style="background-color: #F0F0EA; border:1px solid; height:45px; margin-top:2%; border-radius:10px; text-align:center">
                    </div>
                    <button type="submit" id="buttonlogin" class="btn btn-primary" style="margin-top:12%; background-color:#004a16; color:white; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; height:50px; display:flex; justify-content: center; align-items:center; gap:3%; font-size:20px; border-radius:10px">
                        Entrar <img src="images/arrow.png" alt="">
                    </button>

                    <button type="button" class="btn btn-primary" style="margin-top:12%; background-color:#A6F94B; color:black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; height:50px; display:flex; justify-content: center; align-items:center; gap:3%; font-size:20px; border:none; border-radius:10px">
                        Cadastrar <img src="images/arrow-black.png" alt="">
                    </button>

                </form>


            </div>

        </div>

    </div>

    <?php



    if ($_REQUEST['status'] == 'errorcpf') {

    ?>

        <div>
            sc

        </div>

    <?php
    
    }
    ?>

    <script src="./JS/login.js"></script>

</body>

</html>