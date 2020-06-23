<?php 

require 'maindb.php';

function listTopTap($conn) {
    $sql="SELECT * FROM rh.view WHERE whereview='TopTab'";
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
    $rdata = [];
    $i = true;

    while($row = mysqli_fetch_array($data)) {

        if ($row['toggledataview'] != null) {
            if ($i) {
                array_push($rdata, '
                <div class="tabs m-1" id="' . $row['toggledataview'] . '"></div>
                ');
                $i = false;
            }; 
            if ($i === false) {
                array_push($rdata, '
                <div class="tabs m-1" id="' . $row['toggledataview'] . '"></div>
                ');
                $i++;
            };
        };
    };

    echo implode($rdata);
};

function listviewaddelement($conn) {
    $sql="SELECT * FROM rh.view WHERE whereview='ViewAddElement'";
    $data = mysqli_query($conn, $sql);
    $rdata = [];

    while ($row = mysqli_fetch_array($data)) {
        array_push($rdata, '
        <option id="' . $row['idelementview'] . '" value="' . $row['idview'] . '">' . $row['dataview'] . '</option>
        ');
    };

    echo implode($rdata);
};

function listviewdelelement($conn) {
    $sql="SELECT * FROM rh.view WHERE whereview='ViewDelElement'";
    $data = mysqli_query($conn, $sql);
    $rdata = [];

    while ($row = mysqli_fetch_array($data)) {
        array_push($rdata, '
        <option id="' . $row['idview'] . '">' . $row['idelementview'] . '</option>
        ');
    };

    echo implode($rdata);
};

function listbodyview($conn) {
    $sql="SELECT * FROM rh.view WHERE whereview='body'";
    $data = mysqli_query($conn, $sql);
    $rdata = [];

    while ($row = mysqli_fetch_array($data)) {
        if ($row['toggledataview'] === $_GET['toggledataview']) {
            array_push($rdata, $row['dataview']);
        };
    };

    echo implode($rdata);
};

if ($_GET['type'] === "TopTab") {
    listTopTap($conn);
};

if ($_GET['type'] === "Tab") {
    listTab($conn);
};

if ($_GET['type'] === "TabContent") {
    listTabContent($conn);
};

if ($_GET['type'] === "ViewAddElement") {
    listviewaddelement($conn);
};

if ($_GET['type'] === "ViewDelElement") {
    listviewdelelement($conn);
};

if ($_GET['type'] === "BodyView") {
    listbodyview($conn);
};

?>