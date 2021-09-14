<?php
use Livro\Control\Page;

class TwigWelcomeControl extends Page
{
    public function __construct()
    {
        parent::__construct();
        
        $loader = new Twig_Loader_Filesystem('App/Resources');
        $twig   = new Twig_Environment($loader);
        $template = $twig->loadTemplate('welcome.html');
        
        $replaces = [];
        $replaces['nome'] = 'Maria da Silva';
        $replaces['rua'] = 'Rua das flores';
        $replaces['cep'] = '91871923';
        $replaces['fone'] = '(51) 13123123';
        
        print $template->render( $replaces );
    
    }
    
    public function onSaibaMais($params)
    {
        echo 'mais informações...';
        echo $params['nome'];
        echo $params['rua'];
    }
}
