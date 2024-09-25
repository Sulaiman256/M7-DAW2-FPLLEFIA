<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Esta es la pagina 2</h1>
    <?php
    if(isset($_GET['nom']) && isset($_GET['edad'])){
        $nom = $_GET['nom'];
        $edad = $_GET['edad'];
        echo "El nombre es: {$nom} y la edad es: {$edad}";
    }
    
    ?>
</body>
</html>