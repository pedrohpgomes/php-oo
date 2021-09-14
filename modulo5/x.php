<?php
require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerTXT.php';
require_once 'classes/api/Record.php';
require_once 'classes/model/x.php';

try {
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('/tmp/log_novo.txt'));
    Transaction::log('Inserindo produto novo');
    
    $p1 = new Produto(7);
    $p1->estoque       = 52;
    $p1->store();
    
    Transaction::close();
}
catch (Exception $e) {
    Transaction::rollback();
    print $e->getMessage();
}
