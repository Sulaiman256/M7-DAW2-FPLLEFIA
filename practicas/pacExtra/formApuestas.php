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

    <?php
    session_start();

    $saldo = isset($_SESSION['saldo']) ? $_SESSION['saldo'] : 1000;

    function formatMoney($amount)
    {
        return number_format($amount, 2, ',', '.');
    }
    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historial de Apuestas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .badge-win {
                background-color: #28a745;
            }

            .badge-loss {
                background-color: #dc3545;
            }

            .spinning-image {
                width: 200px;
                height: 200px;
                animation: spin 2s linear infinite;

            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }
        </style>



        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Historial de Apuestas</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            var_dump($_SESSION['historial_apostes']);
                            ?>
                            <?php if (isset($_SESSION['historial_apostes']) && count($_SESSION['historial_apostes']) > 0): ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Tipo de Apuesta</th>
                                                <th>Valor de Apuesta</th>
                                                <th>Cantidad Apostada</th>
                                                <th>Resultado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($_SESSION['historial_apostes'] as $aposta): ?>
                                                <tr>
                                                    <td><?php echo isset($aposta['fecha']) ? $aposta['fecha'] : 'No disponible'; ?></td>
                                                    <td><?php echo isset($aposta['apuestaTipo']) ? $aposta['apuestaTipo'] : 'No disponible'; ?></td>
                                                    <td><?php echo isset($aposta['valorApuesta']) ? $aposta['valorApuesta'] : 'No disponible'; ?></td>
                                                    <td><?php echo isset($aposta['cantidadApostada']) ? formatMoney($aposta['cantidadApostada']) : 'No disponible'; ?> €</td>
                                                    <td>
                                                        <?php if (isset($aposta['Ganancia']) && $aposta['Ganancia'] > 0): ?>
                                                            <span class="badge badge-win">+<?php echo formatMoney($aposta['Ganancia']); ?> €</span>
                                                        <?php elseif (isset($aposta['Perdida']) && $aposta['Perdida'] < 0): ?>
                                                            <!-- Mostramos la perdida con signo negativo -->
                                                            <span class="badge badge-loss">-<?php echo formatMoney($aposta['Perdida']); ?> €</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-secondary">Sin resultado</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>


                                    </table>
                                </div>
                            <?php else: ?>
                                <p class="text-muted">No tienes apuestas anteriores.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0">Saldo Actual</h4>
                        </div>
                        <div class="card-body">
                            <?php if (isset($saldo) && $saldo > 0): ?>
                                <h2 class="display-4 text-center"><?php echo formatMoney($saldo); ?> €</h2>
                            <?php else: ?>
                                <h2 class="display-4 text-center">Saldo no disponible</h2>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h2>Formulario de Apuestas</h2>
            <form action="main.php" method="post">
                <div class="mb-3">
                    <label for="apuesta" class="form-label">Tipo de apuesta:</label>
                    <select class="form-select" id="apuesta" name="apuesta">
                        <option value="">Seleccione una opción</option>
                        <option value="Rojo/Negro">Rojo/Negro</option>
                        <option value="Par/Impar">Par/Impar</option>
                        <option value="Pasa/Falta">Pasa/Falta</option>
                        <option value="Pleno">Pleno</option>
                        <option value="Docena">Docena</option>
                        <option value="Columna">Columna</option>
                        <option value="Dos docenas">Dos docenas</option>
                        <option value="Dos columnas">Dos columnas</option>
                        <option value="Seisena">Seisena</option>
                        <option value="Cuadro">Cuadro</option>
                        <option value="Transversal">Transversal</option>
                        <option value="Caballo">Caballo</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="valorApuesta" class="form-label">Valor de apuesta:</label>
                    <select class="form-select" id="valorApuesta" name="valorApuesta">
                        <option value="">Seleccione una opción</option>
                    </select>

                    <div class="mb-3" id="numeroPleno" style="display: none;">
                        <label for="numeroPlenoInput" class="form-label">Número de Pleno (0-36):</label>
                        <input type="number" class="form-control" id="numeroPlenoInput" name="numeroPleno" min="0" max="36" required>
                    </div>

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

            <!-- Aqui hay que hacer un div donde esta imagen este girando -->

            <div class="container d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-md-6">
                        <img src="./images/pngwing.com.png" alt="Rojo/Negro" class="spinning-image img-fluid">
                    </div>
                    <div class="col-md-6">
                        <img src="./images/tablero ruleta.jpg" alt="Par/Impar" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

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
            const sonidoRuleta = new Audio("./sounds/roulette.wav")
            sonidoRuleta.loop = true
            document.addEventListener("DOMContentLoaded", function() {
                sonidoRuleta.play()
            })
            console.log("Ruleta Americana")
            const apuestaSelect = document.querySelector('#apuesta')
            const valorApuesta = document.querySelector('#valorApuesta')
            const numeroPleno = document.querySelector('#numeroPleno')

            apuestaSelect.addEventListener('change', function() {
                valorApuesta.innerHTML = '<option value="">Seleccione una opción</option>';
                numeroPleno.style.display = 'none';
                switch (this.value) {
                    case 'Rojo/Negro':
                        valorApuesta.innerHTML += '<option value="rojo">Rojo</option><option value="negro">Negro</option>';
                        break;
                    case 'Par/Impar':
                        valorApuesta.innerHTML += '<option value="par">Par</option><option value="impar">Impar</option>';
                        break;
                    case 'Pasa/Falta':
                        valorApuesta.innerHTML += '<option value="pasa">Pasa</option><option value="falta">Falta</option>';
                        break;
                    case 'Pleno':
                        valorApuesta.innerHTML += '<option value="pleno">Pleno</option>';
                        numeroPleno.style.display = 'block';
                        break;
                    case 'Docena':
                        valorApuesta.innerHTML += '<option value="docena1">Primera Docena</option><option value="docena2">Segunda Docena</option><option value="docena3">Tercera Docena</option>';
                        break;
                    case 'Columna':
                        valorApuesta.innerHTML += '<option value="columna1">Primera Columna</option><option value="columna2">Segunda Columna</option><option value="columna3">Tercera Columna</option>';
                        break;
                    case 'Dos docenas':
                        valorApuesta.innerHTML += '<option value="dosdocena1">Docenas 1 y 2</option><option value="dosdocena2">Docenas 2 y 3</option>';
                        break;
                    case 'Dos columnas':
                        valorApuesta.innerHTML += '<option value="doscolumna1">Columnas 1 y 2</option><option value="doscolumna2">Columnas 2 y 3</option>';
                        break;
                    case 'Seisena':
                        valorApuesta.innerHTML += '<option value="seisena">Una Seisena</option>';
                        break;
                    case 'Cuadro':
                        valorApuesta.innerHTML += '<option value="cuadro">Cuadro</option>';
                        break;
                    case 'Transversal':
                        valorApuesta.innerHTML += '<option value="transversal1">Transversal (0, 1, 2)</option><option value="transversal2">Transversal (0, 2, 3)</option>';
                        break;
                    case 'Caballo':
                        valorApuesta.innerHTML += '<option value="caballo">Horizontal/Vertical</option>';
                        break;
                    default:
                        break;
                }
            });
        </script>
</body>

</html>