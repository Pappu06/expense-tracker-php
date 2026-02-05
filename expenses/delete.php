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

// Ownership validation + delete
$query = "DELETE FROM expenses 
          WHERE id = '$expense_id' AND user_id = '$user_id'";

if (mysqli_query($conn, $query)) {
    header("Location: list.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
