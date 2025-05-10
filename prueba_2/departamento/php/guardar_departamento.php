<?php
// Activar la visualización de errores (útil para desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../conexion.php'; // Conexión a la base de datos

$mensaje = ''; // Variable para almacenar mensajes de error o éxito

// Si el formulario fue enviado por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Obtener y limpiar los valores recibidos del formulario
    $codigo = trim($_POST['codigo']);
    $nombre = trim($_POST['nombre']);
    $presupuesto = trim($_POST['presupuesto']);

    // Validaciones básicas
    if (empty($codigo) || empty($nombre) || empty($presupuesto)) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!is_numeric($presupuesto) || $presupuesto < 0) {
        $mensaje = "El presupuesto debe ser un número positivo.";
    } else {
        // Validar si el código ya existe en la base de datos
        $estaono = $conexion->prepare("SELECT codigo FROM departamento WHERE codigo = ?");
        $estaono->bind_param("s", $codigo); // s = string
        $estaono->execute();
        $estaono->store_result();

        if ($estaono->num_rows > 0) {
            // Si ya existe un departamento con ese código
            $mensaje = "El código ya existe. Por favor, elige otro.";
            $estaono->close();
        } else {
            // Si no existe, insertar el nuevo departamento
            $stmt = $conexion->prepare("INSERT INTO departamento (codigo, nombre, presupuesto) VALUES (?, ?, ?)");
            $stmt->bind_param("isd", $codigo, $nombre, $presupuesto); // i = int, s = string, d = double

            if ($stmt->execute()) {
                $mensaje = "Departamento agregado exitosamente.";
            } else {
                $mensaje = "Error al agregar el departamento: " . $conexion->error;
            }

            $stmt->close(); // Cerrar consulta preparada
        }
    }
}

// Redirigir de vuelta al CRUD (incluso si hubo error, porque no se usa session o query string)
HEADER("LOCATION:../vistas/crud_departamento.php");
?>
