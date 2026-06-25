<?php

include __DIR__ . '/includes/header.php';

$host = 'localhost';
$dbname = 'locafast';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT id,nome FROM marcas WHERE status = '1' ");

    $linhas = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                        <label style="margin-right:2%">Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?= $obModelo->nome ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label style="margin-right:2%">Status</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input type="radio" name="status" value="1" <?= $obModelo->status == '1' ? 'checked' : '' ?>> Ativo
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label>
                                    <input type="radio" name="status" value="0" <?= $obModelo->status == '0' ? 'checked' : '' ?>> Inativo
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="form-group" id="veiculos">

                        <label for="meu_select">Marcas:</label>
                        <select name="id_marca" id="meu_select" class="form-control">
                            <option value="">Selecione...</option>
                            <?php foreach ($linhas as $linha) {
                                $id_marca = $linha['id'];
                                $nome = $linha['nome'];

                                $selecionado = ($id_marca == $obModelo->id_marca) ? 'selected' : '';
                                
                            ?>
                                <option value="<?= $id_marca ?>" <?= $selecionado ?>><?= $nome ?></option>
                            <?php } ?>
                        </select>

                    </div>
                </div>



            </div>
            <div class="form-group" style="margin-top: 3%;">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
</main>