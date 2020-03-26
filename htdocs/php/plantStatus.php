<?php
    $moisture = $_POST['moisture'];

    $moistureSplit = explode(" ", $moisture);
    // values to decide which picture should be displayed
    $minValue = -35;
    $maxValue = 350;
    // if statement, if moisture > or < the above value, display the right picture
    if ($moistureSplit[1] < $minValue) {
        $response = "nothappy.jpg";
    } else if ($moistureSplit[1] > $maxValue) {
        $response = "nothappy.jpg";
    } else {
        $response = "happy.jpg";
    }

    $div = "<div class=\"smiley\"> <img src=\"" . $response . "\" alt=\"" . $response . "\" width=\"200\" height=\"200\"> </div>";
    echo $div;
?>