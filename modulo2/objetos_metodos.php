<?php
class Funcionario
{
    function setSalario() {}
    function getSalario() {}
    function setNome() {}
    function getNome() {}
}

echo '<pre>';
print_r( get_class_methods('Funcionario') );
echo '</pre>';
