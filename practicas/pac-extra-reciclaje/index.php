<?php
session_start();

if (!isset($_SESSION['basura'])) {
    $_SESSION['basura'] = ['botella de plástico', 'periódico', 'manzana', 'botella de vidrio'];
    $_SESSION['contenedores'] = [
        'Plastic' => 0,
        'Paper' => 0,
        'Organic' => 0,
        'Glass' => 0
    ];
}

$residu_actual = $_SESSION['basura'][0] ?? null;
$contenedores = $_SESSION['contenedores'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciclaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Sistema de Reciclaje</h1>

        <!-- Cua de residus -->
        <div class="mt-4">
            <h3>Residu Actual</h3>
            <div class="alert alert-primary text-center" role="alert">
                <?= $residu_actual ? htmlspecialchars($residu_actual) : "No hay más residuos." ?>
            </div>

            <h4>Cua de residus</h4>
            <div class="d-flex gap-3">
                <?php foreach (array_slice($_SESSION['basura'], 1) as $residu): ?>
                    <div class="p-3 border bg-light"><?= htmlspecialchars($residu) ?></div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Botons per reciclar -->
        <?php if ($residu_actual): ?>
            <div class="mt-4">
                <h4>Selecciona el contenedor:</h4>
                <div class="d-flex gap-3">
                    <form method="post" action="../../practicas/pac-extra-reciclaje/actions.php">
                        <input type="hidden" name="accion" value="Plastic">
                        <button type="submit" class="btn btn-primary">Plástico</button>
                    </form>
                    <form method="post" action="../../practicas/pac-extra-reciclaje/actions.php">
                        <input type="hidden" name="accion" value="Paper">
                        <button type="submit" class="btn btn-secondary">Papel</button>
                    </form>
                    <form method="post" action="../../practicas/pac-extra-reciclaje/actions.php">
                        <input type="hidden" name="accion" value="Organic">
                        <button type="submit" class="btn btn-success">Orgánico</button>
                    </form>
                    <form method="post" action="../../practicas/pac-extra-reciclaje/actions.php">
                        <input type="hidden" name="accion" value="Glass">
                        <button type="submit" class="btn btn-warning">Vidrio</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <!-- Estat dels contenidors -->
        <div class="mt-4">
            <h4>Estado de los contenedores</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Contenedor</th>
                        <th>Elementos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contenedores as $nombre => $cantidad): ?>
                        <tr>
                            <td><?= htmlspecialchars($nombre) ?></td>
                            <td><?= htmlspecialchars($cantidad) ?>/7</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>