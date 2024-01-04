<?php
session_start();
if (!isset($_SESSION)) {
    header("Location:../index.php");
    exit();   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Route Selection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        select,
        input[type="date"] {
            padding: 10px;
            margin: 10px;
            font-size: 16px;
            width: 200px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function validateForm() {
            var from = document.getElementById("from").value;
            var to = document.getElementById("to").value;
            var date = document.getElementById("date").value;

            if (from === to) {
                alert("Please select different 'From' and 'To' locations.");
                return false;
            }
            var selectedDate = new Date(date);
            var currentDate = new Date();
            var oneWeekAgo = new Date(currentDate);
            oneWeekAgo.setDate(currentDate.getDate() - 7);

            if (selectedDate < oneWeekAgo) {
                alert("Please select a date within the next one week.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <form action="./selectbuses.php" method="post" onsubmit="return validateForm()">
        <h2>Bus Route Selection</h2>
        
        <label for="from">From:</label>
        <select id="from" name="from">
        
            <?php
            include_once('../connection/connection.php');
            $sql = "SELECT * FROM bms_route ";
            $result = $conn->query($sql);?>
            <?php
            foreach ($result as $row) {
            ?>
                <option value="<?php echo $row['from_location']; ?>"><?php echo $row['from_location']; ?></option>
            <?php } ?>
        </select>

        <label for="to">To:</label>
        <select id="to" name="to">
            <?php
            foreach ($result as $row) {
            ?>
                <option value="<?php echo $row['to_location']; ?>"><?php echo $row['to_location']; ?></option>
            <?php } ?>
        </select>

        <label for="date">Date:</label>
        <select id="date" name="date">
            <?php
            for ($i = 0; $i < 7; $i++) {
                $date = date('Y-m-d', strtotime("+$i days"));
                echo "<option value=\"$date\">$date</option>";
            }
            ?>
        </select>

        <br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>