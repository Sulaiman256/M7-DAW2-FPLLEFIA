<?php
session_start(); // Iniciem la sessió per guardar les dades

// Comprovem si l'usuari ja està a la sessió
if (isset($_SESSION['name'])) {
    header('Location: room1.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc d'Adivinalles</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">Benvingut al Joc d'Adivinalles!</h1>
        <form action="../pac08-escapeRoom/index.php" method="post">
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="surname">Cognoms:</label>
                <input type="text" id="surname" name="surname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="difficulty">Nivell de dificultat:</label>
                <select id="difficulty" name="difficulty" class="form-control" required>
                    <option value="easy">Fàcil</option>
                    <option value="medium">Mig</option>
                    <option value="hard">Difícil</option>
                </select>
            </div>
            <div class="form-group">
                <label for="profile_image">Imatge de perfil:</label>
                <input type="file" id="profile_image" name="profile_image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Començar el Joc</button>
        </form>
    </div>
</body>

</html>