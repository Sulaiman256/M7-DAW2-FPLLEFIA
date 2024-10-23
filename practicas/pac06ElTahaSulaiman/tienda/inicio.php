<?php
 
    $nombre = ($_POST['nombre']);
    $telefono =($_POST['telefono']);
    $url = ($_POST['foto']);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Mercadona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid">
    <div class="container text-center my-5">
        <h1>Bienvenido a Mercadona</h1>
        <p>Por favor, completa el siguiente formulario para continuar tu compra.</p> 
    </div>

    <div class="container">
        <form method="post" action="index.php">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre: </label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
            </div>
            
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono: </label>
                <input type="tel" name="telefono" class="form-control" id="telefono" required>
            
            
            <div class="mb-3">
                <label for="foto" class="form-label">URL foto: </label>
                <input type="text" name="foto" class="form-control" id="foto" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
