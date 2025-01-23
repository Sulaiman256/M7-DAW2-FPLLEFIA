<?php
session_start();

require_once 'baraja.class.php';
require_once 'jugador.class.php';
require_once 'partida.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['numero_de_jugadores']) && isset($_GET['numero_de_cartas'])) {
    $num_jugadores = intval($_GET['numero_de_jugadores']);
    $num_cartas = intval($_GET['numero_de_cartas']);

    if (!isset($_SESSION['partida'])) {
        $partida = new Partida($num_jugadores, $num_cartas);
        $_SESSION['partida'] = serialize($partida);
    } else {
        $partida = unserialize($_SESSION['partida']);
    }


    if (isset($_GET['id'])) {
        $id_carta_seleccionada = intval($_GET['id']);
        $jugador_actual = $partida->array_jugadores[$partida->turno];

        foreach ($jugador_actual->mano as $index => $carta) {
            if ($carta->index == $id_carta_seleccionada) {
                if ($carta->numero == $partida->carta_en_mesa->numero || $carta->palo == $partida->carta_en_mesa->palo) {
                    $jugador_actual->eliminar_carta($index);
                    $partida->carta_en_mesa = $carta;
                    $partida->cambiar_turno();
                    break;
                } else {
                    echo "La carta seleccionada no coincide con la carta en la mesa.";
                }
            }
        }

        $_SESSION['partida'] = serialize($partida);
    }

    if (isset($_GET['robar']) && $_GET['robar'] == '1') {
        $jugador_actual = $partida->array_jugadores[$partida->turno];

        if ($jugador_actual->cartas_robadas < 2) {
            if (count($partida->baraja->conjunto_cartas) > 0) {
                $jugador_actual->afegir_carta(array_shift($partida->baraja->conjunto_cartas));
                $jugador_actual->cartas_robadas++;
            }
        } else if ($jugador_actual->cartas_robadas == 2) {
            $partida->turno = ($partida->turno + 1) % $partida->numero_jugadores;
        }

        $_SESSION['partida'] = serialize($partida);

        $partida->cambiar_turno();

        header("Location: index.php?numero_de_cartas={$_GET['numero_de_cartas']}&numero_de_jugadores={$_GET['numero_de_jugadores']}");
        exit;
    }
    if ($jugador_actual->baraja->conjunto_cartas == 'skip') {
        $partida->turno = ($partida->turno + 2) % $partida->numero_jugadores;
    }

    echo "<div class='container mx-auto p-4'>";
    echo "<h1 class='text-3xl font-bold mb-4'>Partida Inicializada</h1>";
    echo "<div>
    <form method='post' action='destroy_sesion.php'>
        <button type='submit' class='px-4 py-2 bg-red-500 text-white rounded-md'>Cerrar Sesión</button>
    </form>
    </div>";

    foreach ($partida->array_jugadores as $jugador) {
        echo "<div class='mb-4'>";
        echo "<h2 class='text-2xl font-semibold'>Jugador {$jugador->id}</h2>";
        echo "<div class='bg-gray-100 p-2 rounded-lg shadow-md'>";
        echo $jugador->mostrar_ma();
        echo "</div>";

        if ($partida->turno == $jugador->id) {
            echo "<div class='mt-4'>";
            echo "<a href='index.php?numero_de_cartas={$_GET['numero_de_cartas']}&numero_de_jugadores={$_GET['numero_de_jugadores']}&robar=1' class='px-4 py-2 bg-green-500 text-white rounded-md'>Robar Cartas</a>";
            echo "</div>";
        }

        echo "</div>";
    }

    echo "<h2 class='text-2xl font-semibold mt-6'>Carta en Mesa:</h2>";
    echo "<div class='bg-yellow-100 p-2 rounded-lg shadow-md'>";
    echo $partida->carta_en_mesa->pinta_carta();
    echo "</div>";

    echo "<h3 class='mt-4 text-xl font-semibold'>Cartas restantes en el mazo: " . count($partida->baraja->conjunto_cartas) . "</h3>";

    echo "</div>";
} else {
    echo "No se han recibido los datos necesarios";
    header("Location: formulario.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <title>Document</title>
</head>

<body>

</body>

</html>