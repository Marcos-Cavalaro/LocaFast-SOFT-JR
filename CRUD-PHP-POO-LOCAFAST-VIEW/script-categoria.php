<?php 

require_once './app/DB/Conexao.php';

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------\\

$sqlCategoria = "SELECT categoria, COUNT(*) AS total FROM aluguel GROUP BY categoria  ORDER BY total DESC LIMIT 5;";
$resposta = $mysqli->query($sqlCategoria);
$dataCategoria = [];

while($row = $resposta->fetch_assoc()){
    array_push($dataCategoria, $row);
}

echo json_encode($dataCategoria);

?>