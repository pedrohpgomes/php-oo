<?php
require_once 'veiculo.php';

$rm = new ReflectionMethod('Automovel', 'setPlaca');

print $rm->getName();
echo '<br>';
print $rm->isPrivate() ? 'É private' : 'Não é private';
echo '<br>';
print $rm->isStatic() ? 'É estático' : 'Não é estático';
echo '<br>';
print $rm->isFinal() ? 'É final' : 'Não é final';
echo '<br>';

print_r( $rm->getParameters() );
