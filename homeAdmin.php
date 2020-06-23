<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Manager</title>

    <link rel="stylesheet" href="style.css">
    <link rel="preload" href="main.js" as="script">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/0ad5449ac0.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark text-grey d-flex" id="navbartop">
        <div id="TopTabDiv" class="d-flex w-100">
            <img id="imgLogo" class="navbar-brand mr-auto" src="./AM2_France_Alliance_corpo_V2.2.png">

            <div class="navbar-nav flex-row d-inline-flex flex-grow-1" id="TopTab"></div>

            <div id="btnAdminViewTopTab" class="ml-auto">
                <button type="button" class="btn btn-outline-success text-success" id="navbarAddTopTab">+</button>
                <button type="button" class="btn btn-outline-danger text-danger" id="navbarDelTopTab">-</button>
            </div>
        </div>

        <div id="collapsenav" class="collapse navbar-collapse navbar-dark bg-dark w-100 text-grey h-100">
            <div class="d-flex">
                <div id="Tab" class="mr-auto flex-row d-inline-flex flex-grow-1"></div>

                <div id="btnAdminViewTab" class="ml-auto">
                    <button type="button" class="btn btn-outline-success text-success" id="navbarAddTab">+</button>
                    <button type="button" class="btn btn-outline-danger text-danger" id="navbarDelTab">-</button>
                </div>
            </div>
        </div>
    </nav>

    <div id="Dbody" class="h-100 w-100">

        <div id="TabContent">
            <div id="viewTab"></div>
        </div>
    </div>

    <div class="modal fade" draggable="true" id="HomeModal"></div>

    <script type='text/javascript' >
        let i = true;
        let c = 0;
    </script>
    <div id="scriptreload">
        <script type='text/javascript' src="main.js"></script>
    </div>
</body>

</html>