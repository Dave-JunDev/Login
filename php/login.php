<?php

include_once 'conexion.php';

$conn = mysqli_connect($servername, $username, $password, $database);

date_default_timezone_set("America/Bogota");
$mifecha = new DateTime(); 
$date = date('Y-m-d H:i:s');

$horaing = 8;
$horasalida = 16;
$horactual = intval(date('H'));

$user = $_POST['username'];
$contrasena = $_POST['password'];

$sql = "SELECT * FROM usuario WHERE correo = '$user' and password = '$contrasena'";

if (mysqli_query($conn, $sql))
{
    $datos = mysqli_query($conn, $sql);
    $arrayDatos = mysqli_fetch_array($datos);

    $user_crr = $arrayDatos['correo'];
    $user_contra = $arrayDatos['password'];
    $user_estd = $arrayDatos['est_user'];
    $user_id = $arrayDatos['id_usuario'];
    $tipo_user = $arrayDatos['tipo_user'];

    if ($user_crr == $user)
    {
       if ($contrasena == $user_contra)
       {
           if($user_estd == 2)
           {
                echo '<script> alert("Error aun no esta habilitado para ingresar");
                location.href="../Index.html";</script>';
           }
           else if ($user_estd == 3)
           {
                echo '<script> alert("Error usted esta desabilitado para ingresar");
                location.href="../Index.html";</script>';
           }
           else
           {
               $sql2 = "INSERT INTO log_user (id_user, fecha_hora) values ('$user_id','$date')";

               if (mysqli_query($conn, $sql2))
               {
                   if($horactual >= $horaing && $horactual < $horasalida)
                   {
                       ?>
                        <script type="text/javascript">
                            location.href="../inicio.php?id_tp=<?php echo $tipo_user;?>&usr=<?php echo $user_id?>";
                        </script>
                       <?php
                   }
                   else
                   {
                       echo '<script>alert("Error no puede entrar horario restringido");
                       location.href="../Index.html";</script>';
                   }

               }
               else
               {
                   echo '<script>alert("Error no se pudo")</script>';
               }

           }

        }
        else
        {
            echo '<script> alert("Error usuario o contraseña");
            location.href="../Index.html";</script>';
        }

    }
    else
    {

        echo '<script> alert("Error usuario o contraseña");
        location.href="../Index.html";</script>';
    }
}
else
{
    echo '<script> alert("Error no se pudo completar la solicitud realizada");
    location.href="../Index.html";</script>';
}

?>