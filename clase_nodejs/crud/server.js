const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const usuariosRoutes = require('./rutas/usuarios');

const app = express();
const PORT = 3000;

// Middlewares
app.use(cors());
app.use(bodyParser.json());
app.use(express.static('public'));

// Rutas
app.use('/api/usuarios', usuariosRoutes);

// Iniciar servidor
app.listen(PORT, () => 
{
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
