<?php

session_start();
require_once '../../config/config.php';
include_once '../../controller/adminController.php';

// 1. Verificar que el rol sea administrador
if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página';
    exit;
}

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['testimony']) && isset($_POST['image']) && isset($_POST['date'])) {
    // 3. guardar los datos del formulario en variables
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $testimony = $_POST['testimony'];
    $image = $_POST['image'];
    $date = $_POST['date'];

    $addTestimony = addTestimonial($mysqli, $name, $surname, $testimony, $image, $date);
}

// 2. Mostramos de momento solo los testimonios
$testimony = readTestimonios($mysqli);

$news = readNews($mysqli);

$projects = readProjects($mysqli);

$users = readUsers($mysqli);





?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            color: red;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }


    </style>
</head>
<body class="bg-gray-100 p-5">
    <h1 class="text-3xl font-bold mb-5">Panel de Administrador</h1>
    <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
        <a href="../index.php">Home</a>
    </button>

    <h2 class="text-2xl mb-3">Testimonios</h2>

    <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded mb-5">Agregar Testimonio</button>

    <table class="bg-white shadow-md rounded">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Testimonio</th>
            <th>Imagen</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($testimony as $testimonio) : ?>
            <tr>
                <td><?php echo htmlspecialchars($testimonio['name']); ?></td>
                <td><?php echo htmlspecialchars($testimonio['surname']); ?></td>
                <td><?php echo htmlspecialchars($testimonio['testimony']); ?></td>
                <td><?php echo htmlspecialchars($testimonio['image']); ?></td>
                <td><?php echo htmlspecialchars($testimonio['date']); ?></td>
                <td style="text-align: center; vertical-align: middle; display: flex; justify-content: center; gap: 10px;">
                    <a href="./testimonials/delete-testimonials.php?id=<?php echo $testimonio['id']; ?>">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" style="color: red;">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </a>
                    <a href="./testimonials/edit-testimonials.php?id=<?php echo $testimonio['id']; ?>">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2 class="text-2xl mt-5">Noticias</h2>
    <div class="py-3">
    <button onclick="openModalNoticias()" class="bg-blue-500 text-white px-4 py-2 rounded mb-5">Agregar Noticia</button>

    </div>
    <table class="bg-white shadow-md rounded">
        <tr>
            <th>Titulo</th>
            <th>Subtitulo</th>
            <th>Imagen</th>
            <th>Fecha de publicacion</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($news as $new) : ?>
            <tr>
                <td><?php echo htmlspecialchars($new['title']); ?></td>
                <td><?php echo htmlspecialchars($new['subititle']); ?></td>
                <td><?php echo htmlspecialchars($new['body']); ?></td>
                <td><?php echo htmlspecialchars($new['publication_date']); ?></td>
 <td class="px-4 py-2 max-w-xs">
                    <div class="truncate" title="<?php echo htmlspecialchars($new['descripcion']); ?>">
                        <?php echo htmlspecialchars($new['descripcion']); ?>
                    </div>
                </td>                <td style="text-align: center; vertical-align: middle; display: flex; justify-content: center; gap: 10px;">
                    <a href="./news/delete-news.php?id=<?php echo $new['id']; ?>">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" style="color: red;">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </a>
                    <a href="./news/edit-news.php?id=<?php echo $new['id']; ?>">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2 class="text-2xl mt-5">Proyectos</h2>
    <div class="py-3">
    <button onclick="openModalNoticias()" class="bg-blue-500 text-white px-4 py-2 rounded mb-5">Agregar Proyecto</button>

    </div>
    <table class="bg-white shadow-md rounded">
        <tr>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Url</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($projects as $project) : ?>
            <tr>
                <td><?php echo htmlspecialchars($project['title']); ?></td>
                <td><?php echo htmlspecialchars($project['description']); ?></td>
                <td><?php echo htmlspecialchars($project['url']); ?></td>
                <td><?php echo htmlspecialchars($project['thumbnail']); ?></td>
              <td style="text-align: center; vertical-align: middle; display: flex; justify-content: center; gap: 10px;">
                    <a href="./proyects/delete-projects.php?id=<?php echo $project['id']; ?>">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" style="color: red;">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </a>
                    <a href="./proyects-edit-projects.php?id=<?php echo $project['id']; ?>">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2 class="text-2xl mt-5">Usuarios</h2>
      <div class="py-3">
    <button onclick="openModalNoticias()" class="bg-blue-500 text-white px-4 py-2 rounded mb-5">Agregar usuarios</button>

    </div>
    <table class="bg-white shadow-md rounded">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Password</th>
            <th>Rol</th>
            <th>Fecha de registro</th>
            <th>Apellidos</th>
            <th>Avatar</th>
            <th>Edad</th>
            <th>Trabajo</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['password']); ?></td>
                <td><?php echo htmlspecialchars($user['rol']); ?></td>
                <td><?php echo htmlspecialchars($user['data_registre']); ?></td>
                <td><?php echo htmlspecialchars($user['surname']); ?></td>
                <td><?php echo htmlspecialchars($user['avatar']); ?></td>
                <td><?php echo htmlspecialchars($user['age']); ?></td>
                <td><?php echo htmlspecialchars($user['job']); ?></td>
              <td style="text-align: center; vertical-align: middle; display: flex; justify-content: center; gap: 10px;">
                    <a href="./users/delete-users.php?id=<?php echo $user['id']; ?>">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" style="color: red;">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </a>
                    <a href="./users/edit-users.php?id=<?php echo $user['id']; ?>">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2 class="text-2xl mt-5">Comentarios</h2>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white p-8 rounded-lg w-96">
            <h2 class="text-2xl mb-4">Agregar Testimonio</h2>
            <form action="" method="POST">
                <label for="name">Nombre:</label>
                <input type="text" name="name" placeholder="Nombre" id="name" class="w-full p-2 border mb-2">
                <label for="surname">Apellidos:</label>
                <input type="text" name="surname" id="surname" placeholder="Apellidos" class="w-full p-2 border mb-2">
                <label for="testimony">Testimonio:</label>
                <textarea name="testimony" id="testimony" placeholder="Testimonio" class="w-full p-2 border mb-2"></textarea>
                <label for="image">Imagen:</label>
                <input type="text" name="image" id="image" placeholder="URL" class="w-full p-2 border mb-2">
                <label for="date">Fecha:</label>
                <input type="date" name="date" id="date" class="w-full p-2 border mb-2">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded w-full">Guardar</button>
            </form>
            <button onclick="closeModal()" class="mt-3 text-red-500">Cerrar</button>
        </div>
    </div>

        <div id="modalNoticias" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white p-8 rounded-lg w-96">
            <h2 class="text-2xl mb-4">Agregar Testimonio</h2>
            <form action="" method="POST">
                <label for="name">Nombre:</label>
                <input type="text" name="name" placeholder="Nombre" id="name" class="w-full p-2 border mb-2">
                <label for="surname">Apellidos:</label>
                <input type="text" name="surname" id="surname" placeholder="Apellidos" class="w-full p-2 border mb-2">
                <label for="testimony">Testimonio:</label>
                <textarea name="testimony" id="testimony" placeholder="Testimonio" class="w-full p-2 border mb-2"></textarea>
                <label for="image">Imagen:</label>
                <input type="text" name="image" id="image" placeholder="URL" class="w-full p-2 border mb-2">
                <label for="date">Fecha:</label>
                <input type="date" name="date" id="date" class="w-full p-2 border mb-2">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded w-full">Guardar</button>
            </form>
            <button onclick="closeModalNoticias()" class="mt-3 text-red-500">Cerrar</button>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

           function openModalNoticias() {
            document.getElementById('modalNoticias').classList.remove('hidden');
        }

        function closeModalNoticias() {
            document.getElementById('modalNoticias').classList.add('hidden');
        }
    </script>
</body>
</html>
