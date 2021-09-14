<?php
class Titulo
{
    public $codigo, $dt_vencimento, $valor, $juros, $multa;
}

$titulo = new Titulo;
$titulo->codigo = 1;
$titulo->dt_vencimento = '2018-10-10';
$titulo->valor = 100;
$titulo->juros = 0.1;
$titulo->multa = 1;

$titulo2 = $titulo;
$titulo2->valor = 200;

echo '<pre>';
var_dump($titulo);
var_dump($titulo2);
