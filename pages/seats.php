<?php
include_once('../includes/head.php');
include_once('../connection/connection.php');
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $bus_id = $_POST['bus_id'];
    $route_id = $_POST['route_id'];
    $date = $_POST['date'];
    foreach ($_POST as $key => $value) {
        if ($key !== 'bus_id' && $key !== 'route_id' && $key !== 'date' && $key !== 'submit') {
            $seat_id = $key;
            $abc = "INSERT INTO `bms_booking_seat`(`bus_id`, `seat_id`, `route_id`, `book_date` ) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($abc);
            $stmt->bind_param("iiis", $bus_id, $seat_id, $route_id, $date);
            $stmt->execute();
        }
    }
}
?>
    <section id="seatss">
    <form action="" method="post">
        <div class='plane'>
            <h1>Bus Seat's</h1>
            <ol class='cabin'>
                <?php
                if (isset($_GET['bus_id'])) {
                    $bus_id = $_GET['bus_id'];
                    $route_id = $_GET['route_id'];
                    $date = $_GET['date'];
                    $sql = "SELECT * FROM bms_booking_seat WHERE book_date = ? AND route_id = ? AND bus_id = ? ";
                    $result = $conn->prepare($sql);
                    $result->bind_param("sii", $date, $route_id, $bus_id);
                    $result->execute();
                    $stmt = $result->get_result();
                    $bookedseats = array();
                    if ($stmt->num_rows > 0) {
                        while ($row = $stmt->fetch_assoc()) {
                            $bookedseats[] = $row['seat_id'];
                        }
                    }
                    $bb = "SELECT * FROM bms_seat WHERE bus_id = ? ";
                    $aa = $conn->prepare($bb);
                    $aa->bind_param("s", $bus_id);
                    $aa->execute();
                    $cc = $aa->get_result();
                    if ($cc->num_rows > 0) {
                        while ($dd = $cc->fetch_assoc()) {
                            $seat_id = $dd['seat_id'];
                            $isbooked = (in_array($seat_id, $bookedseats)) ? "disabled" : "";
                            $seatclass = ($isbooked === "disabled") ? "seat-item seat-booked" : "seat-item";

                            echo "<li class='seat'>
                            <input type='hidden' name='bus_id' value='" . $bus_id . "'>
                            <input type='hidden' name='route_id' value='" . $route_id . "'>
                            <input type='hidden' name='date' value='" . $date . "'>
                            <input class='seats' type='checkbox' name='" . $seat_id . "' id='seat-$seat_id' value='" . $dd['seat_name'] . "' $isbooked>
                            <label for='seat-$seat_id'>" . $dd['seat_name'] . "</label>
                          </li>";
                        }
                    }
                }
                ?>
            </ol>
        </div>
        <div class="total-amount" style="text-align: center; margin-top: 20px;">
            <h2>Total Amount: <span class="total-amount-value">0</span> Rs</h2>
            <button type="submit" name="submit" class="payment-button" onclick="generateInvoice()">Payment</button>
        </div>
    </form>
    </section>
<?php
    // include_once('../includes/foot.php')
?>