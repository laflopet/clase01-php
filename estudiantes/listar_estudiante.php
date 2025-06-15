<?php
 include "../conexion/conexion_db.php";

 // consulta para obtener los estudiantes
 $sql = "SELECT * FROM estudiantes";
 $result = $conn->query($sql);

?>

<h2>Estudiantes</h2>
<a href="../index.php">Volver al inicio</a>
<br>
<a href="crear_estudiante.php">Registrar Estudiantes</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Email</th>
        <th>Acciones</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>

        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['edad'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>
                <a href="editar_estudiante.php?id=<?= $row['id'] ?>">Editar</a>
                <a href="eliminar_estudiante.php?id=<?= $row['id'] ?>"
                onClick="return confirm('¿Estás seguro de eliminar este estudiante?');">Eliminar</a>
            </td>
        </tr>

    <?php endwhile; ?>
</table>