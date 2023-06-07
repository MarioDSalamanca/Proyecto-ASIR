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
            <form action="Componentes.php" method="post" enctype="multipart/form-data">
                <div class="botones">
                    <input type="button" class="insertar" value="Insertar nuevo producto" onclick="newrow()"><br>
                    <div id="newinsert">
                        <input type='text' class="newdatos" name='newnombre' placeholder="nombre" required>
                        <input type='text' class="newdatos" name='newespecificación' placeholder="especificación" required>
                        <input type='number' class="newdatos" name='newprecio' placeholder="precio" required>
                        <input type='text' class="newdatos" name='newempresa' placeholder="empresa" required>
                        <input type='text' class='newdatos' name='newtabla' placeholder="tabla" required><br>
                        <input type='text' class="newdatos" name='newgrupo' placeholder="grupo" required>
                        <input type='text' class="newdatos" name='newtipo' placeholder="tipo" required>
                        <input type='number' class="newdatos" name='newcantidad' placeholder="cantidad (stock)" required>
                        <input type="hidden" name="tamaño" value="100000">
                        <input type="file" name="imagen" required>
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
                        Especificación
                    </th>
                    <th>
                        Precio &#8364;
                    </th>
                    <th>
                        Empresa
                    </th>
                    <th>
                        Grupo
                    </th>
                    <th>
                        Tipo
                    </th>
                    <th>
                        Cantidad (stock)
                    </th>
                    <th>
                        Imagen
                    </th>
                    <th>
                        Tabla
                    </th>
                <?php
                    # Conexión con el servidor
                    include "../servidor.php";

                    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                    $query = "select * from Componentes order by tipo";
                    $consulta = mysqli_query($conexion, $query);
                    $rows = mysqli_num_rows($consulta);
                    
                    if ($rows > 0) {

                        for ($i = 0; $i < $rows; $i++) {

                            $bbdd = mysqli_fetch_array($consulta);

                            echo "<form action='Componentes.php' method='post'>";
                            echo "<tr>";
                                echo "<td width='7%'>";
                                    echo "<input type='submit' class='editar' name='editar' value='Editar'>";
                                    echo "<input type='submit' class='editar' name='borrar' value='Borrar'>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='id' value='".$bbdd['id']."' disabled>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='nombre' value='".$bbdd['nombre']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='especificación' value='".$bbdd['especificación']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='number' name='precio' value='".$bbdd['precio']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='empresa' value='".$bbdd['empresa']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='grupo' value='".$bbdd['grupo']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='tipo' value='".$bbdd['tipo']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='number' name='cantidad' value='".$bbdd['cantidad']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='imagen' value='".$bbdd['imagen']."' readonly>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='text' name='tabla' value='".$bbdd['tabla']."' readonly>";
                                echo "</td>";
                            echo "</tr>";
                            echo "</form>";
                        }

                        # Inserción de un dato nuevo
                            if (isset($_REQUEST['insertar'])) {
                                
                                $nombre = ucwords(trim(strip_tags($_REQUEST['newnombre'])));
                                $especificación = ucwords(trim(strip_tags($_REQUEST['newespecificación'])));
                                $precio = $_REQUEST['newprecio'];
                                $empresa = ucwords(trim(strip_tags($_REQUEST['newempresa'])));
                                $grupo = ucwords(trim(strip_tags($_REQUEST['newgrupo'])));
                                $tipo = ucwords(trim(strip_tags($_REQUEST['newtipo'])));
                                $cantidad = $_REQUEST['newcantidad'];
                                $tabla = $_REQUEST['newtabla'];
                                
                                
                                # Subir foto al servidor

                                    $copiaFichero = false;

                                    # Copia de fichero en directorio tmp
                                    # Para evitar la unicidad de nombre se añade una marca de tiempo

                                        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                                            $nombreDirectorio = "../Fotos_Productos/Componentes/".$grupo."/".$tipo."/";
                                            $nombreFichero = $_FILES['imagen']['name'];
                                            $copiaFichero = true;

                                            # Si ya existe un archivo con ese nombre se sobreescribe

                                                $ruta = $nombreDirectorio . $nombreFichero;
                                                if (is_file($ruta)) {
                                                    $id = time();
                                                    $nombreFichero = $id . "-" . $nombreFichero;
                                                    // echo "--" . $nombreFichero . "--";
                                                }
                                        }
                                        
                                    # Si supera el límite de tamaño establecido

                                        elseif ($_FILES['imagen']['error'] == UPLOAD_ERR_FORM_SIZE) {
                                            $maxsize = $_REQUEST['tamaño'];
                                            ?>
                                                <script language="javascript">Swal.fire('Incompleto!','El tamaño de la imagen supera el límite establecido','error');</script>
                                            <?php }
                                        
                                    # No se ha introducido ningún fichero

                                        if ($_FILES['imagen']['name'] == "") {
                                            $nombreFichero = '';
                                            
                                            ?>
                                                <script language="javascript">Swal.fire('Incompleto!','Falta por añadir una imagen del producto','error');</script>
                                            <?php }
                                        
                                        else {
                                            
                                            if (strlen($nombre) > 2 && strlen($especificación) > 2 && !empty($precio) && !empty($empresa) && strlen($grupo) > 2 && strlen($tipo) > 2 && !empty($cantidad)) {
                                                
                                                if ($copiaFichero) {
                                                    move_uploaded_file($_FILES['imagen']['tmp_name'], $nombreDirectorio . $nombreFichero);
                                                }
                                
                                                # Conexión con el servidor
                                                    include "../servidor.php";
                                
                                                    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                                
                                                    $query = "insert into Componentes values (null, '$nombre', '$especificación', '$precio', '$empresa', '$grupo', '$tipo', '$cantidad', '$nombreFichero', '$tabla')";
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
                            }

                        # Editar una fila
                            if (isset($_REQUEST['editar'])) {
                                // echo "<script language='javascript'>alert('".$_REQUEST['nombre']."');</script>";
                                echo "<div id='divedicion'>";
                                echo "    <input type='button' class='adiosedit' value='&#10007;' onclick='adiosedit()'>";
                                echo "    <form action='Componentes.php' method='post' enctype='multipart/form-data'>";
                                echo "        <div class='contedicion'>";
                                echo "            <div>";
                                echo "                Nombre:<input type='text' class='inputedit' name='editnombre' value='".$_REQUEST['nombre']."' required><br>";
                                echo "                Pecio:<input type='number' class='inputedit' name='editprecio' value='".$_REQUEST['precio']."' required><br>";
                                echo "                Grupo:<input type='text' class='inputedit' name='editgrupo' value='".$_REQUEST['grupo']."' required><br>";
                                echo "                Stock:<input type='number' class='inputedit' name='editcantidad' value='".$_REQUEST['cantidad']."' required>";
                                echo "            </div>";
                                echo "            <div>";
                                echo "                Especificación:<input type='text' class='inputedit' name='editespecificación' value='".$_REQUEST['especificación']."' required><br>";
                                echo "                Empresa:<input type='text' class='inputedit' name='editempresa' value='".$_REQUEST['empresa']."' required><br>";
                                echo "                Tipo:<input type='text' class='inputedit' name='edittipo' value='".$_REQUEST['tipo']."' required><br>";
                                echo "                <input type='hidden' name='tamaño' value='100000'>";
                                echo "                Imagen:<input type='file' class='fileedit' name='editimagen' value='".$_REQUEST['imagen']."'><br>";
                                echo "                Tabla:<input type='text' class='inputedit' name='edittabla' value='".$_REQUEST['tabla']."' required>";
                                echo "            </div>";
                                echo "                <input type='hidden' name='especificación' value='".$_REQUEST['especificación']."'>";
                                echo "                <input type='hidden' name='imagen' value='".$_REQUEST['imagen']."'>";
                                echo "            <input type='submit' class='modificar' name='modificar' value='Modificar'>";
                                echo "        </div>";
                                echo "    </form>";
                                echo "</div>";
                            
                            }
                            # Confirmar edición
                                if (isset($_REQUEST['modificar'])) {
                                
                                    $nombre = ucwords(trim(strip_tags($_REQUEST['editnombre'])));
                                    $especificación = ucwords(trim(strip_tags($_REQUEST['editespecificación'])));
                                    $precio = $_REQUEST['editprecio'];
                                    $empresa = ucwords(trim(strip_tags($_REQUEST['editempresa'])));
                                    $grupo = ucwords(trim(strip_tags($_REQUEST['editgrupo'])));
                                    $tipo = ucwords(trim(strip_tags($_REQUEST['edittipo'])));
                                    $cantidad = $_REQUEST['editcantidad'];
                                    $tabla = $_REQUEST['edittabla'];
                                    
                                    # Subir foto al servidor

                                        $copiaFichero = false;

                                        # Copia de fichero en directorio tmp
                                        # Para evitar la unicidad de nombre se añade una marca de tiempo

                                            if (is_uploaded_file($_FILES['editimagen']['tmp_name'])) {
                                                $nombreDirectorio = "../Fotos_Productos/Componentes/".$grupo."/".$tipo."/";
                                                $nombreFichero = $_FILES['editimagen']['name'];
                                                $copiaFichero = true;

                                                # Si ya existe un archivo con ese nombre se sobreescribe

                                                    $ruta = $nombreDirectorio . $nombreFichero;
                                                    if (is_file($ruta)) {
                                                        $id = time();
                                                        $nombreFichero = $id . "-" . $nombreFichero;
                                                        // echo "--" . $nombreFichero . "--";
                                                    }
                                            }
                                            
                                        # Si supera el límite de tamaño establecido

                                            elseif ($_FILES['editimagen']['error'] == UPLOAD_ERR_FORM_SIZE) {
                                                $maxsize = $_REQUEST['tamaño'];
                                                ?>
                                                    <script language="javascript">Swal.fire('Incompleto!','El tamaño de la imagen supera el límite establecido','error');</script>
                                                <?php }
                                            
                                        # No se ha introducido ningún fichero

                                            if ($_FILES['editimagen']['name'] == "") {
                                                $nombreFichero = $_REQUEST['imagen'];
                                                
                                            }
                                            if (strlen($nombre) > 2 && strlen($especificación) > 2 && !empty($precio) && !empty($empresa) && strlen($grupo) > 2 && strlen($tipo) > 2 && !empty($cantidad)) {
                                                
                                                if ($copiaFichero) {
                                                    move_uploaded_file($_FILES['editimagen']['tmp_name'], $nombreDirectorio . $nombreFichero);
                                                }
                                
                                                    $query = "update Componentes set nombre = '$nombre', especificación = '$especificación', precio= '$precio', empresa = '$empresa', grupo = '$grupo', tipo = '$tipo', cantidad = '$cantidad', imagen = '$nombreFichero', tabla = '$tabla' where especificación = '".$_REQUEST['especificación']."'";
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
                                    echo "  <form action='Componentes.php' method='post'>";
                                    echo "      <p>¿Estás seguro de que quieres borrar este artículo?</p>";
                                    echo "      <input type='hidden'name='especificación' value='".$_REQUEST['especificación']."'>";
                                    echo "      <input type='button' value='Cancelar' class='cancelar' onclick='adiosborrar()'>";
                                    echo "      <input type='submit' name='confirmar' value='Confirmar' class='confirmar'>";
                                    echo "  </form>";
                                    echo "</div>";
                                    
                                }
                                if (isset($_REQUEST['confirmar'])) {
                                    
                                    $query = "delete from Componentes where especificación like '".$_REQUEST['especificación']."'";
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