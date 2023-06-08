<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Twenty-first</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../codigoCSS.css">
        <script src="../JS.js"></script>
    </head>
    <body>
        <header>
            <table class="headlogin">
                <td>
                    <span><a href="../index.php">&#10150;</a></span>
                </td>
                <td width='30%'>
                    <a href="../index.php"><img class="logoforo" src="../IndexFotos/Logo.jpg"></a>
                </td>
                <td>
                    <p>TWT_First</p>
                </td>
            </table>
        </header>
        <main>
            <form action="registro.php" id="iniciosesion" method="post">
                <div class="forminicio">
                    <div class="tablaform1">
                        <h2>REGISTRO</h2>
                        <p class="hrefregistro">¿Ya tienes una cuenta? <u><a href="./login.php">Inicia Sesión</a></u><br><br>
                        Inicia sesión y empieza a disfrutar de todas las ventajas de TWT_First</p>
                        <input type="text" name="nombre" class="tdiniciosesion" placeholder="Nombre" required><br>
                        <input type="text" name="apellido" class="tdiniciosesion" placeholder="Apellido" required><br>
                        <input type="email" name="correo" class="tdiniciosesion" placeholder="Correo" required><br>
                        <input type="password" name="clave" class="tdiniciosesion" placeholder="Contraseña" required><br>
                        <div class="divregistro">
                            <input type="submit" name="registrar" class="botoniniciosesion" value="Registrarse">
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>
<?php

    if (isset($_REQUEST['registrar'])) {

        # Variables
            $nombre = ucwords(trim(strip_tags($_REQUEST['nombre'])));
            $apellido = ucwords(trim(strip_tags($_REQUEST['apellido'])));
            $correo = trim(strip_tags($_REQUEST['correo']));
            $clave = trim(strip_tags($_REQUEST['clave']));
            
        if (strlen($nombre) >= 3 && strlen($apellido) >= 4 && filter_var($correo, FILTER_VALIDATE_EMAIL) && strlen($clave) >= 8) {
            
            $clave = md5($clave);

            # Filtrar usuarios existentes
            # Conexión con el servidor
                include "../servidor.php";

                $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);      
                
            # Consulta
                $query = "select * from usuarios where correo like '$correo'";
                
            # Ejecutar consulta
                $consulta = mysqli_query($conexion,$query);
                
            # Nº de filas de la consulta
            $rows = mysqli_num_rows($consulta);
            
            if ($rows == 1) {
                echo "<p class='alertas'>Ya existe un usuario con ese correo</p>";
            }
            else {
                
                # Consulta
                    $query = "insert into usuarios values (null, '$nombre', '$apellido', '$correo', '$clave', 'cliente')";
                    // echo "$query <br>";

                # Ejecutar consulta
                    $consulta = mysqli_query($conexion,$query);
                    
                    ?> <script>window.location.href="login.php"</script> <?php
            }
        }
        else {
            echo "<p class='alertas'>Los datos que has introducido no son válidos o faltan campos por rellenar</p>";
        }
    }

?>