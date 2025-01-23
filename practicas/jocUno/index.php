<?php
session_start(); // Iniciar sesión para mantener el estado entre recargas

require_once 'baraja.class.php';
require_once 'jugador.class.php';
require_once 'partida.class.php';

// Verificar si ya existe una partida en la sesión o si se debe iniciar una nueva
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['numero_de_jugadores']) && isset($_GET['numero_de_cartas'])) {
    $num_jugadores = intval($_GET['numero_de_jugadores']);
    $num_cartas = intval($_GET['numero_de_cartas']);

    // Crear la partida solo si no existe ya en la sesión
    if (!isset($_SESSION['partida'])) {
        $partida = new Partida($num_jugadores, $num_cartas);
        $_SESSION['partida'] = serialize($partida); // Guardar la partida serializada en la sesión
    } else {
        $partida = unserialize($_SESSION['partida']); // Recuperar la partida de la sesión
    }

    // Verificar si se ha seleccionado una carta
    if (isset($_GET['id'])) {
        $id_carta_seleccionada = intval($_GET['id']);
        $jugador_actual = $partida->array_jugadores[$partida->turno]; // El jugador actual es el turno actual
        
        // Buscar la carta seleccionada en la mano del jugador
        foreach ($jugador_actual->mano as $index => $carta) {
            if ($carta->index == $id_carta_seleccionada) {
                // Verificar si la carta seleccionada coincide con la carta en mesa
                if ($carta->numero == $partida->carta_en_mesa->numero || $carta->palo == $partida->carta_en_mesa->palo) {
                    // Eliminar la carta de la mano
                    $jugador_actual->eliminar_carta($index);
                    // Actualizar la carta en mesa (se toma la carta eliminada)
                    $partida->carta_en_mesa = $carta;
                    // Cambiar turno
                    $partida->cambiar_turno();
                    break;
                } else {
                    echo "La carta seleccionada no coincide con la carta en la mesa.";
                }
            }
        }

        // Volver a guardar la partida en la sesión después de la jugada
        $_SESSION['partida'] = serialize($partida);
    }

    // Mostrar el estado de la partida
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
    header("Location: formulario.php");
    exit;
}
?>
