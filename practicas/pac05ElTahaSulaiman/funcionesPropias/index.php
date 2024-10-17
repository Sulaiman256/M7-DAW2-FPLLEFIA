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
    $url = './images.jpeg';
    echo '<h2>Descargar archivo: <a href="'.$url.'">'.$archivo.'</a></h2>';
}
    generarEnlaceDescarga('Descargar');

function calcularDescuento($precioOriginal, $descuento){
    $precioDescuento = $precioOriginal - ($precioOriginal * $descuento / 100);
    echo '<h2>Precio con descuento: '.$precioDescuento.'</h2>';
}

calcularDescuento(80, 10);

function convertirHorasMinutos($horas){
    $minutos = $horas * 60;
    echo '<h2>Horas convertidas a minutos: '.$minutos.'</h2>';

}
convertirHorasMinutos(2);

// Parte 2

function convertirMayusculas($texto){
    $mayusculas = strtoupper($texto);
    echo '<h2>Texto en mayúsculas: '.$mayusculas.'</h2>';
}

convertirMayusculas('Sulaiman');

function contarPalabras($texto){
    $palabras = $texto;
    $contarPalabras = str_word_count($palabras);
    echo '<h2>Número de palabras: '.$contarPalabras.'</h2>';
}
contarPalabras('Sulaiman El Taha Santos ');

function obtenerSubcadena($texto, $inicio, $longitud){
    $subcadena = substr($texto, $inicio, $longitud);
    echo '<h2>Subcadena: '.$subcadena.'</h2>';
}

obtenerSubcadena('Sulaiman El Taha Santos', 0, 16);

function reemplazarPalabras ($texto, $buscar,$reemplazar){
    $reemplazarPalabras = str_replace($buscar, $reemplazar, $texto);
    echo '<h2>Texto reemplazado: '.$reemplazarPalabras.'</h2>';

}

reemplazarPalabras('Hola, ¿cómo estás?', 'Hola', 'Sulaiman');

function invertirTexto($texto){
    $invertirTexto = strrev($texto);
    echo '<h2>Texto invertido: '.$invertirTexto.'</h2>';
}

invertirTexto('Sulaiman El Taha Santos');

function compararStrings($cadena1, $cadena2){
    $compararStrings = strcmp($cadena1, $cadena2);
    if($compararStrings === 0){
        echo '<h2>Las cadenas son iguales</h2>';
    } else {
        echo '<h2>Las cadenas no son iguales</h2>';
    }
}

compararStrings('Sulaiman', 'Sulaiman');

function eliminarEspacios($texto){
    $eliminarEspacios = trim($texto);
    echo '<h2>Texto sin espacios: '.$eliminarEspacios.'</h2>';
}
eliminarEspacios('   Sulaiman El Taha Santos   ');

function contarOcurrencias($texto, $palabras){
    $contarOcurrencias = substr_count($texto, $palabras);
    echo '<h2>Número de ocurrencias de la palabra: '.$contarOcurrencias.'</h2>';
}
contarOcurrencias('Elden Ring Mola', 'Ring');

function dividirPalabras($texto){
    $dividirPalabras = explode(' ', $texto);
    foreach($dividirPalabras as $palabra){
        echo '<h2>Palabra: '.$palabra.'</h2>';
    }
}
dividirPalabras('Elden Ring Mola');

// Funciones de Arrays

function sumarArray($numeros){
    $suma = array_sum($numeros);
    echo '<h2>Suma de los números: '.$suma.'</h2>';
}

sumarArray([1, 2, 3, 4, 5]);

function ordenarArrayAlfabetico($nombres){
    sort($nombres);
    foreach($nombres as $nombre){
        echo '<h2>Nombre: '.$nombre.'</h2>';
    }
}

ordenarArrayAlfabetico(['Sulaiman', 'El Taha', 'Santos']);

function filtrarMayores($numeros, $valor){
    $filtrarMayores = array_filter($numeros, function($numero) use ($valor){
        return $numero > $valor;
    });
    echo '<h2>Números mayores a '.$valor.': '.implode(', ', $filtrarMayores).'</h2>';
}
filtrarMayores([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 5);

function buscarEnArray($array, $valor){
    $buscarEnArray = in_array($valor, $array);
    echo '<h2>El valor '.$valor.' está en el array: '.($buscarEnArray? 'Sí' : 'No').'</h2>';
}

buscarEnArray([1, 2, 3, 4, 5], 3);

function contarElementos($array){
    $contarElementos = count($array);
    echo '<h2>Número de elementos en el array: '.$contarElementos.'</h2>';
}

contarElementos([1, 2, 3, 4, 5]);

function obtenerMaximo($numeros){
    $maximo = max($numeros);
    echo '<h2>Número máximo: '.$maximo.'</h2>';
}

obtenerMaximo([1, 2, 3, 4, 5]);

function obtenerMinimo($numeros){
    $minimo = min($numeros);
    echo '<h2>Número mínimo: '.$minimo.'</h2>';
}

obtenerMinimo([1, 2, 3, 4, 5]);

function eliminarDuplicados($array){
    $eliminarDuplicados = array_unique($array);
    echo '<h2>Array sin duplicados: '.implode(', ', $eliminarDuplicados).'</h2>';
}

eliminarDuplicados([1, 2, 3, 4, 5, 2, 3, 4, 5]);

function combinarArrays($array1, $array2){
    $combinarArrays = array_merge($array1, $array2);
    echo '<h2>Array combinados: '.implode(', ', $combinarArrays).'</h2>';
}

combinarArrays([1, 2, 3], [4, 5, 6]);

function dividirArray($array, $tamanio){
    $dividirArray = array_chunk($array, $tamanio);
    foreach($dividirArray as $chunk){
        echo '<h2>Chunk: '.implode(', ', $chunk).'</h2>';
    }
}
dividirArray([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 3);
?>



