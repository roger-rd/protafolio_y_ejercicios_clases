document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('usuarioForm');
    const usuariosTable = document.getElementById('usuariosTable');

    let usuarios = [];
    let modoEdicion = false;

    // Cargar usuarios al cargar la página
    fetchUsuarios();

    // Escuchar el envío del formulario
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const id = document.getElementById('id').value;
        const nombre = document.getElementById('nombre').value;
        const run = document.getElementById('run').value;
        const edad = document.getElementById('edad').value;
        const email = document.getElementById('email').value;

        if (modoEdicion) {
            // Actualizar usuario
            await fetch(`/api/usuarios/${id}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ nombre, run, edad, email })
            });
        } else {
            // Crear usuario
            await fetch('/api/usuarios', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ nombre, run, edad, email })
            });
        }

        resetForm();
        fetchUsuarios();
    });

    // Función para cargar usuarios
    async function fetchUsuarios() {
        const response = await fetch('/api/usuarios');
        usuarios = await response.json();
        renderUsuarios();
    }

    // Función para renderizar usuarios en la tabla
    function renderUsuarios() {
        usuariosTable.innerHTML = '';
        usuarios.forEach(usuario => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${usuario.id}</td>
                <td>${usuario.nombre}</td>
                <td>${usuario.run}</td>
                <td>${usuario.edad}</td>
                <td>${usuario.email}</td>
                <td>
                    <button onclick="editarUsuario(${usuario.id})">Editar</button>
                    <button onclick="eliminarUsuario(${usuario.id})">Eliminar</button>
                </td>
            `;

            usuariosTable.appendChild(row);
        });
    }

    // Función para editar un usuario
    window.editarUsuario = async (id) => {
        const usuario = usuarios.find(u => u.id === id);

        document.getElementById('id').value = usuario.id;
        document.getElementById('nombre').value = usuario.nombre;
        document.getElementById('run').value = usuario.run;
        document.getElementById('edad').value = usuario.edad;
        document.getElementById('email').value = usuario.email;

        modoEdicion = true;
    };

    // Función para eliminar un usuario
    window.eliminarUsuario = async (id) => {
        await fetch(`/api/usuarios/${id}`, { method: 'DELETE' });
        fetchUsuarios();
    };

    // Función para resetear el formulario
    function resetForm() {
        form.reset();
        document.getElementById('id').value = '';
        modoEdicion = false;
    }
});
