<?php

session_start();

include_once './array.php';
include_once './functions.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin') {
    header('Location: home.php');
    exit();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: home.php');
    exit();
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id !== null) {
    $encontrado = false;
    foreach ($libros as $libro) {
        if ($libro['id'] == $id) {
            $encontrado = true;
            break;
        }
    }

    if ($encontrado) {
        $libros = array_filter($libros, function ($libro) use ($id) {
            return $libro['id'] != $id;
        });

        guardarLibros($libros);

        // Aquí podrías agregar una notificación de éxito o mensaje
        $_SESSION['message'] = "Libro eliminado con éxito.";
    } else {
        $_SESSION['message'] = "El libro no fue encontrado.";
    }
}

// No redirigir, solo mostrar el mensaje y quedarte en home.php
header('Location: home.php');
exit();
