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
                <input type="text" class="form-control" name="valorApuesta" id="valorApuesta" required>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      console.log("Ruleta Americana")
      // Ahora debemos hacer si se coge una opcion el valor esta limitado a ese valor
        const apuestaSelect  = document.querySelector('#apuesta')
        const valorApuesta = document.querySelector('#valorApuesta')

        apuestaSelect .addEventListener('change', function (){
          if(this.value === '1') {
            
             valorApuesta.placeholder = "Escribe 'Rojo' o 'Negro'";
          }else{
            valorApuestaInput.placeholder = "";
          }
        })

        function validarRespuesta(){
          const valor = valorApuesta.value.trim().toLowerCase();
          if(apuestaSelect.value === '1' && (valor !== 'rojo' && valor !== 'negro')){
            alert("Por favor, escribe 'Rojo' o 'Negro' para la apuesta de Rojo/Negro.");
            return false;
          }
          return true
        }

    </script>
</body>
</html>
