<?php

function guardarLibros($libros)
{
    $contenido = '<?php' . PHP_EOL . '$libros = ' . var_export($libros, true) . ';' . PHP_EOL;
    file_put_contents('./array.php', $contenido);
}

?>