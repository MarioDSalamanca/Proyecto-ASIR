<?php
    session_start();
    
    if (isset($_REQUEST['añadir']) && $_SESSION['correo'] == null) {
            header("Location: ../../Cuenta/login.php");
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Twenty-first</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../codigoCSS.css">
        <script src="../../JS.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
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
                                    <a href="../../ProductosHTML/Ordenador/PC-WorkStation.php"><p class="submenu"><strong>WorkStation</strong></p></a>
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
                                    <a href="../../ProductosHTML/Portátil/Portátiles-WorkStation.php"><p class="submenu"><strong>WorkStation</strong></p></a>
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
        </header>
        <main id="main">
                <?php

                    #Conexion con el servidor y la bbdd
                        include "../../servidor.php";

                        $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                    # Consulta
                        $query = "select * from Componentes where nombre like 'Polk Reserve R350'";
                        
                    # Ejecutar consulta
                        $consulta = mysqli_query($conexion,$query) or die ("Fallo en la consulta");

                        $bbdd = mysqli_fetch_array($consulta);
                ?>
            <p class="flecha"><a href="../Componente/Altavoces.php">&#10150;</a></p>
            <form action="Polk Reserve R350.php" method="post" class="formprod">
                <input type="hidden" name="nombre" value="<?php echo $bbdd['nombre']; ?>">
                <input type="hidden" name="tabla" value="<?php echo $bbdd['tabla']; ?>">
                <input type='text' class='tituloprod' name='especificación' value="<?php echo $bbdd['especificación']; ?>" readonly>
                <hr width="80%" class="hr">
                <div class="producto">
                        <?php
                            echo "<img src='../../Fotos_Productos/Altavoz/" . $bbdd['imagen'] . "' class='imgprod'>";
                        ?>
                    <div class="divproductos">
                        <span>Precio:</span><input type="text" class="precioprod" name='precio' value="<?php echo $bbdd['precio']; ?>&euro;" readonly>
                        <p class="coloresprod">
                            <strong>Color</strong> <i>(negro por defecto)</i>:
                        </p>
                        <div class="botonescoloresprod">
                            <input type="radio" name="colorprod" id="colorprodn" value="negro" checked>
                            <label for="colorprodn" class="colorprodn">Negro</label>
                            <input type="radio" name="colorprod" id="colorprodb" value="blanco">
                            <label for="colorprodb" class="colorprodb">Blanco</label>
                            <input type="radio" name="colorprod" id="colorprodg" value="gris">
                            <label for="colorprodg" class="colorprodg">Gris</label>
                        </div>
                        <div class="cantidadprod">
                            Unidades: <input type="number" name="unidades" id="" min="1" max="20" value="1" step="1">
                        </div>
                        <input type='submit' name="añadir" class="añadircesta" value="Añadir a la cesta">
                    </div>
                </div>
            </form>
            <table class="caracteristicas">
                <th>Características del producto:</th>
                <tr>
                    <td>
                        <ul>
                            <li>Cobertura horizontal de 180º </li>
                            <li>Formación en forma de J con 32 transductores, con patrón de cobertura uniforme</li>
                            <li>SPL máximo de 128dB cuando se empareja con el sub32</li>
                            <li>Se empareja con el módulo de graves activo sub32</li>
                            <li>Mezclador integrado con preselecciones de Tonematch</li>
                            <li>Preselecciones de Eq del sistema: música en directo, música grabada y mucho más </li>
                            <li>Alimentación Phantom y conectividad Bluetooth </li>
                            <li>Control de mezclador inalámbrico a través de la aplicación L1MIX </li>
                            <li>Puerto tonematch para conexión fácil del mezclador. </li>
                            <li>Rendimiento acústico: cobertura uniforme — Formación en línea recta, con 32 transductores de neodimio de 5 cm articulados.</li>
                            <li>Cobertura: 180° H x 0° V</li>
                            <li>Baja frecuencia (-3 dB) con Sub1: 40 Hz</li>
                            <li>Baja frecuencia (-3 dB) con Sub2: 37 Hz</li>
                        </ul>
                    </td>
                </tr>
            </table>
            <table class="similares">
                <th class="thsimilares" colspan="4">Los usuarios también buscaron: </th>
                <tr>
                    <td>
                        <a href="./Bose S1 Pro.php"><img src="../../Fotos_Productos/Altavoz/Bose S1 Pro.jpg" class="imgsimilares">
                        <p class="prodsimilares">Bose S1 Pro</p></a>
                    </td>
                    <td>
                        <a href="./Bose Sub21.php"><img src="../../Fotos_Productos/Altavoz/Bose Sub21.jpg" class="imgsimilares">
                        <p class="prodsimilares">Bose Sub21</p></a>
                    </td>
                    <td>
                        <a href="Polk Reserve R600.php"><img src="../../Fotos_Productos/Altavoz/Polk Reserve R600.jpg" class="imgsimilares">
                        <p class="prodsimilares">Polk Reserve R600</p></a>
                    </td>
                    <td>
                        <a href="Sony MHC-V73D.php"><img src="../../Fotos_Productos/Altavoz/Sony MHC-V73D.jpg" class="imgsimilares">
                        <p class="prodsimilares">Sony MHC-V73D</p></a>
                    </td>
                </tr>
            </table>
        </main>
        <footer>
            <div>
                <table class="foro">
                    <tr>
                        <td class="td-pie-inicio">
                            <ul>
                                <li><p>Contacta con nosotros: <b>mario.dieguez.asir@salesianosatocha.com</b></p><br>
                                <li><p>Visita nuestro <b>foro</b> de preguntas haciendo click <strong><a href="../../../foro" style="color:white;">aquí</a></strong></p><br>
                                <li><p>Más sobre el desarrollador del proyecto haciendo click <strong><a href="../../../CV_Mario_Dieguez.pdf" style="color:white;">aquí</a></strong></p>
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

<?php

        if (isset($_REQUEST['añadir']) && $_SESSION['correo'] != null) {
            $precio = $_REQUEST['precio'];
            $color = $_REQUEST['colorprod'];
            $uds = $_REQUEST['unidades'];
            $tabla = $_REQUEST['tabla'];
            $producto = $_REQUEST['nombre'];
            
            $_SESSION['carrito'][$producto]['Precio'] = $precio;
            $_SESSION['carrito'][$producto]['Color'] = $color;
            $_SESSION['carrito'][$producto]['Unidades'] = $uds;
            $_SESSION['carrito'][$producto]['tabla'] = $tabla;

            ?>
                <script language="javascript">
                Swal.fire({
                    icon: 'info',
                    title: 'Artículo añadido al carrito:',
                    text: '<?php echo $producto ?>',
                    showConfirmButton: false,
                    timer: 2000
                })</script>
            <?php
        }
?>