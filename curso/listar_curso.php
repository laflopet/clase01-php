<?php
include '../conexion/conexion_db.php';

// Consulta para obtener los cursos y profesores que hacen parte del curso
$sql = "SELECT c.id, c.nombre as curso, c.descripcion, p.nombre as profesor FROM cursos c LEFT JOIN profesores p ON c.profesor_id = p.id ORDER BY c.nombre";
$resultado = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="es">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Listado de cursos</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body class="bg-ligth">
    <div class="container mt-5">
        <h2>Cursos</h2>
        <a href="../index.php" class="btn btn-secondary mb-3">Volver al inicio</a>
        <a href="crear_curso.php" class="btn btn-success mb-3">Registrar Curso</a>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Profesor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['curso'] ?></td>
                        <td><?= $row['descripcion'] ?></td>
                        <td><?= $row['profesor'] ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm btn-edit" data-id="<?= $row['id'] ?>">Editar</a>
                            <a class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['id'] ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            Swal.fire({
                title: 'Editar Curso',
                text: '¿Realmente quieres modificar este curso?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelerButtonColor: '#aaa',
                confirmButtonText: 'Sí, editar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `editar_curso.php?id=${id}`;
                }
            })
        })
    });

    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            Swal.fire({
                title: 'Eliminar Curso',
                text: '¿Estás seguro de que deseas eliminar este curso?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `eliminar_curso.php?id=${id}`;
                }
            })
        })
    });
</script>

</html>