<?php

    function obtener_estructura_directorios($ruta, $caso, $comparar){
        if (is_dir($ruta)){
            $gestor = opendir($ruta);

            while (($archivo = readdir($gestor)) !== false)  {
                    
                $ruta_completa = $ruta . "/" . $archivo;

                if ($archivo != "." && $archivo != "..") {
                
                    // Si es un directorio se recorre recursivamente
                    if (is_dir($ruta_completa)) {
                        if($caso==1){
                            echo '<option value="'.$ruta_completa.'">'.$ruta_completa.'</option>';
                            obtener_estructura_directorios($ruta_completa, 1, $comparar);

                        }elseif($caso==2){

                            if($comparar==$ruta_completa){
                                
                                echo '<option value="'.$ruta_completa.'" selected>'.$ruta_completa.'</option>';
                                obtener_estructura_directorios($ruta_completa, 2, $comparar);
                            }else{
                                
                                echo '<option value="'.$ruta_completa.'">'.$ruta_completa.'</option>';
                                obtener_estructura_directorios($ruta_completa, 2, $comparar);

                            }
                        }
                        
                    } 
                }
            }
            
            closedir($gestor);
        } 
    }

?>

