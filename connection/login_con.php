<?php
include_once('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $stmt = $conn->prepare("SELECT * FROM `bms_user` WHERE `email` = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        header("Location: /bms/pages/selectroot.php");
        exit();
    } else {
        $loginError = "Please check your email and password.";
    }
}
?>