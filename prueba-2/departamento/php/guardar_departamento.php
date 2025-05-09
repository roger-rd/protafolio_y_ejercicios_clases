<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = trim($_POST['codigo']);
    $nombre = trim($_POST['nombre']);
    $presupuesto = trim($_POST['presupuesto']);

    // Validaciones básicas
    if (empty($codigo) || empty($nombre) || empty($presupuesto)) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!is_numeric($presupuesto) || $presupuesto < 0) {
        $mensaje = "El presupuesto debe ser un número positivo.";
    } else {
        $estaono = $conexion->prepare("SELECT codigo FROM departamento WHERE codigo = ?");
        $estaono->bind_param("s", $codigo);
        $estaono->execute();
        $estaono->store_result();
        
        if ($estaono->num_rows > 0) {
            $mensaje = "El código ya existe. Por favor, elige otro.";
            $estaono->close();

        } else {
            // Preparar la consulta para evitar inyección SQL
            $stmt = $conexion->prepare("INSERT INTO departamento (codigo, nombre, presupuesto) VALUES (?, ?, ?)");
            $stmt->bind_param("isd", $codigo, $nombre, $presupuesto);
            
            if ($stmt->execute()) {
                $mensaje = "Departamento agregado exitosamente.";
            } else {
                $mensaje = "Error al agregar el departamento: " . $conexion->error;
            }
            $stmt->close();
        }

    }
}
HEADER("LOCATION:../vistas/crud_departamento.php");

?>