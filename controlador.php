<?php

// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

if(isset($_POST['ruta'])){
    $ruta = $_POST['ruta'];
}
if(isset($_GET['ruta'])){
    $ruta = $_GET['ruta'];
}

switch ($ruta){
    case "agregar":            
            agregar();          
    break;
    case "vistaAgregar":
            vistaAgregar();
    break;
    case "listar":
            listar();
    break;
    case "eliminar":
            eliminar();
    break;
    case "actualizar":
            actualizar();
    break;
    case "confirmarActualizar":
            confirmarActualizar();
    break;
    case "vistaActualizar":
        vistaActualizar();
    break;
    case "cancelarActualizar":
        cancelarActualizar();
    break;    
    case "cancelar":
        cancelar();
    break;
}

///funciones
function vistaAgregar(){
    header("Location:vistaAgregar.php");
}

function agregar(){
    
    $resultadoBuscar = buscar($_GET['cedula']);

    if(!$resultadoBuscar["hallado"]){
        $cedula = $_GET['cedula'];
        $nombre = $_GET['nombre'];
        $correo = $_GET['correo'];
        $telfij = $_GET['telfij'];
        $telmov = $_GET['telmov'];
        
        $registro = strtoupper($cedula . ":" . $nombre . ":" . $correo . ":" . $telfij . ":" . $telmov . ":" . "\n");
        
        $recurso = fopen("planoI.txt","a+");
        fwrite($recurso,$registro);
        fclose($recurso);
        $mensecont1 = "<script>alert(\"Registro insertado\");location.href=\"principal.php\"</script>";
        session_start();
        $_SESSION['mensaje']=$mensecont1;
        header("location:principal.php");
    }
    else{
        $mensecont1 = "<script>alert(\"Cedula ya registrada\");location.href=\"vistaAgregar.php\"</script>";
        session_start();
        $_SESSION['mensaje']=$mensecont1;
        header("location:vistaAgregar.php");

    }

}
function cancelar(){
    header("Location:principal.php");
}

function buscar($buscar){
    
    $hallado = FALSE;
    $posicion = "";

    if($recurso = fopen("planoI.txt","r")){
        $vect = file("planoI.txt");
        $cantReg = count($vect);
        for($i = 0; $i<$cantReg;$i++){
            list($ced,$nom,$correo,$telf,$telmov) = explode(":",$vect[$i]);
            if($ced == $buscar){
                $hallado = TRUE;
                $posicion = $i;
            break;
            }
        }
    }

    return array("hallado"=>$hallado,"posicion"=>$posicion);
}

function listar(){
    $registros = file("planoI.txt");
    $totalReg = count($registros);

    $pintarRegistro = array();
    for($i = 0; $i<$totalReg ;$i++){
        list($ced,$nom,$correo,$telf,$telm) = explode(":",$registros[$i]);
        $pintarRegistro[$i]['ced'] = $ced; 
        $pintarRegistro[$i]['nom'] = $nom; 
        $pintarRegistro[$i]['correo'] = $correo; 
        $pintarRegistro[$i]['telf'] = $telf; 
        $pintarRegistro[$i]['telm'] = $telm; 
    }
    session_start();
    $_SESSION['pintarRegistro'] = $pintarRegistro;
    header("Location:vistaListar.php");
}

function eliminar(){
    $resultadoBuscar = (buscar($_GET['cedula']));
    $registros = file("planoI.txt");
    $registros[$resultadoBuscar['posicion']] = NULL;
    $totalReg = count($registros);
    $recurso = fopen("planoI.txt","w+");
    for($i = 0; $i<$totalReg; $i++){
        fwrite($recurso,$registros[$i]);
    }
    fclose($recurso);
    header("Location:controlador.php?ruta=listar");
}
function actualizar(){
    $resultadoBuscar = (buscar($_GET['cedula']));
    $posicion = $resultadoBuscar['posicion'];
    $registros = file("planoI.txt");
    $registroActualizar = $registros[$posicion];
    session_start();
    $_SESSION['registroActualizar'] = $registroActualizar;
    $_SESSION['posicion'] = $posicion;

    header("Location:controlador.php?ruta=vistaActualizar");
}


function confirmarActualizar(){
    if(isset($_GET['cedula'])){
        $cedula = $_GET['cedula'];
        $nombre = $_GET['nombre'];
        $correo = $_GET['correo'];
        $telf = $_GET['telf'];
        $telm = $_GET['telm'];

        $resultadoBuscar = buscar($_GET['cedula']);
        $posicion = $resultadoBuscar['posicion'];
    }

    $datosNuevos = strtoupper($cedula . ":" . $nombre . ":" . $correo . ":" . $telf . ":" . $telm . ":" . "\n");

    $registros = file("planoI.txt");
    $registros[$posicion] = $datosNuevos;
    $totalReg = count($registros);

    $recurso = fopen("planoI.txt","w+");
    for($i = 0; $i<$totalReg; $i++){
        fwrite($recurso,$registros[$i]);
    }
    fclose($recurso);
    header("Location:controlador.php?ruta=listar");
}


function vistaActualizar(){
    header("Location:vistaActualizar.php");
}

function cancelarActualizar(){
    header("Location:controlador.php?ruta=listar");
}
