<?php
require("db/conexion.php");
$q=$_POST['reporte'];
echo $q;
$consulta = $conexion->query($q);
header("Location: userMain.php")
?>