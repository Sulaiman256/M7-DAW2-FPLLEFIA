<?php

session_start();
require_once '../config.php';

// 1. Verificar que el rol sea administrador
if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página';
    exit;
}

// 2. Mostramos de momento solo los testimonios
$resultTestimonios = $mysqli->query("SELECT * FROM testimony");
$testimonios = $resultTestimonios->fetch_all(MYSQLI_ASSOC);

$usersResult = $mysqli->query("SELECT * FROM users");
$users = $usersResult->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            color: red;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Panel de Administrador</h1>
    <h2>Testimonios</h2>

    <!-- Tabla de testimonios -->
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Testimonio</th>
            <th>Rating</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($testimonios as $testimonio) : ?>
            <tr>
                <td><?php echo htmlspecialchars($testimonio['name']); ?></td>
                <td><?php echo htmlspecialchars($testimonio['surname']); ?></td>
                <td><?php echo htmlspecialchars($testimonio['testimony']); ?></td>
                <td><?php echo htmlspecialchars($testimonio['image']); ?></td>
                <td>
                    <!-- Corregido el enlace de eliminación -->
                    <a href="./testimonials/delete-testimonials.php?id=<?php echo $testimonio['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Noticias</h2>
    <h2>Proyectos</h2>
    <h2>Usuarios</h2>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>password</th>
            <th>Rol</th>
            <th>Data de registro</th>
            <th>Apellido</th>
            <th>Avatar</th>
            <th>edad</th>
            <th>trabajo</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['password']); ?></td>
                <td><?php echo htmlspecialchars($user['rol']); ?></td>
                <td><?php echo htmlspecialchars($user['data_registre']); ?></td>
                <td><?php echo htmlspecialchars($user['surname']); ?></td>
                <td><?php echo htmlspecialchars($user['avatar']); ?></td>
                <td><?php echo htmlspecialchars($user['age']); ?></td>
                <td><?php echo htmlspecialchars($user['job']); ?></td>


                <td>
                    <!-- Corregido el enlace de eliminación -->
                    <a href="./testimonials/delete-testimonials.php?id=<?php echo $testimonio['id']; ?>">Eliminar</a>
                </td>
                <td>
                    <a href="./users/edit-user.php?id=<?php echo $user['id']; ?>">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Comentarios</h2>

    <a href="./testimonials/delete-testimonials.php"></a>

</body>
</html>
