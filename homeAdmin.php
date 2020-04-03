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
    <nav class="navbar navbar-expand navbar-dark bg-dark nav-justified" id="navbartop">
        <a class="navbar-brand">
            <img src="./France Alliance icon.jpg" width="30" height="30" class="d-inline-block align-top" alt=""> Airline Manager for RH
        </a>

        <ul class="navbar-nav d-inline-flex" aria-expanded="false">
            <li class="nav-items dropdown d-flex">
                <button class="btn" id="navbarAjouter">Ajouter</button>
                <button class="btn" id="navbarListe">Liste</button>
                <button class="btn" id="navbarStat">Statistique</button>
            </li>
        </ul>
    </nav>

    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#ajoueur">Joueur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#arole">Role</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#aalliance">Alliance</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane container active" id="ajoueur"></div>
            <div class="tab-pane container fade" id="arole"></div>
            <div class="tab-pane container fade" id="aalliance"></div>
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