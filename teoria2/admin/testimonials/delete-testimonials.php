<?php
session_start();
require_once '../../config.php';

// 1. verificar que el rol sea administrador
if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tienes permisos para acceder a esta página';
    exit;
}

// 2. Eliminar el testimonio
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $mysqli->prepare("DELETE FROM testimony WHERE id = ?");
    
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo 'Testimonio eliminado correctamente';
    } else {
        echo 'Error al eliminar el testimonio';
    }

    // Cerramos la consulta y la conexión
    $stmt->close();
    $mysqli->close();
}
?>
