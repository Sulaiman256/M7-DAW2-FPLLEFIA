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
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h1 class="mb-4"><?php echo $detallesPelicula['nombre']; ?></h1>
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                    <iframe width="560" height="315" 
                        src="https://www.youtube.com/embed/<?php echo $detallesPelicula['url_trailer']; ?>?autoplay=1&mute=1" 
                        title="<?php echo $detallesPelicula['nombre']; ?>" 
                        frameborder="0" 
                        allow="autoplay; encrypted-media" 
                        allowfullscreen>
                    </iframe>
                </div>
                <a href="index.php" class="btn btn-primary">Volver a la Cartelera</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
