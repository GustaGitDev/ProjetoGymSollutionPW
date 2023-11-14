<?php
// Conecta ao banco de dados (substitua pelos seus próprios detalhes de conexão)
include_once("../config.inc.php");

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $cpf = $_POST["cpf"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Atualiza os dados no banco de dados
    $queryUpdate = "UPDATE schemagym.dadosmatricula SET nome = '$name', email = '$email' WHERE cpf = '$cpf'";
    $resultUpdate = pg_query($conn, $queryUpdate);

    if ($resultUpdate) {
        echo json_encode(["success" => true, "message" => "Usuário atualizado com sucesso"]);
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao atualizar usuário"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Requisição inválida"]);
}

// Fecha a conexão com o banco de dados
pg_close($conn);
?>
