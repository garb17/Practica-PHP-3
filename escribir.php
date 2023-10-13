<?php
    $ruta="Main"; 

    include_once("assets/php/directorio.php");
    include_once("assets/php/crearArchivo.php");

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
<body>
    <div class="margen">
        <div class="margen2">
            <div style="border: 2px solid rgb(242, 242, 242);border-radius: 3%;background-color:  rgb(229, 229, 229);">
                <div class="row">
                    <p class="left-align">&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn-floating waves-effect waves-light red"><i class="material-icons"><i class="fa-solid fa-arrow-right fa-rotate-180 fa-lg" style="color:rgb(255,255,255)"></i></i></a></p>
                    <h1 class="center-align">REDACTAR NOTA</h1>
                </div>
                <div class="row">
                    <form class="col s12" action="" method="post">
                       <div class="margen-formulario" style="padding:0 5% 0">
                            <div class="row">
                                <div class="col m6 s12">
                                    <label>Guardar en...</label>
                                    <select class="input-field" id="selectCarpeta" name='selectCarpeta'>
                                        <option value="Main" selected>Main</option>
                                        <?php obtener_estructura_directorios($ruta, 1, " ")?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <input id="idNombre" type="text" name="txtNombre" cols="2" required>
                                    <label for="idNombre">Nombre del archivo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="textarea" class="materialize-textarea" name="txtDescripcion" onkeyup="contarPalabras()"></textarea>
                                    <label for="textarea">Redactar...</label>
                                    <span class="helper-text" data-error="wrong" data-success="right" id="cont">Palabras: 0 &nbsp;&nbsp; Caracteres: 0</span>
                                </div>
                            </div>
                            <div class="center-align">
                                <button class="btn waves-effect waves-light red" name="action">Borrar
                                    <i class="fa-solid fa-ban"></i>
                                </button>
                                <button class="btn waves-effect waves-light" type="submit" value="Guardar" name="btnGuardar">Guardar
                                    <i class="fa-regular fa-floppy-disk"></i>
                                </button> 
                            </div>
                       </div> 
                    </form>
                </div>
                <br>
                <br>
                <?php echo $resultado; ?>
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