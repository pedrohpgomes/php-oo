<?php
try
{
    //$conn = new PDO('pgsql:dbname=livro;user=postgres;password=;host=localhost');
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=livro', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $result = $conn->query("SELECT codigo, nome FROM famosos");

    if ($result)
    {
        //while ($row = $result->fetch( PDO::FETCH_OBJ ))
        while ($row = $result->fetchObject())
        {
            print $row->codigo  . '-' . $row->nome . '<br>';
        }
    }
    
    $conn = null;
}
catch (PDOException $e)
{
    print 'Erro: ' . $e->getMessage();
}
?>
