<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formularioEdad.css">
    <title>Calcular edad</title>
</head>
<body>
    <header><?php include 'menu.php';?></header>
    <h1>Calcular su edad con base a la fecha actual</h1>
    <section>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            Nombre: <input type="text" name="nombre" id="">
            Su año de nacimiento: <input type="date" name="fecha" id="">
            <input type="submit" value="Enviar">
        </form>
    </section>
    <section>
        <div>
            <?php 
                $banderaNombre=isset($_POST['nombre']) ? true : false;
                $banderaFecha=isset($_POST['fecha']) ? true : false;
            ?>
            <?php if(!$banderaNombre || !$banderaFecha): ?>
                <h3>Rellene completo el formulario por favor</h3>
            <?php else: ?>
                <p><?php echo "Nombre: ". $_POST["nombre"]?></p> 
                    <?php  
                        $anio = date("Y-m-d");
                        // ${->y} accede al método de año del objeto DateTime
                        $edad = date_diff(date_create($_POST["fecha"]), date_create($anio)) -> y;
                        echo "<p>Edad actual: $edad" . "</p>";
                    ?>
                </p>
            <?php endif;?>
        </div>
    </section>

    <footer><?php include "./footer.php" ?></footer>
</body>
</html>