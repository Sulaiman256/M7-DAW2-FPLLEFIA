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
               <img src="'.$pelicula['imagen'].'" alt="Pelicula" class="movieImg">
            </div>
            <div class="col md-8">
                <h2>'.$pelicula['nombre'].'</h2>
                <p>'.$pelicula['sinopsis'].'</p>
                <ul class="list-unstyled">
                    <li>Durada : '.$pelicula['duracion'].' </li>
                    <li>Director: '.$pelicula['director'].' </li>
                    <li>Actors: '.$pelicula['reparto'].' </li>
                    <li>Qualificació: '.$pelicula['calificacion'].' </li>
                    <li>Genere: '.$pelicula['genero'].' </li>
                </ul>
                  <div class="showtimes">
          <strong>Horaris:</strong>
          <button class="btn btn-outline-secondary">16:00</button>
          <button class="btn btn-outline-secondary">18:00</button>
          <button class="btn btn-outline-secondary">20:00</button>
          <button class="btn btn-outline-secondary">22:30</button>
        </div>
            </div>
          '
          
          ?>
        </div>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>