<?php

$resultado="";
$flag=false;

if(isset($_POST['btnGuardar'])&& $_POST['btnGuardar'] == 'Guardar'){
    if(isset($_POST['txtCarpeta'])&&!empty($_POST['txtCarpeta'])){

            $nomCarpeta=$_POST['txtCarpeta'];
            $rutaNuevaCarpeta=$nuevaRuta.'/'.$nomCarpeta;
            
            if($rutaNuevaArchivo!=$rutaCarpeta){
                if (is_dir($nuevaRuta)){

                    $gestor = opendir($nuevaRuta);
    
                    while (($archivo = readdir($gestor)) !== false)  {
                            
                        $ruta_completa = $nuevaRuta . "/" . $archivo;
     
                        if ($archivo != "." && $archivo != "..") {
    
                            if (is_dir($ruta_completa)) {
                                if($ruta_completa==$rutaNuevaArchivo){
                                    $flag=true;
                                }
                            } 
                        }
                    }
                
                }

                if($flag){
                    $resultado='<p class="center-align">El nombre de la carpeta ya existe.</p>';

                }else{
                    
                    rename($rutaCarpeta,  $rutaNuevaCarpeta);
                    regresar($rutaCarpeta);
                }
            
                closedir($gestor);

            }else{

                regresar($rutaCarpeta);

            }
            
    }else{
        $resultado='<p class="center-align">Error, no se enviaron los datos.</p>';
    }
}

?>