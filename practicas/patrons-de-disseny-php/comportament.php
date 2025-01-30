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
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Patrones de comportamiento</h2>

            <p class="text-gray-600 text-lg mb-6">A continuación puedes seleccionar el patrón de comportamiento que más te interese para aprender más sobre su uso.</p>

            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg shadow-md">
                    <h5 class="text-xl font-semibold text-gray-800">Patrones Disponibles:</h5>
                    <ul class="list-disc pl-5 text-gray-600 mt-2">
                        <li>Chain of responsability: Permite encadenar manejadores que deciden procesar o pasar la solicitud al siguiente en la cadena.</li>
                        <li>Command: Convierte una solicitud en un objeto independiente que contiene toda la información sobre la solicitud. Esta transformación te permite parametrizar los métodos con diferentes solicitudes, retrasar o poner en cola la ejecución de una solicitud y soportar operaciones que no se pueden realizar.
                        </li>
                        <li>Iterator:
                            Permite recorrer elementos de una colección sin exponer su representación subyacente (lista, pila, árbol, etc.).</li>
                        <li>Mediator: Permite reducir las dependencias caóticas entre objetos. El patrón restringe las comunicaciones directas entre los objetos, forzándolos a colaborar únicamente a través de un objeto mediador.
                        </li>
                        <li>Memento: Permite guardar y restaurar el estado previo de un objeto sin revelar los detalles de su implementación.</li>
                        <li>Observer: Define un mecanismo de suscripción para notificar a varios objetos sobre eventos de un objeto observado.</li>

                        <li>State: Define un sistema de suscripción para notificar a múltiples objetos sobre eventos de un objeto observado.</li>

                        <li>Strategy: Permite definir una familia de algoritmos, colocarlos en clases separadas y hacerlos intercambiables.</li>

                        <li>Template Method:Define el esqueleto de un algoritmo en la superclase, permitiendo que las subclases sobrescriban pasos sin modificar su estructura.</li>
                        <li>Visitor: Permite separar algoritmos de los objetos sobre los que operan.</li>

                    </ul>
                </div>

                <form method="POST" action="redirect.php" class="space-y-4">
                    <label for="patrones" class="block text-sm font-medium text-gray-700">Selecciona un patrón</label>
                    <select id="patrones" name="option" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-gray-900">
                        <option value="patrons/chainOfResponsability.php">Chain of responsability</option>
                        <option value="patrons/command.php">Command</option>
                        <option value="patrons/Iterator.php">Iterator</option>
                        <option value="patrons/mediator.php">Mediator</option>
                        <option value="patrons/memento.php">Memento</option>
                        <option value="patrons/observer.php">Observer</option>
                        <option value="patrons/state.php">State</option>
                        <option value="patrons/strategy.php">Strategy</option>
                        <option value="patrons/templateMethod.php">Template Method</option>
                        <option value="patrons/visitor.php">Visitor</option>
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