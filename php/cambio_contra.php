<?php

include_once 'conexion.php';

$conn = mysqli_connect($servername, $username, $password, $database);

$user = $_POST['userC'];
$contra1 = $_POST['passwC'];
$contra2 = $_POST['passw2'];

$sql = "SELECT * FROM usuario WHERE correo = '$user'";

if (mysqli_query($conn, $sql))
{
    $datos = mysqli_query($conn, $sql);
    $arrayDatos = mysqli_fetch_array($datos);
    
    $user_crr = $arrayDatos['correo'];
    $id_user = $arrayDatos['id_usuario'];
    
    if ($user_crr == $user)
    {
        if($contra1 == $contra2)
        {
            $consulta = "UPDATE usuario SET password = '$contra1' WHERE usuario.id_usuario = $id_user";
            
            if(mysqli_query($conn,$consulta))
            {
                echo '<script> alert("Se realizo el cambio de contraseña");
               location.href="../Index.html";</script>';
            }
            else
            {
                echo '<script> alert("Error no se pudo realizar el cambio de contraseña");
               location.href="../Index.html";</script>';
            }
            
        }
        else
        {
             
             echo '<script> alert("Error las contraseñas no son iguales");
             location.href="../Index.html";</script>';
        }
        
    }
    else
    {
        echo '<script> alert("Error no se pudo encontrar al usuario");
        location.href="../Index.html";</script>';
    }
   
}
else
{
    echo '<script> alert("Error no se pudo completar la solicitud realizada");
    location.href="../Index.html";</script>';
}
?>