<!DOCTYPE html>
<html>
<head>
    <title>Search and Sort Example</title>
</head>
<body>

<h2>Search and Sort Example</h2>

<form method="post">
    <label for="data">Ingrese datos (separados por comas):</label>
    <input type="text" id="data" name="data" required>
    <br>

    <label for="target">Elemento a buscar:</label>
    <input type="text" id="target" name="target" required>
    <br>

    <input type="submit" value="Realizar Búsqueda y Ordenamiento">
</form>

<?php
function linearSearch($data, $target) {
    foreach ($data as $element) {
        if ($element == $target) {
            return true;
        }
    }
    return false;
}

function selectionSort($data) {
    $length = count($data);

    for ($i = 0; $i < $length - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $length; $j++) {
            if ($data[$j] < $data[$minIndex]) {
                $minIndex = $j;
            }
        }
        $temp = $data[$minIndex];
        $data[$minIndex] = $data[$i];
        $data[$i] = $temp;
    }

    return $data;
}

function insertionSort($data) {
    $length = count($data);

    for ($i = 1; $i < $length; $i++) {
        $key = $data[$i];
        $j = $i - 1;

        while ($j >= 0 && $data[$j] > $key) {
            $data[$j + 1] = $data[$j];
            $j = $j - 1;
        }

        $data[$j + 1] = $key;
    }

    return $data;
}

function bubbleSort($data) {
    $length = count($data);

    for ($position = $length - 1; $position >= 0; $position--) {
        for ($scan = 0; $scan <= $position - 1; $scan++) {
            if ($data[$scan] > $data[$scan + 1]) {
                $temp = $data[$scan];
                $data[$scan] = $data[$scan + 1];
                $data[$scan + 1] = $temp;
            }
        }
    }

    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dataInput = $_POST["data"];
    $target = $_POST["target"];

    
    $data = array_map('intval', explode(',', $dataInput));

    echo "<h3>Datos Ingresados:</h3>";
    echo implode(", ", $data) . "<br>";


    $linearSearchResult = linearSearch($data, $target);
    echo "<h3>Búsqueda Lineal:</h3>";
    echo $linearSearchResult ? "Elemento encontrado" : "Elemento no encontrado";
    echo "<br>";


    $selectionSortResult = selectionSort($data);
    echo "<h3>Ordenamiento por Selección:</h3>";
    echo implode(", ", $selectionSortResult) . "<br>";


    $insertionSortResult = insertionSort($data);
    echo "<h3>Ordenamiento por Inserción:</h3>";
    echo implode(", ", $insertionSortResult) . "<br>";


    $bubbleSortResult = bubbleSort($data);
    echo "<h3>Ordenamiento de Burbuja:</h3>";
    echo implode(", ", $bubbleSortResult) . "<br>";
}
?>

</body>
</html>
