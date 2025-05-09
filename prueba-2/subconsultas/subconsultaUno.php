<?php
require_once '../conexion.php';

// Ejecuta una subconsulta para obtener empleados cuyos departamentos tienen un presupuesto mayor a 500
$sub1 = $conexion->query("SELECT nombres, apellidos FROM empleados 
    WHERE codigo_departamento IN (
        SELECT codigo FROM departamento WHERE presupuesto > 500
    )");

// Ejecuta una subconsulta para obtener empleados del departamento con el presupuesto más alto
$sub2 = $conexion->query("SELECT nombres, apellidos FROM empleados 
    WHERE codigo_departamento = (
        SELECT codigo FROM departamento ORDER BY presupuesto DESC LIMIT 1
    )");
?>
<!-- Página que muestra los resultados de las subconsultas de empleados -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subconsultas de Empleados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">

        <!-- Encabezado principal -->
        <h1 class="bg-primary text-white text-center py-3 rounded">
            📊 Subconsultas de Empleados
        </h1>

        <!-- Muestra empleados en departamentos con presupuesto mayor a $500 -->
        <div class="card shadow mt-5">
            <div class="card-header bg-info text-white fw-bold">
                🧾 Empleados en Departamentos con Presupuesto &gt; $500
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($r1 = $sub1->fetch_array()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($r1['nombres']); ?></td>
                                <td><?php echo htmlspecialchars($r1['apellidos']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Muestra empleados del departamento con mayor presupuesto -->
        <div class="card shadow mt-5">
            <div class="card-header bg-success text-white fw-bold">
                🏆 Empleados en el Departamento con Mayor Presupuesto
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($r2 = $sub2->fetch_array()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($r2['nombres']); ?></td>
                                <td><?php echo htmlspecialchars($r2['apellidos']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Botón para volver al inicio del sistema -->
        <div class="text-center mt-5">
            <a href="../index.php" class="btn btn-outline-danger">⬅️ Volver al Inicio</a>
        </div>

    </div>
</body>
</html>

