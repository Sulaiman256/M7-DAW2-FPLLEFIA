<?php
$host = '@mysql-sulaiman.alwaysdata.net:3306';
$dbname = 'sulaiman_crud_uf3';
$username = 'sulaiman_';
$password = 'APTItude01';

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}
?>
