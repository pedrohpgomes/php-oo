<?php

$nome = 'Maria';
$sobrenome = ' da Silva';

//$nome_completo = $nome . $sobrenome;
//$nome_completo = "{$nome} - {$sobrenome}";
//var_dump($nome_completo);

//print " Exemplo de 'aspas' ";
//print ' Exemplo de "aspas"';
//print 'Exemplo de \'aspas\'';
//print "Exemplo de \"aspas\"";

print strtoupper($nome . $sobrenome);
echo '<br>';
print strtolower($nome . $sobrenome);
echo '<br>';
print strlen($nome);
echo '<br>';
print substr($nome . $sobrenome, 6, 8);
echo '<br>';
print substr($nome . $sobrenome, 0, 5);
echo '<br>';
print substr($nome . $sobrenome, -3);
echo '<br>';
print str_replace('a', 'e', $nome . $sobrenome);

