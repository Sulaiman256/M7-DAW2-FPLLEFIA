<?php

session_start();





function generarNum()
{
    return rand(0, 37);
}



$numeroGanador = generarNum();
$color = ($numeroGanador === 0) ? "Verde" : (($numeroGanador % 2 === 0) ? "Negro" : "Rojo");
$apuestaTipo = $_POST['apuesta'];
$valorApuesta = $_POST['valorApuesta'];


$cantidadApostada = (int) ($_POST['money'] ?? 0);
$ganancia = $cantidadApostada;


if (!isset($_SESSION['historial_apostes'])) {
    $_SESSION['historial_apostes'] = [];
}

$saldo = isset($_SESSION['saldo']) ? $_SESSION['saldo'] : 1000;



var_dump($ganancia); // Verifica el valor de ganancia
$_SESSION['historial_apostes'][] = [
    'apuestaTipo' => $apuestaTipo,
    'valorApuesta' => $valorApuesta,
    'cantidadApostada' => $cantidadApostada,
    'fecha' => date('Y-m-d H:i:s'),
    'Perdida' => $ganancia < 0 ? abs($ganancia) : 0,
    'Ganancia' => $ganancia > 0 ? $ganancia : 0
];


$resultado = "Numero ganador:  $numeroGanador ($color)<br>";


switch ($apuestaTipo) {

    case 'Rojo/Negro':
        var_dump($color, $valorApuesta);
        if (strtolower($valorApuesta) === strtolower($color)) {
            $ganancia = $cantidadApostada * 1;
            $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
            // Ahora sumamos la ganancia
            $saldo += $ganancia;
        } else {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu perdida es: $ganancia";
            $saldo -= abs($ganancia);
        }
        $_SESSION['saldo'] = $saldo;
        break;
    case 'Par/Impar':
        $resultado .= "Número ganador: $numeroGanador ($color)<br>";
        if ($numeroGanador === 0) {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
        } else {
            $parImparGanador = ($numeroGanador % 2 === 0) ? "Par" : "Impar";
            if (strtolower($valorApuesta) === strtolower($parImparGanador)) {
                $ganancia = $cantidadApostada * 1;
                $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
                $saldo += $ganancia;
            } else {
                $ganancia = -$cantidadApostada;
                $resultado .= "Perdiste! Tu pérdida es: $ganancia";
                $saldo -= abs($ganancia);
            }
        }
        $_SESSION['saldo'] = $saldo;

        break;

    case 'Pasa/Falta':
        if ($numeroGanador === 0) {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
        } else {
            if (($numeroGanador >= 1 && $numeroGanador <= 18 && $valorApuesta === 'falta') ||
                ($numeroGanador >= 19 && $numeroGanador <= 36 && $valorApuesta === 'pasa')
            ) {
                $ganancia = $cantidadApostada * 1;
                $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
                $saldo += $ganancia;
            } else {
                $ganancia = -$cantidadApostada;
                $resultado .= "Perdiste! Tu pérdida es: $ganancia";
                $saldo -= abs($ganancia);
            }
        }
        $_SESSION['saldo'] = $saldo;

        break;

    case 'Pleno':
        if ((int)$valorApuesta === $numeroGanador) { // Comparación correcta de números
            $ganancia = $cantidadApostada * 35;
            $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
            $saldo += $ganancia;
        } else {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
            $saldo -= abs($ganancia);
        }
        $_SESSION['saldo'] = $saldo;
        break;

    case 'Docena':
        $docenaGanadora = ($numeroGanador <= 12) ? 'docena1' : (($numeroGanador <= 24) ? 'docena2' : 'docena3');
        if ($valorApuesta === $docenaGanadora) {
            $ganancia = $cantidadApostada * 2;
            $resultado .= "Ganaste! Tu ganancia es: $ganancia";
        } else {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
        }
        break;
    case 'Columna':
        $columna = (in_array($numeroGanador, [1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34])) ? 'columna 1' : (in_array($numeroGanador, [2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35])) ? 'columna2' : 'columna3';
        if ($valorApuesta === $columna) {
            $ganancia = $cantidadApostada * 2;
            $resultado .= "Ganaste! Tu ganancia es: $ganancia";
        } else {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
        }
        break;
    case 'Dos docenas':
        if (($valorApuesta === 'dosdocena1' && $numeroGanador >= 1 && $numeroGanador <= 24) ||
            ($valorApuesta === 'dosdocena2' && $numeroGanador >= 13 && $numeroGanador <= 36)
        ) {
            $ganancia = $cantidadApostada * 0.5;
            $resultado .= "Ganaste! Tu ganancia es: $ganancia";
        } else {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
        }
        break;
    case 'Dos columnas':
        if (($valorApuesta === 'doscolumna1' && in_array($numeroGanador, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12])) ||
            ($valorApuesta === 'doscolumna2' && in_array($numeroGanador, [13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24])) ||
            ($valorApuesta === 'doscolumna3' && in_array($numeroGanador, [25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36]))
        ) {
            $ganancia = $cantidadApostada * 0.5;
            $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
        } else {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
        }
        break;
    case 'Seisena':
        if ((($numeroGanador >= 1 && $numeroGanador <= 6) && $valorApuesta === 'seisena1') ||
            (($numeroGanador >= 7 && $numeroGanador <= 12) && $valorApuesta === 'seisena2') ||
            (($numeroGanador >= 13 && $numeroGanador <= 18) && $valorApuesta === 'seisena3') ||
            (($numeroGanador >= 19 && $numeroGanador <= 24) && $valorApuesta === 'seisena4') ||
            (($numeroGanador >= 25 && $numeroGanador <= 30) && $valorApuesta === 'seisena5') ||
            (($numeroGanador >= 31 && $numeroGanador <= 36) && $valorApuesta === 'seisena6')
        ) {
            $ganancia = $cantidadApostada * 5;
            $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
        } else {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
        }
        break;
    case 'Cuadro':
        $cuadroGanador = ($valorApuesta === 'cuadro' && (
            ($numeroGanador >= 1 && $numeroGanador <= 4) ||
            ($numeroGanador >= 5 && $numeroGanador <= 8) ||
            ($numeroGanador >= 9 && $numeroGanador <= 12)
        ));
        if ($cuadroGanador) {
            $ganancia = $cantidadApostada * 8;
            $resultado .= "Ganaste! Tu ganancia es: $ganancia";
        } else {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
        }
        break;
    case 'Transversal':
        if (($valorApuesta === 'transversal1' && in_array($numeroGanador, [0, 1, 2])) || ($valorApuesta === 'transversal2' && in_array($numeroGanador, [0, 2, 3]))) {
            $ganancia = $cantidadApostada * 11;
            $resultado .= "Ganaste! Tu ganancia es: $ganancia";
        } else {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
        }
        break;

    case 'Caballo':
        if (in_array($numeroGanador, [1, 2]) && $valorApuesta === 'caballo') {
            $ganancia = $cantidadApostada * 17;
            $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
        } else {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
        }
        break;
    default:
        $resultado .= "Apuesta no valida";
        break;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Resultado de Apuesta</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Resultado de tu Apuesta
            </div>
            <div class="card-body">
                <h5 class="card-title">Número Ganador: <?php echo $numeroGanador; ?> (<?php echo $color; ?>)</h5>
                <p class="card-text"><?php echo $resultado; ?></p>
                <?php if ($ganancia > 0): ?>
                    <p class="card-text">Ganancia: <?php echo $ganancia; ?></p>
                <?php endif; ?>
            </div>
        </div>
        <a href="formApuestas.php" class="btn btn-secondary mt-3">Volver a Apuestas</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>