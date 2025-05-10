<?php
// Mostrar errores (solo en desarrollo, no en producción)
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../../conexion.php'; // Conexión a la base de datos
$mensaje = '';

// Si se recibió una petición POST (envío del formulario)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener y limpiar los datos del formulario
    $run = trim($_POST['run']); // RUN del empleado (clave primaria, no se modifica)
    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $codigo_departamento = trim($_POST['codigo_departamento']);

    // Validación básica: ningún campo debe estar vacío
    if (empty($run) || empty($nombres) || empty($apellidos) || empty($codigo_departamento)) {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        // Preparar consulta para actualizar los datos del empleado
        $stmt = $conexion->prepare("UPDATE empleados 
            SET nombres = ?, apellidos = ?, codigo_departamento = ? 
            WHERE run = ?");

        // Enlazar parámetros a la consulta (sssi: string, string, int, string)
        $stmt->bind_param("ssis", $nombres, $apellidos, $codigo_departamento, $run);

        // Ejecutar y verificar resultado
        if ($stmt->execute()) {
            // Redirigir si todo fue correcto
            header("Location: ../vistas/crud_empleados.php");
            exit;
        } else {
            // Si hubo un error en la base de datos
            $mensaje = "Error al actualizar el empleado: " . $conexion->error;
        }

        // Cerrar la sentencia
        $stmt->close();
    }
}
?>


<!-- Mostrar mensaje de error si algo sale mal al actualizar -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error al actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="alert alert-danger">
        <h4 class="alert-heading">¡Error!</h4>
        <p><?php echo htmlspecialchars($mensaje); ?></p>
        <hr>
        <a href="../vistas/crud_empleados.php" class="btn btn-secondary">⬅️ Volver al CRUD</a>
    </div>
</body>
</html>

