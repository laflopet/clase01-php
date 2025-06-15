<?php
include '../conexion/conexion_db.php';

$sql = "SELECT e.nombre AS estudiante, e.numero_documento, c.nombre AS curso, p.nombre AS profesor FROM estudiantes e
INNER JOIN inscripciones i ON i.estudiante_id = e.id
INNER JOIN cursos c ON c.id = i.curso_id
INNER JOIN profesores p ON p.id = c.profesor_id 
ORDER BY c.nombre,e.nombre";

$resultado = $conn->query($sql);

if (!$resultado) {
    echo "<div class='alert alert-danger'>Error al consultar los datos: " . $conn->error . "</div>";
}

$filename = "estudiantes_matriculados" . date('Ymd') .time() . ".csv";

header('Content-Type: text/csv; chartset=utf-8');
header('Content-Disposition: attachment; filename=' . $filename);

$ouput = fopen('php://output', 'w');

fputcsv($ouput, ['Estudiante', 'Numero Documento', 'Curso', 'Profesor']);

while ($row = $resultado->fetch_assoc()) {
    fputcsv($ouput, [
        $row['estudiante'],
        $row['numero_documento'],
        $row['curso'],
        $row['profesor']
    ]);
}

fclose($ouput);

?>