<?php
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysql_query("select user_name from accounts where user_name = '$user_check' ");
   $row = mysql_fetch_array($ses_sql);
   $login_session = $row['user_name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>