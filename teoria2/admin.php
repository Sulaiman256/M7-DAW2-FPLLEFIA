<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Agregar el CDN de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Contenedor principal -->
    <div class="flex h-screen">
        <!-- Barra lateral -->
        <div class="bg-gray-800 text-white w-64 p-5 space-y-6">
            <h2 class="text-2xl font-semibold">Admin Panel</h2>
            <ul class="space-y-2">
                <li><a href="#" class="hover:bg-gray-700 p-2 block rounded">Dashboard</a></li>
                <li><a href="#" class="hover:bg-gray-700 p-2 block rounded">Usuarios</a></li>
                <li><a href="#" class="hover:bg-gray-700 p-2 block rounded">Configuraciones</a></li>
                <li><a href="#" class="hover:bg-gray-700 p-2 block rounded">Estadísticas</a></li>
                <li><a href="#" class="hover:bg-gray-700 p-2 block rounded">Cerrar sesión</a></li>
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 p-8">
            <!-- Encabezado -->
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-semibold">Bienvenido al Panel de Admin</h1>
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Agregar Usuario</button>
            </div>

            <!-- Tarjetas con estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold">Usuarios Activos</h3>
                    <p class="text-2xl mt-2">2,540</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold">Ventas Hoy</h3>
                    <p class="text-2xl mt-2">$10,430</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold">Tareas Pendientes</h3>
                    <p class="text-2xl mt-2">18</p>
                </div>
            </div>

            <!-- Tabla de datos -->
            <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Últimos Registros</h2>
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Nombre</th>
                            <th class="px-4 py-2 text-left">Email</th>
                            <th class="px-4 py-2 text-left">Fecha de Registro</th>
                            <th class="px-4 py-2 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">Juan Pérez</td>
                            <td class="px-4 py-2">juan@correo.com</td>
                            <td class="px-4 py-2">2025-02-20</td>
                            <td class="px-4 py-2">
                                <button class="text-blue-500 hover:underline">Editar</button>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">Ana Gómez</td>
                            <td class="px-4 py-2">ana@correo.com</td>
                            <td class="px-4 py-2">2025-02-22</td>
                            <td class="px-4 py-2">
                                <button class="text-blue-500 hover:underline">Editar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
