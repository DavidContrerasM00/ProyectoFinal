<?php
session_start();
require("db/conexion.php");
$idUsuario = $_SESSION['idUsuario'];
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
  <body class="unicorn">
  
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#"><i class="fas fa-head-side-mask mr-3"></i>ControlCovid Modo Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="db/logout.php">Cerrar sesion</a>
                </li>
                <li class="nav-item">
                <span class="ml-5">Realiza tu busqueda por Nombre, Municipio, Ciudad y Estatus</span>
                <input class="form-control ml-4" id="myInput" type="text" placeholder="Buscar..">
                </li>
              </ul>
            </div>
          </nav>
          <form id="reportes" name="sampleForm" method="post" action="procReporte.php">
          <input type="hidden" name="reporte" id="inputOcultar" value="">
    </header>
    <main id="mainUser" class="maincontainer container-fluid mt-5 pt-5">

    <?php
    if(isset($_SESSION['idUsuario'])){
      require("db/conexion.php");
      $nombre = $_SESSION['nombreUsuario'];
      $apellidos = $_SESSION['apellidosUsuario'];
    }
    else {
      echo "<a href = 'index.php'> Debes loguearte</a>";
    }
    ?>

<?php
$resultado = $conexion->query("SELECT * FROM reportes");
$arrayDatos = array();
while($row = mysqli_fetch_array($resultado))
{
  $arrayDatos[] = $row; 
}
$reportes = $arrayDatos;
?>
<!-- Modal Editar-->
<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>   
                     <h4 class="modal-title">Modificar Reporte</h4> 
                </div>  
                <div class="modal-body" id="modmodal">  
               
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
                </div>  
           </div>  
      </div>  
 </div> 

<!-- Modal Ver-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalles Reporte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body" id="detalleReporte">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    
<script type="text/javascript">
const bindTaskEvent = function (el, event, fn) {
    el.addEventListener(event, fn)
}
var reportes = <?php echo json_encode($reportes); ?>;
const mainContainerUser = document.getElementById("mainUser");
if(mainContainerUser)
cargarDatos()
function cargarDatos()
{


const div = document.createElement("div")
div.classList.add("table-responsive")
div.classList.add("pl-5")
div.classList.add("pr-5")
div.id="deleteTa"


const table = document.createElement("table");
table.classList.add("table")
table.id = "myTable";

const thead = document.createElement("thead");

const tr = document.createElement("tr")

const ath1 = document.createElement("button")
//bindTaskEvent(a1, "click", filtrarNombre);

const ath2 = document.createElement("button")
//bindTaskEvent(a2, "click", filtrarMunicipio);

const ath3 = document.createElement("button")
//bindTaskEvent(a3, "click", filtrarCiudad);

const ath4 = document.createElement("button")
//bindTaskEvent(a4, "click", filtrarEstatus);


ath1.classList.add("btn-md")
ath1.classList.add("btn-info")

ath2.classList.add("btn-md")
ath2.classList.add("btn-info")

ath3.classList.add("btn-md")
ath3.classList.add("btn-info")

ath4.classList.add("btn-md")
ath4.classList.add("btn-info")

const th1 = document.createElement("th")
ath1.textContent = "Nombre";
th1.appendChild(ath1)
tr.appendChild(th1);
bindTaskEvent(ath1,"click",buscarN)

const th2 = document.createElement("th")
ath2.textContent = "Municipio";
th2.appendChild(ath2)
tr.appendChild(th2);
bindTaskEvent(ath2,"click",buscarM)

const th3 = document.createElement("th")
ath3.textContent = "Ciudad";
th3.appendChild(ath3)
tr.appendChild(th3);
bindTaskEvent(ath3,"click",buscarC)

const th4 = document.createElement("th")
ath4.textContent = "Direccion";
th4.appendChild(ath4)
tr.appendChild(th4);
bindTaskEvent(ath4,"click",buscarD)

const th5 = document.createElement("th")
th5.textContent = "Fecha";
tr.appendChild(th5);

const th6 = document.createElement("th")
th6.textContent = "Estatus";
tr.appendChild(th6);

const th7 = document.createElement("th")
th7.textContent = "Acciones";
tr.appendChild(th7);

thead.appendChild(tr);
table.appendChild(thead);
div.appendChild(table);
let c =0;

reportes.forEach(function(reporte) {
  const tbody = document.createElement("tbody");
 // tbody.setAttribute("id", "myTable");
  const tr2 = document.createElement("tr")
  const td1 = document.createElement("td")
  const td2 = document.createElement("td")
  const td3 = document.createElement("td")
  const td4 = document.createElement("td")
  const td5 = document.createElement("td")
  const td6 = document.createElement("td")
  const td7 = document.createElement("td")


  const buttom1 = document.createElement("button")
  const buttom2 = document.createElement("button")

  const i1 = document.createElement("i")
  const i2 = document.createElement("i")
  const i3 = document.createElement("i")

  i1.classList.add("fas")
  i1.classList.add("fa-eye")
  i2.classList.add("far")
  i2.classList.add("fa-edit")
  i3.classList.add("fas")
  i3.classList.add("fa-eye-slash")

  buttom1.classList.add("btn-sm")
  buttom1.classList.add("btn-success")
  buttom1.classList.add("mr-1")
  buttom1.id = c;
  buttom1.value = reporte[0];
  buttom1.appendChild(i1)
  bindTaskEvent(buttom1,"click",verReporte)

  buttom2.classList.add("btn-sm")
  buttom2.classList.add("btn-primary")
  buttom2.classList.add("mr-1")
  buttom2.id = c;
  buttom2.value = reporte[0];
  buttom2.appendChild(i2)
  bindTaskEvent(buttom2,"click",modificarReporte)
  
  td1.textContent = reporte[2]+" "+reporte[3]
  tr2.appendChild(td1)
  

  td3.textContent = reporte[5]
  tr2.appendChild(td3)

  td4.textContent = reporte[6]
  tr2.appendChild(td4)

  td5.textContent = reporte[7]
  tr2.appendChild(td5)
  
  td6.textContent = reporte[8]
  tr2.appendChild(td6)

  td7.textContent = reporte[9]
  switch(reporte[9])
  {
    case "Pendiente":
    td7.classList.add("btn-outline-secondary")
    break;
    case "En proceso":
    td7.classList.add("btn-outline-info")
    break;
    case "Confirmado":
    td7.classList.add("btn-outline-success")
    break;
    case "Rechazado":
    td7.classList.add("btn-outline-danger")
    break;
  }
  tr2.appendChild(td7)

  tr2.appendChild(buttom1)
  tr2.appendChild(buttom2)

  tbody.appendChild(tr2)
  table.appendChild(tbody)
  c++;

})


mainContainerUser.appendChild(div)


/*
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
*/
}


function verReporte(e){
  const cModalReporte = document.getElementById("detalleReporte")
  cModalReporte.innerHTML=""
  cModalReporte.id="detalleReporte"

  const ojito = e.target;
  const boton = ojito.parentNode;

  const idBoton = boton.id;

const div = document.createElement("div")
div.classList.add("table-responsive")
div.classList.add("pl-5")
div.classList.add("pr-5")

const table = document.createElement("table");
table.classList.add("table")


const thead = document.createElement("thead");
const tr = document.createElement("tr")

const th1 = document.createElement("th")
th1.textContent = "Nombre";
tr.appendChild(th1);
const th2 = document.createElement("th")
th2.textContent = "Descripción";
tr.appendChild(th2);
const th3 = document.createElement("th")
th3.textContent = "Municipio";
tr.appendChild(th3);
const th4 = document.createElement("th")
th4.textContent = "Ciudad";
tr.appendChild(th4);
const th5 = document.createElement("th")
th5.textContent = "Dirección";
tr.appendChild(th5);
const th6 = document.createElement("th")
th6.textContent = "Fecha";
tr.appendChild(th6);
const th7 = document.createElement("th")
th7.textContent = "Estatus";
tr.appendChild(th7);

table.appendChild(thead)
thead.appendChild(tr);

  const tbody = document.createElement("tbody");
  const tr2 = document.createElement("tr")
  const td1 = document.createElement("td")
  const td2 = document.createElement("td")
  const td3 = document.createElement("td")
  const td4 = document.createElement("td")
  const td5 = document.createElement("td")
  const td6 = document.createElement("td")
  const td7 = document.createElement("td")

  td1.textContent = reportes[idBoton][2]
  tr2.appendChild(td1)

  td2.textContent = reportes[idBoton][4]
  tr2.appendChild(td2)

  td3.textContent = reportes[idBoton][5]
  tr2.appendChild(td3)

  td4.textContent = reportes[idBoton][6]
  tr2.appendChild(td4)
  
  td5.textContent = reportes[idBoton][7]
  tr2.appendChild(td5)

  td6.textContent = reportes[idBoton][8]
  tr2.appendChild(td6)

  td7.textContent = reportes[idBoton][9]
  switch(reportes[idBoton][9])
  {
    case "Pendiente":
    td7.classList.add("btn-outline-secondary")
    break;
    case "En proceso":
    td7.classList.add("btn-outline-info")
    break;
    case "Confirmado":
    td7.classList.add("btn-outline-success")
    break;
    case "Rechazado":
    td7.classList.add("btn-outline-danger")
    break;
  }
  tr2.appendChild(td7)

  tbody.appendChild(tr2)
  table.appendChild(tbody)
  div.appendChild(table)

  cModalReporte.appendChild(div)
  $("#myModal").modal()
}

function modificarReporte(e){
  const cModalReporte = document.getElementById("modmodal")
  cModalReporte.innerHTML=""
  cModalReporte.id="modmodal"

  const ojito = e.target;
  const boton = ojito.parentNode;
  const idBoton = boton.value;
  const div = document.createElement("div");
  const boton1 = document.createElement("button");
  boton1.classList.add("btn-sm")
  boton1.classList.add("btn-info")

  const label1 = document.createElement("label");
  label1.textContent = "Estatus"

  const btn = document.createElement("button");
  btn.classList.add("btn-sm")
  btn.classList.add("btn-info")
  btn.id=idBoton;
  btn.textContent = "En proceso"
  bindTaskEvent(btn,"click",enProcesoReporte)
  const btn2 = document.createElement("button");
  btn2.classList.add("btn-sm")
  btn2.classList.add("btn-success")
  btn2.id=idBoton;
  btn2.textContent = "Confirmado"
  bindTaskEvent(btn2,"click",confirmadoReporte)
  const btn3 = document.createElement("button");
  btn3.classList.add("btn-sm")
  btn3.classList.add("btn-danger")
  btn3.id=idBoton;
  btn3.textContent = "Rechazado"
  bindTaskEvent(btn3,"click",rechazadoReporte)


  div.appendChild(btn)
  div.appendChild(btn2)
  div.appendChild(btn3)
  
  cModalReporte.appendChild(div)
  $("#add_data_Modal").modal()
}

function enProcesoReporte(e){
const ojito = e.target;
const boton = ojito.id;
console.log(boton)
const f = document.getElementById("reportes")
const i = document.getElementById("inputOcultar")
idReg = boton.value;
const q = ("UPDATE reportes SET estatusReporte = 'En proceso' WHERE idReporte = "+boton);
console.log(q)
i.value = q;
f.submit();  
}

function confirmadoReporte(e){
const ojito = e.target;
const boton = ojito.id;
console.log(boton)
const f = document.getElementById("reportes")
const i = document.getElementById("inputOcultar")
idReg = boton.value;
const q = ("UPDATE reportes SET estatusReporte = 'Confirmado' WHERE idReporte = "+boton);
console.log(q)
i.value = q;
f.submit();  
}

function rechazadoReporte(e){
const ojito = e.target;
const boton = ojito.id;
console.log(boton)
const f = document.getElementById("reportes")
const i = document.getElementById("inputOcultar")
idReg = boton.value;
const q = ("UPDATE reportes SET estatusReporte = 'Rechazado' WHERE idReporte = "+boton);
console.log(q)
i.value = q;
f.submit();  
}

function buscarN(e){

  
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  console.log(filter)
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }

}
function buscarM(e){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  console.log(filter)
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function buscarC(e){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  console.log(filter)
  
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function buscarD(e){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  console.log(filter)
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

</script>
    </main>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	</body>
</html>