<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ques two</title>
</head>
<body>
    <div>
        <form method = "post">
        <table border = "1">
            <tr>
            <th>Number of Pizza</th>
            <th>Slices Per student</th>
            <th>Slices Per Pizza</th>
            </tr>
            <tr>
            <td><input type = "number" name = "numPizza" required></td>
            <td><input type = "number" name = "slicePerStudent" required></td>
            <td><input type = "number" name = "totalSlice" required></td>
        </table><br>
        <input type = "submit" name = "submit" value = "submit">
    </form>
    </div>
</body>
</html>

<?php

function calculatePizza($numPizza, $slicePerStudent, $totalSlice) {

    $pizzaPrice = 1050;

    $totalPizza = ceil($numPizza * $slicePerStudent / $totalSlice);
    $leftSlice = ($totalPizza * $totalSlice) - ($numPizza * $slicePerStudent);
    $waste = ($leftSlice / $totalSlice) * $pizzaPrice;

    echo "<br>";
    echo "<h2>Result:</h2><br>";
    echo "<table border='1'>";
    echo "<tr><th>Total Pizza</th><th>LeftOver Slice</th><th>Wasted Money (BDT)</th></tr>";
    echo "<tr><td>$totalPizza</td><td>$leftSlice</td><td>$waste</td></tr>";
    echo "</table>";
}

if (isset($_POST['submit'])) {

    $numPizza = intval($_POST['numPizza']);
    $slicePerStudent = intval($_POST['slicePerStudent']);
    $totalSlice = intval($_POST['totalSlice']);

    calculatePizza($numPizza, $slicePerStudent, $totalSlice);
}
?>