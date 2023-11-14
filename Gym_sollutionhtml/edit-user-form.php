<!-- Adicione este conteúdo ao seu arquivo edit-user-form.php -->
<form id="edit-user-form">
  <label for="name">Nome:</label>
  <input type="text" id="name" name="name" required><br>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br>

  <div>
    <button type="button" onclick="saveUser()" class="button edit">Salvar</button>
    <button type="button" onclick="closeAddUserModal()" class="button delete">Cancelar</button>
  </div>
</form>