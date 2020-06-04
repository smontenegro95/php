<?php
    session_start();
    if(isset($_SESSION['mensaje'])){
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    }
    // echo "<pre>";
    // print_r ($_SESSION['pintarRegistro']);
    // echo "</pre>";
    if(isset($_SESSION['pintarRegistro'])){
        $pintarRegistro = $_SESSION['pintarRegistro'];
        $totalReg = count($pintarRegistro);
        unset($_SESSION['pintarRegistro']);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Listado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h1>EJERCICIO PARA APROPIAR FUNDAMENTOS DEL LENGUAJE PHP</h1>
            <table border="1">
                <tr>
                    <th colspan="9">
                        LISTADO
                    </th>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>CÉDULA</th>
                    <th>NOMBRE</th>
                    <th>CORREO</th>
                    <th>TELÉFONO FIJO</th>
                    <th>TELÉFONO MÓVIL</th>
                    <th>ELIMINAR</th>
                    <th>ACTUALIZAR</th>
                </tr>
                <?php for($i = 0; $i<$totalReg; $i++){?>
                <tr>
                    <td><?php echo $i+1; ?></td>
                    <td><?php echo $pintarRegistro[$i]['ced'];$cedula = $pintarRegistro[$i]['ced'];?></td>
                    <td><?php echo $pintarRegistro[$i]['nom'];?></td>
                    <td><?php echo $pintarRegistro[$i]['correo'];?></td>
                    <td><?php echo $pintarRegistro[$i]['telf'];?></td>
                    <td><?php echo $pintarRegistro[$i]['telm'];?></td>
                    <td><button onclick=<?php echo "\"window.location.href='controlador.php?ruta=eliminar&cedula=$cedula'\"";?>>ELIMINAR</button></td>
                    <td><button onclick=<?php echo "\"window.location.href='controlador.php?ruta=actualizar&cedula=$cedula'\"";?>>ACTUALIZAR</button></td>
                </tr>
                <?php }?>
            </table>
            <br><br>
            <a href="principal.php">Volver a principal</a>
        </div>
    </body>
</html>

<!-- 
NOTAS:
"window.location.href='controlador.php?ruta=eliminar&cedula=123456789'"
"window.location.href='controlador.php?ruta=actualizar&cedula=123456789'" -->
