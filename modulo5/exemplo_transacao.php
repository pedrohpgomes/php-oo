<?php
require_once 'classes/ar/ProdutoComTransacao.php';
require_once 'classes/api/Connection.php';
require_once 'classes/api/Transaction.php';

try
{
    Transaction::open('estoque');
    
    $produto = new Produto;
    $produto->descricao = 'Chocolate amargo';
    $produto->estoque = 80;
    $produto->preco_custo = 4;
    $produto->preco_venda = 7;
    $produto->codigo_barras = '3476394';
    $produto->data_cadastro = date('Y-m-d');
    $produto->origem = 'N';
    $produto->save();
    
    
    
    Transaction::close();
}
catch (Exception $e)
{
    Transaction::rollback();
    print $e->getMessage();
}
