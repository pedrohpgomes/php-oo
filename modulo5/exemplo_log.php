<?php
require_once 'classes/ar/ProdutoComTransacaoELog.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Transaction.php';
require_once 'classes/api/Logger.php';
require_once 'classes/api/LoggerTXT.php';

try
{
    Transaction::open('estoque');
    Transaction::setLogger( new LoggerTXT('log.txt') );
    
    $produto = new Produto;
    $produto->descricao = 'Chocolate branco';
    $produto->estoque = 70;
    $produto->preco_custo = 4;
    $produto->preco_venda = 7;
    $produto->codigo_barras = '14123123';
    $produto->data_cadastro = date('Y-m-d');
    $produto->origem = 'N';
    $produto->save();
    
    
    Transaction::close();

}
catch (Exception $e)
{
    print $e->getMessage();
}
