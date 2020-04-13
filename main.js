$(document).ready(function() {
    var i = true;

    function refresh(data) {
        if (data == 'TopTab') {
            $.ajax({
                type: "GET",
                url: "./TopTab.php",
                dataType: "html",
                success: function(response) {
                    $('div#TopTab').html(response);
                }
            });
        };

        if (data == 'Tab') {
            $.ajax({
                type: "GET",
                url: "./Tab.php",
                dataType: "html",
                success: function(response) {
                    $('div#Tab li').html(response);
                }
            });
        };

        if (data == 'all') {
            $.ajax({
                type: "GET",
                url: "./Tab.php",
                dataType: "html",
                success: function(response) {
                    $('div#Tab li').html(response);
                }
            });

            $.ajax({
                type: "GET",
                url: "./TopTab.php",
                dataType: "html",
                success: function(response) {
                    $('div#TopTab').html(response);
                }
            });
        };
    };

    if (i) {
        refresh('all');
        i = false;
    };

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

        var url = "./AddDB.php";
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

        var url = "./AddDB.php";
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

    // Action Click Button Tabs

    $('div#TopTab button').click(function(e) {
        console.log(e.target.previousElementSibling.id);
    });

    $('div#Tab button').click(function(e) {
        console.log(e.target.previousElementSibling.id);
    });

    // ADD TABS

    $("button#navbarAddTopTab").click(function(r) {

        $('#modal-titleTopTab').html('Create new TopTab');
        $('#modal-bodyTopTab').html(`
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
        `);
        $('#modal-footerTopTab').html(`
        <div class="btn-group btn-block">
            <button class="btn btn-success" id="SaveAddTopTab">Save</button>
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        `);
        $("#HomeModalTopTab").modal();

        $("#SaveAddTopTab").click(function(e) {
            var dataTT = $('div#HomeModalTopTab input#data').val();
            var idTT = $('div#HomeModalTopTab input#id').val();

            if (dataTT != "" || null || undefined && idTT != "" || null || undefined) {
                // TopTab
                var url = './AddDB.php';

                $.post(url, { where: 'TopTab', data: dataTT, id: idTT, type: "TopTab" },
                    function(data, textStatus, jqXHR) {
                        //alert("Data: " + data + "\nStatus: " + status + "\nXHR: " + jqXHR);
                        if (data == 'Success') {
                            refresh('TopTab');
                        }
                    },
                );

                var dataTT = $('div#HomeModalTopTab input#data').val(null);
                var idTT = $('div#HomeModalTopTab input#id').val(null);
            }
        });
    });

    $('button#navbarAddTab').click(function(e) {
        $("#HomeModalTab").modal();

        $("#SaveAddTab").click(function(e) {
            var dataT = $('div#HomeModalTab input#data').val();
            var idT = $('div#HomeModalTab input#id').val();

            if (dataT != "" || null || undefined && idT != "" || null || undefined) {
                //Tab
                var url = './AddDB.php';

                $.post(url, { where: 'Tab', data: dataT, id: idT, type: "Tab" },
                    function(data, textStatus, jqXHR) {
                        //alert("Data: " + data + "\nStatus: " + status + "\nXHR: " + jqXHR);

                        if (data == 'Success') {
                            refresh('Tab');
                        }
                    },
                );
                var dataT = $('div#HomeModalTab input#data').val(null);
                var idT = $('div#HomeModalTab input#id').val(null);
            };
        });
    });

    // DEL TABS

    $('button#navbarDelTopTab').click(function(r) {
        console.log(r);

        $('#modal-titleTopTab').html('Delete TopTab');
        $.ajax({
            type: "GET",
            url: "./ListDB.php",
            data: { type: "TopTab" },
            dataType: "html",
            success: function(response) {
                console.log(response);
                $('#modal-bodyTopTab').html(response);
            }
        });
        $("#HomeModalTopTab").modal();
    });

    $('button#navbarDelTab').click(function(e) {
        console.log(e);
    });

    /*
    $("button['' = '']").click(function(e) {
        e.preventDefault();

    });

            var nameA = $("input#namealliance").val();
            var linkA = $("input#linkalliance").val();
            var corporationA = $("#listCorporation").val();
            var pdgA = $("#listPlayerpdg").val();

            var url = "./AddDB.php";
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
    */
});