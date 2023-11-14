<?php
    include_once("config.inc.php");

    $querySelect = "SELECT * FROM schemagym.dadosmatricula";
    $resultSelect = pg_query($conn, $querySelect);

    if ($resultSelect) {
        while ($row = pg_fetch_array($resultSelect)) {
            echo "Nome: " . $row['nome'] . "<br>";
        }
    } else {
        echo "Erro na consulta";
    }

    // Certifique-se de fechar a conexão após o uso
    pg_close($conn);

?>

