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
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <title>Hello, world!</title>
  </head>
  <body class="unicorn">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#"><i class="fas fa-head-side-mask mr-3"></i>ControlCovid</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="userReport.php">Reportar caso</a>
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
          <form id="ocultar" name="sampleForm" method="post" action="ocultarRegistro.php">
          <input type="hidden" name="reporte" id="inputOcultar" value="">
      </form>
      <form id="modificar" name="sampleForm" method="post" action="queries.php">
          <input type="hidden" name="descripcion" id="inputDescripcion" value="">
          <input type="hidden" name="municipio" id="inputMunicipio" value="">
          <input type="hidden" name="ciudad" id="inputCiudad" value="">
          <input type="hidden" name="direccion" id="inputDireccion" value="">
      </form>
    </header>
    <main id="mainUser" class="maincontainer container-fluid mt-5 pt-5">

<?php
$resultado = $conexion->query("SELECT * FROM reportes WHERE idReportador = '$idUsuario'");
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
        <button type="text" class="btn btn-primary">Save</button>
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

const thead = document.createElement("thead");

const tr = document.createElement("tr")

const th1 = document.createElement("th")
th1.textContent = "Municipio";
tr.appendChild(th1);

const th2 = document.createElement("th")
th2.textContent = "Ciudad";
tr.appendChild(th2);

const th3 = document.createElement("th")
th3.textContent = "Direccion";
tr.appendChild(th3);

const th4 = document.createElement("th")
th4.textContent = "Fecha";
tr.appendChild(th4);

const th5 = document.createElement("th")
th5.textContent = "Estatus";
tr.appendChild(th5);

const th6 = document.createElement("th")
th6.textContent = "Acciones";
tr.appendChild(th6);

thead.appendChild(tr);
table.appendChild(thead);
div.appendChild(table);
let c =0;

reportes.forEach(function(reporte) {
  if (reporte[10]==0)
  {
  const tbody = document.createElement("tbody");
  const tr2 = document.createElement("tr")
  const td1 = document.createElement("td")
  const td2 = document.createElement("td")
  const td3 = document.createElement("td")
  const td4 = document.createElement("td")
  const td5 = document.createElement("td")
  const td6 = document.createElement("td")


  const buttom1 = document.createElement("button")
  const buttom2 = document.createElement("button")
  const buttom3 = document.createElement("button")

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
  
  buttom3.classList.add("btn-sm")
  buttom3.classList.add("btn-danger")
  buttom3.classList.add("mr-1")
  buttom3.id = c;
  buttom3.value = reporte[0];
  buttom3.appendChild(i3)
  bindTaskEvent(buttom3,"click",ocultarReporte)
  
  td1.textContent = reporte[5]
  tr2.appendChild(td1)

  td2.textContent = reporte[6]
  tr2.appendChild(td2)

  td3.textContent = reporte[7]
  tr2.appendChild(td3)

  td4.textContent = reporte[8]
  tr2.appendChild(td4)
  
  td5.textContent = reporte[9]
  switch(reporte[9])
  {
    case "Pendiente":
    td5.classList.add("btn-outline-secondary")
    break;
    case "En proceso":
    td5.classList.add("btn-outline-primary")
    break;
    case "Confirmado":
    td5.classList.add("btn-outline-success")
    break;
    case "Rechazado":
    td5.classList.add("btn-outline-danger")
    break;
  }


  tr2.appendChild(td5)

  tr2.appendChild(buttom1)
  tr2.appendChild(buttom2)
  tr2.appendChild(buttom3)

  tbody.appendChild(tr2)
  table.appendChild(tbody)
  c++;
  }
});
mainContainerUser.appendChild(div)
}

function verReporte(e){
  const cModalReporte = document.getElementById("detalleReporte")
  cModalReporte.innerHTML=""
  cModalReporte.id="detalleReporte"

  const ojito = e.target;
  const boton = ojito.parentNode;

  const idBoton = boton.id
/////////////////
const div = document.createElement("div")
div.classList.add("table-responsive")
div.classList.add("pl-5")
div.classList.add("pr-5")

const table = document.createElement("table");
table.classList.add("table")

const thead = document.createElement("thead");
const tr = document.createElement("tr")
const th1 = document.createElement("th")

th1.textContent = "Descripción";
tr.appendChild(th1);
const th2 = document.createElement("th")
th2.textContent = "Municipio";
tr.appendChild(th2);
const th3 = document.createElement("th")
th3.textContent = "Ciudad";
tr.appendChild(th3);
const th4 = document.createElement("th")
th4.textContent = "Dirección";
tr.appendChild(th4);
const th5 = document.createElement("th")
th5.textContent = "Fecha";
tr.appendChild(th5);
const th6 = document.createElement("th")
th6.textContent = "Estatus";

tr.appendChild(th6);
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

  td1.textContent = reportes[idBoton][4]
  tr2.appendChild(td1)

  td2.textContent = reportes[idBoton][5]
  tr2.appendChild(td2)

  td3.textContent = reportes[idBoton][6]
  tr2.appendChild(td3)

  td4.textContent = reportes[idBoton][7]
  tr2.appendChild(td4)
  
  td5.textContent = reportes[idBoton][8]
  tr2.appendChild(td5)

  td6.textContent = reportes[idBoton][9]
  tr2.appendChild(td6)

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
  const form = document.createElement("form");
  const boton1 = document.createElement("a");
  boton1.textContent = "Actualizar"
  boton1.classList.add("btn-sm")
  boton1.classList.add("btn-success")


  bindTaskEvent(boton1,"click",sendModReporte)

  const label = document.createElement("label");
  label.value=idBoton;
  label.id="idB";

  const label1 = document.createElement("label");
  label1.textContent = "Descripción"
  const label2 = document.createElement("label");
  label2.textContent = "Municipio"
  const label3 = document.createElement("label");
  label3.textContent = "Ciudad"
  const label4 = document.createElement("label");
  label4.textContent = "Dirección"

  const input1 = document.createElement("input");
  input1.name="descripcion";
  input1.id="descripcion";
  input1.classList.add("form-control")
  const input2 = document.createElement("input");
  input2.name="municipio";
  input2.id="municipio";
  input2.classList.add("form-control")
  const input3 = document.createElement("input");
  input3.name="ciudad";
  input3.id="ciudad";
  input3.classList.add("form-control")
  const input4 = document.createElement("input");
  input4.name="direccion";
  input4.id="direccion";
  input4.classList.add("form-control")


  const br1 = document.createElement("br");
  const br2 = document.createElement("br");
  const br3 = document.createElement("br");
  const br4 = document.createElement("br");
  
  form.appendChild(label)
  form.appendChild(label1)
  form.appendChild(input1)
  form.appendChild(br1)
  form.appendChild(label2)
  form.appendChild(input2)
  form.appendChild(br2)
  form.appendChild(label3)
  form.appendChild(input3)
  form.appendChild(br3)
  form.appendChild(label4)
  form.appendChild(input4)
  form.appendChild(br4)
  form.appendChild(boton1)

  
  
  cModalReporte.appendChild(form)
  $("#add_data_Modal").modal()
}

function sendModReporte(e){
let desc = document.getElementById("descripcion")
let mun = document.getElementById("municipio")
let ciu = document.getElementById("ciudad")
let dire = document.getElementById("direccion")
let id = document.getElementById("idB")
const f = document.getElementById("modificar")
const i0 = document.getElementById("inputDescripcion")
const i1 = document.getElementById("inputMunicipio")
const i2 = document.getElementById("inputCiudad")
const i3 = document.getElementById("inputDireccion")

let vdes 
let vmun 
let vciu 
let vdor

vdes = desc.value
vmun = mun.value
vciu = ciu.value
vdor = dire.value

vid = id.value


if(vdes!="")
{
  const q = ("UPDATE reportes SET descReporte = '"+vdes +"' WHERE idReporte = "+vid);
  console.log(q)
  i0.value = q;
}
if(vmun!="")
{
  const q = ("UPDATE reportes SET municipioReporte = '"+vmun +"' WHERE idReporte = "+vid);
  console.log(q)
  i1.value = q;

}
if(vciu!="")
{
  const q = ("UPDATE reportes SET ciudadReporte = '"+vciu +"' WHERE idReporte = "+vid);
  console.log(q)
  i2.value = q;
}
if(vdor!="")
{
  const q = ("UPDATE reportes SET direccionReporte = '"+vdor +"' WHERE idReporte = "+vid);
  console.log(q)
  i3.value = q;
}
f.submit();
}



function ocultarReporte(e){
const ojito = e.target;
const boton = ojito.parentNode;
const f = document.getElementById("ocultar")
const i = document.getElementById("inputOcultar")
idReg = boton.value;
console.log(idReg)
const q = ("UPDATE reportes SET hiddenReporte = 1 WHERE idReporte = "+idReg);
i.value = q;
f.submit();  
}
</script>

</main>
   
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/82160ed4ec.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  </body>
</html>