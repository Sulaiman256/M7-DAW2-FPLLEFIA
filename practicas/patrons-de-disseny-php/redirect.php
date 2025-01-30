<?php
if (isset($_POST['option'])) {
    $url = $_POST['option'];  // Obtén el valor de la opción seleccionada
    header("Location: " . $url);  // Redirige a la página correspondiente
    exit();
}
