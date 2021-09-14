<?php
/**
 * Classe CartaInadimplencia
 * Encapsula a geração de uma carta de inadimplência
 */
class RTFDocumentGenerator
{
    private $rtf;
    private $tabela;
    private $secao;
    private $colore;
    private $row;
    
    /**
     * Método construtor
     * Instancia o objeto PHPRtfLite
     */
    public function __construct()
    {
        // instancia a classe Rtf
        $this->rtf = new PHPRtfLite;
        
        // adiciona uma seção ao documento
        $this->secao = $this->rtf->addSection();
    }
    
    /**
     * Adiciona um título ao documento
     * @param $title título da carta
     */
    public function addHeader($title, $font = 'Arial', $size = 16)
    {
        // escreve o tí­tulo em Arial 16 negrito, sublinhado e centralizado
        $this->secao->writeText("<b><u>{$title}</b></u>",
                                new PHPRtfLite_Font($size, $font),
                                new PHPRtfLite_ParFormat('center'));
    }
    
    /**
     * Adiciona um texto à carta
     * @param $body texto da carta
     */
    public function addText($texto, $substituicoes, $font = 'Verdana', $size = 10, $align = 'left')
    {
        $paragrafo = new PHPRtfLite_ParFormat($align);
        $paragrafo->setIndentFirstLine(1);
        $paragrafo->setSpaceBefore(1);
        $paragrafo->setSpaceAfter(1);
        
        if ($substituicoes)
        {
            foreach ($substituicoes as $chave => $conteudo)
            {
                $texto = str_replace('{' . $chave . '}', $conteudo, $texto);
            }
        }
        $this->secao->writeText($texto, new PHPRtfLite_Font($size, $font), $paragrafo);
    }
    
    /**
     * Adiciona a tabela de detalhamento
     * @param $titulos títulos das colunas da tabela
     * @param $larguras larguras dos títulos
     */
    public function addTable($larguras)
    {
        // adiciona a tabela
        $this->tabela = $this->secao->addTable();
        
        // cria o cabeçalho da tabela
        $i = 1;
        //$this->tabela->addRow(0.5);
        foreach ($larguras as $largura)
        {
            $this->tabela->addColumn($largura);
            $i++;
        }
        
        // linha atual da tabela
        $this->row = 1;
    }
    
    /**
     * Adiciona uma linha de detalhamento
     * @param $detalhe objeto contendo o detalhamento
     */
    public function addTableRow($columns, $font = 'Arial', $size = 10, $color = '#000000', $background = '#ffffff')
    {
        $font = new PHPRtfLite_Font($size, $font, $color);
        
        // adiciona uma linha à tabela
        $this->tabela->addRow(0.5);
        
        $this->tabela->setBackgroundForCellRange($background, $this->row, 1, $this->row, $this->tabela->getColumnsCount());
        $col = 1;
        foreach ($columns as $column)
        {
			$this->tabela->writeToCell($this->row, $col, $column[0], $font, new PHPRtfLite_ParFormat($column[1]));
			$col ++;
		}
        $this->row ++;
    }
    
    /**
     * Salvar o arquivo RTF
     * @param $filename localização do arquivo
     */
    public function save($filename)
    {
        $this->rtf->save($filename);
    }
}
