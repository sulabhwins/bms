<?php
// session_start();
// if(isset($_SESSION)) {
//     session_destroy();
    
//     echo "Session destroyed.";
// } 
?>
<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../index.php");
exit();
?>
