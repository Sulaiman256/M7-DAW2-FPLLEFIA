<?php

include 'pelicules.php';

//var_dump($pelicula);

 if(isset($_GET['id']) && is_numeric($_GET['id'])){
   $id = $_GET['id'];

   foreach($pelicula as $peliculas) {
     if($peliculas['id'] == $id){
       $detallesPelicula = $peliculas;
       break;
     }
   }
 }

 if(!isset($detallesPelicula)){
  echo 'Pelicula no encontrada';
  exit;
 }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .movieImg{
            max-width: 100%;
            height: auto;
        }
         .showtimes {
      margin-top: 20px;
      }
      .showtimes button {
      margin-right: 10px;
    }
        
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
          <?php
          include 'pelicules.php';
          echo '
            <div class="col-md-4">
               <img src="'.$detallesPelicula['imagen'].'" alt="Pelicula" class="movieImg">
            </div>
            <div class="col md-8">
                <h2>'.$detallesPelicula['nombre'].'</h2>
                <p>'.$detallesPelicula['sinopsis'].'</p>
                <ul class="list-unstyled">
                    <li>Durada : '.$detallesPelicula['duracion'].' </li>
                    <li>Director: '.$detallesPelicula['director'].' </li>
                    <li>Actors: '.implode(" ",$detallesPelicula['reparto']).' </li>
                    <li>Qualificació: '.$detallesPelicula['calificacion'].' </li>
                    <li>Genere: '.implode(" ", $detallesPelicula['genero']).' </li>
                </ul>
                  <div class="showtimes">
          <strong>Horaris:</strong>
          <button class="btn btn-outline-secondary">'.$detallesPelicula['horario_array'][0].'</button>
          <button class="btn btn-outline-secondary">'.$detallesPelicula['horario_array'][1].'</button>
          <button class="btn btn-outline-secondary">'.$detallesPelicula['horario_array'][2].'</button>
          <button class="btn btn-outline-secondary">'.$detallesPelicula['horario_array'][3].'</button>
        </div>
            </div>
          '
          
          ?>
        </div>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>