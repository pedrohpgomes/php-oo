<?php
require_once 'vendor/autoload.php';

$workbook = new Spreadsheet_Excel_Writer_Workbook;

$format_title = $workbook->addFormat();
$format_title->setBold();

$format_header = $workbook->addFormat();
$format_header->setBold();
$format_header->setFontFamily('Arial');
$format_header->setSize(12);
$format_header->setColor('white');
$format_header->setFgColor('blue');
$format_header->setAlign('center');

$worksheet = $workbook->addWorksheet();
$worksheet->setColumn(0, 0, 40);
$worksheet->setColumn(1, 1, 40);
$worksheet->setColumn(1, 1, 40);

$worksheet->write(0, 0, utf8_decode("Título do relatório"), $format_header);

$worksheet->mergeCells (0, 0, 0, 2);

$worksheet->write(1, 0, "Produto", $format_title);
$worksheet->write(1, 1, "Quantidade", $format_title);
$worksheet->write(1, 2, utf8_decode("Preço"), $format_title);

$worksheet->write(2, 0, "Chocolate");
$worksheet->write(2, 1, 10);
$worksheet->write(2, 2, 10);

$worksheet->write(3, 0, utf8_decode("Café"));
$worksheet->write(3, 1, 10);
$worksheet->write(3, 2, 5);

$worksheet->write(4, 0, utf8_decode("Água"));
$worksheet->write(4, 1, 10);
$worksheet->write(4, 2, 5);

$workbook->close('tmp/xls2.xls');

echo "Arquivo gerado com sucesso.<br>";
echo "<a href='tmp/xls2.xls'>Clique aqui para visualizar</a>.";