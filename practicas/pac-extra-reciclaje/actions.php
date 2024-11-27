
<?php

if (isset($_REQUEST['accion'])) {
    $accion = $_REQUEST['accion'];

    function procesarReciclaje($tipo)
    {
        if ($_SESSION['contenedor'][$tipo] < 7) {
            $_SESSION['contenedor'][$tipo]++;
            $_SESSION['contador']++;
            array_shift($_SESSION['basura']);
            $tiposBasura = ['paper', 'glass', 'organic', 'plastic'];
            $_SESSION['basura'][] = $tiposBasura[array_rand($tiposBasura)];
        } else {
            echo "<script>alert('Contenedor de $tipo lleno.');</script>";
        }
    }

    // Verifica si la acción corresponde al primer elemento de basura
    if ($accion === $_SESSION['basura'][0]) {
        $tiposValidos = ['paper', 'plastic', 'organic', 'glass'];
        if (in_array($accion, $tiposValidos)) {
            procesarReciclaje($accion);
        }
    }

    // Acción para vaciar el camión
    if ($accion === "vaciarCamion") {
        $_SESSION['contenedor'] = [
            'paper' => 0,
            'organic' => 0,
            'plastic' => 0,
            'glass' => 0,
        ];
    }
}
?>

