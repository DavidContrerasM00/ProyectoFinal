<?php 
    if(isset($_POST['inputLogCorreo']))
    {
        require("db/conexion.php");
        $correo = $_POST['inputLogCorreo'];
        $contra = $_POST['inputLogContra'];

        $validar = $conexion->query("SELECT * FROM usuario WHERE emailUsuario = '$correo' AND passUsuario = '$contra'");

        $contar = $validar->num_rows;

        if($contar == 1)
        {
          $admin = $conexion->query("SELECT idUsuario, adminUsuario, nombreUsuario, apellidosUsuario FROM usuario WHERE emailUsuario = '$correo' AND passUsuario = '$contra'");
          $arrayDatos = array();
          
          while($row = mysqli_fetch_array($admin)){
            $arrayDatos[] = $row;
          }
          
          $_SESSION['idUsuario']= $arrayDatos[0][0];
          $_SESSION['adminUsuario'] = $arrayDatos[0][1];
          $_SESSION['nombreUsuario']= $arrayDatos[0][2];
          $_SESSION['apellidosUsuario']= $arrayDatos[0][3];
          $_SESSION['emailUsuario']=$correo;

          if($arrayDatos[0][1]==0)
          header("Location: userMain.php");
          if($arrayDatos[0][1]==1)
          header("Location: adminMain.php");
        }
        else{
        }
    }?>