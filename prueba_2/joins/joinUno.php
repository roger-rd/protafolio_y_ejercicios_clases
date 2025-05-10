<?php
require_once '../conexion.php';

// Consulta JOIN entre empleados y departamentos
$resultados = $conexion->query("SELECT * FROM empleados 
    INNER JOIN departamento ON empleados.codigo_departamento = departamento.codigo");
?>

<!DOCTYPE html>
<html lang="es"> 

<head>
    <meta charset="UTF-8"> <!-- Define la codificación de caracteres como UTF-8 -->
    <title>Join: Empleados y Departamentos</title> <!-- Título que aparece en la pestaña del navegador -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Adaptación para dispositivos móviles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Carga de estilos desde Bootstrap CDN -->
</head>

<body class="bg-light">
    <div class="container py-5">

        <!-- Encabezado principal de la página -->
        <h1 class="bg-primary text-white text-center py-3 rounded">
            🔗 Empleados con Información de sus Departamentos
        </h1>

        <!-- Tabla que muestra datos combinados de empleados y sus departamentos mediante JOIN -->
        <div class="card shadow mt-4">
            <div class="card-body">
                <table class="table table-hover table-bordered align-middle text-center">
                   <!-- cabecera de la tabla -->
                    <thead class="table-dark">
                        <tr>
                            <th>Código Departamento</th>
                            <th>Nombre Departamento</th>
                            <th>Presupuesto</th>
                            <th>RUN Empleado</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                        </tr>
                    </thead>
                    <!-- cuerpo de la tabla -->
                    <tbody>
                        <?php while ($resultado = $resultados->fetch_array()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($resultado['codigo']); ?></td>
                                <td><?php echo htmlspecialchars($resultado['nombre']); ?></td>
                                <td>$<?php echo number_format($resultado['presupuesto'], 2, ',', '.'); ?></td>
                                <td><?php echo htmlspecialchars($resultado['run']); ?></td>
                                <td><?php echo htmlspecialchars($resultado['nombres']); ?></td>
                                <td><?php echo htmlspecialchars($resultado['apellidos']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Botón para volver a la página principal del sistema -->
        <div class="text-center mt-4">
            <a href="../index.php" class="btn btn-outline-danger">⬅️ Volver al Inicio</a>
        </div>

    </div>
</body>
</html>
