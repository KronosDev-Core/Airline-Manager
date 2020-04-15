<?php

require 'maindb.php';

$sqlT="SELECT * FROM rh.view WHERE whereview='Tab'";
$dataT = mysqli_query($conn, $sqlT);

while($rowT = mysqli_fetch_array($dataT)) {
    echo '
    <button class="nav-link" data-toggle="tab" href="' . $rowT['toggledataview'] . '" id="' . $rowT['idelementview'] . '">' . $rowT['dataview'] . ' </button>
    ';
}

?>