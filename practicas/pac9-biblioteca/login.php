<?php
session_start();

include_once './array.php';
include_once './user.php';

// Procesamiento del formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $photo = $_POST['photo'];

    foreach ($usuarios as $usuario) {
        if ($usuario['username'] === $username && $usuario['password'] === $password) {
            $_SESSION['usuario'] = $usuario['username'];
            $_SESSION['role'] = $usuario['role'];
            $_SESSION['photo'] = $photo;

            header('Location: home.php');
            exit;
        }
    }
    $error = "Credenciales incorrectas";
}

// Validación de credenciales.

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual - Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section>
        <!-- Elementos de fondo decorativos -->
        <?php for ($i = 0; $i < 180; $i++): ?>
            <span></span>
        <?php endfor; ?>

        <!-- Sección de inicio de sesión -->
        <div class="signin">
            <div class="content text-center">
                <h2>Inicia sesión</h2>
                <form method="POST" action="login.php">
                    <div class="inputBox">
                        <input class="p-2 m-2" placeholder="Username" type="text" name="username" required>
                    </div>
                    <div class="inputBox">
                        <input class="p-2 m-2" placeholder="Password" type="password" name="password" required>
                    </div>
                    <div class="inputBox">
                        <input class="p-2 m-2" placeholder="Foto de perfil" type="text" name="photo" required>
                    </div>

                    <div class="inputBox">
                        <input class="bg-warning btn mt-2" type="submit" value="Iniciar">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>