// 🔹 Selecciona los elementos del HTML por su ID o etiqueta

const colorButton = document.getElementById('colorButton'); // Botón para cambiar color de fondo
const textColorButton = document.getElementById('textColorButton'); // Botón para cambiar color del texto
const buttonColorButton = document.getElementById('buttonColorButton'); // Botón para cambiar color de los otros botones
const customColorInput = document.getElementById('customColorInput'); // Selector de color personalizado
const applyCustomColorButton = document.getElementById('applyCustomColor'); // Botón para aplicar el color personalizado
const textElement = document.getElementById('text'); // Párrafo al que se le cambiará el color del texto
const listItems = document.querySelectorAll('#list li'); // Todos los elementos de la lista
const buttons = document.querySelectorAll('button'); // Todos los botones de la página

// 🔹 Lista (array) de colores para cambiar el fondo aleatoriamente
const backgroundColors = ['#FF5733', '#33FF57', '#3357FF', '#F333FF', '#33FFF5'];

// 🔹 Lista de colores para cambiar el texto aleatoriamente
const textColors = ['#000000', '#FF0000', '#00FF00', '#0000FF', '#FF00FF'];

// 🔹 Lista de colores para cambiar los botones aleatoriamente
const buttonColors = ['#FF5733', '#33FF57', '#3357FF', '#F333FF', '#33FFF5'];

// 🔸 Función que cambia el color de fondo de la página
function changeBackgroundColor() {
    const randomColor = backgroundColors[Math.floor(Math.random() * backgroundColors.length)];
    document.body.style.backgroundColor = randomColor; // Aplica el color al fondo del body
}

// 🔸 Función que cambia el color del texto del párrafo y de los ítems de la lista
function changeTextColor() {
    const randomColor = textColors[Math.floor(Math.random() * textColors.length)];
    textElement.style.color = randomColor; // Cambia el color del texto principal
    listItems.forEach(item => {
        item.style.color = randomColor; // Cambia el color de cada ítem de la lista
    });
}

// 🔸 Función que cambia el color de fondo de todos los botones
function changeButtonColors() {
    buttons.forEach(button => {
        const randomColor = buttonColors[Math.floor(Math.random() * buttonColors.length)];
        button.style.backgroundColor = randomColor; // Aplica un color aleatorio a cada botón
    });
}

// 🔸 Función que aplica el color personalizado elegido por el usuario al fondo
function applyCustomBackgroundColor() {
    const customColor = customColorInput.value; // Toma el valor del input de tipo color
    document.body.style.backgroundColor = customColor; // Cambia el fondo con ese color
}

// 🔸 Añade funciones a los botones para que se activen al hacer clic

colorButton.addEventListener('click', changeBackgroundColor); // Clic en "Cambiar Color de Fondo"
textColorButton.addEventListener('click', changeTextColor); // Clic en "Cambiar Color del Texto"
buttonColorButton.addEventListener('click', changeButtonColors); // Clic en "Cambiar Color de los Botones"
applyCustomColorButton.addEventListener('click', applyCustomBackgroundColor); // Clic en "Aplicar Color Personalizado"
