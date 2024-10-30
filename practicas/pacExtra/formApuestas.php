<!DOCTYPE html>
<html lang="es">
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
    <div class="container">
        <h2>Formulario de Apuestas</h2>
        <form action="" method="post">
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
        const apuestaSelect  = document.querySelector('#apuesta')
        const valorApuesta = document.querySelector('#valorApuesta')

        apuestaSelect.addEventListener('change', function(){
            valorApuesta.innerHTML = '<option value="">Seleccione una opción</option>'
            switch(this.value){
                case '1':
                    valorApuesta.innerHTML += '<option value="rojo">Rojo</option><option value="negro">Negro</option>'
                    break;
                case '2':
                    valorApuesta.innerHTML += '<option value="par">Par</option><option value="impar">Impar</option>'
                    break;
                case '3':
                    valorApuesta.innerHTML += '<option value="pasa">Pasa</option><option value="falta">Falta</option>'
                    break;
                case '4':
                    valorApuesta.innerHTML += '<option value="pleno">Pleno</option>'
                    break;
                case '5':
                    valorApuesta.innerHTML += '<option value="docena">Una Docena</option><option value="docena">Dos Docena</option><option value="docena">Tres Docena</option>'
                    break;
                case '6':
                    valorApuesta.innerHTML += '<option value="columna">Una Columna</option><option value="columna">Dos Columna</option><option value="columna">Tres Columna</option>'
                    break;
                case '7':
                    valorApuesta.innerHTML += '<option value="dosdocena">Primera Dos Docenas</option> <option value="dosdocena">Segunda Dos Docenas</option> '
                    break;
                case '8':
                    valorApuesta.innerHTML += '<option value="doscolumna">Primera Dos Columnas</option> <option value="doscolumna">Segunda Dos Columnas</option> '
                    break;
                case '9':
                    valorApuesta.innerHTML += '<option value="seisena">Una Seisena</option>'
                case '10':
                        valorApuesta.innerHTML += '<option value="cuadro">Cuadro</option>'
                    break;
                    case '11':
                        valorApuesta.innerHTML += '<option value="transversal">Primera Transversal(0,1,2)</option> <option value="transversal(0,2,3)">Segunda Transversal</option>'
                        break;
                        case '12':
                            valorApuesta.innerHTML += '<option value="caballo">Horizontal</option><option value="caballo">Vertical</option>'
                            break;
                           

                default: 
                break;
            }
        })

        <?php
        
        function generarNum(){
            return rand(0, 36);
        }

        $numeroGanador = generarNum();
        $color = ($numeroGanador === 0) ? "Verde" : (($numeroGanador % 2 === 0) ? "Negro" : "Rojo");
        $apuestaTipo = $_POST['apuesta'];
        $valorApuesta = $_POST['valorApuesta'];
        $cantidadApostada = $_POST['money'];

        $resultado = "Numero ganador:  $numeroGanador ($color)<br>";
        $ganancia = 0;

        switch ($apuestaTipo){
            case '1' :
                if($valorApuesta === $color){
                    $ganancia = $cantidadApostada * 2;
                    $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
                }else{
                    $ganancia = -$cantidadApostada;
                    $resultado.= "Perdiste! Tu perdida es: $ganancia";
                }
                break;
            case '2' : 
            $resultado .= "Número ganador: $numeroGanador ($color)<br>";
        if ($numeroGanador === 0) {
            $ganancia = -$cantidadApostada;
            $resultado .= "Perdiste! Tu pérdida es: $ganancia";
        } else {
            $parImparGanador = ($numeroGanador % 2 === 0) ? "Par" : "Impar";
            if ($valorApuesta === strtolower($parImparGanador)) {
                $ganancia = $cantidadApostada * 2;
                $resultado .= "¡Ganaste! Tu ganancia es: $ganancia";
            } else {
                $ganancia = -$cantidadApostada;
                $resultado .= "Perdiste! Tu pérdida es: $ganancia";
            }
        }
    
        }
        
        ?>

       
    

        // function validarRespuesta(){
        //   const valor = valorApuesta.value.trim().toLowerCase();
        //   if(apuestaSelect.value === '1' && (valor !== 'rojo' && valor !== 'negro')){
        //     alert("Por favor, escribe 'Rojo' o 'Negro' para la apuesta de Rojo/Negro.");
        //     return false;
        //   }
        //   return true
        // }

        // validarRespuesta()

    </script>
</body>
</html>
