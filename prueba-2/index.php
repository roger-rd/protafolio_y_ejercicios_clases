<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestión de Empresa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="bg-primary text-white text-center py-3 rounded">
            🏢 Sistema de Gestión Empresarial
        </h1>

        <div class="card shadow mt-5">
            <div class="card-body">
                <div class="d-grid gap-3 col-md-6 mx-auto">
                    <a href="departamento/vistas/crud_departamento.php" class="btn btn-outline-primary">
                        🗂️ CRUD Departamentos
                    </a>
                    <a href="empleados/vistas/crud_empleados.php" class="btn btn-outline-primary">
                        👥 CRUD Empleados
                    </a>
                    <a href="joins/joinUno.php" class="btn btn-outline-primary">
                        🔗 JOIN: Empleados + Departamentos
                    </a>
                    <a href="subconsultas/subconsultaUno.php" class="btn btn-outline-primary">
                        📊 Subconsulta: Empleados Mediante Presupuesto
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
