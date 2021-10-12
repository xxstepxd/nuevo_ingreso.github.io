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
    <title>buscarAlumno</title>
</head>
<body>
        <!-- Include -->
        <?php include("menu/menu.html") ?>
        <!-- Label -->
        <div class="contenedor">
        <form action="buscar_es.php" method="post">
            <div class="form-group">
                <label for="nombre_buscado">Nombre del alumno</label>
                <input id="nombre_buscado" name="nombre_buscado" type="text" required="required" class="form-control">
            </div>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
        </div>
        <!-- Cuadro de alumnos -->
    <div class="contenedor">
        <div class="table-wrapper table-responsive-sm">
            <div class="table-title">
                <div class="row">
                    <h3 class="title_h3">Buscar especialidad</h3>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <!-- Conexión con la base de datos -->
                <tbody>
                    <?php
                    include("logica/database.php");
                    $buscar = new DATABASE();
                    if(isset($_POST) && !empty($_POST)){
                        $nombre_buscado = $buscar->sanitize($_POST["nombre_buscado"]);
                        $listado = $buscar->searchEspecialidad($nombre_buscado);
                            while($row = mysqli_fetch_object($listado)){
                                $id_especialidad = $row->id_especialidad;
                                $nombre = $row->nombre;
                                $descripcion = $row->descripcion;
                        ?>
                        <tr>
                            <td><?php echo $id_especialidad;?></td>
                            <td><?php echo $nombre;?></td>
                            <td><?php echo $descripcion;?></td>
                            <td>
                            <a href="modificarEspecialidades_buscar.php?id=<?php echo $id_especialidad; ?>&mod" class="btn btn-primary" id="links">Modificar</a>
                            <a href="modificarEspecialidades_buscar.php?id=<?php echo $id_especialidad; ?>&del" class="btn btn-danger" id="links">Eliminar</a>
                        </td>
                        </tr>
                            <?php
                        }
                    }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>