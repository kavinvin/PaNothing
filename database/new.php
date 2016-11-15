<?php
function formOutput($error) {
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/custom.css"/>
    <link rel="stylesheet" href="../css/product.css"/>
    <link rel="stylesheet" href="../backend/backend.css"/>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <title>เพิ่มสินค้า | PaNothing</title>
</head>

<body>

    <div class="fullheight">
    <div class="container middle-thing well">

<?php
    if ($error != '') {
        echo '<div class="alert alert-warning">
                <strong>'.$error.'</strong>
              </div>';
    }
?>



<form action="" method="post">
<div class="form-group">
    <strong>ชื่อสินค้า: *</strong> <input class="form-control" type="text" name="name"/><br/>
    <strong>คำอธิบาย: *</strong> <input class="form-control" type="text" name="description"/><br/>
    <strong>ราคา: *</strong> <input class="form-control" type="number" name="price"/><br/>
    <p>* ต้องใส่ครบทุกช่อง</p>
    <input class="btn btn-default" type="submit" name="submit" value="Submit">
</div>
</form>

</body>

</html>

<?php

}


include('connection.php');

if (isset($_POST['submit'])) {
    $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
    $description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
    $price = mysql_real_escape_string(htmlspecialchars($_POST['price']));

if ($name == '' || $description == '' || $price == '') {
    $error = 'กรุณาใส่ข้อมูลทุกช่อง';
    formOutput($error);
    } else {
        mysql_query("INSERT products SET name='$name', description='$description', price='$price'") or die(mysql_error());
        header("Location: ../backend/index.php");
        }
} else {
    formOutput('');
}

?>
    </div>
    </div>
