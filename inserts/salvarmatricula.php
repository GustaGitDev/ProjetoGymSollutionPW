<?php

    include_once("../config.inc.php");

    // Alteração da forma de recebimento de dados pelo form
    // para garantir que não ira ocorrer problemas ao salvar os dados
    // no banco de dados (PostGreSql)

    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $telefone = $_REQUEST['telefone'];
    $sexo = $_REQUEST['sexo'];
    $nascimento = $_REQUEST['nascimento'];

    $queryInsert = "INSERT INTO schemagym.dadosmatricula (nome, cpf, telefone, sexo, nascimento)
            VALUES ('$nome', '$cpf', '$telefone', '$sexo', '$nascimento')";

    $insert = pg_query($conn, $queryInsert);
    echo "\n";



?>
<br> <br>
<?php
    echo "Obrigado, $nome. Cadastro realizado com sucesso!";
?>