<main>

    <section>

        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>

    </section>

    <h2 class="mt-3"><?= TITLE ?></h2>

    <form action="" method="post">

        <div class="form-group">
            <label>Titulo</label>
            <input type="text" class="form-control" name="Titulo" value="<?= $obVaga->Titulo ?>">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" name="Descricao" rows="5"><?= $obVaga->Descricao ?></textarea>
        </div>

        <div class="form-group">
            <label>Status Vaga</label>

            <div>
                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" name="Ativo" value="Sim" <?= $obVaga->Ativo == 'Sim' ? 'checked' : '' ?>> Ativo
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" name="Ativo" value="Nao" <?= $obVaga->Ativo == 'Nao' ? 'checked' : '' ?>> Inativo
                    </label>
                </div>
            </div>


        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>
</main>