<?php

$produto = [];
$produto['descricao'] = 'Chocolate';
$produto['estoque'] = 100;
$produto['preco'] = 7;

$objeto = new stdClass;

foreach ($produto as $chave => $valor)
{
    $objeto->$chave = $valor;
}

echo '<pre>';
print_r($objeto);
echo '</pre>';
