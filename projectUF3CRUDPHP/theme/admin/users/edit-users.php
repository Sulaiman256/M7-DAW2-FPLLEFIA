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

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        echo 'Usuario no encontrado';
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['password'], $_POST['rol'], $_POST['data_registre'], $_POST['surname'], $_POST['avatar'], $_POST['age'], $_POST['job'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $rol = $_POST['rol'];
            $data_registre = $_POST['data_registre'];
            $surname = $_POST['surname'];
            $avatar = $_POST['avatar'];
            $age = $_POST['age'];
            $job = $_POST['job'];

            editUsers($mysqli, $id, $name, $email, $password, $rol, $data_registre, $surname, $avatar, $age, $job);

            header('Location: ../adminPanel.php');
            exit;  
        }
    }
} else {
    echo 'ID de usuario no proporcionado';
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuarios</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-6 flex justify-center items-center">

    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-semibold text-center mb-6">Editar usuario</h2>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="surname" class="block text-sm font-medium text-gray-700">Apellido</label>
                <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($user['surname']); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
                <select id="rol" name="rol" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="admin" <?php echo $user['rol'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="user" <?php echo $user['rol'] === 'user' ? 'selected' : ''; ?>>Usuario</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="data_registre" class="block text-sm font-medium text-gray-700">Fecha de Registro</label>
                <input type="date" id="data_registre" name="data_registre" value="<?php echo htmlspecialchars($user['data_registre']); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="avatar" class="block text-sm font-medium text-gray-700">Avatar (URL)</label>
                <input type="text" id="avatar" name="avatar" value="<?php echo htmlspecialchars($user['avatar']); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="age" class="block text-sm font-medium text-gray-700">Edad</label>
                <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($user['age']); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="job" class="block text-sm font-medium text-gray-700">Trabajo</label>
                <input type="text" id="job" name="job" value="<?php echo htmlspecialchars($user['job']); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Actualizar</button>
                <a href="../adminPanel.php" class="text-blue-500 hover:text-blue-700">Cancelar</a>
            </div>
        </form>
    </div>

</body>
</html>
