<?php
    $resultado="";

    if(isset($_POST['btnGuardar'])&& $_POST['btnGuardar'] == 'Guardar'){
        if(isset($_POST['txtNombre'])&&!empty($_POST['txtNombre'])){

            $nomArchivo=$_POST['txtNombre'];
            $descripcion=$_POST['txtDescripcion'];
            $carpeta=$_REQUEST['selectCarpeta'];
            $nuevaRuta=$carpeta.'/'.$nomArchivo.'.txt';

            if(!is_file($nuevaRuta)){
                $ar=fopen($carpeta.'/'.$nomArchivo.'.txt', 'a');
                fwrite($ar, $descripcion);
                fclose($ar);
                $resultado='<p class="center-align green">Archivo guardado correctamente.</p>';

            }else{
                
                $resultado='<p class="center-align red">Error, el nombre del archivo ya existe en el directorio.</p>';
            }
            

        }else{
            $resultado='<p class="center-align red">Error, no se enviaron los datos.</p>';
        }
    }

?>
