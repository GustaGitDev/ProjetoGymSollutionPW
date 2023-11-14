function openAddUserModal() {
  loadForm('add-user-form.php');
}

function closeAddUserModal() {
  document.getElementById('edit-user-modal').style.display = 'none';
}

function openEditUserModal(cpf) {
  loadForm('edit-user-form.php?cpf=' + cpf);
}

function openDeleteUserModal(cpf) {
  loadForm('delete-user-form.php?cpf=' + cpf);
}

function loadForm(formUrl) {
  const modalContent = document.getElementById('modal-content');
  
  // Limpar o conteúdo atual
  modalContent.innerHTML = '';

  // Carregar o conteúdo do formulário
  fetch(formUrl)
    .then(response => response.text())
    .then(data => {
      modalContent.innerHTML = data;
      document.getElementById('edit-user-modal').style.display = 'block';
    })
    .catch(error => console.error('Erro ao carregar o formulário:', error));
}

function saveUser() {
  const cpf = document.getElementById('cpf').value; // Adicione um campo oculto no formulário para armazenar o CPF
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;

  // Aqui você pode adicionar a lógica para enviar os dados para o backend (usando AJAX)
  const formData = new FormData();
  formData.append('cpf', cpf);
  formData.append('name', name);
  formData.append('email', email);

  fetch('update-user.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      console.log(data.message);
      renderUserTable(); // Atualiza a tabela após o sucesso
      closeAddUserModal();
    } else {
      console.error(data.message);
    }
  })
  .catch(error => console.error('Erro na solicitação AJAX:', error));

}

function renderUserTable() {
  const tbody = document.getElementById('user-table-body');
  tbody.innerHTML = '';

  users.forEach(user => {
    const row = `<tr>
      <td>${user.nome}</td>
      <td>
        <button onclick="openEditUserModal('${user.cpf}')">Editar</button>
        <button onclick="openDeleteUserModal('${user.cpf}')">Excluir</button>
      </td>
    </tr>`;
    tbody.innerHTML += row;
  });
}
