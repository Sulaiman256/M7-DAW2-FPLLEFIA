<?php

function suma($a,$b){
    return ($a + $b);
}

function multiply($b, $c){
    return ($b * $c);
}

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

?>