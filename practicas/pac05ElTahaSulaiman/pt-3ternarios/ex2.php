<?php

$stock = 0;

$mensaje = $stock > 0 ? '<p style="background-color: green;">Producto disponible</p>' : '<p style="background-color: red;">Producto agotado</p>';

echo $mensaje;
?>