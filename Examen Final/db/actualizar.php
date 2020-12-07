<?php

include("conexion.php");

$nombre = "Perron";
$app = "Vargas";
$apm = "Vergas";
$correo = "tuculito@gmail.com";
$contra = "1234";

$newuser = "cola";

mysqli_query($conexion,"UPDATE clientes SET nombreCliente = '$newuser' WHERE idCliente = 1");
mysqli_close($conexion);
?>