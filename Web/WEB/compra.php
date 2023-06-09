<?php
    session_start();

    # Conexión con el servidor
    include "./servidor.php";

    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Twenty-first</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./codigoCSS.css">
        <script src="./JS.js"></script>
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
        <main id="main">
            <h2 class="detalles">Detalles de pedido:</h2>

            <table class="resumen">
                <th>
                    
                </th>
                <th>
                    Producto
                </th>
                <th>
                    Unidades
                </th>
                <th>
                    Importe
                </th>
        
            <?php
            
            $total = 0;
            # Procesar la compra
            foreach($_SESSION['carrito'] as $producto => $campos) {
                $total += $campos['Precio'] * $campos['Unidades'];
                # Registrar la compra 
                $query = "insert into compras values (null, '".$_SESSION['correo']."', '$producto', '".$campos['tabla']."', ".$campos['Unidades'].", ".$campos['Precio'] * $campos['Unidades'].", curdate())";
                // echo $query;

                if (mysqli_query($conexion, $query)) {

                    ?>

                        <tr>
                            <td width='12%'>
                                <img src="./Fotos_Productos/<?php echo $campos['tabla'].'/'.$producto; ?>.jpg" alt="">
                            </td>
                            <td>
                                <p><?php echo $producto; ?></p>
                            </td>
                            <td>
                                <p><?php echo $campos['Unidades'] ?></p>
                            </td>
                            <td>
                                <p><?php echo $campos['Precio'] * $campos['Unidades']; ?>&euro;</p>
                            </td>
                        </tr>

                    <?php

                }

                # Actualizar las cantidades de las tablas

                if ($campos['tabla'] == 'Almacenamiento' || $campos['tabla'] == 'Altavoz' || $campos['tabla'] == 'Auricular' || $campos['tabla'] == 'Chasis' || $campos['tabla'] == 'Fuente alimentación' || $campos['tabla'] == 'Funda portátiles' || $campos['tabla'] == 'Memoria-RAM' || $campos['tabla'] == 'Pantalla' || $campos['tabla'] == 'Procesador' || $campos['tabla'] == 'Ratón' || $campos['tabla'] == 'SO-DIMM' || $campos['tabla'] == 'Teclado') {
                    $query = "update Componentes set cantidad = cantidad - ".$campos['Unidades']." where nombre like '$producto' and tabla like '".$campos['tabla']."'";
                    // echo $query;
                }
                elseif ($campos['tabla'] == 'Consola') {
                    $query = "update Consolas set cantidad = cantidad - ".$campos['Unidades']." where nombre like '$producto'";
                    // echo $query;
                }
                elseif ($campos['tabla'] == 'Móvil') {
                    $query = "update Móviles set cantidad = cantidad - ".$campos['Unidades']." where nombre like '$producto'";
                    // echo $query;
                }
                elseif ($campos['tabla'] == 'Ordenador') {
                    $query = "update PCs set cantidad = cantidad - ".$campos['Unidades']." where nombre like '$producto'";
                    // echo $query;
                }
                elseif ($campos['tabla'] == 'Portátil') {
                    $query = "update Portátiles set cantidad = cantidad - ".$campos['Unidades']." where nombre like '$producto'";
                    // echo $query;
                }
                elseif ($campos['tabla'] == 'Televisión') {
                    $query = "update TVs set cantidad = cantidad - ".$campos['Unidades']." where nombre like '$producto'";
                    // echo $query;
                }

                mysqli_query($conexion, $query);
            }

            unset($_SESSION['carrito']);

            mysqli_close($conexion);

            ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="importe">
                        <?php echo $total; ?>&euro;
                    </td>
                </tr>
            </table>
            <p class="entrega"><button>i</button> La entrega de su pedido se realizará en un plazo de entre 7 y 10 días laborales. <br><br>
            Si tiene algún problema póngase en contacto con nosotros a través de este correo: <b>mario.dieguez.asir@salesianosatocha.com</b></p>
        </main>
    </body>
</html> 