<?php


// funcion para cargar testimonios en el panel de administrador

function readTestimonios($mysqli) {
    $resultTestimonios = $mysqli->query("SELECT * FROM testimony");
    $testimonios = $resultTestimonios->fetch_all(MYSQLI_ASSOC);
    return $testimonios;
}

// funcion para eliminar testimonios

function deleteTestimonial($mysqli, $id) {
    $stmt = $mysqli->prepare("DELETE FROM testimony WHERE id = ?");
    $stmt->bind_param('i', $id);
    if(!$stmt->execute()) {
        die('Error en la ejecución de la consulta: ' . $stmt->error);
        exit;
    }
    $stmt->close();
    $mysqli->close();
}

// funcion para agregar testimonios

function addTestimonial($mysqli, $name, $surname, $testimony, $image, $date) {
   $stmt = $mysqli->prepare(
        "INSERT INTO testimony (name, surname, testimony, image, date) 
        VALUES (?, ?, ?, ?, ?)"
    );

    // 5. comprobar que la preparación tuvo éxito
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
        exit;
    }

    // 6. enlazar los parámetros
    $stmt->bind_param('sssss', $name, $surname, $testimony, $image, $date);

    // 7. ejecutar la consulta
       if ($stmt->execute()) {
        echo 'Testimonio eliminado correctamente';
    } else {
        echo 'Error al eliminar el testimonio';
    }

    // 8. cerrar la consulta
    $stmt->close();
}

// funcion para editar testimonios

function editTestimonial($mysqli, $id, $name, $surname, $testimony, $image, $date) {
    $stmt = $mysqli->prepare(
        "UPDATE testimony SET name = ?, surname = ?, testimony = ?, image = ?, date = ? WHERE id = ?"
    );

    // 5. comprobar que la preparación tuvo éxito
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
        exit;
    }

    // 6. enlazar los parámetros
    $stmt->bind_param('sssssi', $name, $surname, $testimony, $image, $date, $id);

    // 7. ejecutar la consulta
    if ($stmt->execute()) {
        echo 'Testimonio editado correctamente';
    } else {
        echo 'Error al editar el testimonio';
    }

    // 8. cerrar la consulta
    $stmt->close();
}

?>