<?php
session_start();

if (empty($_SESSION['correo'])) {
    header("Location: ./Cuenta/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Twenty-first</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./codigoCSS.css">
        <script src="./JS.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    </head>
    <body>
        <header>
            <table class="headforo">
                <td width='24%'>
                    <a href="./index.php"><img class="logoforo" src="./IndexFotos/Logo.jpg"></a>
                </td>
                <td>
                    <p>Foro de TWT_First</p>
                </td>
            </table>
        </header>
        <main id="main">
            <p class="flecha"><a href="./foro.html">&#10150;</a></p>
            <div class='cuestiones'>
            <?php

                # Conexión con el servidor
                    include "./servidor.php";

                    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

                # Consulta
                    $query = "select * from foro where tipo like 'pregunta' order by fecha desc";
                    // echo $query;

                # Ejecutar consulta
                    $consulta = mysqli_query($conexion,$query);
                                    
                # Nº de líneas de la consulta
                    $rows = mysqli_num_rows($consulta);

                    if ($rows > 0) {

                        for ($i = 0; $i < $rows; $i++) {
                            
                            $bbdd = mysqli_fetch_array($consulta);

                            $nombre = $bbdd['nombre'];
                            $apellido = $bbdd['apellido'];
                            $comentario = $bbdd['comentario'];
                            $fecha = $bbdd['fecha'];
                            $respuesta = $bbdd['respuesta'];
                            
                            echo "<table>";
                            echo "  <th>$nombre $apellido</th>";
                            echo "  <tr>";
                            echo "      <td>";
                            echo "          $comentario";
                            echo "      </td>";
                            echo "  </tr>";
                                
                            if (strlen($respuesta) > 1) {
                                
                            echo "  <tr>";
                            echo "      <td>";
                            echo "          <br><br><strong>Respuesta:</strong><br><br>$respuesta";
                            echo "      </td>";
                            echo "  </tr>";
                            }

                            echo "      </td>";
                            echo "  </tr>";
                            echo "  <tr>";
                            echo "      <td>";
                            echo "          <p>$fecha</p>";
                            echo "      </td>";
                            echo "  </tr>";
                            echo "</table>";
                        }
                    }
                    
                    mysqli_close($conexion);

            ?>
            
            </div>
            <h2 class="tituloformop">Preguntanos lo que quieras</h2>
            <form action="preguntas.php" method="post">
                <textarea name="opinion" id="" rows="8" maxlength="800" minlength="10" required></textarea><br>
                <div class="botonesforo">
                    <input class="forobutton" type="button" value="Borrar" onclick="reset()">
                    <input class="forobutton" type="submit" value="Enviar" name="enviar">
                    </div>
            </form>
        </main>
        <footer>
            <div>
                <table class="foro">
                    <tr>
                        <td class="td-pie-inicio">
                            <ul>
                                <li><p>Contacta con nosotros: <b>mario.dieguez.asir@salesianosatocha.com</b></p><br>
                                <li><p>Visita nuestro <b>foro</b> de preguntas haciendo click <strong><a href="./foro.php" style="color:white;">aquí</a></strong></p><br>
                                <li><p>Más sobre el desarrollador del proyecto haciendo click <strong><a href="./CV_Mario_Dieguez.pdf" style="color:white;">aquí</a></strong></p>
                            </ul>
                        </td>
                        <td>
                            <div class="icon-red">
                                <p>Síguenos para más:</p><br>
                                <a href="https://www.facebook.com/profile.php?id=100091928108594" target="_blank"><img class="redes" src="./IndexFotos/facebook.png" alt=""></a>
                                <a href="https://www.instagram.com/twtfirst2023/" target="_blank"><img class="redes" src="./IndexFotos/instagram.png" alt=""></a>
                                <a href="https://twitter.com/twtfirst2023" target="_blank"><img class="redes" src="./IndexFotos/twiter.png" alt=""></a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </footer>
    </body>
</html>
<?php

    if (isset($_REQUEST['enviar'])) {

        $opinion = trim(strip_tags($_REQUEST['opinion']));

        if (strlen($opinion) > 10) {
                
            # Conexión con el servidor
            include "./servidor.php";

            $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            # Consulta
                $query = "select * from usuarios where correo like '" . $_SESSION['correo'] . "'";
                // echo $query;

            # Ejecutar consulta
                $consulta = mysqli_query($conexion,$query);
                                        
            # Sacar nombre de la bbdd
                $bbdd = mysqli_fetch_array($consulta);

                $nombre = $bbdd['nombre'];
                $apellido = $bbdd['apellido'];

            # Consulta
                $query = "insert into foro value (null, '$nombre', '$apellido', '$opinion', now(), 'pregunta', null)";
                // echo $query;

            # Ejecutar consulta
                if(mysqli_query($conexion,$query)) {
                    ?>
                        <script language="javascript">Swal.fire('!Pregunta enviada¡','Se ha enviado tu pregunta, se te responderá con la mayor brevedad','success');</script>
                    <?php
                }

        }
        else { ?>
            <script language="javascript">Swal.fire('Vaya...','No se ha podido enviar tu pregunta','error');</script>
        <?php }
    }
    
?>