<?php
require("db/conexion.php");

$q=$_POST['descripcion'];
if($q!="")
{
    $conexion->query($q);
}

$q=$_POST['municipio'];
if($q!="")
{
    $consulta = $conexion->query($q);
}

$q=$_POST['ciudad'];
if($q!="")
{
    
    $consulta = $conexion->query($q);
}

$q=$_POST['direccion'];
if($q!="")
{
    $consulta = $conexion->query($q);
}



header("Location: userMain.php")
?>