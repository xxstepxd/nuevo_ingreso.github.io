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
    <title>Modificar especialidad</title>
</head>
<body>
    <!-- Include -->
    <?php include("menu/menu.html"); ?>
    <!-- contenedores -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <!-- PHP -->

                <div class="contenedor">
                <h3 class="title_h3">Modificar especialidad</h3>

                <?php
                include("logica/database.php");
                $modificar = new DATABASE();

                // Modificar
                if(!empty($_POST) && isset($_POST["submit"])){
                    $id_esp = $modificar->sanitize($_POST["id_esp"]);
                    $nombre = $modificar->sanitize($_POST["nombre"]);
                    $descripcion = $modificar->sanitize($_POST["descripcion"]);

                    $res = $modificar->modificarEspecialidad($id_esp, $nombre, $descripcion);
                    if($res){
                        $mensaje = "<div class='alert alert-success' id='mensaje_edit'>Registro modificado</div>";
                    }else{
                         $mensaje = "<div class='alert alert-danger' id='mensaje_edit'>No se pudo modificar el registro</div>";
                    }
 
                    echo $mensaje;
                    header( "refresh:0.8; url=buscar_es.php" );
                }

                // Eliminar

                if(!empty($_POST["id_esp"]) && isset($_POST["delete"]) ){
                    $id = $modificar->sanitize($_POST["id_esp"]);
                    $res = $modificar->eliminarEspecialidad($id);
                    if($res){
                        $mensaje = "<div class='alert alert-success'>Registro eliminado</div>";
                    }else{
                         $mensaje = "<div class='alert alert-danger' id='mensaje_edit'>No se pudo eliminar el registro</div>";
                    }
                    echo $mensaje;
                    header( "refresh:0.8; url=buscar_es.php" );
                }

                // Buscar

                if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["mod"]) || isset($_GET["del"])){
                    $id = $modificar->sanitize($_GET["id"]);
                    $res = $modificar->buscarEspecialidad($id);
                    if($res){
                        ?>

                        <!-- Formularios -->

                        <form action="modificarEspecialidades_buscar.php" method="POST">
                            <div class="form-group">
                                <label for="id_esp">Número de identificación de la especialidad:</label>
                                <input id="id_esp" name="id_esp" type="number" required="required" class="form-control" readonly="" value="<?php echo $res->id_especialidad; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre de la especialidad:</label>
                                <input id="nombre" name="nombre" type="text" required="required" class="form-control" value="<?php echo $res->nombre; ?>">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción de la especialidad:</label>
                                <textarea id="descripcion" name="descripcion" cols="40" rows="3" class="form-control" required="required"><?php echo $res->descripcion; ?></textarea>
                            </div>
                            <div class="form-group">
                                <?php
                                
                                    if(isset($_GET["mod"])){
                                        ?>
                                            <button name="submit" type="submit" class="btn btn-primary">Modificar</button>
                                        <?php
                                    }

                                ?>
                            </div>
                </form>

                <?php
                
                if(isset($_GET["del"])){
                    ?>
                    <form action="modificarEspecialidades_buscar.php" method="post">
                        <div class="form-group">
                            <input id="id_esp" name="id_esp" type="number" required="required" class="form-control" hidden="" readonly="" value="<?php echo $res->id_especialidad; ?>">
                            <button name="delete" type="submit" class="btn btn-danger" >Borrar</button>
                        </div>
                    </form>
                    <?php
                }
                ?>
                        
                        <?php
                    }else{
                        echo " <div class='alert alert-danger' id='mensaje_edit'> Registro no encontrado</div> ";
                        header( "refresh:0.8; url=buscar_es.php" );
                    }
                }
                ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>