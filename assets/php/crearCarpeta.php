<?php
    
    $resultado="";

    if(isset($_POST['btnGuardar'])&&$_POST['btnGuardar']=="Guardar"){
        if(isset($_POST['txtCarpeta'])||empty($_POST['txtCarpeta'])){
            
            $carpeta=$ruta."/".$_POST['txtCarpeta'];

            if(!file_exists($carpeta)){

                mkdir($carpeta, 0777, true);
                header('Location: gestionar.php?Acarpeta='.$ruta);

            }else{
                $resultado='<p class="center-align red">Error, el nombre de la carpeta ya existe.</p>';
            }
        }
    }

?>