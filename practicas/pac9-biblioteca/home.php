<?php
// Verifica si el usuario ha iniciado sesión; si no, redirige a login.php.

session_start();
if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']); // Limpiar mensaje después de mostrarlo
}
include_once './array.php'; // Se añadió el punto y coma faltante.
include_once './user.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

// Verifica el rol del usuario
if (!isset($_SESSION['role'])) {
    header('Location: login.php');
    exit;
}

// Obtener la lista de libros desde la sesión
$_SESSION['libros'] = $libros;


var_dump($_SESSION['role']);
var_dump($_SESSION['usuario']);


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Encabezado del usuario -->
    <header class="bg-light py-3 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="<?php echo htmlspecialchars($_SESSION['photo']); ?>" alt="Foto de perfil" class="w-25 rounded-circle me-3">
                <div>
                    <h4 class="m-0">👋 Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h4>

                    <div class="text-center mb-4">
                        <!-- SI ES ADMIN.... -->
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                            <p class="text-muted m-0"><i class="fas fa-user-shield text-success"></i> Admin ✏️</p>
                        <?php endif; ?>
                        <!-- SI ES LECTOR.... -->
                        <?php if ($_SESSION['role'] == 'lector'): ?>
                            <p class="text-muted m-0"><i class="fas fa-user-circle text-warning"></i> Lector 📚</p>
                        <?php endif; ?>

                    </div>



                </div>
            </div>
            <a href="./logout.php" class="btn btn-warning btn-sm">
                Cerrar sesión ❌
            </a>
        </div>
    </header>


    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Biblioteca Virtual</h1>
            <p class="lead">Disfruta explorando nuestra colección de libros</p>
        </div>

        <!-- Botón de agregar libro (solo visible para el admin) -->
        <?php if ($_SESSION['role'] == 'admin'): ?>
            <div class="text-center mb-4">
                <a href="./add_edit_book.php" class="btn btn-outline-success btn-lg">
                    <i class="fas fa-plus-circle me-2"></i>Agregar Nuevo Libro
                </a>
            </div>
        <?php endif; ?>

        <!-- Mostrar lista de libros en un grid de tarjetas con tamaño uniforme -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($_SESSION['libros'] as $libro): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="<?= htmlspecialchars($libro['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($libro['titulo']) ?>" style="height: 400px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($libro['titulo']) ?></h5>
                            <p class="card-text"><strong><?= htmlspecialchars($libro['autor']) ?></strong></p>
                            <p class="card-text"><?= htmlspecialchars($libro['descripcion']) ?></p>
                            <div class="btn-group">
                                <a href="./add_edit_book.php?id=<?= $libro['id'] ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                                <a href="delete_book.php?id=<?= $libro['id'] ?>" class="btn btn-sm btn-outline-danger">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>