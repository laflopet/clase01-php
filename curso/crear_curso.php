<?php
include '../conexion/conexion_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $profesor_id = (int) $_POST['profesor_id'];

    $conn->query("INSERT INTO cursos (nombre, descripcion, profesor_id) VALUES ('$nombre', '$descripcion', $profesor_id)");
    header('Location: listar_curso.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar Curso</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title mb-4">Editar Curso</h2>
                <form method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del curso</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="profesor_id" class="form-label">Profesor</label>
                        <select name="profesor_id" id="profesor_id" class="form-select" required>
                            <option value="" disabled selected>Seleccione un profesor</option>
                            <?php
                            $profesores = $conn->query("SELECT * FROM profesores");
                            while ($profesor = $profesores->fetch_assoc()) {
                                echo "<option value=\"{$profesor['id']}\">" . htmlspecialchars($profesor['nombre']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <a href="listar_curso.php" class="btn btn-secondary">Volver</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>