const express = require('express');
const { Pool } = require('pg');

const app = express();
app.use(express.json());
app.use(express.static('public'));

// Configura tu conexión con PostgreSQL
const db = new Pool({
  user: 'postgres',   
  host: 'localhost',
  database: 'crud_db',
  password: 'root',
  port: 5432,
});

// Ruta: obtener todos los usuarios
app.get('/api/users', async (req, res) => {
  try {
    const result = await db.query('SELECT * FROM users');
    res.json(result.rows);
  } catch (err) {
    res.status(500).send(err);
  }
});

// Ruta: crear nuevo usuario
app.post('/api/users', async (req, res) => {
  const { name, run, age } = req.body;
  try {
    const result = await db.query(
      'INSERT INTO users (name, run, age) VALUES ($1, $2, $3) RETURNING *',
      [name, run, age]
    );
    res.json(result.rows[0]);
  } catch (err) {
    res.status(500).send(err);
  }
});

// Ruta: eliminar usuario
app.delete('/api/users/:id', async (req, res) => {
  const { id } = req.params;
  try {
    await db.query('DELETE FROM users WHERE id = $1', [id]);
    res.json({ message: 'Usuario eliminado' });
  } catch (err) {
    res.status(500).send(err);
  }
});

// Iniciar el servidor
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
