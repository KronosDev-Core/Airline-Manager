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
?>

<div id="DAddJoueur">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Joueur</span>
        </div>
        <input id="name" name="name" type="text" class="form-control" placeholder="Username">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Link Profil</span>
        </div>
        <input id="link" name="link" type="url" class="form-control" placeholder="Link">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Alliance</span>
        </div>
        <select name="alliance" class="form-control" id="listAlliance">
        <?php
            while($row = mysqli_fetch_array($data)) {
                echo '
                <option value="' . $row['idalliance'] . '">' . $row['namealliance'] . '</option>
                ';
            }
        ?>
        </select>
        <div class="input-group-prepend">
            <span class="input-group-text">Rôle</span>
        </div>
        <select name="role" class="form-control" id="listRole">
            <option value="DRH">DRH</option>
        </select>
    </div>

    <div id="dquestion" class="input-group-inline mb-3">
        <textarea id="candidature" name="candidature" rows="10" class="form-control" placeholder="Candidature"></textarea>
        <br>
        <textarea id="entretien" name="entretien" rows="10" class="form-control" placeholder="entretien"></textarea>
        <br>
    </div>
    <button class="btn btn-success btn-block" id="submitAddJoueur">Enregistrer</button>
</div>
<?php $conn->close(); ?>