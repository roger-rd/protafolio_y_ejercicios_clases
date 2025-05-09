# 🏢 Sistema de Gestión de Empresa - Proyecto PHP

Este proyecto fue desarrollado como parte de mi formación en programación. Consiste en un sistema CRUD (Crear, Leer, Actualizar y Eliminar) de departamentos y empleados, con funcionalidades adicionales como subconsultas, joins y filtros, usando **PHP y MySQL**, y estilizado con **Bootstrap 5**.

---

## 📌 Tecnologías utilizadas

- PHP 8+
- MySQL / phpMyAdmin
- HTML5
- Bootstrap 5
- XAMPP (para entorno local)

---

## 📂 Estructura del Proyecto

/departamento
/vistas
crud_departamento.php
crear_departamento.php
editar_departamento.php
filtros_departamento.php
/php
guardar_departamento.php
actualizar_departamento.php
eliminar_departamento.php

/empleados
/vistas
crud_empleados.php
crear_empleados.php
editar_empleados.php
/php
guardar_empleado.php
actualizar_empleado.php
eliminar_empleado.php

/joins
joinUno.php

/subconsultas
subconsultaUno.php
subconsultaDos.php

index.php
conexion.php


---

## ✅ Funcionalidades

### 🔹 CRUD de Departamentos
- Crear nuevos departamentos
- Editar, eliminar y listar departamentos
- Filtros por presupuesto o código

### 🔹 CRUD de Empleados
- Registro de empleados con validación de run
- Relación con código de departamento (FK)
- Edición y eliminación

### 🔹 Joins
- Visualización de empleados junto a su departamento utilizando `INNER JOIN`

### 🔹 Subconsultas
- Subconsulta 1: Empleados en departamentos con presupuesto > 500
- Subconsulta 2: Empleados en el departamento con mayor presupuesto
- Subconsultas combinadas en una sola vista

---

## 🎨 Diseño

El diseño está realizado con **Bootstrap 5**, con:
- Encabezados visuales
- Tablas responsivas
- Botones con íconos
- Cards para dividir secciones

---

## ⚙️ Instalación

1. Clona o descarga el proyecto en tu máquina.
2. Crea una base de datos llamada `trabajo` en phpMyAdmin.
3. Carga las tablas `departamento` y `empleados` (estructura no incluida aquí).
4. Inicia Apache y MySQL desde XAMPP.
5. Accede al proyecto desde:  
   `http://localhost/nombre-del-proyecto/index.php`

---

## ✍️ Autor

**Roger Rodríguez**  
Estudiante de Ingeniería en Informática  
Proyecto académico de práctica en PHP

