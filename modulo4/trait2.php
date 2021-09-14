<?php
require_once 'classes/Record.php';

class Produto extends Record
{
    const TABLENAME = 'produto';
    use ObjectConversionTrait;
}

trait ObjectConversionTrait
{
    public function toXML()
    {
        $xml = new SimpleXMLElement('<'.get_class($this).'/>');
        foreach ($this->data as $key => $value)
        {
            $xml->addChild($key, $value);
        }
        return $xml->asXML();
    }
    
    public function toJSON()
    {
        return json_encode($this->data);
    }
}


$produto = new Produto;
$produto->preco = 2;
$produto->nome = 'Chocolate';
$produto->estoque = 100;

print $produto->toXML();
print $produto->toJSON();
