<?php
require 'db.php';
require 'functions.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM transactions WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    if (!validateNumber($price) || !validateNumber($qty)) {
        die("Price and Quantity must be non-negative.");
    }

    $total = computeTotal($price, $qty);

    $sql = "UPDATE transactions 
            SET item = :item, price = :price, qty = :qty, total = :total
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':qty' => $qty,
        ':total' => $total,
        ':id' => $id
    ]);

    redirect("read.php");
}
?>

<form method="post">
    Item: <input type="text" name="item" value="<?= htmlspecialchars($data['item']) ?>"><br>
    Price: <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($data['price']) ?>"><br>
    Qty: <input type="number" name="qty" value="<?= htmlspecialchars($data['qty']) ?>"><br>
    <button type="submit">Update</button>
</form>
<link rel="stylesheet" href="style.css">