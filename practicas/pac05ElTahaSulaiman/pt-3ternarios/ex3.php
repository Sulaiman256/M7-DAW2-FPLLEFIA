
<?php

$nombre = 'Sulaiman';

$valorPorDefecto = !empty($nombre) ? $nombre : 'Ingrese su nombre';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $valorPorDefecto ?>">
    </form>
</body>
</html>