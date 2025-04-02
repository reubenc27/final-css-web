<?php require '../includes/header.php'; ?>
    <section id="register">
        <div class="form">
            <form action="process_register.php" method="POST" class="create">
                <h2>Create an Account</h2>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="submit">Register</button>
            </form>
        </div>
        <a href="login.php">Already have an account? Log in</a>
    </section>
<?php require '../includes/footer.php'; ?>
