<?php
$ingredientes = new SplStack;

$ingredientes->push('Peixe');
$ingredientes->push('Sal');
$ingredientes->push('Limão');

foreach ($ingredientes as $item)
{
    print 'Item: ' . $item . '<br>';
}

echo '<br>';
print $ingredientes->count();
echo '<br>';
print $ingredientes->pop();
echo '<br>';

print $ingredientes->count();
echo '<br>';
print $ingredientes->pop();
echo '<br>';

print $ingredientes->count();
echo '<br>';
print $ingredientes->pop();
echo '<br>';
print $ingredientes->count();
