<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones Estructurales</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex justify-center items-center min-h-screen py-6 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-lg bg-white border border-gray-200 rounded-lg shadow-lg p-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Patrones de creacion</h2>

            <p class="text-gray-600 text-lg mb-6">A continuación puedes seleccionar el patrón de creacion que más te interese para aprender más sobre su uso.</p>

            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg shadow-md">
                    <h5 class="text-xl font-semibold text-gray-800">Patrones Disponibles:</h5>
                    <ul class="list-disc pl-5 text-gray-600 mt-2">
                        <li>Factory Method: Proporciona una base la cual tendra una superclase y ademas las subclases podran alterar los objetos que se vayan creando</li>
                        <li>Abstract Factory: Permite crear familias de objetos relacionados sin definir sus clases específicas.
                        </li>
                        <li>Builder:
                            Permite construir objetos complejos de manera paso a paso, produciendo diferentes tipos y representaciones con el mismo proceso de construcción.</li>
                        <li>Prototype: Permite copiar objetos existentes sin que el código dependa de las clases específicas de esos objetos.
                        </li>
                        <li>Singleton: Asegura que una clase tenga una única instancia y proporciona un punto de acceso global a esa instancia.</li>
                    </ul>
                </div>

                <form method="POST" action="redirect.php" class="space-y-4">
                    <label for="Estructurales" class="block text-sm font-medium text-gray-700">Selecciona un patrón</label>
                    <select id="Estructurales" name="option" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-900">
                        <option value="patrons/factoryMethod.php">Factory Method</option>
                        <option value="patrons/abstractFactory.php">Abstract Factory</option>
                        <option value="patrons/builder.php">Builder</option>
                        <option value="patrons/prototype.php">Prototype</option>
                        <option value="patrons/singleton.php">Singleton</option>
                    </select>

                    <button type="submit" class="w-full py-3 px-6 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        Enviar
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>