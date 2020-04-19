<?php 

require 'maindb.php';

function listTopTab($conn) {
    $sql="SELECT * FROM rh.view WHERE whereview='TopTab'";
    $data = mysqli_query($conn, $sql);
    $rdata = [];

    while($row = mysqli_fetch_array($data)) {
        array_push($rdata, '
        <div id="' . $row['idview'] . '" value="TopTab" class="btn-group btn-block">
            <button value="' . $row['idview'] . '" type="button" class="Del btn btn-outline-danger text-danger" id="listviewAllTabDel">-</button>
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
        <div id="' . $row['idview'] . '" value="Tab" class="btn-group btn-block">
            <button value="' . $row['idview'] . '" type="button" class="Del btn btn-outline-danger text-danger" id="listviewAllTabDel">-</button>
            <button id="listviewTopTab" value="' . $row['idview'] . '" class="list-group-item list-group-item-action">' . $row['dataview'] . '</button>
        </div>
        ');
    };

    echo implode($rdata);
};

function listTabContent($conn) {
    $sql="SELECT * FROM rh.view";
    $data = mysqli_query($conn, $sql);
    $i = true;

    while($row = mysqli_fetch_array($data)) {

        if ($row['toggledataview'] != null) {
            if ($i) {
                echo '
                <div id="' . $row['toggledataview'] . '"></div>
                ';
                $i = false;
            }; 
            if ($i === false) {
                echo '
                <div id="' . $row['toggledataview'] . '"></div>
                ';
                $i++;
            };
        };
    };
};

if ($_GET['type'] === "TopTab") {
    listTopTab($conn);
};

if ($_GET['type'] === "Tab") {
    listTab($conn);
};

if ($_GET['type'] === "TabContent") {
    listTabContent($conn);
}

?>