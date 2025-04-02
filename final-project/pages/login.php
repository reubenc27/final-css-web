<?php
session_start();

// Redirect to admin page if already logged in
if (isset($_SESSION['user'])) {
    header("Location: admin.php");
    exit();
}

require '../includes/header.php';
?>

<section id="login">
    <div class="form">
        <form action="process_login.php" method="POST" class="login">
            <h2>Login</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="submit">Login</button>
        </form>
    </div>
    <a href="register.php">Don't have an account? Register</a>
</section>

<?php require '../includes/footer.php'; ?>
