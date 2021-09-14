<?php
$file = new SplFileObject('arquivo.txt');

while (!$file->eof())
{
    print 'linha: ' . $file->fgets() . "<br>";
}

echo '<br>';

foreach ($file as $linha => $conteudo)
{
    print "$linha: $conteudo <br>";
}
