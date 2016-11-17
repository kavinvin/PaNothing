<?php
    session_start();
    require("database/connection.php");
    include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <!--  css link-->
  <link rel="stylesheet" href="css/custom.css"/>
  <link rel="stylesheet" href="css/product.css"/>
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="owl.carousel/owl-carousel/owl.carousel.css">
  <link rel="stylesheet" href="owl.carousel/owl-carousel/owl.theme.css">
  <script src="owl.carousel/owl-carousel/owl.carousel.min.js"></script>
  <script src="js\common.js"></script>
  <title>ป้าไม่ได้อะไรเลย</title>
</head>
<body>
  <!-- nav -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">PaNothing</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="nav navbar-nav pull-right user">
      <?php

        if($_SESSION['login_user'] == ''){
            echo '<a href="login.php" class="btn btn-warning">เข้าสู่ระบบ</a>
                  <a href="register.php" class="btn btn-warning">สมัครสมาชิก</a>';

        } else {
            echo '<span class="btn btn-primary">สวัสดี '.$_SESSION['login_user'].'</span>
              <a href="logout.php" class="btn btn-warning">ออกจากระบบ</a>';
        }

        ?>
        </div>
      </div>
    </div>
  </nav>
  <!-- nav end -->
  <!-- header -->
  <div class="container">
    <div class="hidden-xs col-sm-12">
      <div id="header" class="owl-carousel owl-theme">
        <div class="item"><img src="img/headerimg2.jpg"></img></div>
        <div class="item"><img src="img/headerimg3.jpg"></img></div>
      </div>
    </div>
    <!-- header end -->
    <div class="col-xs-12">
      <div id="detail" class="col-xs-12 col-sm-6 example center"><h3>ทำไมต้อง"ป้าไม่ได้อะไรเลย"?</h3></div>
      <div id="omelet" class="col-xs-12 col-sm-6 example">
        <button data-toggle="modal" data-target="#myModal" class="btn btn-info center col-xs-12">สั่งไข่เจียวเดี๋ยวนี้!</button>
      </div>
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
          <form id="omelette" method="post" action="database/purchase.php">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">สั่งไข่เจียว 30 บาท</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-4 center-text">
                      <img src="img/omelette/pork.jpg">
                      <div class="center-x center-text">หมูสับ</div>
                      <input type="checkbox" name="omelette" value="pork" />
                    </div>
                    <div class="col-xs-4 center-text">
                      <img src="img/omelette/sausage.jpg">
                      <div class="center-x center-text">ไส้กรอก</div>
                      <input type="checkbox" name="omelette" value="sausage" />
                    </div>
                    <div class="col-xs-4 center-text">
                      <img src="img/omelette/cheese.jpg">
                      <div class="center-x center-text">ชีส</div>
                      <input type="checkbox" name="omelette" value="cheese" />
                    </div>
                    <div class="col-xs-4 center-text">
                      <img src="img/omelette/chaom.jpg">
                      <div class="center-x center-text">ชะอม</div>
                      <input type="checkbox" name="omelette" value="chaom" />
                    </div>
                    <div class="col-xs-4 center-text">
                      <img src="img/omelette/chili.jpg">
                      <div class="center-x center-text">พริก</div>
                      <input type="checkbox" name="omelette" value="chili" />
                    </div>
                    <div class="col-xs-4 center-text">
                      <img src="img/omelette/crabstick.jpg">
                      <div class="center-x center-text">ปูอัด</div>
                      <input type="checkbox" name="omelette" value="crabstick" />
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-warning">สั่ง!</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#omelette").submit(function(e){
            $value = ("&" + $("#omelette").serialize()).replace(/\&omelette=/g, ".");
            e.preventDefault();
            $.ajax({
            url:'database/purchase.php',
            type:'post',
            data:"product_info="+$value+"&total=30",
            success:function(){
                alert('ส่งไปแล้วววว');
            },
                error: function(){
                    alert('WTF ไม่ไปปป');
                }
            });
        });
      });
    </script>
    </div>
      <?php require("database/products.php"); ?>
    </div>

</body>
</html>
