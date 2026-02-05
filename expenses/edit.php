<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include "../config/db.php";

$user_id = $_SESSION['user_id'];

if (!isset($_GET['id'])) {
    header("Location: list.php");
    exit();
}

$expense_id = $_GET['id'];

$query = "SELECT * FROM expenses 
          WHERE id = '$expense_id' AND user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) != 1) {
    echo "Unauthorized access!";
    exit();
}

$expense = mysqli_fetch_assoc($result);

?>
<?php
if (isset($_POST['update_expense'])) {

    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $expense_date = $_POST['expense_date'];
    $note = mysqli_real_escape_string($conn, $_POST['note']);

    $updateQuery = "UPDATE expenses SET
                    amount = '$amount',
                    category = '$category',
                    expense_date = '$expense_date',
                    note = '$note'
                    WHERE id = '$expense_id' AND user_id = '$user_id'";

    if (mysqli_query($conn, $updateQuery)) {
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
    <title>Edit Expense</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">
    <h2>Edit Expense</h2>

<form method="POST">
    <label>Amount</label><br>
    <input type="number" name="amount" step="0.01"
           value="<?php echo $expense['amount']; ?>" required><br><br>

    <label>Category</label><br>
    <select name="category" required>
        <?php
        $categories = ["Food", "Travel", "Shopping", "Bills", "Other"];
        foreach ($categories as $cat) {
            $selected = ($expense['category'] == $cat) ? "selected" : "";
            echo "<option $selected>$cat</option>";
        }
        ?>
    </select><br><br>

    <label>Date</label><br>
    <input type="date" name="expense_date"
           value="<?php echo $expense['expense_date']; ?>" required><br><br>

    <label>Note</label><br>
    <textarea name="note"><?php echo $expense['note']; ?></textarea><br><br>

    <button type="submit" name="update_expense">Update Expense</button>
</form>

<a href="list.php">Back</a>
</div>

</body>
</html>

