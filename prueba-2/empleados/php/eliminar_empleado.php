
<?php
require_once '../../conexion.php';

// tomo el parametro enviado
if (isset($_GET['run'])) {
    $run = $_GET['run'];
    
    //preparo la consulta sql
    $stmt = $conexion->prepare("DELETE FROM empleados WHERE run = ?");

    //le paso el parametro hay uno solo..y es le run y de tipo  string
    $stmt->bind_param("s", $run);

    if ($stmt->execute())   //si esta todo okay se ejecuta...
    {
        $mensaje = "empleado eliminado exitosamente.";
    } else {
        $mensaje = "Error al eliminar el empleado: " . $conexion->error;
    }
    $stmt->close();
    
    
    
}
HEADER("LOCATION:../vistas/crud_empleados.php");
?>
