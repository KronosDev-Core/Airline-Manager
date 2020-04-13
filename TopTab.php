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

$sqlTT="SELECT * FROM rh.view WHERE whereview='TopTab'";
$dataTT = mysqli_query($conn, $sqlTT);


while($rowTT = mysqli_fetch_array($dataTT)) {
    echo '
    <button type="button" class="btn btn-outline-dark" id="' . $rowTT['idelementview'] . '">' . $rowTT['dataview'] . ' </button>
    ';
};
?>