<?php 

require 'maindb.php';

$sqlTT="SELECT * FROM rh.view WHERE whereview='TopTab'";
$dataTT = mysqli_query($conn, $sqlTT);


while($rowTT = mysqli_fetch_array($dataTT)) {
    echo '
    <button type="button" class="btn btn-outline-dark" id="' . $rowTT['idelementview'] . '">' . $rowTT['dataview'] . ' </button>
    ';
};
?>