<?php

class Pessoa
{
    protected $nome;
    
    public function __construct($nome)
    {
        $this->nome = $nome;
    }
}

class Funcionario extends Pessoa
{
    private $cargo, $salario;
    
    public function contrata($cargo, $salario)
    {
        if (is_numeric($salario) and $salario > 0)
        {
            $this->cargo = $cargo;
            $this->salario = $salario;
        }
    }
    
    public function getInfo()
    {
        return "Nome: {$this->nome}, Salário: {$this->salario}";
    }
}

$p1 = new Funcionario('Maria da Silva');
$p1->contrata('Auxiliar', 1600);
print $p1->getInfo();
