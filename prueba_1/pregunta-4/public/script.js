document.addEventListener('DOMContentLoaded', () => {
  fetchUsers();

  const form = document.getElementById('userForm');
  form.addEventListener('submit', handleFormSubmit);
});

async function fetchUsers() {
  try {
    const response = await fetch('/api/users');
    const users = await response.json();
    renderUserList(users);
  } catch (error) {
    console.error('Error al obtener usuarios:', error);
  }
}

function handleFormSubmit(event) {
  event.preventDefault();

  const name = document.getElementById('name').value.trim();
  const run = document.getElementById('run').value.trim();
  const age = document.getElementById('age').value.trim();

  if (!name || !run || !age) {
    alert('Todos los campos son obligatorios.');
    return;
  }

  const user = { name, run, age: parseInt(age) };

  createUser(user);

  clearForm();
}

async function createUser(user) {
  try {
    await fetch('/api/users', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(user),
    });
    fetchUsers();
  } catch (error) {
    console.error('Error al crear usuario:', error);
  }
}

async function deleteUser(id) {
  try {
    await fetch(`/api/users/${id}`, { method: 'DELETE' });
    fetchUsers();
  } catch (error) {
    console.error('Error al eliminar usuario:', error);
  }
}

function renderUserList(users) {
  const userList = document.getElementById('userTableBody');
  userList.innerHTML = '';

  users.forEach((user) => {
    const li = document.createElement('li');
    li.innerHTML = `
      <span>${user.name} (${user.run}, ${user.age} años)</span>
      <div class="actions">
        <button onclick="deleteUser(${user.id})">Eliminar</button>
      </div>
    `;
    userList.appendChild(li);
  });
}

function clearForm() {
  document.getElementById('name').value = '';
  document.getElementById('run').value = '';
  document.getElementById('age').value = '';
}