<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $preorden = isset($_POST['preorden']) ? explode(' ', $_POST['preorden']) : [];
    $inorden = isset($_POST['inorden']) ? explode(' ', $_POST['inorden']) : [];
    $postorden = isset($_POST['postorden']) ? explode(' ', $_POST['postorden']) : [];

    function construirArbolPreIn(&$preorden, $inorden) {
        if (empty($inorden)) return null;

        $raizVal = array_shift($preorden);
        $raiz = new stdClass();
        $raiz->valor = $raizVal;
        $raiz->izquierda = null;
        $raiz->derecha = null;

        $indiceRaiz = array_search($raizVal, $inorden);
        $raiz->izquierda = construirArbolPreIn($preorden, array_slice($inorden, 0, $indiceRaiz));
        $raiz->derecha = construirArbolPreIn($preorden, array_slice($inorden, $indiceRaiz + 1));

        return $raiz;
    }

    function imprimirArbol($nodo, $nivel = 0) {
        if ($nodo === null) return;

        imprimirArbol($nodo->derecha, $nivel + 1);
        echo str_repeat('   ', $nivel) . $nodo->valor . "\n";
        imprimirArbol($nodo->izquierda, $nivel + 1);
    }

    $arbol = null;
    if (!empty($preorden) && !empty($inorden)) {
        $arbol = construirArbolPreIn($preorden, $inorden);
    } elseif (!empty($postorden) && !empty($inorden)) {
        echo "Construcción a partir de postorden e inorden no implementada aún.";
    } else {
        echo "Debe ingresar al menos dos recorridos (preorden e inorden o postorden e inorden).";
    }

    if ($arbol !== null) {
        echo "<h2>Árbol Binario Construido:</h2>";
        echo "<pre>";
        imprimirArbol($arbol);
        echo "</pre>";
    }
}
?>