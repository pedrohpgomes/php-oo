<?php
$conn = pg_connect('host=localhost port=5432 dbname=livro user=postgres password=');

if ( !empty($_GET['action']) and ($_GET['action'] == 'delete'))
{
    $id = (int) $_GET['id'];
    pg_query($conn, "DELETE FROM pessoa WHERE id='{$id}'");
}

$result = pg_query($conn, 'SELECT * from pessoa ORDER BY id');

$items = '';
while ($row = pg_fetch_assoc($result))
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
?>
