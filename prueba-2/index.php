<!DOCTYPE html> 
<html lang="es"> 

<head>
    <meta charset="UTF-8"> <!-- Establece la codificación de caracteres como UTF-8 -->
    <title>Sistema de Gestión de Empresa</title> <!-- Título que aparece en la pestaña del navegador -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Hace que el diseño sea adaptable en dispositivos móviles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Vincula el CSS de Bootstrap desde CDN -->
</head>

<body class="bg-light"> <!-- Aplica fondo claro a todo el cuerpo del documento -->

    <div class="container py-5"> <!-- Contenedor central con padding vertical -->

        <h1 class="bg-primary text-white text-center py-3 rounded">
            🏢 Sistema de Gestión Empresarial
        </h1> <!-- Encabezado principal con fondo azul, texto blanco, centrado y bordes redondeados -->

        <section class="card shadow mt-5"> <!-- Tarjeta con sombra y margen superior -->
            <div class="card-body"> <!-- Cuerpo de la tarjeta -->
                <div class="d-grid gap-3 col-md-6 mx-auto"> <!-- Diseño de grilla con separación entre botones, centrado y adaptado a pantallas medianas -->

                    <!-- Botón que enlaza al CRUD de Departamentos -->
                    <a href="departamento/vistas/crud_departamento.php" class="btn btn-outline-primary">
                        🗂️ CRUD Departamentos
                    </a>

                    <!-- Botón que enlaza al CRUD de Empleados -->
                    <a href="empleados/vistas/crud_empleados.php" class="btn btn-outline-primary">
                        👥 CRUD Empleados
                    </a>

                    <!-- Botón que enlaza a una consulta JOIN entre Empleados y Departamentos -->
                    <a href="joins/joinUno.php" class="btn btn-outline-primary">
                        🔗 JOIN: Empleados + Departamentos
                    </a>

                    <!-- Botón que enlaza a una subconsulta de empleados por presupuesto -->
                    <a href="subconsultas/subconsultaUno.php" class="btn btn-outline-primary">
                        📊 Subconsulta: Empleados Mediante Presupuesto
                    </a>

                </div> 
            </section> 
        </div> 

    </div> 

</body>
</html> 
