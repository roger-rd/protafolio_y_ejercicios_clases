<?php
require_once '../../conexion.php'; // Conexión a la base de datos

// Verificamos si llegó el parámetro 'codigo' por GET
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo']; // Guardamos el valor del código enviado por la URL

    // Preparamos la consulta SQL para eliminar un departamento específico
    $stmt = $conexion->prepare("DELETE FROM departamento WHERE codigo = ?");

    // Enlazamos el parámetro (i = integer)
    $stmt->bind_param("i", $codigo);

    // Ejecutamos la consulta
    if ($stmt->execute()) {
        // Si se ejecuta correctamente, mostramos mensaje de éxito
        $mensaje = "Departamento eliminado exitosamente.";
    } else {
        // Si hay un error en la ejecución, lo mostramos
        $mensaje = "Error al eliminar el departamento: " . $conexion->error;
    }

    $stmt->close(); // Cerramos la consulta preparada
}

// Redirigir al CRUD con mensaje (opcionalmente puedes usar sesiones o GET para mostrar el mensaje allí)
header("Location: ../vistas/crud_departamento.php");
exit;

?>
