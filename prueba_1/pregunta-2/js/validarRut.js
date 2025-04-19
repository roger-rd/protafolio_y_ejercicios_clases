// Función que valida si un RUT chileno es correcto según su dígito verificador
function validarRut(rutCompleto) {
    // Quitamos puntos y guiones y pasamos todo a mayúscula
    rutCompleto = rutCompleto.replace(/\./g, '').replace(/-/g, '').toUpperCase();

    // Si tiene menos de 2 caracteres, no es válido (falta RUT o dígito verificador)
    if (rutCompleto.length < 2) return false;

    // Separar el RUT numérico del dígito verificador
    const rut = rutCompleto.slice(0, -1);          // todos los dígitos menos el último
    const dv = rutCompleto.slice(-1).toLowerCase(); // último carácter convertido a minúscula

    // Inicializamos la suma y el multiplicador (según regla del cálculo)
    let suma = 0;
    let multiplo = 2;

    // Recorremos el RUT de derecha a izquierda
    for (let i = rut.length - 1; i >= 0; i--) {
        suma += parseInt(rut.charAt(i)) * multiplo;
        multiplo = multiplo === 7 ? 2 : multiplo + 1; // ciclo de 2 a 7
    }

    // Cálculo del dígito verificador esperado
    const dvEsperado = 11 - (suma % 11);
    let dvCalc = '';

    if (dvEsperado === 11) dvCalc = '0';
    else if (dvEsperado === 10) dvCalc = 'k';
    else dvCalc = dvEsperado.toString();

    // Retornamos true si el dígito ingresado coincide con el calculado
    return dv === dvCalc;
}

// Función que se ejecuta cada vez que el usuario escribe en el campo RUT
function verificarRut() {
    const rutInput = document.getElementById('rut');         // Input del RUT
    const mensaje = document.getElementById('mensajeRut');   // Elemento donde mostramos mensaje

    const valor = rutInput.value.trim(); // eliminamos espacios innecesarios

    // Cuando el RUT tiene 7 o más caracteres, lo validamos
    if (valor.length >= 7) {
        if (!validarRut(valor)) {
            mensaje.textContent = 'RUT inválido';
            mensaje.style.color = 'red';
        } else {
            mensaje.textContent = 'RUT válido';
            mensaje.style.color = 'green';
        }
    } else {
        // Si es muy corto, mostramos ayuda básica
        mensaje.textContent = '(Ej: 12345678-9)';
        mensaje.style.color = '#888';
    }
}
