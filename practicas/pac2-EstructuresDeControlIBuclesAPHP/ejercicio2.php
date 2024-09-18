<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2: Taules de Multiplicar</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container{
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .divTable{
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            width: 200px;
        }
        .divTable h3{
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .divTable p {
            text-align: center;
        }
        h1{
            font-size: 2rem;
            color: #444;
            margin-bottom: 20px;
            text-transform: uppercase;
            text-align: center;
        }
        

    </style>
</head>
<body>
    <h1>Ejercicio 2: Taules de Multiplicar</h1>
    <div class="container">
    <?php
    
    for($i=1; $i<12; $i++){
        echo "<div class='divTable'>";
        echo "<h3>Tabla del ".$i."</h3>";
        for($j=1;$j<10;$j++){
            echo "<p>$i x $j = " . ($i * $j) . "</p>";
        }
        echo "</div>";
    }
    ?>
    </div>
  
    
</body>
</html>