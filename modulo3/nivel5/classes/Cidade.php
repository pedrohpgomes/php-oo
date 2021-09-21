<?php
class Cidade
{
    public static function all()
    {
        //$conn = new PDO("pgsql:dbname=livro;user=postgres;host=127.0.0.1");
        $conn = new PDO("mysql:host=127.0.0.1;dbname=livro;charset=utf8mb4", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $result = $conn->query("SELECT * FROM cidade ORDER BY id");
        return $result->fetchAll();
    }
}
