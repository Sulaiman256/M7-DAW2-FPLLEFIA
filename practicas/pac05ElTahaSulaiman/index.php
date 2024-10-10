<?php

function generarSaludo($nombre){
    $nombre = "Sulaiman";
    echo '
    
    <h1>Hola' . $nombre . '  </h1>
    ';
}

generarSaludo($nombre);


function calcularTotal($precio, $cantidad, $impuestos){
    $impuestos = 21;
    $precio = 15;
    $cantidad = 2;
    $total = $precio * $cantidad * ($impuestos);
    return $total;

}
calcularTotal($precio, $cantidad, $impuestos);

function generarResumen($texto, $limite){
    // hay que hacer un resumen acortado con ternarios
    $resumen = (strlen($texto) > $limite)? substr($texto, 0, $limite). '...' : $texto;
    return $resumen;
}




?>