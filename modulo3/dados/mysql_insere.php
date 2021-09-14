<?php
$conn = mysqli_connect('127.0.0.1', 'root', 'mysql', 'livro');

mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (1, 'Érico Veríssimo')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (2, 'John Lennon')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (3, 'Mahatma Gandhi')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (4, 'Ayrton Senna')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (5, 'Charlie Chaplin')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (6, 'Anita Garibaldi')");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (7, 'Mário Quintana')");

mysqli_close($conn);
