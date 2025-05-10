<?php
require_once '../../conexion.php'; // Conexión a la base de datos

$mensaje = ''; // Variable para mostrar mensajes (error o éxito)

// Si el formulario fue enviado por método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Se carga el script que contiene la lógica para guardar el departamento
    require_once '../php/guardar_departamento.php';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Departamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap para estilos visuales -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <!-- Título principal de la vista -->
        <h1 class="bg-primary text-white text-center py-3 rounded">➕ Agregar Nuevo Departamento</h1>

        <!-- Si hay mensaje definido, mostrarlo como alerta -->
        <?php if ($mensaje): ?>
            <div class="alert <?php echo strpos($mensaje, 'Error') === false ? 'alert-success' : 'alert-danger'; ?> mt-4">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para ingresar un nuevo departamento -->
        <div class="card shadow mt-4">
            <div class="card-body">
                <form method="POST" action="">

                    <!-- Campo para el código del departamento -->
                    <div class="mb-3 row">
                        <label for="codigo" class="col-sm-3 col-form-label fw-bold">Código</label>
                        <div class="col-sm-6">
                            <input type="number" id="codigo" name="codigo" required class="form-control">
                        </div>
                    </div>

                    <!-- Campo para el nombre del departamento -->
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-3 col-form-label fw-bold">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" id="nombre" name="nombre" required class="form-control">
                        </div>
                    </div>

                    <!-- Campo para el presupuesto del departamento -->
                    <div class="mb-3 row">
                        <label for="presupuesto" class="col-sm-3 col-form-label fw-bold">Presupuesto</label>
                        <div class="col-sm-6">
                            <input type="number" id="presupuesto" name="presupuesto" required class="form-control">
                        </div>
                    </div>

                    <!-- Botones de acción: guardar y volver -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-success">💾 Guardar Departamento</button>
                        <a href="crud_departamento.php" class="btn btn-secondary">⬅️ Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>
