<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = intval($_POST["numero"]);
    $binario = decbin($numero);
    echo "<p>El número binario es: <strong>$binario</strong></p>";
}
?>