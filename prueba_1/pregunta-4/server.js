// 🔸 Importa el módulo express para crear el servidor web
const express = require('express');

// 🔸 Importa el Pool desde 'pg' para conectarse a PostgreSQL
const { Pool } = require('pg');

// 🔸 Crea la aplicación express
const app = express();

// 🔸 Permite que el servidor reciba datos en formato JSON
app.use(express.json());

// 🔸 Permite servir archivos estáticos desde la carpeta "public"
app.use(express.static('public'));

// 🔸 Configuración de conexión a la base de datos PostgreSQL
const db = new Pool({
  user: 'postgres',       // Usuario de la base de datos
  host: 'localhost',      // Servidor (en este caso, local)
  database: 'crud_db',    // Nombre de la base de datos
  password: 'root',       // Contraseña del usuario
  port: 5432,             // Puerto por defecto de PostgreSQL
});

app.get('/api/users', async (req, res) => {
  try {
    const result = await db.query('SELECT * FROM users'); // Consulta todos los registros de la tabla 'users'
    res.json(result.rows); // Envía los datos como respuesta en formato JSON
  } catch (err) {
    res.status(500).send(err); // Si ocurre un error, responde con código 500 y el error
  }
});

app.post('/api/users', async (req, res) => {
  const { name, run, age } = req.body; // Extrae los datos enviados por el cliente (nombre, rut y edad)

  try {
    const result = await db.query(
      'INSERT INTO users (name, run, age) VALUES ($1, $2, $3) RETURNING *', // Consulta SQL con parámetros
      [name, run, age] // Valores que se insertan en la base de datos
    );
    res.json(result.rows[0]); // Devuelve el usuario insertado como respuesta
  } catch (err) {
    res.status(500).send(err); // Muestra error si falla
  }
});

app.delete('/api/users/:id', async (req, res) => {
  const { id } = req.params; // Obtiene el ID del usuario desde la URL

  try {
    await db.query('DELETE FROM users WHERE id = $1', [id]); // Elimina el usuario con ese ID
    res.json({ message: 'Usuario eliminado' }); // Envía mensaje de confirmación
  } catch (err) {
    res.status(500).send(err); // Muestra error si falla
  }
});

const PORT = 3000; // Puerto en el que se ejecutará el servidor

app.listen(PORT, () => {
  console.log(`Servidor corriendo en http://localhost:${PORT}`); // Mensaje en consola cuando arranca el servidor
});
