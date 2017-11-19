<?php
include('connection.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn,"DELETE FROM products WHERE product_id=$id") or die(mysqli_error($conn));
    header("Location: ../backend/index.php");
} else {
    header("Location: ../backend/index.php");
}
?>
