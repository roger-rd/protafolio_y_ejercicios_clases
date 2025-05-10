<?php
require_once '../../conexion.php'; // Conecta con la base de datos

// Consulta para obtener todos los empleados registrados
$resultado = $conexion->query("SELECT * FROM empleados");
?>

<!DOCTYPE html> <!-- Documento HTML5 -->
<html lang="es">

<head>
    <meta charset="UTF-8"> <!-- Codificación de caracteres UTF-8 -->
    <title>CRUD EMPLEADOS</title> <!-- Título de la página -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Diseño adaptable a móviles -->

    <!-- Bootstrap CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Estilo para encabezados de la tabla */
        .table thead th {
            background-color: #0d6efd;
            color: white;
        }

        /* Estilo para alinear botones de acción */
        .acciones {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">

        <!-- Título principal -->
        <h1 class="bg-primary text-white text-center py-3 rounded">📋 CRUD de EMPLEADOS</h1>

        <!-- Botones de navegación: agregar, filtros y volver al inicio -->
        <div class="d-flex justify-content-start gap-3 mt-4 mb-3">
            <a href="./crear_empleados.php" class="btn btn-success">➕ Agregar Empleados</a>
            <a href="filtros_empleados.php" class="btn btn-info text-white">🔍 Filtros Empleados</a>
            <a href="../../index.php" class="btn btn-danger text-white ms-5">⬅️ Volver al Inicio</a>
        </div>

        <!-- Tabla que muestra la lista de empleados -->
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead>
                        <tr>
                            <th>Run</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Código Departamento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Itera sobre cada empleado y muestra sus datos -->
                        <?php while ($empleados = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($empleados['run']); ?></td>
                                <td><?php echo htmlspecialchars($empleados['nombres']); ?></td>
                                <td><?php echo htmlspecialchars($empleados['apellidos']); ?></td>
                                <td><?php echo htmlspecialchars($empleados['codigo_departamento']); ?></td>
                                
                                <!-- Botones para editar o eliminar al empleado -->
                                <td class="acciones">
                                    <a href="editar_empleados.php?run=<?php echo urlencode($empleados['run']); ?>" class="btn btn-warning btn-sm">
                                        ✏️ Editar
                                    </a>
                                    <a href="../php/eliminar_empleado.php?run=<?php echo urlencode($empleados['run']); ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('¿Estás seguro de eliminar este empleado?')">
                                       🗑️ Eliminar
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>

