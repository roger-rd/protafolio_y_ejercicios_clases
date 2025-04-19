// Selecciona los elementos del DOM
const colorButton = document.getElementById('colorButton');
const textColorButton = document.getElementById('textColorButton');
const buttonColorButton = document.getElementById('buttonColorButton');
const customColorInput = document.getElementById('customColorInput');
const applyCustomColorButton = document.getElementById('applyCustomColor');
const textElement = document.getElementById('text');
const listItems = document.querySelectorAll('#list li');
const buttons = document.querySelectorAll('button');

// Array de colores para el fondo
const backgroundColors = ['#FF5733', '#33FF57', '#3357FF', '#F333FF', '#33FFF5'];

// Array de colores para el texto
const textColors = ['#000000', '#FF0000', '#00FF00', '#0000FF', '#FF00FF'];

// Array de colores para los botones
const buttonColors = ['#FF5733', '#33FF57', '#3357FF', '#F333FF', '#33FFF5'];

// Función para cambiar el color de fondo
function changeBackgroundColor() {
    const randomColor = backgroundColors[Math.floor(Math.random() * backgroundColors.length)];
    document.body.style.backgroundColor = randomColor;
}

// Función para cambiar el color del texto
function changeTextColor() {
    const randomColor = textColors[Math.floor(Math.random() * textColors.length)];
    textElement.style.color = randomColor;
    listItems.forEach(item => {
        item.style.color = randomColor;
    });
}

// Función para cambiar el color de los botones
function changeButtonColors() {
    buttons.forEach(button => {
        const randomColor = buttonColors[Math.floor(Math.random() * buttonColors.length)];
        button.style.backgroundColor = randomColor;
    });
}

// Función para aplicar el color personalizado al fondo
function applyCustomBackgroundColor() {
    const customColor = customColorInput.value;
    document.body.style.backgroundColor = customColor;
}

// Añade event listeners a los botones
colorButton.addEventListener('click', changeBackgroundColor);
textColorButton.addEventListener('click', changeTextColor);
buttonColorButton.addEventListener('click', changeButtonColors);
applyCustomColorButton.addEventListener('click', applyCustomBackgroundColor);