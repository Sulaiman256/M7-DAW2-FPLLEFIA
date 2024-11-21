<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['surname'] = $_POST['surname'];
    $_SESSION['level'] = $_POST['level'];

    // Manejo de imagen
    if (!empty($_FILES['profile_image']['tmp_name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['profile_image']['name']);
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file);
        $_SESSION['profile_image'] = $target_file;
    } else {
        $_SESSION['profile_image'] = "https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png";
    }

    // Inicializar habitación
    $_SESSION['current_room'] = 1;
    header("Location: room1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Inicio</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Bienvenido al Juego</h1>
        <form action="../../practicas/pac08-escapeRoom/index.php" method="POST" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Apellidos:</label>
                <input type="text" name="surname" id="surname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Nivel de Dificultad:</label>
                <select name="level" id="level" class="form-select" required>
                    <option value="facil">Fácil</option>
                    <option value="mig">Medio</option>
                    <option value="dificil">Difícil</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="profile_image" class="form-label">Imagen de Perfil (opcional):</label>
                <input type="file" name="profile_image" id="profile_image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar Juego</button>
        </form>
    </div>
</body>

</html>