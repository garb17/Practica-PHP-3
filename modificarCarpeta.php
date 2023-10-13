<?php

    $rutaCarpeta=$_GET['carpeta'];
    $array=explode('/',$rutaCarpeta);
    $nombre=$array[count($array)-1];
    
    $nuevaRuta="";
    
    for($i=0;$i<count($array)-1;$i++){

        if($i==count($array)-2){
            $nuevaRuta=$nuevaRuta.$array[$i];   
        }else{
            $nuevaRuta=$nuevaRuta.$array[$i]."/";   
        } 
    }
    
    function regresar($ruta){
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

    if(isset($_GET['regresarPagina'])){
        regresar($_GET['regresarPagina']);
    }

    include_once("assets/php/renombrarCarpeta.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica-PHP-3</title>
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/fdb097e44b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body onload="contarPalabras()">
    <div class="margen">
        <div class="margen2">
            <div style="border: 2px solid rgb(242, 242, 242);border-radius: 3%;background-color:  rgb(229, 229, 229);">
                <div class="row">
                    <p class="left-align">&nbsp;&nbsp;&nbsp;<a href=<?php echo 'gestionar.php?regresarPagina='.$rutaCarpeta;?> class="btn-floating waves-effect waves-light red"><i class="material-icons"><i class="fa-solid fa-arrow-right fa-rotate-180 fa-lg" style="color:rgb(255,255,255)"></i></i></a></p>
                    <h1 class="center-align">MODIFICAR CARPETA</h1>
                </div>
            
                <div class="row">
                    <form class="col s12" action="" method="post">
                        <div class="margen-formulario" style="padding:0 5% 0"><br><br>
                            <div class="row">
                                <form class="col s12" action="" method="post">
                                    <div class="row margen-carpeta">
                                        <div class="input-field col m9 s12 ">
                                            <input id="idCarpeta" type="text" name="txtCarpeta"  value=<?php echo $nombre?> required>
                                            <label for="idCarpeta">Renombrar carpeta</label>
                                        </div>
                                        <div class="input-field col m3 s12 ">
                                            <button class="btn waves-effect waves-light" type="submit" value="Guardar" name="btnGuardar">Guardar
                                                <i class="fa-regular fa-floppy-disk"></i>
                                            </button> 
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                       </div> 
                    </form>
                </div>
                <br>
                <br>
                <?php echo $resultado ?>
                <br>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="assets/js/contador.js?v=<?php echo time(); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, );
        });
    </script>
</body>
</html>
