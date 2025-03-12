<?php
include_once '../config/config.php';

function readComments($mysqli, $id_news) {
    $sql = "
    SELECT 
        c.comment, c.date, u.avatar, u.name
    FROM 
        comentarios c
    LEFT JOIN 
        users u ON c.id_user_id = u.id
    WHERE 
        c.id_news_id = $id_news
    ";
    $result = $mysqli->query($sql);
    
    if ($result) {
        return $result; // Devuelve el resultado solo si es válido
    } else {
        return null; // Si la consulta falla, devuelve null
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

?>