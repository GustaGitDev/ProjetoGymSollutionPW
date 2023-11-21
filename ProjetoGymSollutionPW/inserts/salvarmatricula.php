<?php

    include_once("../config.inc.php");

    // Alteração da forma de recebimento de dados pelo form
    // para garantir que não ira ocorrer problemas ao salvar os dados
    // no banco de dados (MariaDB)

    $nome = mysqli_real_escape_string($conn, $_REQUEST['nome']);
    $cpf = mysqli_real_escape_string($conn, $_REQUEST['cpf']);
    $telefone = mysqli_real_escape_string($conn, $_REQUEST['telefone']);
    $sexo = mysqli_real_escape_string($conn, $_REQUEST['sexo']);
    $nascimento = mysqli_real_escape_string($conn, $_REQUEST['nascimento']);

    $sql = "INSERT INTO matricula (nome, cpf, telefone, sexo, nascimento)
            VALUES ('$nome', '$cpf', '$telefone', '$sexo', '$nascimento')";

    $insert = mysqli_query($conn, $sql);

    echo "\n";

?>
<br> <br>
<?php
    echo "Obrigado, $nome. Cadastro realizado com sucesso!";
?>