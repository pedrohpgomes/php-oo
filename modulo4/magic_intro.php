<?php
class Titulo
{
    private $dt_vencimento;
    private $valor;
    
    public function __construct($dt_vencimento, $valor)
    {
        $this->dt_vencimento = $dt_vencimento;
        $this->valor = $valor;
        print "Método construtor...<br>";
    }
    
    public function __get($propriedade)
    {
        if ($propriedade == 'valor')
        {
            return $this->$propriedade * 1.2;
        }
        
        print "Tentou acessar a propriedade {$propriedade} <br>";
    }
    
    public function __set($propriedade, $conteudo)
    {
        if ($propriedade == 'valor')
        {
            $this->$propriedade = $conteudo * 1.5;
        }
    }
    
    public function __destruct()
    {
        print "Método destrutor... <br>";
    }
}

$tit = new Titulo('2018-10-10', 100);
$tit->setValor(100);

print $tit->valor;
print $tit->teste;

$tit->valor = 200;

//print $tit->valor;
var_dump($tit);

unset($tit);
