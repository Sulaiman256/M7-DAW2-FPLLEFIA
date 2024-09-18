<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3:Nombre aleatori parell o senar </title>
    <style>
        body{
            font-family:Arial, Helvetica, sans-serif ;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h1{
            font-size: 2rem;
            color: #444;
            margin-bottom: 20px;
            text-transform: uppercase;
            text-align: center;
        }
        

        .par{
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }

        .impar{
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }

    </style>
</head>
<body>
    <h1>Ejercicio 3:Nombre aleatori parell o senar</h1>
    <?php
    $numeroAleatorio = rand(0,100);
    if($numeroAleatorio % 2 == 0){
        echo "<div class='par'>El numero {$numeroAleatorio} es par </div>";
    }else{
        echo "<div class='impar'>El numero {$numeroAleatorio} es impar </div>";
    }
    ?>
   
</body>
</html>