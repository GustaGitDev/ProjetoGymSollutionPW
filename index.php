<?php

    include_once("config.inc.php");

    $schemagym = 'schemagym';

    $querySchema = "CREATE SCHEMA IF NOT EXISTS $schemagym;";

    $resultSchema = pg_query($conn, $querySchema);

    if ($resultSchema) {
        echo "<br>Schema criado com sucesso!";
    } else {
        echo "Erro ao criar o schema: " . pg_last_error($conn);
    }

    $queryMatricula = "CREATE TABLE IF NOT EXISTS schemagym.dadosmatricula
    (
        cpf BIGSERIAL PRIMARY KEY,
        nome VARCHAR(200) NOT NULL,
        telefone BIGINT NOT NULL,
        sexo VARCHAR(15) NOT NULL,
        nascimento DATE NOT NULL
    )";

    $resultMatricula = pg_query($conn, $queryMatricula);

    if ($resultMatricula) {
        echo "<br>Tabela Matricula criada com sucesso!";
    } else {
        echo "Erro ao criar a tabela Matricula: " . pg_last_error($conn);
    }


    $queryContato = "CREATE TABLE IF NOT EXISTS schemagym.dadoscontato
    (
        id BIGSERIAL PRIMARY KEY,
        nome character varying(200),
        mensagem character varying(700) NOT NULL,
        unidade character varying(15) NOT NULL
    )";

    $resultContato = pg_query($conn, $queryContato);

    if ($resultContato) {
        echo "<br>Tabela Contatos criada com sucesso!";
    } else {
        echo "Erro ao criar a tabela Contatos: " . pg_last_error($conn);
}

?>