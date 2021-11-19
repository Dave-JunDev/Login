<?php

include_once 'conexion.php';

$conn = mysqli_connect($servername, $username, $password, $database);

$fnombre = $_POST['nombre'];
$fapellido = $_POST['apellido'];
$fcorreo = $_POST['correo'];
$ftelefono = $_POST['telefono'];
$ftip_user = $_POST['tipo_usuario'];
$fest_user = $_POST['Estado_user'];

$id = $_POST['id'];
$id_tipo_usuario = $_POST['id_tp'];
$usuario = $_POST['usr'];

if(isset($_POST['subir']))
{
    if ($fnombre == null or  $fapellido == null or  $fcorreo == null or $ftelefono == null)
    {
        echo '<script>alert("No puede dejar campos vacios");</script>';
    }
    else
    {
    $sql2 = "UPDATE usuario SET nom_user = '$fnombre', apll_user = '$fapellido', correo = '$fcorreo',tel_user = '$ftelefono', est_user = '$fest_user', tipo_user = '$ftip_user'  WHERE usuario.id_usuario = $id";

        $consulta2 = mysqli_query($conn, $sql2);

        if($consulta2)
        {
        ?>
        <script>
        alert("se actualizo la informacion del usuario");
        location.href="editar.php?id_tp=<?php echo $id_tipo_usuario ?>&usr=<?php echo $usuario ?>&id=<?php echo $id?>";
        </script>';
        <?php
        }
        else
        {
        ?>
        <script>
        alert("Error no se pudo actualizar la informacion");
        location.href="editar.php?id_tp=<?php echo $id_tipo_usuario ?>&usr=<?php echo $usuario ?>&id=<?php echo $id?>";
        </script>';
        <?php
        }
    }
}
else
{
        ?>
        <script>
        alert("Error se pudo actualizar la informacion");
        location.href="editar.php?id_tp=<?php echo $id_tipo_usuario ?>&usr=<?php echo $usuario ?>&id=<?php echo $id?>";
        </script>';
        <?php
}
?>