<?php
    // Krijg de huidige status van de machine
    $currentStatus = file_get_contents("status.txt");

    // Vertaal boolean naar woord
    if ($currentStatus == "0") {
        $displayStatus = "OFF";
    } else if ($currentStatus = "1") {
        $displayStatus = "ON";
    }

    // Geef de status weer
    echo $displayStatus;
?>