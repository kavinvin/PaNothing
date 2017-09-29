<?php

   $server="localhost";
   $user="root";
   $pass="";
   $db="pa-shop";

   // connect to mysql and select db

   $conn = mysqli_connect($server, $user, $pass, $db) or die("Sorry, can't connect to the mysql.");
   mysqli_set_charset($conn,"utf8");
?>
