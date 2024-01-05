<?php
include_once('./connection/connection.php');

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
        header("Location: ./pages/selectroot.php");
        exit();
    } else {
        $loginError = "Incorrect email or password.";
    }

    $conn->close();
}

// Check if the session is set before displaying the login form
session_start();
if (isset($_SESSION['email'])) {
    // Redirect to the next page if the session is set
    header("Location: ./pages/selectroot.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Rest of your HTML code remains unchanged -->
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./assets/css/log_in.css">
    </head>
    <body>
        <section id="login">
            <form name="loginForm" method="post">
                <h2>Log In</h2>
                <label for="email">Email:</label>
                <input type="email" name="email" required><br>
            <label for="password">Password:</label>
                <div class="password-input-container">
                    <input type="password" name="password" id="password"  required>
                    <i class="fa-regular fa-eye-slash" id="eye" onclick="togglePasswordVisibility()"></i>
                </div>
                <?php if (!empty($loginError)) { echo '<p style="color: red;">' . $loginError . '</p>';}?>
                <input type="submit" value="Login">
                <h4>Don't have an account <a href="./pages/sinup.php">Sign Up</a> </h4>
            </form>
        </section>
        <script src="./assets/js/eyeicon.js"></script>

</html>
