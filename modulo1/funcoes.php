<?php

function calcula_imc(float $peso, float $altura): float
{
    return $peso / ($altura * $altura);
}

// echo calcula_imc( 75, 1.85 );

$total = 0;
function km2milhas($km)
{
        global $total;
        $total += $km;
        return $km * 0.6;
}

/*
echo km2milhas( 100 );
echo km2milhas( 100 );
echo km2milhas( 100 );
var_dump($total);
*/

function percorre($km)
{
    static $total;
    $total += $km;
    print "percorreu mais $km de $total<br>";
}

/*
percorre(100);
percorre(100);
percorre(100);
*/

function incrementa(&$variavel, $valor)
{
    $variavel += $valor;
}

//$teste = 100;
//incrementa($teste, 20);
//var_dump($teste);

//$lista = ['a', 'c', 'b'];
//sort($lista);
//var_dump($lista);


$remove_acento = function($str) {
    return str_replace( [ 'á', 'é', 'í', 'ó', 'ú' ],
                        [ 'a', 'e', 'i', 'o', 'u' ],
                        $str );
};

//var_dump( $remove_acento('bábébíbóbú') );

function teste($palavra, $funcao)
{
    $palavra = $funcao($palavra);
    return strtoupper($palavra);
}

var_dump(teste('bábébíbóbú', $remove_acento));
