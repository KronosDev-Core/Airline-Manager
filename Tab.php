<?php

$username = 'Program';
$servername = "localhost";
$password = "HelloWords42";
$port = 27017;

$conn = new mysqli($servername, $username, $password, '', $port);
$db   = mysqli_select_db($conn, "rh");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

$sqlT="SELECT * FROM rh.view WHERE whereview='Tab'";
$dataT = mysqli_query($conn, $sqlT);

while($rowT = mysqli_fetch_array($dataT)) {
    echo '
    <button class="nav-link" data-toggle="tab" href="' . $rowT['toggledataview'] . '" id="' . $rowT['idelementview'] . '">' . $rowT['dataview'] . ' <button type="button" class="btn btn-outline-danger text-danger" id="' . $rowT['idelementview'] . 'Del">&times;</button></button>
    ';
}

?>