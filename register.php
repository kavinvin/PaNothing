<?php
function formOutput($error) {
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <link rel="stylesheet" href="backend/backend.css"/>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <title>สมัครสมาชิก | PaNothing</title>
</head>

<body>

    <div class="container middle-thing col-xs-12 col-md-8 well">

<?php
    if ($error != '') {
        echo '<div class="alert alert-warning">
                <strong>'.$error.'</strong>
              </div>';
    }
?>



<form action="" method="post">
<div class="form-group">
    <strong>รหัสนักศึกษา: *</strong> <input class="form-control" type="text" name="user_id"/><br/>
    <strong>ชื่อผู้ใช้: *</strong> <input class="form-control" type="text" name="username"/><br/>
    <strong>รหัสผ่าน: *</strong> <input class="form-control" type="password" name="password"/><br/>
    <strong>ยืนยันรหัสผ่าน: *</strong> <input class="form-control" type="password" name="password_recheck"/><br/>
    <strong>อีเมล: *</strong> <input class="form-control" type="email" name="email"/><br/>
    <p>* ต้องใส่ครบทุกช่อง</p>
    <input class="btn btn-default" type="submit" name="submit" value="สมัครสมาชิก">
</div>
</form>

</body>

</html>

<?php

}


include('database/connection.php');

if (isset($_POST['submit'])) {
    $username = mysql_real_escape_string(htmlspecialchars($_POST['username']));
    $password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
    $password_recheck = mysql_real_escape_string(htmlspecialchars($_POST['password_recheck']));
    $user_id = mysql_real_escape_string(htmlspecialchars($_POST['user_id']));
    $user_email = mysql_real_escape_string(htmlspecialchars($_POST['email']));


if ($username == '' || $password == '' || $password_recheck == '' || $user_id == '' || $user_email == '' || $password_recheck != $password) {
    $error = 'กรุณาใส่ข้อมูลให้ถูกต้องและครบทุกช่อง';
    formOutput($error);
    } else {
        mysql_query("INSERT accounts SET user_name='$username', user_password='$password', user_id='$user_id', user_email='$user_email'") or die(mysql_error());
        header("Location: login.php");
        }
} else {
    formOutput('');
}

?>
    </div>