<?php
function apresenta($nome)
{
    print "Olá $nome";
}

// apresenta('Pablo');
$funcao = 'apresenta';
call_user_func( $funcao, 'Pablo' );

echo '<br>';

class Pessoa
{
    public static function apresenta($nome)
    {
        print "Olá $nome";
    }
}

// Pessoa::apresenta('Pablo');

$classe = 'Pessoa';
$metodo = 'apresenta';

call_user_func( [$classe, $metodo], 'Pablo' );

echo '<br>';

$obj = new Pessoa;
call_user_func( [$obj, $metodo], 'Pablo' );
