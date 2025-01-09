<?php
include_once './class/Biblioteca.php'; 
include_once './class/Llibre.php';
session_start();

if (!isset($_SESSION['biblioteca'])) {
    $_SESSION['biblioteca'] = new Biblioteca();
} else {
    if (is_string($_SESSION['biblioteca'])) {
        $_SESSION['biblioteca'] = unserialize($_SESSION['biblioteca']);
    }
}

$biblioteca = $_SESSION['biblioteca']; 

if (isset($_POST['afegir'])) {
    $titol = $_POST['titol'];
    $autor = $_POST['autor'];
    $any = $_POST['any'];
    $foto = $_POST['foto'];

    $nouLlibre = new Llibre($titol, $autor, $any, $foto);

    $biblioteca->afegirLlibre($nouLlibre);

    $_SESSION['biblioteca'] = $biblioteca;
}

$cerca = '';
if (isset($_GET['cerca'])) {
    $cerca = $_GET['cerca'];
    $resultats = $biblioteca->cercarLlibrePerTitol($cerca);
}
?>
<!DOCTYPE html>
<html lang="es" class="bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Gestió de Llibres</title>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Gestió de Llibres</h1>

        <form action="" method="post" class="space-y-4">
            <h2 class="text-xl font-bold mb-2">Afegir un llibre</h2>
            <div>
                <label for="titol" class="block text-sm font-medium text-gray-700 mb-1">Títol</label>
                <input type="text" name="titol" id="titol" placeholder="Introdueix el títol del llibre" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="autor" class="block text-sm font-medium text-gray-700 mb-1">Nom d'Autor</label>
                <input type="text" name="autor" id="autor" placeholder="Introdueix el nom d'autor" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="any" class="block text-sm font-medium text-gray-700 mb-1">Any de publicació</label>
                <input type="number" name="any" id="any" placeholder="Ex: 2023" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto (URL)</label>
                <input type="url" name="foto" id="foto" placeholder="Introdueix la URL de la foto" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <input type="submit" name="afegir" value="Afegir Llibre"
                    class="w-full bg-[#BAD80A] text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-150 ease-in-out">
            </div>
        </form>

        <form action="" method="get" class="space-y-4 mt-6">
            <h2 class="text-xl font-bold mb-2">Cercar un llibre</h2>
            <div>
                <label for="cerca" class="block text-sm font-medium text-gray-700 mb-1">Cerca</label>
                <input type="text" id="cerca" name="cerca" placeholder="Buscar llibre..." 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <input type="submit" value="Cercar"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
            </div>
        </form>

        <div class="mt-6">
            <h2 class="text-xl font-bold mb-2">Biblioteca</h2>
            <div class="space-y-4">
                <?php
                if (isset($cerca) && $cerca !== '') {
                    if (count($resultats) > 0) {
                        foreach ($resultats as $llibre) {
                            echo "<div class='border p-4 rounded-md shadow-md'>";
                            echo "<p><strong>Títol:</strong> {$llibre->titol}</p>";
                            echo "<p><strong>Autor:</strong> {$llibre->autor}</p>";
                            echo "<p><strong>Any:</strong> {$llibre->anyPublicacio}</p>";
                            echo "<img src='{$llibre->foto}' alt='Foto del llibre' class='w-full h-32 object-cover mt-2'>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p class='text-gray-600'>No s'ha trobat cap llibre amb aquest títol.</p>";
                    }
                } else {
                    $llibres = $biblioteca->mostrarLlibres();

                    if (count($llibres) > 0) {
                        foreach ($llibres as $llibre) {
                            echo "<div class='border p-4 rounded-md shadow-md'>";
                            echo "<p><strong>Títol:</strong> {$llibre->titol}</p>";
                            echo "<p><strong>Autor:</strong> {$llibre->autor}</p>";
                            echo "<p><strong>Any:</strong> {$llibre->anyPublicacio}</p>";
                            echo "<img src='{$llibre->foto}' alt='Foto del llibre' class='w-full h-32 object-cover mt-2'>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p class='text-gray-600'>La biblioteca està buida.</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
