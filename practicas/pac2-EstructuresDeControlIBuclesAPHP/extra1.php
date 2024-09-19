<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra 1 Divisors d'un nombre i verificació de nombre primer</title>
    <style>
        h1{
            text-align: center;
            font-size: 2em;
            color: #333;
        }
        h5{
            text-align: center;
            color: #444;
            font-size: 1.2em;
        }
        .containerContenido{
            width: 80%;
            margin: 0 auto;
            border: 1px solid black;
        }
        div{
            margin: 10px;
            padding: 10px;
            text-align: center;
        }
        #EsPrimo{
            background-color: #bad80a;
            border: 1px solid black;
            color: white;
            border-radius: 2px;
        }

        #NoEsPrimo{
            background-color: red;
            border: 1px solid black;
            color: white;
            border-radius: 2px;
        }

        .divContainer{
            display: flex !important;
            justify-content: center;
        }
        .divDivisores{
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
            text-align: center;
        }




    </style>
</head>
<body>
    <h1>
    Extra 1 Divisors d'un nombre i verificació de nombre primer  
    </h1>

    <div class="containerContenido">
        <?php
        $numeroAleatorio = rand(1, 100);
       echo "<h3>Nombre generat: $numeroAleatorio </h3>"; 
       echo "<h5>Divisors de $numeroAleatorio:</h5>";
        MostrarDivisores($numeroAleatorio);
        SiEsPrimo($numeroAleatorio);
        ?>
    </div>
</body>
</html>

<?php

$numero;

function SiEsPrimo($numero) {
    if ($numero<2 ){
        return false;
    }
    for ($i =2; $i < $numero; $i++) {
        if($numero % $i == 0){
            echo "<div id='NoEsPrimo'>$numero NO es un primo</div>";
            return false;
        }
    }
    echo "<div id='EsPrimo'>$numero ES un primo</div>";
    return true;
}

  

function MostrarDivisores($numero) {
    for ($i=1; $i < $numero; $i++) {
        if($numero % $i == 0){
            echo "<div class='divContainer'>
            <div class='divDivisores'>$i</div>
            </div>";
        }
    }
}


?>