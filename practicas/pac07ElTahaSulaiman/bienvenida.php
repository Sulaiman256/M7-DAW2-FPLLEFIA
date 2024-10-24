
<?php

  
    
    include_once 'casas.php';

    $clavesCasas = array_keys($casas_info);
    $casaElegida = $clavesCasas[array_rand($clavesCasas)];
    $casaInfo = $casas_info[$casaElegida];

    $nombre = ($_POST['nombre']);
    $apellidos =($_POST['apellidos']);



?>



<!DOCTYPE html> 
<html lang="ca"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Benvingut a la teva casa de Hogwarts</title> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> 
<style>
    body {
            background-color: <?php echo $casaInfo['background_color']?>;
            font-family: 'Arial', sans-serif;
        }
        h1 {
            margin-top: 50px;
            font-size: 2.5rem;
            color: #333;
        }
        .welcome-message {
            margin-top: 40px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .welcome-message:hover {
            transform: scale(1.05);
        }
        img {
            max-width: 100px;
            margin-top: 15px;
            border-radius: 10px;
        }
</style>
</head> 
<body> 
<div class="container text-center"> 
<h1>¡Benvingut a <?php echo $casaElegida  ?></h1>


<div class="welcome-message mt-4"> 
     <p style="background-color: <?php echo ($casaInfo['message_background']); ?>; color: <?php echo ($casaInfo['text_color']); ?>; padding: 10px; border-radius: 10px;">
           <?php echo ($nombre . ' ' . $apellidos); ?> <?php echo '<img src="' . $casaInfo['image'] . '" alt="">' ?>
        </p>
</div> 
</div> 
</body> 
</html> 
