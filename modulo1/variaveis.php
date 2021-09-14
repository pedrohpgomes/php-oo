<?php
/*
$nome = 'João';
$sobrenome = 'Silva';
print $nome . ' ' . $sobrenome;
$nome_completo = "{$nome} {$sobrenome}";
print $nome_completo;
print "{$nome} \" {$sobrenome}";
$a = 5;
$b = '4.5';
var_dump($a * $b);
*/

/*
$a = 5;
$b = &$a;

$a = 10;

var_dump($a);
var_dump($b);

*/

/*
$nome = '0';

if (!empty($nome))
{
    print 'nome tem conteudo';
}
*/

/*
$lista = [ 'cor' => 'vermelho', 'peso' => 20 ];

var_dump($lista);

*/

$pessoa1 = new stdClass;
$pessoa1->nome = 'Pedro';
$pessoa1->altura = 1.8;

$pessoa2 = $pessoa1;

$pessoa2->nome = 'Joana';

var_dump($pessoa1);
print '<br>';
var_dump($pessoa2);
