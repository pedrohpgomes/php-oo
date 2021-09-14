<?php
require_once 'vendor/autoload.php';

// instancia a classe FPDF
$pdf=new FPDF('P', 'pt', 'A4');

// adiciona uma página
$pdf->AddPage();

// define a fonte
$pdf->SetFont('Arial','B',16);

// imprime duas versões do título
$pdf->Cell(510, 20, 'Título sem borda', 0, 1, 'C');
// w, h, txt, border, ln, align, fill, link
$pdf->Cell(510, 20, 'Título com borda', 1, 1, 'C');
$pdf->Ln(20);

// imprime célula vermelha alinhada à esquerda
$pdf->SetFillColor(255,120,120);
// w, h, txt, border, ln, align, fill, link
$pdf->Cell(170, 30,'Alinhado a esquerda', 1, 0, 'L', TRUE, 'www.teste.com');

// imprime célula verde alinhada ao centro
$pdf->SetFillColor(170,255,120);
// w, h, txt, border, ln, align, fill, link
$pdf->Cell(170, 30,'Alinhado ao centro', 1, 0, 'C', TRUE, 'www.teste.com');

// imprime célula azul alinhada à direita
$pdf->SetFillColor(100,100,255);
// w, h, txt, border, ln, align, fill, link
$pdf->Cell(170, 30,'Alinhado a direita', 1, 1, 'R', TRUE, 'www.teste.com');

// cria variáveis de texto com repetições
$txt1 = str_repeat('cell ', 40);
$txt2 = str_repeat('multicell ', 12);

// vinte pontos de espaçamento
$pdf->Ln(20);

// imprime usando a função Cell
$pdf->SetFont('Times', 'B', 14);
$pdf->SetTextColor(100, 50, 50); // tom de vermelho
$pdf->Cell(510, 20, $txt1, 0, 1, 'L', FALSE);

$pdf->Ln(20);

// imprime usando a função MultiCell
$pdf->SetTextColor(50, 100, 50); // tom de verde
$pdf->MultiCell(510, 20, $txt2, 0, 'L', FALSE);
$pdf->Ln(10);
$pdf->MultiCell(510, 20, $txt2, 1, 'L', FALSE);

$pdf->Ln(20);
$pdf->SetX(200); // altera a posição X
$pdf->MultiCell(340, 20, 'SetX '. $txt2, 1, 'L', FALSE);
$pdf->Ln(20);

$pdf->Output('F', 'tmp/fpdf2.pdf');

echo "Arquivo gerado com sucesso.<br>";
echo "<a href='tmp/fpdf2.pdf'>Clique aqui para visualizar</a>.";
