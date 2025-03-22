<?php
function convertirAFraseAcronimo($frase) {
    $frase = preg_replace("/[^a-zA-Z\- ]/", "", $frase);

    $palabras = preg_split("/[\s\-]+/", $frase);

    $acronimo = "";

    foreach ($palabras as $palabra) {
        if (!empty($palabra)) {
            $acronimo .= strtoupper($palabra[0]);
        }
    }

    return $acronimo;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST["frase"];
    $acronimo = convertirAFraseAcronimo($frase);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Acrónimo</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <h1>Resultado del Acrónimo</h1>
        <?php if (isset($acronimo)): ?>
            <div class="result">
                <strong>Frase ingresada:</strong> <?php echo htmlspecialchars($frase); ?><br>
                <strong>Acrónimo generado:</strong> <?php echo $acronimo; ?>
            </div>
        <?php else: ?>
            <div class="result">
                No se recibió ninguna frase.
            </div>
        <?php endif; ?>
        <br>
        <a href="index1.html">Volver al generador</a>
    </div>
</body>
</html>