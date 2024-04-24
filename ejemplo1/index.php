<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi primer script PHP</title>
</head>

<body>
    <h2>Esto es HTML puro</h2>
    <?php
        $texto = "Mi primer script en php";
        echo "Texto $texto</br>";
        print "<h3>Otro texto</h3>"
    ?>

    <p>Este texto está fuera de PHP</p>

    <?= "Esto si que es PHP</br>" ?>

    <p>
        <?=
            // Concatenar una cadena de texto
            "Hola " . "¿Cómo estás?"

            /*
             * Comentario de múltiples líneas
             */
            ?>
    </p>

    <h3>Ejemplos de variables en PHP</h3>
    <?php
        $x = 15;
        $y = 20;
        $mult = $x * $y;
    ?>
    <?= "Multiplicación de x, y = $mult, y la suma es" . $x + $y . "</br>"; ?>

    <?php
        // Para conocer el tipo de dato se utiliza var_dump()
        echo "El tipo de dato de x es: ";
        echo var_dump($x);
        echo "</br>";
        echo "El tipo de dato de y es: ";
        echo var_dump($y);
        echo "</br>";
    ?>

    <h3>Ejemplo de variables globales</h3>
    <?php
        $saludo = "Hola mundo";

        //Probando sin utilizar global
        // function saludar(){
        //     echo $saludo;
        // }
        // saludar();
        
        //Probando con global
        function saludar2()
        {
            global $saludo;
            echo $saludo . "</br>";
        }
        saludar2();

        //Probando con $GLOBALS[]
        $a = 15;
        $b = 10;
        function imprimirGlobales()
        {
            echo $GLOBALS["a"] + $GLOBALS["b"] . "</br>";
        }
        imprimirGlobales();
    ?>

    <h3>Sección de tipo de datos</h3>
    <?php
        // === Tipos de datos ===
        
        // String
        $x = "Hello world!";
        $y = 'Hello world!';

        var_dump($x);
        echo "<br>";
        var_dump($y);

        // Int
        $x = 10.365;
        var_dump($x);
        echo "<br>";

        // Float
        $x = 10.365;
        var_dump($x);
        echo "<br>";

        // Boolean
        $x = true;
        var_dump($x);
        echo "<br>";

        // Array
        $cars = array("Volvo", "BMW", "Toyota");
        var_dump($cars);
        echo "<br>";

        // Object
        class Car
        {
            public $color;
            public $model;
            public function __construct($color, $model)
            {
                $this->color = $color;
                $this->model = $model;
            }
            public function message()
            {
                return "My car is a " . $this->color . " " . $this->model . "!";
            }
        }

        $myCar = new Car("red", "Volvo");
        var_dump($myCar);
        echo "<br>";

        // Null
        $x = null;
        var_dump($x);
        echo "<br>";

        // Cambiar el tipo de dato
        $x = 5;
        $x = (string) $x;
        var_dump($x);
    ?>

    <h3>Sección de Strings</h3>
    <?php
        // Longitud de String
        echo strlen("Hello workd!");
        echo "</br>";

        // Contador de palabras
        echo str_word_count("Hello world!");
        echo "</br>";

        // Buscar texto dentro de una cadena
        $texto = "Hola como estas";
        echo strpos($texto, "estas");
        echo "</br>";

        // Convertir a mayúsculas
        echo strtoupper($texto);
        echo "</br>";

        // Convertir a minúsculas
        echo strtolower($texto);
        echo "</br>";

        // Reemplazar un String
        $x = "Hello world!";
        echo str_replace("world", "PHP", $x);
        echo "</br>";

        // Invertir un String
        echo strrev($x);
        echo "</br>";

        // Eliminar espacios en blanco en el String
        $y = "   Hola     ";
        echo trim($y);
        echo "</br>";

        // Convertir String a Array
        $x = "Hello World!";
        $y = explode(" ", $x);
        print_r($y);
        echo "</br>";
    ?>
    
    <h3>Sección Números</h3>
    <?php
        // Validar si el tipo de dato es entero
        $x = 5985;
        var_dump(is_int($x));
        echo "</br>";
        $x = 59.85;
        var_dump(is_int($x));
        echo "</br>";

        // Validar si el tipo de dato es flotante
        $x = 10.365;
        var_dump(is_float($x));
        echo "</br>";   
    ?>

    <h3>Sección de transformaciones de tipo de datos</h3>
    <?php
        // float a int
        $x = 23465.768;
        $int_cast = (int)$x;
        echo $int_cast;
        echo "</br>";

        // string a int
        $x = "23465.768";
        $int_cast = (int)$x;
        echo $int_cast;
        echo "</br>";

        // Varias transformaciones
        $a = 5;       // Integer
        $b = 5.34;    // Float
        $c = "hello"; // String
        $d = true;    // Boolean
        $e = NULL;    // NULL

        $a = (string) $a;
        $b = (string) $b;
        $c = (string) $c;
        $d = (string) $d;
        $e = (string) $e;

        //To verify the type of any object in PHP, use the var_dump() function:
        var_dump($a);
        echo "</br>";
        var_dump($b);
        echo "</br>";
        var_dump($c);
        echo "</br>";
        var_dump($d);
        echo "</br>";
        var_dump($e);
        echo "</br>";
    ?>

    <h3>Sección Matemáticas</h3>
    <?php
        //Función pi
        echo(pi());
        echo "</br>";

        // Funciones de mínimo y máximo
        echo(min(0, 150, 30, 20, -8, -200));
        echo "</br>";
        echo(max(0, 150, 30, 20, -8, -200));
        echo "</br>";

        // Función absoluto
        echo(abs(-76));
        echo "</br>";

        // Función raíz cuadrada
        echo(sqrt(49));
        echo "</br>";

        // Función redondeo
        echo(round(12.345));
        echo "</br>";

        // Números aleatorios
        $numeroAleatorio = rand();
        echo("Número Aleatorio: " .$numeroAleatorio);
        echo "</br>";
    ?>

    <h3>Sección constantes</h3>
    <?php
        // Crear una constate
        define('PI', 3.1416);
        echo PI;
        echo "</br>";

        // Crear una constante con la palabra clave "const"
        const EULER = 2.71828;
        echo EULER;
        echo "</br>";

        /*
            PHP tiene varias constantes predefinidas que se pueden utilizar en el código. Estas constantes son:
            __CLASS__	        If used inside a class, the class name is returned.	
            __DIR__	            The directory of the file.	
            __FILE__	        The file name including the full path.	
            __FUNCTION__	    If inside a function, the function name is returned.	
            __LINE__	        The current line number.	
            __METHOD__	        If used inside a function that belongs to a class, both class and function name is returned.	
            __NAMESPACE__	    If used inside a namespace, the name of the namespace is returned.	
            __TRAIT__	        If used inside a trait, the trait name is returned.	
            ClassName::class	Returns the name of the specified class and the name of the namespace, if any.
            
        */
    ?>

    <h3>Sección operadores</h3>
    <?php
        echo "<h4>Operadores aritméticos</h4>";
        echo '<table>
            <tr>
                <th>Operation</th>
                <th>Symbol</th>
                <th>PHP Code</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>Addition</td>
                <td>+</td>
                <td>$x + $y</td>
                <td>Sum of $x and $y</td>
            </tr>
            <tr>
                <td>Subtraction</td>
                <td>-</td>
                <td>$x - $y</td>
                <td>Difference of $x and $y</td>
            </tr>
            <tr>
                <td>Multiplication</td>
                <td>*</td>
                <td>$x * $y</td>
                <td>Product of $x and $y</td>
            </tr>
            <tr>
                <td>Division</td>
                <td>/</td>
                <td>$x / $y</td>
                <td>Quotient of $x and $y</td>
            </tr>
            <tr>
                <td>Modulus</td>
                <td>%</td>
                <td>$x % $y</td>
                <td>Remainder of $x divided by $y</td>
            </tr>
            <tr>
                <td>Exponentiation</td>
                <td>**</td>
                <td>$x ** $y</td>
                <td>Result of raising $x to the $y\'th power</td>
            </tr>
        </table>';
        echo "</br>";
        echo "para más operadores, visite: ";
        echo '<a href="https://www.w3schools.com/php/php_operators.asp">LINK</a>'; 
        
    ?>
</body>
</html>