<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frutas favoritas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
<div class="d-flex justify-content-end">
    <!-- Enlace que cambia el color a rojo -->
    <a href="ejercicio2.php?color=rojo" class="btn btn-danger" style="width: 10px; height: 10px;"></a>
    <?php
        if (isset($_GET['color']) && $_GET['color'] === 'rojo') {
            echo '
            <style>
            body {
                background-color: red;
            }
            </style>
            ';
        }
    ?>

    <a href="ejercicio2.php?color=azul" class="btn btn-primary" style="width: 10px; height:10px" >
    <?php
        if (isset($_GET['color']) && $_GET['color'] === 'azul') {
            echo '
            <style>
            body {
                background-color: blue;
            }
            </style>
            ';
        }
    ?>
    </a>

    <a href="ejercicio2.php?color=verde" class="btn btn-success" style="width: 10px; height:10px" >
    <?php
        if (isset($_GET['color']) && $_GET['color'] === 'verde') {
            echo '
            <style>
            body {
                background-color: green;
            }
            </style>
            ';
        }
    ?>
    </a>
   
    <a href="ejercicio2.php?color=amarillo" class="btn btn-warning" style="width: 10px; height:10px" >
    <?php
        if (isset($_GET['color']) && $_GET['color'] === 'amarillo') {
            echo '
            <style>
            body {
                background-color: yellow;
            }
            </style>
            ';
        }
    ?>
    </a>
    <a href="ejercicio2.php?color=rosa" class="btn btn-primary" style="width: 10px; height:10px;  background-color: #ff69b4;" >
    <?php
        if (isset($_GET['color']) && $_GET['color'] === 'rosa') {
            echo '
            <style>
            body {
                background-color: pink;
            }
            </style>
            ';
        }
    ?>
    </a>
    <a href="ejercicio2.php?color=naranja" class="btn btn-primary" style="width: 10px; height:10px;background-color: #ffa500; " >
    <?php
        if (isset($_GET['color']) && $_GET['color'] === 'naranja') {
            echo '
            <style>
            body {
                background-color: orange;
            }
            </style>
            ';
        }
    ?>
    </a>
       
</div>


    <div class="container mt-5">
        <h1 class="text-center">Selecciona tu fruta favorita</h1>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr >
                    <th>Fruta</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
             
                     <?php
                // Vamos a mirar si ha llegado el get y si lo hace pintaremos el td de color verde
                if(isset($_GET['fruta']) && $_GET['fruta'] ==='manzana'){
                    echo '
                    <tr style="background-color: green;">
                    <td>Manzana</td>
                    <td>  ✔ Seleccionada</td>
                     <td><a class="btn btn-primary" href="ejercicio2.php?fruta=manzana">Seleccionar</a>
               
                </td>
                </tr>

                    ';
                } else {
                    echo '
                    <tr class="table-danger">
                    <td>Manzana</td>
                    <td>✖ No seleccionada</td>
                    <td><a class="btn btn-primary" href="ejercicio2.php?fruta=manzana">Seleccionar</a>
               
                </td>
                </tr>
                    
                    ';
                }
                
                ?>
                    
                    
              
                        <?php
                // Vamos a mirar si ha llegado el get y si lo hace pintaremos el td de color verde
                if(isset($_GET['fruta']) && $_GET['fruta'] ==='platano'){
                    echo '
                    <tr style="background-color: green;">
                    <td>Platano</td>
                    <td>  ✔ Seleccionada</td>
                     <td><a class="btn btn-primary" href="ejercicio2.php?fruta=platano">Seleccionar</a>
               
                </td>
                </tr>

                    ';
                } else {
                    echo '
                    <tr class="table-danger">
                    <td>Platano</td>
                    <td>✖ No seleccionada</td>
                    <td><a class="btn btn-primary" href="ejercicio2.php?fruta=platano">Seleccionar</a>
               
                </td>
                </tr>
                    
                    ';
                }
                
                ?>
                </tr>
                
                         <?php
                // Vamos a mirar si ha llegado el get y si lo hace pintaremos el td de color verde
                if(isset($_GET['fruta']) && $_GET['fruta'] ==='naranja'){
                    echo '
                    <tr style="background-color: green;">
                    <td>Naranja</td>
                    <td>  ✔ Seleccionada</td>
                     <td><a class="btn btn-primary" href="ejercicio2.php?fruta=naranja">Seleccionar</a>
               
                </td>
                </tr>

                    ';
                } else {
                    echo '
                    <tr class="table-danger">
                    <td>Naranja</td>
                    <td>✖ No seleccionada</td>
                    <td><a class="btn btn-primary" href="ejercicio2.php?fruta=naranja">Seleccionar</a>
               
                </td>
                </tr>
                    
                    ';
                }
                
                ?>
                </tr>
                
                           <?php
                // Vamos a mirar si ha llegado el get y si lo hace pintaremos el td de color verde
                if(isset($_GET['fruta']) && $_GET['fruta'] ==='fresa'){
                    echo '
                    <tr style="background-color: green;">
                    <td>Fresa</td>
                    <td>  ✔ Seleccionada</td>
                     <td><a class="btn btn-primary" href="ejercicio2.php?fruta=fresa">Seleccionar</a>
               
                </td>
                </tr>

                    ';
                } else {
                    echo '
                    <tr class="table-danger">
                    <td>Fresa</td>
                    <td>✖ No seleccionada</td>
                    <td><a class="btn btn-primary" href="ejercicio2.php?fruta=fresa">Seleccionar</a>
               
                </td>
                </tr>
                    
                    ';
                }
                
                ?>
                </tr>
               
                           <?php
                // Vamos a mirar si ha llegado el get y si lo hace pintaremos el td de color verde
                if(isset($_GET['fruta']) && $_GET['fruta'] ==='kiwi'){
                    echo '
                    <tr style="background-color: green;">
                    <td>Kiwi</td>
                    <td>  ✔ Seleccionada</td>
                     <td><a class="btn btn-primary" href="ejercicio2.php?fruta=kiwi">Seleccionar</a>
               
                </td>
                </tr>

                    ';
                } else {
                    echo '
                    <tr class="table-danger">
                    <td>Kiwi</td>
                    <td>✖ No seleccionada</td>
                    <td><a class="btn btn-primary" href="ejercicio2.php?fruta=kiwi">Seleccionar</a>
               
                </td>
                </tr>
                    
                    ';
                }
                
                ?>
                   
                </tr>
            </tbody>
        </table>

        <!-- Mostrar tarjeta de la fruta seleccionada (actualmente estatica, siempre hay una manzana) -->
        <div class="card mt-4 w-25 shadow-lg">

                 <?php
                // Vamos a mirar si ha llegado el get y si lo hace pintaremos el td de color verde
                if(isset($_GET['fruta']) && $_GET['fruta'] ==='manzana'){
                    echo '
                    <img src="https://static.vecteezy.com/system/resources/previews/023/858/853/non_2x/ai-genrative-green-apple-free-png.png" class="card-img-top img-fluid" alt="Manzana">
<div class="card-body bg-warning">
                <h5 class="card-title">Manzana</h5>
                <p class="card-text">¡Esta es tu fruta favorita!</p>
            </div>
                    
                    ';
                }

                   if(isset($_GET['fruta']) && $_GET['fruta'] ==='platano'){
                    echo '
                    <img src="https://img.freepik.com/vector-gratis/diseno-etiqueta-platano-aislado_1308-77292.jpg?size=626&ext=jpg&ga=GA1.1.2008272138.1727308800&semt=ais_hybrid" class="card-img-top img-fluid" alt="Platano">
<div class="card-body bg-warning">
                <h5 class="card-title">Platano</h5>
                <p class="card-text">¡Esta es tu fruta favorita!</p>
            </div>
                    
                    ';
                }
                    if(isset($_GET['fruta']) && $_GET['fruta'] ==='naranja'){
                    echo '
                    <img src="https://www.ammarket.com/wp-content/uploads/2021/12/NARANJA_MESA_AMMARKET.COM_2.jpg" class="card-img-top img-fluid" alt="Naranja">
<div class="card-body bg-warning">
                <h5 class="card-title">Naranja</h5>
                <p class="card-text">¡Esta es tu fruta favorita!</p>
            </div>
                    
                    ';
                }
                    if(isset($_GET['fruta']) && $_GET['fruta'] ==='fresa'){
                    echo '
                    <img src="https://i.pinimg.com/736x/c7/47/d8/c747d85dabdb4240362c65587947bfe1.jpg" class="card-img-top img-fluid" alt="Fresa">
<div class="card-body bg-warning">
                <h5 class="card-title">Fresa</h5>
                <p class="card-text">¡Esta es tu fruta favorita!</p>
            </div>
                    
                    ';
                }
                    if(isset($_GET['fruta']) && $_GET['fruta'] ==='kiwi'){
                    echo '
                    <img src="https://frutasbollo.es/wp-content/uploads/2021/12/kiwi.png" class="card-img-top img-fluid" alt="Kiwi">
<div class="card-body bg-warning">
                <h5 class="card-title">Kiwi</h5>
                <p class="card-text">¡Esta es tu fruta favorita!</p>
            </div>
                    
                    ';
                }
            
            ?>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php



?>