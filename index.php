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
        <ul class="nav navbar-nav pull-right user">
        <span class="btn btn-primary">สวัสดี <?php echo $_SESSION['login_user']; ?></span>
        <a href="logout.php" class="btn btn-warning">ออกจากระบบ</a>
        </ul>
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
    </div></div>
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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">สั่งไข่เจียว</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default">สั่ง!</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>

  </div>
</div>
    </div>
      <?php require("database/products.php"); ?>
    </div>

</body>
</html>
