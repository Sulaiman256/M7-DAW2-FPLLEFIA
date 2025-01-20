<?php
require_once 'partida.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['numero_de_jugadores']) && isset($_GET['numero_de_cartas'])) {
    $num_jugadores = intval($_GET['numero_de_jugadores']);
    $num_cartas = intval($_GET['numero_de_cartas']);

    // Inicializa la partida
    $partida = new Partida($num_jugadores, $num_cartas);

    echo "<h1>Partida Inicializada</h1>";
    foreach ($partida->array_jugadores as $jugador) {
        echo "<h2>Jugador {$jugador->id}</h2>";
        echo $jugador->mostrar_ma();
    }

    echo "<h2>Carta en Mesa:</h2>";
    echo $partida->carta_en_mesa->pinta_carta();
} else {
    // Si no hay datos enviados, redirige al formulario
    header("Location: formulario.php");
    exit;
}
?>
