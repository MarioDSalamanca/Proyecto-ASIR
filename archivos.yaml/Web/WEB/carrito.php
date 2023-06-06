<?php
session_start();

    if ($_SESSION['correo'] == null) {
        header("Location: ./Cuenta/login.php");
    }
    
    if (isset($_REQUEST['vaciar'])) {
        unset($_SESSION['carrito']);
        header("Location: carrito.php");
    }
    if (isset($_REQUEST['objeto'])) {
        $producto = $_REQUEST['objeto'];
        unset($_SESSION['carrito'][$producto]);
        header("Location: carrito.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Twenty-first</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./codigoCSS.css">
        <script src="./JS.js"></script>
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
                        url:'./buscador.php',
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
        <!-- Enlace al sandbox de PayPal -->
        <script src="https://www.paypal.com/sdk/js?client-id=AXa8zonYcUJU0OjrX0e4hFX-y3sHfNRzpMxqKHyFi0wyJ4IMUZM9ZDP5M0uD0_7pB-03cXK74eypfRFB&currency=EUR"></script>
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
                    <td width="40%">
                        <div class="buscador">
                            <input onkeyup="buscar_prod($('#buscar_1').val());" type="text" id="buscar_1" name="buscar_1" placeholder="Buscar...">
                        </div>
                    </td>
                    <td width="20%">
                        <?php
                            if ($_SESSION['correo'] == null) {
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

                                    $nombre = $bbdd['nombre'];

                                echo "<a href='./Cuenta/perfil.php'><img class='iconoperfil_b' src='./IndexFotos/perfil.png' title='Perfil'></a>";
                                echo "<div class='spanperfil'>";
                                    echo "<p>Bienvenid@</p><p class='nombreperfil'>" . $nombre . "</p>";
                                echo "</div>";
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

<?php
        # Si el carrito está vacio
        if ($_SESSION['carrito'] == null) {
            echo "<h2 class='titulocarrito'>Carrito de ".$_SESSION['correo']."</h2>";
            echo "<div class='carrito'>";
                echo "<div>";
                    echo "<h2>Actualmente no tienes productos en tu carrito</h2>";
                echo "</div>";
            echo "</div>";
        }
        # Si tiene productos
        else {
            echo "<h2 class='titulocarrito'>Carrito de ".$_SESSION['correo']."</h2>";

            $total = 0;
            echo "<div class='carrito'>";   
            echo "<table class='trcarrito'>";
                foreach($_SESSION['carrito'] as $producto => $campos) {
                    echo "<tr>";
                        echo "<td class='imgcarrito'>";
                            echo '<img src="./Fotos_Productos/'.$campos['tabla'].'/'.$producto.'.jpg" alt="">';
                        echo "</td>";
                        echo "<td class='datoscarrito'>";
                            echo "<a href='./ProductosHTML/".$campos['tabla']."/".$producto.".php'><h3>".$producto."</h3></a>";
                            
                            # Sacar valores de la bbdd
                                $query = "select nombre, precio, tabla from (select nombre, precio, tabla from Componentes union select nombre, precio, tabla from Consolas union select nombre, precio, tabla from TVs union select nombre, precio, tabla from PCs union select nombre, precio, tabla from Portátiles union select nombre, precio, tabla from Móviles) as resultado where nombre like '$producto' and tabla like '".$campos['tabla']."'";
                                // echo $query;
                                $consulta = mysqli_query($conexion, $query);
                                
                                $bbdd = mysqli_fetch_array($consulta);
                                $total += $bbdd['precio'] * $campos['Unidades'];
                                if (isset($campos['Color'])) {
                                    echo "<p>Color: <input type='text' name='color' value='".$campos['Color']."' class='carritocolor' id='carritocolor' readonly></p>";
                                }
                                if (isset($campos['Almacenamiento'])) {
                                    echo "<p>Almacenamiento: <input type='text' name='color' value='".$campos['Almacenamiento']."' class='carritocolor' id='carritocolor' readonly></p>";
                                }
                                if (isset($campos['Consola'])) {
                                    echo "<p>Consola: <input type='text' name='color' value='".$campos['Consola']."' class='carritocolor' id='carritocolor' readonly></p>";
                                }
                                echo "<p>Precio: <input type='text' name='precio' value='".$bbdd['precio']."' class='carritoprecio' id='carritoprecio' readonly>&euro;</p>";
                                echo "<p>Unidades: <input type='number' name='uds' value='".$campos['Unidades']."' class='uds' min='1' max='20' id='carritouds' readonly></p>";
                                echo "<input type='hidden' name='tabla' value='".$bbdd['tabla']."' id='carritotabla'>";
                            
                        echo "</td>";
                        echo "<td class='botoncarrito'>";
                            echo "<a href='carrito.php?objeto=$producto'><button>Eliminar</button></a>";
                        echo "</td>";
                    echo "</tr>";
                }
            echo "</table>";
            echo "<div class='opcionescarrito'>";
                echo "<input type='hidden' id='total' value='".$total."'>";
                echo "<a href='carrito.php?vaciar=true'><button>Vaciar carrito</button></a>";
            echo "</div>";
            echo "</div>";

?>
           <div class='cajapaypal'>
                <h3><i><u>Resumen:</u></i></h3>
                <h4 class='total'>Total: <?php echo $total; ?>&euro;</h4>
                <!-- Contenedor donde se muestran los botones de paypal -->
                <div id="paypal-button-container"></div>

                <script>
                    
                    /* Mostrar los botones */
                    paypal.Buttons({
                        /* Personalización visual de los botones */
                        style: {
                            color: 'blue',
                            label: 'pay',
                            shape: 'pill'
                        },

                        /* Definir importe total a pagar */
                        createOrder: function(data, actions) {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value: <?php echo $total; ?>
                                    }
                                }]
                            })
                        },
                        /* Se realiza la compra */ 
                        onApprove: function(data, actions) {
                            window.location.href="compra.php"
                        },

                        /* Se cancela el pago */
                        onCancel: function(data) {
                            Swal.fire('Compra cancelada...','Se ha cerrado la operación de tu compra','error');
                        }
                    }).render('#paypal-button-container');
                </script>
           </div> 
           <?php } 
           
           mysqli_close($conexion);
           
           ?>
        </main>
    </body>
</html>