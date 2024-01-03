<?php
$server_name = "localhost";
$username = "root";
$password = "";
$dbname = "new_bmss";
$conn = new mysqli($server_name, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Create database if it does not exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === TRUE) {
} else {
    die("Error creating database: " . $conn->error);
}

// Switch to the new database
$conn->select_db($dbname);

// Function to execute queries
function executeQueries($conn, $sql)
{
    if ($conn->multi_query($sql)) {
    } else {
        die("Error executing queries: " . $conn->error);
    }
}

// SQL statements for table creation
$sql_create_tables = "
    CREATE TABLE IF NOT EXISTS bms_user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        email VARCHAR(255),
        phone VARCHAR(20),
        password VARCHAR(255)
    );

    CREATE TABLE IF NOT EXISTS bms_buses (
        bus_id INT AUTO_INCREMENT PRIMARY KEY,
        bus_name VARCHAR(255)
    );

    CREATE TABLE IF NOT EXISTS bms_route (
        route_id INT AUTO_INCREMENT PRIMARY KEY,
        from_location VARCHAR(255),
        to_location VARCHAR(255)
    );

    CREATE TABLE IF NOT EXISTS bms_seat (
        seat_id INT AUTO_INCREMENT PRIMARY KEY,
        seat_name VARCHAR(255),
        bus_id INT,
        FOREIGN KEY (bus_id) REFERENCES bms_buses(bus_id)
    );

    CREATE TABLE IF NOT EXISTS bms_booking_seat (
        id INT AUTO_INCREMENT PRIMARY KEY,
        bus_id INT,
        FOREIGN KEY (bus_id) REFERENCES bms_buses(bus_id),
        seat_id INT,
        FOREIGN KEY (seat_id) REFERENCES bms_seat(seat_id)
    );

    CREATE TABLE IF NOT EXISTS bms_booking (
        booking_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        FOREIGN KEY (user_id) REFERENCES bms_user(id),
        bus_id INT,
        FOREIGN KEY (bus_id) REFERENCES bms_buses(bus_id),
        route_id INT,
        FOREIGN KEY (route_id) REFERENCES bms_route(route_id),
        seat_id INT,
        FOREIGN KEY (seat_id) REFERENCES bms_seat(seat_id),
        bookingdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE IF NOT EXISTS bms_sch (
        sch_id INT AUTO_INCREMENT PRIMARY KEY,
        bus_id INT,
        FOREIGN KEY (bus_id) REFERENCES bms_buses(bus_id),
        route_id INT,
        FOREIGN KEY (route_id) REFERENCES bms_route(route_id),
        dep_time TIME,
        arv_time TIME
    );
";

// SQL statements for data insertion
$sql_insert_data = "
    INSERT INTO bms_buses (bus_id, bus_name) VALUES
    (1, 'hp 72'),
    (2, 'hp 80');

    INSERT INTO bms_route (route_id, from_location, to_location) VALUES
    (1, 'una', 'chandigarh'),
    (2, 'chandigarh', 'una');

    INSERT INTO bms_sch (sch_id, bus_id, route_id, dep_time, arv_time) VALUES
    (1, 1, 1, '07:50:20', '10:50:20'),
    (2, 2, 2, '08:00:00', '12:00:00');

    INSERT INTO bms_seat (seat_id, seat_name, bus_id) VALUES
    (1, 'A1', 1),
    (2, 'A2', 1),
    (3, 'A3', 1),
    (4, 'A4', 1),
    (5, 'A5', 1),
    (6, 'B1', 1),
    (7, 'B2', 1),
    (8, 'B3', 1),
    (9, 'B4', 1),
    (10, 'B5', 1),
    (11, 'C1', 1),
    (12, 'C2', 1),
    (13, 'C3', 1),
    (14, 'C4', 1),
    (15, 'C5', 1),
    (16, 'D1', 1),
    (17, 'D2', 1),
    (18, 'D3', 1),
    (19, 'D4', 1),
    (20, 'D5', 1),
    (21, 'E1', 1),
    (22, 'E2', 1),
    (23, 'E3', 1),
    (24, 'E4', 1),
    (25, 'E5', 1),
    (26, 'A1', 2),
    (27, 'A2', 2),
    (28, 'A3', 2),
    (29, 'A4', 2),
    (30, 'A5', 2),
    (31, 'B1', 2),
    (32, 'B2', 2),
    (33, 'B3', 2),
    (34, 'B4', 2),
    (35, 'B5', 2),
    (36, 'C1', 2),
    (37, 'C2', 2),
    (38, 'C3', 2),
    (39, 'C4', 2),
    (40, 'C5', 2),
    (41, 'D1', 2),
    (42, 'D2', 2),
    (43, 'D3', 2),
    (44, 'D4', 2),
    (45, 'D5', 2),
    (46, 'E1', 2),
    (47, 'E2', 2),
    (48, 'E3', 2),
    (49, 'E4', 2),
    (50, 'E5', 2);

    INSERT INTO bms_booking_seat (id, bus_id, seat_id, route_id, book_date, creat_date, status) VALUES
    (1, 1, 1, 1, '2023-12-27', '0000-00-00 00:00:00.000000', '1'),
    (2, 1, 2, 1, '2023-12-27', '2023-12-25 13:26:31.304380', '1'),
    (3, 1, 2, 1, '2023-12-27', '2023-12-25 13:26:37.889565', '1'),
    (4, 1, 9, 1, '2023-12-27', '2023-12-25 13:26:39.991515', '1'),
    (5, 1, 2, 1, '2023-12-27', '2023-12-25 13:26:45.858215', '1');
";

// Execute the queries
executeQueries($conn, $sql_create_tables);
executeQueries($conn, $sql_insert_data);

// Close the connection
$conn->close();
?>
