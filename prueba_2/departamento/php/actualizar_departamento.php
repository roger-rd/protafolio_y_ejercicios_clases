<?php
// Mostrar todos los errores (solo para desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../conexion.php'; // Conexión a la base de datos

$mensaje = ''; // Variable para mostrar mensajes de error

// Si el formulario se envió por método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar y limpiar datos del formulario
    $codigo = trim($_POST['codigo']); // Código único del departamento (no editable)
    $nombre = trim($_POST['nombre']);
    $presupuesto = trim($_POST['presupuesto']);

    // Validaciones de los datos
    if (empty($codigo) || empty($nombre) || empty($presupuesto)) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!is_numeric($presupuesto) || $presupuesto < 0) {
        $mensaje = "El presupuesto debe ser un número positivo.";
    } else {
        // Preparar la consulta para actualizar el departamento
        $stmt = $conexion->prepare("UPDATE departamento SET nombre = ?, presupuesto = ? WHERE codigo = ?");
        
        // Enlazar parámetros a la consulta (sds: string, double, string)
        $stmt->bind_param("sds", $nombre, $presupuesto, $codigo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Si todo salió bien, redirigir al CRUD
            header("Location: ../vistas/crud_departamento.php");
            exit;
        } else {
            // Si hubo error al ejecutar
            $mensaje = "Error al actualizar el departamento: " . $conexion->error;
        }

        $stmt->close(); // Cerrar la consulta preparada
    }
}
?>

<!-- HTML para mostrar el mensaje de error en pantalla -->
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
        <p><?php echo htmlspecialchars($mensaje); ?></p> <!-- Mostrar mensaje generado -->
        <hr>
        <a href="../vistas/crud_departamento.php" class="btn btn-secondary">⬅️ Volver al CRUD</a>
    </div>
</body>
</html>
