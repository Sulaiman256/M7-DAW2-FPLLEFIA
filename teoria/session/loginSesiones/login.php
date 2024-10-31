<?php
session_start();

// Simulo bbdd
$users = [
    ['username' => 'Juan',  'password' => '1234'],
    ['username' => 'Maria',  'password' => 'abcd'],
    ['username' => 'Pedro',  'password' => 'efgh'],
    ['username' => 'Ana',  'password' => 'ijkl'],
    ['username' => 'Luis',  'password' => 'mnop'],
    ['username' => 'Carlos',  'password' => 'qrst'],
    ['username' => 'Jose',  'password' => 'uvwx'],
];

// Verifico si existe el usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            // Si existe, lo inicio la sesión y redirecciono a la página principal
            $_SESSION['username'] = $username;
            header('Location: bienvenida.php');
            exit;
        }
    }

    

    echo "Usuario o contraseña incorrectos";
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
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
