    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        
        <title>Editar Datos</title>
    </head>

    <body>
        <br>

        <div class="container">
            <h1 class="text-center" style="background-color: black; color:white">Editar Cliente</h1>
            <br>
            <form  action="../crud/ActualizarDatos.php" method="POST">
                <?php
                include("../config/Conexion.php");
                $sql = "select * from tablaxx where run=" .$_REQUEST['run'];
                $res = $conexion->query($sql);
                $campos = $res->fetch_assoc();
                ?>
                <div class="mb-3">
                    <label class="form-label">Run</label>
                    <input type="text" class="form-control" name="run" value="<?php echo $campos['run']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $campos['nombre']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Fono</label>
                    <input type="text" class="form-control" name="fono" value="<?php echo $campos['fono']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Direccion</label>
                    <input type="text" class="form-control" name="direccion" value="<?php echo $campos['direccion']; ?>">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                    
                </div>
            </form>
            
        </div>
    </body>

    </html>