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
    <title>Listado de usuarios</title>
</head>
<body>
    <!-- Include -->
    <?php include("menu/menu.html") ?>
    <!-- Cuadro de especialidades -->
    <div class="contenedor">
        <div class="table-wrapper table-responsive-sm">
            <div class="table-title">
                <div class="row">
                    <h3 class="title_h3">Listado de usuario</h3>
                </div>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Contraseña</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <!-- Conexión con la base de datos -->
                <tbody>
                    <?php
                        include("logica/database.php");
                        $usuario = new DATABASE();
                        $listado = $usuario->mostrarUsuarios();
                        while($row = mysqli_fetch_object($listado)){
                        $id = $row->id_usuarios;
                        $nombre = $row->nombre_usuario;
                        $contraseña = $row->contraseña;
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $contraseña;?></td>
                        <td>
                            <a href="modificarUsuario.php?id=<?php echo $id; ?>&mod" class="btn btn-primary" id="links">Modificar</a>
                            <a href="modificarUsuario.php?id=<?php echo $id; ?>&del" class="btn btn-danger" id="links">Eliminar</a>
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