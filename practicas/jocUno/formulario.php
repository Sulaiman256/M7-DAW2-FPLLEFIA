<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Formulario de Uno</title>
</head>
<body class="bg-gradient-to-br from-cyan-50 to-blue-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-2xl rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-cyan-500 to-blue-500 p-4">
                <h2 class="text-2xl font-bold text-white text-center">Juego de Uno</h2>
            </div>
            <form class="p-6 space-y-6" method="GET" action="index.php">
                <div>
                    <label for="numero_de_cartas" class="block text-sm font-medium text-gray-700 mb-1">Número de cartas</label>
                    <div class="relative">
                        <input type="number" id="numero_de_cartas" name="numero_de_cartas" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 rounded-md" required />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="numero_de_jugadores" class="block text-sm font-medium text-gray-700 mb-1">Número de jugadores</label>
                    <div class="relative">
                        <input type="number" id="numero_de_jugadores" name="numero_de_jugadores" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-cyan-500 focus:border-cyan-500 rounded-md" required />
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <input id="remember" type="checkbox" value="1" name="remember" class="h-4 w-4 text-cyan-600 focus:ring-cyan-500 border-gray-300 rounded" required />
                    <label for="remember" class="ml-2 block text-sm text-gray-900">
                        Acepto los términos y condiciones
                    </label>
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                        Jugar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>