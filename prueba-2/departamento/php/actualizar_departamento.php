<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = trim($_POST['codigo']); // Este no cambia, es el que ya existe
    $nombre = trim($_POST['nombre']);
    $presupuesto = trim($_POST['presupuesto']);

    // Validaciones
    if (empty($codigo) || empty($nombre) || empty($presupuesto)) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!is_numeric($presupuesto) || $presupuesto < 0) {
        $mensaje = "El presupuesto debe ser un número positivo.";
    } else {
        // Actualizar el departamento
        $stmt = $conexion->prepare("UPDATE departamento SET nombre = ?, presupuesto = ? WHERE codigo = ?");
        $stmt->bind_param("sds", $nombre, $presupuesto, $codigo);

        if ($stmt->execute()) {
            // Redirigir si todo salió bien
            header("Location: ../vistas/crud_departamento.php");
            exit;
        } else {
            $mensaje = "Error al actualizar el departamento: " . $conexion->error;
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
        <a href="../vistas/crud_departamento.php" class="btn btn-secondary">Volver al CRUD</a>
    </div>
</body>
</html>
