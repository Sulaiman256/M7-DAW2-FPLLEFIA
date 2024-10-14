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
    echo '<h2>El total es: '.$total.'</h2>';

}
calcularTotal($precio, $cantidad, $impuestos);

function generarResumen($texto, $limite){
    $resumen = (strlen($texto) > $limite)? substr($texto, 0, $limite). '...' : $texto;
    echo '<h3>Resumen: '.$resumen.'</h3>';
}
generarResumen('Sulaiman', 5);

function convertirTemperatura($temperatura, $escala){
    if($escala == 'Celsius'){
        $convertido = ($temperatura * 9/5) + 32;
        echo '<h2>La temperatura es: '.$convertido.' Fahrenheit</h2>';
    } elseif($escala == 'Fahrenheit'){
        $convertido = ($temperatura -32 ) * 5/9;
        echo '<h2>La temperatura es: '.$convertido.' Celsius</h2>';
    } else {
        echo '<h2>Escala no válida</h2>';
    }
}
convertirTemperatura(100, 'Fahrenheit');
convertirTemperatura(100, 'Celsius');


function calcularEdad($anioNacimiento){
    $hoy = date('Y');
    $edad = $hoy - $anioNacimiento;
    echo '<h2>Tu edad es: '.$edad.'</h2>';
}
calcularEdad(2002);
function esPar($numero){
    if($numero % 2 == 0){
        return true;
    } else {
        return false;
    }
}

$resultado = esPar(3);
echo '<h2>El número 3 es par: '.($resultado? 'Sí' : 'No').'</h2>';

function generarEnlaceDescarga($archivo){
    $url = './images.jpeg'.basename($archivo);
    echo '<h2>Descargar archivo: <a href="'.$url.'">'.$archivo.'</a></h2>';
}
generarEnlaceDescarga('perro')
?>

