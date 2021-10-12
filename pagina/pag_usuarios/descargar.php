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
    <title>PDF</title>
</head>
<body>
    <?php include("menu/menu.html"); ?>
    <?php include("logica/database.php"); ?>
    <?php $id_alumno = $_GET["id"];; ?>
    <div class="container-fluid" style="margin-top: 40px; padding-left: 200px; padding-right: 200px;">
        <div class="card text-center">
  <div class="card-header">
  ¿Desea descargar su información?
  </div>
  <div class="card-body">
    <p class="card-text">¿Quieres descargar tu registro en un formato PDF?</p>
    <a href="pdf/pdf.php?id=<?php echo $id_alumno; ?>" class="btn btn-primary" id="links" target="_blank">Imprimir</a>
    <a href="inicio.php" class="btn btn-danger" id="links">No</a>
  </div>
</div>
<div class='alert alert-success' id='mensaje_edit'>Registro Guardado</div>
</div>
    
</body>
</html>