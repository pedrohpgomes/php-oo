<?php
class Titulo
{
    private $data;
    
    public function __set($propriedade, $valor)
    {
        $this->data[$propriedade] = $valor;
    }
    
    public function __get($propriedade)
    {
        return $this->data[$propriedade];
    }
    
    public function __isset($propriedade)
    {
        return isset($this->data[$propriedade]);
    }
    
    public function __unset($propriedade)
    {
        unset($this->data[$propriedade]);
    }
}

$tit = new Titulo;
$tit->valor = 100;
$tit->nome = 'teste';

if (isset($tit->valor))
{
    print "Tem valor";
}

unset($tit->valor);

echo '<pre>';
var_dump($tit);
