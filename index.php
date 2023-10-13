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
            <div style="border: 2px solid rgb(242, 242, 242);border-radius: 3%;background-color: rgb(229, 229, 229);">
            <h1 id="titulo" class="center-align">BLOC DE NOTAS </h1> 
            <br>
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card  hoverable">
                            <div class="card-content"><br>
                                <h5 class="center-align">Crear archivo de texto</h5>
                                <br>
                                <p class="center-align"><a href="escribir.php" class="btn-floating waves-effect waves-light red"><i class="material-icons"><i class="fa-solid fa-plus fa-beat-fade fa-lg" style="color:rgb(255,255,255)"></i></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="card  hoverable">
                            <div class="card-content"><br>
                                <h5 class="center-align">Gestión de archivos</h5>
                                <br>
                                <p class="center-align"><a href="gestionar.php" class="btn-floating waves-effect waves-light red"><i class="material-icons"><i class="fa-regular fa-folder-open fa-lg" style="color:rgb(255,255,255)"></i></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>