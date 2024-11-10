<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $name = $_GET['name'];
    $cognoms = $_GET['cognoms'];
    $nivell = $_GET['nivell'];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pac08 - Escape Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">Escape Room Registration</h3>
                        <form action="index.php" method="get">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom: </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre">
                            </div>
                            <div class="mb-3">
                                <label for="cognoms" class="form-label">Cognoms: </label>
                                <input type="text" class="form-control" id="cognoms" name="cognoms" placeholder="Ingresa tus apellidos">
                            </div>
                            <div class="mb-3">
                                <label for="nivell" class="form-label">Nivell: </label>
                                <select name="nivell" id="nivell" class="form-select">
                                    <option value="">Selecciona un nivell</option>
                                    <option value="1">Facil</option>
                                    <option value="2">Mig</option>
                                    <option value="3">Dificil</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>