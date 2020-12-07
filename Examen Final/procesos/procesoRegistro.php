<?php 
    if(isset($_POST['inputRegNombre']))
    {
        require("db/conexion.php");
        $nombre = $_POST['inputRegNombre'];
        $apellidos = $_POST['inputApellidos'];
        $correo = $_POST['inputCorreo'];
        $contra = ($_POST['inputContra']);
        $ccontra = ($_POST['inputcContra']);
        
        $consulta = $conexion->query("SELECT * FROM usuario WHERE emailUsuario = '$correo'");
        $contar = $consulta->num_rows;
        if($contra==$ccontra)
        {
            if($contar>0)
                echo'<script type="text/javascript">alert("Ya existe un registro con esta wea");</script>';
            else
            {
                $insertar = "INSERT INTO usuario (idUsuario, adminUsuario, nombreUsuario,
                apellidosUsuario, emailUsuario, passUsuario)VALUES('0','0','$nombre','$apellidos','$correo','$contra')";
                $query = mysqli_query($conexion, $insertar);
                if($query)
                {
                    echo'<script type="text/javascript">alert("Si");</script>';
                    header("Location: index.php");
                }
                else
                    echo'<script type="text/javascript">alert("Wey no");</script>';
            }
        }
        else
        echo'<script type="text/javascript">alert("Las contras no coinciden");</script>';
    }
?>