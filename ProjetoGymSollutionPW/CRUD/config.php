<?php   
    define('HOST', 'localhost:3307');
    define('USER','root');
    define('PASS','');
    define('BASE', 'cadastro');

    $conn = new MySQLi(HOST,USER,PASS,BASE);
    mysqli_select_db($conn,'cadastro');
    
    $query_create_table = "CREATE TABLE IF NOT EXISTS `cadastro`.`usuarios` (
                          `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
                          `nome` VARCHAR(255) NOT NULL , 
                          `email` VARCHAR(255) NOT NULL , 
                          `senha` VARCHAR(255) NOT NULL , 
                          `data_nasc` DATE NOT NULL , 
                          PRIMARY KEY (`id`))";

  $resultTable = mysqli_query($conn, $query_create_table);

?>