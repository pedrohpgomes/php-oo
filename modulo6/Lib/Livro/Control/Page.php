<?php
namespace Livro\Control;

use Livro\Widgets\Base\Element;

/**
 * Page controller
 */
class Page extends Element
{
    /**
     * Método construtor
     */
    public function __construct()
    {
        parent::__construct('div');
    }
    
    /**
     * Executa determinado método de acordo com os parâmetros recebidos
     */
    public function show()
    {
        if ($_GET)
        {
            $method = isset($_GET['method']) ? $_GET['method'] : null;
            
            if (method_exists($this, $method))
            {
                call_user_func( [$this, $method], $_REQUEST );
            }
        }
        
        parent::show();
    }
}
