<?php

include __DIR__ . '/includes/header.php';

$host = 'localhost';
$dbname = 'locafast';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT id,nome FROM categorias WHERE status = '1' ");
    $stmt2 = $pdo->query("SELECT id,nome FROM modelos WHERE status = '1' ");

    $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $linhas2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>

<main>

    <h2 class="mt-3"><?= TITLE ?></h2>

    <div class="p-4 bg-light" style="border-radius:10px">
        <form action="" method="post">
            <div class="row">

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label style="margin-right: 2%;">Placa</label>
                        <input type="text" class="form-control" name="placa" value="<?= $obVeiculo->placa ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label style="margin-right: 2%;">Ano de Fabricação</label>
                        <input type="date" class="form-control" name="ano_fabricacao" value="<?= $obVeiculo->ano_fabricacao ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group" id="veiculos">
                        <label for="meu_select">Modelos:</label>
                        <select name="id_modelo" id="meu_select" class="form-control">
                            <option value="">Selecione...</option>
                            <?php foreach ($linhas2 as $linha) {
                                $id_modelo = $linha['id'];
                                $nome = $linha['nome'];

                                $selecionado = ($id_modelo == $obVeiculo->id_modelo) ? 'selected' : '';
                            ?>
                                <option value="<?= $id_modelo ?>" <?= $selecionado ?>><?= $nome ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group" id="veiculos">
                        <label for="meu_select">Categorias:</label>
                        <select name="id_categoria" id="meu_select" class="form-control">
                            <option value="">Selecione...</option>
                            <?php foreach ($linhas as $linha) {
                                $id_categoria = $linha['id'];
                                $nome = $linha['nome'];

                                $selecionado = ($id_categoria == $obVeiculo->id_categoria) ? 'selected' : '';
                            ?>
                                <option value="<?= $id_categoria ?>" <?= $selecionado ?>><?= $nome ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label style="margin-top: 2%;">Status</label>

                        <div>

                            <div class="form-check form-check-inline">
                                <label>
                                    <input type="radio" name="status" value="Disponivel" <?= $obVeiculo->status == 'Disponivel' ? 'checked' : '' ?>> Disponivel
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <label>
                                    <input type="radio" name="status" value="Alugado" <?= $obVeiculo->status == 'Alugado' ? 'checked' : '' ?>> Alugado
                                </label>
                            </div>

                            <div class="form-check form-check-inline">
                                <label>
                                    <input type="radio" name="status" value="Em Manutenção" <?= $obVeiculo->status == 'Em Manutenção' ? 'checked' : '' ?>> Em Manutenção
                                </label>
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