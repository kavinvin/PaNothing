<?php
    session_start();
    require("../database/connection.php");
    $_page="../database/products";
    include('../session.php');

    if($_SESSION['login_user'] == '' || $_SESSION['isadmin'] == '0') {
        header("location: ../denied.php");
    }
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
  <script src="../bootstrap/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <link href="backend.css" rel='stylesheet'>
  <link href="../css/custom.css" rel='stylesheet'>
  <link href="../css/product.css" rel='stylesheet'>
  <title>รายการสั่ง | Panothing</title>
</head>
    <body>
        <?php
            $result = mysql_query("SELECT * FROM purchases") or die(mysql_error());
            while($row = mysql_fetch_array( $result )) {
        ?>
            <div class="col-xs-12 center-thing panel-body product-list">
            <div class="col-xs-12 col-sm-2 center-y">
                <?php echo $row['purchase_id']; ?>
            </div>
            <div class="col-xs-12 col-sm-2 center-y">
                <?php echo $row['user_id']; ?>
            </div>
            <div class="col-xs-12 col-sm-3 center-y">
                <?php echo "wtf" ?>
            </div>
            <div class="col-xs-12 col-sm-2 center-y">
                <?php echo $row['total']; ?>
            </div>
            <div class="col-xs-12 col-sm-3 center-y">
               <?php print_r($result); ?>
            </div>
        </div>
        <?php
        } 
        ?>
    </body>
</html>