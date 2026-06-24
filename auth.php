<?php
session_start();
$host = "localhost";
$dbname = "social_app";
$user = "root";   // change if needed
$pass = "";       // change if needed

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT password FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        $_SESSION['user'] = $username;
        header("Location: landing.php");
        exit();
    } else {
        echo "Invalid password. <a href='login.php'>Try again</a>";
    }
} else {
    echo "User not found. <a href='login.php'>Try again</a>";
}

$stmt->close();
$conn->close();
?>