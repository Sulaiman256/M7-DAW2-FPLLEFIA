<?php
session_start();
require_once 'config.php';


// importar config.php


// 1.Comprobar si el formulario a sido enviado

if($_SERVER['REQUEST_METHOD'] === 'POST'){
   // 2.Guardar los datos del formulario en variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 3. Ejecutar la consulta

    $result = $mysqli->query("SELECT * FROM users WHERE email = '$email'");

    // 4. Comprobar si hay resultados
    if($result && $result->num_rows > 0){
        $user = $result->fetch_assoc();
        // 5. Comprobar si la contraseña es correcta
        if(password_verify($password, $user['password'])){
            // 6. Guardar el usuario en la sesion
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_surname'] = $user['surname'];
            $_SESSION['user_avatar'] = $user['avatar'];
            $_SESSION['user_rol'] = $user['rol'];
            $_SESSION['user_age'] = $user['age'];
            $_SESSION['user_job'] = $user['job'];
            header('Location: index.php');
            exit;
    }
    }else{
        echo 'Usuario o contraseña incorrectos';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Iniciar sesion">
    </form>
</body>
</html>