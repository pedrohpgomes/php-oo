<?php
class Funcionario
{
    public $nome;
    public $salario;
    public $departamento;
    function setSalario() {}
    function getSalario() {}
}

$jose = new Funcionario;

if (method_exists( $jose, 'setNome'))
{
    print 'José tem o método setNome() <br>';
}

if (method_exists( $jose, 'setSalario'))
{
    print 'José tem o método setSalario() <br>';
}
