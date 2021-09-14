<?php
class XLSDocumentGenerator
{
    private $xls;
    private $sheet;
    
    /**
     * Método construtor
     * Instancia o objeto XLS
     */
    public function __construct()
    {
        // Cria um novo documento XLS
        $this->xls = new Spreadsheet_Excel_Writer_Workbook;
        
        $this->sheet = $this->xls->addWorksheet();
        $this->sheet->setInputEncoding('utf-8');
        $this->row   = 0;
    }
    
	/**
	 * Redireciona chamadas
	 */
	public function __call($method, $parameters)
	{
		call_user_func_array([$this->xls, $method], $parameters);
	}
	
	/**
	 * Adiciona formato
	 */
	public function addFormat($font, $size, $color = 'black', $background = 'white', $align = 'left')
	{
        $format = $this->xls->addFormat();
        $format->setFontFamily($font);
        $format->setSize($size);
        $format->setColor($color);
        $format->setFgColor($background);
        $format->setAlign($align);
        
        return $format;
	}
	
	/**
	 * Adiciona linha
	 */
    public function addTableRow( $columns )
    {
        if ($columns)
        {
            
			$i = 0;
			foreach ($columns as $column)
			{
			    $value  = $column[0];
			    $format = $column[1];
			    
			    $this->sheet->write($this->row, $i, $value, $format);
				$i ++;
			}
		}
		
		$this->row ++;
    }
    
    /**
     * Salva arquivo
     * @param $arquivo localização do arquivo de saída
     */
    public function save($arquivo)
    {
        $this->close($arquivo);
    }
}
