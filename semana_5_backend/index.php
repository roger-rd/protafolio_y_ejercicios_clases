<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP MODERN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="container">

        <h1 class="text-center" style="background-color: black; color:white"> Listado de Clientes

    </div>
    <br>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Run</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Operación</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require("config/Conexion.php");
                $sql = $conexion->query("select * from tablaxx");
                while ($res = $sql->fetch_assoc()) {
                ?>
                    <tr>
                        <th scope="row"> <?php echo $res['run'] ?> </th>
                        <th scope="row"> <?php echo $res['nombre'] ?> </th>
                        <th scope="row"> <?php echo $res['fono'] ?> </th>
                        <th scope="row"> <?php echo $res['direccion'] ?> </th>
                        <th>
                            <a href="./views/EditarDatos.php?run=<?php echo $res['run'] ?>"
                             class="btn btn-warning">Editar</a>
                             <a href ="crud/EliminarDatos.php?run=<?php echo $res['run'] ?> " class="btn btn-danger" > eliminar </a>

                        </th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="container">
            <a href="./views/AgregarCliente.php" class="btn btn-success"> Ingresar Cliente </a>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>