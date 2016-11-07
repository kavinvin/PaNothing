<?php
    session_start();
    require("database/connection.php");
    if(isset($_GET['page'])){
        $pages=array("database/products", "cart");
        if(in_array($_GET['page'], $pages)) {
            $_page=$_GET['page'];
        }else{
            $_page="database/products";
        }
    }else{
        $_page="database/products";
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <link rel="stylesheet" href="css/custom.css"/>
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
      <form method="post">
        <ul class="nav navbar-nav center login-panel">
          <li>Username<input name="user" type="text"></li>
          <li>Password<input name="pass" type="password"></li>
          <li><a href="#"><button>Login</button></a></li>
        </ul>
      </form>
    </div>
  </div>
  </nav>
  <!-- nav end -->
  <!-- header -->
    <div class="container">
    <div class="hidden-xs col-sm-12">
      <div id="header" class="owl-carousel owl-theme">
        <div class="item"><img src="img/headerimg.png"></img></div>
        <div class="item"><img src="img/headerimg.png"></img></div>
        <div class="item"><img src="img/headerimg.png"></img></div>
        <div class="item"><img src="img/headerimg.png"></img></div>
    </div></div>
    <!-- header end -->
    <div class="col-xs-12">
      <div class="col-xs-12 col-sm-6 example"></div>
      <div class="col-xs-12 col-sm-6 example"></div>
    </div>
      <?php require($_page.".php"); ?>
    </div>
</body>
</html>
