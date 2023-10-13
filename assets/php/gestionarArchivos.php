<?php

    // Borrar archivo
    function borrarArchivo($ruta){
        unlink($ruta);
        $array=explode('/',$ruta);
        $nuevaRuta="";

        for($i=0;$i<count($array)-1;$i++){

            if($i==count($array)-2){
                $nuevaRuta=$nuevaRuta.$array[$i];   
            }else{
                $nuevaRuta=$nuevaRuta.$array[$i]."/";   
            } 
        }
        header('Location: gestionar.php?Acarpeta='.$nuevaRuta);
    }

    // Borrar carpeta
    function borrarCarpeta($ruta){
        rmdir($ruta);

        $array=explode('/',$ruta);
        $nuevaRuta="";

        for($i=0;$i<count($array)-1;$i++){

            if($i==count($array)-2){
                $nuevaRuta=$nuevaRuta.$array[$i];   
            }else{
                $nuevaRuta=$nuevaRuta.$array[$i]."/";   
            } 
        }
        header('Location: gestionar.php?Acarpeta='.$nuevaRuta);
    }


    if(isset($_GET['Barchivo'])){
        borrarArchivo($_GET['Barchivo']);
    }

    if(isset($_GET['Bcarpeta'])){
        borrarCarpeta($_GET['Bcarpeta']);
    }


    function obtener_archivos($ruta){

        $resultadoArchivos='<p> Archivos <hr></p> 
        <div class="row">';

        $resultadoCarpetas='<p> Carpetas <hr></p>
                <div class="row">';
        $aux1=0;
        $aux2=0;

        // Se comprueba que realmente sea la ruta de un directorio
        if (is_dir($ruta)){
        // Abre un gestor de directorios para la ruta indicada
        $gestor = opendir($ruta);


        // Recorre todos los elementos del directorio
        while (($archivo = readdir($gestor)) !== false)  { 

        // Revisar porque hace 3 recorridos rapidamente


        $ruta_completa = $ruta . "/" . $archivo;

        // Se muestran todos los archivos y carpetas excepto "." y ".."
        if ($archivo != "." && $archivo != "..") {
        // Si es un directorio se recorre recursivamente
        if (is_dir($ruta_completa)) {
        $aux2++; 
        $resultadoCarpetas=$resultadoCarpetas.'<div class="col s12 m4">
                                    <div class="card yellow lighten-3">
                                        <div class="card-content white-text">
                                            <span class="card-title truncate">'.$archivo.'</span>
                                        </div>
                                        <div class="card-action yellow lighten-1">
                                            <a href="gestionar.php?Bcarpeta='.$ruta_completa.'" >Borrar</a>
                                            <a href="modificarCarpeta.php?carpeta='.$ruta_completa.'" >Renombrar</a>
                                            <a href="gestionar.php?Acarpeta='.$ruta_completa.'" >Abrir</a>
                                        </div>
                                    </div>
                                </div>';

        } else {
        $aux1++; 
        // Estructura de carta para visualizar los archivos texto
        $resultadoArchivos=$resultadoArchivos.'<div class="col s12 m4">
                                    <div class="card red accent-1">
                                        <div class="card-content white-text">
                                            <span class="card-title truncate">'.$archivo.'</span>
                                            <p class="truncate">';

        // Lectura del archivo
        $ar=fopen($ruta_completa, "r");
        $cont2=0;
        while(!feof($ar)){
            $cont2++;
            $linea=fgets($ar);
            $saltoLinea=nl2br($linea);
            $resultadoArchivos=$resultadoArchivos.$saltoLinea;

            if($cont2>3){
                break;
            }
            
        }
        fclose($ar);

        // Continuacion de la estructura de carta para los archivos texto
        $resultadoArchivos=$resultadoArchivos.'</p>
                                        </div>
                                        <div class="card-action red accent-2">
                                            <form method="post">
                                                <a href="gestionar.php?Barchivo='.$ruta_completa.'" >Borrar</a>
                                                <a href="modificar.php?archivo='.$ruta_completa.'"">Modificar</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>';
        }
        }


        if($aux1>2){
        $aux1 =0;
        $resultadoArchivos=$resultadoArchivos.'</div>
                <div class="row">';
        }

        if($aux2>2){
        $aux2 =0;
        $resultadoCarpetas=$resultadoCarpetas.'</div>
                <div class="row">';
        }
        }

        // Cierra el gestor de directorios
        closedir($gestor);
        $resultadoCarpetas=$resultadoCarpetas.'</div><br>';
        $resultadoArchivos=$resultadoArchivos.'</div>';

        }

        echo $resultadoCarpetas;
        echo $resultadoArchivos;

        if(strlen($ruta)>4){

            $array=explode('/',$ruta);
            $nuevaRuta="";

            for($i=0;$i<count($array)-1;$i++){

                if($i==count($array)-2){
                    $nuevaRuta=$nuevaRuta.$array[$i];   
                }else{
                    $nuevaRuta=$nuevaRuta.$array[$i]."/";   
                } 
            }

            echo '<div class="center-align"><br><a href="gestionar.php?Acarpeta='.$nuevaRuta.'" class="center-align waves-effect waves-light btn red"><i class="fa-solid fa-rotate-left fa-lg"></i>Regresar</a></div>';
        }else{
            
        }
    } 
?>
