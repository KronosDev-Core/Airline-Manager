<?php 

require 'maindb.php';

function listTopTab($conn) {
    $sql="SELECT * FROM rh.view WHERE whereview='TopTab'";
    $data = mysqli_query($conn, $sql);
    $rdata = [];

    while($row = mysqli_fetch_array($data)) {
        array_push($rdata, '
        <div class="btn-group btn-block">
            <button type="button" class="Del btn btn-outline-danger text-danger" id="listviewTopTabDel">-</button>
            <button id="listviewTopTab" value="' . $row['idview'] . '" class="list-group-item list-group-item-action">' . $row['dataview'] . '</button>
        </div>
        ');
    };

    echo implode($rdata);
};

function listTab($conn) {
    $sql="SELECT * FROM rh.view WHERE whereview='Tab'";
    $data = mysqli_query($conn, $sql);
    $rdata = [];

    while($row = mysqli_fetch_array($data)) {
        array_push($rdata, '
        <div class="btn-group btn-block">
            <button type="button" class="Del btn btn-outline-danger text-danger" id="listviewTopTabDel">-</button>
            <button id="listviewTopTab" value="' . $row['idview'] . '" class="list-group-item list-group-item-action">' . $row['dataview'] . '</button>
        </div>
        ');
    };

    echo implode($rdata);
};

if ($_GET['type'] === "TopTab") {
    listTopTab($conn);
};

if ($_GET['type'] === "Tab") {
    listTab($conn);
};

?>