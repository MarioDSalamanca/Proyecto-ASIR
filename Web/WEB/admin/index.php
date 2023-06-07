<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="admin.css">
        <title>TWT_First</title>
    </head>
    <body>
        <header>
            <a href="../index.php"><img src="../IndexFotos/Logo.jpg" alt=""></a>
            <h1>Administrador de TWT_First</h1>
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
                        Tabla
                    </th>
                    <th>
                        Motor
                    </th>
                    <th>
                        Versión
                    </th>
                    <th>
                        Formato de fila
                    </th>
                    <th>
                        Filas
                    </th>
                    <th>
                        Longitud media de filas
                    </th>
                    <th>
                        Longitud datos
                    </th>
                    <th>
                        Fecha creación
                    </th>
                    <th>
                        Fecha actualización
                    </th>
                    <th>
                        Table collation
                    </th>
                <?php
                    # Conexión con el servidor
                    include "../servidor.php";

                    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                    $query = "SELECT Table_name, Engine, Version, Row_format, Table_rows, Avg_row_length, Data_length, Create_time, Update_time, Table_collation FROM information_schema.tables WHERE table_schema = DATABASE();";
                    $resultado = mysqli_query($conexion, $query);

                    if (!$resultado) {
                        echo "Error de BD, no se pudieron listar las tablas\n";
                        exit;
                    }

                    while ($tabla = mysqli_fetch_row($resultado)) {
                        
                        echo "<tr>";
                            echo "<td>";
                                echo $tabla[0];
                            echo "</td>";
                            echo "<td>";
                                echo $tabla[1];
                            echo "</td>";
                            echo "<td>";
                                echo $tabla[2];
                            echo "</td>";
                            echo "<td>";
                                echo $tabla[3];
                            echo "</td>";
                            echo "<td>";
                                echo $tabla[4];
                            echo "</td>";
                            echo "<td>";
                                echo $tabla[5];
                            echo "</td>";
                            echo "<td>";
                                echo $tabla[6];
                            echo "</td>";
                            echo "<td>";
                                echo $tabla[7];
                            echo "</td>";
                            echo "<td>";
                                echo $tabla[8];
                            echo "</td>";
                            echo "<td>";
                                echo $tabla[9];
                            echo "</td>";
                        echo "</tr>";
                        
                    }

                ?>

                </table>
            </div>
        </main>
    </body>
</html>