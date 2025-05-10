<?php
require_once '../../conexion.php'; // Conexión a la base de datos
$mensaje = ''; // Variable para mostrar mensajes
$codigo = $_GET['codigo'] ?? ''; // Obtener el código del departamento desde la URL

$departamento = null;

// Si se recibió un código, buscar el departamento correspondiente en la base de datos
if ($codigo) {
    $stmt = $conexion->prepare("SELECT codigo, nombre, presupuesto FROM departamento WHERE codigo = ?");
    $stmt->bind_param("s", $codigo); // Enlazar el parámetro recibido
    $stmt->execute();
    $departamento = $stmt->get_result()->fetch_assoc(); // Obtener los datos del departamento
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Departamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Cargar Bootstrap para estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">

        <!-- Título principal -->
        <h1 class="bg-primary text-white text-center py-3 rounded">✏️ Editar Departamento</h1>

        <!-- Mostrar mensaje si está definido -->
        <?php if ($mensaje): ?>
            <div class="alert <?php echo strpos($mensaje, 'Error') === false ? 'alert-success' : 'alert-danger'; ?> mt-4">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para editar el departamento -->
        <div class="card shadow mt-4">
            <div class="card-body">
                <form action="../php/actualizar_departamento.php" method="POST">

                    <!-- Campo Código (solo lectura) -->
                    <div class="mb-3 row">
                        <label for="codigo" class="col-sm-3 col-form-label fw-bold">Código</label>
                        <div class="col-sm-6">
                            <input type="text" id="codigo" name="codigo" readonly class="form-control"
                                   value="<?php echo htmlspecialchars($departamento['codigo']); ?>" required>
                        </div>
                    </div>

                    <!-- Campo Nombre -->
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-3 col-form-label fw-bold">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" id="nombre" name="nombre" class="form-control"
                                   value="<?php echo htmlspecialchars($departamento['nombre'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <!-- Campo Presupuesto -->
                    <div class="mb-3 row">
                        <label for="presupuesto" class="col-sm-3 col-form-label fw-bold">Presupuesto</label>
                        <div class="col-sm-6">
                            <input type="number" id="presupuesto" name="presupuesto" class="form-control"
                                   value="<?php echo htmlspecialchars($departamento['presupuesto'] ?? ''); ?>" required>
                        </div>
                    </div>

                    <!-- Botones: guardar cambios y volver -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-danger">💾 Guardar Cambios</button>
                        <a href="crud_departamento.php" class="btn btn-secondary">⬅️ Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
