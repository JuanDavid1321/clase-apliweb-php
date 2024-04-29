<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "../menu.php";?>
    <h1>Cuerpo de la página 3</h1>
    <?php 
        echo readfile("webdictionary.txt");
        $archivo = fopen("webdictionary.txt", "r") or die("No se pudo abrir el archivo");
        echo fread($archivo,filesize("webdictionary.txt"));
        fclose($archivo);
    ?>

    <?php 
        $myfile = fopen("testfile.txt", "a") or die("Unable to open file!");
        $texto = "Universidad del Cauca\n";
        fwrite($myfile, $texto);
        $texto2 = "Fiet\n";
        fwrite( $myfile, $texto2);
        fclose($myfile);
    ?>
</body>
</html>