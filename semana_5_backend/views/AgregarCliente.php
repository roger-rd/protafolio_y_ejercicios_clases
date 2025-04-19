<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <br>
    <h1 class="bg-black p-2 text-white text-center">Agregar Cliente</h1>
    <br>
        <div class=container>
        <form action="../crud/InsertDatos.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Run</label>
                        <input type="text" class="form-control" name="run">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fono</label>
                        <input type="text" class="form-control" name="fono">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="direccion">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger">Guardar</button>
                        <a href="../index.php" class="btn btn-dark">Inicio</a>
                    </div>
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>