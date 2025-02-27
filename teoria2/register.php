<?php

// Llamar al config para la conexión con la BD
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $avatar = $_POST['avatar'];
    $age = $_POST['age'];  // Asegúrate de capturar 'age'
    $job = $_POST['job'];  // Asegúrate de capturar 'job'

    // Hashear la contraseña antes de guardarla
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta antes de insertar para evitar el SQL injection
    $stmt = $mysqli->prepare(
        "INSERT INTO users (name, email, password, rol, data_registre, surname, avatar, age, job) 
        VALUES (?, ?, ?, 'user', now(), ?, ?, ?, ?)"
    );

    // Comprobar que la preparación tuvo éxito
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
        exit;
    }

    // Enlazar los parámetros (nota que ahora solo son 8 parámetros)
    $stmt->bind_param('sssssis', $name, $email, $passwordHashed, $surname, $avatar, $age, $job);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo 'Usuario registrado correctamente';
    } else {
        echo 'Error al registrar el usuario';
    }

    // Cerrar la consulta
    $stmt->close();
    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>

        <label for="surname">Apellidos:</label>
        <input type="text" name="surname" id="surname" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>

        <label for="avatar">Foto de perfil:</label>
        <input type="text" name="avatar" id="avatar">

        <label for="age">Edad:</label>
        <input type="number" name="age" id="age" required>

        <label for="job">Trabajo:</label>
        <input type="text" name="job" id="job" required>

        <input type="submit" value="Registrarse">
    </form>
</body>
</html>
