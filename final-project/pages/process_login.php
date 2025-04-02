<?php
session_start();
require '../db/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        die("Username or password cannot be empty.");
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("User not found. <a href='login.php'>Try again</a>");
    }

    if (!password_verify($password, $user['password'])) {
        die("Incorrect password. <a href='login.php'>Try again</a>");
    }

    $_SESSION['user'] = $user['username'];
    header("Location: admin.php");
    exit();
}
?>
