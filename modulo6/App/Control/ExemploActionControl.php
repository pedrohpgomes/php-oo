<?php
use Livro\Control\Page;
use Livro\Control\Action;

class ExemploActionControl extends Page
{
    public function __construct()
    {
        parent::__construct();
        
        $action = new Action( [$this, 'executaAcao']);
        $action->setParameter('codigo', 4);
        $action->setParameter('nome', 'teste');
        
        print $action->serialize();
    }
    
    public function executaAcao()
    {
        
    }
}
