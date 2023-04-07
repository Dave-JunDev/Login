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

    $user_estd = $arrayDatos['est_user'];
    $user_id = $arrayDatos['id_usuario'];
    $tipo_user = $arrayDatos['tipo_user'];

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
                       $_SESSION["typeUser"] = $tipo_user;
                       $_SESSION["Id"] = $user_id;
                       
                       header("Location: ./../inicio.php");
                   }
                   else
                   {
                       echo '<script>alert("Error no puede entrar horario restringido");
                       location.href="../Index.html";</script>';
                   }

               }
               else
               {
                   echo '<script>alert("Error no se pudo validar el horario de ingreso")</script>';
               }

           }
}
else
{
    echo '<script> alert("Error no se pudo completar la solicitud realizada");
    location.href="../Index.html";</script>';
}

?>
