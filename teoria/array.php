<?php

// 1.1 Array Escalar Indexado
$lista = array("Sulaiman", "Brian", "Dani");

//var_dump($lista);
//print_r($lista);

// DESDE LA VERSION 5.4 PHP

$lista2 = ["Didac", "Kevin", "David", 87, 32, 78.23, true];


echo $lista2[1];

$lista2[2] = "Yehor";

var_dump($lista2);

$colores = ['rojo', 'azul', 'amarillo'];

$colores[] = 'negro';

print_r($colores);
// 1.2 Array Asociativo

$tutor = [
    'nombre' => 'Sulaiman',
    'apellido' => 'ElTaha',
    'edad' => 22,
    'direccion' => 'Calle la pau ',
    'telefono' => '599429419'
];

echo $tutor['apellido'] = 'El Taha Santos';


//  Recorrer Array con un FOR
$numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9];

for ($i = 0; $i < count($numeros); $i++) {
    echo $numeros[$i]. '<br>';
}
// RECORRER ARRAY CON FOREACH
foreach ($numeros as $num) {
    echo ($num *2) .'<br>';
}

// recorrer una array asociativo
$ciudades = [
    'Barcelona' => 'España',
    'Madrid' => 'España',
    'London' => 'Inglaterra',
    'Paris' => 'Francia'
];

foreach ($ciudades as $ciudad => $pais) {
    echo "La ciudad $ciudad es de $pais <br>";
}


// foreach en arrays multidimensionales
// crea un array multidimensional de estudiantes y sus notas, y recorre cada estudiante con foreach para mostrar sus datos

$estudiantes = [
    ['nombre' => 'Juan', 'apellido' => 'Perez', 'notas' => 9, 'genero' => 'M'],
    ['nombre' => 'Ana', 'apellido' => 'Garcia', 'notas' => 8, 'genero' => 'F'],
    ['nombre' => 'Pedro', 'apellido' => 'Martinez', 'notas' => 1, 'genero' => 'M'  ],
];

foreach ($estudiantes as $estudiante) {
    if($estudiante['genero']== 'M'){
        echo "El estudiante: {$estudiante['nombre']} Apellido: {$estudiante['apellido']} Nota: {$estudiante["notas"]} Genero: {$estudiante['genero']} 
        <br>";
    }else{
        echo "La estudiante: {$estudiante['nombre']} Apellido: {$estudiante['apellido']} Nota: {$estudiante["notas"]} Genero: {$estudiante['genero']} 
        <br>";
    }
   
}
?>