<?php
require_once 'Lib/Livro/Core/ClassLoader.php';
$al= new Livro\Core\ClassLoader;
$al->addNamespace('Livro', 'Lib/Livro');
$al->register();

require_once 'Lib/Livro/Core/AppLoader.php';
$al= new Livro\Core\AppLoader;
$al->addDirectory('App/Control');
$al->addDirectory('App/Model');
$al->register();


use Livro\Database\Transaction;
use Livro\Database\Connection;

$obj1 = Connection::open('livro');
var_dump($obj1);
echo '<br><br>';

Transaction::open('livro');
var_dump(new Pessoa(1));
Transaction::close();
