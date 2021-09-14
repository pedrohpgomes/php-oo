<?php
$ingredientes = new SplQueue();

$ingredientes->enqueue('Peixe');
$ingredientes->enqueue('Sal');
$ingredientes->enqueue('Limão');

foreach ($ingredientes as $item)
{
    print 'Item: ' . $item . '<br>';
}

echo '<br>';
print $ingredientes->count();
echo '<br>';
print $ingredientes->dequeue();
echo '<br>';

print $ingredientes->count();
echo '<br>';
print $ingredientes->dequeue();
echo '<br>';

print $ingredientes->count();
echo '<br>';
print $ingredientes->dequeue();
echo '<br>';
