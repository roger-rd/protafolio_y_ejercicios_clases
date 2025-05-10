<?php
require_once '../../conexion.php'; // Conexión a la base de datos

// Mostrar errores (útil para desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener todos los presupuestos únicos de los departamentos para el <select>
$presupuestos = $conexion->query("SELECT DISTINCT presupuesto FROM departamento");

// Consulta base que traerá todos los departamentos
$consulta = "SELECT * FROM departamento";

// Obtener el valor seleccionado desde el formulario (GET)
$presupuesto_filtrado = $_GET['selecte'] ?? '';

// Si se seleccionó un presupuesto, modificar la consulta para filtrar por él
if (!empty($presupuesto_filtrado)) {
    $consulta .= " WHERE presupuesto = " . floatval($presupuesto_filtrado);
}

// Ejecutar la consulta (filtrada o no) y obtener los resultados
$resultado2 = $conexion->query($consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Filtro por Presupuesto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Estilos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">

        <!-- Título -->
        <h1 class="bg-primary text-white text-center py-3 rounded">
            🎯 Filtrar Departamentos por Presupuesto
        </h1>

        <!-- Formulario de filtro -->
        <div class="card shadow mt-4">
            <div class="card-body">
                <form method="GET" action="">
                    <div class="row mb-3 align-items-center">
                        <label for="selecte" class="col-sm-4 col-form-label fw-bold">Selecciona un presupuesto:</label>
                        <div class="col-sm-5">
                            <select class="form-select" id="selecte" name="selecte">
                                <option value="">Todos los presupuestos</option>
                                <!-- Opciones generadas dinámicamente -->
                                <?php while ($p = $presupuestos->fetch_assoc()): ?>
                                    <option value="<?php echo $p['presupuesto']; ?>"
                                        <?php if ($p['presupuesto'] == $presupuesto_filtrado) echo 'selected'; ?>>
                                        <?php echo $p['presupuesto']; ?>
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

        <!-- Mensaje si hay filtro activo -->
        <?php if (!empty($presupuesto_filtrado)): ?>
            <div class="alert alert-info text-center mt-4">
                Mostrando departamentos con presupuesto: 
                <strong><?php echo htmlspecialchars($presupuesto_filtrado); ?></strong>
            </div>
        <?php endif; ?>

        <!-- Tabla de resultados -->
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
                        <!-- Imprimir resultados -->
                        <?php while ($departamento = $resultado2->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($departamento['codigo']); ?></td>
                                <td><?php echo htmlspecialchars($departamento['nombre']); ?></td>
                                <td>$<?php echo number_format($departamento['presupuesto'], 2, ',', '.'); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Botón para volver -->
        <div class="text-center mt-4">
            <a href="crud_departamento.php" class="btn btn-secondary">⬅️ Volver al CRUD</a>
        </div>
    </div>
</body>
</html>