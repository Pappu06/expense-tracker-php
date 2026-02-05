<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include "../config/db.php";

if (isset($_POST['add_expense'])) {

    $user_id = $_SESSION['user_id'];
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $expense_date = $_POST['expense_date'];
    $note = mysqli_real_escape_string($conn, $_POST['note']);

    $query = "INSERT INTO expenses (user_id, amount, category, expense_date, note)
              VALUES ('$user_id', '$amount', '$category', '$expense_date', '$note')";

    if (mysqli_query($conn, $query)) {
        header("Location: list.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container">
    
<h2>Add New Expense</h2>

<form method="POST" action="">
    <label>Amount</label><br>
    <input type="number" name="amount" step="0.01" required><br><br>

    <label>Category</label><br>
    <select name="category" required>
        <option value="">Select</option>
        <option>Food</option>
        <option>Travel</option>
        <option>Shopping</option>
        <option>Bills</option>
        <option>Other</option>
    </select><br><br>

    <label>Date</label><br>
    <input type="date" name="expense_date" required><br><br>

    <label>Note</label><br>
    <textarea name="note"></textarea><br><br>

    <button type="submit" name="add_expense">Add Expense</button>
</form>

<a href="../dashboard.php">Back to Dashboard</a>
</div>

</body>
</html>
