<?php
// Informações de conexão com o banco de dados
$host = 'localhost';
$port = '5432';  // geralmente 5432
$dbname = 'DBgym';
$user = 'postgres';
$password = 'MFFO1803';

// Conectar ao banco de dados
$db = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$db) {
    die("Erro na conexão: " . pg_last_error());
}

// Verificar se o formulário foi enviado para excluir usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir_usuario'])) {
    $usuario_id = $_POST['excluir_usuario'];
    $query = "DELETE FROM usuarios WHERE id = $usuario_id";
    $result = pg_query($db, $query);

    if (!$result) {
        die("Erro ao excluir usuário: " . pg_last_error());
    }
}

// Consulta para obter a lista de usuários
$query = "SELECT id, nome, email FROM usuarios";
$result = pg_query($db, $query);

if (!$result) {
    die("Erro na consulta: " . pg_last_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h2>Lista de Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>
                    <a href='editar_usuario.php?id=" . $row['id'] . "'>Editar</a> |
                    <form method='post' action=''>
                        <input type='hidden' name='excluir_usuario' value='" . $row['id'] . "'>
                        <input type='submit' value='Excluir'>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Fechar a conexão com o banco de dados
pg_close($db);
?>
