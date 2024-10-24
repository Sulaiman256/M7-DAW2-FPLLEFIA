


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
<form action="bienvenida.php" method="post">
  <div class="form-group">
    <label for="nombre">Nombre: </label>
    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Introduce tu nombre">
  </div>
  <div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Introduce tus apellidos">
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
