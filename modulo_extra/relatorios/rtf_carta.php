<?php

require_once 'vendor/autoload.php';
require_once 'RTFDocumentGenerator.php';
date_default_timezone_set('America/Sao_Paulo');

try
{
    $replaces = array();
    $replaces['local']      = 'Lajeado';
    $replaces['data']       = date('d-m-Y');
    $replaces['nome']       = 'Maria da Silva';
    $replaces['endereco']   = 'Rua dos testes';
    $replaces['bairro']     = 'Vizinhança boa';
    $replaces['municipio']  = 'Programadores do Sul';
    $replaces['uf']         = 'RS';
    $replaces['cep']        = '95.123-123';
    $replaces['empresa']    = 'Super Eventos';
    
    $carta = new RTFDocumentGenerator;
    
    $carta->addHeader('Confirmação de inscrição', 'Times', 20);
    
    // adiciona o texto à carta a partir de um arquivo texto
    $carta->addText(utf8_encode(file_get_contents('carta.txt')), $replaces, 'Verdana', 10, 'left');
    
    // cria matriz com os títulos e larguras das colunas
    $carta->addTable( [ 7, 4, 2, 2, 2 ] );
    
    $carta->addTableRow( [ [ 'Curso', 'center' ],
                           [ 'Professor', 'left'],
                           [ 'Sala', 'center'],
                           [ 'Horário', 'center'],
                           [ 'Taxa', 'center'] ], 'Verdana', 10, '#ffffff', '#6466DE' );
    
    $inscricoes = [];
    $inscricoes[] = [ 'curso' => 'PHP com Orientação a Objetos',    'professor' => 'Pablo Dall Oglio',   'horario' => '08:00', 'sala' => 100, 'taxa' => 15 ];
    $inscricoes[] = [ 'curso' => 'Bancos de dados não relacionais', 'professor' => 'Ari Stopassola',     'horario' => '10:00', 'sala' => 200, 'taxa' => 15 ];
    $inscricoes[] = [ 'curso' => 'Programação Javascript',          'professor' => 'Matheus Agnes Dias', 'horario' => '12:00', 'sala' => 300, 'taxa' => 15 ];
    
    $total = 0;
    foreach ($inscricoes as $inscricao)
    {
        $carta->addTableRow([ [$inscricao['curso'], 'left'],
							  [$inscricao['professor'], 'left'],
							  [$inscricao['horario'], 'center'],
							  [$inscricao['sala'], 'center'],
							  [number_format($inscricao['taxa'], 2, ',', '.'), 'center'] ]);
        $total += $inscricao['taxa'];
    }
    
    $carta->addTableRow([ ['', 'left'],
						  ['', 'left'],
						  ['', 'center'],
						  ['', 'center'],
						  [number_format($total, 2, ',', '.'), 'center'] ], 'Verdana', '10', '#000000', '#CFCFCF');
						  
    // salva a carta em um arquivo
    $carta->save('tmp/rtf_carta.rtf');
    
    // cria um link para o usuário realizar o download da carta
    echo "Documento gerado com sucesso.<br>";
    echo "<a href='tmp/rtf_carta.rtf'>Clique aqui para visualizar</a>.";
} 
catch (Exception $e) 
{ 
    echo $e->getMessage(); // exibe a mensagem de erro 
}
