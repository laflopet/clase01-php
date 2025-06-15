<?php
include '../conexion/conexion_db.php';

// Consulta para obtener los estudiantes
$sql = "SELECT * FROM estudiantes";
$resultado = $conn->query($sql);
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
        <h2>Estudiantes</h2>
        <a href="../index.php" class="btn btn-secondary mb-3">Volver al inicio</a>
        <a href="crear_estudiante.php" class="btn btn-success mb-3">Registrar Estudiante</a>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Tipo Documento</th>
                    <th>Número Documento</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['tipo_documento'] ?></td>
                        <td><?= $row['numero_documento'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['edad'] ?></td>
                        <td><?= $row['email'] ?></td>
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
                title: 'Editar Estudiante',
                text: '¿Realmente quieres modificar este estudiante?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelerButtonColor: '#aaa',
                confirmButtonText: 'Sí, editar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `editar_estudiante.php?id=${id}`;
                }
            })
        })
    });

    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            Swal.fire({
                title: 'Eliminar Estudiante',
                text: '¿Estás seguro de que deseas eliminar este estudiante?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `eliminar_estudiante.php?id=${id}`;
                }
            })
        })
    });
</script>

</html>
