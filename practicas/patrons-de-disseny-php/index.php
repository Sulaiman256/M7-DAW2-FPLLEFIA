<?php

include_once 'header.php';
include_once 'footer.php';

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desenvolupament d’un web sobre Patrons de Disseny a PHP
    </title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>

<body>


    <main class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold text-gray-900">Patrones Estructurales</h5>
                </a>
                <p class="mb-3 text-gray-700">Los patrones estructurales combinan clases y objetos de manera eficiente para mejorar la flexibilidad y la reutilización del código.</p>
                <a href="estructurals.php" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                    Ver más
                    <svg class="ml-2 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>

            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold text-gray-900">Patrón de Creación</h5>
                </a>
                <p class="mb-3 text-gray-700">Los patrones de creación permiten una forma más eficiente y flexible de crear objetos, adaptándose a diversas necesidades.</p>
                <a href="creacion.php" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                    Ver más
                    <svg class="ml-2 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>

            <!-- Card 3: Behavioral Patterns -->
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold text-gray-900">Patrón de Comportamiento</h5>
                </a>
                <p class="mb-3 text-gray-700">Los patrones de comportamiento se enfocan en cómo los objetos interactúan y se comunican entre sí, mejorando la flexibilidad y la comunicación.</p>
                <a href="comportament.php" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                    Ver más
                    <svg class="ml-2 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>

        </div>
    </main>



</body>

</html>