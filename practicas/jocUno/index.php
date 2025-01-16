<?php

include_once "./baraja.class.php";
include_once "./partida.class.php";

$baraja = new Baraja();
$baraja->crea_baraja();
$baraja->mezcla();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['numero_de_cartas']) && isset($_GET['numero_de_jugadores'])) {
    // Obtener los valores del formulario
    $numero_de_cartas = $_GET['numero_de_cartas'];
    $numero_de_jugadores = $_GET['numero_de_jugadores'];

    // Crear un objeto de la clase Partida con los datos del formulario
    $partida = new Partida();
    $partida->numero_cartas = $numero_de_cartas;
    $partida->numero_jugadores = $numero_de_jugadores;
    var_dump($partida);
} else {
    $partida = new Partida();
    echo "No se han recibido los datos del formulario";
}




?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc uno Sulaiman</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
        
<div class="mt-20">
<form class="max-w-sm mx-auto" method="get" action="../jocUno/juego.php">
  <div class="mb-5">
    <label for="numero_de_cartas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero de cartas</label>
    <input type="number" id="numero_de_cartas" name="numero_de_cartas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
  </div>
  <div class="mb-5">
    <label for="numero_de_jugadores" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero de jugadores</label>
    <input type="number" id="numero_de_jugadores" name="numero_de_jugadores" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
  </div>
  <div class="flex items-start mb-5">
    <div class="flex items-center h-5">
      <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
    </div>
    <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
  </div>
        <button type="submit"  class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Jugar</button>
</form>
</div>






    
</body>
</html>