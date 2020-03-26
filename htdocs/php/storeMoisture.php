<?php
    $moisture = $_POST['moisture'];

    $moistureSplit = explode(" ", $moisture);
    // storing the moisture values in moistureTXT
    $moistureTXT = fopen("moisture.txt", "a");
    fwrite($moistureTXT, $moistureSplit[1] . "\n");
    fclose($moistureTXT);

    echo $moisture;
?>