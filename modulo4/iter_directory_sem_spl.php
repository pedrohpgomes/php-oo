<?php
$dir = opendir('/var/www/html/testes/modulo4');

while ($arquivo = readdir($dir))
{
    print $arquivo . '<br>';
}
closedir($dir);
