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
  <link href="../css/order.css" rel='stylesheet'>

  <title>รายการสั่ง | Panothing</title>
</head>
    <body>
        <div class="container">
        <?php
            $result = mysql_query("SELECT * FROM purchases") or die(mysql_error());
            while($row = mysql_fetch_array( $result )) {
        ?>
          <div>
            <div class="col-xs-12 center-thing panel-body product-list orderlist">
              <div class="col-xs-12 col-sm-2 center-y">
                  <?php echo $row['purchase_id']; ?>
              </div>
              <div class="col-xs-12 col-sm-2 center-y">
                  <?php echo $row['user_id']; ?>
              </div>
              <div class="col-xs-12 col-sm-2 center-y">
                  <?php echo $row['total'].' บาท'; ?>
              </div>
              <div class="col-xs-12 col-sm-3 center-y">
                 <?php echo "เสร็จสิ้น" ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-3 suborder">
                  <?php
                  $data = mysql_query("SELECT product_id, name FROM products") or die(mysql_error());
                  $arrayme = explode(',',$row[2]); #เอา array เก็บาสินค้าออกมา
                  foreach($arrayme as $value){
                      if(explode('=',$value)[1] != 0) {   #ตัวไหนค่า 0 ก็ไม่สนใจ
                          $id = explode('=',$value)[0];
                          $id = substr($id, 10);
                          while($data_find = mysql_fetch_array($data)) {
                              if($data_find['product_id'] == $id) {
                                  echo '<div class="btn btn-info sublist">'.$data_find['name']." : ".explode('=',$value)[1].'</div>';
                                  break;
                              }
                          }
                      }
                  }
                  ?>
              </div>
            </div>
        <?php
        }
        ?>
            </div>

        <script>
          $('.orderlist').click(function() {
            $(this).siblings(".suborder").slideToggle();
          });
        </script>

    </body>
</html>
