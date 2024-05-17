<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'config.php';
    $user_id = $_SESSION['user_id'];
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $date = $_POST['description'];

    $sql = "INSERT INTO transactions (user_id, type, amount, category, date, description) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isdsss", $user_id, $type, $amount, $category, $date, $description);
    if ($stmt->execute()) {
        echo "Transaction added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Transaction</title>
    </head>
    <body>
        <form method="post" action="">
            <select name="type">
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
            <input type="number" step="0.01" name="amount" placeholder="Amount" required>
            <input type="text" name="category" placeholder="Category" required>
            <input type="date" name="date" required>
            <input type="text" name="description" placeholder="Description">
            <button type="submit">Add Transaction</button>
        </form>
    </body>
</html>