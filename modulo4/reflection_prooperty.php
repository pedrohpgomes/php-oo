<?php
require_once 'veiculo.php';

$rp = new ReflectionProperty('Automovel', 'placa');

print $rp->getName() . '<br>';

print $rp->isPrivate() ? 'É private' : 'Não é private';
echo '<br>';
print $rp->isStatic() ? 'É estático' : 'Não é estático';
