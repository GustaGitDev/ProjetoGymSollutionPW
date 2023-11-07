<?php

    include_once("../config.inc.php");

    // $nome = $_REQUEST['nome'];
    // $cpf = $_REQUEST['cpf'];
    // $telefone = $_REQUEST['telefone'];
    // $sexo = $_REQUEST['sexo'];
    // $nascimento = $_REQUEST['nascimento'];
    $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
    $cpf = mysqli_real_escape_string($conn, $_REQUEST['cpf']);
    $telefone = mysqli_real_escape_string($conn, $_REQUEST['telefone']);
    $sexo = mysqli_real_escape_string($conn, $_REQUEST['sexo']);
    $nascimento = mysqli_real_escape_string($conn, $_REQUEST['nascimento']);

    $sql = "INSERT INTO matricula (nome, cpf, telefone, sexo, nascimento)
            VALUES ('$nome', '$cpf', '$telefone', '$sexo', '$nascimento')";

    $insert = mysqli_query($conn, $sql);

    echo "\n";

    echo "Obrigado, $nome. Cadastro realizado com sucesso!";

?>