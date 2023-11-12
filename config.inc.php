<?php

    $conn = pg_connect("host=localhost dbname=DBgym user=postgres password=MFFO1803");

    if($conn){
        echo "Conexão estabelecida com sucesso!";
    }else{
        echo "Erro na conexão!";
    }

    $schemagym = 'schemagym';

    $querySchema = "CREATE SCHEMA IF NOT EXISTS $schemagym;";

    $resultSchema = pg_query($conn, $querySchema);

    if ($resultSchema) {
        echo "<br>Schema criado com sucesso!";
    } else {
        echo "Erro ao criar o schema: " . pg_last_error($conn);
    }

    $queryTable = "CREATE TABLE IF NOT EXISTS schemagym.dadosmatricula
    (
        cpf BIGSERIAL PRIMARY KEY,
        nome VARCHAR(200) NOT NULL,
        telefone BIGINT NOT NULL,
        sexo VARCHAR(15) NOT NULL,
        nascimento DATE NOT NULL
    )";

    $resultTable = pg_query($conn, $queryTable);

    if ($resultTable) {
        echo "<br>Tabela criada com sucesso!";
    } else {
        echo "Erro ao criar a tabela: " . pg_last_error($conn);
    }

?>
