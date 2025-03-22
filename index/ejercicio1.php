<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $frase = $_POST["frase"];

   
    $acronimo = "";
    $palabras = explode(" ", $frase); 
    foreach ($palabras as $palabra) {
        if (!empty($palabra)) {
            $acronimo .= strtoupper($palabra[0]);
        }
    }
} else {
   
    header("Location: index1.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Acrónimo</title>
  
</head>
<body>
    <div class="container">
        <h1>Resultado del Acrónimo</h1>
        <div class="result">
            <strong>Frase ingresada:</strong> <?php echo htmlspecialchars($frase); ?><br>
            <strong>Acrónimo generado:</strong> <?php echo $acronimo; ?>
        </div>
        <br>
        <a href="index1.html">Volver al generador</a>
    </div>
</body>
</html>