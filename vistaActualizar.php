<?php 
    session_start();
    if(isset($_SESSION['registroActualizar'])){
        $registroActualizar = $_SESSION['registroActualizar'];
        list($cedula,$nombre,$correo,$telf,$telm) = explode(":",$registroActualizar);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>EJERCICIO PARA APROPIAR FUNDAMENTOS DEL LENGUAJE PHP</h1>
        <h2>Formulario de actualizar registro</h2>
        <form action="controlador.php" method="GET">
            <table border="1"> 
                <tr><td>Cédula</td><td><input type="number" name="cedula" readonly="readonly" value=<?php if(isset($cedula)){echo $cedula;}?>></td></tr>
                <tr><td>Nombre</td><td><input type="text" name="nombre" value=<?php if(isset($nombre)){echo $nombre;}?>></td></tr>
                <tr><td>Correo</td><td><input type="email" name="correo" value=<?php if(isset($correo)){echo $correo;}?>></td></tr>
                <tr><td>Teléfono fijo</td><td><input type="number" name="telf" value=<?php if(isset($telf)){echo $telf;}?>></td></tr>
                <tr><td>Teléfono móvil</td><td><input type="number" name="telm" value=<?php if(isset($telm)){echo $telm;}?>></td></tr>
                <tr><td colspan="2" align="right">cancelarActualizar
                    <button type="submit" name="ruta" value="cancelarActualizar">CANCELAR</button>
                    <button type="submit" name="ruta" value="confirmarActualizar">ACTUALIZAR</button>
                </td></tr>
            </table>
        </form>
        <br><br>
        <a href="principal.php">Ir a principal</a>
    </div>
</body>
</html>