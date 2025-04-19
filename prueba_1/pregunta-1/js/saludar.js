document.getElementById("btn-guardar").addEventListener("click", function () {
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById("apellido").value.trim();
    const rut = document.getElementById("rut").value.trim();
    const edad = document.getElementById("edad").value.trim();

    if (!nombre || !apellido || !rut || !edad) {
        alert("Por favor, completa todos los campos antes de continuar.");
        return;
    }

    if (!validarRut(rut)) {
        alert("El RUT ingresado no es válido.");
        return;
    }

    const edadNumerica = parseInt(edad);
    if (isNaN(edadNumerica) || edadNumerica < 1 || edadNumerica > 99) {
        alert("Por favor, ingresa una edad válida entre 1 y 99.");
        return;
    }
    if (nombre.length < 4 || nombre.length > 20) {
        alert("El nombre debe tener entre 4 y 20 caracteres.");
        return;
    }
    if (apellido.length < 4 || apellido.length > 20) {
        alert("El apellido debe tener entre 4 y 20 caracteres.");
        return;
    }   
    alert(`¡Hola ${nombre} ${apellido}!\n\nTus datos son:\nRUT: ${rut}\nEdad: ${edad}`);
});
