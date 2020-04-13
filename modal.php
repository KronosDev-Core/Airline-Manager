<?php

function listTopTab($conn) {
    echo `
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
    </div>`;
    }


if ($_GET['type'] === "TopTab") {
    listTopTab($conn);
};
?>