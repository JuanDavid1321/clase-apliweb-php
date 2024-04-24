<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página 2</title>

    <?php
        function saludar(){print"<h3>Hola Apliweb</h3>";}
    ?>
</head>
<body>
    <h2>Cadenas de texto</h2>
    <?php
        $nombre = "Universidad del Cauca";

        echo "Nombre: $nombre </br>"; //Imprime el valor de la variable nombre

        echo "Tamaño de la cadena: ".strlen($nombre)." caracteres"."</br>";  //Tamañano en caracteres del String

        echo "Número de palabras: ".str_word_count($nombre)." palabras"."</br>"; //Contar la cantidad de palabras en el String

        echo strpos($nombre, "del") . "</br>"; //Encontrar la posición del inicio de una palabra en el String

        echo strtoupper($nombre) . "</br>";

        echo str_replace("Cauca", "Valle", $nombre) . "</br>";

        $nombre = trim($nombre);
        echo $nombre . "</br>";

        $arreglo = explode(" ", $nombre);
        print_r($arreglo); // Para poder imprimir el arreglo, en lugar de utilizar echo que no funciona

        echo "</br>" . "<p>Cortar cadenas de texto</p>";
        $cadenaRecortada = substr($nombre, 12,15);
        print($cadenaRecortada) . "</br>";
        saludar();
    ?>

    <h2>Números</h2>
    <?php
        $x = 23465.768;
        $intCast = (int)$x;
        echo "Originalmente: ".$x."</br>"." Conversión: ".$intCast."</br>"."</br>";

        $y = "2222";
        $strNum = (float)$y;
        echo  "Originalmente".var_dump($y)."</br>"."Conversión: ". $strNum."</br>"."</br>";
    ?>

    <h2>Ciclos</h2>
    <?php 
    print "<h3>While</h3>";
    $i = 0;
    while ($i <= 10) {
        echo $i;
        $i++;
    }
    ?>
    
    <h2>Funciones</h2>
    <?php
        // Está definida en el Head del HTML
        saludar();
        
        // Recibiendo un parámetro
        function saludarConNombre($name){
            echo "¡Hola " .$name. "! </br>";
        }
        saludarConNombre("Juan");

        // Función que recibe múltiples parámetros y parámetros por defecto
        function  imprimirDatos($nombre, $edad, $ciudad="Cali"){
            print "nombre: $nombre, edad: $edad, ciudad: $ciudad </br>";
        }
        imprimirDatos("María", 29);

        // Función que devuelva la suma de los números hasta un límite (por defecto o dado por el usuario)
        function imprimirSumaNumeros($limite=100) {
            $sum = 0;
            for ($i = 1; $i <= $limite; $i++) {
                $sum += $i;
            }
            echo  "La suma de los números hasta el limite ($limite) = ".$sum."</br>";
        }
        imprimirSumaNumeros();
        imprimirSumaNumeros(15564);

        // Funciones con retornos
        function conversorLibrasAKilos($valorLibras=5){
            return $valorLibras * 0.45359237;
        }
        $resultado = conversorLibrasAKilos(50);
        echo  "El resultado de la conversión de [Lb] a [Kg] es: "
            .number_format($resultado, 2)
            ." [Kg].</br>";

        // conversorMonetario va a recibir un numero y una cadena en pesos o dolares si es a dolares o si es a pesos
        function conversorMonetario($valor, $tipoConversion){
            if($tipoConversion === 'USD'){
                return $valor / 3925;
            }
            else if ($tipoConversion === 'COP'){
                return $valor * 3925;
            }
            else{
                return null;
            }
        }
        echo "50.000 COP son: ".number_format(conversorMonetario(50000,'USD'),2)." USD </br>";
        echo "100 USD son: ".number_format(conversorMonetario(100,'COP'),2)." COP </br>";
    ?>

    <h2>SuperGlobales</h2>
    <?php 
        echo $_SERVER['PHP_SELF']."= Self</br>";
        echo $_SERVER['SERVER_NAME']."= Server</br>";
        echo $_SERVER['HTTP_HOST']."= Host</br>";
        echo $_SERVER['HTTP_REFERER']."= Referer</br>";
        echo $_SERVER['HTTP_USER_AGENT']."= User agent</br>";
        echo $_SERVER['SCRIPT_NAME']."= Script name</br>";
    ?>

    <h2>Expresiones regualares en PHP</h2>
    <?php
        $str = "Visit W3Schools";
        $pattern = "/w3schools/i";
        echo preg_match($pattern, $str)."<br>";

        $str = "Apples and bananas. ";
        $pattern = "/ba(na){2}/i";
        echo preg_match_all($pattern,$str)."<br>";
    ?>
</body>
</html>