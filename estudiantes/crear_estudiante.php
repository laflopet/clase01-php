<?php

include "../conexion/conexion_db.php";
// Insertar un nuevo estudiante
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];

    $sql = "INSERT INTO estudiantes (nombre, edad, email) VALUES ('$nombre', '$edad', '$email')";
    $result = mysqli_query($conn, $sql);
    header("Location: listar_estudiante.php");
    exit;
}

?>

<form method="post">
    <h2>Registrar estudiantes</h2>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <input type="submit" value="Registrar">
</form>