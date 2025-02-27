<?php
session_start();
require_once '../../config.php';

// 1. verificar que el rol sea administrador
if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página';
    exit;
}

// 2. comprobar si el formulario ha sido enviado
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['testimony']) && isset($_POST['image']) && isset($_POST['date'])) {
    // 3. guardar los datos del formulario en variables
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $testimony = $_POST['testimony'];
    $image = $_POST['image'];
    $date = $_POST['date'];

    // 4. preparar la consulta antes de insertar para evitar el SQL injection
    $stmt = $mysqli->prepare(
        "INSERT INTO testimony (name, surname, testimony, image, date) 
        VALUES (?, ?, ?, ?, ?)"
    );

    // 5. comprobar que la preparación tuvo éxito
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
        exit;
    }

    // 6. enlazar los parámetros
    $stmt->bind_param('sssss', $name, $surname, $testimony, $image, $date);

    // 7. ejecutar la consulta
    if ($stmt->execute()) {
        echo 'Testimonio agregado correctamente';
    } else {
        echo 'Error al agregar el Testimonio';
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
    <title>FFormulario agregar Testimonio</title>
</head>
<body>
    <h1>Formulario agregar Testimonio</h1>
    <form action="" method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="surname">Apellido:</label>
        <input type="text" name="surname" id="surname" required>
        
        <label for="testimony">Testimonio:</label>
        <input type="text" name="testimony" id="testimony" required>
        
        <label for="image">Imagen:</label>
        <input type="text" name="image" id="image" required>
        
        <label for="date">Fecha:</label>
        <input type="date" name="date" id="date" required>
        
        <input type="submit" value="Agregar proyecto">
    </form>
</body>
</html>
