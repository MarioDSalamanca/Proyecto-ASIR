<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Twenty-first</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./codigoCSS.css">
        <script src="./JS.js"></script>
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
                        url:'buscador.php',
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
                        <img class="indice" src="./IndexFotos/desplegable.jpg" onclick="menu()">
                    </td>
                    <td width="20%">
                        <a href="./index.php"><img class="logo" src="./IndexFotos/Logo.jpg"></a>
                    </td>
                    <form action="index.php" method="post">
                    <td width="40%">
                        <div class="buscador">
                            <input onkeyup="buscar_prod($('#buscar_1').val());" type="text" id="buscar_1" name="buscar_1" placeholder="Buscar...">
                        </div>
                    </td>
                    </form>
                    <td width="20%">
                        <?php
                            if (empty($_SESSION['correo'])) {
                                echo "<a href='./Cuenta/login.php'><img class='iconoperfil' src='./IndexFotos/perfil.png' title='Inicio Sesión'></a>";
                            }
                            else {
                                
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

                                    $tipo_usuario = $bbdd['tipo_usuario'];
                                    $nombre = $bbdd['nombre'];
                                
                                    if ($tipo_usuario == 'admin') {
                                        session_destroy();
                                        echo "<a href='./Cuenta/login.php'><img class='iconoperfil' src='./IndexFotos/perfil.png' title='Inicio Sesión'></a>";
                                    }
                                    else {
                                        echo "<a href='./Cuenta/perfil.php'><img class='iconoperfil_b' src='./IndexFotos/perfil.png' title='Perfil'></a>";
                                        echo "<div class='spanperfil'>";
                                            echo "<p>Bienvenid@</p><p class='nombreperfil'>" . $nombre . "</p>";
                                        echo "</div>";
                                    }

                            }
                        ?>
                    </td>
                    <td width="10%">
                        <a href="/PHP/carrito.php"><img class="iconocarrito" src="./IndexFotos/carrito.png" title="Cesta"></a>
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
                                    <a href="./ProductosHTML/Componente/Altavoces.php"><p class="componentes">Altavoces</p></a>
                                    <a href="./ProductosHTML/Componente/Auriculares.php"><p class="componentes">Auriculares</p></a>
                                    <a href="./ProductosHTML/Componente/CPU.php"><p class="componentes">CPU</p></a>
                                <a href="./ProductosHTML/Componente/Ratones.php"><p class="componentes">Ratones</p></a>
                                <a href="./ProductosHTML/Componente/Ud.Almacenamiento.php"><p class="componentes">Ud.Almacenamiento</p></a>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="submenu"><strong>Ordenadores</strong></p>
                                </td>
                            <tr>
                            <tr>
                                <td width="50%">
                                    <a href="./ProductosHTML/Componente/Carcasas.php"><p class="componentes">Carcasas</p></a>
                                    <a href="./ProductosHTML/Componente/FA.php"><p class="componentes">F. Alimentación</p></a>
                                    <a href="./ProductosHTML/Componente/Memorias-RAM-O.php"><p class="componentes">Memorias RAM</p></a>
                                    <a href="./ProductosHTML/Componente/Monitores.php"><p class="componentes">Monitores</p></a>
                                    <a href="./ProductosHTML/Componente/Teclados.php"><p class="componentes">Teclados</p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="submenu"><strong>Portátiles</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Componente/Fundas.php"><p class="componentes">Fundas</p></a>
                                    <a href="./ProductosHTML/Componente/Memorias-RAM-P.php"><p class="componentes">Memorias RAM</p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="listamenu" id="listamenu2">
                        <table width="90%" height="60%" style="margin-top: 10%;">
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Consola/Consolas.php"><p class="submenu"><strong>Ver todo</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Consola/PS.php"><p class="submenu"><strong>Play Station</strong></p></a>
                                </td>
                            </tr>
                                <td>
                                    <a href="./ProductosHTML/Consola/Xbox.php"><p class="submenu"><strong>Xbox</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Consola/Nintendo.php"><p class="submenu"><strong>Nintendo</strong></p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="listamenu" id="listamenu3">
                        <table width="90%" height="60%" style="margin-top: 10%;">
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Móvil/Móviles.php"><p class="submenu"><strong>Ver todo</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Móvil/Samsung.php"><p class="submenu"><strong>Samsung</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Móvil/iPhone.php"><p class="submenu"><strong>iPhone</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Móvil/Xiaomi.php"><p class="submenu"><strong>Xiaomi</strong></p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="listamenu" id="listamenu4">
                        <table width="90%" height="60%" style="margin-top: 10%;">
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Ordenador/PCs.php"><p class="submenu"><strong>Ver todo</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Ordenador/PC-WorkStation.php"><p class="submenu"><strong>WorkStation</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Ordenador/PC-Gaming.php"><p class="submenu"><strong>Gaming</strong></p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="listamenu" id="listamenu5">
                        <table width="90%" height="60%" style="margin-top: 10%;">
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Portátil/Portátiles.php"><p class="submenu"><strong>Ver todo</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Portátil/Portátiles-WorkStation.php"><p class="submenu"><strong>WorkStation</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Portátil/Portátiles-Gaming.php"><p class="submenu"><strong>Gaming</strong></p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="listamenu" id="listamenu6">
                        <table width="90%" height="60%" style="margin-top: 10%;">
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Televisión/TVs.php"><p class="submenu"><strong>Ver todo</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Televisión/TV32-56.php"><p class="submenu"><strong>Pulgadas 32" - 56"</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Televisión/TV57-76.php"><p class="submenu"><strong>Pulgadas 57" - 76"</strong></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="./ProductosHTML/Televisión/TV77-86.php"><p class="submenu"><strong>Pulgadas 77" - 86"</strong></p></a>
                                </td>
                            </tr>
                        </table>
                    </div>
            </div>
        </header>
        <main id="main">

            <div class="divslogan">
                    <img src="./IndexFotos/imgslogan.jpg" alt="">
                    <p>Los mejores artículos y accesorios <br> de tecnología al mejor precio</p>
            </div>
            <div class="slider-frame">
                <ul>
                    <li><img src="./IndexFotos/slide1.jpg" alt=""><p>Productos exclusivos</p></li>
                    <li><img src="./IndexFotos/slide2.jpg" alt=""><p>Adaptados a tus demandas</p></li>
                    <li><img src="./IndexFotos/slide3.jpg" alt=""><p>Cercanos y a tu disposición</p></li>
                    <li><img src="./IndexFotos/slide4.jpg" alt=""><p>Le ponemos música a tu vida</p></li>
                </ul>
            </div>
            <a href="./ProductosHTML/Consola/Sony PS5.php"><div class="ps5">
                <p>¡Nueva PS5!</p>
                <img src="./IndexFotos/PS5.png" alt="">
            </div></a>
            <table class="masvendido">
                <th colspan="3">Nuestros productos más vendidos</th>
                <tr>
                    <td>
                        <a href="./ProductosHTML/Móvil/Móviles.php"><img src="./Fotos_Productos/Móvil/iPhone 14 Pro Max.jpg" alt="" title="MÓVILES"></a>
                    </td>
                    <td>
                        <a href="./ProductosHTML/Portátil/Portátiles.php"><img src="./Fotos_Productos/Portátil/HP Victus 16-E0098NS.jpg" alt="" title="PORTÁTILES"></a>
                    </td>
                    <td>
                        <a href="./ProductosHTML/Televisión/TVs.php"><img src="./Fotos_Productos/Televisión/LG 75QNED966QA 75.jpg" alt="" title="COMPONENTES">
                    </td>
                </tr>
            </table>

                </td>
            </table>
            <table class="tablaindex">
                <th colspan="5"><strong>Marcas destacadas</strong></th>
                <tr>
                    <td width="20%">
                        <a href="./ProductosHTML/Marcas/Sony.php"><img class="imagenes" src="./IndexFotos/Sony.jpg" width="92%"></a>
                    </td>
                    <td width="20%">
                        <a href="./ProductosHTML/Marcas/Apple.php"><img class="imagenes" src="./IndexFotos/Apple.jpg" width="92%"></a>
                    </td>
                    <td width="20%">
                        <a href="./ProductosHTML/Marcas/Microsoft.php"><img class="imagenes" src="./IndexFotos/Microsoft.jpg" width="92%"></a>
                    </td>
                    <td width="20%">
                        <a href="./ProductosHTML/Marcas/Samsung.php"><img class="imagenes" src="./IndexFotos/Samsung.jpg" width="92%"></a>
                    </td>
                    <td width="20%">
                        <a href="./ProductosHTML/Marcas/HP.php"><img class="imagenes" src="./IndexFotos/HP.jpg" width="92%"></a>
                    </td>
                </tr>
            </table>
            <div>
                <table class="tablaindex2">
                    <th colspan="2"><strong>¿Arduino o RaspberryPi?</strong></th>
                    <tr>
                        <td width="50%">
                            <a href="https://www.arduino.cc/"><img class="arduino" src="./IndexFotos/arduino-genuino.jpg" width="70%"></a>
                        </td>
                        <td width="50%">
                            <p class="arduinotxt">
                                <b>Arduino-UNO:</b>
                                El Arduino Uno es una placa de microcontrolador de código abierto basado en el microchip ATmega328P y desarrollado por Arduino.cc. 
                                La placa está equipada con conjuntos de pines de E/S digitales y analógicas que pueden conectarse a varias placas de expansión y otros circuitos.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                            <a href="https://www.raspberrypi.com/"><img class="raspi" src="./IndexFotos/raspberry.png" width="70%"></a>
                        </td>
                        <td width="50%">
                            <p class="raspitxt">
                                <b>RaspberryPi:</b>
                                Raspberry Pi es un ordenador low cost capaz de realizar las mismas funciones que un ordenador estándar de sobremesa, 
                                desarrollado con el objetivo de hacer la informática accesible y asequible para todos.
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <p class="frase"><i><strong>"Cualquier tecnología suficientemente avanzada es equivalente a la magia."</strong></i> <br>
                <span class="autor">- Arthur C.Clarke.</span> 
            </p>
        </main>
        <footer>
            <div>
                <table class="foro">
                    <tr>
                        <td class="td-pie-inicio">
                            <ul>
                                <li><p>Contacta con nosotros: <b>mario.dieguez.asir@salesianosatocha.com</b></p><br>
                                <li><p>Visita nuestro <b>foro</b> de preguntas haciendo click <strong><a href="./foro.html" style="color:white;">aquí</a></strong></p><br>
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