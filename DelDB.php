<?php
require 'maindb.php';

$table = mysqli_escape_string($conn, $_POST['table']);
$id = mysqli_escape_string($conn, $_POST['id']);

if ($_POST['table'] === "view") {
    $sql = 'DELETE FROM rh.view WHERE idview="' . $id. '"';

    if ($conn->query($sql) != TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else { echo 'Success'; };
};

if ($_POST['table'] === "alliance") {
    $sql = 'DELETE FROM rh.alliance WHERE idalliance="' . $id. '"';
    
    if ($conn->query($sql) != TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else { echo 'Success'; };
};

if ($_POST['table'] === "player") {
    $sql = 'DELETE FROM rh.player WHERE idplayer="' . $id. '"';
    
    if ($conn->query($sql) != TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else { echo 'Success'; };
};


?>