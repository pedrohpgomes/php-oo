<?php
foreach (new DirectoryIterator('/var/www/html/testes/modulo4') as $file)
{
    print (string) $file . '<br>';
    print 'Nome: ' . $file->getFileName() . '<br>';
    print 'Extensão: ' . $file->getExtension() . '<br>';
    print 'Tamanho: ' . $file->getSize() . '<br>';
    print '<br><br>';
}
