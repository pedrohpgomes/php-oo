<?php
//$conn = pg_connect('host=localhost port=5432 dbname=livro user=postgres password=');
$conn = mysqli_connect('127.0.0.1', 'root', '', 'livro');
mysqli_set_charset($conn, "utf8mb4");

if ( !empty($_GET['action']) and ($_GET['action'] == 'delete'))
{
    $id = (int) $_GET['id'];
    mysqli_query($conn, "DELETE FROM pessoa WHERE id='{$id}'");
}

$result = mysqli_query($conn, 'SELECT * from pessoa ORDER BY id');

$items = '';
while ($row = mysqli_fetch_assoc($result))
{  
    $item = file_get_contents('html/item.html');
    $item = str_replace( '{id}',    $row['id'], $item);
    $item = str_replace( '{nome}',    $row['nome'], $item);
    $item = str_replace( '{endereco}',    $row['endereco'], $item);
    $item = str_replace( '{bairro}',    $row['bairro'], $item);
    $item = str_replace( '{telefone}',    $row['telefone'], $item);
    
    $items .= $item;
}

$list = file_get_contents('html/list.html');
$list = str_replace('{items}',   $items, $list);

print $list;

mysqli_close($conn);
?>
