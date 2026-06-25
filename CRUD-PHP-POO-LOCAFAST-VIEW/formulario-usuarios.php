<?php

include __DIR__ . '/includes/header.php';

?>

<main>

    <h2 class="mt-3"><?= TITLE ?></h2>



    <div class="p-4 bg-light" style="border-radius:10px">
        <form action="" method="post">
            <div class="row">

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label style="margin-right:2%">Nome</label>
                        <input type="text" class="form-control" name="nome_completo" value="<?= $obUsuario->nome_completo ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label style="margin-right:2%">CPF</label>
                        <input type="text" class="form-control" name="cpf" value="<?= $obUsuario->cpf ?>" id="cpf">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label style="margin-right:2%">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $obUsuario->email ?>" id="email">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label style="margin-right:2%">Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" value="<?= $obUsuario->data_nascimento ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label style="margin-right:2%">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="<?= $obUsuario->endereco ?>">
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label style="margin-right:2%">Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="<?= $obUsuario->telefone ?>" id="phone">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label style="margin-right:2%">Senha</label>
                        <input type="password" class="form-control" name="senha" value="<?= $obUsuario->senha ?>">
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="form-group">
                    <label style="margin-right:2%">Status</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <label>
                                <input type="radio" name="status" value="1" <?= $obUsuario->status == '1' ? 'checked' : '' ?>> Ativo
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>
                                <input type="radio" name="status" value="0" <?= $obUsuario->status == '0' ? 'checked' : '' ?>> Inativo
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 2%;">
                    <label style="margin-right:2%">Tipo Usuário</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <label>
                                <input type="radio" name="tipo_usuario" value="Usuário" <?= $obUsuario->tipo_usuario == 'Usuário' ? 'checked' : '' ?>> Usuário
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label>
                                <input type="radio" name="tipo_usuario" value="Administrador" <?= $obUsuario->tipo_usuario == 'Administrador' ? 'checked' : '' ?>> Administrador
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="margin-top: 3%;">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
    </div>
    </form>

    </div>

    <script src="../CRUD-PHP-POO-LOCAFAST-VIEW/JS/usuarios.js"></script>

</main>