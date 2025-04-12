const express = require('express');
const db = require('../conexionBD');

const router = express.Router();

// Obtener todos los usuarios
router.get('/', async (req, res) => {
    try {
        const [rows] = await db.query('SELECT * FROM usuarios');
        res.json(rows);
    } catch (error) {
        res.status(500).json({ error: 'Error al obtener usuarios' });
    }
});

// Crear un nuevo usuario
router.post('/', async (req, res) => {
    const { nombre, run, edad, email } = req.body;

    // Validaciones básicas
    if (!nombre || !run || !edad || !email) {
        return res.status(400).json({ error: 'Todos los campos son obligatorios' });
    }

    try {
        await db.query('INSERT INTO usuarios (nombre, run, edad, email) VALUES (?, ?, ?, ?)', [nombre, run, edad, email]);
        res.status(201).json({ message: 'Usuario creado exitosamente' });
    } catch (error) {
        res.status(500).json({ error: 'Error al crear usuario' });
    }
});

// Actualizar un usuario
router.put('/:id', async (req, res) => {
    const { id } = req.params;
    const { nombre, run, edad, email } = req.body;

    // Validaciones básicas
    if (!nombre || !run || !edad || !email) {
        return res.status(400).json({ error: 'Todos los campos son obligatorios' });
    }

    try {
        await db.query('UPDATE usuarios SET nombre = ?, run = ?, edad = ?, email = ? WHERE id = ?', [nombre, run, edad, email, id]);
        res.json({ message: 'Usuario actualizado exitosamente' });
    } catch (error) {
        res.status(500).json({ error: 'Error al actualizar usuario' });
    }
});

// Eliminar un usuario
router.delete('/:id', async (req, res) => {
    const { id } = req.params;

    try {
        await db.query('DELETE FROM usuarios WHERE id = ?', [id]);
        res.json({ message: 'Usuario eliminado exitosamente' });
    } catch (error) {
        res.status(500).json({ error: 'Error al eliminar usuario' });
    }
});

module.exports = router;
 