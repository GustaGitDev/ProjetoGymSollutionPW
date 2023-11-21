<?php   
    define('HOST', 'localhost');
    define('USER','root');
    define('PASS','');
    define('BASE', 'cadastro');

    $conn = new MySQLi(HOST,USER,PASS,BASE);
    mysqli_select_db($conn,'cadastro');
    
    $query_create_table = "CREATE TABLE `usuarios` (
        `id` int(10) UNSIGNED NOT NULL,
        `nome` varchar(45) NOT NULL,
        `email` varchar(255) NOT NULL,
        `senha` varchar(255) NOT NULL,
        `data_nasc` date NOT NULL
      )";

?>