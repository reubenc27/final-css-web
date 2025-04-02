<?php
session_start();
require '../db/database.php';

// Fetch items from the database
$stmt = $pdo->query("SELECT * FROM items");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle item addition to cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    if ($quantity > 0) {
        $_SESSION['cart'][$item_id] = $quantity;
    }
}

// Get cart total
$total = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $qty) {
        $stmt = $pdo->prepare("SELECT name, price FROM items WHERE id = ?");
        $stmt->execute([$id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item) {
            $total += $item['price'] * $qty;
        }
    }
}
?>

<?php include '../includes/header.php'; ?>
    <section id="quote">
        <section class="masthead">
            <h1>Quote Calculator</h1>
        </section>
        <form method="POST" class="calc">
            <table>
                <tr>
                    <th>Material</th>
                    <th>Price (per m²)</th>
                    <th>Quantity (m²)</th>
                    <th>Add to Quote</th>
                </tr>
                <tr>
                    <td>
                        <select name="item_id" id="material-select" required>
                            <option value="">Select Material</option>
                            <?php foreach ($items as $item): ?>
                                <option value="<?= $item['id'] ?>" data-price="<?= $item['price'] ?>"><?= htmlspecialchars($item['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td id="price-display"></td> <!-- Price will be displayed here -->
                    <td><input type="number" name="quantity" min="0" step="0.1" id="quantity" required></td>
                    <td>
                        <button type="submit">Add</button>
                    </td>
                </tr>
            </table>
        </form>

        <h3 class="total">Current Quote Total: $<?= number_format($total, 2) ?></h3>

        <form method="POST" action="reset_cart.php" class="reset">
            <button type="submit">Reset Cart</button>
        </form>
    </section>
    <script> // I was going to put this in my .js file, but it when i did, it wouldn't work :(
        document.addEventListener('DOMContentLoaded', function() {
            const materialSelect = document.getElementById('material-select');
            
            materialSelect.addEventListener('change', updatePrice);
            
            updatePrice(); 
        });

        function updatePrice() {
            const materialSelect = document.getElementById('material-select');
            const selectedOption = materialSelect.options[materialSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');

            if (price) {
                document.getElementById('price-display').textContent = '$' + price; // Show price directly
            }
        }
    </script>
<?php include '../includes/footer.php'; ?>
