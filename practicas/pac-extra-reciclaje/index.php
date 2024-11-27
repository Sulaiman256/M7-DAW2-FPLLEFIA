<?php
session_start();
include 'actions.php';

// Inicializar sesiones si no existen
if (!isset($_SESSION['basura'])) {
    $_SESSION['basura'] = array_fill(0, 5, null);
    $tiposBasura = ['paper', 'glass', 'organic', 'plastic'];
    foreach ($_SESSION['basura'] as &$item) {
        $item = $tiposBasura[array_rand($tiposBasura)];
    }
}

$_SESSION['contador'] = $_SESSION['contador'] ?? 0;
$_SESSION['contenedor'] = $_SESSION['contenedor'] ?? [
    'paper' => 0,
    'organic' => 0,
    'plastic' => 0,
    'glass' => 0,
];

include_once("./components/navbar.php");
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
        <h1 class="text-center">Gestión del reciclaje</h1>
        <button type="button" class="btn p-3 btn-secondary text-white">
            Basura procesada: <span class="badge bg-danger"><?= $_SESSION['contador']; ?></span>
        </button>
        <hr>

        <div class="mt-4">
            <h3>¿Qué toca reciclar ahora?</h3>
            <div class="d-flex align-items-center justify-content-center mb-4">
                <div class="text-center p-3 mx-2 border border-success rounded bg-light">
                    <h4 class="text-success">Ahora: <?= $_SESSION['basura'][0] ?></h4>
                    <img src="./images/<?= $_SESSION['basura'][0]; ?>.jpg" alt="" class="img-fluid" style="width: 80px;">
                </div>

                <div class="d-flex gap-2">
                    <?php foreach (array_slice($_SESSION['basura'], 1) as $basura): ?>
                        <div class="text-center p-3 mx-2 border rounded bg-light">
                            <h6><?= $basura; ?></h6>
                            <img src="./images/<?= $basura; ?>.jpg" alt="" class="img-fluid" style="width: 50px;">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="d-flex justify-content-center flex-wrap gap-3">
                <?php
                $acciones = ['glass' => 'success', 'organic' => 'secondary', 'paper' => 'primary', 'plastic' => 'warning'];
                foreach ($acciones as $accion => $color): ?>
                    <a href="index.php?accion=<?= $accion ?>" class="btn btn-<?= $color; ?>">
                        <?= ucfirst($accion); ?>
                    </a>
                <?php endforeach; ?>
                <a href="index.php?accion=vaciarCamion" class="btn btn-danger">
                    <img src="images/camion.png" alt="Vaciar Camión" class="img-fluid" style="width: 50px;"> Vaciar Camión
                </a>
            </div>

            <h2 class="mt-5">Estado de los Contenedores</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['contenedor'] as $tipo => $cantidad): ?>
                        <tr>
                            <td><?= ucfirst($tipo); ?></td>
                            <td><?= $cantidad; ?> / 7</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>