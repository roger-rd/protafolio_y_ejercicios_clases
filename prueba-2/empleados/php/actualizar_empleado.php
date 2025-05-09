<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $run = trim($_POST['run']); // Este no cambia, es el que ya existe
    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $codigo_departamento = trim($_POST['codigo_departamento']);

    // Validaciones
    if (empty($run) || empty($nombres) || empty($apellidos) || empty($codigo_departamento)) {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        // Actualizar el departamento
        $stmt = $conexion->prepare("UPDATE empleados SET nombres = ?, apellidos = ?, codigo_departamento = ?  WHERE run = ? ");
        $stmt->bind_param("ssis", $nombres, $apellidos, $codigo_departamento, $run);

        if ($stmt->execute()) {
            // Redirigir si todo salió bien
            header("Location: ../vistas/crud_empleados.php");
            exit;
        } else {
            $mensaje = "Error al actualizar el empleado: " . $conexion->error;
        }

        $stmt->close();
    }
}
?>

<!-- Si ocurre un error, mostramos mensaje -->
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
        <a href="../vistas/crud_empleados.php" class="btn btn-secondary">Volver al CRUD</a>
    </div>
</body>
</html>
