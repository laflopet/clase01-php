<?php
    include "../conexion/conexion_db.php";
    $id = $_GET['id'] ?? null;
    $query = "SELECT * FROM estudiantes WHERE id = $id";
    $resultado = $conn->query($query);
    $estudiante = $resultado->fetch_assoc();

    if (!$estudiante) {
        die("Estudiante no está registrado.");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $conn->real_escape_string($_POST['nombre']);
        $edad = (int) $_POST['edad'];
        $email = $conn->real_escape_string($_POST['email']);

        $sql = "UPDATE estudiantes SET nombre='$nombre', edad='$edad', email='$email' WHERE id=$id";
        $conn->query($sql);
        header("Location: listar_estudiante.php");
        exit;
    }
?>

<a href="listar_estudiante.php">Volver a la lista de estudiantes</a>
<form action="" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($estudiante['nombre']); ?>" required>
    <label for="edad">Edad:</label>
    <input type="number" name="edad" value="<?= htmlspecialchars($estudiante['edad']); ?>" required>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($estudiante['email']); ?>" required>
    <button type="submit">Actualizar</button>
</form>