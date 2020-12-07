<?php
include("conexion.php");

$nombre = "Perron";
$app = "Vargas";
$apm = "Vergas";
$correo = "tuculito@gmail.com";
$contra = "1234";

mysqli_query($conexion,"INSERT INTO clientes (idCliente, nombreCliente, ApPCliente, ApMCliente,
emailCliente, passCliente)VALUES('0','$nombre','$app','$apm','$correo','$contra')");
mysqli_close($conexion);
?>