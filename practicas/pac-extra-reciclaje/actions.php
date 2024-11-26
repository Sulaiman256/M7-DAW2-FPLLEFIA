<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    if (!isset($_SESSION['basura']) || empty($_SESSION['basura'])) {
        header('Location: index.php');
        exit;
    }

    $residu_actual = array_shift($_SESSION['basura']); // Eliminamos el residuo actual

    // Actualizamos el contenedor correspondiente
    if (isset($_SESSION['contenedores'][$accion])) {
        $_SESSION['contenedores'][$accion]++;
    }

    // Redirigimos de nuevo al index
    header('Location: index.php');
    exit;
}
