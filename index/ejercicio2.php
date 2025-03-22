<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['numero'];
    $operacion = $_POST['operacion'];

    if ($operacion == "fibonacci") {
        echo "<h2>Sucesión de Fibonacci hasta el término $numero:</h2>";
        $a = 0;
        $b = 1;
        echo "$a, $b";
        for ($i = 2; $i < $numero; $i++) {
            $c = $a + $b;
            echo ", $c";
            $a = $b;
            $b = $c;
        }
    } elseif ($operacion == "factorial") {
        echo "<h2>Factorial de $numero:</h2>";
        $factorial = 1;
        for ($i = 1; $i <= $numero; $i++) {
            $factorial *= $i;
        }
        echo $factorial;
    } else {
        echo "Operación no válida.";
    }
}
?>