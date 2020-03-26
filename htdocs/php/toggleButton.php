<?php
    // Get current status of the sensor
    $currentStatus = file_get_contents("status.txt");

    // Change the status
    if ($currentStatus == "0") {
        $newStatus = 1;
    } else if ($currentStatus = "1") {
        $newStatus = 0;
    }

    // Write the changed status tot a txt file
    $statusFile = fopen("status.txt", "w");
    fwrite($statusFile, $newStatus);
    fclose($statusFile);

    // Translate the Boolean to a real word
    if ($newStatus == "0") {
        $displayStatus = "OFF";
    } else if ($newStatus = "1") {
        $displayStatus = "ON";
    }

    // Display the status
    echo $displayStatus;
?>