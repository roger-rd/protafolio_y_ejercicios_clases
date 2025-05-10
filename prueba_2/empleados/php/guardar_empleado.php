<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $run = trim($_POST['run'] ?? '');
    $nombres = trim($_POST['nombres'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $codigo_departamento = trim($_POST['codigo_departamento'] ?? '');

    if (empty($run) || empty($nombres) || empty($apellidos) || empty($codigo_departamento)) {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!is_numeric($codigo_departamento) || $codigo_departamento < 0) {
        $mensaje = "El código de departamento debe ser un número positivo.";
    } else {
        // Validar si el run ya existe
        $verifica_run = $conexion->prepare("SELECT run FROM empleados WHERE run = ?");
        $verifica_run->bind_param("s", $run);
        $verifica_run->execute();
        $verifica_run->store_result();

        if ($verifica_run->num_rows > 0) {
            $mensaje = "El RUN ya existe. Por favor, elige otro.";
        } else {
            // Validar si el departamento existe
            $check = $conexion->prepare("SELECT codigo FROM departamento WHERE codigo = ?");
            $check->bind_param("i", $codigo_departamento);
            $check->execute();
            $check->store_result();

            if ($check->num_rows == 0) {
                $mensaje = "El código de departamento no existe.";
            } else {
                $stmt = $conexion->prepare("INSERT INTO empleados (run, nombres, apellidos, codigo_departamento) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("sssi", $run, $nombres, $apellidos, $codigo_departamento);

                if ($stmt->execute()) {
                    $stmt->close();
                    header("Location: ../vistas/crud_empleado.php");
                    exit;
                } else {
                    $mensaje = "Error al crear empleado: " . $stmt->error;
                }

                $stmt->close();
            }

            $check->close();
        }

        $verifica_run->close();
    }
}
HEADER("LOCATION:../vistas/crud_empleados.php");
?>
