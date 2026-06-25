<?php

include __DIR__ . '/includes/header.php';

require_once './app/DB/Conexao.php';

$host = 'localhost';
$dbname = 'locafast';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $veiculos = $pdo->query("SELECT categorias.nome AS categoria_nome, categorias.valor AS categoria_valor, modelos.nome AS modelo_nome, veiculos.placa, veiculos.id AS id_veiculo 
                             FROM veiculos 
                             JOIN categorias ON veiculos.id_categoria = categorias.id
                             JOIN modelos ON veiculos.id_modelo = modelos.id
                             ;
");

    $clientes = $pdo->query("SELECT id, nome_completo FROM usuarios WHERE status = '1' ");

    $cateorias = $pdo->query("SELECT nome FROM categorias WHERE status = '1'");

    $linhasclientes = $clientes->fetchAll(PDO::FETCH_ASSOC);
    $linhasveiculos = $veiculos->fetchAll(PDO::FETCH_ASSOC);
    $linhascategorias = $cateorias->fetchAll(PDO::FETCH_ASSOC);
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
                    <div class="form-group" id="veiculos">
                        <div class="form-group" id="veiculos">
                            <label for="meu_select">Clientes:</label>
                            <select name="id_cliente" id="meu_select" class="form-control">
                                <option value="">Selecione...</option>
                                <?php foreach ($linhasclientes as $linha) {
                                    $id_cliente = $linha['id'];
                                    $nome = $linha['nome_completo'];

                                    $selecionado = ($id_cliente == $obAluguel->id_cliente) ? 'selected' : '';
                                ?>
                                    <option value="<?= $id_cliente ?>" <?= $selecionado ?>><?= $nome ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <div class="form-group">
                            <label>Status</label>

                            <div>
                                <div class="form-check form-check-inline">
                                    <label>
                                        <input type="radio" name="status" value="Confirmada" <?= $obAluguel->status == 'Confirmada' ? 'checked' : '' ?>> Confirmada
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label>
                                        <input type="radio" name="status" value="Cancelada" <?= $obAluguel->status == 'Cancelada' ? 'checked' : '' ?>> Cancelada
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label>
                                        <input type="radio" name="status" value="Concluida" <?= $obAluguel->status == 'Concluida' ? 'checked' : '' ?>> Concluida
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label>
                                        <input type="radio" name="status" value="Pendente" <?= $obAluguel->status == 'Pendente' ? 'checked' : '' ?>> Pendente
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <div class="form-group">
                            <label>Data Retirada</label>
                            <input type="date" class="form-control" name="data_retirada" value="<?= $obAluguel->data_retirada ?>" id="data_retirada">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <div class="form-group">
                            <label>Data Devolução</label>
                            <input type="date" class="form-control" name="data_devolucao" value="<?= $obAluguel->data_devolucao ?>" id="data_devolucao">
                        </div>
                    </div>
                </div>

                <div class="form-group" id="veiculos" style="width:40%">
                    <label for="meu_select">Veículos:</label>
                    <select name="id_veiculo" id="meu_select-cate" class="form-control">
                        <option value="">Selecione...</option>
                        <?php foreach ($linhasveiculos as $linha) {
                            $id_veiculo = $linha['id_veiculo'];
                            $placa = $linha['placa'];
                            $nome_categoria = $linha['categoria_nome'];
                            $valor = $linha['categoria_valor'];
                            $modelo_nome = $linha['modelo_nome'];

                            $selecionado = ($id_veiculo == $obAluguel->id_veiculo) ? 'selected' : '';
                        ?>
                            <option value="<?= $id_veiculo ?>" <?= $selecionado ?>><?= $placa . " | " . $nome_categoria . " | " . $valor . " | " . $modelo_nome ?> </option>
                        <?php } ?>
                    </select>

                    <?php

                    $sqlCat = " SELECT valor FROM categorias WHERE nome = '$nome_categoria'  ";
                    
                    $resposta = $mysqli->query($sqlCat);
                    
                    foreach($resposta as $respostaCat){
                        $valorCat = $respostaCat['valor'];
                    }
                    echo " <script> console.log($valorCat) </script>";
                    

                    ?>

                    <script>
                        
                        const data_retirada = document.getElementById('data_retirada');
                        const data_devolucao = document.getElementById('data_devolucao');

                        data_devolucao.addEventListener('change', function() {
                            var conversivel = 100;

                            var dataUm = new Date(document.getElementById("data_retirada").value);
                            var dataDois = new Date(document.getElementById("data_devolucao").value);
                            valorDias = parseInt((dataDois - dataUm) / (24 * 3600 * 1000));

                            valorFinal = valorDias * conversivel

                            console.log("Teste: ", valorFinal);
                            document.getElementById('valorlocinput').value = valorFinal;
                        });
                    </script>
                </div>


                <div class="col-md-6">
                    <div class="form-group" id="veiculos" style="width: 30%;">
                        <div class="form-group" id="veiculos">
                            <label for="meu_select">Categorias:</label>
                            <select name="categoria" id="meu_select" class="form-control">
                                <option value="">Selecione...</option>
                                <?php foreach ($linhascategorias as $linha) {
                                    $categoria = $linha['nome'];

                                    $selecionado = ($categoria == $obAluguel->categoria) ? 'selected' : '';
                                ?>
                                    <option value="<?= $categoria ?>" <?= $selecionado ?>><?= $categoria ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <div class="form-group">
                            <label>Valor Locação</label>
                            <input type="number" step="0.01" class="form-control" name="valor_locacao" value="<?= $obAluguel->valor_locacao ?>" id="valorlocinput" readonly>
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