<?php

function agregarLibro($titulo, $autor, $imagen, $descripcion)
{
    include './array.php';

    if (!isset($libros) || !is_array($libros)) {
        $libros = [];
    }

    $nuevoLibro = [
        'id' => count($libros) + 1,
        'titulo' => $titulo,
        'autor' => $autor,
        'imagen' => $imagen,
        'descripcion' => $descripcion,
    ];

    $libros[] = $nuevoLibro;

    guardarLibros($libros);

    return true;
}

function editarLibro($id, $titulo, $autor, $imagen, $descripcion)
{
    include './array.php';

    $encontrado = false;
    foreach ($libros as &$libro) {
        if ($libro['id'] == $id) {
            $libro['titulo'] = $titulo;
            $libro['autor'] = $autor;
            $libro['imagen'] = $imagen;
            $libro['descripcion'] = $descripcion;
            $encontrado = true;
            break;
        }
    }

    if ($encontrado) {
        guardarLibros($libros);
    }

    return $encontrado;
}

function guardarLibros($libros)
{
    $contenido = '<?php' . PHP_EOL . '$libros = ' . var_export($libros, true) . ';' . PHP_EOL;
    file_put_contents('./array.php', $contenido);
}
