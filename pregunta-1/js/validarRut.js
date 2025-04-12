function validarRut(rutCompleto) {
    rutCompleto = rutCompleto.replace(/\./g, '').replace(/-/g, '').toUpperCase();

    if (rutCompleto.length < 2) return false;

    const rut = rutCompleto.slice(0, -1);
    const dv = rutCompleto.slice(-1).toLowerCase();

    let suma = 0;
    let multiplo = 2;

    for (let i = rut.length - 1; i >= 0; i--) {
        suma += parseInt(rut.charAt(i)) * multiplo;
        multiplo = multiplo === 7 ? 2 : multiplo + 1;
    }

    const dvEsperado = 11 - (suma % 11);
    let dvCalc = '';

    if (dvEsperado === 11) dvCalc = '0';
    else if (dvEsperado === 10) dvCalc = 'k';
    else dvCalc = dvEsperado.toString();

    return dv === dvCalc;
}

function verificarRut() {
    const rutInput = document.getElementById('rut');
    const mensaje = document.getElementById('mensajeRut');

    const valor = rutInput.value.trim();

    if (valor.length >= 7) {
        if (!validarRut(valor)) {
            mensaje.textContent = 'RUT inválido';
            mensaje.style.color = 'red';
        } else {
            mensaje.textContent = 'RUT válido';
            mensaje.style.color = 'green';
        }
    } else {
        mensaje.textContent = '(Ej: 12345678-9)';
        mensaje.style.color = '#888';
    }
}
document.getElementById('rut').addEventListener('keypress', function (e) {
    const key = e.key;
    const rutValido = /^[0-9kK-]$/;

    if (!rutValido.test(key)) {
        e.preventDefault();
    }
});