<?php
function lista_combo_cidades( $id_cidade = null )
{
    //$conn = pg_connect('host=localhost port=5432 dbname=livro user=postgres password=');
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'livro');
    mysqli_set_charset($conn, "utf8mb4");
    $output = '';
    $result = mysqli_query($conn, 'SELECT id, nome FROM cidade');
    if ($result) 
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id'];
            $nome = $row['nome'];
            $check = ($id == $id_cidade) ? 'selected=1' : '';
            $output .= "<option {$check} value='{$id}'> $nome </option>";
        }
    }
    mysqli_close($conn);
    return $output;
}
