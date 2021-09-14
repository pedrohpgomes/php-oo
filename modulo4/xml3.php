<?php
$xml = simplexml_load_file('paises.xml');

foreach ($xml->children() as $elemento => $valor)
{
    print "$elemento : $valor <br>";
}
