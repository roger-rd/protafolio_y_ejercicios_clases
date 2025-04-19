    <?php


    include("../config/Conexion.php");


    $run = $_POST['run'];
    $nombre = $_POST['nombre'];
    $fono = $_POST['fono'];
    $direccion = $_POST['ciudad'];

    $sql = "update tablaxx set
    run = '" . $run . "',
    nombre= '" . $nombre . "',
    fono= $fono,
    direccion='" . $direccion . "'
    where run = '" . $run . "'";

    if ($res = $conexion->query($sql)) {
        HEADER("LOCATION:../index.php");
    } else {
        echo "resgistro no actualizado";
    }
