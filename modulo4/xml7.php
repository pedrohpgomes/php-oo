<?php
$xml = simplexml_load_file('paises4.xml');

foreach ($xml->estados->estado as $estado)
{
    print 'Nome: ' . $estado['nome'] . 
          '  Capital: ' . $estado['capital'] . '<br>';
}
