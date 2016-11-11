<?php
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysql_query("select username from account where username = '$user_check' ");
   $row = mysql_fetch_array($ses_sql);
   $login_session = $row['username'];
?>