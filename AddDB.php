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
    //$pdg = mysqli_escape_string($conn, $_POST['pdg']); -> add $sql pdg data

    $sql = "INSERT INTO alliance (namealliance, linkalliance, corpoalliance)
    VALUES ('" . $name ."', '" . $link . "', '" . $corporation ."')";

    if ($conn->query($sql) != TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else { echo 'Success'; };
};

function addtoptab($conn) {
    $where = mysqli_escape_string($conn, $_POST['where']);
    $data = mysqli_escape_string($conn, $_POST['data']);
    $id = mysqli_escape_string($conn, $_POST['id']);

    $sql = "INSERT INTO rh.view (whereview, idelementview, dataview) VALUES ('" . $where ."', '" . $id ."', '" . $data ."')";
    
    if ($conn->query($sql) != TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else { echo 'Success'; };
};

function addtab($conn) {
    $where = mysqli_escape_string($conn, $_POST['where']);
    $data = mysqli_escape_string($conn, $_POST['data']);
    $id = mysqli_escape_string($conn, $_POST['id']);
    $toggle = '#a' . $data;

    $sql = "INSERT INTO rh.view (whereview, idelementview, dataview, toggledataview) VALUES ('" . $where ."', '" . $id ."', '" . $data ."', '" . $toggle ."')";
    
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

if ($_POST['type'] === "TopTab") {
    addtoptab($conn);
};

if ($_POST['type'] === "Tab") {
    addtab($conn);
};

/*
if ($_POST['type'] === "Role") {
    //addrole($conn);
};
*/
$conn->close();
?>