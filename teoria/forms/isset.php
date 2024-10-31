<?php


$numero = 23;
unset($numero);

if(is_null($numero)){
    echo 'Es nulo';
}else {
    echo 'No es nulo';
}


if(isset($numero)){
    echo 'Está definida';
}

if(!isset($numero)){
    echo 'No esta definida';
}

if(empty($numero)){
    echo 'Esta vacia';
}


?>