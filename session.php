<?php
    if(!isset($_SESSION['login_user'])){
        $_SESSION['login_user'] = '';
        $_SESSION['isadmin'] = '0';
    }
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($conn, "select user_id from accounts where user_id = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql);
   $login_session = $row['user_id'];
?>