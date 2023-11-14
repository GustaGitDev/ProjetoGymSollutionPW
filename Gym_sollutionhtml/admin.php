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
        <!-- Usuários serão adicionados aqui dinamicamente -->
        <?php
          include_once("../config.inc.php");

          $querySelect = "SELECT * FROM schemagym.dadosmatricula";
          $resultSelect = pg_query($conn, $querySelect);

          if ($resultSelect) {
              while ($row = pg_fetch_array($resultSelect)) {
                  print "<tr>";
                  $cpf = $row['cpf'];
                  print "<td> ". $row['nome'] . " </td>";

                  print "<td> 
                          // <button onclick=\"location.href='?page=editar&cpf=".$row['cpf']."';\">Editar</button>
                          <button >Editar</button>

                          <button id=\"meuBotao\">Excluir</button>
                        </td>";
                  print "</tr>";
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
    <div class="modal-content">
      <span class="close" onclick="closeAddUserModal()">&times;</span>
      <h2>Adicionar/Editar Usuário</h2>
      <form id="user-form">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <div>
          <button type="button" onclick="saveUser()" class="button edit">Salvar</button>
          <button type="button" onclick="deleteUser()" class="button delete">Deletar</button>
        </div>
      </form>
      <div>
      </div>
    </div>
  </div>

  <script>
    
    var meuBotao = document.getElementById('meuBotao');

    meuBotao.addEventListener('click', function() {

      <?php
                                                            //Onde eu acho que talvez seja o problema
        $queryDelete = "DELETE FROM schemagym.dadosmatricula WHERE cpf=".$_REQUEST["cpf"];

        $delete = pg_query($conn, $queryInsert);

        if($delete==true) {
            print "<script>alert('Excluido com sucesso');</script>";
            print "<script>location.href='?page=salvar&acao=excluir&cpf=".$row['cpf']."';</script>";
        } else {
            print "<script>alert('Não foi possível excluir');</script>";
        }

      ?>

    });


  </script>
  <!-- <script src="script.js"></script> -->
</body>
</html>