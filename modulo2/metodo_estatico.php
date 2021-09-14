<?php
class Software
{
    private $id;
    private $nome;
    private static $contador;
    
    public function __construct($nome)
    {
        self::$contador ++;
        $this->id = self::$contador;
        $this->nome = $nome;
    }
    
    public static function getContador()
    {
        return self::$contador;
    }
}

$s1 = new Software('Gimp');
$s2 = new Software('Gnumeric');

echo '<pre>';
print_r($s1);
print_r($s2);
var_dump(Software::getContador());
echo '</pre>';
