<?php
    include("db.php");

    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    if($usuario == "root" and $contraseña == "root2021"){
        header("location: pagina/inicio.php");
    }else{}

    session_start();
    $_SESSION["usuario"] = $usuario;

    $consulta= "SELECT * FROM usuarios where nombre_usuario = '$usuario' and contraseña = '$contraseña'";
    $resultado = mysqli_query($conexion, $consulta);

    $filas = mysqli_num_rows($resultado);

    if($filas){
        header("location: pagina/pag_usuarios/inicio.php");
    }else{
            ?>
            <?php
            include("index.php");
            ?>
            <div class='error'>Error en la autentificación</div>
            <?php
        }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    ?>