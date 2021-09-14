<?php
$xml = simplexml_load_file('paises4.xml');

foreach ($xml->estados->estado as $estado)
{
    foreach ($estado->attributes() as $key => $value)
    {
        print "$key : $value ";
    }
    echo '<br>';
}
