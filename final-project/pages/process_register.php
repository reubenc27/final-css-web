<?php
session_start();
require '../db/database.php'; // Make sure the database is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (empty($username) || empty($password)) {
        die("Username or password cannot be empty. <a href='register.php'>Try again</a>");
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if username exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->fetch()) {
        die("Username already exists! <a href='register.php'>Try again</a>");
    }

    // Insert new user
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    
    if ($stmt->execute([$username, $hashedPassword])) {
        $_SESSION['user'] = $username;
        header("Location: admin.php");
        exit();
    } else {
        die("Registration failed. <a href='register.php'>Try again</a>");
    }
}
?>
