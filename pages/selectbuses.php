<?php
session_start();
if (!isset($_SESSION)) {
    header("Location:../index.php");
    exit();   
}

include_once('../includes/head.php');
include_once('../connection/connection.php');

if (isset($_POST)) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $date =$_POST['date'];
    $sql = "SELECT * FROM bms_route WHERE `from_location`=? AND `to_location`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $from, $to);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $route_id = $row['route_id'];
        $sql1 = "SELECT * FROM `bms_sch` WHERE `route_id`=?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("s", $route_id);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        if ($result1->num_rows > 0) {
            $sql2 = "SELECT * FROM `bms_buses` JOIN `bms_sch` ON bms_buses.bus_id=bms_sch.bus_id WHERE route_id=?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("s", $route_id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            if ($result2->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Bus ID</th><th>Bus Name</th><th>Departure Time</th><th>Arrival Time</th><th>Book Now</th></tr>";
                foreach ($result2 as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['bus_id'] . "</td>";
                    echo "<td>" . $row['bus_name'] . "</td>";
                    echo "<td>" . $row['dep_time'] . "</td>";
                    echo "<td>" . $row['arv_time'] . "</td>";
                    echo "<td><a href='seats.php?bus_id=" . $row['bus_id'] ."&&route_id=".$route_id. "&&date=".$date."'>book seet</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No buses found for the selected route.";
            }
        }
    }
}
?>
