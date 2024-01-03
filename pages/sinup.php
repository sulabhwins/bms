<?php
include_once('../connection/connection.php');
if (isset($_POST) && !empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO `bms_user` (`name`, `email`, `phone`, `password` ) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss', $name, $email, $phone, $hashedPassword);
    $stmt->execute();
    $stmt->close();
    header("Location: selectroot.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="../assets/css/log_in.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
    <section id="sinup">
        <form action="?" method="post" id="signupForm" onsubmit="return validateForm()">
            <h2>Sign Up</h2>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <span id="nameError" class="error-message"></span>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <span id="emailError" class="error-message"></span>

            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" required>
            <span id="phoneError" class="error-message"></span>

            <label for="password">Password:</label>
            <div class="password-input-container">
                <input type="password" name="password" id="password" required>
                <i class="fa-regular fa-eye-slash" id="eye" onclick="togglePasswordVisibility()"></i>
                <span id="passwordError" class="error-message"></span>
            </div>
            <input type="submit" value="Sign Up">
            <h4> Already have an account <a href="../index.php">Sign in</a> </h4>
        </form>
        <script src="../assets/js/eyeicon.js"></script>
        <script src="../assets/js/jsvalidation.js"></script>
    </section>
</body>
</html>