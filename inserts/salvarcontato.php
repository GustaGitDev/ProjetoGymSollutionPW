<?php

    include_once("../config.inc.php");

    $nome = $_REQUEST['nome'];
    $mensagem = $_REQUEST['mensagem'];
    $unidade = $_REQUEST['unidade'];

    $queryInsert = "INSERT INTO schemagym.dadoscontato (nome, mensagem, unidade)
            VALUES ('$nome', '$mensagem', '$unidade')";

    $insert = pg_query($conn, $queryInsert);

?>
<br> <br>
<?php
    echo "Mensagem enviada com sucesso!";
?>