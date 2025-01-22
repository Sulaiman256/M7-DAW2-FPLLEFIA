<?php
require_once 'partida.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['numero_de_jugadores']) && isset($_GET['numero_de_cartas'])) {
    $num_jugadores = intval($_GET['numero_de_jugadores']);
    $num_cartas = intval($_GET['numero_de_cartas']);

    $partida = new Partida($num_jugadores, $num_cartas);

    echo "<div class='container mx-auto p-4'>";
    echo "<h1 class='text-3xl font-bold mb-4'>Partida Inicializada</h1>";
    foreach ($partida->array_jugadores as $jugador) {
        echo "<div class='mb-4'>";
        echo "<h2 class='text-2xl font-semibold'>Jugador {$jugador->id}</h2>";
        echo "<div class='bg-gray-100 p-2 rounded-lg shadow-md'>";
        echo $jugador->mostrar_ma();
        echo "</div>";
        echo "</div>";
    }

    echo "<h2 class='text-2xl font-semibold mt-6'>Carta en Mesa:</h2>";
    echo "<div class='bg-yellow-100 p-2 rounded-lg shadow-md'>";
    echo $partida->carta_en_mesa->pinta_carta();
    echo "</div>";
    echo "</div>";
} else {
    echo "No se han recibido los datos necesarios";
    // header("Location: formulario.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>
