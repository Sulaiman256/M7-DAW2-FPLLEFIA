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
    <title><?php echo $detallesPelicula['nombre'];?></title>
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
    .star{
      font-size: 2rem;
      color: #ffcc00;
    }
    .star-empty {
      font-size: 2rem;
      color: #ccc;

    }

    .carousel-item img {
      height: 300px;
      object-fit: cover;
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
          <div class="containerValoracion mt-5">
          <h4>Valoracion: </h4>
          <div class="star-rating">';
        $valoracion = intval($detallesPelicula['valoracion']); 
        for($i=1; $i<=5; $i++){
          if($i<=$valoracion){
          echo '<i class="star">&#9733</i>'; 
          }else{
            //  estrellas pero vacias
            echo '<i class="star-empty">&#9734</i>';
          }
        }
         ?>
         </div>
         </div>
      
                        
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php 
    $active = true;
    foreach($detallesPelicula['imagenesCarrusel'] as $imagen){
      if($active){
          echo '<div class="carousel-item active">';
          $active = false;
      }else {
        echo '<div class="carousel-item">';
      }
      echo '<img src="'.$imagen.'" class="d-block w-100" alt="...">';
      echo '</div>';
    }
    
    ?>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
                    </div>
                </div>
          
        </div>
        
    </div>
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>