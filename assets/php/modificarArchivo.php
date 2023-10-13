<?php

$resultado="";
$flag=false;

if(isset($_POST['btnGuardar'])&& $_POST['btnGuardar'] == 'Guardar'){
    if(isset($_POST['txtNombre'])&&!empty($_POST['txtNombre'])){

            $nomArchivo=$_POST['txtNombre'];
            $descripcion=$_POST['txtDescripcion'];
            $carpeta=$_REQUEST['selectCarpeta'];
            $rutaNuevaArchivo=$carpeta.'/'.$nomArchivo.'.txt';
            
            if($rutaNuevaArchivo!=$rutaArchivo){
                if (is_dir($nuevaRuta)){

                    $gestor = opendir($nuevaRuta);
    
                    while (($archivo = readdir($gestor)) !== false)  {
                            
                        $ruta_completa = $nuevaRuta . "/" . $archivo;
     
                        if ($archivo != "." && $archivo != "..") {
    
                            if (!is_dir($ruta_completa)) {
                                if($ruta_completa==$rutaNuevaArchivo){
                                    $flag=true;
                                }
                            } 
                        }
                    }
                
                }

                if($flag){
                    $resultado='<p class="center-align red">Error, el nombre del archivo ya existe.</p>';

                }else{
                    unlink($rutaArchivo);
                    $ar=fopen($rutaNuevaArchivo, "w");
                    fwrite($ar, $descripcion);
                    fclose($ar);
                    regresar($rutaNuevaArchivo);
                }
            
                closedir($gestor);

            }else{
                $ar=fopen($rutaNuevaArchivo, "w");
                fwrite($ar, $descripcion);
                fclose($ar);
                regresar($rutaNuevaArchivo);

            }
            
    }else{
        $resultado='<p class="center-align red">Error, no se enviaron los datos.</p>';
    }
}

?>