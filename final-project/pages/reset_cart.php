<?php
session_start();

unset($_SESSION['cart']);

header("Location: quote.php");
exit();
?>
