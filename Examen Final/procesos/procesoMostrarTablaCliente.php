<?php
require("db/conexion.php");
$idUsuario = $_SESSION['idUsuario'];
$result = $conexion->query("SELECT * FROM reportes WHERE idReportador = '$idUsuario'");
$arrayDatos = array();
echo"\n";
while($row = mysqli_fetch_array($result))
{
  $arrayDatos[] = $row; 
}
echo ' <div class="table-responsive pl-5 pr-5">
      <table class="table">
        <thead>
           <tr>
              <th>Municipio</th>
              <th>Ciudad</th>
              <th>Dirección</th>
              <th>Fecha</th>
              <th>Estatus</th>
              <th>Acciones</th>
            </tr>
        </thead>';
foreach($arrayDatos as $v1)
{ 
  echo '<tbody>';
  echo '<tr>';
  echo '<td>' . $v1[5] . '</td>';
  echo '<td>' . $v1[6] . '</td>';
  echo '<td>' . $v1[7] . '</td>';
  echo '<td>' . $v1[8] . '</td>';
  echo '<td>' . $v1[9] . '</td>';
  echo '<td>'
   . '<button id = btnVer value = ',$v1[0],' type="button" data-target="#myModal" data-toggle="modal" class="btn-sm btn-success font-weight-light lead mr-1 btnver" name="btnVer"><i class="fas fa-eye"></i></button>'
   . '<button id = ',$v1[0],' type="button" class="btn-sm btn-primary font-weight-light lead mr-1" name="btnModificar"><i class="far fa-edit"></i></button>' 
   . '<button type="button" id = ',$v1[0],' class="btn-sm btn-danger font-weight-light lead" name="btnOcultar"><i class="fas fa-eye-slash"></i></button>' . '</td>';
  echo '</tr>';
  echo '</tbody>';
}
echo '</table>';
echo '</div>';
?>