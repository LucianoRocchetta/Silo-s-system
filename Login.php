<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login Silo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS\login_style.css">
    </head>
    <body>
        <main>
            <div id="all-container">
                <div id="panel">
                    <div class="container">
                    <img src="Sources/icon_user.png">
                    <h2>Login Silo</h2>
                    </div>
                </div>
                <div id="form">
                    <div class="container2">
                    <form method="POST" action="PHP/index_control_login.php">
                        <h2>Inicio de Sesion</h2>
                        <h3>Usuario</h3>
                        <input type="text" name="usuario" required autocomplete="off" maxlength="15">
                        <h3 for="pass">Contraseña</h3>
                        <input type="password" name="password" required autocomplete="off" maxlength="15">
                        <button type="submit">Iniciar Sesion</button>
                    </form>
                    </div>
                    </div>
                </div>
        </main>
    </body>
</html>