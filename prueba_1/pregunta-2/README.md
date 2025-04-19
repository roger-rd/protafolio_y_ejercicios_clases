# 📋 Pregunta 2 — CRUD con LocalStorage

Este ejercicio corresponde a la **pregunta número 2** del trabajo evaluado. Aquí se implementa un formulario que permite **registrar, visualizar, editar y eliminar** datos personales utilizando **HTML, CSS y JavaScript**, con almacenamiento en **LocalStorage** del navegador.

---

## 🧩 Funcionalidades

- Registro de datos personales: Nombre, Apellido, RUT y Edad.
- Validación personalizada del RUT chileno (formato y dígito verificador).
- Alerta de bienvenida al guardar un nuevo registro.
- Visualización en tabla dinámica bajo el formulario.
- Acciones para:
  - ✏️ Editar registros existentes.
  - 🗑️ Eliminar registros individuales.
- Datos persistentes mientras el navegador no borre el `localStorage`.

---

## 🗂️ Estructura de archivos

```
📁 proyecto-pregunta-2
├── index.html
├── js
│   ├── validarRut.js
│   └── guardarUsuarios.js (CRUD + saludo)
├── asset
│   └── styles
│       └── styles.css
└── README.md
```

---

## 💡 Instrucciones para visualizar

Puedes abrir el proyecto localmente con cualquier navegador moderno o acceder directamente a través de Netlify:

🔗 [Ver App](https://taller-aplicaciones-pregunta-2.netlify.app/) 

---

## 🎓 Evaluación

Esta pregunta cubre los siguientes criterios de la rúbrica:

- ✅ Elemento 1: Interfaz estructurada en HTML
- ✅ Elemento 2: Estilos y diseño limpio con CSS
- ✅ Elemento 6: Validación de campos (en especial RUT)
- ✅ Elemento 7: Registro de datos usando almacenamiento local (LocalStorage)
- ✅ Elemento 9: Comportamiento dinámico usando JavaScript

---

## 💬 Comentarios adicionales

Este ejercicio representa una simulación de sistema CRUD básico, ideal para comprender el uso del DOM, validaciones en tiempo real y persistencia local con JavaScript.

---

**Desarrollado por:** Roger Rodríguez ✨


