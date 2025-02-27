<?php
session_start();
require_once '../../config.php';

// 1. verificar que el rol sea administrador

if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página';
    exit;
}
// 2. comprobar si el formulario ha sido enviado

if(isset($_POST['name'])){
    // 3. guardar los datos del formulario en variables
    $name = $_POST['name'];
    $description = $_POST['description'];
    $url = $_POST['url'];
    $thumbnail = $_POST['thumbnail'];

    // 4. preparar la consulta antes de insertar para evitar el SQL injection
    $stmt = $mysqli->prepare(
        "INSERT INTO projects (title, description, url, thumbnail ) 
        VALUES (?, ?, ?, ?)"
    );

    // 5. comprobar que la preparación tuvo éxito
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
        exit;
    }

    // 6. enlazar los parámetros
    $stmt->bind_param('ssss', $name, $description, $url, $thumbnail);

    // 7. ejecutar la consulta
    if ($stmt->execute()) {
        echo 'Proyecto agregado correctamente';
    } else {
        echo 'Error al agregar el proyecto';
    }

    // 8. cerrar la consulta
    $stmt->close();
    $mysqli->close();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de insertar projectos</title>
</head>
<body>
    <h1>Formulario add project</h1>
    <form action="" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        <label for="description">Descripción:</label>
        <input type="text" name="description" id="description" required>
        <label for="url">URL:</label>
        <input type="text" name="url" id="url" required>
        <label for="thumbnail">Imagen:</label>
        <input type="text" name="thumbnail" id="thumbnail" required>
        <input type="submit" value="Agregar proyecto">
    
</body>
</html>