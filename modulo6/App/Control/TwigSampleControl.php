<?php
use Livro\Control\Page;

class TwigSampleControl extends Page
{
    public function __construct()
    {
        $loader   = new Twig_Loader_Filesystem('App/Resources');
        $twig     = new Twig_Environment($loader);
        $template = $twig->loadTemplate('form.html');
        
        $replaces = [];
        $replaces['title'] = 'Título do form';
        $replaces['action'] = 'index.php?class=TwigSampleControl&method=onGravar';
        $replaces['nome'] = 'Maria';
        $replaces['endereco'] = 'Rua das flores';
        $replaces['telefone'] = '(51) 1234-5678';
        
        print $template->render( $replaces );
    }
    
    public function onGravar($params)
    {
        echo '<pre>';
        var_dump($params);
        echo '</pre>';
    }
}
