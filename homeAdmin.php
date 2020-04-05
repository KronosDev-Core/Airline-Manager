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
            <li class="nav-items dropdown d-flex">
                <div id="TopTab"></div>
                <button type="button" class="btn btn-outline-success text-success" id="navbarAddTopTab">+</button>
            </li>
        </ul>
    </nav>

    <div id="Dbody">
        <ul class="nav nav-tabs bg-dark text-grey" id="navTab">
            <div id="Tab" class="d-flex">
                <li class="nav-item d-flex"></li>
            </div>
            <button type="button" class="btn btn-outline-success text-success" id="navbarAddTab">+</button>
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
                <h4 class="modal-title">Create new TopTab</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">data *</span>
                    </div>
                    <input id="data" name="data" type="text" class="form-control" placeholder="data TopTab">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ID</span>
                    </div>
                    <input id="id" name="id" type="text" class="form-control" placeholder="id TopTab">
                </div>
                <p>* Require</p>
            </div>

            <div class="modal-footer">
                <div class="btn-group btn-block">
                    <button class="btn btn-success" id="SaveAddTopTab">Save</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="HomeModalTab">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Create new Tab</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">data *</span>
                    </div>
                    <input id="data" name="data" type="text" class="form-control" placeholder="data Tab">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ID</span>
                    </div>
                    <input id="id" name="id" type="text" class="form-control" placeholder="id Tab">
                </div>
                <p>* Require</p>
            </div>

            <div class="modal-footer">
                <div class="btn-group btn-block">
                    <button class="btn btn-success" id="SaveAddTab">Save</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>


    <script src="main.js"></script>
    <script>
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

</body>

</html>