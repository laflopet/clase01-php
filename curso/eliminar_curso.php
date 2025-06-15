<?php
include '../conexion/conexion_db.php';
$id = $_GET['id'] ?? null;
$conn->query("DELETE FROM cursos WHERE id = $id");
header("Location: listar_curso.php");
exit;
?>