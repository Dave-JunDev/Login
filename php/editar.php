<?php

include_once 'conexion.php';

$conn = mysqli_connect($servername, $username, $password, $database);

$id = $_GET['id'];
$id_tipo_usuario = $_GET['id_tp'];
$usuario = $_GET['usr'];

if (isset($id))
{
    $sql = "SELECT * FROM usuario WHERE id_usuario = $id";
    $datos = mysqli_query($conn, $sql);
    

    if ($datos)
    {
        $arrayDatos = mysqli_fetch_array($datos);

        $nombre = $arrayDatos['nom_user'];
        $apellido = $arrayDatos['apll_user'];
        $correo = $arrayDatos['correo'];
        $telefono = $arrayDatos['tel_user'];
        $estado = $arrayDatos['est_user'];
        $tip_usr = $arrayDatos['tipo_user'];


        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Editar</title>
                <link rel="stylesheet" href="../css/editar.css">
            </head>

            <body>
            <header>
                    <h3>Editar usuario <?php echo $nombre," ", $apellido;?></h3>
            </header>
                <form action="sub_editd.php"; method="POST">
                <label>Nombre:</label>
                <input type="text" name="nombre" value="<?php echo $nombre?>">
                <label>Apellido:</label>
                <input type="text" name="apellido" value="<?php echo $apellido?>">
                <label>Telefono:</label>
                <input type="text" name="telefono" value="<?php echo $telefono?>">
                <label>Correo:</label>
                <input type="text" name="correo" value="<?php echo $correo?>">
                <label>Tipo de usuario:</label>
                <?php
                    if($tip_usr == 1)
                    {
                        ?>
                        <select name="tipo_usuario">
                        <option value="<?php echo $tip_usr?>" selected>Administrador</option>
                        <option value="2">Usuario</option>
                        </select>
                        <?php
                    }
                    else if ($tip_usr == 2)
                    {
                        ?>
                        <select name="tipo_usuario">
                        <option value="1" >Administrador</option>
                        <option value="<?php echo $tip_usr?>" selected >Usuario</option>
                        </select>
                        <?php

                    }
                ?>
                <label>Estado de usuario:</label>
                <?php
                    if($estado == 1)
                    {
                        ?>
                        <select name="Estado_user">
                        <option value="<?php echo $estado?>" selected>Activo</option>
                        <option value="2">Inactivo</option>
                        <option value="3">Desabilitado</option>
                        </select>
                    <?php
                    }
                    else if ($estado == 2)
                    {
                        ?>
                        <select name="Estado_user">
                        <option value="1" >Activo</option>
                        <option value="<?php echo $estado?>" selected>Inactivo</option>
                        <option value="3">Desabilitado</option>
                        </select>
                        <?php

                    }
                    else if ($estado == 3)
                    {
                        ?>
                        <select name="Estado_user">
                        <option value="1" >Activo</option>
                        <option value="2">Inactivo</option>
                        <option value="<?php echo $estado?>"selected>Desabilitado</option>
                        </select>
                        <?php
                    }
                    ?>
                    <input type="hidden" value="<?php echo $id_tipo_usuario?>" name="id_tp">
                    <input type="hidden" value="<?php echo $usuario?>" name="usr">
                    <input type="hidden" value="<?php echo $id?>" name="id">
                    
                    <button name ="subir">Subir modificación</button>
                </form>
                <button name="Regresar" id="regresar">Regresar</button>
            </body>
            <script>
                const regresar = document.querySelector('#regresar');

                regresar.addEventListener('click',() => {
                window.location.href = '../inicio.php?id_tp=<?php echo $id_tipo_usuario?>&usr=<?php echo $usuario?>';
                });
            </script>
        </html>
        <?php
    }
    else
    {
        ?>
        <script>
                alert("Error no se pudieron conseguir las credenciales");
                window.location.href = '../inicio.php?id_tp=<?php echo $id_tipo_usuario?>&usr=<?php echo $usuario?>';
        </script>
        <?php

    }
}
else
{
    ?>
        <script>
                alert("Error no se pudieron conseguir las credenciales");
                window.location.href = '../inicio.php?id_tp=<?php echo $id_tipo_usuario?>&usr=<?php echo $usuario?>';
        </script>
    <?php
}


?>