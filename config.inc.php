<?php

    $conn = pg_connect("host=localhost dbname=DBgym user=postgres password=Gunow095");

    if($conn){
        echo "Conexão estabelecida com sucesso!";
    }else{
        echo "Erro na conexão!";
    }
    
?>
