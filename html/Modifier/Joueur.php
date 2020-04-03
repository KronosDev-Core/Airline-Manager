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
<div id="DEditJoueur">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Joueur</span>
        </div>
        <input value="' . $row['nameplayer'] . '" id="name" name="name" type="text" class="form-control" placeholder="Username">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Link Profil</span>
        </div>
        <input value="' . $row['linkplayer'] . '" id="link" name="link" type="url" class="form-control" placeholder="Link">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Alliance</span>
        </div>
        <select value="' . $row['allianceplayer'] . '" name="alliance" class="form-control" id="listAlliance">
            <option value="Aquila">Aquila</option>
        </select>
        <select value="' . $row['roleplayer'] . '" name="role" class="form-control" id="listRole">
            <option value="DRH">DRH</option>
        </select>
    </div>

    <div id="dquestion" class="input-group-inline mb-3">
        <textarea id="candidature" name="candidature" rows="10" class="form-control" placeholder="Candidature">' . $row['candidatureplayer'] . '</textarea>
        <br>
        <textarea id="entretien" name="entretien" rows="10" class="form-control" placeholder="entretien">' . $row['entretienplayer'] . '</textarea>
        <br>
    </div>
';

$data->free_result();

$conn->close();
?>

    <div class="btn-group btn-block">
        <button class="btn btn-success" id="submitEditJoueur">Enregistrer</button>
        <button class="btn btn-danger" id="gotoListPlayer">Return</button>
    </div>
</div>
<script src="main.js"></script>