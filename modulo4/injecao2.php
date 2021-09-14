<?php
require_once 'classes/Record.php';

interface ExporterInterface
{
    public function export($data);
}

class JSONExporter implements ExporterInterface
{
    public function export($data)
    {
        return json_encode($data);
    }
}

class Pessoa extends Record
{
    const TABLENAME = 'pessoas';
    
    public function export(ExporterInterface $exporter)
    {
        return $exporter->export($this->data);
    }
}

$p = new Pessoa;
$p->nome     = 'Maria';
$p->endereco = 'Rua das flores';
$p->numero   = '123';
print $p->export( new JSONExporter );
