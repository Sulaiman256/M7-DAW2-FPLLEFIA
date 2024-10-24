<?php



function generarTablaProductos($productos){
    echo '<table class="table table-striped table-bordered">';
    echo '<tr><th>Nombre</th><th>Precio</th><th>Disponibilidad</th></tr>';
    foreach ($productos as $producto){
        echo '<tr>';
        echo '<td>'.ucfirst($producto['nombre']).'</td>';
        echo '<td>$' . number_format($producto['precio'], 2) . '</td>';
        echo '<td  style="background-color: ' . ($producto['disponibilidad'] ? '' : 'red') . ';">'.($producto['disponibilidad']? 'En stock' : 'Agotado').'</td>';
        echo '</tr>';
    }
    echo '</table>';
}

generarTablaProductos($bd);

function muestraInfoContacto($nombre, $telefono, $foto){
    echo '<div class="row">';
    echo '<div class="col-md-4"><img src="'.$foto.'" class="img-thumbnail"></div>';
    echo '<div class="col-md-8">';
    echo '<h2>Información de contacto</h2>';
    echo '<p>Nombre: '.$nombre.'</p>';
    echo '<p>Teléfono: '.$telefono.'</p>';
    echo '</div>';
    echo '</div>';
}

muestraInfoContacto($nombre, $telefono, $foto);
?>