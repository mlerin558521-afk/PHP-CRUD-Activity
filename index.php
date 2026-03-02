<h2>Add Transaction</h2>

<form method="post" action="create.php">
    <div>
        <label for="item">Item</label>
        <input type="text" name="item" id="item" required>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price" required>
    </div>
    <div>
        <label for="qty">Quantity</label>
        <input type="number" name="qty" id="qty" required>
    </div>
    <button type="submit">Save</button>
</form>

<a href="read.php">View Transactions</a>

<link rel="stylesheet" href="style.css">