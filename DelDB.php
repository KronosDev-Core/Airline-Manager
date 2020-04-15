<?php
require 'maindb.php';

$table = mysqli_escape_string($conn, $_POST['table']);
$id = mysqli_escape_string($conn, $_POST['id']);

if ($_POST['table'] === "view") {
    $sql = 'DELETE FROM rh.' . $table . ' WHERE idview=' . $id. '';
};

if ($_POST['table'] === "alliance") {
    $sql = 'DELETE FROM rh.' . $table . ' WHERE idalliance=' . $id. '';
};

if ($_POST['table'] === "player") {
    $sql = 'DELETE FROM rh.' . $table . ' WHERE idplayer=' . $id. '';
};


?>