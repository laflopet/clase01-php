<?php
include '../conexion/conexion_db.php';
$id = $_GET['id'] ?? null;
$result = $conn->query("SELECT * FROM estudiantes WHERE id = $id");
$estudiante = $result->fetch_assoc();

if (!$estudiante) {
    header("Location: listar_estudiante.php?error=no_encontrado");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $edad = (int) $_POST['edad'];
    $email = $conn->real_escape_string($_POST['email']);

    $conn->query("UPDATE estudiantes SET nombre = '$nombre', edad = $edad, email = '$email' WHERE id = $id");
    header("Location: listar_estudiante.php?success=actualizado");
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
                        <select name="tipo_documento" id="tipo_documento" class="form-select" disabled>
                            <option value="" disabled selected>Seleccione un tipo de documento</option>
                            <option value="CC" <?= $estudiante['tipo_documento'] === 'CC' ? 'selected' : '' ?>>Cedula de
                                ciudadania</option>
                            <option value="Pasaporte" <?= $estudiante['tipo_documento'] === 'Pasaporte' ? 'selected' : '' ?>>Pasaporte</option>
                            <option value="Carnet de extranjería" <?= $estudiante['tipo_documento'] === 'Carnet de extranjería' ? 'selected' : '' ?>>Carnet de extranjería</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="numero_documento" class="form-label">Número de documento</label>
                        <input type="text" name="numero_documento" id="numero_documento" class="form-control"
                            value="<?= htmlspecialchars($estudiante['numero_documento']) ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control"
                            value="<?= htmlspecialchars($estudiante['nombre']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" name="edad" id="edad" class="form-control"
                            value="<?= htmlspecialchars($estudiante['edad']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="<?= htmlspecialchars($estudiante['email']) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="listar_estudiante.php" class="btn btn-secondary">Volver</a>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    <?php if (isset($_GET['success']) && $_GET['success'] == 'actualizado'): ?>
        Swal.fire({
            title: 'Éxito',
            text: 'Estudiante actualizado correctamente.',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    <?php elseif (isset($_GET['error']) && $_GET['error'] == 'no_encontrado'): ?>
        Swal.fire({
            title: 'Error',
            text: 'El estudiante no fue encontrado.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    <?php endif; ?>
</script>

</html>