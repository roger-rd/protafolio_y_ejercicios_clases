// Función que valida si un RUT chileno es correcto
function validarRut(rutCompleto) {
    // Elimina puntos y guión, y convierte todo a mayúsculas
    rutCompleto = rutCompleto.replace(/\./g, '').replace(/-/g, '').toUpperCase();

    // Si el largo es menor a 2 caracteres, no puede ser válido
    if (rutCompleto.length < 2) return false;

    // Separa el número base (sin dígito verificador) y el dígito verificador
    const rut = rutCompleto.slice(0, -1);         // Todos menos el último carácter
    const dv = rutCompleto.slice(-1).toLowerCase(); // Último carácter, en minúscula

    // Algoritmo de validación del dígito verificador
    let suma = 0;
    let multiplo = 2;

    // Recorre el RUT desde el final hacia el inicio
    for (let i = rut.length - 1; i >= 0; i--) {
        suma += parseInt(rut.charAt(i)) * multiplo;
        multiplo = multiplo === 7 ? 2 : multiplo + 1; // Ciclo de multiplicadores: 2 a 7
    }

    const dvEsperado = 11 - (s
