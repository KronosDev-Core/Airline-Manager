$(document).ready(function() {
    let oldTabActive = null;
    let nbrclick = 0;

    var hnav = $('nav#navbartop').outerHeight();
    $('div#aOption').css('top', hnav);

    $('div#HomeModal').draggable({
        addClasses: false
    });

    async function refresh(data) {
        if (data == 'TopTab' || data == "all") {
            await $.ajax({
                type: "GET",
                url: "./TopTab.php",
                dataType: "html",
                success: function(response) {
                    $('div#TopTab').html(response);
                }
            });
        };

        if (data == 'Tab' || data == "all") {
            await $.ajax({
                type: "GET",
                url: "./Tab.php",
                dataType: "html",
                success: function(response) {
                    $('div#Tab').html(response);
                }
            });

            await $.ajax({
                type: "GET",
                url: "./ListDB.php",
                data: { type: "TabContent" },
                dataType: "html",
                success: function(response) {
                    $('div#viewTab').html(response);
                }
            });
        };

        if (data == 'TabsControl' || data == "all") {
            AddTabContent();
        };

        if (data == 'Body' || data == "all") {
            await $.ajax({
                type: "GET",
                url: "./ListDB.php",
                data: { type: "ViewAddElement" },
                dataType: "html",
                success: function(response) {
                    $('select#Addviewcontenttab').html(response);
                }
            });

            await $.ajax({
                type: "GET",
                url: "./ListDB.php",
                data: { type: "viewDelElement" },
                dataType: "html",
                success: function(response) {
                    $('select#Delviewcontenttab').html(response);
                }
            });
        };

        $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
    };

    if (i) {
        refresh('all');
        i = false;
    };

    // Action Click Button Tabs

    $('div#Tab button').click(async(e) => {
        var datatoggle = e.target.attributes[2].value;
        console.log(e);

        await $.ajax({
            type: "GET",
            url: "./ListDB.php",
            data: { type: "BodyView", toggledataview: datatoggle },
            success: function(response) {
                $.post("./body.php", { data: response },
                    function(data) {
                        $(oldTabActive).remove();
                        oldTabActive = datatoggle;
                        $(oldTabActive).html(data);
                    }
                );
            }
        });

        refresh('Body');
    });

    // ADD TABS

    $("button#navbarAddTopTab").click(() => {

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

        $.post("./modal.php", { title: title, body: body, footer: footer },
            function(data) {
                $('#HomeModal').html(data);
                $("#HomeModal").modal();
                $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
            }
        );

    });

    $("#SaveAddTopTab").click(() => {
        var dataTT = $('div#HomeModal input#data').val();
        var idTT = $('div#HomeModal input#id').val();

        if (dataTT != "" || null || undefined && idTT != "" || null || undefined) {
            // TopTab
            var url = './AddDB.php';

            $.post(url, { where: 'TopTab', data: dataTT, id: idTT, type: "TopTab" });

            refresh('TopTab');
            var dataTT = $('div#HomeModal input#data').val(null);
            var idTT = $('div#HomeModal input#id').val(null);
        }
    });

    $('button#navbarAddTab').click(() => {

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

        $.post("./modal.php", { title: title, body: body, footer: footer },
            function(data) {
                $('#HomeModal').html(data);
                $("#HomeModal").modal();
                $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
            }
        );

    });

    $("#SaveAddTab").click(() => {
        var dataT = $('div#HomeModal input#data').val();
        var idT = $('div#HomeModal input#id').val();

        if (dataT != "" || null || undefined && idT != "" || null || undefined) {
            var url = './AddDB.php';

            $.post(url, { where: 'Tab', data: dataT, id: idT, type: "Tab" });
            var dataT = $('div#HomeModal input#data').val(null);
            var idT = $('div#HomeModal input#id').val(null);
        };
        refresh('Tab');
        AddTabContent()
    });

    // ADD CONTENT TABS
    function AddTabContent() {
        $.get("./ListDB.php", { type: "TabContent" },
            (data) => {
                $('div#viewTab').html(data);
            }
        );
    }

    // DEL TABS

    $('#navbarDelTopTab').click(async() => {

        var title = 'Delete TopTap';
        var body = null;
        var footer = `
        <div class="btn-group btn-block">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>`;

        await $.ajax({
            type: "GET",
            url: "./ListDB.php",
            data: { type: "TopTab" },
            success: function(response) {
                body = response;
            }
        });

        $.post("./modal.php", { title: title, body: body, footer: footer },
            function(data) {
                $('#HomeModal').html(data);
                $("#HomeModal").modal();
                $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
            }
        );
    });

    $('button#navbarDelTab').click(async() => {

        var title = 'Delete Tap';
        var body = null;
        var footer = `
        <div class="btn-group btn-block">
            <button class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>`;

        await $.ajax({
            type: "GET",
            url: "./ListDB.php",
            data: { type: "Tab" },
            success: function(response) {
                body = response;
            }
        });

        $.post("./modal.php", { title: title, body: body, footer: footer },
            function(data) {
                $('#HomeModal').html(data);
                $("#HomeModal").modal();
                $('#scriptreload').html(`<script type='text/javascript' src="main.js"></script>`);
            }
        );
    });

    $('div#modal-body button').click((e) => {
        var idDiv = e.currentTarget.parentElement.id;
        var id = e.currentTarget.value;
        var vTTab = e.currentTarget.parentElement.attributes[1].value;

        $.post("./DelDB.php", { table: "view", id: id },
            function() {
                $('#' + idDiv).remove();
            }
        );

        if (vTTab === "TopTab") {
            refresh('TopTab');
        };

        if (vTTab === "Tab") {
            refresh('Tab');
        };
    });

});