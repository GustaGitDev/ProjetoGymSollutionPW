let users = []; // Array para armazenar os usuários
let editingIndex = -1; // Índice do usuário em edição, -1 se nenhum estiver sendo editado

function openAddUserModal() {
  document.getElementById('edit-user-modal').style.display = 'block';
}

function closeAddUserModal() {
  document.getElementById('edit-user-modal').style.display = 'none';
  // Limpa os campos do formulário ao fechar o modal
  document.getElementById('name').value = '';
  document.getElementById('email').value = '';
}

function renderUserTable() {
  const tbody = document.getElementById('user-table-body');
  tbody.innerHTML = '';

  users.forEach((user, index) => {
    const row = `<tr>
      
      <td>${user.name}</td>
      <td>${user.email}</td>
      <td>
        <button onclick="editUser(${index})" class="button edit">Editar</button>
        <button onclick="deleteUser(${index})" class="button delete">Deletar</button>
      </td>
    </tr>`;
    tbody.innerHTML += row;
  });
}

function saveUser() {
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;

  if (editingIndex === -1) {
    // Adiciona um novo usuário se não estiver em modo de edição
    const user = { name, email };
    users.push(user);
  } else {
    // Atualiza os dados se estiver em modo de edição
    users[editingIndex].name = name;
    users[editingIndex].email = email;
    // Limpa o índice de edição após salvar
    editingIndex = 0;
  }

  renderUserTable();
  closeAddUserModal();
}

function editUser(index) {
  const user = users[index];
  document.getElementById('name').value = user.name;
  document.getElementById('email').value = user.email;

  // Define o índice de edição para o índice do usuário atual
  editingIndex = index;

  openAddUserModal();
}

function deleteUser(index) {
  users.splice(index, 1);
  renderUserTable();
}

//Inicialização com dados fictícios
users = [
  { name: , email: 'usuario1@email.com' },
  { name: , email: 'usuario2@email.com' }
];

// Renderiza a tabela inicial
renderUserTable();
