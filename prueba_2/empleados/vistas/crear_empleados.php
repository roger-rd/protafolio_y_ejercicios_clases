  <?php
require_once '../../conexion.php'; // Conecta con la base de datos
$mensaje = '';

// Consulta para obtener la lista de departamentos disponibles desde la base de datos
$departamentos = $conexion->query("SELECT codigo, nombre FROM departamento");

// Si se envió el formulario (método POST), se ejecuta el script para guardar al empleado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once '../php/guardar_empleado.php';
}
?>
    
<!DOCTYPE html> <!-- Documento HTML5 -->
<html lang="es">

<head>
    <meta charset="UTF-8"> <!-- Codificación UTF-8 -->
    <title>Agregar Empleados</title> <!-- Título en la pestaña del navegador -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Diseño responsive -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Estilos Bootstrap -->
</head>

<body class="bg-light">
    <div class="container py-5">

        <!-- Encabezado principal -->
        <h1 class="bg-primary text-white text-center py-3 rounded">➕ Agregar Nuevo Empleado</h1>

        <!-- Muestra un mensaje de éxito o error si existe -->
        <?php if ($mensaje): ?>
            <div class="alert <?php echo strpos($mensaje, 'Error') === false ? 'alert-success' : 'alert-danger'; ?> mt-4">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para registrar un nuevo empleado -->
        <div class="card shadow mt-4">
            <div class="card-body">
                <form method="POST" action="">
                    
                    <!-- Campo RUN -->
                    <div class="mb-3 row">
                        <label for="run" class="col-sm-3 col-form-label fw-bold">Run</label>
                        <div class="col-sm-6">
                            <input type="number" id="run" name="run" required class="form-control">
                        </div>
                    </div>

                    <!-- Campo Nombres -->
                    <div class="mb-3 row">
                        <label for="nombres" class="col-sm-3 col-form-label fw-bold">Nombres</label>
                        <div class="col-sm-6">
                            <input type="text" id="nombres" name="nombres" required class="form-control">
                        </div>
                    </div>

                    <!-- Campo Apellidos -->
                    <div class="mb-3 row">
                        <label for="apellidos" class="col-sm-3 col-form-label fw-bold">Apellidos</label>
                        <div class="col-sm-6">
                            <input type="text" id="apellidos" name="apellidos" required class="form-control">
                        </div>
                    </div>

                    <!-- Selección de departamento -->
                    <div class="mb-3 row">
                        <label for="codigo_departamento" class="col-sm-3 col-form-label fw-bold">Departamento</label>
                        <div class="col-sm-6">
                            <select class="form-select" id="codigo_departamento" name="codigo_departamento" required>
                                <option value="">Seleccione un departamento</option>
                                <?php while ($dep = $departamentos->fetch_assoc()): ?>
                                    <option value="<?php echo $dep['codigo']; ?>">
                                        <?php echo $dep['codigo'] . ' - ' . htmlspecialchars($dep['nombre']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Botones: Guardar y Volver -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-success">💾 Guardar empleado</button>
                        <a href="../php/guardar_empleado.php" class="btn btn-secondary">⬅️ Volver</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>
