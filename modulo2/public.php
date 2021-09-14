<?php
class Pessoa
{
    public $nome;
    public $endereco;
    public $nascimento;
}

$p1 = new Pessoa;
$p1->nome = 'Maria da Silva';
$p1->endereco = 'Rua Bento Gonçalves';
$p1->nascimento = '01 de Maio de 1990';

echo '<pre>';
print_r($p1);
echo '</pre>';
