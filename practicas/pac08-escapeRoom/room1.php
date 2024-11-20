<?php

session_start();
include_once './array.php';

if (!isset($_SESSION['current_room']) || $_SESSION['current_room'] < 1) {
    header('Location: index.php');
    exit();
}

$difficulty = $_SESSION['difficulty'];
$current_question = $questions[$difficulty][0];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (strtolower(trim($_POST['answer'])) === strtolower($current_question['answer'])) {
        $_SESSION['current_room'] = 2; // Incrementem a la següent habitació
        header('Location: room2.php');
        exit();
    } else {
        $error_message = "Resposta incorrecta! Torna-ho a intentar.";
    }
}
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitació 1 - Joc d'Adivinalles</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">Habitació 1</h1>

        <!-- Header personalitzat -->
        <div class="d-flex justify-content-between">
            <div><img src="<?= $_SESSION['profile_image'] ?? 'https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png' ?>" alt="Perfil" width="50"></div>
            <div>
                <p>Nom: <?= $_SESSION['name'] ?> <?= $_SESSION['surname'] ?></p>
                <p>Nivell: <?= ucfirst($_SESSION['difficulty']) ?></p>
            </div>
        </div>

        <h2><?= $current_question['question'] ?></h2>

        <?php if (isset($error_message)) {
            echo "<p class='text-danger'>$error_message</p>";
        } ?>

        <form action="room1.php" method="post">
            <div class="form-group">
                <input type="text" name="answer" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Comprovar resposta</button>
        </form>
    </div>
</body>

</html>