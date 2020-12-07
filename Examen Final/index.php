<?php
session_start();
if(isset($_SESSION['emailCliente']))
{
  header("Location: userMain.php");
}
?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hue.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>ControlCovid</title>
  </head>

  <body class="dementor">
    <main class="maincontainer container-fluid">

      <section class="formlogin ">
      <form action="" method="POST">
        <div class="input-group mb-5 logocontainer rotate-center">
          <i class="fas fa-head-side-mask iconform"></i>
          <div>ControlCovid</div>
        </div>

        <div class="mb-3 titlelogreg">Iniciar sesion</div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
          </div>
          <input type="email" class="form-control" name="inputLogCorreo" placeholder="Correo">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-lock"></i></span>
          </div>
          <input type="password" class="form-control" name="inputLogContra" placeholder="Contraseña">
        </div>

        <div class = "mb-3">
          <a class="aregist" href="register.php">No tienes cuenta? Haz click aqui para registrarte</a>
        </div>
          <button type = "submit" id ="btnLog" class="btn btn-dark btnsign colorwhite" name="">Inicia sesion</button>
        </form>
      </section>
    </main>
    <?php
    include_once "procesos/procesoLogin.php";
    ?>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/82160ed4ec.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src = "js/code.js"></script>
  </body>
</html>