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
    <script src = "js/code.js"></script></body>
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
                <li class="nav-item">
                  <a class="nav-link" href="userReport.php">Reportar caso</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Mi cuenta</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="db/logout.php">Cerrar sesion</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
    
    <?php
    if(isset($_SESSION['idUsuario'])){
      require("db/conexion.php");
      $idUsuario = $_SESSION['idUsuario'];
      $nombre = $_SESSION['nombreUsuario'];
      $apellidos = $_SESSION['apellidosUsuario'];
      $email = $_SESSION['emailUsuario'];

    }
    else
    header("Location: db/logout.php");
    ?>
    <main class="container">
      <h4 class=" display-4 text-white text-center mt-5 pt-5 pb-2 col-12">Modificar usuario</h4>
      <div class = "row text-center">
      <div class="col-12 justify-content-center">
        <div class="container justify-content-center">
            <div class="mt-2">
              <div class="text-white font-weight-light lead mr-1">Nombre:</div>
              <div class="text-white font-weight-light lead"><?php echo $nombre ?></div>
            </div>
            <div class="mt-4">
              <div class="text-white font-weight-light lead mr-1">Apellido:</div>
              <div class="text-white font-weight-light lead"><?php echo $apellidos ?></div>
           </div>
            <div class="mt-4">
              <div class="text-white font-weight-light lead mr-1">Email:</div>
              <div class="text-white font-weight-light lead"><?php echo $email ?></div>
            </div>
            <div class="mt-4 mb-3">
              <div class="text-white font-weight-light lead mr-1">Password:</div>
              <div class="text-white font-weight-light lead">*********</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="row d-flex justify-content-center">
          <form class="col-md-6" method="POST" action="">
            <div class="form-group ">
                <label class="text-white font-weight-light lead" for="Nombre">Nombre</label>
                <input type="text" name="inputModNombre" class="form-control" placeholder="Nombre" >
              </div>
              <div class="form-group">
                <label class="text-white font-weight-light lead" for="Apellido">Apellido</label>
                <input type="text" name="inputModApellido" class="form-control" placeholder="Apellido">
              </div>
              <div class="form-group">
                 <label class="text-white font-weight-light lead" for="Email">Email</label>
                 <input type="text" name="inputModEmail" class="form-control" placeholder="Email">
               </div>
              <div class="form-group">
                 <label class="text-white font-weight-light lead" for="Password">Password</label>
                 <input type="text" name="inputModPassword" class="form-control mb-5" placeholder="Password">
              </div>
              <div class="text-center">
               <button name="btnActualizar" class="btn btn-info font-weight-light lead pl-5 pr-5 mb-5">Actualizar</button>
              </div>
          </form>
        </div>
      </div>
      </div>
    </main>
    <?php 

    if(isset($_POST['inputModNombre'])||isset($_POST['inputModApellido'])||isset($_POST['inputModEmail'])||isset($_POST['inputModPassword']))
    {
      require("db/conexion.php");
      if(isset($_POST['inputModNombre']))
      {
        $ModNombre = $_POST['inputModNombre'];
        echo $ModNombre;
        if($ModNombre!='')
        {
          $queryN = $conexion->query("UPDATE usuario SET nombreUsuario = '$ModNombre' WHERE idUsuario = '$idUsuario'");

        }
       
      }

      if(isset($_POST['inputModApellido']))
      {
        $ModApellido = $_POST['inputModApellido'];
        echo $ModApellido;
        if($ModApellido!='')
        {
          $queryA = $conexion->query("UPDATE usuario SET apellidosUsuario = '$ModApellido' WHERE idUsuario = '$idUsuario'");
      
        }
      }

      if(isset($_POST['inputModEmail']))
      {
        $ModEmail = $_POST['inputModEmail'];
        echo $ModEmail;
        if($ModEmail!='')
        {
          $queryE = $conexion->query("UPDATE usuario SET emailUsuario = '$ModEmail' WHERE idUsuario = '$idUsuario'");
        }
      }
      
      if(isset($_POST['inputModPassword']))
      {
        $ModPass = $_POST['inputModPassword'];
        echo $ModPass;
        if($ModPass!='')
        {
          $queryP = $conexion->query("UPDATE usuario SET passUsuario = '$ModPass' WHERE idUsuario = '$idUsuario'");
   
        }
      }

    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/82160ed4ec.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src = "js/code.js"></script>
</html>