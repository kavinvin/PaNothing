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
            $result = mysql_query("SELECT * FROM purchases") or die(mysql_error());
            while($row = mysql_fetch_array( $result )) {
        ?>
            <div>
            <div class="col-xs-12 center-thing panel-body product-list orderlist">
              <div class="col-xs-3 center-y">
                  <?php echo $row['purchase_id']; ?>
              </div>
              <div class="col-xs-3 center-y">
                  <?php echo $row['user_id']; ?>
              </div>
              <div class="col-xs-3 center-y">
                  <?php echo $row['total'].' บาท'; ?>
              </div>
              <div class="col-xs-3 center-y">
                 <form method="post" action=""><button type="submit" value="<?php echo $row['purchase_id'];?>" name="del" class="del btn btn-success">เสร็จสิ้น</button></form>
              </div>
            </div>
            <div class="col-xs-12">
                  <?php
                    if (substr($row['product_info'], 0, 8) == 'omelette') {
                      $omelette_type = array(
                        "pork" => "",
                        "sausage" => "ไส้กรอก",
                        "veggie" => "มังสวิรัติ"
                      );
                      echo '<div class="btn btn-default sublist col-xs-3">ไข่เจียว '.$omelette_type[substr($row['product_info'], 9)].'</div>';
                    }
                    else {
                      $data = mysql_query("SELECT product_id, name FROM products") or die(mysql_error());
                      $arrayme = explode(',',$row[2]); #เอา array เก็บสินค้าออกมา
                      foreach($arrayme as $value){
                          if(explode('=',$value)[1] != 0) {   #ตัวไหนค่า 0 ก็ไม่สนใจ
                              $id = explode('=',$value)[0];
                              $id = substr($id, 10);
                              while($data_find = mysql_fetch_array($data)) {
                                  if($data_find['product_id'] == $id) {
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
                $purchase_id = mysql_real_escape_string(htmlspecialchars($_POST['del']));
                $del = mysql_query("DELETE FROM purchases WHERE purchase_id='$purchase_id'") or die(mysql_error());
            }
        ?>

    </body>
</html>
