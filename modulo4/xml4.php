<?php
$xml = simplexml_load_file('paises2.xml');

print 'Nome: ' . $xml->nome . '<br>';
print 'Idioma: ' . $xml->idioma . '<br>';

print 'Informações geográficas <br>';
print 'Clima: ' . $xml->geografia->clima . '<br>';
print 'Costa: ' . $xml->geografia->costa . '<br>';
print 'Pico: '  . $xml->geografia->pico . '<br>';
