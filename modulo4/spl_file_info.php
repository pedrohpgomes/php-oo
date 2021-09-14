<?php
$file = new SplFileInfo('spl_file_info.php');

print 'Nome: ' . $file->getFileName() . '<br>';
print 'Extensão: ' . $file->getExtension() . '<br>';
print 'Tamanho: ' . $file->getSize() . '<br>';
print 'Tipo: ' . $file->getType() . '<br>';
print 'Gravável: ';
var_dump($file->isWritable());
