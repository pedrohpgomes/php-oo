<?php
$xml = simplexml_load_file('paises3.xml');

print 'Nome : '   . $xml->nome . '<br>';
print 'Idioma : ' . $xml->idioma . '<br>';

// print $xml->estados->nome[1];

foreach ($xml->estados->nome as $estado)
{
    print 'Estado: ' . $estado . '<br>';
}
