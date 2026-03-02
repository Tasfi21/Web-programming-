<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ques 2</title>
</head>

<body>
    <div>
        <form method="post">
            <table border = "1">
                <tr>
                    <th>Attendees</th>
                    <th>Seat Capacity</th>
                    <th>Ticket Price</th>
                </tr>
                <tr>
                    <td><input type="number" name="attendees" required></td>
                    <td><input type="number" name="capacity"></td>
                    <td><input type="number" name="price"></td>
                    </tr>
            </table>
            <input type = "submit" name = "submit" value = "submit">
        </form>
    </div>
</body>
</html>

<?php

function calculateScreen($attendee, $capacity, $price) {

    $rentcost = 25000;

    $t_screen = ceil($attendee / $capacity);
    $emptySeat = ($t_screen * $capacity) - $attendee;
    $waste = $emptySeat * $price;

    echo "<br>";
    echo "<table border='1'>";
    echo "<tr><th>Total Screens</th><th>Empty Seats</th><th>Wasted Money</th></tr>";
    echo "<tr><td>$t_screen</td><td>$emptySeat</td><td>$waste</td></tr>";
    echo "</table>";
}

if (isset($_POST["submit"])) {

    $attendee = intval($_POST["attendees"]);
    $capacity = intval($_POST["capacity"]);
    $price = intval($_POST["price"]);

    calculateScreen($attendee, $capacity, $price);
}
?>