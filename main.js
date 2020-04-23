$(document).ready(function() {

    function refresh(data) {
        if (data == 'TopTab') {
            $.ajax({
                type: "GET",
                url: "./TopTab.php",
                dataType: "html",
                success: function(response) {
                    $('div#TopTab').html(response);
                    $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
                }
            });
        };

        if (data == 'Tab') {
            $.ajax({
                type: "GET",
                url: "./Tab.php",
                dataType: "html",
                success: function(response) {
                    $('div#Tab').html(response);
                    $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
                }
            });

            $.ajax({
                type: "GET",
                url: "./ListDB.php",
                data: { type: "TabContent" },
                dataType: "html",
                success: function(response) {
                    $('div#viewTab').html(response);
                    $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
                }
            });
        };

        if (data == 'all') {
            $.ajax({
                type: "GET",
                url: "./Tab.php",
                dataType: "html",
                success: function(response) {
                    $('div#Tab').html(response);
                    $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
                }
            });

            $.ajax({
                type: "GET",
                url: "./TopTab.php",
                dataType: "html",
                success: function(response) {
                    $('div#TopTab').html(response);
                    $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
                }
            });

            $.ajax({
                type: "GET",
                url: "./ListDB.php",
                data: { type: "TabContent" },
                dataType: "html",
                success: function(response) {
                    $('div#viewTab').html(response);
                    $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
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
        console.log(e.target.id);
    });

    $('div#Tab button').click(function(e) {
        var datatoggle = '#a' + e.target.innerText;

        if (datatoggle === '#aJoueur') {
            $('#aAlliance').empty();

            $.ajax({
                type: "GET",
                url: "./html/Ajouter/Joueur.php",
                success: function(response) {
                    $('#aJoueur').html(response);
                    $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
                }
            });
        };

        if (datatoggle === '#aAlliance') {
            $('#aJoueur').empty();

            $.ajax({
                type: "GET",
                url: "./html/Ajouter/Alliance.php",
                success: function(response) {
                    $('#aAlliance').html(response);
                    $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
                }
            });
        };
    });

    // ADD TABS

    $("button#navbarAddTopTab").click(async function(r) {

        var title = 'Create new TopTab';
        var body = `
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
        `;
        var footer = `
        <div class="btn-group btn-block">
            <button class="btn btn-success" id="SaveAddTopTab">Save</button>
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>`;

        await $.post("./modal.php", { title: title, body: body, footer: footer },
            function(data, textStatus, jqXHR) {
                $('#HomeModal').html(data);
                $("#HomeModal").modal();
                $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
            }
        );

    });

    $("#SaveAddTopTab").click(function(e) {
        var dataTT = $('div#HomeModal input#data').val();
        var idTT = $('div#HomeModal input#id').val();

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

            var dataTT = $('div#HomeModal input#data').val(null);
            var idTT = $('div#HomeModal input#id').val(null);
        }
    });

    $('button#navbarAddTab').click(async function(e) {

        var title = 'Create new Tab';
        var body = `
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
        `;
        var footer = `
        <div class="btn-group btn-block">
            <button class="btn btn-success" id="SaveAddTab">Save</button>
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>`;

        await $.post("./modal.php", { title: title, body: body, footer: footer },
            function(data, textStatus, jqXHR) {
                $('#HomeModal').html(data);
                $("#HomeModal").modal();
                $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
            }
        );

    });

    $("#SaveAddTab").click(function(e) {
        var dataT = $('div#HomeModal input#data').val();
        var idT = $('div#HomeModal input#id').val();

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
            var dataT = $('div#HomeModal input#data').val(null);
            var idT = $('div#HomeModal input#id').val(null);
        };
    });

    // DEL TABS

    $('#navbarDelTopTab').click(async function(r) {

        var title = 'Delete TopTap';
        var body = null;
        var footer = `
        <div class="btn-group btn-block">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>`;

        if (c === 4) {
            await $.ajax({
                type: "GET",
                url: "./ListDB.php",
                data: { type: "TopTab" },
                success: function(response) {
                    body = response;
                }
            });

            await $.post("./modal.php", { title: title, body: body, footer: footer },
                function(data, textStatus, jqXHR) {
                    $('#HomeModal').html(data);
                    $("#HomeModal").modal();
                    $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
                }
            );
            c = 0;
        } else {
            c++;
        };
    });

    $('#navbarDelTab').click(async function(e) {

        var title = 'Delete Tap';
        var body = null;
        var footer = `
        <div class="btn-group btn-block">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>`;

        if (c === 4) {
            await $.ajax({
                type: "GET",
                url: "./ListDB.php",
                data: { type: "Tab" },
                success: function(response) {
                    body = response;
                }
            });

            $.post("./modal.php", { title: title, body: body, footer: footer },
                function(data, textStatus, jqXHR) {
                    $('#HomeModal').html(data);
                    $("#HomeModal").modal();
                    $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
                }
            );

            c = 0;
        } else {
            c++;
        };

    });

    $('#listviewAllTabDel').click(function(e) {
        var idDiv = e.currentTarget.parentElement.id;
        var id = e.currentTarget.value;
        var vTTab = e.currentTarget.parentElement.attributes[1].value;

        if (c === 4) {
            $.post("./DelDB.php", { table: "view", id: id },
                function(data, textStatus, jqXHR) {
                    $('#' + idDiv).remove();

                    if (vTTab === "TopTab") {
                        refresh('TopTab');
                    };

                    if (vTTab === "Tab") {
                        refresh('Tab');
                    };
                }
            );
            c = 0;
        } else {
            c++;
        };
    });

});