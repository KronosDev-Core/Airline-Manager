<?php

echo '
<div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <h4 id="modal-title" class="modal-title">' . $_POST['title'] . '</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div id="modal-body" class="modal-body">
            ' . $_POST['body'] . '
        </div>

        <div id="modal-footer" class="modal-footer">
            ' . $_POST['footer'] . '
        </div>

    </div>
</div>';

?>