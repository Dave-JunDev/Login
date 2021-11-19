<?php

include_once 'conexion.php';

$conn = mysqli_connect($servername, $username, $password, $database);

$est_usr = 2;
$id_tp_usr = 2;
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['correo'];
$contra1 = $_POST['passCreate'];
$contra2 = $_POST['passCreate2'];
$destinatario = $email;

$consulta = "SELECT * FROM usuario WHERE correo = '$email'";


    if ($contra1 == $contra2)
    {
        if ($email == null or $nombre == null or $apellido == null or  $telefono == null)
        {
             echo '<script> alert("Error el correo ingresado ya esta registrado por otro usuario");
             location.href="../Index.html";</script>';
        }
        else
        {

        $sql = "Insert into usuario (nom_user,apll_user,tel_user,password,est_user,correo,tipo_user) values ('$nombre','$apellido','$telefono','$contra2','$est_usr','$email','$id_tp_usr')";

            if (mysqli_query($conn, $sql))
            {
            $asunto ="Registro en la plataforma ";

            $header ="Enviado por ".$nombre;

            $mensaje = "Buen dia te registraste en la plataforma";

            $mensajecompleto = $mensaje."\nAtentamente La plataforma" ;

            mail($destinatario,$asunto,$mensajecompleto,$header);

            echo '<script> alert("Usuario registrado, debes esperar al menos 24 horas para que seas habilitado dentro de la plataforma");
            location.href="../Index.html";</script>';
            }
            else
            {
            echo '<script> alert("Error al registrar usuario, por favor volver a intentarlo");
            location.href="../Index.html";</script>';

            echo `<script> alert("Error al registrar usuario, por favor volver a intentarlo $usuario");</script>`;
            }
        }

    }
    else
    {
        echo '<script> alert("Error las contraseñas no son iguales");
            location.href="../Index.html";</script>';
    }

?>