<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include "../config/db.php";
$user_id = $_SESSION['user_id'];
?>
<?php
$query = "SELECT * FROM expenses 
          WHERE user_id = '$user_id' 
          ORDER BY expense_date DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Expenses</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">
    <h2>My Expenses</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Amount</th>
        <th>Category</th>
        <th>Date</th>
        <th>Note</th>
        <th>Actions</th>
    </tr>

    <?php if (mysqli_num_rows($result) > 0) { ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td>₹<?php echo $row['amount']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['expense_date']; ?></td>
                <td><?php echo $row['note']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $row['id']; ?>" 
                       onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="5">No expenses found</td>
        </tr>
    <?php } ?>
</table>

<br>
<a href="add.php">Add New Expense</a> |
<a href="../dashboard.php">Dashboard</a>
</div>

</body>
</html>
