<?php

    $conn = mysqli_connect("127.0.0.1", "root", "");
    
    $db = mysqli_select_db($conn, "gymsollutionpw");

    if($conn){
        echo "Conexão estabelecida com sucesso!";
    }else{
        echo "Erro na conexão!";
    }

?>