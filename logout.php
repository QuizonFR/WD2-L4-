<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
</head>
<body>
    <h2>Thank you for using</h2>
    <a href="login.php">Login Again</a>
</body>
</html>