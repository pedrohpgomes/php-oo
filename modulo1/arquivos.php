<?php

/*
$handler = fopen('/tmp/testes/teste.txt', 'r');
while ( !feof($handler) )
{
    print fgets($handler, 4096);
    print '<br>';
}
fclose($handler);
*/

/*
$handler = fopen('/tmp/testes/teste2.txt', 'w');
fwrite( $handler, 'linha 1' . PHP_EOL);
fwrite( $handler, 'linha 2' . PHP_EOL);
fwrite( $handler, 'linha 3' . PHP_EOL);
fclose( $handler );
*/

//print file_get_contents('/tmp/testes/teste.txt');
//file_put_contents('/tmp/testes/teste3.txt', "a \n b \n c");

/*
$arquivo = file('/tmp/testes/teste.txt');
foreach ($arquivo as $linha)
{
    print $linha . '<br>';
}
*/

// copy('/tmp/testes/teste.txt', '/tmp/testes/novo.txt');
// rename('/tmp/testes/novo.txt', '/tmp/testes/novo2.txt');
// unlink( '/tmp/testes/novo2.txt' );
/*
if (file_exists('/tmp/testes/teste.txt'))
{
    echo 'arquivo teste.txt existe';
}
*/

//mkdir('/tmp/testes/novodir', 0777);
//rmdir('/tmp/testes/novodir');


$arquivos = scandir('/tmp/testes');
foreach ($arquivos as $arquivo)
{
    print $arquivo . '<br>';
}
