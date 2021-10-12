<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <!-- Otros -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar especialidad</title>
</head>
<body>
    <!-- Include -->
    <?php include("menu/menu.html"); ?>
    <!-- contenedores -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <!-- PHP -->

                <?php
                include("logica/database.php");
                $especialidad = new DATABASE();
                if(isset($_POST) && !empty($_POST)){
                    $nombre = $especialidad->sanitize($_POST["nombre"]);
                    $descripcion = $especialidad->sanitize($_POST["descripcion"]);

                    $res = $especialidad->insertarEspecialidad($nombre, $descripcion);
                    if($res){
                        $mensaje = "<div class='alert alert-success' id='mensaje_edit'>Registro modificado</div>";
                    }else{
                         $mensaje = "<div class='alert alert-danger' id='mensaje_edit'>No se pudo modificar el registro</div>";
                    }
 
                    echo $mensaje;
                }
                ?>

            <div class="contenedor">
            <h3 class="title_h3">Insertar nueva especialidad</h3>
                <!-- Formularios -->

                <form action="agregar_es.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre de la especialidad:</label>
                        <input id="nombre" name="nombre" type="text" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción de la especialidad:</label>
                        <textarea id="descripcion" name="descripcion" cols="40" rows="3" class="form-control" required="required"></textarea>
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</body>
</html>