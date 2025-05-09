<?php
require_once '../../conexion.php';
$resultado = $conexion->query("SELECT * FROM empleados");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD EMPLEADOS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table thead th {
            background-color: #0d6efd;
            color: white;
        }
        .acciones {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="bg-primary text-white text-center py-3 rounded">📋 CRUD de EMPLEADOS</h1>

        <div class="d-flex justify-content-start gap-3 mt-4 mb-3">
            <a href="./crear_empleados.php" class="btn btn-success">
                ➕ Agregar Empleados
            </a>
            <a href="filtros_empleados.php" class="btn btn-info text-white">
                🔍 Filtros Empleados
            </a>
            <a href="../../index.php" class="btn btn-danger text-white ms-5"> 
                ⬅️ Volver al Inicio
            </a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead>
                        <tr>
                        <th>Run</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Codigo Departamento</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($empleados  = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($empleados['run']); ?></td>
                                <td><?php echo htmlspecialchars($empleados['nombres']); ?></td>
                                <td><?php echo htmlspecialchars($empleados['apellidos']); ?></td>
                                <td><?php echo htmlspecialchars($empleados['codigo_departamento']); ?></td>
                                <td class="acciones">
                                    <a href="editar_empleados.php?run=<?php echo urlencode($empleados['run']); ?>" class="btn btn-warning btn-sm">
                                        ✏️ Editar
                                    </a>
                                    <a href="../php/eliminar_empleado.php?run=<?php echo urlencode($empleados['run']); ?>" class="btn btn-danger btn-sm"
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
