<?php

$produto = new stdClass;
$produto->descricao = 'Chocolate';
$produto->estoque = 100;
$produto->preco = 7;

echo '<pre>';
var_dump($produto);
echo '</pre>';
