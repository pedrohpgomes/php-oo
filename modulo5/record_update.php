<?php
require_once 'classes/api/Transaction.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerTXT.php';
require_once 'classes/api/Record.php';
require_once 'classes/model/Produto.php';

try
{
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('tmp/log_update.txt'));
    
    $p1 = Produto::find(7);
    if ($p1)
    {
        $p1->estoque += 10;
        $p1->store();
    }
    
    Transaction::close();
}
catch (Exception $e)
{
    Transaction::rollback();
    print $e->getMessage();
}
