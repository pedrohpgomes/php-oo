<?php
require_once 'vendor/autoload.php';

// Cria a planilha
$workbook = new Spreadsheet_Excel_Writer_Workbook;

// Adiciona a pasta
$worksheet = $workbook->addWorksheet();

// Escreve dados
$worksheet->write(0, 0, 'Produto');
$worksheet->write(0, 1, utf8_decode('Preço'));

$worksheet->write(1, 0, 'Chocolate');
$worksheet->write(1, 1, 10);
$worksheet->write(2, 0, utf8_decode('Café'));
$worksheet->write(2, 1, 5);
$worksheet->write(3, 0, utf8_decode('Água'));
$worksheet->write(3, 1, 5);

// salva
$workbook->close('tmp/xls1.xls');

echo "Arquivo gerado com sucesso.<br>";
echo "<a href='tmp/xls1.xls'>Clique aqui para visualizar</a>.";