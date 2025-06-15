<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 500px;
            margin-top: 100px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            margin-bottom: 30px;
        }

        .btn-primary {
            margin-bottom: 10px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1>Bienvenido al sistema escolar SmartPro</h1>
        <div class="d-grip gap-2">
            <a class="btn btn-primary btn-lg" href="estudiante/listar_estudiante.php">Alumnos</a>
            <!--<a class="btn btn-primary btn-lg" href="#">Profesores</a>-->
            <a class="btn btn-primary btn-lg" href="curso/listar_curso.php">Cursos</a>
            <!--<a class="btn btn-primary btn-lg" href="#">Inscripciones</a>-->
            <a class="btn btn-warning btn-lg" href="reportes/reporte.php">Reportes</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>