<?php
require_once 'classes/OrcavelInterface.php';
require_once 'classes/Orcamento.php';
require_once 'classes/Servico.php';
require_once 'classes/Produto2.php';

$orc = new Orcamento;
$orc->adiciona( new Produto('Máquina de café', 10, 299), 1);
$orc->adiciona( new Produto('Barbeador elétrico', 10, 170), 1);
$orc->adiciona( new Produto('Barra de chocolate', 10, 7), 3);

$orc->adiciona( new Servico('Conserto', 20), 1);
$orc->adiciona( new Servico('Manutenção', 30), 2);

print $orc->calculaTotal();
