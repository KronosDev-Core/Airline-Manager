<?php

require 'maindb.php';

$sqlT="SELECT * FROM rh.view WHERE whereview='Tab'";
$dataT = mysqli_query($conn, $sqlT);
$i = true;

while($rowT = mysqli_fetch_array($dataT)) {
    if ($i) {
        echo '
        <button class="nav-link active" data-toggle="tab" href="#' . $rowT['toggledataview'] . '" id="' . $rowT['idelementview'] . '">' . $rowT['dataview'] . ' </button>
        ';
        $i = false;
    } else {
        echo '
        <button class="nav-link" data-toggle="tab" href="#' . $rowT['toggledataview'] . '" id="' . $rowT['idelementview'] . '">' . $rowT['dataview'] . ' </button>
        ';
    };  
}

?>