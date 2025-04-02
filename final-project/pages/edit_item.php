<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

require '../db/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Fetch the item based on the provided ID
    $stmt = $pdo->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$item) {
        die("Item not found.");
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Update the item details
    $stmt = $pdo->prepare("UPDATE items SET name = ?, price = ?, quantity = ? WHERE id = ?");
    $stmt->execute([$_POST['name'], $_POST['price'], $_POST['quantity'], $_POST['id']]);
    header("Location: admin.php");
    exit();
} else {
    die("Invalid request.");
}

require '../includes/header.php';
?>

<section id="edit-item">
    <h1>Edit Item</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
        <label for="name">Item Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
        
        <label for="price">Price:</label>
        <input type="number" name="price" value="<?php echo htmlspecialchars($item['price']); ?>" step="0.01" required>
        
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>" required>
        
        <input type="submit" value="Update Item">
    </form>
    <a href="admin.php">Cancel</a>
</section>

<?php require '../includes/footer.php'; ?>
