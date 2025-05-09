<?php
require_once '../../conexion.php'; // Conexión a la base de datos

// Mostrar todos los errores (útil en desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener los códigos únicos de la tabla departamento para el <select>
$codigos = $conexion->query("SELECT DISTINCT codigo FROM departamento");

// Consulta base: seleccionar todos los departamentos
$consulta = "SELECT * FROM departamento";

// Revisar si se recibió un código por la URL (GET)
$codigo_filtrado = $_GET['codigo'] ?? '';

if (!empty($codigo_filtrado)) {
    // Si se filtró por código, aplicar WHERE con protección anti-inyección
    $consulta .= " WHERE codigo = '" . $conexion->real_escape_string($codigo_filtrado) . "'";
}

// Ejecutar la consulta filtrada (o no filtrada)
$resultado = $conexion->query($consulta);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Filtrar por Código de Departamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap para diseño responsive -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">

        <!-- Título principal -->
        <h1 class="bg-primary text-white text-center py-3 rounded">
            🎯 Filtrar Departamentos por Código
        </h1>

        <!-- Formulario con select de códigos -->
        <div class="card shadow mt-4">
            <div class="card-body">
                <form method="GET" action="">
                    <div class="row mb-3 align-items-center">
                        <label for="codigo" class="col-sm-4 col-form-label fw-bold">Selecciona un código:</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="codigo" name="codigo">
                                <option value="">Todos los departamentos</option>
                                <?php while ($c = $codigos->fetch_assoc()): ?>
                                    <!-- Marcar seleccionado si coincide con el filtro -->
                                    <option value="<?php echo $c['codigo']; ?>"
                                        <?php if ($c['codigo'] == $codigo_filtrado) echo 'selected'; ?>>
                                        <?php echo $c['codigo']; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-success w-100">🔍 Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Alerta informativa si hay un filtro activo -->
        <?php if (!empty($codigo_filtrado)): ?>
            <div class="alert alert-info text-center mt-4">
                Mostrando información del departamento con código: 
                <strong><?php echo htmlspecialchars($codigo_filtrado); ?></strong>
            </div>
        <?php endif; ?>

        <!-- Tabla con los resultados -->
        <div class="card shadow mt-4">
            <div class="card-body">
                <h4 class="mb-4">🧾 Resultado:</h4>
                <table class="table table-striped table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Presupuesto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($dep = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($dep['codigo']); ?></td>
                                <td><?php echo htmlspecialchars($dep['nombre']); ?></td>
                                <td>$<?php echo number_format($dep['presupuesto'], 2, ',', '.'); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Botón de regreso -->
        <div class="text-center mt-4">
            <a href="crud_empleados.php" class="btn btn-secondary">⬅️ Volver al CRUD</a>
        </div>

    </div>
</body>
</html>
