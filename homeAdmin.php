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
    <script src="https://kit.fontawesome.com/0ad5449ac0.js" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark text-grey fixed-top" id="navbartop">
        <div>
            <img class="navbar-brand" src="./AM2_France_Alliance_corpo_V2.2.png">

            <div class="navbar-nav" id="TopTab"></div>

            <div id="btnAdminViewTopTab">
                <button type="button" class="btn btn-outline-success text-success navbar-toggler" id="navbarAddTopTab">+</button>
                <button type="button" class="btn btn-outline-danger text-danger navbar-toggler" id="navbarDelTopTab">-</button>
                <button type="button" class="btn btn-outline-secondary text-muted navbar-toggler" id="navbarOpt"><i class="fas fa-cog"></i></button>
            </div>
        </div>

        <div id="collapsenav" class="collapse navbar-dark bg-dark text-grey">
            <div id="Tab"></div>

            <div id="btnAdminViewTab">
                <button type="button" class="btn btn-outline-success text-success" id="navbarAddTab">+</button>
                <button type="button" class="btn btn-outline-danger text-danger" id="navbarDelTab">-</button>
            </div>
        </div>
    </nav>

    <div id="Dbody">

        <div id="TabContent">
            <div style="margin-top: 100px;" id="viewTab"></div>
        </div>

    </div>

    <div class="modal fade" id="HomeModal"></div>

</div>

    <script type='text/javascript' >
        let i = true;
        let c = 0;
    </script>
    <div id="scriptreload">
        <script type='text/javascript' src="main.js"></script>
    </div>
</body>

</html>