<?php
session_start();
require_once '../../config.php';

if(!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

$result = $mysqli->query("SELECT * FROM users WHERE id = $id");
$user = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];
    $data_register = $_POST['data_registre'];
    $surname = $_POST['surname'];
    $avatar = $_POST['avatar'];
    $age = $_POST['age'];
    $job = $_POST['job'];

    $stmt = $mysqli->prepare("UPDATE users SET name = ?, email = ?, password = ?, rol = ?, data_registre = ?, surname = ?, avatar = ?, age = ?, job = ? WHERE id = ?");
    $stmt->bind_param('sssssssssi', $name, $email, $password, $rol, $data_register, $surname, $avatar, $age, $job, $id);

    if($stmt->execute()) {
        header('Location: ../adminPanel.php');
        exit;
    } else {
        echo 'Error al editar el usuario';
    }


    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit testimonial</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
        <input type="text" name="name" value="<?php echo $user['name'] ?>">
        <input type="text" name="email" value="<?php echo $user['email'] ?>">
        <input type="text" name="password" value="<?php echo $user['password'] ?>">
        <input type="text" name="rol" value="<?php echo $user['rol'] ?>">
        <input type="text" name="data_registre" value="<?php echo $user['data_registre'] ?>">
        <input type="text" name="surname" value="<?php echo $user['surname'] ?>">
        <input type="text" name="avatar" value="<?php echo $user['avatar'] ?>">
        <input type="text" name="age" value="<?php echo $user['age'] ?>">
        <input type="text" name="job" value="<?php echo $user['job'] ?>">
        <button type="submit">Editar</button>
    </form>
</body>
</html>