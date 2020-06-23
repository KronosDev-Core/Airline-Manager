<?php 

require 'maindb.php';

$sqlTT="SELECT * FROM rh.view WHERE whereview='TopTab'";
$dataTT = mysqli_query($conn, $sqlTT);


while($rowTT = mysqli_fetch_array($dataTT)) {
    echo '
    <button data-toggle="collapse" data-target="#collapsenav" type="button" class="btn btn-outline-dark navbar-toggler" id="' . $rowTT['idelementview'] . '">' . $rowTT['dataview'] . ' </button>
    ';
};
?>