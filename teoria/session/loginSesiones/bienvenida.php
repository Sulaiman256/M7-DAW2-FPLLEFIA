<?php

session_start();

echo 'Hola bienvenido';

if(!isset($_SESSION['username'])){
    header('Location: login.php');
    exit;
}
echo $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Bievenido <?php echo $_SESSION['username'] ?></h1>
        <a href="logout.php">Cerrar sesion</a>
    </header>
</body>
</html>