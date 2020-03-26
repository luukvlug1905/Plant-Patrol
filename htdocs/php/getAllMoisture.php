<?php
	// moisture verzenden naar de grafiek
    $moisture = file_get_contents("moisture.txt");

    $moistureSplit = explode("\n", $moisture);
    echo json_encode($moistureSplit, JSON_NUMERIC_CHECK);
?>