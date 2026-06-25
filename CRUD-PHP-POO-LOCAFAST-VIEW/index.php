<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Aluguel;
use \App\Entity\Categorias;
use \App\Entity\usuarios;
use \App\Entity\historico_manutencao;
use \App\Entity\Marcas;
use \App\Entity\Modelos;
use \App\Entity\Veiculos;

$alugueis = Aluguel::getAlugueis();
$categorias = Categorias::getCategorias();
$clientes = usuarios::getUsuarios();
$historicos = historico_manutencao::getHistoricos();
$marcas = Marcas::getMarcas();
$modelos = Modelos::getModelos();
$veiculos = Veiculos::getVeiculos();

include __DIR__ . '/includes/home.php';
//include __DIR__ . '/includes/header.php';
//include __DIR__ .'/includes/listagem.php';
//include __DIR__ . '/includes/listagem-alunos.php';
//include __DIR__ . '/includes/listagem-professores.php';

// include __DIR__ .'/includes/footer.php';



//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------//