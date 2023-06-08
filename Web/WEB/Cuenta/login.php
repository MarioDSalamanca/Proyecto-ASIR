<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Twenty-first</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../codigoCSS.css">
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
            <form action="login.php" id="iniciosesion" method="post">
                <div class="forminicio">
                    <div class="tablaform1">
                        <h2>INICIO DE SESIÓN</h2>
                        <p class="hrefregistro">¿Es tu primera vez? <u><a href="./registro.php">Registrate</a></u><br><br>
                        Inicia sesión y empieza a disfrutar de todas las ventajas de TWT_First</p>
                        <input type="email" name="correo" class="tdiniciosesion" placeholder="Correo" required><br>
                        <input type="password" name="clave" class="tdiniciosesion" placeholder="Contraseña" required>
                        <div class="divregistro">
                            <input type="submit" class="botoniniciosesion" name="iniciosesion" value="Iniciar Sesión">
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>
<?php

    if (isset($_REQUEST['iniciosesion'])) {

        # Variables
            $correo = trim(strip_tags($_REQUEST['correo']));
            $clave = trim(strip_tags($_REQUEST['clave']));

        # Comprobar usuarios
            if (filter_var($correo, FILTER_VALIDATE_EMAIL) && strlen($clave) >= 8) {

                # Declarar variables
                    $_SESSION['correo'] = $correo;
                    $clave = md5($clave);
                
                # Conexión con el servidor
                    include "../servidor.php";

                    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);      

                # Consulta
                    $query = "select * from usuarios where correo like '$correo' and clave = '$clave'";
                    // echo "$query <br>";

                # Ejecutar consulta
                    $consulta = mysqli_query($conexion,$query) or die ("Fallo en la consulta");
                    
                # Nº de filas de la consulta
                    $rows = mysqli_num_rows($consulta);

                # Dependiendo del tipo de usuario que sea lo manda a su Index correspondiente
                    if ($rows == 1) {
                        $bbdd = mysqli_fetch_array($consulta);
                        if ($bbdd['tipo_usuario'] == 'admin') {
                            ?> <script>window.location.href="../admin/index.php"</script> <?php
                        }
                        elseif ($bbdd['tipo_usuario'] == 'cliente') {
                            ?> <script>window.location.href="../index.php"</script> <?php
                        }
                    }
                # Si el usuario no existe
                    else {
                        echo "<p class='alertas'>Este usuario no está dado de alta</p>";
                    }
            }
        # Si correo y clave no son correctos
            else {
                echo "<p class='alertas'>El correo o la contraseña no es correcto</p>";
            }

        mysqli_close($conexion);
    }
?>