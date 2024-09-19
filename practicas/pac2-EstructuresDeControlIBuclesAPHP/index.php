<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
            padding-top: 200px;
        }
       .container{
        max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding-bottom: 20px;
            display: grid;
        }
        a{
            color: #333;
            text-decoration: none;
            margin-right: 20px;
            padding: 10px;
            border-radius: 4px;
            transition: color 0.3s ease;
        }
        a:hover{
            color: #007bff;
            text-decoration: underline;
        }
        h1{
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
        }
       
    </style>
</head>
<body>

    <?php 
    $date =  date("Y/m/d");
    echo "<h1>Practicas {$date}</h1>";
    ?>
    <div class="container">
        <a href="./ejercicio1.php">Ejercicio 1: Nombres parells</a>
        <a href="./ejercicio2.php">Ejercicio 2: Taules de Multiplicar</a>
        <a href="./ejercicio3.php">Ejercicio 3: Calculadora</a>
        <a href="./extra1.php">Extra 1: Divisors d'un nombre i verificació de nombre primer</a>
        <a href="./extra2.php">Extra 2: L’home del temps </a>
    </div>
</body>
</html>

