<?php
// carrega as classes necessárias 
require_once 'classes/api/Transaction.php'; 
require_once 'classes/api/Connection.php'; 
require_once 'classes/api/Criteria.php'; 
require_once 'classes/api/Repository.php'; 
require_once 'classes/api/Record.php'; 
require_once 'classes/api/Logger.php'; 
require_once 'classes/api/LoggerTXT.php'; 
require_once 'classes/model/Produto.php'; 

try
{
    Transaction::open('estoque');
    Transaction::setLogger(new LoggerTXT('tmp/log_collection_update.txt'));
    
    $criteria = new Criteria;
    $criteria->add('preco_venda', '<=', 35);
    $criteria->add('origem',      '=',  'N');
    
    $repository = new Repository('Produto');
    $produtos = $repository->load($criteria);
    
    if ($produtos)
    {
        foreach ($produtos as $produto)
        {
            $produto->preco_venda *= 1.3;
            $produto->store();
        }
    }
    
    
    Transaction::close();
}
catch (Exception $e)
{
    print $e->getMessage();
    Transaction::rollback();
}
