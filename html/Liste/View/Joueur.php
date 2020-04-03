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
$sql="SELECT * FROM player WHERE idplayer='$pid'";
$data = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($data);

echo '
<span id="IdPlayerView" value="' . $row['idplayer'] . '">ID: ' . $row['idplayer'] . '<br></span>
<span>Name: ' . $row['nameplayer'] . '<br></span>
<span>Link: ' . $row['linkplayer'] . '<br></span>
<span>Entretien: <br>' . $row['entretienplayer'] . '<br></span>
<span>Candidature: <br>' . $row['candidatureplayer'] . '<br></span>
<span>Alliance: ' . $row['allianceplayer'] . '<br></span>
<span>Rôle: ' . $row['roleplayer'] . '<br></span>
';

$data->free_result();

$conn->close();
?>
<div class="btn-group btn-block">
    <button class="btn btn-success" id="gotoEditPlayer">Modifier</button>
    <button class="btn btn-danger" id="gotoListPlayer">Return</button>
</div>

</div>
<script src="main.js"></script>