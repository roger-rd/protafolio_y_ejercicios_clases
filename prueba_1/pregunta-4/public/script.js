//  Espera que todo el contenido del HTML esté cargado antes de ejecutar el script
document.addEventListener('DOMContentLoaded', () => {
  fetchUsers(); // Llama a la función para cargar la lista de usuarios desde el servidor

  const form = document.getElementById('userForm'); // Selecciona el formulario por su ID
  form.addEventListener('submit', handleFormSubmit); // Le asigna la función que se ejecutará al hacer submit
});

//  Función que obtiene los usuarios desde el backend (GET)
async function fetchUsers() {
  try {
    const response = await fetch('/api/users'); // Hace una solicitud al backend
    const users = await response.json(); // Convierte la respuesta en formato JSON
    renderUserList(users); // Llama a la función para mostrar los usuarios en pantalla
  } catch (error) {
    console.error('Error al obtener usuarios:', error); // Muestra error si falla la petición
  }
}

//  Función que se ejecuta al enviar el formulario
function handleFormSubmit(event) {
  event.preventDefault(); // Evita que se recargue la página

  //  Toma los valores ingresados en los campos del formulario
  const name = document.getElementById('name').value.trim();
  const run = document.getElementById('run').value.trim();
  const age = document.getElementById('age').value.trim();

  //  Verifica que todos los campos estén llenos
  if (!name || !run || !age) {
    alert('Todos los campos son obligatorios.');
    return;
  }

  //  Crea un objeto con los datos del usuario
  const user = { name, run, age: parseInt(age) };

  //  Llama a la función para guardar el nuevo usuario
  createUser(user);

  //  Limpia los campos del formulario
  clearForm();
}

//  Función que envía un nuevo usuario al backend (POST)
async function createUser(user) {
  try {
    await fetch('/api/users', {
      method: 'POST', // Método HTTP para crear
      headers: { 'Content-Type': 'application/json' }, // Tipo de contenido
      body: JSON.stringify(user), // Convierte el objeto a JSON para enviarlo
    });
    fetchUsers(); // Vuelve a cargar la lista actualizada
  } catch (error) {
    console.error('Error al crear usuario:', error);
  }
}

//  Función para eliminar un usuario por ID (DELETE)
async function deleteUser(id) {
  try {
    await fetch(`/api/users/${id}`, { method: 'DELETE' }); // Solicitud al backend para eliminar
    fetchUsers(); // Recarga la lista actualizada
  } catch (error) {
    console.error('Error al eliminar usuario:', error);
  }
}

//  Función que muestra la lista de usuarios en la interfaz
function renderUserList(users) {
  const userList = document.getElementById('userTableBody'); // Selecciona el contenedor de la lista
  userList.innerHTML = ''; // Limpia cualquier contenido anterior

  //  Recorre el arreglo de usuarios y crea un <li> por cada uno
  users.forEach((user) => {
    const li = document.createElement('li'); // Crea un nuevo elemento de lista
    li.innerHTML = `
      <span>${user.name} (${user.run}, ${user.age} años)</span>
      <div class="actions">
        <button onclick="deleteUser(${user.id})">Eliminar</button> <!-- Botón para eliminar al usuario -->
      </div>
    `;
    userList.appendChild(li); // Agrega el elemento al listado
  });
}
//  Función que limpia los campos del formulario
function clearForm() {
  document.getElementById('name').value = '';
  document.getElementById('run').value = '';
  document.getElementById('age').value = '';
}
