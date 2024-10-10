<?php


$nota = 75;
$estatus = ($nota >=90) ? "A" : (($nota >= 80) ? "B" : (($nota >= 70) ? "C" : "REPRESENTACION"));
echo "Tu estatus es: ". $estatus
?>