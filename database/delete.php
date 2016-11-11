<?php
include('connection.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysql_query("DELETE FROM products WHERE id_product=$id") or die(mysql_error());
    header("Location: ../backend/index.php");
} else {
    header("Location: ../backend/index.php");
}
?>