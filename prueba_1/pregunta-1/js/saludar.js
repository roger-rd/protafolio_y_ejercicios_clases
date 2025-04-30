// Escucha el clic del botón con id "btn-guardar"
document.getElementById("btn-guardar").addEventListener("click", function () {

    // Obtiene y limpia (quita espacios) los valores de los campos del formulario
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById("apellido").value.trim();
    const rut = document.getElementById("rut").value.trim();
    const edad = document.getElementById("edad").value.trim();

    // Verifica si algún campo está vacío
    if (!nombre || !apellido || !rut || !edad) {
        alert("Por favor, completa todos los campos antes de continuar.");
        return; // Detiene la ejecución si falta algún dato
    }

    // Verifica si el RUT es válido usando una función externa llamada validarRut()
    if (!validarRut(rut)) {
        alert("El RUT ingresado no es válido.");
        return; // Detiene si el RUT es inválido
    }

    // Convierte la edad a número y valida que esté entre 1 y 99
    const edadNumerica = parseInt(edad);
    if (isNaN(edadNumerica) || edadNumerica < 1 || edadNumerica > 99) {
        alert("Por favor, ingresa una edad válida entre 1 y 99.");
        return; // Detiene si la edad no es válida
    }

    // Valida que el nombre tenga entre 4 y 20 caracteres
    if (nombre.length < 4 || nombre.length > 20) {
        alert("El nombre debe tener entre 4 y 20 caracteres.");
        return;
    }

    // Valida que el apellido tenga entre 4 y 20 caracteres
    if (apellido.length < 4 || apellido.length > 20) {
        alert("El apellido debe tener entre 4 y 20 caracteres.");
        return;
    }

    // Si todo está correcto, muestra un saludo con los datos ingresados
    alert(`¡Hola ${nombre} ${apellido}!\n\nTus datos son:\nRUT: ${rut}\nEdad: ${edad}`);
});
