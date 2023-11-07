<?php

    include_once("../config.inc.php");

    $nome = $_REQUEST['nome'];
    $mensagem = $_REQUEST['mensagem'];
    $unidade = $_REQUEST['unidade'];

    $sql = "INSERT INTO contato (nome, mensagem, unidade)
            VALUES ('$nome', '$mensagem', '$unidade')";

    $insert = mysqli_query($conn, $sql);

?>