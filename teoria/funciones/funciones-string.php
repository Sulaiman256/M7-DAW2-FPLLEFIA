<?php
// longitud de caracter --> strlem()

$cadena = "Hola mundo";
echo strlen($cadena);



// 2. strpos --> strpos

echo strpos($cadena, "mundo");
// 3. replace
echo str_replace("mundo", "Barcelona", $cadena);

// 4. strtolower
echo strtolower($cadena);

// 5. strtoUpper
echo strtoupper($cadena);

// 6.ucfirst
echo ucfirst($cadena);

// 7. ucwords
echo ucwords($cadena);

// 8.trim
$cadena2 = '    leo messi        ';
echo trim($cadena2);

// 9.substr
// obtiene una parte de una cadena
echo substr($cadena2,4,4);

// 10.implode 

$array = ["Hola", "Mundo", "PHP"];
echo implode(" ", $array);

// 11. explode

$frase = "Hola, Mundo, PHP";
$palabras = explode(", ", $frase);
print_r($palabras);

foreach ($array as $a){
    echo $a;
}

// 12. in_array mira si existe una array

$os = ["mac", "win", "Linux"];
if(in_array("mac", $os)){
    echo "Sí, es un sistema operativo de Apple";
}

// 13. array_search

// nusca un valor en un array y devuelve la clave correspondiente. sino esta sera false

$array = ["manzana", "pera", "naranja"];
echo array_search("naranja", $array);

// 14. array_map

$arraymap = [1,2,3,4];
$resultado = array_map(function($numero){
    return $numero * 2;
}, $arraymap);
print_r($resultado);

// 15. array_filter()

$array_filter = [1,2,3,4,5,6,7,8];
$resultado = array_filter($array_filter, function($n){
    return $n % 2 == 0;   
});

?>