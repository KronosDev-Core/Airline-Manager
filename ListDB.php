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

function listTopTab($conn) {
    $sql="SELECT * FROM rh.view WHERE whereview='TopTab'";
    $data = mysqli_query($conn, $sql);
    $rdata = [];

    while($row = mysqli_fetch_array($data)) {
        array_push($rdata, '
        <button id="listviewTopTab" value="' . $row['idview'] . '" class="list-group-item list-group-item-action">' . $row['dataview'] . '</button>
        ');
    };

    return $rdata;
};

if ($_GET['type'] === "TopTab") {
    listTopTab($conn);
};

?>