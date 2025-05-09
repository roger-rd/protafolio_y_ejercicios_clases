<?php
require_once '../../conexion.php'; // Conexión a la base de datos
$mensaje = ''; 
$run = $_GET['run'] ?? ''; // Obtener el run desde la URL

// Si viene un RUN por GET, buscar el empleado en la base de datos
if ($run) {
    $stmt = $conexion->prepare("SELECT run, nombres, apellidos, codigo_departamento FROM empleados WHERE run = ?");
    $stmt->bind_param("s", $run);
    $stmt->execute();
    $empleado = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

// Obtener todos los departamentos para llenar el <select>
$departamentos = $conexion->query("SELECT codigo, nombre FROM departamento");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Empleados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">

        <!-- Título -->
        <h1 class="bg-primary text-white text-center py-3 rounded">✏️ Editar Empleados</h1>

        <!-- Mostrar mensaje si existe (error o éxito) -->
        <?php if ($mensaje): ?>
            <div class="alert <?php echo strpos($mensaje, 'Error') === false ? 'alert-success' : 'alert-danger'; ?> mt-4">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para editar datos del empleado -->
        <div class="card shadow mt-4">
            <div class="card-body">
                <form action="../php/actualizar_empleado.php" method="POST">

                    <!-- Campo RUN (solo lectura) -->
                    <div class="mb-3 row">
                        <label for="run" class="col-sm-3 col-form-label fw-bold">Run</label>
                        <div class="col-sm-6">
                            <input type="text" id="run" name="run" readonly class="form-control"
                                   value="<?php echo htmlspecialchars($empleado['run']); ?>" required>
                        </div>
                    </div>

                    <!-- Campo Nombres -->
                    <div class="mb-3 row">
                        <label for="nombres" class="col-sm-3 col-form-label fw-bold">Nombres</label>
                        <div class="col-sm-6">
                            <input type="text" id="nombres" name="nombres" class="form-control"
                                   value="<?php echo htmlspecialchars($empleado['nombres'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <!-- Campo Apellidos -->
                    <div class="mb-3 row">
                        <label for="apellidos" class="col-sm-3 col-form-label fw-bold">Apellidos</label>
                        <div class="col-sm-6">
                            <input type="text" id="apellidos" name="apellidos" class="form-control"
                                   value="<?php echo htmlspecialchars($empleado['apellidos'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <!-- Select de Departamentos -->
                    <div class="mb-3 row">
                        <label for="codigo_departamento" class="col-sm-3 col-form-label fw-bold">Código Departamento</label>
                        <div class="col-sm-6">
                            <select class="form-select" id="codigo_departamento" name="codigo_departamento" required>
                                <option value="">Seleccione un departamento</option>
                                <?php while ($dep = $departamentos->fetch_assoc()): ?>
                                    <option value="<?php echo $dep['codigo']; ?>"
                                        <?php if ($dep['codigo'] == $empleado['codigo_departamento']) echo 'selected'; ?>>
                                        <?php echo $dep['codigo'] . ' - ' . htmlspecialchars($dep['nombre']); ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-danger">💾 Actualizar Cambios</button>
                        <a href="crud_empleados.php" class="btn btn-secondary">⬅️ Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>

