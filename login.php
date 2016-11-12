<?php
   include("database/connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $user_id = mysql_real_escape_string($_POST['user_id']);
      $password = mysql_real_escape_string($_POST['password']); 
      
      $sql = "SELECT user_id, user_name, isadmin FROM accounts WHERE user_id='$user_id' and user_password='$password'";
      $result = mysql_query($sql);
      $row = mysql_fetch_array($result);
      $active = $row['user_id'];
      $count = mysql_num_rows($result);
        
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
          $_SESSION['login_user'] = $row['user_name'];
          $_SESSION['isadmin'] = $row['isadmin'];
          $_SESSION['user_id'] = $row['user_id'];
          header("location: index.php");
      }else {
         $error = "ชื่อผู้ใช้หรือรหัสผ่านผิดพลาด";
      }
   }
?>
<html>
   
   <head>
      <title>เข้าสู่ระบบ | PaNothing</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="css/custom.css" rel='stylesheet'>
    <link href="backend/backend.css" rel='stylesheet'>
   </head>
   
   <body>
	
      <div class="container middle-thing col-xs-12 col-md-8 well">
          <h3>เข้าสู่ระบบ</h3>
               <div class="form-group">
               <form action = "" method = "post">
                  <label>รหัสนักศึกษา  :</label><input type = "text" name = "user_id" class = "form-control"/><br /><br />
                  <label>รหัสผ่าน  :</label><input type = "password" name = "password" class = "form-control" /><br/><br />
                    <input class="btn btn-default col-xs-6" type = "submit" value = "เข้าสู่ระบบ"/>
                    <a href="register.php" class="btn btn-default col-xs-6">สมัครสมาชิก</a>
               </form>
          </div>
               
            <?php 
                if(isset($error)) {
                    echo '<div class="alert alert-warning col-xs-12">'.$error.'</div>';
                }    
            ?>
				
         </div>
			
      </div>

   </body>
</html>