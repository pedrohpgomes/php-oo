<?php
require_once 'classes/Record.php';

class Produto extends Record
{
    const TABLENAME = 'produto';
}

$produto = new Produto;
print $produto->load(10);
echo '<br>';
print $produto->delete(10);
echo '<br>';
$produto->preco = 2;
$produto->nome = 'Chocolate';
print $produto->save();
