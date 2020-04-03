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

?>

<div id="DEditAlliance">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Alliance</span>
        </div>
        <input id="namealliance" value="<?php echo $row['namealliance'] ?>" name="name" type="text" class="form-control" placeholder="Name">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Link Alliance</span>
        </div>
        <input id="linkalliance" value="<?php echo $row['linkalliance'] ?>" type="url" class="form-control" placeholder="Link">
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
            $sqlPL="SELECT * FROM rh.player";
            $dataPL = mysqli_query($conn, $sqlPL);

            while($rowPL = mysqli_fetch_array($dataPL)) {
                echo '
                <option value="' . $rowPL['idplayer'] . '">' . $rowPL['nameplayer'] . '</option>
                ';
            }
            ?>
        </select>
    </div>
    <div class="btn-group btn-block">
        <button class="btn btn-success" id="submitEditAlliance">Enregistrer</button>
        <button class="btn btn-danger" id="gotoListAlliance">Return</button>
    </div>
</div>
<script src="main.js"></script>
<?php
$data->free_result();

$conn->close();
?>