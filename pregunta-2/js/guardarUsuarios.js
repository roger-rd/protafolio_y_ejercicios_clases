// Selecciona el formulario en el HTML
const form = document.querySelector('form');

// Crea un elemento <tbody> que luego usaremos para llenar la tabla
const tableBody = document.createElement('tbody');

// Cuando la página cargue completamente, llamamos a la función que muestra los datos guardados
window.addEventListener('DOMContentLoaded', () => {
    mostrarDatos();
});

// Prevenimos que el formulario recargue la página por defecto al presionar Enter
form.addEventListener('submit', (e) => {
    e.preventDefault();
});

// Evento que se ejecuta cuando se hace clic en el botón "Guardar"
document.getElementById("btn-guardar").addEventListener("click", function () {
    // Capturamos el contenido de cada input del formulario
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById("apellido").value.trim();
    const rut = document.getElementById("rut").value.trim();
    const edad = document.getElementById("edad").value.trim();

    // Validamos que todos los campos estén llenos
    if (!nombre || !apellido || !rut || !edad) {
        alert("Por favor, completa todos los campos.");
        return;
    }

    // Validamos el RUT usando la función que ya definimos
    if (!validarRut(rut)) {
        alert("El RUT ingresado no es válido.");
        return;
    }

    // Mostramos un mensaje personalizado de saludo si todo es válido
    alert(`¡Hola ${nombre} ${apellido}!\n\nTus datos se han guardado correctamente.`);

    // Obtenemos los datos actuales desde localStorage (si no hay nada, usamos un arreglo vacío)
    const data = JSON.parse(localStorage.getItem("usuarios")) || [];

    // Creamos un objeto nuevo con los datos ingresados
    const nuevoUsuario = {
        nombre: nombre,
        apellido: apellido,
        rut: rut,
        edad: edad
    };

    // Agregamos el nuevo objeto al arreglo de usuarios
    data.push(nuevoUsuario);

    // Guardamos el arreglo actualizado en localStorage
    localStorage.setItem("usuarios", JSON.stringify(data));

    // Limpiamos el formulario
    form.reset();

    // Volvemos a mostrar los datos actualizados en pantalla
    mostrarDatos();
});

// Esta función muestra todos los datos guardados en localStorage en una tabla
function mostrarDatos() {
    const datos = JSON.parse(localStorage.getItem("usuarios")) || [];
    const contenedor = document.getElementById("cajadatos");

    // Creamos la estructura básica de la tabla con sus encabezados
    contenedor.innerHTML = `
        <h2>Datos Almacenados</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>RUT</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    `;

    // Creamos el cuerpo de la tabla donde irán los datos
    const table = contenedor.querySelector("table");
    const tbody = document.createElement("tbody");

    // Recorremos cada usuario guardado y generamos una fila por cada uno
    datos.forEach((usuario, index) => {
        const row = document.createElement("tr");

        // Insertamos los datos y botones de acción (Editar y Eliminar)
        row.innerHTML = `
            <td>${usuario.nombre}</td>
            <td>${usuario.apellido}</td>
            <td>${usuario.rut}</td>
            <td>${usuario.edad}</td>
            <td>
                <button class="btnEdit" onclick="editarUsuario(${index})">Editar</button>
                <button class="btnDelete" onclick="eliminarUsuario(${index})">Eliminar</button>
            </td>
        `;
        tbody.appendChild(row);
    });

    // Agregamos el <tbody> completo a la tabla
    table.appendChild(tbody);
}

// Esta función elimina un usuario del arreglo y actualiza localStorage
function eliminarUsuario(index) {
    const data = JSON.parse(localStorage.getItem("usuarios")) || [];

    // Quitamos el usuario correspondiente al índice recibido
    data.splice(index, 1);

    // Guardamos el nuevo arreglo sin ese usuario
    localStorage.setItem("usuarios", JSON.stringify(data));

    // Volvemos a mostrar la tabla actualizada
    mostrarDatos();
}

// Esta función precarga los datos del usuario seleccionado para editarlos
function editarUsuario(index) {
    const data = JSON.parse(localStorage.getItem("usuarios")) || [];
    const usuario = data[index];

    // Rellenamos los campos del formulario con los datos del usuario
    document.getElementById("nombre").value = usuario.nombre;
    document.getElementById("apellido").value = usuario.apellido;
    document.getElementById("rut").value = usuario.rut;
    document.getElementById("edad").value = usuario.edad;

    // Eliminamos el usuario original para que al guardar se reemplace con los nuevos datos
    eliminarUsuario(index);
}
