<?php
// Inicia la sessió
session_start();

// Elimina totes les variables de sessió
session_unset();

// Destrueix la sessió
session_destroy();

// Redirigeix a l'usuari a index.php
header('Location: index.php');
exit();
