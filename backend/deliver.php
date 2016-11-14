<?php
include('../database/connection.php');

$purchase_info = mysql_real_escape_string(htmlspecialchars($_POST['purchase_id']));
$sql = mysql_query("UPDATE purchases SET delivered=1 WHERE purchase_id=$purchase_info") or die(mysql_error());

?>
