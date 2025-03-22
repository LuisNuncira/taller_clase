<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $conjuntoA = $_POST['conjuntoA'];
    $conjuntoB = $_POST['conjuntoB'];


    $conjuntoA = array_map('intval', explode(',', $conjuntoA));
    $conjuntoB = array_map('intval', explode(',', $conjuntoB));

    
    $conjuntoA = array_unique($conjuntoA);
    $conjuntoB = array_unique($conjuntoB);

   
    $union = array_unique(array_merge($conjuntoA, $conjuntoB));

    
    $interseccion = array_intersect($conjuntoA, $conjuntoB);

   
    $diferenciaAB = array_diff($conjuntoA, $conjuntoB);

    
    $diferenciaBA = array_diff($conjuntoB, $conjuntoA);

    echo "<h2>Resultados:</h2>";
    echo "<strong>Conjunto A:</strong> " . implode(', ', $conjuntoA) . "<br>";
    echo "<strong>Conjunto B:</strong> " . implode(', ', $conjuntoB) . "<br><br>";
    echo "<strong>Unión (A ∪ B):</strong> " . implode(', ', $union) . "<br>";
    echo "<strong>Intersección (A ∩ B):</strong> " . implode(', ', $interseccion) . "<br>";
    echo "<strong>Diferencia (A - B):</strong> " . implode(', ', $diferenciaAB) . "<br>";
    echo "<strong>Diferencia (B - A):</strong> " . implode(', ', $diferenciaBA) . "<br>";
}
?>