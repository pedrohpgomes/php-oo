<?php
$dados = $_GET;

if ($dados['id'])
{
    //$conn = pg_connect('host=localhost port=5432 dbname=livro user=postgres password=');
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'livro');

    $id  = (int) $dados['id'];
    $sql = "DELETE FROM pessoa WHERE id='{$id}'";
    
    $result = mysqli_query($conn, $sql);
    
    if ($result)
    {
        print 'Registro excluído com sucesso';
    }
    else
    {
        print mysqli_error($conn);
    }
    mysqli_close($conn);
}
