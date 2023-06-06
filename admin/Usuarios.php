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
            <form action="Usuarios.php" method="post" enctype="multipart/form-data">
                <div class="botones">
                    <input type="button" class="insertar" value="Insertar nuevo producto" onclick="newrow()"><br>
                    <div id="newinsert">
                        <input type='text' class="newdatos" name='newnombre' placeholder="nombre" required>
                        <input type='text' class="newdatos" name='newapellido' placeholder="apellido" required>
                        <input type='email' class="newdatos" name='newcorreo' placeholder="correo" required>
                        <input type='text' class="newdatos" name='newclave' placeholder="clave" required>
                        <select name='newtipo'>
                            <option value="cliente">cliente</option>
                            <option value="admin">admin</option>
                        </select>
                        <input type="submit" name="insertar" value="Confirmar inserción" class="insertar2">
                    </div>
                </div>
            </form>
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
                        Correo
                    </th>
                    <th>
                        Clave
                    </th>
                    <th>
                        Tipo
                    </th>
                    <th>
                <?php
                    # Conexión con el servidor
                    include "../servidor.php";

                    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                    $query = "select * from usuarios order by tipo_usuario";
                    $consulta = mysqli_query($conexion, $query);
                    $rows = mysqli_num_rows($consulta);
                    
                    if ($rows > 0) {

                        for ($i = 0; $i < $rows; $i++) {

                            $bbdd = mysqli_fetch_array($consulta);

                            echo "<form action='Usuarios.php' method='post'>";
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
                                    echo "<input type='email' name='correo' value='".$bbdd['correo']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='clave' value='".$bbdd['clave']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='tipo' value='".$bbdd['tipo_usuario']."' readonly>";
                                echo "</td>";
                            echo "</tr>";
                            echo "</form>";
                        }

                        # Inserción de un dato nuevo
                            if (isset($_REQUEST['insertar'])) {
                                
                                $nombre = ucwords(trim(strip_tags($_REQUEST['newnombre'])));
                                $apellido = ucwords(trim(strip_tags($_REQUEST['newapellido'])));
                                $correo = $_REQUEST['newcorreo'];
                                $clave = trim(strip_tags($_REQUEST['newclave']));
                                $tipo = $_REQUEST['newtipo'];
                                                                            
                                if (strlen($nombre) > 2 && strlen($apellido) > 2 && filter_var($correo, FILTER_VALIDATE_EMAIL) && !empty($clave)) {
                                    
                                    $clave = md5($clave);

                                    # Conexión con el servidor
                                        include "../servidor.php";
                                
                                        $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                                
                                        $query = "insert into usuarios values (null, '$nombre', '$apellido', '$correo', '$clave', '$tipo')";
                                        // echo $query;

                                        if(mysqli_query($conexion,$query)) {
                                        ?>
                                            <script language="javascript">Swal.fire('¡Inserción exitosa!','Los datos se han insertado correctamente','success');</script>
                                        <?php
                                        }
                                        else { ?>
                                            <script language="javascript">Swal.fire('Error...','No se ha podido realizar la inserción','error');</script>
                                        <?php }
                                }
                                else { ?>
                                    <script language="javascript">Swal.fire('Incompleto!','No se han rellenado todos los campos requeridos para la inserción','error');</script>
                                <?php }
                            }

                        # Editar una fila
                            if (isset($_REQUEST['editar'])) {
                                // echo "<script language='javascript'>alert('".$_REQUEST['nombre']."');</script>";
                                echo "<div id='divedicion'>";
                                echo "    <input type='button' class='adiosedit' value='&#10007;' onclick='adiosedit()'>";
                                echo "    <form action='Usuarios.php' method='post' enctype='multipart/form-data'>";
                                echo "        <div class='contedicion'>";
                                echo "            <div>";
                                echo "                Nombre:<input type='text' class='inputedit' name='editnombre' value='".$_REQUEST['nombre']."' required><br>";
                                echo "                Pecio:<input type='email' class='inputedit' name='editcorreo' value='".$_REQUEST['correo']."' required><br>";
                                echo "            </div>";
                                echo "            <div>";
                                echo "                Apellido:<input type='text' class='inputedit' name='editapellido' value='".$_REQUEST['apellido']."' required><br>";
                                echo "                Clave:<input type='text' class='inputedit' name='editclave' value='".$_REQUEST['clave']."' required><br>";
                                echo "                Tipo:<select name='edittipo' class='inputedit'>";
                                                        if ($_REQUEST['tipo'] == 'cliente') {
                                echo "                      <option value='cliente'>cliente</option>";
                                echo "                      <option value='admin'>admin</option>";
                                                        }
                                                        elseif ($_REQUEST['tipo'] == 'admin') {
                                echo "                      <option value='admin'>admin</option>";
                                echo "                      <option value='cliente'>cliente</option>";
                                                        }
                                echo "                </select><br>";
                                echo "            </div>";
                                echo "                <input type='hidden' name='pass' value='".$_REQUEST['clave']."'>";
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
                                    $correo = $_REQUEST['editcorreo'];
                                    $clave = trim(strip_tags($_REQUEST['editclave']));
                                    $pass = $_REQUEST['pass'];
                                    $tipo = $_REQUEST['edittipo'];
                                    
                                    if (strlen($nombre) > 2 && strlen($apellido) > 2 && filter_var($correo, FILTER_VALIDATE_EMAIL) && !empty($clave) && strlen($tipo) > 2) {

                                        if ($pass == $clave) {
                                            $query = "update usuarios set nombre = '$nombre', apellido = '$apellido', correo= '$correo', tipo_usuario = '$tipo' where id = '".$_REQUEST['id']."'";
                                        }
                                        else {
                                            $clave = md5($clave);
                                            $query = "update usuarios set nombre = '$nombre', apellido = '$apellido', correo= '$correo', clave = '$clave', tipo_usuario = '$tipo' where id = '".$_REQUEST['id']."'";
                                        }
                                        
                                        // echo $query;
                
                                        if(mysqli_query($conexion,$query)) {
                                            ?>
                                                <script language="javascript">Swal.fire('¡Actualizado!','Los datos se han actualizado correctamente','success');</script>
                                            <?php
                                        }
                                        else { ?>
                                            <script language="javascript">Swal.fire('Error...','No se ha podido realizar la actualización','error');</script>
                                        <?php }
                                    }
                                }
                            # Eliminar un producto
                                if (isset($_REQUEST['borrar'])) {
                                    
                                    echo "<div id='divborrar'>";
                                    echo "  <form action='Usuarios.php' method='post'>";
                                    echo "      <p>¿Estás seguro de que quieres borrar este artículo?</p>";
                                    echo "      <input type='hidden'name='id' value='".$_REQUEST['id']."'>";
                                    echo "      <input type='button' value='Cancelar' class='cancelar' onclick='adiosborrar()'>";
                                    echo "      <input type='submit' name='confirmar' value='Confirmar' class='confirmar'>";
                                    echo "  </form>";
                                    echo "</div>";
                                    
                                }
                                if (isset($_REQUEST['confirmar'])) {
                                    
                                    $query = "delete from usuarios where id like '".$_REQUEST['id']."'";
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