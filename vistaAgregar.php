<?php
    session_start();
    if(isset($_SESSION['mensaje'])){
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Agregar Registro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php 
            include 'header.php';
        ?>
        <div>
            <h1>EJERCICIO PARA APROPIAR FUNDAMENTOS DEL LENGUAJE PHP</h1>
            <form action="controlador.php" method="GET">
                <table border="1">
                    <tr>
                        <th>Cédula:</th>
                        <td class="valor">
                            <input name="cedula" type="number" id="cedula" pattern="^[0-9]{5,11}$" 
                                                    title="De 5 a 11 dígitos"   
                                                    oninvalid="setCustomValidity('Debe contener solo números, de 5 a 11 digitos')"
                                                    oninput="setCustomValidity('')"/>
                        </td>
                    </tr>
                    <tr>
                        <th>Nombre:</th>
                        <td class="valor"><input type="text" name="nombre"/></td>
                    </tr>
                    <tr>
                        <th>Correo:</th>
                        <td class="valor"><input type="email" name="correo"/></td>
                    </tr>
                    <tr>
                        <th>Teléfono fijo:</th>
                        <td class="valor"><input type="number" name="telfij"/></td>
                    </tr>
                    <tr>
                        <th>Teléfono móvil:</th>
                        <td class="valor"><input type="number" name="telmov"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <button type="submit" name="ruta" value="cancelar">CANCELAR</button>&nbsp;&nbsp;&nbsp;
                            <button type="submit" name="ruta" value="agregar">AGREGAR</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
