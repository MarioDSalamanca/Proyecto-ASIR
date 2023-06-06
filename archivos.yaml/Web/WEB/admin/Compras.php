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
                        Usuario
                    </th>
                    <th>
                        Producto
                    </th>
                    <th>
                        Tabla
                    </th>
                    <th>
                        Cantidad
                    </th>
                    <th>
                        Precio &#8364;
                    </th>
                    <th>
                        Fecha
                    </th>
                <?php
                    # Conexión con el servidor
                    include "../servidor.php";

                    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                    $query = "select * from compras order by fecha";
                    $consulta = mysqli_query($conexion, $query);
                    $rows = mysqli_num_rows($consulta);
                    
                    if ($rows > 0) {

                        for ($i = 0; $i < $rows; $i++) {

                            $bbdd = mysqli_fetch_array($consulta);

                            echo "<form action='Compras.php' method='post'>";
                            echo "<tr>";
                                echo "<td width='7%'>";
                                    echo "<input type='submit' class='editar' name='editar' value='Editar'>";
                                    echo "<input type='submit' class='editar' name='borrar' value='Borrar'>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='number' name='id' value='".$bbdd['id']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='email' name='correo' value='".$bbdd['correo']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='nombre' value='".$bbdd['nombre_prod']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='tabla' value='".$bbdd['tabla']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='number' name='cantidad' value='".$bbdd['cantidad']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='number' name='importe' value='".$bbdd['importe']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='date' name='fecha' value='".$bbdd['fecha']."' readonly>";
                                echo "</td>";
                            echo "</tr>";
                            echo "</form>";
                        }

                        # Editar una fila
                            if (isset($_REQUEST['editar'])) {
                                // echo "<script language='javascript'>alert('".$_REQUEST['nombre']."');</script>";
                                echo "<div id='divedicion'>";
                                echo "    <input type='button' class='adiosedit' value='&#10007;' onclick='adiosedit()'>";
                                echo "    <form action='compras.php' method='post' enctype='multipart/form-data'>";
                                echo "        <div class='contedicion'>";
                                echo "            <div>";
                                echo "                Nombre:<input type='email' class='inputedit' name='editcorreo' value='".$_REQUEST['correo']."' required><br>";
                                echo "                Pecio:<input type='text' class='inputedit' name='edittabla' value='".$_REQUEST['tabla']."' required><br>";
                                echo "                Stock:<input type='number' class='inputedit' name='editcantidad' value='".$_REQUEST['cantidad']."' required>";
                                echo "            </div>";
                                echo "            <div>";
                                echo "                Especificación:<input type='text' class='inputedit' name='editnombre' value='".$_REQUEST['nombre']."' required><br>";
                                echo "                Empresa:<input type='date' class='inputedit' name='editfecha' value='".$_REQUEST['fecha']."' required><br>";
                                echo "                Tabla:<input type='number' class='inputedit' name='editimporte' value='".$_REQUEST['importe']."' required>";
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
                                    $correo = trim(strip_tags($_REQUEST['editcorreo']));
                                    $importe = is_numeric($_REQUEST['editimporte']);
                                    $fecha = $_REQUEST['editfecha'];
                                    $cantidad = is_numeric($_REQUEST['editcantidad']);
                                    $tabla = $_REQUEST['edittabla'];
                                    
                                    if (strlen($nombre) > 2 && filter_var($correo, FILTER_VALIDATE_EMAIL) && strlen($tabla) > 2 && !empty($importe) && !empty($cantidad) && !empty($fecha)) {

                                        $query = "update compras set nombre_prod = '$nombre', correo = '$correo', importe= '$importe', fecha = '$fecha', cantidad = '$cantidad', tabla = '$tabla' where id = '".$_REQUEST['id']."'";
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
                                    echo "  <form action='compras.php' method='post'>";
                                    echo "      <p>¿Estás seguro de que quieres borrar este artículo?</p>";
                                    echo "      <input type='hidden'name='id' value='".$_REQUEST['id']."'>";
                                    echo "      <input type='button' value='Cancelar' class='cancelar' onclick='adiosborrar()'>";
                                    echo "      <input type='submit' name='confirmar' value='Confirmar' class='confirmar'>";
                                    echo "  </form>";
                                    echo "</div>";
                                    
                                }
                                if (isset($_REQUEST['confirmar'])) {
                                    
                                    $query = "delete from compras where id like '".$_REQUEST['id']."'";
                                    $consulta = mysqli_query($conexion, $query);

                                    if ($consulta) {
                                        ?>
                                            <script language="javascript">Swal.fire('Artículo eliminado','Se ha borrado el registro de la base de datos','success');</script>
                                        <?php
                                    }
                                    else {
                                        ?>
                                            <script language="javascript">Swal.fire('!Error¡','Ha ocurrido un error y no se ha borrado el registro','error');</script>
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