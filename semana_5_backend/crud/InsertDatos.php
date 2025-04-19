<?php

    include("../config/Conexion.php");


    $run = $_POST['run'];
    $nombre = $_POST['nombre'];
    $fono = $_POST['fono'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO tablaxx(run,nombre,fono,direccion) values ('$run', '$nombre', $fono, '$direccion')";

    $res = mysqli_query($conexion, $sql);

        if ($res === TRUE) {
            HEADER("LOCATION:../index.php");
        } else {
            echo "registro no guardado";
        }
?>