<?php
session_start();



// Si no existe la sesión de basura, inicializarla
if (!isset($_SESSION['basura'])) {
    $_SESSION['basura'] = ['Glass', 'Paper', 'Plastic', 'Organic']; // Cola de residuos


}

// Variables de contenedores
$containers = [
    'Glass' => 0,
    'Paper' => 0,
    'Plastic' => 0,
    'Organic' => 0
];

// Función para actualizar los contenedores
if (isset($_SESSION['containers'])) {
    $containers = $_SESSION['containers'];
}

// Si se ha hecho una acción
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    include 'actions.php'; // Incluir la lógica de actions.php
}

// Residuos procesados (simple contador)
$processedWaste = array_sum($containers);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Basura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <form action="../../practicas/pac-extra-reciclaje/reset.php" method="POST">
            <button type="submit">Reiniciar Joc</button>
        </form>
        <h1 class="text-center">Gestión del reciclaje</h1>

        <!-- Mensaje de contenedores llenos -->
        <?php if (max($containers) >= 7): ?>
            <div class="alert alert-warning text-center">
                ¡Uno o más contenedores están llenos! Por favor vacíalos.
            </div>
        <?php endif; ?>

        <!-- Contador de basura procesada -->
        <button type="button" class="btn p-3 btn-secondary text-white">
            Basura procesada: <span class="badge bg-danger"><?= $processedWaste ?></span>
        </button>
        <hr>

        <!-- Visualización de la cola de basura -->
        <div class="mt-4">
            <h3>¿Qué toca reciclar ahora?</h3>
            <div class="d-flex align-items-center justify-content-center mb-4">
                <!-- Basura actual -->
                <div class="text-center p-3 mx-2 border border-success rounded" style="background-color: #d4edda;">
                    <h4 class="text-success">Ahora: <?= $_SESSION['basura'][0] ?></h4>
                    <img src="./images/<?php echo $_SESSION['basura'][0] ?>.jpg" alt="Imagen de basura" class="img-fluid" style="width: 80px;">
                </div>
                <!-- Cola de basura -->
                <div class="d-flex gap-2">
                    <?php foreach ($_SESSION['basura'] as $residuo): ?>
                        <div class="text-center p-3 mx-2 border rounded" style="background-color: #f8f9fa;">
                            <h6><?= $residuo ?></h6>
                            <!-- <img src="imagenbasuraquetoca.jpg" alt="Imagen de basura" class="img-fluid" style="width: 50px;"> -->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Botones de contenedores -->
        <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="index.php?accion=Glass" class="btn btn-success">
                Glass
            </a>
            <a href="index.php?accion=Organic" class="btn btn-secondary">
                Organic
            </a>
            <a href="index.php?accion=Paper" class="btn btn-primary">
                Paper
            </a>
            <a href="index.php?accion=Plastic" class="btn btn-warning">
                Plastic
            </a>
            <a href="index.php?accion=vaciarCamion" class="btn btn-danger">
                <img src="./images/camion.png" alt="Vaciar Camión" class="img-fluid" style="width: 50px;"> Vaciar Camión
            </a>
        </div>

        <!-- Estado de los contenedores -->
        <h2 class="mt-5">Estado de los Contenedores</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($containers as $type => $count): ?>
                    <tr>
                        <td><?= $type ?></td>
                        <td><?= $count ?> / 7</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include 'components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>