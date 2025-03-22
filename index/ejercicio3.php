<?php
function calcularModa($numeros) {
    $frecuencias = [];
    foreach ($numeros as $numero) {
        $clave = (string)$numero;
        if (isset($frecuencias[$clave])) {
            $frecuencias[$clave]++;
        } else {
            $frecuencias[$clave] = 1;
        }
    }
    arsort($frecuencias);
    return (float)array_key_first($frecuencias);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeros = $_POST["numeros"];

    $numerosArray = array_map('floatval', array_filter(explode(',', $numeros), 'is_numeric'));

    if (empty($numerosArray)) {
        echo "<h1>Error</h1>";
        echo "<div class='result'>No se ingresaron números válidos.</div>";
        echo "<br><a href='index3.html'>Volver a intentar</a>";
        exit();
    }

    $promedio = array_sum($numerosArray) / count($numerosArray);

    sort($numerosArray);
    $n = count($numerosArray);
    $media = ($n % 2 == 0) ? ($numerosArray[$n / 2 - 1] + $numerosArray[$n / 2]) / 2 : $numerosArray[($n - 1) / 2];

    $moda = calcularModa($numerosArray);

    echo "<h1>Resultados</h1>";
    echo "<div class='result'>";
    echo "<strong>Números ingresados:</strong> " . implode(', ', $numerosArray) . "<br>";
    echo "<strong>Promedio:</strong> " . number_format($promedio, 2) . "<br>";
    echo "<strong>Media:</strong> " . number_format($media, 2) . "<br>";
    echo "<strong>Moda:</strong> " . $moda . "<br>";
    echo "</div>";
    echo "<br><a href='index3.html'>Volver a calcular</a>";
} else {
    header("Location: index3.html");
    exit();
}
?>