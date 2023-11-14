<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="styleadmin.css">
</head>
<body>

  <div id="admin-dashboard">
    <h2>Lista de Usuários</h2>
    <button onclick="openAddUserModal()" class="button">Adicionar Usuário</button>

    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody id="user-table-body">
        <?php
          include_once("../config.inc.php");

          $querySelect = "SELECT * FROM schemagym.dadosmatricula";
          $resultSelect = pg_query($conn, $querySelect);

          if ($resultSelect) {
              while ($row = pg_fetch_array($resultSelect)) {
                  echo "<tr>";
                  $cpf = $row['cpf'];
                  echo "<td>" . $row['nome'] . "</td>";

                  echo "<td> 
                          <button onclick=\"openEditUserModal('$cpf')\">Editar</button>
                          <button onclick=\"openDeleteUserModal('$cpf')\">Excluir</button>
                        </td>";
                  echo "</tr>";
              }
          } else {
              echo "Erro na consulta";
          }

          // Certifique-se de fechar a conexão após o uso
          pg_close($conn);
        ?>
      </tbody>
    </table>
  </div>

  <div id="edit-user-modal" class="modal">
    <div class="modal-content" id="modal-content">
      <span class="close" onclick="closeAddUserModal()">&times;</span>
      <!-- O conteúdo do formulário será carregado dinamicamente aqui -->
    </div>
  </div>

  <script src="script.js"></script>

  <!-- Conteúdo do formulário de adição de usuário -->
  <div id="add-user-form" style="display:none;">
    <form>
      <label for="name">Nome:</label>
      <input type="text" id="name" name="name" required><br>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br>

      <div>
        <button type="button" onclick="saveUser()" class="button edit">Salvar</button>
        <button type="button" onclick="closeAddUserModal()" class="button delete">Cancelar</button>
      </div>
    </form>
  </div>

  <!-- Conteúdo do formulário de edição de usuário -->
  <div id="edit-user-form" style="display:none;">
    <form>
      <label for="name">Nome:</label>
      <input type="text" id="name" name="name" required><br>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br>

      <div>
        <button type="button" onclick="saveUser()" class="button edit">Salvar</button>
        <button type="button" onclick="closeAddUserModal()" class="button delete">Cancelar</button>
      </div>
    </form>
  </div>

  
  <div id="delete-user-form" style="display:none;">
    <form>
      <p>Você tem certeza de que deseja excluir este usuário?</p>
      <div>
        <button type="button" onclick="deleteUser()" class="button delete">Confirmar Exclusão</button>
        <button type="button" onclick="closeAddUserModal()" class="button edit">Cancelar</button>
      </div>
    </form>
  </div>

</body>
</html>
