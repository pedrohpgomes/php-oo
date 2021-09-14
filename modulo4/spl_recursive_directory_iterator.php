<?php
$path = '/var/www/html/testes';

foreach (new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS)) as $item)
{
    print (string) $item . '<br>';
}
