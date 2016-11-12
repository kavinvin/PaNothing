<?php
    if(!isset($_SESSION['login_user'])){
        $_SESSION['login_user'] = '';
    }
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysql_query("select user_id from accounts where user_id = '$user_check' ");
   $row = mysql_fetch_array($ses_sql);
   $login_session = $row['user_id'];
?>