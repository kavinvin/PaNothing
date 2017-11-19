<?php
include('connection.php');
require('../session.php');
session_start();

$user = $_SESSION['user_id'];
$product_info = mysqli_real_escape_string($conn, htmlspecialchars($_POST['product_info']));
$total = mysqli_real_escape_string($conn, htmlspecialchars($_POST['total']));

$sql = mysqli_query($conn, "INSERT purchases SET user_id='$user', product_info='$product_info', total='$total'") or die(mysqli_error($conn));

?>
