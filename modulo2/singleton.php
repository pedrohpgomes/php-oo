<?php

require_once 'classes/Preferencias.php';

$p1 = Preferencias::getInstance();

print 'A linguagem é: ' . $p1->getData('language');
print '<br>';
$p1->setData('language', 'pt');

// ------

$p2 = Preferencias::getInstance();

print 'A linguagem é: ' . $p2->getData('language');
print '<br>';
