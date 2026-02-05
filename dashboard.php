<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>

    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['user_name']; ?> 👋</h2>

        <a href="expenses/add.php">Add Expense</a> |
        <a href="expenses/list.php">View Expenses</a> |
        <a href="auth/logout.php">Logout</a>
    </div>

</body>

</html>