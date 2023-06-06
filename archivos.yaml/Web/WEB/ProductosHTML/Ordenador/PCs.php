<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Twenty-first</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../codigoCSS.css">
        <script src="../../JS.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript">
            function buscar_prod(buscar) {
                if (buscar.length > 0) {
                    document.getElementById('buscar_1').style = "background-color: white";
                    document.getElementById('main').style = "opacity: 0.5";
                    document.body.style = "background-color: gray";
                    var parametros = {"buscar":buscar};
                    $.ajax ({
                        data:parametros,
                        type:'Post',
                        url:'../../buscador.php',
                        success:function(data) {
                            document.getElementById('datos_buscador').innerHTML = data;
                        }
                    });
                }
                else {
                    document.getElementById('buscar_1').style = "background-color: transparent";
                    document.getElementById('main').style = "opacity: 1";
                    document.body.style = "background-color: lightgray";
                    document.getElementById('datos_buscador').innerHTML = '';
                }
            }
        </script>
    </head>
    <body>
    <header>
            <table>
                <tr>
                    <td width="10%">
                        <img class="indice" src="../../IndexFotos/desplegable.jpg" onclick="menu()">
                    </td>
                    <td width="20%">
                        <a href="../../index.php"><img class="logo" src="../../IndexFotos/Logo.jpg"></a>
                    </td>
                    <td width="40%">
                        <div class="buscador">
                            <input onkeyup="buscar_prod($('#buscar_1').val());" type="text" id="buscar_1" name="buscar_1" placeholder="Buscar...">
                        </div>
                    </td>
                    <td width="20%">
                        <?php
                            if (empty($_SESSION['correo'])) {
                                echo "<a href='../../Cuenta/login.php'><img class='iconoperfil' src='../../IndexFotos/perfil.png' title='Inicio Sesión'></a>";
                            }
                            else {
                                
                                # Conexión con el servidor
                                    include "../../servidor.php";

                                    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);      

                                # Consulta
                                    $query = "select * from usuarios where correo like '" . $_SESSION['correo'] . "'";
                                    // echo $query;

                                # Ejecutar consulta
                                    $consulta = mysqli_query($conexion,$query);
                                    
                                # Sacar nombre de la bbdd
                                    $bbdd = mysqli_fetch_array($consulta);

                                    $nombre = $bbdd['nombre'];

                                echo "<a href='../../Cuenta/perfil.php'><img class='iconoperfil_b' src='../../IndexFotos/perfil.png' title='Perfil'></a>";
                                echo "<div class='spanperfil'>";
                                    echo "<p>Bienvenid@</p><p class='nombreperfil'>" . $nombre . "</p>";
                                echo "</div>";
                            }
                        ?>
                    </td>
                    <td width="10%">
                        <a href="/PHP/carrito.php"><img class="iconocarrito" src="../../IndexFotos/carrito.png" title="Cesta"></a>
                    </td>
                </tr>
            </table>
            <div id="datos_buscador"></div>
            <div id="menudesplegable" onmouseleave="adiosmenu()">
                    <div id="menu">
                        <table width="100%">
                            <th class="th"><h3><i>NUESTROS PRODUCTOS</i></h3></th>
                            <tr>
                                <td>
                                    <strong><p class="titulomenu" onclick="list1()">Componentes</p></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong><p class="titulomenu" onclick="list2()">Consolas</p></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong><p class="titulomenu" onclick="list3()">Móviles</p></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong><p class="titulomenu" onclick="list4()">Ordenadores</p></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong><p class="titulomenu" onclick="list5()">Portatiles</p></strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong><p class="titulomenu" onclick="list6()">Televisóres</p></strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="listamenu" id="listamenu1">
                        <table width="90%" height="60%">
                            <tr>
                                <td>
                                    <p class="submenu"><strong>Comunes</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <a href="../../ProductosHTML/Componente/Altavoces.php"><p class="componentes">Altavoces</p></a>
                                    <a href="../../ProductosHTML/Componente/Auriculares.php"><p class="componentes">Auriculares</p></a>
                                    <a href="../../ProductosHTML/Componente/CPU.php"><p class="componentes">CPU</p></a>
                                    <a href="../../ProductosHTML/Componente/Ratones.php"><p class="componentes">Ratones</p></a>
                                    <a href="../../ProductosHTML/Componente/Ud.Almacenamiento.php"><p class="componentes">Ud.Almacenamiento</p></a>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="submenu"><strong>Ordenadores</strong></p>
                                </td>
                            <tr>
                            <tr>
                                <td width="50%">
                                    <a href="../../ProductosHTML/Componente/Carcasas.php"><p class="componentes">Carcasas</p></a>
                                    <a href="../../ProductosHTML/Componente/FA.php"><p class="componentes">F. Alimentación</p></a>
                                    <a href="../../ProductosHTML/Componente/Memorias-RAM-O.php"><p class="componentes">Memorias RAM</p></a>
                                    <a href="../../ProductosHTML/Componente/Monitores.php"><p class="componentes">Monitores</p></a>
                                    <a href="../../ProductosHTML/Componente/Teclados.php"><p class="componentes">Teclados</p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="submenu"><strong>Portátiles</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Componente/Fundas.php"><p class="componentes">Fundas</p></a>
                                    <a href="../../ProductosHTML/Componente/Memorias-RAM-P.php"><p class="componentes">Memorias RAM</p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="listamenu" id="listamenu2">
                        <table width="90%" height="60%" style="margin-top: 10%;">
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Consola/Consolas.php"><p class="submenu"><strong>Ver todo</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Consola/PS.php"><p class="submenu"><strong>Play Station</strong></p></a>
                                </td>
                            </tr>
                                <td>
                                    <a href="../../ProductosHTML/Consola/Xbox.php"><p class="submenu"><strong>Xbox</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Consola/Nintendo.php"><p class="submenu"><strong>Nintendo</strong></p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="listamenu" id="listamenu3">
                        <table width="90%" height="60%" style="margin-top: 10%;">
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Móvil/Móviles.php"><p class="submenu"><strong>Ver todo</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Móvil/Samsung.php"><p class="submenu"><strong>Samsung</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Móvil/iPhone.php"><p class="submenu"><strong>iPhone</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Móvil/Xiaomi.php"><p class="submenu"><strong>Xiaomi</strong></p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="listamenu" id="listamenu4">
                        <table width="90%" height="60%" style="margin-top: 10%;">
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Ordenador/PCs.php"><p class="submenu"><strong>Ver todo</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Ordenador/PC-WorkStatio.php"><p class="submenu"><strong>WorkStation</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Ordenador/PC-Gaming.php"><p class="submenu"><strong>Gaming</strong></p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="listamenu" id="listamenu5">
                        <table width="90%" height="60%" style="margin-top: 10%;">
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Portátil/Portátiles.php"><p class="submenu"><strong>Ver todo</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Portátil/Portátiles-WorkStatio.php"><p class="submenu"><strong>WorkStation</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Portátil/Portátiles-Gaming.php"><p class="submenu"><strong>Gaming</strong></p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="listamenu" id="listamenu6">
                        <table width="90%" height="60%" style="margin-top: 10%;">
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Televisión/TVs.php"><p class="submenu"><strong>Ver todo</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Televisión/TV32-56.php"><p class="submenu"><strong>Pulgadas 32" - 56"</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Televisión/TV57-76.php"><p class="submenu"><strong>Pulgadas 57" - 76"</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="../../ProductosHTML/Televisión/TV77-86.php"><p class="submenu"><strong>Pulgadas 77" - 86"</strong></p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
            </div>
            <div id="filtros">
                    <input type="button" value="Cerrar" onclick="aplicar()" class="cancelar">
                <form action="./PCs.php" method="post">
                <table class="tablafilter" width="80%">
                    <input type="button" value="Borrar" onclick="reset()" class="reset">
                        <th class="thfiltros">Filtros</th>
                    <tr>
                        <td>
                            <p class="pfilter">Precio: <input type="number" name="precio1" class="filtroprecio" placeholder="50"> - 
                            <input type="number" name="precio2" class="filtroprecio" placeholder="2000"></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="100%">
                            <p class="pfilter">Ordenar:
                            <select name="orden" id="orden" class="select">
                                <option value="0">Más caro</option>
                                <option value="1">Más barato</option>
                            </select>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="marcas">Modelo:
                            <p><input type="radio" name="modelo" value="WorkStation" class="empresas"> WorkStation</p>
                            <p><input type="radio" name="modelo" value="Gaming" class="empresas"> Gaming</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="marcas">Marcas:
                            <p><input type="radio" name="empresa" value="HP" class="empresas"> HP</p>
                            <p><input type="radio" name="empresa" value="Lenovo" class="empresas"> Lenovo</p>
                            <p><input type="radio" name="empresa" value="MSI" class="empresas"> MSI</p>
                            <p><input type="radio" name="empresa" value="PcVIP" class="empresas"> PcVIP</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <div>
                    <input type="submit" value="Aplicar" name="aplicar" onclick="aplicar()" class="aplicar">
                </div>
                </form>
            </div>
        </header>
        <main id="main"> 
            <button class="botonfiltro" onclick="divfiltros()">Filtros</button>
            <div class="divcontenido">
                <?php
                    
                    # Sin filtros
                        if (!isset($_REQUEST['aplicar'])) {

                            #Conexion con el servidor y la bbdd
                                include "../../servidor.php";

                                $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                            # Consulta
                                $query = "select * from PCs";

                            # Ejecutar consulta
                                $consulta = mysqli_query($conexion,$query) or die ("Fallo en la consulta");

                            # Nº de filas de la consulta
                            $rows = mysqli_num_rows($consulta);

                            if ($rows > 0) {

                                for ($i = 0; $i < $rows; $i++) {
        
                                    $bbdd = mysqli_fetch_array($consulta);
        
                                    echo "<div class='contenido'>";
                                        echo "<a href='" . $bbdd['nombre'] . ".php'><img src='../../Fotos_Productos/".$bbdd['tabla']."/" . $bbdd['imagen'] . "' class='imagenescontenido'>";
                                        echo "<p class='nombre'>" . $bbdd['nombre'] . "</p>";
                                        echo "<p class='precio'>" . $bbdd['precio'] . " €</p></a>";
                                    echo "</div>";
                                }
                            }
                            else {
                                echo "<p class='alertas_prod'>Actualmente no hay contenido, inténtelo más tarde.</p>";
                            }
                        }
                    
                    # Con filtros
                        if (isset($_REQUEST['aplicar'])) {
                            
                            # Variables
                            if (!empty(is_numeric($_REQUEST['precio1']))) {
                                $precio1 = $_REQUEST['precio1'];
                            }
                            else {
                                $precio1 = 50;
                            }
                            if (!empty(is_numeric($_REQUEST['precio2']))) {
                                $precio2 = $_REQUEST['precio2'];
                            }
                            else {
                                $precio2 = 6000;
                            }
                            $orden = $_REQUEST['orden'];
                            $modelo = $_REQUEST['modelo'];
                            $empresa = $_REQUEST['empresa'];

                            #Conexion con el servidor y la bbdd
                            include "../../servidor.php";

                            # Conectar con el servidor
                            $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                            # Seleccionar la bbdd
                            mysqli_select_db($conexion, "TWT_First") or die ("No se puede acceder a la base de datos en este momento, inténtelo más tarde");

                            # Orden por Más caro
                            if ($orden == '0' && ($precio1 < $precio2)) {
                                if (!empty($modelo)) {
                                    if (!empty($empresa)) {

                                        $query = "select * from PCs where función like '$modelo' and empresa like '$empresa' and precio between '$precio1' and '$precio2' order by precio desc";
                                    }
                                    else {

                                        $query = "select * from PCs where función like '$modelo' and precio between '$precio1' and '$precio2' order by precio desc";
                                    }
                                }
                                else {
                                    if (!empty($empresa)) {

                                        $query = "select * from PCs where empresa like '$empresa' and precio between '$precio1' and '$precio2' order by precio desc";
                                    }
                                    else {

                                        $query = "select * from PCs where precio between '$precio1' and '$precio2' order by precio desc";
                                    }
                                }
                            }
                            # Orden por Más barato
                            elseif ($orden == '1') {
                                if (!empty($modelo)) {
                                    if (!empty($empresa)) {

                                        $query = "select * from PCs where función like '$modelo' and empresa like '$empresa' and precio between '$precio1' and '$precio2' order by precio";
                                    }
                                    else {

                                        $query = "select * from PCs where función like '$modelo' and precio between '$precio1' and '$precio2' order by precio";
                                    }
                                }
                                else {
                                    if (!empty($empresa)) {

                                        $query = "select * from PCs where empresa like '$empresa' and precio between '$precio1' and '$precio2' order by precio";
                                    }
                                    else {

                                        $query = "select * from PCs where precio between '$precio1' and '$precio2' order by precio";
                                    }
                                }
                            }
                            
                            # Ejecutar consulta
                                $consulta = mysqli_query($conexion,$query) or die ("Fallo en la consulta");

                            # Nº de filas de la consulta
                            $rows = mysqli_num_rows($consulta);

                            if ($rows > 0) {

                                for ($i = 0; $i < $rows; $i++) {
                
                                    $bbdd = mysqli_fetch_array($consulta);
                
                                    echo "<div class='contenido'>";
                                        echo "<a href='" . $bbdd['nombre'] . ".php'><img src='../../Fotos_Productos/".$bbdd['tabla']."/" . $bbdd['imagen'] . "' class='imagenescontenido'>";
                                        echo "<p class='nombre'>" . $bbdd['nombre'] . "</a></p>";
                                        echo "<p class='precio'>" . $bbdd['precio'] . " €</p>";
                                    echo "</div>";
                                }
                            }
                            else {
                                echo "<p class='alertas_prod'>No se encontraron resultados</p>";
                            }
                        }
                        
                        mysqli_close($conexion);

                ?>
            </div>
        </main>
        <footer>
            <div>
                <table class="foro">
                    <tr>
                        <td class="td-pie-inicio">
                            <ul>
                                <li><p>Contacta con nosotros: <b>mario.dieguez.asir@salesianosatocha.com</b></p><br>
                                <li><p>Visita nuestro <b>foro</b> de preguntas haciendo click <strong><a href="../../foro.html" style="color:white;">aquí</a></strong></p><br>
                                <li><p>Más sobre el desarrollador del proyecto haciendo click <strong><a href="../..    /CV_Mario_Dieguez.pdf" style="color:white;">aquí</a></strong></p>
                            </ul>
                        </td>
                        <td>
                            <div class="icon-red">
                                <p>Síguenos para más:</p><br>
                                <a href="https://www.facebook.com/profile.php?id=100091928108594" target="_blank"><img class="redes" src="../../IndexFotos/facebook.png" alt=""></a>
                                <a href="https://www.instagram.com/twtfirst2023/" target="_blank"><img class="redes" src="../../IndexFotos/instagram.png" alt=""></a>
                                <a href="https://twitter.com/twtfirst2023" target="_blank"><img class="redes" src="../../IndexFotos/twiter.png" alt=""></a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </footer>
    </body>
</html>