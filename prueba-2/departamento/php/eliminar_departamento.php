
<?php
require_once '../../conexion.php';

// tomo el parametro enviado
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    
    //preparo la consulta sql
    $stmt = $conexion->prepare("DELETE FROM departamento WHERE codigo = ?");

    //le paso el parametro hay uno solo..y es le codigo y de tipo  I
    $stmt->bind_param("i", $codigo);

    if ($stmt->execute())   //si esta todo okay se ejecuta...
    {
        $mensaje = "Departamento eliminado exitosamente.";
    } else {
        $mensaje = "Error al eliminar el departamento: " . $conexion->error;
    }
    $stmt->close();
    
    
    
}
HEADER("LOCATION:../vistas/crud_departamento.php");
?>
