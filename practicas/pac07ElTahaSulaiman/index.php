
<?php

$casas_info = [ 
"Gryffindor" => [ 
"background_color" => "#740001", 
"text_color" => "#FFD700", 
"welcome_message" => "Coratge, valor i determinació. Benvingut a Gryffindor!", 
"message_background" => "#D3A625", 
"image" => "" 
], 
"Hufflepuff" => [ 
"background_color" => "#FFDB00", 
"text_color" => "#60605B", 
"welcome_message" => "Lleialtat, paciència i treball dur. Benvingut a Hufflepuff!", 
"message_background" => "#EEE117", 
"image" => "" 
], 
"Ravenclaw" => [ 
"background_color" => "#0E1A40", 
"text_color" => "#946B2D", 
"welcome_message" => "Intel·ligència, creativitat i saviesa. Benvingut a Ravenclaw!", 
"message_background" => "#5D5D5D", 
"image" => "" 
], 
"Slytherin" => [ 
"background_color" => "#1A472A", 
"text_color" => "#AAAAAA", 
"welcome_message" => "Ambició, astúcia i lideratge. Benvingut a Slytherin!", 
"message_background" => "#5D5D5D", 
"image" => "" 
] 
]; 


?>


<!DOCTYPE html> 
<html lang="ca"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Sombrero Seleccionador de Hogwarts</title> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> </head> 
<body> 
<div class="container"> 
<h1 class="text-center mb-4">Benvinguts a Hogwarts</h1> 
<form method="post" action="bienvenida.php">
  <div class="form-group">
    <label for="nombre">Nombre: </label>
    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Introduce tu nombre">
  </div>
  <div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" placeholder="Introduce tus apellidos">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div> 
</body> 
</html> 
