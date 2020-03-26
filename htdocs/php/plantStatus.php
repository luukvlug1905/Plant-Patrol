<?php
    $moisture = $_POST['moisture'];

    $moistureSplit = explode(" ", $moisture);
    // values to decide which picture should be displayed
    $ondergrend = -35;
    $bovengrens = 350;
    // if statement, if moisture > or < the above value, display the right picture
    if ($moistureSplit[1] < $ondergrend) {
        $response = "nothappy.jpg";
    } else if ($moistureSplit[1] > $bovengrens) {
        $response = "nothappy.jpg";
    } else {
        $response = "happy.jpg";
    }

    $div = "<div class=\"smiley\"> <img src=\"" . $response . "\" alt=\"" . $response . "\" width=\"200\" height=\"200\"> </div>";
    echo $div;
?>