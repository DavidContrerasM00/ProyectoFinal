<?php

include("conexion.php");

$nombre = "Perron";
$app = "Vargas";
$apm = "Vergas";
$correo = "tuculito@gmail.com";
$contra = "1234";

mysqli_query($conexion,"DELETE from clientes WHERE idCliente = 6 ");
mysqli_close($conexion);
?>