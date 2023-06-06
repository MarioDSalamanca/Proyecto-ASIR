<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>TWT_First</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="admin.css">
        <script src="../JS.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <header>
            <a href="../index.php"><img src="../IndexFotos/Logo.jpg" alt=""></a>
            <h1>Administrador de TWT_First</h1>
            <a href="./index.php" class="volver">Inicio</a>
        </header>
        <main>
            <div class="menu">
                <h2>Base de datos</h2>
                <div>
                    <a href="./Componentes.php">Componentes</a><br><br>
                    <a href="./Consolas.php">Consolas</a><br><br>
                    <a href="./Móviles.php">Móviles</a><br><br>
                    <a href="./PCs.php">PCs</a><br><br>
                    <a href="./Portátiles.php">Portátiles</a><br><br>
                    <a href="./TVs.php">Televisóres</a><br><br>
                    <a href="./Foro.php">Foro</a><br><br>
                    <a href="./Compras.php">Compras</a><br><br>
                    <a href="./Usuarios.php">Usuarios</a><br>
                </div>
            </div>
            <div class="cuerpo">
                <table>
                    <th>
                        
                    </th>
                    <th>
                        Id
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Apellido
                    </th>
                    <th>
                        Comentario/Pregunta
                    </th>
                    <th>
                        Fecha
                    </th>
                    <th>
                        Tipo
                    </th>
                    <th>
                        Respuestas
                    </th>
                    <th>
                <?php
                    # Conexión con el servidor
                    include "../servidor.php";

                    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                    $query = "select * from foro order by fecha";
                    $consulta = mysqli_query($conexion, $query);
                    $rows = mysqli_num_rows($consulta);
                    
                    if ($rows > 0) {

                        for ($i = 0; $i < $rows; $i++) {

                            $bbdd = mysqli_fetch_array($consulta);

                            echo "<form action='Foro.php' method='post'>";
                            echo "<tr>";
                                echo "<td width='7%'>";
                                    echo "<input type='submit' class='editar' name='editar' value='Editar'>";
                                    echo "<input type='submit' class='editar' name='borrar' value='Borrar'>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='id' value='".$bbdd['id']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='nombre' value='".$bbdd['nombre']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='apellido' value='".$bbdd['apellido']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<textarea name='comentario' readonly>".$bbdd['comentario']."</textarea>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='datetime' name='fecha' value='".$bbdd['fecha']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='tipo' value='".$bbdd['tipo']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<textarea name='respuesta' readonly>".$bbdd['respuesta']."</textarea>";
                                echo "</td>";
                            echo "</tr>";
                            echo "</form>";
                        }

                        # Editar una fila
                            if (isset($_REQUEST['editar'])) {
                                // echo "<script language='javascript'>alert('".$_REQUEST['nombre']."');</script>";
                                echo "<div id='divedicion'>";
                                echo "    <input type='button' class='adiosedit' value='&#10007;' onclick='adiosedit()'>";
                                echo "    <form action='Foro.php' method='post' enctype='multipart/form-data'>";
                                echo "        <div class='contedicion'>";
                                echo "            <div>";
                                                        if ($_REQUEST['tipo'] == 'pregunta') {
                                echo "                Nombre:<input type='text' class='inputedit' name='editnombre' value='".$_REQUEST['nombre']."' required><br>";
                                                        }
                                                        if ($_REQUEST['tipo'] == 'pregunta') {
                                echo "                Fecha:<input type='datetime' class='inputedit' name='editfecha' value='".$_REQUEST['fecha']."' required><br>";
                                                        }
                                echo "                Comentario:<br><textarea class='textareaedit' name='editcomentario' class='inputedit' rows='5'>".$_REQUEST['comentario']."</textarea>";
                                echo "            </div>";
                                echo "            <div>";
                                                        if ($_REQUEST['tipo'] == 'opinion') {
                                echo "                Nombre:<input type='text' class='inputedit' name='editnombre' value='".$_REQUEST['nombre']."' required><br>";
                                                        }
                                echo "                Apellido:<input type='text' name='editapellido' value='".$_REQUEST['apellido']."' class='inputedit' required><br>";
                                echo "                Tipo:<select name='edittipo' class='inputedit'>";
                                                        if ($_REQUEST['tipo'] == 'opinion') {
                                echo "                      <option value='opinion'>opinion</option>";
                                echo "                      <option value='pregunta'>pregunta</option>";
                                                        }
                                                        elseif ($_REQUEST['tipo'] == 'pregunta') {
                                echo "                      <option value='pregunta'>pregunta</option>";
                                echo "                      <option value='opinion'>opinion</option>";
                                                        }
                                echo "                </select><br>";
                                                            if ($_REQUEST['tipo'] == 'opinion') {
                                    echo "                Fecha:<input type='datetime' class='inputedit' name='editfecha' value='".$_REQUEST['fecha']."' required><br>";
                                                            }
                                                        if ($_REQUEST['tipo'] == 'pregunta') {
                                echo "                      Respuesta:<br><textarea name='editrespuesta' class='textareaedit' rows='5'>".$_REQUEST['respuesta']."</textarea>";
                                                        }
                                echo "            </div>";
                                echo "                <input type='hidden' name='id' value='".$_REQUEST['id']."'>";
                                echo "            <input type='submit' class='modificar' name='modificar' value='Modificar'>";
                                echo "        </div>";
                                echo "    </form>";
                                echo "</div>";
                            
                            }
                            # Confirmar edición
                                if (isset($_REQUEST['modificar'])) {
                                
                                    $nombre = ucwords(trim(strip_tags($_REQUEST['editnombre'])));
                                    $apellido = ucwords(trim(strip_tags($_REQUEST['editapellido'])));
                                    $fecha = $_REQUEST['editfecha'];
                                    $comentario = ucwords(trim(strip_tags($_REQUEST['editcomentario'])));
                                    $tipo = $_REQUEST['edittipo'];
                                    $respuesta = ucwords(trim(strip_tags($_REQUEST['editrespuesta'])));
                                    
                                            if (strlen($nombre) > 2 && strlen($apellido) && !empty($fecha) && strlen($comentario) > 10) {
                                                    
                                                if (strlen($respuesta) == 0) {
                                                    $query = "update foro set nombre = '$nombre', apellido = '$apellido', fecha = '$fecha', comentario = '$comentario', tipo = '$tipo' where id = '".$_REQUEST['id']."'";
                                                }
                                                else {
                                                    $query = "update foro set nombre = '$nombre', apellido = '$apellido', fecha = '$fecha', comentario = '$comentario', tipo = '$tipo', respuesta = '$respuesta' where id = '".$_REQUEST['id']."'";
                                                }
                                                     echo $query;

                                                    if(mysqli_query($conexion,$query)) {
                                                        ?>
                                                            <script language="javascript">Swal.fire('¡Actualizado!','Los datos se han actualizado correctamente','success');</script>
                                                        <?php
                                                    }
                                                    else { ?>
                                                        <script language="javascript">Swal.fire('Error...','No se ha podido realizar la actualización','error');</script>
                                                    <?php }
                                            }
                                            else {
                                                ?>
                                                    <script language="javascript">Swal.fire('!Error¡','Se han quedado campos vacíos','error');</script>
                                                <?php
                                            }
                                }
                            # Eliminar un producto
                                if (isset($_REQUEST['borrar'])) {
                                    
                                    echo "<div id='divborrar'>";
                                    echo "  <form action='Foro.php' method='post'>";
                                    echo "      <p>¿Estás seguro de que quieres borrar este artículo?</p>";
                                    echo "      <input type='hidden'name='id' value='".$_REQUEST['id']."'>";
                                    echo "      <input type='button' value='Cancelar' class='cancelar' onclick='adiosborrar()'>";
                                    echo "      <input type='submit' name='confirmar' value='Confirmar' class='confirmar'>";
                                    echo "  </form>";
                                    echo "</div>";
                                    
                                }
                                if (isset($_REQUEST['confirmar'])) {
                                    
                                    $query = "delete from foro where id like '".$_REQUEST['id']."'";
                                    $consulta = mysqli_query($conexion, $query);

                                    if ($consulta) {
                                        ?>
                                            <script language="javascript">Swal.fire('Artículo eliminado','Se ha borrado el artículo de la base de datos','success');</script>
                                        <?php
                                    }
                                    else {
                                        ?>
                                            <script language="javascript">Swal.fire('!Error¡','Ha ocurrido un error y no se ha borrado el artículo','error');</script>
                                        <?php
                                    }

                                }
                    }
                    else {
                        echo "<p class='alertas'>Actualmente no hay datos</p>";
                    }

                ?>

                </table>
                </form>
            </div>
        </main>
    </body>
</html>
<?php
    mysqli_close($conexion);
?>