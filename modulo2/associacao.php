<?php
require_once 'classes/Fabricante.php';
require_once 'classes/Produto.php';

$p1 = new Produto('Chocolate', 10, 7);
$f1 = new Fabricante('Fabrica de chocolate', 'Rua tal...', '93.3823393.333');

$p1->setFabricante($f1);

$descricao = $p1->getDescricao();
$nome_fabr = $p1->getFabricante()->getNome();

print "O Fabricante do produto {$descricao} é {$nome_fabr}";

/*
echo '<pre>';
var_dump($p1);
var_dump($f1);
echo '</pre>';
*/
