<?php
require_once 'vendor/autoload.php';
require_once 'PDFDocumentGenerator.php';

try
{
    $pdf = new PDFDocumentGenerator;
    $pdf->Image('logo.jpg', 10, 0, 150);
    
    $pdf->SetX(20);
    $pdf->SetY(120);
	$pdf->setFont('Arial');
	$pdf->setFontSize(20);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(550, 12, 'PEDIDO ', 0, 0, 'C');
	
    $pdf->SetY(140);
	$pdf->setFont('Arial');
	$pdf->setFontSize(10);
	
	$cliente = new stdClass;
	$cliente->nome      = 'Pablito';
	$cliente->cpf_cnpj  = '1234123412341234';
	$cliente->endereco  = 'Rua dos testes';
	$cliente->bairro    = 'Vizinhança';
	$cliente->telefone  = '(51) 12341234';
	$cliente->cep       = '99.999-999';
	$cliente->municipio = 'Programadores do Sul';
	$cliente->estado    = 'RS';
	$cliente->rg_ie     = '3123412123';
	
    $pdf->addContents( [ ['Nome', $cliente->nome, 300],
                         ['CNPJ/CPF', $cliente->cpf_cnpj, 250 ] ] );
    
    $pdf->addContents( [ ['Endereço', $cliente->endereco, 250],
                         ['Bairro', $cliente->bairro, 150 ],
                         ['CEP', $cliente->cep, 150 ] ] );
    
    $pdf->addContents( [ ['Município', $cliente->municipio, 200],
                         ['Fone', $cliente->telefone, 150 ],
                         ['UF', $cliente->estado, 100 ],
                         ['IE', $cliente->rg_ie, 100 ] ] );
    
	$pdf->SetTextColor(0,0,0);
	
	$pdf->Ln(12);
	$pdf->SetX(20);
	$pdf->Cell(300, 12, 'DADOS DOS PRODUTOS: ', 0, 0, 'L');
	$pdf->Ln(5);
	
	$pdf->SetFillColor(230,230,230);
    $pdf->Ln();
    
    $pdf->setFontSize(10);
	$pdf->addTableRow( [ [ 'Código', 50, 'C' ],
	                     [ 'Descrição', 250, 'L' ],
	                     [ 'Unidade', 50, 'L' ],
	                     [ 'Qtde', 50, 'L' ],
	                     [ 'Valor', 75, 'L' ],
	                     [ 'Total', 75, 'L' ] ] );
    
	$pdf->SetX(20);
	$pdf->SetFillColor(255,255,255);
	
    $total = 0;
    
    $produtos = [];
    $produtos[] = [ 'id' => 1,  'descricao' => 'Pendrive',
                    'unidade' => 'PC', 'quantidade' => 5, 'valor' =>  60 ];
    $produtos[] = [ 'id' => 2,  'descricao' => 'HD',         
                    'unidade' => 'PC', 'quantidade' => 1, 'valor' => 250 ];
    $produtos[] = [ 'id' => 3,  'descricao' => 'Monitor',    
                    'unidade' => 'PC', 'quantidade' => 1, 'valor' => 800 ];
    
    // percorre os dados de retorno
    foreach ($produtos as $produto)
    {
		$pdf->addTableRow( [ [ $produto['id'], 50, 'C' ],
							 [ $produto['descricao'], 250, 'L' ],
							 [ $produto['unidade'], 50, 'C' ],
							 [ $produto['quantidade'], 50, 'C' ],
							 [ number_format($produto['valor'], 2), 75, 'R' ],
							 [ number_format($produto['quantidade'] * $produto['valor'], 2), 75, 'R' ] ] );
		
		$total += ($produto['quantidade'] * $produto['valor']);
    }
    
	$pdf->SetFillColor(240,240,240);
	
	$pdf->addTableRow( [ [ 'Total', 475, 'L' ],
						 [ number_format($total, 2), 75, 'R' ] ] );
    
    $pdf->save('tmp/fpdf_pedido.pdf');
    
    // cria um link para o usuário realizar o download do documento
    echo "Documento gerado com sucesso.<br>";
    echo "<a href='tmp/fpdf_pedido.pdf'>Clique aqui para visualizar</a>.";
} 
catch (Exception $e) 
{ 
    echo $e->getMessage(); // exibe a mensagem de erro 
}
