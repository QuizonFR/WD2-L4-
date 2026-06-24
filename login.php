<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: landing.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; }
        .container { width: 300px; margin: 100px auto; }
        input, button { width: 100%; padding: 8px; margin: 5px 0; }
    </style>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form action="auth.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>