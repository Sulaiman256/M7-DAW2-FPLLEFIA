<?php
session_start();
require_once '../../../config/config.php';
include_once '../../../controller/adminController.php';

// 1. Verificar que el rol sea administrador
if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página';
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $mysqli->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $project = $result->fetch_assoc();

    if (!$project) {
        echo 'Proyecto no encontrado';
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['id'], $_POST['title'], $_POST['description'], $_POST['url'], $_POST['thumbnail'], )) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $url = $_POST['url'];
            $thumbnail = $_POST['thumbnail'];

            editProject($mysqli, $id, $title, $description, $url, $thumbnail);

            header('Location: ../adminPanel.php');
            exit;  
        }
    }
} else {
    echo 'ID de proyecto no proporcionado';
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Testimonio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-6 flex justify-center items-center">

    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-semibold text-center mb-6">Editar Testimonio</h2>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Titulo</label>
                <input type="text" id="title" name="title" value="<?php echo $project['title']; ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripcion</label>
                <input type="text" id="description" name="description" value="<?php echo $project['description']; ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-gray-700">Url proyecto</label>
                <textarea id="url" name="url" rows="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required><?php echo $project['url']; ?></textarea>
            </div>

            <div class="mb-4">
                <label for="thumbnail" class="block text-sm font-medium text-gray-700">Imagen</label>
                <input type="text" id="thumbnail" name="thumbnail" value="<?php echo $project['thumbnail']; ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            
            <div class="flex justify-between items-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Actualizar</button>
                <a href="../adminPanel.php" class="text-blue-500 hover:text-blue-700">Cancelar</a>
            </div>
        </form>
    </div>

</body>
</html>
