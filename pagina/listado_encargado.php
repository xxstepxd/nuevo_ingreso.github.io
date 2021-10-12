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
    <title>Listado del encargado</title>
</head>
<body>
    <!-- Include -->
    <?php include("menu/menu.html") ?>
    <!-- Cuadro de alumnos -->
    <div class="contenedor">
        <div class="table-wrapper table-responsive-sm">
            <div class="table-title">
                <div class="row">
                    <h3 class="title_h3">Encargado del alumno</h3>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th>DUI</th>
                        <th>NIT</th>
                        <th>Teléfono</th>
                        <th>Correo electronico</th>
                        <th>Retornar</th>
                    </tr>
                </thead>
                <!-- Conexión con la base de datos -->
                <tbody>
                    <?php

                        include("logica/database.php");
                        $alumnos = new DATABASE();
                        $id = intval($_GET['id']);
                        $listado = $alumnos->buscarEncargado($id);
                        while($row = mysqli_fetch_object($listado)){
                            $nombre_en = $row->nombres_encargado;
                            $apellido_en = $row->apellidos_encargado;
                            $edad_en = $row->edad_encargado;
                            $dui_en = $row->dui_encargado;
                            $nit_en = $row->nit_encargado;
                            $telefono_en = $row->telefono_encargado;
                            $correo_en = $row->correo_electronico_encargado;
                        ?>
                        <tr>
                            <td><?php echo $nombre_en;?></td>
                            <td><?php echo $apellido_en;?></td>
                            <td><?php echo $edad_en;?></td>
                            <td><?php echo $dui_en;?></td>
                            <td><?php echo $nit_en;?></td>
                            <td><?php echo $telefono_en;?></td>
                            <td><?php echo $correo_en;?></td>
                            <td>
                            <a href="listado_al.php" class="btn btn-info" id="links">Regresar</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
</html>