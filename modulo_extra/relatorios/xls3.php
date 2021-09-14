<?php
require_once 'vendor/autoload.php';
require_once 'XLSDocumentGenerator.php';

$xls = new XLSDocumentGenerator;
$format_header = $xls->addFormat('Arial', 12, 'black', 'silver', 'center');
$format_data   = $xls->addFormat('Arial', 12, 'black', 'white', 'left');

$xls->addTableRow( [ ['Produto', $format_header],
                     ['Quantidade', $format_header],
                     [utf8_decode('Preço'), $format_header]]);

$xls->addTableRow( [ ['Chocolate', $format_data],
                     [1, $format_data],
                     [10, $format_data]]);

$xls->addTableRow( [ [utf8_decode('Café'), $format_data],
                     [1, $format_data],
                     [5, $format_data]]);

$xls->addTableRow( [ [utf8_decode('Água'), $format_data],
                     [1, $format_data],
                     [5, $format_data]]);

$xls->save('tmp/xls3.xls');

echo "Arquivo gerado com sucesso.<br>";
echo "<a href='tmp/xls3.xls'>Clique aqui para visualizar</a>.";
