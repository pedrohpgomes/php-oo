<?php
try
{
    $conn = new PDO('pgsql:dbname=livro;user=postgres;password=;host=localhost');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $result = $conn->query("SELECT codigo, nome FROM famosos");

    if ($result)
    {
        foreach ($result as $row)
        {
            print $row['codigo'] . '-' . $row['nome'] . '<br>';
        }
    }
    
    $conn = null;
}
catch (PDOException $e)
{
    print 'Erro: ' . $e->getMessage();
}
?>
