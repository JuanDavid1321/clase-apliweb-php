<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosIndex.css">
    <title>Iniciar sesión</title>
</head>

<body>
    <div class="contenedorLogin">
        <form action="login.php" method="post">
            <h1>Iniciar sesión</h1>
            <div class="contenedorInputs">
                <div class="contenedorInputUsuario">
                    <label for="user">Usuario</label>
                    <input class="inputs" type="text" name="user" id="user" placeholder="Escriba su nombre de usuario" required>
                </div>
                <div class="contenedorInputContrasena">
                    <label for="password">Constraseña</label>
                    <input class="inputs" type="password" name="password" id="password" placeholder="Escriba su contraseña" required>
                </div>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>