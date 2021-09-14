<?php
$conn = pg_connect('host=localhost port=5432 dbname=livro user=postgres password=');

$query = 'SELECT codigo, nome FROM famosos';

$result = pg_query($conn, $query);

if ($result)
{
    while ($row = pg_fetch_assoc($result))
    {
        print $row['codigo']  . ' - ' . $row['nome'] . '<br>';
    }
}

pg_close( $conn );
