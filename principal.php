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
        <title>PROYECTO PARA APROPIAR FUNDAMENTOS DE PHP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            include 'header.php'
        ?>
        <div class="contenedor">
            <center>
                <h3>PROYECTO PARA INTRODUCCIÓN Y APROPIACIÓN DE FUNDAMENTOS DEL LENGUAJE PHP</h3>
                <fieldset><legend>ADMINISTRACIÓN DE REGISTROS (Archivo Plano)</legend>
                    <br>
                    <br>
                    <a href="controlador.php?ruta=vistaAgregar">Añadir Registro</a>  
                    <a href="controlador.php?ruta=listar">Listado Completo</a><br>  
                </fieldset>
            </center>
        </div>
    </body>
</html>
