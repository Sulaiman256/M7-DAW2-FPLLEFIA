<?php
include_once '../config/config.php';

function readUsers($mysqli, $email){
$result = $mysqli->query("SELECT * FROM users WHERE email = '$email'");
return $result;
}

?>