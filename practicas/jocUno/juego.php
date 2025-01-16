<?php

include_once './baraja.class.php';

$baraja = new Baraja();
$baraja->crea_baraja();
$baraja->mezcla();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    foreach ($baraja->getConjuntoCartas() as $carta) {
             $carta->pinta_carta_link();
         }
        //  foreach ($baraja->getConjuntoCartas() as $carta) {
        //      $carta->pinta_carta_girada();
        //  }
    
    ?>
       
</body>
</html>