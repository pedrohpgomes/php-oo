<?php
use Livro\Control\Page;
use Livro\Widgets\Base\Element;

class ExemploElementControl extends Page
{
    public function __construct()
    {
        parent::__construct();
        
        $div = new Element('div');
        $div->style = 'text-align:center;';
        $div->style.= 'font-weight:bold;';
        $div->style.= 'font-size:14pt;';
        $div->style.= 'margin:20px;';
        
        $p = new Element('p');
        $p->add('Isto é um teste de parágrafo');
        
        $div->add($p);
        
        parent::add($div);
    }
}
