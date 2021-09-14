<?php
$dados = ['salmão', 'tilápia', 'sardinha', 'badejo', 'pescada', 'dourado', 'corvina', 'cavala', 'bagre'];

$objarray = new ArrayObject( $dados );

$objarray->append('bacalhau');

print $objarray->offsetGet(2) . '<br>';
$objarray->offsetSet(2, 'linguado');
print $objarray->count() . '<br>';
$objarray->offsetUnset(4);

if ($objarray->offsetExists(10))
{
    print 'Posição 10 encontrada <br>';
}
else
{
    print 'Posição 10 não encontrada <br>';
}

$objarray[] = 'atum';

$objarray->natsort();

foreach ($objarray as $item)
{
    print 'Item: ' . $item . '<br>';
}

print $objarray->serialize();
