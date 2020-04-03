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

function addplayer($conn) {
    $name = mysqli_escape_string($conn, $_POST['name']);
    $link = mysqli_escape_string($conn, $_POST['link']);
    $candidature = mysqli_escape_string($conn, $_POST['candidature']);
    $entretien = mysqli_escape_string($conn, $_POST['entretien']);

    $sql = "INSERT INTO player (nameplayer, linkplayer, entretienplayer, candidatureplayer)
    VALUES ('" . $name ."', '" . $link . "', '" . $entretien ."', '" . $candidature . "')";

    if ($conn->query($sql) != TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else { echo 'Success'; };
};

function addalliance($conn) {
    $name = mysqli_escape_string($conn, $_POST['name']);
    $link = mysqli_escape_string($conn, $_POST['link']);
    $corporation = mysqli_escape_string($conn, $_POST['corporation']);
    $pdg = mysqli_escape_string($conn, $_POST['pdg']);

    $sql = "INSERT INTO alliance (namealliance, linkalliance, corpoalliance, PDG)
    VALUES ('" . $name ."', '" . $link . "', '" . $corporation ."', '" . $pdg . "')";

    if ($conn->query($sql) != TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else { echo 'Success'; };
};


if ($_POST['type'] === "joueur") {
    addplayer($conn);
};

if ($_POST['type'] === "alliance") {
    addalliance($conn);
};
/*
if ($_POST['type'] === "Role") {
    //addrole($conn);
};
*/
$conn->close();
?>