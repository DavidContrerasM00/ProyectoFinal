<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hue.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/82160ed4ec.js" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
  </head>
  <body class="dementor">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#"><i class="fas fa-head-side-mask mr-3"></i>ControlCovid</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="userMain.php">Inicio</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Reportar caso</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="userAcc.php">Mi cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="db/logout.php">Cerrar sesion</a>
                  </li>
              </ul>
            </div>
          </nav>
    </header>
    <main class="maincontainer container-fluid">
      <div class="container ">
        <h4 class=" display-4 text-white text-center mt-5 pt-5 pb-2">Crear reporte</h4>
            <div class="row d-flex justify-content-center">
              <form class="col-md-9" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group ">
                  <label class="text-white font-weight-light lead" for="Descripcion">Descripción</label>
                  <input type="text" class="form-control" name="inputDescripcion" placeholder="Descripción" id="desc">
                </div>
                <div class="form-group">
                  <label class="text-white font-weight-light lead" for="Municipio">Municipio</label>
                  <input type="text" class="form-control" name="inputMunicipio" placeholder="Municipio" id="muni">
                </div>
                <div class="form-group">
                  <label class="text-white font-weight-light lead" for="Ciudad">Ciudad</label>
                  <input type="text" class="form-control" name="inputCiudad" placeholder="Ciudad" id="city">
                </div>
                <div class="form-group">
                  <label class="text-white font-weight-light lead" for="Ciudad">Dirección</label>
                  <input type="text" class="form-control mb-5" name="inputDireccion" placeholder="Dirección" id="dir">
                </div>
                <div class="text-center">
                <button type="submit" name="btnRegistrar" class="btn btn-primary font-weight-light lead pl-5 pr-5">Registrar</button>
              </div>
              </form>
          </div>
      </div>
    </main>
<?php

if(!empty($_POST['inputDescripcion']))
{
  require("db/conexion.php");
  $descripcion = $_POST['inputDescripcion'];
  $municipio = $_POST['inputMunicipio'];
  $ciudad = $_POST['inputCiudad'];
  $direccion = $_POST['inputDireccion'];
  $idUsuario = $_SESSION['idUsuario'];
  $apUsuario = $_SESSION['apellidosUsuario'];
  $nomUsuario = $_SESSION['nombreUsuario'];


  $ins = "INSERT INTO reportes (idReporte, idReportador, nombreReportador, apellidosReportador, descReporte, municipioReporte, ciudadReporte, direccionReporte, fechaReporte, estatusReporte, hiddenReporte)
  VALUES ('0', '$idUsuario', '$nomUsuario', '$apUsuario', '$descripcion', '$municipio', '$ciudad', '$direccion', NOW(), 'Pendiente', '0')";
  $query = mysqli_query($conexion, $ins);
  if($query){
    header("Location: userMain.php");
  }
}
?>  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/82160ed4ec.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>