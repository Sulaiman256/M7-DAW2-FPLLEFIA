<?php
if (headers_sent()) {
    echo "Las cabeceras ya han sido enviadas";
    exit;
}
session_start();

if(!isset($_SESSION['db'])){
    $_SESSION['db'] = array();
}
?>
