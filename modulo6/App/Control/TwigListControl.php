<?php
use Livro\Control\Page;

class TwigListControl extends Page
{
    public function __construct()
    {
        parent::__construct();
        
        $loader = new Twig_Loader_Filesystem('App/Resources');
        $twig   = new Twig_Environment($loader);
        $template = $twig->loadTemplate('list.html');
        
        $replaces = [];
        $replaces['titulo']  = 'Lista de pessoas';
        $replaces['pessoas'] = [
            [ 'codigo' => 1,
              'nome'   => 'Anita Garibaldi',
              'endereco' => 'Rua tal,1' ],
            [ 'codigo' => 2,
              'nome'   => 'Bento Gonçalves',
              'endereco' => 'Rua tal,2' ],
            [ 'codigo' => 3,
              'nome'   => 'Giuseppe Garibaldi',
              'endereco' => 'Rua tal,3' ],
        ];
        
        print $template->render( $replaces );
    }
}
