<?php
require_once 'classes/Produto.php';
require_once 'classes/Caracteristica.php';

$p1 = new Produto('Chocolate', 10, 7);
$p1->addCaracteristica( 'Cor', 'Branco');
$p1->addCaracteristica( 'Peso', '500gr');

/*
echo '<pre>';
print_r($p1);
echo '</pre>';
*/

print 'Produto: ' . $p1->getDescricao() . '<br>';
foreach ($p1->getCaracteristicas() as $caracteristica)
{
    $nome  = $caracteristica->getNome();
    $valor = $caracteristica->getValor();
    
    print "Característica {$nome} = {$valor} <br>";
}
