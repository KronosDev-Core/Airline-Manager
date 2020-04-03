<div>
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

$pid = @$_POST['id'];
mysqli_real_escape_string($conn, $pid);
$sql="SELECT * FROM rh.alliance WHERE idalliance='$pid'";
$data = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($data);

echo '
<span id="IdAllianceView" value="' . $row['idalliance'] . '">ID: ' . $row['idalliance'] . '<br></span>
<span>Name: ' . $row['namealliance'] . '<br></span>
<span>Link: ' . $row['linkalliance'] . '<br></span>
<span>Corporation: ' . $row['corpoalliance'] . '<br></span>
<span>PDG: ' . $row['PDG'] . '<br></span>
';

$data->free_result();

$conn->close();
?>
<div class="btn-group btn-block">
    <button class="btn btn-success" id="gotoEditAlliance">Modifier</button>
    <button class="btn btn-danger" id="gotoListAlliance">Return</button>
</div>

</div>
<script src="main.js"></script>