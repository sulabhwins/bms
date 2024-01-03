<?php
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $dbname = "new_bms";
    $conn = new mysqli($server_name, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('failded' . $conn->connect_error);
    }
?>