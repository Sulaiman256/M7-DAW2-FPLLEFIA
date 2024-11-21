<?php
session_start();
include 'array.php';

if (!isset($_SESSION['current_room']) || $_SESSION['current_room'] !== 2) {
    header("Location: room1.php");
    exit();
}

$level = $_SESSION['level'];
$current_riddle = $riddles[$level][1]; // Segunda adivinanza del nivel

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_answer = strtolower(trim($_POST['answer']));
    if ($user_answer === $current_riddle['answer']) {
        $_SESSION['current_room'] = 3; // Avanzar a la siguiente habitación
        header("Location: room3.php");
        exit();
    } else {
        $error = "Respuesta incorrecta. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Habitación 2</title>
</head>

<body>
    <header class="bg-primary text-white p-3 text-center">
        <img src="<?= $_SESSION['profile_image'] ?>" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;">
        <p><?= $_SESSION['name'] . " " . $_SESSION['surname'] ?> - Nivel: <?= ucfirst($_SESSION['level']) ?></p>
    </header>
    <div class="container mt-5">
        <h1 class="text-center">Habitación 2</h1>
        <p class="text-center">Resuelve la siguiente adivinanza:</p>
        <p class="fs-4"><?= $current_riddle['question'] ?></p>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form action="room2.php" method="POST">
            <div class="mb-3">
                <label for="answer" class="form-label">Respuesta:</label>
                <input type="text" name="answer" id="answer" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Enviar Respuesta</button>
        </form>
    </div>
</body>

</html>