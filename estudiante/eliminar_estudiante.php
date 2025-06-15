<?php
    include "../conexion/conexion_db.php";
    $id = $_GET['id'] ?? null;
    $query = "DELETE FROM estudiantes WHERE id = $id";
    $resultado = $conn->query($query);
    header("Location: listar_estudiante.php");
    exit;

?>
