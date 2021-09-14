<?php
/*
$salario = 1000;
$tempo   = 12;

if ( ( $salario < 1000) && ($tempo >= 12) )
{
    print 'promoção';
}
else
{
    print 'sem promoção';
}
*/

$valor_venda = 80;
/*
if ($valor_venda > 100)
{
    $resultado = 'muito caro';
}
else
{
    $resultado = 'pode comprar';
}
var_dump($resultado);
*/

/*
$resultado = ($valor_venda > 100)? 'muito caro': 'pode comprar';
var_dump($resultado);
*/

/*
$cont = 1;
while ( $cont <= 5 )
{
    print $cont . ' ';
    $cont ++;
}
*/

/*
for ($cont = 1; $cont <= 10 ;$cont ++)
{
    print $cont . ' ';
}
*/


/*
$tipo = 'pdf';

switch ($tipo)
{
    case 'pdf':
        print 'arquivo PDF';
        break;
    case 'doc':
        print 'arquivo DOC';
        break;
    default:
        print 'arquivo default';
}

*/

/*
$tipo = 'doc';

if ($tipo == 'pdf')
{
    print 'arquivo PDF';
}
else if ($tipo == 'doc')
{
    print 'arquivo DOC';
}
else
{
    print 'arquivo default';
}
*/

$lista = ['maça', 'laranja', 'banana'];

foreach ($lista as $fruta)
{
    print $fruta . ' ';
}
