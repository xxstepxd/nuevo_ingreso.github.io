<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cartas.css">
    <link rel="stylesheet" href="css/pagina.css">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <!-- Otros -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <!-- Include -->
<?php include("menu/menu.html"); ?>
    <!-- Index -->
    <div class="contenedorCartas">
    <div class="title_index">
        <h3 class="title_h3">Base de datos de nuevo ingreso</h3>
    </div>
    <!-- Links profecionales -->
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img src="img/listadoAlumnos.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Listado de alumnos</h5>
                <p class="card-text">En esta sección podrás ver el listado de alumnos que se encuentran registrados en la base de datos.</p>
                <a href="listado_al.php" class="btn btn-primary">Entrar a</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="img/registrarAlumno.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Registrar alumnos</h5>
                <p class="card-text">En está sección el alumno deberá ingresar sus datos para ser registrado en la base de datos.</p>
                <a href="agregar_al.php" class="btn btn-primary">Entrar a</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="img/buscarAlumno.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Buscar alumnos</h5>
                <p class="card-text">En está sección podrás buscar cualquier alumno que se encuentre registrado en la base de datos.</p>
                <a href="buscar_al.php" class="btn btn-primary">Entrar a</a>
            </div>
        </div>
    </div>
    </div>
</body>
</html>