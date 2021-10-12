<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="pagina/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gluten:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- JS -->
    <!-- Otros -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <main>

    <div class="contenedor__todo">

        <div class="caja__trasera">
            <div class="caja__trasera-login">
                <h3 class="h3_caja">¿Ya tienes una cuenta?</h3>
                <p class="h3_caja">Inicia sesion para entrar en la página</p>
            </div>
            <div class="caja__trasera-register">
            <h3>¿Ya tienes una cuenta?</h3>
                <p>Inicia sesion para entrar en la página</p>
            </div>
        </div>

            <!-- Formulario de login y registro -->

        <div class="contenedor__login-register">

            <form action="validar.php" method="post" class="formulario__login">

                <!-- Login -->

                <h2>Iniciar Sesión</h2>
                <input type="text" name="usuario" id="usuario" placeholder="Nombre de usuario">
                <input type="password" placeholder="Contraseña" name="contraseña" id="contraseña">
                <button>Entrar</button>
            </form>

                <!-- Registro -->

            <form action="registrar.php" method="post" class="formulario__register">
                <h2>Registrarse</h2>
                <input type="text" placeholder="Nombre de usuario" name="usuario" id="usuario">
                <input type="password" placeholder="Contraseña" name="contraseña" id="contraseña">
                <button type="submit">Registrarse</button>
            </form>

        </div>
    </div>

    </main>

    <script src="pagina/js/script.js"></script>
</body>
</html>