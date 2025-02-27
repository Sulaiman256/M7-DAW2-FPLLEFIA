<?php
    session_start();
    require_once 'config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Agregar Tailwind CSS -->
</head>
<body class="bg-gray-100">
    <header class="bg-gray-800 p-6 flex justify-between items-center text-white">
        <h1 class="text-2xl font-semibold">Tarjetas de datos</h1>
        <nav class="flex items-center space-x-4">
            <?php if(isset($_SESSION['user_id'])): ?>
                <div class="flex items-center space-x-2">
                    <img src="<?= $_SESSION['user_avatar'] ?>" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-white">
                    <span class="font-medium"><?= $_SESSION['user_name'] ?></span>
                    <?php
                        if($_SESSION['user_rol'] === 'admin'){
                            echo '<a href="./admin/adminPanel.php" class="text-blue-400 hover:text-blue-600">
<svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
</svg>


</a>

';
                        }
                    ?>
                </div>
            <?php endif; ?>
            <a href="./admin/adminPanel.php"></a>
            <ul class="flex space-x-4">
                <li><a href="index.php" class="text-white hover:text-gray-300">Inicio</a></li>
                <?php if(!isset($_SESSION['user_id'])): ?>
                    <li><a href="login.php" class="text-white hover:text-gray-300">Iniciar sesión</a></li>
                    <li><a href="register.php" class="text-white hover:text-gray-300">Registrarse</a></li>
                <?php else: ?>
                    <li><a href="logout.php" class="text-white hover:text-gray-300">Cerrar sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
</body>
</html>
