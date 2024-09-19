<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra 1 Divisors d'un nombre i verificació de nombre primer</title>
    <style>
        body{
            font-family: arrayial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
            margin-bottom: 100px;
        }
        h1{
            text-align: center;
            font-size: 1.3em;
            color: #333;
            margin-bottom: 100px;
        }
        h3,h5{
            text-align: center;
            color: #555;
        }
        .containerContenido{
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .divContainer{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }
        .divDivisores{
            border: 1px solid #ddd;
            padding: 10px 20px;
            margin: 5px;
            background-color: #fafafa;
            border-radius: 4px;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.1);
            font-weight: bold;
        }
        #EsPrimo{
            background-color: #4caf50;
            border: 1px solid #388e3c;
            color: white;
            border-radius: 4px;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
        }
        #NoEsPrimo{
            background-color: #f44336;
            border: 1px solid #d32f2f;
            color: white;
            border-radius: 4px;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
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
            echo "<div id='NoEsPrimo'>$numero NO es primo</div>";
            return false;
        }
    }
    echo "<div id='EsPrimo'>$numero ES un primo</div>";
    return true;
}

  

function MostrarDivisores($numero) {
    echo "<div class='divContainer'>";
    for ($i=1; $i < $numero; $i++) {
        if($numero % $i == 0){
            echo "<div class='divDivisores'>$i</div>";
        }
    }
    echo "</div>";
}


?>