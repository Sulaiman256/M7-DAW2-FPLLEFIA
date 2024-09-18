

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1: Nombres parells</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1{
            font-size: 2rem;
            color: #444;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .container{
            display: grid;
            grid-template-columns: repeat(4,1fr);

            justify-content: center;
            
        }
        div{
            padding: 10px;
            margin: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
            font-size: 1.2rem;
        }
       
    </style>
</head>
<body>
    <h1>Nombres Parells</h1>
    <div class="container">
    <?php 
   for($i=50;$i<=500;$i += 2){
    echo "<div>{$i}</div>";
   }
   ?>
    </div>
  
</body>
</html>
