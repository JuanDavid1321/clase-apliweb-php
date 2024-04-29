<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Formulario para cargas archivos</h2>
    <!-- Importante el tipo de encriptación -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Seleccione una imagen para cargar:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>