<?php
session_start();

if (!isset($_SESSION['current_room']) || $_SESSION['current_room'] !== 3) {
    header("Location: room2.php"); // Redirigir al inicio si no completó room2
    exit();
}

$name = $_SESSION['name'] ?? 'jugador';
$surname = $_SESSION['surname'] ?? '';
$level = ucfirst($_SESSION['level'] ?? '');
$profile_image = $_SESSION['profile_image'] ?? 'https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png';

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>¡Juego Completado!</title>
</head>

<body>
    <header class="bg-primary text-white p-3 text-center">
        <img src="<?= $profile_image ?>" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;">
        <p><?= htmlspecialchars($name) ?> <?= htmlspecialchars($surname) ?> - Nivel: <?= htmlspecialchars($level) ?></p>
    </header>
    <div class="container mt-5 text-center">
        <h1 class="text-success">¡Felicidades, <?= htmlspecialchars($name) ?>!</h1>
        <p class="fs-4">Has completado el juego con éxito. 🎉</p>
        <a href="index.php" class="btn btn-primary mt-4">Volver al Inicio</a>
    </div>
    <script>
        setTimeout(() => {
            window.location.href = "index.php";
        }, 5000);
    </script>

</body>

</html>