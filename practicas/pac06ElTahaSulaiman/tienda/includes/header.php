
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
    <title>Componente Header</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid d-flex justify-content-between">
            <!-- Logo -->
            <a class="navbar-brand" href="index.php">
                <img src="./data/assets/logo-mercadona.jpg" alt="logo-mercadona" class="img-fluid" style="height: 50px;">
            </a>

            <div>
                <!-- Mensajes + avatar foto perfil -->
                <div class="d-flex align-items-center">
                    <h2 class="me-3 mb-0 px-4">Bienvenido <?php echo $nombre?>!</h2>
                    <img src="<?php echo $url; ?>" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;">
                </div>
            </div>

            <!-- Navegación -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
