<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php'); // Redirige a login si no hay usuario en la sesión
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<!-- Pasos para el ejercicio: paso 1 con JavaScript,
paso 2 , 3 , 4 , 5 con PHP  -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Apuestas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-primary {
            width: 100%;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    ?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bienvenido <?php echo $_SESSION['usuario']; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                </ul>
                <div class="d-flex align-items-center">
                    <?php if (isset($_SESSION['usuario'])): ?>
                        <span class="me-3">Hola, <?php echo $_SESSION['usuario']; ?>! quieres cerrar sesion</span>
                        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
                    <?php else: ?>
                        <a href="index.php" class="btn btn-primary">Iniciar Sesión</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="fixed-left">
        <h4>Apuestas realizadas</h4>
        <ul>
            <?php
            $apuestas = isset($_SESSION['apuestas']) ? $_SESSION['apuestas'] : [];
            foreach ($apuestas as $apuesta) {
                echo "<li>Tipo: {$apuesta['tipoApuesta']} - Valor: {$apuesta['valorApuesta']} - Cantidad: {$apuesta['money']}</li>";
            }
            ?>
        </ul>
        <hr>
        <?php
        $sueldo = 1000;
        ?>
        <span>
            <label for="sueldo">Sueldo actual: $<?php echo $sueldo; ?></label>
            <input type="hidden" name="sueldo" value="<?php echo $sueldo; ?>">
        </span>

    </div>

    <div class="container">
        <h2>Formulario de Apuestas</h2>
        <form action="main.php" method="post">
            <div class="mb-3">
                <label for="apuesta" class="form-label">Tipo de apuesta:</label>
                <select class="form-select" id="apuesta" name="apuesta">
                    <option value="">Seleccione una opción</option>
                    <option value="1">Rojo/Negro</option>
                    <option value="2">Par/Impar</option>
                    <option value="3">Pasa/Falta</option>
                    <option value="4">Pleno</option>
                    <option value="5">Docena</option>
                    <option value="6">Columna</option>
                    <option value="7">Dos docenas</option>
                    <option value="8">Dos columnas</option>
                    <option value="9">Seisena</option>
                    <option value="10">Cuadro</option>
                    <option value="11">Transversal</option>
                    <option value="12">Caballo</option>

                </select>
            </div>
            <div class="mb-3">
                <label for="valorApuesta" class="form-label">Valor de apuesta:</label>
                <select class="form-select" id="valorApuesta" name="valorApuesta">
                    <option value="">Seleccione una opción</option>
                </select>

            </div>
            <div class="mb-3">
                <label for="money" class="form-label">Cantidad de dinero:</label>
                <input type="number" class="form-control" name="money" id="money" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Aceptar términos y condiciones</label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Apuesta</button>
        </form>


        <!-- tabla -->
        <h2 class="text-center mb-4">Tabla de Apuestas</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Apuesta</th>
                    <th>Se juega a</th>
                    <th>Premio</th>
                    <th>Ejemplo en la imagen (ficha)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rojo/Negro</td>
                    <td>Se apuesta al color del número ganador, si será rojo o negro. Con esta apuesta se está jugando a 18 números, ya que hay 18 números rojos y 18 negros.</td>
                    <td>1 x 1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Par/Impar</td>
                    <td>Se apuesta a si el número donde cae la bola será par o impar. Con esta apuesta se está jugando a 18 números, bien a los 18 pares o impares.</td>
                    <td>1 x 1</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>Pasa/Falta</td>
                    <td>Se trata de apostar si el número estará entre 1-18 (falta) o 19-36 (pasa). Por tanto, se juega a 18 números.</td>
                    <td>1 x 1</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Docena</td>
                    <td>Se apuesta a qué docena estará el número ganador. El tapete se divide en 3 docenas, cada una abarca 12 números. Se juega a 12 números.</td>
                    <td>2 x 1</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>Columna</td>
                    <td>Se apuesta a qué columna estará el número ganador. El tapete se divide en 3 columnas, cada una alberga 12 números. Se juega a 12 números.</td>
                    <td>2 x 1</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>Dos docenas</td>
                    <td>Se apuesta a dos docenas contiguas, es decir, se puede apostar a las docenas 1 y 2, o a las docenas 2 y 3. Se juega a 24 números.</td>
                    <td>0,5 x 1</td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>Dos columnas</td>
                    <td>Se apuesta a dos columnas contiguas. Se puede apostar a las columnas 1 y 2 o a las columnas 2 y 3. Se juega a 24 números.</td>
                    <td>0,5 x 1</td>
                    <td>7</td>
                </tr>
                <tr>
                    <td>Seisena</td>
                    <td>Se apuesta a 6 números con una sola apuesta. Los 6 números están en dos filas contiguas.</td>
                    <td>5 x 1</td>
                    <td>8</td>
                </tr>
                <tr>
                    <td>Cuadro</td>
                    <td>Se apuesta a 4 números con una sola apuesta. Esta apuesta se realiza sobre 4 números que forman un cuadrado en el tapete.</td>
                    <td>8 x 1</td>
                    <td>9</td>
                </tr>
                <tr>
                    <td>Transversal</td>
                    <td>Se apuesta a 3 números en una fila. Existen dos variaciones: a los números 0, 1 y 2 o a 0, 2 y 3.</td>
                    <td>11 x 1</td>
                    <td>10, 11, 12</td>
                </tr>
                <tr>
                    <td>Caballo</td>
                    <td>Se apuesta a 2 números contiguos en el tapete de manera horizontal o vertical.</td>
                    <td>17 x 1</td>
                    <td>13, 14</td>
                </tr>
                <tr>
                    <td>Pleno</td>
                    <td>Se apuesta a un solo número.</td>
                    <td>35 x 1</td>
                    <td>15</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        console.log("Ruleta Americana")
        const apuestaSelect = document.querySelector('#apuesta')
        const valorApuesta = document.querySelector('#valorApuesta')

        apuestaSelect.addEventListener('change', function() {
            valorApuesta.innerHTML = '<option value="">Seleccione una opción</option>';
            switch (this.value) {
                case '1':
                    valorApuesta.innerHTML += '<option value="rojo">Rojo</option><option value="negro">Negro</option>';
                    break;
                case '2':
                    valorApuesta.innerHTML += '<option value="par">Par</option><option value="impar">Impar</option>';
                    break;
                case '3':
                    valorApuesta.innerHTML += '<option value="pasa">Pasa</option><option value="falta">Falta</option>';
                    break;
                case '4':
                    valorApuesta.innerHTML += '<option value="pleno">Pleno</option>';
                    break;
                case '5':
                    valorApuesta.innerHTML += '<option value="docena1">Primera Docena</option><option value="docena2">Segunda Docena</option><option value="docena3">Tercera Docena</option>';
                    break;
                case '6':
                    valorApuesta.innerHTML += '<option value="columna1">Primera Columna</option><option value="columna2">Segunda Columna</option><option value="columna3">Tercera Columna</option>';
                    break;
                case '7':
                    valorApuesta.innerHTML += '<option value="dosdocena1">Docenas 1 y 2</option><option value="dosdocena2">Docenas 2 y 3</option>';
                    break;
                case '8':
                    valorApuesta.innerHTML += '<option value="doscolumna1">Columnas 1 y 2</option><option value="doscolumna2">Columnas 2 y 3</option>';
                    break;
                case '9':
                    valorApuesta.innerHTML += '<option value="seisena">Una Seisena</option>';
                    break;
                case '10':
                    valorApuesta.innerHTML += '<option value="cuadro">Cuadro</option>';
                    break;
                case '11':
                    valorApuesta.innerHTML += '<option value="transversal1">Transversal (0, 1, 2)</option><option value="transversal2">Transversal (0, 2, 3)</option>';
                    break;
                case '12':
                    valorApuesta.innerHTML += '<option value="caballo">Horizontal/Vertical</option>';
                    break;
                default:
                    break;
            }
        });

        <?php



        function generarNum()
        {
            return rand(0, 37);
        }



        $numeroGanador = generarNum();
        $color = ($numeroGanador === 0) ? "Verde" : (($numeroGanador % 2 === 0) ? "Negro" : "Rojo");
        $apuestaTipo = $_POST['apuesta'];
        $valorApuesta = $_POST['valorApuesta'];
        $cantidadApostada = $_POST['money'];

        $resultado = "Numero ganador:  $numeroGanador ($color)<br>";
        $ganancia = 0;

        switch ($apuestaTipo) {
            case '1':
                if ($valorApuesta === $color) {
                    $ganancia = $cantidadApostada * 1;
                    $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
                } else {
                    $ganancia = -$cantidadApostada;
                    $resultado .= "Perdiste! Tu perdida es: $ganancia";
                }
                break;
            case '2':
                $resultado .= "Número ganador: $numeroGanador ($color)<br>";
                if ($numeroGanador === 0) {
                    $ganancia = -$cantidadApostada;
                    $resultado .= "Perdiste! Tu pérdida es: $ganancia";
                } else {
                    $parImparGanador = ($numeroGanador % 2 === 0) ? "Par" : "Impar";
                    if ($valorApuesta === strtolower($parImparGanador)) {
                        $ganancia = $cantidadApostada * 1;
                        $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
                    } else {
                        $ganancia = -$cantidadApostada;
                        $resultado .= "Perdiste! Tu pérdida es: $ganancia";
                    }
                }
            case '3':
                if ($numeroGanador === 0) {
                    $ganancia = -$cantidadApostada;
                    $resultado .= "Perdiste! Tu pérdida es: $ganancia";
                } else {
                    if (($numeroGanador >= 1 && $numeroGanador <= 18 && $valorApuesta === 'falta') ||
                        ($numeroGanador >= 19 && $numeroGanador <= 36 && $valorApuesta === 'pasa')
                    ) {
                        $ganancia = $cantidadApostada * 1;
                        $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
                    } else {
                        $ganancia = -$cantidadApostada;
                        $resultado .= "Perdiste! Tu pérdida es: $ganancia";
                    }
                }
                break;

            case '4':
                if ($numeroGanador == $valorApuesta) {
                    $ganancia = $cantidadApostada * 35;
                    $resultado .= "Ganaste! Tu ganancia es: $ganancia";
                } else {
                    $ganancia = -$cantidadApostada;
                    $resultado .= "Perdiste! Tu pérdida es: $ganancia";
                }
                break;
            case '5':
                $docenaGanadora = ($numeroGanador <= 12) ? 'docena1' : (($numeroGanador <= 24) ? 'docena2' : 'docena3');
                if ($valorApuesta === $docenaGanadora) {
                    $ganancia = $cantidadApostada * 2;
                    $resultado .= "Ganaste! Tu ganancia es: $ganancia";
                } else {
                    $ganancia = -$cantidadApostada;
                    $resultado .= "Perdiste! Tu pérdida es: $ganancia";
                }
                break;
            case '6':
                $columna = (in_array($numeroGanador, [1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34])) ? 'columna 1' : (in_array($numeroGanador, [2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35])) ? 'columna2' : 'columna3';
                if ($valorApuesta === $columna) {
                    $ganancia = $cantidadApostada * 2;
                    $resultado .= "Ganaste! Tu ganancia es: $ganancia";
                } else {
                    $ganancia = -$cantidadApostada;
                    $resultado .= "Perdiste! Tu pérdida es: $ganancia";
                }
                break;
            case '7':
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
            case '8':
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
            case '9':
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
            case '10':
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
            case '11':
                if (($valorApuesta === 'transversal1' && in_array($numeroGanador, [0, 1, 2])) || ($valorApuesta === 'transversal2' && in_array($numeroGanador, [0, 2, 3]))) {
                    $ganancia = $cantidadApostada * 11;
                    $resultado .= "Ganaste! Tu ganancia es: $ganancia";
                } else {
                    $ganancia = -$cantidadApostada;
                    $resultado .= "Perdiste! Tu pérdida es: $ganancia";
                }
                break;

            case '12':
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
    </script>
</body>

</html>