<?php

$seatNumbers = isset($_GET['seatNumbers']) ? $_GET['seatNumbers'] : '';
$numberOfSeats = isset($_GET['numberOfSeats']) ? $_GET['numberOfSeats'] : '';
$totalAmount = isset($_GET['totalAmount']) ? $_GET['totalAmount'] : '';

include_once('includes/head.php');
include_once('connection/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>

<body>
    <section id="invoice">
        <h1>Invoice</h1>
        <div>
            <h3>Seat Numbers:</h3>
            <p><?php echo $seatNumbers; ?></p>
        </div>
        <div>
            <h3>Number of Seats:</h3>
            <p><?php echo $numberOfSeats; ?></p>
        </div>
        <div>
            <h3>Total Amount:</h3>
            <p><?php echo $totalAmount; ?> Rs</p>
        </div>
    </section>
</body>

</html>
