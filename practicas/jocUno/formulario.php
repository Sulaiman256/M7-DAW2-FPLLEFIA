<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Formulario de Uno</title>
</head>
<body>
    <div class="mt-20">
        <form class="max-w-sm mx-auto" method="GET" action="index.php">
            <div class="mb-5">
                <label for="numero_de_cartas" class="block mb-2 text-sm font-medium text-gray-900">Número de cartas</label>
                <input type="number" id="numero_de_cartas" name="numero_de_cartas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            <div class="mb-5">
                <label for="numero_de_jugadores" class="block mb-2 text-sm font-medium text-gray-900">Número de jugadores</label>
                <input type="number" id="numero_de_jugadores" name="numero_de_jugadores" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="1" name="remember" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required />
                </div>
                <label for="remember" class="ml-2 text-sm font-medium text-gray-900">Acepto los términos</label>
            </div>
            <button type="submit" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5">Jugar</button>
        </form>
    </div>
</body>
</html>
