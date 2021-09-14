<?php
require_once 'vendor/autoload.php';

$pdf=new FPDF('P', 'pt', 'A4');
$pdf->AddPage();
// define as margens do documento
$pdf->SetMargins(100, 100, 100);

// exibe uma imagem

// Image(file, x, y, w, h, type, link)
$pdf->Image('images/basquete.jpg', 20, 20, 120);

$x = 160;
$y = 10;

// exibe retângulo vermelho
$pdf->SetFillColor(255,120,120);

//Rect(x, y, w, h, style). D=Draw F=Fill DF/FD=Draw/Fill
$pdf->Rect($x, $y, 200, 100, 'DF');

$x += 20;
$y += 20;

// exibe retângulo verde
$pdf->SetFillColor(170,255,120);
$pdf->Rect($x, $y, 200, 100, 'DF');

$x += 20;
$y += 20;

// exibe retângulo azul
$pdf->SetLineWidth(4);
$pdf->SetDrawColor(255, 255, 0);
$pdf->SetFillColor(100,100,255);
$pdf->Rect($x, $y, 200, 100, 'DF');

// exibe uma imagem
$pdf->Image('images/basquete.jpg', 450, 20, 120);

// define a posição do cursor
$pdf->SetXY(300, 100);

$pdf->SetFont('Arial','B',19);
$pdf->SetTextColor(255, 255, 255);
$pdf->Text(220, 100, 'TEXTO CENTRO');

// define a posição do cursor
$pdf->SetX(20);
$pdf->SetY(160);

$pdf->SetDrawColor(255, 0, 0);
$pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 400, $pdf->GetY());

$pdf->Output('F', 'tmp/fpdf4.pdf');

echo "Arquivo gerado com sucesso.<br>";
echo "<a href='tmp/fpdf4.pdf'>Clique aqui para visualizar</a>.";
