<?php
$dados = $_POST;

if ($dados['id'])
{
    //$conn = pg_connect('host=localhost port=5432 dbname=livro user=postgres password=');
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'livro');
    
    $sql = "UPDATE pessoa SET nome      = '{$dados['nome']}',
                              endereco  = '{$dados['endereco']}',
                              bairro    = '{$dados['bairro']}',
                              telefone  = '{$dados['telefone']}',
                              email     = '{$dados['email']}',
                              id_cidade = '{$dados['id_cidade']}'
                          WHERE id = '{$dados['id']}'";
    $result = mysqli_query($conn, $sql);
    
    if ($result)
    {
        print 'Registro atualizado com sucesso';
    }
    else
    {
        print mysqli_error($conn);
    }
    mysqli_close($conn);
}
