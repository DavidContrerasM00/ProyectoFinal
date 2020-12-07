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
    <main class="maincontainer container-fluid">
      <section class="formlogin ">
        <div class="input-group mb-4 logocontainer">
          <a href = "index.php"><i class="fas fa-head-side-mask iconform"></i></a>
          <div>ControlCovid</div>
        </div>
        <div class="mb-3 titlelogreg">Registro</div>
                <form method="POST" action="">
        <div class="input-group mb-5">
          <input type="text" class="form-control col-6 " name="inputRegNombre" placeholder="Nombre" autocomplete="off">
          <input type="text" class="form-control col-6" name="inputApellidos" placeholder="Apellidos" autocomplete="off">
        </div>

        <input type="email" autocomplete="off" class="form-control mb-5" name="inputCorreo" placeholder="Correo Electronico" >

        <div class="input-group mb-3">
          <input type="password" class="form-control col-6 mb-3" name="inputContra" placeholder="Contraseña">
          <input type="password" class="form-control col-6 mb-3" name="inputcContra" placeholder="Confirmar contraseña">
        </div>
          
          <button type="submit" id="btn1" name="btnregistrar" class="btn btn-dark btnsign">Registrate</button>
        </form>
      </section>
    </main>

    <?php 
    include_once "procesos/procesoRegistro.php";
    ?>



		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/82160ed4ec.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src = "js/code.js"></script>
	</body>
</html>