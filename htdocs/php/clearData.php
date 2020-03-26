<?php
	// code to erase all data from the graph when the button is pressed
    $moistureTXT = fopen("moisture.txt", "w");
    fwrite($moistureTXT, " ");
    fclose($moistureTXT);

    echo "succesvol alle data weggegooid";
?>