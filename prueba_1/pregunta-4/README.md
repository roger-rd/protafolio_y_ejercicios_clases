# 📄 Pregunta 4 — CRUD con Express y PostgreSQL

Este proyecto corresponde a la **pregunta 4** de la evaluación. Consiste en un CRUD (Crear, Leer y Eliminar) desarrollado con HTML, CSS y JavaScript para el frontend, y con **Node.js + Express** en el backend, conectado a una base de datos PostgreSQL mediante el cliente `pg`.

---

## 🎯 Objetivo
Implementar un sistema funcional que permita registrar usuarios con los siguientes datos:

- Nombre
- RUN
- Edad

Y mostrarlos en una lista interactiva con opción de eliminación.

---

## 🧩 Tecnologías Utilizadas

- HTML5 + CSS3 (Frontend)
- JavaScript (DOM + Fetch API)
- Node.js + Express (Backend API REST)
- PostgreSQL (Base de Datos con pgAdmin)

---

## 📁 Estructura del Proyecto

```
📦 pregunta-4
├── public
│   ├── index.html
│   ├── styles.css
│   └── script.js
├── server.js
├── package.json
└── database.sql
```

---

## ⚙️ Funcionalidades

✅ Registro de usuarios mediante formulario.  
✅ Validación de campos obligatorios.  
✅ Listado dinámico de usuarios registrados.  
✅ Eliminación de usuarios individuales.  
✅ Conexión a base de datos PostgreSQL.  
✅ Diseño visual moderno con sombras, colores y espaciado.

---

## 🧠 Base de Datos

La base de datos `crud_db` contiene una única tabla `users` con la siguiente estructura:

```sql
CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  run VARCHAR(20) UNIQUE NOT NULL,
  age INT NOT NULL
);
```

---

## 🚀 ¿Cómo correrlo?

1. Clona el proyecto o descarga el repositorio.
2. Ejecuta el script `database.sql` en pgAdmin para crear la tabla.
3. Instala dependencias:
```bash
npm install
```
4. Ejecuta el servidor:
```bash
npm start
```
5. Abre el navegador en: `http://localhost:3000`

---

## 📎 Enlace Deploy

🔗 [Ver App](https://taller-aplicaciones-pregunta-4.netlify.app/) 

---

**Desarrollado por:** Roger Rodríguez 💻  


