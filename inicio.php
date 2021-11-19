<?php

include_once 'php/conexion.php';

$conn = mysqli_connect($servername, $username, $password, $database);

$id_tipo_usuario = $_GET['id_tp'];
$usuario = $_GET['usr'];

if (isset($id_tipo_usuario))
{
    if(isset($usuario))
    {
        $sql = "SELECT * FROM usuario WHERE  id_usuario = '$usuario'";

        $consulta = mysqli_query($conn, $sql);
        $arrayDatos = mysqli_fetch_array($consulta);

        $nombre = $arrayDatos['nom_user'];
        $apellido = $arrayDatos['apll_user'];

        if($id_tipo_usuario == 1)
        {

        ?>
        <!DOCTYPE html>
        <html lang="es">
        <link rel="stylesheet" href="css/inicio.css">
                <script src="https://kit.fontawesome.com/ec5c2bd566.js" crossorigin="anonymous"></script>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Inicio</title>
        </head>

        <header>
            <div class="inf_user">
                <h3>Bienvenido <?php echo $nombre," ",$apellido?></h3>
            </div>
        </header>
        <body>
        <section class="tabla">
                <h2>Informacion usuarios</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Editar</th>

                </tr>
                <?php
                $sql = "SELECT * FROM usuario";
                $result = mysqli_query($conn, $sql);
                while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $mostrar['id_usuario'] ?></td>
                        <td><?php echo $mostrar['nom_user'] ?></td>
                        <td><?php echo $mostrar['apll_user'] ?></td>
                        <td><?php echo $mostrar['correo'] ?></td>
                        <td><?php echo $mostrar['tel_user'] ?></td>
                        <td>
                            <a href="php/editar.php?id_tp=<?php echo $id_tipo_usuario ?>&usr=<?php echo $usuario ?>&id=<?php echo $mostrar['id_usuario'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        
                    </tr>
                <?php
                }
                ?>
            </table>

        </section>
        </body>

        </html>

        <?php
        }
        else if ($id_tipo_usuario == 2)
        {
        ?>
                <!DOCTYPE html>
                <html>
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" href="css/inicio.css">
                    <script src="https://kit.fontawesome.com/ec5c2bd566.js" crossorigin="anonymous"></script>
                    <title>Inicio</title>
                    </head>
                    <body>
                    <header>
                        <section class="encabezado">
                        <div class="inf_user2">
                            <div class="til_head">
                                 <h3>Bienvenido <?php echo $nombre," ",$apellido?></h3>
                            </div>
                            <div class="ico">
                            <a><i class="fas fa-bars"></i></a>
                            </div>
                        </div>
                        </section>
                    </header>

                    <section class="imagen">
                        <div class="cont-img">
                            <img src="img/banner.jpg">
                        </div>
                    </section>

                    <section class="works">
                            <h3>Actividades a realizar</h3>

                            <div class="works-content">
                               <p>Aqui encontraras las tareas a realizar escoje una y empieza con tu labor.
                                   no olvides de enviar informacion y avances a tu jefe de area.
                               </p>
                               <ul class="list">
                                    <li>1. Desarrollo login</li>
                                    <li>2. Desarrollo game 1</li>
                                    <li>3. Desarrollo base de datos login</li>
                                    <li>4. Desarrollo base de datos game 1</li>
                                </ul>
                            </div>
                    </section>

                    <footer>
                        <div class="cont-footer">
                        <i class="fab fa-linkedin"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-github"></i>
                        </div>
                        <div class="end-footer">
                            <h5>Derechos reservados 2021</h5>
                        </div>
                    </footer>
                    </body>
                </html>

            <?php
        }
        else
        {
            echo '<script>alert("Error no se pudo identificar el usuario");
        location.href="Index.html";</script>';
        }
    }
    else
    {
         echo '<script>alert("Error no se pudieron conseguir las credenciales");
        location.href="Index.html";</script>';
    }

}
else
{

    echo '<script>alert("Error no se pudieron conseguir las credenciales");
    location.href="Index.html";</script>';
}

?>