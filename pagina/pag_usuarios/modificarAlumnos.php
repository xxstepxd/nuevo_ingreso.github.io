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
    <title>Modificar alumno</title>
</head>
<body>
    <!-- Include -->
    <?php include("menu/menu.html"); ?>
    <!-- contenedores -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="contenedor">
                    <h3 class="title_h3">Modificar alumno</h3>

                    
                    <?php

                    // php
                    include("logica/database.php");
                    $alumnos = new DATABASE();

                    // Modificar
                    if(!empty($_POST) && isset($_POST["submit"])){
                        $id_alumno = $alumnos->sanitize($_POST["id_alumno"]);
                        $especialidad = $alumnos->sanitize($_POST["especialidad"]);
                        $nombres = $alumnos->sanitize($_POST["nombres"]);
                        $apellidos = $alumnos->sanitize($_POST["apellidos"]);
                        $edad = $alumnos->sanitize($_POST["edad"]);
                        $fecha_nacimiento = $alumnos->sanitize($_POST["fecha_nacimiento"]);
                        $lugar_nacimiento = $alumnos->sanitize($_POST["lugar_nacimiento"]);
                        $dui = $alumnos->sanitize($_POST["dui"]);
                        $telefono = $alumnos->sanitize($_POST["telefono"]);
                        $direccion = $alumnos->sanitize($_POST["direccion"]);
                        $correo_electronico = $alumnos->sanitize($_POST["correo_electronico"]);
                        $institucion_cursado = $alumnos->sanitize($_POST["institucion_cursado"]);
                        $cuota_mensual = $alumnos->sanitize($_POST["cuota_mensual"]);
                        $nombres_encargado = $alumnos->sanitize($_POST["nombres_encargado"]);
                        $apellidos_encargado = $alumnos->sanitize($_POST["apellidos_encargado"]);
                        $edad_encargado = $alumnos->sanitize($_POST["edad_encargado"]);
                        $dui_encargado = $alumnos->sanitize($_POST["dui_encargado"]);
                        $nit_encargado = $alumnos->sanitize($_POST["nit_encargado"]);
                        $direccion_encargado = $alumnos->sanitize($_POST["direccion_encargado"]);
                        $telefono_encargado = $alumnos->sanitize($_POST["telefono_encargado"]);
                        $correo_electronico_encargado = $alumnos->sanitize($_POST["correo_electronico_encargado"]);
                        $estado_civil_encargado = $alumnos->sanitize($_POST["estado_civil_encargado"]);
                        $ocupacion = $alumnos->sanitize($_POST["ocupacion"]);
                        $nombre_trabajo = $alumnos->sanitize($_POST["nombre_trabajo"]);
                        $telefono_trabajo = $alumnos->sanitize($_POST["telefono_trabajo"]);
                        $correo_electronico_trabajo = $alumnos->sanitize($_POST["correo_electronico_trabajo"]);
                        $direccion_trabajo = $alumnos->sanitize($_POST["direccion_trabajo"]);
    
                        $res = $alumnos->modificarAlumno($id_alumno, $especialidad, $nombres, $apellidos, $edad, $fecha_nacimiento, $lugar_nacimiento, $dui, $telefono, $direccion, $correo_electronico, $institucion_cursado, $cuota_mensual, $nombres_encargado, $apellidos_encargado, $edad_encargado, $dui_encargado, $nit_encargado, $direccion_encargado, $telefono_encargado, $correo_electronico_encargado, $estado_civil_encargado, $ocupacion, $nombre_trabajo, $telefono_trabajo, $correo_electronico_trabajo, $direccion_trabajo);
                        if($res){
                            $mensaje = "<div class='alert alert-success' id='mensaje_edit'>Registro modificado</div>";
                        }else{
                             $mensaje = "<div class='alert alert-danger' id='mensaje_edit'>No se pudo modificar el registro</div>";
                        }
     
                        echo $mensaje;
                        header( "refresh:0.8; url=listado_al.php" );
                    }
                    
                    // Eliminar

                    if(!empty($_POST["id_alumno"]) && isset($_POST["delete"])){
                        $id_alumno = $alumnos->sanitize($_POST["id_alumno"]);
                        $res = $alumnos->eliminarAlumno($id_alumno);
                        if($res){
                            $mensaje = "<div class='alert alert-success'>Registro eliminado</div>";
                        }else{
                             $mensaje = "<div class='alert alert-danger' id='mensaje_edit'>No se pudo eliminar el registro</div>";
                        }
                        echo $mensaje;
                        header( "refresh:0.8; url=listado_al.php" );
                    }

                    // Buscar

                if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["mod"]) || isset($_GET["del"])){
                    $id = $alumnos->sanitize($_GET["id"]);
                    $res = $alumnos->buscarAlumno($id);
                    if($res){
                        ?>

                        <!-- Formulario -->

                    <form action="modificarAlumnos.php" method="POST">
                    <div class="form-group">
                        <label for="id_alumno">Número de identificación del alumno:</label>
                        <input id="id_alumno" name="id_alumno" type="number" required="required" class="form-control" readonly="" value="<?php echo $res->id ?>">
                    </div>
                    <!-- Nueva especialidad -->
                    <div class="formulario form-group">
                        <label for="especialidad">Elija una especialidad:</label>
                        <div>
                            <select name="especialidad" id="especialidad" class="custom-select" required="required">
                                <?php
                                    $res2 = $alumnos->mostrarEspecialidades();
                                    if(!$res2){
                                    }else{
                                        while($row = mysqli_fetch_object($res2)){
                                            ?>
                                            <option value="<?php echo $row->id_especialidad; ?>"><?php echo $row->nombre; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres del estudiante:</label>
                        <input id="nombres" name="nombres" type="text" required="required" class="form-control" value="<?php echo $res->nombres ?>">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos del estudiante:</label>
                        <input id="apellidos" name="apellidos" type="text" required="required" class="form-control" value="<?php echo $res->apellidos ?>">
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad del estudiante:</label>
                        <input id="edad" name="edad" type="number" required="required" class="form-control" value="<?php echo $res->edad ?>">
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento del estudiante:</label>
                        <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" required="required" class="form-control" value="<?php echo $res->fecha_nacimiento ?>">
                    </div>
                    <div class="form-group">
                        <label for="lugar_nacimiento">Lugar de nacimiento del estudiante:</label>
                        <textarea id="lugar_nacimiento" name="lugar_nacimiento" cols="40" rows="3" class="form-control" required="required"><?php echo $res->lugar_nacimiento ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dui">Número de dui del estudiante:</label>
                        <input id="dui" name="dui" type="text" class="form-control" value="<?php echo $res->dui ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Número de teléfono del estudiante:</label>
                        <input id="telefono" name="telefono" type="text" class="form-control" value="<?php echo $res->telefono ?>">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección del estudiante:</label>
                        <textarea id="direccion" name="direccion" cols="40" rows="3" class="form-control" required="required"><?php echo $res->direccion ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="correo_electronico">Correo electrónico del estudiante:</label>
                        <input id="correo_electronico" name="correo_electronico" type="email" class="form-control" value="<?php echo $res->correo_electronico ?>">
                    </div>
                    <div class="form-group">
                        <label for="institucion_cursado">Institución educativa donde estudió el estudiante:</label>
                        <input id="institucion_cursado" name="institucion_cursado" type="text" class="form-control" value="<?php echo $res->institucion_cursado ?>">
                    </div>
                    <div class="form-group">
                        <label for="cuota_mensual">Cuota mensual que pagaba el estudiante:</label>
                        <input id="cuota_mensual" name="cuota_mensual" type="text" class="form-control" value="<?php echo $res->cuota_mensual ?>">
                    </div>
                    <div class="form-group">
                        <label for="nombres_encargado">Nombre del encargado:</label>
                        <input id="nombres_encargado" name="nombres_encargado" type="text" class="form-control" value="<?php echo $res->nombres_encargado ?>">
                    </div>
                    <div class="form-group">
                        <label for="apellidos_encargado">Apellido del encargado:</label>
                        <input id="apellidos_encargado" name="apellidos_encargado" type="text" class="form-control" value="<?php echo $res->apellidos_encargado ?>">
                    </div>
                    <div class="form-group">
                        <label for="edad_encargado">Edad del encargado:</label>
                        <input id="edad_encargado" name="edad_encargado" type="number" class="form-control" value="<?php echo $res->edad_encargado ?>">
                    </div>
                    <div class="form-group">
                        <label for="dui_encargado">Número de dui del encargado:</label>
                        <input id="dui_encargado" name="dui_encargado" type="text" class="form-control" value="<?php echo $res->dui_encargado ?>">
                    </div>
                    <div class="form-group">
                        <label for="nit_encargado">Número de nit del encargado:</label>
                        <input id="nit_encargado" name="nit_encargado" type="text" class="form-control" value="<?php echo $res->nit_encargado ?>">
                    </div>
                    <div class="form-group">
                        <label for="direccion_encargado">Dirección del encargado:</label>
                        <textarea id="direccion_encargado" name="direccion_encargado" cols="40" rows="3" class="form-control" required="required"><?php echo $res->direccion_encargado ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telefono_encargado">Número de teléfono del encargado:</label>
                        <input id="telefono_encargado" name="telefono_encargado" type="text" class="form-control" value="<?php echo $res->telefono_encargado ?>">
                    </div>
                    <div class="form-group">
                        <label for="correo_electronico_encargado">Correo electrónico del encargado:</label>
                        <input id="correo_electronico_encargado" name="correo_electronico_encargado" type="email" class="form-control" value="<?php echo $res->correo_electronico_encargado ?>">
                    </div>
                    <div class="form-group">
                        <label for="estado_civil_encargado">Estado civil del encargado:</label>
                        <input id="estado_civil_encargado" name="estado_civil_encargado" type="text" class="form-control" value="<?php echo $res->estado_civil_encargado ?>">
                    </div>
                    <div class="form-group">
                        <label for="ocupacion">Ocupación del encargado:</label>
                        <input id="ocupacion" name="ocupacion" type="text" class="form-control" value="<?php echo $res->ocupacion ?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre_trabajo">Nombre de su trabajo:</label>
                        <input id="nombre_trabajo" name="nombre_trabajo" type="text" class="form-control" value="<?php echo $res->nombre_trabajo ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefono_trabajo">Número de teléfono de su trabajo:</label>
                        <input id="telefono_trabajo" name="telefono_trabajo" type="text" class="form-control" value="<?php echo $res->telefono_trabajo ?>">
                    </div>
                    <div class="form-group">
                        <label for="correo_electronico_trabajo">Correo electrónico de su trabajo:</label>
                        <input id="correo_electronico_trabajo" name="correo_electronico_trabajo" type="email" class="form-control" value="<?php echo $res->correo_electronico_trabajo ?>">
                    </div>
                    <div class="form-group">
                        <label for="direccion_trabajo">Dirección de su trabajo:</label>
                        <textarea id="direccion_trabajo" name="direccion_trabajo" cols="40" rows="3" class="form-control" required="required"><?php echo $res->direccion_trabajo ?></textarea>
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
                    <form action="modificarAlumnos.php" method="post">
                        <div class="form-group">
                        <input id="id_alumno" name="id_alumno" type="number" required="required" class="form-control" hidden="" readonly="" value="<?php echo $res->id ?>">
                            <button name="delete" type="submit" class="btn btn-danger" >Borrar</button>
                        </div>
                    </form>
                    <?php
                }
                ?>
                        
                        <?php
                    }else{
                        echo " <div class='alert alert-danger' id='mensaje_edit'> Registro no encontrado</div> ";
                        header( "refresh:0.8; url=listado_al.php" );
                    }
                }
                ?>

            </div>
            </div>
        </div>
    </div>
</body>
</html>