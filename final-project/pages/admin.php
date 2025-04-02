<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

require '../includes/header.php';
?>

<section id="admin">
    <section class="masthead">
        <h1>Admin Panel</h1>
        <h3>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h3>
    </section>

    <h3 class="mng">Manage Inventory</h3>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <?php
        require '../db/database.php';
        $stmt = $pdo->query("SELECT * FROM items");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>$" . number_format($row['price'], 2) . "</td>";
            echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
            echo "<td><a class='edit-link' href='edit_item.php?id=" . $row['id'] . "'>Edit</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <p><a href="logout.php" class="logout-link">Logout</a></p>
</section>

<?php require '../includes/footer.php'; ?>
