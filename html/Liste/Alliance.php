<div id="btnListExpandViewA" class="list-group">

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

$sql="SELECT * FROM rh.alliance";
$data = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($data)) {
    echo '
    <button id="listviewalliance" value="' . $row['idalliance'] . '" class="list-group-item list-group-item-action">' . $row['namealliance'] . '</button>
    ';
}

$conn->close();
?>
</div>
<script src="main.js"></script>