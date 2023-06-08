<?php
session_start();

    # Conexión con el servidor
        include "../servidor.php";

        $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);      

    # Consulta
        $query = "select * from usuarios where correo like '" . $_SESSION['correo'] . "'";
        // echo $query;

    # Ejecutar consulta
        $consulta = mysqli_query($conexion,$query);
        
    # Sacar los valores de la bbdd
        $bbdd = mysqli_fetch_array($consulta);

        $nombre = $bbdd['nombre'];
        $apellido = $bbdd['apellido'];
        $clave = $bbdd['clave'];
        $tipo = $bbdd['tipo_usuario'];

?>
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
            <h2>Perfil</h2>
            <form action="perfil.php" id="iniciosesion" method="post">
                <div class="formperfil">
                    <div class="tablaform1">
                        <h4>Tu perfil <?php echo $nombre ?></h4><br>
                        <p class="apartados">Nombre</p>
                        <input type='text' name="nombre" class="tdiniciosesion" value='<?php echo $nombre ?>' required><br>
                        <p class="apartados">Apellido</p>
                        <input type='text' name="apellido" class="tdiniciosesion" value='<?php echo $apellido ?>' required><br>
                        <p class="changeclave">Cambiar contrseña <input type="checkbox" id="checkbox" onclick="pass()"></p>
                        <p class="apartadosclaves" id="clavenueva">Contraseña nueva</p>
                        <input type='password' class="claves" name="clave2" id="clave2"><span id="span"></span>
                        <p class="apartadosclaves" id="claveactual">Contraseña actual</p>
                        <input type='password' class="claves" name="clave" id="clave"><span id="span2"></span>
                        <div class="divregistro">
                            <input type="submit" class="botonperfil" name="guardar" value="Guardar &check;"><br>
                            <input type="submit" style="background-color: red;" class="botonperfil" name="cerrar" value="Cerrar sesión &cross;">
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>
<?php

    if (isset($_REQUEST['guardar'])) {

        # Variables
            $nombre = ucwords(trim(strip_tags($_REQUEST['nombre'])));
            $apellido = ucwords(trim(strip_tags($_REQUEST['apellido'])));
            $clave = trim(strip_tags($_REQUEST['clave']));
            $clave2 = trim(strip_tags($_REQUEST['clave2']));
        
        if (strlen($nombre) >= 3 && strlen($apellido) >= 4) {
            
            # Conexión con el servidor
                include "../servidor.php";

                $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);      

            if (!empty($clave)) {
                
                if (strlen($clave) >= 8 && strlen($clave2) >= 8) {
                    
                    $clave = md5($clave);

                    # Sacar la contraseña del usuario
                        # Consulta
                            $query = "select * from usuarios where correo like '" . $_SESSION['correo'] . "' and clave = '$clave'";
                            // echo "$query <br>";

                        # Ejecutar consulta
                            $consulta = mysqli_query($conexion,$query) or die ("Fallo en la consulta");

                            $bbdd = mysqli_fetch_array($consulta);

                    # Cambiar la contraseña
                        if ($bbdd['clave'] == $clave) {

                            $clave2 = md5($clave2);
                            
                            # Consulta
                                $query = "update usuarios set nombre = '$nombre',  apellido = '$apellido', clave = '$clave2' where correo like '" . $_SESSION['correo'] ."'";
                                // echo "$query <br>";
                        }
                        else {
                            echo "<p class='alertas'>La contraseña introducida no coincide con la actual</p>";
                        }
                }
                else {
                    echo "<p class='alertas'>Las contraseñas deben tener un mínimo de 8 caracteres</p>";
                }
            }
            else {
                    
                # Consulta
                    $query = "update usuarios set nombre = '$nombre', apellido = '$apellido' where correo like '" . $_SESSION['correo'] ."'";
                    # echo "$query <br>";
            }

            # Ejecutar consulta
                $consulta = mysqli_query($conexion,$query);

                if ($consulta) {
                    echo "<script>window.history.go(-2)</script>";
                }
                else {
                    echo "error";
                }
        }
    }
    if (isset($_REQUEST['cerrar'])) {
        session_destroy();
        ?> <script>window.location.href="../index.php"</script> <?php
    }

?>