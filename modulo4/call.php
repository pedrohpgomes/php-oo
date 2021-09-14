<?php
class Titulo
{
    public $codigo, $dt_vencimento, $valor, $juros, $multa;
    
    public function __call($method, $values)
    {
        return call_user_func( $method, get_object_vars($this) );
    }
}

$titulo = new Titulo;
$titulo->codigo = 1;
$titulo->dt_vencimento = '2018-10-10';
$titulo->valor = 100;
$titulo->multa = 2;

echo '<pre>';
$titulo->print_r();
echo '<br>';
print $titulo->count();
echo '<br>';
print $titulo->json_encode();
