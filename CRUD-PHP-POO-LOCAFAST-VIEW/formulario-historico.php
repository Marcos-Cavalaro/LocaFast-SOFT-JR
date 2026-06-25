<?php

include __DIR__ . '/includes/header.php';

$host = 'localhost';
$dbname = 'locafast';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT id,placa,status FROM veiculos");

    $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>

<main>

    <h2 class="mt-3"><?= TITLE ?></h2>

    <form action="" method="post">

        <div class="form-group" id="veiculos">

            <label for="meu_select">Veículos:</label>
            <select name="id_veiculo" id="meu_select" class="form-control">
                <option value="">Selecione...</option>
                <?php foreach ($linhas as $linha) {
                    $id_veiculo= $linha['id'];
                    $placa= $linha['placa'];

                    $selecionado = ($id_veiculo == $obhistorico_manutencao->id_veiculo) ? 'selected' : '';

                ?>
                    <option value="<?= $id_veiculo ?>" <?= $selecionado ?>><?= $placa?></option>
                <?php } ?>
            </select>

        </div>

        <div class="form-group">
            <label>Data Manutenção</label>
            <input type="date" class="form-control" name="data_manutencao" value="<?= $obhistorico_manutencao->data_manutencao ?>">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" class="form-control" name="descricao" value="<?= $obhistorico_manutencao->descricao ?>">
        </div>


        <div class="form-group">
            <label>Status</label>

            <div>
                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" name="status" value="Iniciada" <?= $obhistorico_manutencao->status == 'Iniciada' ? 'checked' : '' ?>> Iniciada
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" name="status" value="Em Andamento" <?= $obhistorico_manutencao->status == 'Em Andamento' ? 'checked' : '' ?>> Em Andamento
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" name="status" value="Concluida" <?= $obhistorico_manutencao->status == 'Concluida' ? 'checked' : '' ?>> Concluida
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label>
                        <input type="radio" name="status" value="Finalizada" <?= $obhistorico_manutencao->status == 'Finalizada' ? 'checked' : '' ?>> Finalizada
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin-top: 3%;">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>
</main>