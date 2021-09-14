<?php
use Livro\Control\Page;
use Livro\Widgets\Container\Panel;

class ExemploPanelControl extends Page
{
    public function __construct()
    {
        parent::__construct();
        
        $panel = new Panel('Título do painel');
        $panel->style = 'margin: 20px';
        $panel->add(' conteúdo conteúdo conteúdo conteúdo ');
        $panel->addFooter('rodapé');
        
        parent::add($panel);
    }
}
