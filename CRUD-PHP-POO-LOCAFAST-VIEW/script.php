<?php 

require_once './app/DB/Conexao.php';

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

$sql = "SELECT valor_locacao, DATE_FORMAT(data_devolucao, '%M-%D') as data_devolucao FROM aluguel WHERE data_devolucao >= NOW() - INTERVAL 1 MONTH";
$res = $mysqli->query($sql);
$data = [];

while($row = $res->fetch_assoc()){
    array_push($data, $row);
}

echo json_encode($data);

?>