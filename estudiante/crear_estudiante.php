<?php
include '../conexion/conexion_db.php';
// Insertar un nuevo estudiante
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];

    // Verificar que ese estudiante no exista
    $check_sql = "SELECT * FROM estudiantes WHERE tipo_documento = '$tipo_documento' AND numero_documento = '$numero_documento'";
    $check_result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        header("Location: crear_estudiante.php?error=existe");
        exit;
    }

    $sql = "INSERT INTO estudiantes (tipo_documento, numero_documento, nombre, edad, email) VALUES ('$tipo_documento', '$numero_documento', '$nombre', '$edad', '$email')";
    $result = mysqli_query($conn, $sql);
    header("Location: listar_estudiante.php?success=creado");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Listado de estudiantes</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title mb-4">Registrar Estudiante</h2>
                <form method="post">
                    <div class="mb-3">
                        <label for="tipo_documento" class="form-label">Tipo de documento</label>
                        <select name="tipo_documento" id="tipo_documento" class="form-select" required>
                            <option value="" disabled selected>Seleccione un tipo de documento</option>
                            <option value="CC">Cedula de ciudadania</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Carnet de extranjería">Carnet de extranjería</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="numero_documento" class="form-label">Número de documento</label>
                        <input type="text" name="numero_documento" id="numero_documento" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" name="edad" id="edad" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <a href="listar_estudiante.php" class="btn btn-secondary">Volver</a>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<script>
    <?php if (isset($_GET['success']) && $_GET['success'] == 'creado'): ?>
        Swal.fire({
            title: 'Éxito',
            text: 'Estudiante registrado correctamente.',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    <?php elseif (isset($_GET['error']) && $_GET['error'] == 'existe'): ?>
        Swal.fire({
            title: 'Error',
            text: 'El estudiante ya existe.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    <?php endif; ?>
</script>

</html>