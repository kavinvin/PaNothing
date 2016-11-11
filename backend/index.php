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
  <link href="../css/custom.css" rel='stylesheet'>
  <link href="../css/product.css" rel='stylesheet'>
</head>
<body>
    <div class="container panel">
        <?php
            $result = mysql_query("SELECT * FROM products") or die(mysql_error());
            while($row = mysql_fetch_array( $result )) {
        ?>
        <div class="col-xs-12 center-thing panel-body product-list">
            <div class="col-xs-12 col-sm-2 center-y">
                <?php echo $row['product_id']; ?>
            </div>
            <div class="col-xs-12 col-sm-2 center-y">
                <?php echo $row['name']; ?>
            </div>
            <div class="col-xs-12 col-sm-3 center-y">
                <?php echo $row['description']; ?>
            </div>
            <div class="col-xs-12 col-sm-2 center-y">
                <?php echo $row['price']; ?>
            </div>
            <div class="col-xs-12 col-sm-3 center-y">
                <div class="col-xs-12 col-sm-6">
                    <a class="btn btn-default" href="../database/delete.php?id=<?php echo $row['product_id']; ?>">ลบ</a>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <a class="btn btn-default" href="../database/edit.php?id=<?php echo $row['product_id']; ?>">แก้ไข</a>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="row center-thing">
            <a id="add" class="btn btn-default" href="../database/new.php">เพิ่มสินค้า</a>
        </div>
    </div>
</body>
</html>
