<?php
function formOutput($id, $name, $description, $price, $error) {
?>
<html>
    <head>
        <title>แก้ไขข้อมูลสินค้า</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
        <script src="../bootstrap/js/bootstrap.js"></script>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../css/custom.css"/>
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
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
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <div>
        <strong>รหัสสินค้า: <?php echo $id; ?></strong>
        <strong>ชื่อสินค้า: *</strong> <input class="form-control" type="text" name="name" value="<?php echo $name; ?>"/><br/>
        <strong>คำอธิบาย: *</strong> <input class="form-control" type="text" name="description" value="<?php echo $description; ?>"/><br/>
        <strong>ราคา: *</strong> <input class="form-control" type="text" name="price" value="<?php echo $price; ?>"/><br/>
        <p>* ต้องกรอกข้อมูล</p>
        <input type="submit" name="submit" value="Submit">
    </div>
</form>

    </div>
</body>

</html>

<?php
}

include('connection.php');
if (isset($_POST['submit'])) {
    if (is_numeric($_POST['id'])) {
        $id = $_POST['id'];
        $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
        $description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
        $price = mysql_real_escape_string(htmlspecialchars($_POST['price']));

    if ($name == '' || $description == '' || $price == '') {
        $error = 'กรุณากรอกข้อมูลให้ถูกต้อง';
        formOutput($id, $name, $description, $price, $error);
    } else {
        mysql_query("UPDATE products SET name='$name', description='$description', price='$price' WHERE id_product='$id'") or die(mysql_error());
        header("Location: ../backend/index.php");
        }
        
    } else {
    echo 'เกิดความผิดพลาด กรุณาลองใหม่';
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
        $id = $_GET['id'];
        $result = mysql_query("SELECT * FROM products WHERE id_product=$id") or die(mysql_error());
        $row = mysql_fetch_array($result);

    if($row) {
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        formOutput($id, $name, $description, $price, '');
    } else {
        echo "สินค้านี้ไม่มีในระบบ";
    }
} else {

echo 'รหัสสินค้าผิดพลาด!';

}

}

?>