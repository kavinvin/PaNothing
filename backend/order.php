<?php
    session_start();
    require("../database/connection.php");
    $_page="../database/products";
    include('../session.php');

    if($_SESSION['login_user'] == '' || $_SESSION['isadmin'] == '0') {
        header("location: ../denied.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="order.js"></script>
  <script src="../bootstrap/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <link href="../css/custom.css" rel='stylesheet'>
  <link href="../css/product.css" rel='stylesheet'>
  <link href="../css/order.css" rel='stylesheet'>
  <link href="backend.css" rel='stylesheet'>
  <title>รายการสั่ง | Panothing</title>
</head>
    <body>
        <div id="data" class="container panel">
        <?php
            $this_page = 'order';
            include("consolebar.php");
            $result = mysqli_query($conn, "SELECT * FROM purchases") or die(mysqli_error($conn));
            while($row = mysqli_fetch_array( $result )) {
        ?>
            <div>
            <div class="col-xs-12 center-thing panel-body product-list orderlist">
              <div class="col-xs-2 center-y">
                  <?php echo $row['purchase_id']; ?>
              </div>
              <div class="col-xs-2 center-y">
                  <?php echo $row['user_id']; ?>
              </div>
              <div class="col-xs-4 center-y order_username">
                  <?php
                    $query = "SELECT user_name FROM accounts WHERE user_id=59070009";
                    $account = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    echo mysqli_fetch_array($account)['user_name'];
                   ?>
              </div>
              <div class="col-xs-2 center-y">
                  <?php echo $row['total'].' บาท'; ?>
              </div>
              <div class="col-xs-2 center-y">
                 <form method="post" action=""><button type="submit" value="<?php echo $row['purchase_id'];?>" name="del" class="del btn btn-success">เสร็จสิ้น</button></form>
              </div>
            </div>
            <div class="col-xs-12">
                  <?php
                    if (substr($row['product_info'], 0, 1) == '.') {
                      $omelette_list = array_slice(explode('.', $row['product_info']), 1);
                      $omelette_type = array(
                        "pork" => "หมูสับ",
                        "sausage" => "ไส้กรอก",
                        "cheese" => "ชีส",
                        "chaom" => "ชะอม",
                        "chili" => "พริก",
                        "crabstick" => "ปูอัด"
                      );
                      echo '<div class="btn btn-warning sublist col-xs-3">ไข่เจียว :</div>';
                      foreach ($omelette_list as $value) {
                        echo '<div class="btn btn-default sublist col-xs-3">'.$omelette_type[$value].'</div>';
                      }

                    }
                    else {
                      $data = mysqli_query($conn, "SELECT id_product, name FROM products") or die(mysqli_error($conn));
                      $arrayme = explode(',',$row[2]); #เอา array เก็บสินค้าออกมา
                      foreach($arrayme as $value){
                          if(explode('=',$value)[1] != 0) {   #ตัวไหนค่า 0 ก็ไม่สนใจ
                              $id = explode('=',$value)[0];
                              $id = substr($id, 10);
                              while($data_find = mysqli_fetch_array($data)) {
                                  if($data_find['id_product'] == $id) {
                                      echo '<div class="btn btn-default sublist col-xs-3">'.$data_find['name']." : ".explode('=',$value)[1].'</div>';
                                      break;
                                  }
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

                $('.del').click(function(){
                    $(this).parent().fadeOut();
                    $(this).next().fadeOut();

                });
            function refresh_div() {
                    $("#data").load(location.href + " #data");
                    }
            t = setInterval(refresh_div,10000);
        </script>

        <?php
            if(isset($_POST['del'])){
                $purchase_id = mysqli_real_escape_string($conn, htmlspecialchars($_POST['del']));
                $del = mysqli_query($conn, "DELETE FROM purchases WHERE purchase_id='$purchase_id'") or die(mysqli_error($conn));
            }
        ?>

    </body>
</html>
