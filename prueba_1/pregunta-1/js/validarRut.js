// Función que valida si un RUT chileno es correcto
function validarRut(rutCompleto) {
    // Quita puntos y guiones, y convierte todo a mayúsculas
    rutCompleto = rutCompleto.replace(/\./g, '').replace(/-/g, '').toUpperCase();

    // Si el largo es menor a 2, es inválido (mínimo 1 número + 1 dígito verificador)
    if (rutCompleto.length < 2) return false;

    // Separa el cuerpo del RUT (sin el dígito verificador)
    const rut = rutCompleto.slice(0, -1);

    // Separa el dígito verificador (último carácter)
    const dv = rutCompleto.slice(-1).toLowerCase();

    let suma = 0;
    let multiplo = 2;

    // Recorre el RUT desde el final hacia el inicio
    for (let i = rut.length - 1; i >= 0; i--) {
        suma += parseInt(rut.charAt(i)) * multiplo; // Multiplica cada dígito por el multiplicador
        multiplo = multiplo === 7 ? 2 : multiplo + 1; // Cicla el multiplicador entre 2 y 7
    }

    // Calcula el dígito verificador esperado usando el algoritmo del módulo 11
    const dvEsperado = 11 - (suma % 11);
    let dvCalc = '';

    if (dvEsperado === 11) dvCalc = '0';
    else if (dvEsperado === 10) dvCalc = 'k';
    else dvCalc = dvEsperado.toString();

    // Compara el dígito ingresado con el calculado y retorna true o false
    return dv === dvCalc;
}

// Función que muestra mensaje visual sobre la validez del RUT mientras el usuario escribe
function verificarRut() {
    const rutInput = document.getElementById('rut'); // Obtiene el input del RUT
    const mensaje = document.getElementById('mensajeRut'); // Mensaje debajo del input

    const valor = rutInput.value.trim(); // Valor del RUT sin espacios

    if (valor.length >= 7) { // Solo valida si hay suficientes caracteres
        if (!validarRut(valor)) {
            mensaje.textContent = 'RUT inválido'; // Mensaje en rojo si es incorrecto
            mensaje.style.color = 'red';
        } else {
            mensaje.textContent = 'RUT válido'; // Mensaje en verde si es correcto
            mensaje.style.color = 'green';
        }
    } else {
        mensaje.textContent = '(Ej: 12345678-9)'; // Mensaje neutro por defecto
        mensaje.style.color = '#888';
    }
}

// Restringe las teclas permitidas en el input del RUT (solo números, k/K y guion)
document.getElementById('rut').addEventListener('keypress', function (e) {
    const key = e.key;
    const rutValido = /^[0-9kK-]$/;

    if (!rutValido.test(key)) {
        e.preventDefault(); // Bloquea cualquier otro carácter
    }
});
