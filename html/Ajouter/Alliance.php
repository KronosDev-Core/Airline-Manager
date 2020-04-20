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

$sql="SELECT * FROM rh.player";
$data = mysqli_query($conn, $sql);
?>

<div id="DAddAlliance">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Alliance</span>
        </div>
        <input id="namealliance" name="name" type="text" class="form-control" placeholder="Name">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Link Alliance</span>
        </div>
        <input id="linkalliance" type="url" class="form-control" placeholder="Link">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Corporation</span>
        </div>
        <select name="corporation" class="form-control" id="listCorporation">
            <option value="Aquila">France Alliance</option>
        </select>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">PDG</span>
        </div>
        <select name="listplayer" class="form-control" id="listPlayerpdg">
            <?php
            while($row = mysqli_fetch_array($data)) {
                echo '
                <option value="' . $row['idplayer'] . '">' . $row['nameplayer'] . '</option>
                ';
            }
            ?>
        </select>
    </div>

    <button class="btn btn-success btn-block" id="submitAddAlliance">Enregistrer</button>
</div>
<?php $conn->close(); ?>