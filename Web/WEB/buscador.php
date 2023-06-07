<head>
    <link rel="stylesheet" href="/PHP/codigoCSS.css">
</head>

<?php

# Sacar los datos de la bbdd
    
    # Conexión con la bbdd
    include("./servidor.php");

    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
    
    # Para evitar inyección SQL
    $buscar = mysqli_real_escape_string($conexion, $_POST['buscar']);
    
    $query ="select nombre, empresa, precio, tabla, imagen from (select nombre, empresa, precio, tabla, imagen from Componentes 
    union select nombre, empresa, precio, tabla, imagen from Consolas union select nombre, empresa, precio, tabla, imagen from TVs union select nombre, 
    empresa, precio, tabla, imagen from PCs union select nombre, empresa, precio, tabla, imagen from Portátiles union select nombre, empresa, precio, tabla, imagen from Móviles)
     as resultado where nombre like '%".$buscar."%' or empresa like '%".$buscar."%' or tabla like '%".$buscar."%' group by nombre, empresa, precio, tabla, imagen";
    # Consulta
    $consulta = mysqli_query($conexion, $query);

?>
<div class="buscadorResult">
        
    <?php 
    if ($consulta !== false) {
        $rows = mysqli_num_rows($consulta);
        echo "<h3>Resultados encontrados: ".$rows."</h3>";
        while ($resultado = mysqli_fetch_assoc($consulta)) {
    
            echo "<a href='/PHP/ProductosHTML/".$resultado['tabla']."/".$resultado['nombre'].".php'><p><table><tr><td width='10%'><img class='imgbuscador' src='/PHP/Fotos_Productos/".$resultado['tabla'].'/'.$resultado['imagen']."'.jpg ></td><td>".$resultado['nombre']." - ".$resultado['precio']."€</td></tr></table></p></a>";
    
        }
    }
    else {
        echo "<h3>Lo sentimos, se ha producido un error</h3>";
        #echo mysqli_error($conexion);
        #exit(1);
    }
?>
</div>