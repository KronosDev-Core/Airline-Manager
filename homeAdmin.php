<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Manager</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
require 'maindb.php';

$username = 'Program';
$servername = "localhost";
$password = "HelloWords42";
$port = 27017;

$conn = new mysqli($servername, $username, $password, '', $port);
$db   = mysqli_select_db($conn, "rh");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};
?>

    <nav class="navbar navbar-expand navbar-dark bg-dark nav-justified" id="navbartop">
        <a class="navbar-brand">
            <img src="./France Alliance icon.jpg" width="30" height="30" class="d-inline-block align-top" alt=""> Airline Manager for RH
        </a>

        <ul class="navbar-nav nav d-inline-flex" aria-expanded="false">
            <li id="listTopTap" class="nav-items dropdown d-flex">
                <div id="TopTab"></div>
                <button type="button" class="btn btn-outline-success text-success" id="navbarAddTopTab">+</button>
                <button type="button" class="Del btn btn-outline-danger text-danger" id="navbarDelTopTab">-</button>
            </li>
        </ul>
    </nav>

    <div id="Dbody">
        <ul class="nav-tabs nav bg-dark text-grey" id="navTab" aria-expanded="false">
            <li id="listTap" class="nav-items dropdown d-flex">
                <div id="Tab" class="d-flex"></div>
                <button type="button" class="btn btn-outline-success text-success" id="navbarAddTab">+</button>
                <button type="button" class="btn btn-outline-success text-danger" id="navbarDelTab">-</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane container active" id="ajoueur"></div>
            <div class="tab-pane container fade" id="arole"></div>
            <div class="tab-pane container fade" id="aalliance"></div>
        </div>
    </div>

    <div class="modal fade" id="HomeModalTopTab">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 id="modal-titleTopTab" class="modal-title">...</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div id="modal-bodyTopTab" class="modal-body">

                </div>

                <div id="modal-footerTopTab" class="modal-footer">

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="HomeModalTab">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 id="modal-titleTab" class="modal-title">...</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div id="modal-bodyTab" class="modal-body">

                </div>

                <div id="modal-footerTab" class="modal-footer">

                </div>

            </div>
        </div>
    </div>

</div>

    <script type='text/javascript' >
        var i = true;

        $.ajax({
            type: "GET",
            url: "./html/Ajouter/Joueur.php",
            success: function(response) {
                $('#ajoueur').html(response);
            }
        });
        $.ajax({
            type: "GET",
            url: "./html/Ajouter/Role.php",
            success: function(response) {
                $('#arole').html(response);
            }
        });
        $.ajax({
            type: "GET",
            url: "./html/Ajouter/Alliance.php",
            success: function(response) {
                $('#aalliance').html(response);
            }
        });
    </script>
    <script type='text/javascript' src="main.js"></script>
</body>

</html>