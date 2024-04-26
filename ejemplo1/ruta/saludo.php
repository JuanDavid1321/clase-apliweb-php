<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo</title>
</head>
<body>
    Bienvenido <?=$_POST['nombre']?><br>
    Su correo electrónico es: <?=$_POST['email']?><br>
    <?php
        foreach ($_POST as $x => $value) {
            echo $x. " = ".$value. "<br>";
        }
    ?>
</body>
</html>