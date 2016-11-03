<?php

   $server="localhost";
   $user="root";
   $pass="";
   $db="pa-shop";

   // connect to mysql

   $conn = mysqli_connect($server, $user, $pass) or die("Sorry, can't connect to the mysql.");

   // select the db

   mysqli_select_db($conn, $db) or die("Sorry, can't select the database.");
   mysqli_query($conn ,"SET NAMES UTF8");
?>
