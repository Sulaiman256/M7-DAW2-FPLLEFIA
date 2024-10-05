<?php
include 'pelicules.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    foreach ($pelicula as $peliculas) {
        if ($peliculas['id'] == $id) {
            $detallesPelicula = $peliculas;
            break;
        }
    }
}

if (!isset($detallesPelicula)) {
    echo 'Pelicula no encontrada';
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulaiman Cartellera Cinema - Tráiler de <?php echo $detallesPelicula['nombre']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background: linear-gradient(135deg, #2b5876, #4e4376);
            color: #fff;
            font-family: Arial, sans-serif;
        }
        h1{
            font-size: 3rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .container {
            margin-top: 5%;
        }
        .embed-responsive iframe {
            border-radius: 10px;
        }
        .btn-custom{
            background-color: #ff4081;
            border-color: #ff4081;
            font-size: 1.2rem;
            padding: 10px 20px;
            transition: 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #e91e63;
            border-color: #e91e63;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h1 class="mb-4"><?php echo $detallesPelicula['nombre']; ?></h1>
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <iframe width="100%" height="500" 
                        src="<?php echo $detallesPelicula['url_trailer']; ?>?autoplay=1&mute=1" 
                        title="<?php echo $detallesPelicula['nombre']; ?>" 
                        frameborder="0" 
                        allow="autoplay; encrypted-media" 
                        allowfullscreen>
                    </iframe>
                </div>
                <a href="index.php" class="btn btn-custom">Volver a la Cartelera</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
