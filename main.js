$(document).ready(function() {

    function tabscontrol(data) {
        $('.nav-item').on('shown.bs.tab', function(e) {
            tabRoleAct = e.target.innerText;

            if (data == "Add") {
                if (tabRoleAct == 'Joueur') {
                    $.ajax({
                        type: "GET",
                        url: "./html/Ajouter/Joueur.php",
                        data: "data",
                        dataType: "html",
                        success: function(response) {
                            $('#ajoueur').html(response);
                        }
                    });
                } else {
                    if (tabRoleAct == 'Role') {
                        $.ajax({
                            type: "GET",
                            url: "./html/Ajouter/Role.php",
                            data: "data",
                            dataType: "html",
                            success: function(response) {
                                $('#arole').html(response);
                            }
                        });
                    } else {
                        if (tabRoleAct == 'Alliance') {
                            $.ajax({
                                type: "GET",
                                url: "./html/Ajouter/Alliance.php",
                                data: "data",
                                dataType: "html",
                                success: function(response) {
                                    $('#aalliance').html(response);
                                }
                            });
                        }
                    }
                }
            };

            if (data == "List") {
                if (tabRoleAct == 'Joueur') {
                    $.ajax({
                        type: "GET",
                        url: "./html/Liste/Joueur.php",
                        data: "data",
                        dataType: "html",
                        success: function(response) {
                            $('#ajoueur').html(response);
                        }
                    });
                } else {
                    if (tabRoleAct == 'Role') {
                        $.ajax({
                            type: "GET",
                            url: "./html/Liste/Role.php",
                            data: "data",
                            dataType: "html",
                            success: function(response) {
                                $('#arole').html(response);
                            }
                        });
                    } else {
                        if (tabRoleAct == 'Alliance') {
                            $.ajax({
                                type: "GET",
                                url: "./html/Liste/Alliance.php",
                                data: "data",
                                dataType: "html",
                                success: function(response) {
                                    $('#aalliance').html(response);
                                }
                            });
                        }
                    }
                }
            };

            if (data == "Stat") {
                if (tabRoleAct == 'Joueur') {
                    $.ajax({
                        type: "GET",
                        url: "./html/Stat/Joueur.php",
                        data: "data",
                        dataType: "html",
                        success: function(response) {
                            $('#ajoueur').html(response);
                        }
                    });
                } else {
                    if (tabRoleAct == 'Role') {
                        $.ajax({
                            type: "GET",
                            url: "./html/Stat/Role.php",
                            data: "data",
                            dataType: "html",
                            success: function(response) {
                                $('#arole').html(response);
                            }
                        });
                    } else {
                        if (tabRoleAct == 'Alliance') {
                            $.ajax({
                                type: "GET",
                                url: "./html/Stat/Alliance.php",
                                data: "data",
                                dataType: "html",
                                success: function(response) {
                                    $('#aalliance').html(response);
                                }
                            });
                        }
                    }
                }
            };

        })
    };

    $('#navbarAjouter').click(function(e) {
        e.preventDefault(e);

        tabscontrol("Add");
    });

    $('#navbarListe').click(function(e) {
        e.preventDefault(e);

        tabscontrol("List");
    });

    $('#navbarStat').click(function(e) {
        e.preventDefault(e);

        tabscontrol("Stat");
    });

    $('button#submitAddJoueur').click(function(e) {
        console.log(e, "test click");

        var name = $("input#name").val();
        var link = $("input#link").val();
        var alliance = $("#listAlliance").val();
        var role = $("#listRole").val();
        var entretien = $("#entretien").val();
        var candidature = $("#candidature").val();

        var url = "./html/Ajouter/AddDB.php";
        if (name != "" || null && link != "" || null && alliance != "" || null && role != "" || null && entretien != "" || null && candidature != "" && null) {
            console.log('is not null');
            $.post(url, { name: name, link: link, alliance: alliance, role: role, candidature: candidature, entretien: entretien, type: "joueur" },
                function(data, textStatus, jqXHR) {
                    alert("Data: " + data + "\nStatus: " + status + "\nXHR: " + jqXHR);
                },
            );
            $("input#name").val(null);
            $("input#link").val(null);
            $("#listAlliance").val(null);
            $("#listRole").val(null);
            $("#entretien").val(null);
            $("#candidature").val(null);
        } else {
            console.log('is null');
        }
    });

    $("div#btnListExpandView button").click(function(e) {
        var IdPlayerView = e.target.value;

        $.ajax({
            type: "POST",
            url: "./html/Liste/View/Joueur.php",
            data: { id: IdPlayerView },
            success: function(response) {
                $('#ajoueur').html(response);
            }
        });
    });

    $("#gotoEditPlayer").click(function(e) {
        var PlayerIdView = $("#IdPlayerView").attr("value");

        $.ajax({
            type: "POST",
            url: "./html/Modifier/Joueur.php",
            data: { id: PlayerIdView },
            success: function(response) {
                console.log(response);
                $('#ajoueur').html(response);
            }
        });

        console.log(PlayerIdView);
    });

    $("#gotoListPlayer").click(function(e) {
        $.ajax({
            type: "GET",
            url: "./html/Liste/Joueur.php",
            dataType: "html",
            success: function(response) {
                $('#ajoueur').html(response);
            }
        });
    });

    $("div#DAddAlliance button").click(function(e) {
        console.log(e, "test click");

        var nameA = $("input#namealliance").val();
        var linkA = $("input#linkalliance").val();
        var corporationA = $("#listCorporation").val();
        var pdgA = $("#listPlayerpdg").val();

        var url = "./html/Ajouter/AddDB.php";
        if (nameA != "" || null && linkA != "" || null && corporationA != "" || null && pdgA != "" || null) {
            console.log('is not null');
            $.post(url, { name: nameA, link: linkA, corporation: corporationA, pdg: pdgA, type: "alliance" },
                function(data, textStatus, jqXHR) {
                    alert("Data: " + data + "\nStatus: " + status + "\nXHR: " + jqXHR);
                },
            );
            $("input#namealliance").val(null);
            $("input#linkalliance").val(null);
            $("#listCorporation").val(null);
            $("#listPlayerpdg").val(null);
        } else {
            console.log('is null');
        }
    });

    $("div#btnListExpandViewA button").click(function(e) {
        var IdAllianceView = e.target.value;

        $.ajax({
            type: "POST",
            url: "./html/Liste/View/Alliance.php",
            data: { id: IdAllianceView },
            success: function(response) {
                $('#aalliance').html(response);
            }
        });
    });

    $("#gotoEditAlliance").click(function(e) {
        var AllianceIdView = $("#IdAllianceView").attr("value");

        console.log(AllianceIdView);

        $.ajax({
            type: "POST",
            url: "./html/Modifier/Alliance.php",
            data: { id: AllianceIdView },
            success: function(response) {
                $('#aalliance').html(response);
            }
        });
    });

    $("#gotoListAlliance").click(function(e) {
        $.ajax({
            type: "GET",
            url: "./html/Liste/Alliance.php",
            dataType: "html",
            success: function(response) {
                $('#aalliance').html(response);
            }
        });
    });
});