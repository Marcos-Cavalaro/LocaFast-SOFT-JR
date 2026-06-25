<main>

    <h2 class="mt-3">Excluir Histórico </h2>

    <form action="" method="post">

        <div class="form-group">
            <p>Tem certeza que Deseja Excluir o Histórico <strong><?= $obHistorico->descricao ?></strong></p>
        </div>

        <div class="form-group">

            <a href="listagem-historico.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>

            <button type="submit" class="btn btn-danger" name="excluir">Excluir</button>

        </div>

    </form>
</main>