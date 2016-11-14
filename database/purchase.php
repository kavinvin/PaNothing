<?php
include('connection.php');
require('../session.php');
session_start();

$user = $_SESSION['user_id'];
$product_info = mysql_real_escape_string(htmlspecialchars($_POST['product_info']));
$total = mysql_real_escape_string(htmlspecialchars($_POST['total']));

$sql = mysql_query("INSERT purchases SET user_id='$user', product_info='$product_info', total='$total'") or die(mysql_error());

?>
