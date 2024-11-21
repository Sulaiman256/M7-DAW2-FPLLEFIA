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
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio del Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .btn-primary {
            background-color: #4e54c8;
            border-color: #4e54c8;
        }

        .btn-primary:hover {
            background-color: #3f45b6;
            border-color: #3f45b6;
        }

        .form-label {
            font-weight: 500;
        }

        .image-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h1 class="text-center mb-4">Bienvenido al Juego</h1>
                    <form action="../../practicas/pac08-escapeRoom/index.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Apellidos:</label>
                            <input type="text" class="form-control" id="surname" name="surname" required>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Nivel de Dificultad:</label>
                            <select class="form-select" id="level" name="level" required>
                                <option value="facil">Fácil</option>
                                <option value="mig">Medio</option>
                                <option value="dificil">Difícil</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Imagen de Perfil (opcional):</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*">
                        </div>
                        <div class="text-center mb-3">
                            <img id="image-preview" class="image-preview d-none" alt="Vista previa de la imagen">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Iniciar Juego</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>