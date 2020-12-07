<?php

$conexion = new mysqli('localhost','root','youtube00','covidbcs');

if($conexion->connect_errno){
    die("La conexion ha fallado" . $conexion->connect_errno);
}
?>