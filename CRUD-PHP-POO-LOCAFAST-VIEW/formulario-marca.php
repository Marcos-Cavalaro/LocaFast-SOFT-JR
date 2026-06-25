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
                        <input type="text" class="form-control" name="nome" value="<?= $obMarca->nome ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label style="margin-right:2%">Status</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <label> 
                                    <input type="radio" name="status" value="1" <?= $obMarca->status == '1' ? 'checked' : '' ?>> Ativo
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input type="radio" name="status" value="0" <?= $obMarca->status == '0' ? 'checked' : '' ?>> Inativo
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group" style="margin-top: 3%;">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
</main>