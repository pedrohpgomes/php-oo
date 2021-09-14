<?php
class PDFDocumentGenerator
{
    private $pdf;            // objeto PDF
    private $fontSize;
    private $produtos;       // Vetor de Produtos
    private $total_produtos; // Valor total de produtos
    private $count_produtos; // Quantidade de produtos

    /**
     * Método construtor
     * Instancia o objeto FPDF
     */
    public function __construct()
    {
        // Cria um novo documento PDF
        $this->pdf = new FPDF('P', 'pt');
        $this->pdf->SetMargins(2,2,2); // define margens
        
        // Adiciona uma página
        $this->pdf->AddPage();
        $this->pdf->Ln();
    }
    
	/**
	 * Redireciona chamadas
	 */
	public function __call($method, $parameters)
	{
		call_user_func_array([$this->pdf, $method], $parameters);
	}
	
	/**
	 * Define tamanho da fonte
	 */
	public function setFontSize($size)
	{
		$this->pdf->SetFontSize($size);
		$this->fontSize = $size;
	}
	
	/**
	 * Adiciona linha com conteúdos
	 */
	public function addContents($contents)
	{
		$this->pdf->SetY($this->pdf->GetY());
        $this->pdf->SetTextColor(100,100,100);
        $this->pdf->SetX(20);
        
		if ($contents)
		{
			$i = 0;
			foreach ($contents as $content)
			{
				$label = $content[0];
				$width = $content[2];
				
				$this->pdf->Cell($width, $this->fontSize + 4, $label, 'LTR', (int) ($i==count($contents)-1), 'L');
				
				$i ++;
			}
		}
		
        $this->pdf->SetTextColor(0,0,0);
        $this->pdf->SetX(20);
        
		if ($contents)
		{
			$i = 0;
			foreach ($contents as $content)
			{
				$value = $content[1];
				$width = $content[2];
				
				$this->pdf->Cell($width, $this->fontSize + 8, $value, 'LBR', (int) ($i==count($contents)-1), 'L');
				$i++;
			}
		}
    }
    
    /**
     * Adiciona um produto na nota
     * @param $produto Objeto com os atributos do produto
     */
    public function addTableRow( $columns )
    {
		$this->pdf->SetX(20);
        if ($columns)
        {
			$i = 0;
			foreach ($columns as $column)
			{
				$value = $column[0];
				$width = $column[1];
				$align = $column[2];
				
				$this->pdf->Cell($width,  $this->fontSize + 8, $value, 1, (int) ($i==count($columns)-1), $align, 1);
				$i ++;
			}
		}
    }
    
    /**
     * Salva a nota fiscal em um arquivo
     * @param $arquivo localização do arquivo de saída
     */
    public function save($arquivo)
    {
        $this->pdf->Output('F', $arquivo);
    }
}
