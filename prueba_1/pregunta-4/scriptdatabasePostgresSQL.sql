-- 🔸 Crea una base de datos llamada 'crud_db'
CREATE DATABASE crud_db;

-- 🔸 Conecta a la base de datos recién creada
\c crud_db;

-- 🔸 Crea la tabla 'users' dentro de la base de datos
CREATE TABLE users (
  id SERIAL PRIMARY KEY,           -- Campo 'id' numérico autoincrementable, clave primaria
  name VARCHAR(100) NOT NULL,      -- Campo 'name' de tipo texto con un máximo de 100 caracteres, obligatorio
  run VARCHAR(20) UNIQUE NOT NULL, -- Campo 'run' (como el RUT) que debe ser único y obligatorio
  age INT NOT NULL                 -- Campo 'age' de tipo número entero, obligatorio
);
