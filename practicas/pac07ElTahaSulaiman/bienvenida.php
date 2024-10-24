
<?php

    $nombre = ($_POST['nombre']);
    $apellidos =($_POST['apellidos']);
    
    include_once './index.php';

    $clavesCasas = array_keys($casas_info);
    $casaElegida = $clavesCasas[array_rand($clavesCasas)];
    $casaInfo = $casas_info[$casaElegida];



?>



<!DOCTYPE html> 
<html lang="ca"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Benvingut a la teva casa de Hogwarts</title> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> </head> 
<body> 
<div class="container text-center"> 
<h1>¡Benvingut a <?php $casaInfo?></h1> 
<div class="welcome-message mt-4"> 
     <p style="background-color: <?php echo ($casaInfo['message_background']); ?>; color: <?php echo ($casaInfo['text_color']); ?>; padding: 10px; border-radius: 10px;">
            <?php echo ($casaInfo['welcome_message']); ?>
        </p>
</div> 
</div> 
</body> 
</html> 
