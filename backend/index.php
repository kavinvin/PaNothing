<?php
    session_start();
    require("../database/connection.php");
    $_page="../database/products";
?>

<!DOCTYPE html>
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
</head>
<body>
    <div class="container">
        <?php
            $result = mysql_query("SELECT * FROM products") or die(mysql_error());
            while($row = mysql_fetch_array( $result )) {
        ?>
        <div class="col-xs-12 center-thing">
            <div class="col-xs-3">
                <?php echo $row['name']; ?>
            </div>
            <div class="col-xs-3">
                <?php echo $row['description']; ?>
            </div>
            <div class="col-xs-3">
                <?php echo $row['price']; ?>
            </div>
            <div class="col-xs-3">
                <div class="row">
                    <a href="delete.php?id=<?php echo $row['name']; ?>">ลบ</a>
                </div>
                <div class="row">
                    <a href="edit.php?id=<?php echo $row['name']; ?>">แก้ไข</a>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="row center-thing">
            <a href="new.php">เพิ่มสินค้า</a>
        </div>  
    </div>
</body>
</html>
